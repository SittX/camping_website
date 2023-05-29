<?php

require_once("DataRepository.php");
require_once("../models/User.php");
require_once("../utils/DataRepositoryUtil.php");

// TODO SQL statements should use prepared statement instead of raw SQL string
class UserDataRepository implements DataRepository
{
    private mysqli $connection;

    public function __construct($connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function searchByUsername($name)
    {
        $query = "SELECT * FROM User where username = ?";
        $paramTypes = "s";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $name);

        $mysqli_result = $stmt->get_result();
        if ($mysqli_result->num_rows <= 0) {
            throw new mysqli_sql_exception("User with the given username is not found");
        }

        $result = $mysqli_result->fetch_assoc();
        $stmt->close();
        return $this->mapRowToUserObject($result);
    }

    public function queryById($id): ?User
    {
        $query = "SELECT * FROM User WHERE user_id = ?";
        $paramTypes = "i";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $id);

        $mysqli_result = $stmt->get_result();
        if ($mysqli_result->num_rows <= 0) {
            throw new mysqli_sql_exception("User with the given id is not found");
        }

        $result = $mysqli_result->fetch_assoc();
        $stmt->close();
        return $this->mapRowToUserObject($result);
    }

    public function getLists(): ?array
    {
        $query = "SELECT * FROM User";
        $stmt = $this->connection->prepare($query);

        if (!$stmt->execute()) {
            throw new mysqli_sql_exception("Error executing the given sql statement.");
        }

        $mysqli_result = $stmt->get_result();
        $userList = [];
        while ($row = $mysqli_result->fetch_assoc()) {
            $user = $this->mapRowToUserObject($row);
            $userList[] = $user;
        }
        $stmt->close();
        return $userList;
    }

    public function update($existingData, $newData): int|string
    {
        $query = "UPDATE User SET first_name = ?, last_name = ?, username = ?, password = ?, email = ?,rank = ? WHERE user_id = ?";
        $fName = $newData->getFirstName();
        $lName = $newData->getLastName();
        $username = $newData->getUsername();
        $password = $newData->getPassword();
        $rank = $newData->getRank();
        $email = $newData->getEmail();
        $existingUserId = $existingData->getUserId();

        $paramsType = 'ssssssi';
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramsType, $fName, $lName, $username, $password, $email, $rank, $existingUserId);

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function insert($data): int|string
    {
        $query = "INSERT INTO User(first_name, last_name, username, password, email,rank) VALUES (?, ?, ?, ?, ?, ?)";
        $paramTypes = "ssssss";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $data->getFirstName(), $data->getLastName(), $data->getUsername(), $data->getPassword(), $data->getEmail(), $data->getRank() ?? "user");

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function remove($id): int|string
    {
        $query = "DELETE FROM User WHERE user_id = ?";
        $paramTypes = "i";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $id);
        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    // Helper functions
    private function mapRowToUserObject($row): User
    {
        $user = new User($row["first_name"], $row["last_name"], $row["username"], $row["email"], $row["password"], $row["rank"]);
        $user->setUserId($row["user_id"]);
        return $user;
    }
}
