-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2026 at 01:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitra_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_registrations`
--

CREATE TABLE `exam_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('seminar_proposal','sidang_skripsi') NOT NULL,
  `document_path` varchar(255) DEFAULT NULL,
  `status` enum('diajukan','diverifikasi','dijadwalkan','ditolak','selesai') NOT NULL DEFAULT 'diajukan',
  `scheduled_at` datetime DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_registrations`
--

INSERT INTO `exam_registrations` (`id`, `student_id`, `type`, `document_path`, `status`, `scheduled_at`, `room`, `notes`, `created_at`, `updated_at`) VALUES
(1, 3, 'seminar_proposal', NULL, 'dijadwalkan', '2026-06-13 08:23:38', 'Ruang Sidang FT', NULL, '2026-06-06 00:23:38', '2026-06-06 00:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guidance_sessions`
--

CREATE TABLE `guidance_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('proposal','skripsi') NOT NULL DEFAULT 'proposal',
  `session_date` date NOT NULL,
  `chapter` varchar(255) DEFAULT NULL,
  `student_note` longtext NOT NULL,
  `supervisor_note` longtext DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `status` enum('menunggu','direview','selesai','revisi') NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guidance_sessions`
--

INSERT INTO `guidance_sessions` (`id`, `student_id`, `supervisor_id`, `type`, `session_date`, `chapter`, `student_note`, `supervisor_note`, `file_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'proposal', '2026-06-06', 'BAB I', 'Konsultasi latar belakang dan rumusan masalah.', 'Perbaiki identifikasi masalah dan batasan sistem.', NULL, 'revisi', '2026-06-06 00:23:38', '2026-06-06 00:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_01_000001_create_thesis_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1YQ5WrwPZnBZ2ttkDzXAicmxxzextSGKb1MDzEej', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibUVvb0NDdkdNNG02SDVNN2VCMzgzVXI2RkdmWk9CeXpIV0Mya2FTTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1780701898);

-- --------------------------------------------------------

--
-- Table structure for table `thesis_archives`
--

CREATE TABLE `thesis_archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` varchar(4) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `abstract_path` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thesis_archives`
--

INSERT INTO `thesis_archives` (`id`, `student_id`, `title`, `year`, `keywords`, `abstract_path`, `file_path`, `is_public`, `created_at`, `updated_at`) VALUES
(1, 3, 'Contoh Arsip Skripsi Teknik Informatika', '2026', 'skripsi, bimbingan, monitoring', NULL, 'archives/contoh.pdf', 1, '2026-06-06 00:23:38', '2026-06-06 00:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `title_submissions`
--

CREATE TABLE `title_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `background` text DEFAULT NULL,
  `status` enum('diajukan','disetujui','ditolak','revisi') NOT NULL DEFAULT 'diajukan',
  `notes` text DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `title_submissions`
--

INSERT INTO `title_submissions` (`id`, `student_id`, `supervisor_id`, `title`, `background`, `status`, `notes`, `approved_at`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Sistem Informasi Manajemen Skripsi dan Bimbingan Berbasis Web', 'Pengajuan judul terintegrasi dengan proses bimbingan, pendaftaran sidang, monitoring, dan arsip digital.', 'disetujui', NULL, '2026-06-06 00:23:38', '2026-06-06 00:23:38', '2026-06-06 00:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('mahasiswa','dosen','jurusan') NOT NULL DEFAULT 'mahasiswa',
  `identifier` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `identifier`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Jurusan', 'jurusan@unmus.ac.id', '$2y$12$rjKXeAqWxBuHiqgJZwSQ9.B5Nw5fj03qJF8igu3yyzK8TaANnxZDe', 'jurusan', NULL, NULL, NULL, '2026-06-06 00:23:38', '2026-06-06 00:23:38'),
(2, 'Dr. Dosen Pembimbing', 'dosen@unmus.ac.id', '$2y$12$hyf36MN.Jcvna3kY4nM.pO5pM8X3jjS5tc.swrkAoQYxOlOpMJnSC', 'dosen', 'NIDN001', NULL, NULL, '2026-06-06 00:23:38', '2026-06-06 00:23:38'),
(3, 'Vitra Mahasiswa', 'mahasiswa@unmus.ac.id', '$2y$12$inRbO3JAWQav5H8IGRc0je.mX2FAbupu17ZXs2JV9bx4LreIvFKbG', 'mahasiswa', '2026001', NULL, NULL, '2026-06-06 00:23:38', '2026-06-06 00:23:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `exam_registrations`
--
ALTER TABLE `exam_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_registrations_student_id_foreign` (`student_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guidance_sessions`
--
ALTER TABLE `guidance_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guidance_sessions_student_id_foreign` (`student_id`),
  ADD KEY `guidance_sessions_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `thesis_archives`
--
ALTER TABLE `thesis_archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thesis_archives_student_id_foreign` (`student_id`);

--
-- Indexes for table `title_submissions`
--
ALTER TABLE `title_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_submissions_student_id_foreign` (`student_id`),
  ADD KEY `title_submissions_supervisor_id_foreign` (`supervisor_id`);

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
-- AUTO_INCREMENT for table `exam_registrations`
--
ALTER TABLE `exam_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guidance_sessions`
--
ALTER TABLE `guidance_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thesis_archives`
--
ALTER TABLE `thesis_archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `title_submissions`
--
ALTER TABLE `title_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_registrations`
--
ALTER TABLE `exam_registrations`
  ADD CONSTRAINT `exam_registrations_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `guidance_sessions`
--
ALTER TABLE `guidance_sessions`
  ADD CONSTRAINT `guidance_sessions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `guidance_sessions_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `thesis_archives`
--
ALTER TABLE `thesis_archives`
  ADD CONSTRAINT `thesis_archives_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `title_submissions`
--
ALTER TABLE `title_submissions`
  ADD CONSTRAINT `title_submissions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `title_submissions_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
