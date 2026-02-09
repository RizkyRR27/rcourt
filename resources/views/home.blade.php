<x-layouts.app :current-route="'home'">
    {{-- Hero Section --}}
    <x-page-header title="Selamat Datang di RCourt"
        subtitle="Pusat olahraga terlengkap dengan fasilitas terbaik. Nikmati kemudahan booking lapangan Badminton, Futsal, Basket, hingga Mini Soccer secara online."
        cta-text="Booking Sekarang" :cta-href="route('booking')" />

    {{-- Facilities Section --}}
    <section class="container-app py-16 md:py-24">
        <div class="text-center mb-12">
            <span class="text-accent font-semibold text-sm uppercase tracking-widest mb-2 block">Fasilitas</span>
            <h2>Lapangan Kami</h2>
            <p class="text-muted mt-4 max-w-xl mx-auto">Dilengkapi dengan fasilitas standar internasional untuk
                pengalaman olahraga terbaik Anda</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <x-facility-card icon="🏸" title="Badminton"
                description="Lapangan karpet standar internasional dengan pencahayaan optimal." :count="$counts['badminton']"
                sport="badminton" class="animate-slide-up" style="animation-delay: 0ms;" />

            <x-facility-card icon="⚽" title="Futsal"
                description="Rumput sintetis berkualitas tinggi nyaman untuk bermain." :count="$counts['futsal']" sport="futsal"
                class="animate-slide-up" style="animation-delay: 100ms;" />

            <x-facility-card icon="🏀" title="Basket Indoor"
                description="Lantai parket kayu, full AC, dan papan skor digital." :count="$counts['basket_indoor']" sport="basketball"
                class="animate-slide-up" style="animation-delay: 200ms;" />

            <x-facility-card icon="🌤️" title="Basket Outdoor"
                description="Lapangan outdoor dengan suasana segar dan lantai standar." :count="$counts['basket_outdoor']"
                sport="outdoor" class="animate-slide-up" style="animation-delay: 300ms;" />

            <x-facility-card icon="🥅" title="Mini Soccer"
                description="Lapangan luas cocok untuk pertandingan 7 vs 7." :count="$counts['mini_soccer']" sport="soccer"
                class="animate-slide-up sm:col-span-2 lg:col-span-1" style="animation-delay: 400ms;" />
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="surface-muted py-16">
        <div class="container-app text-center">
            <h3 class="mb-4">Siap Bermain?</h3>
            <p class="text-muted mb-8 max-w-lg mx-auto">Booking lapangan sekarang dan nikmati pengalaman olahraga
                terbaik bersama teman-temanmu.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <x-button variant="primary" size="lg" :href="route('booking')">
                    Booking Sekarang
                </x-button>
                <x-button variant="outline" size="lg" :href="route('contact')">
                    Hubungi Kami
                </x-button>
            </div>
        </div>
    </section>
</x-layouts.app>
