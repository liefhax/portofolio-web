<section id="pendidikan" class="py-20 scroll-mt-20" data-aos="fade-up">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 class="text-4xl font-heading font-bold text-cyan-400 mb-12 text-center animate-neonFlicker" data-aos="fade-up">
            // PENDIDIKAN //
        </h2>

        <div class="relative max-w-4xl mx-auto">

            <div class="absolute left-4 top-0 h-full w-0.5 bg-cyan-400/30"></div>

            @forelse ($pendidikan as $item)
            <div
                class="mb-10 relative group"
                data-aos="fade-up"
                data-aos-delay="{{ $loop->index * 100 }}"
            >

                <div class="absolute left-[7px] top-1.5 w-5 h-5 bg-cyan-400 rounded-full border-4 border-black
                            transition-all duration-300
                            group-hover:scale-125 group-hover:shadow-lg group-hover:shadow-cyan-400/50">
                </div>

                <div class="ml-12 transition-all duration-300 group-hover:translate-x-2">
                    <span class="text-sm text-gray-400 font-sans tracking-widest">
                        {{ $item->tahun_mulai }} &mdash; {{ $item->tahun_selesai ?? 'Sekarang' }}
                    </span>

                    <h3 class="text-2xl font-heading font-bold text-white mt-1
                               transition-colors duration-300
                               group-hover:text-cyan-400">
                        {{ $item->nama_institusi }}
                    </h3>

                    <p class="text-lg text-cyan-400
                              transition-colors duration-300
                              group-hover:text-fuchsia-500">
                        {{ $item->jenjang }}
                    </p>

                    @if ($item->deskripsi)
                    <p class="text-gray-400 text-sm mt-2 font-sans
                              transition-colors duration-300
                              group-hover:text-gray-200">
                        > {{ $item->deskripsi }}
                    </p>
                    @endif
                </div>
            </div>
            @empty
            <div class="mb-10 relative" data-aos="fade-up">
                <div class="absolute left-[7px] top-1.5 w-5 h-5 bg-zinc-700 rounded-full border-4 border-black"></div>
                <div class="ml-12">
                    <h3 class="text-2xl font-heading font-bold text-zinc-700 mt-1">
                        [// DATA PENDIDIKAN KOSONG //]
                    </h3>
                </div>
            </div>
            @endforelse

        </div>

    </div>
</section>
