-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2026 at 01:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rcourt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `court_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `discount` int NOT NULL DEFAULT '0',
  `payment_method` enum('transfer','cod') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` enum('full','dp') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `is_extended` tinyint(1) NOT NULL DEFAULT '0',
  `extend_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `extend_duration` int NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `code`, `user_id`, `court_id`, `date`, `start_time`, `end_time`, `total_price`, `discount`, `payment_method`, `payment_type`, `payment_proof`, `status`, `is_extended`, `extend_cost`, `extend_duration`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'RCRT-97CDC2', 2, 1, '2026-02-14', '08:00:00', '13:00:00', 150000.00, 0, 'cod', NULL, NULL, 'rejected', 0, 0.00, 0, NULL, NULL, '2026-02-14 03:29:36', '2026-02-14 03:33:02'),
(2, 'RCRT-3BE764', 2, 1, '2026-02-14', '13:00:00', '16:00:00', 90000.00, 0, 'cod', NULL, NULL, 'rejected', 0, 0.00, 0, NULL, NULL, '2026-02-14 03:31:57', '2026-02-14 03:32:41'),
(3, 'RCRT-E486EF', 2, 1, '2026-02-19', '09:00:00', '10:00:00', 30000.00, 0, 'cod', NULL, NULL, 'approved', 0, 0.00, 0, 'rizkyroza2005@gmail.com', '08118032005', '2026-02-14 17:55:36', '2026-02-14 17:56:02'),
(4, 'RCRT-30D9B1', 2, 5, '2026-02-20', '15:00:00', '17:00:00', 200000.00, 0, 'cod', NULL, NULL, 'approved', 0, 0.00, 0, 'bandariwagakure@gmail.com', '08118032005', '2026-02-14 17:59:23', '2026-02-14 17:59:29'),
(5, 'RCRT-209757', 2, 7, '2026-02-16', '11:00:00', '12:00:00', 50000.00, 0, 'cod', NULL, NULL, 'approved', 0, 0.00, 0, NULL, '08118032005', '2026-02-14 18:17:26', '2026-02-14 18:17:34'),
(6, 'RCRT-AB1D8B', 2, 1, '2026-02-16', '09:00:00', '10:00:00', 30000.00, 0, 'cod', NULL, NULL, 'approved', 0, 0.00, 0, NULL, '081217482341', '2026-02-14 18:18:59', '2026-02-14 18:19:05'),
(7, 'RCRT-9C1B73', 2, 8, '2026-02-20', '13:00:00', '16:00:00', 150000.00, 0, 'cod', NULL, NULL, 'approved', 0, 0.00, 0, NULL, '085186856944', '2026-02-14 18:20:46', '2026-02-14 18:21:01'),
(8, 'RCRT-10D0ED', 2, 10, '2026-02-20', '18:00:00', '22:00:00', 240000.00, 0, 'cod', NULL, NULL, 'approved', 0, 0.00, 0, NULL, '08118032005', '2026-02-14 18:26:04', '2026-02-14 18:26:08'),
(9, 'RCRT-3DC5E7', 2, 10, '2026-02-20', '10:00:00', '13:00:00', 150000.00, 0, 'cod', NULL, NULL, 'approved', 0, 0.00, 0, NULL, '85233215885', '2026-02-14 18:30:50', '2026-02-14 18:31:07'),
(10, 'RCRT-8AC4B9', 2, 4, '2026-02-20', '09:00:00', '12:00:00', 300000.00, 0, 'transfer', 'full', 'proofs/MinIPtAIVzQSFotYql1HGCyF5oLmKJr2rjT2N8l3.jpg', 'approved', 0, 0.00, 0, NULL, '082113426968', '2026-02-14 18:40:29', '2026-02-14 18:40:35'),
(11, 'RCRT-9313DE', 4, 4, '2026-02-21', '10:00:00', '13:00:00', 330000.00, 0, 'cod', NULL, NULL, 'approved', 0, 0.00, 0, NULL, '08118032005', '2026-02-17 01:24:44', '2026-02-17 01:25:02'),
(12, 'RCRT-09DF65', 4, 6, '2026-02-19', '10:00:00', '15:00:00', 1000000.00, 0, 'cod', NULL, NULL, 'approved', 0, 0.00, 0, NULL, '085186856944', '2026-02-17 20:42:05', '2026-02-17 20:42:25'),
(13, 'RCRT-5EA919', 4, 10, '2026-02-21', '09:00:00', '13:00:00', 2800000.00, 0, 'cod', NULL, NULL, 'approved', 0, 0.00, 0, NULL, '085186856944', '2026-02-17 22:25:58', '2026-02-17 22:26:06'),
(14, 'RCRT-25F5B3', 2, 4, '2026-02-24', '09:00:00', '11:00:00', 180000.00, 0, 'cod', NULL, NULL, 'approved', 0, 0.00, 0, NULL, '08118032005', '2026-02-17 22:45:01', '2026-02-17 22:45:06'),
(15, 'RCRT-311321', 2, 5, '2026-02-28', '19:00:00', '22:00:00', 405000.00, 0, 'transfer', 'full', 'proofs/QGoMwRC4TWL7ZdecAwwV4rKBOQUL0c4dAEqfQ8DC.jpg', 'approved', 0, 0.00, 0, NULL, '08118032005', '2026-02-17 22:59:52', '2026-02-17 23:00:05'),
(16, 'RCRT-TTMSXI', 5, 11, '2026-03-12', '14:00:00', '17:00:00', 900000.00, 0, 'cod', NULL, NULL, 'approved', 0, 0.00, 0, NULL, '08118032005', '2026-02-28 20:12:01', '2026-02-28 20:13:12');

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
-- Table structure for table `courts`
--

CREATE TABLE `courts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('badminton','futsal','basket_indoor','tennis','mini_soccer','padel') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int UNSIGNED NOT NULL DEFAULT '0',
  `weekend_price` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`id`, `name`, `type`, `price`, `weekend_price`, `created_at`, `updated_at`) VALUES
