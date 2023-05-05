-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 05 Bulan Mei 2023 pada 03.51
-- Versi server: 5.7.33
-- Versi PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layanan_aptika`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `published` varchar(10) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `isi`, `published`, `kategori`, `gambar`, `user_id`, `created_at`, `updated_at`, `uuid`) VALUES
(4, 'Ini adalah judul 1', 'ini-adalah-judul-1', '<p><img src=\"../../storage/photos/1/080b4dffeeea98952b99d2915da0b69c_XL.jpg\" alt=\"\" width=\"570\" height=\"330\"></p>', '1', 'stunting', 'ccc_AJX1K.jpg', 1, '2023-03-28 14:12:18', '2023-03-30 08:30:27', '50bbc62a-4479-4862-9f51-a4a17e7c7ea2'),
(5, 'PELATIHAN ESURAT', 'pelatihan-esurat', '<p><img src=\"../../storage/photos/1/080b4dffeeea98952b99d2915da0b69c_XL.jpg\" alt=\"\" width=\"570\" height=\"330\">dddd</p>', '1', 'kemiskinan', 'PELATIHAN_ESURAT_7NVPM.png', 1, '2023-03-30 08:30:52', '2023-04-12 07:50:49', 'e24a1b2a-b60d-4179-88a6-fd35c08216b4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftaraplikasi`
--

