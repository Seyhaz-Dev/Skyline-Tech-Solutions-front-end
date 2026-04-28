        <!DOCTYPE html>
        <html lang="en">
        <head>  
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tenant Management | Dashboard</title>

            <meta name="csrf-token" content="{{ csrf_token() }}">
            
            <!-- Tailwind CSS v4 via CDN + extra utilities -->
            <script src="https://cdn.tailwindcss.com"></script>
            
            <!-- Custom config to match design system -->
            <script>
                tailwind.config = {
                    theme: {
                        extend: {
                            colors: {
                                primary: '#b87c4f',
                                // background: '#fffff0',
                                secondary: '#ffffff',
                                
                                'card-bg': '#fefcf9',
                            }
                        }
                    }
                }
            </script>
            
            <!-- Font Awesome 6 (free icons) -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            
            <style>
                /* smooth transitions & custom scroll */
                    body {
                background: #ffffff !important;
            }
                .sidebar-transition {
                    transition: all 0.2s ease;
                }
                .table-row-hover:hover {
                    background-color: #faf9f5;
                    transition: 0.15s;
                }
                /* custom modal backdrop */
                #modalOverlay {
                    transition: opacity 0.2s ease;
                }
                /* status badge polish */
                .status-badge {
                    transition: all 0.1s;
                }
            </style>
        </head>

        @extends('components.sidebar')
        @extends('components.header')


        @section('content')
            
            <div class="flex">
                <!-- Main Content Area -->
                <div class="flex-1 flex flex-col bg-white  ">
                    
                    <!-- main tenant content -->
                    <div class="flex-1 mt-20 ">
                        <!-- Dark Header Section with stats -->
                        <div class="bg-gray-200 px-8 pt-8 pb-6 border-b border-gray-300 rounded-b-2xl mx-4 mt-4 shadow-sm">
                            <div class="flex justify-between items-start mb-6">
                                <div>
                                    <h2 class="text-3xl font-bold text-black tracking-tight">Tenants</h2>
                                    <p class="text-gray-600 text-sm mt-1">Manage all rental home tenants in one place.</p>
                                </div>
                                <button onclick="toggleModal('addModal', true)"
                                    class="bg-white hover:bg-gray-100 text-gray-900 px-5 py-2.5 rounded-xl font-semibold text-sm transition-all flex items-center gap-2 shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add Tenant
                                </button>
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <div class="bg-gray-200 border border-gray-400 rounded-2xl p-5">
                                    <p class="text-gray-800 text-xs font-semibold uppercase tracking-widest mb-2">Total Tenants</p>
                                    <p class="text-gray-800 text-3xl font-bold" id="statTotal">24</p>
                                </div>
                                <div class="bg-gray-200 border border-gray-400 rounded-2xl p-5">
                                    <p class="text-gray-800 text-xs font-semibold uppercase tracking-widest mb-2">Active</p>
                                    <p class="text-green-600 text-3xl font-bold" id="statActive">18</p>
                                </div>
                                <div class="bg-gray-200 border border-gray-400 rounded-2xl p-5">
                                    <p class="text-gray-800 text-xs font-semibold uppercase tracking-widest mb-2">Pending</p>
                                    <p class="text-yellow-600 text-3xl font-bold" id="statPending">4</p>
                                </div>
                                <div class="bg-gray-200 border border-gray-400 rounded-2xl p-5">
                                    <p class="text-gray-800 text-xs font-semibold uppercase tracking-widest mb-2">Monthly Revenue</p>
                                    <p class="text-primary text-3xl font-bold" id="statRevenue">$12,450</p>
                                </div>
                            </div>
                        </div>

                        <!-- Content Section: search & table -->
                        <div class="px-8 py-6 min-h-screen">
                            <div class="flex flex-wrap gap-3 mb-6">
                                <div class="relative flex-1 min-w-[200px]">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <select id="statusFilter" onchange="filterStatus(this.value)"
                                    class="border border-gray-200 bg-white px-4 py-2.5 rounded-xl text-sm text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-primary/30">
                                    <option value="">All Statuses</option>
                                    <option value="active">Active</option>
                                    <option value="pending">Pending</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <button onclick="applyFilters()" class="bg-[#1e1e1e] text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm hover:bg-black transition-all">
                                    <i class="fas fa-filter mr-1"></i> Filter
                                </button>
                            </div>

                            <!-- Tenants Table -->
                            <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-100">
                                <table class="w-full text-left border-collapse">
                                    <thead class="border-b border-gray-100 bg-gray-50">
                                        <tr>
                                            <th class="px-5 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tenant</th>
                                            <th class="px-5 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Property / Unit</th>
                                            <th class="px-5 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Lease Period</th>
                                            <th class="px-5 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Rent</th>
                                            <th class="px-5 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                            <th class="px-5 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
