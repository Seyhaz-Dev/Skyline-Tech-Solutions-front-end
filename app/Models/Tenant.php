<?php
// app/Models/Tenant.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'property',
        'lease_start',
        'lease_end',
        'rent',
        'status',
    ];
}