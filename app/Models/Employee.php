<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'name',
        'phone',
        'email',
        'designation_id',
        'password',
        'image',
        'status',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            // Generate the employee_id
            $latestId = Employee::max('id') ?? 0; // Get the max id or 0 if none exists
            $employee->employee_id = 'EMP' . str_pad($latestId + 1, 4, '0', STR_PAD_LEFT);
        });
    }
    // Defining relationship with the Designation model
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}
