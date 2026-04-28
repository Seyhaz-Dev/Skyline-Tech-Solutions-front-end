<?php
namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenant;

class DashboardController extends Controller
{
    public function index()
    {

        // Sample data
        $totalUsers = 2500;
        $totalOrders = 1240;
        $totalRevenue = 24567;
        $pageViews = 47325;

        return view('dashboard.index', compact('totalUsers','totalOrders','totalRevenue','pageViews'));

        return view('dashboard.index', [

            'properties' => Property::latest()->take(5)->get(),
        
            'tenants' => Tenant::latest()->take(5)->get(),
            'propertiesCount' => Property::count(),
            'tenantsCount' => Tenant::count(),
            'activeLeases' => Tenant::where('status', 'active')->count(),
        ]);

    }
}