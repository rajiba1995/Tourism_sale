<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['destination', 'location', 'hotel_category_id'];

    public function hotelCategory()
    {
        return $this->belongsTo(HotelCategory::class);
    }
}
