<footer class="bg-brand-navbar py-8 w-full">
    <div class="w-full px-6 md:px-12 text-center text-gray-500">
        <div class="flex justify-center space-x-6 mb-4">

            <a href="{{ $biodata->link_shop }}" target="_blank" class="text-gray-500 hover:text-brand-purple transition-colors p-2 bg-gray-800 rounded-full">
                <x-icons.store />
            </a>
            <a href="{{ $biodata->link_instagram }}" target="_blank" class="text-gray-500 hover:text-brand-purple transition-colors p-2 bg-gray-800 rounded-full">
                <x-icons.instagram />
            </a>
            <a href="{{ $biodata->link_linkedin }}" target="_blank" class="text-gray-500 hover:text-brand-purple transition-colors p-2 bg-gray-800 rounded-full">
                <x-icons.linkedin />
            </a>
            <a href="{{ $biodata->link_github_profil }}" target="_blank" class="text-gray-500 hover:text-brand-purple transition-colors p-2 bg-gray-800 rounded-full">
                <x-icons.github />
            </a>

        </div>
        <p class="text-gray-500 text-lg">
            &copy; {{ date('Y') }} {{ $biodata->nama_lengkap }}. Dibuat dengan
            Laravel & Tailwind CSS.
        </p>
    </div>
</footer>
