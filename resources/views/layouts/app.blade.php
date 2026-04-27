<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jinlong PMS</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-gray-100">

<div class="flex bg-white">

    <!-- SIDEBAR -->
    <aside class="w-full fixed h-screen bg-slate-900 text-white">
        @include('components.sidebar')
    </aside>

    <!-- MAIN AREA -->
    <div class="flex-1 ml-64 flex flex-col">

        <header class="sticky top-0 z-40 bg-white shadow-sm">
            @include('components.header')
        </header>

        <main class="p-6 mt-64 ">
            @yield('content')
        </main>

    </div>

</div>
<script>
    lucide.createIcons();
</script>

</body>
</html>