<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Use the correct class
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Add any other necessary properties or methods for your admin

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
