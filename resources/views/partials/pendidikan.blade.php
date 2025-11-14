<section id="pendidikan" class="py-20 bg-gray-900 w-full"> <div class="w-full px-6 md:px-12 max-w-4xl mx-auto"> <h3 class="text-sm font-medium text-gray-400 uppercase tracking-widest mb-2">
            PENDIDIKAN
        </h3>
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-12">
            Perjalanan akademik saya.
        </h2>

        <div class="relative">
            <div class="absolute left-3 top-0 w-0.5 h-full bg-gray-700"></div>

            @foreach ($pendidikan as $item)
            <div class="mb-12 relative"> <div class="absolute left-0 top-1.5 w-6 h-6 bg-brand-purple rounded-full border-4 border-gray-900"></div>

                <div class="ml-12"> <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-1">
                        <h3 class="text-2xl font-bold text-white">
                            {{ $item->nama_institusi }}
                        </h3>
                        <span classC="text-sm font-medium text-gray-300 bg-gray-800 px-3 py-1 rounded-full mt-2 sm:mt-0 flex-shrink-0">
                            {{ $item->tahun_mulai }} &mdash; {{ $item->tahun_selesai ?? 'Sekarang' }}
                        </span>
                    </div>

                    <h4 class="text-lg font-semibold text-brand-purple mb-3">
                        {{ $item->jenjang }}
                    </h4>

                    @if ($item->deskripsi)
                    <p class="text-gray-300 leading-relaxed">
                        {{ $item->deskripsi }}
                    </p>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
