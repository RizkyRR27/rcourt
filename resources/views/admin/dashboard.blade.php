<x-layouts.admin>
    <div class="mx-auto max-w-7xl px-4 py-12">

        {{-- Header --}}
        <div class="mb-10">
            <h1 class="font-display text-4xl uppercase text-black">
                Statistik <span class="text-[var(--color-court-clay)]">RCourt</span>
            </h1>
            <p class="mt-1 font-mono text-sm text-gray-500">
                Ringkasan data — {{ now()->translatedFormat('d F Y') }}
            </p>
        </div>

        {{-- Stat Cards --}}
        <div class="mb-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

            {{-- Total Booking --}}
            <div class="border-2 border-black bg-white p-6 shadow-hard relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 h-16 w-16 bg-[var(--color-court-yellow)] border-l-2 border-b-2 border-black flex items-center justify-center">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <p class="font-mono text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Total Booking</p>
                <p class="font-display text-4xl text-black">{{ number_format($totalBookings) }}</p>
                <p class="mt-2 font-mono text-xs text-gray-400">Hari ini: {{ $todayBookings }}</p>
            </div>

            {{-- Total Revenue --}}
            <div class="border-2 border-black bg-white p-6 shadow-hard relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 h-16 w-16 bg-[#39ff14] border-l-2 border-b-2 border-black flex items-center justify-center">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="font-mono text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Total Revenue</p>
                <p class="font-display text-3xl text-black">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                <p class="mt-2 font-mono text-xs text-gray-400">Hari ini: Rp
                    {{ number_format($todayRevenue, 0, ',', '.') }}</p>
            </div>

            {{-- Total Users --}}
            <div class="border-2 border-black bg-white p-6 shadow-hard relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 h-16 w-16 bg-[var(--color-court-paper)] border-l-2 border-b-2 border-black flex items-center justify-center">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <p class="font-mono text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Total Member</p>
                <p class="font-display text-4xl text-black">{{ number_format($totalUsers) }}</p>
                <p class="mt-2 font-mono text-xs text-gray-400">User terdaftar</p>
            </div>

            {{-- Pending Bookings --}}
            <div class="border-2 border-black bg-white p-6 shadow-hard relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 h-16 w-16 bg-[var(--color-court-clay)] border-l-2 border-b-2 border-black flex items-center justify-center">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="font-mono text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Menunggu Approval</p>
                <p class="font-display text-4xl text-black">{{ number_format($pendingBookings) }}</p>
                @if ($pendingBookings > 0)
                    <a href="{{ route('admin.bookings') }}"
                        class="mt-2 inline-block font-mono text-xs font-bold text-[var(--color-court-clay)] underline hover:no-underline">
                        Review Sekarang →
                    </a>
                @else
                    <p class="mt-2 font-mono text-xs text-gray-400">Semua sudah diproses</p>
                @endif
            </div>
        </div>

        {{-- Charts --}}
        <div class="mb-10 grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- Bar Chart: Booking per Bulan --}}
            <div class="lg:col-span-2 border-2 border-black bg-white p-6 shadow-hard">
                <h3 class="mb-4 font-mono text-sm font-bold uppercase tracking-wider">Booking 6 Bulan Terakhir</h3>
                <div class="relative" style="height: 300px;">
                    <canvas id="bookingChart"></canvas>
                </div>
            </div>

            {{-- Pie Chart: Distribusi Lapangan --}}
            <div class="border-2 border-black bg-white p-6 shadow-hard">
                <h3 class="mb-4 font-mono text-sm font-bold uppercase tracking-wider">Per Jenis Lapangan</h3>
                <div class="relative flex items-center justify-center" style="height: 300px;">
                    @if (count($pieData) > 0)
                        <canvas id="courtChart"></canvas>
                    @else
                        <p class="font-mono text-sm text-gray-400">Belum ada data booking.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Recent Bookings Table --}}
        <div class="border-2 border-black bg-white shadow-hard overflow-hidden">
            <div class="flex items-center justify-between border-b-2 border-black bg-black px-6 py-4">
                <h3 class="font-mono text-sm font-bold uppercase tracking-wider text-white">Booking Terbaru</h3>
                <a href="{{ route('admin.bookings') }}"
                    class="font-mono text-xs font-bold text-[var(--color-court-yellow)] hover:underline">
                    Lihat Semua →
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left font-mono text-sm">
                    <thead class="bg-gray-50 border-b-2 border-black">
                        <tr>
                            <th class="p-4 font-bold uppercase text-xs">Kode</th>
                            <th class="p-4 font-bold uppercase text-xs">User</th>
                            <th class="p-4 font-bold uppercase text-xs">Lapangan</th>
                            <th class="p-4 font-bold uppercase text-xs">Tanggal</th>
                            <th class="p-4 font-bold uppercase text-xs">Total</th>
                            <th class="p-4 font-bold uppercase text-xs text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($recentBookings as $booking)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4 font-bold">{{ $booking->code }}</td>
                                <td class="p-4">{{ $booking->user->name ?? '-' }}</td>
                                <td class="p-4">{{ $booking->court->name ?? '-' }}</td>
                                <td class="p-4">{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</td>
                                <td class="p-4 font-bold">Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                                </td>
                                <td class="p-4 text-center">
                                    @if ($booking->status == 'approved')
                                        <span
                                            class="inline-block border border-black bg-green-400 px-2 py-1 text-xs font-bold uppercase">Approved</span>
                                    @elseif ($booking->status == 'pending')
                                        <span
                                            class="inline-block border border-black bg-[var(--color-court-yellow)] px-2 py-1 text-xs font-bold uppercase">Pending</span>
                                    @else
                                        <span
                                            class="inline-block border border-black bg-red-400 px-2 py-1 text-xs font-bold uppercase text-white">Rejected</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-8 text-center text-gray-400">Belum ada booking.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Bar Chart - Booking per Bulan
            const ctxBar = document.getElementById('bookingChart');
            if (ctxBar) {
                new Chart(ctxBar, {
                    type: 'bar',
                    data: {
                        labels: @json($chartLabels),
                        datasets: [{
                            label: 'Jumlah Booking',
                            data: @json($chartBookings),
                            backgroundColor: '#dfff5e',
                            borderColor: '#000000',
                            borderWidth: 2,
                            borderRadius: 0,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                labels: {
                                    font: {
                                        family: 'monospace',
                                        weight: 'bold',
                                        size: 11
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    font: {
                                        family: 'monospace',
                                        size: 11
                                    }
                                },
                                grid: {
                                    display: false
                                },
                                border: {
                                    color: '#000',
                                    width: 2
                                }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    font: {
                                        family: 'monospace',
                                        size: 11
                                    }
                                },
                                grid: {
                                    color: '#e5e5e5'
                                },
                                border: {
                                    color: '#000',
                                    width: 2
                                }
                            }
                        }
                    }
                });
            }

            // Pie Chart - Distribusi Lapangan
            const ctxPie = document.getElementById('courtChart');
            if (ctxPie) {
                const pieColors = ['#dfff5e', '#c75b39', '#1a2f23', '#39ff14', '#3b82f6', '#f59e0b', '#ef4444'];
                new Chart(ctxPie, {
                    type: 'doughnut',
                    data: {
                        labels: @json($pieLabels),
                        datasets: [{
                            data: @json($pieData),
                            backgroundColor: pieColors.slice(0, @json(count($pieLabels))),
                            borderColor: '#000000',
                            borderWidth: 2,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    font: {
                                        family: 'monospace',
                                        weight: 'bold',
                                        size: 11
                                    },
                                    padding: 16,
                                    usePointStyle: true,
                                    pointStyle: 'rectRounded'
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
</x-layouts.admin>
