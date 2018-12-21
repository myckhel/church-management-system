-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2018 at 05:57 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `churchcms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `collections_types`
--

CREATE TABLE `collections_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections_types`
--

INSERT INTO `collections_types` (`id`, `branch_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 13, 'Offering', '2018-12-20 14:20:31', '2018-12-21 15:37:31'),
(3, 13, 'Building_Collection', '2018-12-21 15:37:55', '2018-12-21 15:51:50'),
(4, 13, 'Seed_Offering', '2018-12-21 15:39:40', '2018-12-21 15:51:58'),
(5, 13, 'Favour_Collection', '2018-12-21 15:40:33', '2018-12-21 15:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `member_savings`
--

CREATE TABLE `member_savings` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `collections_types_id` int(10) UNSIGNED NOT NULL,
  `service_types_id` int(10) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL,
  `date_collected` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_savings`
--

INSERT INTO `member_savings` (`id`, `branch_id`, `member_id`, `collections_types_id`, `service_types_id`, `amount`, `date_collected`, `created_at`, `updated_at`) VALUES
(33, 13, 31, 2, 1, 0, '2018-12-11', '2018-12-21 15:24:59', '2018-12-21 15:24:59'),
(34, 13, 39, 2, 1, 44, '2018-12-11', '2018-12-21 15:24:59', '2018-12-21 15:24:59'),
(35, 13, 40, 2, 1, 0, '2018-12-11', '2018-12-21 15:24:59', '2018-12-21 15:24:59'),
(36, 13, 54, 2, 1, 44, '2018-12-11', '2018-12-21 15:24:59', '2018-12-21 15:24:59'),
(37, 13, 73, 2, 1, 0, '2018-12-11', '2018-12-21 15:24:59', '2018-12-21 15:24:59'),
(38, 13, 74, 2, 1, 4, '2018-12-11', '2018-12-21 15:24:59', '2018-12-21 15:24:59'),
(45, 13, 31, 2, 2, 54, '2018-12-20', '2018-12-21 15:34:47', '2018-12-21 15:34:47'),
(46, 13, 39, 2, 2, 45, '2018-12-20', '2018-12-21 15:34:47', '2018-12-21 15:34:47'),
(47, 13, 40, 2, 2, 455, '2018-12-20', '2018-12-21 15:34:47', '2018-12-21 15:34:47'),
(48, 13, 54, 2, 2, 155, '2018-12-20', '2018-12-21 15:34:47', '2018-12-21 15:34:47'),
(49, 13, 73, 2, 2, 45, '2018-12-20', '2018-12-21 15:34:47', '2018-12-21 15:34:47'),
(50, 13, 74, 2, 2, 8448, '2018-12-20', '2018-12-21 15:34:47', '2018-12-21 15:34:47'),
(57, 13, 31, 2, 2, 0, '2018-12-18', '2018-12-21 15:35:35', '2018-12-21 15:35:35'),
(58, 13, 39, 2, 2, 0, '2018-12-18', '2018-12-21 15:35:35', '2018-12-21 15:35:35'),
(59, 13, 40, 2, 2, 0, '2018-12-18', '2018-12-21 15:35:35', '2018-12-21 15:35:35'),
(60, 13, 54, 2, 2, 0, '2018-12-18', '2018-12-21 15:35:35', '2018-12-21 15:35:35'),
(61, 13, 73, 2, 2, 0, '2018-12-18', '2018-12-21 15:35:35', '2018-12-21 15:35:35'),
(62, 13, 74, 2, 2, 0, '2018-12-18', '2018-12-21 15:35:35', '2018-12-21 15:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `collections_types_id` int(10) UNSIGNED NOT NULL,
  `service_types_id` int(10) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_collected` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `branch_id`, `collections_types_id`, `service_types_id`, `amount`, `created_at`, `updated_at`, `date_collected`) VALUES
(2, 13, 2, 2, 4, '2018-12-21 14:20:44', '2018-12-21 14:20:44', '2018-12-02'),
(4, 13, 2, 2, 141, '2018-12-21 15:34:11', '2018-12-21 15:34:11', '2018-12-20'),
(5, 13, 2, 4, 4000, '2018-12-21 15:43:42', '2018-12-21 15:43:42', '2018-12-03'),
(6, 13, 2, 4, 4500, '2018-12-21 15:53:11', '2018-12-21 15:53:11', '2018-12-04'),
(7, 13, 3, 4, 5000, '2018-12-21 15:53:11', '2018-12-21 15:53:11', '2018-12-04'),
(8, 13, 4, 4, 4000, '2018-12-21 15:53:11', '2018-12-21 15:53:11', '2018-12-04'),
(9, 13, 5, 4, 3000, '2018-12-21 15:53:11', '2018-12-21 15:53:11', '2018-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `branch_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 13, 'Sunday Service', '2018-12-20 15:06:56', '2018-12-21 11:39:39'),
(2, 13, 'Revival Service', '2018-12-21 11:39:52', '2018-12-21 11:39:52'),
(3, 13, 'Environmental Service', '2018-12-21 15:40:03', '2018-12-21 15:40:03'),
(4, 13, 'Anu Service', '2018-12-21 15:40:16', '2018-12-21 15:40:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collections_types`
--
ALTER TABLE `collections_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collections_types_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `member_savings`
--
ALTER TABLE `member_savings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_savings_branch_id_foreign` (`branch_id`),
  ADD KEY `member_savings_member_id_foreign` (`member_id`),
  ADD KEY `member_savings_collections_types_id_foreign` (`collections_types_id`),
  ADD KEY `member_savings_service_types_id_foreign` (`service_types_id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `savings_branch_id_foreign` (`branch_id`),
  ADD KEY `savings_collections_types_id_foreign` (`collections_types_id`),
  ADD KEY `savings_service_types_id_foreign` (`service_types_id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_types_branch_id_foreign` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collections_types`
--
ALTER TABLE `collections_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member_savings`
--
ALTER TABLE `member_savings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collections_types`
--
ALTER TABLE `collections_types`
  ADD CONSTRAINT `collections_types_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `member_savings`
--
ALTER TABLE `member_savings`
  ADD CONSTRAINT `member_savings_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `member_savings_collections_types_id_foreign` FOREIGN KEY (`collections_types_id`) REFERENCES `collections_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `member_savings_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `member_savings_service_types_id_foreign` FOREIGN KEY (`service_types_id`) REFERENCES `service_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `savings`
--
ALTER TABLE `savings`
  ADD CONSTRAINT `savings_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `savings_collections_types_id_foreign` FOREIGN KEY (`collections_types_id`) REFERENCES `collections_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `savings_service_types_id_foreign` FOREIGN KEY (`service_types_id`) REFERENCES `service_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_types`
--
ALTER TABLE `service_types`
  ADD CONSTRAINT `service_types_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
