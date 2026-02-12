<x-layouts.app :current-route="'booking'">
    <div class="bg-[var(--color-court-paper)] pb-20 pt-10">
        
        {{-- HEADER --}}
        <div class="mx-auto mb-10 max-w-7xl px-4 text-center">
            <h2 class="font-display text-4xl uppercase md:text-6xl text-black">
                Hasil <span class="text-[var(--color-court-clay)]">Pencarian</span>
            </h2>
            <div class="mt-4 flex flex-wrap justify-center gap-4 font-mono text-sm text-gray-600">
                <span class="border-2 border-black bg-white px-3 py-1 shadow-sm">
                    🎾 {{ ucfirst($type) }}
                </span>
                <span class="border-2 border-black bg-white px-3 py-1 shadow-sm">
                    📅 {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}
                </span>
                <span class="border-2 border-black bg-white px-3 py-1 shadow-sm">
                    ⏱ {{ $duration }} Jam
                </span>
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="mx-auto max-w-5xl px-4">
            
            {{-- Tombol Kembali --}}
            <div class="mb-8">
                <a href="{{ route('booking') }}" class="group inline-flex items-center gap-2 font-mono font-bold uppercase text-gray-500 hover:text-black">
                    <span>←</span> Cari Jadwal Lain
                </a>
            </div>

            {{-- LOOPING LAPANGAN (RESULTS) --}}
            @forelse ($results as $court)
                {{-- Hanya tampilkan lapangan yang punya slot kosong --}}
                @if(count($court['slots']) > 0)
                    <div class="mb-10 border-2 border-black bg-white p-6 shadow-hard">
                        
                        {{-- Nama Lapangan --}}
                        <div class="mb-6 flex items-center justify-between border-b-2 border-black pb-4">
                            <h3 class="font-display text-2xl uppercase">{{ $court['court_name'] }}</h3>
                            <span class="bg-[var(--color-court-green)] px-3 py-1 font-mono text-xs text-white">
                                {{ count($court['slots']) }} Slot Tersedia
                            </span>
                        </div>

                        {{-- Grid Slot Waktu --}}
                        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                            @foreach ($court['slots'] as $slot)
                                <a href="{{ route('booking.create', [
                                        'court_id' => $court['court_id'],
                                        'type' => $type,
                                        'date' => $date,
                                        'start_time' => $slot['start_time'],
                                        'end_time' => $slot['end_time'],
                                        'price' => $slot['price']
                                    ]) }}" 
                                   class="group relative flex flex-col items-center justify-center border-2 border-black bg-[var(--color-court-paper)] py-4 text-center transition-all hover:-translate-y-1 hover:bg-[var(--color-court-yellow)] hover:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                                    
                                    {{-- Jam --}}
                                    <span class="font-mono text-lg font-bold">
                                        {{ substr($slot['start_time'], 0, 5) }}
                                    </span>
                                    <span class="text-xs text-gray-500 group-hover:text-black">s/d {{ substr($slot['end_time'], 0, 5) }}</span>
                                    
                                    {{-- Harga --}}
                                    <div class="mt-2 border-t border-black pt-2 w-full">
                                        <span class="font-mono text-sm font-bold text-[var(--color-court-clay)] group-hover:text-black">
                                            Rp {{ number_format($slot['price'], 0, ',', '.') }}
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            @empty
                {{-- Jika Tidak Ada Lapangan Sama Sekali --}}
                <div class="border-2 border-black bg-red-50 p-10 text-center shadow-hard">
                    <h3 class="font-display text-2xl uppercase text-red-600">Jadwal Penuh!</h3>
                    <p class="font-mono text-gray-600 mt-2">Maaf, tidak ada lapangan tersedia untuk kriteria pencarian ini.</p>
                </div>
            @endforelse

        </div>
    </div>
</x-layouts.app>