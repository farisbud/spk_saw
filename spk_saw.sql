-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2022 at 08:07 PM
-- Server version: 8.0.29-0ubuntu0.22.04.2
-- PHP Version: 7.3.33-2+ubuntu22.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_alternatif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama_alternatif`, `kabupaten`, `provinsi`, `created_at`, `updated_at`) VALUES
(12, 'Kapubaten Teluk Bintuni', 'cobacoba1', 'kesatu', '2022-06-21 10:37:25', '2022-06-21 10:46:22'),
(13, 'Kota Sorong', 'cobacoba', 'kedua', '2022-06-21 10:38:10', '2022-06-21 10:46:09'),
(14, 'Kota Tual', 'cobacoba', 'ketiga', '2022-06-21 10:38:47', '2022-06-21 10:45:58'),
(15, 'Kapubaten Bone', 'cobacoba', 'keempat', '2022-06-21 10:39:12', '2022-06-23 00:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` double NOT NULL,
  `type` enum('benefit','cost') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama_kriteria`, `keterangan`, `bobot`, `type`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Kepadatan penduduk', 5, 'benefit', '2022-06-15 00:33:36', '2022-06-21 02:07:27'),
(2, 'C2', 'Pendapatan penduduk perkapita', 4, 'benefit', '2022-06-15 00:34:31', '2022-06-21 02:07:41'),
(3, 'C3', 'Jarak dari pusat kota', 3, 'cost', '2022-06-15 00:35:19', '2022-06-21 02:07:51'),
(4, 'C4', 'Jalan yang sudah diaspal', 4, 'benefit', '2022-06-15 00:37:51', '2022-06-21 10:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2022_06_05_090715_create_alternatif_table', 2),
(4, '2022_06_14_132708_create_alternatif_table', 3),
(5, '2022_06_14_180558_create_kriteria_table', 3),
(6, '2022_06_15_071154_create_kriteria_table', 4),
(7, '2022_06_15_073151_create_kriteria_table', 5),
(8, '2022_06_16_161845_create_nilai_saw_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_saw`
--

CREATE TABLE `nilai_saw` (
  `id` bigint UNSIGNED NOT NULL,
  `alternatif_id` bigint UNSIGNED NOT NULL,
  `kriteria_id` bigint UNSIGNED NOT NULL,
  `nilai` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_saw`
--

INSERT INTO `nilai_saw` (`id`, `alternatif_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`) VALUES
(29, 12, 1, 2, '2022-06-21 10:37:25', '2022-06-21 10:37:25'),
(30, 12, 2, 5, '2022-06-21 10:37:25', '2022-06-21 10:37:25'),
(31, 12, 3, 3, '2022-06-21 10:37:25', '2022-06-21 10:37:25'),
(32, 12, 4, 2, '2022-06-21 10:37:26', '2022-06-21 10:37:26'),
(33, 13, 1, 4, '2022-06-21 10:38:10', '2022-06-21 10:38:10'),
(34, 13, 2, 3, '2022-06-21 10:38:10', '2022-06-21 10:38:10'),
(35, 13, 3, 5, '2022-06-21 10:38:10', '2022-06-21 10:38:10'),
(36, 13, 4, 3, '2022-06-21 10:38:10', '2022-06-21 10:38:10'),
(37, 14, 1, 4, '2022-06-21 10:38:47', '2022-06-21 10:38:47'),
(38, 14, 2, 3, '2022-06-21 10:38:47', '2022-06-21 10:38:47'),
(39, 14, 3, 5, '2022-06-21 10:38:48', '2022-06-21 10:38:48'),
(40, 14, 4, 2, '2022-06-21 10:38:48', '2022-06-21 10:38:48'),
(41, 15, 1, 3, '2022-06-21 10:39:12', '2022-06-21 10:39:12'),
(42, 15, 2, 3, '2022-06-21 10:39:12', '2022-06-21 10:39:12'),
(43, 15, 3, 3, '2022-06-21 10:39:12', '2022-06-21 10:39:12'),
(44, 15, 4, 3, '2022-06-21 10:39:13', '2022-06-21 10:39:13');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin','Petugas') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jamaludin', 'jamal', '$2y$10$ye8.ioQC7GNyrkAwsgjAnuZ0NUM/AUoFBUC72VrQAp7AMsjKgwOmy', 'Admin', 'PBzpubhxzIbpqhpCOg9htJ4spXLxgZ7ZixHkVfTbIbogw1nsSDtDFfutezDX', '2022-06-03 00:38:16', '2022-06-03 00:38:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_saw`
--
ALTER TABLE `nilai_saw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_id` (`alternatif_id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai_saw`
--
ALTER TABLE `nilai_saw`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_saw`
--
ALTER TABLE `nilai_saw`
  ADD CONSTRAINT `alternatif_id` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `kriteria_id` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
