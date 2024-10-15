<?php

namespace App\Repositories;

use App\Models\Designation;

class DesignationRepository implements DesignationRepositoryInterface
{
    protected $model;

    public function __construct(Designation $designation)
    {
        $this->model = $designation;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $designation = $this->getById($id);
        $designation->update($data);
        return $designation;
    }

    public function delete($id)
    {
        $designation = $this->getById($id);
        return $designation->delete();
    }
}
