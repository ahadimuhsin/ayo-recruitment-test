-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2022 at 03:10 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xyz-group`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `home_team_id` bigint(20) UNSIGNED NOT NULL,
  `away_team_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `date`, `time`, `home_team_id`, `away_team_id`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, '2022-01-12', '18:04:00', 1, 3, NULL, '2022-01-04 00:00:18', '2022-01-04 05:44:14', 1),
(2, '2022-01-20', '19:00:00', 4, 1, NULL, '2022-01-04 08:43:31', '2022-01-04 08:44:55', 1),
(3, '2022-01-12', '12:50:00', 3, 1, NULL, '2022-01-04 19:46:53', '2022-01-04 19:46:59', 1);

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_03_133858_create_teams_table', 1),
(6, '2022_01_03_134202_create_players_table', 1),
(7, '2022_01_03_134820_create_matches_table', 1),
(8, '2022_01_03_135313_create_reports_table', 1),
(9, '2022_01_03_135816_create_scorers_table', 1);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `position` enum('attacker','midfielder','defender','goalkeeper') COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `team_id`, `name`, `height`, `weight`, `position`, `number`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Muhsin Ahadi', 182, 75, 'attacker', 17, NULL, '2022-01-03 16:09:43', NULL),
(2, 3, 'Cristiano Ronaldo', 198, 89, 'attacker', 17, NULL, '2022-01-03 16:21:11', NULL),
(3, 3, 'Pemain 12', 146, 45, 'midfielder', 18, NULL, '2022-01-03 09:43:32', '2022-01-03 09:43:32'),
(4, 3, 'Pemain ke 13', 178, 76, 'defender', 1, NULL, '2022-01-03 09:45:37', '2022-01-03 09:45:37'),
(5, 3, 'Pemain ke 13', 178, 76, 'midfielder', 2, NULL, '2022-01-03 09:45:56', '2022-01-03 09:45:56'),
(6, 3, 'Lewandowski', 187, 87, 'attacker', 9, NULL, '2022-01-03 09:50:08', '2022-01-03 09:50:08'),
(7, 1, 'Marco Simic', 189, 87, 'attacker', 12, NULL, '2022-01-04 08:25:07', '2022-01-04 08:25:07'),
(8, 1, 'Andritany Ardhyasa', 178, 87, 'goalkeeper', 1, NULL, '2022-01-04 08:33:06', '2022-01-04 08:33:06'),
(9, 4, 'Karim Benzema', 186, 76, 'attacker', 9, NULL, '2022-01-04 08:42:32', '2022-01-04 08:42:32'),
(10, 4, 'Toni Kroos', 176, 80, 'midfielder', 8, NULL, '2022-01-04 08:42:53', '2022-01-04 08:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `home_team_id` bigint(20) UNSIGNED NOT NULL,
  `away_team_id` bigint(20) UNSIGNED NOT NULL,
  `home_team_goals` int(11) NOT NULL,
  `away_team_goals` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `match_id`, `home_team_id`, `away_team_id`, `home_team_goals`, `away_team_goals`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 1, 2, NULL, '2022-01-04 05:44:14', '2022-01-04 05:44:14'),
(2, 2, 4, 1, 2, 3, NULL, '2022-01-04 08:44:55', '2022-01-04 08:44:55'),
(3, 3, 3, 1, 0, 0, NULL, '2022-01-04 19:46:59', '2022-01-04 19:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `scorers`
--

CREATE TABLE `scorers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `home_team_scorer` bigint(20) UNSIGNED DEFAULT NULL,
  `away_team_scorer` bigint(20) UNSIGNED DEFAULT NULL,
  `home_team_goal_minutes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `away_team_goal_minutes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scorers`
--

INSERT INTO `scorers` (`id`, `match_id`, `home_team_scorer`, `away_team_scorer`, `home_team_goal_minutes`, `away_team_goal_minutes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, '22', '33', NULL, '2022-01-04 05:44:14', '2022-01-04 05:44:14'),
(2, 1, NULL, 6, NULL, '32', NULL, '2022-01-04 05:44:14', '2022-01-04 05:44:14'),
(3, 2, 9, 7, '50', '34', NULL, '2022-01-04 08:44:55', '2022-01-04 08:44:55'),
(4, 2, 10, 7, '56', '46', NULL, '2022-01-04 08:44:55', '2022-01-04 08:44:55'),
(5, 2, NULL, 7, NULL, '54', NULL, '2022-01-04 08:44:55', '2022-01-04 08:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_founded` year(4) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `logo`, `year_founded`, `address`, `city`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Persija Jakarta', 'logo-tim/banner-persija-jakarta.png', 1928, 'Jakarta Raya', 'Jakarta', NULL, '2022-01-03 08:39:12', '2022-01-04 08:00:20'),
(2, 'Tim 1 Edit Lagi', 'logo-tim/banner-tim-1-edit-lagi.jpg', 2024, 'Rawa Buaya', 'Jakarta', '2022-01-03 09:01:05', '2022-01-03 08:39:13', '2022-01-03 09:01:05'),
(3, 'Sriwijaya FC', 'logo-tim/banner-sriwijaya-fc.png', 2004, 'Palembang', 'Palembang', NULL, '2022-01-03 08:39:54', '2022-01-04 08:01:16'),
(4, 'Real Madrid', 'logo-tim/banner-real-madrid.png', 1908, 'Madrid, Spanyol', 'Madrid', NULL, '2022-01-04 08:38:12', '2022-01-04 08:38:12');

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', NULL, '$2y$10$qdfFVUCVFBlGkbrn3.rsoOCYBrWdyevrUIHzPe/tal5yz27Ynuize', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matches_home_team_id_foreign` (`home_team_id`),
  ADD KEY `matches_away_team_id_foreign` (`away_team_id`);

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
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_team_id_foreign` (`team_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_match_id_foreign` (`match_id`),
  ADD KEY `reports_home_team_id_foreign` (`home_team_id`),
  ADD KEY `reports_away_team_id_foreign` (`away_team_id`);

--
-- Indexes for table `scorers`
--
ALTER TABLE `scorers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scorers_home_team_scorer_foreign` (`home_team_scorer`),
  ADD KEY `scorers_away_team_scorer_foreign` (`away_team_scorer`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scorers`
--
ALTER TABLE `scorers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_away_team_id_foreign` FOREIGN KEY (`away_team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `matches_home_team_id_foreign` FOREIGN KEY (`home_team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_away_team_id_foreign` FOREIGN KEY (`away_team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `reports_home_team_id_foreign` FOREIGN KEY (`home_team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `reports_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`);

--
-- Constraints for table `scorers`
--
ALTER TABLE `scorers`
  ADD CONSTRAINT `scorers_away_team_scorer_foreign` FOREIGN KEY (`away_team_scorer`) REFERENCES `players` (`id`),
  ADD CONSTRAINT `scorers_home_team_scorer_foreign` FOREIGN KEY (`home_team_scorer`) REFERENCES `players` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
