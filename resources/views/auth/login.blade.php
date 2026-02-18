<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-[var(--color-court-paper)] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white border-4 border-black p-8 shadow-hard-lg relative">

            {{-- Hiasan Sudut --}}
            <div
                class="absolute -top-3 -left-3 bg-[var(--color-court-clay)] text-white font-mono text-xs px-2 py-1 border-2 border-black">
                MEMBER AREA
            </div>

            <div>
                <h2 class="mt-2 text-center font-display text-4xl uppercase text-black">
                    Masuk <span class="text-[var(--color-court-clay)]">Arena</span>
                </h2>
                <p class="mt-2 text-center font-mono text-sm text-gray-600">
                    Atau <a href="{{ route('register') }}"
                        class="font-bold underline text-blue-600 hover:text-blue-800">daftar akun baru</a> jika belum
                    punya.
                </p>
            </div>

            {{-- Flash Message Error --}}
            @if (session('error'))
                <div class="bg-red-100 border-2 border-red-500 text-red-700 px-4 py-3 font-mono text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border-2 border-red-500 text-red-700 px-4 py-3 font-mono text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="email" class="font-mono text-xs font-bold uppercase">Email Address</label>
                        <input id="email" name="email" type="email" required
                            class="appearance-none relative block w-full px-3 py-3 border-2 border-black placeholder-gray-500 text-gray-900 focus:outline-none focus:bg-yellow-50 focus:border-black focus:shadow-hard sm:text-sm transition-all"
                            placeholder="nama@email.com">
                    </div>
                    <div>
                        <label for="password" class="font-mono text-xs font-bold uppercase">Password</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required
                                class="appearance-none relative block w-full px-3 py-3 pr-12 border-2 border-black placeholder-gray-500 text-gray-900 focus:outline-none focus:bg-yellow-50 focus:border-black focus:shadow-hard sm:text-sm transition-all"
                                placeholder="••••••••">
                            <button type="button" onclick="togglePassword('password', this)"
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
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border-2 border-black text-sm font-mono font-bold uppercase text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black shadow-hard hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px] transition-all">
                        MASUK SEKARANG
                    </button>
                </div>
            </form>
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
