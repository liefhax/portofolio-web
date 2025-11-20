<section id="hero"
    class="relative min-h-screen flex flex-col items-center justify-center overflow-hidden scroll-mt-20"
    {{-- START ALPINE DATA --}}
    x-data="{
        textName: '',
        textJob: '',
        fullName: '{{ addslashes($biodata->nama_lengkap) }}', // addslashes jaga-jaga ada tanda petik
        fullJob: '// {{ addslashes($biodata->jabatan_singkat) }}',
        phase: 'name', // phase: 'name', 'job', 'done'

        typewriter(text, targetVar, nextPhase) {
            let i = 0;
            let speed = 100; // Kecepatan ngetik (ms)

            let interval = setInterval(() => {
                if (i < text.length) {
                    this[targetVar] += text.charAt(i);
                    i++;
                } else {
                    clearInterval(interval);
                    setTimeout(() => {
                        this.phase = nextPhase;
                        if (nextPhase === 'job') {
                            this.typewriter(this.fullJob, 'textJob', 'done');
                        }
                    }, 500); // Jeda sebelum pindah baris
                }
            }, speed);
        },

        init() {
            // Delay dikit biar gak tabrakan sama loading awal
            setTimeout(() => {
                this.typewriter(this.fullName, 'textName', 'job');
            }, 500);
        }
    }"
>

    {{-- 1. BACKGROUND LAYER (GRID 3D + VIGNETTE) --}}
    <div class="retro-grid-wrapper">
        <div class="retro-grid" id="moving-grid"></div>
        <div class="retro-horizon"></div>
        <div class="retro-vignette"></div>
    </div>

    {{-- 2. CONTENT LAYER --}}
    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-12 text-center">

        {{-- Icon --}}
        <div class="mb-6 text-cyan-400 animate-bounce inline-block" style="animation-duration: 3s;">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 sm:h-16 sm:w-16 mx-auto drop-shadow-[0_0_15px_rgba(0,255,255,0.6)]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
            </svg>
        </div>

        {{-- NAMA LENGKAP (Typewriter) --}}
        <div class="min-h-text mb-4">
            <h1 class="text-5xl sm:text-7xl md:text-8xl font-heading font-bold tracking-wide neon-text uppercase leading-tight inline-block">
                <span x-text="textName"></span><span x-show="phase === 'name'" class="text-fuchsia-500 cursor-blink">_</span>
            </h1>
        </div>

        {{-- JABATAN (Typewriter) --}}
        <div class="min-h-text mb-6">
            <p class="text-sm sm:text-xl md:text-2xl font-heading font-bold text-cyan-400 tracking-[0.3em] uppercase drop-shadow-md inline-block">
                <span x-text="textJob"></span><span x-show="phase === 'job' || phase === 'done'" class="text-cyan-400 cursor-blink">_</span>
            </p>
        </div>

        {{-- WRAPPER: Muncul setelah mengetik selesai (x-show="phase === 'done'") --}}
        <div x-show="phase === 'done'"
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 translate-y-5"
             x-transition:enter-end="opacity-100 translate-y-0"
             style="display: none;"> {{-- style display none biar gak flash di awal --}}

            {{-- DESKRIPSI --}}
            <p class="text-xs sm:text-base text-cyan-200/70 max-w-2xl mx-auto font-mono leading-relaxed mb-10">
                {{ $biodata->deskripsi_singkat_hero }}
            </p>

            {{-- BUTTON --}}
            <div class="mt-8 flex justify-center">
                <a href="#contact"
                   class="group relative px-8 py-3 bg-transparent overflow-hidden rounded-none">
                    <div class="absolute inset-0 w-full h-full bg-cyan-400/10 border border-cyan-400 group-hover:bg-cyan-400/20 transition-all duration-300"></div>
                    <span class="relative text-cyan-400 font-mono font-bold tracking-wider group-hover:text-white transition-colors">
                        > Get in touch_
                    </span>
                    <div class="absolute top-0 -left-[100%] w-full h-full bg-gradient-to-r from-transparent via-cyan-400/50 to-transparent skew-x-12 group-hover:animate-[shimmer_1s_infinite]"></div>
                </a>
            </div>
        </div>

    </div>

</section>
