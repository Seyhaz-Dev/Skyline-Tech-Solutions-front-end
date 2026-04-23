@extends('layouts.app')

@section('content')

<div class="bg-gray-100 min-h-screen p-6">

    <h1 class="text-2xl font-bold mb-6">
        Properties
    </h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <x-properties 
            :modern="$modern"
            :location="$location"
            :room="$room"
            :tworoom="$tworoom"
            :number="$number"
            :total="$total"
            :image="$image"
        />

    </div>

</div>

@endsection