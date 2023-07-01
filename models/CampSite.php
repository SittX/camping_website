<?php

class CampSite
{
    private int $siteId;
    private string $name;
    private string $location;
    private string $description;
    private string $localAttraction;
    private string $features;
    private string $noticeNote;
    private PitchType $pitchType;
    private float $price;
    private $images;

    public function __construct(string $name, string $location, string $description, string $localAttraction, string $features, string $noticeNote, PitchType $pitchType, float $price)
    {
        $this->name = $name;
        $this->location = $location;
        $this->description = $description;
        $this->localAttraction = $localAttraction;
        $this->features = $features;
        $this->noticeNote = $noticeNote;
        $this->pitchType = $pitchType;
        $this->price = $price;
    }

    public function getSiteId(): int
    {
        return $this->siteId;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLocalAttraction(): string
    {
        return $this->localAttraction;
    }

    public function getFeatures(): string
    {
        return $this->features;
    }

    public function getNoticeNote(): string
    {
        return $this->noticeNote;
    }

    public function getPitchType(): PitchType
    {
        return $this->pitchType;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function getName(): string
    {
        return $this->name;
    }


    // Setters
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setSiteId(int $siteId): void
    {
        $this->siteId = $siteId;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setLocalAttraction(string $localAttraction): void
    {
        $this->localAttraction = $localAttraction;
    }

    public function setFeatures(string $features): void
    {
        $this->features = $features;
    }

    public function setNoticeNote(string $noticeNote): void
    {
        $this->noticeNote = $noticeNote;
    }

    public function setPitchType(PitchType $pitchType): void
    {
        $this->pitchType = $pitchType;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setImages($images): void
    {
        $this->images = $images;
    }
}
