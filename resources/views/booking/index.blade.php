<x-layouts.app :current-route="'booking'">
    <div class="bg-[var(--color-court-paper)] pb-20 pt-10">
        <div class="mx-auto mb-10 max-w-7xl px-4 text-center">
            <h2 class="font-display text-6xl uppercase md:text-8xl text-black">
                Jadwal <span class="text-[var(--color-court-clay)]">Arena</span>
            </h2>
            <p class="font-mono text-gray-600">
                Cari slot kosong dan amankan lapanganmu sekarang.
            </p>
        </div>

        {{-- Reuse widget but adjust padding container --}}
        <div class="pt-10">
            <x-booking-widget />
        </div>

        {{-- Mock Calendar Grid / Schedule Preview --}}
        <div class="mx-auto mt-20 max-w-7xl px-4">
            <div class="border-2 border-black bg-white p-6 shadow-hard">
                <div class="mb-6 flex items-center justify-between border-b-2 border-black pb-4">
                    <h3 class="font-display text-2xl uppercase">Slot Tersedia: Hari Ini</h3>
                    <span class="bg-[var(--color-court-green)] px-3 py-1 font-mono text-xs text-white">LIVE
                        UPDATE</span>
                </div>

                <div class="grid gap-4 md:grid-cols-4">
                    @php
                        $times = [
                            '08:00',
                            '09:00',
                            '10:00',
                            '11:00',
                            '12:00',
                            '13:00',
                            '14:00',
                            '15:00',
                            '16:00',
                            '17:00',
                            '18:00',
                            '19:00',
                        ];
                    @endphp
                    @foreach ($times as $idx => $time)
                        <div
                            class="flex items-center justify-between border-2 border-black p-3 {{ $idx % 3 === 0 ? 'bg-gray-100 opacity-50' : 'bg-white hover:bg-[var(--color-court-yellow)] cursor-pointer' }}">
                            <span class="font-mono font-bold">{{ $time }}</span>
                            <span class="font-mono text-xs {{ $idx % 3 === 0 ? 'text-gray-500' : 'text-green-600' }}">
                                {{ $idx % 3 === 0 ? 'BOOKED' : 'OPEN' }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
