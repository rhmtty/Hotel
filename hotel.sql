-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.29-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk hotel
CREATE DATABASE IF NOT EXISTS `hotel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hotel`;

-- membuang struktur untuk table hotel.aktivitas_karyawan
CREATE TABLE IF NOT EXISTS `aktivitas_karyawan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_kary` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktivitas` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hotel.aktivitas_karyawan: ~77 rows (lebih kurang)
DELETE FROM `aktivitas_karyawan`;
/*!40000 ALTER TABLE `aktivitas_karyawan` DISABLE KEYS */;
INSERT INTO `aktivitas_karyawan` (`id`, `nama_kary`, `info_kary`, `aktivitas`, `created_at`, `updated_at`) VALUES
	(1, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: 01', '2019-08-31 04:32:59', '2019-08-31 04:32:59'),
	(2, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: 02', '2019-08-31 04:33:58', '2019-08-31 04:33:58'),
	(3, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: 03', '2019-08-31 04:35:08', '2019-08-31 04:35:08'),
	(4, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Kamar baru dipesan. Nama Pelanggan: Vina No KTP: 999832762 Alamat: Asgar Telepon: 085608911601', '2019-08-31 05:13:00', '2019-08-31 05:13:00'),
	(5, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Mengedit data booking. ID booking: ', '2019-08-31 05:56:34', '2019-08-31 05:56:34'),
	(6, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Mengedit data booking. ID booking: ', '2019-08-31 05:59:04', '2019-08-31 05:59:04'),
	(7, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Mengedit data booking. ID booking: ', '2019-08-31 06:00:36', '2019-08-31 06:00:36'),
	(8, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Mengedit data booking. ID booking: 1', '2019-08-31 06:53:46', '2019-08-31 06:53:46'),
	(9, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Mengedit data booking. ID booking: 1', '2019-08-31 07:19:18', '2019-08-31 07:19:18'),
	(10, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus Blok: Blok IV', '2019-08-31 07:53:36', '2019-08-31 07:53:36'),
	(11, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus Blok: Blok III', '2019-08-31 07:55:37', '2019-08-31 07:55:37'),
	(12, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus Blok: Blok II', '2019-08-31 07:55:46', '2019-08-31 07:55:46'),
	(13, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: 02', '2019-08-31 08:05:56', '2019-08-31 08:05:56'),
	(14, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: 03', '2019-08-31 08:07:02', '2019-08-31 08:07:02'),
	(15, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus data Kamar: ', '2019-08-31 08:08:41', '2019-08-31 08:08:41'),
	(16, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambahkan Blok: Blok II', '2019-08-31 08:09:25', '2019-08-31 08:09:25'),
	(17, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambahkan Blok: Blok Menilkara', '2019-08-31 08:10:30', '2019-08-31 08:10:30'),
	(18, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus Blok: Blok Menilkara', '2019-08-31 08:12:13', '2019-08-31 08:12:13'),
	(19, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus Blok: Blok II', '2019-08-31 08:12:57', '2019-08-31 08:12:57'),
	(20, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambahkan Blok: Blok Jati', '2019-08-31 08:13:30', '2019-08-31 08:13:30'),
	(21, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambahkan Blok: Blok Menilkara', '2019-08-31 08:14:37', '2019-08-31 08:14:37'),
	(22, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambahkan Blok: Blok M', '2019-08-31 08:14:54', '2019-08-31 08:14:54'),
	(23, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus Blok: Blok M', '2019-08-31 08:15:18', '2019-08-31 08:15:18'),
	(24, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: 03', '2019-08-31 08:16:29', '2019-08-31 08:16:29'),
	(25, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: 03', '2019-08-31 08:18:42', '2019-08-31 08:18:42'),
	(26, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: 04', '2019-08-31 08:21:12', '2019-08-31 08:21:12'),
	(27, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus data Kamar: ', '2019-08-31 08:22:12', '2019-08-31 08:22:12'),
	(28, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus Blok: Blok Menilkara', '2019-08-31 08:30:10', '2019-08-31 08:30:10'),
	(29, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambahkan Blok: Blok Jati', '2019-08-31 08:34:06', '2019-08-31 08:34:06'),
	(30, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus Blok: Blok Jati', '2019-08-31 08:34:37', '2019-08-31 08:34:37'),
	(31, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambahkan Blok: Blok Menilkara', '2019-09-02 02:04:07', '2019-09-02 02:04:07'),
	(32, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Kamar baru dipesan. Nama Pelanggan: Vina No KTP: 999832762 Alamat: Asgar Telepon: 085608911601', '2019-09-02 03:48:10', '2019-09-02 03:48:10'),
	(33, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Kamar baru dipesan. Nama Pelanggan: Paino No KTP: 93478439 Alamat: Skh Telepon: 085689257341', '2019-09-02 05:40:29', '2019-09-02 05:40:29'),
	(34, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Mengedit data Kamar: 03', '2019-09-06 14:55:52', '2019-09-06 14:55:52'),
	(35, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Kamar baru dipesan. Nama Pelanggan: Karnoto No KTP: 123456 Alamat: Konoha Telepon: 0813456789', '2019-09-07 08:22:20', '2019-09-07 08:22:20'),
	(36, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: 04', '2019-09-07 08:27:46', '2019-09-07 08:27:46'),
	(37, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Proses Check Out. Nama Pelanggan: Paino No KTP: 93478439Alamat: Skh Telepon: 085689257341 No Kamar: 01 Tipe: AC Total Tagihan: 500000', '2019-09-07 08:51:16', '2019-09-07 08:51:16'),
	(38, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambahkan Blok: Blok Test', '2019-09-07 09:05:17', '2019-09-07 09:05:17'),
	(39, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambahkan Blok: Blok Dihapus', '2019-09-07 09:05:41', '2019-09-07 09:05:41'),
	(40, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambahkan Blok: Pokoke Tes', '2019-09-07 09:06:04', '2019-09-07 09:06:04'),
	(41, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus Blok: Blok Test', '2019-09-07 14:34:52', '2019-09-07 14:34:52'),
	(42, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus Blok: Blok Dihapus', '2019-09-07 14:36:55', '2019-09-07 14:36:55'),
	(43, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambahkan Blok: Tes hapus', '2019-09-07 15:19:42', '2019-09-07 15:19:42'),
	(44, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus Blok: Tes hapus', '2019-09-07 15:30:07', '2019-09-07 15:30:07'),
	(45, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus Blok: Pokoke Tes', '2019-09-07 15:30:34', '2019-09-07 15:30:34'),
	(46, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: ngetes hapus', '2019-09-07 15:51:00', '2019-09-07 15:51:00'),
	(47, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: tes 2', '2019-09-07 15:51:28', '2019-09-07 15:51:28'),
	(48, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: tes hapus 2', '2019-09-07 15:52:49', '2019-09-07 15:52:49'),
	(49, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: tes hapus luurde', '2019-09-07 15:53:40', '2019-09-07 15:53:40'),
	(50, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus data Kamar: tes hapus luurde', '2019-09-07 16:02:46', '2019-09-07 16:02:46'),
	(51, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus data Kamar: ngetes hapus', '2019-09-07 16:03:12', '2019-09-07 16:03:12'),
	(52, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus data Kamar: tes 2', '2019-09-07 16:04:33', '2019-09-07 16:04:33'),
	(53, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus data Kamar: tes hapus 2', '2019-09-07 16:04:56', '2019-09-07 16:04:56'),
	(54, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Kamar baru dipesan. Nama Pelanggan: Akeno No KTP: 911082131 Alamat: Jepun Telepon: 081226435780', '2019-09-09 10:30:37', '2019-09-09 10:30:37'),
	(55, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Kamar baru dipesan. Nama Pelanggan: Atho No KTP: 123456911 Alamat: Jagaraga Telepon: 08122881', '2019-09-09 10:54:16', '2019-09-09 10:54:16'),
	(56, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Kamar baru dipesan. Nama Pelanggan: Emilia No KTP: 911911 Alamat: Ngawi Telepon: 081234', '2019-09-09 10:59:41', '2019-09-09 10:59:41'),
	(57, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Mengedit data booking. ID booking: 6', '2019-09-09 11:01:50', '2019-09-09 11:01:50'),
	(58, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: 04', '2019-09-09 13:50:29', '2019-09-09 13:50:29'),
	(59, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: 04', '2019-09-09 14:05:03', '2019-09-09 14:05:03'),
	(60, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus data Kamar: 04', '2019-09-09 14:05:23', '2019-09-09 14:05:23'),
	(61, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus data Kamar: 04', '2019-09-09 14:05:31', '2019-09-09 14:05:31'),
	(62, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Proses Check Out. Nama Pelanggan: Vina No KTP: 999832762Alamat: Asgar Telepon: 085608911601 No Kamar: 03 Tipe: VIP Total Tagihan: Rp. 72000000', '2019-09-19 21:24:36', '2019-09-19 21:24:36'),
	(63, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Kamar baru dipesan. Nama Pelanggan: Rem No KTP: 911082131 Alamat: Isekai Telepon: 08123456', '2019-09-20 00:01:36', '2019-09-20 00:01:36'),
	(64, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Mengedit data booking. ID booking: 7', '2019-09-20 00:03:51', '2019-09-20 00:03:51'),
	(65, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Proses Check Out. Nama Pelanggan: Rem No KTP: 911082131Alamat: Isekai Telepon: 08123456 No Kamar: 03 Tipe: VIP Total Tagihan: Rp. 500000', '2019-09-20 00:04:16', '2019-09-20 00:04:16'),
	(66, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Mengedit data booking. ID booking: 6', '2019-09-20 00:04:56', '2019-09-20 00:04:56'),
	(67, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Proses Check Out. Nama Pelanggan: Emilia No KTP: 911911Alamat: Ngawi Telepon: 081234 No Kamar: 04 Tipe: NON AC Total Tagihan: Rp. 1100000', '2019-09-20 00:06:10', '2019-09-20 00:06:10'),
	(68, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Kamar baru dipesan. Nama Pelanggan: Mukidi No KTP: 12345677 Alamat: Sby Telepon: 089123413', '2019-09-20 00:42:01', '2019-09-20 00:42:01'),
	(69, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Mengedit Blok: Blok II', '2019-09-24 13:01:58', '2019-09-24 13:01:58'),
	(70, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Mengedit Blok: Blok III', '2019-09-24 13:02:43', '2019-09-24 13:02:43'),
	(71, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambahkan Blok: Blok IV', '2019-09-24 13:03:19', '2019-09-24 13:03:19'),
	(72, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: 1', '2019-09-24 13:49:05', '2019-09-24 13:49:05'),
	(73, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menambah data Kamar: 05', '2019-09-24 13:49:55', '2019-09-24 13:49:55'),
	(74, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Menghapus data Kamar: 1', '2019-09-24 13:50:10', '2019-09-24 13:50:10'),
	(75, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Kamar baru dipesan. Nama Pelanggan: Paino No KTP: 123001012 Alamat: Solo Telepon: 081231111', '2019-09-24 13:56:20', '2019-09-24 13:56:20'),
	(76, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Proses Check Out. Nama Pelanggan: Atho No KTP: 123456911Alamat: Jagaraga Telepon: 08122881 No Kamar: 01 Tipe: AC Total Tagihan: Rp. 200000', '2019-09-24 13:57:01', '2019-09-24 13:57:01'),
	(77, 'Nanas Sultan Sagiri', 'WBM 081226478', 'Proses Check Out. Nama Pelanggan: Karnoto No KTP: 123456Alamat: Konoha Telepon: 0813456789 No Kamar: 02 Tipe: AC Total Tagihan: Rp. 8000000', '2019-09-24 14:00:19', '2019-09-24 14:00:19');
/*!40000 ALTER TABLE `aktivitas_karyawan` ENABLE KEYS */;

-- membuang struktur untuk table hotel.blok
CREATE TABLE IF NOT EXISTS `blok` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_blok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hotel.blok: ~4 rows (lebih kurang)
DELETE FROM `blok`;
/*!40000 ALTER TABLE `blok` DISABLE KEYS */;
INSERT INTO `blok` (`id`, `nama_blok`, `deskripsi`, `created_at`, `updated_at`) VALUES
	(1, 'Blok I', 'Sebelah Barat', '2019-08-31 04:25:43', '2019-08-31 04:25:43'),
	(7, 'Blok II', 'utara', '2019-08-31 08:13:29', '2019-09-24 13:01:58'),
	(8, 'Blok III', 'timur', '2019-09-02 02:04:07', '2019-09-24 13:02:42'),
	(9, 'Blok IV', 'Kidul', '2019-09-24 13:03:19', '2019-09-24 13:03:19');
/*!40000 ALTER TABLE `blok` ENABLE KEYS */;

-- membuang struktur untuk table hotel.bookings
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_kamar` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `id_pelanggan` int(10) unsigned NOT NULL,
  `checkin_time` date DEFAULT NULL,
  `checkout_time` date DEFAULT NULL,
  `total` double NOT NULL,
  `lama_menginap` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hotel.bookings: ~9 rows (lebih kurang)
