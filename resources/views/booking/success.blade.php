<x-layouts.app current-route="booking">
    <div class="flex min-h-[80vh] items-center justify-center bg-[var(--color-court-paper)] px-4 py-12">
        <div class="animate-slide-up w-full max-w-lg border-2 border-black bg-white p-8 shadow-hard"
            style="animation-duration: 0.5s;">
            {{-- Header --}}
            <div class="mb-8 text-center">
                <div
                    class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-full border-2 border-black bg-[var(--color-court-green)] text-white shadow-hard-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h1 class="font-display text-4xl uppercase tracking-tight text-black">Booking Berhasil!</h1>
                <p class="mt-2 font-mono text-sm text-gray-500">Terima kasih telah melakukan pemesanan.</p>
            </div>

            {{-- Ticket / Receipt Content --}}
            <div class="mb-8 border-2 border-black bg-[var(--color-court-paper)] p-6">
                <div
                    class="flex flex-col items-center justify-center gap-2 border-b-2 border-dashed border-black/30 pb-6 text-center">
                    <span class="font-mono text-xs font-bold uppercase text-gray-500">KODE BOOKING</span>
                    <span
                        class="font-mono text-3xl font-bold tracking-widest text-[var(--color-court-primary)]">#{{ $booking->id }}</span>
                </div>

                <div class="pt-6 text-center">
                    <span class="mb-2 block font-mono text-xs font-bold uppercase text-gray-500">STATUS
                        PEMBAYARAN</span>
                    @if ($booking->status == 'pending')
                        <span
                            class="inline-block border-2 border-black bg-[var(--color-court-yellow)] px-3 py-1 font-mono text-sm font-bold uppercase tracking-wider text-black shadow-hard-sm">
                            PENDING
                        </span>
                    @elseif ($booking->status == 'approved')
                        <span
                            class="inline-block border-2 border-black bg-[var(--color-court-green)] px-3 py-1 font-mono text-sm font-bold uppercase tracking-wider text-white shadow-hard-sm">
                            APPROVED
                        </span>
                    @else
                        <span
                            class="inline-block border-2 border-black bg-red-600 px-3 py-1 font-mono text-sm font-bold uppercase tracking-wider text-white shadow-hard-sm">
                            REJECTED
                        </span>
                    @endif
                </div>

                @if ($booking->status == 'approved')
                    <div class="mt-6 border-t-2 border-dashed border-black/30 pt-6 text-center">
                        <span class="mb-3 block font-mono text-xs font-bold uppercase text-gray-500">KODE TIKET</span>
                        <div class="mx-auto inline-block border-2 border-black bg-white p-3 shadow-hard-sm">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode(route('history.ticket', $booking->id)) }}"
                                alt="QR Code Tiket" width="150" height="150" class="block">
                        </div>
                        <p class="mt-3 font-mono text-xs text-gray-500">Tunjukkan QR ini ke petugas di lapangan</p>
                    </div>
                @endif
            </div>

            {{-- Warning Message --}}
            <div class="mb-8 border-l-4 border-red-600 bg-red-100 p-4">
                <div class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 text-red-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <div>
                        <h4 class="font-display text-lg uppercase text-red-700">PENTING!</h4>
                        <p class="font-mono text-xs font-bold uppercase leading-relaxed text-red-800">
                            DIMOHON UNTUK PARA PEMAIN DATANG TEPAT WAKTU
                        </p>
                        <p class="mt-1 font-mono text-xs text-red-700">
                            Keterlambatan dapat mengurangi waktu bermain Anda. Silakan tunjukkan Kode Booking ini ke
                            petugas di lapangan.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="space-y-3">


                <a href="{{ route('history') }}"
                    class="flex w-full items-center justify-center border-2 border-black bg-white px-6 py-4 font-mono font-bold uppercase text-black shadow-hard transition-all hover:-translate-y-1 hover:bg-gray-100 active:translate-y-0 active:shadow-none">
                    Lihat Riwayat Booking
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
