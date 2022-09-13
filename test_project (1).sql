-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 06:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `phone`, `profile_pic`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Kartik Mahato', 'kartik123@gmail.com', NULL, '1662613052.png', '$2y$10$w6Eud6Fcci16.btnTXKj4eVeCfHKfCO3DA.u91/VqvlTjv6V6ZCEy', 1, NULL, '2022-09-07 23:27:32'),
(2, 'Kushal Majumder', 'kushal123@gmail.com', NULL, NULL, '$2y$10$782FuIedLW2aZOhJpnPE3O0XeSdZRJe5JYg4OFk0Lq62QeiBCrz2y', 2, NULL, NULL),
(3, 'Sangeeta Chowdhury', 'sangeeta123@gmail.com', NULL, NULL, '$2y$10$m3NIQZTHxkE3lltWNKjsmuqgjZz1kGAN9A0I9tNH37ekrdCiuYJ0u', 2, NULL, NULL),
(4, 'Souvik Das', 'souvik123@gmail.com', NULL, NULL, '$2y$10$KcL1VUXn73Rz2yy/MjMOiekoDQKzeRBfeEKb42pdqCgAXk2YLMTuu', 3, NULL, NULL),
(5, 'Suman Kundu', 'suman123@gmail.com', NULL, NULL, '$2y$10$T2J22WG7GLGsnl4tnMrxceGpI3a4gALh02r3j4ys3U5wc2M83t/8a', 3, NULL, NULL),
(6, 'Kartik Mahato', 'mahatokartik835@gmail.com', 9874589698, '1661418649.webp', '$2y$10$Sgc/NBmWLuSgJ22pk1.JgOB1CEOcQGn22oFv0XCBppvA2BUoI/GQa', 1, '2022-08-22 00:11:23', '2022-08-25 03:40:49'),
(7, 'Sumit Mahato', 'sumit123@gmail.com', NULL, NULL, '$2y$10$tH5uiEe8gJX3btb0raeymuTFc2JgHE/pt2pTNbC6kCIXh9/gqmEuC', 1, NULL, NULL),
(8, 'Anil Gupta', 'anil123@gmail.com', NULL, NULL, '$2y$10$554uXxPcU7.9uMlziSQ0K.ri4s94QjOnNuOwM8ZgBh6uxEnP3Dou2', 2, NULL, NULL),
(9, 'Khusal Gupta', 'khusal123@gmail.com', NULL, NULL, '$2y$10$x318EJf5qhP2hFAEIhF1wOF/FTnVBbFG6VULoyCW03rzUZPzLQOL.', 3, NULL, NULL),
(10, 'Vinit Pratap', 'vinit123@gmail.com', NULL, NULL, '$2y$10$f9cBqtAcmCBfGQ9QTxQ81.2xdq2KFqnsVybfPrhGyxU7x7GTSQ5CG', 3, NULL, NULL),
(11, 'Ashish Kumar', 'ashish123@gmail.com', NULL, NULL, '$2y$10$GjbQFw7DwO1Tom7HbCfTiO858rHKOs6U/gY6/XV1YZME46b7UcduS', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Bedroom Design 1', '1661939809.jpg', 1, '2022-08-23 05:15:13', '2022-08-31 04:26:49'),
(8, 'Bedroom Desing 2', '1661251584.jpg', 1, '2022-08-23 05:15:41', '2022-08-23 05:20:28'),
(9, 'Living Room 1', '1661251915.jpg', 1, '2022-08-23 05:21:55', '2022-08-25 03:17:23'),
(10, 'Kitchen Design 1', '1661417030.jpg', 1, '2022-08-25 03:13:50', '2022-08-26 01:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `communicaton_details`
--

CREATE TABLE `communicaton_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `communicaton_details`
--

INSERT INTO `communicaton_details` (`id`, `admin_id`, `user_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-09-12', NULL, NULL),
(2, 1, 5, '2022-09-12', NULL, NULL),
(3, 1, 3, '2022-09-12', NULL, NULL),
(4, 1, 4, '2022-09-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_message` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `phone`, `message`, `reply_message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kartik Mahato', 'kartik45@gmail.com', 9988563214, 'hi', NULL, 0, '2022-08-11 00:36:31', '2022-08-11 00:36:31'),
(2, 'Kartik Mahato', 'mahatokartik835@gmail.com', 9874521036, 'hello', NULL, 0, '2022-08-11 00:37:49', '2022-08-11 00:37:49'),
(3, 'Kartik Mahato', 'souvik65@gmail.com', 9874521036, 'fsdfef', 'your query has been solved by our team', 1, '2022-08-11 00:44:17', '2022-08-31 00:33:28'),
(4, 'Kartik Mahato', 'kartik45@gmail.com', 9874521036, 'asdferstr', 'hello kartik', 1, '2022-08-11 00:48:45', '2022-08-29 03:45:03'),
(5, 'Souvik Das', 'souvik65@gmail.com', 9632574125, 'enquiry from souvik das', 'hi souvik your enquiry has been solved', 1, '2022-08-11 00:51:21', '2022-08-25 04:54:00'),
(8, 'Sangeeta Chowdhury', 'sangeeta3554@gmail.com', 6876897865, 'dbnsjkabf', 'ello', 1, '2022-08-12 01:31:43', '2022-08-25 04:40:19'),
(9, 'Kartik Mahato', 'mahatokartik835@gmail.com', 9632574125, 'arfwerter', 'thanks', 1, '2022-08-16 05:35:20', '2022-08-25 04:38:00'),
(13, 'Kartik Mahato', 'ykmahato.9656@gmail.com', 7688757576, 'My enquiry is related to the corporate office design.', 'Hi congrtas your query has been solved by our team, now you can checkout our featured products.', 1, '2022-08-23 07:05:40', '2022-08-24 04:24:39'),
(14, 'Kartik', 'ykmahato.9656@gmail.com', 9988563214, 'hello', 'thanks for contacting us.', 1, '2022-08-25 04:51:00', '2022-08-25 04:51:27'),
(15, 'suman', 'suman4@gmail.com', 7688757576, 'hii', 'helllo . your enquiry has been solved by our team', 1, '2022-08-25 04:52:48', '2022-08-25 04:53:29'),
(19, 'Sangeeta Chowdhury', 'sangeeta3554@gmail.com', 7896541263, 'hii', 'hello', 1, '2022-08-29 04:12:01', '2022-08-31 00:29:15');

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
-- Table structure for table `featured_products`
--

CREATE TABLE `featured_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `featured_products`
--

INSERT INTO `featured_products` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bedroom', '1661256135.jpg', 1, '2022-08-23 06:32:15', '2022-08-24 23:59:46'),
(2, 'Living Room', '1661256398.jpg', 1, '2022-08-23 06:36:38', '2022-08-28 23:16:35'),
(3, 'Kitchen', '1661256874.jpg', 1, '2022-08-23 06:44:34', '2022-09-02 07:11:27'),
(4, 'Dining Room', '1661256998.jpg', 1, '2022-08-23 06:46:38', '2022-08-23 06:46:38'),
(5, 'Dress Showroom', '1661257270.jpg', 1, '2022-08-23 06:51:11', '2022-08-23 06:51:11'),
(6, 'Hotel & Restaurant', '1661318363.jpg', 1, '2022-08-23 23:49:23', '2022-08-23 23:49:23'),
(8, 'Corporate Office', '1661405787.jpg', 1, '2022-08-25 00:06:27', '2022-08-25 00:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `main_menus`
--

CREATE TABLE `main_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_menus`
--

INSERT INTO `main_menus` (`id`, `name`, `slug`, `description`, `images`, `sub_menu`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about_us', 'about us page description, newly added about us page.wejhgrfwetyfdatydfukasrtqw', NULL, '0', 1, '2022-09-01 03:17:39', '2022-09-12 07:00:32'),
(2, 'Residential Interior', 'residential_interior', 'living room page description', NULL, '1', 1, '2022-09-01 03:17:58', '2022-09-09 04:52:49'),
(3, 'Commercial Interior', 'commercial_interior', 'commericial interior design page', NULL, '1', 1, '2022-09-01 06:06:42', '2022-09-01 06:07:31');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_08_061121_create_tests_table', 1),
(6, '2022_08_09_070729_create_enquiries_table', 1),
(7, '2022_08_18_051524_create_admins_table', 2),
(8, '2022_08_18_072354_add_extra_columns_to_admins_table', 3),
(9, '2022_08_22_055845_create_banners_table', 4),
(10, '2022_08_23_111848_create_featured_products_table', 5),
(12, '2022_08_24_053946_add_extra_fields_to_enquiries_table', 6),
(13, '2022_08_24_095612_change_column_attributes_of_enquiries_table', 7),
(41, '2022_09_01_052615_create_main_menus_table', 8),
(42, '2022_09_01_062646_create_sub_menus_table', 8),
(43, '2022_09_05_095316_add_new_column_to_main_menus_table', 9),
(44, '2022_09_07_104914_add_extra_column_to_admins_table', 10),
(46, '2022_09_08_122916_delete_field_from_main_menus_table', 11),
(47, '2022_09_08_122931_delete_field_from_sub_menus_table', 11),
(49, '2022_09_08_122659_create_page_images_table', 12),
(50, '2022_09_12_063957_create_communicaton_details_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `page_images`
--

CREATE TABLE `page_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_images`
--

INSERT INTO `page_images` (`id`, `page_slug`, `images`, `created_at`, `updated_at`) VALUES
(1, 'about_us', '631f262db1e54.jpg,631f2617c0610.jpg,631f2617c0b61.jpg,631f262db24d1.jpg', '2022-09-12 06:59:11', '2022-09-12 06:59:33'),
(2, 'living_room', '631f293b22676.jpg,631f293b22ba3.jpg,631f293b23286.jpg', '2022-09-12 07:12:35', '2022-09-12 07:12:35'),
(3, 'hotel_restaurant', '631f31d99ef65.jpg,631f31d99f65d.jpg,631f31d9a06d3.jpg,631f31d9a0c48.jpg', '2022-09-12 07:49:21', '2022-09-12 07:49:21');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_menu_id` int(11) NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `name`, `slug`, `parent_menu_id`, `description`, `images`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Living Room', 'living_room', 2, 'living room page description', NULL, 1, '2022-09-01 03:18:25', '2022-09-09 04:58:44'),
(2, 'Dining Room', 'dining_room', 2, 'dining room page description', NULL, 1, '2022-09-01 03:19:24', '2022-09-09 04:59:23'),
(3, 'Hotel & Restaurant', 'hotel_restaurant', 3, 'Hotel & Restaurant design page', '6310997b871e2.jpg,6310997b87966.jpg,6310997b87f54.jpg', 1, '2022-09-01 06:07:31', '2022-09-01 06:07:31'),
(4, 'Office Interior', 'office_interior', 3, 'sdfvhguy awt jhwegwfy wfy', NULL, 1, '2022-09-09 08:03:50', '2022-09-09 08:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communicaton_details`
--
ALTER TABLE `communicaton_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `featured_products`
--
ALTER TABLE `featured_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menus`
--
ALTER TABLE `main_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_images`
--
ALTER TABLE `page_images`
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
-- Indexes for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `communicaton_details`
--
ALTER TABLE `communicaton_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_products`
--
ALTER TABLE `featured_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `main_menus`
--
ALTER TABLE `main_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `page_images`
--
ALTER TABLE `page_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
