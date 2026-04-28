@extends('components.sidebar')
@extends('components.header')

@section('content')

<div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

    <!-- HEADER SECTION -->
    <div class="mb-8">
        <div class="flex justify-between items-center mt-14">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Leases Management</h1>
                <p class="text-gray-500 mt-1">Manage all property lease agreements</p>
            </div>
            
            <button onclick="toggleForm()" 
                class="bg-gradient-to-r from-gray-800 to-gray-900 hover:from-gray-900 hover:to-black text-white px-6 py-2.5 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New Lease
            </button>
        </div>
    </div>

    <!-- FORM MODAL (Improved) -->
    <div id="leaseForm" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4" onclick="if(event.target===this) toggleForm()">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md transform transition-all duration-300 scale-100">
            <div class="flex justify-between items-center p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Create New Lease</h2>
                <button onclick="toggleForm()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form method="POST" action="{{ route('leases.store') }}" class="p-6">
                @csrf

                <!-- Tenant Select -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tenant</label>
                    <select name="tenant_id" required class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all">
                        <option value="">-- Select Tenant --</option>
                        @foreach($tenants as $tenant)
                            <option value="{{ $tenant->id }}">
                                {{ $tenant->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Property Select -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Property</label>
                    <select name="property_id" required class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all">
                        <option value="">-- Select Property --</option>
<option value="1">Sunrise Apartment</option>
<option value="2">Golden Tower</option>
<option value="3">City View Condo</option>
<option value="4">Green Villa</option>
<option value="5">Skyline Residence</option>
                        @foreach($properties as $property)
                            <option value="{{ $property->id }}">
                                {{ $property->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Date Range -->
                <div class="grid grid-cols-2 gap-3 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                        <input type="date" name="start_date" required class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                        <input type="date" name="end_date" required class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Rent Amount -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rent Amount</label>
                    <div class="relative">
                        <span class="absolute left-3 top-2.5 text-gray-500">$</span>
                        <input type="number" name="rent" placeholder="0.00" required class="w-full border border-gray-300 rounded-lg p-2.5 pl-7 focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                        <option value="active">Active</option>
                        <option value="pending">Pending</option>
                        <option value="expired">Expired</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-gray-800 to-gray-900 hover:from-gray-900 hover:to-black text-white py-2.5 rounded-lg font-medium shadow-md hover:shadow-lg transition-all duration-300">
                    Save Lease Agreement
                </button>
            </form>
        </div>
    </div>

    <!-- STATS SUMMARY -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Leases</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $leases->count() }}</p>
                </div>
                <div class="bg-blue-100 rounded-full p-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Active Leases</p>
                    <p class="text-2xl font-bold text-green-600">{{ $leases->where('status', 'active')->count() }}</p>
                </div>
                <div class="bg-green-100 rounded-full p-2">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Pending</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $leases->where('status', 'pending')->count() }}</p>
                </div>
                <div class="bg-yellow-100 rounded-full p-2">
                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Expired</p>
                    <p class="text-2xl font-bold text-red-600">{{ $leases->where('status', 'expired')->count() }}</p>
                </div>
                <div class="bg-red-100 rounded-full p-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- LEASES TABLE -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">All Lease Agreements</h2>
                    <p class="text-sm text-gray-500 mt-1">List of all property lease contracts</p>
                </div>
                <div class="relative">
                    <input type="text" placeholder="Search leases..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                    <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="text-left">
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Tenant</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Property</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">End Date</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Rent</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($leases as $lease)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center text-white text-sm font-medium">
                                    {{ strtoupper(substr($lease->tenant->name ?? 'N', 0, 1)) }}
                                </div>
                                <div class="ml-3">
                                    <span class="text-sm font-medium text-gray-900">{{ $lease->tenant->name ?? '-' }}</span>
                                    <p class="text-xs text-gray-500">{{ $lease->tenant->email ?? 'No email' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span class="text-sm text-gray-900">{{ $lease->property->name ?? '-' }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($lease->start_date)->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($lease->end_date)->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm font-semibold text-gray-900">${{ number_format($lease->rent, 2) }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($lease->status == 'active')
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700 font-medium flex items-center w-fit">
                                    <span class="w-1.5 h-1.5 bg-green-600 rounded-full mr-1.5"></span>
                                    Active
                                </span>
                            @elseif($lease->status == 'pending')
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700 font-medium flex items-center w-fit">
                                    <span class="w-1.5 h-1.5 bg-yellow-600 rounded-full mr-1.5"></span>
                                    Pending
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700 font-medium flex items-center w-fit">
                                    <span class="w-1.5 h-1.5 bg-red-600 rounded-full mr-1.5"></span>
                                    Expired
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <button class="text-blue-600 hover:text-blue-800 font-medium mr-3 transition-colors">Edit</button>
                            <button class="text-red-600 hover:text-red-800 font-medium transition-colors">Delete</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p>No leases found</p>
                            <button onclick="toggleForm()" class="mt-3 text-blue-600 hover:text-blue-700 font-medium">Create your first lease →</button>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if(method_exists($leases, 'links'))
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                {{ $leases->links() }}
            </div>
        @endif
    </div>

</div>

<script>
function toggleForm() {
    const form = document.getElementById('leaseForm');
    form.classList.toggle('hidden');
    
    // Add animation effect
    if (!form.classList.contains('hidden')) {
        form.style.opacity = '0';
        setTimeout(() => {
            form.style.opacity = '1';
        }, 10);
    }
}

// Close modal on escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const form = document.getElementById('leaseForm');
        if (!form.classList.contains('hidden')) {
            toggleForm();
        }
    }
});
</script>

<style>
/* Smooth modal transitions */
#leaseForm {
    transition: opacity 0.3s ease;
}
</style>

@endsection