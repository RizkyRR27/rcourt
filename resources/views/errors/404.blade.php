<x-layouts.app title="Halaman Tidak Ditemukan">
    <div class="min-h-[60vh] flex flex-col items-center justify-center text-center px-4 py-12 bg-white">

        {{-- 404 Visual --}}
        <div class="relative mb-8">
            <h1 class="font-display text-[150px] leading-none text-[var(--color-court-clay)] select-none">
                404
            </h1>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-black text-white font-mono font-bold text-xl px-4 py-1 rotate-[-5deg] border-2 border-white shadow-hard">
                OUT!
            </div>
        </div>

        {{-- Message --}}
        <h2 class="font-display text-4xl uppercase mb-4">Bola Keluar Lapangan!</h2>
        <p class="font-mono text-gray-600 max-w-md mx-auto mb-8">
            Halaman yang Anda cari tidak ditemukan. Mungkin Anda salah mengetik URL atau halamannya sudah dipindahkan.
        </p>

        {{-- Action Button --}}
        <a href="{{ route('home') }}"
            class="inline-block bg-[var(--color-court-yellow)] text-black px-8 py-3 font-mono font-bold uppercase border-2 border-black hover:bg-[var(--color-court-green)] hover:text-white transition-all transform hover:-translate-y-1 shadow-hard hover:shadow-hard-lg">
            &larr; Kembali ke Lapangan
        </a>

    </div>
</x-layouts.app>
