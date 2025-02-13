-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2025 at 01:25 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id_division` bigint(20) UNSIGNED NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id_division`, `division`, `created_at`, `updated_at`) VALUES
(1, 'IT', NULL, NULL),
(2, 'Infrastructure', NULL, NULL),
(3, 'Design', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_09_17_174244_create_p_project_table', 1),
(3, '2024_10_08_072940_create_p_project_kantong', 1),
(4, '2024_10_09_042001_p_project_acc_kantong', 1),
(5, '2024_10_09_042953_p_project_entry', 1),
(6, '2024_10_09_043017_p_project_exit', 1),
(7, '2024_10_09_043031_p_project_rambu', 1),
(8, '2024_10_09_043056_p_project_admin', 1),
(9, '2024_11_12_035244_create_roles_table', 1),
(10, '2024_11_12_035324_create_divisions_table', 1),
(11, '2024_11_12_035345_create_users_table', 1),
(12, '2024_11_15_084856_tasks', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_project`
--

CREATE TABLE `p_project` (
  `id_project` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_live_project` date DEFAULT NULL,
  `sistem_operasional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cashflow` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kerjasama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_asset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_project`
--

INSERT INTO `p_project` (`id_project`, `project_name`, `project_code`, `perusahaan`, `pic`, `bidang_usaha`, `alamat`, `target_live_project`, `sistem_operasional`, `cashflow`, `jenis_kerjasama`, `status_asset`, `project_category`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gandaria City', 'GANCIT', 'PT Gancit', 'Moses', 'Mall', 'Jl. Sultan Iskandar Muda, Gandaria, Kec. Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12240', '2025-04-24', 'Tap In Tap Out', 'Bank Mandiri', 'Revenue Sharing', 'Disewakan', 'Bronze', 'On-going', '2025-01-23 09:39:05', '2025-02-13 06:56:41'),
(2, 'Kuningan City', 'KUNCIT', 'PT Kuncit', 'Moses', 'Office', 'Jl. Prof. DR. Satrio No.Kav. 18, Kuningan, Karet Kuningan, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12940', '2025-05-16', 'Tap In Tap Out', 'Bank Mandiri', 'Revenue Sharing', 'Disewakan', 'Bronze', 'New Project', '2025-02-13 06:35:05', '2025-02-13 06:36:06'),
(3, 'Grand Indonesia', 'GI', 'PT GI', 'Moses', 'Mall', 'Jalan M.H. Thamrin No.1, RT.1/RW.5 Kelurahan Menteng, Kecamatan Menteng, Jakarta Pusat 10310', '2025-05-23', 'Semi Tap in Tap Out', 'Bank Mandiri', 'Revenue Sharing', 'Disewakan', 'Bronze', 'New Project', '2025-02-13 06:54:05', '2025-02-13 06:54:05'),
(4, 'Tes', 'Tes', 'Tes', 'Tes', 'Others', 'Tes', '2025-05-29', 'Tes', 'Tes', 'Tes', 'Tes', 'Bronze', 'New Project', '2025-02-13 07:34:17', '2025-02-13 07:34:17'),
(5, '1', '1', '1', '1', 'Office', '1', '2025-02-20', '1', '1', '1', '1', 'Bronze', 'New Project', '2025-02-13 11:53:19', '2025-02-13 11:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `p_project_acc_kantong`
--

CREATE TABLE `p_project_acc_kantong` (
  `id_access` bigint(20) UNSIGNED NOT NULL,
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kantong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kendaraan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_access` int(11) DEFAULT NULL,
  `exit_access` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_project_acc_kantong`
--

INSERT INTO `p_project_acc_kantong` (`id_access`, `project_code`, `nama_kantong`, `jenis_kendaraan`, `entry_access`, `exit_access`, `created_at`, `updated_at`) VALUES
(1, 'GANCIT', 'Parkir A', 'Car', 1, 1, '2025-02-11 09:39:55', '2025-02-11 09:39:55'),
(2, 'GANCIT', 'Parkir B', 'Box Truck', 1, 2, '2025-02-11 09:39:55', '2025-02-11 09:39:55'),
(3, 'GANCIT', 'Parkir A', 'Box Truck', 1, 1, '2025-02-11 09:40:37', '2025-02-11 09:40:37'),
(4, 'GANCIT', 'Parkir B', 'Car', 1, 1, '2025-02-11 09:40:37', '2025-02-11 09:40:37'),
(5, 'KUNCIT', 'Parkir 1', 'Car', 1, 1, '2025-02-13 06:35:15', '2025-02-13 06:35:15'),
(6, 'GI', 'Parkir PE', 'Car', 1, 1, '2025-02-13 06:54:21', '2025-02-13 06:54:21'),
(7, 'Tes', 'Parkir 1', 'Car', 1, 1, '2025-02-13 07:34:25', '2025-02-13 07:34:25'),
(8, '1', 'Parkir A', 'Car', 1, 1, '2025-02-13 11:53:36', '2025-02-13 11:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `p_project_admin`
--

CREATE TABLE `p_project_admin` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kantong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_project_admin`
--

INSERT INTO `p_project_admin` (`id_admin`, `project_code`, `nama_kantong`, `nama_item`, `quantity`, `status`, `bukti_foto`, `created_at`, `updated_at`) VALUES
(1, 'GANCIT', 'Parkir B', 'PC Server', 1, NULL, NULL, '2025-02-11 09:41:52', '2025-02-11 09:41:52'),
(2, 'GANCIT', 'Parkir B', 'PC Admin', 1, NULL, NULL, '2025-02-11 09:41:52', '2025-02-11 09:41:52'),
(3, 'KUNCIT', 'Parkir 1', 'PC Server', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(4, 'KUNCIT', 'Parkir 1', 'PC Admin', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(5, 'KUNCIT', 'Parkir 1', 'CPU Workstation for Remote Server', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(6, 'KUNCIT', 'Parkir 1', 'Printer Admin Epson LX - 310', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(7, 'KUNCIT', 'Parkir 1', 'QR Barcode Scanner Honeywell', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(8, 'KUNCIT', 'Parkir 1', 'Card Reader MSI Entry', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(9, 'KUNCIT', 'Parkir 1', 'UPS 2000 VA for Server', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(10, 'KUNCIT', 'Parkir 1', 'UPS 1200 VA for Admin', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(11, 'KUNCIT', 'Parkir 1', 'UPS 1200 VA for PC Remote Server', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(12, 'KUNCIT', 'Parkir 1', 'IP Camera Indoor for Hardware Surveillance', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(13, 'KUNCIT', 'Parkir 1', 'NVR 9 Channel', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(14, 'KUNCIT', 'Parkir 1', 'Harddisk 4 TB', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(15, 'KUNCIT', 'Parkir 1', 'LCD TV 32\" + Bracket', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(16, 'KUNCIT', 'Parkir 1', 'Mouse Wireless for NVR', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(17, 'KUNCIT', 'Parkir 1', 'Kabel HDMI 15 M', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(18, 'KUNCIT', 'Parkir 1', 'Keyboard + Mouse Wireless for Remote Server', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(19, 'KUNCIT', 'Parkir 1', 'Converter HFMI to VGA Male', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(20, 'KUNCIT', 'Parkir 1', 'Fanvil X1 IP Phone', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(21, 'KUNCIT', 'Parkir 1', 'Yeaster S20 IP PBX', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `p_project_entry`
--

CREATE TABLE `p_project_entry` (
  `id_entry` bigint(20) UNSIGNED NOT NULL,
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kantong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_project_entry`
--

INSERT INTO `p_project_entry` (`id_entry`, `project_code`, `nama_kantong`, `nama_item`, `quantity`, `status`, `bukti_foto`, `created_at`, `updated_at`) VALUES
(1, 'GANCIT', 'Parkir A', 'Barrier Gate GS001 Including Loop Detector', 2, 'Sesuai', 'wQacfxuAU9J91xdnSwHgP7O4EMMk9tXVLNbEQ3RU.jpg', '2025-02-11 09:41:52', '2025-02-13 07:49:30'),
(2, 'GANCIT', 'Parkir A', 'Dispenser Cashless with LCD Monitor', 2, 'Sesuai', 'onAJycMecnJ7TPVmiRS4QOG7XsvMJgNPpnUbZiDl.jpg', '2025-02-11 09:41:52', '2025-02-13 07:50:35'),
(3, 'GANCIT', 'Parkir B', 'Barrier Gate GS001 Including Loop Detector', 2, NULL, NULL, '2025-02-11 09:41:52', '2025-02-11 09:41:52'),
(4, 'GANCIT', 'Parkir B', 'Dispenser Cashless with LCD Monitor', 2, NULL, NULL, '2025-02-11 09:41:52', '2025-02-11 09:41:52'),
(5, 'KUNCIT', 'Parkir 1', 'Barrier Gate GS001 Including Loop Detector', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(6, 'KUNCIT', 'Parkir 1', 'Dispenser Cashless with LCD Monitor', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(7, 'KUNCIT', 'Parkir 1', 'Cpu Cashless / Industrial Mini PC + PCIO 4 Port', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(8, 'KUNCIT', 'Parkir 1', 'Thermal Printer EP-802 (Include Adaptor + Kabel Data)', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(9, 'KUNCIT', 'Parkir 1', 'UPS Manless 1200 va', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(10, 'KUNCIT', 'Parkir 1', 'Card Reader MSI Entry + Sam Brizzi (SAM disediakan oleh Smartpay)', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(11, 'KUNCIT', 'Parkir 1', 'IP Camera + Tiang PK + Housing for Face', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(12, 'KUNCIT', 'Parkir 1', 'IP Camera + Tiang PM + Housing for CCTV hardware Surveillance', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(13, 'KUNCIT', 'Parkir 1', 'Booster', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(14, 'KUNCIT', 'Parkir 1', 'Speaker + Amply', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(15, 'KUNCIT', 'Parkir 1', 'Intercom PA 2 Kit + Adaptor', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(16, 'KUNCIT', 'Parkir 1', 'VLD Loop Detector for Double Loop (Optional Double Loop)', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(17, 'KUNCIT', 'Parkir 1', 'Canopy', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(18, 'GI', 'Parkir PE', 'Barrier Gate GS001 Including Loop Detector', 1, NULL, NULL, '2025-02-13 06:54:35', '2025-02-13 06:54:35'),
(19, 'GI', 'Parkir PE', 'Dispenser Cashless with LCD Monitor', 1, NULL, NULL, '2025-02-13 06:54:35', '2025-02-13 06:54:35'),
(20, 'GI', 'Parkir PE', 'Cpu Cashless / Industrial Mini PC + PCIO 4 Port', 1, NULL, NULL, '2025-02-13 06:54:35', '2025-02-13 06:54:35'),
(21, 'Tes', 'Parkir 1', 'Barrier Gate GS001 Including Loop Detector', 1, NULL, NULL, '2025-02-13 07:34:40', '2025-02-13 07:34:40'),
(22, 'Tes', 'Parkir 1', 'Dispenser Cashless with LCD Monitor', 1, NULL, NULL, '2025-02-13 07:34:40', '2025-02-13 07:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `p_project_exit`
--

CREATE TABLE `p_project_exit` (
  `id_exit` bigint(20) UNSIGNED NOT NULL,
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kantong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_project_exit`
--

INSERT INTO `p_project_exit` (`id_exit`, `project_code`, `nama_kantong`, `nama_item`, `quantity`, `status`, `bukti_foto`, `created_at`, `updated_at`) VALUES
(1, 'GANCIT', 'Parkir A', 'Barrier Gate GS001 Including Loop Detector', 2, NULL, NULL, '2025-02-11 09:41:52', '2025-02-11 09:41:52'),
(2, 'GANCIT', 'Parkir A', 'Dispenser Cashless with LCD Monitor', 2, NULL, NULL, '2025-02-11 09:41:52', '2025-02-11 09:41:52'),
(3, 'GANCIT', 'Parkir B', 'Barrier Gate GS001 Including Loop Detector', 3, NULL, NULL, '2025-02-11 09:41:52', '2025-02-11 09:41:52'),
(4, 'GANCIT', 'Parkir B', 'Dispenser Cashless with LCD Monitor', 3, NULL, NULL, '2025-02-11 09:41:52', '2025-02-11 09:41:52'),
(5, 'KUNCIT', 'Parkir 1', 'Barrier Gate GS001 Including Loop Detector', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(6, 'KUNCIT', 'Parkir 1', 'Dispenser Cashless with LCD Monitor', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(7, 'KUNCIT', 'Parkir 1', 'Cpu Cashless / Industrial Mini PC + PCIO 4 Port', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(8, 'KUNCIT', 'Parkir 1', 'Thermal Printer EP-802 (Include Adaptor + Kabel Data)', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(9, 'KUNCIT', 'Parkir 1', 'QR Barcode Scanner Honeywell', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(10, 'KUNCIT', 'Parkir 1', 'UPS Manless 1200 va', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(11, 'KUNCIT', 'Parkir 1', 'Card Reader STI Out', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(12, 'KUNCIT', 'Parkir 1', 'IP Camera + Tiang PK + Housing for Face', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(13, 'KUNCIT', 'Parkir 1', 'IP Camera + Tiang PM + Housing for CCTV hardware Surveillance', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(14, 'KUNCIT', 'Parkir 1', 'VLD Loop Detector for Double Loop (Optional Double Loop)', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(15, 'KUNCIT', 'Parkir 1', 'Booster', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(16, 'KUNCIT', 'Parkir 1', 'Speaker + Amply', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(17, 'KUNCIT', 'Parkir 1', 'Intercom PA 2 Kit + Adaptor', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(18, 'KUNCIT', 'Parkir 1', 'Canopy', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(19, 'GI', 'Parkir PE', 'Barrier Gate GS001 Including Loop Detector', 1, NULL, NULL, '2025-02-13 06:54:35', '2025-02-13 06:54:35'),
(20, 'GI', 'Parkir PE', 'Dispenser Cashless with LCD Monitor', 1, NULL, NULL, '2025-02-13 06:54:35', '2025-02-13 06:54:35'),
(21, 'GI', 'Parkir PE', 'Cpu Cashless / Industrial Mini PC + PCIO 4 Port', 1, NULL, NULL, '2025-02-13 06:54:35', '2025-02-13 06:54:35'),
(22, 'Tes', 'Parkir 1', 'Barrier Gate GS001 Including Loop Detector', 1, NULL, NULL, '2025-02-13 07:34:40', '2025-02-13 07:34:40'),
(23, 'Tes', 'Parkir 1', 'Dispenser Cashless with LCD Monitor', 1, NULL, NULL, '2025-02-13 07:34:40', '2025-02-13 07:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `p_project_kantong`
--

CREATE TABLE `p_project_kantong` (
  `id_kantong` bigint(20) UNSIGNED NOT NULL,
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kantong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_project_kantong`
--

INSERT INTO `p_project_kantong` (`id_kantong`, `project_code`, `nama_kantong`, `created_at`, `updated_at`) VALUES
(1, 'GANCIT', 'Parkir A', '2025-02-11 09:39:41', '2025-02-11 09:39:41'),
(2, 'GANCIT', 'Parkir B', '2025-02-11 09:39:41', '2025-02-11 09:39:41'),
(3, 'KUNCIT', 'Parkir 1', '2025-02-13 06:35:12', '2025-02-13 06:35:12'),
(4, 'GI', 'Parkir PE', '2025-02-13 06:54:17', '2025-02-13 06:54:17'),
(5, 'Tes', 'Parkir 1', '2025-02-13 07:34:21', '2025-02-13 07:34:21'),
(6, '1', 'Parkir A', '2025-02-13 11:53:28', '2025-02-13 11:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `p_project_rambu`
--

CREATE TABLE `p_project_rambu` (
  `id_rambu` bigint(20) UNSIGNED NOT NULL,
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_project_rambu`
--

INSERT INTO `p_project_rambu` (`id_rambu`, `project_code`, `nama_item`, `quantity`, `status`, `bukti_foto`, `created_at`, `updated_at`) VALUES
(1, 'GANCIT', 'RAMBU TARIF IN/OUT (60x120) PLAT', 1, NULL, NULL, '2025-02-11 09:41:52', '2025-02-11 09:41:52'),
(2, 'KUNCIT', 'RAMBU TARIF IN/OUT (60x120) PLAT', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(3, 'KUNCIT', 'RAMBU PARKIR PLAT (50x70) 1 MUKA + TIANG', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(4, 'KUNCIT', 'RAMBU PARKIR PLAT (50x70) 2 MUKA + TIANG', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(5, 'KUNCIT', 'RAMBU PARKIR GANTUNG PLAT (160x30) 1 MUKA RANTAI', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(6, 'KUNCIT', 'RAMBU PARKIR GANTUNG PLAT (80x30) 1 MUKA RANTAI', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(7, 'KUNCIT', 'RAMBU PARKIR GANTUNG PLAT (80x30) 2 MUKA RANTAI', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(8, 'KUNCIT', 'RAMBU DISCLAIMER (60x65) PLAT', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(9, 'KUNCIT', 'RAMBU BATAS KETINGGIAN (200x30) PLAT', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(10, 'KUNCIT', 'SAFETY POLE TAPAK COR', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(11, 'KUNCIT', 'TRAFFIC CONE + STIKER', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(12, 'KUNCIT', 'TALI TAMBANG (1 ROL = 200 Meter)', 1, NULL, NULL, '2025-02-13 06:35:28', '2025-02-13 06:35:28'),
(13, 'GI', 'SAFETY POLE TAPAK COR', 1, NULL, NULL, '2025-02-13 06:54:35', '2025-02-13 06:54:35'),
(14, 'GI', 'TRAFFIC CONE + STIKER', 1, NULL, NULL, '2025-02-13 06:54:35', '2025-02-13 06:54:35'),
(15, 'GI', 'TALI TAMBANG (1 ROL = 200 Meter)', 1, NULL, NULL, '2025-02-13 06:54:35', '2025-02-13 06:54:35'),
(16, 'Tes', 'RAMBU TARIF IN/OUT (60x120) PLAT', 1, NULL, NULL, '2025-02-13 07:34:40', '2025-02-13 07:34:40'),
(17, 'Tes', 'RAMBU PARKIR PLAT (50x70) 1 MUKA + TIANG', 1, NULL, NULL, '2025-02-13 07:34:40', '2025-02-13 07:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Manajer', NULL, NULL),
(3, 'Staff', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id_task` bigint(20) UNSIGNED NOT NULL,
  `project_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kantong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_access` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_gate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id_task`, `project_code`, `nama_kantong`, `nama_access`, `nama_gate`, `task`, `bukti_pekerjaan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KUNCIT', 'Parkir 1', 'Access Entry Car No [1]', 'Gate Atas', 'Instalasi Client Gate', 'cryl3guT1p5QOWmDwqIpslLu3WYpySKQXS0FXwDJ.jpg', 'Finished', '2025-02-13 06:58:17', '2025-02-13 06:59:09'),
(2, 'KUNCIT', 'Parkir 1', 'Access Entry Car No [1]', 'Gate Atas', 'Instalasi Intercom', 'y8yLyPCHWLDvwDKvX7lWIrSw5HWigh1UtDgUcccQ.jpg', 'In Progress', '2025-02-13 06:58:17', '2025-02-13 07:15:33'),
(3, 'KUNCIT', 'Parkir 1', 'Access Entry Car No [1]', 'Gate Atas', 'Instalasi ipcam nopol/wajah', NULL, 'Tidak ada pekerjaan', '2025-02-13 06:58:17', '2025-02-13 07:16:10'),
(4, 'KUNCIT', 'Parkir 1', 'Access Entry Car No [1]', NULL, 'Trial System', NULL, NULL, '2025-02-13 06:58:17', '2025-02-13 06:58:17'),
(5, 'KUNCIT', 'Parkir 1', 'Access Exit Car No [1]', NULL, 'Instalasi Client Gate', NULL, NULL, '2025-02-13 06:58:17', '2025-02-13 06:58:17'),
(6, 'KUNCIT', 'Parkir 1', 'Access Exit Car No [1]', NULL, 'Instalasi Intercom', NULL, NULL, '2025-02-13 06:58:17', '2025-02-13 06:58:17'),
(7, 'KUNCIT', 'Parkir 1', 'Access Exit Car No [1]', NULL, 'Instalasi ipcam nopol/wajah', NULL, NULL, '2025-02-13 06:58:17', '2025-02-13 06:58:17'),
(8, 'KUNCIT', 'Parkir 1', 'Access Exit Car No [1]', NULL, 'Trial System', NULL, NULL, '2025-02-13 06:58:17', '2025-02-13 06:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `division`, `created_at`, `updated_at`) VALUES
(1, 'Moses', 'moses@gmail.com', NULL, '$2y$12$BclWYrSDTxUGwcoHumeFM.YnV9u4oREYv7rTGkKsuGVhIy2RGq4de', 'Admin', 'IT', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id_division`),
  ADD UNIQUE KEY `divisions_division_unique` (`division`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `p_project`
--
ALTER TABLE `p_project`
  ADD PRIMARY KEY (`id_project`),
  ADD UNIQUE KEY `p_project_project_name_unique` (`project_name`),
  ADD UNIQUE KEY `p_project_project_code_unique` (`project_code`);

--
-- Indexes for table `p_project_acc_kantong`
--
ALTER TABLE `p_project_acc_kantong`
  ADD PRIMARY KEY (`id_access`),
  ADD KEY `p_project_acc_kantong_project_code_nama_kantong_foreign` (`project_code`,`nama_kantong`);

--
-- Indexes for table `p_project_admin`
--
ALTER TABLE `p_project_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `p_project_admin_project_code_nama_kantong_foreign` (`project_code`,`nama_kantong`);

--
-- Indexes for table `p_project_entry`
--
ALTER TABLE `p_project_entry`
  ADD PRIMARY KEY (`id_entry`),
  ADD KEY `p_project_entry_project_code_nama_kantong_foreign` (`project_code`,`nama_kantong`);

--
-- Indexes for table `p_project_exit`
--
ALTER TABLE `p_project_exit`
  ADD PRIMARY KEY (`id_exit`),
  ADD KEY `p_project_exit_project_code_nama_kantong_foreign` (`project_code`,`nama_kantong`);

--
-- Indexes for table `p_project_kantong`
--
ALTER TABLE `p_project_kantong`
  ADD PRIMARY KEY (`id_kantong`),
  ADD UNIQUE KEY `p_project_kantong_project_code_nama_kantong_unique` (`project_code`,`nama_kantong`);

--
-- Indexes for table `p_project_rambu`
--
ALTER TABLE `p_project_rambu`
  ADD PRIMARY KEY (`id_rambu`),
  ADD KEY `p_project_rambu_project_code_foreign` (`project_code`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `roles_role_unique` (`role`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `tasks_project_code_nama_kantong_foreign` (`project_code`,`nama_kantong`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_foreign` (`role`),
  ADD KEY `users_division_foreign` (`division`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id_division` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_project`
--
ALTER TABLE `p_project`
  MODIFY `id_project` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p_project_acc_kantong`
--
ALTER TABLE `p_project_acc_kantong`
  MODIFY `id_access` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `p_project_admin`
--
ALTER TABLE `p_project_admin`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `p_project_entry`
--
ALTER TABLE `p_project_entry`
  MODIFY `id_entry` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `p_project_exit`
--
ALTER TABLE `p_project_exit`
  MODIFY `id_exit` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `p_project_kantong`
--
ALTER TABLE `p_project_kantong`
  MODIFY `id_kantong` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `p_project_rambu`
--
ALTER TABLE `p_project_rambu`
  MODIFY `id_rambu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_project_acc_kantong`
--
ALTER TABLE `p_project_acc_kantong`
  ADD CONSTRAINT `p_project_acc_kantong_project_code_foreign` FOREIGN KEY (`project_code`) REFERENCES `p_project` (`project_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `p_project_acc_kantong_project_code_nama_kantong_foreign` FOREIGN KEY (`project_code`,`nama_kantong`) REFERENCES `p_project_kantong` (`project_code`, `nama_kantong`) ON DELETE CASCADE;

--
-- Constraints for table `p_project_admin`
--
ALTER TABLE `p_project_admin`
  ADD CONSTRAINT `p_project_admin_project_code_foreign` FOREIGN KEY (`project_code`) REFERENCES `p_project` (`project_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `p_project_admin_project_code_nama_kantong_foreign` FOREIGN KEY (`project_code`,`nama_kantong`) REFERENCES `p_project_kantong` (`project_code`, `nama_kantong`) ON DELETE CASCADE;

--
-- Constraints for table `p_project_entry`
--
ALTER TABLE `p_project_entry`
  ADD CONSTRAINT `p_project_entry_project_code_foreign` FOREIGN KEY (`project_code`) REFERENCES `p_project` (`project_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `p_project_entry_project_code_nama_kantong_foreign` FOREIGN KEY (`project_code`,`nama_kantong`) REFERENCES `p_project_kantong` (`project_code`, `nama_kantong`) ON DELETE CASCADE;

--
-- Constraints for table `p_project_exit`
--
ALTER TABLE `p_project_exit`
  ADD CONSTRAINT `p_project_exit_project_code_foreign` FOREIGN KEY (`project_code`) REFERENCES `p_project` (`project_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `p_project_exit_project_code_nama_kantong_foreign` FOREIGN KEY (`project_code`,`nama_kantong`) REFERENCES `p_project_kantong` (`project_code`, `nama_kantong`) ON DELETE CASCADE;

--
-- Constraints for table `p_project_kantong`
--
ALTER TABLE `p_project_kantong`
  ADD CONSTRAINT `p_project_kantong_project_code_foreign` FOREIGN KEY (`project_code`) REFERENCES `p_project` (`project_code`) ON DELETE CASCADE;

--
-- Constraints for table `p_project_rambu`
--
ALTER TABLE `p_project_rambu`
  ADD CONSTRAINT `p_project_rambu_project_code_foreign` FOREIGN KEY (`project_code`) REFERENCES `p_project` (`project_code`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_project_code_foreign` FOREIGN KEY (`project_code`) REFERENCES `p_project` (`project_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_project_code_nama_kantong_foreign` FOREIGN KEY (`project_code`,`nama_kantong`) REFERENCES `p_project_kantong` (`project_code`, `nama_kantong`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_division_foreign` FOREIGN KEY (`division`) REFERENCES `divisions` (`division`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_foreign` FOREIGN KEY (`role`) REFERENCES `roles` (`role`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
