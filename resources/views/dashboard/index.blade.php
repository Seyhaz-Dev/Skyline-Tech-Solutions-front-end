@extends('components.sidebar')

@section('content')

<!-- Header -->
<div class="flex items-center justify-between bg-white shadow-sm px-6 py-4 mb-6 rounded-xl">
    <h1 class="text-xl font-semibold text-gray-700">Jinlong PMS</h1>

    <div class="flex items-center gap-4">
        <span class="text-sm text-gray-600">Admin</span>

        <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-1.5 rounded-lg text-sm transition">
            Logout
        </button>
    </div>
</div>

<!-- Page Title -->
<h2 class="text-2xl font-bold text-gray-700 mb-6">Dashboard Overview</h2>

<!-- Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- Users -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-5 rounded-2xl shadow-lg hover:scale-105 transition">
        <p class="text-sm opacity-80">Total Users</p>
        <h2 class="text-3xl font-bold mt-2">{{ $totalUsers }}</h2>
    </div>

    <!-- Orders -->
    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-5 rounded-2xl shadow-lg hover:scale-105 transition">
        <p class="text-sm opacity-80">Orders</p>
        <h2 class="text-3xl font-bold mt-2">{{ $totalOrders }}</h2>
    </div>

    <!-- Revenue -->
    <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-white p-5 rounded-2xl shadow-lg hover:scale-105 transition">
        <p class="text-sm opacity-80">Revenue</p>
        <h2 class="text-3xl font-bold mt-2">$ {{ $totalRevenue }}</h2>
    </div>

    <!-- Views -->
    <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-5 rounded-2xl shadow-lg hover:scale-105 transition">
        <p class="text-sm opacity-80">Page Views</p>
        <h2 class="text-3xl font-bold mt-2">{{ $pageViews }}</h2>
    </div>

</div>

<!-- Extra Section (Optional for professional feel) -->
<div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- Recent Activity -->
    <div class="bg-white p-6 rounded-2xl shadow">
        <h3 class="text-lg font-semibold mb-4 text-gray-700">Recent Activity</h3>
        <ul class="text-sm text-gray-600 space-y-2">
            <li>✔ New user registered</li>
            <li>✔ Payment received</li>
            <li>✔ Lease updated</li>
        </ul>
    </div>

    <!-- Quick Stats -->
    <div class="bg-white p-6 rounded-2xl shadow">
        <h3 class="text-lg font-semibold mb-4 text-gray-700">Quick Stats</h3>
        <p class="text-sm text-gray-600">System running normally</p>
    </div>

</div>

@endsection