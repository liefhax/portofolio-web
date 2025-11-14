<section id="projects" class="py-20 bg-brand-black w-full">
    <div class="w-full px-6 md:px-12 text-center fade-in max-w-6xl mx-auto">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Latest Projects
        </h2>
        <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto mb-12">
            Ini adalah beberapa proyek pribadi yang pernah saya kerjakan...
        </p>

        <div class="flex flex-col space-y-8 mx-auto">

            @foreach ($proyek as $item)
            <div class="section-animate">
                <div class="bg-gray-900 rounded-lg shadow-lg p-6 md:p-8 flex flex-col md:flex-row items-center justify-between transition-all duration-300 hover:shadow-brand-purple/20 space-y-5 md:space-y-0 md:space-x-8">

                    <div class="flex flex-col md:flex-row items-center space-y-5 md:space-y-0 md:space-x-8 w-full md:w-auto">
                        <img
                            src="{{ asset($item->gambar_url) }}"
                            alt="{{ $item->judul_proyek }}"
                            class="w-full h-48 md:w-64 md:h-36 object-cover rounded-md flex-shrink-0 border border-gray-700"
                        />
                        <h3 class="text-2xl md:text-3xl font-bold text-white text-center md:text-left">
                            {{ $item->judul_proyek }}
                        </h3>
                    </div>

                    <button
                        @click.prevent="selectedProject = allProjects[{{ $loop->index }}]"
                        class="w-full md:w-auto px-6 py-3 bg-brand-purple text-white text-lg font-semibold rounded-lg shadow-lg hover:shadow-brand-purple/40 hover:bg-opacity-90 transition-all duration-300 flex-shrink-0"
                    >
                        View Details
                    </button>

                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
