/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 80028
 Source Host           : localhost:3306
 Source Schema         : election

 Target Server Type    : MySQL
 Target Server Version : 80028
 File Encoding         : 65001

 Date: 10/10/2022 00:29:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for complains
-- ----------------------------
DROP TABLE IF EXISTS `complains`;
CREATE TABLE `complains`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `election` int NOT NULL,
  `by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of complains
-- ----------------------------
INSERT INTO `complains` VALUES (1, 'sdsd', 5, 2, '2022-10-09 18:33:37', '2022-10-09 18:33:37');
INSERT INTO `complains` VALUES (2, 'dfd fd df dfd f', 5, 2, '2022-10-09 18:44:55', '2022-10-09 18:44:55');

-- ----------------------------
-- Table structure for election_has_candidates
-- ----------------------------
DROP TABLE IF EXISTS `election_has_candidates`;
CREATE TABLE `election_has_candidates`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `election_id` int NOT NULL,
  `candidate_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_nic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_party` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `candidate_age` int NULL DEFAULT NULL,
  `count` int NOT NULL DEFAULT 0,
  `status` tinyint NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of election_has_candidates
-- ----------------------------

-- ----------------------------
-- Table structure for election_has_voters
-- ----------------------------
DROP TABLE IF EXISTS `election_has_voters`;
CREATE TABLE `election_has_voters`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `election_id` int NOT NULL,
  `voter_id` int NOT NULL,
  `ehc_id` int NULL DEFAULT NULL,
  `elected_time` datetime NULL DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of election_has_voters
-- ----------------------------
INSERT INTO `election_has_voters` VALUES (6, 5, 1, 1, '2022-10-09 23:08:47', 1, '2022-10-09 23:13:37', NULL);

-- ----------------------------
-- Table structure for election_registration_centers
-- ----------------------------
DROP TABLE IF EXISTS `election_registration_centers`;
CREATE TABLE `election_registration_centers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_center_type` tinyint NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of election_registration_centers
-- ----------------------------

-- ----------------------------
-- Table structure for elections
-- ----------------------------
DROP TABLE IF EXISTS `elections`;
CREATE TABLE `elections`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `election_type` int NOT NULL,
  `created_user_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `election_date` date NULL DEFAULT NULL,
  `election_start_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `election_end_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `registration_opening_date` date NULL DEFAULT NULL,
  `registration_opening_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `registration_closing_date` date NULL DEFAULT NULL,
  `registration_closing_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of elections
-- ----------------------------
INSERT INTO `elections` VALUES (5, 1, 2, 'Test 1', '2022-10-11', '08:00', '23:51', '2022-10-08', '08:00', '2022-10-15', '17:00', 1, '2022-10-08 14:52:04', '2022-10-09 18:54:37');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_06_13_154621_create_parking_slots_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_06_13_164219_create_election_table', 1);
INSERT INTO `migrations` VALUES (8, '2021_12_21_044250_create_routes_table', 2);
INSERT INTO `migrations` VALUES (9, '2021_12_21_045534_create_user_types_table', 2);
INSERT INTO `migrations` VALUES (10, '2021_12_21_060615_create_permissions_table', 2);
INSERT INTO `migrations` VALUES (12, '2022_07_01_000204_create_parking_records_table', 3);
INSERT INTO `migrations` VALUES (13, '2022_07_20_002948_create_feedback_table', 4);
INSERT INTO `migrations` VALUES (16, '2022_09_29_164639_create_parties_table', 6);
INSERT INTO `migrations` VALUES (18, '2022_10_01_173652_create_election_registration_centers_table', 7);
INSERT INTO `migrations` VALUES (20, '2022_10_01_175216_create_election_has_candidates_table', 7);
INSERT INTO `migrations` VALUES (23, '2014_10_12_000000_create_users_table', 8);
INSERT INTO `migrations` VALUES (24, '2022_10_01_175052_create_voters_table', 8);
INSERT INTO `migrations` VALUES (25, '2022_10_01_173212_create_elections_table', 9);
INSERT INTO `migrations` VALUES (27, '2022_09_29_164927_create_nominators_table', 10);
INSERT INTO `migrations` VALUES (28, '2022_10_09_085253_create_election_has_voters_table', 11);
INSERT INTO `migrations` VALUES (29, '2022_10_09_090046_create_temp_voters_table', 12);
INSERT INTO `migrations` VALUES (30, '2022_10_09_182420_create_complains_table', 13);

