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

     <nav x-data="{ open: false }" class="bg-white shadow mb-8 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">RCourt.</a>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                
                <a href="{{ route('home') }}" 
                   class="{{ request()->routeIs('home') ? 'text-blue-600 font-bold' : 'text-gray-600 font-medium hover:text-blue-600' }} transition">
                    Home
                </a>

                 <a href="{{ route('tournament') }}" 
                   class="{{ request()->routeIs('tournament') ? 'text-blue-600 font-bold' : 'text-gray-600 font-medium hover:text-blue-600' }} transition">
                    Info Tournamen 🏆
                </a>

                <a href="{{ route('booking') }}" 
                   class="{{ request()->routeIs('booking*') ? 'text-blue-600 font-bold' : 'text-gray-600 font-medium hover:text-blue-600' }} transition">
                    Booking Lapangan
                </a>

                <a href="{{ route('contact') }}" 
                   class="{{ request()->routeIs('contact') ? 'text-blue-600 font-bold' : 'text-gray-600 font-medium hover:text-blue-600' }} transition">
                    Kontak Kami
                </a>

            </div>

            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" class="md:hidden bg-white border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1">
            
            <a href="{{ route('home') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition
               {{ request()->routeIs('home') ? 'border-blue-500 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                Home
            </a>

            <a href="{{ route('tournament') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition
               {{ request()->routeIs('tournament') ? 'border-blue-500 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                info Turnamen 🏆
            </a>

            <a href="{{ route('booking') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition
               {{ request()->routeIs('booking*') ? 'border-blue-500 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                Booking Lapangan
            </a>

            <a href="{{ route('contact') }}" 
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition
               {{ request()->routeIs('contact') ? 'border-blue-500 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                Kontak Kami
            </a>

        </div>
    </div>
</nav>

    <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-lg mt-10">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Mulai Booking</h2>

       @if (session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
        <p class="font-bold">Gagal Mencari Jadwal</p>
        <p>{{ session('error') }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif`
        
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
            <div class="mb-6">
    <label for="duration" class="block text-gray-700 font-bold mb-2">Durasi Main</label>
    <select name="duration" id="duration" class="w-full px-4 py-3 rounded-lg border focus:outline-none focus:border-blue-500 bg-gray-50" required>
        <option value="1">1 Jam</option>
        <option value="2">2 Jam</option>
        <option value="3">3 Jam</option>
        <option value="3">4 Jam</option>
        <option value="3">5 Jam</option>
    </select>
</div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                Cek Ketersediaan Jadwal
            </button>
        </form>
    </div>

</body>
</html>