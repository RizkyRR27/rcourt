@props([
    'currentRoute' => '',
])

<nav class="sticky top-0 z-50 w-full border-b-2 border-black bg-[var(--color-court-paper)]" x-data="{ open: false, showLogoutModal: false }">
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
                    @foreach (['home' => 'Home', 'booking' => 'Booking Lapangan', 'tournament' => 'Turnamen', 'facilities' => 'Fasilitas', 'contact' => 'Kontak'] as $route => $label)
                        @if ($route === 'booking' && !Auth::check())
                            @continue
                        @endif
                        <a href="{{ route($route) }}"
                            class="font-mono text-md font-bold uppercase tracking-widest transition-colors hover:text-[var(--color-court-clay)] {{ $currentRoute === $route ? 'text-[var(--color-court-clay)] decoration-2 underline-offset-4 underline' : 'text-black' }}">
                            {{ $label }}
                        </a>
                    @endforeach

                    {{-- LOGIKA AUTHENTICATION (Desktop) --}}
                    @auth
                        {{-- JIKA SUDAH LOGIN --}}
                        {{-- JIKA SUDAH LOGIN --}}
                        <div class="relative ml-4" x-data="{ profileOpen: false }">
                            <button @click="profileOpen = !profileOpen" @click.outside="profileOpen = false"
                                class="flex items-center gap-2 border-2 border-black bg-white px-3 py-1 font-mono font-bold uppercase hover:bg-[var(--color-court-yellow)] transition-colors shadow-hard active:translate-x-[1px] active:translate-y-[1px] active:shadow-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-4 h-4">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                <span>{{ Str::limit(Auth::user()->name, 10) }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" class="transition-transform duration-200"
                                    :class="profileOpen ? 'rotate-180' : ''">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>

                            {{-- Dropdown Menu --}}
                            <div x-show="profileOpen" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95" style="display: none;"
                                class="absolute right-0 mt-2 w-48 bg-white border-2 border-black shadow-hard-lg z-50">
                                <a href="{{ route('history') }}"
                                    class="flex items-center gap-2 px-4 py-3 font-mono text-sm border-b-2 border-black hover:bg-gray-100 transition-colors text-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M3 5.75A2.75 2.75 0 0 1 5.75 3h12.5A2.75 2.75 0 0 1 21 5.75v1.5c0 .788-.331 1.499-.863 2c.532.501.863 1.212.863 2v1.5c0 .788-.331 1.499-.863 2c.532.501.863 1.212.863 2v1.5A2.75 2.75 0 0 1 18.25 21H5.75A2.75 2.75 0 0 1 3 18.25v-1.5c0-.788.331-1.499.863-2a2.74 2.74 0 0 1-.863-2v-1.5c0-.788.331-1.499.863-2a2.74 2.74 0 0 1-.863-2zm16.5 1.5v-1.5c0-.69-.56-1.25-1.25-1.25H9.5v4h8.75c.69 0 1.25-.56 1.25-1.25M8 4.5H5.75c-.69 0-1.25.56-1.25 1.25v1.5c0 .69.56 1.25 1.25 1.25H8zM8 10H5.75c-.69 0-1.25.56-1.25 1.25v1.5c0 .69.56 1.25 1.25 1.25H8zm0 5.5H5.75c-.69 0-1.25.56-1.25 1.25v1.5c0 .69.56 1.25 1.25 1.25H8zm1.5 4h8.75c.69 0 1.25-.56 1.25-1.25v-1.5c0-.69-.56-1.25-1.25-1.25H9.5zm0-5.5h8.75c.69 0 1.25-.56 1.25-1.25v-1.5c0-.69-.56-1.25-1.25-1.25H9.5z" />
                                    </svg>
                                    Riwayat Booking
                                </a>

                                <button type="button" @click="showLogoutModal = true"
                                    class="flex items-center gap-2 w-full text-left px-4 py-3 font-mono text-sm font-bold text-red-600 hover:bg-red-50 hover:text-red-800 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                        <polyline points="16 17 21 12 16 7" />
                                        <line x1="21" x2="9" y1="12" y2="12" />
                                    </svg>
                                    Logout
                                </button>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu Dropdown --}}
    <div x-show="open" x-cloak class="border-t-2 border-black bg-[var(--color-court-yellow)] md:hidden">
        <div class="space-y-4 px-4 py-6">
            @foreach (['home' => 'Home', 'booking' => 'Booking Lapangan', 'tournament' => 'Turnamen', 'facilities' => 'Fasilitas', 'contact' => 'Kontak'] as $route => $label)
                @if ($route === 'booking' && !Auth::check())
                    @continue
                @endif
                <a href="{{ route($route) }}"
                    class="block w-full border-2 border-black bg-white px-4 py-3 text-left font-mono font-bold uppercase shadow-hard-sm active:translate-x-[1px] active:translate-y-[1px] active:shadow-none text-black">
                    {{ $label }}
                </a>
            @endforeach

            {{-- LOGIKA AUTHENTICATION (Mobile) --}}
            @auth
                <a href="{{ route('history') }}"
                    class="flex items-center gap-2 w-full border-2 border-black bg-white px-4 py-3 text-left font-mono font-bold uppercase shadow-hard-sm active:translate-x-[1px] active:translate-y-[1px] active:shadow-none text-black">
                    Riwayat Booking
                </a>

                <button type="button" @click="showLogoutModal = true"
                    class="flex items-center justify-center gap-2 w-full border-2 border-black bg-red-600 px-4 py-3 font-mono font-bold uppercase text-white shadow-hard-sm active:translate-x-[1px] active:translate-y-[1px] active:shadow-none hover:bg-red-700 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                    <span>LOGOUT ({{ Str::limit(Auth::user()->name, 8) }})</span>
                </button>
            @else
                <a href="{{ route('login') }}"
                    class="block w-full border-2 border-black bg-[var(--color-court-green)] px-4 py-3 text-center font-mono font-bold uppercase text-white shadow-hard-sm active:translate-x-[1px] active:translate-y-[1px] active:shadow-none">
                    LOGIN
                </a>
            @endauth
        </div>
    </div>

    {{-- Logout Confirmation Modal --}}
    <div x-show="showLogoutModal" x-cloak
        class="fixed inset-0 z-[100] flex items-center justify-center bg-black/50 p-4"
        x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="w-full max-w-md border-2 border-black bg-white p-8 shadow-hard"
            @click.outside="showLogoutModal = false" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
            <div class="mb-6 text-center">
                <div
                    class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full border-2 border-black bg-red-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                </div>
                <h2 class="font-display text-2xl uppercase text-black">Keluar?</h2>
                <p class="mt-2 font-mono text-sm text-gray-600">Apakah Anda yakin ingin keluar dari akun Anda?</p>
            </div>
            <div class="flex gap-3">
                <button type="button" @click="showLogoutModal = false"
                    class="flex-1 border-2 border-black bg-white px-4 py-3 font-mono font-bold uppercase text-black shadow-hard-sm transition-all hover:-translate-y-px active:translate-y-0 active:shadow-none">
                    Batal
                </button>
                <form action="{{ route('logout') }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit"
                        class="w-full border-2 border-black bg-red-600 px-4 py-3 font-mono font-bold uppercase text-white shadow-hard-sm transition-all hover:-translate-y-px hover:bg-red-700 active:translate-y-0 active:shadow-none">
                        Ya, Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
