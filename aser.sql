-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 09:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aser`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `users_id`, `message`, `sender`, `created_at`, `updated_at`) VALUES
(1, 6, 'your abstract status change to :revision', 'system', '2022-11-30 23:32:08', '2022-11-30 23:32:08'),
(2, 6, 'your payment status change to <b>unpaid</b>', 'system', '2022-11-30 23:34:23', '2022-11-30 23:34:23'),
(3, 18, 'your abstract status change to accepted', 'system', '2022-11-30 23:47:59', '2022-11-30 23:47:59'),
(4, 6, 'your abstract status change to accepted', 'system', '2022-12-01 06:51:41', '2022-12-01 06:51:41'),
(5, 18, 'silahkan lanjutkan upload paper dan ppt nya', 'admin', '2022-12-01 07:47:26', '2022-12-01 07:47:26'),
(6, 6, 'lengkapi daftar team anda dulu', 'admin', '2022-12-01 08:24:26', '2022-12-01 08:24:26'),
(7, 6, 'your payment status change to unpaid', 'system', '2022-12-22 06:40:59', '2022-12-22 06:40:59'),
(8, 6, 'your paper status change to accepted', 'system', '2023-01-31 16:12:49', '2023-01-31 16:12:49'),
(9, 6, 'your paper status change to accepted', 'system', '2023-01-31 16:14:15', '2023-01-31 16:14:15'),
(10, 6, 'your payment status change to unpaid', 'system', '2023-02-02 16:29:51', '2023-02-02 16:29:51'),
(11, 6, 'your payment status change to paid', 'system', '2023-02-02 16:33:11', '2023-02-02 16:33:11'),
(12, 18, 'halo', 'admin', '2023-02-02 16:42:35', '2023-02-02 16:42:35'),
(13, 6, 'your payment status change to unpaid', 'system', '2023-02-06 07:06:23', '2023-02-06 07:06:23');

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
(3, '2022_11_02_093927_create_team_table', 2),
(5, '2022_11_08_175212_create_paper_table', 3),
(6, '2014_01_07_073615_create_tagged_table', 4),
(7, '2014_01_07_073615_create_tags_table', 4),
(8, '2016_06_29_073615_create_tag_groups_table', 4),
(9, '2016_06_29_073615_update_tags_table', 4),
(10, '2020_03_13_083515_add_description_to_tags_table', 4),
(12, '2022_11_29_173103_create_message_table', 5),
(13, '2022_12_16_153536_create_webinar_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullpaper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `powerpoint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abstract_status` enum('submitted','under review','accepted','revision','rejected') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paper_status` enum('submitted','under review','accepted','revision','rejected') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paper_attribute` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `users_id`, `title`, `abstract`, `fullpaper`, `powerpoint`, `payment`, `payment_status`, `abstract_status`, `paper_status`, `paper_attribute`, `year`, `country`, `created_at`, `updated_at`) VALUES
(14, 6, 'TEST', 'uploads/abstract/4THASER001.pdf', NULL, NULL, 'uploads/payment/4THASER001.png', 'paid', 'accepted', 'accepted', 1, 2022, 'indonesia', '2022-11-24 02:21:23', '2023-02-06 07:06:16');

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
-- Table structure for table `tagging_tagged`
--

CREATE TABLE `tagging_tagged` (
  `id` int(10) UNSIGNED NOT NULL,
  `taggable_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagging_tagged`
--

INSERT INTO `tagging_tagged` (`id`, `taggable_id`, `taggable_type`, `tag_name`, `tag_slug`) VALUES
(10, 14, 'App\\Paper', 'Coba', 'coba'),
(11, 14, 'App\\Paper', 'Untuk', 'untuk'),
(12, 14, 'App\\Paper', 'Test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tags`
--

CREATE TABLE `tagging_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suggest` tinyint(1) NOT NULL DEFAULT 0,
  `count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `tag_group_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagging_tags`
--

INSERT INTO `tagging_tags` (`id`, `slug`, `name`, `suggest`, `count`, `tag_group_id`, `description`) VALUES
(10, 'coba', 'Coba', 0, 1, NULL, NULL),
(11, 'untuk', 'Untuk', 0, 1, NULL, NULL),
(12, 'test', 'Test', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tag_groups`
--

