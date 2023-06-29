<?php
class Review
{
    private int $reviewId;
    private int $rating;
    private string $message;
    private string $title;
    private User $user;
    private CampSite $site;

    public function __construct(int $rating,string $message,string $title,User $user, CampSite $site)
    {
        $this->rating = $rating;
        $this->message = $message;
        $this->title = $title;
        $this->user = $user;
        $this->site = $site;
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

    public function getUser():User
    {
        return $this->user;
    }

    public function getSite():CampSite
    {
        return $this->site;
    }

    // Setters
    public function setReviewId(int $reviewId): void
    {
        $this->reviewId = $reviewId;
    }

    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }

    public function setSite($site): void
    {
        $this->site = $site;
    }



}
