-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 Agu 2019 pada 09.36
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas_karyawan`
--

CREATE TABLE `aktivitas_karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_kary` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aktivitas_karyawan`
--

INSERT INTO `aktivitas_karyawan` (`id`, `nama_kary`, `info_kary`, `aktivitas`, `created_at`, `updated_at`) VALUES
(1, 'zazazazazazaza', 'qsxadsvsdxvfbfdbdbdbfnhgnghmgmjmhbnzgdbzfgdzfvfvifgiywewbcbweccnkdicniefnicskdfnferhrbdfbbtrnmiukyhdhrsgbafvfd 7356735765756', 'Blok Baru Ditambahkan Nama Blok: EBONI', '2019-08-19 23:14:43', '2019-08-19 23:14:43'),
(2, 'zazazazazazaza', 'qsxadsvsdxvfbfdbdbdbfnhgnghmgmjmhbnzgdbzfgdzfvfvifgiywewbcbweccnkdicniefnicskdfnferhrbdfbbtrnmiukyhdhrsgbafvfd 7356735765756', 'Blok Sukses di edit Nama Blok: EBONI', '2019-08-19 23:15:24', '2019-08-19 23:15:24'),
(3, 'Ropeek', 'Blora 08923742', 'Blok Baru Ditambahkan Nama Blok: Blok Menilkara', '2019-08-20 00:22:29', '2019-08-20 00:22:29'),
(4, 'Ropeek', 'Blora 08923742', 'Kamar Baru Ditambhakan No Kamar: No.102', '2019-08-20 00:27:51', '2019-08-20 00:27:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blok`
--

CREATE TABLE `blok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_blok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blok`
--

INSERT INTO `blok` (`id`, `nama_blok`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'EBONI', 'dekaat taman ebonia', '2019-08-19 23:14:43', '2019-08-19 23:15:23'),
(2, 'Blok Menilkara', 'Sebelah Timur', '2019-08-20 00:22:29', '2019-08-20 00:22:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kamar` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_pelanggan` int(10) UNSIGNED NOT NULL,
  `checkin_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama_menginap` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blok_id` int(11) NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `fasilitas` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `no_kamar`, `lantai`, `blok_id`, `tipe`, `harga`, `fasilitas`, `active`, `created_at`, `updated_at`) VALUES
(1, 'No.100', '1', 1, 'ac', 200000, 'AC, Kamar Mandi Dalam, Kasur 2', 0, '2019-08-20 00:17:30', '2019-08-20 00:17:30'),
(2, 'No.101', '2', 1, 'non_ac', 100000, 'Kamar mandi, kipas angin', 1, '2019-08-20 00:20:29', '2019-08-20 00:20:29'),
(3, 'No.102', '1', 2, 'vip', 300000, 'AC, Kamar mandi dalam, kulkas, kasur 3', 1, '2019-08-20 00:27:50', '2019-08-20 00:27:50');

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
(3, '2019_08_08_071825_create_kamar_table', 1),
(4, '2019_08_08_071916_create_bookings_table', 1),
(5, '2019_08_10_051339_create_aktivitas_karyawan_table', 1),
(6, '2019_08_14_040129_create_blok_table', 1),
(7, '2019_08_20_040920_create_pelanggan_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_ktp` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('superuser','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `email_verified_at`, `password`, `jenis_kelamin`, `telp`, `alamat`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tunas', 'tunas@gmail.com', NULL, '$2y$10$1FS6IWmeE91mWlx27FJqW.bqtamqS4WYHMtTfLdms5OvdfyvBLt.C', 'laki-laki', '098765232', 'gfhghj', 'admin', NULL, '2019-08-19 22:15:58', '2019-08-19 22:15:58'),
(2, 'Ropeek', 'ropeek@email.com', NULL, '$2y$10$nGKZUiasQwC/L7E3UOzOUet3Ltf/yxLqhjieUehjbXdas7iP8nDc.', 'laki-laki', '08923742', 'Blora', 'admin', NULL, '2019-08-19 22:37:43', '2019-08-19 22:37:43'),
(3, 'tunasadi', 'tunas@s.com', NULL, '$2y$10$8LVpIbIKzL.wkdEo8GCG4uM6J2g3M2Kno/THxt/fyUntYn0zJsXTe', 'laki-laki', '543456', 'bvcx', 'admin', NULL, '2019-08-19 22:50:32', '2019-08-19 22:50:32'),
(4, 'zazazazazazaza', 'za@az.com', NULL, '$2y$10$G/jKPWq2BzE7nuPgpePdYexhbdeL2dnMPrTiQeLZmrnNAugm079Fq', 'laki-laki', '7356735765756', 'qsxadsvsdxvfbfdbdbdbfnhgnghmgmjmhbnzgdbzfgdzfvfvifgiywewbcbweccnkdicniefnicskdfnferhrbdfbbtrnmiukyhdhrsgbafvfd', 'admin', NULL, '2019-08-19 22:50:57', '2019-08-19 22:50:57'),
(5, 'tunasadi', 'tunas@t.com', NULL, '$2y$10$0Z8KuzKvowmuNulAI3.Dq.OXogh7yA0MmRj67JKpSyUP/3.EWA3Xm', 'laki-laki', '09879888', 'jhg', 'admin', NULL, '2019-08-19 22:59:47', '2019-08-19 22:59:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas_karyawan`
--
ALTER TABLE `aktivitas_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivitas_karyawan`
--
ALTER TABLE `aktivitas_karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blok`
--
ALTER TABLE `blok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
