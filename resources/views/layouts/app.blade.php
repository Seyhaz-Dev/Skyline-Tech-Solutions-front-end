<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jinlong-property</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-500 text-white p-5">
        <h2 class="text-[20px] font-bold mb-6">
            <img src="resources/views/imgs/chinese-lantern.png" alt="">
            Jinlong PMS
        </h2>

        <nav class="space-y-2 text-[20px]">

            <a class="block p-2 rounded hover:bg-gray-400 cursor-pointer">Dashboard</a>
            <a class="block p-2 rounded hover:bg-gray-400 cursor-pointer">Properties</a>
            <a class="block p-2 rounded hover:bg-gray-400 cursor-pointer">Tenants</a>
            <a class="block p-2 rounded hover:bg-gray-400 cursor-pointer">Leases</a>
            <a class="block p-2 rounded hover:bg-gray-400 cursor-pointer">Pagmant</a>
            <a class="block p-2 rounded hover:bg-gray-400 cursor-pointer">Maintence</a>

        </nav>
    </aside>

    <!-- Main -->
    <main class="flex-1 p-6">

        @yield('content')

    </main>

</div>

</body>
</html>