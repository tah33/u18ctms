-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2019 at 06:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cls`
--

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` double(9,3) DEFAULT NULL,
  `fine` double(9,3) DEFAULT NULL,
  `total` double(9,3) DEFAULT NULL,
  `paid_fee` double(9,3) DEFAULT NULL,
  `paid_fine` double(9,3) DEFAULT NULL,
  `paid_total` double(9,3) DEFAULT NULL,
  `match_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `round` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `team_name`, `fee`, `fine`, `total`, `paid_fee`, `paid_fine`, `paid_total`, `match_name`, `round`, `created_at`, `updated_at`) VALUES
(1, 'Comilla', 5000.000, NULL, 5000.000, 5000.000, NULL, 5000.000, 'Comilla vs Chittagong', 'first', '2019-03-22 07:59:34', '2019-03-22 08:01:25'),
(3, 'Chittagong', 5000.000, NULL, 5000.000, 5000.000, NULL, 5000.000, 'Comilla vs Chittagong', 'first', '2019-03-22 08:32:32', '2019-03-22 08:32:55'),
(4, 'Dhaka', 5000.000, NULL, 5000.000, 5000.000, NULL, 5000.000, 'Dhaka vs Barisal', 'first', '2019-03-22 09:32:43', '2019-03-22 09:34:06'),
(5, 'Barisal', 5000.000, NULL, 5000.000, 5000.000, NULL, 5000.000, 'Dhaka vs Barisal', 'first', '2019-03-22 09:33:18', '2019-03-22 09:34:15'),
(6, 'Khulna', 5000.000, NULL, 5000.000, NULL, NULL, NULL, 'Sylhet vs Khulna', 'first', '2019-03-26 06:12:00', '2019-03-26 06:12:00'),
(7, 'Sylhet', 5000.000, NULL, 5000.000, NULL, NULL, NULL, 'Sylhet vs Khulna', 'first', '2019-03-26 06:12:10', '2019-03-26 06:12:10'),
(8, 'Sylhet', 5000.000, NULL, 5000.000, NULL, NULL, NULL, 'Rangpur vs Sylhet', 'first', '2019-03-26 07:51:37', '2019-03-26 07:51:37'),
(9, 'Rangpur', 5000.000, NULL, 5000.000, NULL, NULL, NULL, 'Rangpur vs Sylhet', 'first', '2019-03-26 07:51:51', '2019-03-26 07:51:51'),
(10, 'Comilla', 5000.000, NULL, 5000.000, 5000.000, NULL, 5000.000, 'Comilla vs Chittagong', 'ko', '2019-03-27 10:31:49', '2019-03-27 10:33:13'),
(11, 'Chittagong', 5000.000, NULL, 5000.000, 5000.000, NULL, 5000.000, 'Comilla vs Chittagong', 'ko', '2019-03-27 10:32:21', '2019-03-27 10:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` datetime NOT NULL,
  `match` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `round` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `team1`, `team2`, `venue`, `location`, `time`, `match`, `round`, `created_at`, `updated_at`) VALUES
