{{-- LOGIKA NAVBAR AUTH --}}
<div class="flex items-center gap-4">
    @auth
        {{-- JIKA SUDAH LOGIN --}}
        <div class="relative group">
            <button class="font-mono font-bold uppercase hover:text-[var(--color-court-clay)] flex items-center gap-2">
                👤 {{ Auth::user()->name }} 
                <span class="text-[10px]">▼</span>
            </button>
            
            {{-- Dropdown Menu --}}
            <div class="absolute right-0 mt-2 w-48 bg-white border-2 border-black shadow-hard hidden group-hover:block z-50">
                <a href="{{ route('history') }}" class="block px-4 py-2 font-mono text-sm hover:bg-gray-100 border-b border-gray-200">
                    📜 Riwayat Booking
                </a>
                
                {{-- Form Logout --}}
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 font-mono text-sm text-red-600 hover:bg-red-50 font-bold">
                        🚪 Keluar
                    </button>
                </form>
            </div>
        </div>
    @else
        {{-- JIKA BELUM LOGIN (TAMU) --}}
        <a href="{{ route('login') }}" class="font-mono font-bold uppercase hover:text-[var(--color-court-clay)]">
            Masuk
        </a>
        <a href="{{ route('register') }}" class="border-2 border-black bg-black text-white px-4 py-1 font-mono font-bold uppercase hover:bg-white hover:text-black transition-colors">
            Daftar
        </a>
    @endauth
</div>