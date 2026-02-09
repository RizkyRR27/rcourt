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
            </div>
        </div>
    </nav>

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
                                    'type' => $type,
                                    'date' => \Carbon\Carbon::parse($date)->format('Y-m-d'),
                                    'start_time' => $slot['start_time'],
                                    'end_time' => $slot['end_time'],
                                    'price' => $slot['price']
                                ]) }}" 
                                class="block border-2 border-green-500 bg-green-50 hover:bg-green-600 hover:text-white hover:border-green-600 rounded-lg p-3 text-center transition group">
                                    
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