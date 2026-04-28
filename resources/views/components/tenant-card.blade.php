  <div class="bg-white rounded shadow overflow-hidden">

        <table class="w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2">Name</th>
                    <th>Email</th>
                    <th>Property</th>
                    <th>Lease</th>
                    <th>Rent</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
            @foreach($tenants as $tenant)
                <tr class="border-t">
                    <td class="p-2">{{ $tenant->name }}</td>
                    <td>{{ $tenant->email }}</td>
                    <td>{{ $tenant->property }}</td>
                    <td>
                        {{ $tenant->lease_start }} - {{ $tenant->lease_end }}
                    </td>
                    <td>${{ $tenant->rent }}</td>
                    <td>
                        <span class="px-2 py-1 text-sm rounded
                        @if($tenant->status=='active') bg-green-100 text-green-600
                        @elseif($tenant->status=='pending') bg-yellow-100 text-yellow-600
                        @else bg-red-100 text-red-600 @endif">
                            {{ $tenant->status }}
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>