CREATE TABLE `tagging_tag_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `users_id`, `name`, `university`, `country`, `address`, `city`, `created_at`, `updated_at`) VALUES
(1, 6, 'donkpret10 team1', 'stie mahardhika', 'Australia', 'jl. melbourne no 15 gang klinkit', 'melbourne', '2022-11-03 11:18:48', '2022-11-21 07:43:34'),
(3, 7, 'dewa2 team1', '123456789', '', '', '', '2022-11-08 20:18:50', '2022-11-15 10:18:44'),
(4, 6, 'donkpret10 team2', '12345678', 'Australia', 'jl. raya darmo no.49', 'manila', '2022-11-10 02:22:55', '2022-11-21 10:06:16'),
(5, 6, 'donkpret10 team3', '12345678', 'Indonesia', 'langit', 'surabaya', '2022-11-10 02:23:39', '2022-11-21 07:53:29'),
(6, 7, 'dewa2 team2', '1234567', '', '', '', '2022-11-15 10:19:03', NULL),
(7, 16, 'user1 orang1', '1234567', '', '', '', '2022-11-16 05:12:13', NULL),
(8, 18, 'donkpret14 team 2', 'stie mahardhika', 'Indonesia', 'jl. melbourne no 15 gang klinkit', 'melbourne', '2022-11-29 07:52:38', NULL),
(9, 18, 'donkpret14 team 3', 'stie mahardhika', 'Philipine', 'jl. raya darmo no.49', 'manila', '2022-11-29 07:53:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_user` enum('admin','reviewer','full paper','non-full paper','discussant','session head','opening speech','speaker workshop') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `picture`, `email`, `university`, `address`, `city`, `country`, `email_verified_at`, `password`, `remember_token`, `jenis_user`, `created_at`, `updated_at`) VALUES
(1, 'DEWA', NULL, 'godzhadow@gmail.com', '', '', NULL, NULL, '2022-09-27 02:42:23', '$2y$10$ysVsTcSpvJEpvqilsfXeLuaz2fpqzjB950XJRjbrOloOHQbTRfdFq', '1VKvrIzfxaOpRXMLBUOaZKH6ccenLHgGXEBmr0IokzubaaL4UXc6N6RQhxlx', 'admin', '2022-09-27 02:42:02', '2022-11-22 00:19:28'),
(6, 'DEWA1', NULL, 'donkpret10@gmail.com', 'stie mahardhika', 'jl. raya darmo no.49', 'surabaya', 'Indonesia', '2022-10-18 08:35:53', '$2y$10$uwtpR8QdjuJN.xnk6laO3u8KwX4lMh7xKcLTl4P1Wi9tl96eVPfma', 'rewKZM5VD9wMzCHTToOVyQ9TI5x5NtsIqyPmh53uTKRWOV9I5pT20m9YXvkE', 'full paper', '2022-10-18 01:35:29', '2022-11-22 00:19:58'),
(7, 'dewa2', NULL, 'dewa2@gmail.com', '', '', NULL, NULL, '2022-10-28 02:16:55', '$2y$10$qvP8hJvSveQUf4f7oynPx.fX2RFbhkPfDs02bWssAVxF/5SlaM8p.', 'fFGDsSn75XEIjkoYLYXq81E5ESqzv5Dl90uv0vV76s44c37pOLoeEgqms9zw', 'full paper', NULL, '2022-10-28 21:14:50'),
(9, 'akun tesing', NULL, 'testing@testing.com', NULL, '12345678', NULL, NULL, NULL, '$2y$10$2t1VcvZwV.DbIXLjYdx3X.Wqp9YPXr6c5IVpKpjD.8pP.mxs6vY4m', 'NFXp0mivrXjHwf8sTcK96CNbNDNyImZ2rbRdygQYCPibZ4NhUqKIEj8knday', 'full paper', '2022-10-31 02:29:17', '2022-10-31 02:29:17'),
(10, 'testing', NULL, 'testing2@testing.com', 'univ testing indonesia', '12345678', NULL, NULL, '2022-10-31 09:34:07', '$2y$10$dyeQskceMLkNH/Efh2ArpuYn4ZV8yPRgbMZDjue.z1oEAeftbUPmq', '7V30iBgJKzFTztbZRyV3HYvMW2TuRt6hlUdH6WHIfnAd3x2IhrctajxTeY3l', 'full paper', '2022-10-31 02:33:12', '2022-11-14 02:21:06'),
(11, 'testing3', NULL, 'testing3@testing.com', NULL, NULL, NULL, NULL, '2022-11-13 23:00:27', '$2y$10$n/fxMBnHAK90zEG3spGIS.Yxca.Zp3ezwk/PI5zHHF9yrmzvWgU9a', NULL, 'full paper', '2022-11-13 23:00:27', '2022-11-14 02:20:52'),
(13, 'testing4', NULL, 'testing4@testing.com', NULL, NULL, NULL, NULL, '2022-11-13 23:01:47', '$2y$10$tXbUhbOyqRz97IgWr2Lwx.9N/6ckmId3pjsTvt276uEHk6qzxE.d.', NULL, 'speaker workshop', '2022-11-13 23:01:47', '2022-11-15 10:16:20'),
(15, 'TESTING5', NULL, 'testing5@testing.com', NULL, NULL, NULL, NULL, '2022-11-14 02:28:26', '$2y$10$JB1s1jTmfYPU9Q4qJk1p7OlDD9qf/P5uAg1vYhXiIYuTjkIHei4ym', 'xhMisS8MtMI7pmY2ocih1sbD4a5evpcTLqW2M2R6BQw01x1bxHgKeCifVjkv', 'speaker workshop', '2022-11-14 02:28:26', '2022-12-22 04:08:00'),
(16, 'USER1', 'uploads/profile/1671682050_Screenshot_3.png', 'user1@testing.com', 'stiemahardhika', '12345678', NULL, NULL, '2022-11-16 08:26:21', '$2y$10$EqD7CbFUDz4aJfSOzkhIq.Ha3tIOQ/S/oICxnRgrMMVjPyNGdS3DK', '35xMsEwc37yB0fPh3gBXLaC32ajR5NW4MPhwFWmNxkLdhfZ0oCCZYOH5eU7E', 'full paper', '2022-11-16 01:26:03', '2022-12-22 04:07:42'),
(17, 'USER2', 'uploads/profile/1671681735_Screenshot_2022.04.23_11.35.26.183.png', 'user2@testing.com', 'stie mahardhika', 'langit', 'surabaya', 'Indonesia', '2022-11-18 07:01:08', '$2y$10$vdxALr0UC1/GbofCigBGJOxiJ439eVKAkjfwN0B6SCbimvGLDOcL.', 'JEBctPneydS6QR3RgAF0DWlpg70EI8hs54XKxJQAvX5uZlUbZf81OyGYb2U3', 'full paper', '2022-11-18 00:00:39', '2022-12-22 04:02:15'),
(18, 'donkpret14', NULL, 'donkpret14@gmail.com', 'stie mahardhika', 'jl. mawar melati semuanya indah no 29 rt 03/01', 'sidoarjo', 'Philipine', '2022-11-29 07:50:51', '$2y$10$Z5IwT3.AP0wy2hwfiJPit.UOOIXXlNaXUYF/.PDwRWiYenhrInOWO', '5HbqBtn5fLxOEQQYeZkttLkCdSglVOzAnD9QRjiX0z33JjWJcG4ggD5kPql3', 'full paper', '2022-11-29 07:50:37', '2023-02-08 07:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `webinar`
--

CREATE TABLE `webinar` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('webinar','conference') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `price` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webinar`
--

INSERT INTO `webinar` (`id`, `type`, `title`, `image`, `users_id`, `start_date`, `price`, `link`, `created_at`, `updated_at`) VALUES
(1, 'conference', 'TEST', NULL, 6, '2023-01-31 23:14:15', NULL, 'https://forms.gle/c1ctMVAHzzFAocgu7', '2023-01-31 16:14:15', NULL),
(2, 'webinar', 'TEST WEBINAR', 'uploads/image_webinar/1675757205_when_the_night_comes____by_lucasitodev.jpg', 15, '2022-02-02 20:20:00', 999000, 'https://getbootstrap.com/docs/5.0/components/navs-tabs/', '2023-02-07 04:20:45', '2023-02-07 08:06:45'),
(3, 'webinar', 'TEST WEBINAR 2', 'uploads/image_webinar/1675754737_dark-night-full-moon.jpg', 13, '2021-04-04 04:04:00', 149000, 'https://getbootstrap.com/docs/5.0/customize/overview/', '2023-02-07 07:25:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tagged_taggable_id_index` (`taggable_id`),
  ADD KEY `tagging_tagged_taggable_type_index` (`taggable_type`),
  ADD KEY `tagging_tagged_tag_slug_index` (`tag_slug`);

--
-- Indexes for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tags_slug_index` (`slug`),
  ADD KEY `tagging_tags_tag_group_id_foreign` (`tag_group_id`);

--
-- Indexes for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tag_groups_slug_index` (`slug`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `webinar`
--
ALTER TABLE `webinar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `webinar`
--
ALTER TABLE `webinar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD CONSTRAINT `tagging_tags_tag_group_id_foreign` FOREIGN KEY (`tag_group_id`) REFERENCES `tagging_tag_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
