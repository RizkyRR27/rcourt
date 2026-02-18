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
                        <div class="relative">
                            <input id="profile_current_password" type="password" name="current_password"
                                class="w-full border-2 border-black px-4 py-3 pr-12 font-mono text-sm shadow-hard-sm focus:outline-none focus:ring-2 focus:ring-[var(--color-court-clay)]"
                                required>
                            <button type="button" onclick="togglePassword('profile_current_password', this)"
                                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-black transition-colors">
                                <svg class="icon-eye h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg class="icon-eye-off h-5 w-5 hidden" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block font-mono text-xs font-bold uppercase text-gray-600 mb-2">Password
                            Baru</label>
                        <div class="relative">
                            <input id="profile_new_password" type="password" name="password"
                                class="w-full border-2 border-black px-4 py-3 pr-12 font-mono text-sm shadow-hard-sm focus:outline-none focus:ring-2 focus:ring-[var(--color-court-clay)]"
                                required>
                            <button type="button" onclick="togglePassword('profile_new_password', this)"
                                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-black transition-colors">
                                <svg class="icon-eye h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg class="icon-eye-off h-5 w-5 hidden" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block font-mono text-xs font-bold uppercase text-gray-600 mb-2">Konfirmasi
                            Password Baru</label>
                        <div class="relative">
                            <input id="profile_password_confirmation" type="password" name="password_confirmation"
                                class="w-full border-2 border-black px-4 py-3 pr-12 font-mono text-sm shadow-hard-sm focus:outline-none focus:ring-2 focus:ring-[var(--color-court-clay)]"
                                required>
                            <button type="button" onclick="togglePassword('profile_password_confirmation', this)"
                                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-black transition-colors">
                                <svg class="icon-eye h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg class="icon-eye-off h-5 w-5 hidden" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
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

    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const eyeIcon = btn.querySelector('.icon-eye');
            const eyeOffIcon = btn.querySelector('.icon-eye-off');
            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
            } else {
                input.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
            }
        }
    </script>
</x-layouts.app>
