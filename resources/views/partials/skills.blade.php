<section
    id="skills"
    class="py-20 scroll-mt-20 overflow-hidden" {{-- TAMBAHAN 1: overflow-hidden disini PENTING --}}
    data-aos="fade-up"
    {{-- Tambahin listener resize biar logic tau ukuran layar berubah --}}
    x-data="{
        selectedIndex: 0,
        total: {{ count($keahlian) }},
        isMobile: window.innerWidth < 768
    }"
    @resize.window="isMobile = window.innerWidth < 768"
>
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

    <h2 class="text-4xl font-heading font-bold text-white mb-12 text-center" data-aos="fade-up">// Tech I'm Good With //</h2>

    <div
        class="relative w-full h-[450px] flex items-center justify-center"
        style="perspective: 1000px"
    >

        @foreach ($keahlian as $item)
            @php $index = $loop->index; @endphp

            <div
                {{-- TAMBAHAN 2: Ganti w-full jadi w-[85%] buat mobile, biar gak kegedean --}}
                class="absolute w-[85%] md:w-1/3 max-w-xs sm:max-w-sm transition-all duration-500 ease-out cursor-pointer"
                style="height: 350px;"
                @click="selectedIndex = {{ $index }}"
                :style="() => {
                    let offset = {{ $index }} - selectedIndex;
                    let transform = '';
                    let opacity = '0';
                    let zIndex = 0;
                    let blur = 'blur-md';

                    {{-- LOGIC BARU: Jarak geser (spread) dibedain antara HP dan Laptop --}}
                    {{-- Kalau mobile jaraknya 15% aja biar numpuk, kalau desktop 60% biar lebar --}}
                    let spread = isMobile ? 15 : 60;

                    // Logic untuk transisi slide 3D
                    if (offset === 0) {
                        transform = 'translateX(0) scale(1.1) translateZ(0)'; // TranslateZ biar GPU ngerender
                        opacity = '100'; zIndex = 10; blur = 'blur-0';
                    } else if (offset === 1) {
                        transform = `translateX(${spread}%) scale(0.9) translateZ(-50px)`;
                        opacity = '50'; zIndex = 5; blur = 'blur-sm';
                    } else if (offset === -1) {
                        transform = `translateX(-${spread}%) scale(0.9) translateZ(-50px)`;
                        opacity = '50'; zIndex = 5; blur = 'blur-sm';
                    } else {
                        // Sisanya buang jauh atau sembunyikan
                        let farOffset = offset > 0 ? (spread * 2) : -(spread * 2);
                        transform = `translateX(${farOffset}%) scale(0.8)`;
                        opacity = '0'; // Sembunyikan total yang jauh
                    }

                    return {
                        transform: transform,
                        opacity: opacity + '%',
                        zIndex: zIndex,
                        filter: blur.startsWith('blur-') ? 'blur(' + (blur === 'blur-sm' ? '4px' : (blur === 'blur-md' ? '8px' : '0px')) + ')' : 'blur(0px)'
                    }
                }"
            >
                <div
                    class="tech-frame h-full p-6 flex flex-col items-center justify-center text-center
                            transition-all duration-300 relative overflow-hidden rounded-xl"
                    :style="{
                        borderColor: selectedIndex === {{ $index }} ? '#00ffff' : '#282828',
                        boxShadow: selectedIndex === {{ $index }} ? '0 0 20px rgba(0,255,255,0.8), inset 0 0 10px rgba(0,255,255,0.4)' : '0 0 5px rgba(0,255,255,0.1)',
                        background: selectedIndex === {{ $index }} ? '#000000' : '#0a0a0a'
                    }"
                >
                    {{-- Scanline Overlay --}}
                    <div
                        class="absolute inset-0 transition-opacity duration-300 pointer-events-none"
                        :class="{ 'opacity-10': selectedIndex !== {{ $index }}, 'opacity-0': selectedIndex === {{ $index }} }"
                        style="background-image: linear-gradient(rgba(0, 255, 255, 0.05) 1px, transparent 1px); background-size: 100% 5px; z-index: 0;"
                    ></div>

                    {{-- Konten Utama --}}
                    <div class="flex flex-col h-full justify-between items-center relative z-10 w-full">

                        <div class="p-4 rounded-lg flex items-center justify-center flex-grow"
                             :class="{
                                'bg-black/90': selectedIndex !== {{ $index }},
                                'bg-transparent': selectedIndex === {{ $index }}
                             }">
                            <img
                                src="{{ asset($item->gambar_url) }}"
                                alt="{{ $item->judul_keahlian }}"
                                class="w-40 h-40 sm:w-56 sm:h-56 object-contain transition-all duration-300"
                                :class="{
                                    'scale-[1.03]': selectedIndex === {{ $index }},
                                    'hover:scale-[1.08]': selectedIndex === {{ $index }}
                                }"
                            >
                        </div>

                        <div class="mb-2 w-full">
                            <h3
                                class="text-lg sm:text-xl font-heading font-bold mb-1 transition-colors"
                                :class="{
                                    'text-cyan-400': selectedIndex === {{ $index }},
                                    'text-gray-400': selectedIndex !== {{ $index }}
                                }"
                            >
                                {{ $item->judul_keahlian }}
                            </h3>
                            <p
                                class="text-xs sm:text-sm transition-colors line-clamp-2"
                                :class="{
                                    'text-gray-300': selectedIndex === {{ $index }},
                                    'text-gray-600': selectedIndex !== {{ $index }}
                                }"
                            >
                                {{ $item->subtitle_keahlian }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Navigasi Bawah --}}
    <div class="flex justify-center items-center space-x-8 mt-8 sm:mt-16 relative z-20">
        <button
            @click="selectedIndex = (selectedIndex === 0) ? total - 1 : selectedIndex - 1"
            class="text-gray-600 hover:text-cyan-400 transition-colors p-2"
        >
            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
        </button>

        {{-- Dot Indicator (Hidden di HP biar gak sempit, Optional) --}}
        <div class="flex space-x-3 overflow-x-auto max-w-[200px] scrollbar-hide py-2 px-1">
            @foreach ($keahlian as $item)
            <button
                @click="selectedIndex = {{ $loop->index }}"
                class="w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full transition-all flex-shrink-0"
                :class="{
                    'bg-cyan-400 scale-125 shadow-md shadow-cyan-400/50': selectedIndex === {{ $loop->index }},
                    'bg-zinc-700 hover:bg-zinc-500': selectedIndex !== {{ $loop->index }}
                }"
            ></button>
            @endforeach
        </div>

        <button
            @click="selectedIndex = (selectedIndex === total - 1) ? 0 : selectedIndex + 1"
            class="text-gray-600 hover:text-cyan-400 transition-colors p-2"
        >
            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
        </button>
    </div>
</div>
</section>
