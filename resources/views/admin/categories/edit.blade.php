@extends('admin.admin')

@section('content')
<div class="space-y-6 p-4 lg:p-8">
    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-black text-black tracking-tight italic uppercase bg-white inline-block px-4 py-1 rounded-lg shadow-sm">
                Edit Category
            </h1>
            <p class="text-zinc-500 text-sm mt-2 flex items-center gap-2 uppercase tracking-tighter font-bold">
                <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                Standard: 3:4 Portrait Scale
            </p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="text-zinc-500 hover:text-black transition-colors text-xs font-black tracking-widest uppercase">← Back</a>
    </div>

    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data" id="categoryForm">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- KOLOM KIRI: Form Teks --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-8 rounded-[2.5rem] border border-zinc-200 space-y-6 shadow-xl">
                    <div>
                        <label class="block text-[10px] font-black text-zinc-400 uppercase tracking-[0.3em] mb-3">Category Name</label>
                        <input type="text" name="name" value="{{ old('name', $category->name) }}" 
                               class="w-full bg-zinc-100 border border-zinc-200 rounded-2xl px-5 py-4 text-black font-bold focus:bg-white focus:border-black outline-none transition-all uppercase" 
                               required>
                    </div>
                    
                    <div>
                        <label class="block text-[10px] font-black text-zinc-400 uppercase tracking-[0.3em] mb-3">Description</label>
                        <textarea name="description" rows="6" 
                                  class="w-full bg-zinc-50 border border-zinc-200 rounded-2xl px-5 py-4 text-zinc-600 focus:text-black focus:bg-white focus:border-black outline-none transition-all font-medium">{{ old('description', $category->description) }}</textarea>
                    </div>
                </div>
                
                <button type="submit" id="submitBtn"
                        class="relative overflow-hidden bg-black hover:bg-zinc-800 text-white px-12 py-5 rounded-[2rem] font-black uppercase tracking-[0.2em] text-xs transition-all duration-500 w-full sm:w-auto shadow-xl group">
                    <span id="btnText" class="relative z-10">Save Changes</span>
                    <div id="btnBg" class="absolute inset-0 bg-emerald-600 translate-y-full transition-transform duration-500"></div>
                </button>
            </div>

            {{-- KOLOM KANAN: Ikon JPG Selalu Terlihat --}}
            <div class="lg:col-span-1">
                <div class="bg-white p-8 rounded-[2.5rem] border border-zinc-200 h-full flex flex-col items-center shadow-sm">
                    <label class="block text-[10px] font-black text-zinc-400 uppercase tracking-[0.3em] mb-6">Visual Identity</label>
                    
                    <div class="relative w-full aspect-[3/4] group">
                        {{-- Input File (Transparan di paling atas) --}}
                        <input type="file" id="file-input" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-40" onchange="previewImage(this)" accept="image/*">

                        <div class="absolute inset-0 bg-zinc-100 rounded-[2.5rem] border-2 border-dashed border-zinc-200 group-hover:border-black transition-all flex flex-col items-center justify-center overflow-hidden">
                            
                            {{-- Foto Pratinjau --}}
                            <img id="image-preview" 
                                 src="{{ $category->image ? asset('storage/' . $category->image) : '' }}" 
                                 class="absolute inset-0 w-full h-full object-cover {{ $category->image ? '' : 'hidden' }}">
                            
                            {{-- Overlay Gelap Permanen (Tipis saja agar kontras) --}}
                            <div class="absolute inset-0 bg-black/20 z-10"></div>

                            {{-- IKON JPG: SELALU MUNCUL (Tidak Sembunyi) --}}
                            <div id="icon-layer" class="relative z-20 flex flex-col items-center pointer-events-none">
                                <div class="w-20 h-20 bg-white/80 backdrop-blur-md rounded-3xl flex flex-col items-center justify-center shadow-2xl border border-white/50 group-hover:scale-110 transition-transform duration-500">
                                    <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-[9px] font-black text-black mt-1 tracking-tighter uppercase">JPG</span>
                                </div>
                                <div class="mt-4 px-4 py-2 bg-black rounded-full shadow-lg">
                                    <p class="text-white text-[8px] font-black uppercase tracking-[0.2em] whitespace-nowrap">Click to Change</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 text-center">
                        <p class="text-[9px] text-zinc-400 font-black uppercase tracking-[0.2em] leading-relaxed">
                            <span class="text-black italic uppercase">Klik ikon di atas</span><br>
                            untuk memilih ulang foto
                        </p>
                    </div>

                    <div class="mt-4">
                        <label class="flex items-center justify-center">
                            <input type="checkbox" name="remove_image" id="remove_image" class="mr-2 w-4 h-4 text-black bg-zinc-100 border-zinc-300 rounded focus:ring-black focus:ring-2">
                            <span class="text-[9px] text-zinc-400 font-black uppercase tracking-[0.2em]">Remove current image</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const removeCheckbox = document.getElementById('remove_image');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
        // Uncheck remove checkbox when a new file is selected
        removeCheckbox.checked = false;
    }
}
</script>
@endsection