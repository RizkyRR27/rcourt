<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Turnamen - RCourt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-50 text-gray-800">

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

    <div class="bg-blue-900 text-white py-16 text-center px-4">
        <h1 class="text-4xl font-bold mb-4">Kalender Kompetisi RCourt</h1>
        <p class="text-blue-200 text-lg max-w-2xl mx-auto">Jadwal resmi turnamen tahunan dan event spesial kami.</p>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-12 space-y-16">

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 flex flex-col md:flex-row">
            <div class="bg-gradient-to-br from-purple-600 to-indigo-700 text-white p-10 md:w-1/3 flex flex-col justify-center">
                <div class="inline-block bg-white text-purple-700 px-3 py-1 rounded-full text-xs font-bold mb-4 w-fit">
                    🎉 EVENT SPESIAL (TAHUN INI)
                </div>
                <h2 class="text-3xl font-bold mb-2">Grand Opening Tournament</h2>
                <p class="text-purple-100 mb-6">Kompetisi pembukaan RCourt untuk SEMUA cabang olahraga.</p>
                <div class="bg-purple-800 bg-opacity-50 p-4 rounded-xl">
                    <p class="text-xs text-purple-200 mb-1">Tanggal Pelaksanaan</p>
                    <p class="font-bold text-xl">5 - 12 Mei 2026</p>
                </div>
            </div>
            <div class="p-10 md:w-2/3">
                <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Detail Lomba</h3>
                <ul class="space-y-3 text-gray-600 mb-6">
                    <li class="flex items-start gap-2">✔ Kategori: <strong>UMUM (Tanpa Batasan Usia)</strong></li>
                    <li class="flex items-start gap-2">✔ Cabang: Badminton, Futsal, Basket, Tennis, Padel, Mini Soccer.</li>
                    <li class="flex items-start gap-2">✔ Total Hadiah: Uang Tunai + Trophy Grand Opening.</li>
                </ul>
                <div class="bg-red-50 text-red-700 px-4 py-3 rounded-lg text-sm font-semibold">
                    🚫 Selama tanggal 5-12 Mei 2026, booking reguler DITUTUP total.
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 relative">
            <div class="absolute top-0 right-0 bg-yellow-400 text-yellow-900 px-6 py-2 rounded-bl-2xl font-bold shadow-md z-10">
                🏆 PIALA BERGILIR TAHUNAN
            </div>

            <div class="p-8 md:p-12">
                <div class="text-center mb-10">
                    <h2 class="text-4xl font-bold text-blue-900 mb-2">R CUP (Annual)</h2>
                    <p class="text-gray-500">Ajang bergengsi antar Sekolah (SMA/Sederajat) & Klub U-18</p>
                    <p class="text-gray-500">buka pendaftaran setiap 1 bulan sebelum pertandingan</p>
                    <p class="text-gray-500">dan akan ditutup 2 minggu setelah pendaftaran dibuka</p>
                    <div class="mt-4 inline-flex items-center gap-2 bg-blue-50 text-blue-800 px-4 py-2 rounded-lg font-semibold">
                        🗓 Setiap Tanggal: 12 - 17 Januari
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-10">
                    
                    <div>
                        <h3 class="text-lg font-bold text-blue-800 mb-4 flex items-center gap-2">
                            <span class="bg-blue-600 text-white w-6 h-6 flex items-center justify-center rounded-full text-xs">1</span>
                            Kategori Piala Bergilir (SMA/KU-18)
                        </h3>
                        <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                            <table class="w-full text-sm">
                                <thead class="text-gray-500 border-b">
                                    <tr>
                                        <th class="text-left pb-2">Cabang</th>
                                        <th class="text-left pb-2">Kategori</th>
                                        <th class="text-right pb-2">Kuota</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="py-3 font-bold">⚽ Futsal</td>
                                        <td class="py-3">Putra / Putri</td>
                                        <td class="py-3 text-right text-red-600 font-bold">Max 32 Tim</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 font-bold">🏀 Basket</td>
                                        <td class="py-3">Putra / Putri</td>
                                        <td class="py-3 text-right text-red-600 font-bold">Max 32 Tim</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 font-bold align-top">🏸 Badminton</td>
                                        <td class="py-3 text-xs space-y-1">
                                            <div>Ganda Putra</div>
                                            <div>Ganda Putri</div>
                                            <div>Single Putra</div>
                                            <div>Single Putri</div>
                                        </td>
                                        <td class="py-3 text-right text-red-600 font-bold align-top text-xs space-y-1">
                                            <div>32 Pasang</div>
                                            <div>32 Pasang</div>
                                            <div>32 Org</div>
                                            <div>32 Org</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                                <span class="bg-gray-600 text-white w-6 h-6 flex items-center justify-center rounded-full text-xs">2</span>
                                Cabang Lain (Non-Piala Bergilir)
                            </h3>
                            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mb-6">
                                <p class="text-yellow-800 text-sm">
                                    <strong>Cabang:</strong> Tennis, Padel, Mini Soccer.<br>
                                    <strong>Kategori:</strong> UMUM.<br>
                                    <span class="italic text-xs">*Tidak masuk hitungan poin Piala Bergilir.</span>
                                </p>
                            </div>

                            <h3 class="text-lg font-bold text-gray-800 mb-3">🎁 Total Hadiah</h3>
                            <div class="grid grid-cols-2 gap-3 text-sm">
                                <div class="bg-white border p-2 rounded shadow-sm">🏆 Piala Bergilir</div>
                                <div class="bg-white border p-2 rounded shadow-sm">💰 Uang Pembinaan</div>
                                <div class="bg-white border p-2 rounded shadow-sm">📜 Piagam Penghargaan</div>
                                <div class="bg-white border p-2 rounded shadow-sm">🎒 Merchandise RCourt</div>
                            </div>
                        </div>

                        <div class="mt-6 text-right">
                            <a href="{{ route('contact') }}" class="block w-full text-center bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition">
                                Daftar R-CUP Sekarang
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</body>
</html>