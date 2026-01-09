<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Keranjang Belanja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(count($cart) > 0)
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-200">Produk</th>
                                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-200">Harga</th>
                                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-200">Jumlah</th>
                                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-200">Subtotal</th>
                                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-200">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $id => $details)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-6 border-b border-gray-200">{{ $details['name'] }}</td>
                                    <td class="py-4 px-6 border-b border-gray-200">Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                                    <td class="py-4 px-6 border-b border-gray-200">{{ $details['quantity'] }}</td>
                                    <td class="py-4 px-6 border-b border-gray-200">Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                                    <td class="py-4 px-6 border-b border-gray-200">
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-bold">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-6 flex justify-between items-center">
                        <h3 class="text-xl font-bold">Total: Rp {{ number_format($total, 0, ',', '.') }}</h3>
                        <a href="{{ route('checkout.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Lanjut ke Pembayaran
                        </a>
                    </div>
                @else
                    <p class="text-gray-500 text-center py-10">Keranjang belanja Anda kosong.</p>
                    <a href="{{ url('/') }}" class="block text-center text-red-600 hover:underline">Mulai Belanja</a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>