(1, 'Badminton 1', 'badminton', 30000, 45000, '2026-02-12 21:08:37', '2026-02-12 21:08:37'),
(2, 'Badminton 2', 'badminton', 30000, 45000, '2026-02-12 21:08:37', '2026-02-12 21:08:37'),
(3, 'Badminton 3', 'badminton', 30000, 45000, '2026-02-12 21:08:37', '2026-02-12 21:08:37'),
(4, 'Futsal 1', 'futsal', 90000, 110000, '2026-02-12 21:08:37', '2026-02-12 21:08:37'),
(5, 'Futsal 2', 'futsal', 90000, 110000, '2026-02-12 21:08:37', '2026-02-12 21:08:37'),
(6, 'Basket indoor 1', 'basket_indoor', 200000, 230000, '2026-02-12 21:08:37', '2026-02-12 21:08:37'),
(7, 'Basket indoor 2', 'basket_indoor', 200000, 230000, '2026-02-12 21:08:37', '2026-02-12 21:08:37'),
(8, 'Tennis 1', 'tennis', 70000, 90000, '2026-02-12 21:08:37', '2026-02-12 21:08:37'),
(9, 'Tennis 2', 'tennis', 70000, 90000, '2026-02-12 21:08:37', '2026-02-12 21:08:37'),
(10, 'Mini soccer 1', 'mini_soccer', 650000, 700000, '2026-02-12 21:08:37', '2026-02-12 21:08:37'),
(11, 'Padel 1', 'padel', 300000, 320000, '2026-02-12 21:08:37', '2026-02-12 21:08:37'),
(12, 'Padel 2', 'padel', 300000, 320000, '2026-02-12 21:08:37', '2026-02-12 21:08:37'),
(13, 'Padel 3', 'padel', 300000, 320000, '2026-02-12 21:08:37', '2026-02-12 21:08:37');

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
-- Table structure for table `loyalty_progress`
--

