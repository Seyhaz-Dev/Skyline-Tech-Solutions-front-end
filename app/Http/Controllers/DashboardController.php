<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Sample data (you can replace with database later)

        $totalUsers = 120;
        $totalOrders = 75;
        $totalRevenue = 15400;
        $pageViews = 980;

        return view('dashboard.index', compact(
            'totalUsers',
            'totalOrders',
            'totalRevenue',
            'pageViews'
        ));
    }
}
