/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 80028
 Source Host           : localhost:3306
 Source Schema         : lottery

 Target Server Type    : MySQL
 Target Server Version : 80028
 File Encoding         : 65001

 Date: 02/10/2022 22:33:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_12_21_044250_create_routes_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_12_21_045534_create_user_types_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_12_21_060615_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (14, '2022_08_24_164219_create_tickets_table', 2);
INSERT INTO `migrations` VALUES (15, '2022_09_24_045528_create_predictions_table', 3);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 1, 1, NULL, NULL);
INSERT INTO `permissions` VALUES (2, 2, 1, NULL, NULL);
INSERT INTO `permissions` VALUES (3, 3, 1, NULL, NULL);
INSERT INTO `permissions` VALUES (4, 1, 2, '2022-08-24 15:13:48', '2022-08-24 15:13:48');
INSERT INTO `permissions` VALUES (5, 4, 1, '2022-09-10 16:55:23', '2022-09-10 16:55:23');
INSERT INTO `permissions` VALUES (6, 5, 1, '2022-09-10 19:43:06', '2022-09-10 19:43:06');
INSERT INTO `permissions` VALUES (7, 6, 1, '2022-09-24 05:16:32', '2022-09-24 05:16:32');

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for predictions
-- ----------------------------
DROP TABLE IF EXISTS `predictions`;
CREATE TABLE `predictions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `letter_repeat_avg` int NOT NULL,
  `number_repeat_avg` int NOT NULL,
  `printed_count` int NOT NULL,
  `winning_count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of predictions
-- ----------------------------
INSERT INTO `predictions` VALUES (1, 1, 1, 1, 6, '2022-09-24 05:34:16', '2022-09-24 05:34:16');
INSERT INTO `predictions` VALUES (2, 1, 1, 1, 6, '2022-09-24 05:34:20', '2022-09-24 05:34:20');
INSERT INTO `predictions` VALUES (3, 1, 1, 1, 6, '2022-09-24 05:34:24', '2022-09-24 05:34:24');
INSERT INTO `predictions` VALUES (4, 1, 1, 54, 6, '2022-09-24 05:34:42', '2022-09-24 05:34:42');
INSERT INTO `predictions` VALUES (5, 23, 333, 33, 6, '2022-09-24 05:39:12', '2022-09-24 05:39:12');
INSERT INTO `predictions` VALUES (6, 343, 343, 343, 6, '2022-09-24 05:39:37', '2022-09-24 05:39:37');
INSERT INTO `predictions` VALUES (7, 34, 34, 343, 6, '2022-09-24 05:43:17', '2022-09-24 05:43:17');
INSERT INTO `predictions` VALUES (8, 4423, 434, 2323, 6, '2022-09-24 05:43:46', '2022-09-24 05:43:46');
INSERT INTO `predictions` VALUES (9, 4423, 434, 2323, 6, '2022-09-24 05:44:03', '2022-09-24 05:44:03');
INSERT INTO `predictions` VALUES (10, 4423, 434, 2323, 6, '2022-09-24 05:45:44', '2022-09-24 05:45:44');
INSERT INTO `predictions` VALUES (11, 4423, 434, 2323, 6, '2022-09-24 05:45:48', '2022-09-24 05:45:48');
INSERT INTO `predictions` VALUES (12, 4423, 434, 2323, 6, '2022-09-24 05:46:25', '2022-09-24 05:46:25');
INSERT INTO `predictions` VALUES (13, 343, 343, 343, 6, '2022-09-24 05:46:32', '2022-09-24 05:46:32');
INSERT INTO `predictions` VALUES (14, 343, 343, 343, 6, '2022-09-24 05:47:25', '2022-09-24 05:47:25');
INSERT INTO `predictions` VALUES (15, 343, 343, 343, 6, '2022-09-24 05:47:44', '2022-09-24 05:47:44');
INSERT INTO `predictions` VALUES (16, 34, 343, 343, 6, '2022-09-24 05:49:36', '2022-09-24 05:49:36');
INSERT INTO `predictions` VALUES (17, 1231, 212, 1212, 6, '2022-09-24 05:52:40', '2022-09-24 05:52:40');

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of routes
-- ----------------------------
INSERT INTO `routes` VALUES (1, 'Dashboard', '/home', 1, NULL, NULL);
INSERT INTO `routes` VALUES (2, 'Users', '/users', 1, NULL, NULL);
INSERT INTO `routes` VALUES (3, 'Usertypes & Permissions', '/usertypes', 1, NULL, NULL);
INSERT INTO `routes` VALUES (4, 'Ticket Results', '/tickets', 1, NULL, NULL);
INSERT INTO `routes` VALUES (5, 'Reporting', '/reports', 1, NULL, NULL);
INSERT INTO `routes` VALUES (6, 'Predictios', '/prediction', 1, NULL, NULL);

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `drawno` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number1` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number2` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number3` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number4` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `letter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date` date NOT NULL,
  `serial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `type` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` enum('1','2','3','4') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user` bigint UNSIGNED NULL DEFAULT NULL,
  `is_result` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO `tickets` VALUES (9, 'Lotto', '20220929', '82', '55', '40', '76', 'O', '2022-09-29', '82554076', 0, '2', '1', 2, 0, '2022-09-27 16:11:58', '2022-09-27 16:11:58');
INSERT INTO `tickets` VALUES (10, 'Lotto', '20220929', '56', '99', '46', '41', 'H', '2022-09-29', '56994641', 0, '2', '1', 2, 0, '2022-09-27 16:14:10', '2022-09-27 16:14:10');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_types
-- ----------------------------
INSERT INTO `user_types` VALUES (1, 'Administrator', '1', NULL, NULL);
INSERT INTO `user_types` VALUES (2, 'User', '1', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` bigint NOT NULL DEFAULT 1,
  `status` enum('1','2','3','4') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Administrator Account', 'admin@gmail.com', NULL, '$2y$10$u2ktH1eK/1ao8BB.uuqctuEIk7k5nMvVqq6ph.PDkDMmhMFFd5z1q', 1, '1', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (2, 'User Account', 'user@gmail.com', NULL, '$2y$10$E5xpsIoeWYrdrZ34fhFwU.qCQSyjR85oDZH0QbTfi9WZAKpNASRQ.', 2, '1', NULL, NULL, '2022-09-10 18:15:24', '0779778269');
INSERT INTO `users` VALUES (3, 'Pasindu', 'pasindu@gmail.com', NULL, '$2y$10$jNsa99DbOc5okJzoPlenuucWbh9jVHB.jbnZJPi2qmYEUwWzmB1L2', 1, '4', NULL, '2022-08-28 10:07:18', '2022-08-28 19:33:21', NULL);
INSERT INTO `users` VALUES (4, 'ttes', 'test123@gmail.com', NULL, '$2y$10$62/g1lvykpptg3t6CUviW.hgobCCx4SLNd2Ks/3/aPNegzVTRDDxi', 1, '1', NULL, '2022-09-25 04:19:40', '2022-09-25 04:19:40', '0779778263');
INSERT INTO `users` VALUES (5, 'pasindu', 'adpasindupriyashan@gmail.com', NULL, '$2y$10$.UIsKCF8OBPVtH0rDpS11u7.wIqYbl67NNsKAJR6My5uPgosQ2xMq', 1, '1', NULL, '2022-09-25 04:20:59', '2022-09-25 04:20:59', '0779778269');

SET FOREIGN_KEY_CHECKS = 1;
