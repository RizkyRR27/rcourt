@props([
'currentRoute' => '',
])

<nav class="sticky top-0 z-50 w-full border-b-2 border-black bg-[var(--color-court-paper)]" x-data="{ open: false }">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex flex-shrink-0 cursor-pointer items-center text-decoration-none">
                <h1 class="font-display text-4xl tracking-tighter text-black select-none mb-0">
                    R<span class="text-[var(--color-court-clay)]">COURT</span>
                </h1>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:block">
                <div class="flex items-center space-x-8">
                    {{-- Menu Items --}}
                    @foreach(['home' => 'Home', 'booking' => 'Booking Lapangan', 'tournament' => 'Turnamen', 'facilities' => 'Fasilitas', 'contact' => 'Kontak'] as $route => $label)
                    <a href="{{ route($route) }}"
                        class="font-mono text-md font-bold uppercase tracking-widest transition-colors hover:text-[var(--color-court-clay)] {{ $currentRoute === $route ? 'text-[var(--color-court-clay)] decoration-2 underline-offset-4 underline' : 'text-black' }}">
                        {{ $label }}
                    </a>
                    @endforeach

                    {{-- LOGIKA AUTHENTICATION (Desktop) --}}
                    @auth
                    {{-- JIKA SUDAH LOGIN --}}
                    <div class="relative group ml-4">
                        <button class="flex items-center gap-2 border-2 border-black bg-white px-3 py-1 font-mono font-bold uppercase hover:bg-[var(--color-court-yellow)] transition-colors shadow-hard active:translate-x-[1px] active:translate-y-[1px] active:shadow-none">
                            <span>👤 {{ Str::limit(Auth::user()->name, 10) }}</span>
                            <span class="text-[10px]">▼</span>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div class="absolute right-0 mt-2 w-48 bg-white border-2 border-black shadow-hard-lg hidden group-hover:block z-50">
                            <a href="{{ route('history') }}" class="block px-4 py-3 font-mono text-sm border-b-2 border-black hover:bg-gray-100 transition-colors text-black">
                                📜 Riwayat Booking
                            </a>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf {{-- Token keamanan ini WAJIB ada --}}
                                <button type="submit" class="block w-full text-left px-4 py-3 font-mono text-sm font-bold text-red-600 hover:bg-red-50 hover:text-red-800 transition-colors">
                                    🚪 Logout
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    {{-- JIKA BELUM LOGIN (TAMU) --}}
                    <a href="{{ route('login') }}"
                        class="font-mono text-md font-bold uppercase tracking-widest text-black transition-colors border-2 border-black px-4 py-2 hover:text-[var(--color-court-clay)] hover:border-[var(--color-court-clay)] shadow-hard hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px]">
                        LOGIN
                    </a>
                    @endauth
                </div>
            </div>

            {{-- Mobile Menu Button --}}
            <div class="md:hidden">
                <button @click="open = !open"
                    class="border-2 border-black bg-white p-2 text-black shadow-hard-sm active:translate-x-[2px] active:translate-y-[2px] active:shadow-none transition-all">
                    <svg x-show="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu Dropdown --}}
    <div x-show="open" x-cloak class="border-t-2 border-black bg-[var(--color-court-yellow)] md:hidden">
        <div class="space-y-4 px-4 py-6">
            @foreach(['home' => 'Home', 'booking' => 'Booking Lapangan', 'tournament' => 'Turnamen', 'facilities' => 'Fasilitas', 'contact' => 'Kontak'] as $route => $label)
            <a href="{{ route($route) }}"
                class="block w-full border-2 border-black bg-white px-4 py-3 text-left font-mono font-bold uppercase shadow-hard-sm active:translate-x-[1px] active:translate-y-[1px] active:shadow-none text-black">
                {{ $label }}
            </a>
            @endforeach

            {{-- LOGIKA AUTHENTICATION (Mobile) --}}
            @auth
            <a href="{{ route('history') }}" class="block w-full border-2 border-black bg-white px-4 py-3 text-left font-mono font-bold uppercase shadow-hard-sm active:translate-x-[1px] active:translate-y-[1px] active:shadow-none text-black">
                📜 Riwayat Booking
            </a>

            <form action="{{ route('logout') }}" method="POST" class="block w-full">
                @csrf
                <button type="submit" class="block w-full border-2 border-black bg-red-600 px-4 py-3 text-center font-mono font-bold uppercase text-white shadow-hard-sm active:translate-x-[1px] active:translate-y-[1px] active:shadow-none">
                    LOGOUT ({{ Str::limit(Auth::user()->name, 8) }})
                </button>
            </form>
            @else
            <a href="{{ route('login') }}" class="block w-full border-2 border-black bg-[var(--color-court-green)] px-4 py-3 text-center font-mono font-bold uppercase text-white shadow-hard-sm active:translate-x-[1px] active:translate-y-[1px] active:shadow-none">
                LOGIN
            </a>
            @endauth
        </div>
    </div>
</nav>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>