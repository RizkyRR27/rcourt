<x-layouts.app :current-route="'tournament'">
    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-[var(--color-court-green)] pb-20 pt-20 text-[var(--color-court-paper)]">
        {{-- Background Decorative Grid --}}
        <div class="absolute inset-0 opacity-10 pointer-events-none"
            style="background-image: linear-gradient(#ffffff 1px, transparent 1px), linear-gradient(90deg, #ffffff 1px, transparent 1px); background-size: 40px 40px;">
        </div>

        <div class="relative mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <div
                class="mb-4 inline-flex items-center gap-2 border border-[var(--color-court-yellow)] px-3 py-1 text-xs font-bold uppercase tracking-widest text-[var(--color-court-yellow)]">
                <span class="text-lg">🏆</span>
                Kalender Kompetisi
            </div>

            <h1
                class="mb-6 font-display text-6xl uppercase leading-[0.9] tracking-tighter md:text-8xl lg:text-9xl text-white">
                TURNAMEN <br />
                <span class="text-stroke-white">RCOURT</span>
            </h1>

            <p class="mx-auto mb-10 max-w-2xl font-mono text-sm leading-relaxed text-gray-300 md:text-base">
                Jadwal resmi turnamen tahunan dan event spesial kami.
                Uji kemampuanmu, tunjukkan skillmu, dan menangkan hadiah menarik!
            </p>
        </div>
    </section>

    {{-- Grand Opening Tournament --}}
    <section class="py-20 bg-[var(--color-court-paper)]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-16 text-center">
                <span
                    class="mb-4 inline-block border-2 border-black bg-[var(--color-court-clay)] px-4 py-1 font-mono text-sm font-bold uppercase tracking-widest text-white shadow-hard-sm">
                    🎉 Event Spesial
                </span>
                <h2 class="mt-4 font-display text-5xl uppercase md:text-7xl text-black">
                    GRAND <span class="text-[var(--color-court-clay)]">OPENING</span>
                </h2>
                <p class="mx-auto mt-6 max-w-2xl font-mono text-gray-600">
                    Kompetisi pembukaan RCourt untuk SEMUA cabang olahraga.
                </p>
            </div>

            {{-- Grand Opening Card --}}
            <div class="border-2 border-black bg-white shadow-hard overflow-hidden">
                <div class="flex flex-col md:flex-row">
                    {{-- Left Panel --}}
                    <div
                        class="bg-[var(--color-court-green)] text-white p-10 md:w-1/3 flex flex-col justify-center border-b-2 md:border-b-0 md:border-r-2 border-black">
                        <div
                            class="inline-block border-2 border-white px-3 py-1 font-mono text-xs font-bold uppercase mb-4 w-fit">
                            Tahun Ini
                        </div>
                        <h3 class="font-display text-3xl uppercase text-accent mb-4">Grand Opening Tournament</h3>
                        <p class="font-mono text-sm text-gray-300 mb-6">Kompetisi pembukaan RCourt untuk SEMUA cabang
                            olahraga.</p>
                        <div class="border-2 border-white/30 bg-white/10 p-4">
                            <p class="font-mono text-xs text-gray-300 mb-1">Tanggal Pelaksanaan</p>
                            <p class="font-display text-2xl">5 - 12 Mei 2026</p>
                        </div>
                    </div>

                    {{-- Right Panel --}}
                    <div class="p-10 md:w-2/3">
                        <h3 class="font-display text-2xl uppercase mb-4 border-b-2 border-black pb-3">Detail Lomba</h3>
                        <ul class="space-y-3 font-mono text-sm text-gray-700 mb-6">
                            <li class="flex items-start gap-2">
                                <span class="text-[var(--color-court-clay)] font-bold">✔</span>
                                Kategori: <strong>UMUM (Tanpa Batasan Usia)</strong>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[var(--color-court-clay)] font-bold">✔</span>
                                Cabang: Badminton, Futsal, Basket, Tennis, Padel, Mini Soccer.
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-[var(--color-court-clay)] font-bold">✔</span>
                                Total Hadiah: Uang Tunai + Trophy Grand Opening.
                            </li>
                        </ul>
                        <div
                            class="border-2 border-[var(--color-court-clay)] bg-red-50 px-4 py-3 font-mono text-sm font-bold text-[var(--color-court-clay)]">
                            🚫 Selama tanggal 5-12 Mei 2026, booking reguler DITUTUP total.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- R CUP Annual --}}
    <section class="py-20 bg-white border-t-2 border-black">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-16 text-center">
                <span
                    class="mb-4 inline-block border-2 border-black bg-[var(--color-court-yellow)] px-4 py-1 font-mono text-sm font-bold uppercase tracking-widest shadow-hard-sm">
                    🏆 Piala Bergilir Tahunan
                </span>
                <h2 class="mt-4 font-display text-5xl uppercase md:text-7xl text-black">
                    R <span class="text-[var(--color-court-clay)]">CUP</span>
                </h2>
                <p class="mx-auto mt-6 max-w-2xl font-mono text-gray-600">
                    Ajang bergengsi antar Sekolah (SMA/Sederajat) & Klub U-18
                </p>
                <p class="mx-auto mt-2 max-w-2xl font-mono text-sm text-gray-500">
                    Buka pendaftaran setiap 1 bulan sebelum pertandingan, ditutup 2 minggu setelah dibuka.
                </p>
                <div
                    class="mt-4 inline-flex items-center gap-2 border-2 border-black bg-[var(--color-court-paper)] px-4 py-2 font-mono text-sm font-bold shadow-hard-sm">
                    🗓 Setiap Tanggal: 12 - 17 Januari
                </div>
            </div>

            <div class="grid gap-8 md:grid-cols-2">
                {{-- Piala Bergilir Category --}}
                <div class="border-2 border-black bg-white p-8 shadow-hard">
                    <h3 class="font-display text-xl uppercase mb-4 flex items-center gap-3">
                        <span
                            class="flex h-8 w-8 items-center justify-center border-2 border-black bg-[var(--color-court-green)] text-white font-mono text-sm font-bold">1</span>
                        Kategori Piala Bergilir (SMA/KU-18)
                    </h3>

                    <div class="border-2 border-gray-200 bg-[var(--color-court-paper)]">
                        <table class="w-full font-mono text-sm">
                            <thead class="border-b-2 border-black bg-black text-white">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider">Cabang
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider">Kategori
                                    </th>
                                    <th class="px-4 py-3 text-right text-xs font-bold uppercase tracking-wider">Kuota
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y-2 divide-gray-200">
                                <tr>
                                    <td class="px-4 py-3 font-bold">Futsal</td>
                                    <td class="px-4 py-3">Putra / Putri</td>
                                    <td class="px-4 py-3 text-right text-[var(--color-court-clay)] font-bold">Max 32 Tim
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-bold">Basket</td>
                                    <td class="px-4 py-3">Putra / Putri</td>
                                    <td class="px-4 py-3 text-right text-[var(--color-court-clay)] font-bold">Max 32 Tim
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 font-bold align-top">Badminton</td>
                                    <td class="px-4 py-3 text-xs space-y-1">
                                        <div>Ganda Putra</div>
                                        <div>Ganda Putri</div>
                                        <div>Single Putra</div>
                                        <div>Single Putri</div>
                                    </td>
                                    <td
                                        class="px-4 py-3 text-right text-[var(--color-court-clay)] font-bold align-top text-xs space-y-1">
                                        <div>32 Pasang</div>
                                        <div>32 Pasang</div>
                                        <div>32 Org</div>
                                        <div>32 Org</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Non-Piala Bergilir + Hadiah --}}
                <div class="flex flex-col gap-8">
                    <div class="border-2 border-black bg-white p-8 shadow-hard">
                        <h3 class="font-display text-xl uppercase mb-4 flex items-center gap-3">
                            <span
                                class="flex h-8 w-8 items-center justify-center border-2 border-black bg-gray-600 text-white font-mono text-sm font-bold">2</span>
                            Cabang Lain (Non-Piala Bergilir)
                        </h3>
                        <div class="border-2 border-[var(--color-court-yellow)] bg-yellow-50 p-4 font-mono text-sm">
                            <p><strong>Cabang:</strong> Tennis, Padel, Mini Soccer.</p>
                            <p><strong>Kategori:</strong> UMUM.</p>
                            <p class="mt-1 text-xs text-gray-500 italic">*Tidak masuk hitungan poin Piala Bergilir.</p>
                        </div>
                    </div>

                    <div class="border-2 border-black bg-white p-8 shadow-hard">
                        <h3 class="font-display text-xl uppercase mb-4">Total Hadiah</h3>
                        <div class="grid grid-cols-2 gap-3">
                            <div
                                class="border-2 border-black bg-[var(--color-court-paper)] p-3 font-mono text-sm font-bold shadow-hard-sm">
                                Piala Bergilir
                            </div>
                            <div
                                class="border-2 border-black bg-[var(--color-court-paper)] p-3 font-mono text-sm font-bold shadow-hard-sm">
                                Uang Pembinaan
                            </div>
                            <div
                                class="border-2 border-black bg-[var(--color-court-paper)] p-3 font-mono text-sm font-bold shadow-hard-sm">
                                Piagam Penghargaan
                            </div>
                            <div
                                class="border-2 border-black bg-[var(--color-court-paper)] p-3 font-mono text-sm font-bold shadow-hard-sm">
                                Merchandise RCourt
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('contact') }}"
                        class="block w-full border-2 border-black bg-[var(--color-court-clay)] px-6 py-4 text-center font-mono font-bold uppercase tracking-wider text-white shadow-hard transition-all duration-200 hover:bg-red-600 active:translate-x-[2px] active:translate-y-[2px] active:shadow-none">
                        Daftar R-CUP Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="border-t-2 border-black bg-[var(--color-court-yellow)] py-20">
        <div class="mx-auto max-w-4xl px-4 text-center">
            <h2 class="mb-6 font-display text-5xl uppercase text-black md:text-7xl">
                MAU IKUT TURNAMEN?
            </h2>
            <p class="mb-8 font-mono text-black">
                Hubungi kami untuk informasi pendaftaran turnamen dan kompetisi yang akan datang.
            </p>
            <div class="flex justify-center gap-4 flex-col sm:flex-row">
                <a href="{{ route('contact') }}"
                    class="font-mono font-bold uppercase transition-all duration-200 active:translate-x-[2px] active:translate-y-[2px] active:shadow-none border-2 border-black px-6 py-3 tracking-wider bg-[var(--color-court-clay)] text-white shadow-hard hover:bg-red-600">
                    HUBUNGI KAMI
                </a>
                <a href="{{ route('booking') }}"
                    class="font-mono font-bold uppercase transition-all duration-200 active:translate-x-[2px] active:translate-y-[2px] active:shadow-none border-2 border-black px-6 py-3 tracking-wider bg-white text-black shadow-hard hover:bg-black hover:text-white">
                    BOOKING LAPANGAN
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
