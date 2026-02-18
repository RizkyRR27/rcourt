<x-layouts.app title="Riwayat Hadiah">
    <div class="py-12 bg-white min-h-[60vh]">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="text-center mb-12">
                <h1 class="font-display text-5xl uppercase text-black mb-4">
                    RIWAYAT <span class="text-[var(--color-court-clay)]">HADIAH</span>
                </h1>
                <p class="font-mono text-gray-600 max-w-2xl mx-auto">
                    Daftar hadiah yang telah kamu redeem dari program loyalitas RCOURT.
                </p>
            </div>

            {{-- List Redeemed Rewards --}}
            @forelse ($rewards as $reward)
                <div
                    class="bg-[var(--color-court-paper)] border-2 border-black p-6 shadow-hard mb-4 relative overflow-hidden">

                    <div class="flex items-center justify-between gap-4">
                        {{-- Left: Reward Info --}}
                        <div class="flex items-center gap-4">
                            {{-- Icon --}}
                            <div
                                class="flex-shrink-0 w-12 h-12 border-2 border-black flex items-center justify-center
                                @if ($reward->reward_type === 'discount') bg-[var(--color-court-yellow)]
                                @elseif($reward->reward_type === 'tumbler') bg-blue-100
                                @elseif($reward->reward_type === 'towel') bg-green-100
                                @elseif($reward->reward_type === 'voucher') bg-purple-100
                                @else bg-gray-100 @endif">
                                @if ($reward->reward_type === 'discount')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="m15 9-6 6" />
                                        <path d="M9 9h.01" />
                                        <path d="M15 15h.01" />
                                    </svg>
                                @elseif($reward->reward_type === 'tumbler')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 8h1a4 4 0 1 1 0 8h-1" />
                                        <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z" />
                                        <line x1="6" x2="6" y1="2" y2="4" />
                                        <line x1="10" x2="10" y1="2" y2="4" />
                                        <line x1="14" x2="14" y1="2" y2="4" />
                                    </svg>
                                @elseif($reward->reward_type === 'towel')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="18" height="18" x="3" y="3" rx="2" />
                                        <path d="M7 7h10" />
                                        <path d="M7 12h10" />
                                        <path d="M7 17h10" />
                                    </svg>
                                @elseif($reward->reward_type === 'voucher')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z" />
                                        <path d="M13 5v2" />
                                        <path d="M13 17v2" />
                                        <path d="M13 11v2" />
                                    </svg>
                                @endif
                            </div>

                            {{-- Details --}}
                            <div>
                                <div class="font-bold font-mono text-lg uppercase">
                                    @if ($reward->reward_type === 'discount')
                                        DISKON 10%
                                    @elseif($reward->reward_type === 'tumbler')
                                        TUMBLER EKSKLUSIF
                                    @elseif($reward->reward_type === 'towel')
                                        SPORT TOWEL
                                    @elseif($reward->reward_type === 'voucher')
                                        VOUCHER CUKUR
                                    @else
                                        {{ strtoupper($reward->reward_type) }}
                                    @endif
                                </div>
                                <p class="text-xs text-gray-500 font-mono">
                                    Diklaim pada {{ $reward->updated_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                        </div>

                        {{-- Right: Status Badge --}}
                        <div class="flex-shrink-0">
                            @if ($reward->is_used)
                                <span
                                    class="inline-block bg-gray-200 text-gray-600 border-2 border-black px-3 py-1 font-mono text-xs font-bold uppercase">
                                    SUDAH DIPAKAI
                                </span>
                            @else
                                <span
                                    class="inline-block bg-[#39ff14] text-black border-2 border-black px-3 py-1 font-mono text-xs font-bold uppercase">
                                    AKTIF
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 border-2 border-dashed border-gray-300 bg-gray-50">
                    <h3 class="font-mono font-bold text-xl text-gray-500 mb-2 uppercase">Belum Ada Riwayat</h3>
                    <p class="text-gray-400 font-mono text-sm max-w-md mx-auto mb-6">
                        Kamu belum pernah meredeem hadiah apapun. Terus bermain dan kumpulkan jam terbangmu!
                    </p>
                    <a href="{{ route('booking') }}"
                        class="inline-block border-2 border-black bg-white px-6 py-2 font-mono font-bold uppercase hover:bg-[var(--color-court-yellow)] transition-all shadow-hard">
                        Booking Sekarang
                    </a>
                </div>
            @endforelse

            {{-- Pagination --}}
            @if ($rewards->hasPages())
                <div class="mt-8 flex justify-center">
                    <nav class="flex items-center gap-2 font-mono text-sm">
                        @if ($rewards->onFirstPage())
                            <span
                                class="px-3 py-2 border-2 border-gray-300 text-gray-300 bg-gray-50 font-bold uppercase cursor-not-allowed">&laquo;
                                Prev</span>
                        @else
                            <a href="{{ $rewards->previousPageUrl() }}"
                                class="px-3 py-2 border-2 border-black bg-white font-bold uppercase hover:bg-[var(--color-court-yellow)] transition-all shadow-hard-sm">&laquo;
                                Prev</a>
                        @endif

                        @foreach ($rewards->getUrlRange(1, $rewards->lastPage()) as $page => $url)
                            @if ($page == $rewards->currentPage())
                                <span
                                    class="px-3 py-2 border-2 border-black bg-black text-white font-bold">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-3 py-2 border-2 border-black bg-white font-bold hover:bg-[var(--color-court-yellow)] transition-all shadow-hard-sm">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($rewards->hasMorePages())
                            <a href="{{ $rewards->nextPageUrl() }}"
                                class="px-3 py-2 border-2 border-black bg-white font-bold uppercase hover:bg-[var(--color-court-yellow)] transition-all shadow-hard-sm">Next
                                &raquo;</a>
                        @else
                            <span
                                class="px-3 py-2 border-2 border-gray-300 text-gray-300 bg-gray-50 font-bold uppercase cursor-not-allowed">Next
                                &raquo;</span>
                        @endif
                    </nav>
                </div>
            @endif

        </div>
    </div>
</x-layouts.app>
