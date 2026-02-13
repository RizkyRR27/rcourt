<div class="relative mx-auto -mt-24 max-w-4xl px-4 sm:px-6 lg:px-8">
    <div class="border-2 border-black bg-white p-8 shadow-hard">
        <div class="mb-8 text-center">
            <h3 class="font-display text-4xl uppercase">Mulai Booking</h3>
            <p class="font-mono text-sm text-gray-500">Isi form di bawah untuk mencari jadwal</p>
        </div>

        <form action="{{ route('booking.search') }}" method="GET" class="grid gap-6 md:grid-cols-3">
            {{-- Perubahan: Pakai method GET dan Grid jadi 3 kolom agar muat Durasi --}}

            {{-- 1. PILIH LAPANGAN --}}
            <div class="space-y-2">
                <label class="block font-mono text-xs font-bold uppercase text-gray-500">
                    Jenis Lapangan <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    {{-- PENTING: name harus 'type' bukan 'category' --}}
                    <select name="type" required
                        class="w-full appearance-none border-2 border-black bg-[var(--color-court-paper)] px-4 py-3 font-mono text-sm focus:bg-[var(--color-court-yellow)] focus:outline-none">
                        <option value="" disabled selected>-- Pilih Lapangan --</option>

                        {{-- Opsi Lapangan (Sesuai Controller) --}}
                        <option value="badminton" {{ old('type') == 'badminton' ? 'selected' : '' }}>Badminton</option>
                        <option value="futsal" {{ old('type') == 'futsal' ? 'selected' : '' }}>Futsal</option>
                        <option value="basket_indoor" {{ old('type') == 'basket_indoor' ? 'selected' : '' }}>Basket
                            Indoor</option>
                        <option value="tennis" {{ old('type') == 'tennis' ? 'selected' : '' }}>Tennis</option>
                        {{-- Ganti Basket Outdoor jadi Tennis --}}
                        <option value="mini_soccer" {{ old('type') == 'mini_soccer' ? 'selected' : '' }}>Mini Soccer
                        </option>
                        <option value="padel" {{ old('type') == 'padel' ? 'selected' : '' }}>Padel</option>
                    </select>

                    {{-- Panah Dropdown --}}
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4">
                        <div
                            class="h-0 w-0 border-l-[6px] border-r-[6px] border-t-[8px] border-l-transparent border-r-transparent border-t-black">
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. PILIH TANGGAL (Custom Date Picker) --}}
            <div class="space-y-2" x-data="datePicker()" x-init="init()">
                <label class="block font-mono text-xs font-bold uppercase text-gray-500">
                    Tanggal Main <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    {{-- Hidden input for form submission --}}
                    <input type="hidden" name="date" x-model="selectedDate" required />

                    {{-- Display Input (Clickable) --}}
                    <button type="button" @click="isOpen = !isOpen"
                        class="w-full flex items-center justify-between border-2 border-black bg-[var(--color-court-paper)] px-4 py-3 font-mono text-sm text-left focus:bg-[var(--color-court-yellow)] focus:outline-none transition-colors"
                        :class="{ 'bg-[var(--color-court-yellow)]': isOpen }">
                        <span x-text="selectedDate ? formatDisplay(selectedDate) : '-- Pilih Tanggal --'"
                            :class="selectedDate ? 'text-black' : 'text-gray-400'"></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </button>

                    {{-- Calendar Dropdown --}}
                    <div x-show="isOpen" x-cloak @click.outside="isOpen = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-2"
                        class="absolute left-0 right-0 top-full z-50 mt-2 border-2 border-black bg-white p-4 shadow-hard">

                        {{-- Month/Year Navigation --}}
                        <div class="mb-4 flex items-center justify-between">
                            <button type="button" @click="prevMonth()"
                                class="flex h-8 w-8 items-center justify-center border-2 border-black bg-[var(--color-court-paper)] font-bold transition-all hover:bg-[var(--color-court-yellow)] active:translate-x-[1px] active:translate-y-[1px]">
                                ←
                            </button>
                            <span class="font-mono text-sm font-bold uppercase tracking-wider"
                                x-text="monthYearLabel"></span>
                            <button type="button" @click="nextMonth()"
                                class="flex h-8 w-8 items-center justify-center border-2 border-black bg-[var(--color-court-paper)] font-bold transition-all hover:bg-[var(--color-court-yellow)] active:translate-x-[1px] active:translate-y-[1px]">
                                →
                            </button>
                        </div>

                        {{-- Day Headers --}}
                        <div class="mb-2 grid grid-cols-7 gap-1">
                            <template x-for="day in ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab']"
                                :key="day">
                                <div class="py-1 text-center font-mono text-xs font-bold uppercase text-gray-400"
                                    x-text="day"></div>
                            </template>
                        </div>

                        {{-- Calendar Grid --}}
                        <div class="grid grid-cols-7 gap-1">
                            <template x-for="(blank, i) in startDay" :key="'b' + i">
                                <div></div>
                            </template>
                            <template x-for="date in daysInMonth" :key="date">
                                <button type="button" @click="selectDate(date)"
                                    class="flex h-9 w-full items-center justify-center border font-mono text-sm font-bold transition-all"
                                    :class="{
                                        'border-black bg-[var(--color-court-clay)] text-white shadow-hard-sm': isSelected(
                                            date),
                                        'border-transparent hover:border-black hover:bg-[var(--color-court-yellow)]': !
                                            isSelected(date) && !isPast(date),
                                        'border-transparent text-gray-300 cursor-not-allowed': isPast(date),
                                        'border-black bg-[var(--color-court-paper)]': isToday(date) && !isSelected(date)
                                    }"
                                    :disabled="isPast(date)" x-text="date">
                                </button>
                            </template>
                        </div>

                        {{-- Today Shortcut --}}
                        <div class="mt-3 border-t-2 border-gray-100 pt-3">
                            <button type="button" @click="goToday()"
                                class="w-full border-2 border-black bg-[var(--color-court-paper)] px-3 py-2 font-mono text-xs font-bold uppercase tracking-wider transition-all hover:bg-[var(--color-court-yellow)] active:translate-x-[1px] active:translate-y-[1px]">
                                Hari Ini
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. PILIH DURASI (SAYA TAMBAHKAN INI) --}}
            <div class="space-y-2">
                <label class="block font-mono text-xs font-bold uppercase text-gray-500">
                    Durasi Main <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <select name="duration" required
                        class="w-full appearance-none border-2 border-black bg-[var(--color-court-paper)] px-4 py-3 font-mono text-sm focus:bg-[var(--color-court-yellow)] focus:outline-none">
                        <option value="1" {{ old('duration') == '1' ? 'selected' : '' }}>1 Jam</option>
                        <option value="2" {{ old('duration') == '2' ? 'selected' : '' }}>2 Jam</option>
                        <option value="3" {{ old('duration') == '3' ? 'selected' : '' }}>3 Jam</option>
                        <option value="4" {{ old('duration') == '4' ? 'selected' : '' }}>4 Jam</option>
                        <option value="5" {{ old('duration') == '5' ? 'selected' : '' }}>5 Jam</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4">
                        <div
                            class="h-0 w-0 border-l-[6px] border-r-[6px] border-t-[8px] border-l-transparent border-r-transparent border-t-black">
                        </div>
                    </div>
                </div>
            </div>

            {{-- TOMBOL SUBMIT --}}
            <div class="md:col-span-3 mt-2">
                <button type="submit"
                    class="w-full font-mono font-bold uppercase transition-all duration-200 active:translate-x-[2px] active:translate-y-[2px] active:shadow-none border-2 border-black px-6 py-4 text-lg tracking-wider bg-[var(--color-court-clay)] text-white shadow-hard hover:bg-red-600 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    CEK JADWAL
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function datePicker() {
        return {
            isOpen: false,
            selectedDate: '{{ old('date'   , '') }}',
            currentMonth: null,
            currentYear: null,
            daysInMonth: [],
            startDay: 0,
            monthYearLabel: '',

            months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ],

            init() {
                const today = new Date();
                this.currentMonth = today.getMonth();
                this.currentYear = today.getFullYear();
                this.buildCalendar();
            },

            buildCalendar() {
                const firstDay = new Date(this.currentYear, this.currentMonth, 1);
                const lastDay = new Date(this.currentYear, this.currentMonth + 1, 0);

                this.startDay = firstDay.getDay(); // 0 = Sunday
                this.daysInMonth = Array.from({
                    length: lastDay.getDate()
                }, (_, i) => i + 1);
                this.monthYearLabel = `${this.months[this.currentMonth]} ${this.currentYear}`;
            },

            prevMonth() {
                if (this.currentMonth === 0) {
                    this.currentMonth = 11;
                    this.currentYear--;
                } else {
                    this.currentMonth--;
                }
                this.buildCalendar();
            },

            nextMonth() {
                if (this.currentMonth === 11) {
                    this.currentMonth = 0;
                    this.currentYear++;
                } else {
                    this.currentMonth++;
                }
                this.buildCalendar();
            },

            selectDate(day) {
                if (this.isPast(day)) return;
                const m = String(this.currentMonth + 1).padStart(2, '0');
                const d = String(day).padStart(2, '0');
                this.selectedDate = `${this.currentYear}-${m}-${d}`;
                this.isOpen = false;
            },

            goToday() {
                const today = new Date();
                this.currentMonth = today.getMonth();
                this.currentYear = today.getFullYear();
                this.buildCalendar();
                this.selectDate(today.getDate());
            },

            isSelected(day) {
                if (!this.selectedDate) return false;
                const m = String(this.currentMonth + 1).padStart(2, '0');
                const d = String(day).padStart(2, '0');
                return this.selectedDate === `${this.currentYear}-${m}-${d}`;
            },

            isToday(day) {
                const today = new Date();
                return day === today.getDate() &&
                    this.currentMonth === today.getMonth() &&
                    this.currentYear === today.getFullYear();
            },

            isPast(day) {
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                const check = new Date(this.currentYear, this.currentMonth, day);
                return check < today;
            },

            formatDisplay(dateStr) {
                const parts = dateStr.split('-');
                const y = parseInt(parts[0]);
                const m = parseInt(parts[1]) - 1;
                const d = parseInt(parts[2]);
                const dayNames = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                const date = new Date(y, m, d);
                return `${dayNames[date.getDay()]}, ${d} ${this.months[m]} ${y}`;
            }
        }
    }
</script>