CREATE TABLE `daftaraplikasi` (
  `id` int(11) NOT NULL,
  `nama_aplikasi` varchar(255) NOT NULL,
  `tahun_pembuatan` varchar(4) NOT NULL,
  `link_app` varchar(255) NOT NULL,
  `opd` varchar(255) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_pendukung`
--

CREATE TABLE `file_pendukung` (
  `id` int(11) NOT NULL,
  `daftaraplikasi_id` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_aplikasi`
--

CREATE TABLE `jenis_aplikasi` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_aplikasi`
--

INSERT INTO `jenis_aplikasi` (`id`, `nama_jenis`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'Aplikasi Web', '2023-05-03 08:02:24', '2023-05-03 08:03:18', '47864bad-90b8-490c-8576-88f8f1c11e88'),
(2, 'Aplikasi Android', '2023-05-03 08:02:35', '2023-05-03 08:02:35', '516ca2b2-6a7e-421a-a38c-89f49de941ab'),
(4, 'Web Profil', '2023-05-03 08:04:42', '2023-05-03 08:04:42', '17a33539-902c-440c-97fa-c6727be80131');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi_web`
--

CREATE TABLE `konfigurasi_web` (
  `id` int(11) NOT NULL,
  `nama_aplikasi` varchar(100) DEFAULT NULL,
  `singkatan` varchar(100) DEFAULT NULL,
  `keterangan_aplikasi` varchar(100) DEFAULT NULL,
  `slogan` varchar(100) DEFAULT NULL,
  `logo_aplikasi` varchar(100) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `warna_template` varchar(100) DEFAULT NULL,
  `mode` varchar(30) DEFAULT NULL,
  `sidebar_color` varchar(30) DEFAULT NULL,
  `navbar_color` varchar(30) DEFAULT NULL,
  `brandlogo_color` varchar(30) DEFAULT NULL,
  `tahun_pembuatan` varchar(4) DEFAULT NULL,
  `versi` varchar(50) DEFAULT NULL,
  `logo_kecil` varchar(100) DEFAULT NULL,
  `gambar_sidebar` varchar(100) DEFAULT NULL,
  `meta_deskripsi` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi_web`
--

INSERT INTO `konfigurasi_web` (`id`, `nama_aplikasi`, `singkatan`, `keterangan_aplikasi`, `slogan`, `logo_aplikasi`, `favicon`, `warna_template`, `mode`, `sidebar_color`, `navbar_color`, `brandlogo_color`, `tahun_pembuatan`, `versi`, `logo_kecil`, `gambar_sidebar`, `meta_deskripsi`, `meta_keyword`, `youtube`, `instagram`, `facebook`, `email`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'Layanan TIK', NULL, NULL, NULL, '1672364263_YXJUU.png', '1681263199_3PZ86.png', NULL, 'dark', 'light', 'dark', NULL, '2022', NULL, '1672364437_ERGXX.png', '1641874770_M4YWQ.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-11 09:02:10', '2023-04-12 08:38:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_22_050548_create_permission_tables', 1),
(7, '2022_12_22_050637_create_products_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(6, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 2),
(7, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `opd`
--

CREATE TABLE `opd` (
  `id` int(11) NOT NULL,
  `nama_opd` varchar(100) NOT NULL,
  `singkatan` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `uuid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `opd`
--

INSERT INTO `opd` (`id`, `nama_opd`, `singkatan`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA', 'BPKPSDMD', NULL, NULL, NULL),
(2, 'BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 'BPKAD', NULL, NULL, NULL),
(3, 'BADAN PENGELOLA PAJAK DAN RETRIBUSI DAERAH', 'BPPRD', NULL, NULL, NULL),
(4, 'BADAN KESATUAN BANGSA DAN POLITIK', 'BKBP', NULL, NULL, NULL),
(5, 'DINAS PENDIDIKAN', 'DISDIK', NULL, NULL, NULL),
(6, 'DINAS KESEHATAN', 'DINKES', NULL, NULL, NULL),
(7, 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG', 'DPUPR', NULL, NULL, NULL),
(8, 'DINAS PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN', 'DPRKP', NULL, NULL, NULL),
(9, 'DINAS SOSIAL', 'DINSOS', NULL, NULL, NULL),
(10, 'DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA', 'DPPKB', NULL, NULL, NULL),
(11, 'DINAS PEMBERDAYAAN MASYARAKAT, PEREMPUAN DAN PERLINDUNGAN ANAK', 'DPMPPA', NULL, NULL, NULL),
(12, 'DINAS LINGKUNGAN HIDUP', 'DLH', NULL, NULL, NULL),
(13, 'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL', 'DKPS', NULL, NULL, NULL),
(14, 'DINAS PERHUBUNGAN', 'DISHUB', NULL, NULL, NULL),
(15, 'DINAS KOMUNIKASI DAN INFORMATIKA', 'DISKOMINFO', NULL, NULL, NULL),
(16, 'DINAS TENAGA KERJA, KOPERASI DAN USAHA KECIL MENENGAH', 'DTKK', NULL, NULL, NULL),
(17, 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU', 'DPMPTSP', NULL, NULL, NULL),
(18, 'DINAS PARIWISATA DAN KEBUDAYAAN', 'DKP', NULL, NULL, NULL),
(19, 'DINAS PERDAGANGAN DAN PERINDUSTRIAN', 'DPP', NULL, NULL, NULL),
(20, 'DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN', 'DISDAMKAR', NULL, NULL, NULL),
(21, 'DINAS PERTANIAN DAN KETAHANAN PANGAN', 'DPKP', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_pengaduan` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', 'role', '2022-12-22 05:31:02', '2022-12-27 18:18:39'),
(2, 'role-create', 'web', 'role', '2022-12-22 05:31:02', '2022-12-21 22:31:02'),
(3, 'role-edit', 'web', 'role', '2022-12-22 05:31:02', '2022-12-21 22:31:02'),
(4, 'role-delete', 'web', 'role', '2022-12-22 05:31:02', '2022-12-21 22:31:02'),
(9, 'permission-list', 'web', 'permission', '2022-12-27 14:42:09', '2022-12-26 17:00:00'),
(10, 'permission-create', 'web', 'permission', '2022-12-27 14:43:01', '2022-12-26 17:00:00'),
(11, 'permission-edit', 'web', 'permission', '2022-12-27 15:19:55', '2022-12-26 17:00:00'),
(12, 'permission-delete', 'web', 'permission', '2022-12-27 15:20:18', '2022-12-26 17:00:00'),
(13, 'user-list', 'web', 'user', '2022-12-27 08:10:12', '2022-12-27 01:10:12'),
(14, 'konfigurasiweb-list', 'web', 'konfigurasiweb', '2022-12-27 08:31:48', '2022-12-27 01:31:48'),
(15, 'dashboard-index', 'web', 'dashboard', '2022-12-27 09:09:41', '2022-12-27 02:09:41'),
(16, 'user-edit', 'web', NULL, '2023-01-04 03:11:16', '2023-01-03 20:11:16'),
(17, 'user-create', 'web', NULL, '2023-01-04 03:18:31', '2023-01-03 20:18:31'),
(18, 'user-delete', 'web', 'user', '2023-01-04 03:43:46', '2023-01-03 20:45:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan`
--

CREATE TABLE `permohonan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_permohonan` varchar(50) NOT NULL,
  `nama_aplikasi` varchar(200) NOT NULL,
  `jenis_aplikasi` varchar(100) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `nama_opd` varchar(100) NOT NULL,
  `file_surat` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `status` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permohonan`
--

INSERT INTO `permohonan` (`id`, `tanggal`, `jenis_permohonan`, `nama_aplikasi`, `jenis_aplikasi`, `opd_id`, `nama_opd`, `file_surat`, `deskripsi`, `status`, `user_id`, `created_at`, `updated_at`, `uuid`) VALUES
(1, '2023-05-03', 'pembuatan', 'Sibangman', 'Aplikasi Web', 2, 'BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', 'Sibangman_TZTR1.pdf', 'Aplikasi Program kegiatan', NULL, 1, '2023-05-03 09:48:46', '2023-05-04 08:25:47', '22d761da-fce1-4081-ae84-109ea0df75ef'),
(4, '2023-05-03', 'pembuatan', 'sss', 'Aplikasi Web', 1, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA', 'sss_36D3F.pdf', 'sss', NULL, 1, '2023-05-03 10:02:06', '2023-05-03 10:02:06', '9fb04ca8-84eb-42f9-885c-7f618eff79e9'),
(5, '2023-05-04', 'pembuatan', 'dddaaaa', 'Aplikasi Web', 1, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA', NULL, 'ddd', NULL, 1, '2023-05-04 09:40:16', '2023-05-04 09:41:12', '56a87c6a-96bf-4b59-8d25-c8d1b63979ec'),
(6, '2023-05-04', 'pembaharuan', 'aaaa', 'Aplikasi Web', 1, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA', NULL, 'sss', NULL, 1, '2023-05-04 09:42:30', '2023-05-04 09:52:03', '2f5ba54a-86ba-412a-b8f6-b8e6ceb6604c');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(6, 'superadmin', 'web', '2022-12-25 20:18:45', '2022-12-26 01:23:59'),
(7, 'admin', 'web', '2022-12-27 02:11:17', '2022-12-27 02:11:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(9, 6),
(10, 6),
(11, 6),
(12, 6),
(13, 6),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(13, 7),
(15, 7),
(16, 7),
(17, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `screenshoot_app`
--

CREATE TABLE `screenshoot_app` (
  `id` int(11) NOT NULL,
  `daftaraplikasi_id` int(11) NOT NULL,
  `nama_gambar` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opd_id` int(11) DEFAULT NULL,
  `uuid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `opd_id`, `uuid`, `username`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `is_active`, `photo`, `last_login_at`, `last_login_ip`, `created_at`, `updated_at`) VALUES
(1, 'Nanang Maulana Syarip', NULL, 'f9acc6ec-a304-4a70-adbc-e5a49982dae7', 'nanang', 'superadmin', 'nanang.ms22@gmail.com', NULL, '$2y$10$JcLj19OIGihAxcJLGPJPzu0YYN1t1GLtK6N5XKhzkow6ldZffAoiW', NULL, '1', 'Nanang_Maulana_Syarip_GG9U9.jpg', '2023-05-05 07:43:04', '127.0.0.1', '2022-12-25 20:18:45', '2023-05-05 00:43:04'),
(2, 'admin123', NULL, '2b29931d-9bc5-457f-b60d-c072ee36a6aa', 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$7ZYsIdbJslvAjPkzvPgmUO0UIYxkHFIzbFqX8nuLzxQbMPdCXQ7oi', NULL, '1', NULL, NULL, NULL, '2022-12-27 02:11:46', '2023-03-27 01:54:43'),
(3, 'Harukaa', NULL, 'd9c0f103-7e49-48ab-8a8b-53de719903be', 'haruka', 'admin', 'haruka@gmail.com', NULL, '$2y$10$yisnIHPJmPf1XqwdrzH1huDuBkxobU5NTodhBPj6dgalxxgQ/VjAm', NULL, '1', NULL, NULL, NULL, '2023-03-27 03:27:04', '2023-03-30 01:11:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftaraplikasi`
--
ALTER TABLE `daftaraplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `file_pendukung`
--
ALTER TABLE `file_pendukung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_aplikasi`
--
ALTER TABLE `jenis_aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfigurasi_web`
--
ALTER TABLE `konfigurasi_web`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `screenshoot_app`
--
ALTER TABLE `screenshoot_app`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `daftaraplikasi`
--
ALTER TABLE `daftaraplikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `file_pendukung`
--
ALTER TABLE `file_pendukung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_aplikasi`
--
ALTER TABLE `jenis_aplikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi_web`
--
ALTER TABLE `konfigurasi_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `opd`
--
ALTER TABLE `opd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `screenshoot_app`
--
ALTER TABLE `screenshoot_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
