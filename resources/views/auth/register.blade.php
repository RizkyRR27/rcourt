<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-[var(--color-court-paper)] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white border-4 border-black p-8 shadow-hard-lg relative">
            
            <div class="absolute -top-3 -left-3 bg-[var(--color-court-green)] text-white font-mono text-xs px-2 py-1 border-2 border-black">
                NEW PLAYER
            </div>

            <div>
                <h2 class="mt-2 text-center font-display text-4xl uppercase text-black">
                    Daftar <span class="text-[var(--color-court-green)]">Baru</span>
                </h2>
                <p class="mt-2 text-center font-mono text-sm text-gray-600">
                    Sudah punya akun? <a href="{{ route('login') }}" class="font-bold underline text-blue-600 hover:text-blue-800">Masuk di sini</a>.
                </p>
            </div>

            <form class="mt-8 space-y-4" action="{{ route('register') }}" method="POST">
                @csrf
                
                {{-- Nama Lengkap --}}
                <div>
                    <label class="font-mono text-xs font-bold uppercase">Nama Lengkap</label>
                    <input name="name" type="text" required class="w-full px-3 py-3 border-2 border-black focus:bg-yellow-50 focus:shadow-hard transition-all outline-none" placeholder="Jagoan Lapangan">
                </div>

                {{-- Email --}}
                <div>
                    <label class="font-mono text-xs font-bold uppercase">Email</label>
                    <input name="email" type="email" required class="w-full px-3 py-3 border-2 border-black focus:bg-yellow-50 focus:shadow-hard transition-all outline-none" placeholder="contoh@email.com">
                </div>

                {{-- No HP (PENTING UNTUK WA) --}}
                <div>
                    <label class="font-mono text-xs font-bold uppercase">No. WhatsApp (Aktif)</label>
                    <input name="phone" type="number" required class="w-full px-3 py-3 border-2 border-black focus:bg-yellow-50 focus:shadow-hard transition-all outline-none" placeholder="08123456789">
                    <p class="text-[10px] text-gray-500 font-mono mt-1">*Digunakan untuk notifikasi booking.</p>
                </div>

                {{-- Password --}}
                <div>
                    <label class="font-mono text-xs font-bold uppercase">Password</label>
                    <input name="password" type="password" required class="w-full px-3 py-3 border-2 border-black focus:bg-yellow-50 focus:shadow-hard transition-all outline-none">
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label class="font-mono text-xs font-bold uppercase">Ulangi Password</label>
                    <input name="password_confirmation" type="password" required class="w-full px-3 py-3 border-2 border-black focus:bg-yellow-50 focus:shadow-hard transition-all outline-none">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-3 px-4 border-2 border-black text-sm font-mono font-bold uppercase text-white bg-[var(--color-court-clay)] hover:bg-red-700 shadow-hard hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px] transition-all">
                        DAFTAR & MAIN 🚀
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>