<section id="about" class="py-24 scroll-mt-20" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-8 sm:px-10 lg:px-12">
        <h2 class="text-4xl font-heading font-bold text-white mb-14 text-center">// About Me //</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-16 items-center">

            <!-- Foto -->
            <div class="md:col-span-1" data-tilt data-tilt-max="8" data-tilt-perspective="1000">
                <div class="tech-frame">
                    <img src="{{ asset($biodata->foto_about) }}"
                        alt="Foto {{ $biodata->nama_lengkap }}"
                        class="w-full h-auto object-cover"
                        onerror="this.src='https://placehold.co/500x500/0a0a0a/00ffff?text=FOTO_SAYA'"
                    >
                </div>
                <p class="text-xs text-gray-500 mt-2 font-sans">// FILE: /usr/img/profile.png</p>
            </div>

            <!-- Teks -->
            <div class="md:col-span-2">
                <div class="text-base text-gray-300 leading-relaxed space-y-5">
                    <p>> {{ $biodata->tentang_saya_paragraf1 }}</p>
                    <p>> {{ $biodata->tentang_saya_paragraf2 }}</p>
                    <p class="text-cyan-400 font-bold">
                        > STATUS: [Mencari peluang magang / Terbuka untuk proyek freelance]
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
