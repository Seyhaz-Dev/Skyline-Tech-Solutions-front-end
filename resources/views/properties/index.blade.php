
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Properties</title>

    <!-- Tailwind CSS (IMPORTANT) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="p-6">

    <!-- Page Title -->
    <h1 class="text-2xl font-bold mb-6">
        Properties
    </h1>

    <!-- GRID CONTAINER -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

        <!-- CARD 1 -->
        <div class="bg-white p-4 shadow rounded">
            <img src="{{ asset('img/SOHL0122005_1560x880_desktop.jpg') }}"
                 class="w-full h-48 object-cover">

            <h2 class="text-lg font-bold mt-2">
                {{ $modern }}
            </h2>

            <p class="text-gray-500">
                {{ $location }}
            </p>

            <div class="flex gap-2 mt-2 text-sm">
                <span>{{ $room }}</span>
                <span>{{ $tworoom }}</span>
                <span>{{ $number }}</span>
            </div>

            <p class="font-bold mt-2">
                {{ $total }}
            </p>

            <button class="mt-3 py-2 px-4 rounded bg-black text-white w-full">
                View
            </button>
        </div>

        <!-- CARD 2 -->
        <div class="bg-white p-4 shadow rounded">
            <img src="{{ asset('img/3774-Zenith-Ave-52.jpg') }}"
                 class="w-full h-48 object-cover">

            <h2 class="text-lg font-bold mt-2">
                {{ $modern }}
            </h2>

            <p class="text-gray-500">
                {{ $location }}
            </p>

            <div class="flex gap-2 mt-2 text-sm">
                <span>{{ $room }}</span>
                <span>{{ $tworoom }}</span>
                <span>{{ $number }}</span>
            </div>

            <p class="font-bold mt-2">
                {{ $total }}
            </p>

            <button class="mt-3 py-2 px-4 rounded bg-black text-white w-full">
                View
            </button>
        </div>

        <!-- You can paste your other cards here -->

    </div>

</div>

</body>
</html>

