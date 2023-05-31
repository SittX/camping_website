<?php

class PitchTypeDataRepository implements DataRepository
{
    private mysqli $connection;

    public function __construct($connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function searchByPitchType($type)
    {
        $query = "SELECT * FROM PitchType WHERE pitch_description = ?";
        $paramTypes = "s";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $type);

        $mysqli_result = $stmt->get_result();
        if ($mysqli_result->num_rows <= 0) {
            throw new mysqli_sql_exception("Pitch type with the given id is not found");
        }

        $result = $mysqli_result->fetch_assoc();
        $stmt->close();
        return $this->mapRowToPitchTypeObject($result);
    }
    public function searchById($id)
    {
        $query = "SELECT * FROM Review WHERE review_id = ?";
        $paramTypes = "i";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $id);

        $mysqli_result = $stmt->get_result();
        if ($mysqli_result->num_rows <= 0) {
            throw new mysqli_sql_exception("Pitch type with the given id is not found");
        }

        $result = $mysqli_result->fetch_assoc();
        $stmt->close();
        return $this->mapRowToPitchTypeObject($result);
    }

    public function getLists(): ?array
    {
        $query = "SELECT * FROM PitchType";
        $stmt = $this->connection->prepare($query);

        if (!$stmt->execute()) {
            throw new mysqli_sql_exception("Error executing the given sql statement.");
        }

        $mysqli_result = $stmt->get_result();
        $pitchTypeList = [];
        while ($row = $mysqli_result->fetch_assoc()) {
            $pitchType = $this->mapRowToPitchTypeObject($row);
            $pitchTypeList[] = $pitchType;
        }
        $stmt->close();
        return $pitchTypeList;
    }

    public function update($existingData, $newData): int|string
    {
        $query = "UPDATE PitchType SET description = ? WHERE pitch_type_id = ?";

        $paramsType = 'si';
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramsType, $newData->getDescription(), $existingData->getPitchTypeId());

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function insert($data): int|string
    {
        $query = "INSERT INTO PitchType(pitch_description) VALUES (?)";
        $paramTypes = "s";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $data->getDescription());

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function remove($id): int|string
    {
        $query = "DELETE FROM PitchType WHERE pitch_type_id = ?";
        $paramTypes = "i";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $id);
        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    private function mapRowToPitchTypeObject($row): PitchType
    {
        $pitchType = new PitchType($row['pitch_description']);
        $pitchType->setPitchTypeId($row['pitch_type_id']);
        return $pitchType;
    }
}
