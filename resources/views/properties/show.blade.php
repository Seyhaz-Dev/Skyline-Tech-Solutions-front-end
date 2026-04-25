@extends('components.sidebar')

@section('content')

<div class="p-6">

    <!-- IMAGE (TALLER VERSION) -->
    <div class="mb-6">

        <img src="{{ asset('img/3774-Zenith-Ave-52.jpg') }}"
             class="w-full h-72 md:h-[500px] lg:h-[600px] object-cover rounded-xl shadow">

    </div>

    <!-- TITLE -->
    <h1 class="text-2xl font-bold mb-2">
        {{ $property->name }}
    </h1>

    <p class="text-gray-500 mb-4">
         {{ $property->address }}
    </p>

    <!-- DESCRIPTION -->
    <p class="mb-6 text-gray-700">
        {{ $property->description }}
    </p>

    <!-- DETAILS BOX -->
    <div class="grid grid-cols-2 gap-4 bg-white p-4 rounded-lg shadow">

        <div class="font-medium">
             Room: <span class="font-normal">{{ $property->room }}</span>
        </div>

        <div class="font-medium">
             Room 2: <span class="font-normal">{{ $property->room2 }}</span>
        </div>

        <div class="font-medium">
            Size: <span class="font-normal">{{ $property->size }} sqft</span>
        </div>

        <div class="font-medium">
             Total: <span class="font-normal">${{ $property->total }}</span>
        </div>

    </div>

    <!-- BACK BUTTON -->
    <a href="/properties"
       class="inline-block mt-6 bg-black text-white px-5 py-2 rounded hover:bg-gray-800">
        Back
    </a>

</div>

@endsection