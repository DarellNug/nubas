-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2026 at 09:43 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grandbogor`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Botani & Konservasi', 'Kisah pelestarian cagar hayati, 340+ spesies flora langka, dan hutan pinus dataran tinggi Cisarua.', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(2, 'Relaksasi & Kebugaran', 'Pengalaman terapi tradisional Sunda Kuno di Lotus Spa Riverside dan sesi Sunrise Yoga.', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(3, 'Gastronomi Pasundan', 'Sajian farm-to-table berbahan organik lokal di Restoran Bumi Parahyangan.', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(4, 'Fasilitas & Rekreasi', 'Pembaruan fasilitas Salak Heated Pool, helipad sanctuary, dan event akbar Grand Ballroom.', '2026-09-13 06:49:14', '2026-09-13 06:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `housekeeping_logs`
--

CREATE TABLE `housekeeping_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `cleanliness_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'higienis_steril',
  `inspected_at` datetime DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `housekeeping_logs`
--

INSERT INTO `housekeeping_logs` (`id`, `room_id`, `user_id`, `cleanliness_status`, `inspected_at`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'higienis_steril', '2026-09-13 11:29:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(2, 2, 1, 'higienis_steril', '2026-09-13 11:17:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(3, 3, 1, 'higienis_steril', '2026-09-13 11:32:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(4, 4, 1, 'higienis_steril', '2026-09-13 13:32:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(5, 5, 1, 'higienis_steril', '2026-09-13 11:32:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(6, 6, 1, 'higienis_steril', '2026-09-13 11:49:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(7, 7, 1, 'higienis_steril', '2026-09-13 12:15:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(8, 8, 1, 'higienis_steril', '2026-09-13 11:44:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(9, 9, 1, 'higienis_steril', '2026-09-13 11:08:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(10, 10, 1, 'higienis_steril', '2026-09-13 11:38:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(11, 11, 1, 'higienis_steril', '2026-09-13 13:00:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(12, 12, 1, 'higienis_steril', '2026-09-13 12:41:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(13, 13, 1, 'higienis_steril', '2026-09-13 13:26:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(14, 14, 1, 'higienis_steril', '2026-09-13 11:12:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(15, 15, 1, 'higienis_steril', '2026-09-13 13:27:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(16, 16, 1, 'higienis_steril', '2026-09-13 13:14:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(17, 17, 1, 'higienis_steril', '2026-09-13 12:47:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(18, 18, 1, 'higienis_steril', '2026-09-13 12:50:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(19, 19, 1, 'higienis_steril', '2026-09-13 12:19:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(20, 20, 1, 'higienis_steril', '2026-09-13 11:58:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(21, 21, 1, 'higienis_steril', '2026-09-13 12:28:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(22, 22, 1, 'higienis_steril', '2026-09-13 11:35:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(23, 23, 1, 'higienis_steril', '2026-09-13 10:50:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(24, 24, 1, 'higienis_steril', '2026-09-13 12:42:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(25, 25, 1, 'higienis_steril', '2026-09-13 11:22:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(26, 26, 1, 'higienis_steril', '2026-09-13 11:34:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(27, 27, 1, 'higienis_steril', '2026-09-13 11:14:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(28, 28, 1, 'higienis_steril', '2026-09-13 11:05:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(29, 29, 1, 'higienis_steril', '2026-09-13 11:10:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(30, 30, 1, 'higienis_steril', '2026-09-13 13:03:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(31, 31, 1, 'higienis_steril', '2026-09-13 11:07:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(32, 32, 1, 'higienis_steril', '2026-09-13 11:49:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(33, 33, 1, 'higienis_steril', '2026-09-13 13:15:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(34, 34, 1, 'higienis_steril', '2026-09-13 12:35:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(35, 35, 1, 'higienis_steril', '2026-09-13 12:57:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(36, 36, 1, 'higienis_steril', '2026-09-13 10:57:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(37, 37, 1, 'higienis_steril', '2026-09-13 13:17:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(38, 38, 1, 'higienis_steril', '2026-09-13 11:31:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(39, 39, 1, 'higienis_steril', '2026-09-13 13:02:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(40, 40, 1, 'higienis_steril', '2026-09-13 11:47:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(41, 41, 1, 'higienis_steril', '2026-09-13 11:33:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(42, 42, 1, 'higienis_steril', '2026-09-13 12:17:14', 'Terverifikasi Higienis Steril standar internasional CHSE & Rumah Sakit (HEPA Filter).', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(43, 43, 1, 'sedang_pembersihan', '2026-09-13 12:55:14', 'Unit dalam proses pembersihan berkala dan pergantian linen jelang check-in jam 14:00.', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(44, 44, 1, 'sedang_pembersihan', '2026-09-13 13:15:14', 'Unit dalam proses pembersihan berkala dan pergantian linen jelang check-in jam 14:00.', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(45, 45, 1, 'sedang_pembersihan', '2026-09-13 11:05:14', 'Unit dalam proses pembersihan berkala dan pergantian linen jelang check-in jam 14:00.', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(46, 46, 1, 'sedang_pembersihan', '2026-09-13 13:33:14', 'Unit dalam proses pembersihan berkala dan pergantian linen jelang check-in jam 14:00.', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(47, 47, 1, 'sedang_pembersihan', '2026-09-13 11:23:14', 'Unit dalam proses pembersihan berkala dan pergantian linen jelang check-in jam 14:00.', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(48, 48, 1, 'sedang_pembersihan', '2026-09-13 11:43:14', 'Unit dalam proses pembersihan berkala dan pergantian linen jelang check-in jam 14:00.', '2026-09-13 06:49:14', '2026-09-13 06:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint UNSIGNED NOT NULL,
  `inquiry_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inquiry_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Reservasi Kamar',
  `is_vip` tinyint(1) NOT NULL DEFAULT '0',
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `guest_count` int UNSIGNED DEFAULT NULL,
  `special_requests` json DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'baru',
  `response_time_minutes` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `inquiry_code`, `room_id`, `name`, `email`, `phone`, `inquiry_type`, `is_vip`, `check_in_date`, `check_out_date`, `guest_count`, `special_requests`, `message`, `status`, `response_time_minutes`, `created_at`, `updated_at`) VALUES
