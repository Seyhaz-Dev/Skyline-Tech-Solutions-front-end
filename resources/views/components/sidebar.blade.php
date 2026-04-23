<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jinlong PMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 text-gray-300 flex flex-col justify-between p-4">

            <!-- Top -->
            <div>
                <!-- Logo -->
                <div class="flex items-center gap-3 mb-8">
                    <div class="bg-blue-500 overflow-hidden rounded-full w-10 h-10">
                        <img src="{{ asset('Gemini_Generated_Image_othfokothfokothf.png') }}" class="w-10 h-10 object-cover" alt="Logo">
                    </div>
                    <h2 class="text-white font-semibold text-lg">Jinlong PMS</h2>
                </div>

               <nav class="space-y-2 text-sm">

    <a href="{{ route('dashboard') }}"
       class="block p-2 rounded-lg hover:bg-slate-700 {{ request()->routeIs('dashboard') ? 'bg-slate-700 text-white' : '' }}">
        <i class="fa-solid fa-chart-column"></i>
        Dashboard
    </a>

    <a href="{{ route('properties.index') }}"
       class="block p-2 rounded-lg hover:bg-slate-700 {{ request()->routeIs('properties.*') ? 'bg-slate-700 text-white' : '' }}">
        <i class="fa-regular fa-house"></i>
        Properties
    </a>

    <a href="{{ route('tenants.index') }}"
       class="block p-2 rounded-lg hover:bg-slate-700 {{ request()->routeIs('tenants.*') ? 'bg-slate-700 text-white' : '' }}">
        <i class="fa-solid fa-building-user"></i>
        Tenants
    </a>

    <a href="{{ route('leases.index') }}"
       class="block p-2 rounded-lg hover:bg-slate-700 {{ request()->routeIs('leases.*') ? 'bg-slate-700 text-white' : '' }}">
        <i class="fa-solid fa-file-contract"></i>
        Leases
    </a>

    <a href="{{ route('payments.index') }}"
       class="block p-2 rounded-lg hover:bg-slate-700 {{ request()->routeIs('payments.*') ? 'bg-slate-700 text-white' : '' }}">
        <i class="fa-solid fa-money-bill-transfer"></i>
        Payments
    </a>

    <a href="{{ route('maintenance.index') }}"
       class="block p-2 rounded-lg hover:bg-slate-700 {{ request()->routeIs('maintenance.*') ? 'bg-slate-700 text-white' : '' }}">
        <i class="fa-solid fa-screwdriver-wrench"></i>
        Maintenance
    </a>

    <a href="{{ route('users.index') }}"
       class="block p-2 rounded-lg hover:bg-slate-700 {{ request()->routeIs('users.*') ? 'bg-slate-700 text-white' : '' }}">
        <i class="fa-solid fa-users"></i>
        Users
    </a>

</nav>
            </div>

            <!-- Bottom -->
            <div class="space-y-4">

                <!-- Dark Mode Toggle -->


                <!-- Logout -->
                <button class="w-full flex items-center gap-3 p-2 rounded-lg bg-slate-700 hover:bg-slate-600">
                    <i data-lucide="log-out"></i>
                    Logout
                </button>

            </div>

        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>

    <script>
        lucide.createIcons();
    </script>

</body>

</html>