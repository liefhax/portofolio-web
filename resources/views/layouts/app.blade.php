<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $biodata->nama_lengkap ?? '' }} // 2077</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['IBM Plex Mono', 'monospace'],
                        heading: ['Oxanium', 'sans-serif'], // Pastikan ini ada
                    },
                    colors: {
                        // Tambahin warna ini kalau belum ada
                        cyan: { 400: '#00ffff', 500: '#00e0e0', 600: '#00c0c0', },
                        fuchsia: { 500: '#ff00ff', 900: '#ff00ff', },
                        // Warna baru untuk glitch effect
                        'glitch-blue': '#00F0FF',
                        'glitch-red': '#FF00F0',
                    },
                    keyframes: {
                        // ANIMASI BARU UNTUK GRID BACKGROUND
                        gridMove: {
                            '0%': { backgroundPosition: '0% 0%' },
                            '100%': { backgroundPosition: '100% 100%' },
                        },
                        scanlines: {
                            '0%, 100%': { backgroundPosition: '0% 0%' },
                            '50%': { backgroundPosition: '0% 50%' },
                        },
                        // ANIMASI BARU UNTUK GLITCH TEXT
                        glitch: {
                            '0%': { textShadow: 'none', transform: 'none' },
                            '2%': {
                                textShadow: '2px 0 0 var(--tw-shadow-color-glitch-red), -2px 0 0 var(--tw-shadow-color-glitch-blue)',
                                transform: 'translate(1px, -1px)'
                            },
                            '4%': { textShadow: 'none', transform: 'none' },
                            '6%': {
                                textShadow: '-2px 0 0 var(--tw-shadow-color-glitch-red), 2px 0 0 var(--tw-shadow-color-glitch-blue)',
                                transform: 'translate(-1px, 1px)'
                            },
                            '8%': { textShadow: 'none', transform: 'none' },
                            '10%': {
                                textShadow: '1px 0 0 var(--tw-shadow-color-glitch-red), -1px 0 0 var(--tw-shadow-color-glitch-blue)',
                                transform: 'translate(0px, -2px)'
                            },
                            '12%': { textShadow: 'none', transform: 'none' },
                            // Flicker lebih banyak di 90-100%
                            '90%, 92%, 94%, 96%, 98%, 100%': {
                                textShadow: '1px 0 0 var(--tw-shadow-color-glitch-red), -1px 0 0 var(--tw-shadow-color-glitch-blue)',
                                transform: 'translate(0px, 0px)'
                            },
                        },
                        glitchSkew: { // Untuk efek skewing sesekali
                            '0%, 100%': { clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)' },
                            '20%': { clipPath: 'polygon(0 0, 100% 0, 90% 100%, 10% 100%)' },
                            '40%': { clipPath: 'polygon(10% 0, 90% 0, 100% 100%, 0 100%)' },
                            '60%': { clipPath: 'polygon(0 0, 100% 0, 95% 100%, 5% 100%)' },
                            '80%': { clipPath: 'polygon(5% 0, 95% 0, 100% 100%, 0 100%)' },
                        }
                    },
                    animation: {
                        gridMove: 'gridMove 30s linear infinite', // Animasi grid background
                        scanlines: 'scanlines 8s linear infinite', // Animasi garis TV
                        glitch: 'glitch 4s infinite alternate', // Animasi teks glitch
                        glitchSkew: 'glitchSkew 4s steps(2, end) infinite alternate', // Animasi skew sesekali
                    }
                },
            },
        };
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;700&family=Oxanium:wght@700;900&display=swap"
        rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            background-color: #000;
            overflow-x: hidden;
        }

        /* --- 1. RETRO 3D GRID SYSTEM --- */
        .retro-grid-wrapper {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: #000;
            z-index: 0;
            /* Kunci 3D Perspective di sini */
            perspective: 600px;
        }

        .retro-grid {
            position: absolute;
            /* Posisi lebih tinggi (top: -30%) biar horizon naik */
            top: -30%;
            left: -50%;
            width: 200%;
            height: 200%;
            /* Height gede biar gak putus pas dimiringin */

            /* Default Transform (Miring dasar) */
            transform: rotateX(60deg);

            /* WARNA GRID: Cyan (#00ffff) tapi opacity rendah (0.15) biar dark */
            background-image:
                linear-gradient(rgba(0, 255, 255, 0.15) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 255, 255, 0.15) 1px, transparent 1px);

            background-size: 50px 50px;
            background-position: 0 0;

            /* Animasi Jalan Terus */
            animation: grid-walk 1s linear infinite;

            /* Transisi halus buat efek mouse */
            transition: transform 0.1s ease-out;
            transform-style: preserve-3d;
        }



        .retro-vignette {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            /* Di atas grid, di bawah konten */
            pointer-events: none;
            /* Biar mouse tetep bisa nembus */

            /* PENTING: Gradasi melingkar */
            /* Tengah: Transparan total */
            /* Pinggir: Hitam pekat (#000) */
            background: radial-gradient(circle at center,
                    transparent 0%,
                    transparent 40%,
                    /* Area aman di tengah 40% */
                    rgba(0, 0, 0, 0.8) 80%,
                    #000 100%);
        }

        /* Horizon Fade (Gradasi Hitam di atas) */
        .retro-horizon {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 40%;
            /* Tutup 40% layar atas pake gradasi */
            background: linear-gradient(to bottom, #000 40%, transparent 100%);
            z-index: 1;
            pointer-events: none;
        }

        .cursor-blink {
            animation: blink 1s step-end infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }

        /* Biar layout gak lompat pas teks belum ada, kita kasih min-height di elemen teks */
        .min-h-text {
            min-height: 1.2em;
        }

        /* Animasi Jalan (Looping) */
        @keyframes grid-walk {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 0 50px;
                /* Samain dengan background-size */
            }
        }

        /* --- 2. TEXT STYLING --- */
        .neon-text {
            font-family: 'Oxanium', cursive;
            color: #00ffff;
            /* GANTI JADI CYAN */
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.6), 0 0 20px rgba(0, 255, 255, 0.4);
        }

        .animate-flicker {
            animation: flicker 4s infinite alternate;
        }

        @keyframes flicker {

            0%,
            18%,
            22%,
            25%,
            53%,
            57%,
            100% {
                opacity: 1;
                text-shadow: 0 0 10px rgba(0, 255, 255, 0.8), 0 0 20px rgba(0, 255, 255, 0.5);
            }

            20%,
            24%,
            55% {
                opacity: 0.5;
                text-shadow: none;
            }
        }

        .project-item-wrapper {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 1rem;
            /* Padding agak dikecilin dikit buat mobile */
            border-bottom: 1px solid #282828;
        }

        .project-item-wrapper:hover .project-image-preview {
            opacity: 1;
            transform: translateY(-50%) scale(1);
        }

        .project-image-preview {
            display: none;
            /* Sisanya properti styling sama kayak punya lo sebelumnya */
            position: fixed;
            top: 50%;
            right: 4rem;
            width: 400px;
            max-width: 40%;
            height: auto;
            border: 2px solid #00ffff;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
            z-index: 50;
            pointer-events: none;
            transform: translate3d(0, 0, 0) scale(0.8);
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .project-highlight-line {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, #ff00ff, #00ffff);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease-in-out;
            z-index: 1;
        }

        .project-item-wrapper:hover .project-highlight-line {
            transform: scaleX(1);
        }

        .project-number {
            z-index: 10;
            flex-shrink: 0;
            margin-left: 2rem;
        }

        .tech-frame {
            position: relative;
            padding: 1rem;
            border: 1px solid #00ffff;
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.3);
            background: #0a0a0a;
        }

        .tech-frame::before,
        .tech-frame::after {
            content: '';
            position: absolute;
            width: 1rem;
            height: 1rem;
            border-color: #00ffff;
            border-style: solid;
        }

        .tech-frame::before {
            top: -2px;
            left: -2px;
            border-width: 2px 0 0 2px;
        }

        .tech-frame::after {
            bottom: -2px;
            right: -2px;
            border-width: 0 2px 2px 0;
        }

        .cyber-nav-shape {
            clip-path: polygon(0 10px, 10px 0,
                    calc(100% - 10px) 0, 100% 10px,
                    100% calc(100% - 10px), calc(100% - 10px) 100%,
                    10px 100%, 0 calc(100% - 10px));
        }

        @media (min-width: 768px) {
            .project-image-preview {
                display: block;
                opacity: 0;
                /* Mulai dari transparan */
            }

            .project-item-wrapper:hover .project-image-preview {
                opacity: 1;
                transform: translateY(-50%) scale(1);
            }
        }

        /* Tweak Mobile Layout buat List Project */
        @media (max-width: 768px) {
            .project-item-wrapper {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .project-number {
                margin-left: 0;
                margin-top: 0.5rem;
                font-size: 0.8rem;
                color: #555;
            }
        }
    </style>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="font-sans antialias">

    @include('partials.navbar', ['biodata' => $biodata])

    <main>
        @yield('content')
    </main>

    @include('partials.footer', ['biodata' => $biodata])


    <div id="project-modal"
        class="fixed inset-0 z-[9999] hidden items-center justify-center px-4 py-8 sm:p-6 bg-black/90 backdrop-blur-sm transition-opacity duration-300">

        <div
            class="relative w-full max-w-lg max-h-full flex flex-col bg-zinc-950 border border-cyan-500/50 shadow-[0_0_25px_rgba(0,255,255,0.15)] rounded-2xl overflow-hidden">

            <div class="flex justify-between items-center px-4 py-3 border-b border-zinc-800 bg-zinc-900/80 shrink-0">
                <span class="text-xs text-cyan-500 font-bold tracking-widest uppercase">// DETAIL_PROJECT</span>
                <button id="modal-close"
                    class="bg-zinc-800/50 rounded-full p-1 text-gray-400 hover:text-red-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-4 scrollbar-thin scrollbar-thumb-cyan-900 scrollbar-track-transparent">

                <div
                    class="w-full aspect-video bg-zinc-900 rounded-lg overflow-hidden border border-zinc-800 mb-4 relative group">
                    <img id="modal-img" src="" alt="Project Image"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-[linear-gradient(rgba(18,16,16,0)_50%,rgba(0,0,0,0.25)_50%),linear-gradient(90deg,rgba(255,0,0,0.06),rgba(0,255,0,0.02),rgba(0,0,255,0.06))] z-10 bg-[length:100%_2px,3px_100%] pointer-events-none">
                    </div>
                </div>

                <h3 id="modal-title"
                    class="text-xl font-heading font-bold text-white uppercase leading-snug mb-2 text-left">
                </h3>

                <div class="h-px w-full bg-gradient-to-r from-cyan-500/50 to-transparent mb-3"></div>

                <p id="modal-desc" class="text-sm text-gray-300 font-sans leading-relaxed text-justify">
                </p>
            </div>

            <div class="p-3 border-t border-zinc-800 bg-zinc-900/50 shrink-0 flex gap-3">
                <a id="modal-github" href="#" target="_blank"
                    class="hidden flex-1 items-center justify-center py-2.5 bg-zinc-800 hover:bg-zinc-700 text-white text-xs font-bold rounded-lg border border-zinc-700 transition-all">
                    GITHUB
                </a>
                <a id="modal-toko" href="#" target="_blank"
                    class="hidden flex-1 items-center justify-center py-2.5 bg-cyan-600 hover:bg-cyan-500 text-white text-xs font-bold rounded-lg border border-cyan-400 shadow-[0_0_10px_rgba(0,255,255,0.2)] transition-all">
                    SHOPEE
                </a>
            </div>

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Inisialisasi AOS
        AOS.init({ duration: 700, once: true, easing: 'ease-in-out' });

        // ----- Logika Modal (dari file baru lo) -----
        document.addEventListener('DOMContentLoaded', () => {

            // START: LOGIKA BARU UNTUK MOUSE BLUR PADA NOISE BACKGROUND
            const noiseOverlay = document.getElementById('noise-overlay');
            const noiseMaxBlur = 1.5; // Maksimum blur saat kursor di ujung (1.5px)

            // Fungsi untuk update blur noise berdasarkan posisi kursor
            const updateNoiseBlur = (e) => {
                if (!noiseOverlay) return;

                const x = e.clientX;
                const y = e.clientY;
                const centerX = window.innerWidth / 2;
                const centerY = window.innerHeight / 2;

                // Hitung jarak kursor dari tengah (dinormalisasi 0 sampai 1)
                const distX = Math.abs(x - centerX) / centerX;
                const distY = Math.abs(y - centerY) / centerY;

                // Ambil jarak maksimum dari tengah
                const distNormalized = Math.max(distX, distY);

                // Hitung nilai blur: 0 (tengah) sampai noiseMaxBlur (pinggir)
                const blurValue = distNormalized * noiseMaxBlur;

                noiseOverlay.style.filter = `blur(${blurValue}px)`;
            };

            // Tambahkan event listener mousemove ke seluruh dokumen
            document.addEventListener('mousemove', updateNoiseBlur);
            // ... (AOS.init logic) ...

            // ----- Logika Modal -----
            const projectLinks = document.querySelectorAll('a.group.project-item-wrapper');
            const modal = document.getElementById('project-modal');
            const modalClose = document.getElementById('modal-close');
            const modalImg = document.getElementById('modal-img');
            const modalTitle = document.getElementById('modal-title');
            const modalDesc = document.getElementById('modal-desc');

            // KUNCI: AMBIL TOMBOL LINK BARU
            const modalGithub = document.getElementById('modal-github');
            const modalToko = document.getElementById('modal-toko');

            if (!modal) {
                console.error("Elemen modal tidak ditemukan.");
                return;
            }

            // ... (Kode lainnya tetap sama)

            const openModal = (link) => {
                // 1. Ambil Data (Sama seperti sebelumnya)
                const currentProjectTitle = link.dataset.title || 'PROJECT_NAME';
                const currentProjectDesc = link.dataset.desc || 'No description available.';
                const imgSrc = link.dataset.imgSrc || '';
                const githubLink = link.dataset.github || '';
                const tokoLink = link.dataset.toko || '';

                // 2. Isi Data ke Elemen HTML
                modalImg.src = imgSrc;
                modalTitle.innerText = currentProjectTitle; // Pake innerText aja biar rapi
                modalDesc.innerText = currentProjectDesc;

                // 3. Handle Tombol
                if (githubLink && githubLink !== '#' && githubLink !== 'null') {
                    modalGithub.href = githubLink;
                    modalGithub.classList.remove('hidden');
                    modalGithub.classList.add('block'); // Pastikan muncul
                } else {
                    modalGithub.classList.add('hidden');
                    modalGithub.classList.remove('block');
                }

                if (tokoLink && tokoLink !== '#' && tokoLink !== 'null') {
                    modalToko.href = tokoLink;
                    modalToko.classList.remove('hidden');
                    modalToko.classList.add('block');
                } else {
                    modalToko.classList.add('hidden');
                    modalToko.classList.remove('block');
                }

                // 4. TAMPILKAN MODAL (KUNCI UTAMA)
                modal.classList.remove('hidden');
                modal.classList.add('flex'); // PENTING: Biar items-center berfungsi

                // 5. Matikan Scroll Body (Biar website belakang gak gerak)
                document.body.style.overflow = 'hidden';
            };

            const closeModal = () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');

                // Hidupkan Scroll Body lagi
                document.body.style.overflow = 'auto';
            };

            // ... (Event Listener tetap sama)
            // Tambah event listener ke setiap link proyek
            projectLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    openModal(link);
                });
            });

            // Tambah event listener ke tombol close
            modalClose.addEventListener('click', closeModal);

            // Tambah event listener untuk menutup modal saat klik di luar
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal();
                }
            });
        });
    </script>

    <script>
        document.addEventListener('mousemove', (e) => {
            // Cek lebar layar, efek ini cuma aktif di Desktop (> 768px) biar HP gak berat
            if (window.innerWidth > 768) {
                const grid = document.getElementById('moving-grid');
                const content = document.getElementById('content-layer');

                // Ambil ukuran layar
                const width = window.innerWidth;
                const height = window.innerHeight;

                // Hitung posisi mouse dari tengah (-1 sampai 1)
                const mouseX = (e.clientX - width / 2) / width;
                const mouseY = (e.clientY - height / 2) / height;

                // Hitung rotasi (Adjust angka 10 dan 5 buat atur sensitivitas)
                // rotateX defaultnya 60deg, kita tambah/kurang dikit dari situ
                const rotateX = 60 - (mouseY * 10);
                const rotateZ = mouseX * 5;
                const translateX = mouseX * -20; // Geser kiri kanan dikit

                // Terapkan ke Grid
                grid.style.transform = `rotateX(${rotateX}deg) rotateZ(${rotateZ}deg) translateX(${translateX}px)`;

                // (Opsional) Gerakin teks dikit berlawanan arah biar makin 3D
                content.style.transform = `translate(${mouseX * 15}px, ${mouseY * 15}px)`;
            }
        });
    </script>

</body>

</html>
