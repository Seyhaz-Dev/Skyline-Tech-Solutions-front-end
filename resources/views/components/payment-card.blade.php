<div class="bg-white rounded-xl shadow p-4">

    <h2 class="font-bold text-lg">
        Payment #{{ $payment->id }}
    </h2>

    <p class="text-gray-500">
        Lease: {{ $payment->lease_id }}
    </p>

    <p class="text-gray-700">
        Amount: ${{ $payment->amount }}
    </p>

    <p class="text-sm mt-2">
        Method: {{ $payment->payment_method }}
    </p>

    <p class="mt-2">
        <span class="px-2 py-1 text-white text-xs rounded
            {{ $payment->status == 'paid' ? 'bg-green-500' : 'bg-yellow-500' }}">
            {{ $payment->status }}
        </span>
    </p>

    <a href="{{ route('payments.show', $payment->id) }}"
       class="text-blue-500 text-sm mt-3 inline-block">
        View Details
    </a>

</div>