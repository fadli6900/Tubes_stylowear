@extends('admin.admin')

@section('content')
<div class="p-6 lg:p-10 bg-[#09090b] min-h-screen">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div>
            <h1 class="text-4xl font-black text-white tracking-tight italic uppercase">Manage Categories</h1>
            <div class="mt-3 p-3 bg-zinc-900/50 border border-white/5 rounded-xl inline-flex items-center gap-4">
                <p class="text-zinc-300 text-xs uppercase tracking-tighter">
                    Max <span class="text-[#ff2d55] font-bold">2MB</span> • eCommerce Standard: <span class="text-[#ff2d55] font-bold">3:4 Ratio</span>
                </p>
            </div>
        </div>

        <a href="{{ route('admin.categories.create') }}"
           class="flex items-center gap-3 bg-white hover:bg-[#ff2d55] text-black hover:text-white px-8 py-4 rounded-2xl font-bold transition-all duration-300 shadow-lg active:scale-95 uppercase text-sm">
            ＋ Add Category
        </a>
    </div>

    {{-- Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse ($categories as $category)
            <div class="bg-zinc-900/40 border border-white/10 rounded-[2rem] p-4 flex flex-col h-full hover:border-white/20 transition-all">
                
                {{-- Category Photo: Standar eCommerce 3:4 (Portrait) --}}
                <div class="relative w-full aspect-[3/4] rounded-[1.5rem] overflow-hidden bg-zinc-800 border border-white/5 mb-5 shadow-inner">
                    @if ($category->image)
                        <img src="{{ asset('storage/'.$category->image) }}" 
                             alt="{{ $category->name }}" 
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-zinc-700">
                             <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                             <span class="text-[10px] mt-2 font-bold tracking-widest opacity-50 uppercase">No Image</span>
                        </div>
                    @endif
                </div>

                {{-- Name & Description --}}
                <div class="flex-grow px-2">
                    <h3 class="text-lg font-bold text-white uppercase tracking-tight truncate">{{ $category->name }}</h3>
                    <p class="text-zinc-500 text-xs mt-2 line-clamp-3 uppercase tracking-tighter italic leading-relaxed">
                        {{ $category->description ?: 'No additional description for this category.' }}
                    </p>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-6 grid grid-cols-2 gap-3 pt-5 border-t border-white/5">
                    
                    {{-- Edit --}}
                    <a href="{{ route('admin.categories.edit', $category) }}" 
                       class="group flex items-center justify-center gap-2 bg-zinc-800/50 py-3 rounded-xl text-[10px] font-black tracking-widest transition-all duration-300
                              text-zinc-400 border border-white/5
                              hover:bg-emerald-500/10 hover:text-emerald-500 hover:border-emerald-500/50">
                        <svg class="w-3.5 h-3.5 transition-colors group-hover:text-emerald-500 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        EDIT
                    </a>

                    {{-- Delete --}}
                    <form action="{{ route('admin.categories.destroy', $category) }}" 
                          method="POST" 
                          class="w-full"
                          onsubmit="return confirm('Hapus kategori ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="group w-full flex items-center justify-center gap-2 bg-zinc-800/50 py-3 rounded-xl text-[10px] font-black tracking-widest transition-all duration-300
                                       text-zinc-400 border border-white/5
                                       hover:bg-red-500/10 hover:text-red-500 hover:border-red-500/50">
                            <svg class="w-3.5 h-3.5 transition-colors group-hover:text-red-500 text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            DELETE
                        </button>
                    </form>

                </div>
            </div>
        @empty
            <div class="col-span-full py-20 bg-zinc-900/10 border-2 border-dashed border-zinc-800 rounded-[3rem] text-center text-zinc-600 font-bold uppercase tracking-widest">
                Empty List
            </div>
        @endforelse
    </div>
</div>
@endsection