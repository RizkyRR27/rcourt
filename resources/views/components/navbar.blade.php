@props([
    'currentRoute' => '',
])

<nav class="surface-elevated fixed w-full z-50" x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = (window.scrollY > 20)"
    :class="{ 'shadow-md': scrolled }">
    <div class="container-app">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <span class="text-2xl font-bold" style="font-family: var(--font-display);">
                    <span class="text-primary">R</span><span style="color: var(--color-accent);">Court</span>
                </span>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}"
                    class="{{ $currentRoute === 'home' ? 'text-primary font-semibold' : 'text-muted hover:text-primary' }}">
                    Home
                </a>
                <a href="{{ route('booking') }}"
                    class="{{ $currentRoute === 'booking' ? 'text-primary font-semibold' : 'text-muted hover:text-primary' }}">
                    Booking Lapangan
                </a>
                <a href="{{ route('contact') }}"
                    class="{{ $currentRoute === 'contact' ? 'text-primary font-semibold' : 'text-muted hover:text-primary' }}">
                    Kontak
                </a>
                <a href="#" class="btn btn-primary btn-sm">
                    Login
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="open = !open" class="md:hidden p-2 text-muted hover:text-primary">
                <svg x-show="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2" class="md:hidden surface-elevated border-t border-subtle">
        <div class="container-app py-4 flex flex-col gap-2">
            <a href="{{ route('home') }}"
                class="py-3 px-4 rounded-md {{ $currentRoute === 'home' ? 'surface-primary' : 'hover:bg-[var(--color-surface-muted)]' }}">
                Home
            </a>
            <a href="{{ route('booking') }}"
                class="py-3 px-4 rounded-md {{ $currentRoute === 'booking' ? 'surface-primary' : 'hover:bg-[var(--color-surface-muted)]' }}">
                Booking Lapangan
            </a>
            <a href="{{ route('contact') }}"
                class="py-3 px-4 rounded-md {{ $currentRoute === 'contact' ? 'surface-primary' : 'hover:bg-[var(--color-surface-muted)]' }}">
                Kontak
            </a>
            <div class="pt-2 mt-2 border-t border-subtle">
                <a href="#" class="btn btn-primary btn-md w-full">Login</a>
            </div>
        </div>
    </div>
</nav>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
