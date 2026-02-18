<x-layouts.app title="Akses Ditolak">
    <div class="min-h-[60vh] flex flex-col items-center justify-center text-center px-4 py-12 bg-white">

        {{-- 403 Visual --}}
        <div class="relative mb-8">
            <h1 class="font-display text-[150px] leading-none text-[var(--color-court-clay)] select-none">
                403
            </h1>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-black text-white font-mono font-bold text-xl px-4 py-1 rotate-[-5deg] border-2 border-white shadow-hard">
                FOUL!
            </div>
        </div>

        {{-- Message --}}
        <h2 class="font-display text-4xl uppercase mb-4">Pelanggaran Area!</h2>
        <p class="font-mono text-gray-600 max-w-md mx-auto mb-8">
            Maaf, Anda tidak memiliki tiket untuk masuk ke area ini. Area ini khusus untuk wasit dan pengelola.
        </p>

        {{-- Action Button --}}
        <a href="{{ route('home') }}"
            class="inline-block bg-[var(--color-court-yellow)] text-black px-8 py-3 font-mono font-bold uppercase border-2 border-black hover:bg-[var(--color-court-green)] hover:text-white transition-all transform hover:-translate-y-1 shadow-hard hover:shadow-hard-lg">
            &larr; Kembali ke Lapangan
        </a>

    </div>
</x-layouts.app>
