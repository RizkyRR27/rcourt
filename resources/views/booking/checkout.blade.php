<x-layouts.app :current-route="'booking'">
    <div class="bg-[var(--color-court-paper)] pb-20 pt-10">

        <div class="mx-auto max-w-3xl px-4">
            {{-- Header Judul yang Benar --}}
            <div class="mb-8 text-center">
                <h2 class="font-display text-4xl uppercase">Konfirmasi Booking</h2>
                <p class="font-mono text-gray-500">Cek kembali detail pesanan Anda sebelum membayar.</p>
            </div>

            {{-- Card Rincian --}}
            <div class="border-2 border-black bg-white p-6 shadow-hard mb-8">
                <h3 class="font-display text-xl uppercase mb-4 border-b-2 border-gray-100 pb-2">Rincian Pesanan:</h3>

                <div class="space-y-3 font-mono text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Lapangan:</span>
                        <span class="font-bold">{{ $court->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Tanggal:</span>
                        {{-- Cek apakah tanggal ada --}}
                        <span class="font-bold {{ !$date ? 'text-red-600' : '' }}">
                            {{ $date ? \Carbon\Carbon::parse($date)->translatedFormat('d F Y') : 'DATA TANGGAL HILANG! (Silakan Kembali)' }}
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Jam:</span>
                        <span class="font-bold">{{ substr($startTime, 0, 5) }} - {{ substr($endTime, 0, 5) }}</span>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t-2 border-black flex justify-between items-center">
                    <span class="font-display text-lg uppercase">Total Bayar:</span>
                    <span class="font-display text-2xl text-[var(--color-court-clay)]">
                        Rp {{ number_format($price, 0, ',', '.') }}
                    </span>
                </div>
            </div>

            {{-- FORMULIR PENGISIAN DATA --}}
            <div class="border-2 border-black bg-white p-8 shadow-hard">

                {{-- Cek Error Validasi --}}
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    {{-- INPUT HIDDEN (PENTING!) --}}
                    <input type="hidden" name="court_id" value="{{ $court->id }}">
                    <input type="hidden" name="date" value="{{ $date }}">
                    <input type="hidden" name="start_time" value="{{ $startTime }}">
                    <input type="hidden" name="end_time" value="{{ $endTime }}">
                    <input type="hidden" name="total_price" value="{{ $price }}">

                    {{-- Input Nama --}}
                    <div>
                        <div class="flex justify-between items-end mb-2">
                            <label class="block font-mono text-xs font-bold uppercase text-gray-500">
                                Nama Lengkap
                            </label>

                            @auth
                                <button type="button" id="btn_use_my_data"
                                    class="inline-flex items-center gap-2 border-2 border-black bg-[var(--color-court-yellow)] px-3 py-1 font-mono text-[10px] font-bold uppercase shadow-hard transition-all hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px] active:bg-yellow-400"
                                    data-name="{{ Auth::user()->name }}" data-phone="{{ Auth::user()->phone }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Gunakan Data Saya
                                </button>
                            @endauth
                        </div>

                        <input type="text" name="name" id="input_name" required
                            class="w-full border-2 border-black p-3 font-mono text-sm focus:bg-[var(--color-court-yellow)] focus:outline-none"
                            placeholder="Masukkan nama pemesan">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                        {{-- Input WhatsApp --}}
                        <div class="mb-4">
                            <label class="block font-mono text-xs font-bold uppercase text-gray-500 mb-1">
                                Nomor WhatsApp (Wajib Diisi) <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" inputmode="numeric"
                                pattern="^(\+62|62|0)8[1-9][0-9]{6,9}$"
                                oninput="this.value = this.value.replace(/[^0-9+]/g, '')"
                                class="w-full border-2 border-black p-2 font-mono text-sm focus:bg-[var(--color-court-yellow)] focus:outline-none"
                                placeholder="Contoh: 081234567890">
                            <p id="phone_format_error" class="hidden text-xs text-red-500 mt-1 font-bold">
                                ⚠ Format Salah: Wajib diawali 08xx, min 10 digit, maks 13 digit.
                            </p>
                            <p class="text-xs text-gray-400 mt-1">Notifikasi booking dikirim ke nomor ini.</p>

                            @error('phone')
                                <p class="text-red-500 text-xs font-mono mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    {{-- Tampilkan Error Validasi Khusus --}}
                    @if ($errors->has('email') || $errors->has('phone'))
                        <p class="text-red-500 text-xs font-mono mb-4">* Wajib isi salah satu (Email atau WA) untuk
                            pengiriman Invoice.</p>
                    @endif

                    {{-- Input Metode Pembayaran --}}
                    <div class="mb-10">
                        <label class="block font-mono text-xs font-bold uppercase text-gray-500 mb-2">Metode
                            Pembayaran</label>

                        {{-- Dropdown Pilih Bank --}}
                        <div class="relative">
                            <select name="payment_method" id="payment_method"
                                class="w-full appearance-none border-2 border-black bg-white p-3 font-mono text-sm focus:bg-[var(--color-court-yellow)] focus:outline-none cursor-pointer">
                                <option value="cod">Bayar di Tempat (COD)</option>
                                {{-- Ubah value agar spesifik --}}
                                <option value="transfer_bca">Transfer Bank (BCA 123456789)</option>
                                <option value="transfer_bni">Transfer Bank (BNI 987654321)</option>
                            </select>

                            {{-- Icon Panah --}}
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4">
                                <div
                                    class="h-0 w-0 border-l-[6px] border-r-[6px] border-t-[8px] border-l-transparent border-r-transparent border-t-black">
                                </div>
                            </div>
                        </div>

                        {{-- Area Upload Bukti (Awalnya Disembunyikan / Hidden) --}}
                        <div id="proof_upload_container"
                            class="hidden mt-4 bg-gray-50 border-2 border-black p-4 border-dashed">
                            <label class="block font-mono text-xs font-bold uppercase text-gray-500 mb-2">
                                Upload Bukti Transfer <span class="text-red-500">*</span>
                            </label>
                            {{-- Input File dengan Desain Retro --}}
                            <input type="file" name="payment_proof" id="payment_proof" accept="image/*"
                                class="block w-full text-sm font-mono text-gray-500
                      file:mr-4 file:py-2 file:px-4
                      file:border-2 file:border-black
                      file:text-sm file:font-bold file:uppercase
                      file:bg-[var(--color-court-clay)] file:text-white
                      file:cursor-pointer hover:file:bg-red-700">
                            <p class="text-[10px] text-gray-400 mt-1 font-mono">Format: JPG, PNG, PDF. Maks 2MB.</p>
                        </div>
                    </div>

                    {{-- Script Javascript untuk Show/Hide --}}
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // --- LOGIKA AUTOFILL DATA USER ---
                            const btnUseMyData = document.getElementById('btn_use_my_data');
                            if (btnUseMyData) {
                                btnUseMyData.addEventListener('click', function() {
                                    const nameInput = document.getElementById('input_name');
                                    const phoneInput = document.querySelector('input[name="phone"]');

                                    if (nameInput) {
                                        nameInput.value = this.dataset.name || '';
                                    }
                                    if (phoneInput) {
                                        phoneInput.value = this.dataset.phone || '';
                                        phoneInput.dispatchEvent(new Event('input')); // trigger validasi
                                    }

                                    // Visual feedback
                                    this.textContent = '✓ Data Terisi!';
                                    this.classList.add('bg-green-300');
                                    setTimeout(() => {
                                        this.innerHTML =
                                            '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg> Gunakan Data Saya';
                                        this.classList.remove('bg-green-300');
                                    }, 1500);
                                });
                            }

                            // --- LOGIKA PAYMENT ---
                            const paymentSelect = document.getElementById('payment_method');
                            const uploadContainer = document.getElementById('proof_upload_container');
                            const fileInput = document.getElementById('payment_proof');

                            function toggleUploadField() {
                                const value = paymentSelect.value;

                                // Cek jika value mengandung kata 'transfer'
                                if (value === 'transfer_bca' || value === 'transfer_bni') {
                                    uploadContainer.classList.remove('hidden'); // Munculkan
                                    fileInput.required = true; // Wajib diisi
                                } else {
                                    uploadContainer.classList.add('hidden'); // Sembunyikan
                                    fileInput.required = false; // Tidak wajib
                                    fileInput.value = ''; // Reset file jika ganti ke COD
                                }
                            }

                            // Jalankan saat user mengganti pilihan
                            paymentSelect.addEventListener('change', toggleUploadField);

                            // Jalankan sekali saat halaman dimuat (untuk handle old input jika validasi error)
                            toggleUploadField();


                            // --- LOGIKA VALIDASI TELEPON INGGRIS (INDONESIA) ---
                            const phoneInput = document.querySelector('input[name="phone"]');
                            const phoneError = document.getElementById('phone_format_error');

                            if (phoneInput && phoneError) {
                                // 1. Cek saat user selesai ngetik (blur) -> Kalau salah, munculkan error
                                phoneInput.addEventListener('blur', function() {
                                    if (this.value.length > 0 && this.validity.patternMismatch) {
                                        phoneError.classList.remove('hidden');
                                    }
                                });

                                // 2. Cek saat user ngetik (input) -> Kalau sudah benar, hilangkan error
                                phoneInput.addEventListener('input', function() {
                                    if (!this.validity.patternMismatch) {
                                        phoneError.classList.add('hidden');
                                    }
                                });
                            }
                        });
                    </script>

                    {{-- Tombol Konfirmasi --}}
                    <button type="submit"
                        class="w-full border-2 border-black bg-[var(--color-court-green)] py-4 font-mono font-bold uppercase text-white shadow-hard transition-all hover:bg-green-700 hover:shadow-none active:translate-x-[2px] active:translate-y-[2px]">
                        Konfirmasi Booking
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-layouts.app>
