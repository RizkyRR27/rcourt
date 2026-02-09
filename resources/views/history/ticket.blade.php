<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-Ticket #{{ $booking->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none; }
            body { background: white; }
            .ticket-container { box-shadow: none; border: 1px solid #000; }
        }
    </style>
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen p-4">

    <div class="ticket-container bg-white w-full max-w-md p-8 rounded-2xl shadow-2xl relative overflow-hidden">
        <div class="absolute -left-4 top-1/2 w-8 h-8 bg-gray-200 rounded-full"></div>
        <div class="absolute -right-4 top-1/2 w-8 h-8 bg-gray-200 rounded-full"></div>
        <div class="border-b-2 border-dashed border-gray-300 my-6"></div>

        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-blue-600 tracking-widest">RCOURT</h1>
            <p class="text-gray-400 text-sm tracking-widest">E-TICKET BOOKING</p>
        </div>

        <div class="space-y-4">
            <div class="flex justify-between">
                <span class="text-gray-500">Booking ID</span>
                <span class="font-bold">#{{ $booking->id }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Nama</span>
                <span class="font-bold">{{ $booking->user->name ?? 'Tamu' }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Lapangan</span>
                <span class="font-bold text-blue-600">{{ $booking->court->name }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Tanggal</span>
                <span class="font-bold">{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Jam</span>
                <span class="font-bold bg-gray-100 px-2 py-1 rounded">{{ $booking->start_time }} - {{ $booking->end_time }}</span>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 text-center">
            <div class="inline-block bg-green-100 text-green-800 px-4 py-1 rounded-full text-sm font-bold mb-4">
                STATUS: LUNAS / APPROVED
            </div>
            <p class="text-xs text-gray-400">Tunjukkan tiket ini kepada petugas di lokasi.</p>
        </div>

        <button onclick="window.print()" class="no-print w-full mt-6 bg-gray-800 text-white py-3 rounded-lg hover:bg-gray-900 transition font-bold">
            🖨 Cetak / Simpan PDF
        </button>
        
        <a href="{{ route('history') }}" class="no-print block text-center mt-4 text-blue-500 text-sm hover:underline">Kembali</a>
    </div>

</body>
</html>