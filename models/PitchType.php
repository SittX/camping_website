<?php

class PitchType
{
    private int $pitch_type_id;
    private string $description;
    private string $title;

    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPitchTypeId(): int
    {
        return $this->pitch_type_id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setPitchTypeId(int $pitch_type_id): void
    {
        $this->pitch_type_id = $pitch_type_id;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
