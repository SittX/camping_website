<?php

require_once("DataRepository.php");
require_once("./models/CampSite.php");

class CampSiteDataRepository implements DataRepository
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function queryById($id)
    {
        $query = "SELECT * FROM CampSite WHERE site_id = ?";
        $stmt = $this->prepareAndExecuteQuery($query, 'i', $id);

        $result = $stmt->get_result();
        if ($result->num_rows <= 0) {
            throw new mysqli_sql_exception("Camp Site with the given id is not found");
        }

        $campSiteData = $result->fetch_assoc();
        return $this->mapRecordToCampSiteObject($campSiteData);
    }

    public function getLists(): ?array
    {
        $query = "SELECT * FROM CampSite";
        $stmt = $this->connection->prepare($query);

        if (!$stmt->execute()) {
            return null;
        }

        $result = $stmt->get_result();
        $campSiteList = [];
        while ($row = $result->fetch_assoc()) {
            $campSite = $this->mapRecordToCampSiteObject($row);
            $campSiteList[] = $campSite;
        }
        return $campSiteList;
    }

    public function update($existingData, $newData)
    {
        $existingLocation = $existingData->getLocation();
        $query = "UPDATE CampSite SET location = ?, cost = ?, description = ? WHERE location = ?;";
        $stmt = $this->prepareAndExecuteQuery($query, 'siss', $newData->getLocation(), $newData->getCost(), $newData->getDescription(), $existingLocation);
    }

    public function insert($data)
    {
        $query = "INSERT INTO CampSite (location, cost, description) VALUES (?, ?, ?);";
        $stmt = $this->prepareAndExecuteQuery($query, 'sis', $data->getLocation(), $data->getCost(), $data->getDescription());
    }

    public function remove($id): void
    {
        $query = "DELETE FROM CampSite WHERE site_id = ?;";
        $stmt = $this->prepareAndExecuteQuery($query, 'i', $id);
    }

    private function mapRecordToCampSiteObject($row): CampSite
    {
        $campsite = new CampSite($row['location'], $row['cost'], $row['description']);
        $campsite->setSiteId($row['site_id']);
        return $campsite;
    }

    // private function fetchMultipleRecords($query): array
    // {
    //     $stmt = $this->prepareAndExecuteQuery($query);
    //     $result = $stmt->get_result();
    //     $records = [];

    //     while ($row = $result->fetch_assoc()) {
    //         $records[] = $this->mapRecordToCampSiteObject($row);
    //     }

    //     return $records;
    // }


    private function fetchRecord($query, ...$params)
    {
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