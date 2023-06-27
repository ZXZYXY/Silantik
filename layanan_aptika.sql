-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 27 Jun 2023 pada 08.15
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
  `kategori_id` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `isi`, `published`, `kategori_id`, `gambar`, `user_id`, `created_at`, `updated_at`, `uuid`) VALUES
(4, 'Ini adalah judul 1', 'ini-adalah-judul-1', '<p><img src=\"../../storage/photos/1/080b4dffeeea98952b99d2915da0b69c_XL.jpg\" alt=\"\" width=\"570\" height=\"330\"></p>', '1', 3, 'ccc_AJX1K.jpg', 1, '2023-03-28 14:12:18', '2023-03-30 08:30:27', '50bbc62a-4479-4862-9f51-a4a17e7c7ea2'),
(5, 'PELATIHAN ESURAT', 'pelatihan-esurat', '<p><img src=\"../../storage/photos/1/080b4dffeeea98952b99d2915da0b69c_XL.jpg\" alt=\"\" width=\"570\" height=\"330\">dddd</p>', '1', 5, 'PELATIHAN_ESURAT_7NVPM.png', 1, '2023-03-30 08:30:52', '2023-06-05 09:34:31', 'e24a1b2a-b60d-4179-88a6-fd35c08216b4'),
(6, 'ss', 'ss', '<p>sss</p>', '1', 5, 'ss_Q34AN.png', 1, '2023-05-24 15:31:17', '2023-05-24 15:31:17', 'e85ae6a7-f438-497d-bd25-06b949ad7337');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftaraplikasi`
--

CREATE TABLE `daftaraplikasi` (
  `id` int(11) NOT NULL,
  `nama_aplikasi` varchar(255) NOT NULL,
  `tahun_pembuatan` varchar(4) NOT NULL,
  `link_app` varchar(255) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `sektor_id` int(11) DEFAULT NULL,
  `nama_opd` varchar(255) NOT NULL,
  `nama_konsultan` varchar(255) DEFAULT NULL,
  `jenis_aplikasi` varchar(100) NOT NULL,
  `deskripsi` text,
  `status_aktif` varchar(50) DEFAULT NULL,
  `integrasi` varchar(50) DEFAULT NULL,
  `app_integrasi` varchar(255) DEFAULT NULL,
  `ada_perwal` varchar(50) DEFAULT NULL,
  `file_perwal` varchar(200) DEFAULT NULL,
  `logo_aplikasi` varchar(150) DEFAULT NULL,
  `gambar_home` varchar(255) DEFAULT NULL,
  `portofolio` int(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftaraplikasi`
--

INSERT INTO `daftaraplikasi` (`id`, `nama_aplikasi`, `tahun_pembuatan`, `link_app`, `opd_id`, `sektor_id`, `nama_opd`, `nama_konsultan`, `jenis_aplikasi`, `deskripsi`, `status_aktif`, `integrasi`, `app_integrasi`, `ada_perwal`, `file_perwal`, `logo_aplikasi`, `gambar_home`, `portofolio`, `created_at`, `updated_at`, `uuid`) VALUES
(2, 'SIBANGMAN', '2022', 'https://sibangman.jambikota.go.id/', 22, 1, 'Badan Perencanaan Pembangunan Daerah', NULL, 'WEB', 'SIBANGMAN merupakan kepanjangan dari Sistem Pembangunan Manusia yang bertujuan untuk pemetaan Program/Kegiatan/Sub Kegiatan Perangkat Daerah', 'Aktif', 'Tidak', 'ddd', 'Tidak', NULL, 'SIBANGMAN_PERWAL_b3iw8.png', 'SIBANGMAN_SS-Home_SXo0g.png', 1, '2023-05-31 07:38:26', '2023-06-27 10:39:49', '05fb7baf-5fbb-4732-a0b9-604182f80411'),
(3, 'SIHARKO', '2021', 'https://siharko.jambikota.go.id/', 19, NULL, 'DINAS PERDAGANGAN DAN PERINDUSTRIAN', NULL, 'WEB', 'SIHARKO merupakan kepanjangan dari Sistem Informasi Harga Sembako', 'Aktif', 'Tidak', NULL, NULL, NULL, NULL, 'SIHARKO_SS-Home_8Ml66.png', 1, '2023-06-27 10:42:07', '2023-06-27 10:48:55', '022adca4-83a0-405a-a022-36185099d5a4');

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
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id`, `urutan`, `kategori`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 2, 'Umum', '123', '<p>123</p>', '2023-05-23 08:47:01', '2023-05-23 09:25:29', 'd4d491d9-7b4d-4a38-9e40-f3b948de4130');

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
-- Struktur dari tabel `foto_pengaduan`
--

CREATE TABLE `foto_pengaduan` (
  `id` int(11) NOT NULL,
  `pengaduan_id` int(11) NOT NULL,
  `nama_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto_pengaduan`
--

INSERT INTO `foto_pengaduan` (`id`, `pengaduan_id`, `nama_foto`) VALUES
(1, 3, 'ddd_Y9Z7w.png'),
(2, 3, 'ddd_JN8XA.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_permohonan`
--

