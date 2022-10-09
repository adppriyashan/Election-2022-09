-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 09, 2022 at 12:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aries_election_group`
--

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `election_type` int(11) NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `election_date` date DEFAULT NULL,
  `election_start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `election_end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_opening_date` date DEFAULT NULL,
  `registration_opening_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_closing_date` date DEFAULT NULL,
  `registration_closing_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `election_type`, `created_user_id`, `name`, `election_date`, `election_start_time`, `election_end_time`, `registration_opening_date`, `registration_opening_time`, `registration_closing_date`, `registration_closing_time`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 2, 'Test 1', '2022-10-31', '08:00', '17:00', '2022-10-08', '08:00', '2022-10-15', '17:00', 1, '2022-10-08 09:22:04', '2022-10-08 09:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `election_has_candidates`
--

CREATE TABLE `election_has_candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `election_id` int(11) NOT NULL,
  `candidate_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_party` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate_age` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `election_has_voters`
--

CREATE TABLE `election_has_voters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `election_id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `ehc_id` int(11) DEFAULT NULL,
  `elected_time` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `election_has_voters`
--

INSERT INTO `election_has_voters` (`id`, `election_id`, `voter_id`, `ehc_id`, `elected_time`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, 1, 1, NULL, 1, '2022-10-09 05:05:49', '2022-10-09 05:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `election_registration_centers`
--

CREATE TABLE `election_registration_centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_center_type` tinyint(4) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_13_154621_create_parking_slots_table', 1),
(6, '2022_06_13_164219_create_election_table', 1),
(8, '2021_12_21_044250_create_routes_table', 2),
(9, '2021_12_21_045534_create_user_types_table', 2),
(10, '2021_12_21_060615_create_permissions_table', 2),
(12, '2022_07_01_000204_create_parking_records_table', 3),
(13, '2022_07_20_002948_create_feedback_table', 4),
(16, '2022_09_29_164639_create_parties_table', 6),
(18, '2022_10_01_173652_create_election_registration_centers_table', 7),
(20, '2022_10_01_175216_create_election_has_candidates_table', 7),
(23, '2014_10_12_000000_create_users_table', 8),
(24, '2022_10_01_175052_create_voters_table', 8),
(25, '2022_10_01_173212_create_elections_table', 9),
(27, '2022_09_29_164927_create_nominators_table', 10),
(28, '2022_10_09_085253_create_election_has_voters_table', 11),
(29, '2022_10_09_090046_create_temp_voters_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `nominators`
--

CREATE TABLE `nominators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `election` bigint(20) UNSIGNED NOT NULL,
  `party` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL,
  `province` bigint(20) UNSIGNED NOT NULL,
  `vote_count` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nominators`
--

INSERT INTO `nominators` (`id`, `ref`, `name`, `nic`, `dob`, `election`, `party`, `address`, `city`, `gender`, `province`, `vote_count`, `status`, `created_at`, `updated_at`) VALUES
(1, 'REF02321', 'Test Candidate', '25632568V', '2022-10-09', 5, 1, 'Test Candidate Address', 'Colombo', 1, 0, 2, 1, '2022-10-09 00:33:25', '2022-10-09 05:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'United National Alliance', '1', '2022-10-01 09:00:32', '2022-10-01 09:01:43'),
(2, 'Ealam People\'s Democratic', '1', '2022-10-01 09:00:39', '2022-10-01 12:22:45'),
(3, 'United People\'s Freedom Alliance', '1', '2022-10-01 09:01:11', '2022-10-01 09:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route` int(11) NOT NULL,
  `usertype` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `route`, `usertype`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(15, 11, 1, '2022-10-01 08:48:14', '2022-10-01 08:48:14'),
