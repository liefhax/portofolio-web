<section id="work" class="py-20 scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-heading font-bold text-white mb-12" data-aos="fade-up">Latest Project //</h2>

        <div class="flex flex-col border-t border-zinc-700">
            @forelse ($proyek as $item)
                @php $imgId = 'project-img-' . $loop->iteration; @endphp
                <a href="javascript:void(0)"
                   class="group project-item-wrapper cursor-pointer"
                   data-aos="fade-up"
                   data-aos-delay="{{ $loop->index * 100 }}"
                   data-title="{{ $item->judul_proyek }}"
                   data-img-src="{{ asset($item->gambar_url) }}"
                   data-desc="{{ $item->deskripsi_proyek }}"
                   data-github="{{ $item->link_github }}"
                   data-toko="{{ $item->link_toko }}"
                   onclick="openModal(this)" {{-- EVENT CLICK HANDLER --}}
                   onmouseover="setActiveProject('{{ $imgId }}')"
                   onmouseleave="unsetActiveProject('{{ $imgId }}')">

                    <div class="flex-grow">
                        <h3 class="text-3xl sm:text-4xl font-heading font-bold text-white uppercase group-hover:text-cyan-400 transition-colors duration-300">
                            {{ $item->judul_proyek }}
                        </h3>
                    </div>
                    <span class="text-xl font-sans text-gray-600 group-hover:text-gray-400 transition-colors project-number">
                        {{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}
                    </span>
                    <div class="project-highlight-line"></div>

                    <div class="project-image-preview" id="{{ $imgId }}">
                        <img src="{{ asset($item->gambar_url) }}" alt="{{ $item->judul_proyek }}"
                            class="w-full h-full object-cover"
                            onerror="this.src='https://placehold.co/600x400/18181b/00ffff?text=IMG_ERROR'">
                    </div>
                </a>
            @empty
                {{-- Bagian empty biarkan saja --}}
                <div class="py-8 text-white">Belum ada project.</div>
            @endforelse
        </div>
    </div>
</section>
