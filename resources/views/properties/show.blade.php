@extends('components.sidebar')

@section('content')

<div class="p-8 max-w-7xl mx-auto">
    <H1 class="text-[50px]">Details</H1>
    <!-- BIG IMAGE -->
    <div class="mb-8">

        <img src="{{ asset('img/3774-Zenith-Ave-52.jpg') }}"
             class="w-full h-[350px] md:h-[500px] lg:h-[650px] object-cover rounded-2xl shadow-xl">

    </div>

    <!-- TITLE -->
    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">
        {{ $property->name }}
    </h1>

    <!-- ADDRESS -->
    <p class="text-lg text-gray-500 mb-8">
        {{ $property->address }}
    </p>

    <!-- BIG INFORMATION BOX -->
    <div class="bg-white p-8 rounded-2xl shadow-lg mb-8">

        <h2 class="text-2xl font-semibold mb-4">
            About This Property
        </h2>

        <p class="text-lg text-gray-700 leading-relaxed">
            {{ $property->description }}
        </p>

    </div>

    <!-- BIG DETAILS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        <!-- ROOM -->
        <div class="bg-white p-6 rounded-2xl shadow text-center">
            <p class="text-gray-500 text-lg mb-2">
                Room
            </p>
            <p class="text-3xl font-bold">
                {{ $property->room }}
            </p>
        </div>

        <!-- ROOM 2 -->
        <div class="bg-white p-6 rounded-2xl shadow text-center">
            <p class="text-gray-500 text-lg mb-2">
                Room 2
            </p>
            <p class="text-3xl font-bold">
                {{ $property->room2 }}
            </p>
        </div>

        <!-- SIZE -->
        <div class="bg-white p-6 rounded-2xl shadow text-center">
            <p class="text-gray-500 text-lg mb-2">
                Size
            </p>
            <p class="text-3xl font-bold">
                {{ $property->size }} sqft
            </p>
        </div>

        <!-- TOTAL -->
        <div class="bg-black text-white p-6 rounded-2xl shadow text-center">
            <p class="text-lg mb-2">
                Total Price
            </p>
            <p class="text-3xl font-bold">
                ${{ number_format($property->total) }}
            </p>
        </div>

    </div>

    <!-- BACK BUTTON -->
    <a href="/properties"
       class="inline-block bg-black hover:bg-gray-800 text-white px-8 py-3 rounded-xl text-lg transition">
        Back to Properties
    </a>

</div>

@endsection