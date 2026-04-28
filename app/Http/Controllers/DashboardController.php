<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenant;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'properties' => Property::latest()->take(5)->get(),
            'tenants' => Tenant::latest()->take(5)->get(),
            'propertiesCount' => Property::count(),
            'tenantsCount' => Tenant::count(),
            'activeLeases' => Tenant::where('status', 'active')->count(),
        ]);
    }
}