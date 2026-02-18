<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-[var(--color-court-paper)] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white border-4 border-black p-8 shadow-hard-lg relative">

            <div
                class="absolute -top-3 -left-3 bg-[var(--color-court-green)] text-white font-mono text-xs px-2 py-1 border-2 border-black">
                NEW PLAYER
            </div>

            <div>
                <h2 class="mt-2 text-center font-display text-4xl uppercase text-black">
                    Daftar <span class="text-[var(--color-court-green)]">Baru</span>
                </h2>
                <p class="mt-2 text-center font-mono text-sm text-gray-600">
                    Sudah punya akun? <a href="{{ route('login') }}"
                        class="font-bold underline text-blue-600 hover:text-blue-800">Masuk di sini</a>.
                </p>
            </div>

            {{-- Error Validasi Global --}}
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4">
                    <ul class="list-disc pl-5 text-xs font-mono">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="mt-8 space-y-4" action="{{ route('register') }}" method="POST">
                @csrf

                {{-- Nama Lengkap --}}
                <div>
                    <label class="font-mono text-xs font-bold uppercase">Nama Lengkap</label>
                    <input name="name" type="text" value="{{ old('name') }}" required
                        class="w-full px-3 py-3 border-2 border-black focus:bg-yellow-50 focus:shadow-hard transition-all outline-none @error('name') border-red-500 @enderror"
                        placeholder="Jagoan Lapangan">
                    @error('name')
                        <p class="text-red-500 text-xs font-mono mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="font-mono text-xs font-bold uppercase">Email</label>
                    <input name="email" type="email" value="{{ old('email') }}" required
                        pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                        class="w-full px-3 py-3 border-2 border-black focus:bg-yellow-50 focus:shadow-hard transition-all outline-none @error('email') border-red-500 @enderror"
                        placeholder="contoh@email.com">
                    <p id="email_format_error" class="hidden text-xs text-red-500 mt-1 font-bold">
                        ⚠ Format Email Salah (contoh: user@domain.com)
                    </p>
                    @error('email')
                        <p class="text-red-500 text-xs font-mono mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- No HP (PENTING UNTUK WA) --}}
                <div>
                    <label class="font-mono text-xs font-bold uppercase">No. WhatsApp (Aktif)</label>
                    <input name="phone" type="tel" value="{{ old('phone') }}" required inputmode="numeric"
                        pattern="^(\+62|62|0)8[1-9][0-9]{6,9}$"
                        oninput="this.value = this.value.replace(/[^0-9+]/g, '')"
                        class="w-full px-3 py-3 border-2 border-black focus:bg-yellow-50 focus:shadow-hard transition-all outline-none @error('phone') border-red-500 @enderror"
                        placeholder="Contoh: 081234567890">
                    <p id="phone_format_error" class="hidden text-xs text-red-500 mt-1 font-bold">
                        ⚠ Format Salah: Wajib diawali 08xx, min 10 digit, maks 13 digit.
                    </p>
                    <p class="text-[10px] text-gray-500 font-mono mt-1">*Digunakan untuk notifikasi booking.</p>
                    @error('phone')
                        <p class="text-red-500 text-xs font-mono mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="font-mono text-xs font-bold uppercase">Password</label>
                    <div class="relative">
                        <input id="reg_password" name="password" type="password" required
                            class="w-full px-3 py-3 pr-12 border-2 border-black focus:bg-yellow-50 focus:shadow-hard transition-all outline-none @error('password') border-red-500 @enderror"
                            placeholder="Minimal 6 karakter">
                        <button type="button" onclick="togglePassword('reg_password', this)"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-black transition-colors">
                            <svg class="icon-eye h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg class="icon-eye-off h-5 w-5 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs font-mono mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label class="font-mono text-xs font-bold uppercase">Ulangi Password</label>
                    <div class="relative">
                        <input id="reg_password_confirmation" name="password_confirmation" type="password" required
                            class="w-full px-3 py-3 pr-12 border-2 border-black focus:bg-yellow-50 focus:shadow-hard transition-all outline-none">
                        <button type="button" onclick="togglePassword('reg_password_confirmation', this)"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-black transition-colors">
                            <svg class="icon-eye h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg class="icon-eye-off h-5 w-5 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full py-3 px-4 border-2 border-black text-sm font-mono font-bold uppercase text-white bg-[var(--color-court-clay)] hover:bg-red-700 shadow-hard hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px] transition-all">
                        DAFTAR & MAIN
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Script Validasi Nomor Telepon & Email --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Validasi Telepon
            const phoneInput = document.querySelector('input[name="phone"]');
            const phoneError = document.getElementById('phone_format_error');

            if (phoneInput && phoneError) {
                phoneInput.addEventListener('blur', function() {
                    if (this.value.length > 0 && this.validity.patternMismatch) {
                        phoneError.classList.remove('hidden');
                    }
                });

                phoneInput.addEventListener('input', function() {
                    if (!this.validity.patternMismatch) {
                        phoneError.classList.add('hidden');
                    }
                });
            }

            // Validasi Email
            const emailInput = document.querySelector('input[name="email"]');
            const emailError = document.getElementById('email_format_error');

            if (emailInput && emailError) {
                emailInput.addEventListener('blur', function() {
                    if (this.value.length > 0 && this.validity.patternMismatch) {
                        emailError.classList.remove('hidden');
                    }
                });

                emailInput.addEventListener('input', function() {
                    if (!this.validity.patternMismatch) {
                        emailError.classList.add('hidden');
                    }
                });
            }
        });
    </script>

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
