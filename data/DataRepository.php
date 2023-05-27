<?php

interface DataRepository
{
    public function queryById($id);

    public function getLists(): ?array;

    public function update($existingData, $newData): int|string;

    public function insert($data): int|string;

    public function remove($id): int|string;
}
