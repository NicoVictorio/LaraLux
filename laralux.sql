-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 08:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laralux`
--

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
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `address`, `phone_number`, `email`, `type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Catalina Inn', '2015 McFarland Blvd', '08123257631', 'catalina.inn@gmail.com', 1, '2024-07-02 01:23:38', '2024-07-02 01:29:38', NULL),
(2, 'Dothan Inn & Suites', '3285 Montgomery Hwy', '081357497979', 'dothan.inn@gmail.com', 3, '2024-07-02 01:25:02', '2024-07-02 02:54:59', NULL),
(3, 'Athens Inn', '1329 US Highway 72 E', '081357497878', 'athen.inn@gmail.com', 2, '2024-07-02 03:08:02', '2024-07-02 03:09:18', NULL),
(4, 'Park Plaza Motor Inn', '3801 McFarland Blvd E', '082234772832', 'motor.inn@gmail.com', 1, '2024-07-02 03:12:39', '2024-07-02 03:12:39', NULL),
(5, 'Abbeville Inn', '1237 US Highway 431 S', '081234567891', 'abbeville.inn@gmail.com', 3, '2024-07-02 03:14:54', '2024-07-02 03:14:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_types`
--

CREATE TABLE `hotel_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_types`
--

INSERT INTO `hotel_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'City Hotel', '2024-06-11 03:10:06', '2024-06-11 03:10:06', NULL),
(2, 'Residential Hotel', '2024-06-11 03:10:06', '2024-06-11 03:10:06', NULL),
(3, 'Motel', '2024-06-11 03:10:06', '2024-06-11 03:10:06', NULL),
(4, 'dummy', '2024-07-02 02:44:34', '2024-07-02 02:57:06', '2024-07-02 02:57:06'),
(5, 'dummy2', '2024-07-02 03:03:19', '2024-07-02 03:05:16', '2024-07-02 03:05:16'),
(6, 'dummy2', '2024-07-02 03:09:40', '2024-07-02 03:09:48', '2024-07-02 03:09:48');

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
(5, '2024_06_11_090150_create_hotel_types_table', 1),
(6, '2024_06_11_090159_create_hotels_table', 1),
(7, '2024_06_11_090209_create_product_types_table', 1),
(8, '2024_06_11_090216_create_products_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `available_room` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `hotel_id`, `type_id`, `description`, `price`, `available_room`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Standard Room', 1, 1, 'Kamar standar dengan free wifi', 600000, 10, '2024-07-02 06:05:10', '2024-07-02 06:05:10', NULL),
(2, 'Deluxe Room', 2, 2, 'Kamar deluxe dengan free wifi dan bathup', 10000000, 5, '2024-07-02 09:06:34', '2024-07-02 09:06:34', NULL),
(3, 'Superior Room', 2, 3, 'Kamar superior dengan twin bed dan free wifi', 1200000, 7, '2024-07-02 09:07:34', '2024-07-02 09:07:34', NULL),
(4, 'Suite Room', 3, 4, 'Kamar suite dengan 2 king bed, bathtub, private pool, private jacuzzi, and free wifi', 20000000, 3, '2024-07-02 09:10:22', '2024-07-02 09:10:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_transaction`
--

CREATE TABLE `product_transaction` (
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_transaction`
--

INSERT INTO `product_transaction` (`transaction_id`, `product_id`, `quantity`, `subtotal`) VALUES
(1, 1, 3, 1800000),
(2, 1, 2, 1200000),
(3, 4, 2, 40000000),
(4, 2, 1, 10000000),
(4, 3, 1, 1200000),
(4, 1, 1, 600000),
(5, 2, 1, 10000000),
(6, 1, 1, 600000),
(6, 2, 1, 10000000),
(6, 3, 1, 1200000),
(6, 4, 1, 20000000),
(7, 1, 1, 600000),
(7, 2, 2, 20000000);

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Standard', '2024-06-11 03:10:06', '2024-06-11 03:10:06', NULL),
(2, 'Deluxe', '2024-06-11 03:10:06', '2024-06-11 03:10:06', NULL),
(3, 'Superior', '2024-06-11 03:10:06', '2024-06-11 03:10:06', NULL),
(4, 'Suite', '2024-06-11 03:10:06', '2024-06-11 03:10:06', NULL),
(5, 'Single Room', '2024-06-11 03:10:06', '2024-06-11 03:10:06', NULL),
(6, 'Double Room', '2024-06-11 03:10:06', '2024-06-11 03:10:06', NULL),
(7, 'Family Room', '2024-06-11 03:10:06', '2024-06-11 03:10:06', NULL),
(8, 'dummy', '2024-07-02 01:34:21', '2024-07-02 03:03:08', '2024-07-02 10:03:08'),
(9, 'dummy', '2024-07-02 01:42:51', '2024-07-02 02:58:39', '2024-07-02 09:58:39'),
(10, 'dummyttttt', '2024-07-02 03:11:03', '2024-07-02 03:11:13', '2024-07-02 10:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, '2024-07-02 07:02:22', '2024-07-02 07:46:46', NULL),
(2, 10, '2024-07-02 08:34:24', '2024-07-02 08:34:24', NULL),
(3, 11, '2024-07-02 09:12:13', '2024-07-02 09:12:13', NULL),
(4, 12, '2024-07-02 09:17:58', '2024-07-02 09:17:58', NULL),
(5, 12, '2024-07-02 09:19:51', '2024-07-02 09:19:51', NULL),
(6, 13, '2024-07-02 23:39:26', '2024-07-02 23:39:26', NULL),
(7, 13, '2024-07-02 23:40:03', '2024-07-02 23:40:03', NULL);

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
  `poin` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'pembeli'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `poin`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Nico Victorio', 'nico.victorio@gmail.com', NULL, '$2y$10$r.FpXvzVJEMIWJrNef/NA.jNktpLgVSCq1NhXU.kcU3ziqvLS//12', 0, NULL, '2024-06-11 02:53:36', '2024-06-11 02:53:36', 'owner'),
(2, 'Sally Angela', 'sally.angela@gmail.com', NULL, '$2y$10$FLTYowwCo.s9xHj1x6PMxe0cUVgUJrvkKjuk3i4Z58kH0veohAY9W', 6, NULL, '2024-06-11 02:54:18', '2024-06-29 01:38:37', 'owner'),
(3, 'Catherine Belindra Citra', 'catherine@gmail.com', NULL, '$2y$10$IqudO8gOW.aUqMTG.Xnqb.9q4EF.6xDrpmfkEy3Hy0OXR5EJIXTju', 26, NULL, '2024-06-11 02:55:14', '2024-06-29 02:48:11', 'owner'),
(4, 'Valerin', 'valerin@gmail.com', NULL, '$2y$10$0/1JIM.ThBQ.WrFXfWV9weRy.si9kbxmPuwq5D3Z5C6msG7MN0XHi', 0, NULL, '2024-06-11 02:55:41', '2024-06-11 02:55:41', 'owner'),
(5, 'Staff 1', 'staff1@gmail.com', NULL, '$2y$10$rERnDvzx/Di.n2Gbc0iYoOLAJc4q2NBTPAu3uNHjlMdqRaj6ByabS', 0, NULL, '2024-06-11 02:56:20', '2024-06-11 02:56:20', 'staff'),
(6, 'Staff 2', 'staff2@gmail.com', NULL, '$2y$10$9AKLtsSW65oMrJs3ZuuYXeD/TIn5r5CQAJCfm25g4cnEKWNZzKLW6', 0, NULL, '2024-06-11 02:56:53', '2024-06-11 02:56:53', 'staff'),
(7, 'Staff 3', 'staff3@gmail.com', NULL, '$2y$10$1Gewr5P1X1aTZD7pE6JpjOQfuRBC.N4iv1EGFXzI7dKAuq/LdyhP2', 0, NULL, '2024-06-11 03:12:20', '2024-06-11 03:12:20', 'staff'),
(8, 'Staff 4', 'staff4@gmail.com', NULL, '$2y$10$b1GSsOkrK6ECJSCn0aY16OXkvM8r/9IXpTvR1XxQi6bbSbTQyOkyC', 0, NULL, '2024-06-11 03:18:06', '2024-06-11 03:18:06', 'staff'),
(9, 'Staff 5', 'staff5@gmail.com', NULL, '$2y$10$2jPuXRFJXRSjz2up5du6bO.dIy1HRm4OzLM51R130SXBazZLajPUe', 0, NULL, '2024-06-11 03:21:35', '2024-06-11 03:21:35', 'staff'),
(10, 'Sally', 'sally@gmail.com', NULL, '$2y$10$/XpBX9uJi37KQeSNSrnKZOnmQcLbxjveBvOz1EowLDdnZ5bWQ./Ky', 0, NULL, '2024-07-02 06:16:48', '2024-07-02 08:49:31', 'pembeli'),
(11, 'Vincentius Christian Wariky', 'vincent@gmail.com', NULL, '$2y$10$0wEg9tWq8Fc5xs0moZUeVuAwg1A2JCKK6IShYXdWnbjKlcsYNVGHO', 10, NULL, '2024-07-02 07:10:13', '2024-07-02 09:12:13', 'pembeli'),
(12, 'Aileen Averina Lau', 'aileen@gmail.com', NULL, '$2y$10$Xprswr6p14iQ0I0UfQ.ULuGEMbmET7Taqob502Xm3Dp9o6B8FP/0u', 17, NULL, '2024-07-02 07:11:07', '2024-07-02 09:19:51', 'pembeli'),
(13, 'Jeanne Angeline', 'jeanne@gmail.com', NULL, '$2y$10$LawXIJ.RXh5oax0NyZRHx.JvGI8JokQz1H6JU23iGd90J7nFYOPZC', 0, NULL, '2024-07-02 07:12:04', '2024-07-02 23:40:03', 'pembeli');

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
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_type_id_foreign` (`type_id`);

--
-- Indexes for table `hotel_types`
--
ALTER TABLE `hotel_types`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_hotel_id_foreign` (`hotel_id`),
  ADD KEY `products_type_id_foreign` (`type_id`);

--
-- Indexes for table `product_transaction`
--
ALTER TABLE `product_transaction`
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotel_types`
--
ALTER TABLE `hotel_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `hotel_types` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `products_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `product_types` (`id`);

--
-- Constraints for table `product_transaction`
--
ALTER TABLE `product_transaction`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transaction_id` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
