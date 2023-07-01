<?php

class Rss
{
    private int $id;
    private string $title;
    private string $link;
    private string $description;
    private DateTime $publishDate;

    public function __construct(string $title, string $link, string $description, DateTime $publishDate)
    {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
        $this->publishDate = $publishDate;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPublishDate(): DateTime
    {
        return $this->publishDate;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setPublishDate(DateTime $publishDate): void
    {
        $this->publishDate = $publishDate;
    }

}