<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'phone',
        'email',
        'designation_id',
        'password',
        'image',
        'status',
    ];

    // Defining relationship with the Designation model
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}
