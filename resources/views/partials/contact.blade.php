<section
    id="contact"
    class="py-20 bg-brand-black w-full min-h-screen flex items-center justify-center pt-20 pb-10"
>
    <div class="w-full px-6 md:px-12 fade-in">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-center max-w-6xl mx-auto">

            <div class="text-center md:text-left">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-8">
                    Get in Touch
                </h2>
                <p class="text-lg md:text-xl text-gray-400 max-w-lg mb-10 leading-relaxed">
                    For business and partnership inquiry please contact me
                    below!
                </p>

                <div class="space-y-8">

                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <span class="flex items-center justify-center w-14 h-14 rounded-full bg-gray-800 text-brand-purple">
                                <x-icons.phone-icon class="w-7 h-7" />
                            </span>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold text-white mb-1">Phone (WhatsApp)</h4>
                            <a
                                href="https://wa.me/{{ $biodata->telepon_wa }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-lg text-gray-400 hover:text-brand-purple transition-colors"
                            >
                                {{ $biodata->telepon }}
                            </a>
                        </div>
                    </div>

                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <span class="flex items-center justify-center w-14 h-14 rounded-full bg-gray-800 text-brand-purple">
                                <x-icons.mail-icon class="w-7 h-7" />
                            </span>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold text-white mb-1">Email</h4>
                            <a
                                href="mailto:{{ $biodata->email }}"
                                class="text-lg text-gray-400 hover:text-brand-purple transition-colors"
                            >
                                {{ $biodata->email }}
                            </a>
                        </div>
                    </div>

                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <span class="flex items-center justify-center w-14 h-14 rounded-full bg-gray-800 text-brand-purple">
                                <x-icons.map-pin-icon class="w-7 h-7" />
                            </span>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold text-white mb-1">Address</h4>
                            <a
                                href="https://www.google.com/maps/search/?api=1&query={{ urlencode($biodata->alamat) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-lg text-gray-400 hover:text-brand-purple transition-colors"
                            >
                                {{ $biodata->alamat }}
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="hidden md:flex items-center justify-center relative h-96">
                <x-icons.map-pin-icon class="w-32 h-32 text-gray-700" />
            </div>

        </div>
    </div>
</section>
