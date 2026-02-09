<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Jadwal - RCourt</title>
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
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-500 hover:text-blue-600">Kembali ke Home</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-lg mt-10">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Mulai Booking</h2>
        
        <form action="{{ route('booking.search') }}" method="POST">
            @csrf <div class="mb-6">
                <label for="type" class="block text-gray-700 font-bold mb-2">Pilih Jenis Lapangan</label>
                <select name="type" id="type" class="w-full px-4 py-3 rounded-lg border focus:outline-none focus:border-blue-500 bg-gray-50" required>
                    <option value="" disabled selected>-- Pilih Lapangan --</option>
                    @foreach($types as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="date" class="block text-gray-700 font-bold mb-2">Pilih Tanggal Main</label>
                <input type="date" name="date" id="date" 
                       class="w-full px-4 py-3 rounded-lg border focus:outline-none focus:border-blue-500 bg-gray-50" 
                       min="{{ date('Y-m-d') }}" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                Cek Ketersediaan Jadwal
            </button>
        </form>
    </div>

</body>
</html>