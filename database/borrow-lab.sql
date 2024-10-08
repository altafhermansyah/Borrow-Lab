-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2024 at 05:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borrow-lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'Mouse', '2024-09-30 03:16:08', '2024-09-30 03:16:08'),
(7, 'Keyboard', '2024-09-30 03:32:43', '2024-09-30 03:32:43'),
(8, 'Monitor', '2024-09-30 03:47:32', '2024-09-30 03:47:32'),
(9, 'Printer', '2024-09-30 18:34:48', '2024-09-30 18:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `condition` enum('bad','normal','good') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `image`, `description`, `condition`, `created_at`, `updated_at`) VALUES
(2, 'Headphone Gaming JBL', '8jvYxKMBrzWkrE36eIVW0OVVWf9txO9ROzgT2L10.jpg', 'Super BASS, Stereo Sound', 'normal', '2024-09-13 19:12:03', '2024-09-13 19:12:03'),
(3, 'Headset JETE', 'Jgfiq9gNRhcTyth4yW36IdQsflXYOdCLsV8Rz4lJ.jpg', 'Mono Sound', 'bad', '2024-09-13 19:14:05', '2024-09-13 19:14:05'),
(4, 'Keyboard Fantech', 'fcJ4csLhrA0WYDHh5X2vc1VtNga5zkbe4JxOAO4Y.jpg', 'Mechanical Caps', 'good', '2024-09-13 19:14:37', '2024-09-13 19:14:37'),
(5, 'Monitor LG', 'DX6MRjCo6nDeklTDMZkIErbwAicTIHx2VIqoWa5n.jpg', 'Wide Display, OLED', 'good', '2024-09-13 19:15:03', '2024-09-13 19:15:03'),
(6, 'Speaker JBL', 'hGaA3kmuN8EJ6e9PNCYvqKYgPQz914s9hHvzmWxZ.jpg', '4D Audio', 'bad', '2024-09-13 19:15:58', '2024-09-13 19:15:58'),
(7, 'Mouse ACER', 'x03O73vel7ilDP8szSqYwh2A7KSkQl2PhujQdaSr.jpg', '2000 dpi, Silent Click', 'normal', '2024-09-13 19:16:25', '2024-09-13 19:16:25'),
(8, 'Monitor Samsung', 'iEzOLyQdkqeV3EahIZ0SSDGuNpeyWTwVFVTWDf52.jpg', 'wide', 'normal', '2024-09-30 18:33:56', '2024-09-30 18:33:56'),
(9, 'Keyboard Fantech', 'JN5Rh8ZJJdwaM8p7Ek5MxP2mXe7eyXcUGsHFnjQ5.jpg', 'Mechanical', 'bad', '2024-09-30 18:52:02', '2024-09-30 18:52:02'),
(10, 'Kabel LAN', 'XE3VbEBOFdaW7H5UjChHxvMPZMo0wkd8XLW4f37k.png', 'fast response', 'normal', '2024-10-07 17:43:57', '2024-10-07 17:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `item_id`, `category_id`, `created_at`, `updated_at`) VALUES
(6, 7, 6, '2024-09-30 03:16:15', '2024-09-30 03:16:15'),
(7, 4, 7, '2024-09-30 03:33:39', '2024-09-30 03:33:39'),
(8, 5, 8, '2024-09-30 18:32:40', '2024-09-30 18:32:40'),
(9, 8, 8, '2024-09-30 18:34:15', '2024-09-30 18:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `loan_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `status` enum('pending','borrowed','returnPending','returned','empty') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `user_id`, `item_id`, `loan_date`, `return_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 7, '2024-09-17', '2024-09-17', 'returned', '2024-09-16 17:36:38', '2024-09-16 19:44:36'),
(2, 4, 6, '2024-09-17', '2024-09-24', 'returned', '2024-09-16 17:36:41', '2024-09-23 17:21:05'),
(3, 4, 5, '2024-09-24', '2024-09-24', 'returned', '2024-09-16 17:36:49', '2024-09-23 17:21:01'),
(4, 9, 6, '2024-09-17', '2024-09-17', 'returned', '2024-09-16 20:16:01', '2024-09-16 20:17:40'),
(5, 4, 4, '2024-09-24', '2024-09-24', 'returned', '2024-09-23 17:21:19', '2024-09-23 17:27:30'),
(6, 4, 7, '2024-10-01', '2024-10-01', 'returned', '2024-09-30 18:27:41', '2024-09-30 18:28:13'),
(7, 4, 8, '2024-10-07', '2024-10-08', 'returned', '2024-10-07 14:59:30', '2024-10-07 17:42:44'),
(8, 4, 5, '2024-10-08', '2024-10-08', 'returned', '2024-10-07 17:41:42', '2024-10-07 18:19:34'),
(9, 4, 10, NULL, NULL, 'empty', '2024-10-07 18:16:29', '2024-10-07 18:28:50'),
(10, 4, 7, NULL, NULL, 'empty', '2024-10-07 18:38:55', '2024-10-07 18:39:24'),
(11, 4, 10, NULL, NULL, 'empty', '2024-10-07 20:03:24', '2024-10-07 20:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `loan_histories`
--

CREATE TABLE `loan_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_07_31_230149_create_items_table', 1),
(4, '2024_08_01_033109_create_loans_table', 1),
(5, '2024_08_01_035150_create_loan_histories_table', 1),
(6, '2024_08_01_040316_categories', 1),
(7, '2024_08_01_040441_create_item_categories', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','staff') NOT NULL DEFAULT 'student',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nisn`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'qwer', 'qwer', '$2y$12$Ctu9lz7jPYINvQBua/acqeFbj6ZVGJC94f/O2Dqatkd9ubfBMK2oa', 'staff', NULL, '2024-09-13 19:01:20', '2024-09-13 19:01:20'),
(2, 'Altanix', '1234', '$2y$12$CNCngz0QwrRT5fYg4EwjS.eqryB89XPYOtSTl00uXj90fzlFBatuO', 'staff', NULL, '2024-09-13 19:01:20', '2024-09-13 19:01:20'),
(3, 'Otto Hasibuan', 'otto', '$2y$12$XgjiSywS5BPPzMGxRWQ2uez5Y3u.jI6u0NvnS75EQoD.EGbIRmu0W', 'staff', NULL, '2024-09-13 19:01:20', '2024-09-13 19:01:20'),
(4, 'Hotman Paris', 'hotman', '$2y$12$UHZ/BSV4D4iOD8qS8xApZuBHVQgWFC5XCQTBjfvHeSv7dsxmrwADu', 'student', NULL, '2024-09-13 19:01:20', '2024-09-13 19:01:20'),
(5, 'Tio Aladah', 'tio', '$2y$12$CiJqn00JG8SQvwvdD9twcexNkD.lbO/xh7nD9TH3Jyz4.iRaPeS7C', 'student', NULL, '2024-09-13 19:01:20', '2024-09-13 19:01:20'),
(6, 'Toni Adalah', 'toni', '$2y$12$sUZv1ftzOujGXU4xHBz4P.pXaGzSbZMwusqjrAJPS6i9SqUkcsoVm', 'student', NULL, '2024-09-13 19:01:20', '2024-09-13 19:01:20'),
(7, 'Tino Ladalah', 'tino', '$2y$12$k8WO7kx8rt45bzXTjqDYfOMTTlt2UXgXd.MzUaA7S1HhISbfQmDVm', 'student', NULL, '2024-09-13 19:01:20', '2024-09-13 19:01:20'),
(9, 'salsa', '12345', '$2y$12$VTqfnjEYyq1oXQc3Nzd.W.ngxqh2zOFQoQ5/BS97hxF.Z1ZgGucFi', 'student', NULL, '2024-09-16 20:15:37', '2024-09-16 20:15:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_categories_category_id_foreign` (`category_id`),
  ADD KEY `item_categories_item_id_foreign` (`item_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_item_id_foreign` (`item_id`),
  ADD KEY `loans_user_id_foreign` (`user_id`);

--
-- Indexes for table `loan_histories`
--
ALTER TABLE `loan_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_histories_loan_id_foreign` (`loan_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nisn_unique` (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `loan_histories`
--
ALTER TABLE `loan_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD CONSTRAINT `item_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_categories_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_histories`
--
ALTER TABLE `loan_histories`
  ADD CONSTRAINT `loan_histories_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
