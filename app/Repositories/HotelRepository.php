<?php

namespace App\Repositories;

use App\Models\Hotel;

class HotelRepository implements HotelRepositoryInterface
{
    public function all()
    {
        return Hotel::with('hotelCategory')->get();
    }

    public function getById($id)
    {
        return Hotel::with('hotelCategory')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Hotel::create($data);
    }

    public function update($id, array $data)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->update($data);
        return $hotel;
    }

    public function delete($id)
    {
        return Hotel::destroy($id);
    }
}
