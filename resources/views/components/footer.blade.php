<footer class="surface-primary mt-auto">
    <div class="container-app py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Brand -->
            <div class="md:col-span-2">
                <span class="text-2xl font-bold" style="font-family: var(--font-display);">
                    <span class="text-white">R</span><span style="color: var(--color-accent-light);">Court</span>
                </span>
                <p class="mt-4 text-[var(--color-text-light)] max-w-md leading-relaxed">
                    Pusat olahraga terlengkap dengan fasilitas terbaik. Booking lapangan Badminton, Futsal, Basket,
                    hingga Mini Soccer dengan mudah.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-semibold mb-4">Navigasi</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}"
                            class="text-[var(--color-text-light)] hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('booking') }}"
                            class="text-[var(--color-text-light)] hover:text-white transition">Booking Lapangan</a></li>
                    <li><a href="{{ route('contact') }}"
                            class="text-[var(--color-text-light)] hover:text-white transition">Kontak Kami</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-white font-semibold mb-4">Kontak</h4>
                <ul class="space-y-2 text-[var(--color-text-light)]">
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>+62 812 3456 7890</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>info@rcourt.id</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom -->
        <div class="pt-8 border-t border-[var(--color-primary-light)]">
            <p class="text-center text-[var(--color-text-light)] text-sm">
                &copy; {{ date('Y') }} RCourt. All rights reserved.
            </p>
        </div>
    </div>
</footer>
