@extends('components.sidebar')

@section('content')

<div class="p-6 max-w-2xl mx-auto">

    <div class="bg-white p-6 rounded-xl shadow">

        <h1 class="text-2xl font-bold mb-4">
            Payment #{{ $payment->id }}
        </h1>

        <p><strong>Lease:</strong> {{ $payment->lease_id }}</p>
        <p><strong>Amount:</strong> ${{ $payment->amount }}</p>
        <p><strong>Date:</strong> {{ $payment->payment_date }}</p>
        <p><strong>Method:</strong> {{ $payment->payment_method }}</p>

        <p>
            <strong>Status:</strong>
            <span class="px-2 py-1 rounded text-white
                {{ $payment->status == 'paid' ? 'bg-green-500' : 'bg-red-500' }}">
                {{ $payment->status }}
            </span>
        </p>

    </div>

</div>

@endsection