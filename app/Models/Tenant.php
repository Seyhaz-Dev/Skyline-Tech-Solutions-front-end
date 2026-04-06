<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'id_card',
        'address',
    ];

   
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}