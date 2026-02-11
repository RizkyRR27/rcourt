<x-layouts.app :current-route="'home'">
    {{-- Hero Section (Ported from Hero.tsx) --}}
    <section class="relative overflow-hidden bg-[var(--color-court-green)] pb-32 pt-20 text-[var(--color-court-paper)]">

<<<<<<< HEAD
        {{-- Background Decorative Grid --}}
        <div class="absolute inset-0 opacity-10 pointer-events-none"
            style="background-image: linear-gradient(#ffffff 1px, transparent 1px), linear-gradient(90deg, #ffffff 1px, transparent 1px); background-size: 40px 40px;">
=======
     <nav x-data="{ open: false }" class="bg-white shadow mb-8 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">RCourt.</a>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                
                <a href="{{ route('home') }}" 
                   class="{{ request()->routeIs('home') ? 'text-blue-600 font-bold' : 'text-gray-600 font-medium hover:text-blue-600' }} transition">
                    Home
                </a>

                 <a href="{{ route('tournament') }}" 
                   class="{{ request()->routeIs('tournament') ? 'text-blue-600 font-bold' : 'text-gray-600 font-medium hover:text-blue-600' }} transition">
                    Info Tournamen 🏆
                </a>

                <a href="{{ route('booking') }}" 
                   class="{{ request()->routeIs('booking*') ? 'text-blue-600 font-bold' : 'text-gray-600 font-medium hover:text-blue-600' }} transition">
                    Booking Lapangan
                </a>

                <a href="{{ route('contact') }}" 
                   class="{{ request()->routeIs('contact') ? 'text-blue-600 font-bold' : 'text-gray-600 font-medium hover:text-blue-600' }} transition">
                    Kontak Kami
                </a>

            </div>

            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
