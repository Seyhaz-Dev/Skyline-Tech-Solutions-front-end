<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name',
        'address',
        'description',
    ];

    // Relationship: One Property has many Units
    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
