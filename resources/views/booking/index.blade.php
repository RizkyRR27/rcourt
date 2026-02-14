<x-layouts.app :current-route="'booking'">
    <div class="bg-[var(--color-court-paper)] pb-20 pt-10">
        
        {{-- HEADER TITLE --}}
        <div class="mx-auto  max-w-7xl px-4 text-center">
            <h2 class="font-display text-6xl uppercase md:text-8xl text-black">
                Jadwal <span class="text-[var(--color-court-clay)]">Arena</span>
            </h2>
        </div>
        <div class="mx-auto mb-12 max-w-4xl px-4 text-center">
            <p class="font-mono text-gray-600">
                Cari slot kosong dan amankan lapanganmu sekarang.
            </p>
        </div>

        {{-- ... Form Pencarian di atas ... --}}

{{-- INFO JADWAL LIBUR / TURNAMEN --}}
<div class="mt-8 max-w-4xl mx-auto">
    <div class="border-2 border-black bg-yellow-50 p-6 shadow-hard relative">
        <div class="absolute -top-3 -left-3 bg-red-600 text-white font-mono font-bold px-4 py-1 transform -rotate-2 border-2 border-black shadow-sm">
            📢 INFO PENTING
        </div>

        <h3 class="font-display text-xl uppercase mt-2 mb-4">Jadwal Penutupan Lapangan:</h3>
        
        <div class="grid md:grid-cols-2 gap-4">
            @php
                $tournaments = \App\Models\Tournament::all();
            @endphp

            @foreach($tournaments as $event)
                <div class="flex items-start gap-3 border-b-2 border-black/10 pb-2">
                    <!-- <div class="text-2xl">
                        {{ $event->is_recurring }}
                    </div> -->
                    <div>
                        <h4 class="font-bold font-mono text-sm uppercase">{{ $event->name }}</h4>
                        <p class="text-xs text-gray-600 font-mono mt-1">
                            @if($event->is_recurring)
                                <span class="bg-blue-100 px-1 border border-black text-[10px]">TIAP TAHUN</span>
                                {{ \Carbon\Carbon::parse($event->start_date)->format('d M') }} 
                                s/d 
                                {{ \Carbon\Carbon::parse($event->end_date)->format('d M') }}
                            @else
                                <span class="bg-gray-200 px-1 border border-black text-[10px]">Seminggu</span>
                                {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}
                            @endif
                        </p>
                        <p class="text-[10px] text-gray-500 italic mt-1">"{{ $event->description }}"</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

        {{-- AREA NOTIFIKASI ERROR --}}
        <div class="mx-auto max-w-4xl px-4 mb-8">
            @if (session('error'))
                <div class="border-2 border-red-600 bg-red-100 p-4 shadow-hard text-red-800 flex items-start gap-4 mb-4">
                    <span class="text-3xl">🚫</span>
                    <div>
                        <h3 class="font-display text-xl uppercase font-bold">Jadwal Tidak Tersedia</h3>
                        <p class="font-mono text-sm mt-1">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="border-2 border-red-600 bg-red-100 p-4 shadow-hard text-red-800">
                    <h3 class="font-display text-xl uppercase font-bold mb-2">Periksa Inputan Anda</h3>
                    <ul class="list-disc pl-5 font-mono text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        {{-- BOOKING WIDGET --}}
        <div class="pt-20"> 
            <x-booking-widget />
        </div>

        <!-- {{-- MOCK CALENDAR GRID (PREVIEW) --}}
        <div class="mx-auto mt-20 max-w-7xl px-4">
            <div class="border-2 border-black bg-white p-6 shadow-hard">
                <div class="mb-6 flex items-center justify-between border-b-2 border-black pb-4">
                    <h3 class="font-display text-2xl uppercase">Slot Tersedia: Hari Ini</h3>
                    <span class="bg-[var(--color-court-green)] px-3 py-1 font-mono text-xs text-white">LIVE UPDATE</span>
                </div>

                <div class="grid gap-4 md:grid-cols-4">
                    @php
                        $times = ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00'];
                    @endphp
                    @foreach ($times as $idx => $time)
                        <div class="flex items-center justify-between border-2 border-black p-3 {{ $idx % 3 === 0 ? 'bg-gray-100 opacity-50' : 'bg-white hover:bg-[var(--color-court-yellow)] cursor-pointer' }}">
                            <span class="font-mono font-bold">{{ $time }}</span>
                            <span class="font-mono text-xs {{ $idx % 3 === 0 ? 'text-gray-500' : 'text-green-600' }}">
                                {{ $idx % 3 === 0 ? 'BOOKED' : 'OPEN' }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> -->
    </div>
</x-layouts.app>