<?php

require_once("DataRepository.php");
require_once("./models/User.php");
require_once("./utils/dataFetch.php");

// TODO SQL statements should use prepared statement instead of raw SQL string
class UserDataRepository implements DataRepository
{
    private mysqli $connection;

    public function __construct($connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function queryById($id): ?User
    {
        $query = "SELECT * FROM User WHERE user_id = ?";
        $paramTypes = "i";
        $stmt = $this->prepareAndExecuteQuery($query, $paramTypes, $id);

        $mysqli_result = $stmt->get_result();
        if ($mysqli_result->num_rows <= 0) {
            throw new mysqli_sql_exception("User with the given id is not found");
        }

        $result = $mysqli_result->fetch_assoc();
        $stmt->close();
        return $this->mapRowIntoUserObj($result);
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
            $user = $this->mapRowIntoUserObj($row);
            $userList[] = $user;
        }
        $stmt->close();
        return $userList;
    }

    public function update($existingData, $newData): int|string
    {
        $query = "UPDATE User SET first_name = ?, last_name = ?, username = ?, password = ?, email = ? WHERE username = ?";
        $fName = $newData->getFirstName();
        $lName = $newData->getLastName();
        $username = $newData->getUsername();
        $password = $newData->getPassword();
        $email = $newData->getEmail();
        $existingUsername = $existingData->getUsername();

        $paramsType = 'ssssss';
        $stmt = $this->prepareAndExecuteQuery($query, $paramsType, $fName, $lName, $username, $password, $email, $existingUsername);

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function insert($data): int|string
    {
        $query = "INSERT INTO User (first_name, last_name, username, password, email) VALUES (?, ?, ?, ?, ?)";
        $paramTypes = "sssss";
        $stmt = $this->prepareAndExecuteQuery($query, $paramTypes, $data->getFirstName(), $data->getLastName(), $data->getUsername(), $data->getPassword(), $data->getEmail());

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function remove($id): int|string
    {
        $query = "DELETE FROM User WHERE user_id = ?";
        $paramTypes = "i";
        $stmt = $this->prepareAndExecuteQuery($query, $paramTypes, $id);
        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    // Helper functions
    private function mapRowIntoUserObj($row): User
    {
        $user = new User($row["first_name"], $row["last_name"], $row["username"], $row["email"], $row["password"]);
        $user->setUserId($row["user_id"]);
        return $user;
    }

    private function prepareAndExecuteQuery($query, $types, ...$params): mysqli_stmt
    {
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param($types, ...$params);

        if (!$stmt->execute()) {
            throw new mysqli_sql_exception("Error during the SQL statement execution.");
        }

        return $stmt;
    }
}
