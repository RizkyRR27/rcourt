<x-layouts.app current-route="home">
    {{-- HERO SECTION --}}
    <div class="relative bg-black text-white py-24 px-6 text-center border-b-4 border-[var(--color-court-clay)]">
        <h1 class="font-display text-6xl md:text-8xl uppercase mb-4 text-[var(--color-court-yellow)]">
            Main <span class="text-white">Sepuasnya</span>
        </h1>
        <p class="font-mono text-lg md:text-xl max-w-2xl mx-auto mb-8 text-gray-300">
            Booking lapangan Badminton, Futsal, Basket, dan Mini Soccer dengan mudah. Jadilah juara di arena kami!
        </p>

        @auth
            <a href="{{ route('booking') }}"
                class="inline-block bg-[var(--color-court-clay)] text-white px-8 py-4 font-mono font-bold uppercase border-2 border-white hover:bg-red-700 transition-all transform hover:scale-105 shadow-hard">
                Booking Sekarang
            </a>
        @else
            <div class="flex justify-center gap-4">
                <a href="{{ route('login') }}"
                    class="bg-white text-black px-8 py-3 font-mono font-bold uppercase border-2 border-black hover:bg-gray-200 shadow-hard">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                    class="bg-[var(--color-court-clay)] text-white px-8 py-3 font-mono font-bold uppercase border-2 border-white hover:bg-red-700 shadow-hard">
                    Daftar
                </a>
            </div>
        @endauth
    </div>

    {{-- STATISTIK BAR (Retro Style) --}}
    <div class="bg-[var(--color-court-paper)] border-b-2 border-black py-8">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="border-2 border-black bg-white p-4 shadow-hard" x-data="{ current: 0, target: {{ $totalCourts }} }" x-init="let step = Math.ceil(target / 100);
            if (step < 1) step = 1;
            let timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
            }, 40);">
                <h3 class="font-display text-4xl"><span x-text="current"></span>+</h3>
                <p class="font-mono text-xs uppercase text-gray-500">Lapangan Tersedia</p>
            </div>
            <div class="border-2 border-black bg-white p-4 shadow-hard" x-data="{ current: 0, target: {{ $totalMembers }} }" x-init="let step = Math.ceil(target / 100);
            if (step < 1) step = 1;
            let timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
            }, 40);">
                <h3 class="font-display text-4xl"><span x-text="current"></span>+</h3>
                <p class="font-mono text-xs uppercase text-gray-500">Member Aktif</p>
            </div>
            <div class="border-2 border-black bg-white p-4 shadow-hard" x-data="{ current: 0, target: {{ $totalBookings }} }" x-init="let step = Math.ceil(target / 100);
            if (step < 1) step = 1;
            let timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
            }, 40);">
                <h3 class="font-display text-4xl"><span x-text="current"></span>+</h3>
                <p class="font-mono text-xs uppercase text-gray-500">Pertandingan Sukses</p>
            </div>
        </div>
    </div>



    {{-- FEATURES SECTION --}}
    <div class="py-16 px-4 bg-white border-b-2 border-black">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="font-display text-4xl md:text-5xl uppercase mb-12">Kenapa <span
                    class="text-[var(--color-court-clay)]">RCourt?</span></h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Feature 1 --}}
                <div
                    class="p-6 border-2 border-black bg-[var(--color-court-paper)] shadow-hard hover:-translate-y-2 hover:shadow-hard-lg transition-transform">
                    <div class="text-6xl mb-4">🏆</div>
                    <h3 class="font-display text-xl uppercase mb-2">Standar Internasional</h3>
                    <p class="font-mono text-sm text-gray-600">Lantai karpet vinyl & rumput sintetis kualitas terbaik
                        untuk
                        performa maksimal.</p>
                </div>

                {{-- Feature 2 --}}
                <div
                    class="p-6 border-2 border-black bg-[var(--color-court-paper)] shadow-hard hover:-translate-y-2 hover:shadow-hard-lg transition-transform">
                    <div class="text-6xl mb-4">📍</div>
                    <h3 class="font-display text-xl uppercase mb-2">Lokasi Strategis</h3>
                    <p class="font-mono text-sm text-gray-600">Mudah diakses dari pusat kota, parkir luas, dan aman 24
                        jam.
                    </p>
                </div>

                {{-- Feature 3 --}}
                <div
                    class="p-6 border-2 border-black bg-[var(--color-court-paper)] shadow-hard hover:-translate-y-2 hover:shadow-hard-lg transition-transform">
                    <div class="text-6xl mb-4">💡</div>
                    <h3 class="font-display text-xl uppercase mb-2">Fasilitas Lengkap</h3>
                    <p class="font-mono text-sm text-gray-600">Wi-Fi, Kantin, Musholla, dan Ruang Ganti yang bersih dan
                        nyaman.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- PROMO LOYALTY SECTION --}}
    <div class="py-16 px-4 bg-yellow-50 border-b-2 border-black">
        <div
            class="max-w-5xl mx-auto border-4 border-black bg-white p-8 md:p-12 shadow-hard-lg relative overflow-hidden">
            <div
                class="absolute top-0 right-0 bg-red-600 text-white font-mono font-bold px-12 py-2 transform rotate-45 translate-x-14 translate-y-6 border-2 border-black">
                HOT PROMO
            </div>

            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="text-6xl">🏆</div>
                <div>
                    <h2 class="font-display text-4xl uppercase mb-2">Tantangan 30 Jam!</h2>
                    <p class="font-mono text-gray-700 mb-4">
                        Tunjukkan dedikasimu! Akumulasikan total bermain hingga
                        <span class="font-bold bg-yellow-200 px-1">30 JAM</span>
                        di cabang olahraga apapun, dan dapatkan status
                        <span class="font-bold text-red-600">VIP MEMBER</span>
                        (Diskon 10% seumur hidup!).
                    </p>

                    @auth
                        @php
                            // Hitung Jam Main User yang Sedang Login
                            $myHours = \App\Models\Booking::where('user_id', Auth::id())
                                ->where('status', 'approved')
                                ->sum(\DB::raw('TIMESTAMPDIFF(HOUR, start_time, end_time)'));
                            $progress = min(100, ($myHours / 30) * 100);
                        @endphp

                        <div class="bg-gray-200 h-6 w-full border-2 border-black rounded-full overflow-hidden relative">
                            <div class="bg-[var(--color-court-green)] h-full" style="width:{{ $progress }}%;"></div>
                            <span class="absolute inset-0 flex items-center justify-center font-mono text-xs font-bold">
                                Progress Anda: {{ $myHours }} / 30 Jam
                            </span>
                        </div>
                    @else
                        <p class="font-mono text-xs text-red-500">* Login untuk melihat progress Anda.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    {{-- TESTIMONIALS SECTION --}}
    <div class="py-16 px-4 bg-[var(--color-court-paper)] border-b-2 border-black">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="font-display text-4xl md:text-5xl uppercase mb-12">Apa Kata <span
                    class="text-[var(--color-court-clay)]">Atlet?</span></h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Testimoni 1 --}}
                <div class="bg-white p-6 border-2 border-black shadow-hard relative">
                    <div class="absolute -top-4 -left-4 text-6xl text-[var(--color-court-yellow)] opacity-50">"</div>
                    <p class="font-mono text-sm italic mb-4">"Lapangannya gokil! Karpetnya empuk banget, lutut aman buat
                        main 3 set berturut-turut. Recommended!"</p>
                    <div class="font-bold uppercase text-xs border-t-2 border-black pt-2">Budi Santoso - Badminton Lover
                    </div>
                </div>

                {{-- Testimoni 2 --}}
                <div class="bg-white p-6 border-2 border-black shadow-hard relative">
                    <div class="absolute -top-4 -left-4 text-6xl text-[var(--color-court-yellow)] opacity-50">"</div>
                    <p class="font-mono text-sm italic mb-4">"Mini Soccernya mantap. Rumput sintetisnya standar FIFA.
                        Booking gampang, admin ramah."</p>
                    <div class="font-bold uppercase text-xs border-t-2 border-black pt-2">FC Harimau - Tim Futsal</div>
                </div>

                {{-- Testimoni 3 --}}
                <div class="bg-white p-6 border-2 border-black shadow-hard relative">
                    <div class="absolute -top-4 -left-4 text-6xl text-[var(--color-court-yellow)] opacity-50">"</div>
                    <p class="font-mono text-sm italic mb-4">"Tempat paling asik buat sparing basket. Ringnya enak,
                        bolanya
                        juga baru-baru. Top markotop!"</p>
                    <div class="font-bold uppercase text-xs border-t-2 border-black pt-2">Dimas - Basket Addict</div>
                </div>
            </div>
        </div>
    </div>

    {{-- FAQ SECTION --}}
    <div class="py-16 px-4 bg-white" x-data="{ active: null }">
        <div class="max-w-3xl mx-auto">
            <h2 class="font-display text-4xl text-center uppercase mb-8">Pertanyaan <span
                    class="text-[var(--color-court-clay)]">Umum</span></h2>

            <div class="space-y-4">
                {{-- FAQ 1 --}}
                <div class="border-2 border-black shadow-sm">
                    <button @click="active === 1 ? active = null : active = 1"
                        class="w-full text-left px-6 py-4 font-mono font-bold uppercase flex justify-between items-center bg-gray-50 hover:bg-[var(--color-court-yellow)] transition-colors">
                        <span>Bagaimana cara booking lapangan?</span>
                        <span x-text="active === 1 ? '-' : '+'" class="text-xl"></span>
                    </button>
                    <div x-show="active === 1" x-collapse
                        class="px-6 py-4 font-mono text-sm text-gray-700 bg-white border-t-2 border-black">
                        Silakan login, pilih menu "Booking Lapangan", pilih tanggal dan jam yang tersedia, lalu lakukan
                        pembayaran via transfer atau COD.
                    </div>
                </div>

                {{-- FAQ 2 --}}
                <div class="border-2 border-black shadow-sm">
                    <button @click="active === 2 ? active = null : active = 2"
                        class="w-full text-left px-6 py-4 font-mono font-bold uppercase flex justify-between items-center bg-gray-50 hover:bg-[var(--color-court-yellow)] transition-colors">
                        <span>Apakah bisa membatalkan booking?</span>
                        <span x-text="active === 2 ? '-' : '+'" class="text-xl"></span>
                    </button>
                    <div x-show="active === 2" x-collapse
                        class="px-6 py-4 font-mono text-sm text-gray-700 bg-white border-t-2 border-black">
                        Pembatalan maksimal H-1 sebelum jadwal main. Biaya akan dikembalikan 100% ke saldo member atau
                        diproses refund (potongan admin 5%).
                    </div>
                </div>

                {{-- FAQ 3 --}}
                <div class="border-2 border-black shadow-sm">
                    <button @click="active === 3 ? active = null : active = 3"
                        class="w-full text-left px-6 py-4 font-mono font-bold uppercase flex justify-between items-center bg-gray-50 hover:bg-[var(--color-court-yellow)] transition-colors">
                        <span>Apa saja metode pembayaran yang tersedia?</span>
                        <span x-text="active === 3 ? '-' : '+'" class="text-xl"></span>
                    </button>
                    <div x-show="active === 3" x-collapse
                        class="px-6 py-4 font-mono text-sm text-gray-700 bg-white border-t-2 border-black">
                        Kami menerima Transfer Bank (BCA, Mandiri, BNI), E-Wallet (Gopay, OVO, Dana), dan pembayaran
                        tunai
                        di kasir (COD) dengan DP minimal 50%.
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
