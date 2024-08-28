-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Agu 2024 pada 06.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `isi`, `published`, `kategori_id`, `gambar`, `user_id`, `created_at`, `updated_at`, `uuid`) VALUES
(5, 'PELATIHAN ESURAT', 'pelatihan-esurat', '<p>Pelatihan ini dirancang untuk meningkatkan pemahaman dan keterampilan dalam penggunaan sistem eSurat, yang merupakan solusi penting untuk efisiensi pengelolaan surat menyurat secara elektronik. Adapun agenda pelatihan mencakup:</p>\r\n<ol>\r\n<li>\r\n<p><strong>Pengenalan Sistem eSurat:</strong> Peserta akan mempelajari dasar-dasar sistem eSurat, termasuk fungsi dan manfaatnya dalam pengelolaan administrasi surat elektronik.</p>\r\n</li>\r\n<li>\r\n<p><strong>Praktik Penggunaan:</strong> Melalui sesi praktik langsung, peserta akan diajarkan cara mengakses, membuat, mengelola, dan mengarsipkan surat elektronik menggunakan sistem eSurat.</p>\r\n</li>\r\n<li>\r\n<p><strong>Manajemen dan Keamanan Data:</strong> Sesi ini akan membahas tentang pengelolaan data surat elektronik serta langkah-langkah untuk menjaga keamanan informasi dan privasi.</p>\r\n</li>\r\n<li>\r\n<p><strong>Tanya Jawab dan Diskusi:</strong> Peserta akan memiliki kesempatan untuk bertanya langsung kepada para ahli dan berdiskusi mengenai tantangan serta solusi dalam implementasi eSurat di masing-masing OPD.</p>\r\n</li>\r\n</ol>\r\n<p>Pelatihan ini bertujuan untuk memastikan bahwa seluruh staf OPD dapat memanfaatkan sistem eSurat secara efektif, meningkatkan produktivitas dan mengurangi penggunaan dokumen fisik. Kami berharap pelatihan ini akan membantu dalam memperlancar proses administrasi dan mempercepat pengolahan surat menyurat di lingkungan pemerintahan.</p>\r\n<p>Untuk mendaftar atau mendapatkan informasi lebih lanjut mengenai pelatihan ini, silakan menghubungi panitia melalui email <a rel=\"noopener\">pelatihan@kotajambi.go.id</a> atau telepon di (0741) 7654321. Pendaftaran ditutup pada 15 September 2024.</p>\r\n<p>Kami menantikan kehadiran Anda untuk bersama-sama memajukan pengelolaan surat elektronik di Kota Jambi!</p>', '1', 5, 'PELATIHAN_ESURAT_7NVPM.png', 1, '2023-03-30 08:30:52', '2024-08-28 09:39:55', 'e24a1b2a-b60d-4179-88a6-fd35c08216b4'),
(9, 'Pemindahan Server', 'pemindahan-server-2', '<p>Dalam upaya untuk meningkatkan kualitas layanan dan kapasitas infrastruktur, perusahaan kami saat ini sedang melakukan proses pemindahan server. Proses ini merupakan langkah penting untuk memastikan bahwa kami dapat terus memberikan layanan yang handal dan cepat bagi semua pengguna kami di masa mendatang. Namun, karena kompleksitas dari pekerjaan ini, pemindahan server diperkirakan akan memakan waktu beberapa hari.</p>\r\n<p>Proses pemindahan server ini melibatkan berbagai tahapan teknis yang rumit, termasuk pemindahan data, konfigurasi ulang sistem, dan pengujian untuk memastikan semua fungsi berjalan dengan baik. Oleh karena itu, meskipun tim teknis kami bekerja keras untuk menyelesaikan pemindahan ini secepat mungkin, hingga saat ini kami belum dapat memastikan kapan proses ini akan selesai. Kami memahami bahwa ketidakpastian ini dapat menyebabkan ketidaknyamanan bagi para pengguna, dan kami meminta maaf atas hal tersebut.</p>\r\n<p>Selama proses pemindahan berlangsung, beberapa layanan mungkin akan mengalami gangguan atau penurunan performa. Kami telah mengupayakan berbagai langkah mitigasi untuk meminimalkan dampak tersebut, namun beberapa pengguna mungkin tetap merasakan dampaknya. Kami menghargai kesabaran dan pengertian dari para pengguna selama masa ini.</p>\r\n<p>Kami berkomitmen untuk memberikan pembaruan secara berkala terkait perkembangan proses pemindahan ini. Para pengguna dapat memantau informasi terbaru melalui saluran komunikasi resmi kami, termasuk situs web dan media sosial. Setiap perkembangan penting akan segera kami sampaikan agar pengguna dapat merencanakan aktivitas mereka dengan lebih baik.</p>\r\n<p>Sekali lagi, kami meminta maaf atas ketidaknyamanan yang ditimbulkan oleh pemindahan server ini. Kami berterima kasih atas pengertian dan dukungan dari semua pengguna selama proses ini berlangsung. Kami yakin bahwa setelah proses ini selesai, pengguna akan dapat menikmati layanan yang lebih baik dan lebih handal.</p>', '1', 3, 'Pemindahan_Server_E0w2H.png', 1, '2024-08-28 09:28:44', '2024-08-28 09:29:28', '4a045626-d876-4c4b-92a1-e717a9313b36'),
(10, 'Peningkatan Kapasitas dan Inovasi bagi OPD', 'peningkatan-kapasitas-dan-inovasi-bagi-opd', '<p>Kami dengan hormat mengundang seluruh Organisasi Perangkat Daerah (OPD) Kota Jambi untuk berpartisipasi dalam seminar bertajuk \"Peningkatan Kapasitas dan Inovasi dalam Pelayanan Publik\" yang akan dilaksanakan pada:</p>\r\n<p><strong>Tanggal:</strong> 15 September 2024<br><strong>Waktu:</strong> 09:00 - 16:00 WIB<br><strong>Tempat:</strong> Zoom Meeting</p>\r\n<p>Seminar ini bertujuan untuk membekali peserta dengan pengetahuan dan keterampilan terbaru dalam mengelola dan meningkatkan kualitas pelayanan publik. Dalam acara ini, para peserta akan mendapatkan kesempatan untuk:</p>\r\n<ol>\r\n<li>\r\n<p><strong>Mendengarkan Presentasi dari Ahli:</strong> Kami akan menghadirkan sejumlah narasumber berpengalaman di bidang manajemen pelayanan publik dan inovasi teknologi yang akan membagikan wawasan dan strategi terkini.</p>\r\n</li>\r\n<li>\r\n<p><strong>Diskusi Panel:</strong> Sesi diskusi panel akan membahas tantangan dan peluang dalam implementasi kebijakan publik serta bagaimana cara menghadapi perubahan dengan efektif.</p>\r\n</li>\r\n<li>\r\n<p><strong>Workshop Interaktif:</strong> Peserta akan terlibat dalam workshop praktis yang dirancang untuk memperdalam pemahaman dan keterampilan dalam penerapan metode baru dalam pelayanan publik.</p>\r\n</li>\r\n<li>\r\n<p><strong>Networking:</strong> Seminar ini juga menyediakan kesempatan untuk bertemu dan berdialog dengan rekan-rekan dari OPD lain serta berbagai stakeholder terkait, yang dapat membuka peluang kerjasama dan pertukaran pengalaman.</p>\r\n</li>\r\n</ol>\r\n<p>Kami berharap kegiatan ini akan memberikan manfaat besar bagi semua OPD di Kota Jambi, serta membantu dalam upaya peningkatan kualitas pelayanan publik yang lebih efisien dan inovatif. Kehadiran dan partisipasi aktif dari setiap OPD sangat kami harapkan untuk suksesnya acara ini.</p>\r\n<p>Untuk mendaftar atau mendapatkan informasi lebih lanjut, silakan menghubungi panitia melalui email <a rel=\"noopener\">seminar@kotajambi.go.id</a> atau telepon di (0741) 1234567. Pendaftaran dibuka hingga 10 September 2024.</p>\r\n<p>Mari bersama-sama kita tingkatkan kualitas pelayanan publik untuk kemajuan Kota Jambi!</p>', '1', 5, 'Peningkatan_Kapasitas_dan_Inovasi_bagi_OPD_7Sn9r.png', 1, '2024-08-28 09:36:42', '2024-08-28 09:44:54', 'f87f13d5-0521-405b-88f5-aeb5a83cb6ad'),
(11, 'Proses Pemindahan Server Telah Selesai', 'proses-pemindahan-server-telah-selesai', '<p>Kami dengan gembira mengumumkan bahwa proses pemindahan server yang telah kami lakukan beberapa hari terakhir ini telah berhasil diselesaikan. Seluruh sistem telah dikonfigurasi ulang dan diuji secara menyeluruh, memastikan bahwa semua layanan kini kembali beroperasi dengan normal. Proses ini merupakan bagian dari upaya kami untuk meningkatkan kualitas dan kapasitas infrastruktur, demi memberikan pengalaman terbaik bagi para pengguna.</p>\r\n<p>Pemindahan server ini telah melibatkan berbagai tahapan teknis yang cukup kompleks, mulai dari pemindahan data dalam jumlah besar, penyesuaian konfigurasi, hingga serangkaian pengujian untuk memastikan bahwa semua fitur berfungsi dengan optimal. Kami senang dapat melaporkan bahwa seluruh proses tersebut telah berhasil diselesaikan sesuai dengan harapan kami.</p>\r\n<p>Kami menyadari bahwa selama proses pemindahan berlangsung, beberapa pengguna mungkin telah mengalami gangguan atau penurunan kualitas layanan. Untuk itu, kami ingin menyampaikan apresiasi yang sebesar-besarnya atas kesabaran dan pengertian yang telah diberikan oleh para pengguna. Kami juga berterima kasih atas dukungan dan kepercayaan yang terus Anda berikan kepada kami.</p>\r\n<p>Dengan selesainya pemindahan server ini, kami berkomitmen untuk terus memberikan layanan yang lebih baik dan handal di masa mendatang. Peningkatan kapasitas server ini memungkinkan kami untuk menangani lebih banyak permintaan pengguna serta mengimplementasikan fitur-fitur baru yang akan meningkatkan kenyamanan dan pengalaman penggunaan layanan kami.</p>\r\n<p>Kami mengundang para pengguna untuk kembali menggunakan layanan kami dan menikmati peningkatan yang telah kami lakukan. Jika Anda mengalami masalah atau memiliki pertanyaan terkait dengan layanan, jangan ragu untuk menghubungi tim dukungan pelanggan kami. Kami siap membantu Anda dengan segala kebutuhan.</p>', '1', 3, 'Proses_Pemindahan_Server_Telah_Selesai_E5UZh.png', 1, '2024-08-28 09:41:06', '2024-08-28 09:41:06', '236ae3cc-568c-463c-9627-9cc302aa6fb8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftaraplikasi`
--

CREATE TABLE `daftaraplikasi` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `nama_aplikasi` varchar(255) NOT NULL,
  `tahun_pembuatan` varchar(4) NOT NULL,
  `link_app` varchar(255) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `sektor_id` int(11) DEFAULT NULL,
  `nama_opd` varchar(255) NOT NULL,
  `nama_konsultan` varchar(255) DEFAULT NULL,
  `jenis_aplikasi` varchar(100) NOT NULL,
  `jenis_layanan` varchar(20) NOT NULL,
  `deskripsi` text DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `daftaraplikasi`
--

INSERT INTO `daftaraplikasi` (`id`, `team_id`, `nama_aplikasi`, `tahun_pembuatan`, `link_app`, `opd_id`, `sektor_id`, `nama_opd`, `nama_konsultan`, `jenis_aplikasi`, `jenis_layanan`, `deskripsi`, `status_aktif`, `integrasi`, `app_integrasi`, `ada_perwal`, `file_perwal`, `logo_aplikasi`, `gambar_home`, `portofolio`, `created_at`, `updated_at`, `uuid`) VALUES
(2, 6, 'SIBANGMAN', '2022', 'https://sibangman.jambikota.go.id/', 22, 1, 'Badan Perencanaan Pembangunan Daerah', NULL, 'WEB', '', 'SIBANGMAN merupakan kepanjangan dari Sistem Pembangunan Manusia yang bertujuan untuk pemetaan Program/Kegiatan/Sub Kegiatan Perangkat Daerah', 'Aktif', 'Tidak', 'ddd', 'Tidak', NULL, 'SIBANGMAN_PERWAL_b3iw8.png', 'SIBANGMAN_SS-Home_SXo0g.png', 1, '2023-05-31 07:38:26', '2023-06-27 10:39:49', '05fb7baf-5fbb-4732-a0b9-604182f80411'),
(3, 4, 'SIHARKO', '2021', 'https://siharko.jambikota.go.id/', 19, NULL, 'DINAS PERDAGANGAN DAN PERINDUSTRIAN', NULL, 'WEB', '', 'SIHARKO merupakan kepanjangan dari Sistem Informasi Harga Sembako', 'Aktif', 'Tidak', NULL, NULL, NULL, NULL, 'SIHARKO_SS-Home_8Ml66.png', 1, '2023-06-27 10:42:07', '2023-07-25 08:24:40', '022adca4-83a0-405a-a022-36185099d5a4'),
(4, 4, 'SIAPTENDIK', '2020', 'https://siharko.jambikota.go.id/', 1, NULL, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA', 'adad', 'WEB', 'Internal', 'sada', 'Aktif', 'Ya', 'sada', 'Ya', 'SIAPTENDIK_PERWAL_HEcYZ.pdf', 'SIAPTENDIK_PERWAL_I9pzI.png', 'SIAPTENDIK_SS-Home_Ax7VR.jpg', NULL, '2023-07-25 08:20:54', '2023-08-10 10:55:24', 'def29596-6c33-4787-ba07-492f10720643'),
(5, 8, 'SI REKIPNAKES', '2023', 'https://sirekipnakes.jambikota.go.id/', 6, NULL, 'DINAS KESEHATAN', NULL, 'WEB,ANDROID', 'Internal', NULL, 'Aktif', 'Tidak', NULL, NULL, NULL, NULL, NULL, 1, '2024-08-28 09:11:45', '2024-08-28 09:11:45', '875f4289-f827-4633-b833-ebaf705f69e6'),
(6, 8, 'SIPEKAD', '2023', 'https://sipekad.jambikota.go.id/', 2, NULL, 'BADAN PENGELOLA KEUANGAN DAN ASET DAERAH', NULL, 'WEB', 'Internal', NULL, 'Aktif', 'Tidak', NULL, NULL, NULL, NULL, NULL, 1, '2024-08-28 09:12:54', '2024-08-28 09:12:54', 'ae167c5c-656c-4026-a6eb-a849dca0e54b'),
(7, 8, 'Aplikasi SiBanjir Kota Jambi', '2023', 'https://play.google.com/store/apps/details?id=jambikota.go.id.sibanjir&hl=id-ID', 7, NULL, 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG', NULL, 'ANDROID', 'Internal', NULL, 'Aktif', 'Tidak', NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-28 09:14:18', '2024-08-28 09:14:18', 'c38e204c-a2e5-487b-a84d-1977ad5aacdb'),
(8, 8, 'SIKAP MANIS', '2023', 'https://sikapmanis.jambikota.go.id/', 21, NULL, 'DINAS PERTANIAN DAN KETAHANAN PANGAN', NULL, 'WEB', 'Internal', NULL, 'Tidak Aktif', 'Tidak', NULL, NULL, NULL, NULL, NULL, 1, '2024-08-28 09:16:02', '2024-08-28 09:16:02', 'c2bf0904-a353-443c-bb5c-e79cece265ba'),
(9, 9, 'KOTA JAMBI SATU, Satu Data Satu Peta Kota Jambi', '2023', 'https://kotajambisatu.jambikota.go.id/', 15, NULL, 'DINAS KOMUNIKASI DAN INFORMATIKA', NULL, 'WEB', 'Internal', NULL, 'Aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-28 09:17:19', '2024-08-28 09:17:19', '13f4712f-abf5-43e3-a7f1-e042bf936cea'),
(10, 8, 'Sistem Cuti Pegawai DPMPPA', '2023', 'https://bit.ly/simcupdpmppa', 11, NULL, 'DINAS PEMBERDAYAAN MASYARAKAT, PEREMPUAN DAN PERLINDUNGAN ANAK', NULL, 'WEB', 'Internal', NULL, 'Aktif', 'Tidak', NULL, NULL, NULL, NULL, NULL, 1, '2024-08-28 09:18:09', '2024-08-28 09:18:09', '9cddb0ea-d631-4e30-9455-50f601919490'),
(11, 8, 'Sistem Cuti Pegawai DPPKB', '2023', 'https://bit.ly/simcupdppkb', 10, NULL, 'DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA', NULL, 'WEB', 'Internal', NULL, 'Aktif', 'Tidak', NULL, NULL, NULL, NULL, NULL, 1, '2024-08-28 09:18:55', '2024-08-28 09:18:55', '6403f454-76f7-4c8c-a2e3-1ef7d413f937');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
  `publish` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id`, `urutan`, `kategori`, `pertanyaan`, `jawaban`, `publish`, `created_at`, `updated_at`, `uuid`) VALUES
(3, 1, 'Umum', 'Apa tujuan dari website ini?', 'Website ini dirancang untuk menyediakan solusi Teknologi Informasi bagi OPD di Kota Jambi, termasuk layanan pembuatan aplikasi, pembaruan aplikasi, dan permintaan subdomain.', 1, '2024-08-28 08:44:43', '2024-08-28 08:46:39', 'c9f319d8-4481-471b-b80f-14cf8c447243'),
(4, 2, 'Umum', 'Siapa yang bisa menggunakan website ini?', 'Website ini terutama ditujukan untuk OPD di Kota Jambi. Pengguna harus memiliki Nomor Induk Pegawai (NIP) untuk mengakses fitur-fitur tertentu.', 1, '2024-08-28 08:45:18', '2024-08-28 08:45:18', '1b89aca3-6234-499b-973c-e2521e510531'),
(5, 3, 'Umum', 'Bagaimana cara saya mengajukan pengaduan jika terjadi permasalahan pada aplikasi atau jaringan di OPD saya?', 'Untuk mengajukan pengaduan, Anda bisa menuju ke bagian yang beranda di website dan scroll ke bagian pengaduan lalu klik tombol buat pengaduan,dan mengisi formulir yang disediakan, dan mengirimkannya untuk diproses.', 1, '2024-08-28 08:47:09', '2024-08-28 08:47:09', '91f54750-2454-4b00-82c0-056b3e309502'),
(6, 4, 'Umum', 'Layanan apa saja yang ditawarkan melalui website ini?', 'Kami menawarkan berbagai layanan seperti pembuatan aplikasi, pembaruan aplikasi, dan permintaan subdomain di bawah jambikota.go.id.', 1, '2024-08-28 08:48:06', '2024-08-28 08:48:06', '5969dd70-9675-433b-bcef-ff970b2d1bd6'),
(7, 5, 'Umum', 'Bagaimana cara melacak status permohonan saya?', 'Anda dapat melacak status permohonan dengan masuk ke halaman cek permohonan yang berada pada bagian layanan, lalu masukkan koce permohonan yang sudah diberikan pada proses permohonan aplikasi selesai dilakukan.', 1, '2024-08-28 08:49:58', '2024-08-28 08:49:58', '7d80206c-807d-45b7-8ad1-4cbc0501d17c'),
(8, 6, 'Umum', 'pa yang harus saya lakukan jika mengalami kesalahan saat menggunakan website?', 'Jika Anda mengalami kesalahan, segera laporkan melalui formulir pengaduan di website atau hubungi tim dukungan kami untuk bantuan lebih lanjut.', 1, '2024-08-28 08:50:25', '2024-08-28 08:50:25', '01887f85-5073-4d2e-bdf9-a1c2eb532a54'),
(10, 7, 'Umum', 'Apakah tersedia panduan pengguna untuk navigasi website ini?', 'ya, tersedia panduan pengguna yang lengkap. Anda bisa mengaksesnya dihalaman tentang dengan melihat bagian tata cara layanan pembuatan/pengembangan aplikasi', 1, '2024-08-28 08:52:16', '2024-08-28 08:52:16', '77394a65-6103-4a76-8a4a-966b686b155b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_pendukung`
--

CREATE TABLE `file_pendukung` (
  `id` int(11) NOT NULL,
  `daftaraplikasi_id` int(11) NOT NULL,
  `nama_dokumen` varchar(255) DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `file_pendukung`
--

INSERT INTO `file_pendukung` (`id`, `daftaraplikasi_id`, `nama_dokumen`, `nama_file`, `kategori`, `created_at`, `updated_at`, `uuid`) VALUES
(1, 3, NULL, 'SIHARKO_OMlTL.jpg', 'ss', '2023-07-24 09:52:04', '2023-07-24 09:52:04', '3fd5030a-4c9d-42b5-8b90-e96ca617b0d7'),
(2, 3, NULL, 'SIHARKO_iPJNe.jpg', 'ss', '2023-07-24 09:52:04', '2023-07-24 09:52:04', '660ed664-f080-4511-8488-bfd884617452'),
(4, 3, NULL, 'SIHARKO_oO2h1.jpg', 'ss', '2023-07-24 15:15:53', '2023-07-24 15:15:53', 'df973d2e-6077-4028-86d5-73dafa55cc30'),
(5, 4, NULL, 'SS_SIAPTENDIK_tZ5Op.png', 'ss', '2023-08-10 10:43:42', '2023-08-10 10:43:42', '37900e4b-cc5e-4eba-944a-c3cdd508d96f'),
(6, 4, NULL, 'SS_SIAPTENDIK_F4TLK.jpg', 'ss', '2023-08-10 10:43:42', '2023-08-10 10:43:42', '9852198f-2eb5-44e5-9540-f1daba8572e8'),
(7, 4, 'SKPL', 'Doc_SIAPTENDIK_XoIYQ.pdf', 'dokumen', '2023-08-10 10:44:02', '2023-08-10 10:44:02', '4ab79082-1473-4530-880f-b592ad0788c6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_pengaduan`
--

CREATE TABLE `foto_pengaduan` (
  `id` int(11) NOT NULL,
  `pengaduan_id` int(11) NOT NULL,
  `nama_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `foto_pengaduan`
--

INSERT INTO `foto_pengaduan` (`id`, `pengaduan_id`, `nama_foto`) VALUES
(1, 3, 'ddd_Y9Z7w.png'),
(2, 3, 'ddd_JN8XA.png'),
(3, 4, 'Hantu_DlZgU.png'),
(4, 5, 'Hantu_0FEmU.png'),
(5, 6, 'tugu_keris_Rtbij.png'),
(6, 7, 'yyy_p9NQX.png'),
(7, 8, 'Hantu_V3HOo.png'),
(8, 9, 'Kesalahan_Nama_HsMY2.png'),
(9, 10, 'Jaringan_Terganggu_leDMK.png'),
(10, 11, 'Jaringan_Terganggu_Bkn83.png'),
(11, 12, 'Jaringan_Terganggu_trm4k.png'),
(12, 13, 'Jaringan_Terganggu_vtnfG.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_permohonan`
--

CREATE TABLE `histori_permohonan` (
  `id` int(11) NOT NULL,
  `permohonan_id` int(11) NOT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `keterangan_status` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `histori_permohonan`
--

INSERT INTO `histori_permohonan` (`id`, `permohonan_id`, `petugas_id`, `status`, `keterangan_status`, `created_at`, `updated_at`) VALUES
(1, 5, 0, 'Permohonan Baru', NULL, '2023-06-13 10:12:34', '2023-06-13 10:12:34'),
(2, 5, 1, 'Permohonan Disetujui', 'disetujui', '2023-06-13 10:52:24', '2023-06-13 10:52:24'),
(3, 5, 1, 'Selesai', 'selesaii', '2023-06-13 11:25:40', '2023-06-13 11:25:40'),
(4, 5, 1, 'Ditunda', 'dd', '2023-08-09 10:44:41', '2023-08-09 10:44:41'),
(5, 18, 1, 'Permohonan Disetujui', 'ff', '2023-09-29 09:39:18', '2023-09-29 09:39:18'),
(6, 18, 1, 'Dalam Proses Pembuatan', 'Dalam proses Pembuatan oleh progrmaer', '2023-11-27 10:16:56', '2023-11-27 10:16:56'),
(7, 5, 1, 'Permohonan Ditolak', NULL, '2024-07-08 09:05:31', '2024-07-08 09:05:31'),
(8, 8, 1, 'Selesai', 'aowkoawkowk', '2024-07-09 08:31:46', '2024-07-09 08:31:46'),
(9, 8, 1, 'Selesai', 'aowkoawkowk', '2024-07-09 08:32:12', '2024-07-09 08:32:12'),
(10, 9, 1, 'Permohonan Disetujui', NULL, '2024-07-10 08:25:45', '2024-07-10 08:25:45'),
(11, 9, 1, 'Selesai', NULL, '2024-07-10 08:26:39', '2024-07-10 08:26:39'),
(12, 11, 1, 'Selesai', 'mm', '2024-07-10 09:36:17', '2024-07-10 09:36:17'),
(13, 15, 1, 'Permohonan Disetujui', 'Permohonan baru', '2024-07-10 10:33:40', '2024-07-10 10:33:40'),
(14, 15, 1, 'Permohonan Disetujui', NULL, '2024-07-10 11:05:09', '2024-07-10 11:05:09'),
(15, 15, 1, 'Selesai', NULL, '2024-07-10 11:05:20', '2024-07-10 11:05:20'),
(16, 15, 1, 'Selesai', NULL, '2024-07-10 11:07:13', '2024-07-10 11:07:13'),
(17, 15, 1, 'Selesai', 'gggg', '2024-07-10 11:14:54', '2024-07-10 11:14:54'),
(18, 20, 1, 'Dalam Proses Pembuatan', NULL, '2024-07-10 13:32:26', '2024-07-10 13:32:26'),
(19, 30, 1, 'Permohonan Disetujui', NULL, '2024-07-10 14:13:29', '2024-07-10 14:13:29'),
(20, 32, NULL, 'Pending', 'Permohonan baru telah diajukan', '2024-07-15 01:20:47', '2024-07-15 01:20:47'),
(21, 33, NULL, 'Pending', 'Permohonan baru telah diajukan', '2024-07-15 01:28:44', '2024-07-15 01:28:44'),
(22, 33, 1, 'Permohonan Disetujui', 'menurut kami aplikasi ini keren', '2024-07-15 08:56:07', '2024-07-15 08:56:07'),
(23, 33, 1, 'Dalam Proses Pembuatan', 'lagi di bikin', '2024-07-15 08:56:59', '2024-07-15 08:56:59'),
(24, 34, NULL, 'Pending', 'Permohonan baru telah diajukan', '2024-07-17 03:06:18', '2024-07-17 03:06:18'),
(25, 35, NULL, 'Pending', 'Permohonan baru telah diajukan', '2024-07-17 03:53:04', '2024-07-17 03:53:04'),
(26, 36, NULL, 'Pending', 'Permohonan baru telah diajukan', '2024-07-24 02:25:41', '2024-07-24 02:25:41'),
(27, 37, NULL, 'Pending', 'Permohonan baru telah diajukan', '2024-07-25 10:14:48', '2024-07-25 10:14:48'),
(28, 38, NULL, 'Pending', 'Permohonan baru telah diajukan', '2024-07-26 02:04:28', '2024-07-26 02:04:28'),
(29, 39, NULL, 'Pending', 'Permohonan baru telah diajukan', '2024-08-23 00:46:47', '2024-08-23 00:46:47'),
(30, 40, NULL, 'Pending', 'Permohonan baru telah diajukan', '2024-08-23 03:04:53', '2024-08-23 03:04:53'),
(31, 41, NULL, 'Pending', 'Permohonan baru telah diajukan', '2024-08-28 02:21:15', '2024-08-28 02:21:15'),
(32, 42, NULL, 'Pending', 'Permohonan baru telah diajukan', '2024-08-28 02:22:35', '2024-08-28 02:22:35'),
(33, 39, 1, 'Selesai', NULL, '2024-08-28 09:23:32', '2024-08-28 09:23:32'),
(34, 41, 1, 'Permohonan Disetujui', NULL, '2024-08-28 09:23:50', '2024-08-28 09:23:50');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `created_at`, `updated_at`, `uuid`) VALUES
(2, 'Kepala Bidang', '2023-06-13 08:00:49', '2023-06-13 08:00:49', '7f6b1e8d-52cb-49e2-93b1-9025a74c1c72'),
(3, 'Programmer', '2023-06-13 08:01:03', '2023-07-25 07:37:16', 'ef09b46d-398c-4d0d-b7cd-a4d3f5dfc99c'),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `migration` varchar(255) NOT NULL,
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
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(6, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 2),
(7, 'App\\Models\\User', 3),
(7, 'App\\Models\\User', 8),
(7, 'App\\Models\\User', 10),
(8, 'App\\Models\\User', 4),
(8, 'App\\Models\\User', 6),
(8, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `network`
--

CREATE TABLE `network` (
  `id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `jarak_kabel` varchar(50) NOT NULL,
  `jumlah_aksespoint` int(11) NOT NULL,
  `jenis_koneksi` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `network`
--

INSERT INTO `network` (`id`, `opd_id`, `alamat`, `longitude`, `latitude`, `jarak_kabel`, `jumlah_aksespoint`, `jenis_koneksi`, `status`, `created_at`, `updated_at`, `uuid`) VALUES
(2, 2, 'Kopi Ketje Jelutung', '103.61587233179934', '-1.6203645225934311', '5000', 3, 'GPON', 'Selesai', '2024-08-23 09:12:32', '2024-08-23 09:12:32', '6dbe7d3a-2d52-4467-933e-b0e94832b030'),
(3, 3, 'dsds', '103.6025856', '-1.622016', '200', 3, 'SFP', 'Diproses', '2024-08-26 08:02:54', '2024-08-26 08:02:54', 'a1fc2e85-0a31-4c22-9a83-7a7d0deaedf9');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(22, 'DINAS KEARSIPAN DAN PERPUSTAKAAN', 'DKP', '2023-06-25 18:47:11', '2023-07-11 07:35:06', 'f923b9a2-5e70-40d0-83d7-289769ca90e1'),
(23, 'DINAS PEMUDA DAN OLAHRAGA', 'DISPORA', '2023-06-25 18:47:47', '2023-07-11 07:35:25', 'fe8ce98e-a7e8-4ed4-8246-889364711e0e'),
(24, 'SATUAN POLISI PAMONG PRAJA', 'SATPOLPP', '2023-06-25 18:48:24', '2023-07-11 07:35:55', 'fb330f27-5e54-45fd-bb10-f14991bbe7ff'),
(25, 'Inspektorat Kota Jambi', 'Inspektorat', '2023-06-25 18:57:13', '2023-06-25 18:57:45', '1a278ce2-6071-44f5-929f-11da02ff5ecc'),
(26, 'BADAN PERENCANAAN PEMBANGUNAN DAERAH', 'BAPPEDA', '2023-06-25 18:58:34', '2023-07-11 07:36:17', 'f97e4860-2ae1-486e-82f0-f2e88fb1126d'),
(27, 'SEKRETARIAT DPRD', 'Sekretariat DPRD', '2023-06-25 18:59:21', '2023-07-11 07:36:34', '7fc5d900-e95d-4b68-9d6d-d447983f44aa'),
(28, 'BAGIAN KESEJAHTERAAN RAKYAT', 'BAG. KESEJAHTERAAN RAKYAT', '2023-06-25 19:00:15', '2023-06-25 19:00:15', 'd40187f7-a471-493b-b98b-5634aece1360'),
(29, 'BAGIAN PEREKONOMIAN SETDA', 'BAG. EKONOMI', '2023-06-25 19:00:59', '2023-06-25 19:00:59', 'b79d732b-a25d-46cb-89ea-32be513763f7'),
(30, 'BADAN AMIL ZAKAT', 'BAZNAS', '2023-06-25 19:01:31', '2023-06-25 19:01:31', '6e341b80-bcad-4a6c-a12d-c45045f69b67'),
(31, 'Kecamatan Alam Barajo', 'Kec. Alam Barajo', '2023-06-26 09:25:13', '2023-06-26 09:25:13', '5b2d7980-f387-4e1d-b415-bbc1def422e8'),
(32, 'Kecamatan Danau Sipin', 'Kec. Danau Sipin', '2023-06-26 09:25:46', '2023-06-26 09:25:46', '9a4bc824-748f-4020-b7d7-4782a1c97b14'),
(33, 'Kecamatan Danau Teluk', 'Kec. Danau Teluk', '2023-06-26 09:26:14', '2023-06-26 09:26:14', 'e24121c3-befb-4115-a791-e08b80a86df6'),
(34, 'Kecamatan Jambi Selatan', 'Kec. Jambi Selatan', '2023-06-26 09:26:42', '2023-06-26 09:26:42', '3f42660e-2bd4-46da-b27d-38844a2265e2'),
(35, 'Kecamatan Jambi Timur', 'Kec. Jambi Timur', '2023-06-26 09:27:14', '2023-06-26 09:27:14', 'ba98e534-20cb-4c4a-a877-2c0664cdb331'),
(36, 'Kecamatan Jelutung', 'Kec. Jelutung', '2023-06-26 09:27:38', '2023-06-26 09:27:38', '6cd0f058-fee7-414c-beaf-2490912ca02a'),
(37, 'Kecamatan Kota Baru', 'Kec. Kota Baru', '2023-06-26 09:28:01', '2023-06-26 09:28:01', '600ae699-51e9-44d2-9ded-788efc830574'),
(38, 'Kecamatan Paal Merah', 'Kec. Paal Merah', '2023-06-26 09:28:32', '2023-06-26 09:28:32', '1f66c22b-38e3-4145-b6bf-a36cfe583d57'),
(39, 'Kecamatan Pasar Jambi', 'Kec. Pasar Jambi', '2023-06-26 09:29:33', '2023-06-26 09:29:33', '786282cf-ba04-49b9-be2b-eeb97369d464'),
(40, 'Kecamatan Pelayangan', 'Kec. Pelayangan', '2023-06-26 09:30:22', '2023-06-26 09:30:22', 'a8a84bbf-4906-42ce-8ad0-1f649673a76c'),
(41, 'Kecamatan Telanaipura', 'Kec. Telanaipura', '2023-06-26 09:31:03', '2023-06-26 09:31:03', '3a7ff442-d88d-4d13-9b9b-94ef5171d32c'),
(42, 'SEKRETARIAT DAERAH', 'SEKDA', '2023-07-11 15:57:30', '2023-07-11 15:57:30', '6041f22f-2c97-496a-9b8d-13ab8f7be37c'),
(43, 'BADAN PERBAGIAN UANG RAKYAT', 'BAPAK', '2024-07-26 07:28:45', '2024-07-26 07:28:45', '48d4fc1c-4c37-4fd5-9962-6385108990ce');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nanang.ms22@gmail.com', '$2y$10$QfeTuuFhYqiFH6D9Fe.ll./wPUzQYLPvRVm2fEoOM3asz74fu4ZAa', '2023-06-13 20:32:29'),
('nanang.ms22@gmail.com', '$2y$10$QfeTuuFhYqiFH6D9Fe.ll./wPUzQYLPvRVm2fEoOM3asz74fu4ZAa', '2023-06-13 20:32:29'),
('nanang.ms22@gmail.com', '$2y$10$QfeTuuFhYqiFH6D9Fe.ll./wPUzQYLPvRVm2fEoOM3asz74fu4ZAa', '2023-06-13 20:32:29'),
('nanang.ms22@gmail.com', '$2y$10$QfeTuuFhYqiFH6D9Fe.ll./wPUzQYLPvRVm2fEoOM3asz74fu4ZAa', '2023-06-13 20:32:29'),
('nanang.ms22@gmail.com', '$2y$10$QfeTuuFhYqiFH6D9Fe.ll./wPUzQYLPvRVm2fEoOM3asz74fu4ZAa', '2023-06-13 20:32:29'),
('nanang.ms22@gmail.com', '$2y$10$QfeTuuFhYqiFH6D9Fe.ll./wPUzQYLPvRVm2fEoOM3asz74fu4ZAa', '2023-06-13 20:32:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `kd_pengaduan` varchar(10) NOT NULL,
  `pelapor_id` int(11) DEFAULT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `opd_id` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jenis_pengaduan` varchar(100) NOT NULL,
  `nama_aplikasi` varchar(100) DEFAULT NULL,
  `no_wa` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `tanggapan` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `kd_pengaduan`, `pelapor_id`, `petugas_id`, `opd_id`, `tanggal`, `jenis_pengaduan`, `nama_aplikasi`, `no_wa`, `judul`, `isi`, `status`, `tanggapan`, `created_at`, `updated_at`, `uuid`) VALUES
(9, '1724807712', NULL, NULL, NULL, '2024-08-28', 'aplikasi', 'Muhammad Hasyim, S.H.', '08124567896', 'Kesalahan Nama', 'Kesalahan Nama Aplikasi', NULL, NULL, '2024-08-28 01:15:13', '2024-08-28 01:15:13', 'bd9a2a88-9e12-4466-b335-ef5418f0ec07'),
(13, '1724809164', 1, NULL, NULL, '2024-08-28', 'jaringan', 'Dinda Saputri, S.sos.', '08124567896', 'Jaringan Terganggu', 'Terjadi Gangguan Pada Jaringan yang terhubung ke OPD kami', NULL, NULL, '2024-08-28 01:39:24', '2024-08-28 01:39:24', '7f2160b6-9d39-4eea-b0a9-bd43773e3263');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group` varchar(50) DEFAULT NULL,
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
  `no_urut` int(4) UNSIGNED ZEROFILL NOT NULL,
  `kd_permohonan` varchar(10) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_permohonan` varchar(50) NOT NULL,
  `nama_aplikasi` varchar(200) NOT NULL,
  `jenis_aplikasi` varchar(100) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `nama_opd` varchar(100) NOT NULL,
  `file_surat` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Belum Diverifikasi',
  `pemohon_id` int(11) DEFAULT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `keterangan_status` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `uuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `permohonan`
--

INSERT INTO `permohonan` (`id`, `no_urut`, `kd_permohonan`, `nip`, `nama`, `jabatan`, `no_hp`, `tanggal`, `jenis_permohonan`, `nama_aplikasi`, `jenis_aplikasi`, `opd_id`, `nama_opd`, `file_surat`, `deskripsi`, `status`, `pemohon_id`, `petugas_id`, `keterangan_status`, `created_at`, `updated_at`, `uuid`) VALUES
(39, 0039, '1724374007', '196806061992031006', 'SUDIRMAN', 'KABID. APLIKASI INFORMATIKA', '081515468459', '2024-08-23', 'pembaruan', 'Sikembang', 'WEB', 1, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA', '5j3fEEa.pdf', 'Aplikasi untuk pengembangan UMKM', 'Selesai', NULL, 1, NULL, '2024-08-23 00:46:47', '2024-08-28 09:23:32', '50ba48aa-fbd2-4d5d-aac5-78e6d2a71416'),
(41, 0040, '1724811675', '196806061992031006', 'SUDIRMAN', 'KABID. APLIKASI INFORMATIKA', '081515468459', '2024-08-28', 'pembuatan', 'Sikadek', 'WEB', 15, 'DINAS KOMUNIKASI DAN INFORMATIKA', 'm8slI1E.pdf', 'Aplikasi untuk pencatatan desa', 'Permohonan Disetujui', NULL, 1, NULL, '2024-08-28 02:21:15', '2024-08-28 09:23:50', 'fbc2b97a-2406-49c9-807d-e5123f399006'),
(42, 0041, '1724811755', '196806061992031006', 'SUDIRMAN', 'KABID. APLIKASI INFORMATIKA', '081515468458', '2024-08-28', 'penggunaan_domain', 'Simali', 'ANDROID', 15, 'DINAS KOMUNIKASI DAN INFORMATIKA', 'ptibPpJ.pdf', 'Aplikasi untuk masyarakat sekeliling', 'Belum Diverifikasi', NULL, NULL, NULL, '2024-08-28 02:22:35', '2024-08-28 02:22:35', '61cb437c-96cf-4f8e-87c1-6e2a4d91e060');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
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
(13, 7),
(14, 6),
(15, 6),
(15, 7),
(15, 8),
(16, 6),
(16, 7),
(17, 6),
(17, 7),
(18, 6),
(19, 7),
(20, 7),
(21, 7),
(22, 7),
(23, 7),
(24, 7),
(25, 7),
(26, 7),
(27, 7),
(27, 8),
(28, 7),
(28, 8),
(29, 7),
(29, 8),
(30, 7),
(30, 8),
(31, 7),
(31, 8),
(32, 7),
(32, 8),
(33, 7),
(33, 8),
(34, 7),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `teams`
--

INSERT INTO `teams` (`id`, `nama`, `jabatan_id`, `jabatan`, `foto`, `created_at`, `updated_at`, `uuid`) VALUES
(4, 'TRI WAHYUDI, S.Kom', 3, 'Programmer', NULL, '2023-08-09 10:48:18', '2023-08-09 10:48:18', 'ca9b7bb6-90d5-48f4-a20e-3a771e669e6d'),
(5, 'LIAN MAFUTRA, M.Kom', 3, 'Programmer', NULL, '2023-08-09 10:48:40', '2023-08-09 10:48:57', '70d1ecc3-e90f-457f-9910-99d5861b1c97'),
(6, 'INDRA GUNAWAN, S.Kom', 3, 'Programmer', NULL, '2023-08-09 10:49:16', '2023-08-09 10:49:16', '14a52a75-bd7f-44a1-951f-14c0f29ce450'),
(7, 'AHMAD ZUHDI, S.Kom', 3, 'Programmer', NULL, '2023-08-09 10:49:49', '2023-08-09 10:49:49', '48a7b7d3-04f0-44c7-afad-abf0e167d17a'),
(8, 'NANANG MAULANA SYARIP, S.Kom', 3, 'Programmer', NULL, '2023-08-09 10:50:12', '2023-08-09 10:50:12', 'bd2a5487-56f1-4e27-9219-cd99a5243d16'),
(9, 'RIZKI RAMADHAN, S.Kom', 3, 'Programmer', NULL, '2023-08-09 10:51:44', '2023-08-09 10:51:44', '3ba9c35b-5831-41b8-a8fa-8a4e01e61d8b'),
(10, 'LAHANE, S.Kom', 3, 'Programmer', NULL, '2023-08-09 10:51:53', '2023-08-09 10:51:53', '4079057a-93ce-4286-82b9-d08e29d64e58'),
(11, 'ANDRE SIMATUPANG, S.Kom', 3, 'Programmer', NULL, '2023-08-09 10:52:11', '2023-08-09 10:52:11', '3e84835c-96bc-4af9-8fdb-d7b0e6887c86'),
(12, 'NURDIN NUR MAJID, S.Kom', 3, 'Programmer', NULL, '2023-08-09 10:52:45', '2023-08-09 10:52:45', '438aba45-06dc-4a8c-995b-47e3950ff98e');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `opd_id` int(11) DEFAULT NULL,
  `uuid` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `opd_id`, `uuid`, `username`, `role`, `email`, `no_hp`, `email_verified_at`, `password`, `remember_token`, `is_active`, `photo`, `last_login_at`, `last_login_ip`, `created_at`, `updated_at`) VALUES
(1, 'Nanang Maulana Syarip', NULL, 'f9acc6ec-a304-4a70-adbc-e5a49982dae7', 'nanang', 'superadmin', 'nanang.ms22@gmail.com', NULL, NULL, '$2y$10$JcLj19OIGihAxcJLGPJPzu0YYN1t1GLtK6N5XKhzkow6ldZffAoiW', NULL, '1', 'Nanang_Maulana_Syarip_GG9U9.jpg', '2024-08-28 10:28:43', '127.0.0.1', '2022-12-25 20:18:45', '2024-08-28 03:28:43'),
(2, 'admin123', NULL, '2b29931d-9bc5-457f-b60d-c072ee36a6aa', 'admin', 'admin', 'admin@gmail.com', NULL, NULL, '$2y$10$7ZYsIdbJslvAjPkzvPgmUO0UIYxkHFIzbFqX8nuLzxQbMPdCXQ7oi', NULL, '1', NULL, NULL, NULL, '2022-12-27 02:11:46', '2023-05-24 08:09:22'),
(3, 'Harukaa', NULL, 'd9c0f103-7e49-48ab-8a8b-53de719903be', 'haruka', 'admin', 'haruka@gmail.com', NULL, NULL, '$2y$10$yisnIHPJmPf1XqwdrzH1huDuBkxobU5NTodhBPj6dgalxxgQ/VjAm', NULL, '1', NULL, NULL, NULL, '2023-03-27 03:27:04', '2023-03-30 01:11:29'),
(4, 'User', 15, '8f4aad7b-fbc3-4787-9f34-b39f2078d4cb', 'user', 'user', 'user@gmail.com', NULL, NULL, '$2y$10$J2mmlE6KfT4UZDmVslUN/.GYtaxt0PNmL4nyzyc47Ut3Rv1VisdBm', NULL, '1', NULL, '2023-11-15 10:30:14', '127.0.0.1', '2023-05-15 01:14:40', '2023-11-15 03:30:14'),
(6, 'Ahmad Zuhdi', 12, '94df5e27-d2ac-418b-8aa1-9a1507cfecc2', 'ahmad', 'user', 'ahmad@gmail.com', NULL, NULL, '$2y$10$9lEixArr9DSNBlE5PB51U.tpteC/qNTKtw3kc0zX22duBYGnZXYIK', NULL, '1', NULL, '2023-05-22 11:27:10', '127.0.0.1', '2023-05-22 04:26:36', '2023-09-07 02:05:42'),
(8, 'bon', NULL, '36668ceb-72cc-4efb-8923-987ff8da2c75', 'bon', 'admin', 'bon@gmail.com', NULL, NULL, '$2y$10$dDZcVO0Ji7U8FPozUxxR6umZrYqPsmTjycLvJWU/Vz3/XZpxz131u', NULL, '1', NULL, '2024-08-14 14:33:37', '127.0.0.1', '2024-07-26 01:25:14', '2024-08-14 07:33:37'),
(9, 'boy', NULL, '1ed3b5d4-cd59-499e-b503-862e448bbe4a', 'boy', 'user', 'boy@gmail.com', NULL, NULL, '$2y$10$nrjh.ERkk01F3d4OZE3waeXHcenafmI2N.adOeEkGei2DwB3Llh/.', NULL, '1', NULL, '2024-08-14 14:33:00', '127.0.0.1', '2024-08-01 00:33:22', '2024-08-14 07:33:00'),
(10, 'candra', NULL, 'd0424434-183a-40d4-a186-5bcedb7e0367', 'candra', 'admin', 'candra@mail.com', NULL, NULL, '$2y$10$/0EMTTHIPKwyA6vL5CHHm.7MONSVZDmY6My.hnvzAae7Yyh/YA5we', NULL, '1', NULL, '2024-08-28 09:03:08', '127.0.0.1', '2024-08-28 02:02:52', '2024-08-28 02:03:08');

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
-- Indeks untuk tabel `network`
--
ALTER TABLE `network`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `daftaraplikasi`
--
ALTER TABLE `daftaraplikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `file_pendukung`
--
ALTER TABLE `file_pendukung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `foto_pengaduan`
--
ALTER TABLE `foto_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `histori_permohonan`
--
ALTER TABLE `histori_permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
-- AUTO_INCREMENT untuk tabel `network`
--
ALTER TABLE `network`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `opd`
--
ALTER TABLE `opd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
