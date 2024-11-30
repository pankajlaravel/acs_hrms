-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 08:13 AM
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
-- Database: `laravel_asc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstName`, `lastName`, `picture`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', NULL, 'admin', 'admin@gmail.com', NULL, '$2y$12$G9y6Yc1KKqbvZhTxNVUWgOZfuaquAPomyG6OiwhWNoAWMBRF.TO3a', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `check_in` timestamp NULL DEFAULT NULL,
  `check_out` timestamp NULL DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,0) DEFAULT NULL,
  `longitude` decimal(10,0) DEFAULT NULL,
  `status` varchar(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `check_in`, `check_out`, `location`, `latitude`, `longitude`, `status`, `created_at`, `updated_at`) VALUES
(42, 11, '2024-11-25 06:01:49', NULL, NULL, NULL, NULL, 'present', '2024-11-25 06:01:49', '2024-11-25 06:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `short_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'State Bank of India', 'PNB', 0, '2024-11-11 09:44:53', '2024-11-11 09:44:53'),
(2, 'Panjab National Bank', 'PNB', 0, '2024-11-11 09:45:49', '2024-11-11 10:55:03'),
(3, 'HDFC Bank', 'HDFC', 0, '2024-11-11 09:47:20', '2024-11-11 10:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `ifsc` varchar(55) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `bank_id`, `branch_name`, `ifsc`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Meerut', 'SBIN0011214', 0, '2024-11-11 11:40:18', '2024-11-11 12:07:22'),
(2, 2, 'Meerut', 'PUNB0671700', 0, '2024-11-11 11:41:11', '2024-11-11 11:41:11'),
(3, 3, 'Delhi', 'HDFC0002649', 0, '2024-11-11 11:48:59', '2024-11-11 11:48:59'),
(4, 2, 'Noida', 'PUNB0671701', 0, '2024-11-12 10:16:20', '2024-11-12 10:16:20'),
(5, 2, 'Delhi', 'PUNB0671702', 0, '2024-11-12 10:16:55', '2024-11-12 10:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Division', '0', '2024-11-09 10:28:01', '2024-11-09 10:28:01'),
(2, 'Grade', '0', '2024-11-09 10:29:48', '2024-11-09 10:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstName`, `lastName`, `client_id`, `phone`, `company_name`, `address`, `picture`, `email`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(2, 'Subhash', 'Thakur', 'CLT-139327', '9918509296', 'ACS', 'Noida', '1728366597_WhatsApp Image 2024-09-21 at 12.40.12 PM.jpeg', 'subhashthakuracs@gmail.com', NULL, '2024-10-07 05:58:37', '2024-10-08 00:19:57'),
(4, 'Pankaj', 'Kohli', 'CLT-048886', '1234567890', 'ACS Pvt. Ltd', 'Noida', '1730699201_WhatsApp Image 2024-09-15 at 1.22.21 PM.jpeg', 'pankaj@gamil.com', NULL, '2024-10-07 08:52:32', '2024-11-04 00:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'HR Department', '2024-10-06 23:24:25', '2024-10-06 23:24:25'),
(2, 'Web Development', '2024-10-06 23:26:05', '2024-10-06 23:26:05'),
(3, 'Software Development', '2024-10-06 23:26:28', '2024-10-06 23:33:49'),
(5, 'Sals 2', '2024-10-08 20:39:00', '2024-10-31 00:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `department`, `created_at`, `updated_at`) VALUES
(1, 'Laravel Developer', '2', '2024-10-07 00:37:47', '2024-10-07 01:53:11'),
(2, 'HR', '1', '2024-10-07 01:10:56', '2024-10-07 01:10:56'),
(4, 'Python', '3', '2024-10-07 01:53:31', '2024-10-07 01:53:31'),
(5, 'React JS', '2', '2024-10-07 01:53:56', '2024-10-31 01:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `name` varchar(55) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `salary` decimal(10,0) DEFAULT NULL,
  `bank_account_id` varchar(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_banks`
--

CREATE TABLE `emp_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(55) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `bank_branch_id` int(11) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_banks`
--

INSERT INTO `emp_banks` (`id`, `employee_id`, `bank_id`, `bank_branch_id`, `account_no`, `account_type`, `payment_type`, `account_holder_name`, `created_at`, `updated_at`) VALUES
(1, '46', 1, 2, '1234567890', 'Saving', 'Bank', 'Pankaj', '2024-11-12 07:11:15', '2024-11-12 07:11:15'),
(3, 'EMP-799878', 3, 3, '1234567890', 'Saving', 'Bank', 'Pankaj Kohli', '2024-11-12 09:50:19', '2024-11-28 19:34:19'),
(7, 'ACS-EMP-IN-24-225', 1, 1, '1234567890', '1234567890', 'Bank', 'Pankaj', '2024-11-28 20:25:36', '2024-11-28 20:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `emp_docs`
--

CREATE TABLE `emp_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `doc_name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `isActive` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_docs`
--

INSERT INTO `emp_docs` (`id`, `employee_id`, `doc_name`, `category`, `description`, `file`, `isActive`, `created_at`, `updated_at`) VALUES
(13, 'ACS-EMP-IN-24-225', 'Aadhar Card', 'Aadhar', 'Neeraj Aadhar Card', 'documents/KFChNwvAPaUTEd10K0ATc4C3VYfi25wYzWZuBKcw.jpg', '1', '2024-11-15 11:04:52', '2024-11-18 05:23:12'),
(14, 'ACS-EMP-IN-24-225', 'Pan Card', 'Pan', 'jfjhf', 'documents/h0eHyVcBVWxwIAdUEt3tDxu1ZHziodRNbOdaNZdc.jpg', '0', '2024-11-15 11:05:18', '2024-11-15 11:11:27'),
(18, 'EMP-429812', 'Aadhar Card', 'Aadhar', 'A', 'documents/1731909815_Adhaar Front.pdf', '1', '2024-11-18 06:03:35', '2024-11-18 06:03:35'),
(19, 'EMP-799878', 'Aadhar Card', 'Aadhar', 'My Aadhar', 'documents/1732831573_1732786710_avatar-19.jpg', '1', '2024-11-28 22:06:13', '2024-11-28 22:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `e_s_i_s`
--

CREATE TABLE `e_s_i_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `esi_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e_s_i_s`
--

INSERT INTO `e_s_i_s` (`id`, `employee_id`, `esi_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ACS-EMP-IN-24-225', '11000000000000002', '0', '2024-11-13 07:06:18', '2024-11-14 05:03:14'),
(3, 'EMP-799878', '11000000000000004', '0', '2024-11-13 09:04:21', '2024-11-28 18:53:24');

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
-- Table structure for table `families`
--

CREATE TABLE `families` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `address_same_as_emp` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `families`
--

INSERT INTO `families` (`id`, `emp_id`, `name`, `profession`, `dob`, `nationality`, `gender`, `remarks`, `blood_group`, `relation`, `address_same_as_emp`, `address`, `pin`, `phone`, `email`, `city`, `state`, `country`, `created_at`, `updated_at`) VALUES
(1, 'ACS-EMP-IN-24-225', 'Jiya Lal', 'Gardner', '2024-10-31', 'Indian', 'Male', 'no', 'A +ve', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-30 07:46:13', '2024-10-30 07:46:13'),
(2, 'ACS-EMP-IN-24-225', 'Pankaj', 'Web Developer', '2000-09-01', 'Indian', 'Male', 'NO', 'B +ve', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-30 08:02:58', '2024-10-30 08:02:58'),
(3, 'EMP-799878', 'Neeraj', 'Student', '2024-10-03', 'Indian', 'Male', 'NO', 'AB +ve', 'Brother', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-30 08:46:17', '2024-10-30 08:46:17'),
(4, 'EMP-799878', 'Jiya Lal', 'Gardner', '2024-06-04', 'Indian', 'Male', 'NULL', 'B -ve', 'Father', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-30 08:55:23', '2024-10-30 08:55:23'),
(5, 'EMP-799878', 'Aarti', 'Student', '2024-10-07', 'Indian', 'Female', 'NO', 'O -ve', 'Sister', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-30 09:02:07', '2024-10-30 09:02:07'),
(6, NULL, 'XXY', 'Teacher', '2024-10-23', 'Indian', 'Male', 'NULL', 'AB -ve', 'Uncle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-31 02:48:14', '2024-10-31 02:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `goal_type_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `target_achievement` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `goal_type_id`, `subject`, `target_achievement`, `start_date`, `end_date`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 'Sales Mans For All Product', '2 Year', '2024-10-08', '2024-10-24', 'BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32', 0, '2024-10-11 04:52:27', '2024-10-11 22:29:29'),
(3, 4, 'Laravel', 'One Year', '2024-10-18', '2024-10-25', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32', 0, '2024-10-11 22:20:16', '2024-11-02 01:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `goal_types`
--

CREATE TABLE `goal_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goal_types`
--

INSERT INTO `goal_types` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Laravel', 'I want to become a wed developer', 0, '2024-10-11 01:33:15', '2024-10-11 03:46:33'),
(3, 'PHP Developer', 'There seems to be a minor issue with the where clause in your query. The where method is being used incorrectly to attempt ordering the results, but where is for filtering, not ordering.', 0, '2024-10-11 04:18:01', '2024-10-11 04:18:01'),
(4, 'Sales Exicutive', 'The where method is being used incorrectly to attempt ordering the results, but where is for filtering, not ordering.', 0, '2024-10-11 04:18:26', '2024-11-02 01:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holiday_name` varchar(255) DEFAULT NULL,
  `holiday_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `holiday_name`, `holiday_date`, `created_at`, `updated_at`) VALUES
(3, 'Mela 2', '2024-10-21', '2024-10-06 11:23:24', '2024-10-06 23:04:04'),
(4, 'Dashera', '2024-10-06', '2024-10-06 11:36:20', '2024-10-06 11:36:20'),
(5, 'Durga Puja', '2024-10-10', '2024-10-06 12:12:37', '2024-10-06 12:12:37'),
(6, 'Demo', '2024-10-17', '2024-10-06 23:03:03', '2024-10-06 23:03:03'),
(7, 'Test', '2024-10-16', '2024-10-06 23:04:35', '2024-10-06 23:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(55) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `project_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `client_address` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `invoice_date` varchar(255) DEFAULT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unit_cost` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `tax_percentage` varchar(255) DEFAULT NULL,
  `grand_total` varchar(255) DEFAULT NULL,
  `other_info` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_id`, `client_id`, `project_id`, `email`, `tax`, `client_address`, `billing_address`, `invoice_date`, `due_date`, `item`, `description`, `unit_cost`, `qty`, `amount`, `total_amount`, `discount`, `tax_percentage`, `grand_total`, `other_info`, `status`, `created_at`, `updated_at`) VALUES
(8, '#INV-0147', '2', 'Select Project', 'subhashthakuracs@gmail.com', '1', 'Noida', 'Meerut', '2024-10-23', '2024-10-25', '[null,null,null,null,null]', '[null,null,null,null,null]', '[\"100\",\"100\",\"100\",\"100\",\"100\"]', '[\"1\",\"1\",\"1\",\"1\",\"1\"]', '[\"100.00\",\"100.00\",\"100.00\",\"100.00\",\"100.00\"]', '500.00', NULL, NULL, '590.00', 'let amounts = [100, 200, 150]; // Example amount array let quantities = [2, 3, 5];    // Example quantity array let discounts = [10, 5, 0];    // Discount in percentage for each item let  totalTax.toFixed(2)); return { totalAmount: totalAmount.to', 0, '2024-10-10 11:44:19', '2024-10-10 11:44:19'),
(9, '#INV-0410', '2', '6', 'subhashthakuracs@gmail.com', '4', 'Noida', 'Meerut', '2024-10-24', '2024-11-01', '[\"Mouse\",null,null,null]', '[\"Best\",null,null,null]', '[\"100\",null,null,null]', '[\"1\",null,null,null]', '[\"100.00\",null,null,null]', '100.00', '0', '12.00', '112.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 0, '2024-10-10 12:32:35', '2024-10-10 12:53:47'),
(10, '#INV-6418', '4', '7', 'pankaj@gamil.com', '4', 'Noida', 'Module', '2024-10-18', '2024-10-16', '[\"Laravel\",\"CRM\"]', '[\"CRUD\",\"Create page dynamic\"]', '[\"1000\",\"5000\"]', '[\"1\",\"1\"]', '[\"1000.00\",\"5000.00\"]', '6000.00', NULL, '12.00', '6720.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 0, '2024-10-10 12:58:15', '2024-10-10 12:58:15'),
(11, '#INV-0757', '2', '7', 'subhashthakuracs@gmail.com', '4', 'Noida', 'hhgjh', '2024-10-17', '2024-10-18', '[null,null,null]', '[\"CRUD\",\"Create page dynamic\",null]', '[\"100\",\"100\",null]', '[\"1\",\"2\",null]', '[\"100.00\",\"200.00\",null]', '300.00', NULL, '12.00', '336.00', NULL, 0, '2024-10-10 13:03:26', '2024-10-10 23:10:47'),
(12, '#INV-9325', '2', '7', 'subhashthakuracs@gmail.com', '1', 'Noida', 'Demo', '2024-10-11', '2024-10-30', '[\"CRM\",\"Laravel\"]', '[\"CRUD\",\"CRUD\"]', '[\"100\",\"100\"]', '[\"1\",\"2\"]', '[\"100.00\",\"200.00\"]', '300.00', '4', '18.00', '350.00', 'demo', 0, '2024-10-11 00:48:00', '2024-10-11 00:48:00'),
(13, '#INV-2408', '4', '6', 'pankaj@gamil.com', '4', 'Noida', 'sdasdas', '2024-10-02', '2024-10-16', '[\"Mouse\",null]', '[\"Desing\",null]', '[\"100\",null]', '[\"1\",null]', '[\"100.00\",null]', '100.00', NULL, '12.00', '112.00', 'Demo', 1, '2024-10-13 02:57:59', '2024-10-13 03:08:58'),
(14, '#INV-7862', '2', '7', 'subhashthakuracs@gmail.com', '2', 'Noida', 'dsfdf', '2024-10-02', '2024-10-10', '[\"Laravel\",null]', '[\"Create page dynamic\",null]', '[\"5000\",null]', '[\"2\",null]', '[\"10000.00\",null]', '10000.00', NULL, '5.00', '10500.00', 'dsfsdf', 1, '2024-10-13 03:02:12', '2024-10-13 03:08:31'),
(15, '#INV-1968', '4', '7', 'pankaj@gamil.com', '2', 'Noida', 'vbg', '2024-11-06', '2024-10-31', '[\"CRM\",\"HTMl\"]', '[\"Desing New\",\"CRUD\"]', '[\"100\",\"1000\"]', '[\"1\",\"1\"]', '[\"100.00\",\"1000.00\"]', '1100.00', NULL, '5.00', '1155.00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essen', 0, '2024-10-13 03:04:25', '2024-10-13 22:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(55) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `project` varchar(255) DEFAULT NULL,
  `assigned_staff` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `firstName`, `lastName`, `email`, `phone`, `project`, `assigned_staff`, `picture`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Subhash', 'Thakur', 'subhash@gmail.com', '1234567890', NULL, NULL, '1728378190_images.png', '0', '2024-10-08 03:33:10', '2024-10-08 03:33:10'),
(6, 'Davahs', 'Kumar', 'davash@gmail.com', '0987654321', NULL, NULL, '1728390590_profile_img.png', '0', '2024-10-08 06:59:50', '2024-10-08 06:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `emp_office_id` varchar(55) DEFAULT NULL,
  `leave_type_id` varchar(255) DEFAULT NULL,
  `leave_duration` varchar(55) DEFAULT NULL,
  `leave_from` date DEFAULT NULL,
  `leave_to` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `leave_status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_id`, `emp_office_id`, `leave_type_id`, `leave_duration`, `leave_from`, `leave_to`, `description`, `leave_status`, `created_at`, `updated_at`) VALUES
(1, '11', 'EMP-799878', '2', NULL, '2024-11-21', '2024-11-23', 'NO', 'approval', '2024-11-21 07:29:37', '2024-11-21 11:02:49'),
(2, '11', 'EMP-799878', '2', NULL, '2024-11-21', '2024-11-22', 'I have some personal work', 'approval', '2024-11-21 11:05:51', '2024-11-21 11:07:19'),
(3, '11', 'EMP-799878', '5', NULL, '2024-11-21', NULL, 'dd', 'pending', '2024-11-21 11:37:51', '2024-11-21 11:37:51'),
(4, '11', 'EMP-799878', '4', 'one_day', '2024-11-23', NULL, 'dd', 'pending', '2024-11-21 11:40:25', '2024-11-21 12:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) DEFAULT NULL,
  `code` varchar(25) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `type_name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Loss Of Pay', 'LOP w', '0', '2024-11-20 12:31:23', '2024-11-21 06:09:49'),
(2, 'Casual Leave', 'CL', '0', '2024-11-21 05:00:47', '2024-11-21 05:00:47'),
(3, 'Comp-off', 'COF', '0', '2024-11-21 05:01:20', '2024-11-21 05:01:20'),
(4, 'Earned Leave', 'EL', '0', '2024-11-21 05:01:49', '2024-11-21 05:01:49'),
(5, 'Work From Home', 'WFH', '0', '2024-11-21 05:02:14', '2024-11-21 05:02:14'),
(6, 'Restricted Holiday', 'RH', '0', '2024-11-21 05:02:39', '2024-11-21 05:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `range` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_05_135620_create_admins_table', 2),
(6, '2014_10_12_200000_add_two_factor_columns_to_users_table', 3),
(7, '2024_10_06_160553_create_holidays_table', 3),
(8, '2024_10_07_041157_create_departments_table', 4),
(9, '2024_10_07_051225_create_designations_table', 5),
(10, '2024_10_07_083616_create_overtimes_table', 6),
(11, '2024_10_07_102806_create_clients_table', 7),
(12, '2024_10_08_060454_create_leads_table', 8),
(13, '2024_10_08_090730_create_projects_table', 9),
(14, '2024_10_08_165256_create_salaries_table', 10),
(15, '2024_10_09_110425_create_settings_table', 11),
(16, '2024_10_09_134521_create_invoices_table', 12),
(17, '2024_10_10_070524_create_taxes_table', 13),
(19, '2024_10_11_062408_create_goal_types_table', 15),
(20, '2024_10_11_062756_create_goals_table', 16),
(21, '2024_10_12_041100_create_promotes_table', 17),
(22, '2024_10_12_080336_create_training_types_table', 18),
(23, '2024_10_12_080344_create_trainings_table', 18),
(24, '2024_10_12_080945_create_trainers_table', 19),
(27, '2024_10_13_042810_create_terminations_table', 20),
(28, '2024_10_13_042827_create_resignations_table', 20),
(29, '2024_10_17_092332_create_tasks_table', 21),
(30, '2024_10_17_110045_create_employees_table', 22),
(31, '2024_10_30_091408_create_families_table', 22),
(33, '2024_11_03_153934_create_attendances_table', 23),
(34, '2024_11_04_100124_create_payrolls_table', 24),
(35, '2024_11_05_050418_create_locations_table', 25),
(36, '2024_11_09_153649_create_categories_table', 26),
(38, '2024_11_11_143743_create_banks_table', 27),
(39, '2024_11_11_145221_create_branches_table', 28),
(40, '2024_11_12_110027_create_emp_banks_table', 29),
(41, '2024_11_13_102357_create_e_s_i_s_table', 30),
(43, '2024_11_13_145135_create_p_f_s_table', 31),
(44, '2024_11_14_124652_create_emp_docs_table', 32),
(45, '2024_11_18_120233_create_previous_employments_table', 33),
(46, '2024_11_20_163442_create_leave_types_table', 34),
(47, '2024_11_21_120009_create_leaves_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `overtimes`
--

CREATE TABLE `overtimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `working_hours` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `overtimes`
--

INSERT INTO `overtimes` (`id`, `emp_id`, `date`, `working_hours`, `description`, `created_at`, `updated_at`) VALUES
(1, '15', '2024-10-12', '2', 'Laravel 5', '2024-10-07 04:09:17', '2024-10-09 04:31:55'),
(3, '10', '2024-10-16', '10', 'Payton', '2024-10-07 04:56:05', '2024-10-07 04:56:19'),
(4, '11', '2024-10-17', '10', 'Work', '2024-10-31 01:24:09', '2024-10-31 01:24:09'),
(5, '7', '2024-10-22', '10', 'Demo update', '2024-10-31 01:31:05', '2024-10-31 01:34:46'),
(6, '47', '18-10-2024', '4', 'demo', '2024-10-31 01:52:59', '2024-10-31 01:52:59');

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
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `allowances` decimal(10,2) DEFAULT NULL,
  `deductions` decimal(10,2) DEFAULT NULL,
  `net_salary` decimal(10,2) NOT NULL,
  `pay_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`id`, `employee_id`, `basic_salary`, `allowances`, `deductions`, `net_salary`, `pay_date`, `created_at`, `updated_at`) VALUES
(1, 11, 3.00, 3.00, 3.00, 3.00, '2024-11-04', '2024-11-04 04:45:39', '2024-11-04 04:45:39'),
(2, 11, 2.00, 2.00, 2.00, 2.00, '2024-11-04', '2024-11-04 04:46:59', '2024-11-04 04:46:59');

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
-- Table structure for table `previous_employments`
--

CREATE TABLE `previous_employments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(25) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `designation_id` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `relevant_experience_in_year` varchar(255) DEFAULT NULL,
  `relevant_experience_in_month` varchar(255) DEFAULT NULL,
  `company_address` text DEFAULT NULL,
  `nature_of_duties` text DEFAULT NULL,
  `leaving_reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `previous_employments`
--

INSERT INTO `previous_employments` (`id`, `employee_id`, `company_name`, `designation_id`, `from_date`, `to_date`, `relevant_experience_in_year`, `relevant_experience_in_month`, `company_address`, `nature_of_duties`, `leaving_reason`, `created_at`, `updated_at`) VALUES
(6, 'EMP-799878', 'Spysr', '1', '2024-05-15', '2024-09-15', '5', '2', 'Noida Sector-62, Noida One Building update', '15 Days update', 'No Project', '2024-11-19 14:47:17', '2024-11-29 06:00:27'),
(7, 'EMP-799878', 'Migister Tech', '1', '2022-06-01', '2024-04-15', '2', '1', 'Mangal Panday Nagar, Meerut', 'None', 'Personal', '2024-11-19 15:04:51', '2024-11-19 15:04:51'),
(10, 'ACS-EMP-IN-24-225', 'Asv Consulting Services Pvt Ltd', '5', '2024-11-20', '2024-11-23', '2', '2', 'Meerut', '20 Days', 'Personal Reason', '2024-11-19 15:55:03', '2024-11-29 06:02:00'),
(15, 'ACS-EMP-IN-24-226', 'Asv Consulting Services Pvt Ltd', '5', '2024-11-12', '2024-11-29', '1', '1', 'adasd', 'asdasd', 'asdad', '2024-11-19 16:08:09', '2024-11-19 16:08:09'),
(16, 'ACS-EMP-IN-24-226', 'ACS asdas', '2', '2024-11-14', '2024-11-30', '1122', '12', 'asdasd', 'asdas', 'sadad', '2024-11-19 16:10:09', '2024-11-19 16:10:09'),
(18, 'EMP-429812', 'Asv Consulting Services Pvt Ltd', '5', '2024-11-20', '2024-11-30', '3', '2', 'jbnjkb', 'jknj', 'jnj', '2024-11-19 16:13:52', '2024-11-19 16:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `project_id` varchar(55) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `rate_type` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `lead_id` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_id`, `client_id`, `start_date`, `end_date`, `rate`, `rate_type`, `priority`, `lead_id`, `description`, `picture`, `created_at`, `updated_at`) VALUES
(6, 'Hospital Administration', 'PRO-593945', '4', '2024-10-05', '2024-10-31', '1000', 'Fixed', 'High', '6', 'sdfsf', '1728461031_images.png', '2024-10-09 02:33:51', '2024-10-09 04:09:34'),
(7, 'Office Management E-com', 'PRO-387540', '2', '2024-10-09', '2024-10-09', '2000', 'Fixed', 'Low', '6', 'aasdasd', '1728465815_WhatsApp Image 2024-09-21 at 12.40.12 PM.jpeg', '2024-10-09 03:53:35', '2024-10-09 03:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `promotes`
--

CREATE TABLE `promotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `promotion_for` varchar(255) DEFAULT NULL,
  `promotion_from` varchar(255) NOT NULL,
  `promotion_to` varchar(255) NOT NULL,
  `promotion_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotes`
--

INSERT INTO `promotes` (`id`, `emp_id`, `promotion_for`, `promotion_from`, `promotion_to`, `promotion_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 11, 'Dedicated Person', 'Laravel Developer', '2', '15-10-2024', '1', '2024-10-12 01:06:45', '2024-10-12 02:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `p_f_s`
--

CREATE TABLE `p_f_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `uan` varchar(255) DEFAULT NULL,
  `pf_number` varchar(255) DEFAULT NULL,
  `pf_join_date` varchar(255) DEFAULT NULL,
  `family_pf_number` varchar(255) DEFAULT NULL,
  `exits_eps` varchar(255) DEFAULT NULL,
  `allow_eps` varchar(255) DEFAULT NULL,
  `allow_epf` varchar(255) DEFAULT NULL,
  `document_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_f_s`
--

INSERT INTO `p_f_s` (`id`, `employee_id`, `uan`, `pf_number`, `pf_join_date`, `family_pf_number`, `exits_eps`, `allow_eps`, `allow_epf`, `document_type`, `created_at`, `updated_at`) VALUES
(1, 'ACS-EMP-IN-24-225', '11000000000000001', '11000000000000002', '2024-11-13', '11000000000000003', 'true', 'false', 'false', NULL, '2024-11-13 11:11:14', '2024-11-14 05:13:05'),
(2, 'EMP-799878', '11000000000000001', '11000000000000002', '2024-11-29', '11000000000000003', 'false', 'false', 'true', NULL, '2024-11-28 18:54:53', '2024-11-28 18:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `resignations`
--

CREATE TABLE `resignations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `notice_date` varchar(255) DEFAULT NULL,
  `resignation_date` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resignations`
--

INSERT INTO `resignations` (`id`, `emp_id`, `notice_date`, `resignation_date`, `reason`, `created_at`, `updated_at`) VALUES
(2, 18, '2024-10-19', '2024-10-29', 'Class names for input fields: Ensured the correct classes are used for inputs that trigger the calculateTotal function.\r\nAJAX error handling: Added error handling for AJAX calls to alert the user in case of a failure.\r\nRow addition and removal: Updated the total when a row is removed to keep the calculation accurate.\r\nUpdated row classes: Each row now has a common class item-row for better targeting when calculating totals.', '2024-10-12 23:50:27', '2024-10-13 01:05:47'),
(4, 11, '2024-11-15', '2024-11-15', 'test', '2024-11-02 02:18:25', '2024-11-02 02:18:25'),
(5, 7, '2024-11-06', '2024-11-19', 'hghj', '2024-11-02 02:23:24', '2024-11-02 02:23:24'),
(6, 47, '2024-11-30', '2024-12-06', 'bvbx', '2024-11-15 11:34:23', '2024-11-15 11:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(55) DEFAULT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `net_salary` varchar(255) DEFAULT NULL,
  `basic_salary` varchar(255) DEFAULT NULL,
  `tds` varchar(255) DEFAULT NULL,
  `da` varchar(255) DEFAULT NULL,
  `esi` varchar(255) DEFAULT NULL,
  `hra` varchar(255) DEFAULT NULL,
  `pf` varchar(255) DEFAULT NULL,
  `allowance` varchar(255) DEFAULT NULL,
  `prof_tax` varchar(255) DEFAULT NULL,
  `medical_allowance` varchar(255) DEFAULT NULL,
  `conveyance` varchar(255) DEFAULT NULL,
  `leave` varchar(255) DEFAULT NULL,
  `labour_welfare` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `invoice_id`, `emp_id`, `net_salary`, `basic_salary`, `tds`, `da`, `esi`, `hra`, `pf`, `allowance`, `prof_tax`, `medical_allowance`, `conveyance`, `leave`, `labour_welfare`, `other`, `created_at`, `updated_at`) VALUES
(7, NULL, '11', '25000', '24000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-03 09:18:37', '2024-11-03 09:19:38');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pin_code` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `theme` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `favicon`, `logo`, `company_name`, `contact_person`, `address`, `country`, `city`, `state`, `pin_code`, `email`, `phone`, `mobile`, `fax`, `url`, `theme`, `created_at`, `updated_at`) VALUES
(1, '1728878988_favicon.png', '1728879158_logo1.jpeg', 'Asv Consulting Services Pvt Ltd', 'Viny dasdas', 'Noida Asv Consulting Services Pvt Ltd', 'India', 'Meerut', 'UP', '123456', 'pankaj@gmail.com', '0987654321', '3234567890', 'Yes', 'http://127.0.0.1:8000/', 1, '2024-10-09 06:03:16', '2024-10-13 23:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `assignee` varchar(255) DEFAULT NULL,
  `checklist` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `followers` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `assignee`, `checklist`, `priority`, `start_date`, `due_date`, `tag`, `followers`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', '7', NULL, 'medium', '2024-11-08', '2024-11-10', NULL, NULL, 'This task only for testing', NULL, 'in-progress', '2024-11-08 09:42:18', '2024-11-08 09:42:18'),
(2, 'PHP CURD', '11', NULL, 'medium', '2024-11-09', '2024-11-26', NULL, NULL, 'Lorem ipsum is a dummy or placeholder text commonly used in graphic design, publishing, and web development to fill empty spaces in a layout that do not yet have content.', NULL, 'pending', '2024-11-08 10:00:14', '2024-11-08 10:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `percentage` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `percentage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GST', '18', '0', '2024-10-10 01:52:52', '2024-10-10 06:26:58'),
(2, 'VAT', '5', '1', '2024-10-10 02:28:13', '2024-11-02 00:48:21'),
(4, 'IGST', '12', '0', '2024-10-10 03:13:25', '2024-10-10 06:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `terminations`
--

CREATE TABLE `terminations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `notice_date` varchar(255) DEFAULT NULL,
  `termination_date` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terminations`
--

INSERT INTO `terminations` (`id`, `emp_id`, `notice_date`, `termination_date`, `reason`, `created_at`, `updated_at`) VALUES
(2, 15, '2024-10-15', '2024-10-14', 'demo', '2024-10-13 01:14:21', '2024-10-13 01:21:36'),
(3, 11, '2024-11-12', '2024-11-27', 'Test', '2024-11-02 02:38:11', '2024-11-02 02:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `fname`, `lname`, `picture`, `role`, `email`, `phone`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vishal', 'Mishra', '1728750294_6858504.png', 'Teacher', 'vishal212@gmail.com', '7836040027', 'description', 0, '2024-10-12 04:29:36', '2024-10-12 10:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `training_type_id` varchar(255) DEFAULT NULL,
  `trainer_id` varchar(255) DEFAULT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `trainer_cost` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `training_type_id`, `trainer_id`, `emp_id`, `trainer_cost`, `start_date`, `end_date`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '18', '2000', '2024-10-01', '2024-10-24', 'demo', 0, '2024-10-12 21:24:48', '2024-10-12 21:24:48'),
(3, '4', '1', '9', '600', '2024-10-14', '2024-10-18', 'Class names for input fields: Ensured the correct classes are used for inputs that trigger the calculateTotal function.\r\nAJAX error handling: Added error handling for AJAX calls to alert the user in case of a failure.\r\nRow addition and removal: Updated the total when a row is removed to keep the calculation accurate.\r\nUpdated row classes: Each row now has a common class item-row for better targeting when calculating totals.', 0, '2024-10-12 22:49:44', '2024-10-12 22:50:08'),
(4, '1', '1', '11', '2000', '2024-11-07', '2024-11-29', ',aksn', 0, '2024-11-02 01:30:10', '2024-11-02 01:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `training_types`
--

CREATE TABLE `training_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_types`
--

INSERT INTO `training_types` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Node Training', 'Lorem ipsum dollar', 0, '2024-10-12 03:27:32', '2024-10-12 03:27:32'),
(2, 'Git Training Update', 'Update This tutorial explains how to import a new project into Git, make changes to it, and share changes with other developers.\r\n\r\nIf you are instead primarily interested in using Git to fetch a project, for example, to test the latest version, you may prefer to start with the first two chapters of The Git User’s Manual.', 0, '2024-10-12 03:32:55', '2024-11-02 01:51:48'),
(3, 'Html Training', 'Fun fact: all websites use HTML — even this one. It’s a fundamental part of every web developer’s toolkit. HTML provides the content that gives web pages structure, by using elements and tags, you can add text, images, videos, forms, and more. Learning HTML basics is an important first step in your web development journey and an essential skill for front- and back-end developers.', 0, '2024-10-12 03:33:46', '2024-10-12 03:33:46'),
(4, 'Laravel Training', 'Learn Laravel, the PHP web framework with elegant syntax. Covering MVC architecture, routing, and Eloquent ORM, it\'s ideal for developers focusing on rapid application development.', 0, '2024-10-12 03:35:43', '2024-10-12 03:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nick_name` varchar(55) DEFAULT NULL,
  `extension` varchar(55) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `joining_Date` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'employee',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dob` varchar(55) DEFAULT NULL,
  `birth_day` varchar(55) DEFAULT NULL,
  `blood_group` varchar(55) DEFAULT NULL,
  `father_name` varchar(55) DEFAULT NULL,
  `marital_status` varchar(55) DEFAULT NULL,
  `marital_date` varchar(25) DEFAULT NULL,
  `spouse_name` varchar(55) DEFAULT NULL,
  `nationality` varchar(55) DEFAULT NULL,
  `residential_status` varchar(55) DEFAULT NULL,
  `place_of_date` varchar(55) DEFAULT NULL,
  `place_of_birth` varchar(55) DEFAULT NULL,
  `country_of_origin` varchar(55) DEFAULT NULL,
  `religion` varchar(55) DEFAULT NULL,
  `international_emp` varchar(10) DEFAULT NULL,
  `physically_challened` varchar(10) DEFAULT NULL,
  `is_director` varchar(11) DEFAULT NULL,
  `personal_email` varchar(55) DEFAULT NULL,
  `join_confrimation_date` varchar(55) DEFAULT NULL,
  `joining_status` varchar(55) DEFAULT NULL,
  `probation_period` varchar(55) DEFAULT NULL,
  `notice_period` varchar(55) DEFAULT NULL,
  `current_company_experience` varchar(11) DEFAULT NULL,
  `pre_company_experiecne` varchar(11) DEFAULT NULL,
  `total_experience` varchar(11) DEFAULT NULL,
  `referred_by` varchar(55) DEFAULT NULL,
  `division` varchar(55) DEFAULT NULL,
  `grade` varchar(11) DEFAULT NULL,
  `location` varchar(55) DEFAULT NULL,
  `reporting` varchar(11) DEFAULT NULL,
  `attendance_marking_option` varchar(55) DEFAULT NULL,
  `city` varchar(11) DEFAULT NULL,
  `state` varchar(11) DEFAULT NULL,
  `pin` varchar(11) DEFAULT NULL,
  `country` varchar(11) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `fax` varchar(55) DEFAULT NULL,
  `pan` varchar(55) DEFAULT NULL,
  `uan` varchar(55) DEFAULT NULL,
  `stripe_account_id` varchar(255) DEFAULT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `firstName`, `lastName`, `username`, `nick_name`, `extension`, `gender`, `employee_id`, `phone`, `department_id`, `designation_id`, `joining_Date`, `address`, `picture`, `role`, `email`, `email_verified_at`, `password`, `dob`, `birth_day`, `blood_group`, `father_name`, `marital_status`, `marital_date`, `spouse_name`, `nationality`, `residential_status`, `place_of_date`, `place_of_birth`, `country_of_origin`, `religion`, `international_emp`, `physically_challened`, `is_director`, `personal_email`, `join_confrimation_date`, `joining_status`, `probation_period`, `notice_period`, `current_company_experience`, `pre_company_experiecne`, `total_experience`, `referred_by`, `division`, `grade`, `location`, `reporting`, `attendance_marking_option`, `city`, `state`, `pin`, `country`, `phone1`, `phone2`, `fax`, `pan`, `uan`, `stripe_account_id`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Mr.', 'Shivam', 'Saini', 'shivam', 'Simmy', 'NO', 'male', 'EMP-429812', '9918509296', 1, 1, NULL, NULL, '1732786710_avatar-19.jpg', 'employee', 'shivam@gmail.com', NULL, '$2y$12$3c90WJOQYDVq6Vy1OEigOuuRbuLKW75pPJSVQYMeHww2oHQFRXgCC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-05 22:31:19', '2024-11-28 09:38:30'),
(11, 'Mr.', 'Pankaj', 'Kohli', 'pankaj', 'Web Develpoer', 'NO', 'male', 'EMP-799878', '1234567890', 2, 1, '2024-10-01', 'Noida Asv Consulting Services Pvt Ltd', '1732783238_avatar-19.jpg', 'employee', 'pankaj@gmail.com', NULL, '$2y$12$HBVBrZH0jx8C9ETydthpuuM6EOxREOl//9tEixn1FuP0dhuWpRvjy', '2000-09-01', '1 Sept', 'no', 'Jiya Lal', 'Single', NULL, NULL, 'Indian', NULL, NULL, 'Meerut', NULL, NULL, '', NULL, 'NO', 'pankajkohli929@gmail.com', '2024-10-18', 'Consultant', '6 Months', '1 Months', 'Present', '6 Months', '2.6 Years', 'NO', 'B', 'B', 'NCR', 'no', 'Yes', 'Meerut', 'UP', '250103', 'India', 'NO', 'NO', 'NO', NULL, NULL, 'acct_1PSv2bG5SWecoBYe', NULL, NULL, NULL, NULL, '2024-10-06 00:56:02', '2024-11-28 18:27:55'),
(29, 'Mr.', 'ACS', 'Admin', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin@gmail.com', NULL, '$2y$12$nVOXkEuiz8iGHq/HIq2jyOQUEmBk8gdX9K3bjhPkg6LZThoNMjeaO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'acct_1PSv2bG5SWecoBYe', NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Mr.', 'Parveen', 'Kumar', 'parveen', 'Teacher', 'NO', 'male', NULL, '7255056844', 1, 2, '2024-10-24', 'Noida Asv Consulting Services Pvt Ltd', NULL, 'Trainer', 'kumar@gmail.com', NULL, '$2y$12$STIHF5Iu71ZTqqikHR3frOLw6OHjXyvyWdHR0kCcL1iN5opnq/IT6', '2024-11-01', '1 Sept', 'no', 'Kumar', 'Married', '2024-10-19', 'yes', 'Indian', 'NO', NULL, 'Meerut', 'India', 'No', NULL, 'yes', 'yes', 'parveenkumar@gmail.com', '2024-10-28', 'Confirmed', '6 Months', '1 Months', 'Present', '6 Months', '2.5 Years', 'Subash Thakur', 'B', 'B', 'NCR', 'no', 'Yes', 'Meerut', 'UP', '250103', 'India', 'NO', 'NO', 'NO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-30 02:30:01', '2024-11-12 11:16:08'),
(46, 'Mr.', 'Neeraj', 'Kumar', 'neerajkohli@gmail.com', 'Operator', 'Yes', 'male', 'ACS-EMP-IN-24-225', '9918509296', 5, 5, '2024-11-17', 'Noida Asv Consulting Services Pvt Ltd', '1732703065_avatar-19.jpg', 'employee', 'neerajkohli@gmail.com', NULL, '$2y$12$JUg2bnjb5EkLKSzxTD0m6.retMaK6NCTYprhx.WCZR9JhkpS3p3d2', '2024-11-15', '1 Sept', 'no', 'Jiya Lal', 'Single', '2024-10-23', 'NO', 'Indian', 'NO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-30', 'Confirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Noida', 'UP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-30 03:27:06', '2024-11-28 10:06:57'),
(47, 'Mr.', 'Sher', 'ali', 'sharali@gmail.com', 'Ali', NULL, 'male', 'ACS-EMP-IN-24-226', '0987654321', 2, 1, '2024-10-25', 'Meerut', '', 'employee', 'sharali@gmail.com', NULL, '$2y$12$7SbVvJBetZKmF6tf28VY2.vcOb/M6XxTXrXkZpWpF3xgvGA10fzUy', '2024-10-26', '11 March', 'None', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-02', 'Panding', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Meerut', 'UP', '250103', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-30 03:35:43', '2024-11-28 18:03:32'),
(48, 'Mr.', 'Test', 'Demo', 'testuser@gmail.com', 'Test', 'NO', 'male', 'ACS-EMP-IN-24-230', '1234567890', 2, 1, '2024-11-20', 'Noida', NULL, 'employee', 'testuser@gmail.com', NULL, '$2y$12$.bBmvX2Ak4QJypVfTUxTTuKK7g8CatQ5QlovqwSwaPasqZNor9q4C', '2024-11-29', '1 April', 'None', 'Kumar', 'Married', '2024-11-21', 'NO', 'Indian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-30', 'Confirmed', '6 Months', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NCR', 'no', NULL, 'Noida', 'UP', NULL, 'India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-29 06:59:55', '2024-11-29 06:59:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `emp_banks`
--
ALTER TABLE `emp_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_docs`
--
ALTER TABLE `emp_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_s_i_s`
--
ALTER TABLE `e_s_i_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goal_types`
--
ALTER TABLE `goal_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leads_email_unique` (`email`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `previous_employments`
--
ALTER TABLE `previous_employments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotes`
--
ALTER TABLE `promotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_f_s`
--
ALTER TABLE `p_f_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resignations`
--
ALTER TABLE `resignations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminations`
--
ALTER TABLE `terminations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trainers_email_unique` (`email`),
  ADD UNIQUE KEY `trainers_phone_unique` (`phone`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_types`
--
ALTER TABLE `training_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `personal_email` (`personal_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_banks`
--
ALTER TABLE `emp_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp_docs`
--
ALTER TABLE `emp_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `e_s_i_s`
--
ALTER TABLE `e_s_i_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `families`
--
ALTER TABLE `families`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `goal_types`
--
ALTER TABLE `goal_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `previous_employments`
--
ALTER TABLE `previous_employments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `promotes`
--
ALTER TABLE `promotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `p_f_s`
--
ALTER TABLE `p_f_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resignations`
--
ALTER TABLE `resignations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terminations`
--
ALTER TABLE `terminations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `training_types`
--
ALTER TABLE `training_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
