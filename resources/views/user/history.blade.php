<x-layouts.app>
    <div class="max-w-6xl mx-auto px-4 py-12">
        <h2 class="font-display text-4xl uppercase mb-8">Riwayat <span class="text-red-600">Pertandingan</span></h2>

        @if ($bookings->isEmpty())
            <div class="border-2 border-black bg-yellow-50 p-8 text-center font-mono">
                <p class="mb-4">Belum ada riwayat booking.</p>
                <a href="{{ route('booking') }}"
                    class="mt-4 inline-block border-2 border-black bg-[var(--color-court-clay)] px-6 py-3 font-mono font-bold uppercase text-white shadow-hard transition-all hover:-translate-y-1 hover:bg-red-700 active:translate-y-0 active:shadow-none">Main
                    Sekarang Yuk!</a>
            </div>
        @else
            <div class="overflow-x-auto border-2 border-black shadow-hard">
                <table class="w-full font-mono text-sm text-left">
                    <thead class="bg-black text-white uppercase">
                        <tr>
                            <th class="p-3">Kode</th>
                            <th class="p-3">Tanggal</th>
                            <th class="p-3">Lapangan</th>
                            <th class="p-3">Jam</th>
                            <th class="p-3">Harga</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y-2 divide-black">
                        @foreach ($bookings as $booking)
                            <tr class="hover:bg-gray-100">
                                <td class="p-3 font-bold text-xs">{{ $booking->code }}</td>
                                <td class="p-3">{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</td>
                                <td class="p-3 font-bold">{{ $booking->court->name }}</td>
                                <td class="p-3">{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                                <td class="p-3">Rp {{ number_format($booking->total_price) }}</td>
                                <td class="p-3">
                                    @if ($booking->status == 'approved')
                                        <span
                                            class="bg-green-200 text-green-800 px-2 py-1 border border-black text-xs font-bold">LUNAS</span>
                                    @elseif($booking->status == 'rejected')
                                        <span
                                            class="bg-red-200 text-red-800 px-2 py-1 border border-black text-xs font-bold">DITOLAK</span>
                                    @else
                                        <span
                                            class="bg-yellow-200 text-yellow-800 px-2 py-1 border border-black text-xs font-bold">PENDING</span>
                                    @endif
                                </td>
                                <td class="p-3">
                                    <a href="{{ route('booking.success', $booking->id) }}"
                                        class="inline-block border-2 border-black bg-white px-3 py-1 font-mono text-xs font-bold uppercase text-black shadow-hard-sm transition-all hover:-translate-y-[1px] hover:bg-[var(--color-court-yellow)] active:translate-y-0 active:shadow-none">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($bookings->hasPages())
                <div class="mt-6 flex justify-center">
                    <nav class="flex items-center gap-2 font-mono text-sm">
                        {{-- Previous --}}
                        @if ($bookings->onFirstPage())
                            <span
                                class="px-3 py-2 border-2 border-gray-300 text-gray-300 bg-gray-50 font-bold uppercase cursor-not-allowed">&laquo;
                                Prev</span>
                        @else
                            <a href="{{ $bookings->previousPageUrl() }}"
                                class="px-3 py-2 border-2 border-black bg-white font-bold uppercase hover:bg-[var(--color-court-yellow)] transition-all shadow-hard-sm">&laquo;
                                Prev</a>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach ($bookings->getUrlRange(1, $bookings->lastPage()) as $page => $url)
                            @if ($page == $bookings->currentPage())
                                <span
                                    class="px-3 py-2 border-2 border-black bg-black text-white font-bold">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-3 py-2 border-2 border-black bg-white font-bold hover:bg-[var(--color-court-yellow)] transition-all shadow-hard-sm">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if ($bookings->hasMorePages())
                            <a href="{{ $bookings->nextPageUrl() }}"
                                class="px-3 py-2 border-2 border-black bg-white font-bold uppercase hover:bg-[var(--color-court-yellow)] transition-all shadow-hard-sm">Next
                                &raquo;</a>
                        @else
                            <span
                                class="px-3 py-2 border-2 border-gray-300 text-gray-300 bg-gray-50 font-bold uppercase cursor-not-allowed">Next
                                &raquo;</span>
                        @endif
                    </nav>
                </div>
            @endif
        @endif
    </div>
</x-layouts.app>
