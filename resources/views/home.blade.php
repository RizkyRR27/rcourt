<x-layouts.app :current-route="'home'">
    {{-- Hero Section (Ported from Hero.tsx) --}}
    <section class="relative overflow-hidden bg-[var(--color-court-green)] pb-32 pt-20 text-[var(--color-court-paper)]">

        {{-- Background Decorative Grid --}}
        <div class="absolute inset-0 opacity-10 pointer-events-none"
            style="background-image: linear-gradient(#ffffff 1px, transparent 1px), linear-gradient(90deg, #ffffff 1px, transparent 1px); background-size: 40px 40px;">
        </div>

        <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <div
                class="mb-4 inline-flex items-center gap-2 border border-[var(--color-court-yellow)] px-3 py-1 text-xs font-bold uppercase tracking-widest text-[var(--color-court-yellow)]">
                <span class="h-2 w-2 bg-red-500 rounded-full animate-pulse"></span>
                Live Booking Available
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
