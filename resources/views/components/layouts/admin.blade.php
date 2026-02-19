<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin - RCourt' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bungee&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="min-h-screen bg-[var(--color-court-paper)] text-[var(--color-court-green)]" x-data="{ sidebarOpen: false }">

    {{-- Mobile Top Bar --}}
    <div
        class="fixed top-0 left-0 right-0 z-40 flex items-center justify-between border-b-2 border-black bg-black px-4 py-3 lg:hidden">
        <a href="{{ route('admin.home') }}" class="font-display text-xl uppercase text-white">
            R<span class="text-[var(--color-court-yellow)]">Court</span>
            <span class="text-xs text-gray-400 ml-1">Admin</span>
        </a>
        <button @click="sidebarOpen = !sidebarOpen" class="text-white p-1">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path x-show="!sidebarOpen" stroke-linecap="round" stroke-linejoin="round"
                    d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="sidebarOpen" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Sidebar --}}
    <aside
        class="fixed top-0 left-0 z-50 flex h-full w-64 flex-col border-r-2 border-black bg-black transition-transform duration-200 lg:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        {{-- Logo --}}
        <div class="border-b-2 border-gray-800 px-6 py-6">
            <a href="{{ route('admin.home') }}" class="font-display text-2xl uppercase text-white">
                R<span class="text-[var(--color-court-yellow)]">Court</span>
            </a>
            <p class="mt-1 font-mono text-[10px] font-bold uppercase tracking-widest text-gray-500">Admin Panel</p>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="{{ route('admin.home') }}"
                class="flex items-center gap-3 px-4 py-3 font-mono text-sm font-bold uppercase transition-all
                {{ request()->routeIs('admin.home') ? 'bg-[var(--color-court-yellow)] text-black border-2 border-black shadow-[2px_2px_0px_0px_rgba(255,255,255,0.2)]' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                </svg>
                Statistik
            </a>

            <a href="{{ route('admin.bookings') }}"
                class="flex items-center gap-3 px-4 py-3 font-mono text-sm font-bold uppercase transition-all
                {{ request()->routeIs('admin.bookings') ? 'bg-[var(--color-court-yellow)] text-black border-2 border-black shadow-[2px_2px_0px_0px_rgba(255,255,255,0.2)]' : 'text-gray-400 hover:bg-gray-900 hover:text-white' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                Kelola Booking
            </a>
        </nav>

        {{-- Bottom: Logout --}}
        <div class="border-t-2 border-gray-800 px-4 py-4 space-y-2">
            <a href="{{ route('home') }}"
                class="flex items-center gap-3 px-4 py-2 font-mono text-xs font-bold uppercase text-gray-500 transition-all hover:text-white">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                Ke Website
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex w-full items-center gap-3 px-4 py-2 font-mono text-xs font-bold uppercase text-red-400 transition-all hover:text-red-300">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- Overlay (mobile) --}}
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-black/50 lg:hidden"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    </div>

    {{-- Main Content --}}
    <main class="lg:ml-64 min-h-screen pt-14 lg:pt-0">
        {{ $slot }}
    </main>
</body>

</html>
