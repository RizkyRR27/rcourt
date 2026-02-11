<<<<<<< HEAD
<x-layouts.app :current-route="'contact'">
    <div class="flex min-h-[60vh] flex-col items-center justify-center bg-[var(--color-court-paper)] px-4 text-center">
        <h1 class="font-display text-6xl uppercase text-black">Hubungi Kami</h1>
        <p class="mt-4 max-w-md font-mono text-gray-600">
            WhatsApp: +62 812 3456 7890<br />
            Email: info@rcourt.id
        </p>
        <a href="{{ route('home') }}"
            class="mt-8 border-2 border-black bg-[var(--color-court-clay)] px-6 py-2 font-mono font-bold text-white shadow-hard hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-none transition-all">
            KEMBALI KE HOME
        </a>
    </div>
</x-layouts.app>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - RCourt</title>
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


    <div class="max-w-4xl mx-auto px-4 pb-20">
        
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h1>
            <p class="text-gray-600 text-lg">Punya pertanyaan seputar jadwal atau kendala booking?<br>Silakan chat admin kami di bawah ini.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            
            <div class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-green-500 text-center transform hover:-translate-y-1 transition duration-300">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                    📞
                </div>
                <h3 class="text-xl font-bold mb-1">Admin Bandar</h3>
                <p class="text-gray-500 mb-4">Layanan Umum & Booking</p>
                
                <div class="bg-yellow-50 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full inline-block mb-6">
                    📵 CHAT ONLY (NO CALL)
                </div>

                <a href="https://wa.me/628118032005?text=Halo%20Admin%20RCourt,%20saya%20mau%20tanya%20tentang%20booking%20lapangan..." 
                   target="_blank"
                   class="block w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-xl transition shadow-md flex items-center justify-center gap-2">
                    <span>Chat via WhatsApp</span>
                </a>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-green-500 text-center transform hover:-translate-y-1 transition duration-300">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                    💬
                </div>
                <h3 class="text-xl font-bold mb-1">Admin Abrar</h3>
                <p class="text-gray-500 mb-4">Kendala Teknis & Komplain</p>

                <div class="bg-yellow-50 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full inline-block mb-6">
                    📵 CHAT ONLY (NO CALL)
                </div>

                <a href="https://wa.me/6285186856944?text=Halo%20Admin%20RCourt,%20saya%20butuh%20bantuan..." 
                   target="_blank"
                   class="block w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-xl transition shadow-md flex items-center justify-center gap-2">
                    <span>Chat via WhatsApp</span>
                </a>
            </div>

        </div>

        <div class="mt-12 text-center text-gray-500 text-l">
            <p>Jam Operasional Admin Chat: <strong>08:00 - 22:00 WITA</strong></p>
            <p class="mt-2">Mohon tidak melakukan panggilan telepon (Voice/Video Call) agar kami dapat melayani antrian chat dengan lebih cepat.
                jangan spam, karena kami balas satu persatu dari urutan masuknya chat (dari bawah ke atas). Terima kasih atas pengertiannya!
            </p>
        </div>

    
    </div>
    <!-- maps dan sosmed -->
<div class="mt-16 bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="grid md:grid-cols-2">
                
                <div class="relative h-96 w-full bg-gray-200">
                    <iframe 
                        width="100%" 
                        height="100%" 
                        frameborder="0" 
                        style="border:0" 
                        src="https://maps.google.com/maps?q=-7.940920684598671,112.95314089261463&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                        allowfullscreen>
                    </iframe>
                </div>

                <div class="p-10 flex flex-col justify-center bg-white">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Temukan Kami</h2>
                    <p class="text-gray-500 mb-8">Ikuti update terbaru, promo, dan keseruan turnamen di media sosial resmi RCourt.</p>

                    <div class="space-y-4">
                        
                        <a href="https://instagram.com" target="_blank" class="flex items-center group p-3 rounded-lg hover:bg-pink-50 transition border border-gray-100 hover:border-pink-200">
                            <div class="w-10 h-10 bg-gradient-to-tr from-yellow-400 via-red-500 to-purple-500 text-white rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </div>
                            <span class="font-bold text-gray-700 group-hover:text-pink-600">Instagram</span>
                        </a>

                        <a href="https://tiktok.com" target="_blank" class="flex items-center group p-3 rounded-lg hover:bg-gray-50 transition border border-gray-100 hover:border-gray-300">
                            <div class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.65-1.62-1.12-1.76-1.65-2.52-1.65-3.64-1.65v10.51c0 2.79-1.87 5.25-4.59 5.86-2.55.57-5.25-.33-6.96-2.31-1.71-1.98-2.07-4.88-.93-7.2 1.13-2.33 3.66-3.74 6.27-3.49.52.03 1.04.1 1.54.21V5.2c-2.09-.94-4.57-.45-6.29 1.13-1.89 1.74-2.38 4.63-1.18 6.94 1.21 2.31 3.86 3.65 6.42 3.24 2.31-.38 4.14-2.22 4.51-4.53.38-2.36-.5-4.73-2.3-6.1-.73-.55-1.57-.96-2.45-1.21V.02z"/></svg>
                            </div>
                            <span class="font-bold text-gray-700 group-hover:text-black">TikTok</span>
                        </a>

                        <a href="https://facebook.com" target="_blank" class="flex items-center group p-3 rounded-lg hover:bg-blue-50 transition border border-gray-100 hover:border-blue-200">
                            <div class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </div>
                            <span class="font-bold text-gray-700 group-hover:text-blue-600">Facebook</span>
                        </a>

                        <a href="https://x.com" target="_blank" class="flex items-center group p-3 rounded-lg hover:bg-gray-100 transition border border-gray-100 hover:border-gray-400">
                            <div class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </div>
                            <span class="font-bold text-gray-700 group-hover:text-black">X (Twitter)</span>
                        </a>

                        <a href="https://youtube.com" target="_blank" class="flex items-center group p-3 rounded-lg hover:bg-red-50 transition border border-gray-100 hover:border-red-200">
                            <div class="w-10 h-10 bg-red-600 text-white rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </div>
                            <span class="font-bold text-gray-700 group-hover:text-red-600">YouTube</span>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    

</body>
</html>
>>>>>>> 44926623542cb29c83159a1eb3320e011f0f83a8
