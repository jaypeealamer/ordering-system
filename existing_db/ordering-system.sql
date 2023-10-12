-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2023 at 06:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coreproc-ordering-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`id`, `name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(12, 'pizza', NULL, 1, '2023-10-11 04:46:45', '2023-10-11 04:46:45'),
(13, 'burger', NULL, 1, '2023-10-11 04:49:59', '2023-10-11 04:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_tbl`
--

CREATE TABLE `menu_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `featured` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_tbl`
--

INSERT INTO `menu_tbl` (`id`, `name`, `price`, `image`, `description`, `featured`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'lasagna', '200', '2023-10-11-Pizza-Lasagna-serving-on-white-plate-with-green-salad.jpg', 'Good For 2 Persons', 0, 1, 12, '2023-10-11 04:48:13', '2023-10-11 05:38:11'),
(4, 'triple cheese burger', '250', '2023-10-11-burger.jpeg', 'With Pickles and Tomato Sauce', 1, 1, 13, '2023-10-11 04:53:04', '2023-10-11 04:53:04');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_10_180644_category_tbl', 1),
(7, '2023_10_10_181730_create_menu_tbl', 2),
(10, '2023_10_11_190700_create_orders_tbl', 3),
(12, '2023_10_11_204015_create_order_status_history_tbl', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders_tbl`
--

CREATE TABLE `orders_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ordered',
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_tbl`
--

INSERT INTO `orders_tbl` (`id`, `name`, `price`, `number`, `address`, `quantity`, `status`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 'jay-pee alamer', '200', '09123456789', 'test', 3, 'delivered', 2, '2023-10-11 11:32:54', '2023-10-11 12:48:32'),
(2, 'jay-pee alamer', '250', '0912345678', 'test address', 5, 'delivered', 4, '2023-10-11 12:47:34', '2023-10-11 19:26:01'),
(3, 'j', '200', '3', 'j', 1, 'delivered', 2, '2023-10-11 19:46:53', '2023-10-11 19:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_status_history_tbl`
--

CREATE TABLE `order_status_history_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status_history_tbl`
--

INSERT INTO `order_status_history_tbl` (`id`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'on delivery', '2023-10-11 12:46:24', '2023-10-11 12:46:24'),
(2, 2, 'ordered', '2023-10-11 12:47:34', '2023-10-11 12:47:34'),
(3, 1, 'delivered', '2023-10-11 12:48:32', '2023-10-11 12:48:32'),
(4, 2, 'on delivery', '2023-10-11 12:48:45', '2023-10-11 12:48:45'),
(5, 2, 'cancelled', '2023-10-11 12:48:55', '2023-10-11 12:48:55'),
(6, 2, 'ordered', '2023-10-11 12:49:25', '2023-10-11 12:49:25'),
(7, 2, 'on delivery', '2023-10-11 18:40:20', '2023-10-11 18:40:20'),
(8, 2, 'delivered', '2023-10-11 19:26:01', '2023-10-11 19:26:01'),
(9, 3, 'ordered', '2023-10-11 19:46:53', '2023-10-11 19:46:53'),
(10, 3, 'on delivery', '2023-10-11 19:56:22', '2023-10-11 19:56:22'),
(11, 3, 'delivered', '2023-10-11 19:56:30', '2023-10-11 19:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'jay-pee alamer', 'test@gmail.com', NULL, '$2y$10$AvLwCo54UIet4nN/cSJHFuBDAUy4q1gAR6issCFK7ESmOKrK97rt2', 'diq5C0ncxtxL90919VVnrdRP8ugncJKQzvaYx2NfkJWd7mNhFwrmixBLM2hL', '2023-10-11 06:55:12', '2023-10-11 08:29:29'),
(4, 'test jaypee', 'test@gmail.comf', NULL, '$2y$10$AmHtFbColu0QjQeJAA0CPebqdkSUDcrzLD0tgVGucvgb6cnmfwYHu', NULL, '2023-10-11 19:27:01', '2023-10-11 20:10:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menu_tbl`
--
ALTER TABLE `menu_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_tbl_category_id_foreign` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_tbl_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `order_status_history_tbl`
--
ALTER TABLE `order_status_history_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_status_history_tbl_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_tbl`
--
ALTER TABLE `menu_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_status_history_tbl`
--
ALTER TABLE `order_status_history_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_tbl`
--
ALTER TABLE `menu_tbl`
  ADD CONSTRAINT `menu_tbl_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_tbl` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  ADD CONSTRAINT `orders_tbl_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu_tbl` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_status_history_tbl`
--
ALTER TABLE `order_status_history_tbl`
  ADD CONSTRAINT `order_status_history_tbl_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders_tbl` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
