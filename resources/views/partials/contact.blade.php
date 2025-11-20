<section id="contact" class="py-20 scroll-mt-20" data-aos="fade-up">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 class="text-4xl font-heading font-bold text-cyan-400 mb-12 text-center animate-neonFlicker" data-aos="fade-up">
            // GET IN TOUCH //
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

            <div data-aos="fade-right" data-aos-delay="100">
                <p class="text-lg text-gray-300 mb-10 leading-relaxed font-sans">
                    > Punya ide proyek, pertanyaan, atau cuma mau nyapa?
                    Kirim sinyal. Saya menunggu di seberang koneksi.
                </p>

                <div class="space-y-8">

                    <a href="https://wa.me/{{ $biodata->telepon_wa }}" target="_blank" rel="noopener noreferrer"
                       class="flex items-center space-x-4 group" data-aos="fade-up" data-aos-delay="200">
                        <div class="flex-shrink-0">
                            <span class="flex items-center justify-center w-14 h-14 rounded-full
                                         border-2 border-zinc-700 text-gray-600
                                         transition-all duration-300
                                         group-hover:border-cyan-400 group-hover:text-cyan-400 group-hover:scale-110">
                                <x-icons.phone-icon class="w-7 h-7" />
                            </span>
                        </div>
                        <div>
                            <h4 class="text-xl font-heading text-white mb-1">Phone (WhatsApp)</h4>
                            <p class="text-lg text-gray-400 font-sans
                                      transition-colors duration-300
                                      group-hover:text-cyan-400">
                                {{ $biodata->telepon }}
                            </p>
                        </div>
                    </a>

                    <a href="mailto:{{ $biodata->email }}"
                       class="flex items-center space-x-4 group" data-aos="fade-up" data-aos-delay="300">
                        <div class="flex-shrink-0">
                            <span class="flex items-center justify-center w-14 h-14 rounded-full
                                         border-2 border-zinc-700 text-gray-600
                                         transition-all duration-300
                                         group-hover:border-cyan-400 group-hover:text-cyan-400 group-hover:scale-110">
                                <x-icons.mail-icon class="w-7 h-7" />
                            </span>
                        </div>
                        <div>
                            <h4 class="text-xl font-heading text-white mb-1">Email</h4>
                            <p class="text-lg text-gray-400 font-sans
                                      transition-colors duration-300
                                      group-hover:text-cyan-400">
                                {{ $biodata->email }}
                            </p>
                        </div>
                    </a>

                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($biodata->alamat) }}" target="_blank" rel="noopener noreferrer"
                       class="flex items-center space-x-4 group" data-aos="fade-up" data-aos-delay="400">
                        <div class="flex-shrink-0">
                            <span class="flex items-center justify-center w-14 h-14 rounded-full
                                         border-2 border-zinc-700 text-gray-600
                                         transition-all duration-300
                                         group-hover:border-cyan-400 group-hover:text-cyan-400 group-hover:scale-110">
                                <x-icons.map-pin-icon class="w-7 h-7" />
                            </span>
                        </div>
                        <div>
                            <h4 class="text-xl font-heading text-white mb-1">Address</h4>
                            <p class="text-lg text-gray-400 font-sans
                                      transition-colors duration-300
                                      group-hover:text-cyan-400">
                                {{ $biodata->alamat }}
                            </p>
                        </div>
                    </a>

                </div>
            </div>

            <div class="hidden md:flex items-center justify-center" data-aos="fade-left" data-aos-delay="100">
                <x-icons.map-pin-icon class="w-48 h-48 text-zinc-800" />
            </div>

        </div>

    </div>
</section>
