<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RCourt - Booking Lapangan Olahraga</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow-md fixed w-full z-10" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">RCourt<span class="text-gray-800">.</span></a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-blue-600 font-semibold">Home</a>
                    <a href="{{ route('booking') }}" class="text-gray-600 hover:text-blue-600 transition">Booking Lapangan</a>
                    <a href="{{ route('contact') }}" class="text-gray-600 hover:text-blue-600 transition">Kontak Kami</a>
                    <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Login</a>
                </div>

                <div class="flex items-center md:hidden">
                    <button @click="open = !open" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="open" class="md:hidden bg-white border-t">
            <a href="{{ route('home') }}" class="block px-4 py-3 text-blue-600 font-semibold bg-gray-50">Home</a>
            <a href="{{ route('booking') }}" class="block px-4 py-3 text-gray-600 hover:bg-gray-50">Booking Lapangan</a>
            <a href="{{ route('contact') }}" class="block px-4 py-3 text-gray-600 hover:bg-gray-50">Kontak Kami</a>
        </div>
    </nav>

    <header class="bg-blue-600 text-white pt-32 pb-20 px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di RCourt</h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-8">
            Pusat olahraga dengan fasilitas terbaik. Nikmati kemudahan booking lapangan di RCourt secara online.
        </p>
        <a href="{{ route('booking') }}" class="bg-white text-blue-600 font-bold py-3 px-8 rounded-full shadow-lg hover:bg-gray-100 transition transform hover:scale-105">
            Booking Sekarang
        </a>
    </header>

    <section class="max-w-7xl mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Fasilitas Lapangan Kami</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition border-t-4 border-blue-500">
                <h3 class="text-xl font-bold mb-2">🏸 Badminton</h3>
                <p class="text-gray-600">Lapangan karpet standar internasional dengan pencahayaan optimal.</p>
                <div class="mt-4 text-3xl font-bold text-blue-600">{{ $counts['badminton'] }} <span class="text-sm font-normal text-gray-500">Lapangan</span></div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition border-t-4 border-green-500">
                <h3 class="text-xl font-bold mb-2">⚽ Futsal</h3>
                <p class="text-gray-600">Rumput sintetis berkualitas tinggi nyaman untuk bermain.</p>
                <div class="mt-4 text-3xl font-bold text-green-600">{{ $counts['futsal'] }} <span class="text-sm font-normal text-gray-500">Lapangan</span></div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition border-t-4 border-orange-500">
                <h3 class="text-xl font-bold mb-2">🏀 Basket Indoor</h3>
                <p class="text-gray-600">Lantai parket kayu, full AC, dan papan skor digital.</p>
                <div class="mt-4 text-3xl font-bold text-orange-600">{{ $counts['basket_indoor'] }} <span class="text-sm font-normal text-gray-500">Lapangan</span></div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition border-t-4 border-yellow-500">
                <h3 class="text-xl font-bold mb-2">🌤️ Basket Outdoor</h3>
                <p class="text-gray-600">Lapangan outdoor dengan suasana segar dan lantai standar.</p>
                <div class="mt-4 text-3xl font-bold text-yellow-600">{{ $counts['basket_outdoor'] }} <span class="text-sm font-normal text-gray-500">Lapangan</span></div>
            </div>

             <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition border-t-4 border-red-500 sm:col-span-2 lg:col-span-1">
                <h3 class="text-xl font-bold mb-2">🥅 Mini Soccer</h3>
                <p class="text-gray-600">Lapangan luas cocok untuk pertandingan 7 vs 7.</p>
                <div class="mt-4 text-3xl font-bold text-red-600">{{ $counts['mini_soccer'] }} <span class="text-sm font-normal text-gray-500">Lapangan</span></div>
            </div>

        </div>
    </section>

    <!-- <footer class="bg-gray-800 text-white py-8 text-center">
        <p>&copy; 2024 RCourt. All rights reserved.</p>
    </footer> -->

</body>
</html>