>>>>>>> 44926623542cb29c83159a1eb3320e011f0f83a8
        </div>
    </div>

    <div x-show="open" class="md:hidden bg-white border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1">
            
            <a href="{{ route('home') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition
               {{ request()->routeIs('home') ? 'border-blue-500 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                Home
            </a>

            <a href="{{ route('tournament') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition
               {{ request()->routeIs('tournament') ? 'border-blue-500 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                info Turnamen 🏆
            </a>

            <a href="{{ route('booking') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition
               {{ request()->routeIs('booking*') ? 'border-blue-500 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                Booking Lapangan
            </a>

            <a href="{{ route('contact') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition
               {{ request()->routeIs('contact') ? 'border-blue-500 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                Kontak Kami
            </a>

<<<<<<< HEAD
        <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <div
                class="mb-4 inline-flex items-center gap-2 border border-[var(--color-court-yellow)] px-3 py-1 text-xs font-bold uppercase tracking-widest text-[var(--color-court-yellow)]">
                <span class="h-2 w-2 bg-red-500 rounded-full animate-pulse"></span>
                Live Booking Available
=======
        </div>
    </div>
</nav>

    <header class="bg-blue-600 text-white pt-32 pb-20 px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di RCourt</h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-8">
            Pusat olahraga dengan fasilitas terbaik. Nikmati kemudahan booking lapangan di RCourt secara online.
        </p>
        <a href="{{ route('booking') }}" class="bg-white text-blue-600 font-bold py-3 px-8 rounded-full shadow-lg hover:bg-gray-100 transition transform hover:scale-105">
            Booking Sekarang
        </a>
    </header>

    <section class="max-w-7xl mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Fasilitas Lapangan Kami</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition border-t-4 border-blue-500">
                <h3 class="text-xl font-bold mb-2">🏸 Badminton</h3>
                <p class="text-gray-600">Lapangan karpet standar internasional dengan pencahayaan optimal.</p>
                <div class="mt-4 text-3xl font-bold text-blue-600">{{ $counts['badminton'] }} <span class="text-sm font-normal text-gray-500">Lapangan</span></div>
>>>>>>> 44926623542cb29c83159a1eb3320e011f0f83a8
            </div>

            <h1
                class="mb-6 font-display text-6xl uppercase leading-[0.9] tracking-tighter md:text-9xl lg:text-[10rem] text-white">
                Selamat Datang <br />
                <span class="text-stroke-white">Di RCOURT</span>
            </h1>

            <p class="mx-auto mb-10 max-w-2xl font-mono text-sm leading-relaxed text-gray-300 md:text-base">
                Pusat olahraga terlengkap dengan fasilitas terbaik. Nikmati kemudahan
                booking lapangan Badminton, Futsal, Basket, hingga Mini Soccer secara
                online. Jangan biarkan jadwal kosong menghalangi permainanmu.
            </p>

<<<<<<< HEAD
            <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                <a href="{{ route('booking') }}"
                    class="font-mono font-bold uppercase transition-all duration-200 active:translate-x-[2px] active:translate-y-[2px] active:shadow-none border-2 border-black px-6 py-3 text-sm md:text-base tracking-wider bg-[var(--color-court-clay)] text-white shadow-hard hover:bg-red-600 min-w-[200px] text-center">
                    BOOKING SEKARANG
                </a>
                <a href="{{ route('booking') }}"
                    class="font-mono font-bold uppercase transition-all duration-200 active:translate-x-[2px] active:translate-y-[2px] active:shadow-none border-2 border-[var(--color-court-paper)] px-6 py-3 text-sm md:text-base tracking-wider bg-transparent text-[var(--color-court-paper)] shadow-hard hover:bg-[var(--color-court-paper)] hover:text-[var(--color-court-green)] min-w-[200px] text-center">
                    LIHAT JADWAL
                </a>
            </div>
        </div>
    </section>

    {{-- Booking Widget (Ported from BookingWidget.tsx) --}}
    <x-booking-widget />
=======
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition border-t-4 border-yellow-500">
                <h3 class="text-xl font-bold mb-2">🎾 Tennis</h3>
                <p class="text-gray-600">Lapangan outdoor dengan suasana segar dan lantai standar.</p>
                <div class="mt-4 text-3xl font-bold text-yellow-600">{{ $counts['Tennis'] }} <span class="text-sm font-normal text-gray-500">Lapangan</span></div>
            </div>

             <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition border-t-4 border-red-500 sm:col-span-2 lg:col-span-1">
                <h3 class="text-xl font-bold mb-2">🥅 Mini Soccer</h3>
                <p class="text-gray-600">Lapangan luas cocok untuk pertandingan 7 vs 7.</p>
                <div class="mt-4 text-3xl font-bold text-red-600">{{ $counts['mini_soccer'] }} <span class="text-sm font-normal text-gray-500">Lapangan</span></div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition border-t-4 border-pink-500 sm:col-span-2 lg:col-span-1">
                <h3 class="text-xl font-bold mb-2">🤾 Padel</h3>
                <p class="text-gray-600">Lapangan dengan standar yang sesuai dengan regulasi dunia</p>
                <div class="mt-4 text-3xl font-bold text-red-600">{{ $counts['padel'] }} <span class="text-sm font-normal text-gray-500">Lapangan</span></div>
            </div>

        </div>
    </section>

    <!-- <footer class="bg-gray-800 text-white py-8 text-center">
        <p>&copy; 2024 RCourt. All rights reserved.</p>
    </footer> -->
>>>>>>> 44926623542cb29c83159a1eb3320e011f0f83a8

    {{-- Facilities Section (Ported from Facilities.tsx) --}}
    <section class="py-20 bg-[var(--color-court-paper)]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-16 text-center">
                <span
                    class="mb-4 inline-block border-2 border-black bg-[var(--color-court-yellow)] px-4 py-1 font-mono text-sm font-bold uppercase tracking-widest shadow-hard-sm">
                    Fasilitas Kami
                </span>
                <h2 class="mt-4 font-display text-5xl uppercase md:text-7xl text-black">
                    CHOOSE YOUR <span class="text-stroke-black md:text-black">ARENA</span>
                </h2>
                <p class="mx-auto mt-6 max-w-2xl font-mono text-gray-600">
                    Dilengkapi dengan fasilitas standar internasional untuk pengalaman olahraga terbaik Anda. No
                    excuses.
                </p>
            </div>

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                {{-- Badminton Card --}}
                <div
                    class="group relative flex flex-col justify-between border-2 border-black bg-white p-8 shadow-hard transition-all duration-300 hover:-translate-y-2 hover:shadow-[8px_8px_0px_0px_var(--color-court-clay)]">
                    <div>
                        <div class="mb-6 flex items-start justify-between">
                            <div
                                class="flex h-14 w-14 items-center justify-center border-2 border-black bg-[var(--color-court-paper)] text-black">
                                <span class="text-2xl">🏸</span>
                            </div>
                            <div class="border-2 border-black bg-black px-2 py-1 text-white">
                                <span class="font-mono text-xs font-bold uppercase">Indoor</span>
                            </div>
                        </div>
                        <h3 class="mb-2 font-display text-3xl uppercase tracking-tight">BADMINTON</h3>
                        <p class="mb-6 font-mono text-sm text-gray-600">Lapangan karpet standar internasional dengan
                            pencahayaan optimal.</p>
                    </div>
                    <div class="mt-auto flex items-end justify-between border-t-2 border-gray-100 pt-6">
                        <div>
                            <span
                                class="block font-display text-5xl text-[var(--color-court-clay)]">{{ $counts['badminton'] }}</span>
                            <span class="font-mono text-xs font-bold uppercase text-black">Lapangan</span>
                        </div>
                        <div class="text-right">
                            <span class="font-mono text-xs text-gray-500">Starts from</span>
                            <p class="font-mono text-lg font-bold">IDR 80K/hr</p>
                        </div>
                    </div>
                </div>

                {{-- Futsal Card --}}
                <div
                    class="group relative flex flex-col justify-between border-2 border-black bg-white p-8 shadow-hard transition-all duration-300 hover:-translate-y-2 hover:shadow-[8px_8px_0px_0px_var(--color-court-clay)]">
                    <div>
                        <div class="mb-6 flex items-start justify-between">
                            <div
                                class="flex h-14 w-14 items-center justify-center border-2 border-black bg-[var(--color-court-paper)] text-black">
                                <span class="text-2xl">⚽</span>
                            </div>
                            <div class="border-2 border-black bg-black px-2 py-1 text-white">
                                <span class="font-mono text-xs font-bold uppercase">Indoor</span>
                            </div>
                        </div>
                        <h3 class="mb-2 font-display text-3xl uppercase tracking-tight">FUTSAL</h3>
                        <p class="mb-6 font-mono text-sm text-gray-600">Rumput sintetis berkualitas tinggi nyaman untuk
                            bermain.</p>
                    </div>
                    <div class="mt-auto flex items-end justify-between border-t-2 border-gray-100 pt-6">
                        <div>
                            <span
                                class="block font-display text-5xl text-[var(--color-court-clay)]">{{ $counts['futsal'] }}</span>
                            <span class="font-mono text-xs font-bold uppercase text-black">Lapangan</span>
                        </div>
                        <div class="text-right">
                            <span class="font-mono text-xs text-gray-500">Starts from</span>
                            <p class="font-mono text-lg font-bold">IDR 150K/hr</p>
                        </div>
                    </div>
                </div>

                {{-- Basket Indoor Card --}}
                <div
                    class="group relative flex flex-col justify-between border-2 border-black bg-white p-8 shadow-hard transition-all duration-300 hover:-translate-y-2 hover:shadow-[8px_8px_0px_0px_var(--color-court-clay)]">
                    <div>
                        <div class="mb-6 flex items-start justify-between">
                            <div
                                class="flex h-14 w-14 items-center justify-center border-2 border-black bg-[var(--color-court-paper)] text-black">
                                <span class="text-2xl">🏀</span>
                            </div>
                            <div class="border-2 border-black bg-black px-2 py-1 text-white">
                                <span class="font-mono text-xs font-bold uppercase">Indoor</span>
                            </div>
                        </div>
                        <h3 class="mb-2 font-display text-3xl uppercase tracking-tight">BASKET INDOOR</h3>
                        <p class="mb-6 font-mono text-sm text-gray-600">Lantai parket kayu, full AC, dan papan skor
                            digital.</p>
                    </div>
                    <div class="mt-auto flex items-end justify-between border-t-2 border-gray-100 pt-6">
                        <div>
                            <span
                                class="block font-display text-5xl text-[var(--color-court-clay)]">{{ $counts['basket_indoor'] }}</span>
                            <span class="font-mono text-xs font-bold uppercase text-black">Lapangan</span>
                        </div>
                        <div class="text-right">
                            <span class="font-mono text-xs text-gray-500">Starts from</span>
                            <p class="font-mono text-lg font-bold">IDR 200K/hr</p>
                        </div>
                    </div>
                </div>

                {{-- Basket Outdoor Card --}}
                <div
                    class="group relative flex flex-col justify-between border-2 border-black bg-white p-8 shadow-hard transition-all duration-300 hover:-translate-y-2 hover:shadow-[8px_8px_0px_0px_var(--color-court-clay)]">
                    <div>
                        <div class="mb-6 flex items-start justify-between">
                            <div
                                class="flex h-14 w-14 items-center justify-center border-2 border-black bg-[var(--color-court-paper)] text-black">
                                <span class="text-2xl">☀️</span>
                            </div>
                            <div class="border-2 border-black bg-black px-2 py-1 text-white">
                                <span class="font-mono text-xs font-bold uppercase">Outdoor</span>
                            </div>
                        </div>
                        <h3 class="mb-2 font-display text-3xl uppercase tracking-tight">BASKET OUTDOOR</h3>
                        <p class="mb-6 font-mono text-sm text-gray-600">Lapangan outdoor dengan suasana segar dan lantai
                            standar.</p>
                    </div>
                    <div class="mt-auto flex items-end justify-between border-t-2 border-gray-100 pt-6">
                        <div>
                            <span
                                class="block font-display text-5xl text-[var(--color-court-clay)]">{{ $counts['basket_outdoor'] }}</span>
                            <span class="font-mono text-xs font-bold uppercase text-black">Lapangan</span>
                        </div>
                        <div class="text-right">
                            <span class="font-mono text-xs text-gray-500">Starts from</span>
                            <p class="font-mono text-lg font-bold">IDR 120K/hr</p>
                        </div>
                    </div>
                </div>

                {{-- Mini Soccer Card --}}
                <div
                    class="group relative flex flex-col justify-between border-2 border-black bg-white p-8 shadow-hard transition-all duration-300 hover:-translate-y-2 hover:shadow-[8px_8px_0px_0px_var(--color-court-clay)]">
                    <div>
                        <div class="mb-6 flex items-start justify-between">
                            <div
                                class="flex h-14 w-14 items-center justify-center border-2 border-black bg-[var(--color-court-paper)] text-black">
                                <span class="text-2xl">🥅</span>
                            </div>
                            <div class="border-2 border-black bg-black px-2 py-1 text-white">
                                <span class="font-mono text-xs font-bold uppercase">Outdoor</span>
                            </div>
                        </div>
                        <h3 class="mb-2 font-display text-3xl uppercase tracking-tight">MINI SOCCER</h3>
                        <p class="mb-6 font-mono text-sm text-gray-600">Lapangan luas cocok untuk pertandingan 7 vs 7.
                        </p>
                    </div>
                    <div class="mt-auto flex items-end justify-between border-t-2 border-gray-100 pt-6">
                        <div>
                            <span
                                class="block font-display text-5xl text-[var(--color-court-clay)]">{{ $counts['mini_soccer'] }}</span>
                            <span class="font-mono text-xs font-bold uppercase text-black">Lapangan</span>
                        </div>
                        <div class="text-right">
                            <span class="font-mono text-xs text-gray-500">Starts from</span>
                            <p class="font-mono text-lg font-bold">IDR 300K/hr</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section (Ported from Home.tsx) --}}
    <section class="border-t-2 border-black bg-[var(--color-court-yellow)] py-20">
        <div class="mx-auto max-w-4xl px-4 text-center">
            <h2 class="mb-6 font-display text-5xl uppercase text-black md:text-7xl">
                SIAP BERMAIN?
            </h2>
            <p class="mb-8 font-mono text-black">
                Booking lapangan sekarang dan nikmati pengalaman olahraga terbaik bersama teman-temanmu.
            </p>
            <div class="flex justify-center gap-4 flex-col sm:flex-row">
                <a href="{{ route('booking') }}"
                    class="font-mono font-bold uppercase transition-all duration-200 active:translate-x-[2px] active:translate-y-[2px] active:shadow-none border-2 border-black px-6 py-3 tracking-wider bg-[var(--color-court-clay)] text-white shadow-hard hover:bg-red-600">
                    BOOKING SEKARANG
                </a>
                <a href="{{ route('contact') }}"
                    class="font-mono font-bold uppercase transition-all duration-200 active:translate-x-[2px] active:translate-y-[2px] active:shadow-none border-2 border-black px-6 py-3 tracking-wider bg-white text-black shadow-hard hover:bg-black hover:text-white">
                    HUBUNGI KAMI
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
