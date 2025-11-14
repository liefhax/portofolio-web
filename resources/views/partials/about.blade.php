<section
    id="about"
    class="py-20 bg-gray-900 w-full min-h-screen flex items-center justify-center pt-20 pb-10"
>
    <div class="w-full px-6 md:px-12 fade-in">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-center max-w-6xl mx-auto">

            <div
                class="relative flex justify-center animate-fadeIn"
                style="animation-delay: 0.2s"
            >
                <div class="about-image-wrapper">
                    <img
                        src="{{ asset($biodata->foto_about) }}"
                        alt="Foto Tentang {{ $biodata->nama_lengkap }}"
                        class="rounded-lg shadow-xl border-2 border-gray-700"
                        {{-- Fallback jika gambar error --}}
                        onerror="this.src='https://placehold.co/600x600/1f2937/7556ff?text=Foto+About'"
                    />
                    <div
                        class="absolute -bottom-8 -left-8 w-24 h-24 bg-brand-purple/20 rounded-full blur-2xl animate-pulseSlow"
                        style="animation-delay: 1s"
                    ></div>
                    <div
                        class="absolute -top-8 -right-8 w-20 h-20 bg-white/10 rounded-full blur-2xl animate-pulseSlow"
                        style="animation-delay: 0.5s"
                    ></div>
                </div>
            </div>

            <div
                class="text-center md:text-left animate-slideUp"
                style="animation-delay: 0.4s"
            >
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                    Tentang Saya
                </h2>

                <p class="text-lg md:text-xl text-gray-300 mb-6 leading-relaxed">
                    {{ $biodata->tentang_saya_paragraf1 }}
                </p>

                <p class="text-lg md:text-xl text-gray-300 leading-relaxed">
                    {{ $biodata->tentang_saya_paragraf2 }}
                </p>
            </div>

        </div>
    </div>
</section>