-- ----------------------------
-- Table structure for nominators
-- ----------------------------
DROP TABLE IF EXISTS `nominators`;
CREATE TABLE `nominators`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ref` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `election` bigint UNSIGNED NOT NULL,
  `party` bigint UNSIGNED NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gender` tinyint NOT NULL,
  `province` bigint UNSIGNED NOT NULL,
  `vote_count` int NOT NULL DEFAULT 0,
  `status` tinyint NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nominators
-- ----------------------------
INSERT INTO `nominators` VALUES (1, 'REF02321', 'Test Candidate', '25632568V', '2022-10-09', 5, 1, 'Test Candidate Address', 'Colombo', 1, 0, 4, 1, '2022-10-09 06:03:25', '2022-10-09 17:36:17');

-- ----------------------------
-- Table structure for parties
-- ----------------------------
DROP TABLE IF EXISTS `parties`;
CREATE TABLE `parties`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of parties
-- ----------------------------
INSERT INTO `parties` VALUES (1, 'United National Alliance', '1', '2022-10-01 14:30:32', '2022-10-01 14:31:43');
INSERT INTO `parties` VALUES (2, 'Ealam People\'s Democratic', '1', '2022-10-01 14:30:39', '2022-10-01 17:52:45');
INSERT INTO `parties` VALUES (3, 'United People\'s Freedom Alliance', '1', '2022-10-01 14:31:11', '2022-10-01 14:31:11');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `route` int NOT NULL,
  `usertype` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 1, 1, NULL, NULL);
INSERT INTO `permissions` VALUES (2, 2, 1, NULL, NULL);
INSERT INTO `permissions` VALUES (3, 3, 1, NULL, NULL);
INSERT INTO `permissions` VALUES (15, 11, 1, '2022-10-01 14:18:14', '2022-10-01 14:18:14');
INSERT INTO `permissions` VALUES (16, 12, 1, '2022-10-01 14:40:06', '2022-10-01 14:40:06');
INSERT INTO `permissions` VALUES (18, 14, 1, '2022-10-01 14:40:06', '2022-10-01 14:40:06');
INSERT INTO `permissions` VALUES (21, 1, 2, '2022-10-01 14:40:06', '2022-10-01 14:40:06');
INSERT INTO `permissions` VALUES (22, 13, 2, '2022-10-06 18:47:12', '2022-10-06 18:47:12');
INSERT INTO `permissions` VALUES (23, 1, 3, '2022-10-08 15:01:42', '2022-10-08 15:01:42');
INSERT INTO `permissions` VALUES (24, 15, 3, '2022-10-08 18:03:59', '2022-10-08 18:03:59');
INSERT INTO `permissions` VALUES (26, 16, 1, '2022-10-08 19:11:54', '2022-10-08 19:11:54');
INSERT INTO `permissions` VALUES (28, 15, 1, '2022-10-09 07:41:36', '2022-10-09 07:41:36');
INSERT INTO `permissions` VALUES (29, 13, 1, '2022-10-09 07:41:50', '2022-10-09 07:41:50');
INSERT INTO `permissions` VALUES (30, 17, 1, '2022-10-09 17:27:01', '2022-10-09 17:27:01');
INSERT INTO `permissions` VALUES (31, 1, 7, '2022-10-09 18:16:43', '2022-10-09 18:16:43');
INSERT INTO `permissions` VALUES (32, 18, 1, '2022-10-09 18:36:53', '2022-10-09 18:36:53');
INSERT INTO `permissions` VALUES (33, 19, 1, '2022-10-09 18:36:53', '2022-10-09 18:36:53');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for routes
-- ----------------------------
DROP TABLE IF EXISTS `routes`;
CREATE TABLE `routes`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of routes
-- ----------------------------
INSERT INTO `routes` VALUES (1, 'Dashboard', '/home', 1, NULL, NULL);
INSERT INTO `routes` VALUES (2, 'User Management', '/users', 1, NULL, NULL);
INSERT INTO `routes` VALUES (3, 'Permission Level Management', '/usertypes', 1, NULL, NULL);
INSERT INTO `routes` VALUES (11, 'Party Management', '/party', 1, NULL, NULL);
INSERT INTO `routes` VALUES (12, 'Candidates Management', '/candidates', 1, NULL, NULL);
INSERT INTO `routes` VALUES (13, 'Voters Management', '/voters', 1, NULL, NULL);
INSERT INTO `routes` VALUES (14, 'Election Management', '/election', 1, NULL, NULL);
INSERT INTO `routes` VALUES (15, 'Nominators Management', '/nominators', 1, NULL, NULL);
INSERT INTO `routes` VALUES (16, 'Nominators Approve', '/nominators/approve', 1, NULL, NULL);
INSERT INTO `routes` VALUES (17, 'Results Report', '/results', 1, NULL, NULL);
INSERT INTO `routes` VALUES (18, 'Complains Management', '/complain', 1, NULL, NULL);
INSERT INTO `routes` VALUES (19, 'Complains Submit', '/complain/submit', 1, NULL, NULL);

