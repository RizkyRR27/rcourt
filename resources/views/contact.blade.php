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

    <nav class="bg-white shadow mb-10">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">RCourt.</a>
            <div class="space-x-6">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600">Home</a>
                <a href="{{ route('booking') }}" class="text-gray-600 hover:text-blue-600">Booking</a>
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

</body>
</html>