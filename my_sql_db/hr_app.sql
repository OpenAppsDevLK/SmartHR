-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2025 at 10:25 PM
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
-- Database: `hr_app1`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `regions_id` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `regions_id`, `created_at`, `updated_at`) VALUES
(1, 'Sri Lanka', '1', '2024-06-27 03:55:22', '2024-06-27 03:55:22'),
(2, 'India', '2', '2024-06-27 03:55:56', '2024-06-27 03:55:56'),
(3, 'USA', '6', '2024-06-27 03:56:08', '2024-06-28 03:59:51'),
(4, 'UK', '6', '2024-06-27 04:23:41', '2024-06-27 04:23:41'),
(6, 'Canda', '1', '2024-07-01 07:33:38', '2024-07-01 07:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) DEFAULT NULL,
  `manager_id` varchar(255) DEFAULT NULL,
  `locations_id` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `manager_id`, `locations_id`, `created_at`, `updated_at`) VALUES
(1, 'HR Department', '2', '3', '2024-07-21 10:45:50', '2024-07-26 11:38:13'),
(2, 'IT Department', '1', '5', '2024-07-21 10:46:39', '2024-07-26 11:38:28'),
(3, 'Admin Department', '1', '5', '2024-07-21 10:47:20', '2024-07-21 10:47:20'),
(4, 'ABC Dep.', '2', '2', '2024-07-23 11:31:13', '2024-07-23 11:31:13'),
(7, 'Transport Department', '2', '4', '2024-08-07 04:00:09', '2024-08-07 04:00:09'),
(11, 'GGGG', '6', '2', '2024-08-11 04:30:03', '2024-08-11 04:44:41');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `min_salary` varchar(255) DEFAULT NULL,
  `max_salary` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `min_salary`, `max_salary`, `created_at`, `updated_at`) VALUES
