<x-layouts.app :hide-navbar="true" :hide-footer="true">
    <div class="mx-auto max-w-7xl px-4 py-12">
        <div class="mb-8 flex items-center justify-between">
            <h1 class="font-display text-4xl uppercase text-black">Admin <span
                    class="text-[var(--color-court-clay)]">Dashboard</span></h1>
            <a href="{{ route('home') }}"
                class="font-mono text-sm font-bold uppercase text-gray-500 hover:text-black hover:underline">
                Ke Homepage &rarr;
            </a>
        </div>

        @if (session('success'))
            <div class="mb-8 border-2 border-black bg-green-200 p-4 font-mono font-bold text-green-900 shadow-hard-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="border-2 border-black bg-white shadow-hard overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left font-mono text-sm">
                    <thead class="bg-black text-white uppercase">
                        <tr>
                            <th class="p-4">ID</th>
                            <th class="p-4">Penyewa</th>
                            <th class="p-4">Jadwal Main</th>
                            <th class="p-4">Total</th>
                            <th class="p-4">Bukti Bayar</th>
                            <th class="p-4 text-center">Metode Bayar</th>
                            <th class="p-4 text-center">Status</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-2 divide-black bg-white">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4 font-bold">#{{ $booking->id }}</td>
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

                                            <form action="{{ route('admin.booking.update', $booking->id) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit"
                                                    class="border border-black bg-red-600 px-3 py-1 font-mono text-xs font-bold uppercase text-white shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-y-[1px] hover:shadow-none active:translate-y-[2px]"
                                                    onclick="return confirm('Yakin tolak booking ini?')">
                                                    ✖ Tolak
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="font-mono text-xs font-bold uppercase text-gray-400">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="p-8 text-center font-mono text-gray-500">
                                    Belum ada booking masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>
