<?php

interface DataRepository
{
    public function queryById($id);

    public function getLists();

    public function update($existingData, $newData);

    public function insert($data);

    public function remove($id): void;
}
