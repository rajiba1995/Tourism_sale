<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    protected $model;

    public function __construct(Employee $employee)
    {
        $this->model = $employee;
    }

    public function getAll()
    {
        return $this->model->with('designation')->get();
    }

    public function getById($id)
    {
        return $this->model->with('designation')->findOrFail($id);
    }

    public function create(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image']);
        }
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $employee = $this->getById($id);
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image']);
        }

        $employee->update($data);
        return $employee;
    }

    public function delete($id)
    {
        $employee = $this->getById($id);
        return $employee->delete();
    }

    protected function uploadImage($image)
    {
        $path = $image->store('employees', 'public');
        return $path;
    }
}
