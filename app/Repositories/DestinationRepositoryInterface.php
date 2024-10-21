<?php

namespace App\Repositories;


interface DestinationRepositoryInterface
{
    public function getAll();

    public function findById($id);

    public function store($data);

    public function update($id, $data);

    public function delete($id);
}

