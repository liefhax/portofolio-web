<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<header class="sticky top-4 z-40 w-full transition-all duration-300 px-4" data-aos="fade-down" x-data="{ open: false }">
    {{-- Container "Pill" Navbar --}}
    <nav class="flex justify-between items-center max-w-2xl mx-auto px-6 py-3
                bg-black/80 backdrop-blur-md border border-zinc-700/50 rounded-full
                shadow-[0_0_15px_rgba(0,255,255,0.1)] relative z-50">

        {{-- 1. KIRI: Logo / Nama (Penting biar layout seimbang) --}}
        <a href="https://bit.ly/m/LiefShop" target="_blank" class="text-lg font-heading font-bold text-white hover:text-cyan-400 transition-colors">
            // LIEF<span class="text-cyan-400">PROJECT</span>
        </a>

        {{-- 2. TENGAH/KANAN: Desktop Menu --}}
        <ul class="hidden md:flex space-x-6 text-xs font-bold tracking-widest text-gray-400">
            <li><a href="#hero" class="hover:text-cyan-400 transition-colors">//HOME</a></li>
            <li><a href="#about" class="hover:text-cyan-400 transition-colors">//ABOUT</a></li>
            <li><a href="#skills" class="hover:text-cyan-400 transition-colors">//SKILLS</a></li>
            <li><a href="#work" class="hover:text-cyan-400 transition-colors">//PROJECT</a></li>
            <li><a href="#contact" class="hover:text-cyan-400 transition-colors">//CONTACT</a></li>
        </ul>

        {{-- 3. KANAN: Hamburger Mobile --}}
        <div class="flex items-center md:hidden">
            <button @click="open = !open"
                class="text-gray-300 hover:text-cyan-400 focus:outline-none transition-colors">
                {{-- Icon Hamburger --}}
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                {{-- Icon Close --}}
                <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- 4. MOBILE DROPDOWN MENU --}}
        <div x-show="open" x-cloak @click.away="open = false" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 -translate-y-2 scale-95"
            class="absolute top-full left-0 right-0 mt-2 p-2 mx-2 bg-zinc-900/95 backdrop-blur-xl border border-zinc-700 rounded-xl shadow-2xl shadow-cyan-500/20 md:hidden overflow-hidden">
            <ul class="flex flex-col space-y-1">
                <li>
                    <a @click="open = false" href="#hero"
                    class="block px-4 py-3 text-sm font-bold text-gray-300 hover:text-black hover:bg-cyan-400 rounded-lg transition-all">
                        // HOME
                    </a>
                </li>
                <li>
                    <a @click="open = false" href="#about"
                        class="block px-4 py-3 text-sm font-bold text-gray-300 hover:text-black hover:bg-cyan-400 rounded-lg transition-all">
                        // ABOUT
                    </a>
                </li>
                <li>
                    <a @click="open = false" href="#skills"
                        class="block px-4 py-3 text-sm font-bold text-gray-300 hover:text-black hover:bg-cyan-400 rounded-lg transition-all">
                        // SKILLS
                    </a>
                </li>
                <li>
                    <a @click="open = false" href="#work"
                    class="block px-4 py-3 text-sm font-bold text-gray-300 hover:text-black hover:bg-cyan-400 rounded-lg transition-all">
                    // PROJECT
                </a>
            </li>
                <li>
                    <a @click="open = false" href="#contact"
                        class="block px-4 py-3 text-sm font-bold text-gray-300 hover:text-black hover:bg-cyan-400 rounded-lg transition-all">
                        // CONTACT
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
