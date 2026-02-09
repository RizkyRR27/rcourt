<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jadwal - RCourt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">RCourt.</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 pb-20">
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border-l-4 border-blue-600">
            <h2 class="text-xl font-bold text-gray-800">Hasil Pencarian</h2>
            <div class="mt-2 text-gray-600 flex flex-col sm:flex-row gap-4">
                <p>📅 Tanggal: <span class="font-bold text-black">{{ \Carbon\Carbon::parse($date)->translatedFormat('l, d F Y') }}</span></p>
                <p>🏆 Jenis Lapangan: <span class="font-bold text-black capitalize">{{ str_replace('_', ' ', $type) }}</span></p>
            </div>
            <a href="{{ route('booking') }}" class="text-sm text-blue-500 hover:underline mt-2 inline-block">&larr; Ganti Tanggal/Lapangan</a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jam Main</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($slots as $slot)
                    <tr class="{{ $slot['is_full'] ? 'bg-red-50' : 'hover:bg-blue-50' }}">
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $slot['start_time'] }} - {{ $slot['end_time'] }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            Rp {{ number_format($slot['price'], 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @if($slot['is_full'])
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Penuh
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Tersedia ({{ $slot['available_courts'] }})
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            @if($slot['is_full'])
                                <button disabled class="text-gray-400 cursor-not-allowed">Full Booked</button>
                            @else
                                <a href="#" 
                                   class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition shadow">
                                   Pilih
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>