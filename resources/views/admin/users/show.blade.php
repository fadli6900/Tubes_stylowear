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
                    <div class="mt-6">
                        <a href="{{ route('admin.users.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
