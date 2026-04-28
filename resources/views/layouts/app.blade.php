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

<div class="flex">

    <!-- SIDEBAR -->
    <aside class="w-full fixed h-screen bg-slate-900 text-white">
        @include('components.sidebar')
    </aside>

    <!-- MAIN AREA -->
    <div class="ml-[500px]  absolute">

        <!-- HEADER -->
        @include('components.header')

        <!-- CONTENT -->
        <div class="p-6">
            @yield('content')
        </div>

    </div>

</div>
<script>
    lucide.createIcons();
</script>

</body>
</html>