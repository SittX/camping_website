<?php

class PitchType
{
    private int $pitch_type_id;
    private string $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function getPitchTypeId(): int
    {
        return $this->pitch_type_id;
    }

    public function getDescription(): string
    {
        return $this->description;
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
