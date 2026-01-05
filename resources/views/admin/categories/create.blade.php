@extends('admin.admin')

@section('content')
<div class="space-y-6 p-4 lg:p-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-white tracking-tight italic uppercase">Create Category</h1>
            <p class="text-zinc-500 text-sm mt-1 flex items-center gap-2 uppercase tracking-tighter">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Standard: Max 2MB • 3:4 eCommerce Ratio
            </p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="text-zinc-500 hover:text-white transition-colors text-xs font-black tracking-widest uppercase">← Back</a>
    </div>

    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" id="categoryForm">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- LEFT COLUMN: Inputs --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-zinc-900/50 backdrop-blur-md p-8 rounded-[2.5rem] border border-white/10 space-y-6 shadow-2xl">
                    <div>
                        <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em] mb-3">Category Name</label>
                        {{-- Nama Kategori menggunakan text-black saat pengisian --}}
                        <input type="text" name="name" 
                               class="w-full bg-zinc-200 border border-white/10 rounded-2xl px-5 py-4 text-black font-bold focus:bg-white focus:border-emerald-500 outline-none transition-all placeholder:text-zinc-500 uppercase" 
                               placeholder="ENTER CATEGORY NAME..." required>
                    </div>
                    
                    <div>
                        <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em] mb-3">Description</label>
                        <textarea name="description" rows="6" 
                                  class="w-full bg-black/40 border border-white/10 rounded-2xl px-5 py-4 text-zinc-400 focus:text-white focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 outline-none transition-all placeholder:text-zinc-800 leading-relaxed font-medium" 
                                  placeholder="Type the category details here..."></textarea>
                    </div>
                </div>
                
                {{-- Submit Button --}}
                <button type="submit" id="submitBtn"
                        class="relative overflow-hidden bg-white hover:bg-zinc-200 text-black px-12 py-5 rounded-[2rem] font-black uppercase tracking-[0.2em] text-xs transition-all duration-500 w-full sm:w-auto shadow-xl active:scale-95 group">
                    <span id="btnText" class="relative z-10">Create Category</span>
                    <div id="btnBg" class="absolute inset-0 bg-emerald-500 translate-y-full transition-transform duration-500"></div>
                </button>
            </div>

            {{-- RIGHT COLUMN: Image Upload --}}
            <div class="lg:col-span-1">
                <div class="bg-zinc-900/50 backdrop-blur-md p-8 rounded-[2.5rem] border border-white/10 h-full flex flex-col items-center">
                    <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em] mb-6">Visual Identity</label>
                    
                    <div onclick="document.getElementById('file-input').click()" 
                         class="relative group w-full aspect-[3/4] bg-black/40 rounded-[2rem] border-2 border-dashed border-white/10 hover:border-emerald-500/50 transition-all flex flex-col items-center justify-center cursor-pointer overflow-hidden shadow-inner">
                        
                        <input type="file" id="file-input" name="image" class="hidden" onchange="previewImage(this)" accept="image/*">
                        
                        <div id="image-placeholder" class="text-center p-6 transition-all duration-500 group-hover:scale-110">
                            <div class="w-20 h-20 bg-zinc-800/50 rounded-[1.5rem] flex flex-col items-center justify-center mx-auto mb-4 border border-white/5 group-hover:bg-zinc-800 group-hover:border-emerald-500/30 transition-all">
                                <svg class="w-10 h-10 text-zinc-500 group-hover:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-[8px] font-black text-zinc-600 mt-1 uppercase tracking-tighter">IMG / JPG</span>
                            </div>
                            <p class="text-[10px] font-black text-zinc-500 uppercase tracking-[0.2em]">Select Photo</p>
                        </div>

                        <div id="preview-container" class="absolute inset-0 w-full h-full hidden group">
                            <img id="image-preview" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-[2px]">
                                <p class="text-white text-[10px] font-black uppercase tracking-widest border border-white/20 px-4 py-2 rounded-full">Change Photo</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 text-center">
                        <p class="text-[9px] text-zinc-500 uppercase tracking-widest font-bold italic">3:4 eCommerce Portrait</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('image-preview');
            const container = document.getElementById('preview-container');
            const placeholder = document.getElementById('image-placeholder');
            
            preview.src = e.target.result;
            container.classList.remove('hidden');
            container.classList.add('animate-fade-in');
            placeholder.classList.add('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

const form = document.getElementById('categoryForm');
const btn = document.getElementById('submitBtn');
const btnBg = document.getElementById('btnBg');
const btnText = document.getElementById('btnText');

form.addEventListener('submit', function() {
    btnBg.classList.remove('translate-y-full');
    btnBg.classList.add('translate-y-0');
    btn.classList.remove('text-black');
    btn.classList.add('text-white');
    btnText.innerHTML = "SAVING DATA...";
    btn.style.pointerEvents = 'none';
});
</script>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: scale(1.1); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-fade-in {
        animation: fade-in 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>
@endsection