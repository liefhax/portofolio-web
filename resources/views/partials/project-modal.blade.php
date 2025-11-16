<div x-show="selectedProject" x-transition:enter="animate-fadeIn" x-transition:leave="animate-fadeOut" {{-- (Butuh
    keyframe fadeOut) --}} class="fixed inset-0 z-50 bg-black/70 flex items-center justify-center p-6"
    style="display: none;" {{-- Sembunyikan awalnya --}} {{-- 2. Kalau klik area gelap, tutup modal (set jadi null) --}}
    @click="selectedProject = null">
    <div x-show="selectedProject" x-transition:enter="animate-modalIn" x-transition:leave="animate-modalOut"
        class="bg-brand-navbar w-full max-w-3xl rounded-lg shadow-2xl border border-brand-purple/30 overflow-hidden"
        @click.stop>
        <div class="flex justify-between items-center p-5 border-b border-gray-800">
            <h3 class="text-2xl font-bold text-white" x-text="selectedProject ? selectedProject.judul_proyek : ''"></h3>
            <button @click="selectedProject = null" class="text-gray-500 hover:text-white transition-colors p-1">
                <x-icons.x-icon class="w-6 h-6" /> {{-- (Asumsi kamu punya ikon X) --}}
            </button>
        </div>

        <div class="p-6 max-h-[70vh] overflow-y-auto">
            <img :src="selectedProject ? '/' + selectedProject.gambar_url : ''"
                :alt="selectedProject ? selectedProject.judul_proyek : ''"
                class="w-full h-64 object-cover rounded-lg mb-6"
                onerror="this.src='https://placehold.co/600x400/111827/7556ff?text=Proyek'" />

            <div class="mb-6">
                <h4 class="text-lg font-semibold text-brand-purple mb-2">
                    Deskripsi
                </h4>
                <p class="text-gray-300 leading-relaxed"
                    x-text="selectedProject ? selectedProject.deskripsi_proyek : ''"></p>
            </div>

            <div class="mb-6">
                <h4 class="text-lg font-semibold text-brand-purple mb-3">
                    Teknologi
                </h4>
                <div class="flex flex-wrap gap-2">
                    <template x-if="selectedProject && selectedProject.tags"
                        x-for="tag in selectedProject.tags.split(',')" :key="tag">
                        <span class="bg-gray-800 text-brand-purple text-sm font-medium px-3 py-1 rounded-full"
                            x-text="tag"></span>
                    </template>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                <template x-if="selectedProject && selectedProject.link_github">
                    <a :href="selectedProject.link_github" target="_blank" rel="noopener noreferrer"
                        class="w-full sm:w-auto flex items-center justify-center gap-2 px-5 py-3 bg-gray-800 text-white font-semibold rounded-lg hover:bg-gray-700 transition-colors">
                        <x-icons.github class="w-5 h-5" />
                        <span>Lihat di GitHub</span>
                    </a>
                </template>

                <template x-if="selectedProject && selectedProject.link_toko">
                    <a :href="selectedProject.link_toko" target="_blank" rel="noopener noreferrer"
                        class="w-full sm:w-auto flex items-center justify-center gap-2 px-5 py-3 bg-brand-purple text-white font-semibold rounded-lg hover:bg-opacity-90 transition-colors">
                        <x-icons.store class="w-5 h-5" />
                        <span>Lihat di Toko</span>
                    </a>
                </template>
            </div>
        </div>
    </div>
</div>
