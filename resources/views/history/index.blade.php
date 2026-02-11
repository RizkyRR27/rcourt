<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Booking - RCourt</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans min-h-screen">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">RCourt.</a>
            <div class="space-x-4">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600">Home</a>
                <a href="{{ route('booking') }}" class="text-gray-600 hover:text-blue-600">Booking Baru</a>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-4 pb-20">
        <h1 class="text-3xl font-bold mb-6">Riwayat Booking Saya</h1>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            @if($bookings->isEmpty())
                <div class="p-10 text-center text-gray-500">
                    <p class="mb-4">Kamu belum pernah melakukan booking.</p>
                    <a href="{{ route('booking') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Booking Sekarang</a>
                </div>
            @else
                <div class="grid gap-6 p-6">
                    @foreach($bookings as $booking)
                    <div class="border rounded-lg p-5 flex flex-col md:flex-row justify-between items-center bg-gray-50 hover:bg-white hover:shadow-md transition">
                        
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2 py-1 rounded">#{{ $booking->id }}</span>
                                <h3 class="font-bold text-lg">{{ $booking->court->name }}</h3>
                            </div>
                            <p class="text-gray-600 text-sm">📅 {{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</p>
                            <p class="text-gray-600 text-sm">⏰ {{ $booking->start_time }} - {{ $booking->end_time }}</p>
                        </div>

                        <div class="flex-1 text-center my-4 md:my-0">
                            <p class="font-bold text-gray-800">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                            <div class="mt-2">
                                @if($booking->status == 'pending')
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-3 py-1 rounded-full font-bold">Menunggu Konfirmasi</span>
                                @elseif($booking->status == 'approved')
                                    <span class="bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-bold">Disetujui ✅</span>
                                @else
                                    <span class="bg-red-100 text-red-800 text-xs px-3 py-1 rounded-full font-bold">Ditolak ❌</span>
                                @endif
                            </div>
                        </div>

                        <div class="flex-1 text-right">
                            @if($booking->status == 'approved')
                                <a href="{{ route('history.ticket', $booking->id) }}" class="inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded shadow hover:bg-blue-700 transition">
                                    🎫 Lihat Tiket
                                </a>
                            @else
                                <button disabled class="bg-gray-300 text-gray-500 text-sm px-4 py-2 rounded cursor-not-allowed">
                                    Tiket Belum Tersedia
                                </button>
                            @endif
                        </div>

                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

</body>
</html>