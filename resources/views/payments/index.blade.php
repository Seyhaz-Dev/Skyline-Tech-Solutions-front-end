@extends('components.sidebar')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Payments</h1>

        <a href="{{ route('payments.create') }}"
           class="bg-black text-white px-4 py-2 rounded-lg">
            + Add Payment
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

        @foreach($payments as $payment)
            <x-payment-card :payment="$payment" />
            <x-payment :payment="$payment"/>
        @endforeach

    </div>

</div>

@endsection