-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 05:03 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--
CREATE DATABASE IF NOT EXISTS `myapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `myapp`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Deluxe ', 'Kool Air', NULL, NULL),
(2, 'Premium ', 'Kool Air', NULL, NULL),
(3, 'Double', 'Kool Air', NULL, NULL),
(4, 'Family', 'Kool Air', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`) VALUES
(19, 2, 14),
(20, 2, 15),
(21, 4, 15),
(23, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone_number`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(18, 'Trần Vinh', 'vinhtran3107@gmail.com', '0939722544', 'Báo giá', 'Yêu cầu gửi báo giá năng lượng mặt trời', '2020-03-26 05:01:13', '2020-03-26 05:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 12, 'images', 'logoLamAnhBoutique', 'logoLamAnhBoutique.png', 'image/png', 'public', 74237, '[]', '{\"generated_conversions\":{\"thumb\":true,\"square\":true}}', '[]', 1, '2020-05-20 02:28:26', '2020-05-20 02:28:27'),
(2, 'App\\User', 13, 'images', 'logoLamAnhBoutique', 'logoLamAnhBoutique.png', 'image/png', 'public', 74237, '[]', '{\"generated_conversions\":{\"thumb\":true,\"square\":true}}', '[]', 2, '2020-05-20 02:28:52', '2020-05-20 02:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_02_194831_create_todos_table', 1),
(4, '2019_12_03_043411_add_user_id_column_and_foreign_constraint_to_todos_table', 2),
(5, '2019_12_03_073215_add_image_column_to_users_table', 3),
(6, '2019_12_05_201816_add_image_column_to_todos_table', 4),
(7, '2020_03_08_190701_create_contacts_table', 5),
(8, '2020_03_22_092757_create_projects_table', 6),
(9, '2020_03_22_094422_add_user_id_column_and_foreign_constraint_to_projects_table', 7),
(10, '2016_06_01_000001_create_oauth_auth_codes_table', 8),
(11, '2016_06_01_000002_create_oauth_access_tokens_table', 8),
(12, '2016_06_01_000003_create_oauth_refresh_tokens_table', 8),
(13, '2016_06_01_000004_create_oauth_clients_table', 8),
(14, '2016_06_01_000005_create_oauth_personal_access_clients_table', 8),
(15, '2020_05_20_075436_create_media_table', 9),
(16, '2020_05_22_020850_create_categories_table', 10),
(17, '2020_05_22_020910_create_products_table', 10),
(18, '2020_05_22_023807_create_category_product_table', 11),
(19, '2020_05_22_102025_create_optgroups_table', 12),
(20, '2020_05_22_102342_create_option_table', 12),
(21, '2020_05_25_014436_create_products_option_table', 13),
(22, '2020_05_25_033849_create_option_product_table', 14),
(23, '2020_05_28_075657_add_role_column_to_users_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('1285da4a2e75ba3656fed75019978b92a34c4ba6d64ddc83b8a2911f53bb1cf908759393ee41418c', 13, 1, 'token', '[]', 0, '2020-05-20 03:31:46', '2020-05-20 03:31:46', '2021-05-20 10:31:46'),
('1a6714f79d6588c4edba5ca051eb88687238ffbfd9f616f6fda60b88d0120031c9fa9b4c93a859ab', 12, 1, 'token', '[]', 0, '2020-05-20 03:41:00', '2020-05-20 03:41:00', '2021-05-20 10:41:00'),
('1b877f0d3fc9504b84adfe73415f4a5cfdc04112548c8f7255c3168567b95804b827e13ed2aa966c', 6, 1, 'token', '[]', 0, '2020-05-20 02:38:53', '2020-05-20 02:38:53', '2021-05-20 09:38:53'),
('1c61aa65722a8b668172403e7538a66bd937a61f239894ceca59c55697ecd13f2d49a2136ee851bd', 4, 1, 'Personal Access Token', '[]', 0, '2020-05-19 21:07:31', '2020-05-19 21:07:31', '2021-05-20 04:07:31'),
('1d81d1b4865bb8d0886aa06af28faea0fbb5d0550b6122ff79316a6ebb64a0f0f85c6d9f70f9080d', 4, 1, 'Personal Access Token', '[]', 0, '2020-05-19 21:00:35', '2020-05-19 21:00:35', '2021-05-20 04:00:35'),
('2157623945c58ae629559fa2c6981805ff3f973bf41b5eca2e88adf9689b7c733ac74625906c3f7c', 13, 1, 'token', '[]', 0, '2020-05-28 07:05:41', '2020-05-28 07:05:41', '2021-05-28 14:05:41'),
('2d11ab14628b31f511108969867bec9fbe921b905e1abba63d260a4a32ee18233bb9db752ed009d2', 4, 1, 'Personal Access Token', '[]', 0, '2020-05-19 21:14:49', '2020-05-19 21:14:49', '2021-05-20 04:14:49'),
('39bdd7d9497007ebd60e4271958c2ba979259c3d082c683fb02d6ba6c370c94687c16c6f3541d35c', 13, 1, 'token', '[]', 0, '2020-05-20 02:28:52', '2020-05-20 02:28:52', '2021-05-20 09:28:52'),
('3c370fb0e07b7a383091cc349956c2619ba8ba488795183e4dcc2ee98c105f417d27adaa9cb5aba4', 7, 1, 'token', '[]', 0, '2020-05-20 03:40:51', '2020-05-20 03:40:51', '2021-05-20 10:40:51'),
('4c7e17d887feb0b8e34e61484aff6808b65b15b14f09183459aec0c139547f509a69f187717da640', 13, 1, 'token', '[]', 0, '2020-05-20 03:40:14', '2020-05-20 03:40:14', '2021-05-20 10:40:14'),
('5203b4cbf3c6593949e62104ac232da5249e5f802442a9f7532682eab164ed4977c65ecc6973af32', 12, 1, 'Personal Access Token', '[]', 0, '2020-05-20 02:42:23', '2020-05-20 02:42:23', '2021-05-20 09:42:23'),
('53183edd67f9fec58ac6bd7ef7d7f1c6f1d5e1129cd9f7ddbbf541ffcfa4b7e53385306de358601f', 4, 1, 'token', '[]', 0, '2020-05-19 21:14:21', '2020-05-19 21:14:21', '2021-05-20 04:14:21'),
('56135f1e9525734cc104ec447460a359f914d5effb940280e88d259ee5724b232f8de70a41cb5c63', 11, 1, 'token', '[]', 0, '2020-05-20 02:21:51', '2020-05-20 02:21:51', '2021-05-20 09:21:51'),
('61c938423073abc72cce53fb8e721fe1b73e07154d1c732d2eaae771027db5a6f0a7a2ef12c2396a', 6, 1, 'Personal Access Token', '[]', 0, '2020-05-20 02:42:14', '2020-05-20 02:42:14', '2021-05-20 09:42:14'),
('6410b6a8f385c796516b95f6089bd95332087c5390654a5f577a5f9637646582b59818f28cf5f201', 13, 1, 'token', '[]', 0, '2020-05-20 03:33:43', '2020-05-20 03:33:43', '2021-05-20 10:33:43'),
('65f34cfcab2353e03961c17cb8dab8ba7f0834bcc0cec246f785970974bd8966eae197d5c124fc23', 13, 1, 'Personal Access Token', '[]', 0, '2020-05-20 02:43:03', '2020-05-20 02:43:03', '2021-05-20 09:43:03'),
('6f277cced2aec20e4c52294e8cf1553567b91a4ef7e0d702a3a0ec8dd3fea14e39a916368a1ef896', 6, 1, 'token', '[]', 0, '2020-05-19 23:55:03', '2020-05-19 23:55:03', '2021-05-20 06:55:03'),
('868b7d947c017330c3571cbcbcbb61554fb93b995ea0cf5be859d970dbbd728bfd05fe1cfbc3a4ca', 4, 1, 'token', '[]', 0, '2020-05-19 21:11:18', '2020-05-19 21:11:18', '2021-05-20 04:11:18'),
('8c53b4e38329b10a3f8f17c695016bf7118cb5d1088a893f6295f330e088f903af9d2d6bf40e071b', 5, 1, 'token', '[]', 0, '2020-05-19 21:12:48', '2020-05-19 21:12:48', '2021-05-20 04:12:48'),
('930afd8447b4ae24de894517973df84f45979e47711756282b53875a2695b3074244bd67b42a256d', 12, 1, 'token', '[]', 0, '2020-05-20 02:28:26', '2020-05-20 02:28:26', '2021-05-20 09:28:26'),
('95ffab851d8440fca10c476601cc599c83aebb791daa8597014b7d6ff2b85cbab66747d4b7e19fc3', 4, 1, 'Personal Access Token', '[]', 0, '2020-05-19 20:28:54', '2020-05-19 20:28:54', '2021-05-20 03:28:54'),
('978b92af9557a89d8fc9c6526823b25bc6d0dec797a48ec61d0c66a6ea341ad365536245356b557b', 10, 1, 'token', '[]', 0, '2020-05-20 02:19:03', '2020-05-20 02:19:03', '2021-05-20 09:19:03'),
('9dc636c388f5fa5981655d62c6fac58cb8c9aab74d1b53a1dddf3d1642427fb4b8628a0c232b15e6', 13, 1, 'token', '[]', 0, '2020-05-20 02:58:46', '2020-05-20 02:58:46', '2021-05-20 09:58:46'),
('afb7f03061c4746d87474143a345bbc98ea3c6f00ca299b827f5343457d41f6c043f54a95336dd31', 13, 1, 'token', '[]', 0, '2020-05-20 03:19:49', '2020-05-20 03:19:49', '2021-05-20 10:19:49'),
('de93a27d39a9cac10dc7273ec723bd5a6dc09792421ef3730038a2cde424c3df1d161000b5526971', 8, 1, 'token', '[]', 0, '2020-05-20 02:17:02', '2020-05-20 02:17:02', '2021-05-20 09:17:02'),
('e8b8a70c11036f763c8ba2c2dff6988f19ea44247808639b2cf2d6061a1b69b9b4a3abb9d19684c4', 4, 1, 'token', '[]', 0, '2020-05-19 21:15:59', '2020-05-19 21:15:59', '2021-05-20 04:15:59'),
('eeb23c8988664f7dbc54c1804c3c2b5330deba84e2157f42c921f77af9c400855d9c6cf2e5d31312', 6, 1, 'token', '[]', 0, '2020-05-19 23:53:39', '2020-05-19 23:53:39', '2021-05-20 06:53:39'),
('f4446b7ed919adfb0caaa03609937c6cc837805e7b8bb3587c0ea4d2bfa24573ff702aef75fccb73', 4, 1, 'token', '[]', 0, '2020-05-19 21:14:27', '2020-05-19 21:14:27', '2021-05-20 04:14:27'),
('f470414e38d1254d9013f4521ba4bfe2e23bcd6cba2e11ddd112753a144e30c65cab7c657750d6ef', 9, 1, 'token', '[]', 0, '2020-05-20 02:18:02', '2020-05-20 02:18:02', '2021-05-20 09:18:02'),
('f74e703fa5d862df84af10aa1da3d1019f760aa9fc6880447ce0986aa941df3f12687f95d1fba7b6', 13, 1, 'token', '[]', 0, '2020-05-20 03:31:20', '2020-05-20 03:31:20', '2021-05-20 10:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'SKYDQnIzsurLwvNHMjAkafai0rta8EFmAIulEYZx', 'http://localhost', 1, 0, 0, '2020-05-19 19:33:46', '2020-05-19 19:33:46'),
(2, NULL, 'Laravel Password Grant Client', 'GLpfOr8oiGParBN2Jia4BisYtn58wdDpSuBvq8Gk', 'http://localhost', 0, 1, 0, '2020-05-19 19:33:46', '2020-05-19 19:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-05-19 19:33:46', '2020-05-19 19:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `optgroups`
--

CREATE TABLE `optgroups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `optgroups`
--

INSERT INTO `optgroups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Size', '2020-05-25 02:06:03', '2020-05-25 02:06:07'),
(2, 'Colour', '2020-05-25 02:06:21', '2020-05-25 02:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optgroup_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`id`, `name`, `optgroup_id`, `created_at`, `updated_at`) VALUES
(1, 'S', 1, '2020-05-20 22:25:26', '2020-05-20 22:25:26'),
(2, 'M', 1, '2020-05-20 22:25:26', '2020-05-20 22:25:26'),
(3, 'L', 1, '2020-05-20 22:25:26', '2020-05-20 22:25:26'),
(4, 'Red', 2, '2020-05-20 22:25:27', '2020-05-20 22:25:27'),
(5, 'Black', 2, '2020-05-20 22:25:27', '2020-05-20 22:25:27'),
(6, 'White', 2, '2020-05-20 22:25:27', '2020-05-20 22:25:27'),
(7, 'Pink', 2, '2020-05-20 22:25:27', '2020-05-20 22:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `option_product`
--

CREATE TABLE `option_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `option_product`
--

INSERT INTO `option_product` (`id`, `product_id`, `option_id`) VALUES
(6, 14, 1),
(7, 14, 2),
(8, 14, 3),
(9, 14, 4),
(10, 14, 5),
(11, 15, 2),
(12, 15, 3),
(13, 15, 5),
(15, 17, 1),
(16, 17, 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('chienktv@gmail.com', '$2y$10$gUHHz4cWCNWKGM0ChDWS.eSqUClJ3YZ/BmSInf/bH1oltGLgAmvZO', '2019-12-02 21:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-product.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image_product`, `created_at`, `updated_at`) VALUES
(13, 'test', 100.00, '<p>fasdf</p>', 'default-product.png', '2020-05-28 03:37:42', '2020-05-28 03:37:42'),
(14, 'Hapkido Art', 99.00, '<p>Demo product</p>', '5ed070afa62c4.png', '2020-05-28 19:17:19', '2020-05-28 19:17:19'),
(15, 'I love Kantek', 68.00, '<p>hard work!</p>', '5ed0716390aa1.jpg', '2020-05-28 19:20:19', '2020-05-28 19:20:19'),
(17, 'Kantek in CanTho', 89.00, '<ul>\r\n<li>fitter, show, add product</li>\r\n<li>check user role, feature permission pass middleware</li>\r\n<li>api user login, profile, update info user</li>\r\n<li><span style=\"background-color: #ffff99;\">localhost/laravel-scratch/product/</span></li>\r\n<li><span style=\"background-color: #ffff99;\">localhost/laravel-scratch/product/create</span>\r\n<ol>\r\n<li>user admin: admin@gmail.com / 12345678</li>\r\n<li>user client: client@gmail.com / 12345678</li>\r\n</ol>\r\n</li>\r\n</ul>', 'default-product.png', '2020-05-28 19:59:51', '2020-05-28 19:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'notfoundimage.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `body`, `image`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'dự án gành hào', 'bạc liêu', 'notfoundimage.png', '2020-03-22 12:28:57', '2020-03-22 12:29:01', 2),
(3, 'Hệ thống xử lý nước thải khu dân cư hồng phát', '<p>Diện t&iacute;ch: 5km</p>\r\n<p>Cấp: 3</p>\r\n<p>Chủ dự &aacute;n: Cty Hồng Ph&aacute;t</p>', '5e78b95d92f0c.jpg', '2020-03-23 06:27:57', '2020-03-24 04:01:36', 2),
(5, 'Công Trình Đô Thị Nam Cần Thơ', '<p>c&ocirc;ng tr&igrave;nh</p>', '5e79e9b0db319.jpg', '2020-03-24 04:05:49', '2020-03-29 05:50:25', 2),
(6, 'Tọa lạc cồn khương', '<p>fasf</p>', '5e8099b4b1888.png', '2020-03-26 04:20:14', '2020-03-29 05:51:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `image`) VALUES
(19, '1 Quy trình vệ sinh bể chứa nước trong nhà của hộ gia đình', 'Quy trình vệ sinh bể chứa nước trong nhà của hộ gia đình', '2020-03-11 17:00:00', '2020-03-11 17:00:00', 3, '5e67615e58f90.jpg'),
(20, '2 Quy trình vệ sinh bể chứa nước trong nhà của hộ gia đình', 'Quy trình vệ sinh bể chứa nước trong nhà của hộ gia đình', '2020-03-11 17:00:00', '2020-03-11 17:00:00', 1, '5e676084e9593.jpg'),
(21, '3 Quy trình vệ sinh bể chứa nước trong nhà của hộ gia đình', 'Quy trình vệ sinh bể chứa nước trong nhà của hộ gia đình', '2020-03-11 17:00:00', '2020-03-11 17:00:00', 1, '5e676097d55fc.jpg'),
(22, 'NHỮNG ỨNG DỤNG TUYỆT VỜI CHO KỸ SƯ TRẮC ĐỊA', 'Trên kho ứng dụng của CH- Play của Google và App store của Apple có nhiều ứng dụng rất tuyệt vời dành cho kỹ sư trắc địa hoặc những người có nhu cầu định vị, nhu cầu tìm điểm. Chỉ với một chiếc điện thoại thông minh có cài đặt hệ điều hành Android hoặc IOS thì có thể tải về xài miễn phí. Các ứng dụng này có thể thay thế các thiết bị GPS cầm tay hiện nay chỉ bằng cài cài chúng vào điện thoại thông minh mà bạn có', '2020-03-11 17:00:00', '2020-03-11 17:00:00', 2, '5e69a5b2f2f05.jpg'),
(23, 'Khuyến nghị việc sử dụng nước có bồn chứa', 'Qua quá trình tiếp nhận thông tin và kiểm tra thực tế các hộ khách hàng có bồn chứa nước để bơm lên các tầng nhà cao hơn hoặc sử dụng bơm nước gắn trực tiếp vào đường ống sau đồng hồ đo nước', '2020-03-11 17:00:00', '2020-03-11 17:00:00', 2, '5e675fb9d8f30.jpg'),
(25, 'Ra mắt website tracdacmientaycantho.com', 'DỊCH VỤ TRẮC ĐẠC MIỀN TÂY CẦN THƠ\r\n- Địa chỉ: 132/23E đường 3/2 Phường Hưng Lợi, quận Ninh Kiều, TP Cần Thơ.\r\n- Điện thoại: 0986.494.395 (mr Ngân) hoặc 0373.28.82.82.\r\n- Gmail: tracdacmientaycantho@gmail.com\r\n- Website: http://www.tracdacmientaycantho.com/', '2020-03-11 17:00:00', '2020-03-11 17:00:00', 2, '5e675fe03d5a1.jpg'),
(26, 'Hiệu chuẩn máy trắc địa đảm bảo chính xác trong công tác đo đạc', 'Để đảm bảo độ chính xác của thiết bị trong công tác đo đạc, QUATEST 3 đã nghiên cứu phương pháp, tiêu chuẩn, tài liệu liên quan đến lĩnh vực kiểm tra thiết bị trắc địa. Đồng thời, lên phương án chọn cấu hình cho thiết bị chuẩn và xây dựng hệ trụ chuẩn phù hợp với tiêu chuẩn quốc tế ISO 17123.\r\nNgày nay, tùy thuộc vào yêu cầu sai số cho phép về quan trắc trong công trình, các loại thiết bị trắc địa như máy toàn đạc, máy kinh vĩ, máy thủy bình được chọn để đo đạc với độ chính xác trung bình hay độ chính xác cao, giúp giải quyết công việc trắc địa nhanh chóng, hiệu quả và chính xác. Vì thế, việc kiểm tra tình trạng và độ chính xác của máy trắc địa hay việc hiệu chuẩn máy trắc địa là điều tất yếu, cần được thực hiện trước khi sử dụng trong các công trình xây dựng.', '2020-02-25 17:00:00', '2020-02-25 17:00:00', 2, '5e69a36871ef7.jpg'),
(27, 'Khảo sát địa hình công trình', 'Khảo sát địa hình là gì?\r\n\r\nKhảo sát địa hình công trình hay còn gọi là khảo sát địa hình là hoạt động nghiên cứu đánh giá điều kiện tự nhiên trên mặt đất tại địa điểm dự kiến xây dựng công trình phục vụ cho các công tác quy hoạch, thiết kế, tính khối lượng đào, đắp công trình. Ngoài ra đối với các công trình quan trọng, trong quá trình thi công và khai thác công trình cũng cần phải quan trắc chuyển vị lún, nghiêng để đánh giá mức độ ổn định và có biện pháp khắc phục kịp thời nếu vượt quá giới hạn cho phép.', '2020-03-10 17:00:00', '2020-03-10 17:00:00', 2, '5e69a461562f8.jpg'),
(28, 'Trắc địa là gì? ngành trắc địa hay ngành đo đạc là gì?', 'Có khá nhiều bạn quan tâm cũng như chưa hiểu rõ về khái niệm trắc địa là gì và đo đạc là gì, cũng như một số khái niệm cơ bản và hiểu chưa đúng về khái niệm này. Hôm nay Ứng dụng mới sẽ cho các bạn hiểu sâu hơn về trắc địa và phân biệt các khái niệm trong trắc địa', '2020-03-11 17:00:00', '2020-03-11 17:00:00', 2, '5e69a4bd6e3e9.jpg'),
(33, 'Mừng khai trương', '<p>Dịch vụ trắc đạc Miền T&acirc;y Cần Thơ ch&uacute;ng t&ocirc;i c&oacute; địa chỉ tại 132/23E đường 3 th&aacute;ng 2, phường Hưng Lợi quận Ninh Kiều, TP Cần Thơ.</p>\r\n<p>Đội ngũ kỹ thuật của Ch&uacute;ng t&ocirc;i l&agrave; những kỹ sư x&acirc;y dựng với bề d&agrave;y kinh nghiệm l&acirc;u năm&nbsp;l&agrave;m c&ocirc;ng t&aacute;c khảo s&aacute;t thiết kế, đo vẽ quy hoạch, triển khai thi c&ocirc;ng c&ugrave;ng c&aacute;c trang thiết bị m&aacute;y m&oacute;c hiện&nbsp;đại, ch&uacute;ng t&ocirc;i cam kết phục vụ qu&yacute; kh&aacute;ch h&agrave;ng mọi lĩnh vực khảo s&aacute;t,&nbsp;đo&nbsp;đạc:&nbsp;&nbsp;</p>\r\n<p><span style=\"color: #ff0000;\">-&nbsp;Đo vẽ bản&nbsp;đồ hiện trạng c&aacute;c tỉ lệ;</span></p>\r\n<p>- Cắm mốc ranh giới, x&aacute;c định diện t&iacute;ch ranh đất;</p>\r\n<p>-&nbsp;Định vị tim cọc, tim trục nh&agrave; xưởng, nh&agrave; cao tầng;</p>\r\n<p>-&nbsp;Khảo s&aacute;t thiết kế đường giao th&ocirc;ng, thủy lợi, t&iacute;nh to&aacute;n san lấp mặt bằng.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Mọi th&ocirc;ng tin xin liện hệ:</strong></p>\r\n<p><strong>DỊCH VỤ TRẮC ĐẠC MIỀN T&Acirc;Y CẦN THƠ</strong></p>\r\n<p><strong>- Địa chỉ:</strong>&nbsp;132/23E đường 3/2 Phường Hưng Lợi, quận Ninh Kiều, TP Cần Thơ.</p>\r\n<p><strong>- Điện thoại:</strong>&nbsp;<em>0986.494.395</em> (mr Ng&acirc;n) hoặc 0373.28.82.82.</p>\r\n<p><strong>- Gmail:</strong>&nbsp;<a href=\"mailto:tracdacmientaycantho@gmail.com\">tracdacmientaycantho@gmail.com</a></p>\r\n<p><strong>- Website:</strong>&nbsp;<a href=\"http://www.tracdacmientaycantho.com/\">http://www.tracdacmientaycantho.com/</a></p>\r\n<p><strong>TR&Acirc;N TRỌNG K&Iacute;NH CH&Agrave;O!</strong></p>', NULL, NULL, 2, '5e79ea3525b0f.jpg'),
(34, 'cô vít 2019 thảm họa thế giới', '<p>12233</p>', NULL, NULL, 2, '5e7c93a130a8f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image.png',
  `role` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`, `role`) VALUES
(1, 'ANU', 'client@gmail.com', '2019-12-02 21:58:34', '$2y$10$LFti4T2FS7QD8ysReIc.i.qc3b5a0fEwnMSn8AUsREHlClSVRiyQq', 'mBHo4It3qEdqM2pohlut13eN5RVbY1aNpIzvnr1yohtSDKNStf6niQw4A68A', '2019-12-02 21:05:31', '2019-12-05 19:17:38', '5de93db9a85e6.png', 2),
(2, 'MienTay', 'tracdacmientaycantho@gmail.com', '2019-12-02 21:24:26', '$2y$10$XVUqiVWpmW5PPbcKko8Uu.tYySZQ9PrF76mWhLairrRFgwmnRyliG', 'UdoTuln73CUMnCFkk9gu74WdmYIdpOegFKmc2SKbfTwPjLnDpnIrWTlACkWi', '2019-12-02 21:22:22', '2020-03-24 03:48:06', '5de61590ba851.jpg', 2),
(3, 'vo tuong', 'tuong@gmail.com', '2019-12-03 05:54:50', '$2y$10$vgbiy9FmJAZ4cN5/ngXPUubhL8rjL6Pjub4L1XLsBGg9hIxN06oOO', 'QuOHWWMe3XsllgB2UdGH6TVxq9sUjvgvsgKCUFeZ5xkP0OasGJKJIGkUOwz6', '2019-12-03 05:52:48', '2019-12-05 13:51:16', '5de96dc4e3bb6.png', 2),
(13, 'Administrator', 'admin@gmail.com', '2019-12-03 05:54:50', '$2y$10$LFti4T2FS7QD8ysReIc.i.qc3b5a0fEwnMSn8AUsREHlClSVRiyQq', 'vYtRi92GYuIRL2NfU2eDw1GBg2GbGXhr8gKNR1CaFyZwBPXPAOQaZtnUydxC', '2020-05-20 02:28:52', '2020-05-20 02:28:52', 'image.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `optgroups`
--
ALTER TABLE `optgroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_optgroup_id_foreign` (`optgroup_id`);

--
-- Indexes for table `option_product`
--
ALTER TABLE `option_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_product_product_id_foreign` (`product_id`),
  ADD KEY `option_product_option_id_foreign` (`option_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_title_unique` (`title`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `todos_title_unique` (`title`),
  ADD KEY `todos_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `optgroups`
--
ALTER TABLE `optgroups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `option_product`
--
ALTER TABLE `option_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `option_optgroup_id_foreign` FOREIGN KEY (`optgroup_id`) REFERENCES `optgroups` (`id`);

--
-- Constraints for table `option_product`
--
ALTER TABLE `option_product`
  ADD CONSTRAINT `option_product_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `option` (`id`),
  ADD CONSTRAINT `option_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `todos`
--
ALTER TABLE `todos`
  ADD CONSTRAINT `todos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
