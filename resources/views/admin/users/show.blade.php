<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">User Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <strong>Name:</strong> {{ $user->name }}
                        </div>
                        <div>
                            <strong>Email:</strong> {{ $user->email }}
                        </div>
                        <div>
                            <strong>Phone:</strong> {{ $user->phone ?? '-' }}
                        </div>
                        <div>
                            <strong>Address:</strong> {{ $user->address ?? '-' }}
                        </div>
                        <div>
                            <strong>City:</strong> {{ $user->city ?? '-' }}
                        </div>
                        <div>
                            <strong>Postal Code:</strong> {{ $user->postal_code ?? '-' }}
                        </div>
                        <div>
                            <strong>Country:</strong> {{ $user->country ?? '-' }}
                        </div>
                        <div>
                            <strong>Role:</strong> {{ $user->role ?? 'user' }}
                        </div>
                        <div>
                            <strong>Joined:</strong> {{ $user->created_at->format('d M Y') }}
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="text-lg font-medium mb-4">Opsi Pesanan</h4>
                        @if($orders->isEmpty())
                            <p class="text-gray-500">No orders found for this user.</p>
                        @else
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($orders as $order)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $order->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->created_at->format('d M Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                                                @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                                @elseif($order->status == 'shipped') bg-indigo-100 text-indigo-800
                                                @elseif($order->status == 'delivered' || $order->status == 'completed') bg-green-100 text-green-800
                                                @else bg-red-100 text-red-800 @endif">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('admin.orders.show', $order) }}" class="text-indigo-600 hover:text-indigo-900">View Details</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('admin.users.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
