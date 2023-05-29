<?php
require_once("../models/Review.php");
require_once("../utils/DataRepositoryUtil.php");
class ReviewDataRepository implements DataRepository
{
    private mysqli $connection;

    public function __construct(DatabaseConnection $connection)
    {
        $this->connection = $connection->getConnection();
    }


    public function queryById($id)
    {
        $query = "SELECT * FROM Review WHERE review_id = ?";
        $paramTypes = "i";
        $stmt = prepareAndExecuteQuery($query, $paramTypes, $id);

        $mysqli_result = $stmt->get_result();
        if ($mysqli_result->num_rows <= 0) {
            throw new mysqli_sql_exception("Review with the given id is not found");
        }

        $result = $mysqli_result->fetch_assoc();
        $stmt->close();
        return $this->mapRowToReviewObject($result);
    }

    public function getLists(): ?array
    {
        $query = "SELECT * FROM Review";
        $stmt = $this->connection->prepare($query);

        if (!$stmt->execute()) {
            throw new mysqli_sql_exception("Error executing the given sql statement.");
        }

        $mysqli_result = $stmt->get_result();
        $reviewList = [];
        while ($row = $mysqli_result->fetch_assoc()) {
            $user = $this->mapRowToReviewObject($row);
            $reviewList[] = $user;
        }
        $stmt->close();
        return $reviewList;
    }

    public function update($existingData, $newData): int|string
    {
        $query = "UPDATE Review SET message = ?, title = ?, rating = ? WHERE review_id = ?";

        $paramsType = 'ssii';
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramsType, $newData->getMessage(), $newData->getTitle(), $newData->getRating(), $existingData->getReviewId());

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function insert($data): int|string
    {
        $query = "INSERT INTO Review(message, title, rating, user_id, site_id) VALUES (?, ?, ?, ?, ?)";
        $paramTypes = "ssiii";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $data->getMessage(), $data->getTitle(), $data->getRating(), $data->getUserId(), $data->getSiteId());

        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    public function remove($id): int|string
    {
        $query = "DELETE FROM Review WHERE review_id = ?";
        $paramTypes = "i";
        $stmt = prepareAndExecuteQuery($this->connection, $query, $paramTypes, $id);
        $affectedRow = $stmt->affected_rows;
        $stmt->close();
        return $affectedRow;
    }

    private function mapRowToReviewObject($row): Review
    {
        $review = new Review($row['rating'], $row['message'], $row['title'], $row['user_id'], $row['site_id']);
        $review->setReviewId($row['review_id']);
        return $review;
    }
}
