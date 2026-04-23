<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    @extends('components.sidebar')
    
    <div class="flex bg-gray-300 items-center border-b gap-4 p-2 justify-between px-5">
       <div> 
        Jinlong PMS
    </div>
       <div class="flex gap-4 items-center">
            <span class="text-sm text-gray-600 hover: cursor-pointer">
                Admin
            </span>

            <button class="bg-red-500 text-white px-3 py-1 rounded">
                Logout
            </button>
        </div>

        </div>

@section('content')



<h1 class="text-[30px] font-semibold mb-6">
    Overview
</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

    <!-- Users -->
    <div class="bg-gray-500 text-white p-5 rounded-xl shadow ">
        <p class="text-xs uppercase tracking-wide">Users</p>
        <h2 class="text-2xl font-bold">{{ $totalUsers }}</h2>
    </div>

    <!-- Orders -->
    <div class="bg-gray-500 text-white p-5 rounded-xl shadow ">
        <p class="text-xs uppercase tracking-wide">Orders</p>
        <h2 class="text-2xl font-bold">{{ $totalOrders }}</h2>
    </div>

    <!-- Revenue -->
    <div class="bg-gray-500 text-white p-5 rounded-xl shadow ">
        <p class="text-xs uppercase tracking-wide">Revenue</p>
        <h2 class="text-2xl font-bold">$ {{ $totalRevenue }}</h2>
    </div>

    <!-- Views -->
    <div class="bg-gray-500 text-white p-5 rounded-xl shadow ">
        <p class="text-xs uppercase tracking-wide">Views</p>
        <h2 class="text-2xl font-bold">{{ $pageViews }}</h2>
    </div>

</div>

@endsection
</body>
</html>

