<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portofolio - {{ $biodata->nama_lengkap ?? 'Nama Kamu' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <script>
      // --- KONFIGURASI TAILWIND ---
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ["Inter", "sans-serif"],
            },
            colors: {
              "brand-black": "#000000",
              "brand-navbar": "#0f0e0e",
              "brand-purple": "#7556ff",
            },
            animation: {
              fadeIn: "fadeIn 1s ease-out forwards",
              slideUp: "slideUp 0.8s ease-out forwards",
              // ... (animasi lainnya dari file asli kamu) ...
            },
            keyframes: {
              fadeIn: { "0%": { opacity: 0 }, "100%": { opacity: 1 } },
              slideUp: {
                "0%": { opacity: 0, transform: "translateY(20px)" },
                "100%": { opacity: 1, transform: "translateY(0)" },
              },
              // ... (keyframes lainnya dari file asli kamu) ...
            },
          },
        },
      };
    </script>

    <style>
      html { scroll-behavior: smooth; }
      body {
          background-color: #000000;
          color: #E5E7EB;
          font-family: 'Inter', 'sans-serif';
          overflow-x: hidden;
      }
      /* ... (Semua style custom scrollbar, etc. dari file aslimu) ... */
      .about-image-wrapper {
          position: relative;
          width: 100%;
          padding-bottom: 100%;
          overflow: hidden;
          border-radius: 0.75rem;
      }
      .about-image-wrapper img {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          object-fit: cover;
      }
    </style>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-brand-black">
    @yield('content')

    </body>
</html>
