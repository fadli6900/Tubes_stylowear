@extends('admin.admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">

    <div>
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
            <a href="{{ url('/admin/dashboard') }}" class="hover:text-red-600 transition-colors">Dashboard</a>
            <span>/</span>
            <a href="{{ route('admin.products.index') }}" class="hover:text-red-600 transition-colors">Produk</a>
            <span>/</span>
            <span class="text-gray-900">Edit</span>
        </div>
        <h1 class="text-2xl font-semibold text-gray-900">Edit Produk</h1>
        <p class="text-gray-600 text-sm mt-1">Perbarui informasi produk</p>
    </div>

    {{-- Error --}}
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-800 p-4 rounded-lg">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('admin.products.update', $product) }}"
        enctype="multipart/form-data"
        class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 space-y-6"
    >
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Produk</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200"
                placeholder="Masukkan nama produk"
                required>
        </div>

        {{-- Deskripsi --}}
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
            <textarea id="description" name="description" rows="4"
                class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 resize-none"
                placeholder="Jelaskan produk Anda">{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- Harga --}}
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}"
                class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200"
                placeholder="Masukkan harga dalam Rupiah"
                min="0"
                step="1000"
                required>
        </div>

        {{-- Stok --}}
        <div>
            <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">Stok</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200"
                placeholder="Masukkan jumlah stok"
                min="0"
                required>
        </div>

        {{-- Kategori --}}
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
            <select id="category_id" name="category_id"
                class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200"
                required>
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Gambar --}}
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Gambar Produk</label>
            @if($product->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg border border-gray-200">
                </div>
            @endif
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition duration-200">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-red-600 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500">
                            <span>Unggah file baru</span>
                            <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                        </label>
                        <p class="pl-1">atau seret dan jatuhkan</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 10MB</p>
                </div>
            </div>
        </div>

        {{-- Button --}}
        <div class="flex justify-end gap-4 pt-6 border-t border-gray-100">
            <a href="{{ route('admin.products.index') }}"
               class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition duration-200">
                Batal
            </a>
            <button type="submit"
                class="px-6 py-2.5 rounded-lg bg-red-600 text-white font-medium hover:bg-red-700 transition duration-200 shadow-sm">
                Perbarui Produk
            </button>
        </div>
    </form>
</div>
@endsection
