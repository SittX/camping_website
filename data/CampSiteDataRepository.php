<?php

require_once("DataRepository.php");
require_once("./models/CampSite.php");

class CampSiteDataRepository implements DataRepository
{
    private mysqli $connection;

    public function __construct($connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function queryById($id)
    {
        $query = "SELECT * FROM CampSite WHERE site_id = ?";
        $paramTypes = "i";
        $stmt = $this->prepareAndExecuteQuery($query, $paramTypes, $id);

        $mysqli_result = $stmt->get_result();
        if ($mysqli_result->num_rows <= 0) {
            throw new mysqli_sql_exception("Camp Site with the given id is not found");
        }

        $result = $mysqli_result->fetch_assoc();
        $stmt->close();
        return $this->mapRecordToCampSiteObject($result);
    }

    public function getLists(): ?array
    {
        $query = "SELECT * FROM CampSite";
        $stmt = $this->connection->prepare($query);

        if (!$stmt->execute()) {
            throw new mysqli_sql_exception("Error executing the given sql statement.");
        }

        $mysqli_result = $stmt->get_result();
        $campSiteList = [];
        while ($row = $mysqli_result->fetch_assoc()) {
            $campSite = $this->mapRecordToCampSiteObject($row);
            $campSiteList[] = $campSite;
        }
        $stmt->close();
        return $campSiteList;
    }

    public function update($existingData, $newData): int|string
    {
        $query = "UPDATE CampSite SET location = ?, cost = ?, description = ? WHERE location = ?;";
        $stmt = $this->prepareAndExecuteQuery($query, 'siss', $newData->getLocation(), $newData->getCost(), $newData->getDescription(), $existingData->getLocation());

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function insert($data): int|string
    {
        $query = "INSERT INTO CampSite (location, cost, description) VALUES (?, ?, ?);";
        $paramTypes = "sis";
        $stmt = $this->prepareAndExecuteQuery($query, $paramTypes, $data->getLocation(), $data->getCost(), $data->getDescription());

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function remove($id): int|string
    {
        $query = "DELETE FROM CampSite WHERE site_id = ?;";
        $paramTypes = "i";
        $stmt = $this->prepareAndExecuteQuery($query, $paramTypes, $id);

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    // Helper functions
    private function mapRecordToCampSiteObject($row): CampSite
    {
        $campsite = new CampSite($row['location'], $row['cost'], $row['description']);
        $campsite->setSiteId($row['site_id']);
        return $campsite;
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
