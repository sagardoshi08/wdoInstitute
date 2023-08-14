-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2023 at 11:54 AM
-- Server version: 10.3.36-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oneserv2_abhipati`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`bank_details`)),
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `bank_details`, `uuid`, `created_at`, `updated_at`) VALUES
(21, 'TRIPURA GRAMIN BANK', '[{\"branch_name\":\"AGARTALA\",\"IFSC_code\":\"PUNB0RRBTGB\"}]', '51c282bd-0f09-4c7b-a7b5-608a0fa0cd92', '2023-05-30 01:33:13', '2023-05-30 01:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `college_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`college_details`)),
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `college_name`, `college_details`, `uuid`, `created_at`, `updated_at`) VALUES
(76, 'Test', '[{\"course_name\":\"BE\",\"course_fees\":\"100\",\"course_duration\":\"5\",\"scholarship_amount\":\"10\"}]', 'c82a8075-a549-4c0e-8d68-602c4c03d0ed', '2023-05-23 02:30:59', '2023-05-23 02:30:59');

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_05_15_135603_create_colleges_table', 2),
(13, '2023_05_17_065440_create_user_data_table', 3),
(15, '2023_05_18_113826_create_banks_table', 4);

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `application_availability` varchar(255) DEFAULT NULL,
  `application_number` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `self_image` varchar(255) DEFAULT NULL,
  `aadhar_card_front` varchar(255) DEFAULT NULL,
  `aadhar_card_back` varchar(255) DEFAULT NULL,
  `prtc` varchar(255) DEFAULT NULL,
  `caste_certificate` varchar(255) DEFAULT NULL,
  `bonafide_nsp` varchar(255) DEFAULT NULL,
  `bonafide_college` varchar(255) DEFAULT NULL,
  `pre_year_mark` varchar(255) DEFAULT NULL,
  `income_certificate` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `agent_name` varchar(255) DEFAULT NULL,
  `agent_mobile` varchar(255) DEFAULT NULL,
  `ten_path_year` varchar(255) DEFAULT NULL,
  `ten_total_mark` varchar(255) DEFAULT NULL,
  `ten_mark` varchar(255) DEFAULT NULL,
  `ten_percentage` varchar(255) DEFAULT NULL,
  `twelve_path_year` varchar(255) DEFAULT NULL,
  `twelve_total_mark` varchar(255) DEFAULT NULL,
  `twelve_mark` varchar(255) DEFAULT NULL,
  `twelve_percentage` varchar(255) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `family_income` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `sub_division` varchar(255) DEFAULT NULL,
  `cast` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `address_1` text DEFAULT NULL,
  `address_2` text DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `college_name` varchar(255) NOT NULL,
  `IFSC_code` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `course_details` varchar(255) DEFAULT NULL,
  `collage_current_year` varchar(255) DEFAULT NULL,
  `collage_percentage` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `uuid`, `created_by`, `application_availability`, `application_number`, `year`, `number`, `self_image`, `aadhar_card_front`, `aadhar_card_back`, `prtc`, `caste_certificate`, `bonafide_nsp`, `bonafide_college`, `pre_year_mark`, `income_certificate`, `signature`, `agent_name`, `agent_mobile`, `ten_path_year`, `ten_total_mark`, `ten_mark`, `ten_percentage`, `twelve_path_year`, `twelve_total_mark`, `twelve_mark`, `twelve_percentage`, `student_name`, `father_name`, `mother_name`, `email_address`, `dob`, `gender`, `phone_number`, `family_income`, `state`, `district`, `sub_division`, `cast`, `city`, `pincode`, `address_1`, `address_2`, `account_number`, `college_name`, `IFSC_code`, `bank_name`, `branch_name`, `course_details`, `collage_current_year`, `collage_percentage`, `updated_at`, `created_at`) VALUES
