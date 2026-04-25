<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

class Property extends Model
{
    protected $table = 'properties';

    protected $fillable = [
        'name',
        'address',
        'description',
        'room',
        'room2',
        'size',
        'total',
    ];

    // Relationship: One Property has many Units
    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}