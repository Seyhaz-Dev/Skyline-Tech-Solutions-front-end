@extends('components.sidebar')

@section('content')

<div class="p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold">
            Properties
        </h1>

        <!-- Add Button -->
        <button class="bg-black text-white px-4 py-2 rounded"
                onclick="addProperty()">
            + Add Property
        </button>

        <!-- Hidden form -->
    </div>

    <!-- form -->


    <div class="flex">
        <div id="addProperty" class="hidden mt-4 p-4 bg-white shadow rounded justify-center w-[400px] m-auto">
                <form action="{{ route('properties.store') }}" method="POST">
                    @csrf

                    <input type="text" name="name">
                    <input type="text" name="address">
                    <textarea name="description"></textarea>

                    <button type="submit">
                        Save
                    </button>
                </form>
        </div>
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

        @foreach ($properties as $property)

            <x-property
                modern="{{ $property->title }}"
                location="{{ $property->location }}"
                room="{{ $property->beds }} Beds"
                tworoom="{{ $property->baths }} Baths"
                number="{{ $property->size }} sqft"
                total="{{ $property->price }}"
                image="{{ $property->image }}"
            />

        @endforeach

    </div>

</div>
<script>
    function addProperty() {
        let form = document.getElementById("addProperty");

        if (form.classList.contains("hidden")) {
            form.classList.remove("hidden");
        } else {
            form.classList.add("hidden");
        }
    }
</script>

@endsection