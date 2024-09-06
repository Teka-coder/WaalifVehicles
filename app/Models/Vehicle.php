<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    // Define the fields that are mass assignable
    protected $fillable = [
        'make', // Add any other fields that should be fillable
        'model',
        'year',
        'license_plate',
    ];

    // Other model logic can go here
}
