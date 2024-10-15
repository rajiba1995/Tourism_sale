<?php

namespace App\Repositories;

use App\Models\HotelCategory;
use App\Repositories\HotelCategoryRepositoryInterface;

class HotelCategoryRepository implements HotelCategoryRepositoryInterface
{
    public function getAll()
    {
        return HotelCategory::all();
    }

    public function findById($id)
    {
        return HotelCategory::findOrFail($id);
    }

    public function getById($id)
    {
        return HotelCategory::findOrFail($id);
    }


    public function store($data)
    {
        return HotelCategory::create($data);

    }

    public function update($id, $data)
    {
        $category = $this->findById($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        return HotelCategory::destroy($id);
    }
}

