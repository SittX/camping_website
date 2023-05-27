<?php

require_once("DataRepository.php");
require_once("./models/User.php");

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
        $userRecord = $this->fetchRecord($query, 'i', $id);

        if (!$userRecord) {
            return null;
        }

        return $this->mapRowIntoUserObj($userRecord);
    }

    public function getLists(): ?array
    {
        $query = "SELECT * FROM User";
        $userList = $this->fetchMultipleRecords($query);

        if (empty($userList)) {
            return [];
        }

        return $userList;
    }

    public function update($existingData, $newData)
    {
        $query = "UPDATE User SET first_name = ?, last_name = ?, username = ?, password = ?, email = ? WHERE username = ?";
        $fName = $newData->getFirstName();
        $lName = $newData->getLastName();
        $username = $newData->getUsername();
        $password = $newData->getPassword();
        $email = $newData->getEmail();
        $existingUsername = $existingData->getUsername();

        $this->executeQuery($query, 'ssssss', $fName, $lName, $username, $password, $email, $existingUsername);
    }

    public function insert($data)
    {
        $query = "INSERT INTO User (first_name, last_name, username, password, email) VALUES (?, ?, ?, ?, ?)";
        $this->executeQuery($query, 'sssss', $data->getFirstName(), $data->getLastName(), $data->getUsername(), $data->getPassword(), $data->getEmail());
    }

    public function remove($id): void
    {
        $query = "DELETE FROM User WHERE user_id = ?";
        $this->executeQuery($query, 'i', $id);
    }

    private function mapRowIntoUserObj($row): User
    {
        $user = new User($row["first_name"], $row["last_name"], $row["username"], $row["email"], $row["password"]);
        $user->setUserId($row["user_id"]);
        return $user;
    }

    private function fetchRecord($query, ...$params): ?array
    {
        $stmt = $this->prepareAndExecuteQuery($query, ...$params);
        $result = $stmt->get_result();

        if ($result->num_rows <= 0) {
            return null;
        }

        return $result->fetch_assoc();
    }

    private function fetchMultipleRecords($query): array
    {
        $stmt = $this->prepareAndExecuteQuery($query);
        $result = $stmt->get_result();
        $records = [];

        while ($row = $result->fetch_assoc()) {
            $records[] = $this->mapRowIntoUserObj($row);
        }

        return $records;
    }

    private function executeQuery($query, ...$params): void
    {
        $stmt = $this->prepareAndExecuteQuery($query, ...$params);
        $stmt->close();
    }

    private function prepareAndExecuteQuery($query, ...$params): mysqli_stmt
    {
        $stmt = $this->connection->prepare($query);
        if ($stmt === false) {
            throw new mysqli_sql_exception("Error during query preparation: " . $this->connection->error);
        }

        $stmt->bind_param(...$params);
        $stmt->execute();

        return $stmt;
    }
}