-- ----------------------------
-- Table structure for temp_voters
-- ----------------------------
DROP TABLE IF EXISTS `temp_voters`;
CREATE TABLE `temp_voters`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `election_id` int NULL DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of temp_voters
-- ----------------------------
INSERT INTO `temp_voters` VALUES (1, 1, 5, 1, '2022-10-09 10:25:37', '2022-10-09 10:25:37');
INSERT INTO `temp_voters` VALUES (2, 1, 5, 1, '2022-10-09 10:26:14', '2022-10-09 10:26:14');
INSERT INTO `temp_voters` VALUES (3, 1, 5, 1, '2022-10-09 10:27:10', '2022-10-09 10:27:10');
INSERT INTO `temp_voters` VALUES (4, 1, 5, 1, '2022-10-09 10:35:45', '2022-10-09 10:35:45');

-- ----------------------------
-- Table structure for user_types
-- ----------------------------
DROP TABLE IF EXISTS `user_types`;
CREATE TABLE `user_types`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `usertype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','2','3','4') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_types
-- ----------------------------
INSERT INTO `user_types` VALUES (1, 'Administrator', '1', NULL, NULL);
INSERT INTO `user_types` VALUES (2, 'Gramasewaka', '1', NULL, NULL);
INSERT INTO `user_types` VALUES (3, 'Election Office Register', '1', NULL, '2022-10-08 15:01:42');
INSERT INTO `user_types` VALUES (7, 'Election Office', '1', '2022-10-09 18:16:43', '2022-10-09 18:16:43');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `usertype` int NOT NULL DEFAULT 2,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` int NOT NULL DEFAULT 0,
  `status` int NOT NULL DEFAULT 2,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 1, 'Administrator', 0, 1, 'admin@gmail.com', NULL, '$2y$10$sQknqvsFaDWKo6UUOdk6lOcnuyABQUGxg5lPsSmB7ekhKnu5MDID6', NULL, '2022-10-06 19:08:49', '2022-10-06 19:19:06');
INSERT INTO `users` VALUES (3, 2, 'Grama Chamith', 8, 1, 'grama1@gmail.com', NULL, '$2y$10$XWB8SmdCHIRBiIBJPTVRq.5IVdmgirIXiLfqyrEoliIEEI4AT7MBK', NULL, '2022-10-06 19:15:15', '2022-10-06 19:20:38');
INSERT INTO `users` VALUES (4, 3, 'Nominator Register', 0, 1, 'nr@gmail.com', NULL, '$2y$10$QuYfW8L4EMWItnKeDT1RbOIXYVpIc3y0pFvMFHAvD0hZND1FKhT6S', NULL, '2022-10-08 15:01:15', '2022-10-08 15:01:15');
INSERT INTO `users` VALUES (5, 7, 'Election Office 1', 0, 1, 'office@gmail.com', NULL, '$2y$10$OsK0/lb5zTyldG5aoc2TtuVJsXPY4LoG7UTQN4gl8mDcfr3vGd13m', NULL, '2022-10-09 18:17:30', '2022-10-09 18:17:30');

-- ----------------------------
-- Table structure for voters
-- ----------------------------
DROP TABLE IF EXISTS `voters`;
CREATE TABLE `voters`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `finger_print_id` int NOT NULL DEFAULT 0,
  `nic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of voters
-- ----------------------------
INSERT INTO `voters` VALUES (1, 3, 'Voter 1', 1, '55665566v', 'colombo, voter address', 1, '2022-10-07 17:57:07', '2022-10-07 18:53:48');

SET FOREIGN_KEY_CHECKS = 1;
