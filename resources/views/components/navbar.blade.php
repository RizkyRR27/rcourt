@props([
    'currentRoute' => '',
])

<nav class="sticky top-0 z-50 w-full border-b-2 border-black bg-[var(--color-court-paper)]" x-data="{ open: false }">
    <div class="mx-auto  px-4 sm:px-6 lg:px-8">
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
                    <a href="{{ route('home') }}"
                        class="font-mono text-md font-bold uppercase tracking-widest transition-colors hover:text-[var(--color-court-clay)] {{ $currentRoute === 'home' ? 'text-[var(--color-court-clay)] decoration-2 underline-offset-4 underline' : 'text-black' }}">
                        Home
                    </a>
                    <a href="{{ route('booking') }}"
                        class="font-mono text-md font-bold uppercase tracking-widest transition-colors hover:text-[var(--color-court-clay)] {{ $currentRoute === 'booking' ? 'text-[var(--color-court-clay)] decoration-2 underline-offset-4 underline' : 'text-black' }}">
                        Booking Lapangan
                    </a>
                    <a href="{{ route('tournament') }}"
                        class="font-mono text-md font-bold uppercase tracking-widest transition-colors hover:text-[var(--color-court-clay)] {{ $currentRoute === 'tournament' ? 'text-[var(--color-court-clay)] decoration-2 underline-offset-4 underline' : 'text-black' }}">
                        Turnamen
                    </a>
                    <a href="{{ route('contact') }}"
                        class="font-mono text-md font-bold uppercase tracking-widest transition-colors hover:text-[var(--color-court-clay)] {{ $currentRoute === 'contact' ? 'text-[var(--color-court-clay)] decoration-2 underline-offset-4 underline' : 'text-black' }}">
                        Kontak
                    </a>

                    <a href="#"
                        class="font-mono text-md font-bold uppercase tracking-widest text-black transition-colors border-2 border-black px-4 py-2 hover:text-[var(--color-court-clay)] hover:border-[var(--color-court-clay)]">
                        LOGIN
                    </a>
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
            <a href="{{ route('home') }}"
                class="block w-full border-2 border-black bg-white px-4 py-3 text-left font-mono font-bold uppercase shadow-hard-sm active:translate-x-[1px] active:translate-y-[1px] active:shadow-none text-black">
                Home
            </a>
            <a href="{{ route('booking') }}"
                class="block w-full border-2 border-black bg-white px-4 py-3 text-left font-mono font-bold uppercase shadow-hard-sm active:translate-x-[1px] active:translate-y-[1px] active:shadow-none text-black">
                Booking Lapangan
            </a>
            <a href="{{ route('tournament') }}"
                class="block w-full border-2 border-black bg-white px-4 py-3 text-left font-mono font-bold uppercase shadow-hard-sm active:translate-x-[1px] active:translate-y-[1px] active:shadow-none text-black">
                Turnamen
            </a>
            <a href="{{ route('contact') }}"
                class="block w-full border-2 border-black bg-white px-4 py-3 text-left font-mono font-bold uppercase shadow-hard-sm active:translate-x-[1px] active:translate-y-[1px] active:shadow-none text-black">
                Kontak
            </a>
            <a href="#"
                class="block w-full border-2 border-black bg-[var(--color-court-green)] px-4 py-3 text-center font-mono font-bold uppercase text-white shadow-hard-sm active:translate-x-[1px] active:translate-y-[1px] active:shadow-none">
                LOGIN
            </a>
        </div>
    </div>
</nav>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
