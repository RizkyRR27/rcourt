<x-layouts.app title="Klaim Hadiah">
    <div class="py-12 bg-white min-h-[60vh]">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="text-center mb-12">
                <h1 class="font-display text-5xl uppercase text-black mb-4">
                    KLAIM <span class="text-[var(--color-court-clay)]">HADIAH</span>
                </h1>
                <p class="font-mono text-gray-600 max-w-2xl mx-auto">
                    Selamat! Kerja keras dan keringatmu membuahkan hasil. Pilih hadiah yang kamu inginkan sekarang.
                </p>
            </div>

            {{-- Alert Success --}}
            @if (session('success'))
                <div
                    class="mb-8 p-4 bg-[var(--color-court-green)] text-white border-2 border-black shadow-hard font-mono font-bold text-center">
                    {{ session('success') }}
                </div>
            @endif

            {{-- List Rewards --}}
            @forelse ($rewards as $reward)
                <div
                    class="bg-[var(--color-court-paper)] border-2 border-black p-8 shadow-hard mb-8 relative overflow-hidden group">

                    {{-- Badge --}}
                    <div
                        class="absolute top-0 right-0 bg-[var(--color-court-yellow)] text-black px-4 py-2 font-mono text-xs font-bold uppercase border-l-2 border-b-2 border-black">
                        TIKET KLAIM #{{ $reward->id }}
                    </div>

                    <div class="md:flex items-start gap-8">
                        <div class="flex-grow">
                            <h3 class="font-display text-3xl uppercase mb-2">Pilih Hadiahmu!</h3>
                            <p class="font-mono text-gray-600 mb-6 text-sm">
                                Kamu berhak memilih satu dari opsi di bawah ini. Pilihan tidak dapat diubah setelah
                                dikonfirmasi.
                            </p>

                            <form action="{{ route('reward.choose', $reward->id) }}" method="POST"
                                x-data="{ selected: '' }">
                                @csrf
                                <input type="hidden" name="choice" :value="selected">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                    {{-- Opsi 1: Diskon --}}
                                    <div @click="selected = 'discount'"
                                        class="cursor-pointer p-4 border-2 border-black transition-all h-full flex flex-col justify-between"
                                        :class="selected === 'discount' ? 'bg-[#39ff14] shadow-hard' :
                                            'bg-white hover:bg-gray-50'">
                                        <div>
                                            <div class="font-bold font-mono text-lg mb-1 uppercase">DISKON 10%</div>
                                            <p class="text-xs text-gray-500 font-mono">Potongan langsung untuk booking
                                                selanjutnya.</p>
                                        </div>
                                    </div>

                                    {{-- Opsi 2: Tumbler --}}
                                    <div @click="selected = 'tumbler'"
                                        class="cursor-pointer p-4 border-2 border-black transition-all h-full flex flex-col justify-between"
                                        :class="selected === 'tumbler' ? 'bg-[#39ff14] shadow-hard' :
                                            'bg-white hover:bg-gray-50'">
                                        <div>
                                            <div class="font-bold font-mono text-lg mb-1 uppercase">TUMBLER EKSKLUSIF
                                            </div>
                                            <p class="text-xs text-gray-500 font-mono">Botol minum edisi terbatas
                                                RCOURT.</p>
                                        </div>
                                    </div>

                                    {{-- Opsi 3: Handuk --}}
                                    <div @click="selected = 'towel'"
                                        class="cursor-pointer p-4 border-2 border-black transition-all h-full flex flex-col justify-between"
                                        :class="selected === 'towel' ? 'bg-[#39ff14] shadow-hard' :
                                            'bg-white hover:bg-gray-50'">
                                        <div>
                                            <div class="font-bold font-mono text-lg mb-1 uppercase">SPORT TOWEL</div>
                                            <p class="text-xs text-gray-500 font-mono">Handuk olahraga premium daya
                                                serap tinggi.</p>
                                        </div>
                                    </div>

                                    {{-- Opsi 4: Voucher --}}
                                    <div @click="selected = 'voucher'"
                                        class="cursor-pointer p-4 border-2 border-black transition-all h-full flex flex-col justify-between"
                                        :class="selected === 'voucher' ? 'bg-[#39ff14] shadow-hard' :
                                            'bg-white hover:bg-gray-50'">
                                        <div>
                                            <div class="font-bold font-mono text-lg mb-1 uppercase">VOUCHER CUKUR</div>
                                            <p class="text-xs text-gray-500 font-mono">Gratis cukur di Barbershop mitra
                                                kami.</p>
                                        </div>
                                    </div>

                                </div>

                                <div class="mt-8 text-right">
                                    <button type="submit" :disabled="!selected"
                                        class="inline-block bg-black text-white px-8 py-3 font-mono font-bold uppercase border-2 border-transparent hover:bg-[var(--color-court-clay)] transition-all shadow-hard transform hover:-translate-y-1 disabled:opacity-50 disabled:cursor-not-allowed">
                                        KONFIRMASI PILIHAN
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 border-2 border-dashed border-gray-300 bg-gray-50">
                    <h3 class="font-mono font-bold text-xl text-gray-500 mb-2 uppercase">Belum Ada Hadiah</h3>
                    <p class="text-gray-400 font-mono text-sm max-w-md mx-auto mb-6">
                        Terus bermain dan kumpulkan jam terbangmu untuk membuka hadiah spesial!
                    </p>
                    <a href="{{ route('booking') }}"
                        class="inline-block border-2 border-black bg-white px-6 py-2 font-mono font-bold uppercase hover:bg-[var(--color-court-yellow)] transition-all shadow-hard">
                        Main Lagi Yuk!
                    </a>
                </div>
            @endforelse

        </div>
    </div>
</x-layouts.app>
