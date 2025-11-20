-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2025 at 04:06 AM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portofolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL DEFAULT '[Nama Kamu]',
  `foto_profil` varchar(255) DEFAULT 'img/foto_profil.jpg',
  `foto_about` varchar(255) DEFAULT 'img/foto_about.jpg',
  `jabatan_singkat` varchar(100) DEFAULT 'Network & Electronics Enthusiast',
  `deskripsi_singkat_hero` text DEFAULT NULL,
  `tentang_saya_paragraf1` text DEFAULT NULL,
  `tentang_saya_paragraf2` text DEFAULT NULL,
  `email` varchar(100) DEFAULT '[email@kamu.com]',
  `telepon` varchar(20) DEFAULT '[+62 8xx-xxxx-xxxx]',
  `telepon_wa` varchar(25) DEFAULT NULL COMMENT 'Format 628xxxx',
  `alamat` varchar(200) DEFAULT '[Kota, Indonesia]',
  `link_cv` varchar(255) DEFAULT '#',
  `link_facebook` varchar(255) DEFAULT '#',
  `link_instagram` varchar(255) DEFAULT '#',
  `link_linkedin` varchar(255) DEFAULT '#',
  `link_github_profil` varchar(255) DEFAULT '#',
  `link_shop` varchar(255) DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nama_lengkap`, `foto_profil`, `foto_about`, `jabatan_singkat`, `deskripsi_singkat_hero`, `tentang_saya_paragraf1`, `tentang_saya_paragraf2`, `email`, `telepon`, `telepon_wa`, `alamat`, `link_cv`, `link_facebook`, `link_instagram`, `link_linkedin`, `link_github_profil`, `link_shop`) VALUES
(1, 'M. Alief Budiman', 'img/pp/1.jpg', 'img/pp/1.jpg', 'IT Infrastructure & Electronics Enthusiast', 'Saya suka pada dunia elektronika, perakitan modem, dan eksperimen hardware seperti Arduino serta perangkat embedded lainnya.', 'Saya adalah mahasiswa Teknik Informatika semester 5 yang lebih banyak berkutat di dunia elektronik dan oprek hardware. Selain mengerjakan proyek seperti perakitan modem, modding OpenWRT, servis perangkat elektronik, dan pembuatan alat berbasis microcontroller seperti Arduino maupun ESP32, saya juga menjalankan usaha sampingan sebagai penjual modem, stb sever, OpenWRT dan layanan servis elektronik di e-commerce. Ketertarikan saya memang lebih kuat ke arah engineering perangkat keras dibanding jaringan komputer skala besar.', 'Menurut saya, kemampuan memahami rangkaian elektronika dan perangkat fisik bisa memberi solusi yang jauh lebih nyata dan aplikatif. Saya terus mendalami embedded system, perakitan perangkat, serta integrasi hardware–software agar bisa membuat alat yang bener-bener berguna, stabil, dan bisa dipakai orang dalam kehidupan sehari-hari maupun kebutuhan teknis.', 'maliefbudiman288@gmail.com', '+62 857-2243-9267', '6285722439267', 'Sukabumi, Jawa Barat, Indonesia', 'public/cv_alief.pdf', '#', 'https://instagram.com/raliief', 'https://www.linkedin.com/in/m-alief-budiman-b8ab48293/', 'https://github.com/liefhax', 'https://bit.ly/m/LiefShop');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `id` int(11) NOT NULL,
  `biodata_id` int(11) NOT NULL,
  `judul_keahlian` varchar(100) NOT NULL,
  `subtitle_keahlian` varchar(100) DEFAULT NULL,
  `gambar_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id`, `biodata_id`, `judul_keahlian`, `subtitle_keahlian`, `gambar_url`) VALUES
(1, 1, 'Hardware & Networking', 'Modem', 'img/3.png'),
(2, 1, 'Web Development', 'Web', 'img/1.png'),
(3, 1, 'Custom Electronics', 'Service', 'img/2.png'),
(4, 1, 'Acrylic Design', 'Desain', 'img/4.png');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `biodata_id` int(11) NOT NULL,
  `nama_institusi` varchar(255) NOT NULL,
  `jenjang` varchar(100) DEFAULT NULL,
  `tahun_mulai` year(4) DEFAULT NULL,
  `tahun_selesai` year(4) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `biodata_id`, `nama_institusi`, `jenjang`, `tahun_mulai`, `tahun_selesai`, `deskripsi`) VALUES
(4, 1, 'Universitas Muhammadiyah Sukabumi', 'S1 - Teknik Informatika', '2023', NULL, 'Fokus pada mata kuliah Mikrokontroller dan Web Development.'),
(5, 1, 'SMAN 1 Jampang Kulon', 'Siswa - MIPA', '2020', '2023', 'Aktif di ekstrakurikuler English Student Club.'),
(6, 1, 'SMPN 1 Jampang Kulon', 'Siswa', '2017', '2020', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id` int(11) NOT NULL,
  `biodata_id` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `nama_perusahaan_atau_organisasi` varchar(255) NOT NULL,
  `tahun_mulai` year(4) DEFAULT NULL,
  `tahun_selesai` year(4) DEFAULT NULL,
  `deskripsi_singkat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `pengalaman`
--

INSERT INTO `pengalaman` (`id`, `biodata_id`, `jabatan`, `nama_perusahaan_atau_organisasi`, `tahun_mulai`, `tahun_selesai`, `deskripsi_singkat`) VALUES
(1, 1, 'Seller / Owner', 'Toko Modem Rakitan (Shopee)', '2023', NULL, 'Menjual modem rakitan dan perangkat home server. Chat pelanggan, pengiriman, serta analisis penjualan.'),
(2, 1, 'Teknisi HP & Laptop (Freelance)', 'Service Panggilan / Freelance', '2020', NULL, 'Menangani perbaikan software dan hardware ringan pada HP dan laptop. Termasuk instal ulang OS, perbaikan aplikasi, dan maintenance perangkat.'),
(3, 1, 'Perakit Perangkat Jaringan', 'Proyek Pribadi', '2022', NULL, 'Merakit modem dan router modifikasi, instalasi OpenWRT, troubleshooting jaringan, serta quality control perangkat sebelum dijual.');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id` int(11) NOT NULL,
  `biodata_id` int(11) NOT NULL,
  `judul_proyek` varchar(255) NOT NULL,
  `deskripsi_proyek` text NOT NULL,
  `gambar_url` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `link_github` varchar(255) DEFAULT NULL,
  `link_toko` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `biodata_id`, `judul_proyek`, `deskripsi_proyek`, `gambar_url`, `tags`, `link_github`, `link_toko`) VALUES
