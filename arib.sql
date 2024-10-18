-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2024 at 12:52 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arib`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'History', '2024-10-15 16:20:19', '2024-10-15 16:20:19'),
(3, 'Math', '2024-10-15 16:20:34', '2024-10-15 16:20:34'),
(4, 'Languages', '2024-10-15 16:20:43', '2024-10-15 16:20:43'),
(5, 'Arts', '2024-10-15 16:20:48', '2024-10-15 16:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `manager_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `salary`, `manager_id`, `user_id`, `created_at`, `updated_at`, `department_id`) VALUES
(1, 'Ali', 'Sonbol', 2300.00, 1, NULL, '2024-10-14 16:45:54', '2024-10-15 16:25:58', 2),
(2, 'Mona', 'Ali', 1000.00, 1, NULL, '2024-10-14 16:46:13', '2024-10-15 16:26:08', 5),
(6, 'Mostafa', 'Ayman', 2800.00, 1, NULL, '2024-10-15 16:27:14', '2024-10-15 16:27:14', 2),
(7, 'gege', 'ahmed', 3622.00, 1, 5, '2024-10-15 17:23:24', '2024-10-15 17:24:27', 4),
(8, 'Mohamed', 'Ali', 2100.00, 1, 6, '2024-10-18 09:35:24', '2024-10-18 09:35:24', 3),
(9, 'reda', 'ali', 2600.00, 2, 7, '2024-10-18 09:38:11', '2024-10-18 09:42:56', 3),
(10, 'fathy', 'karim', 6500.00, 2, 9, '2024-10-18 09:41:05', '2024-10-18 09:43:15', 4),
(11, 'sara', 'mohamed', 3200.00, 2, 10, '2024-10-18 09:50:11', '2024-10-18 09:50:12', 4);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_14_190544_add_phone_to_users_table', 2),
(6, '2024_10_14_192652_create_employees_table', 3),
(7, '2024_10_14_195939_create_tasks_table', 4),
(8, '2024_10_15_190903_create_departments_table', 5),
(9, '2024_10_15_191244_add_department_id_to_employees_table', 5),
(10, '2024_10_15_200910_add_role_to_users_table', 6);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `employee_id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'ighiujkghku', 'uijhbijuohbijou', 'pending', '2024-10-14 17:24:13', '2024-10-14 17:24:13'),
(2, 1, 'fgdsgb', 'dfsghbsdfh', 'pending', '2024-10-14 17:24:31', '2024-10-14 17:24:31'),
(3, 7, 'New Task', 'This task is new to you', 'completed', '2024-10-18 09:16:23', '2024-10-18 09:51:47'),
(4, 7, 'how are you?', 'tell me that in arabic', 'completed', '2024-10-18 09:32:41', '2024-10-18 09:32:56');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `role`) VALUES
(1, 'Hussein Sonbol', 'sehssonbol2016@gmail.com', '2024-10-14 19:04:29', '$2y$12$RHV75cam7SUHTyXny2g0ze9opptpIkhiyv.9DGoVYYy1tOmYpkDpu', NULL, '2024-10-14 16:08:39', '2024-10-14 16:08:39', '01003795292', 'manager'),
(2, 'Bassant Sayed', 'bassantsayed511@gmail.com', NULL, '$2y$12$GCJK77Sh1eUSx/j4BixcwOQuhUSSCgF39ZbkaDDKnoPnT4bX7xWai', NULL, '2024-10-15 17:13:01', '2024-10-15 17:13:01', NULL, 'manager'),
(5, 'gege', 'geg@gmail.com', NULL, '$2y$12$tv69qNckqde8NCs6pd3Tuu.tpqBzAwqQo0WPyqf15iG9XXYLy832K', NULL, '2024-10-15 17:23:24', '2024-10-15 17:23:24', NULL, 'employee'),
(6, 'Mohamed', 'mohamed@gmail.com', NULL, '$2y$12$zRSDkx4AyiqbZuNAD/3ZnekbmHWGmU3luOJxMC814xP2FsP5tqfn2', NULL, '2024-10-18 09:35:24', '2024-10-18 09:35:24', NULL, 'employee'),
(7, 'reda', 'reda@gmail.com', NULL, '$2y$12$3p9P/eE7EjrgcN9jLWnZguAb6mMVBe/cyeGMsPhmlXpVMI4zRqOBe', NULL, '2024-10-18 09:38:11', '2024-10-18 09:38:11', NULL, 'employee'),
(8, 'sdfg', 'dfsgh@dfgh.dfgh', NULL, '$2y$12$nfbY92FIF7j6tm9bnFhuIOUn/deD4i6iq5PrbCiw5l40JOkLhxk02', NULL, '2024-10-18 09:40:15', '2024-10-18 09:40:15', NULL, 'manager'),
(9, 'fathy', 'fathy@gmail.com', NULL, '$2y$12$63hxjowqejggNo/mr0ah/e8CKFFK046k79UeVTiCHKjGEvpSDMcdi', NULL, '2024-10-18 09:41:05', '2024-10-18 09:41:05', NULL, 'employee'),
(10, 'sara', 'sara@gmail.com', NULL, '$2y$12$r159IkCBz4A6qtItx4pnWebi4XA3NcCWg0JmsOSgueOohRBvm81L6', NULL, '2024-10-18 09:50:12', '2024-10-18 09:50:12', NULL, 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_manager_id_foreign` (`manager_id`),
  ADD KEY `employees_department_id_foreign` (`department_id`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `employees_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
