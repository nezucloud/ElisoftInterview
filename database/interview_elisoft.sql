-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2023 at 07:42 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview_elisoft`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Bagas Triananda', 'bagas868@outlook.co.id', NULL, '$2y$10$1.xEXsGIRXRHJtXUbyYUPOGSgs.h6oSrYqgTYm8EnX3Ae70dr5d36', '65byKY2LfClCFz5OzdIpEadjCW7UDjFm04yydoMzbk1QYxC9lwDcPSYzr9Cj', '2023-03-01 07:47:13', '2023-03-01 07:47:13'),
(3, 'Jordan Henderson', 'xytoxedavy@mailinator.com', NULL, '$2y$10$GnCLogKYVRKJ0t1lFf0ydOc0s3PDG0oLr0ZfCMu4vkHCEw0KoMDTi', NULL, '2023-03-02 10:39:23', '2023-03-02 11:42:38'),
(5, 'Joel Fleming', 'xypiku@mailinator.com', NULL, '$2y$10$LRXr.ceK4/M.pbNBlXtsnu6n2uTQpg2DwqswyvHii8X2Gu6SDNX2C', NULL, '2023-03-02 11:08:40', '2023-03-02 11:08:40'),
(6, 'Blythe Barry', 'wodetam@mailinator.com', NULL, '$2y$10$N40P5zZtp9jEyo.mn6NwGOcb4jTqevgx2Xgx8a6rwtAZMt3Cjh53i', NULL, '2023-03-02 11:09:29', '2023-03-02 11:09:29'),
(7, 'Lars Lawson', 'dyja@mailinator.com', NULL, '$2y$10$Ht2XPRxZM8ZGQSvFxwI30Oy0dN4fyxcOxB9Y815WPZ3CdByLExRjm', NULL, '2023-03-02 11:10:50', '2023-03-02 11:10:50'),
(8, 'Kasper Brooks', 'hufatin@mailinator.com', NULL, '$2y$10$WetQC25Spqeo7yN9.w3veutlLTfezQ6nDwAPnT2dP9.nREb4lCCb2', NULL, '2023-03-02 11:11:00', '2023-03-02 11:11:00'),
(10, 'Craig Gibson', 'pyvepugu@mailinator.com', NULL, '$2y$10$UsGbqKCJ2ds2y.30/dG0.O0BriRGh3N/G5l9EHSHIxyrUbIxgLMlG', NULL, '2023-03-02 11:13:51', '2023-03-02 11:13:51'),
(11, 'Jarrod Hoffman', 'wahix@mailinator.com', NULL, '$2y$10$aflJDz8SgjTZDUPZE0mfWeltV3NWoA8yYzgPK.N27KDBskh3maX0C', NULL, '2023-03-02 11:15:35', '2023-03-02 11:15:35'),
(13, 'Tucker Grimes', 'gihu@mailinator.com', NULL, '$2y$10$/tSiwSTF2hl2oRLyNq8bgeKdidPCugTyB/H2uL3PvxzNM8WZGHkEe', NULL, '2023-03-02 11:17:18', '2023-03-02 11:17:18'),
(14, 'Mannix Santos', 'juhujuril@mailinator.com', NULL, '$2y$10$f87dewGKxLwJ9ic41AQZXurlw6Nd325yuXajRtjri8eq4TMfv9eji', NULL, '2023-03-02 11:22:47', '2023-03-02 11:22:47'),
(15, 'Connor Stark', 'pydyfeseq@mailinator.com', NULL, '$2y$10$jO7zm.bxiXUPu/hkApQy3OmGiauAewlfezqCM1A7Jjuhh3hTUaEm.', NULL, '2023-03-02 11:23:23', '2023-03-02 11:23:23'),
(16, 'Gannon Robinson', 'nuky@mailinator.com', NULL, '$2y$10$6Im3Tk31RUxHdarierS3Augs48mDET0e6g/OAYUBwHJB04PIVlIRe', NULL, '2023-03-02 11:24:18', '2023-03-02 11:24:18'),
(17, 'Tamekah Joyce', 'pebicubi@mailinator.com', NULL, '$2y$10$P.u7lLOTmrjT6jsS0mfhduPpSzSzePIaEWHuK2kl3SW4HK4YZipJu', NULL, '2023-03-02 11:24:34', '2023-03-02 11:24:34'),
(18, 'Brynn Buck', 'zyzi@mailinator.com', NULL, '$2y$10$aqRgOxCNoW9a6yFgWXqYx.0t1RQEHrn7S8e3WwW/TDUH846UcwxIi', NULL, '2023-03-02 11:25:16', '2023-03-02 11:25:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
