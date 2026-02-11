<<<<<<< HEAD
<x-layouts.app :current-route="'booking'">
    {{-- Spacer for fixed navbar --}}
    <div class="h-16"></div>

    <section class="container-app py-8">
        {{-- Search Summary Card --}}
        <x-card padding="p-6" class="mb-8 border-l-4 border-[var(--color-primary)]">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h3 class="text-lg mb-2">Hasil Pencarian</h3>
                    <div class="flex flex-col sm:flex-row gap-4 text-sm">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-muted">Tanggal:</span>
                            <span
                                class="font-semibold">{{ \Carbon\Carbon::parse($date)->translatedFormat('l, d F Y') }}</span>
                        </span>
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span class="text-muted">Lapangan:</span>
                            <span class="font-semibold capitalize">{{ str_replace('_', ' ', $type) }}</span>
                        </span>
                    </div>
                </div>
                <x-button variant="outline" size="sm" :href="route('booking')">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Ganti Pencarian
                </x-button>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Lapangan - RCourt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-100 text-gray-800 pb-20">

    <nav class="bg-white shadow mb-8 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">RCourt.</a>
                <a href="{{ route('booking') }}" class="text-sm text-gray-500 hover:text-blue-600">Ganti Pencarian</a>
>>>>>>> 44926623542cb29c83159a1eb3320e011f0f83a8
            </div>
        </x-card>

<<<<<<< HEAD
        {{-- Schedule Table --}}
        <x-card padding="p-0" class="overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-[var(--color-surface-muted)]">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">
                                Jam Main</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">
                                Harga</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-muted uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-muted uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[var(--color-border)]">
                        @foreach ($slots as $index => $slot)
                            <tr class="hover:bg-[var(--color-surface-muted)] transition-colors {{ $slot['is_full'] ? 'opacity-60' : '' }}"
                                style="animation: slideUp 0.3s ease forwards; animation-delay: {{ $index * 50 }}ms;">

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="font-semibold">{{ $slot['start_time'] }}</span>
                                    <span class="text-muted mx-1">-</span>
                                    <span class="font-semibold">{{ $slot['end_time'] }}</span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-primary font-semibold">Rp
                                        {{ number_format($slot['price'], 0, ',', '.') }}</span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if ($slot['is_full'])
                                        <x-badge variant="danger">Penuh</x-badge>
                                    @else
                                        <x-badge variant="success">Tersedia ({{ $slot['available_courts'] }})</x-badge>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if ($slot['is_full'])
                                        <span class="text-muted text-sm cursor-not-allowed">Full Booked</span>
                                    @else
                                        <x-button variant="primary" size="sm" href="#">
                                            Pilih
                                        </x-button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-card>
    </section>
</x-layouts.app>
=======
    <div class="max-w-6xl mx-auto px-4">
        
        <div class="bg-blue-600 text-white p-6 rounded-xl shadow-lg mb-8">
            <h1 class="text-2xl font-bold mb-2">Pilih Lapangan & Jam Main</h1>
            <div class="flex gap-6 text-blue-100 text-sm">
                <p>📅 {{ \Carbon\Carbon::parse($date)->translatedFormat('l, d F Y') }}</p>
                <p>🏆 {{ ucfirst($type) }}</p>
                <p>⏱ Durasi: {{ $duration }} Jam</p>
            </div>
        </div>

        <div class="space-y-8">
            @foreach($results as $court)
            <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-800">🏟 {{ $court['court_name'] }}</h3>
                    <span class="text-xs font-semibold bg-blue-100 text-blue-800 px-2 py-1 rounded">
                        {{ count($court['slots']) }} Slot Tersedia
                    </span>
                </div>

                <div class="p-6">
                    @if(empty($court['slots']))
                        <div class="text-center text-gray-400 py-4">
                            🚫 Yah, lapangan ini penuh seharian. Cek lapangan lain ya!
                        </div>
                    @else
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                            @foreach($court['slots'] as $slot)
                               <a href="{{ route('booking.create', [
                                        'court_id' => $court['court_id'],  // <--- TAMBAHKAN BARIS INI (Wajib!)
                                        'type' => $type,
                                        'date' => \Carbon\Carbon::parse($date)->format('Y-m-d'),
                                        'start_time' => $slot['start_time'],
                                        'end_time' => $slot['end_time'],
                                        'price' => $slot['price']
                                    ]) }}" 
                                    class="block border-2 border-green-500 ...">
                                    
                                    <div class="text-sm font-bold group-hover:text-white text-gray-800">
                                        {{ substr($slot['start_time'], 0, 5) }}
                                    </div>
                                    <div class="text-xs text-gray-500 group-hover:text-green-100 mb-1">
                                        s/d {{ substr($slot['end_time'], 0, 5) }}
                                    </div>
                                    <div class="text-xs font-bold text-green-700 group-hover:text-white">
                                        Rp {{ number_format($slot['price']/1000, 0) }}k
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
            @endforeach
        </div>

    </div>

</body>
</html>
>>>>>>> 44926623542cb29c83159a1eb3320e011f0f83a8
