 @extends('components.sidebar')

@section('content')

<div class="p-6 max-w-2xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">Create Payment</h1>

    <form action="{{ route('payments.store') }}" method="POST"
          class="bg-white p-6 rounded-xl shadow space-y-4">

        @csrf

        
        <div>
            <label class="text-sm">Lease</label>
            <select name="lease_id" class="w-full border p-2 rounded">
                @foreach($leases as $lease)
                    <option value="{{ $lease->id }}">
                        Lease #{{ $lease->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Amount -->
        <input type="number" name="amount" placeholder="Amount"
               class="w-full border p-2 rounded">

        <!-- Date -->
        <input type="date" name="payment_date"
               class="w-full border p-2 rounded">

        <!-- Method -->
        <input type="text" name="payment_method" placeholder="Payment Method"
               class="w-full border p-2 rounded">

        <!-- Status -->
        <select name="status" class="w-full border p-2 rounded">
            <option value="paid">Paid</option>
            <option value="pending">Pending</option>
            <option value="failed">Failed</option>
        </select>

        <button class="bg-black text-white px-4 py-2 rounded w-full">
            Save Payment
        </button>

    </form>

</div>

@endsection