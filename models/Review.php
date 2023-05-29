<?php
class Review
{
    private int $reviewId;
    private int $rating;
    private string $message;
    private string $title;
    private int $userId;
    private int $siteId;

    public function __construct($rating, $message, $title, $userId, $siteId)
    {
        $this->rating = $rating;
        $this->message = $message;
        $this->title = $title;
        $this->userId = $userId;
        $this->siteId = $siteId;
    }

    // Getters
    public function getReviewId(): int
    {
        return $this->reviewId;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getSiteId(): int
    {
        return $this->siteId;
    }

    // Setters
    public function setReviewId($reviewId): void
    {
        $this->reviewId = $reviewId;
    }

    public function setRating($rating): void
    {
        $this->rating = $rating;
    }

    public function setMessage($message): void
    {
        $this->message = $message;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    public function setSiteId($siteId): void
    {
        $this->siteId = $siteId;
    }



}
