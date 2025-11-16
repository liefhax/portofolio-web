<nav x-data="{ isOpen: false }" class="bg-brand-navbar fixed top-0 z-50 shadow-lg shadow-brand-purple/10 w-full">
    <div class="w-full px-6 py-4 md:px-12">
        <div class="flex justify-between items-center">

            <a href="#home" class="text-2xl font-bold text-white tracking-tight">
                Lief<span class="text-brand-purple">Portofolio</span>
            </a>

            <div class="hidden md:flex items-center space-x-8 lg:space-x-12">
                <a href="#home"
                    class="text-gray-300 hover:text-white transition-colors duration-300 text-lg font-medium">
                    Home
                </a>
                <a href="#whatidoffer"
                    class="text-gray-300 hover:text-white transition-colors duration-300 text-lg font-medium">
                    Skills
                </a>
                <a href="#about"
                    class="text-gray-300 hover:text-white transition-colors duration-300 text-lg font-medium">
                    About
                </a>
                <a href="#pendidikan"
                    class="text-gray-300 hover:text-white transition-colors duration-300 text-lg font-medium">
                    Pendidikan
                </a>
                <a href="#projects"
                    class="text-gray-300 hover:text-white transition-colors duration-300 text-lg font-medium">
                    Projects
                </a>
                <a href="#contact"
                    class="px-6 py-2.5 text-lg font-medium text-brand-purple border border-brand-purple rounded-md hover:bg-brand-purple hover:text-white transition-all duration-300">
                    Contact Me
                </a>
            </div>

            <div class="md:hidden">
                <button @click="isOpen = !isOpen" {{-- Buka/Tutup menu --}} class="text-gray-300 hover:text-white">
                    <template x-if="!isOpen">
                        <x-icons.menu-icon class="w-7 h-7" />
                    </template>
                    <template x-if="isOpen">
                        <x-icons.x-icon class="w-7 h-7" />
                    </template>
                </button>
            </div>
        </div>
    </div>

    <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2" class="md:hidden bg-brand-navbar px-6 pb-4"
        style="display: none;" {{-- Sembunyikan awalnya --}}>
        <div class="flex flex-col space-y-3">
            <a href="#home" @click="isOpen = false"
                class="text-gray-300 hover:text-white transition-colors duration-300 py-2 text-lg">
                Home
            </a>
            <a href="#whatidoffer" @click="isOpen = false"
                class="text-gray-300 hover:text-white transition-colors duration-300 py-2 text-lg">
                Skills
            </a>
            <a href="#about" @click="isOpen = false"
                class="text-gray-300 hover:text-white transition-colors duration-300 py-2 text-lg">
                About
            </a>
            <a href="#pendidikan" @click="isOpen = false"
                class="text-gray-300 hover:text-white transition-colors duration-300 py-2 text-lg">
                Pendidikan
                <a href="#projects" @click="isOpen = false"
                    class="text-gray-300 hover:text-white transition-colors duration-300 py-2 text-lg">
                    Projects
                </a>
                <a href="#contact" @click="isOpen = false"
                    class="w-full text-center px-5 py-2.5 text-lg font-medium text-brand-purple border border-brand-purple rounded-md hover:bg-brand-purple hover:text-white transition-all duration-300">
                    Contact Me
                </a>
        </div>
    </div>
</nav>
