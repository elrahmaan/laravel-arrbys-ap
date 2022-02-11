-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 07:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `series`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_asset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_of_specification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `category_id`, `category_asset`, `image`, `detail_of_specification`, `qty`, `date`, `created_at`, `updated_at`) VALUES
(1643789399, 'LAPTOP 1', 1, 'Sewa', '/uploads/service-assets/new/1643789399.PNG', 'HW27QH2', 1, '2022-02-02', '2022-02-02 08:09:59', '2022-02-02 08:09:59'),
(1643789775, 'LAPTOP 2', 1, 'Sewa', '/uploads/service-assets/new/1643789775.PNG', 'GV27QH2', 1, '2022-02-02', '2022-02-02 08:16:15', '2022-02-02 08:16:15'),
(1643789877, 'LAPTOP 3', 1, 'Sewa', '/uploads/service-assets/new/1643789877.PNG', '9D68QH2', 1, '2022-02-02', '2022-02-02 08:17:57', '2022-02-02 08:17:57'),
(1643789921, 'LAPTOP 4', 1, 'Sewa', '/uploads/service-assets/new/1643789921.PNG', '9LH7QH2', 1, '2022-02-02', '2022-02-02 08:18:41', '2022-02-02 08:18:41'),
(1643789968, 'LAPTOP 5', 1, 'Sewa', '/uploads/service-assets/new/1643789968.PNG', '5W67QH2', 1, '2022-02-02', '2022-02-02 08:19:28', '2022-02-02 08:19:28'),
(1643790000, 'LAPTOP 6', 1, 'Sewa', '/uploads/service-assets/new/1643790000.PNG', '6N27QH2', 1, '2022-02-02', '2022-02-02 08:20:00', '2022-02-02 08:20:00'),
(1643790023, 'LAPTOP 7', 1, 'Sewa', '/uploads/service-assets/new/1643790023.PNG', 'HKN7QH2', 1, '2022-02-02', '2022-02-02 08:20:23', '2022-02-02 08:20:23'),
(1643790113, 'LAPTOP 8', 1, 'Sewa', '/uploads/service-assets/new/1643790113.PNG', '5V67QH2', 1, '2022-02-02', '2022-02-02 08:21:53', '2022-02-02 08:21:53'),
(1643790137, 'LAPTOP 9', 1, 'Sewa', '/uploads/service-assets/new/1643790137.PNG', '7L67QH2', 1, '2022-02-02', '2022-02-02 08:22:17', '2022-02-02 08:22:17'),
(1643790160, 'LAPTOP 10', 1, 'Sewa', '/uploads/service-assets/new/1643790160.PNG', '9T27QH2', 1, '2022-02-02', '2022-02-02 08:22:40', '2022-02-02 08:22:40'),
(1643790214, 'LAPTOP 11', 1, 'Sewa', '/uploads/service-assets/new/1643790214.PNG', '1PK8QH2', 1, '2022-02-02', '2022-02-02 08:23:34', '2022-02-02 08:23:34'),
(1643790242, 'LAPTOP 12', 1, 'Sewa', '/uploads/service-assets/new/1643790242.PNG', 'BHH7QH2', 1, '2022-02-02', '2022-02-02 08:24:02', '2022-02-02 08:24:02'),
(1643790271, 'LAPTOP 13', 1, 'Sewa', '/uploads/service-assets/new/1643790271.PNG', '2P27QH2', 1, '2022-02-02', '2022-02-02 08:24:31', '2022-02-02 08:24:31'),
(1643790352, 'LAPTOP 14', 1, 'Sewa', '/uploads/service-assets/new/1643790352.PNG', '2SH6QH2', 1, '2022-02-02', '2022-02-02 08:25:52', '2022-02-02 08:25:52'),
(1643790399, 'LAPTOP 15', 1, 'Sewa', '/uploads/service-assets/new/1643790399.PNG', 'FV67QH2', 1, '2022-02-02', '2022-02-02 08:26:39', '2022-02-02 08:26:39'),
(1643790446, 'LAPTOP 16', 1, 'Sewa', '/uploads/service-assets/new/1643790446.PNG', 'HV27QH1', 1, '2022-02-02', '2022-02-02 08:27:26', '2022-02-02 08:27:26'),
(1643790473, 'LAPTOP 17', 1, 'Sewa', '/uploads/service-assets/new/1643790473.PNG', '4PS9N13', 1, '2022-02-02', '2022-02-02 08:27:53', '2022-02-02 08:27:53'),
(1643943943, 'Laptop MSI 14 B11MO', 1, 'AP', '/uploads/service-assets/new/1643943943.jpg', 'Ram 8 GB', 1, '2022-02-04', '2022-02-04 03:05:43', '2022-02-04 03:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `asset_categories`
--

CREATE TABLE `asset_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_categories`
--

INSERT INTO `asset_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'LAPTOP', NULL, NULL),
(2, 'PRINTER', '2022-02-03 04:35:50', '2022-02-03 04:36:02'),
(3, 'MONITOR', '2022-02-03 04:38:39', '2022-02-03 04:38:39'),
(4, 'UPS', '2022-02-03 04:38:52', '2022-02-03 04:38:52'),
(5, 'CPU', '2022-02-03 04:39:12', '2022-02-03 04:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'GM', 'GENERAL MANAGER', NULL, NULL),
(2, 'CO GM', 'Co. GENERAL MANAGER', NULL, NULL),
(3, 'COM LEGAL', 'LEGAL AND COMPLIANCE MANAGER', NULL, NULL),
(4, 'STAKEHOLDER', 'STAKEHOLDER RELATION MANAGER', NULL, NULL),
(5, 'SM SMS', 'AIRPORT SAFETY, RISK AND PERFORMANCE MANAGEMENT SENIOR MANAGER', NULL, NULL),
(6, 'SMS', 'SAFETY MANAGEMENT SYSTEM AND OCCUPATIONAL SAFETY HEALTH', NULL, NULL),
(7, 'QMS', 'QUALITY, RISK AND PERFORMANCE MANAGEMENT MANAGER', NULL, NULL),
(8, 'ENVIRONMENT', 'AIRPORT ENVIRONMENT MANAGER', NULL, NULL),
(9, 'OPERATION', 'AIRPORT OPERATION CENTER HEAD', NULL, NULL),
(10, 'OPERATION SM', 'AIRPORT OPERATION AND SERVICES SENIOR MANAGER', NULL, NULL),
(11, 'OPERATION AIRSIDE', 'AIRPORT OPERATION AIR SIDE MANAGER', NULL, NULL),
(12, 'OPERATION LAN DSIDE', 'AIRPORT OPERATION LAN DSIDE AND TERMINA MANAGER', NULL, NULL),
(13, 'OPERATION IMPROVEMENT', 'AIRPORT SERVICE IMPROVEMENT	MANAGER', NULL, NULL),
(14, 'ARFF', 'AIRPORT RESCUE AND FIRE FIGHTING MANAGER', NULL, NULL),
(15, 'AVSEC SM', 'AIRPORT SECURITY SENIOR MANAGER', NULL, NULL),
(16, 'AVSEC PROTECTION', 'AIRPORT SECURITY PROTECTION MANAGER', NULL, NULL),
(17, 'AVSEC SCREENING', 'AIRPORT SECURITY  SCREENING MANAGER', NULL, NULL),
(18, 'TEKNIK SM', 'AIRPORT TECHNICAL	 SENIOR MANAGER', NULL, '2022-02-02 08:59:10'),
(19, 'TEKNIK AIRSIDE', 'AIRPORT AIRSIDE FACILITIES	MANAGER', NULL, NULL),
(20, 'TEKNIK LANDSIDE', 'AIRPORT LANDSIDE FACILITITES MANAGER', NULL, NULL),
(21, 'EQUIPMENT', 'AIRPORT EQUIPMENT MANAGER', NULL, NULL),
(22, 'AT / ICT', 'AIRPORT TECHNOLOGY MANAGER', NULL, NULL),
(23, 'SALES SM', 'AIRPORT COMMERCIAL SENIOR MANAGER', NULL, NULL),
(24, 'SALES AERO', 'AIRPORT AERONAUTICAL MANAGER', NULL, NULL),
(25, 'SALES NON AERO T-1', 'AIRPORT NON AERONAUTICAL TERMINAL 1 MANAGER', NULL, NULL),
(26, 'SALES NON AERO T-2', 'AIRPORT NON AERONAUTICAL TERMINAL 2 MANAGER', NULL, NULL),
(27, 'ADMINISTRASI SM', 'AIRPORT ADMINISTRATION SENIOR MANAGER', NULL, NULL),
(28, 'FINANCE', 'FINANCE MANAGER', NULL, NULL),
(29, 'ACCOUNTING', 'ACCOUNTING MANAGER', NULL, NULL),
(30, 'HC', 'HUMAN CAPITAL BUSINESS PARTNER MANAGER', NULL, NULL),
(31, 'GS', 'GENERAL SERVICES MANAGER', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `approved_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_loan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_date` date DEFAULT NULL,
  `approved_by_return` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimation_return_date` date DEFAULT NULL,
  `real_return_date` date DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `name`, `department_id`, `approved_by`, `phone`, `purpose`, `detail_loan`, `loan_date`, `approved_by_return`, `estimation_return_date`, `real_return_date`, `reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Edi Cahyo Purnomo', 1, 'Billy', '100', 'Untuk vikon di bromo', '-', '2022-02-03', 'Herman', '2022-02-10', '2022-02-19', NULL, 'Return', '2022-02-03 04:41:23', '2022-02-03 04:55:46'),
(2, 'Rudi Priyanto', 2, 'Hendra', '101', 'Untuk vikon di bromo', '-', '2022-02-03', 'Aan Sudaroji', '2022-02-05', '2022-02-05', NULL, 'Return', '2022-02-03 04:42:06', '2022-02-03 05:00:03'),
(3, 'Agus Haryadi Mustofa', 3, 'Hendra', '102', 'Buat vikon', '-', '2022-02-03', 'Rendy', '2022-02-04', '2022-02-03', NULL, 'Return', '2022-02-03 04:43:08', '2022-02-03 04:58:11'),
(4, 'Herman Abanda', 4, 'Zainul', '103', 'Buat Kasir', '-', '2022-02-02', 'Hendra', '2022-02-03', '2022-02-19', NULL, 'Return', '2022-02-03 04:43:54', '2022-02-03 05:00:25'),
(5, 'Robbi Prasetya', 5, 'Rendy', '105', 'Buat vikon', '-', '2022-02-03', 'Billy', '2022-02-05', '2022-02-19', NULL, 'Return', '2022-02-03 04:44:36', '2022-02-03 04:57:36'),
(6, 'Yudi Hermawan', 6, 'Rendy', '106', 'Buat Vikon', '-', '2022-02-03', 'Billy', '2022-02-05', '2022-02-03', NULL, 'Return', '2022-02-03 04:45:11', '2022-02-03 04:57:14'),
(7, 'Heri Prasetya', 8, 'Aan Sudaroji', '107', 'Buat Kasir', '-', '2022-02-03', 'Aan Sudaroji', '2022-02-05', '2022-02-26', NULL, 'Return', '2022-02-03 04:46:04', '2022-02-03 04:56:27'),
(8, 'Ayu Indah Safitri', 13, 'Herman', '108', 'Buat Kasir', '-', '2022-02-03', 'Aan Sudaroji', '2022-02-19', '2022-02-04', NULL, 'Return', '2022-02-03 04:47:00', '2022-02-03 04:53:08'),
(9, 'Asyrof Khairudin', 15, 'Hendra', '109', 'Buat Kasir', '-', '2022-02-03', 'Hendra', '2022-02-11', '2022-02-02', NULL, 'Return', '2022-02-03 04:48:12', '2022-02-03 04:54:49'),
(10, 'Abdul Latif', 30, 'Billy', '111', 'Buat Kasir', 'Dibawa pulang', '2022-02-03', 'Billy', '2022-02-05', '2022-02-03', NULL, 'Return', '2022-02-03 04:49:30', '2022-02-03 04:54:01'),
(11, 'Tyas Mirasih', 20, 'Zainul', '112', 'Buat Kasir', '-', '2022-02-03', 'Zainul', '2022-02-05', '2022-02-05', NULL, 'Return', '2022-02-03 04:50:29', '2022-02-03 04:53:30'),
(12, 'Auliya Oni Priyandika', 29, 'Aan Sudaroji', '113', 'Buat Kasir', '-', '2022-02-01', 'Hendra', '2022-02-04', '2022-02-05', NULL, 'Return', '2022-02-03 04:51:08', '2022-02-03 04:51:57'),
(13, 'Abdul Rahman Saleh', 23, 'Herman', '12', 'Buat Kasir', '-', '2022-02-03', 'Aan Sudaroji', '2022-02-05', '2022-02-26', NULL, 'Return', '2022-02-03 05:02:29', '2022-02-03 05:06:39'),
(14, 'Eko Julianto', 30, 'Billy', '115', 'Buat Kasir', '-', '2022-02-03', NULL, '2022-02-18', NULL, NULL, 'In Loan', '2022-02-03 05:03:09', '2022-02-03 05:03:09'),
(15, 'Randy Pangalila', 19, 'Aan Sudaroji', '119', 'Buat Kasir', '-', '2022-02-03', NULL, '2022-02-04', NULL, NULL, 'In Loan', '2022-02-03 05:04:00', '2022-02-03 05:04:00'),
(16, 'Andra Virginawan', 4, 'Herman', '103', 'vikon', '-', '2022-02-03', 'Zainul', '2022-02-11', '2022-02-04', NULL, 'Return', '2022-02-03 05:05:16', '2022-02-03 05:05:48'),
(17, 'irfan harfiansyah', 4, 'Billy', '301', 'Rapat', '-', '2022-02-04', 'Hendra', '2022-02-11', '2022-02-05', NULL, 'Return', '2022-02-04 03:11:27', '2022-02-04 03:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `loan_assets`
--

CREATE TABLE `loan_assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `serial_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_assets`
--

INSERT INTO `loan_assets` (`id`, `loan_id`, `serial_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-02-03 04:41:23', '2022-02-03 04:41:23'),
(2, 1, 2, '2022-02-03 04:41:23', '2022-02-03 04:41:23'),
(3, 2, 3, '2022-02-03 04:42:06', '2022-02-03 04:42:06'),
(4, 3, 4, '2022-02-03 04:43:08', '2022-02-03 04:43:08'),
(5, 4, 5, '2022-02-03 04:43:54', '2022-02-03 04:43:54'),
(6, 5, 6, '2022-02-03 04:44:36', '2022-02-03 04:44:36'),
(7, 6, 7, '2022-02-03 04:45:11', '2022-02-03 04:45:11'),
(8, 7, 8, '2022-02-03 04:46:04', '2022-02-03 04:46:04'),
(9, 7, 9, '2022-02-03 04:46:04', '2022-02-03 04:46:04'),
(10, 7, 10, '2022-02-03 04:46:04', '2022-02-03 04:46:04'),
(11, 8, 11, '2022-02-03 04:47:00', '2022-02-03 04:47:00'),
(12, 8, 14, '2022-02-03 04:47:00', '2022-02-03 04:47:00'),
(13, 9, 13, '2022-02-03 04:48:12', '2022-02-03 04:48:12'),
(14, 10, 15, '2022-02-03 04:49:30', '2022-02-03 04:49:30'),
(15, 11, 12, '2022-02-03 04:50:29', '2022-02-03 04:50:29'),
(16, 12, 16, '2022-02-03 04:51:08', '2022-02-03 04:51:08'),
(17, 12, 17, '2022-02-03 04:51:08', '2022-02-03 04:51:08'),
(18, 13, 11, '2022-02-03 05:02:29', '2022-02-03 05:02:29'),
(19, 13, 13, '2022-02-03 05:02:29', '2022-02-03 05:02:29'),
(20, 14, 17, '2022-02-03 05:03:09', '2022-02-03 05:03:09'),
(21, 14, 15, '2022-02-03 05:03:09', '2022-02-03 05:03:09'),
(22, 15, 14, '2022-02-03 05:04:00', '2022-02-03 05:04:00'),
(23, 16, 12, '2022-02-03 05:05:16', '2022-02-03 05:05:16'),
(24, 16, 2, '2022-02-03 05:05:16', '2022-02-03 05:05:16'),
(25, 17, 1, '2022-02-04 03:11:27', '2022-02-04 03:11:27'),
(26, 17, 8, '2022-02-04 03:11:27', '2022-02-04 03:11:27'),
(27, 17, 9, '2022-02-04 03:11:27', '2022-02-04 03:11:27');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_01_07_031922_create_sessions_table', 1),
(7, '2022_01_12_071030_create_departments_table', 1),
(8, '2022_01_12_071032_create_asset_categories_table', 1),
(9, '2022_01_12_071119_create_service_assets_table', 1),
(10, '2022_01_12_071435_create_unit_logs_table', 1),
(11, '2022_01_12_071453_create_loans_table', 1),
(12, '2022_01_25_082658_create_assets_table', 1),
(13, '2022_01_28_172234_create_serials_table', 1),
(14, '2022_01_28_172920_create_loan_assets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serials`
--

CREATE TABLE `serials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_id` bigint(20) UNSIGNED NOT NULL,
  `is_borrowed` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serials`
--

INSERT INTO `serials` (`id`, `no_serial`, `asset_id`, `is_borrowed`, `created_at`, `updated_at`) VALUES
(1, 'HW27QH2', 1643789399, 0, '2022-02-03 04:34:58', '2022-02-04 03:12:52'),
(2, 'GV27QH2', 1643789775, 0, '2022-02-03 04:35:11', '2022-02-03 05:05:48'),
(3, '9D68QH2', 1643789877, 0, '2022-02-03 04:35:24', '2022-02-03 05:00:03'),
(4, '9LH7QH2', 1643789921, 0, '2022-02-03 04:35:46', '2022-02-03 04:58:11'),
(5, '5W67QH2', 1643789968, 0, '2022-02-03 04:35:58', '2022-02-03 05:00:25'),
(6, '6N27QH2', 1643790000, 0, '2022-02-03 04:36:15', '2022-02-03 04:57:36'),
(7, 'HKN7QH2', 1643790023, 0, '2022-02-03 04:36:29', '2022-02-03 04:57:14'),
(8, '5V67QH2', 1643790113, 0, '2022-02-03 04:36:43', '2022-02-04 03:12:52'),
(9, '7L67QH2', 1643790137, 0, '2022-02-03 04:37:00', '2022-02-04 03:12:52'),
(10, '9T27QH2', 1643790160, 0, '2022-02-03 04:37:22', '2022-02-03 04:56:27'),
(11, '1PK8QH2', 1643790214, 0, '2022-02-03 04:37:40', '2022-02-03 05:06:39'),
(12, 'BHH7QH2', 1643790242, 0, '2022-02-03 04:38:07', '2022-02-03 05:05:48'),
(13, '2P27QH2', 1643790271, 0, '2022-02-03 04:38:32', '2022-02-03 05:06:39'),
(14, '2SH6QH2', 1643790352, 1, '2022-02-03 04:38:50', '2022-02-03 05:04:00'),
(15, 'FV67QH2', 1643790399, 1, '2022-02-03 04:39:04', '2022-02-03 05:03:09'),
(16, 'HV27QH1', 1643790446, 0, '2022-02-03 04:39:39', '2022-02-03 04:51:57'),
(17, '4PS9N13', 1643790473, 1, '2022-02-03 04:40:04', '2022-02-03 05:03:09'),
(18, '094805', 1643943943, 0, '2022-02-04 03:07:10', '2022-02-04 03:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `service_assets`
--

CREATE TABLE `service_assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `complainant_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_asset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_complain` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnose` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `date_fixed` date DEFAULT NULL,
  `detail_of_specification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_assets`
--

INSERT INTO `service_assets` (`id`, `name`, `category_id`, `department_id`, `image`, `qty`, `complainant_name`, `category_asset`, `status`, `desc_complain`, `diagnose`, `date`, `date_fixed`, `detail_of_specification`, `created_at`, `updated_at`) VALUES
(1643863063, 'Printer cannon mp320', 2, 3, '/uploads/service-assets/1643863063.jpeg', 1, 'Basir', 'AP', 'Fixed', 'Tinta habis', 'Membersihkan catridge', '2022-02-08', '2022-02-15', 'canon', '2022-02-03 04:37:43', '2022-02-03 04:49:08'),
(1643863246, 'Monitor Dell w1120', 1, 4, '/uploads/service-assets/1643863246.jpeg', 2, 'Gaga Muhammad', 'AP', 'Fixed', 'Kadang mati sendiri', 'ganti IC', '2022-02-02', '2022-02-27', '15 inch', '2022-02-03 04:40:46', '2022-02-03 07:30:47'),
(1643863391, 'CPU Lenovo thnkpad', 5, 16, '/uploads/service-assets/1643863391.jpeg', 3, 'Bakir', 'AP', 'Fixed', 'Ganti ssd 512gb dan update ram 8gb', 'sudah di ganti ssd dan upgrade ram', '2022-02-03', '2022-02-04', 'RAM 4GB , HDD 512', '2022-02-03 04:43:11', '2022-02-03 04:44:49'),
(1643864018, 'Laptop Omen 15', 1, 25, '/uploads/service-assets/1643864018.jpeg', 1, 'Mamat', 'AP', 'Fixed', 'Ganti keyboard yang rusak', 'Keyboard sudah ganti baru', '2022-02-10', '2022-02-12', 'W11, ram16gb, ssd512gb', '2022-02-03 04:53:38', '2022-02-03 04:59:34'),
(1643864154, 'CPU aps', 5, 27, '/uploads/service-assets/1643864154.jpeg', 3, 'hadi', 'AP', 'Fixed', 'update windows 10 & upgrade ram 8gb', 'sudah di ganti semua', '2022-02-14', '2022-03-06', 'w7', '2022-02-03 04:55:54', '2022-02-03 07:54:42'),
(1643864283, 'Printer EPSON 45t3', 2, 30, '/uploads/service-assets/1643864283.jpeg', 5, 'LALA', 'AP', 'In Repair', 'Minta di bersihkan ulang', NULL, '2022-02-21', NULL, 'warna hitam', '2022-02-03 04:58:03', '2022-02-03 04:58:03'),
(1643873724, 'Laptop MSI 14 b11mo', 1, 5, '/uploads/service-assets/1643873724.jpeg', 1, 'rana', 'Sewa', 'In Repair', 'install driver', NULL, '2022-02-26', NULL, 'ram 8gb', '2022-02-03 07:35:24', '2022-02-03 07:35:24'),
(1643874613, 'Laptop Lenovo a9', 1, 31, '/uploads/service-assets/1643874613.jpeg', 1, 'sempro', 'Lain-lain', 'Fixed', 'input cas tidak connect', 'ganti board', '2022-01-17', '2022-03-04', 'ram 9', '2022-02-03 07:50:13', '2022-02-03 07:53:59'),
(1643874689, 'EPSON F64W', 2, 22, '/uploads/service-assets/1643874689.jpeg', 1, 'nano', 'Lain-lain', 'In Repair', 'Ngisi tinta', NULL, '2022-02-23', NULL, 'PUTIH', '2022-02-03 07:51:29', '2022-02-03 07:51:29'),
(1643874792, 'CPU asus', 5, 15, '/uploads/service-assets/1643874792.jpeg', 3, 'yuyu', 'AP', 'In Repair', 'ganti casing', NULL, '2022-02-27', NULL, 'warna putih', '2022-02-03 07:53:12', '2022-02-03 07:53:12'),
(1643944668, 'Laptop ASUS ROG', 1, 1, '/uploads/service-assets/1643944668.jpg', 1, 'irfan', NULL, 'Fixed', 'Keyboard error', 'Beli keyboard lagi', '2022-02-05', '2022-02-05', '-', '2022-02-04 03:17:48', '2022-02-04 03:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_logs`
--

CREATE TABLE `unit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asset_id` bigint(20) UNSIGNED NOT NULL,
  `complainant_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `desc_complain` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnose` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_fixed` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_logs`
--

INSERT INTO `unit_logs` (`id`, `asset_id`, `complainant_name`, `department_id`, `desc_complain`, `diagnose`, `date_fixed`, `created_at`, `updated_at`) VALUES
(1, 1643863391, 'Bakir', 16, 'Ganti ssd 512gb dan update ram 8gb', 'sudah di ganti ssd dan upgrade ram', '2022-02-04', '2022-02-03 04:44:49', '2022-02-03 04:44:49'),
(2, 1643863063, 'irfan harfinsyah', 23, 'Tinta kering', 'Catridge Rusak', '2022-02-06', '2022-02-03 04:46:30', '2022-02-03 04:46:30'),
(3, 1643863063, 'Basir', 3, 'Tinta habis', 'Membersihkan catridge', '2022-02-15', '2022-02-03 04:49:08', '2022-02-03 04:49:08'),
(4, 1643864018, 'Mamat', 25, 'Ganti keyboard yang rusak', 'Keyboard sudah ganti baru', '2022-02-12', '2022-02-03 04:59:34', '2022-02-03 04:59:34'),
(6, 1643863246, 'Gaga Muhammad', 4, 'Kadang mati sendiri', 'ganti IC', '2022-02-27', '2022-02-03 07:30:47', '2022-02-03 07:30:47'),
(7, 1643874613, 'sempro', 31, 'input cas tidak connect', 'ganti board', '2022-03-04', '2022-02-03 07:53:59', '2022-02-03 07:53:59'),
(8, 1643864154, 'hadi', 27, 'update windows 10 & upgrade ram 8gb', 'sudah di ganti semua', '2022-03-06', '2022-02-03 07:54:42', '2022-02-03 07:54:42'),
(9, 1643944668, 'hasyim', 1, 'Power tidak bisa', 'Ganti IC', '2022-02-04', '2022-02-04 03:18:29', '2022-02-04 03:18:29'),
(10, 1643944668, 'irfan', 1, 'Keyboard error', 'Beli keyboard lagi', '2022-02-05', '2022-02-04 03:20:43', '2022-02-04 03:20:43');

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `role`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@ap.id', NULL, '$2y$10$9/ypnZq7gYm4W0N9UuvvaeKsUIrPHhscdTwYkU6qMJR6KV1jrvHxS', NULL, NULL, 'superadmin', NULL, NULL, NULL, '2022-02-04 05:44:01', '2022-02-04 05:44:01'),
(2, 'Teknisi', 'teknisi@ap.id', NULL, '$2y$10$.NhHZCjWRAfl9ktb9UI0a.g1E.3yy9kwnwRsfNwO6Zg.c3IuGdJ8O', NULL, NULL, 'teknisi', NULL, NULL, NULL, '2022-02-04 05:44:01', '2022-02-04 05:44:01'),
(3, 'Viewer', 'viewer@ap.id', NULL, '$2y$10$dR7Secem6NZYBMH2T5OKKOJWra.6pcifXSxMfJV6mtVBKZgGZ2zbC', NULL, NULL, 'viewer', NULL, NULL, NULL, '2022-02-04 05:44:01', '2022-02-04 05:44:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assets_category_id_foreign` (`category_id`);

--
-- Indexes for table `asset_categories`
--
ALTER TABLE `asset_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_department_id_foreign` (`department_id`);

--
-- Indexes for table `loan_assets`
--
ALTER TABLE `loan_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_assets_loan_id_foreign` (`loan_id`),
  ADD KEY `loan_assets_serial_id_foreign` (`serial_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `serials`
--
ALTER TABLE `serials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serials_asset_id_foreign` (`asset_id`);

--
-- Indexes for table `service_assets`
--
ALTER TABLE `service_assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_assets_category_id_foreign` (`category_id`),
  ADD KEY `service_assets_department_id_foreign` (`department_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `unit_logs`
--
ALTER TABLE `unit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_logs_asset_id_foreign` (`asset_id`),
  ADD KEY `unit_logs_department_id_foreign` (`department_id`);

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
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1643943944;

--
-- AUTO_INCREMENT for table `asset_categories`
--
ALTER TABLE `asset_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `loan_assets`
--
ALTER TABLE `loan_assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serials`
--
ALTER TABLE `serials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `service_assets`
--
ALTER TABLE `service_assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1643944669;

--
-- AUTO_INCREMENT for table `unit_logs`
--
ALTER TABLE `unit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `asset_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_assets`
--
ALTER TABLE `loan_assets`
  ADD CONSTRAINT `loan_assets_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_assets_serial_id_foreign` FOREIGN KEY (`serial_id`) REFERENCES `serials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `serials`
--
ALTER TABLE `serials`
  ADD CONSTRAINT `serials_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_assets`
--
ALTER TABLE `service_assets`
  ADD CONSTRAINT `service_assets_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `asset_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_assets_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_logs`
--
ALTER TABLE `unit_logs`
  ADD CONSTRAINT `unit_logs_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `service_assets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_logs_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
