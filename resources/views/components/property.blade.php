<div class="bg-white rounded-xl shadow overflow-hidden">

    <!-- IMAGE CONTAINER (SPACE FOR IMAGE) -->
    <div class="h-56 w-full bg-gray-200 overflow-hidden relative flex items-center justify-center">

        @if($image)
            <img src="{{ asset('img/' . $image) }}"
                 class="w-full h-full object-cover">
        @else
            <!-- EMPTY SPACE / PLACEHOLDER -->
            <span class="text-gray-500 text-sm">
                No Image Available
            </span>
        @endif

    </div>

    <!-- CONTENT -->
    <div class="p-4">

        <h2 class="text-lg font-bold">
            {{ $modern }}
        </h2>

        <p class="text-gray-500 text-sm">
            {{ $location }}
        </p>

        <div class="text-sm mt-1 text-gray-700">
            {{ $room }} • {{ $tworoom }}
        </div>

        <div class="text-sm text-gray-500">
            {{ $number }}
        </div>

        <p class="font-bold mt-2 text-lg">
            ${{ $total }}
        </p>

        <a href="/properties/{{ $id }}"
           class="inline-block mt-3 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            View Details
        </a>

    </div>

</div>