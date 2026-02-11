<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Berhasil! - RCourt</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-xl shadow-lg text-center max-w-md">
        <div class="text-green-500 text-6xl mb-4">✅</div>
        <h2 class="text-2xl font-bold mb-2">Booking Berhasil!</h2>
        <p class="text-gray-600 mb-6">
            ID Booking Anda: <strong>#{{ $id }}</strong>.<br>
            Silakan tunggu konfirmasi dari Admin. <span class ="bg-red-700 text-white text-xl">DIHIMBAU UNTUK PARA PEMAIN UNTUK DATANG TEPAT WAKTU</span>
            Status saat ini: <span class="bg-yellow-100 text-yellow-600 px-2 py-1 rounded text-m">Pending</span>
        </p>
        <a href="{{ route('home') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Kembali ke Home</a>
    </div>

</body>
</html>