@foreach($tenants as $tenant)
<tr class="hover:bg-gray-50">

    <!-- Tenant -->
    <td class="px-5 py-4">
        <div class="font-semibold text-gray-800">{{ $tenant->name }}</div>
        <div class="text-sm text-gray-500">{{ $tenant->email }}</div>
    </td>

    <!-- Property -->
    <td class="px-5 py-4 text-gray-700">
        {{ $tenant->property }}
    </td>

    <!-- Lease -->
    <td class="px-5 py-4 text-sm text-gray-600">
        {{ $tenant->lease_start }} <br>
        <span class="text-gray-400">to</span> {{ $tenant->lease_end }}
    </td>

    <!-- Rent -->
    <td class="px-5 py-4 font-semibold text-gray-800">
        ${{ $tenant->rent }}
    </td>

    <!-- Status -->
    <td class="px-5 py-4">
        <span class="px-3 py-1 rounded-full text-xs font-semibold
            @if($tenant->status == 'active') bg-green-100 text-green-600
            @elseif($tenant->status == 'pending') bg-yellow-100 text-yellow-600
            @else bg-red-100 text-red-600 @endif">
            {{ ucfirst($tenant->status) }}
        </span>
    </td>

    <!-- Actions -->
    <td class="px-5 py-4 text-right">
        <button class="text-blue-500 text-sm">Edit</button>
    </td>

</tr>
@endforeach
</tbody>
                                </table>
                                <!-- Pagination Simple -->
                                <div class="px-5 py-4 border-t border-gray-200 bg-gray-50 rounded-b-2xl flex items-center justify-between">
                                    <div class="text-sm text-gray-500" id="paginationInfo">Showing 1-5 of 12 tenants</div>
                                    <div class="flex gap-1">
                                        <button id="prevPageBtn" class="px-3 py-1.5 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 text-sm disabled:opacity-40">Previous</button>
                                        <button id="nextPageBtn" class="px-3 py-1.5 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 text-sm disabled:opacity-40">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODALS OVERLAY (Add + Edit) -->
            
            <div id="modalOverlay" class="hidden fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-50 flex items-center justify-center p-4">
                <!-- Add Modal -->
                <div id="addModal" class="hidden bg-white w-full max-w-md rounded-2xl shadow-2xl transform transition-all">
                    <div class="flex items-center justify-between p-6 border-b">
                        <h3 class="text-xl font-bold text-gray-800">New Tenant</h3>
                        <button onclick="toggleModal('addModal', false)" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <div class="p-6 space-y-4">
                        @foreach($tenants as $tenant)
                        <p>{{ $tenant->name }}</p>
                        @endforeach
                        {{ $tenants->links() }}
                        
                        <!-- ADD FORM -->
    <form method="POST" action="{{ route('tenants.store') }}" class="bg-white p-4 rounded shadow mb-6">
        @csrf

        <div class="grid grid-cols-2 gap-4">

            <input name="name" placeholder="Name" class="border p-2 rounded">
            <input name="email" placeholder="Email" class="border p-2 rounded">

            <input name="phone" placeholder="Phone" class="border p-2 rounded">
            <input name="property" placeholder="Property" class="border p-2 rounded">

            <input type="date" name="lease_start" class="border p-2 rounded">
            <input type="date" name="lease_end" class="border p-2 rounded">

            <input type="number" name="rent" placeholder="Rent" class="border p-2 rounded">

            <select name="status" class="border p-2 rounded">
                <option value="active">Active</option>
                <option value="pending">Pending</option>
                <option value="inactive">Inactive</option>
            </select>

        </div>

        <button class="mt-4 bg-black text-white px-4 py-2 rounded">
            Save Tenant
        </button>
    </form>

    <!-- TABLE -->
  

    <!-- PAGINATION -->
    <div class="mt-4">
        {{ $tenants->links() }}
    </div>

            </div>

            <script>
                

                    
                
                function toggleModal(modalId, show) { 
                    const overlay = document.getElementById('modalOverlay'); 
                    const modal = document.getElementById(modalId); 
                    if(show){ 
                        overlay.classList.remove('hidden'); 
                        modal.classList.remove('hidden'); 
                    } else { 
                        overlay.classList.add('hidden'); 
                        const addModal = document.getElementById('addModal');
                        const editModal = document.getElementById('editModal');
                        if(addModal) addModal.classList.add('hidden'); 
                        if(editModal) editModal.classList.add('hidden'); 
                    } 
                }
                
                    </script>
        @endsection
        </html>