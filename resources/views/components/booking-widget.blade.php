

<div class="relative mx-auto -mt-24 max-w-4xl px-4 sm:px-6 lg:px-8">
    <div class="border-2 border-black bg-white p-8 shadow-hard">
        <div class="mb-8 text-center">
            <h3 class="font-display text-4xl uppercase">Mulai Booking</h3>
            <p class="font-mono text-sm text-gray-500">Isi form di bawah untuk mencari jadwal</p>
        </div>

        <form action="{{ route('booking.search') }}" method="GET" class="grid gap-6 md:grid-cols-3"> 
            {{-- Perubahan: Pakai method GET dan Grid jadi 3 kolom agar muat Durasi --}}
            
            {{-- 1. PILIH LAPANGAN --}}
            <div class="space-y-2">
                <label class="block font-mono text-xs font-bold uppercase text-gray-500">
                    Jenis Lapangan <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    {{-- PENTING: name harus 'type' bukan 'category' --}}
                    <select name="type" required
                        class="w-full appearance-none border-2 border-black bg-[var(--color-court-paper)] px-4 py-3 font-mono text-sm focus:bg-[var(--color-court-yellow)] focus:outline-none">
                        <option value="" disabled selected>-- Pilih Lapangan --</option>
                        
                        {{-- Opsi Lapangan (Sesuai Controller) --}}
                        <option value="badminton" {{ old('type') == 'badminton' ? 'selected' : '' }}>Badminton</option>
                        <option value="futsal" {{ old('type') == 'futsal' ? 'selected' : '' }}>Futsal</option>
                        <option value="basket_indoor" {{ old('type') == 'basket_indoor' ? 'selected' : '' }}>Basket Indoor</option>
                        <option value="tennis" {{ old('type') == 'tennis' ? 'selected' : '' }}>Tennis</option> {{-- Ganti Basket Outdoor jadi Tennis --}}
                        <option value="mini_soccer" {{ old('type') == 'mini_soccer' ? 'selected' : '' }}>Mini Soccer</option>
                        <option value="padel" {{ old('type') == 'padel' ? 'selected' : '' }}>Padel</option>
                    </select>
                    
                    {{-- Panah Dropdown --}}
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4">
                        <div class="h-0 w-0 border-l-[6px] border-r-[6px] border-t-[8px] border-l-transparent border-r-transparent border-t-black"></div>
                    </div>
                </div>
            </div>

            {{-- 2. PILIH TANGGAL --}}
            <div class="space-y-2">
                <label class="block font-mono text-xs font-bold uppercase text-gray-500">
                    Tanggal Main <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="date" name="date" required value="{{ old('date') }}"
                        class="w-full border-2 border-black bg-[var(--color-court-paper)] px-4 py-3 font-mono text-sm focus:bg-[var(--color-court-yellow)] focus:outline-none" />
                </div>
            </div>

            {{-- 3. PILIH DURASI (SAYA TAMBAHKAN INI) --}}
            <div class="space-y-2">
                <label class="block font-mono text-xs font-bold uppercase text-gray-500">
                    Durasi Main <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <select name="duration" required
                        class="w-full appearance-none border-2 border-black bg-[var(--color-court-paper)] px-4 py-3 font-mono text-sm focus:bg-[var(--color-court-yellow)] focus:outline-none">
                        <option value="1" {{ old('duration') == '1' ? 'selected' : '' }}>1 Jam</option>
                        <option value="2" {{ old('duration') == '2' ? 'selected' : '' }}>2 Jam</option>
                        <option value="3" {{ old('duration') == '3' ? 'selected' : '' }}>3 Jam</option>
                        <option value="4" {{ old('duration') == '4' ? 'selected' : '' }}>4 Jam</option>
                        <option value="5" {{ old('duration') == '5' ? 'selected' : '' }}>5 Jam</option>
                    </select>
                     <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4">
                        <div class="h-0 w-0 border-l-[6px] border-r-[6px] border-t-[8px] border-l-transparent border-r-transparent border-t-black"></div>
                    </div>
                </div>
            </div>

            {{-- TOMBOL SUBMIT --}}
            <div class="md:col-span-3 mt-2">
                <button type="submit"
                    class="w-full font-mono font-bold uppercase transition-all duration-200 active:translate-x-[2px] active:translate-y-[2px] active:shadow-none border-2 border-black px-6 py-4 text-lg tracking-wider bg-[var(--color-court-clay)] text-white shadow-hard hover:bg-red-600 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    CEK JADWAL
                </button>
            </div>
        </form>
    </div>
</div>
