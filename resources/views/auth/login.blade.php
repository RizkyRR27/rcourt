<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-[var(--color-court-paper)] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white border-4 border-black p-8 shadow-hard-lg relative">
            
            {{-- Hiasan Sudut --}}
            <div class="absolute -top-3 -left-3 bg-[var(--color-court-clay)] text-white font-mono text-xs px-2 py-1 border-2 border-black">
                MEMBER AREA
            </div>

            <div>
                <h2 class="mt-2 text-center font-display text-4xl uppercase text-black">
                    Masuk <span class="text-[var(--color-court-clay)]">Arena</span>
                </h2>
                <p class="mt-2 text-center font-mono text-sm text-gray-600">
                    Atau <a href="{{ route('register') }}" class="font-bold underline text-blue-600 hover:text-blue-800">daftar akun baru</a> jika belum punya.
                </p>
            </div>

            {{-- Flash Message Error --}}
            @if(session('error'))
                <div class="bg-red-100 border-2 border-red-500 text-red-700 px-4 py-3 font-mono text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
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
                        <input id="email" name="email" type="email" required class="appearance-none relative block w-full px-3 py-3 border-2 border-black placeholder-gray-500 text-gray-900 focus:outline-none focus:bg-yellow-50 focus:border-black focus:shadow-hard sm:text-sm transition-all" placeholder="nama@email.com">
                    </div>
                    <div>
                        <label for="password" class="font-mono text-xs font-bold uppercase">Password</label>
                        <input id="password" name="password" type="password" required class="appearance-none relative block w-full px-3 py-3 border-2 border-black placeholder-gray-500 text-gray-900 focus:outline-none focus:bg-yellow-50 focus:border-black focus:shadow-hard sm:text-sm transition-all" placeholder="••••••••">
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border-2 border-black text-sm font-mono font-bold uppercase text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black shadow-hard hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px] transition-all">
                        MASUK SEKARANG
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>