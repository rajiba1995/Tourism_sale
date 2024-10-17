<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'package_name', 'no_of_days', 'no_of_nights', 'status', 'image',
    ];
}