DELETE FROM `bookings`;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` (`id`, `id_kamar`, `id_user`, `id_pelanggan`, `checkin_time`, `checkout_time`, `total`, `lama_menginap`, `keterangan`, `active`, `created_at`, `updated_at`) VALUES
	(1, 7, 1, 5, '2019-09-03', '2019-09-10', 72000000, 8, 'Traveloka', 0, '2019-09-02 03:48:10', '2019-09-19 21:24:35'),
	(2, 1, 1, 8, '2019-09-03', '2019-09-07', 500000, 5, 'Via telepon', 0, '2019-09-02 05:40:28', '2019-09-07 08:51:16'),
	(3, 4, 1, 9, '2019-09-07', '2019-09-10', 8000000, 4, 'Langsung', 0, '2019-09-07 08:22:19', '2019-09-24 14:00:19'),
	(4, 7, 1, 10, '2019-09-09', '2019-09-12', 2000000, 4, 'Via telepon', 1, '2019-09-09 10:30:37', '2019-09-09 10:30:37'),
	(5, 1, 1, 11, '2019-09-09', '2019-09-10', 200000, 2, 'Via telepon', 0, '2019-09-09 10:54:16', '2019-09-24 13:57:01'),
	(6, 8, 1, 12, '2019-09-10', '2019-09-20', 1100000, 11, 'Langsung', 0, '2019-09-09 10:59:41', '2019-09-20 00:06:10'),
	(7, 7, 1, 13, '2019-09-20', '2019-09-20', 500000, 1, 'Traveloka', 0, '2019-09-20 00:01:35', '2019-09-20 00:04:16'),
	(8, 8, 1, 16, '2019-09-20', '2019-09-21', 200000, 2, 'Traveloka', 1, '2019-09-20 00:42:01', '2019-09-20 00:42:01'),
	(9, 10, 1, 8, '2019-09-24', '2019-09-25', 200000, 2, 'Traveloka', 1, '2019-09-24 13:56:20', '2019-09-24 13:56:20');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;

-- membuang struktur untuk table hotel.kamar
CREATE TABLE IF NOT EXISTS `kamar` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blok_id` int(11) NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `fasilitas` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hotel.kamar: ~5 rows (lebih kurang)
DELETE FROM `kamar`;
/*!40000 ALTER TABLE `kamar` DISABLE KEYS */;
INSERT INTO `kamar` (`id`, `no_kamar`, `lantai`, `blok_id`, `tipe`, `harga`, `fasilitas`, `active`, `created_at`, `updated_at`) VALUES
	(1, '01', '1', 1, 'AC', 100000, 'AC, Kasur, TV', 1, '2019-08-31 04:32:59', '2019-09-24 13:57:01'),
	(4, '02', '1', 1, 'AC', 2000000, 'AC, kasur', 1, '2019-08-31 08:05:56', '2019-09-24 14:00:19'),
	(7, '03', '1', 7, 'VIP', 500000, 'AC double, shower, TV', 1, '2019-08-31 08:18:42', '2019-09-20 00:04:16'),
	(8, '04', '2', 8, 'NON AC', 100000, 'Kipas angin, TV', 0, '2019-09-07 08:27:46', '2019-09-20 00:42:01'),
	(10, '05', '2', 8, 'NON AC', 100000, 'kipas angin, kasur, kamar mandi', 0, '2019-09-24 13:49:55', '2019-09-24 13:56:20');
