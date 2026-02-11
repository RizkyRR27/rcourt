<x-layouts.app :current-route="'contact'">
    <div class="flex min-h-[60vh] flex-col items-center justify-center bg-[var(--color-court-paper)] px-4 text-center">
        <h1 class="font-display text-6xl uppercase text-black">Hubungi Kami</h1>
        <p class="mt-4 max-w-md font-mono text-gray-600">
            WhatsApp: +62 812 3456 7890<br />
            Email: info@rcourt.id
        </p>
        <a href="{{ route('home') }}"
            class="mt-8 border-2 border-black bg-[var(--color-court-clay)] px-6 py-2 font-mono font-bold text-white shadow-hard hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none transition-all">
            KEMBALI KE HOME
        </a>
    </div>
</x-layouts.app>