CREATE TABLE `histori_permohonan` (
  `id` int(11) NOT NULL,
  `permohonan_id` int(11) NOT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan_status` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `histori_permohonan`
--

INSERT INTO `histori_permohonan` (`id`, `permohonan_id`, `petugas_id`, `status`, `keterangan_status`, `created_at`, `updated_at`) VALUES
(1, 5, 0, 'Permohonan Baru', NULL, '2023-06-13 10:12:34', '2023-06-13 10:12:34'),
(2, 5, 1, 'Permohonan Disetujui', 'disetujui', '2023-06-13 10:52:24', '2023-06-13 10:52:24'),
(3, 5, 1, 'Selesai', 'selesaii', '2023-06-13 11:25:40', '2023-06-13 11:25:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `created_at`, `updated_at`, `uuid`) VALUES
(2, 'Kepala Bidang', '2023-06-13 08:00:49', '2023-06-13 08:00:49', '7f6b1e8d-52cb-49e2-93b1-9025a74c1c72'),
(3, 'Programer', '2023-06-13 08:01:03', '2023-06-13 08:01:03', 'ef09b46d-398c-4d0d-b7cd-a4d3f5dfc99c'),
(4, 'Teknisi Jaringan', '2023-06-13 08:01:13', '2023-06-13 08:01:13', '926fb950-0286-4e0d-8643-73d15a2194ca'),
(5, 'Admin Server', '2023-06-13 08:01:28', '2023-06-13 08:01:28', 'c72a9313-e66e-4b1e-a057-39d387e13c98'),
(6, 'Pranata Komputer', '2023-06-13 11:06:36', '2023-06-13 11:06:36', '68c07d5a-9634-477c-ab34-947ff4407d7a'),
(7, 'Analis Sistem Informasi', '2023-06-13 11:07:01', '2023-06-13 11:07:01', 'b82a48ff-4a70-4917-a2f2-f798a5d91087'),
(8, 'Analis Data dan Sistem Informasi', '2023-06-13 11:07:12', '2023-06-13 11:07:12', '26c3c96a-7673-4317-9f41-bbaa748bcb81'),
(9, 'Pengendali Jaringan Komunikasi', '2023-06-13 11:07:25', '2023-06-13 11:07:25', '5422203e-6b97-491d-92b7-79e7c0677780');

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
(1, 'WEB', '2023-05-03 08:02:24', '2023-05-29 09:38:21', '47864bad-90b8-490c-8576-88f8f1c11e88'),
(2, 'ANDROID', '2023-05-03 08:02:35', '2023-05-29 09:38:28', '516ca2b2-6a7e-421a-a38c-89f49de941ab'),
(7, 'IOS', '2023-05-26 09:15:37', '2023-05-29 09:38:44', '93291e30-e193-4890-9bb0-736a164ac4cd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `kategori_seo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `kategori_seo`, `created_at`, `updated_at`, `uuid`) VALUES
(3, 'Berita', 'berita', '2021-03-15 10:15:15', '2022-09-27 08:11:01', 'd1568714-00dc-45f4-951b-315eb15b46ca'),
(5, 'Kegiatan', 'kegiatan', '2021-11-17 11:02:47', '2021-11-17 11:02:47', 'b05cc41e-c709-443c-ac23-686c97c34c01');

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
(7, 'App\\Models\\User', 3),
(8, 'App\\Models\\User', 4),
(8, 'App\\Models\\User', 6);

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
(21, 'DINAS PERTANIAN DAN KETAHANAN PANGAN', 'DPKP', NULL, NULL, NULL),
(22, 'Badan Perencanaan Pembangunan Daerah', 'BAPPEDA', '2023-06-27 10:32:59', '2023-06-27 10:32:59', '3b8444a0-0c54-43fa-806a-a104436d52bc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nanang.ms22@gmail.com', '$2y$10$QfeTuuFhYqiFH6D9Fe.ll./wPUzQYLPvRVm2fEoOM3asz74fu4ZAa', '2023-06-13 20:32:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `kd_pengaduan` varchar(10) NOT NULL,
  `pelapor_id` int(11) NOT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `opd_id` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jenis_pengaduan` varchar(100) NOT NULL,
  `nama_aplikasi` varchar(100) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `tanggapan` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `kd_pengaduan`, `pelapor_id`, `petugas_id`, `opd_id`, `tanggal`, `jenis_pengaduan`, `nama_aplikasi`, `judul`, `isi`, `status`, `tanggapan`, `created_at`, `updated_at`, `uuid`) VALUES
(1, '1683768301', 1, NULL, 15, '2023-05-11', 'aplikasi', NULL, 'aaa', 'aaaaaaa', NULL, NULL, '2023-05-11 01:25:01', '2023-05-11 01:25:01', 'd09aea74-fcf1-4141-a8d5-30fbd9ee69e7'),
(3, '1687319052', 1, NULL, NULL, '2023-06-21', 'aplikasi', 'SIBANGMAN', 'ddd', 'ddd', NULL, NULL, '2023-06-21 03:44:12', '2023-06-21 03:44:12', 'bc0f88b0-346b-4408-b0d6-f3c184028e9c');

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
(18, 'user-delete', 'web', 'user', '2023-01-04 03:43:46', '2023-01-03 20:45:56'),
(19, 'berita-list', 'web', NULL, '2023-05-15 00:51:55', '2023-05-14 17:51:55'),
(20, 'berita-create', 'web', NULL, '2023-05-15 00:53:45', '2023-05-14 17:53:45'),
(21, 'berita-edit', 'web', NULL, '2023-05-15 00:54:03', '2023-05-14 17:54:03'),
(22, 'berita-delete', 'web', NULL, '2023-05-15 00:54:19', '2023-05-14 17:54:19'),
(23, 'daftaraplikasi-list', 'web', NULL, '2023-05-15 00:56:32', '2023-05-14 17:56:32'),
(24, 'daftaraplikasi-create', 'web', NULL, '2023-05-15 00:56:47', '2023-05-14 17:56:47'),
(25, 'daftaraplikasi-edit', 'web', NULL, '2023-05-15 00:57:02', '2023-05-14 17:57:02'),
(26, 'daftaraplikasi-delete', 'web', NULL, '2023-05-15 00:57:19', '2023-05-14 17:57:19'),
(27, 'permohonan-list', 'web', NULL, '2023-05-15 00:57:55', '2023-05-14 17:57:55'),
(28, 'permohonan-create', 'web', NULL, '2023-05-15 00:58:08', '2023-05-14 17:58:08'),
(29, 'permohonan-edit', 'web', NULL, '2023-05-15 00:58:22', '2023-05-14 17:58:22'),
(30, 'permohonan-delete', 'web', NULL, '2023-05-15 00:58:36', '2023-05-14 17:58:36'),
(31, 'pengaduan-list', 'web', NULL, '2023-05-15 00:59:05', '2023-05-14 17:59:05'),
(32, 'pengaduan-create', 'web', NULL, '2023-05-15 00:59:22', '2023-05-14 17:59:22'),
(33, 'pengaduan-edit', 'web', NULL, '2023-05-15 00:59:40', '2023-05-14 17:59:40'),
(34, 'pengaduan-delete', 'web', NULL, '2023-05-15 00:59:52', '2023-05-14 17:59:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan`
--

CREATE TABLE `permohonan` (
  `id` int(11) NOT NULL,
  `kd_permohonan` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_permohonan` varchar(50) NOT NULL,
  `nama_aplikasi` varchar(200) NOT NULL,
  `jenis_aplikasi` varchar(100) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `nama_opd` varchar(100) NOT NULL,
  `file_surat` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `status` varchar(50) DEFAULT NULL,
  `pemohon_id` int(11) NOT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `keterangan_status` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permohonan`
--

INSERT INTO `permohonan` (`id`, `kd_permohonan`, `tanggal`, `jenis_permohonan`, `nama_aplikasi`, `jenis_aplikasi`, `opd_id`, `nama_opd`, `file_surat`, `deskripsi`, `status`, `pemohon_id`, `petugas_id`, `keterangan_status`, `created_at`, `updated_at`, `uuid`) VALUES
(1, '1683689147', '2023-05-10', 'pembuatan', 'SIBANGMAN', 'Aplikasi Web', 15, 'DINAS KOMUNIKASI DAN INFORMATIKA', NULL, 'Aplikasi tentang Program OPD di kota Jambi', NULL, 1, NULL, NULL, '2023-05-10 10:25:47', '2023-05-15 08:27:40', 'b4991a2a-eb9a-46d6-84d6-399dd227f5a0'),
(2, '1683689356', '2023-05-10', 'pembaruan', 'SIAPTENDIK', 'Aplikasi Web', 5, 'DINAS PENDIDIKAN', NULL, 'Pembuatan Fitur Absensi', 'Permohonan Baru', 1, NULL, NULL, '2023-05-10 10:29:16', '2023-05-11 08:17:17', '382ded31-ac35-4515-9a1f-3df85d672518'),
(5, '1686625954', '2023-06-13', 'pembuatan', 'ddd', 'WEB', 1, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA', NULL, 'dd', 'Selesai', 1, 1, 'selesaii', '2023-06-13 10:12:34', '2023-06-13 11:25:40', '829a89d2-3260-40c3-bc0f-9ae8765c5475');

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
(7, 'admin', 'web', '2022-12-27 02:11:17', '2022-12-27 02:11:17'),
(8, 'user', 'web', '2023-05-14 17:49:56', '2023-05-14 17:49:56');

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
(17, 7),
(19, 7),
(20, 7),
(21, 7),
(22, 7),
(23, 7),
(24, 7),
(25, 7),
(26, 7),
(27, 7),
(28, 7),
(29, 7),
(30, 7),
(31, 7),
(32, 7),
(33, 7),
(34, 7),
(15, 8),
(27, 8),
(28, 8),
(29, 8),
(30, 8),
(31, 8),
(32, 8),
(33, 8),
(34, 8);

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
-- Struktur dari tabel `sektor`
--

CREATE TABLE `sektor` (
  `id` int(11) NOT NULL,
  `nama_sektor` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sektor`
--

INSERT INTO `sektor` (`id`, `nama_sektor`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 'Pendidikan', '2023-05-30 07:51:03', '2023-05-30 07:51:03', 'bcca4ef0-9daf-4f5a-938c-92b606bf9b9f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_permohonan`
--

CREATE TABLE `status_permohonan` (
  `id` int(11) NOT NULL,
  `nama_status` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_permohonan`
--

INSERT INTO `status_permohonan` (`id`, `nama_status`, `created_at`, `updated_at`, `uuid`) VALUES
(2, 'Permohonan Disetujui', '2023-06-13 09:32:36', '2023-06-13 09:44:03', 'a7fa1d2d-2882-48d8-8f40-12cdad8b5cf6'),
(3, 'Permohonan Ditolak', '2023-06-13 09:44:16', '2023-06-13 09:44:16', '51be91e3-c56a-42ce-a000-62febb4b2e26'),
(4, 'Dalam Proses Pembuatan', '2023-06-13 09:44:29', '2023-06-13 09:44:29', '73b10918-7511-49aa-a848-b09583500a09'),
(5, 'Selesai', '2023-06-13 09:44:39', '2023-06-13 09:44:39', 'e65d8907-0a29-4350-8e0d-8dee6ad3ace9'),
(6, 'Ditunda', '2023-06-13 09:44:45', '2023-06-13 09:44:45', '2080f5fb-4bd2-4bdc-9871-88ab127e70f2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teams`
--

INSERT INTO `teams` (`id`, `nama`, `jabatan_id`, `jabatan`, `foto`, `created_at`, `updated_at`, `uuid`) VALUES
(3, 'Nurdin', 4, 'Teknisi Jaringan', 'Nurdin_jUUoV.png', '2023-06-13 08:25:18', '2023-06-13 08:31:55', 'cd3f9d61-d86c-4ef1-aea6-c8ac1cd0a2d8');

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
(1, 'Nanang Maulana Syarip', NULL, 'f9acc6ec-a304-4a70-adbc-e5a49982dae7', 'nanang', 'superadmin', 'nanang.ms22@gmail.com', NULL, '$2y$10$JcLj19OIGihAxcJLGPJPzu0YYN1t1GLtK6N5XKhzkow6ldZffAoiW', NULL, '1', 'Nanang_Maulana_Syarip_GG9U9.jpg', '2023-06-27 10:06:57', '127.0.0.1', '2022-12-25 20:18:45', '2023-06-27 03:06:57'),
(2, 'admin123', NULL, '2b29931d-9bc5-457f-b60d-c072ee36a6aa', 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$7ZYsIdbJslvAjPkzvPgmUO0UIYxkHFIzbFqX8nuLzxQbMPdCXQ7oi', NULL, '1', NULL, NULL, NULL, '2022-12-27 02:11:46', '2023-05-24 08:09:22'),
(3, 'Harukaa', NULL, 'd9c0f103-7e49-48ab-8a8b-53de719903be', 'haruka', 'admin', 'haruka@gmail.com', NULL, '$2y$10$yisnIHPJmPf1XqwdrzH1huDuBkxobU5NTodhBPj6dgalxxgQ/VjAm', NULL, '1', NULL, NULL, NULL, '2023-03-27 03:27:04', '2023-03-30 01:11:29'),
(4, 'user', 15, '8f4aad7b-fbc3-4787-9f34-b39f2078d4cb', 'user', 'user', 'user@gmail.com', NULL, '$2y$10$J2mmlE6KfT4UZDmVslUN/.GYtaxt0PNmL4nyzyc47Ut3Rv1VisdBm', NULL, '1', NULL, '2023-06-13 09:57:09', '127.0.0.1', '2023-05-15 01:14:40', '2023-06-13 02:57:09'),
(6, 'Ahmad Zuhdi', 12, '94df5e27-d2ac-418b-8aa1-9a1507cfecc2', 'ahmad', 'user', 'ahmad@gmail.com', NULL, '$2y$10$9lEixArr9DSNBlE5PB51U.tpteC/qNTKtw3kc0zX22duBYGnZXYIK', NULL, '1', NULL, '2023-05-22 11:27:10', '127.0.0.1', '2023-05-22 04:26:36', '2023-05-22 04:27:10');

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
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `file_pendukung`
--
ALTER TABLE `file_pendukung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto_pengaduan`
--
ALTER TABLE `foto_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `histori_permohonan`
--
ALTER TABLE `histori_permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_aplikasi`
--
ALTER TABLE `jenis_aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_pengaduan` (`kd_pengaduan`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_permohonan` (`kd_permohonan`);

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
-- Indeks untuk tabel `sektor`
--
ALTER TABLE `sektor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_permohonan`
--
ALTER TABLE `status_permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teams`
--
ALTER TABLE `teams`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `daftaraplikasi`
--
ALTER TABLE `daftaraplikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `file_pendukung`
--
ALTER TABLE `file_pendukung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `foto_pengaduan`
--
ALTER TABLE `foto_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `histori_permohonan`
--
ALTER TABLE `histori_permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenis_aplikasi`
--
ALTER TABLE `jenis_aplikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `screenshoot_app`
--
ALTER TABLE `screenshoot_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sektor`
--
ALTER TABLE `sektor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `status_permohonan`
--
ALTER TABLE `status_permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
