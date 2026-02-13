<x-layouts.app :current-route="'contact'">
    <div class="bg-[var(--color-court-paper)] pb-20 pt-10">
        
        {{-- HEADER JUDUL --}}
        <div class="mx-auto mb-16 max-w-7xl px-4 text-center">
            <h1 class="font-display text-6xl uppercase md:text-8xl text-black">
                Hubungi <span class="text-[var(--color-court-clay)]">Kami</span>
            </h1>
            <p class="font-mono text-gray-600 mt-4 max-w-2xl mx-auto">
                Punya pertanyaan seputar jadwal atau kendala booking? Silakan chat admin kami di bawah ini.
            </p>
        </div>

        {{-- GRID 2 ADMIN (DESAIN RETRO) --}}
        <div class="mx-auto max-w-5xl px-4 grid md:grid-cols-2 gap-8 mb-20 pb-10">
            
            {{-- === ADMIN 1 (BOOKING) === --}}
            <div class="relative border-2 border-black bg-white p-10 shadow-hard transition-transform hover:-translate-y-1">
                {{-- Badge Chat Only --}}
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 border-2 border-black bg-[var(--color-court-yellow)] px-4 py-1 shadow-sm">
                    <span class="font-mono text-xs font-bold uppercase tracking-wider">📵 Chat Only (No Call)</span>
                </div>

                <div class="text-center mt-4">
                    {{-- Ikon Telepon Retro --}}
                    <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center border-2 border-black bg-black text-white text-4xl">
                        📞
                    </div>

                    <h3 class="font-display text-3xl uppercase mb-1">ADMIN 1</h3>
                    <p class="font-mono text-sm text-gray-500 mb-8 font-bold">Layanan Booking & Info Umum</p>

                    {{-- Tombol WA Admin 1 --}}
                    <a href="https://wa.me/628118032005?text=Halo%20Admin%20Iky,%20saya%20mau%20tanya%20tentang%20booking%20lapangan..." 
                       target="_blank"
                       class="group flex w-full items-center justify-center gap-3 border-2 border-black bg-[var(--color-court-green)] px-6 py-4 font-mono font-bold uppercase text-white shadow-hard transition-all hover:bg-green-700 hover:shadow-none active:translate-x-[2px] active:translate-y-[2px]">
                        <span>WhatsApp Admin 1</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    </a>
                </div>
            </div>

            {{-- === ADMIN 2 (TEKNIS) === --}}
            <div class="relative border-2 border-black bg-white p-10 shadow-hard transition-transform hover:-translate-y-1">
                {{-- Badge Chat Only --}}
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 border-2 border-black bg-[var(--color-court-yellow)] px-4 py-1 shadow-sm">
                    <span class="font-mono text-xs font-bold uppercase tracking-wider">📵 Chat Only (No Call)</span>
                </div>

                <div class="text-center mt-4">
                    {{-- Ikon Chat Retro --}}
                    <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center border-2 border-black bg-black text-white text-4xl">
                        🛠
                    </div>

                    <h3 class="font-display text-3xl uppercase mb-1">ADMIN 2</h3>
                    <p class="font-mono text-sm text-gray-500 mb-8 font-bold">Kendala Teknis & Komplain</p>

                    {{-- Tombol WA Admin 2 --}}
                    <a href="https://wa.me/6285186856944?text=Halo%20Admin%202,%20saya%20butuh%20bantuan%20teknis..." 
                       target="_blank"
                       class="group flex w-full items-center justify-center gap-3 border-2 border-black bg-[var(--color-court-green)] px-6 py-4 font-mono font-bold uppercase text-white shadow-hard transition-all hover:bg-green-700 hover:shadow-none active:translate-x-[2px] active:translate-y-[2px]">
                        <span>WhatsApp Admin 2</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    </a>
                </div>
            </div>

        </div>

        {{-- LOKASI & MAPS (RETRO STYLE) --}}
        <div class="mx-auto max-w-7xl px-4 pt-10">
            <div class="border-2 border-black bg-white shadow-hard">
                <div class="grid md:grid-cols-2">
                    
                    {{-- Google Maps Embed (Sudah Diperbaiki) --}}
                    <div class="h-96 w-full border-b-2 border-black bg-gray-200 md:border-b-0 md:border-r-2 relative group">
                        <iframe 
                            width="100%" 
                            height="100%" 
                            frameborder="0" 
                            style="border:0" 
                            {{-- Koordinat: -7.940920684598671, 112.95314089261463 --}}
                            src="https://maps.google.com/maps?q=-7.940920684598671,112.95314089261463&hl=id&z=16&output=embed"
                            allowfullscreen>
                        </iframe>
                    </div>

                    {{-- Link Sosial Media (Ditambah FB & X) --}}
                    <div class="flex flex-col justify-center p-10">
                        <h2 class="font-display text-4xl uppercase mb-2">Temukan Kami</h2>
                        <p class="font-mono text-gray-500 mb-8">Ikuti update terbaru, promo, dan keseruan turnamen di media sosial resmi RCourt.</p>

                        <div class="space-y-3">
                            {{-- Instagram --}}
                            <a href="#" class="flex items-center justify-between border-2 border-black bg-white p-4 font-mono font-bold uppercase transition-all hover:bg-[var(--color-court-clay)] hover:text-white hover:translate-x-1">
                                <span>Instagram</span>
                                <span>↗</span>
                            </a>
                            
                            {{-- Facebook (Baru) --}}
                            <a href="#" class="flex items-center justify-between border-2 border-black bg-white p-4 font-mono font-bold uppercase transition-all hover:bg-blue-600 hover:text-white hover:translate-x-1">
                                <span>Facebook</span>
                                <span>↗</span>
                            </a>

                             {{-- X / Twitter (Baru) --}}
                             <a href="#" class="flex items-center justify-between border-2 border-black bg-white p-4 font-mono font-bold uppercase transition-all hover:bg-black hover:text-white hover:translate-x-1">
                                <span>X (Twitter)</span>
                                <span>↗</span>
                            </a>

                            {{-- TikTok --}}
                            <a href="#" class="flex items-center justify-between border-2 border-black bg-white p-4 font-mono font-bold uppercase transition-all hover:bg-black hover:text-white hover:translate-x-1">
                                <span>TikTok</span>
                                <span>↗</span>
                            </a>

                            {{-- Youtube --}}
                            <a href="#" class="flex items-center justify-between border-2 border-black bg-white p-4 font-mono font-bold uppercase transition-all hover:bg-red-600 hover:text-white hover:translate-x-1">
                                <span>YouTube</span>
                                <span>↗</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- JAM OPERASIONAL ADMIN --}}
        <div class="mt-12 text-center py-4">
            <div class="inline-block border-2 border-black bg-white px-6 py-2 font-mono text-sm shadow-sm">
                🕒 Jam Operasional Admin: <strong>08:00 - 22:00 WITA</strong>
            </div>
        </div>

    </div>
</x-layouts.app>