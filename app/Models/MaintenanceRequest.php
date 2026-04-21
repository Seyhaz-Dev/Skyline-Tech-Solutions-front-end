<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    protected $fillable = [
        'tenant_id',
        'unit_id',
        'title',
        'description',
        'status',
    ];

    // Request belongs to Tenant
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    // Request belongs to Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}