<div class="relative mx-auto -mt-24 max-w-4xl px-4 sm:px-6 lg:px-8">
    <div class="border-2 border-black bg-white p-8 shadow-hard">
        <div class="mb-8 text-center">
            <h3 class="font-display text-4xl uppercase">Mulai Booking</h3>
            <p class="font-mono text-sm text-gray-500">Isi form di bawah untuk mencari jadwal</p>
        </div>

        <form action="{{ route('booking.search') }}" method="POST" class="grid gap-6 md:grid-cols-2">
            @csrf

            <div class="space-y-2">
                <label class="block font-mono text-xs font-bold uppercase text-gray-500">
                    Pilih Jenis Lapangan <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <select name="category"
                        class="w-full appearance-none border-2 border-black bg-[var(--color-court-paper)] px-4 py-3 font-mono text-sm focus:bg-[var(--color-court-yellow)] focus:outline-none">
                        <option>-- Pilih Lapangan --</option>
                        <option value="badminton">Badminton</option>
                        <option value="futsal">Futsal</option>
                        <option value="basket_indoor">Basket Indoor</option>
                        <option value="basket_outdoor">Basket Outdoor</option>
                        <option value="mini_soccer">Mini Soccer</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4">
                        <div
                            class="h-0 w-0 border-l-[6px] border-r-[6px] border-t-[8px] border-l-transparent border-r-transparent border-t-black">
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label class="block font-mono text-xs font-bold uppercase text-gray-500">
                    Pilih Tanggal Main <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="date" name="date"
                        class="w-full border-2 border-black bg-[var(--color-court-paper)] px-4 py-3 font-mono text-sm focus:bg-[var(--color-court-yellow)] focus:outline-none" />
                    <svg class="pointer-events-none absolute right-4 top-3.5 h-5 w-5 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>

            <div class="md:col-span-2">
                <button type="submit"
                    class="w-full font-mono font-bold uppercase transition-all duration-200 active:translate-x-[2px] active:translate-y-[2px] active:shadow-none border-2 border-black px-6 py-4 text-lg tracking-wider bg-[var(--color-court-clay)] text-white shadow-hard hover:bg-red-600 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    CEK KETERSEDIAAN JADWAL
                </button>
            </div>
        </form>
    </div>
</div>