(1, 'INQ-VIP-2026-001', 2, 'Bambang Wicaksono', 'bambang.w@jakartatech.vc', '+62 811 9876 5432', 'MICE / Korporat Gathering', 1, '2026-09-18', '2026-09-20', 120, '[\"VIP Shuttle / Pick-up\", \"Diet Halal / Vegan Chef\", \"Early Check-in Priority\"]', 'Pemesanan paket Annual Executive Leadership Retreat 3 hari 2 malam untuk 120 delegasi, termasuk penggunaan Grand Ballroom MICE tanpa pilar dan banquet hidangan Sunda autentik.', 'baru', 12, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(2, 'INQ-VIP-2026-002', 3, 'Kementerian Pariwisata & Ekonomi Kreatif RI', 'protokol@kemenparekraf.go.id', '+62 812 8888 1945', 'MICE / Korporat Gathering', 1, '2026-09-21', '2026-09-23', 80, '[\"VIP Shuttle / Pick-up\", \"Diet Halal / Vegan Chef\", \"Early Check-in Priority\"]', 'Permintaan penawaran MICE Gathering Nasional Program Sustainable Tourism. Memerlukan koordinasi keamanan VIP & fasilitas Helipad WRO-GBR untuk rombongan Menteri.', 'baru', 12, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(3, 'INQ-VIP-2026-003', 3, 'Dr. Raden H. Sasongko', 'sasongko.raden@medika.org', '+62 813 1122 3344', 'VIP / Helipad Charter', 1, '2026-09-24', '2026-09-26', 6, '[\"VIP Shuttle / Pick-up\", \"Diet Halal / Vegan Chef\", \"Early Check-in Priority\"]', 'Reservasi Presidential Pine Villa untuk liburan keluarga besar selama 4 malam. Mohon koordinasi kedatangan via helikopter carter dari Bandara Halim Perdanakusuma ke Helipad WRO-GBR.', 'baru', 12, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(4, 'INQ-VIP-2026-004', 2, 'Amelia Laksmono, B.Arch', 'amelia.laksmono@archstudio.id', '+62 818 7766 5544', 'Reservasi Kamar', 1, '2026-09-27', '2026-09-29', 2, '[\"VIP Shuttle / Pick-up\", \"Diet Halal / Vegan Chef\", \"Early Check-in Priority\"]', 'Reservasi romantic anniversary di Grand Executive Suite dengan paket Romantic / Honeymoon setup, Lotus Spa 90-minute treatment, dan romantic deck 5-course candle light dinner.', 'baru', 12, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(5, 'INQ-VIP-2026-005', 5, 'Direksi PT Bank Mandiri (Persero) Tbk', 'corporate.sec@bankmandiri.co.id', '+62 811 5566 7788', 'MICE / Korporat Gathering', 1, '2026-09-30', '2026-10-02', 45, '[\"VIP Shuttle / Pick-up\", \"Diet Halal / Vegan Chef\", \"Early Check-in Priority\"]', 'Permintaan blok reservasi 15 unit suite dan aula rapat eksklusif untuk acara Strategic BOD & BOC Meeting kuartal 4.', 'baru', 12, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(6, 'INQ-2026-006', 1, 'Dian Sastrowardoyo', 'dian.sastrowardoyo@example.com', '+62 812 4035 4067', 'Wedding & Acara', 0, '2026-09-29', '2026-10-04', 4, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Deluxe Forest View untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 18, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(7, 'INQ-2026-007', 2, 'Nicholas Saputra', 'nicholas.saputra@example.com', '+62 812 1892 4950', 'Reservasi Kamar', 0, '2026-09-29', '2026-10-07', 4, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Grand Executive Suite untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 11, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(8, 'INQ-2026-008', 3, 'Hendra Gunawan', 'hendra.gunawan@example.com', '+62 812 5486 9248', 'Lotus Spa & Wellness', 0, '2026-09-19', '2026-10-04', 4, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Presidential Pine Villa untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 15, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(9, 'INQ-2026-009', 4, 'Farah Quinn', 'farah.quinn@example.com', '+62 812 6461 1266', 'Wedding & Acara', 0, '2026-09-25', '2026-10-07', 4, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Junior Garden Suite untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 11, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(10, 'INQ-2026-010', 5, 'Budi Hartono', 'budi.hartono@example.com', '+62 812 9927 1447', 'Lotus Spa & Wellness', 0, '2026-09-19', '2026-10-06', 3, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Royal Family Residence untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 14, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(11, 'INQ-2026-011', 1, 'Siti Rahmawati', 'siti.rahmawati@example.com', '+62 812 2252 2076', 'Reservasi Kamar', 0, '2026-09-27', '2026-10-05', 3, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Deluxe Forest View untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 16, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(12, 'INQ-2026-012', 2, 'Denny Sumargo', 'denny.sumargo@example.com', '+62 812 3885 6592', 'Wedding & Acara', 0, '2026-10-03', '2026-10-08', 3, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Grand Executive Suite untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 11, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(13, 'INQ-2026-013', 3, 'Najwa Shihab', 'najwa.shihab@example.com', '+62 812 1083 1332', 'Reservasi Kamar', 0, '2026-09-30', '2026-10-04', 2, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Presidential Pine Villa untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 9, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(14, 'INQ-2026-014', 4, 'Indra Priawan', 'indra.priawan@example.com', '+62 812 7038 2004', 'Lotus Spa & Wellness', 0, '2026-09-20', '2026-10-07', 3, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Junior Garden Suite untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 14, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(15, 'INQ-2026-015', 5, 'Maudy Ayunda', 'maudy.ayunda@example.com', '+62 812 9093 7641', 'Wedding & Acara', 0, '2026-09-28', '2026-10-05', 2, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Royal Family Residence untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 16, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(16, 'INQ-2026-016', 1, 'Reza Rahadian', 'reza.rahadian@example.com', '+62 812 4883 6544', 'Lotus Spa & Wellness', 0, '2026-09-19', '2026-10-07', 4, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Deluxe Forest View untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 14, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(17, 'INQ-2026-017', 2, 'Prisia Nasution', 'prisia.nasution@example.com', '+62 812 9574 8755', 'Reservasi Kamar', 0, '2026-09-28', '2026-10-07', 4, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Grand Executive Suite untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 13, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(18, 'INQ-2026-018', 3, 'Adinia Wirasti', 'adinia.wirasti@example.com', '+62 812 3825 7640', 'Wedding & Acara', 0, '2026-09-17', '2026-10-04', 3, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Presidential Pine Villa untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 13, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(19, 'INQ-2026-019', 4, 'Chicco Jerikho', 'chicco.jerikho@example.com', '+62 812 2118 2999', 'Reservasi Kamar', 0, '2026-09-18', '2026-10-07', 3, '[\"Extra Bed Setup\", \"Romantic / Honeymoon\"]', 'Mohon informasi ketersediaan kamar Junior Garden Suite untuk akhir pekan beserta opsi paket makan malam santap botani.', 'baru', 9, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(20, 'INQ-20260918-278', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'reservation', 1, '2026-09-21', '2026-09-23', 3, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 'new', NULL, '2026-09-17 21:03:45', '2026-09-17 21:03:45'),
(21, 'INQ-20260918-139', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'reservation', 1, '2026-09-21', '2026-09-23', 3, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 'new', NULL, '2026-09-17 21:04:33', '2026-09-17 21:04:33'),
(22, 'INQ-20260918-349', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'reservation', 1, '2026-09-21', '2026-09-23', 3, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 'new', NULL, '2026-09-17 21:05:01', '2026-09-17 21:05:01'),
(23, 'INQ-20260918-693', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'reservation', 1, '2026-09-21', '2026-09-23', 3, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 'new', NULL, '2026-09-17 21:10:20', '2026-09-17 21:10:20'),
(24, 'INQ-20260918-560', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'reservation', 1, '2026-09-21', '2026-09-23', 3, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 'new', NULL, '2026-09-17 22:43:47', '2026-09-17 22:43:47'),
(25, 'INQ-20260918-136', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'reservation', 1, '2026-09-21', '2026-09-23', 3, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 'new', NULL, '2026-09-17 22:44:26', '2026-09-17 22:44:26'),
(26, 'INQ-20260918-395', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'reservation', 1, '2026-09-21', '2026-09-23', 3, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 'new', NULL, '2026-09-17 23:16:04', '2026-09-17 23:16:04'),
(27, 'INQ-20260918-188', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'reservation', 1, '2026-09-21', '2026-09-23', 3, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 'new', NULL, '2026-09-17 23:16:56', '2026-09-17 23:16:56'),
(28, 'INQ-20260918-236', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'reservation', 1, '2026-09-21', '2026-09-23', 3, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 'new', NULL, '2026-09-17 23:20:40', '2026-09-17 23:20:40'),
(29, 'INQ-20260918-793', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'reservation', 1, '2026-09-21', '2026-09-23', 3, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 'new', NULL, '2026-09-18 02:18:52', '2026-09-18 02:18:52'),
(30, 'INQ-20260918-118', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'reservation', 1, '2026-09-21', '2026-09-23', 3, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 'new', NULL, '2026-09-18 02:33:08', '2026-09-18 02:33:08'),
(31, 'INQ-20260918-856', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'reservation', 1, '2026-09-21', '2026-09-23', 3, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 'new', NULL, '2026-09-18 02:42:19', '2026-09-18 02:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_09_11_000001_create_room_categories_table', 1),
(5, '2026_09_11_000002_create_rooms_table', 1),
(6, '2026_09_11_000003_create_reservations_table', 1),
(7, '2026_09_11_000004_create_inquiries_table', 1),
(8, '2026_09_11_000005_create_housekeeping_logs_table', 1),
(9, '2026_09_13_000001_create_categories_table', 1),
(10, '2026_09_13_000002_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `image`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'posts/botani.jpg', 'Pesona Kebun Botani 12 Hektar: Menemukan Ketenangan Jiwa di Tengah Ratusan Pinus Merkusii', '<p>Grand Bogor Resort & Botanical Sanctuary bukan sekadar tempat menginap, melainkan suaka konservasi yang telah dirawat sejak 1998 di lereng bukit Cisarua. Dengan lebih dari 340 spesies flora tropis langka dan ribuan pohon pinus merkusii, setiap hembusan udara membawa aroma kesegaran alami yang meremajakan paru-paru.</p><p>Para tamu dapat menjelajahi jalur setapak batu andesit sepanjang 1,8 km sembari menikmati gemericik aliran sungai pegunungan alami. Suasana hening dan asri ini dirancang khusus untuk menyelaraskan kembali ritme jiwa di tengah pesona alam Parahyangan.</p>', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(2, 2, 'posts/spa.jpg', 'Lotus Spa & Wellness Ritual: Sentuhan Terapi Warisan Sunda Kuno di Tepi Sungai Alami', '<p>Rasakan kedamaian hakiki melalui Lotus Spa Paviliun Riverside. Terapi relaksasi kami memadukan racikan minyak asiri cengkih, serai wangi, serta lulur beras merah organik hasil panen lokal tanah Pasundan.</p><p>Dipandu oleh terapis bersertifikasi internasional (CIBTAC & CHSE), setiap sesi perawatan 90 menit diiringi gemericik riak air sungai alami Cisarua di paviliun semi-terbuka bernuansa bambu artistik. Memulihkan vitalitas tubuh dan ketenangan batin seutuhnya.</p>', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(3, 3, 'posts/kuliner.jpg', 'Cita Rasa Adiboga Pasundan: Sensasi Nasi Liwet Sunda Istimewa Bumi Parahyangan', '<p>Bumi Parahyangan Restaurant menyajikan harmoni kuliner warisan priangan berpadu teknik gastronomi kontemporer. Di bawah arahan Executive Chef Junaidi Hartono, setiap hidangan diolah dari bahan-bahan organik segar yang dipetik saat fajar dari kebun hidroponik resor.</p><p>Menu andalan kami, Nasi Liwet Sunda Istimewa, dimasak perlahan dalam kuali tembikar tradisional dengan paduan rempah pusaka, disajikan bersama lalapan segar dan sambal terasi bakar autentik yang menggugah selera.</p>', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(4, 4, 'posts/pool.jpg', 'Sensasi Berenang di Salak Heated Pool: Panorama 180 Derajat Menatap Kemegahan Gunung Salak', '<p>Nikmati kenyamanan berenang di Salak Heated Pool dengan suhu air termal hangat yang terkontrol konstan pada 34°C. Berada di tepi tebing resor, kolam infinity ini menawarkan pemandangan spektakuler 180 derajat ke arah lembah berkabut dan siluet megah Gunung Salak saat senja.</p><p>Air kolam dipasok langsung dari mata air purba pegunungan yang melalui sistem pemurnian ultrafiltrasi ganda, lembut di kulit tanpa aroma kaporit yang menyengat.</p>', '2026-09-13 06:49:14', '2026-09-13 06:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint UNSIGNED NOT NULL,
  `reservation_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `guest_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'KTP',
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `total_nights` int UNSIGNED NOT NULL DEFAULT '1',
  `total_adults` int UNSIGNED NOT NULL DEFAULT '2',
  `total_children` int UNSIGNED NOT NULL DEFAULT '0',
  `special_requests` json DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `total_amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `reservation_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'confirmed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `reservation_code`, `room_id`, `guest_name`, `guest_email`, `guest_phone`, `id_type`, `check_in_date`, `check_out_date`, `total_nights`, `total_adults`, `total_children`, `special_requests`, `notes`, `total_amount`, `payment_status`, `reservation_status`, `created_at`, `updated_at`) VALUES
(1, 'GBR-202609-0101', 2, 'Amelia Laksmono, B.Arch', 'amelia.laksmono@archstudio.id', '+62 818 7766 5544', 'KTP', '2026-09-12', '2026-09-15', 3, 2, 0, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Anniversary setup dengan penataan bunga mawar merah di kamar mandi marmer dan free botanical high-tea sore.', 10200000.00, 'paid', 'checked_in', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(2, 'GBR-202609-0102', 5, 'Bambang Wicaksono', 'bambang.w@jakartatech.vc', '+62 811 9876 5432', 'KTP', '2026-09-11', '2026-09-14', 3, 4, 1, '[\"Early Check-in Priority\", \"Diet Halal / Vegan Chef\"]', 'Permintaan kamar di lantai atas dengan pantry lengkap dan bebas asap rokok.', 15600000.00, 'paid', 'checked_in', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(3, 'GBR-202609-0103', 1, 'Raden Arya Wicaksana', 'raden.arya@domain.com', '+62 812 3456 7890', 'KTP', '2026-09-16', '2026-09-18', 2, 2, 0, '[\"VIP Shuttle / Pick-up\", \"Extra Bed Setup\"]', 'Mohon penjemputan dari Stasiun Bogor pukul 13:00 WIB.', 3700000.00, 'paid', 'confirmed', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(4, 'GBR-202609-0104', 4, 'Siti Nurhaliza & Rekan', 'siti.nurhaliza@resort.id', '+62 813 5544 3322', 'KTP', '2026-09-20', '2026-09-22', 2, 2, 1, '[\"Baby Cot / Crib\", \"Diet Halal / Vegan Chef\"]', 'Keluarga dengan bayi 8 bulan, butuh boks bayi steril dan menu MPASI tanpa garam.', 4300000.00, 'pending', 'pending', '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(5, 'GBR-RES-2026-3JF1X', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'KTP/Paspor', '2026-09-21', '2026-09-23', 2, 2, 1, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 3700000.00, 'pending', 'pending', '2026-09-17 21:03:45', '2026-09-17 21:03:45'),
(6, 'GBR-RES-2026-GZF0L', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'KTP/Paspor', '2026-09-21', '2026-09-23', 2, 2, 1, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 3700000.00, 'pending', 'pending', '2026-09-17 21:04:33', '2026-09-17 21:04:33'),
(7, 'GBR-RES-2026-K8EQK', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'KTP/Paspor', '2026-09-21', '2026-09-23', 2, 2, 1, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 3700000.00, 'pending', 'pending', '2026-09-17 21:05:01', '2026-09-17 21:05:01'),
(8, 'GBR-RES-2026-HXRDM', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'KTP/Paspor', '2026-09-21', '2026-09-23', 2, 2, 1, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 3700000.00, 'pending', 'pending', '2026-09-17 21:10:20', '2026-09-17 21:10:20'),
(9, 'GBR-RES-2026-AJRBE', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'KTP/Paspor', '2026-09-21', '2026-09-23', 2, 2, 1, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 3700000.00, 'pending', 'pending', '2026-09-17 22:43:47', '2026-09-17 22:43:47'),
(10, 'GBR-RES-2026-FVFBY', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'KTP/Paspor', '2026-09-21', '2026-09-23', 2, 2, 1, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 3700000.00, 'pending', 'pending', '2026-09-17 22:44:26', '2026-09-17 22:44:26'),
(11, 'GBR-RES-2026-FYFSF', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'KTP/Paspor', '2026-09-21', '2026-09-23', 2, 2, 1, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 3700000.00, 'pending', 'pending', '2026-09-17 23:16:04', '2026-09-17 23:16:04'),
(12, 'GBR-RES-2026-OJDGG', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'KTP/Paspor', '2026-09-21', '2026-09-23', 2, 2, 1, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 3700000.00, 'pending', 'pending', '2026-09-17 23:16:56', '2026-09-17 23:16:56'),
(13, 'GBR-RES-2026-M7B9I', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'KTP/Paspor', '2026-09-21', '2026-09-23', 2, 2, 1, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 3700000.00, 'pending', 'pending', '2026-09-17 23:20:40', '2026-09-17 23:20:40'),
(14, 'GBR-RES-2026-KVIVP', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'KTP/Paspor', '2026-09-21', '2026-09-23', 2, 2, 1, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 3700000.00, 'pending', 'pending', '2026-09-18 02:18:51', '2026-09-18 02:18:51'),
(15, 'GBR-RES-2026-NQNV3', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'KTP/Paspor', '2026-09-21', '2026-09-23', 2, 2, 1, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 3700000.00, 'pending', 'pending', '2026-09-18 02:33:08', '2026-09-18 02:33:08'),
(16, 'GBR-RES-2026-NUW2Y', 1, 'Bambang Kusuma', 'bambang.kusuma@example.com', '+62 812 9988 7766', 'KTP/Paspor', '2026-09-21', '2026-09-23', 2, 2, 1, '[\"Romantic / Honeymoon\", \"VIP Shuttle / Pick-up\"]', 'Mohon siapkan set bunga mawar dan jemputan dari stasiun Bogor.', 3700000.00, 'pending', 'pending', '2026-09-18 02:42:19', '2026-09-18 02:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `room_category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity_adults` int UNSIGNED NOT NULL DEFAULT '2',
  `capacity_children` int UNSIGNED NOT NULL DEFAULT '0',
  `price_per_night` decimal(12,2) NOT NULL,
  `price_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_sqm` int UNSIGNED DEFAULT NULL,
  `facilities` json DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tersedia',
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_category_id`, `name`, `code`, `location`, `capacity_adults`, `capacity_children`, `price_per_night`, `price_note`, `area_sqm`, `facilities`, `status`, `thumbnail`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Deluxe Forest', 'DF-102', 'Lt. 1 Sayap Pinus', 2, 0, 1850000.00, 'Termasuk Breakfast', 48, '[\"WiFi\", \"Forest Balcony\", \"Bathtub\"]', 'tersedia', 'rooms/deluxe_forest_view.jpg', 'Balkon privat langsung menghadap keteduhan hutan pinus dengan kasur King Koil Signature, shower mewah, dan panorama', 1, '2026-09-13 06:49:14', '2026-09-17 23:52:33'),
(2, 2, 'Grand Executive Suite', 'ES-304', 'Lt. 3 Menara Puncak', 3, 1, 3400000.00, 'Executive Lounge Access', 86, '[\"King Size\", \"Espresso Bar\", \"Jacuzzi\"]', 'terisi_in_house', 'rooms/grand_executive_suite.jpg', 'Ruang tamu terpisah, bathtub marmer freestanding dengan panorama gunung, serta akses istimewa ke Executive Lounge.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(3, 3, 'Presidential Pine Villa', 'PV-001', 'Private Villa Enclave', 6, 2, 7800000.00, 'Private Butler 24 Jam', 210, '[\"Private Pool\", \"Pine Sundeck\", \"24h Butler\"]', 'maintenance', 'rooms/presidential_pine_villa.jpg', 'Kenyamanan tanpa kompromi: 3 kamar tidur, kolam renang hangat pribadi, gazebo BBQ, dapur koki, dan layanan butler 24 jam.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(4, 4, 'Junior Garden Suite', 'JG-211', 'Lt. 2 Taman Anggrek', 2, 1, 2150000.00, 'Termasuk Breakfast', 62, '[\"Garden Patio\", \"Rain Shower\", \"Smart TV 55\\\"\"]', 'tersedia', 'rooms/junior_garden_suite.jpg', 'Teras langsung ke taman anggrek tropis dengan rain shower mewah dan interior kayu jati bernuansa Parahyangan.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(5, 5, 'Royal Family Residence', 'RF-501', 'Penthouse Level', 5, 2, 5200000.00, '2 Kamar Tidur + Pantry', 140, '[\"Kitchenette\", \"2 Bedroom\", \"Minibar\"]', 'terisi_checkout_besok', 'rooms/royal_family_residence.jpg', 'Hunian penthouse privat dengan dua kamar tidur besar, dapur kering modern (kitchenette), dan ruang santai keluarga yang megah.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(6, 2, 'Grand Executive Suite', 'ES-216', 'Lt. 2 Menara Puncak', 3, 0, 3400000.00, 'Executive Lounge Access', 86, '[\"King Size\", \"Espresso Bar\", \"Jacuzzi\"]', 'tersedia', 'rooms/grand_executive_suite.jpg', 'Unit santuari Grand Executive Suite di Grand Bogor Resort dengan privasi murni dan panorama alam nan asri.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(7, 3, 'Presidential Pine Villa', 'PV-317', 'Lt. 3 Private Villa Enclave', 6, 0, 7800000.00, 'Private Butler 24 Jam', 210, '[\"Private Pool\", \"Pine Sundeck\", \"24h Butler\"]', 'tersedia', 'rooms/presidential_pine_villa.jpg', 'Unit santuari Presidential Pine Villa di Grand Bogor Resort dengan privasi murni dan panorama alam nan asri.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(8, 4, 'Junior Garden Suite', 'JG-118', 'Lt. 1 Taman Anggrek', 2, 0, 2150000.00, 'Termasuk Breakfast', 62, '[\"Garden Patio\", \"Rain Shower\", \"Smart TV 55\\\"\"]', 'tersedia', 'rooms/junior_garden_suite.jpg', 'Unit santuari Junior Garden Suite di Grand Bogor Resort dengan privasi murni dan panorama alam nan asri.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(9, 5, 'Royal Family Residence', 'RF-219', 'Lt. 2 Penthouse Level', 5, 0, 5200000.00, '2 Kamar Tidur + Pantry', 140, '[\"Kitchenette\", \"2 Bedroom\", \"Minibar\"]', 'tersedia', 'rooms/royal_family_residence.jpg', 'Unit santuari Royal Family Residence di Grand Bogor Resort dengan privasi murni dan panorama alam nan asri.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(10, 1, 'Deluxe Forest View', 'DF-320', 'Lt. 3 Sayap Pinus', 2, 0, 1850000.00, 'Termasuk Breakfast', 48, '[\"WiFi\", \"Forest Balcony\", \"Bathtub\"]', 'tersedia', 'rooms/deluxe_forest_view.jpg', 'Unit santuari Deluxe Forest View di Grand Bogor Resort dengan privasi murni dan panorama alam nan asri.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(11, 2, 'Grand Executive Suite', 'ES-121', 'Lt. 1 Menara Puncak', 3, 0, 3400000.00, 'Executive Lounge Access', 86, '[\"King Size\", \"Espresso Bar\", \"Jacuzzi\"]', 'tersedia', 'rooms/grand_executive_suite.jpg', 'Unit santuari Grand Executive Suite di Grand Bogor Resort dengan privasi murni dan panorama alam nan asri.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(12, 3, 'Presidential Pine Villa', 'PV-002', 'Private Villa Enclave', 6, 2, 7800000.00, 'Private Butler 24 Jam', 210, '[\"Private Pool\", \"Pine Sundeck\", \"24h Butler\"]', 'maintenance', 'rooms/presidential_pine_villa.jpg', 'Unit vila sedang dalam pemeliharaan berkala sistem filtrasi termal kolam renang air hangat.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(13, 2, 'Grand Executive Suite', 'ES-231', 'Lt. 2 Menara Puncak', 3, 0, 3400000.00, 'Executive Lounge Access', 86, '[\"King Size\", \"Espresso Bar\", \"Jacuzzi\"]', 'terisi_in_house', 'rooms/grand_executive_suite.jpg', 'Unit santuari Grand Executive Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(14, 3, 'Presidential Pine Villa', 'PV-332', 'Lt. 3 Private Villa Enclave', 6, 1, 7800000.00, 'Private Butler 24 Jam', 210, '[\"Private Pool\", \"Pine Sundeck\", \"24h Butler\"]', 'terisi_in_house', 'rooms/presidential_pine_villa.jpg', 'Unit santuari Presidential Pine Villa sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(15, 4, 'Junior Garden Suite', 'JG-433', 'Lt. 4 Taman Anggrek', 2, 0, 2150000.00, 'Termasuk Breakfast', 62, '[\"Garden Patio\", \"Rain Shower\", \"Smart TV 55\\\"\"]', 'terisi_in_house', 'rooms/junior_garden_suite.jpg', 'Unit santuari Junior Garden Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(16, 5, 'Royal Family Residence', 'RF-134', 'Lt. 1 Penthouse Level', 5, 1, 5200000.00, '2 Kamar Tidur + Pantry', 140, '[\"Kitchenette\", \"2 Bedroom\", \"Minibar\"]', 'terisi_checkout_besok', 'rooms/royal_family_residence.jpg', 'Unit santuari Royal Family Residence sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(17, 1, 'Deluxe Forest View', 'DF-235', 'Lt. 2 Sayap Pinus', 2, 0, 1850000.00, 'Termasuk Breakfast', 48, '[\"WiFi\", \"Forest Balcony\", \"Bathtub\"]', 'terisi_in_house', 'rooms/deluxe_forest_view.jpg', 'Unit santuari Deluxe Forest View sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(18, 2, 'Grand Executive Suite', 'ES-336', 'Lt. 3 Menara Puncak', 3, 1, 3400000.00, 'Executive Lounge Access', 86, '[\"King Size\", \"Espresso Bar\", \"Jacuzzi\"]', 'terisi_in_house', 'rooms/grand_executive_suite.jpg', 'Unit santuari Grand Executive Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(19, 3, 'Presidential Pine Villa', 'PV-437', 'Lt. 4 Private Villa Enclave', 6, 0, 7800000.00, 'Private Butler 24 Jam', 210, '[\"Private Pool\", \"Pine Sundeck\", \"24h Butler\"]', 'terisi_in_house', 'rooms/presidential_pine_villa.jpg', 'Unit santuari Presidential Pine Villa sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(20, 4, 'Junior Garden Suite', 'JG-138', 'Lt. 1 Taman Anggrek', 2, 1, 2150000.00, 'Termasuk Breakfast', 62, '[\"Garden Patio\", \"Rain Shower\", \"Smart TV 55\\\"\"]', 'terisi_checkout_besok', 'rooms/junior_garden_suite.jpg', 'Unit santuari Junior Garden Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(21, 5, 'Royal Family Residence', 'RF-239', 'Lt. 2 Penthouse Level', 5, 0, 5200000.00, '2 Kamar Tidur + Pantry', 140, '[\"Kitchenette\", \"2 Bedroom\", \"Minibar\"]', 'terisi_in_house', 'rooms/royal_family_residence.jpg', 'Unit santuari Royal Family Residence sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(22, 1, 'Deluxe Forest View', 'DF-340', 'Lt. 3 Sayap Pinus', 2, 1, 1850000.00, 'Termasuk Breakfast', 48, '[\"WiFi\", \"Forest Balcony\", \"Bathtub\"]', 'terisi_in_house', 'rooms/deluxe_forest_view.jpg', 'Unit santuari Deluxe Forest View sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(23, 2, 'Grand Executive Suite', 'ES-441', 'Lt. 4 Menara Puncak', 3, 0, 3400000.00, 'Executive Lounge Access', 86, '[\"King Size\", \"Espresso Bar\", \"Jacuzzi\"]', 'terisi_in_house', 'rooms/grand_executive_suite.jpg', 'Unit santuari Grand Executive Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(24, 3, 'Presidential Pine Villa', 'PV-142', 'Lt. 1 Private Villa Enclave', 6, 1, 7800000.00, 'Private Butler 24 Jam', 210, '[\"Private Pool\", \"Pine Sundeck\", \"24h Butler\"]', 'terisi_checkout_besok', 'rooms/presidential_pine_villa.jpg', 'Unit santuari Presidential Pine Villa sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(25, 4, 'Junior Garden Suite', 'JG-243', 'Lt. 2 Taman Anggrek', 2, 0, 2150000.00, 'Termasuk Breakfast', 62, '[\"Garden Patio\", \"Rain Shower\", \"Smart TV 55\\\"\"]', 'terisi_in_house', 'rooms/junior_garden_suite.jpg', 'Unit santuari Junior Garden Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(26, 5, 'Royal Family Residence', 'RF-344', 'Lt. 3 Penthouse Level', 5, 1, 5200000.00, '2 Kamar Tidur + Pantry', 140, '[\"Kitchenette\", \"2 Bedroom\", \"Minibar\"]', 'terisi_in_house', 'rooms/royal_family_residence.jpg', 'Unit santuari Royal Family Residence sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(27, 1, 'Deluxe Forest View', 'DF-445', 'Lt. 4 Sayap Pinus', 2, 0, 1850000.00, 'Termasuk Breakfast', 48, '[\"WiFi\", \"Forest Balcony\", \"Bathtub\"]', 'terisi_in_house', 'rooms/deluxe_forest_view.jpg', 'Unit santuari Deluxe Forest View sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(28, 2, 'Grand Executive Suite', 'ES-146', 'Lt. 1 Menara Puncak', 3, 1, 3400000.00, 'Executive Lounge Access', 86, '[\"King Size\", \"Espresso Bar\", \"Jacuzzi\"]', 'terisi_checkout_besok', 'rooms/grand_executive_suite.jpg', 'Unit santuari Grand Executive Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(29, 3, 'Presidential Pine Villa', 'PV-247', 'Lt. 2 Private Villa Enclave', 6, 0, 7800000.00, 'Private Butler 24 Jam', 210, '[\"Private Pool\", \"Pine Sundeck\", \"24h Butler\"]', 'terisi_in_house', 'rooms/presidential_pine_villa.jpg', 'Unit santuari Presidential Pine Villa sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(30, 4, 'Junior Garden Suite', 'JG-348', 'Lt. 3 Taman Anggrek', 2, 1, 2150000.00, 'Termasuk Breakfast', 62, '[\"Garden Patio\", \"Rain Shower\", \"Smart TV 55\\\"\"]', 'terisi_in_house', 'rooms/junior_garden_suite.jpg', 'Unit santuari Junior Garden Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(31, 5, 'Royal Family Residence', 'RF-449', 'Lt. 4 Penthouse Level', 5, 0, 5200000.00, '2 Kamar Tidur + Pantry', 140, '[\"Kitchenette\", \"2 Bedroom\", \"Minibar\"]', 'terisi_in_house', 'rooms/royal_family_residence.jpg', 'Unit santuari Royal Family Residence sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(32, 1, 'Deluxe Forest View', 'DF-150', 'Lt. 1 Sayap Pinus', 2, 1, 1850000.00, 'Termasuk Breakfast', 48, '[\"WiFi\", \"Forest Balcony\", \"Bathtub\"]', 'terisi_checkout_besok', 'rooms/deluxe_forest_view.jpg', 'Unit santuari Deluxe Forest View sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(33, 2, 'Grand Executive Suite', 'ES-251', 'Lt. 2 Menara Puncak', 3, 0, 3400000.00, 'Executive Lounge Access', 86, '[\"King Size\", \"Espresso Bar\", \"Jacuzzi\"]', 'terisi_in_house', 'rooms/grand_executive_suite.jpg', 'Unit santuari Grand Executive Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(34, 3, 'Presidential Pine Villa', 'PV-352', 'Lt. 3 Private Villa Enclave', 6, 1, 7800000.00, 'Private Butler 24 Jam', 210, '[\"Private Pool\", \"Pine Sundeck\", \"24h Butler\"]', 'terisi_in_house', 'rooms/presidential_pine_villa.jpg', 'Unit santuari Presidential Pine Villa sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(35, 4, 'Junior Garden Suite', 'JG-453', 'Lt. 4 Taman Anggrek', 2, 0, 2150000.00, 'Termasuk Breakfast', 62, '[\"Garden Patio\", \"Rain Shower\", \"Smart TV 55\\\"\"]', 'terisi_in_house', 'rooms/junior_garden_suite.jpg', 'Unit santuari Junior Garden Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(36, 5, 'Royal Family Residence', 'RF-154', 'Lt. 1 Penthouse Level', 5, 1, 5200000.00, '2 Kamar Tidur + Pantry', 140, '[\"Kitchenette\", \"2 Bedroom\", \"Minibar\"]', 'terisi_checkout_besok', 'rooms/royal_family_residence.jpg', 'Unit santuari Royal Family Residence sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(37, 1, 'Deluxe Forest View', 'DF-255', 'Lt. 2 Sayap Pinus', 2, 0, 1850000.00, 'Termasuk Breakfast', 48, '[\"WiFi\", \"Forest Balcony\", \"Bathtub\"]', 'terisi_in_house', 'rooms/deluxe_forest_view.jpg', 'Unit santuari Deluxe Forest View sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(38, 2, 'Grand Executive Suite', 'ES-356', 'Lt. 3 Menara Puncak', 3, 1, 3400000.00, 'Executive Lounge Access', 86, '[\"King Size\", \"Espresso Bar\", \"Jacuzzi\"]', 'terisi_in_house', 'rooms/grand_executive_suite.jpg', 'Unit santuari Grand Executive Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(39, 3, 'Presidential Pine Villa', 'PV-457', 'Lt. 4 Private Villa Enclave', 6, 0, 7800000.00, 'Private Butler 24 Jam', 210, '[\"Private Pool\", \"Pine Sundeck\", \"24h Butler\"]', 'terisi_in_house', 'rooms/presidential_pine_villa.jpg', 'Unit santuari Presidential Pine Villa sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(40, 4, 'Junior Garden Suite', 'JG-158', 'Lt. 1 Taman Anggrek', 2, 1, 2150000.00, 'Termasuk Breakfast', 62, '[\"Garden Patio\", \"Rain Shower\", \"Smart TV 55\\\"\"]', 'terisi_checkout_besok', 'rooms/junior_garden_suite.jpg', 'Unit santuari Junior Garden Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(41, 5, 'Royal Family Residence', 'RF-259', 'Lt. 2 Penthouse Level', 5, 0, 5200000.00, '2 Kamar Tidur + Pantry', 140, '[\"Kitchenette\", \"2 Bedroom\", \"Minibar\"]', 'terisi_in_house', 'rooms/royal_family_residence.jpg', 'Unit santuari Royal Family Residence sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(42, 1, 'Deluxe Forest View', 'DF-360', 'Lt. 3 Sayap Pinus', 2, 1, 1850000.00, 'Termasuk Breakfast', 48, '[\"WiFi\", \"Forest Balcony\", \"Bathtub\"]', 'terisi_in_house', 'rooms/deluxe_forest_view.jpg', 'Unit santuari Deluxe Forest View sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(43, 2, 'Grand Executive Suite', 'ES-461', 'Lt. 4 Menara Puncak', 3, 0, 3400000.00, 'Executive Lounge Access', 86, '[\"King Size\", \"Espresso Bar\", \"Jacuzzi\"]', 'terisi_in_house', 'rooms/grand_executive_suite.jpg', 'Unit santuari Grand Executive Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(44, 3, 'Presidential Pine Villa', 'PV-162', 'Lt. 1 Private Villa Enclave', 6, 1, 7800000.00, 'Private Butler 24 Jam', 210, '[\"Private Pool\", \"Pine Sundeck\", \"24h Butler\"]', 'terisi_checkout_besok', 'rooms/presidential_pine_villa.jpg', 'Unit santuari Presidential Pine Villa sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(45, 4, 'Junior Garden Suite', 'JG-263', 'Lt. 2 Taman Anggrek', 2, 0, 2150000.00, 'Termasuk Breakfast', 62, '[\"Garden Patio\", \"Rain Shower\", \"Smart TV 55\\\"\"]', 'terisi_in_house', 'rooms/junior_garden_suite.jpg', 'Unit santuari Junior Garden Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(46, 5, 'Royal Family Residence', 'RF-364', 'Lt. 3 Penthouse Level', 5, 1, 5200000.00, '2 Kamar Tidur + Pantry', 140, '[\"Kitchenette\", \"2 Bedroom\", \"Minibar\"]', 'terisi_in_house', 'rooms/royal_family_residence.jpg', 'Unit santuari Royal Family Residence sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(47, 1, 'Deluxe Forest View', 'DF-465', 'Lt. 4 Sayap Pinus', 2, 0, 1850000.00, 'Termasuk Breakfast', 48, '[\"WiFi\", \"Forest Balcony\", \"Bathtub\"]', 'terisi_in_house', 'rooms/deluxe_forest_view.jpg', 'Unit santuari Deluxe Forest View sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(48, 2, 'Grand Executive Suite', 'ES-166', 'Lt. 1 Menara Puncak', 3, 1, 3400000.00, 'Executive Lounge Access', 86, '[\"King Size\", \"Espresso Bar\", \"Jacuzzi\"]', 'terisi_checkout_besok', 'rooms/grand_executive_suite.jpg', 'Unit santuari Grand Executive Suite sedang dihuni oleh tamu kehormatan Grand Bogor Resort.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `name`, `slug`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Deluxe Room', 'deluxe-room', 'Koleksi kamar mewah berpanorama lembah pinus dengan balkon privat dan kasur King Koil Signature.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(2, 'Grand Executive Suite', 'grand-executive-suite', 'Suite luas dengan bathtub marmer freestanding, ruang duduk elegan, dan akses VIP Lounge.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(3, 'Presidential Pine Villa', 'presidential-pine-villa', 'Vila privat 3 kamar dengan kolam renang air hangat alami, gazebo BBQ, dan private butler 24 jam.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(4, 'Junior Garden Suite', 'junior-garden-suite', 'Suite nyaman berteras taman anggrek tropis dengan rain shower mewah dan sentuhan kayu jati alami.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14'),
(5, 'Royal Family Residence', 'royal-family-residence', 'Penthouse residensial 2 kamar tidur dengan dapur koki kering (kitchenette) dan ruang keluarga megah.', 1, '2026-09-13 06:49:14', '2026-09-13 06:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ipcaCwLuGn0h829CyqGTE9bHxxpuSGppZ7C2XccY', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibDZuT3hNYWg1UHBFNGNOeGNrRDVQbTl5dzZCQ0YxeFpvdmR0dEZaYyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7czo1OiJyb3V0ZSI7czozMDoiZmlsYW1lbnQuYWRtaW4ucGFnZXMuZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2NDoiNmY5ZGUzYjMxNDc5M2Y2MzcxNWIyZGNkNGNkMjAxMjQxM2JiNzM4OTkyY2Q4YmQxZDcxM2E3YWZiYjgwYWQ0NCI7fQ==', 1789723292),
('IXfH9pRQzSo6atNYEqUs7Mx6RAsXtQi4BpTDCcfd', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiZzZhbTVlTXVMeFMydHZOdWJyeTBJcHdMOXBrQmY0R3RadlZiNmlPOSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjQ6IjZmOWRlM2IzMTQ3OTNmNjM3MTViMmRjZDRjZDIwMTI0MTNiYjczODk5MmNkOGJkMWQ3MTNhN2FmYmI4MGFkNDQiO3M6NjoidGFibGVzIjthOjU6e3M6NDA6Ijg2MDlmZTJkOTFiOWE1YjJhNThhYjU5MjYzMzk5ZmU2X2NvbHVtbnMiO2E6Njp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjk6InRodW1ibmFpbCI7czo1OiJsYWJlbCI7czo5OiJUSFVNQk5BSUwiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjQ6Im5hbWUiO3M6NToibGFiZWwiO3M6MjM6IkRFVEFJTCBLQU1BUiAmYW1wOyBLT0RFIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxNjoiY2FwYWNpdHlfZGlzcGxheSI7czo1OiJsYWJlbCI7czo5OiJLQVBBU0lUQVMiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTozO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjE1OiJwcmljZV9wZXJfbmlnaHQiO3M6NToibGFiZWwiO3M6MTM6IlRBUklGIC8gTUFMQU0iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJmYWNpbGl0aWVzIjtzOjU6ImxhYmVsIjtzOjE1OiJGQVNJTElUQVMgVVRBTUEiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjY6InN0YXR1cyI7czo1OiJsYWJlbCI7czo2OiJTVEFUVVMiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9fXM6NDA6IjZjNDdlMWQxNWUwZjA4OTUzNDFjNzdhZmViZTcxZjUyX2NvbHVtbnMiO2E6Nzp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjE2OiJyZXNlcnZhdGlvbl9jb2RlIjtzOjU6ImxhYmVsIjtzOjEyOiJLT0RFIEJPT0tJTkciO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJndWVzdF9uYW1lIjtzOjU6ImxhYmVsIjtzOjk6IkRBVEEgVEFNVSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6OToicm9vbS5uYW1lIjtzOjU6ImxhYmVsIjtzOjE3OiJLQU1BUiAmYW1wOyBTQVlBUCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NjoicGVyaW9kIjtzOjU6ImxhYmVsIjtzOjE2OiJQRVJJT0RFIE1FTkdJTkFQIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMjoidG90YWxfYW1vdW50IjtzOjU6ImxhYmVsIjtzOjExOiJUT1RBTCBUQVJJRiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjU7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTQ6InBheW1lbnRfc3RhdHVzIjtzOjU6ImxhYmVsIjtzOjEwOiJQRU1CQVlBUkFOIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxODoicmVzZXJ2YXRpb25fc3RhdHVzIjtzOjU6ImxhYmVsIjtzOjY6IlNUQVRVUyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO319czo0MDoiYTYwN2NkYTczY2JkZTQ0NmY4YmI2NGNjZDc1NjA2ZWVfY29sdW1ucyI7YTo0OntpOjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NToiaW1hZ2UiO3M6NToibGFiZWwiO3M6NDoiRk9UTyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NToidGl0bGUiO3M6NToibGFiZWwiO3M6MTM6IkpVRFVMIEFSVElLRUwiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToyO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEzOiJjYXRlZ29yeS5uYW1lIjtzOjU6ImxhYmVsIjtzOjg6IktBVEVHT1JJIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY3JlYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMzoiVEFOR0dBTCBSSUxJUyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO319czo0MDoiZGRjMWQwOGViZWZhNjUyMjkwM2FiMWYzN2MzY2I4YWNfY29sdW1ucyI7YTo0OntpOjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NDoibmFtZSI7czo1OiJsYWJlbCI7czoxMzoiTkFNQSBLQVRFR09SSSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjU6ImxhYmVsIjtzOjk6IkRFU0tSSVBTSSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTE6InBvc3RzX2NvdW50IjtzOjU6ImxhYmVsIjtzOjExOiJKVU1MQUggUE9TVCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTE6IkRJQlVBVCBQQURBIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fXM6NDA6IjYxMDYzNDFlMTc1M2RlNGU5YWI3ZjdjODM3Y2RlYmNhX2NvbHVtbnMiO2E6NTp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjQ6Im5hbWUiO3M6NToibGFiZWwiO3M6NDoiTmFtZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NDoic2x1ZyI7czo1OiJsYWJlbCI7czo0OiJTbHVnIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo5OiJpc19hY3RpdmUiO3M6NToibGFiZWwiO3M6OToiSXMgYWN0aXZlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY3JlYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiQ3JlYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fWk6NDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoidXBkYXRlZF9hdCI7czo1OiJsYWJlbCI7czoxMDoiVXBkYXRlZCBhdCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fX19czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1789715336),
('J7ytlniULIduriGPbjOLJIx2Vx7FCxvDGnLAzx0W', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.9444', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidzdMemJLTmVNWHlhTFp5aFJyUUduaThVN3dobktqQlh3Y0lWWWNDMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjEvZ3JhbmRCb2dvci9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1789723153),
('jU1oL9qVMb8jiTlm3KEzZDviZhmxffM5p8J9EQxw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.9444', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUk9SdllWR3p0eEdXZHpTQm9DdnQ3Y05lbXF5ek9PZEdPcDR6dG5yMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjEvZ3JhbmRCb2dvci9wdWJsaWMiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1789712397);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Raden Arya Wicaksono, CHA', 'admin@grandbogorresort.id', '2026-09-13 06:49:13', '$2y$12$YoqnLoMxQX1APRIWynXwJO4h7annhRH9Y/bXmLHnMzmfPrKklYd6W', 'DVPzwXwgJlfQfaDPf0kNXfG6Enrwk69P59YvGZPOrCqhfMIXJ0WvQet0gpuq', '2026-09-13 06:49:13', '2026-09-13 06:49:13'),
(2, 'Darell Nugraha', 'darell.nugraha30@gmail.com', '2026-09-13 06:49:14', '$2y$12$ZmRhB.nL.MlmNUguUFh7oOW2L1yCeiVN9VCtnE6zpRID1Vzg1WLlO', NULL, '2026-09-13 06:49:14', '2026-09-13 06:49:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `housekeeping_logs`
--
ALTER TABLE `housekeeping_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `housekeeping_logs_room_id_foreign` (`room_id`),
  ADD KEY `housekeeping_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inquiries_inquiry_code_unique` (`inquiry_code`),
  ADD KEY `inquiries_room_id_foreign` (`room_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reservations_reservation_code_unique` (`reservation_code`),
  ADD KEY `reservations_room_id_foreign` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_code_unique` (`code`),
  ADD KEY `rooms_room_category_id_foreign` (`room_category_id`);

--
-- Indexes for table `room_categories`
--
ALTER TABLE `room_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_categories_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `housekeeping_logs`
--
ALTER TABLE `housekeeping_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `housekeeping_logs`
--
ALTER TABLE `housekeeping_logs`
  ADD CONSTRAINT `housekeeping_logs_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `housekeeping_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_room_category_id_foreign` FOREIGN KEY (`room_category_id`) REFERENCES `room_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