(20, '4f94936c-ae89-47cc-850d-76cebb7b3400', 1, 'Pending', '78788787', '2021', '784544747', 'student/self_image/wjRSRgi41pNDNFbKbVWWkZAc2EVEC1lxoYoA7ka4.png', 'student/aadhar_card_front/5scXZtatiqLSyszKJNsUndUlw7EeReo0fy3dWL3c.png', 'student/aadhar_card_back/TSetKtqgdp3Mmi0P3ooEBzMoMjgNriXXjq9WUF0x.png', 'student/prtc/adfcCBMTIw7jAmsI4txcvvRtXV1Mkzhlq5CYpBp0.png', 'student/caste_certificate/iJDqlB12SulzJaQtL88v3TwrsJ9EtfWw03O0fgDh.png', 'student/bonafide_nsp/F1NAci7N3eWGmi20geZyjk0QNYiHWzPNcPZsH2y6.png', 'student/bonafide_college/43ktcEI3WGJ35CXeh9MBl9xCzlAByh0o968ChwP8.png', 'student/pre_year_mark/v88UxaBN5xxsUtnochnDI5RVJ3BZhgG6vG0FeXn8.png', 'student/income_certificate/IybUyu2QNyUVX6qrk0tVK7sItqrsl7KAmRmjPZUz.png', 'student/signature/UJzUwjZ4agCWJUOryo9Av5sciVJD6BKRaS8t2NSt.png', 'asda', 'ada', '2528', '5858', '858', '47', '585', '848', '8484', '4747', 'efw', 'fwf', 'wfw', 'fwfw@gmail.com', '2023-05-30', 'Male', '8754218754', '85555', 'Asam', 'id', 'sd', 'OBC', 'sdas', 585, 'asdasda', 'dada', '7884448', 'Sine Internation College UP', '474747', 'dfde', 'fwf', 'M.Tech', '1st Year', '585', '2023-05-30 01:54:39', '2023-05-30 01:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_user` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`assign_user`)),
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `assign_user`, `uuid`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'admin@material.com', '2023-05-12 07:33:54', 'super_admin', NULL, NULL, '$2y$10$h1xgklJ9nvQzt0w9XGFo8eA9QtwYtQeWqFIwOPiplWdoX4IRKILjW', '5hjTVHCIg4Ys4JJG7hjpOMd1aK5eCwgpWJrtFXqzmdLE7GLEzsShllfNGRKZ', '2023-05-12 07:33:55', '2023-05-12 08:48:02'),
(83, 'Testf', 'test@gmail.com', NULL, 'Manager', 'null', '9af40ff1-55bc-4692-bdae-3247ab36e5d6', '$2y$10$h1xgklJ9nvQzt0w9XGFo8eA9QtwYtQeWqFIwOPiplWdoX4IRKILjW', NULL, '2023-05-23 02:39:41', '2023-05-31 00:54:43'),
(84, 'priyansh', 'priyansh@gmail.com', NULL, 'Admin', NULL, '5dd6134a-b4a5-4347-9730-ecdf46d5ba4a', '$2y$10$Z5tuJu1hYkMi5semMHm4Oe68SnvpmoUoCNE2dkMZEcNk1/UTnv6n.', NULL, '2023-05-24 03:28:08', '2023-05-24 04:17:13'),
(85, 'RAHUL BISWAS', 'ABHICOLLEGE1@gmail.com', NULL, 'Employee', 'null', 'c1028bd3-f780-4182-8599-8c90d13c6988', '$2y$10$gTqBWenGfOlapmrrQFnWzul.Y6kd4JpRQ/kt.0TAv97RHjaulWvEa', NULL, '2023-05-30 01:13:40', '2023-05-30 01:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternate_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenth_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`tenth_details`)),
  `twelfth_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`twelfth_details`)),
  `university_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`university_details`)),
  `permanent_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry_experience` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`industry_experience`)),
  `tenth_marksheet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twelfth_marksheet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternative_govt_id_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduation_diploma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_graduation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_slip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `user_id`, `father_name`, `mother_name`, `date_of_birth`, `phone_number`, `alternate_phone_number`, `tenth_details`, `twelfth_details`, `university_details`, `permanent_address`, `current_address`, `industry_experience`, `tenth_marksheet`, `twelfth_marksheet`, `aadhar_card`, `alternative_govt_id_card`, `graduation_diploma`, `post_graduation`, `experience_certificate`, `salary_slip`, `created_at`, `updated_at`) VALUES
(14, 83, 'Father', 'Mother', '2023-05-23', '9876543210', '7410852963', '{\"tenth_board_name\":\"Test\",\"tenth_qua_year\":\"2012\",\"tenth_percentage\":\"80\",\"tenth_roll_no\":\"1\"}', '{\"twelfth_board_name\":\"Test\",\"twelfth_qua_year\":\"2015\",\"twelfth_percentage\":\"75\",\"twelfth_roll_no\":\"2\"}', '{\"university_name\":\"Test\",\"university_qua_year\":\"2056\",\"university_percentage\":\"54\",\"university_roll_no\":\"5\"}', 'Test', 'Test', '[{\"industry_name\":\"Test\",\"industry_designation\":\"Test\",\"industry_salary\":\"5000\",\"industry_total_year\":\"3\"}]', 'user/tenth-marksheet/tD5i1bNhKIT071dyxPQpZBvctrEItjDIDxLRiKsC.pdf', 'user/twelfth-marksheet/uLl1mleFhE023s1oHfWbC97WmzCaG0NajsQmaZE3.pdf', 'user/aadhar-card/4eY3gxRzUG1flpcoavxdQxo6jK7euBNQNKS4g62u.pdf', 'user/alternative-govt-id-card/af9wQXOGQ0cYJun6Lo1nzuXbktZrYwG1E2Uu5RYZ.pdf', NULL, NULL, NULL, NULL, '2023-05-23 02:39:41', '2023-05-23 02:39:41'),
(15, 84, 'd', 'v', '2000-04-23', '9098909890', '9998889090', '{\"tenth_board_name\":\"mp\",\"tenth_qua_year\":\"2010\",\"tenth_percentage\":\"50\",\"tenth_roll_no\":\"123456\"}', '{\"twelfth_board_name\":\"mp\",\"twelfth_qua_year\":\"2012\",\"twelfth_percentage\":\"60\",\"twelfth_roll_no\":\"321456\"}', '{\"university_name\":\"rgpv\",\"university_qua_year\":\"2014\",\"university_percentage\":\"65\",\"university_roll_no\":\"432234\"}', 'ind', 'ind', '[{\"industry_name\":\"web\",\"industry_designation\":\"sr\",\"industry_salary\":\"10000\",\"industry_total_year\":\"5\"}]', 'user/tenth-marksheet/GQfzAvjRYRQJiPCQ4LldGPxzmR342A0VaJlv42k9.png', 'user/twelfth-marksheet/HmNHGBsjBjb1fdEwdSxa9iijdxQO5grDCKJUDaLL.jpg', 'user/aadhar-card/JujUN7s6685o7TCEDXbMOTGY9xMtugYuN3tltrU7.png', 'user/alternative-govt-id-card/CPUZJ17ugS8h6ZtFg61G8Xf1zIagNu9HwUC8cSIy.jpg', NULL, NULL, NULL, NULL, '2023-05-24 03:28:08', '2023-05-24 03:28:08'),
(16, 85, 'RABU BISWAS', 'GITA BISWAS', '1993-09-13', '6909366788', '6909366799', '{\"tenth_board_name\":\"TRIPURA BOURD\",\"tenth_qua_year\":\"2020\",\"tenth_percentage\":\"72\",\"tenth_roll_no\":\"78965\"}', '{\"twelfth_board_name\":\"TRIPURA BOARD\",\"twelfth_qua_year\":\"2021\",\"twelfth_percentage\":\"74\",\"twelfth_roll_no\":\"56478\"}', '{\"university_name\":\"TRIPURA UNIVERSITY\",\"university_qua_year\":\"2024\",\"university_percentage\":\"55\",\"university_roll_no\":\"6665\"}', 'baikhora', 'baikhora', '[{\"industry_name\":\"NO EXPRIANCE\",\"industry_designation\":\"NO EXPREANCE\",\"industry_salary\":\"50000\",\"industry_total_year\":\"5\"}]', 'user/tenth-marksheet/1TaCVwKwfG5BlwogGSac1aUICMtLhCYhpsKPt1A1.pdf', 'user/twelfth-marksheet/voYmfr25cyYXmiKoX2hEgmTBT5YNtXdbV6p2nwTG.pdf', 'user/aadhar-card/EXM7tSPLPeVebWbucq0bWxfcScD3K2Af3VoeStMf.pdf', 'user/alternative-govt-id-card/hUTtw6FIcdBRyPOeV0lG8eTu6wMjdtvGIgNsKlPJ.pdf', NULL, NULL, NULL, NULL, '2023-05-30 01:13:40', '2023-05-30 01:13:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banks_uuid_unique` (`uuid`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `unique_id` (`uuid`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_data_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `user_data_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
