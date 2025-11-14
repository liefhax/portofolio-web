<section id="whatidoffer" class="py-20 bg-brand-black w-full min-h-screen flex items-center justify-center pt-20 pb-10"
    x-data="{ selectedIndex: 0, total: {{ count($keahlian) }} }">
    <div class="w-full px-6 md:px-12 text-center fade-in">
        <div class="mx-auto max-w-6xl">

            <h3 class="text-xl font-medium text-gray-400 uppercase tracking-widest mb-4">
                My Skills
            </h3>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                Tech I'm Good With <br class="md:hidden" />
            </h2>
            <div class="w-32 h-1.5 bg-brand-purple mx-auto mb-16"></div>

            <div class="relative w-full h-[400px] flex items-center justify-center" style="perspective: 1000px">

                @foreach ($keahlian as $item)

                    @php $index = $loop->index; @endphp

                    <div class="absolute w-full md:w-1/3 max-w-xs sm:max-w-sm transition-all duration-500 ease-out"
                        style="height: 280px;" {{-- Saat card ini diklik, update selectedIndex --}}
                        @click="selectedIndex = {{ $index }}" {{-- Logika Style (Transform, Opacity, Z-index, Blur) --}}
                        :style="() => {
                                let offset = {{ $index }} - selectedIndex;
                                let transform = '';
                                let opacity = '0';
                                let zIndex = 0;
                                let blur = 'blur-md';

                                if (offset === 0) {
                                    transform = 'translateX(0) scale(1.1)';
                                    opacity = '100';
                                    zIndex = 10;
                                    blur = 'blur-0';
                                } else if (offset === 1) {
                                    transform = 'translateX(60%) scale(0.95)';
                                    opacity = '50';
                                    zIndex = 5;
                                    blur = 'blur-sm';
                                } else if (offset === -1) {
                                    transform = 'translateX(-60%) scale(0.95)';
                                    opacity = '50';
                                    zIndex = 5;
                                    blur = 'blur-sm';
                                } else {
                                    transform = `translateX(${offset > 0 ? 120 : -120}%) scale(0.8)`;
                                    opacity = '0';
                                    zIndex = 0;
                                }

                                // Kita pakai style Tailwind 'manual' di sini
                                return {
                                    transform: transform,
                                    opacity: opacity + '%',
                                    zIndex: zIndex,
                                    filter: blur.startsWith('blur-') ? 'blur(' + (blur === 'blur-sm' ? '4px' : (blur === 'blur-md' ? '8px' : '0px')) + ')' : 'blur(0px)'
                                }
                            }">
                        <div class="bg-gray-900 p-10 rounded-lg shadow-lg border-2 border-gray-800
                                        flex flex-col items-center justify-start text-center h-full
                                        transform transition-all duration-300 pointer-events-none" {{-- Bikin border nyala
                            saat card-nya aktif --}}
                            :class="{ 'border-brand-purple shadow-brand-purple/30': selectedIndex === {{ $index }} }">
                            <img src="{{ asset($item->gambar_url) }}" alt="{{ $item->judul_keahlian }}"
                                class="w-32 h-32 mb-6 object-contain" {{-- UBAH w-20 h-20 jadi w-32 h-32 --}}>
                            <h3 class="text-2xl md:text-3xl font-bold mb-2" {{-- Bikin teks nyala saat card-nya aktif --}}
                                :class="{ 'text-white': selectedIndex === {{ $index }}, 'text-gray-500': selectedIndex !== {{ $index }} }">
                                {{ $item->judul_keahlian }}
                            </h3>
                            <span class="text-lg"
                                :class="{ 'text-brand-purple': selectedIndex === {{ $index }}, 'text-gray-600': selectedIndex !== {{ $index }} }">
                                {{ $item->subtitle_keahlian }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center items-center space-x-8 mt-16">
                <button @click="selectedIndex = (selectedIndex === 0) ? total - 1 : selectedIndex - 1"
                    class="text-gray-600 hover:text-brand-purple transition-colors p-3 rounded-full hover:bg-gray-800 border border-gray-700 hover:border-brand-purple">
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <div class="flex space-x-4">
                    @foreach ($keahlian as $item)
                        <button @click="selectedIndex = {{ $loop->index }}" class="w-4 h-4 rounded-full transition-all" {{--
                            Bikin titiknya nyala pakai :class --}} :class="{
                                'bg-brand-purple scale-125': selectedIndex === {{ $loop->index }},
                                'bg-gray-700 hover:bg-gray-500': selectedIndex !== {{ $loop->index }}
                            }"></button>
                    @endforeach
                </div>

                <button @click="selectedIndex = (selectedIndex === total - 1) ? 0 : selectedIndex + 1"
                    class="text-gray-600 hover:text-brand-purple transition-colors p-3 rounded-full hover:bg-gray-800 border border-gray-700 hover:border-brand-purple">
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
