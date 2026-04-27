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
            class="bg-black hover:bg-gray-800 text-white px-5 py-2 rounded-lg shadow transition"
        >
            + Add Property
        </button>

    </div>

    <!-- FORM -->
    <div class="flex justify-center">

        <div id="propertyForm"
             class="hidden w-[420px] bg-white p-6 rounded-xl shadow-lg border">

            <h2 class="text-lg font-semibold mb-4 text-gray-700">
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

            <form action="{{ route('properties.store') }}"
                  method="POST">

                @csrf

                <input type="text"
                       name="name"
                       placeholder="Property Name"
                       class="w-full border p-2 mb-2 rounded focus:ring focus:ring-blue-200"
                       required>

                <input type="text"
                       name="address"
                       placeholder="Address"
                       class="w-full border p-2 mb-2 rounded focus:ring focus:ring-blue-200"
                       required>

                <textarea name="description"
                          placeholder="Description"
                          class="w-full border p-2 mb-2 rounded focus:ring focus:ring-blue-200"></textarea>

                <input type="number"
                       name="room"
                       placeholder="Bedrooms"
                       class="w-full border p-2 mb-2 rounded">

                <input type="number"
                       name="room2"
                       placeholder="Bathrooms"
                       class="w-full border p-2 mb-2 rounded">

                <input type="number"
                       name="size"
                       placeholder="Size (sqft)"
                       class="w-full border p-2 mb-2 rounded">

                <input type="number"
                       name="total"
                       placeholder="Price ($)"
                       class="w-full border p-2 mb-4 rounded">

                <div class="flex justify-end gap-2">

                    <button type="button"
                        onclick="toggleForm()"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">
                        Save
                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-6">

        @foreach ($properties as $property)

        <div class="bg-white rounded-xl shadow hover:shadow-xl transition overflow-hidden">

            <!-- IMAGE -->
            <div class="h-56 w-full bg-gray-200 overflow-hidden">

                @if($property->image)

                    <img src="{{ asset($property->image) }}"
                         class="w-full h-full object-cover hover:scale-105 transition duration-300">

                @else

                    <img src="{{ asset('img/3774-Zenith-Ave-52.jpg') }}"
                         class="w-full h-full object-cover">

                @endif

            </div>

            <!-- CONTENT -->
            <div class="p-4">

                <h2 class="text-lg font-bold text-gray-800">
                    {{ $property->name }}
                </h2>

                <p class="text-gray-500 text-sm">
                    {{ $property->address }}
                </p>

                <!-- DETAILS -->
                <div class="flex justify-between text-sm text-gray-600 mt-2">

                    <span>
                         {{ $property->room }} Beds
                    </span>

                    <span>
                         {{ $property->room2 }} Baths
                    </span>

                </div>

                <p class="text-sm text-gray-600">
                     {{ $property->size }} sqft
                </p>

                <p class="font-bold text-lg mt-2">
                    ${{ number_format($property->total) }}
                </p>

                <!-- BUTTON -->
                <a href="{{ route('properties.show', $property->id) }}"
                   class="block text-center mt-3 bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition">

                    View Details

                </a>

            </div>

        </div>

        @endforeach

    </div>

</div>

<script>
function toggleForm() {
    document
        .getElementById("propertyForm")
        .classList
        .toggle("hidden");
}
</script>

@endsection