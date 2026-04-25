@extends('components.sidebar')

@section('content')

<div class="p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Properties
        </h1>

        <button
            onclick="toggleForm()"
            class="bg-black hover:bg-gray-800 text-white px-4 py-2 rounded-lg shadow transition"
        >
            + Add Property
        </button>

    </div>

    <!-- FORM -->
    <div class="flex justify-center">

        <div id="propertyForm"
             class="hidden w-[420px] bg-white p-6 rounded-xl shadow-lg">

            <h2 class="text-lg font-semibold mb-4">
                Add New Property
            </h2>

            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('properties.store') }}" method="POST">
                @csrf

                <input type="text" name="name" placeholder="Property Name"
                    class="w-full border p-2 mb-2 rounded" required>

                <input type="text" name="address" placeholder="Address"
                    class="w-full border p-2 mb-2 rounded" required>

                <textarea name="description" placeholder="Description"
                    class="w-full border p-2 mb-2 rounded"></textarea>

                <input type="number" name="room" placeholder="Bedrooms"
                    class="w-full border p-2 mb-2 rounded">

                <input type="number" name="room2" placeholder="Bathrooms"
                    class="w-full border p-2 mb-2 rounded">

                <input type="number" name="size" placeholder="Size"
                    class="w-full border p-2 mb-2 rounded">

                <input type="number" name="total" placeholder="Price"
                    class="w-full border p-2 mb-4 rounded">

                <div class="flex justify-end gap-2">

                    <button type="button"
                        onclick="toggleForm()"
                        class="px-4 py-2 bg-gray-300 rounded">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-black text-white rounded">
                        Save
                    </button>

                </div>
            </form>

        </div>
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-6">

        @foreach ($properties as $property)

            <div class="bg-white rounded-lg shadow p-4">

                <h2 class="text-lg font-bold">
                    {{ $property->name }}
                </h2>

                <p class="text-gray-500">
                    {{ $property->address }}
                </p>

                <p class="text-sm mt-2">
                    {{ $property->room }} Beds • {{ $property->room2 }} Baths
                </p>

                <p class="text-sm">
                    {{ $property->size }} sqft
                </p>

                <p class="font-bold mt-2">
                    ${{ $property->total }}
                </p>

                <!-- DETAIL BUTTON -->
                <a href="/properties/{{ $property->id }}"
                   class="inline-block mt-3 bg-blue-500 text-white px-3 py-1 rounded">
                    View Details
                </a>

            </div>

        @endforeach

    </div>

</div>

<script>
function toggleForm() {
    document.getElementById("propertyForm").classList.toggle("hidden");
}
</script>

@endsection