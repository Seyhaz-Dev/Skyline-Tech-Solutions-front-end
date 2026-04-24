<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }
}