(1, 1, 'Blower Uap Arduino (Triac)', 'Sistem blower uap (solder station) menggunakan mikrokontroller Arduino Pro Mini dan untuk AC preheater dikontrol menggunakan TRIAC', 'img/proyek/proyek-blower.png', 'Arduino,Elektronika,Triac,DIY', 'https://github.com/liefhax/blower-uap-ardunio', NULL),
(2, 1, 'STB NAS Server (CasaOS)', 'Merubah STB Android menjadi Network Attached Storage, berbasis linux server dengan Web UI CasaOS.', 'img/proyek/proyek-nas.png', 'NAS,Linux,Docker,CasaOS', NULL, 'https://shopee.co.id/STB-NAS-SERVER-CASA-OS-%E2%80%93-Cloud-Storage-Pribadi-Tanpa-Batas-Tanpa-Langganan!-i.150521932.29425047902?extraParams=%7B%22display_model_id%22%3A166949214178%7D'),
(3, 1, 'Custom Modem OpenWRT', 'Modem rakitan berbasis Mesin HP yang dimodif menjadi modem tanpa layar', 'img/proyek/proyek-modem.png', 'OpenWRT,Networking,Firmware,Shopee', NULL, 'https://shopee.co.id/ALL-IN-ONE-STB-OPENWRT-CASING-i.150521932.28803164646?extraParams=%7B%22display_model_id%22%3A280174917887%7D'),
(4, 1, 'MoneySaving', 'Aplikasi untuk mengatur pendapatan/pengeluaran uang dibuat dengan react', 'img/proyek/proyek-moneysaving.jpg', 'Arduino,Elektronika,Triac,DIY', 'https://github.com/liefhax/MoneySaving', NULL),
(5, 1, 'Katalog Baju - Ecommerce', 'Website katalog baju mirip ecommerce. dengan menggunakan framework codeigniter 4.', 'img/proyek/proyek-katalog.png', 'NAS,Linux,Docker,CasaOS', 'https://github.com/liefhax/MoneySaving', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD CONSTRAINT `keahlian_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD CONSTRAINT `pengalaman_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
