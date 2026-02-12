<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - RCourt</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans min-h-screen py-10">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-200">
        <h2 class="text-2xl font-bold mb-6 border-b pb-4 text-gray-800">Konfirmasi Booking</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                <strong class="font-bold">Gagal!</strong>
                <ul class="mt-1 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-blue-50 p-6 rounded-xl border border-blue-100 mb-8">
    <h3 class="font-bold text-blue-800 mb-4 text-lg">Rincian:</h3>
    
    <div class="space-y-2 text-sm text-gray-700">
        <div class="flex justify-between">
            <span class="font-bold">Lapangan:</span>
            <span>{{ $court->name }}</span>
        </div>
        
        <div class="flex justify-between">
            <span class="font-bold">Tanggal:</span>
            <span>{{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}</span>
        </div>
        
        <div class="flex justify-between">
            <span class="font-bold">Jam:</span>
            <span>{{ substr($startTime, 0, 5) }} - {{ substr($endTime, 0, 5) }}</span>
        </div>
    </div>

    <div class="mt-4 pt-4 border-t border-blue-200 flex justify-between items-center">
        <span class="font-bold text-blue-900 text-lg">Total Bayar:</span>
        <span class="font-bold text-blue-900 text-xl">
            Rp {{ number_format($price, 0, ',', '.') }}
        </span>
    </div>
</div>

        <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden" name="court_id" value="{{ $court->id }}">
            <input type="hidden" name="date" value="{{ $date }}">
            <input type="hidden" name="start_time" value="{{ $startTime }}">
            <input type="hidden" name="end_time" value="{{ $endTime }}">
            <input type="hidden" name="total_price" value="{{ $price }}">

            <div class="mb-6">
                <label class="block font-bold mb-2 text-gray-700">Metode Pembayaran</label>
                <select name="payment_method" id="payment_method" class="w-full border border-gray-300 p-3 rounded-lg" onchange="toggleUpload()">
                    <option value="cod">Bayar di Tempat (COD)</option>
                    <option value="transfer">Transfer Bank (BCA / Mandiri)</option>
                </select>
            </div>

            <div id="upload_section" class="mb-8 hidden">
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
                    <p class="text-sm text-yellow-800">
                        Transfer ke <strong>BCA: 1234567890 (RCourt)</strong><br>
                        Lalu upload bukti di bawah ini.
                    </p>
                </div>
                <label class="block font-bold mb-2 text-gray-700">Upload Bukti Transfer</label>
                <input type="file" name="payment_proof" class="w-full border border-gray-300 p-2 rounded-lg bg-gray-50">
            </div>

            <button type="submit" class="w-full bg-green-600 text-white font-bold py-4 rounded-lg hover:bg-green-700 transition shadow-md text-lg">
                Konfirmasi & Booking Sekarang
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('booking') }}" class="text-gray-500 hover:text-red-500 text-sm">Batal & Kembali</a>
        </div>
    </div>

    <script>
        function toggleUpload() {
            var method = document.getElementById("payment_method").value;
            var section = document.getElementById("upload_section");
            if (method === "transfer") {
                section.classList.remove("hidden");
            } else {
                section.classList.add("hidden");
            }
        }
    </script>

</body>
</html>