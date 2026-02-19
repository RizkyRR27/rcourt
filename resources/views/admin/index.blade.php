<x-layouts.admin>
    <div class="w-full px-6 py-12" x-data="{ showRejectModal: false, rejectAction: '', showExtendModal: false, extendAction: '', extendCode: '', maxExtendHours: 4 }">
        <div class="mb-8">
            <h1 class="font-display text-4xl uppercase text-black">Kelola <span
                    class="text-[var(--color-court-clay)]">Booking</span></h1>
            <p class="mt-1 font-mono text-sm text-gray-500">Approve atau reject booking yang masuk</p>
        </div>

        @if (session('success'))
            <div class="mb-8 border-2 border-black bg-green-200 p-4 font-mono font-bold text-green-900 shadow-hard-sm">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-8 border-2 border-black bg-red-200 p-4 font-mono font-bold text-red-900 shadow-hard-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="border-2 border-black bg-white shadow-hard overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left font-mono text-sm">
                    <thead class="bg-black text-white uppercase">
                        <tr>
                            <th class="p-4">KODE</th>
                            <th class="p-4">Penyewa</th>
                            <th class="p-4">Jadwal Main</th>
                            <th class="p-4">Total</th>
                            <th class="p-4">Diskon</th>
                            <th class="p-4">Bukti Bayar</th>
                            <th class="p-4 text-center">Metode Bayar</th>
                            <th class="p-4 text-center">Status</th>
                            <th class="p-4 text-center">Extend</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-2 divide-black bg-white">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4 font-bold">{{ $booking->code }}</td>
                                <td class="p-4">
                                    <div class="font-bold uppercase">{{ $booking->user->name ?? 'User Hapus' }}</div>
                                    <div class="text-xs text-gray-500">{{ $booking->user->email ?? '-' }}</div>
                                </td>
                                <td class="p-4">
                                    <div class="font-bold text-[var(--color-court-clay)]">{{ $booking->court->name }}
                                    </div>
                                    <div class="text-xs">{{ $booking->date }}</div>
                                    <div class="font-bold">{{ $booking->start_time }} - {{ $booking->end_time }}</div>
                                </td>
                                <td class="p-4">
                                    <div class="font-bold">Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                                    </div>
                                </td>
                                <td class="p-4">
                                    @if ($booking->discount > 0)
                                        <span
                                            class="inline-block border border-black bg-[#39ff14] px-2 py-1 text-xs font-bold text-black">{{ $booking->discount }}%</span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    @if ($booking->payment_proof)
                                        <a href="{{ asset('storage/' . $booking->payment_proof) }}" target="_blank"
                                            class="inline-block border border-black bg-blue-100 px-2 py-1 text-xs font-bold text-blue-800 hover:bg-blue-200">
                                            Lihat Bukti 📎
                                        </a>
                                    @else
                                        <span
                                            class="border border-black bg-red-100 px-2 py-1 text-xs font-bold text-red-800">Tanpa
                                            Bukti</span>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    <span
                                        class="inline-block border border-black bg-gray-100 px-2 py-1 text-xs font-bold uppercase">{{ $booking->payment_method }}</span>
                                </td>
                                <td class="p-4 text-center">
                                    @if ($booking->status == 'pending')
                                        <span
                                            class="inline-block border border-black bg-[var(--color-court-yellow)] px-2 py-1 text-xs font-bold uppercase text-black">Pending</span>
                                    @elseif($booking->status == 'approved')
                                        <span
                                            class="inline-block border border-black bg-[var(--color-court-green)] px-2 py-1 text-xs font-bold uppercase text-white">Approved</span>
                                    @else
                                        <span
                                            class="inline-block border border-black bg-red-600 px-2 py-1 text-xs font-bold uppercase text-white">Rejected</span>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    @if ($booking->is_extended)
                                        <div>
                                            <span
                                                class="inline-block border border-black bg-blue-100 px-2 py-1 text-xs font-bold text-blue-800">✔
                                                Extended</span>
                                        </div>
                                        <div class="mt-1 text-xs font-bold text-blue-700">
                                            +Rp {{ number_format($booking->extend_cost, 0, ',', '.') }}
                                        </div>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    @if ($booking->status == 'pending')
                                        <div class="flex justify-center gap-2">
                                            <form action="{{ route('admin.booking.update', $booking->id) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit"
                                                    class="border border-black bg-[var(--color-court-green)] px-3 py-1 font-mono text-xs font-bold uppercase text-white shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-y-[1px] hover:shadow-none active:translate-y-[2px]">
                                                    ✔ Terima
                                                </button>
                                            </form>

                                            <button type="button"
                                                @click="rejectAction = '{{ route('admin.booking.update', $booking->id) }}'; showRejectModal = true"
                                                class="border border-black bg-red-600 px-3 py-1 font-mono text-xs font-bold uppercase text-white shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-y-[1px] hover:shadow-none active:translate-y-[2px]">
                                                ✖ Tolak
                                            </button>
                                        </div>
                                    @elseif($booking->status == 'approved')
                                        @php
                                            $dateStr = \Carbon\Carbon::parse($booking->date)->format('Y-m-d');
                                            $isAtClosing = in_array($booking->end_time, ['24:00:00', '00:00:00']);
                                            if ($isAtClosing) {
                                                $endDt = \Carbon\Carbon::parse($dateStr)->addDay();
                                            } else {
                                                $endDt = \Carbon\Carbon::parse($dateStr . ' ' . $booking->end_time);
                                            }
                                            $canExtend = now()->lessThan($endDt) && !$isAtClosing;
                                        @endphp

                                        @if ($booking->is_extended)
                                            <button type="button" disabled
                                                class="cursor-not-allowed border border-gray-300 bg-blue-100 px-3 py-1 font-mono text-xs font-bold uppercase text-blue-800">
                                                ✔ Sudah Extend
                                            </button>
                                        @elseif ($canExtend)
                                            @php
                                                // Hitung sisa jam sampai jam 24:00
                                                // Ambil jam saja dari end_time
                                                $endH = (int) \Carbon\Carbon::parse($booking->end_time)->format('H');
                                                // Jika endH = 0 (tengah malam/awal hari), anggap 24 jika itu closing time, tapi di sini konteksnya booking berjalan
                                                // Kalau booking berakhir jam 22:00 -> sisa 2 jam (23, 24)
                                                // Kalau booking berakhir jam 23:00 -> sisa 1 jam (24)
                                                // Kalau booking berakhir jam 20:00 -> sisa 4 jam (max limit)
                                                $remaining = 24 - $endH;
                                                // Max extend 4 jam, tapi tidak boleh melebihi sisa waktu sampai jam 24
                                                $maxExt = min($remaining, 4);
                                            @endphp
                                            <button type="button"
                                                @click="extendAction = '{{ route('admin.booking.extend', $booking->id) }}'; extendCode = '{{ $booking->code }}'; maxExtendHours = {{ $maxExt }}; showExtendModal = true"
                                                class="border border-black bg-[var(--color-court-yellow)] px-3 py-1 font-mono text-xs font-bold uppercase text-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-y-[1px] hover:shadow-none active:translate-y-[2px]">
                                                ⏱ Extend
                                            </button>
                                        @else
                                            <button type="button" disabled
                                                class="cursor-not-allowed border border-gray-300 bg-gray-200 px-3 py-1 font-mono text-xs font-bold uppercase text-gray-400">
                                                ⏱ Expired
                                            </button>
                                        @endif
                                    @else
                                        <span class="font-mono text-xs font-bold uppercase text-gray-400">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="p-8 text-center font-mono text-gray-500">
                                    Belum ada booking masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        @if ($bookings->hasPages())
            <div class="mt-6 flex justify-center">
                <nav class="flex items-center gap-2 font-mono text-sm">
                    @if ($bookings->onFirstPage())
                        <span
                            class="px-3 py-2 border-2 border-gray-300 text-gray-300 bg-gray-50 font-bold uppercase cursor-not-allowed">&laquo;
                            Prev</span>
                    @else
                        <a href="{{ $bookings->previousPageUrl() }}"
                            class="px-3 py-2 border-2 border-black bg-white font-bold uppercase hover:bg-[var(--color-court-yellow)] transition-all shadow-hard-sm">&laquo;
                            Prev</a>
                    @endif

                    @foreach ($bookings->getUrlRange(1, $bookings->lastPage()) as $page => $url)
                        @if ($page == $bookings->currentPage())
                            <span
                                class="px-3 py-2 border-2 border-black bg-black text-white font-bold">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="px-3 py-2 border-2 border-black bg-white font-bold hover:bg-[var(--color-court-yellow)] transition-all shadow-hard-sm">{{ $page }}</a>
                        @endif
                    @endforeach

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

        {{-- Reject Confirmation Modal --}}
        <div x-show="showRejectModal" x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
            x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="w-full max-w-md border-2 border-black bg-white p-8 shadow-hard"
                @click.outside="showRejectModal = false" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                <div class="mb-6 text-center">
                    <div
                        class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full border-2 border-black bg-red-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h2 class="font-display text-2xl uppercase text-black">Tolak Booking?</h2>
                    <p class="mt-2 font-mono text-sm text-gray-600">Apakah Anda yakin ingin menolak booking ini?
                        Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="flex gap-3">
                    <button type="button" @click="showRejectModal = false"
                        class="flex-1 border-2 border-black bg-white px-4 py-3 font-mono font-bold uppercase text-black shadow-hard-sm transition-all hover:-translate-y-[1px] active:translate-y-0 active:shadow-none">
                        Batal
                    </button>
                    <form :action="rejectAction" method="POST" class="flex-1">
                        @csrf
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit"
                            class="w-full border-2 border-black bg-red-600 px-4 py-3 font-mono font-bold uppercase text-white shadow-hard-sm transition-all hover:-translate-y-[1px] hover:bg-red-700 active:translate-y-0 active:shadow-none">
                            Ya, Tolak
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Extend Booking Modal --}}
        <div x-show="showExtendModal" x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
            x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="w-full max-w-md border-2 border-black bg-white p-8 shadow-hard"
                @click.outside="showExtendModal = false" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
                <div class="mb-6 text-center">
                    <div
                        class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full border-2 border-black bg-[var(--color-court-yellow)]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="font-display text-2xl uppercase text-black">Extend Booking</h2>
                    <p class="mt-2 font-mono text-sm text-gray-600">
                        Perpanjang waktu booking <span class="font-bold" x-text="extendCode"></span>
                    </p>
                </div>
                <form :action="extendAction" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label class="block font-mono text-xs font-bold uppercase tracking-wider text-gray-600 mb-2">
                            Tambah Jam
                        </label>
                        <select name="extend_hours"
                            class="w-full border-2 border-black bg-white px-4 py-3 font-mono text-sm font-bold shadow-hard-sm focus:outline-none focus:ring-2 focus:ring-[var(--color-court-yellow)]">
                            <template x-for="i in maxExtendHours">
                                <option :value="i" x-text="'+ ' + i + ' Jam'"></option>
                            </template>
                        </select>
                    </div>
                    <div class="flex gap-3">
                        <button type="button" @click="showExtendModal = false"
                            class="flex-1 border-2 border-black bg-white px-4 py-3 font-mono font-bold uppercase text-black shadow-hard-sm transition-all hover:-translate-y-[1px] active:translate-y-0 active:shadow-none">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 border-2 border-black bg-[var(--color-court-yellow)] px-4 py-3 font-mono font-bold uppercase text-black shadow-hard-sm transition-all hover:-translate-y-[1px] active:translate-y-0 active:shadow-none">
                            ⏱ Extend
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