CREATE TABLE `loyalty_progress` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `sport_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_hours` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loyalty_progress`
--

INSERT INTO `loyalty_progress` (`id`, `user_id`, `sport_type`, `total_hours`, `created_at`, `updated_at`) VALUES
(1, 4, 'mini_soccer', -4, '2026-02-17 22:26:06', '2026-02-17 22:26:06'),
(2, 2, 'futsal', -5, '2026-02-17 22:45:06', '2026-02-17 23:00:05'),
(3, 5, 'padel', 3, '2026-02-28 20:13:12', '2026-02-28 20:13:12');

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
(4, '2026_02_09_053824_create_courts_table', 1),
(5, '2026_02_09_053826_create_bookings_table', 1),
(6, '2026_02_13_032908_create_tournaments_table', 1),
(7, '2026_02_13_034244_add_is_recurring_to_tournaments_table', 1),
(8, '2026_02_15_004607_add_contact_to_bookings_table', 2),
(9, '2026_02_18_035931_create_loyalty_tables', 3),
(10, '2026_02_18_072014_add_code_to_bookings_table', 4),
(11, '2026_02_18_163520_add_discount_to_bookings_table', 4),
(12, '2026_02_19_151703_add_sport_type_to_user_rewards_table', 4),
(13, '2026_02_19_163022_add_extend_fields_to_bookings_table', 4),
(14, '2026_02_19_165305_add_extend_duration_to_bookings_table', 4),
(15, '2026_02_27_220125_add_price_columns_to_courts_table', 5);

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
('4ulmRJhLEakukhVkfUA6kapv7SFNXGXntCDJd0ym', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidmdMdndYOVZSaFJIaHFIMzZJNnllU09MaUJmWlBZSGxwUDN0SzRIayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MTQzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYm9va2luZy9jaGVja291dD9jb3VydF9pZD0xMCZkYXRlPTIwMjYtMDMtMDEmZW5kX3RpbWU9MjIlM0EwMCUzQTAwJnByaWNlPTIyNTAwMDAmc3RhcnRfdGltZT0xOSUzQTAwJTNBMDAmdHlwZT1taW5pX3NvY2NlciI7czo1OiJyb3V0ZSI7czoxNDoiYm9va2luZy5jcmVhdGUiO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTtzOjc6ImJvb2tpbmciO2E6NTp7czo4OiJjb3VydF9pZCI7czoyOiIxMCI7czo0OiJkYXRlIjtzOjEwOiIyMDI2LTAzLTAxIjtzOjEwOiJzdGFydF90aW1lIjtzOjg6IjE5OjAwOjAwIjtzOjg6ImVuZF90aW1lIjtzOjg6IjIyOjAwOjAwIjtzOjExOiJ0b3RhbF9wcmljZSI7czo3OiIyMjUwMDAwIjt9fQ==', 1772338118),
('yZ7pT2Xs1xFbEdq8D5D8dl2iE5INuDQG3cr4AyoD', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMzZKcUYxRUdrb1lCdVlRRWdHODQzR2pGTnNUSERTRU9OYXNjc2l0QyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1772370804);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_recurring` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `start_date`, `end_date`, `is_recurring`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Grand Opening Tournament 🎉', '2026-05-05', '2026-05-12', 0, 'Lomba pembukaan arena baru.', '2026-02-12 21:10:05', '2026-02-12 21:10:05'),
(2, 'Lomba Tahunan 🏆', '2024-01-12', '2024-01-17', 1, 'Turnamen rutin tahunan.', '2026-02-12 21:10:05', '2026-02-12 21:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin RCourt', 'admin@rcourt.com', NULL, 'admin', NULL, '$2y$12$ByNjKFeJTovwZ82XEf9DFeTOpWw0ugUkQHZVvf7.4qUPoSahxp7qW', NULL, '2026-02-12 21:08:36', '2026-02-12 21:08:36'),
(2, 'Budi Santoso', 'budi@gmail.com', '089876543210', 'user', NULL, '$2y$12$aWyxuUkIroyU8LMhL7YMZ.ZdJMDz7JSq0t90ARQv7SUHcittteNzy', NULL, '2026-02-12 21:08:36', '2026-02-12 21:08:36'),
(3, 'Siti Aminah', 'siti@gmail.com', '089876543210', 'user', NULL, '$2y$12$VL7TehWZYVKU6Y3sew7dLepR98Wg30O/o2LKz6hXIHedjntDR13UK', NULL, '2026-02-12 21:08:36', '2026-02-12 21:08:36'),
(4, 'Rizky User', 'rizky@gmail.com', '089876543210', 'user', NULL, '$2y$12$BWDKN3O1EOGS4oyQogleMuv6LgqKqIUULkya4fKS/b/YrVd8dYRs6', NULL, '2026-02-12 21:08:37', '2026-02-12 21:08:37'),
(5, 'bandariwa', 'bandar@togel.com', '08118032005', 'user', NULL, '$2y$12$4j099PZWlu8jLhf0Cxf39O02cKk32jj1fc0GYZP5ZU0J6KQriuwCu', NULL, '2026-02-28 19:52:03', '2026-02-28 19:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_rewards`
--

CREATE TABLE `user_rewards` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `reward_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `sport_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookings_code_unique` (`code`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_court_id_foreign` (`court_id`);

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
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `loyalty_progress`
--
ALTER TABLE `loyalty_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loyalty_progress_user_id_foreign` (`user_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_rewards`
--
ALTER TABLE `user_rewards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_rewards_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `courts`
--
ALTER TABLE `courts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loyalty_progress`
--
ALTER TABLE `loyalty_progress`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_rewards`
--
ALTER TABLE `user_rewards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_court_id_foreign` FOREIGN KEY (`court_id`) REFERENCES `courts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `loyalty_progress`
--
ALTER TABLE `loyalty_progress`
  ADD CONSTRAINT `loyalty_progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_rewards`
--
ALTER TABLE `user_rewards`
  ADD CONSTRAINT `user_rewards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
