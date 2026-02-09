<x-layouts.app :current-route="'booking'">
    {{-- Page Header --}}
    <x-page-header title="Booking Lapangan"
        subtitle="Pilih jenis lapangan dan tanggal untuk melihat jadwal yang tersedia." :compact="true" />

    {{-- Booking Form --}}
    <section class="container-app py-12 -mt-8">
        <div class="max-w-lg mx-auto">
            <x-card padding="p-8" class="animate-slide-up">
                <div class="text-center mb-8">
                    <h3>Mulai Booking</h3>
                    <p class="text-muted text-sm mt-2">Isi form di bawah untuk mencari jadwal</p>
                </div>

                <form action="{{ route('booking.search') }}" method="POST">
                    @csrf

                    <x-form-select name="type" label="Pilih Jenis Lapangan" :options="$types"
                        placeholder="-- Pilih Lapangan --" :required="true" />

                    <x-form-input type="date" name="date" label="Pilih Tanggal Main" :required="true"
                        :min="date('Y-m-d')" />

                    <x-button type="submit" variant="primary" size="lg" class="w-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Cek Ketersediaan Jadwal
                    </x-button>
                </form>
            </x-card>
        </div>
    </section>
</x-layouts.app>
