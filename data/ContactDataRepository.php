<?php

require_once("../utils/DataRepositoryUtil.php");
require_once("../models/Contact.php");
class ContactDataRepository implements DataRepository
{
    private mysqli $connection;
    public function __construct($connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function searchById($id)
    {
        $query = "SELECT * FROM Contact WHERE contact_id = ?";
        $paramTypes = "i";
        $stmt = prepareAndExecuteQuery($query, $paramTypes, $id);

        $mysqli_result = $stmt->get_result();
        if ($mysqli_result->num_rows <= 0) {
            throw new mysqli_sql_exception("User with the given id is not found");
        }

        $result = $mysqli_result->fetch_assoc();
        $stmt->close();
        return $this->mapRowToContactObject($result);
    }

    public function getLists(): ?array
    {
        $query = "SELECT * FROM Contact";
        $stmt = $this->connection->prepare($query);

        if (!$stmt->execute()) {
            throw new mysqli_sql_exception("Error executing the given sql statement.");
        }

        $mysqli_result = $stmt->get_result();
        $userList = [];
        while ($row = $mysqli_result->fetch_assoc()) {
            $user = $this->mapRowToContactObject($row);
            $userList[] = $user;
        }
        $stmt->close();
        return $userList;
    }

    public function update($existingData, $newData): int|string
    {
        $query = "UPDATE Contact SET message = ? WHERE contact_id = ?";
        $paramsType = 'si';
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramsType, $newData->getMessage(), $existingData->getContactId());

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function insert($data): int|string
    {
        $query = "INSERT INTO Contact(message,contact_date,user_id) VALUES (?, NOW(), ?)";
        $paramTypes = "si";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $data->getMessage(), $data->getUserId());

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function remove($id): int|string
    {
        $query = "DELETE FROM Contact WHERE contact_id = ?";
        $paramTypes = "i";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $id);
        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    private function mapRowToContactObject($row)
    {
        $contact = new Contact($row['contact_date'], $row['message'], $row['user_id']);
        $contact->setContactId($row['contact_id']);
    }
}