/*!40000 ALTER TABLE `kamar` ENABLE KEYS */;

-- membuang struktur untuk table hotel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hotel.migrations: ~7 rows (lebih kurang)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(63, '2014_10_12_000000_create_users_table', 1),
	(64, '2014_10_12_100000_create_password_resets_table', 1),
	(65, '2019_08_08_071825_create_kamar_table', 1),
	(66, '2019_08_08_071916_create_bookings_table', 1),
	(67, '2019_08_10_051339_create_aktivitas_karyawan_table', 1),
	(68, '2019_08_14_040129_create_blok_table', 1),
	(69, '2019_08_20_040920_create_pelanggan_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table hotel.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hotel.password_resets: ~2 rows (lebih kurang)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('nss@email.com', '$2y$10$hEotAUV92k1.hfZXTCidDeBN5Rdu0lg7F9GMv46qoVDbGgjFGyno2', '2019-09-19 21:24:59'),
	('rofik@gmail.com', '$2y$10$sBwpDG3IVnxUMznb4WqUvuaj95GOPQnCBhqrXFDL1dYy6tXN7A2Gy', '2019-09-19 21:29:10');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table hotel.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_ktp` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hotel.pelanggan: ~13 rows (lebih kurang)
DELETE FROM `pelanggan`;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` (`id`, `no_ktp`, `nama`, `telp`, `alamat`, `created_at`, `updated_at`) VALUES
	(5, 999832762, 'Vina', '085608911601', 'Asgar', '2019-08-31 05:10:30', '2019-08-31 05:10:30'),
	(6, 999832762, 'Vina', '085608911601', 'Asgar', '2019-08-31 05:13:00', '2019-08-31 05:13:00'),
	(7, 999832762, 'Vina', '085608911601', 'Asgar', '2019-09-02 03:48:10', '2019-09-02 03:48:10'),
	(8, 93478439, 'Paino', '085689257341', 'Skh', '2019-09-02 05:40:28', '2019-09-02 05:40:28'),
	(9, 123456, 'Karnoto', '0813456789', 'Konoha', '2019-09-07 08:22:19', '2019-09-07 08:22:19'),
	(10, 911082131, 'Akeno', '081226435780', 'Jepun', '2019-09-09 10:30:37', '2019-09-09 10:30:37'),
	(11, 123456911, 'Atho', '08122881', 'Jagaraga', '2019-09-09 10:54:16', '2019-09-09 10:54:16'),
	(12, 911911, 'Emilia', '081234', 'Ngawi', '2019-09-09 10:59:41', '2019-09-09 10:59:41'),
	(13, 911082131, 'Rem', '08123456', 'Isekai', '2019-09-19 23:59:41', '2019-09-19 23:59:41'),
	(14, 911082131, 'Rem', '08123456', 'Isekai', '2019-09-20 00:01:25', '2019-09-20 00:01:25'),
	(15, 911082131, 'Rem', '08123456', 'Isekai', '2019-09-20 00:01:35', '2019-09-20 00:01:35'),
	(16, 12345677, 'Mukidi', '089123413', 'Sby', '2019-09-20 00:42:01', '2019-09-20 00:42:01'),
	(17, 123001012, 'Paino', '081231111', 'Solo', '2019-09-24 13:56:20', '2019-09-24 13:56:20');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;

-- membuang struktur untuk table hotel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Superuser','Admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel hotel.users: ~2 rows (lebih kurang)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `fullname`, `email`, `email_verified_at`, `password`, `jenis_kelamin`, `telp`, `alamat`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Nanas Sultan Sagiri', 'nss@email.com', NULL, '$2y$10$dbhf/kDLVpBXrOuZy1Jw5.sILHX/kzB/jD1hpWqjOZBpRzOa6ezW2', 'perempuan', '081226478', 'WBM', 'Superuser', NULL, NULL, NULL),
	(2, 'Rofik', 'rofik@gmail.com', NULL, '$2y$10$/Upu.55vzg/wzgjo0.O1W..XznMxwxPHyUB7dUdDBcELOOofgh1sq', 'laki-laki', '087765543321', 'Blora', 'Admin', NULL, '2019-09-19 20:52:46', '2019-09-19 20:52:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
