<section id="home"
    class="bg-brand-black relative overflow-hidden w-full min-h-screen flex items-center justify-center pt-20 pb-10">
    <div class="w-full px-6 md:px-12 z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-center">

            <div class="text-center md:text-left animate-slideUp" style="animation-delay: 0.2s">
                <span class="text-xl md:text-2xl text-gray-400 font-medium">Hello Buds</span>

                <h1 class="mt-4 mb-4 flex flex-col items-center md:items-start">
                    <span class="text-6xl md:text-7xl lg:text-5xl font-extrabold text-white mt-4 mb-4 leading-tight">
                        I am
                    </span>
                    <span class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-brand-purple leading-tight">
                        {{ $biodata->nama_lengkap }}
                    </span>
                </h1>
                <p class="text-2xl md:text-3xl text-gray-300 mb-6 font-semibold">
                    {{ $biodata->jabatan_singkat }}
                </p>
                <div class="w-24 h-1 bg-brand-purple mx-auto md:mx-0 mb-8"></div>
                <p class="text-lg md:text-xl text-gray-400 max-w-lg mx-auto md:mx-0 mb-10 leading-relaxed">
                    {{ $biodata->deskripsi_singkat_hero }}
                </p>
                <div class="flex justify-center md:justify-start space-x-6">
                    <a href="{{ $biodata->link_cv }}"
                        class="px-8 py-3.5 bg-brand-purple text-white font-semibold rounded-lg shadow-lg hover:shadow-brand-purple/40 hover:bg-opacity-90 transition-all duration-300 text-lg flex items-center gap-2">
                        Download CV
                    </a>
                    <a href="#about"
                        class="px-8 py-3.5 bg-gray-800 text-gray-300 font-semibold rounded-lg hover:bg-gray-700 transition-colors duration-300 text-lg">
                        More
                    </a>
                </div>
            </div>

            <div class="relative flex flex-col items-center animate-fadeIn" style="animation-delay: 0.4s">
                <div class="relative w-[300px] h-[300px] md:w-[450px] md:h-[450px] z-10">
                    <img src="{{ asset($biodata->foto_profil) }}" alt="{{ $biodata->nama_lengkap }}"
                        class="rounded-full object-cover w-full h-full border-4 border-gray-800 shadow-2xl" />
                </div>

                <div class="flex items-center space-x-6 mt-10 z-10">
                    <span class="text-gray-400 font-medium text-lg">Find Me On</span>

                    <a href="{{ $biodata->link_shop }}" target="_blank"
                        class="text-gray-500 hover:text-brand-purple transition-colors p-2 bg-gray-800 rounded-full">
                        <x-icons.store />
                    </a>
                    <a href="{{ $biodata->link_instagram }}" target="_blank"
                        class="text-gray-500 hover:text-brand-purple transition-colors p-2 bg-gray-800 rounded-full">
                        <x-icons.instagram />
                    </a>
                    <a href="{{ $biodata->link_linkedin }}" target="_blank"
                        class="text-gray-500 hover:text-brand-purple transition-colors p-2 bg-gray-800 rounded-full">
                        <x-icons.linkedin />
                    </a>
                    <a href="{{ $biodata->link_github_profil }}" target="_blank"
                        class="text-gray-500 hover:text-brand-purple transition-colors p-2 bg-gray-800 rounded-full">
                        <x-icons.github />
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