(10, 'Comilla', 'Chittagong', 'Shaheed Chandu Stadium', 'Bogra', '2019-07-05 08:00:00', 'Comilla vs Chittagong', 'first', '2019-03-22 07:10:11', '2019-03-22 07:50:18'),
(11, 'Chittagong', 'Dhaka', 'Shaheed Chandu Stadium', 'Bogra', '2019-07-01 05:00:00', 'Chittagong vs Dhaka', 'first', '2019-03-22 07:10:32', '2019-03-22 07:10:32'),
(12, 'Dhaka', 'Barisal', 'Shaheed Chandu Stadium', 'Bogra', '2019-07-02 09:00:00', 'Dhaka vs Barisal', 'first', '2019-03-22 07:10:55', '2019-03-22 07:10:55'),
(13, 'Barisal', 'Rajshahi', 'Bangabandhu Stadium', 'Dhaka', '2019-07-03 08:00:00', 'Barisal vs Rajshahi', 'first', '2019-03-22 07:13:45', '2019-03-22 07:13:45'),
(27, 'Sylhet', 'Khulna', 'Sher-e-Bangla Stadium', 'Dhaka', '2014-07-05 08:00:00', 'Sylhet vs Khulna', 'first', '2019-03-26 06:10:30', '2019-03-26 06:10:30'),
(34, 'Rajshahi', 'Rangpur', 'Sheikh Abu Naser Stadium', 'Khulna', '2019-06-06 07:00:00', 'Rajshahi vs Rangpur', 'first', '2019-03-26 07:12:18', '2019-03-26 07:12:18'),
(124, 'Barisal', 'Rajshahi', 'Bangabandhu Stadium', 'Dhaka', '2019-01-22 01:00:00', 'Barisal vs Rajshahi', 'ko', '2019-03-27 10:51:40', '2019-03-27 10:51:40'),
(125, 'Chittagong', 'Comilla', 'Sher-e-Bangla Stadium', 'Dhaka', '2019-09-08 01:00:00', 'Chittagong vs Comilla', 'ko', '2019-03-27 10:52:15', '2019-03-27 10:52:15'),
(126, 'Rangpur', 'Sylhet', 'Shaheed Chandu Stadium', 'Bogra', '2019-07-05 13:59:00', 'Rangpur vs Sylhet', 'first', '2019-03-27 10:52:43', '2019-03-27 10:52:43'),
(127, 'Chittagong', 'Comilla', 'Bangabandhu Stadium', 'Dhaka', '2019-08-08 12:00:00', 'Chittagong vs Comilla', 'final', '2019-03-27 10:58:09', '2019-03-27 10:58:09'),
(128, 'Dhaka', 'Barisal', 'Sheikh Abu Naser Stadium', 'Khulna', '2019-09-09 01:00:00', 'Dhaka vs Barisal', 'ko', '2019-03-27 10:58:41', '2019-03-27 10:58:41');

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
(6, '2019_03_03_144659_create_venues_table', 4),
(9, '2019_03_03_132325_create_teams_table', 6),
(39, '2019_03_02_133221_create_players_table', 21),
(40, '2019_03_16_094905_create_matches_table', 22),
(41, '2019_03_17_105609_create_fees_table', 22),
(42, '2019_03_18_142130_create_points_table', 22),
(43, '2019_03_18_160553_create_runs_table', 22),
(47, '2019_03_19_152031_create_results_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bday` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cell` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batting_style` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bowling_style` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `email`, `bday`, `cell`, `height`, `weight`, `category`, `batting_style`, `bowling_style`, `team`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Tanvir Ahmed', 'asanjida777@gmail.com', '2005-05-05', '01631102830', '5.6', '55', 'batsman', 'rhb', NULL, 'Dhaka', '1553157066.jpg', '2019-03-21 02:31:06', '2019-03-21 02:31:06'),
(2, 'Tanvir Ahmed', 'tanvir59@outlook.com', '2005-07-05', '01631102838', '5.6', '53', 'batsman', 'rhb', NULL, 'Barisal', '1553157191.jpg', '2019-03-21 02:33:11', '2019-03-21 03:37:23'),
(3, 'Tanvir Ahmed', 'a@outlook.com', '2004-05-05', '01631102839', '5.6', '55', 'wc', NULL, NULL, 'Chittagong', '1553157229.jpg', '2019-03-21 02:33:49', '2019-03-21 02:33:49'),
(4, 'Tanvir Ahmed', 'a@gmail.com', '2005-07-05', '01631102831', '5.6', '53', 'batsman', 'rhb', NULL, 'Rajshahi', '', '2019-03-26 11:07:22', '2019-03-26 11:07:22'),
(5, 'Tanvir Ahmed', 'sfa@gmail.com', '2005-07-05', '01631102832', '5.6', '53', 'batsman', 'rhb', NULL, 'Sylhet', '', '2019-03-26 11:08:37', '2019-03-26 11:08:37'),
(6, 'Tanvir Ahmed', 'sf@gmail.com', '2005-07-05', '01631102833', '5.6', '53', 'batsman', 'rhb', NULL, 'Barisal', '', '2019-03-26 11:10:46', '2019-03-26 11:10:46'),
(7, 'Tanvir Ahmed', 'tanvir1239@gmail.com', '2005-07-05', '01631102834', '5.6', '53', 'batsman', 'rhb', NULL, 'Sylhet', '', '2019-03-26 11:12:23', '2019-03-26 11:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `run_rate` double(9,2) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `match_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `round` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `team`, `run_rate`, `points`, `match_name`, `round`, `created_at`, `updated_at`) VALUES
(19, 'Chittagong', 9.00, 0, 'Comilla vs Chittagong', 'first', NULL, NULL),
(20, 'Comilla', 7.00, 0, 'Comilla vs Chittagong', 'first', NULL, NULL),
(22, 'Barisal', 7.00, 2, 'Dhaka vs Barisal', 'first', NULL, NULL),
(23, 'Rangpur', 5.50, 0, 'Rangpur vs Sylhet', 'first', NULL, NULL),
(24, 'Sylhet', 5.50, 0, 'Rangpur vs Sylhet', 'first', NULL, NULL),
(25, 'Rajshahi', 5.50, 2, 'Rajshahi vs Barisal', 'first', NULL, NULL),
(26, 'Chittagong', 7.00, 4, 'Comilla vs Chittagong', 'ko', NULL, NULL),
(27, 'Comilla', 5.50, 4, 'Comilla vs Chittagong', 'ko', NULL, NULL),
(28, 'Dhaka', 7.00, 2, 'Dhaka vs Barisal', 'ko', NULL, NULL),
(29, 'Barisal', 5.50, 2, 'Dhaka vs Barisal', 'ko', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `round` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `match_name`, `result`, `round`, `created_at`, `updated_at`) VALUES
(10, 'Comilla vs Chittagong', 'draw', 'first', '2019-03-25 06:51:17', '2019-03-25 06:51:17'),
(11, 'Dhaka vs Barisal', 'Barisal won by 7 run', 'first', '2019-03-26 06:13:52', '2019-03-26 06:13:52'),
(12, 'Comilla vs Chittagong', 'Chittagong won by 7 run', 'ko', '2019-03-27 10:38:20', '2019-03-27 10:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `runs`
--

CREATE TABLE `runs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ov1` double(9,2) NOT NULL,
  `ov2` double(9,2) NOT NULL,
  `ov3` double(9,2) NOT NULL,
  `ov4` double(9,2) NOT NULL,
  `ov5` double(9,2) NOT NULL,
  `total` double(9,2) NOT NULL,
  `run` int(11) NOT NULL,
  `match_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `round` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `runs`
--

INSERT INTO `runs` (`id`, `team`, `ov1`, `ov2`, `ov3`, `ov4`, `ov5`, `total`, `run`, `match_name`, `round`, `created_at`, `updated_at`) VALUES
(6, 'Dhaka', 5.00, 6.00, 5.00, 5.00, 5.50, 5.50, 28, 'Dhaka vs Barisal', 'first', '2019-03-24 09:54:21', '2019-03-24 09:54:21'),
(26, 'Comilla', 5.00, 6.00, 5.00, 5.00, 7.00, 7.00, 45, 'Comilla vs Chittagong', 'first', '2019-03-25 06:46:37', '2019-03-25 06:46:37'),
(30, 'Chittagong', 5.00, 6.00, 5.00, 5.00, 9.00, 9.00, 45, 'Comilla vs Chittagong', 'first', '2019-03-25 06:51:17', '2019-03-25 06:51:17'),
(31, 'Barisal', 5.00, 6.00, 5.00, 5.00, 7.00, 7.00, 35, 'Dhaka vs Barisal', 'first', '2019-03-26 06:13:52', '2019-03-26 06:13:52'),
(32, 'Comilla', 5.00, 6.00, 5.00, 5.00, 5.50, 5.50, 28, 'Comilla vs Chittagong', 'ko', '2019-03-27 10:37:55', '2019-03-27 10:37:55'),
(33, 'Chittagong', 5.00, 6.00, 5.00, 5.00, 7.00, 7.00, 35, 'Comilla vs Chittagong', 'ko', '2019-03-27 10:38:20', '2019-03-27 10:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coach` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `physician` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `coach`, `physician`, `owner`, `created_at`, `updated_at`) VALUES
(10, 'Comilla', 'Tanvir Ahmed', 'Dr. Tanvir', 'tanvir', '2019-03-15 06:50:43', '2019-03-16 00:19:28'),
(11, 'Chittagong', 'Tanvir', 'Dr. Tanvir', 'Tanvir', '2019-03-15 06:51:47', '2019-03-15 06:51:47'),
(12, 'Dhaka', 'Tanvir', 'Dr. Tanvir', 'Tanvir', '2019-03-17 03:00:39', '2019-03-17 03:00:39'),
(13, 'Barisal', 'Tanvir', 'Dr. Tanvir', 'Tanvir', '2019-03-17 03:00:48', '2019-03-17 03:00:48'),
(14, 'Rajshahi', 'Tanvir', 'Dr. Tanvir', 'Tanvir', '2019-03-17 03:01:02', '2019-03-17 03:01:02'),
(15, 'Rangpur', 'Tanvir', 'Dr. Tanvir', 'Tanvir', '2019-03-22 07:06:11', '2019-03-22 07:06:11'),
(16, 'Sylhet', 'Tanvir', 'Dr. Tanvir', 'Tanvir', '2019-03-22 07:06:59', '2019-03-22 07:06:59'),
(17, 'Khulna', 'Tanvir', 'Dr. Tanvir', 'Tanvir', '2019-03-22 07:07:20', '2019-03-22 07:07:20');

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
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Tanvir Ahmed', 'tanvir59@outlook.com', NULL, '$2y$10$idMDxuB78Y/6SQIyO60sI.0Xscg3wCzX6oXQxoz.Iuc3tjn3aquEu', 'JsitU0o9AR9CTLAbCDbrefpdXjtJAs6G3zfpHdPswYnNP0aHEKEqaLtTj56M', 'admin', '2019-03-02 05:38:04', '2019-03-02 05:38:04'),
(3, 'Tanvir', 'a@gmail.com', NULL, '$2y$10$/.79fJUBrWtpOIpYeXZJ0ORMAQfHDd0/mLTnTSFKjll/MB5mTqlR2', NULL, 'owner', '2019-03-02 06:36:21', '2019-03-02 06:36:21'),
(6, 'tanvir', 'asanjida777@gmail.com', NULL, '$2y$10$1vaBgc5OYDohSAr2iIlktuOr1L/qA7TdAlQunSgqLyUxrQvWmFeb6', NULL, 'owner', '2019-03-02 07:41:27', '2019-03-02 07:41:27'),
(7, 'Tanvir Ahmed', 'a@outlook.com', NULL, '$2y$10$Wqk/Xh6E2ZldofS2CWVYAOTq/XPayevhGISUFDVmNLFkYylH3LsFe', NULL, 'owner', '2019-03-26 10:52:46', '2019-03-26 10:52:46'),
(9, 'Tanvir Ahmed', 'prince@gmail.com', NULL, '$2y$10$bC0EM5Z7fLBaJuSXGgSDnezDvColyH2LwAPl.6sEcH8hZmFyHjzjG', NULL, 'owner', '2019-03-27 08:23:36', '2019-03-27 08:23:36'),
(10, 'Saria', 'sa@gmail.com', NULL, '$2y$10$q2MdpKqZJV1owzD5Xo41ruSu3GrqQpd.rNcNp8i78t5r.DfDg1VJu', NULL, 'owner', '2019-03-27 08:25:01', '2019-03-27 08:25:01'),
(11, 'Shishir', 'shishir@gmail.cm', NULL, '$2y$10$JKtbTlKul9scOUge87ft2e9YNpAG/0SsO1fH9CPtoFt1Ceql.qoae', NULL, 'owner', '2019-03-27 08:26:38', '2019-03-27 08:26:38'),
(14, 'Tanvir Ahmed', 'tanvir@outlook.com', NULL, '$2y$10$bNJy8zV/CDFvOjdhQtf65OboQKpVD.HVjy8GKk798bcdxdUU68ai.', NULL, 'owner', '2019-03-27 08:42:42', '2019-03-27 08:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(18, 'Khan Shaheb Osman Ali Stadium', 'Fatullah', '2019-03-16 02:56:43', '2019-03-16 02:56:43'),
(19, 'Shaheed Chandu Stadium', 'Bogra', '2019-03-16 02:57:04', '2019-03-16 02:57:04'),
(20, 'Sher-e-Bangla Stadium', 'Dhaka', '2019-03-16 02:59:56', '2019-03-16 02:59:56'),
(21, 'Bangabandhu Stadium', 'Dhaka', '2019-03-16 06:22:19', '2019-03-16 06:22:19'),
(22, 'M. A. Aziz Stadium', 'Chittagong', '2019-03-16 06:22:29', '2019-03-16 06:22:29'),
(23, 'Sheikh Abu Naser Stadium', 'Khulna', '2019-03-16 06:22:43', '2019-03-16 06:22:43'),
(24, 'Sylhet International Cricket Stadium', 'Sylhet', '2019-03-16 06:22:53', '2019-03-16 06:22:53'),
(25, 'Zohur Ahmed Chowdhury Stadium', 'Chittagong', '2019-03-16 06:22:57', '2019-03-16 06:22:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `runs`
--
ALTER TABLE `runs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `runs`
--
ALTER TABLE `runs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
