/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `scheduling-app` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `scheduling-app`;

CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('1d6965678580cdb74cb5cb476fa97d17', 'i:1;', 1729486792),
	('1d6965678580cdb74cb5cb476fa97d17:timer', 'i:1729486792;', 1729486792),
	('c6be2cf7c13d9a527ee2fe401bbae3c7', 'i:2;', 1729486047),
	('c6be2cf7c13d9a527ee2fe401bbae3c7:timer', 'i:1729486047;', 1729486047);

CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `detail_order_driver` (
  `id_detail_order_driver` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_order_driver` int DEFAULT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_pick_up_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_pick_up_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pick_address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_sender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_arrive_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_arrive_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail_order_driver`),
  KEY `fk_tbl_detail_order_driver_to_order_driver` (`id_order_driver`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `detail_order_driver` (`id_detail_order_driver`, `id_order_driver`, `item_type`, `order_pick_up_date`, `order_pick_up_time`, `pick_address`, `note_sender`, `order_arrive_date`, `order_arrive_time`, `client`, `destination_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'People', '18-Oct-2024', '09:00:00', NULL, 'asdasdasd', '18-Oct-2024', '09:30:00', 'asdsdasdasd', 'asdasdasd', '2024-10-18 09:03:51', '2024-10-18 09:03:51', NULL),
	(2, 2, 'People', '19-Oct-2024', '09:00:00', NULL, 'sadasd', '19-Oct-2024', '10:00:00', 'asdasd', 'asd', '2024-10-18 09:05:47', '2024-10-18 09:05:47', NULL),
	(3, 3, 'People', '22-Oct-2024', '09:00:00', NULL, 'asfasdasdasda', '22-Oct-2024', '11:00:00', 'dasdasdasd', 'asdas', '2024-10-18 09:52:08', '2024-10-18 09:52:08', NULL);

CREATE TABLE IF NOT EXISTS `detail_order_messenger` (
  `id_detail_order_messenger` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_order_messenger` int DEFAULT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_pick_up_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_pick_up_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pick_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_sender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_arrive_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_arrive_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail_order_messenger`),
  KEY `fk_tbl_detail_order_messenger_to_order_messenger` (`id_order_messenger`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `detail_order_messenger` (`id_detail_order_messenger`, `id_order_messenger`, `item_type`, `order_pick_up_date`, `order_pick_up_time`, `pick_address`, `note_sender`, `order_arrive_date`, `order_arrive_time`, `client`, `destination_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'People', '18-Oct-2024', '09:00:00', '', 'asdasd', '18-Oct-2024', '09:30:00', 'asdasd', 'dddd', '2024-10-18 09:35:36', '2024-10-18 09:35:36', NULL),
	(2, 2, 'People', '19-Oct-2024', '09:00:00', '', 'sdasdas', '19-Oct-2024', '10:00:00', 'ddasdasd', 'asdasdasd', '2024-10-18 09:38:37', '2024-10-18 09:38:37', NULL),
	(3, 3, 'Office Supplies', '21-Oct-2024', '09:00:00', '', 'sadasdasd', '21-Oct-2024', '11:00:00', 'dasdasdasdasd', 'ddasdasd', '2024-10-18 09:42:20', '2024-10-18 09:42:20', NULL),
	(4, 4, 'People', '22-Oct-2024', '09:00:00', '', 'sadasdasdasd', '22-Oct-2024', '10:30:00', 'asdasdasdasd', 'asdasd', '2024-10-18 09:50:52', '2024-10-18 09:50:52', NULL);

CREATE TABLE IF NOT EXISTS `employee` (
  `id_employee` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_users` int NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_job_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_employee`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `employee` (`id_employee`, `id_users`, `user_phone`, `user_job_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, '082110873602', 'Admin', '2024-10-13 10:00:00', '2024-10-13 10:00:00', NULL),
	(2, 2, '085711250060', 'Staff', '2024-10-13 10:00:00', '2024-10-13 10:00:00', NULL),
	(4, 4, '081284056638', 'Staff', '2024-10-08 09:45:09', '2024-10-08 09:45:09', NULL),
	(5, 5, '087880485141', 'Staff', '2024-10-08 09:45:28', '2024-10-08 09:45:28', NULL),
	(6, 6, '089655017914', 'Staff', '2024-10-08 09:45:56', '2024-10-17 02:49:39', NULL),
	(7, 7, '085735936711', 'Staff', '2024-10-17 02:46:28', '2024-10-17 02:46:28', NULL);

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(30, '0001_01_01_000000_create_users_table', 1),
	(31, '0001_01_01_000001_create_cache_table', 1),
	(32, '0001_01_01_000002_create_jobs_table', 1),
	(33, '2024_10_08_045308_add_two_factor_columns_to_users_table', 1),
	(34, '2024_10_08_045357_create_personal_access_tokens_table', 1),
	(35, '2024_10_09_033931_create_employee_table', 1),
	(36, '2024_10_09_152254_create_order_driver_table', 1),
	(37, '2024_10_09_152300_create_detail_order_driver_table', 1),
	(38, '2024_10_14_110146_create_tbl_driver_table', 1),
	(39, '2024_10_18_113129_create_tbl_messenger_table', 1),
	(40, '2024_10_18_113719_create_order_messenger_table', 1),
	(41, '2024_10_18_113733_create_detail_order_messenger_table', 1);

CREATE TABLE IF NOT EXISTS `order_driver` (
  `id_order_driver` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_tbl_driver` int NOT NULL,
  `id_users` int NOT NULL,
  `status_order_driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes_driver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_order_driver`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `order_driver` (`id_order_driver`, `id_tbl_driver`, `id_users`, `status_order_driver`, `notes_driver`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, '3', NULL, '2024-10-18 09:03:51', '2024-10-18 09:03:51', NULL),
	(2, 1, 1, '3', NULL, '2024-10-18 09:05:47', '2024-10-18 09:05:47', NULL),
	(3, 1, 1, '3', NULL, '2024-10-18 09:52:08', '2024-10-18 09:52:08', NULL);

CREATE TABLE IF NOT EXISTS `order_messenger` (
  `id_order_messenger` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_tbl_messenger` int NOT NULL,
  `id_users` int NOT NULL,
  `status_order_messenger` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes_messenger` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_order_messenger`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `order_messenger` (`id_order_messenger`, `id_tbl_messenger`, `id_users`, `status_order_messenger`, `notes_messenger`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, '3', NULL, '2024-10-18 09:35:36', '2024-10-18 09:35:36', NULL),
	(2, 1, 1, '3', NULL, '2024-10-18 09:38:37', '2024-10-18 09:38:37', NULL),
	(3, 1, 1, '3', NULL, '2024-10-18 09:42:20', '2024-10-18 09:42:20', NULL),
	(4, 1, 1, '3', NULL, '2024-10-18 09:50:52', '2024-10-18 09:50:52', NULL);

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('9fq6grJDKEtXVBJTJ0XHimoRF5TA2VkbkDdLV4rd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOUx0NmtZcG03U3FLSGNZVVF4bGh0bDZyTmJtZVQzY0d0QjBMRmU2OSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovL3NjaGVkdWxpbmctYXBwLnRlc3Q6ODA4MCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vc2NoZWR1bGluZy1hcHAudGVzdDo4MDgwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1729504899),
	('bHxWRyjly9Y8C4gQb6pDwrbJt0nK6arUCIgBFf0j', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZzhTdFhHRXpLY0dEaldUbnk1YWJDNFFFRlBiVDBENzc0aTI3ZndGaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vc2NoZWR1bGluZy1hcHAudGVzdDo4MDgwL0RyaXZlci9Cb29rIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRIZHFSaFZpVTJYMENHUXRUaW13SUhPeHNza1VPSWtsSVhtTi5tZTlUWHA2RkVkR2dFcFJ2UyI7fQ==', 1729486972),
	('caVy32Nxq9JmuHoDXFMHx24qkTqXf8kD58cpKmzn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoicDBpaVZaNTZ1T2Y1UVg4SEdaYTBZU3VTdnc3T2NWRDREMUF3cmx4cCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vc2NoZWR1bGluZy1hcHAudGVzdDo4MDgwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRIZHFSaFZpVTJYMENHUXRUaW13SUhPeHNza1VPSWtsSVhtTi5tZTlUWHA2RkVkR2dFcFJ2UyI7czo1OiJhbGVydCI7YTowOnt9fQ==', 1729245568);

CREATE TABLE IF NOT EXISTS `tbl_driver` (
  `id_tbl_driver` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_driver` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tbl_driver`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tbl_driver` (`id_tbl_driver`, `id_driver`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, '2024-10-13 21:57:53', '2024-10-13 21:57:53', NULL),
	(4, 5, '2024-10-13 23:45:21', '2024-10-13 23:45:21', NULL),
	(7, 2, '2024-10-13 23:51:12', '2024-10-13 23:51:12', NULL);

CREATE TABLE IF NOT EXISTS `tbl_messenger` (
  `id_tbl_messenger` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_messenger` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tbl_messenger`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tbl_messenger` (`id_tbl_messenger`, `id_messenger`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 6, '2024-10-18 07:18:25', '2024-10-18 07:18:25', NULL);

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `user_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `user_level`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Sulistiya Nugroho', 'sulis.nugroho@inlingua.co.id', NULL, '$2y$12$HdqRhViU2X0CGQtTimwIHOxsskUOIklIXmN.me9TXp6FEdGgEpRvS', NULL, NULL, NULL, '0', NULL, NULL, NULL, '2024-10-13 10:00:00', '2024-10-13 10:00:00', NULL),
	(2, 'Isnaini Nur Pramesty', 'pramesnain@gmail.com', NULL, '$2y$12$bTGHJBL545VuOyS6xX9tpe5JGyby3L7y2PawN4eMOCui.E3Xv5AEe', NULL, NULL, NULL, '1', NULL, NULL, NULL, '2024-10-13 10:00:00', '2024-10-13 10:00:00', NULL),
	(4, 'Heri Susmono', 'heri.susmono@inlingua.co.id', NULL, '$2y$12$0KUcDbOCWmp3NaxIqaL3f.lavFjimymWHm4sROm8k23iQbqph3rJe', NULL, NULL, NULL, '1', NULL, NULL, NULL, '2024-10-08 09:45:09', '2024-10-08 09:45:09', NULL),
	(5, 'Slamet Sutikno', 'slamet.sutikno@inlingua.co.id', NULL, '$2y$12$wOUpwx375hSyBQYWASrWEeNvGNVNYbPRAISeVfE6bGsnOqHVOjw8C', NULL, NULL, NULL, '1', NULL, NULL, NULL, '2024-10-08 09:45:28', '2024-10-08 09:45:28', NULL),
	(6, 'Ginanjar Yulianto', 'ginanjar.yulianto@inlingua.co.id', NULL, '$2y$12$bV4q.hYnk66NVrHJyyhzEuR0PW5/uVYWTd4Pw0x3ZzXddd4HMuGT2', NULL, NULL, NULL, '1', NULL, NULL, NULL, '2024-10-08 09:45:56', '2024-10-08 09:45:56', NULL),
	(7, 'Adelia Wiratna', 'adelia.wiratna@inlingua.co.id', NULL, '$2y$12$cLI.gURkw9CXC.xGjOvFjOcg7ygcZGPv9KJmMjKDa8nlsW.hkTaSG', NULL, NULL, NULL, '1', NULL, NULL, NULL, '2024-10-17 02:46:28', '2024-10-17 02:46:28', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
