<x-layouts.app :current-route="'home'">

        <!-- 1. HERO SECTION (Desain Retro Brutalist Anda) -->
     
    <section class="relative overflow-hidden bg-[var(--color-court-green)] pb-32 pt-20 text-[var(--color-court-paper)]">

        {{-- Background Grid Pattern --}}
        <div class="absolute inset-0 opacity-10 pointer-events-none"
            style="background-image: linear-gradient(#ffffff 1px, transparent 1px), linear-gradient(90deg, #ffffff 1px, transparent 1px); background-size: 40px 40px;">
        </div>

        <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            {{-- Badge Live --}}
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
                Pusat olahraga dengan fasilitas terbaik. Nikmati kemudahan booking lapangan Kami secara online.
                Jangan biarkan jadwal kosong menghalangi permainanmu.
            </p>

            <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                <a href="{{ route('booking') }}"
                    class="font-mono font-bold uppercase transition-all duration-200 active:translate-x-[2px] active:translate-y-[2px] active:shadow-none border-2 border-black px-6 py-3 text-sm md:text-base tracking-wider bg-[var(--color-court-clay)] text-white shadow-hard hover:bg-red-600 min-w-[200px] text-center">
                    BOOKING SEKARANG
                </a>
                <a href="/facilities"
                    class="font-mono font-bold uppercase transition-all duration-200 active:translate-x-[2px] active:translate-y-[2px] active:shadow-none border-2 border-[var(--color-court-paper)] px-6 py-3 text-sm md:text-base tracking-wider bg-transparent text-[var(--color-court-paper)] shadow-hard hover:bg-[var(--color-court-paper)] hover:text-[var(--color-court-green)] min-w-[200px] text-center">
                    LIHAT FASILITAS
                </a>
            </div>
        </div>
    </section>

    {{-- Booking Widget (Keep as is) --}}
    <x-booking-widget />

    {{-- 2. LOYALTY SECTION (HANYA MUNCUL JIKA LOGIN) --}}
    @auth
        <section class="py-12 bg-[var(--color-court-paper)] border-b-2 border-black">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="bg-white border-4 border-black p-6 md:p-8 shadow-hard relative overflow-hidden">

                    {{-- Hiasan Label --}}
                    <div class="absolute top-0 right-0 bg-black text-white px-4 py-2 font-mono text-xs font-bold uppercase">
                        MEMBER AREA
                    </div>

                    <div class="mb-8">
                        <h2 class="font-display text-4xl md:text-5xl uppercase text-black">
                            PROGRESS <span class="text-[var(--color-court-clay)]">JUARA</span>
                        </h2>
                        <p class="font-mono text-gray-600 mt-2">
                            Kumpulkan 30 Jam bermain di setiap cabang olahraga untuk mendapatkan Hadiah Spesial!
                        </p>
                    </div>

                    {{-- Grid Progress Bar --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @php
                            // Daftar Olahraga Manual (atau ambil dari DB jika ada tabel types)
                            $sports = ['badminton', 'futsal', 'mini_soccer', 'basket_indoor', 'tennis', 'padel'];
                        @endphp

                        @foreach ($sports as $sport)
                            @php
                                // Ambil data progress user
                                $prog = \App\Models\LoyaltyProgress::where('user_id', Auth::id())
                                    ->where('sport_type', $sport)
                                    ->first();
                                $current = $prog ? $prog->total_hours : 0;

                                // Batasi max 100% untuk visual
                                $percent = min(100, ($current / 30) * 100);
                            @endphp

                            <div
                                class="border-2 border-black {{ $current >= 30 ? 'bg-yellow-50 ring-2 ring-[var(--color-court-yellow)] cursor-pointer' : 'bg-gray-50' }} p-4 transition-transform hover:-translate-y-1 group">
                                <div class="flex justify-between items-end mb-2">
                                    <span
                                        class="font-mono font-bold uppercase text-sm">{{ str_replace('_', ' ', $sport) }}</span>
                                    @if ($current >= 30)
                                        <span
                                            class="font-mono text-xs font-bold bg-[var(--color-court-green)] text-white px-2 py-0.5 relative">
                                            <span class="group-hover:hidden">✓ SELESAI</span>
                                            <span class="hidden group-hover:inline">CLAIM</span>
                                        </span>
                                    @else
                                        <span class="font-mono text-xs font-bold bg-black text-white px-2 py-0.5">
                                            {{ $current }} / 30 JAM
                                        </span>
                                    @endif
                                </div>

                                {{-- Visual Bar --}}
                                <div class="w-full h-4 bg-gray-200 border-2 border-black relative">
                                    <div class="h-full {{ $current >= 30 ? 'bg-[var(--color-court-yellow)]' : 'bg-[var(--color-court-green)]' }} transition-all duration-1000"
                                        style="width: {{ $percent }}%"></div>
                                </div>

                                @if ($current >= 25 && $current < 30)
                                    <p class="text-[10px] text-red-600 font-bold mt-1 text-right animate-pulse">Sedikit
                                        lagi!</p>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    {{-- NOTIFIKASI KLAIM HADIAH --}}
                    @php
                        $pendingRewards = \App\Models\UserReward::where('user_id', Auth::id())
                            ->where('reward_type', 'pending')
                            ->count();
                    @endphp

                    @if ($pendingRewards > 0)
                        <div
                            class="mt-8 bg-yellow-100 border-2 border-dashed border-black p-4 flex flex-col md:flex-row items-center justify-between gap-4 animate-pulse">
                            <div class="flex items-center gap-4">
                                <span class="text-4xl">🎁</span>
                                <div>
                                    <h3 class="font-display text-xl uppercase">Selamat! Anda punya {{ $pendingRewards }}
                                        Hadiah</h3>
                                    <p class="font-mono text-xs text-gray-600">Diskon, Tumbler, atau Voucher Cukur menanti!
                                    </p>
                                </div>
                            </div>
                            <a href="{{ route('reward.index') }}"
                                class="bg-red-600 text-white font-mono font-bold uppercase px-6 py-2 border-2 border-black shadow-hard hover:bg-red-700 hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px] transition-all">
                                KLAIM SEKARANG
                            </a>
                        </div>
                    @endif

                </div>
            </div>
        </section>
    @endauth

    {{-- 3. FACILITIES SECTION (Desain Grid Card) --}}
    <section id="facilities" class="py-20 bg-[var(--color-court-paper)]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-16 text-center">
                <span
                    class="mb-4 inline-block border-2 border-black bg-[var(--color-court-yellow)] px-4 py-1 font-mono text-sm font-bold uppercase tracking-widest shadow-hard-sm">
                    Lapangan Kami
                </span>
                <h2 class="mt-4 font-display text-5xl uppercase md:text-7xl text-black">
                    CHOOSE YOUR <span class="text-stroke-black md:text-black">ARENA</span>
                </h2>
                <p class="mx-auto mt-6 max-w-2xl font-mono text-gray-600">
                    Dilengkapi dengan fasilitas standar internasional untuk pengalaman olahraga terbaik Anda.
                    No excuses.
                </p>
            </div>

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($facilities as $facility)
                    <div
                        class="group relative flex flex-col justify-between border-2 border-black bg-white p-8 shadow-hard transition-all duration-300 hover:-translate-y-2 hover:shadow-[8px_8px_0px_0px_var(--color-court-clay)]">
                        <div>
                            <div class="mb-6 flex items-start justify-between">
                                <div
                                    class="flex h-14 w-14 items-center justify-center border-2 border-black bg-[var(--color-court-paper)] text-black">
                                    <span class="text-2xl">{{ $facility['icon'] }}</span>
                                </div>
                                <div class="border-2 border-black bg-black px-2 py-1 text-white">
                                    <span
                                        class="font-mono text-xs font-bold uppercase">{{ $facility['category'] }}</span>
                                </div>
                            </div>
                            <h3 class="mb-2 font-display text-3xl uppercase tracking-tight">{{ $facility['label'] }}
                            </h3>
                            <p class="mb-6 font-mono text-sm text-gray-600">{{ $facility['description'] }}</p>
                        </div>
                        <div class="mt-auto flex items-end justify-between border-t-2 border-gray-100 pt-6">
                            <div>
                                <span
                                    class="block font-display text-5xl text-[var(--color-court-clay)]">{{ $facility['count'] }}</span>
                                <span class="font-mono text-xs font-bold uppercase text-black">Lapangan</span>
                            </div>
                            <div class="text-right">
                                <span class="font-mono text-xs text-gray-500">Starts from</span>
                                <p class="font-mono text-lg font-bold">{{ $facility['price'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 4. CTA SECTION --}}
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
