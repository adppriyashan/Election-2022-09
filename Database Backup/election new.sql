/*
 Navicat Premium Data Transfer

 Source Server         : Locahost
 Source Server Type    : MySQL
 Source Server Version : 80029
 Source Host           : localhost:3306
 Source Schema         : election

 Target Server Type    : MySQL
 Target Server Version : 80029
 File Encoding         : 65001

 Date: 08/10/2022 23:55:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for election_has_candidates
-- ----------------------------
DROP TABLE IF EXISTS `election_has_candidates`;
CREATE TABLE `election_has_candidates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `election_id` int NOT NULL,
  `candidate_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_party` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidate_age` int DEFAULT NULL,
  `count` int NOT NULL DEFAULT '0',
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of election_has_candidates
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for election_registration_centers
-- ----------------------------
DROP TABLE IF EXISTS `election_registration_centers`;
CREATE TABLE `election_registration_centers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_center_type` tinyint NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of election_registration_centers
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for elections
-- ----------------------------
DROP TABLE IF EXISTS `elections`;
CREATE TABLE `elections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `election_type` int NOT NULL,
  `created_user_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `election_date` date DEFAULT NULL,
  `election_start_time` datetime DEFAULT NULL,
  `election_end_time` datetime DEFAULT NULL,
  `registration_opening_date` date DEFAULT NULL,
  `registration_opening_time` datetime DEFAULT NULL,
  `registration_closing_date` date DEFAULT NULL,
  `registration_closing_time` datetime DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of elections
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2022_06_13_154621_create_parking_slots_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6, '2022_06_13_164219_create_election_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8, '2021_12_21_044250_create_routes_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9, '2021_12_21_045534_create_user_types_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10, '2021_12_21_060615_create_permissions_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (12, '2022_07_01_000204_create_parking_records_table', 3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (13, '2022_07_20_002948_create_feedback_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (16, '2022_09_29_164639_create_parties_table', 6);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (17, '2022_10_01_173212_create_elections_table', 7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (18, '2022_10_01_173652_create_election_registration_centers_table', 7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (19, '2022_10_01_175052_create_voters_table', 7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (20, '2022_10_01_175216_create_election_has_candidates_table', 7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (21, '2022_09_29_164927_create_nominators_table', 8);
COMMIT;

-- ----------------------------
-- Table structure for nominators
-- ----------------------------
DROP TABLE IF EXISTS `nominators`;
CREATE TABLE `nominators` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `party` bigint unsigned NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint NOT NULL,
  `province` bigint unsigned NOT NULL,
  `status` tinyint NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of nominators
-- ----------------------------
BEGIN;
INSERT INTO `nominators` (`id`, `ref`, `name`, `nic`, `dob`, `party`, `address`, `city`, `gender`, `province`, `status`, `created_at`, `updated_at`) VALUES (1, '#09094039043', 'Pasindu Priyashan', '952042807V', '1995-07-22', 2, '115/3 Dutugamunu Street, Colombo 06', 'Colombo', 1, 4, 1, '2022-10-06 18:19:39', '2022-10-06 18:40:21');
COMMIT;

-- ----------------------------
-- Table structure for parties
-- ----------------------------
DROP TABLE IF EXISTS `parties`;
CREATE TABLE `parties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of parties
-- ----------------------------
BEGIN;
INSERT INTO `parties` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES (1, 'United National Alliance', '1', '2022-10-01 14:30:32', '2022-10-01 14:31:43');
INSERT INTO `parties` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES (2, 'Ealam People\'s Democratic', '1', '2022-10-01 14:30:39', '2022-10-01 17:52:45');
INSERT INTO `parties` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES (3, 'United People\'s Freedom Alliance', '1', '2022-10-01 14:31:11', '2022-10-01 14:31:11');
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `route` int NOT NULL,
  `usertype` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
INSERT INTO `permissions` (`id`, `route`, `usertype`, `created_at`, `updated_at`) VALUES (1, 1, 1, NULL, NULL);
INSERT INTO `permissions` (`id`, `route`, `usertype`, `created_at`, `updated_at`) VALUES (2, 2, 1, NULL, NULL);
INSERT INTO `permissions` (`id`, `route`, `usertype`, `created_at`, `updated_at`) VALUES (3, 3, 1, NULL, NULL);
INSERT INTO `permissions` (`id`, `route`, `usertype`, `created_at`, `updated_at`) VALUES (15, 11, 1, '2022-10-01 14:18:14', '2022-10-01 14:18:14');
INSERT INTO `permissions` (`id`, `route`, `usertype`, `created_at`, `updated_at`) VALUES (16, 12, 1, '2022-10-01 14:40:06', '2022-10-01 14:40:06');
INSERT INTO `permissions` (`id`, `route`, `usertype`, `created_at`, `updated_at`) VALUES (17, 13, 1, '2022-10-06 17:36:21', '2022-10-06 17:36:21');
INSERT INTO `permissions` (`id`, `route`, `usertype`, `created_at`, `updated_at`) VALUES (18, 14, 1, '2022-10-06 17:36:21', '2022-10-06 17:36:21');
INSERT INTO `permissions` (`id`, `route`, `usertype`, `created_at`, `updated_at`) VALUES (19, 15, 1, '2022-10-06 17:52:52', '2022-10-06 17:52:52');
COMMIT;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`) USING BTREE,
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for routes
-- ----------------------------
DROP TABLE IF EXISTS `routes`;
CREATE TABLE `routes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of routes
-- ----------------------------
BEGIN;
INSERT INTO `routes` (`id`, `name`, `route`, `type`, `created_at`, `updated_at`) VALUES (1, 'Dashboard', '/home', 1, NULL, NULL);
INSERT INTO `routes` (`id`, `name`, `route`, `type`, `created_at`, `updated_at`) VALUES (2, 'User Management', '/users', 1, NULL, NULL);
INSERT INTO `routes` (`id`, `name`, `route`, `type`, `created_at`, `updated_at`) VALUES (3, 'Permission Level Management', '/usertypes', 1, NULL, NULL);
INSERT INTO `routes` (`id`, `name`, `route`, `type`, `created_at`, `updated_at`) VALUES (11, 'Party Management', '/party', 1, NULL, NULL);
INSERT INTO `routes` (`id`, `name`, `route`, `type`, `created_at`, `updated_at`) VALUES (12, 'Candidates Management', '/candidates', 1, NULL, NULL);
INSERT INTO `routes` (`id`, `name`, `route`, `type`, `created_at`, `updated_at`) VALUES (13, 'Voters Management', '/voters', 1, NULL, NULL);
INSERT INTO `routes` (`id`, `name`, `route`, `type`, `created_at`, `updated_at`) VALUES (14, 'Election Management', '/election', 1, NULL, NULL);
INSERT INTO `routes` (`id`, `name`, `route`, `type`, `created_at`, `updated_at`) VALUES (15, 'Nominators Management', '/nominators', 1, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for user_types
-- ----------------------------
DROP TABLE IF EXISTS `user_types`;
CREATE TABLE `user_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `usertype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3','4') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of user_types
-- ----------------------------
BEGIN;
INSERT INTO `user_types` (`id`, `usertype`, `status`, `created_at`, `updated_at`) VALUES (1, 'Administrator', '1', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES (2, 'Administrator', 'admin@gmail.com', NULL, '$2y$10$u2ktH1eK/1ao8BB.uuqctuEIk7k5nMvVqq6ph.PDkDMmhMFFd5z1q', '1', 'vO2lpWmNXIVr58RMELYHucePs0FVBFo9pttIcdKpFBJRx2ftnheXefMZpR5z', '2022-07-11 17:40:46', '2022-07-11 17:40:46', 1);
COMMIT;

-- ----------------------------
-- Table structure for voters
-- ----------------------------
DROP TABLE IF EXISTS `voters`;
CREATE TABLE `voters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of voters
-- ----------------------------
BEGIN;
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
