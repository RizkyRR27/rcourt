<footer class="border-t-2 border-black bg-[var(--color-court-green)] text-[var(--color-court-paper)]">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12">

            {{-- Brand Column --}}
            <div class="lg:col-span-5">
                <h2 class="mb-6 font-display text-6xl text-white">
                    R<span class="text-[var(--color-court-clay)]">COURT</span>
                </h2>
                <p class="max-w-md font-mono text-sm leading-relaxed opacity-80">
                    Pusat olahraga terlengkap dengan fasilitas terbaik.
                    Booking lapangan Badminton, Futsal, Basket, hingga Mini Soccer
                    dengan mudah. Dominate the game.
                </p>
            </div>

            {{-- Links Column --}}
            <div class="lg:col-span-3">
                <h3 class="mb-6 font-display text-2xl uppercase tracking-wider text-[var(--color-court-yellow)]">
                    Navigasi
                </h3>
                <ul class="space-y-4 font-mono text-sm">
                    <li><a href="#"
                            class="hover:text-[var(--color-court-clay)] hover:underline decoration-2 underline-offset-4 transition-colors">HOME</a>
                    </li>
                    <li><a href="#"
                            class="hover:text-[var(--color-court-clay)] hover:underline decoration-2 underline-offset-4 transition-colors">BOOKING
                            LAPANGAN</a></li>
                    <li><a href="#"
                            class="hover:text-[var(--color-court-clay)] hover:underline decoration-2 underline-offset-4 transition-colors">KONTAK
                            KAMI</a></li>
                    <li><a href="#"
                            class="hover:text-[var(--color-court-clay)] hover:underline decoration-2 underline-offset-4 transition-colors">PERATURAN</a>
                    </li>
                </ul>
            </div>

            {{-- Contact Column --}}
            <div class="lg:col-span-4">
                <h3 class="mb-6 font-display text-2xl uppercase tracking-wider text-[var(--color-court-yellow)]">
                    Kontak
                </h3>
                <div class="space-y-4 font-mono text-sm">
                    <div class="flex items-center space-x-4">
                        <div
                            class="flex h-10 w-10 items-center justify-center border-2 border-[var(--color-court-paper)] bg-black text-white rounded-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>
                        </div>
                        <span>+62 812 3456 7890</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div
                            class="flex h-10 w-10 items-center justify-center border-2 border-[var(--color-court-paper)] bg-black text-white rounded-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2" />
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                            </svg>
                        </div>
                        <span>info@rcourt.id</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div
                            class="flex h-10 w-10 items-center justify-center border-2 border-[var(--color-court-paper)] bg-black text-white rounded-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </div>
                        <span>Jakarta Selatan, Indonesia</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-16 border-t-2 border-[var(--color-court-paper)] pt-8 text-center font-mono text-xs opacity-60">
            <p>&copy; {{ date('Y') }} RCOURT. ALL RIGHTS RESERVED. NO PAIN NO GAME.</p>
        </div>
    </div>
</footer>
