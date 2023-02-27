-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 05:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `clg_album`
--

CREATE TABLE `clg_album` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(200) DEFAULT NULL,
  `album_image` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clg_album`
--

INSERT INTO `clg_album` (`album_id`, `album_name`, `album_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Republic Day 2022', '1657364943.jpg', 1, '2022-07-05 12:07:13', '2022-07-09 05:39:03'),
(4, 'nvfjvgb', '1657367032.jpg', 1, '2022-07-09 06:13:52', '2022-07-09 06:16:50'),
(5, 'fge5tg5e', '1677515406.jpg', 1, '2023-02-27 11:00:06', '2023-02-27 11:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `clg_facilities`
--

CREATE TABLE `clg_facilities` (
  `facilities_id` int(11) NOT NULL,
  `facilities_heading` varchar(150) DEFAULT NULL,
  `facilities_text` text DEFAULT NULL,
  `feature_image` varchar(150) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clg_facilities`
--

INSERT INTO `clg_facilities` (`facilities_id`, `facilities_heading`, `facilities_text`, `feature_image`, `status`, `created_at`, `updated_at`) VALUES
(14, 'lmfbotby-3', 'lvtmrg', '1656842455.jpg', 1, '2022-07-02 10:22:14', '2022-07-03 06:57:26'),
(15, 'nbvfdyuvvhj', 'vbjhkhfd jvguvjvhu bvhjdgfuyr bughuygfrhberf hvgrvbrhegr  fvyrgfygvuyr', '1658043408.jpg', 1, '2022-07-17 02:05:59', '2022-07-17 02:06:48'),
(16, 'bduhc bvh brufr', 'jhivfhuvgjbbtyntujn6u', '1658043636.jpg', 1, '2022-07-17 02:10:36', '2022-07-17 02:10:36'),
(17, 'fjkvbvtvbb', 'jhbiugntybyt', '1658043701.jpg', 1, '2022-07-17 02:11:41', '2022-07-17 02:11:41'),
(18, 'lk jbgbtnnyuju', 'hgrtugigrtgrg', '1659269450.jpg', 1, '2022-07-17 02:12:32', '2022-07-31 06:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `clg_notification`
--

CREATE TABLE `clg_notification` (
  `notification_id` int(11) NOT NULL,
  `notification_text` varchar(250) DEFAULT NULL,
  `notification_link` varchar(250) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clg_notification`
--

INSERT INTO `clg_notification` (`notification_id`, `notification_text`, `notification_link`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Eaque alias ut asper', 'Dolorum expedita ass', 1, '2022-07-16 11:27:13', '2022-07-17 01:57:46'),
(4, 'Voluptatibus nostrum updated', 'Rerum et voluptate t updated', 1, '2022-07-16 11:27:26', '2022-07-17 01:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `clg_result`
--

CREATE TABLE `clg_result` (
  `result_id` int(11) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `class` varchar(10) DEFAULT NULL,
  `get_number` int(10) DEFAULT NULL,
  `total_number` int(10) DEFAULT NULL,
  `percentage` float NOT NULL,
  `seasone` varchar(15) NOT NULL,
  `student_image` varchar(250) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clg_result`
--

INSERT INTO `clg_result` (`result_id`, `student_name`, `class`, `get_number`, `total_number`, `percentage`, `seasone`, `student_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Suraj Mishra', '10', 486, 600, 81, '2018', '1657472863.jpg', 1, '2022-07-10 11:16:14', '2022-07-18 10:06:17'),
(2, 'Suraj Yadav', '10', 470, 600, 78.33, '2018', '1657474272.jpg', 1, '2022-07-10 12:01:12', '2022-07-18 10:06:48'),
(3, 'Manish Tiwari', '12', 320, 500, 64, '2018', '1657474900.jpg', 1, '2022-07-10 12:11:40', '2022-07-10 12:11:40'),
(5, 'Tej Pratap', '10', 379, 500, 75, '2016', '1657475030.jpg', 1, '2022-07-10 12:13:50', '2022-07-18 10:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `clg_reviews`
--

CREATE TABLE `clg_reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clg_reviews`
--

INSERT INTO `clg_reviews` (`review_id`, `user_id`, `name`, `email`, `position`, `message`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Kishan Mishra', 'kishanmishra1872@gmail.com', 'Student', 'This is kishan mishra', '1657978449.jpg', 1, '2022-07-16 08:04:10', '2022-07-16 10:49:42'),
(4, NULL, 'Anand Mishra', 'anand@gmail.com', 'Parent', 'This is very beautiful website', '1657987078.jpg', 1, '2022-07-16 10:28:00', '2022-07-16 10:49:46'),
(5, NULL, 'nj', 'hv@gmail.com', 'Student', 'hii', NULL, 1, '2022-07-24 10:32:26', '2022-07-24 10:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `clg_slider`
--

CREATE TABLE `clg_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_text` varchar(255) DEFAULT NULL,
  `slider_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clg_slider`
--

INSERT INTO `clg_slider` (`slider_id`, `slider_text`, `slider_image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Slider-1', '1658577837.jpg', 1, '2022-07-23 06:33:57', '2022-07-23 06:33:57'),
(3, 'Slider-2', '1658577880.jpg', 1, '2022-07-23 06:34:40', '2022-07-23 06:34:40'),
(4, 'Slider-3', '1658577912.jpg', 1, '2022-07-23 06:35:12', '2022-07-23 06:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `clg_teachers`
--

CREATE TABLE `clg_teachers` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(250) DEFAULT NULL,
  `teacher_image` varchar(250) DEFAULT NULL,
  `teacher_subject` varchar(250) DEFAULT NULL,
  `teacher_facebook` varchar(300) DEFAULT NULL,
  `teacher_instagram` varchar(300) DEFAULT NULL,
  `teacher_mobile` varchar(12) DEFAULT NULL,
  `teacher_twitter` varchar(300) DEFAULT NULL,
  `teacher_whatsapp` varchar(12) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clg_teachers`
--

INSERT INTO `clg_teachers` (`id`, `teacher_name`, `teacher_image`, `teacher_subject`, `teacher_facebook`, `teacher_instagram`, `teacher_mobile`, `teacher_twitter`, `teacher_whatsapp`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Anastasia Cohen', '1659249819.jpg', 'Science', 'Et sed rem non dolor', 'Adipisicing aliqua', '123654789', 'Molestiae Nam eos a', '1234569875', 1, '2022-07-31 01:13:39', '2022-07-31 01:13:39'),
(5, 'Cruz Bradford', '1659249903.png', 'Computer', NULL, 'technofy.india', '1236547955', 'Et ex duis mollit re', '123654799', 1, '2022-07-31 01:15:03', '2022-07-31 01:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `clg_videogallery`
--

CREATE TABLE `clg_videogallery` (
  `video_id` int(10) NOT NULL,
  `video_name` varchar(250) DEFAULT NULL,
  `video_url` varchar(250) DEFAULT NULL,
  `video_embed_url` varchar(250) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clg_videogallery`
--

INSERT INTO `clg_videogallery` (`video_id`, `video_name`, `video_url`, `video_embed_url`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Keshariya', 'https://www.youtube.com/watch?v=BddP6PYo2gs', 'https://www.youtube.com/embed/BddP6PYo2gs', 1, '2022-07-17 05:01:23', '2022-07-17 05:01:23'),
(6, 'Arijit Singh Song', 'https://www.youtube.com/watch?v=bPF1uJ3QaG0', 'https://www.youtube.com/embed/bPF1uJ3QaG0', 1, '2022-07-17 05:12:20', '2022-07-17 05:59:16'),
(7, 'Brahmastra Trailer', 'https://www.youtube.com/watch?v=2Y1A_oRuDQo', 'https://www.youtube.com/embed/2Y1A_oRuDQo', 1, '2022-07-17 05:24:48', '2022-07-17 05:57:40'),
(8, 'Intro of site', 'https://www.youtube.com/watch?v=uNh7M_uE5yQ', 'https://www.youtube.com/embed/uNh7M_uE5yQ', 1, '2022-07-17 05:31:58', '2022-07-17 05:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `external_links`
--

CREATE TABLE `external_links` (
  `link_id` int(11) NOT NULL,
  `link_name` varchar(250) DEFAULT NULL,
  `link_url` varchar(350) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `external_links`
--

INSERT INTO `external_links` (`link_id`, `link_name`, `link_url`, `status`, `created_at`, `updated_at`) VALUES
(2, 'UP Board Result', 'https://upmsp.edu.in/', 1, '2022-07-22 12:29:59', '2022-07-23 06:19:38'),
(3, 'Cbsc', 'chdfuvyfvev', 1, '2022-07-25 13:18:24', '2022-07-25 13:18:24');

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
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `img_id` int(11) NOT NULL,
  `album_id` varchar(250) DEFAULT NULL,
  `img_text` varchar(250) DEFAULT NULL,
  `img_image` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`img_id`, `album_id`, `img_text`, `img_image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Gallery Demo image-1', '1657373041.jpg', 1, '2022-07-06 11:41:52', '2022-07-09 07:55:28'),
(4, '4', 'demo image-3', '1657373565.jpg', 1, '2022-07-09 08:02:45', '2022-07-09 08:02:45'),
(5, '4', 'rrgg6g46', '1657374043.jpg', 1, '2022-07-09 08:10:43', '2022-07-09 08:10:43'),
(6, '4', 'jhkuhbjh', '1657374166.jpg', 0, '2022-07-09 08:12:46', '2022-07-09 08:14:43');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'suraj Mishra', 'suraj@gmail.com', NULL, '$2y$10$.ff58JqlPAvjgZgdSBQipOzE9Aqe.YKAfTAKt3AhhcRqCuNljlUD2', NULL, '2022-06-22 01:17:16', '2022-06-22 01:17:16'),
(8, 'admin', 'admin@gmail.com', NULL, '$2y$10$Y1hEYQN2xeI./yCTtRYvdOyMr.LKyqHrm0ea3z6GGjCEMU1dqg9NC', NULL, '2022-08-01 09:22:57', '2022-08-01 09:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `web_enquiry`
--

CREATE TABLE `web_enquiry` (
  `enquiry_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_enquiry`
--

INSERT INTO `web_enquiry` (`enquiry_id`, `user_id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Suraj Kumar Mishra', 'surajmishra1872@gmail.com', '9170832051', 'For Addmission', NULL, '2022-07-10 01:47:57', '2022-07-10 01:47:57'),
(2, NULL, 'Abhishek Shukla', 'abhishek@gmail.com', '1234567890', 'for tender', 'aap ka tender kab se start ho rha hai', '2022-07-10 01:50:33', '2022-07-10 01:50:33'),
(3, NULL, 'kvjbdbfvkuhrv', 'jvnvfbvhfb@gmail.com', '6849849110', 'mbfhvbj vjhvhbv', 'jhbvejhvbevhmbhvgrg', '2022-07-10 01:55:29', '2022-07-10 01:55:29'),
(4, NULL, 'kvjbdbfvkuhrv', 'jvnvfbvhfb@gmail.com', '6849849110', 'mbfhvbj vjhvhbv', 'jhbvejhvbevhmbhvgrg', '2022-07-10 01:55:34', '2022-07-10 01:55:34'),
(5, NULL, 'kvjbdbfvkuhrv', 'jvnvfbvhfb@gmail.com', '6849849110', 'mbfhvbj vjhvhbv', 'jhbvejhvbevhmbhvgrg', '2022-07-10 01:55:37', '2022-07-10 01:55:37'),
(6, NULL, 'kvjbdbfvkuhrv', 'jvnvfbvhfb@gmail.com', '6849849110', 'mbfhvbj vjhvhbv', 'jhbvejhvbevhmbhvgrg', '2022-07-10 01:55:51', '2022-07-10 01:55:51'),
(7, NULL, 'kvjbdbfvkuhrv', 'jvnvfbvhfb@gmail.com', '6849849110', 'mbfhvbj vjhvhbv', 'jhbvejhvbevhmbhvgrg', '2022-07-10 01:56:44', '2022-07-10 01:56:44'),
(8, NULL, 'kvjbdbfvkuhrv', 'jvnvfbvhfb@gmail.com', '6849849110', 'mbfhvbj vjhvhbv', 'jhbvejhvbevhmbhvgrg', '2022-07-10 01:56:48', '2022-07-10 01:56:48'),
(9, NULL, 'hbjfhrefberf', 'nvkjfvnkvjevl@gmail.com', '5545489482', 'jhbvehbfbvefhbvverfe', 'kjvhruygkhehugy4i7rfr', '2022-07-10 01:59:12', '2022-07-10 01:59:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clg_album`
--
ALTER TABLE `clg_album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `clg_facilities`
--
ALTER TABLE `clg_facilities`
  ADD PRIMARY KEY (`facilities_id`);

--
-- Indexes for table `clg_notification`
--
ALTER TABLE `clg_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `clg_result`
--
ALTER TABLE `clg_result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `clg_reviews`
--
ALTER TABLE `clg_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `clg_slider`
--
ALTER TABLE `clg_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `clg_teachers`
--
ALTER TABLE `clg_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clg_videogallery`
--
ALTER TABLE `clg_videogallery`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `external_links`
--
ALTER TABLE `external_links`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`img_id`);

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
-- Indexes for table `web_enquiry`
--
ALTER TABLE `web_enquiry`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clg_album`
--
ALTER TABLE `clg_album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clg_facilities`
--
ALTER TABLE `clg_facilities`
  MODIFY `facilities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `clg_notification`
--
ALTER TABLE `clg_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clg_result`
--
ALTER TABLE `clg_result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clg_reviews`
--
ALTER TABLE `clg_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clg_slider`
--
ALTER TABLE `clg_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clg_teachers`
--
ALTER TABLE `clg_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clg_videogallery`
--
ALTER TABLE `clg_videogallery`
  MODIFY `video_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `external_links`
--
ALTER TABLE `external_links`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `web_enquiry`
--
ALTER TABLE `web_enquiry`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
