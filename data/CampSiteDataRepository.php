<?php

require_once("DataRepository.php");
require_once("../models/CampSite.php");
require_once("../utils/DataRepositoryUtil.php");

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
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $id);

        $mysqli_result = $stmt->get_result();
        if ($mysqli_result->num_rows <= 0) {
            throw new mysqli_sql_exception("Camp Site with the given id is not found");
        }

        $result = $mysqli_result->fetch_assoc();
        $stmt->close();
        return $this->mapRowToCampSiteObject($result);
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
            $campSite = $this->mapRowToCampSiteObject($row);
            $campSiteList[] = $campSite;
        }
        $stmt->close();
        return $campSiteList;
    }

    public function update($existingData, $newData): int|string
    {
        $query = "UPDATE CampSite SET location = ?, price = ?, description = ?,local_attraction=?, features = ?, notice_note = ?,pitch_type_id = ? WHERE site_id = ?;";
        $paramTypes = "sissssii";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $newData->getLocation(), $newData->getPrice(), $newData->getDescription(), $newData->getLocalAttraction(), $newData->getFeatures(), $newData->getNoticeNote(), $newData->getPitchTypeId(), $existingData->getSiteId());

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function insert($data): int|string
    {
        $query = "INSERT INTO CampSite (location, price, description,local_attraction,features,notice_note,pitch_type_id) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $paramTypes = "sissssi";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $data->getLocation(), $data->getPrice(), $data->getDescription(), $data->getLocalAttraction(), $data->getFeatures(), $data->getNoticeNote(), $data->getPitchTypeId());

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function remove($id): int|string
    {
        $query = "DELETE FROM CampSite WHERE site_id = ?;";
        $paramTypes = "i";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $id);

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    // Helper functions
    private function mapRowToCampSiteObject($row): CampSite
    {
        $campsite = new CampSite($row['location'], $row['description'], $row['local_attraction'], $row['features'], $row['notice_note'], $row['pitch_type_id'], $row['price']);
        $campsite->setSiteId($row['site_id']);
        return $campsite;
    }
}
