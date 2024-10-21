<?php

namespace App\Repositories;

use App\Models\Destination;
use App\Repositories\DestinationRepositoryInterface;

class DestinationRepository implements DestinationRepositoryInterface
{
    public function getAll()
    {
        return Destination::all();
    }

    public function findById($id)
    {
        return Destination::findOrFail($id);
    }

    public function getById($id)
    {
        return Destination::findOrFail($id);
    }


    public function store($data)
    {
        return Destination::create($data);

    }

    public function update($id, $data)
    {
        $category = $this->findById($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        return Destination::destroy($id);
    }
}

