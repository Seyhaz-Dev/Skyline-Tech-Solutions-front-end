@extends('components.sidebar')

@section('content')

<div class="p-6 max-w-4xl mx-auto">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Create Payment
        </h1>

        <p class="text-gray-500 text-sm">
            Record a new payment for a tenant lease.
        </p>
    </div>

    <!-- FORM CARD -->
    <form action="{{ route('payments.store') }}"
<<<<<<< HEAD
          method="POST"
          class="bg-white p-8 rounded-2xl shadow-lg space-y-6">
=======
        method="POST"
        class="bg-white p-8 rounded-2xl shadow-lg space-y-6">
>>>>>>> feat/dashboard

        @csrf

        <!-- GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Lease -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Select Lease
                </label>

                <select name=""
<<<<<<< HEAD
                        class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-black">

                    <option value="">-- Choose Lease --</option>

                    @foreach($leases as $lease)
                        <option value="{{ $lease->id }}">
                            Lease #{{ $lease->id }}
                        </option>
=======
                    class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-black">

                    <option value="">-- Choose Lease --</option>

                    <option value="6_months">6 Months</option>
                    <option value="1_year">1 Year</option>
                    <option value="2_years">2 Years</option>
                    <option value="3_years">3 Years</option>

                    <option value="monthly">Monthly</option>
                    <option value="weekly">Weekly</option>

                    <option value="flexible">Flexible</option>


                    @foreach($leases as $lease)
                    <option value="{{ $lease->id }}">
                        Lease #{{ $lease->id }}
                    </option>
>>>>>>> feat/dashboard
                    @endforeach

                </select>

                @error('lease_id')
<<<<<<< HEAD
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
=======
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
>>>>>>> feat/dashboard
                @enderror
            </div>

            <!-- Amount -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Amount ($)
                </label>

                <input type="number"
<<<<<<< HEAD
                       name="amount"
                       step="0.01"
                       placeholder="Enter payment amount"
                       value="{{ old('amount') }}"
                       class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-black">

                @error('amount')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
=======
                    name="amount"
                    step="0.01"
                    placeholder="Enter payment amount"
                    value="{{ old('amount') }}"
                    class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-black">

                @error('amount')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
>>>>>>> feat/dashboard
                @enderror
            </div>

            <!-- Payment Date -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Payment Date
                </label>

                <input type="date"
<<<<<<< HEAD
                       name="payment_date"
                       value="{{ old('payment_date') }}"
                       class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-black">

                @error('payment_date')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
=======
                    name="payment_date"
                    value="{{ old('payment_date') }}"
                    class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-black">

                @error('payment_date')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
>>>>>>> feat/dashboard
                @enderror
            </div>

            <!-- Payment Method -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Payment Method
                </label>

                <select name="payment_method"
<<<<<<< HEAD
                        class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-black">
=======
                    class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-black">
>>>>>>> feat/dashboard

                    <option value="">-- Select Method --</option>
                    <option value="cash">Cash</option>
                    <option value="bank">Bank Transfer</option>
                    <option value="card">Credit Card</option>
                    <option value="mobile">Mobile Payment</option>

                </select>

                @error('payment_method')
<<<<<<< HEAD
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
=======
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
>>>>>>> feat/dashboard
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Payment Status
                </label>

                <select name="status"
<<<<<<< HEAD
                        class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-black">
=======
                    class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-black">
>>>>>>> feat/dashboard

                    <option value="paid">Paid</option>
                    <option value="pending">Pending</option>
                    <option value="failed">Failed</option>

                </select>

                @error('status')
<<<<<<< HEAD
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
=======
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
>>>>>>> feat/dashboard
                @enderror
            </div>

        </div>

        <!-- BUTTONS -->
        <div class="flex justify-end gap-3 pt-4 border-t">

            <a href="{{ route('payments.index') }}"
<<<<<<< HEAD
               class="px-5 py-2 rounded-lg border hover:bg-gray-100">
=======
                class="px-5 py-2 rounded-lg border hover:bg-gray-100">
>>>>>>> feat/dashboard
                Cancel
            </a>

            <button type="submit"
<<<<<<< HEAD
                    class="bg-black hover:bg-gray-800 text-white px-6 py-2 rounded-lg shadow">
=======
                class="bg-black hover:bg-gray-800 text-white px-6 py-2 rounded-lg shadow">
>>>>>>> feat/dashboard
                Save Payment
            </button>

        </div>

    </form>

</div>

@endsection