(1, 'Web', '2000', '5000', '2024-06-01 07:00:29', '2024-06-02 11:54:15'),
(2, 'Software Developer', '50000', '75000', '2024-06-01 07:02:07', '2024-06-01 07:02:07'),
(3, 'JAVA Devloper', '80000', '100000', '2024-06-02 08:03:29', '2024-06-02 08:03:29'),
(4, 'HR Manager', '25000', '50000', '2024-06-02 08:48:23', '2024-06-02 08:48:23'),
(7, 'Admin Officer', '2500', '50000', '2024-06-03 07:08:10', '2024-06-06 05:00:15'),
(8, 'Enginer', '25000', '50000', '2024-06-22 12:02:08', '2024-06-22 12:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `job_grades`
--

CREATE TABLE `job_grades` (
  `id` int(11) NOT NULL,
  `grade_level` varchar(255) DEFAULT NULL,
  `lowest_sal` varchar(255) DEFAULT NULL,
  `highest_sal` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_grades`
--

INSERT INTO `job_grades` (`id`, `grade_level`, `lowest_sal`, `highest_sal`, `created_at`, `updated_at`) VALUES
(1, 'A', '2000', '5000', '2024-06-22 11:54:16', '2024-06-22 11:54:16'),
(2, 'T5', '115000', '138000', '2024-06-22 11:56:26', '2024-10-24 07:34:08'),
(3, 'T4', '98000', '122000', '2024-06-22 11:59:32', '2024-10-24 07:33:45'),
(4, 'T3', '85000', '107000', '2024-06-22 11:59:44', '2024-10-24 07:33:20'),
(5, 'T2', '68000', '87000', '2024-06-22 11:59:53', '2024-10-24 07:32:58'),
(6, 'T1', '60000', '72000', '2024-06-22 12:00:03', '2024-10-24 07:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

CREATE TABLE `job_history` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `department_id` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_history`
--

INSERT INTO `job_history` (`id`, `employee_id`, `start_date`, `end_date`, `job_id`, `department_id`, `created_at`, `updated_at`) VALUES
(4, 12, '2024-06-01', '2024-06-30', 7, '1', '2024-06-11 05:21:17', '2024-06-11 05:21:17'),
(7, 12, '2024-07-04', '2024-07-22', 2, '2', '2024-06-22 12:03:41', '2024-06-22 12:03:41'),
(9, 13, '2024-10-05', '2024-10-05', 1, '1', '2024-10-05 09:38:04', '2024-10-05 09:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state_provice` varchar(255) DEFAULT NULL,
  `countries_id` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `street_address`, `postal_code`, `city`, `state_provice`, `countries_id`, `created_at`, `updated_at`) VALUES
(2, 'No 10 xxxx', '12500 xxxx', 'Colomboxxx', 'WPxxx', '2', '2024-07-06 06:52:33', '2024-07-13 06:47:34'),
(3, 'Adc Road', '11000', 'afvax', 'WWC', '2', '2024-07-06 06:53:04', '2024-07-06 06:53:04'),
(4, 'acbf Street', '1256652', 'London', 'WEST', '4', '2024-07-06 06:55:55', '2024-07-06 06:55:55'),
(5, 'N128B 219', '1250252', 'Parawater', 'WA2512', '4', '2024-07-07 10:34:54', '2024-07-07 10:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `manager_name` varchar(255) DEFAULT NULL,
  `manager_email` varchar(255) DEFAULT NULL,
  `manager_mobile` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `manager_name`, `manager_email`, `manager_mobile`, `created_at`, `updated_at`) VALUES
(1, 'Dilshan Maduranga', 'dilmax@gmail.com', '0775777695', '2024-07-30 07:11:57', '2024-07-31 09:01:27'),
(2, 'Vipul', 'vipul@gmail.com', '0775777985', '2024-07-30 07:12:28', '2024-07-30 07:12:28'),
(3, 'Nirrmala', 'nirmala@gmail.com', '0775854582', '2024-07-30 07:12:56', '2024-08-07 03:53:09'),
(5, 'Nimal', 'nimal@gmail.com', '07542528523', '2024-08-01 11:41:54', '2024-08-01 11:41:54'),
(6, 'AAAAAA', 'aaaa@gmail.com', '0775777695', '2024-08-11 04:28:44', '2024-08-11 04:28:44');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `number_of_day_work` varchar(255) DEFAULT NULL,
  `bonus` varchar(255) DEFAULT NULL,
  `overtime` varchar(255) DEFAULT NULL,
  `gross_salary` varchar(255) DEFAULT NULL,
  `cash_advance` varchar(255) DEFAULT NULL,
  `late_hours` varchar(255) DEFAULT NULL,
  `absent_days` varchar(255) DEFAULT NULL,
  `ssc_levy` varchar(255) DEFAULT NULL COMMENT 'Social Security Contribution Levy SSCL',
  `total_deductions` varchar(255) DEFAULT NULL,
  `netpay` varchar(255) DEFAULT NULL,
  `payroll_monthly` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `employee_id`, `number_of_day_work`, `bonus`, `overtime`, `gross_salary`, `cash_advance`, `late_hours`, `absent_days`, `ssc_levy`, `total_deductions`, `netpay`, `payroll_monthly`, `created_at`, `updated_at`) VALUES
(2, 15, '3000', '5000', '255', '50000', '5000', '5', '5', '3', '5000', '45000', '450000', '2024-08-27 08:33:13', '2024-09-11 01:52:31'),
(3, 13, '100', '100', '100', '100', '100', '100', '100', '100', '100', '100', '100', '2024-08-27 08:35:10', '2024-08-27 08:35:10'),
(5, 12, '20', '5000', '20', '2500', '5000', '2', '2', '5', '2000', '50000', '52000', '2024-09-14 09:14:14', '2024-09-14 09:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position_name` varchar(255) DEFAULT NULL,
  `daily_rate` varchar(255) DEFAULT NULL,
  `monthly_rate` varchar(255) DEFAULT NULL,
  `working_days_per_month` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `position_name`, `daily_rate`, `monthly_rate`, `working_days_per_month`, `created_at`, `updated_at`) VALUES
(1, 'Position 01', '2500', '3500', '20', '2024-09-24 11:55:10', '2024-09-24 11:55:10'),
(2, 'Senior', '1000', '30000', '20', '2024-09-24 11:55:57', '2024-09-24 11:55:57'),
(3, 'Jonior01', '1000', '1000', '45', '2024-09-24 11:56:20', '2024-09-26 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `regions_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `regions_name`, `created_at`, `updated_at`) VALUES
(1, 'Colombo', '2024-06-24 10:43:29', '2024-06-27 10:43:29'),
(2, 'Matara', '2024-06-24 10:43:29', '2024-06-25 06:47:38'),
(3, 'Panadura', '2024-06-25 06:26:24', '2024-06-25 06:47:25'),
(6, 'Galle2', '2024-10-04 05:43:20', '2024-06-26 05:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `job_id` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `commission_pct` varchar(255) DEFAULT NULL,
  `manager_id` varchar(255) DEFAULT NULL,
  `department_id` varchar(255) DEFAULT NULL,
  `position_id` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_role` tinyint(4) DEFAULT 1 COMMENT '0: Employee\r\n1 HR:',
  `interview` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0: cancle \r\n1: Pending\r\n2: completed ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `phone_number`, `profile_image`, `hire_date`, `job_id`, `salary`, `commission_pct`, `manager_id`, `department_id`, `position_id`, `remember_token`, `is_role`, `interview`, `created_at`, `updated_at`) VALUES
(11, 'DilshanLK', 'Maduranga', 'demo_admin@openapps.dev', NULL, '$2y$12$MaYeLuMdf6g6asWklbKkh.vHopJAVBGajTL58bmbS8rZF2YQ4XvKm', '0773749856', 'g1EJ9qRdEittqAiNqVEIpaMfAnZalf jpg', '2024-05-31', '1', '50000', '5', '1', '1', '2', 'qJLw5R9RZDJvR7gShVoZL4rcyA196VLAAldk7eKaiKo0xGNxzJc7D76OWASU', 1, 1, '2024-05-30 17:09:30', '2024-12-22 10:01:58'),
(12, 'Kamal', 'Kumara', 'kamal123@gmail.com', NULL, '$2y$12$SwagLN.9gagEqC8rb5aW2eyGa4V/pmCx2mOclAbqEk4Ra3Gj0Ryva', '077777777', 'n5PW3eCfLqweZR44AXB9g981753na2.jpg', '2024-06-03', '7', '30000', '5', '1', '1', NULL, 'PeVJSUi7YBTSbU5CbvMJFkg85Rlt9dNYgD6WgESnD5d6pEpmBYFNwEJrwTAR', 0, 1, '2024-06-02 20:09:09', '2024-10-24 00:47:30'),
(13, 'Nikil', 'Diyon', 'nk@gmail.com', NULL, NULL, '07522626626', 'fkp4dJKCgODtilr5irBwiOGgA7YHQ9.jpg', '2024-06-03', '7', '25000', '5', '2', '2', NULL, NULL, 0, 1, '2024-06-03 00:43:29', '2024-08-11 21:16:38'),
(15, 'Demo', 'User', 'dom@gmail.com', NULL, NULL, '411454', 'LHZgJ3Nt20Byh1ow0s2ZvDkrMQTqhi.jpg', '2024-08-12', '2', '25000', '5', '1', '2', '3', NULL, 0, 1, '2024-08-11 18:20:57', '2024-08-11 21:13:37'),
(16, 'Demo2', 'User', 'demo2@gmail.com', NULL, NULL, '51541545', 't5fQb8DlEuu6ivBuMIKgXfQMZndmJe.jpg', '2024-08-12', '3', '100000', '2', '2', '2', NULL, NULL, 0, 1, '2024-08-11 18:43:06', '2024-08-11 18:43:06'),
(17, 'Demo3', 'User', 'saas@sscs.com', NULL, NULL, '515615156', 'vg185LAsCgyYH2PVQ7IRCr16nNTleI.jpg', '2024-08-12', '4', '25000', '5', '3', '1', NULL, NULL, 0, 1, '2024-08-11 18:51:18', '2024-08-11 18:51:18'),
(19, 'DemoEMP-New', 'sdsdvsdv', 'emp@gmail.com', NULL, '$2y$12$w.GoIkDcolQdiGi0rt3.COyfdPGPdkXL73k1TL1OXpzyZilnx/Qqe', '527272', 'UAREaevqH4uPTJva2w9DUGBBhdVsxV jpg', '2024-10-03', '1', '25000', '5', '1', '1', '3', 'PCZU6BlboUCwabmjCyNJGWQg8GQCxfe97nWPikzds6Hmmk6hoaZi7H9YkcZ2', 0, 0, '2024-08-16 00:18:33', '2024-10-20 12:05:56'),
(21, 'acfasa', 'acascascas', 'casc@csccs.com', NULL, '$2y$12$QKNBPeoyfYobGF7dTlMXuOXBH5A5FJKXdQ5ErFMPzKJJueCNRtglO', '89948989', '9xlhjOI8D18kik2MCzBR2J1faOdpVt.jpg', '2024-10-13', '2', '25000', '25', '1', '1', '1', 'DkslodEpHUnyMUi9jv7quSCuVTJlBSF86MsKJZjPhDINLQK6rVt0AJi3JVvI', 0, 2, '2024-10-13 12:31:47', '2024-10-20 12:04:44'),
(23, 'aaaaaaa', 'wwwwwww', 'aaaa@wwwww.com', NULL, '$2y$12$HkYZsUtvTeMfQZpmy6nJOOXfXkw08fWvnC2XN0xBxK3iy8exbjn0u', '51515151', 'iVdw4n0MpgBtMAdel8A5L1axnCrNFF.jpg', '2024-10-22', '2', '2500', '3', '1', '1', '1', 'dfeZLnd3tKaqxpj1RWlkwZrUbnBuWuY4ayQCcEfs57GsdbUJKOT0acJvVnrU', 0, 1, '2024-10-21 23:52:46', '2024-10-21 23:52:46'),
(25, 'John', 'Mac', 'mman949@gmail.com', NULL, '$2y$12$rZFIuMgZm5NZv8HZ7RtIueW5A0TADAJM3ilT72Fky1RktPgvtnAQm', '07484554', 'Xxg0hYlgcILoGT5BglXPl1bWQuC3gy.jpg', '2024-10-22', '2', '25000', '5', '1', '1', '1', 'QBA1Ttv1su0mlREsug0RkeRQ9IkxzpAxR06f53TVNjs8AZhWXfCtZytoCimG', 0, 2, '2024-10-21 23:59:34', '2024-12-22 10:10:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_grades`
--
ALTER TABLE `job_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_history`
--
ALTER TABLE `job_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_grades`
--
ALTER TABLE `job_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_history`
--
ALTER TABLE `job_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
