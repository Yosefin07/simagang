-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2025 at 05:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Salsabilahokey123@gmail.com', 1, '2025-08-05 02:41:20', 1),
(2, '::1', 'Salsabilahokey123@gmail.com', 1, '2025-08-05 02:42:10', 1),
(3, '::1', 'Salsabilahokey123@gmail.com', 1, '2025-08-05 02:44:30', 1),
(4, '::1', 'Salsabilahokey123@gmail.com', 1, '2025-08-05 03:11:29', 1),
(5, '::1', 'Salsabilahokey123@gmail.com', 1, '2025-08-05 03:31:54', 1),
(6, '::1', 'Salsabilahokey123@gmail.com', NULL, '2025-08-05 03:47:35', 0),
(7, '::1', 'Salsabilahokey123@gmail.com', 1, '2025-08-05 04:32:51', 1),
(8, '::1', 'Salsabilahokey123@gmail.com', 1, '2025-08-07 14:39:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(5) UNSIGNED NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('mahasiswa','mitra') NOT NULL DEFAULT 'mahasiswa',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `nickname`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(3, 'Imey', 'imey', '$2y$10$2P0gFqFewiB/cVGN/5.RxO2HZ/SACJBS2FafSzDTHoOeFWhcuwNfK', 'mahasiswa', NULL, NULL),
(4, 'nopitri', 'nopitri', '$2y$10$1pmVAy1l4ejvHwvGv1xheeEcXTUWvaki2shi0Yb0WhMVkz//BDnaq', 'mitra', NULL, NULL),
(5, 'azka', 'azka', '$2y$10$xxl92xtezDzlZIkyXkoDUuPWWa1D8/FOsW3MsPA/EjlSAxwqZl2ea', 'mitra', NULL, NULL),
(7, 'Everyone', 'everyone', '$2y$10$UsykVf2SriQbfCfu2KXx5OAXVjsIxURHt7w4vxya629Ran1WvowIq', 'mahasiswa', NULL, NULL),
(11, 'siti', 'siti', '$2y$10$U8tJbX5LDTxqBDThPKuhOe6BMM2OzxH2dMJU44Az7R7Zo3BUSH6zW', 'mitra', '2025-08-05 03:12:23', '2025-08-05 03:12:23'),
(13, 'sefin', 'sefin', '$2y$10$iF7wJ7vAxIuytBveaGV2TOc1ZqRyBS0sVHTkE7dbTt/2VBUFmao0i', 'mitra', '2025-08-05 03:46:04', '2025-08-05 03:46:04'),
(14, 'yosefin', 'yosefin', '$2y$10$Ec8a6bJUfRzieik31YXptuFcCIataUbqap3WCNeFpTtL3EY7gYwBm', 'mahasiswa', '2025-08-05 04:28:31', '2025-08-05 04:28:31'),
(15, 'ela', 'ela', '$2y$10$wUCTOmkuZITdRKjluPQCz.jcr2JMlKYpYn2/tBS7xxtCTQDeax9F.', 'mitra', '2025-08-05 04:30:58', '2025-08-05 04:30:58'),
(16, 'vinn', 'vinn', '$2y$10$j.J/pS.fHyCWA2vWc1mHm.2VDyUQb/pMcsyNrIWMJYueMXrZ5TOSW', 'mahasiswa', '2025-08-05 16:09:26', '2025-08-05 16:09:26'),
(17, 'bshshs', 'ccc', '$2y$10$xfg87HGxGoXxfPP5rq/4.OSKR46yYWJuCXDJKFrNHyYEl.IPP3CJ6', 'mahasiswa', '2025-08-05 16:17:50', '2025-08-05 16:17:50'),
(18, 'abcd', 'abc', '$2y$10$6gF4eJBnCBmZDZSbTilb2uRvRp6.Y72qQjC8U3pxtZ2NYWOqOZ.wO', 'mahasiswa', '2025-08-05 16:23:58', '2025-08-05 16:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `daftarmahasiswa`
--

CREATE TABLE `daftarmahasiswa` (
  `id` int(15) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_tanggal_lahir` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `mitra_id` int(11) DEFAULT NULL,
  `mitra` varchar(50) NOT NULL,
  `status_acc` varchar(20) NOT NULL DEFAULT 'Belum Diacc',
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftarmahasiswa`
--

INSERT INTO `daftarmahasiswa` (`id`, `user_id`, `nama`, `tempat_tanggal_lahir`, `alamat`, `nim`, `jurusan`, `posisi`, `mitra_id`, `mitra`, `status_acc`, `username`) VALUES
(7, 999, 'Selvin ', 'Sumatra Utara ', 'Nginden 2 baru', '202211420070', 'Teknik Informatika', 'Data Analyst', NULL, 'PT. Nusa Data Teknologi', 'Sudah Diacc', 'debug-mitra'),
(9, 3, 'Imey Chan', '15 Mei 2002', 'Jakarta Barat', '0230219802', 'Manajemen', 'Data Analyst', NULL, 'PT. Nusa Data Teknologi', 'Sudah Diacc', 'imey'),
(10, 7, 'Everyone', 'Sumatra Utara ', 'Nginden 2 baru', '1232', 'informatika', 'Full Stack Developer', NULL, 'PT Digital Solusindo Abadi', 'Belum Diacc', 'everyone'),
(11, 9, 'jesika', 'Sumatra Utara ', 'Nginden 2 baru', '1232', 'informatika', 'Data Analyst', NULL, 'PT. Nusa Data Teknologi', 'Belum Diacc', 'babi'),
(12, 14, 'Yosen', '15 Mei 2002', 'Jakarta Barat', '0230219802', 'Manajemen', 'Fintech App Developer', NULL, 'PT Smart Teknologi Finansial', 'Belum Diacc', 'yosefin'),
(13, 15, 'azka', '15 Mei 2002', 'Jakarta Barat', '0230219802', 'Manajemen', 'Game Developer', NULL, 'PT Galaxy Digital Studio', 'Sudah Diacc', 'ela');

-- --------------------------------------------------------

--
-- Table structure for table `formmitra`
--

CREATE TABLE `formmitra` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formmitra`
--

INSERT INTO `formmitra` (`id`, `nama`, `deskripsi`, `posisi`, `created_at`, `status`) VALUES
(3, 'PT. Solusi Teknologi Nusantara', 'PT. Solusi Teknologi Nusantara adalah perusahaan yang bergerak di bidang pengembangan perangkat lunak, layanan IT consulting, serta pelatihan teknologi digital. Kami telah bekerja sama dengan berbagai institusi pendidikan dan perusahaan nasional untuk pengembangan SDM berbasis teknologi.', 'Web Developer (Intern)  UI/UX Designer  Data Analyst (Magang)  IT Support', '2025-08-04 13:22:22', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-06-16-160000', 'App\\Database\\Migrations\\CreateDaftarmahasiswaTable', 'default', 'App', 1750152688, 1),
(2, '2025-06-17-100213', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1750154627, 2),
(3, '2025-06-22-064447', 'App\\Database\\Migrations\\LaporanMagang', 'default', 'App', 1750574854, 3),
(4, '2025-06-22-070323', 'App\\Database\\Migrations\\CreateMitra', 'default', 'App', 1750575836, 4),
(5, '2025-06-22-082641', 'App\\Database\\Migrations\\CreateTrackerStudy', 'default', 'App', 1750580813, 5),
(6, '2025-06-23-092556', 'App\\Database\\Migrations\\CreateNamaTable', 'default', 'App', 1750670795, 6),
(10, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1753974124, 7),
(11, '2025-06-13-130650', 'App\\Database\\Migrations\\CreateDaftarmahasiswaTable', 'default', 'App', 1753974853, 8),
(12, '2025-06-22-070323', 'App\\Database\\Migrations\\CreateFormMitra', 'default', 'App', 1753974853, 8),
(13, '2025-07-28-133543_CreateFormmitraTable', '', '', '', 2147483647, 0),
(14, '2025-07-28-133543', 'App\\Database\\Migrations\\CreateFormmitraTable', 'default', 'App', 1753975064, 9),
(15, '2025-07-31-151000', 'App\\Database\\Migrations\\CreateClientTable', 'default', 'App', 1753975064, 9),
(16, '2025-07-31-153655', 'App\\Database\\Migrations\\CreateMitraTable', 'default', 'App', 1753976678, 10),
(17, '2025-07-31-183152', 'App\\Database\\Migrations\\CreatePendaftaranMitraTable', 'default', 'App', 1753986751, 11),
(20, '2025-07-31-190838', 'App\\Database\\Migrations\\CreatePosisiTable', 'default', 'App', 1754057176, 12),
(23, '2025-06-23-092909', 'App\\Database\\Migrations\\CreateClientTable', 'default', 'App', 1754309029, 13),
(25, '2025-08-04-120813', 'App\\Database\\Migrations\\CreateTrackerStudy', 'default', 'App', 1754314562, 14),
(26, '2017-11-20-223112', 'App\\Database\\Migrations\\CreateAuthTables', 'default', 'App', 1754361463, 15);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status_acc` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Menunggu ACC, 1=Sudah ACC',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `nama`, `deskripsi`, `posisi`, `created_at`, `status_acc`, `user_id`) VALUES
(42, 'PT Smart Teknologi Finansial', 'Startup fintech yang mengembangkan aplikasi keuangan digital berbasis AI.', 'Fintech App Developer', '2025-08-05 10:47:10', 1, 13),
(44, 'PT Galaxy Digital Studio', 'PT . Galaxy adalah', ' Game Developer', '2025-08-05 11:34:57', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `status` varchar(50) DEFAULT 'Menunggu',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id` int(11) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `nama_posisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tracker_study`
--

CREATE TABLE `tracker_study` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `skill` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracker_study`
--

INSERT INTO `tracker_study` (`id`, `nama`, `bulan`, `skill`, `created_at`, `updated_at`) VALUES
(1, 'Yosefin Yuniati Zandroto', '2025-08-05', 'Pembuatan dan integrasi formulir pengajuan mitra\r\n\r\nImplementasi fitur CRUD (Create, Read, Update, Delete) pada data mitra\r\n\r\nPenggunaan CodeIgniter 4 untuk pengelolaan Model, Controller, dan Routing\r\n\r\nPenerapan relasi antar tabel menggunakan foreign key (user_id)\r\n\r\nPenambahan kolom status_acc untuk validasi data mitra oleh admin\r\n\r\nPenanganan error database seperti kolom tidak ditemukan (Unknown column)\r\n\r\nMigrasi tabel menggunakan class Migration di CodeIgniter 4\r\n\r\nSimulasi sistem ACC mitra oleh admin (update status_acc menjadi \"Sudah Diacc\")\r\n\r\nPenerapan desain form responsif menggunakan Tailwind CSS\r\n\r\nManajemen alur registrasi dan login user (user_id dikaitkan dengan formmitra)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Salsabilahokey123@gmail.com', 'Adminku', '$2y$10$fUHWyI9Ff02tQ.Zy3bsyUOGbCoYNTzsd2ZT4osgz8XxJFtuLEVfby', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2025-08-05 02:28:06', '2025-08-05 02:28:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `daftarmahasiswa`
--
ALTER TABLE `daftarmahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formmitra`
--
ALTER TABLE `formmitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracker_study`
--
ALTER TABLE `tracker_study`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `daftarmahasiswa`
--
ALTER TABLE `daftarmahasiswa`
  MODIFY `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `formmitra`
--
ALTER TABLE `formmitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracker_study`
--
ALTER TABLE `tracker_study`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
