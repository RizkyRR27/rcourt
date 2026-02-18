<x-layouts.app :current-route="'profile'">
    <div x-data="{ showPasswordModal: false }" class="bg-[var(--color-court-paper)] pb-20 pt-10">

        {{-- HEADER --}}
        <div class="mx-auto max-w-7xl px-4 text-center mb-12">
            <h1 class="font-display text-6xl uppercase md:text-8xl text-black">
                My <span class="text-[var(--color-court-clay)]">Profile</span>
            </h1>
            <p class="font-mono text-gray-600 mt-4 max-w-2xl mx-auto">
                Kelola informasi akun dan keamanan Anda.
            </p>
        </div>

        <div class="mx-auto max-w-3xl px-4 space-y-10">

            {{-- SUCCESS MESSAGE --}}
            @if (session('success'))
                <div class="border-2 border-black bg-green-100 p-4 shadow-hard flex items-center gap-3">
                    <span class="text-2xl">✅</span>
                    <p class="font-mono font-bold text-green-800">{{ session('success') }}</p>
                </div>
            @endif

            {{-- ERROR MESSAGES --}}
            @if ($errors->any())
                <div class="border-2 border-black bg-red-100 p-4 shadow-hard">
                    <h3 class="font-display text-lg uppercase font-bold text-red-800 mb-2">Terjadi Kesalahan</h3>
                    <ul class="list-disc pl-5 font-mono text-sm text-red-700 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ================================== --}}
            {{-- INFORMASI PROFIL --}}
            {{-- ================================== --}}
            <div class="border-2 border-black bg-white shadow-hard">
                <div class="border-b-2 border-black bg-black px-6 py-4">
                    <h2 class="font-display text-2xl uppercase text-white tracking-wider">Informasi Profil</h2>
                </div>

                <form action="{{ route('profile.update') }}" method="POST" class="p-6 md:p-8 space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Avatar / Initial --}}
                    <div class="flex items-center gap-6 pb-6 border-b-2 border-dashed border-black/20">
                        <div
                            class="shrink-0 h-20 w-20 border-2 border-black bg-[var(--color-court-clay)] flex items-center justify-center shadow-hard-sm">
                            <span
                                class="font-display text-3xl text-white uppercase">{{ substr($user->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <p class="font-display text-xl uppercase">{{ $user->name }}</p>
                            <p class="font-mono text-sm text-gray-500">{{ $user->email }}</p>
                            <p class="font-mono text-xs text-gray-400 mt-1">Member sejak
                                {{ $user->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    {{-- Name --}}
                    <div>
                        <label class="block font-mono text-xs font-bold uppercase text-gray-600 mb-2">Nama
                            Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="w-full border-2 border-black px-4 py-3 font-mono text-sm shadow-hard-sm focus:outline-none focus:ring-2 focus:ring-[var(--color-court-clay)]"
                            required>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block font-mono text-xs font-bold uppercase text-gray-600 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full border-2 border-black px-4 py-3 font-mono text-sm shadow-hard-sm focus:outline-none focus:ring-2 focus:ring-[var(--color-court-clay)]"
                            required>
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label class="block font-mono text-xs font-bold uppercase text-gray-600 mb-2">Nomor
                            Telepon</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="w-full border-2 border-black px-4 py-3 font-mono text-sm shadow-hard-sm focus:outline-none focus:ring-2 focus:ring-[var(--color-court-clay)]"
                            required>
                    </div>

                    {{-- Buttons: Simpan + Ubah Password --}}
                    <div class="pt-4 flex flex-col sm:flex-row gap-3">
                        <button type="submit"
                            class="flex-1 border-2 border-black bg-[var(--color-court-clay)] px-6 py-4 font-mono font-bold uppercase text-white shadow-hard transition-all hover:-translate-y-px active:translate-y-0 active:shadow-none">
                            Simpan Perubahan
                        </button>
                        <button type="button" @click="showPasswordModal = true"
                            class="flex-1 border-2 border-black bg-white px-6 py-4 font-mono font-bold uppercase text-black shadow-hard transition-all hover:-translate-y-px hover:bg-gray-100 active:translate-y-0 active:shadow-none">
                            Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ================================== --}}
        {{-- MODAL UBAH PASSWORD --}}
        {{-- ================================== --}}
        <div x-show="showPasswordModal" x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
            x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="w-full max-w-md border-2 border-black bg-white shadow-hard"
                @click.outside="showPasswordModal = false" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">

                {{-- Modal Header --}}
                <div class="border-b-2 border-black bg-black px-6 py-4 flex items-center justify-between">
                    <h2 class="font-display text-xl uppercase text-white tracking-wider">Ubah Password</h2>
                    <button @click="showPasswordModal = false" class="text-white hover:text-red-400 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Modal Body --}}
                <form action="{{ route('profile.password') }}" method="POST" class="p-6 space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-mono text-xs font-bold uppercase text-gray-600 mb-2">Password Saat
                            Ini</label>
                        <input type="password" name="current_password"
                            class="w-full border-2 border-black px-4 py-3 font-mono text-sm shadow-hard-sm focus:outline-none focus:ring-2 focus:ring-[var(--color-court-clay)]"
                            required>
                    </div>

                    <div>
                        <label class="block font-mono text-xs font-bold uppercase text-gray-600 mb-2">Password
                            Baru</label>
                        <input type="password" name="password"
                            class="w-full border-2 border-black px-4 py-3 font-mono text-sm shadow-hard-sm focus:outline-none focus:ring-2 focus:ring-[var(--color-court-clay)]"
                            required>
                    </div>

                    <div>
                        <label class="block font-mono text-xs font-bold uppercase text-gray-600 mb-2">Konfirmasi
                            Password Baru</label>
                        <input type="password" name="password_confirmation"
                            class="w-full border-2 border-black px-4 py-3 font-mono text-sm shadow-hard-sm focus:outline-none focus:ring-2 focus:ring-[var(--color-court-clay)]"
                            required>
                    </div>

                    <div class="flex gap-3 pt-2">
                        <button type="button" @click="showPasswordModal = false"
                            class="flex-1 border-2 border-black bg-white px-4 py-3 font-mono font-bold uppercase text-black shadow-hard-sm transition-all hover:-translate-y-px active:translate-y-0 active:shadow-none">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 border-2 border-black bg-red-600 px-4 py-3 font-mono font-bold uppercase text-white shadow-hard-sm transition-all hover:-translate-y-px hover:bg-red-700 active:translate-y-0 active:shadow-none">
                            Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-layouts.app>