(16, 12, 1, '2022-10-01 09:10:06', '2022-10-01 09:10:06'),
(18, 14, 1, '2022-10-01 09:10:06', '2022-10-01 09:10:06'),
(21, 1, 2, '2022-10-01 09:10:06', '2022-10-01 09:10:06'),
(22, 13, 2, '2022-10-06 13:17:12', '2022-10-06 13:17:12'),
(23, 1, 3, '2022-10-08 09:31:42', '2022-10-08 09:31:42'),
(24, 15, 3, '2022-10-08 12:33:59', '2022-10-08 12:33:59'),
(26, 16, 1, '2022-10-08 13:41:54', '2022-10-08 13:41:54'),
(28, 15, 1, '2022-10-09 02:11:36', '2022-10-09 02:11:36'),
(29, 13, 1, '2022-10-09 02:11:50', '2022-10-09 02:11:50');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`, `route`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', '/home', 1, NULL, NULL),
(2, 'User Management', '/users', 1, NULL, NULL),
(3, 'Permission Level Management', '/usertypes', 1, NULL, NULL),
(11, 'Party Management', '/party', 1, NULL, NULL),
(12, 'Candidates Management', '/candidates', 1, NULL, NULL),
(13, 'Voters Management', '/voters', 1, NULL, NULL),
(14, 'Election Management', '/election', 1, NULL, NULL),
(15, 'Nominators Management', '/nominators', 1, NULL, NULL),
(16, 'Nominators Approve', '/nominators/approve', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temp_voters`
--

CREATE TABLE `temp_voters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `election_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_voters`
--

INSERT INTO `temp_voters` (`id`, `user_id`, `election_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, '2022-10-09 04:55:37', '2022-10-09 04:55:37'),
(2, 1, 5, 1, '2022-10-09 04:56:14', '2022-10-09 04:56:14'),
(3, 1, 5, 1, '2022-10-09 04:57:10', '2022-10-09 04:57:10'),
(4, 1, 5, 1, '2022-10-09 05:05:45', '2022-10-09 05:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` int(11) NOT NULL DEFAULT 2,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 2,
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

INSERT INTO `users` (`id`, `usertype`, `name`, `province_id`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'Administrator', 0, 1, 'admin@gmail.com', NULL, '$2y$10$sQknqvsFaDWKo6UUOdk6lOcnuyABQUGxg5lPsSmB7ekhKnu5MDID6', NULL, '2022-10-06 13:38:49', '2022-10-06 13:49:06'),
(3, 2, 'Grama Chamith', 8, 1, 'grama1@gmail.com', NULL, '$2y$10$XWB8SmdCHIRBiIBJPTVRq.5IVdmgirIXiLfqyrEoliIEEI4AT7MBK', NULL, '2022-10-06 13:45:15', '2022-10-06 13:50:38'),
(4, 3, 'Nominator Register', 0, 1, 'nr@gmail.com', NULL, '$2y$10$QuYfW8L4EMWItnKeDT1RbOIXYVpIc3y0pFvMFHAvD0hZND1FKhT6S', NULL, '2022-10-08 09:31:15', '2022-10-08 09:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `usertype`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '1', NULL, NULL),
(2, 'Gramasewaka', '1', NULL, NULL),
(3, 'Election Office Register', '1', NULL, '2022-10-08 09:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finger_print_id` int(11) NOT NULL DEFAULT 0,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `user_id`, `name`, `finger_print_id`, `nic`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Voter 1', 1, '55665566v', 'colombo, voter address', 1, '2022-10-07 12:27:07', '2022-10-07 13:23:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_has_candidates`
--
ALTER TABLE `election_has_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_has_voters`
--
ALTER TABLE `election_has_voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election_registration_centers`
--
ALTER TABLE `election_registration_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `nominators`
--
ALTER TABLE `nominators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`) USING BTREE,
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`) USING BTREE;

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `temp_voters`
--
ALTER TABLE `temp_voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `election_has_candidates`
--
ALTER TABLE `election_has_candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `election_has_voters`
--
ALTER TABLE `election_has_voters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `election_registration_centers`
--
ALTER TABLE `election_registration_centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `nominators`
--
ALTER TABLE `nominators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `temp_voters`
--
ALTER TABLE `temp_voters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
