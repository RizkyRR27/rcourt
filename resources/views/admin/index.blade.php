<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - RCourt</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800 text-gray-100 font-sans min-h-screen">

    <div class="max-w-7xl mx-auto px-4 py-10">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-white">Admin Dashboard</h1>
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-white text-sm">Ke Homepage &rarr;</a>
        </div>

        @if(session('success'))
            <div class="bg-green-600 text-white px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-900 rounded-xl shadow-lg overflow-hidden border border-gray-700">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Penyewa</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Jadwal Main</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-300 uppercase">Total & Bukti</th>
                        <th class="px-6 py-3 text-center text-xs font-bold text-gray-300 uppercase">Status</th>
                        <th class="px-6 py-3 text-center text-xs font-bold text-gray-300 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($bookings as $booking)
                    <tr class="hover:bg-gray-800 transition">
                        
                        <td class="px-6 py-4 text-sm text-gray-400">#{{ $booking->id }}</td>
                        
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-white">{{ $booking->user->name ?? 'User Hapus' }}</div>
                            <div class="text-xs text-gray-400">{{ $booking->user->email ?? '-' }}</div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="text-sm text-white font-bold">{{ $booking->court->name }}</div>
                            <div class="text-xs text-gray-400">{{ $booking->date }}</div>
                            <div class="text-xs text-blue-400">{{ $booking->start_time }} - {{ $booking->end_time }}</div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="text-sm text-green-400 font-bold">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</div>
                            <div class="text-xs text-gray-500 mb-1 uppercase">{{ $booking->payment_method }}</div>
                            
                            @if($booking->payment_proof)
                                <a href="{{ asset('storage/' . $booking->payment_proof) }}" target="_blank" class="text-xs text-blue-400 hover:underline">
                                    Lihat Bukti 📎
                                </a>
                            @else
                                <span class="text-xs text-red-500">Tanpa Bukti</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if($booking->status == 'pending')
                                <span class="px-2 py-1 text-xs font-bold rounded bg-yellow-600 text-white">Pending</span>
                            @elseif($booking->status == 'approved')
                                <span class="px-2 py-1 text-xs font-bold rounded bg-green-600 text-white">Approved</span>
                            @else
                                <span class="px-2 py-1 text-xs font-bold rounded bg-red-600 text-white">Rejected</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if($booking->status == 'pending')
                                <div class="flex justify-center space-x-2">
                                    <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="bg-green-600 hover:bg-green-500 text-white px-3 py-1 rounded text-xs transition">
                                            ✔ Terima
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded text-xs transition" onclick="return confirm('Yakin tolak booking ini?')">
                                            ✖ Tolak
                                        </button>
                                    </form>
                                </div>
                            @else
                                <span class="text-xs text-gray-500">Selesai</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                            Belum ada booking masuk.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>