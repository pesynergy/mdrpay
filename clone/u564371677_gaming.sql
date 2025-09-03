-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2024 at 06:22 AM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u564371677_gaming`
--

-- --------------------------------------------------------

--
-- Table structure for table `apilogs`
--

CREATE TABLE `apilogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` longtext DEFAULT NULL,
  `modal` varchar(191) DEFAULT NULL,
  `txnid` varchar(191) DEFAULT NULL,
  `header` longtext DEFAULT NULL,
  `request` longtext DEFAULT NULL,
  `response` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apis`
--

CREATE TABLE `apis` (
  `id` int(11) NOT NULL,
  `product` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `url` longtext DEFAULT NULL,
  `username` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `optional1` longtext DEFAULT NULL,
  `optional2` varchar(500) DEFAULT NULL,
  `optional3` varchar(20) DEFAULT NULL,
  `code` varchar(191) NOT NULL,
  `type` varchar(250) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `tds` double(11,0) NOT NULL DEFAULT 0,
  `gst` double(11,0) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apis`
--

INSERT INTO `apis` (`id`, `product`, `name`, `url`, `username`, `password`, `optional1`, `optional2`, `optional3`, `code`, `type`, `status`, `tds`, `gst`, `created_at`, `updated_at`) VALUES
(1, 'Fund', 'Fund', NULL, NULL, NULL, 'null', NULL, NULL, 'fund', 'fund', '1', 0, 18, '2022-11-23 19:03:28', '2022-12-07 04:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `apitokens`
--

CREATE TABLE `apitokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `circles`
--

CREATE TABLE `circles` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(191) NOT NULL,
  `plan_code` varchar(191) NOT NULL,
  `statecode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `circles`
--

INSERT INTO `circles` (`id`, `state`, `plan_code`, `statecode`) VALUES
(1, 'ASSAM', '2', '18'),
(2, 'BIHAR', '3', '10'),
(3, 'Chandigarh', '4', '4'),
(4, 'GUJARAT', '6', '24'),
(5, 'HARYANA', '7', '6'),
(6, 'HIMACHAL PRADESH', '8', '2'),
(7, 'JAMMU KASHMIR', '9', '1'),
(8, 'KARNATAKA', '10', '29'),
(9, 'KERALA', '11', '32'),
(10, 'Goa', '12', '30'),
(11, 'MAHARASHTRA', '13', '27'),
(12, 'MADHYA PRADESH', '14', '23'),
(13, 'CHHATTISGARH', '0', '22'),
(14, 'Manipur', '15', '14'),
(15, 'Meghalaya', '17', '17'),
(16, 'ORISSA', '17', '21'),
(17, 'PUNJAB', '18', '3'),
(18, 'RAJASTHAN', '19', '8'),
(19, 'TAMIL NADU', '20', '33'),
(20, 'UP EAST', '21', '9'),
(21, 'UP WEST', '22', '9'),
(22, 'WEST BENGAL', '23', '19'),
(23, 'Dadra Nagar Haveli', '5', '26'),
(24, 'ANDHRA PRADESH', '1', '28'),
(25, 'Delhi', '1', '7'),
(26, 'UTTARAKHAND', '0', '5'),
(27, 'JHARKHAND', '1', '20'),
(28, 'Andaman Nicobar', '35', '35'),
(29, 'Arunachal Pradesh', '12', '12'),
(30, 'Daman Diu', '25', '25'),
(31, 'Lakshadweep', '31', '31'),
(32, 'Mizoram', '15', '15'),
(33, 'Nagaland', '13', '13'),
(34, 'Puducherry', '34', '34'),
(35, 'Sikkim', '11', '11'),
(36, 'Telangana', '36', '36'),
(37, 'Tripura', '16', '16');

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `slab` varchar(191) NOT NULL,
  `type` enum('flat','percent') NOT NULL DEFAULT 'flat',
  `apiuser` double(11,2) NOT NULL DEFAULT 0.00,
  `subadmin` double(11,2) NOT NULL DEFAULT 0.00,
  `scheme_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `slab`, `type`, `apiuser`, `subadmin`, `scheme_id`, `created_at`, `updated_at`) VALUES
(1, '3', 'flat', 10.00, 0.00, 2, '2024-10-03 00:15:49', '2024-10-03 00:15:49'),
(2, '4', 'flat', 10.00, 0.00, 2, '2024-10-03 00:15:49', '2024-10-03 00:15:49'),
(3, '5', 'percent', 2.00, 0.00, 2, '2024-10-03 00:15:49', '2024-10-03 00:15:49'),
(4, '6', 'percent', 2.00, 0.00, 2, '2024-10-03 00:15:49', '2024-10-03 00:15:49'),
(5, '7', 'percent', 2.00, 0.00, 2, '2024-10-03 00:15:49', '2024-10-03 00:15:49'),
(6, '2', 'flat', 10.00, 0.00, 2, '2024-10-03 02:40:44', '2024-10-03 02:40:44'),
(7, '8', 'flat', 20.00, 0.00, 2, '2024-10-03 02:40:44', '2024-10-03 02:40:44'),
(8, '9', 'flat', 20.00, 0.00, 2, '2024-10-03 02:40:44', '2024-10-03 02:40:44'),
(9, '10', 'percent', 2.00, 0.00, 2, '2024-10-03 02:40:44', '2024-10-03 02:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `companyname` varchar(191) NOT NULL,
  `shortname` varchar(15) DEFAULT NULL,
  `website` varchar(191) NOT NULL,
  `logo` longtext DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `senderid` varchar(250) DEFAULT NULL,
  `smsuser` varchar(250) DEFAULT NULL,
  `smspwd` varchar(250) DEFAULT NULL,
  `merchant_key` varchar(250) DEFAULT NULL,
  `merchant_id` varchar(250) DEFAULT NULL,
  `merchant_upi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `companyname`, `shortname`, `website`, `logo`, `status`, `created_at`, `updated_at`, `senderid`, `smsuser`, `smspwd`, `merchant_key`, `merchant_id`, `merchant_upi`) VALUES
(1, 'NanakPay', 'NNPAY', 'login.nanakpay.com', NULL, '1', NULL, '2024-10-02 09:09:06', 'null', 'null', 'null', NULL, NULL, NULL),
(2, 'demo', NULL, 'login.nanakpay.com', NULL, '1', '2024-10-02 23:28:20', '2024-10-02 23:28:20', 'null', 'null', 'null', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companydatas`
--

CREATE TABLE `companydatas` (
  `id` int(10) UNSIGNED NOT NULL,
  `news` longtext DEFAULT NULL,
  `notice` longtext DEFAULT NULL,
  `billnotice` longtext DEFAULT NULL,
  `number` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `address` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` varchar(20) DEFAULT NULL,
  `subject` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `solution` longtext DEFAULT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `status` enum('pending','resolved','rejected') NOT NULL,
  `user_id` int(11) NOT NULL,
  `resolve_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaintsubjects`
--

CREATE TABLE `complaintsubjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `bank` varchar(250) DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL,
  `ifsc` varchar(20) DEFAULT NULL,
  `beneid` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `default_permissions`
--

CREATE TABLE `default_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `type` enum('scheme','permission') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmt_accounts`
--

CREATE TABLE `dmt_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `account` varchar(250) DEFAULT NULL,
  `bank` varchar(250) DEFAULT NULL,
  `ifsc` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fundbanks`
--

CREATE TABLE `fundbanks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `account` varchar(191) NOT NULL,
  `ifsc` varchar(191) NOT NULL,
  `branch` varchar(191) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fundreports`
--

CREATE TABLE `fundreports` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('transfer','request','return') DEFAULT NULL,
  `paymode` varchar(20) DEFAULT NULL,
  `fundbank_id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `paydate` varchar(30) DEFAULT NULL,
  `status` enum('success','pending','failed','approved','rejected') DEFAULT 'pending',
  `user_id` int(10) UNSIGNED NOT NULL,
  `credited_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remark` longtext DEFAULT NULL,
  `payslip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loginsessions`
--

CREATE TABLE `loginsessions` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loginsessions`
--

INSERT INTO `loginsessions` (`id`, `user_id`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 1, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2024-07-31 11:46:42', '2024-07-31 11:46:42'),
(2, 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:128.0) Gecko/20100101 Firefox/128.0', '2024-07-31 11:48:51', '2024-07-31 11:48:51'),
(3, 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:128.0) Gecko/20100101 Firefox/128.0', '2024-07-31 12:01:20', '2024-07-31 12:01:20'),
(4, 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:128.0) Gecko/20100101 Firefox/128.0', '2024-07-31 12:07:28', '2024-07-31 12:07:28'),
(5, 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:128.0) Gecko/20100101 Firefox/128.0', '2024-07-31 12:14:31', '2024-07-31 12:14:31'),
(6, 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:128.0) Gecko/20100101 Firefox/128.0', '2024-07-31 12:14:49', '2024-07-31 12:14:49'),
(7, 2, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:128.0) Gecko/20100101 Firefox/128.0', '2024-07-31 12:17:11', '2024-07-31 12:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `log_500`
--

CREATE TABLE `log_500` (
  `id` int(11) NOT NULL,
  `file` longtext DEFAULT NULL,
  `line` varchar(250) DEFAULT NULL,
  `log` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_apis`
--

CREATE TABLE `log_apis` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` longtext DEFAULT NULL,
  `modal` varchar(191) DEFAULT NULL,
  `txnid` varchar(191) DEFAULT NULL,
  `header` longtext DEFAULT NULL,
  `request` longtext DEFAULT NULL,
  `response` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_callbacks`
--

CREATE TABLE `log_callbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(500) DEFAULT NULL,
  `modal` varchar(191) DEFAULT NULL,
  `txnid` varchar(191) DEFAULT NULL,
  `request` longtext DEFAULT NULL,
  `response` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_sessions`
--

CREATE TABLE `log_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `gps_location` varchar(250) DEFAULT NULL,
  `ip_location` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `microlog`
--

CREATE TABLE `microlog` (
  `id` int(11) NOT NULL,
  `product` varchar(250) DEFAULT NULL,
  `response` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `mobile` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_activity` int(20) DEFAULT NULL,
  `ip` varchar(250) DEFAULT NULL,
  `useragent` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymodes`
--

CREATE TABLE `paymodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymodes`
--

INSERT INTO `paymodes` (`id`, `name`, `status`) VALUES
(1, 'IMPS', '1'),
(2, 'NEFT', '1'),
(3, 'NET BANKING', '1'),
(4, 'CASH', '1'),
(5, 'OTHER', '1');

-- --------------------------------------------------------

--
-- Table structure for table `payoutreports`
--

CREATE TABLE `payoutreports` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` int(11) NOT NULL,
  `api_id` int(11) NOT NULL,
  `amount` double(11,2) NOT NULL DEFAULT 0.00,
  `charge` double(11,2) NOT NULL DEFAULT 0.00,
  `profit` double(11,2) NOT NULL DEFAULT 0.00,
  `gst` double(11,2) NOT NULL DEFAULT 0.00,
  `tds` double(11,2) NOT NULL DEFAULT 0.00,
  `apitxnid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txnid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option4` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option5` varchar(250) DEFAULT NULL,
  `option6` varchar(250) DEFAULT NULL,
  `option7` varchar(250) DEFAULT NULL,
  `option8` varchar(250) DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` int(11) NOT NULL,
  `credit_by` int(11) DEFAULT NULL,
  `rtype` enum('main','commission') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'main',
  `via` enum('api','portal','app') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'portal',
  `adminprofit` double(11,2) NOT NULL DEFAULT 0.00,
  `balance` double(11,2) NOT NULL DEFAULT 0.00,
  `closing` double(11,2) NOT NULL DEFAULT 0.00,
  `trans_type` enum('credit','debit','none') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `product` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'recharge',
  `wid` int(11) DEFAULT NULL,
  `wprofit` double(11,2) NOT NULL DEFAULT 0.00,
  `mdid` int(11) DEFAULT NULL,
  `mdprofit` double(11,2) NOT NULL DEFAULT 0.00,
  `disid` int(11) DEFAULT NULL,
  `disprofit` double(11,2) NOT NULL DEFAULT 0.00,
  `create_time` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `payoutreports`
--

INSERT INTO `payoutreports` (`id`, `number`, `mobile`, `provider_id`, `api_id`, `amount`, `charge`, `profit`, `gst`, `tds`, `apitxnid`, `txnid`, `payid`, `refno`, `description`, `remark`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `status`, `user_id`, `credit_by`, `rtype`, `via`, `adminprofit`, `balance`, `closing`, `trans_type`, `product`, `wid`, `wprofit`, `mdid`, `mdprofit`, `disid`, `disprofit`, `create_time`, `created_at`, `updated_at`) VALUES
(1, '1234567890', '1234567890', 1, 1, 100.00, 0.00, 0.00, 0.00, 0.00, NULL, 'WTR20241003024337', NULL, 'sdfghj', NULL, NULL, 'wallet', NULL, NULL, NULL, 'fund', NULL, NULL, NULL, 'success', 1, 3, 'main', 'portal', 0.00, 9117.64, 9017.64, 'debit', 'fund transfer', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 02:43:37', '2024-10-03 02:43:37'),
(2, '9876543765', '9876543765', 1, 1, 100.00, 0.00, 0.00, 0.00, 0.00, NULL, 'WTR20241003024337', NULL, 'sdfghj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 3, 1, 'main', 'portal', 0.00, 0.00, 100.00, 'credit', 'fund transfer', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 02:43:37', '2024-10-03 02:43:37'),
(3, '9876543765', '9876543765', 1, 1, 100.00, 0.00, 0.00, 0.00, 0.00, NULL, 'WTR20241003024428', NULL, 'xcn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 3, 3, 'main', 'portal', 0.00, 100.00, 200.00, 'credit', 'fund transfer', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 02:44:28', '2024-10-03 02:44:28'),
(4, '1234567890', '1234567890', 1, 1, 100.00, 0.00, 0.00, 0.00, 0.00, NULL, 'WTR20241003073846', NULL, '54365', NULL, 'dcd', 'wallet', NULL, NULL, NULL, 'fund', NULL, NULL, NULL, 'success', 1, 3, 'main', 'portal', 0.00, 9018.64, 8918.64, 'debit', 'fund transfer', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 07:38:46', '2024-10-03 07:38:46'),
(5, '9876543765', '9876543765', 1, 1, 100.00, 0.00, 0.00, 0.00, 0.00, NULL, 'WTR20241003073846', NULL, '54365', NULL, 'dcd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 3, 1, 'main', 'portal', 0.00, 200.00, 300.00, 'credit', 'fund transfer', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 07:38:46', '2024-10-03 07:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `paytmlogs`
--

CREATE TABLE `paytmlogs` (
  `id` int(11) NOT NULL,
  `txnid` varchar(250) DEFAULT NULL,
  `response` longtext DEFAULT NULL,
  `callbackresponse` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pindatas`
--

CREATE TABLE `pindatas` (
  `id` int(11) NOT NULL,
  `pin` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portal_settings`
--

CREATE TABLE `portal_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `value` varchar(191) NOT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portal_settings`
--

INSERT INTO `portal_settings` (`id`, `name`, `code`, `value`, `company_id`) VALUES
(3, 'Login required otp', 'otplogin', 'no', NULL),
(4, 'Sending mail id for otp', 'otpsendmailid', 'info@apisseva.com', NULL),
(5, 'Sending mailer name id for otp', 'otpsendmailname', 'Support', NULL),
(6, 'Scheme Maneger', 'schememanager', 'admin', NULL),
(7, 'Transaction Id Code', 'transactioncode', 'SEVA', NULL),
(10, 'Top Header Color', 'topheadcolor', '#095d75', NULL),
(11, 'Sidebar Light Color', 'sidebarlightcolor', '#212121', NULL),
(12, 'Sidebar Dark Color', 'sidebardarkcolor', '#212121', NULL),
(13, 'Sidebar Icon Color', 'sidebariconcolor', '#fff', NULL),
(15, 'Sidebar Child Href Color', 'sidebarchildhrefcolor', '#3a3b45', NULL),
(29, 'Pin Based Transaction', 'pincheck', 'no', NULL),
(32, 'Sidebar Color', 'sidebarcolor', '#325529', NULL),
(41, 'Settlement In Days', 'settlementcount', '0', NULL),
(42, 'Utr Code', 'utrcode', '41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `recharge1` varchar(191) DEFAULT NULL,
  `recharge2` varchar(191) DEFAULT NULL,
  `api_id` int(11) DEFAULT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'mobile',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `paramname` varchar(250) DEFAULT NULL,
  `mode` varchar(20) DEFAULT NULL,
  `range1` decimal(11,0) NOT NULL DEFAULT 0,
  `range2` decimal(11,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `name`, `recharge1`, `recharge2`, `api_id`, `type`, `status`, `paramname`, `mode`, `range1`, `range2`) VALUES
(1, 'Fund', 'fund', 'fund', 1, 'fund', '1', NULL, NULL, 0, 0),
(2, 'Payin', 'payin', 'payin', 1, 'collection', '1', NULL, NULL, 0, 0),
(3, 'Payout 100-499', 'payout1', 'payout1', 1, 'payout', '1', NULL, NULL, 0, 0),
(4, 'Payout 500-999', 'payout2', 'payout2', 1, 'payout', '1', NULL, NULL, 0, 0),
(5, 'Payout 1000-24999', 'payout3', 'payout3', 1, 'payout', '1', NULL, NULL, 0, 0),
(6, 'Payout 24999-Above', 'payout4', 'payout4', 1, 'payout', '1', NULL, NULL, 0, 0),
(7, 'Self Payout', 'portalpayout', 'portalpayout', 1, 'payout', '1', NULL, NULL, 0, 0),
(8, 'Collection 1-300', 'payin1', 'payin1', 1, 'collection', '1', NULL, NULL, 0, 300),
(9, 'Collection 301-500', 'payin2', 'payin2', 1, 'collection', '1', NULL, NULL, 301, 500),
(10, 'Collection 501-Above', 'payin3', 'payin3', 1, 'collection', '1', NULL, NULL, 501, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` int(11) NOT NULL,
  `api_id` int(11) NOT NULL,
  `amount` double(11,2) NOT NULL DEFAULT 0.00,
  `charge` double(11,2) NOT NULL DEFAULT 0.00,
  `profit` double(11,2) NOT NULL DEFAULT 0.00,
  `gst` double(11,2) NOT NULL DEFAULT 0.00,
  `tds` double(11,2) NOT NULL DEFAULT 0.00,
  `apitxnid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txnid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option4` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option5` varchar(250) DEFAULT NULL,
  `option6` varchar(250) DEFAULT NULL,
  `option7` varchar(250) DEFAULT NULL,
  `option8` varchar(250) DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` int(11) NOT NULL,
  `credit_by` int(11) DEFAULT NULL,
  `rtype` enum('main','commission') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'main',
  `via` enum('api','portal','app') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'portal',
  `adminprofit` double(11,2) NOT NULL DEFAULT 0.00,
  `balance` double(11,2) NOT NULL DEFAULT 0.00,
  `closing` double(11,2) NOT NULL DEFAULT 0.00,
  `trans_type` enum('credit','debit','none') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `product` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'recharge',
  `wid` int(11) DEFAULT NULL,
  `wprofit` double(11,2) NOT NULL DEFAULT 0.00,
  `mdid` int(11) DEFAULT NULL,
  `mdprofit` double(11,2) NOT NULL DEFAULT 0.00,
  `disid` int(11) DEFAULT NULL,
  `disprofit` double(11,2) NOT NULL DEFAULT 0.00,
  `create_time` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `label` varchar(250) DEFAULT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `number`, `mobile`, `provider_id`, `api_id`, `amount`, `charge`, `profit`, `gst`, `tds`, `apitxnid`, `txnid`, `payid`, `refno`, `description`, `remark`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `status`, `user_id`, `credit_by`, `rtype`, `via`, `adminprofit`, `balance`, `closing`, `trans_type`, `product`, `wid`, `wprofit`, `mdid`, `mdprofit`, `disid`, `disprofit`, `create_time`, `created_at`, `updated_at`, `label`, `role`) VALUES
(1, '1234567890', '1234567890', 1, 1, 100.00, 0.00, 0.00, 0.00, 0.00, NULL, '241002115924', NULL, NULL, NULL, 'dfghjkl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 1, 1, 'main', 'portal', 0.00, 9017.64, 9117.64, 'credit', 'fund loadwallet', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-02 23:59:24', '2024-10-02 23:59:24', NULL, 'admin'),
(2, '1234567890', '1234567890', 1, 1, 1.00, 0.00, 0.00, 0.00, 0.00, NULL, 'WTR20241003024314', NULL, 'admingmailcom', NULL, NULL, 'wallet', NULL, NULL, NULL, 'fund', NULL, NULL, NULL, 'success', 1, 3, 'main', 'portal', 0.00, 2130146.80, 2130145.80, 'debit', 'fund transfer', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 02:43:14', '2024-10-03 02:43:14', NULL, 'admin'),
(3, '9876543765', '9876543765', 1, 1, 1.00, 0.00, 0.00, 0.00, 0.00, NULL, 'WTR20241003024314', NULL, 'admingmailcom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 3, 1, 'main', 'portal', 0.00, 0.00, 1.00, 'credit', 'fund transfer', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 02:43:14', '2024-10-03 02:43:14', NULL, 'admin'),
(4, '1234567890', '1234567890', 1, 1, 200.00, 0.00, 0.00, 0.00, 0.00, NULL, 'WTR20241003024401', NULL, 'zxcvb', NULL, NULL, 'wallet', NULL, NULL, NULL, 'fund', NULL, NULL, NULL, 'success', 1, 3, 'main', 'portal', 0.00, 2130145.80, 2129945.80, 'debit', 'fund transfer', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 02:44:01', '2024-10-03 02:44:01', NULL, 'admin'),
(5, '9876543765', '9876543765', 1, 1, 200.00, 0.00, 0.00, 0.00, 0.00, NULL, 'WTR20241003024401', NULL, 'zxcvb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 3, 1, 'main', 'portal', 0.00, 1.00, 201.00, 'credit', 'fund transfer', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 02:44:01', '2024-10-03 02:44:01', NULL, 'admin'),
(6, '9876543765', '9876543765', 1, 1, 100.00, 0.00, 0.00, 0.00, 0.00, NULL, 'WTR20241003024428', NULL, 'xcn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 3, 3, 'main', 'portal', 0.00, 201.00, 101.00, 'debit', 'fund transfer', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 02:44:28', '2024-10-03 02:44:28', NULL, 'admin'),
(7, '1234567890', '1234567890', 1, 1, 1.00, 0.00, 0.00, 0.00, 0.00, NULL, '241003071701', NULL, NULL, NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 1, 1, 'main', 'portal', 0.00, 9017.64, 9018.64, 'credit', 'fund loadwallet', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 07:17:01', '2024-10-03 07:17:01', NULL, 'admin'),
(8, '1234567890', '1234567890', 1, 1, 1.00, 0.00, 0.00, 0.00, 0.00, NULL, '241003071727', NULL, NULL, NULL, 'T', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 1, 1, 'main', 'portal', 0.00, 2129945.80, 2129946.80, 'credit', 'fund loadwallet', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 07:17:27', '2024-10-03 07:17:27', NULL, 'admin'),
(9, '1234567890', '1234567890', 1, 1, 100.00, 0.00, 0.00, 0.00, 0.00, NULL, '241003110628', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 1, 1, 'main', 'portal', 0.00, 2129946.80, 2130046.80, 'credit', 'fund loadwallet', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 11:06:28', '2024-10-03 11:06:28', NULL, 'admin'),
(10, '1234567890', '1234567890', 1, 1, 1.00, 0.00, 0.00, 0.00, 0.00, NULL, '241003110647', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 1, 1, 'main', 'portal', 0.00, 2130046.80, 2130047.80, 'credit', 'fund loadwallet', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 11:06:47', '2024-10-03 11:06:47', NULL, 'admin'),
(11, '1234567890', '1234567890', 1, 1, 1.00, 0.00, 0.00, 0.00, 0.00, NULL, '241003110738', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'success', 1, 1, 'main', 'portal', 0.00, 8918.64, 8919.64, 'credit', 'fund loadwallet', NULL, 0.00, NULL, 0.00, NULL, 0.00, NULL, '2024-10-03 11:07:38', '2024-10-03 11:07:38', NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', NULL, NULL),
(2, 'Admin', 'subadmin', '2020-04-24 00:37:31', '2020-04-24 00:37:31'),
(3, 'Api Partner', 'apiuser', '2020-04-24 00:37:31', '2020-04-24 00:37:31'),
(8, 'Mis', 'mis', '2020-04-24 00:37:31', '2020-04-24 00:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

CREATE TABLE `schemes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(191) NOT NULL DEFAULT 'none',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`id`, `name`, `type`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Nanakpay', 'none', '1', 1, '2024-10-02 23:17:17', '2024-10-02 23:17:17'),
(2, 'demo', 'none', '1', 1, '2024-10-02 23:28:37', '2024-10-02 23:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `securedatas`
--

CREATE TABLE `securedatas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `apptoken` varchar(500) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `last_activity` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `securereports`
--

CREATE TABLE `securereports` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` int(11) NOT NULL,
  `api_id` int(11) NOT NULL,
  `amount` double(11,2) NOT NULL DEFAULT 0.00,
  `charge` double(11,2) NOT NULL DEFAULT 0.00,
  `profit` double(11,2) NOT NULL DEFAULT 0.00,
  `gst` double(11,2) NOT NULL DEFAULT 0.00,
  `tds` double(11,2) NOT NULL DEFAULT 0.00,
  `apitxnid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txnid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refno` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option4` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option5` varchar(250) DEFAULT NULL,
  `option6` varchar(250) DEFAULT NULL,
  `option7` varchar(250) DEFAULT NULL,
  `option8` varchar(250) DEFAULT NULL,
  `status` enum('pending','success','failed','reversed','refunded','refund') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` int(11) NOT NULL,
  `credit_by` int(11) DEFAULT NULL,
  `rtype` enum('main','commission') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'main',
  `via` enum('api','portal','app') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'portal',
  `adminprofit` double(11,2) NOT NULL DEFAULT 0.00,
  `balance` double(11,2) NOT NULL DEFAULT 0.00,
  `trans_type` enum('credit','debit','none') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `product` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'recharge',
  `wid` int(11) DEFAULT NULL,
  `wprofit` double(11,2) NOT NULL DEFAULT 0.00,
  `mdid` int(11) DEFAULT NULL,
  `mdprofit` double(11,2) NOT NULL DEFAULT 0.00,
  `disid` int(11) DEFAULT NULL,
  `disprofit` double(11,2) NOT NULL DEFAULT 0.00,
  `create_time` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_managers`
--

CREATE TABLE `service_managers` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `api_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4ualeDtqQUzCpfoKXSsfPxqLiwcYnjBupIFiIAHL', NULL, '2401:4900:1f3c:3773:6412:b102:859:4b7d', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRDMyUXpQSzZ2cGt0aHI5cTJGUDhZYUh3VVh4NUFLdVNDdXRJb2VmNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vbG9naW4ubmFuYWtwYXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727935590),
('6HrkbO5uX3AL8EXVa5YAALNf5Ye3gI05dvPTUYT7', NULL, '49.44.85.171', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVWxVSGswRGtRUldMMlFPOVZKM0xEekFsM3ZmS3NYT2t2NHhVUTd2cSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cHM6Ly9sb2dpbi5uYW5ha3BheS5jb20vbWVtYmVyL2FwaXVzZXIiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9sb2dpbi5uYW5ha3BheS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1727935763),
('81K6B9c88uzQKrxR8Zn8Ta2DFjCiLcAZka7qDJRn', 2, '2409:40d2:1030:5984:55a6:2962:8692:3b55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9sb2dpbi5uYW5ha3BheS5jb20vZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6ImpRdVBFOXVPNGlGdzZLR1FmUGx4MDM5U1FvTHdFTDNpZkxZczZzd08iO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo3OiJsb2dpbmlkIjtpOjI7fQ==', 1727934444),
('9b8yPsXVaElsUr1BJgERnzD2a8y00bFb4WezAEjY', 1, '2409:40e3:3e:125b:f01a:1f36:c8d2:152a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9sb2dpbi5uYW5ha3BheS5jb20vZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6ImcxMmNRb2FmZ0pEVnc4Tm9iS25pUzZrZllHVXd3RnEwaDQxYlRHbnIiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo3OiJsb2dpbmlkIjtpOjE7fQ==', 1727935691),
('agAbK4fWHH8x2nw3Ii1OSBZVPldjuYvtdpMSoV7M', NULL, '111.223.1.104', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQkQwZnBhTUtWdlhuNXpjVm9RdWJyQ215ekVDVVhkU2RMbFBwYmk4YSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cHM6Ly9sb2dpbi5uYW5ha3BheS5jb20vbWVtYmVyL2FwaXVzZXIiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9sb2dpbi5uYW5ha3BheS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1727935759),
('FRGEcClDi2BdGndWcxNTTRcAhXfneJivX01d1DKs', 3, '111.223.1.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMklhcTNPNG16TlA3aXRrbmNYSGFQdG5XblJ6Tzd3Zm1tWkFZOTVRRyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cHM6Ly9sb2dpbi5uYW5ha3BheS5jb20vZGFzaGJvYXJkIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vbG9naW4ubmFuYWtwYXkuY29tL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czo3OiJsb2dpbmlkIjtpOjM7fQ==', 1727934070),
('HCm5M97LmU6LpSS8p6ytbjaeQIegvCGKFn4NCszl', NULL, '2409:40d2:1030:5984:8000::', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9sb2dpbi5uYW5ha3BheS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiTHFkRlUzRjlnazZPaHRlVDBHVGtzTmlWZEppWVUwdzJyQUJnem1RWCI7fQ==', 1727936265),
('i7tGHgjbDx5kuYNLyDQNSZPwfPGp8h5hMtHUUaa3', 1, '111.223.1.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicjRKbXFwSzdrbDU5Sk55UUZJMU5TWmpnUW9tTHlxZmFiRUFNMFpQbSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cHM6Ly9sb2dpbi5uYW5ha3BheS5jb20vbWVtYmVyL2FwaXVzZXIiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNjoiaHR0cHM6Ly9sb2dpbi5uYW5ha3BheS5jb20vZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjc6ImxvZ2luaWQiO2k6MTt9', 1727933861),
('NeKkYcD9rm5UaMOapYTGYhRv0Eiffe4gsLQdNohE', NULL, '2405:201:6019:a821:7590:fd94:d280:81e5', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWtxamx1NE53cUJFakhlRm92SThXUklIQjVnb0pySVI5WFVBcFFvRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vbG9naW4ubmFuYWtwYXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727935725),
('oep2tVsZugbC3JVwCfbBEgaBmi1zcIG6m5zu2uwi', NULL, '49.44.81.132', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0lBYmFIenJkclRLelVEWjNnZm1TZlBCVTJmT2NBTmc3OFVZVGc1dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vbG9naW4ubmFuYWtwYXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727934989),
('OTDLEVpHfXYdZxdOucnIkEOZUuzzVFRh1O1iXLKK', NULL, '111.223.1.104', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicTM3UzRPVjg3WGVGd0Q4c21wTEhqY1JobmZrSmNhSWFuVUZ0c1ZFRSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cHM6Ly9sb2dpbi5uYW5ha3BheS5jb20vbWVtYmVyL2FwaXVzZXIiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9sb2dpbi5uYW5ha3BheS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1727935715),
('WvnlsN7IBJs8yTpxsxEAD7yFY7bbIwA8iiUD7CyP', NULL, '2401:4900:8628:a860:34da:10ff:fe6e:8269', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS29KMTlxdFFRczNxMlFlQjBGNTdQM3lrVzdyMVNEeUhhVHF5VmZwUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vbG9naW4ubmFuYWtwYXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727936167),
('xSt0QXsZlgCJp5YoZlE1Kozf4wI8Po1jCVrEl84a', NULL, '2409:40d2:1030:5984:8000::', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidFgzNmVZd3E4NWd2NHhhVmwwOE5vbnJGVzREaW9ZdU9tbVRqaGlOUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vbG9naW4ubmFuYWtwYXkuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727934574),
('zoB1olfhqmMVL2qxjtt57j1dlPlxY2xxYeQcIv5d', 1, '43.243.80.159', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNFBDV2x1eElLcktCc1h1M1hYODVFUnpoNmd0VGZTWndtc3ZmUGtmcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vbG9naW4ubmFuYWtwYXkuY29tL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo3OiJsb2dpbmlkIjtpOjE7fQ==', 1727936283);

-- --------------------------------------------------------

--
-- Table structure for table `statuslogs`
--

CREATE TABLE `statuslogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` longtext DEFAULT NULL,
  `modal` varchar(191) DEFAULT NULL,
  `txnid` varchar(191) DEFAULT NULL,
  `header` longtext DEFAULT NULL,
  `request` longtext DEFAULT NULL,
  `response` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upiloads`
--

CREATE TABLE `upiloads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `api_id` int(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `payername` varchar(250) DEFAULT NULL,
  `payerupi` varchar(250) DEFAULT NULL,
  `apitxnid` varchar(250) DEFAULT NULL,
  `txnid` varchar(250) DEFAULT NULL,
  `upiid` varchar(500) DEFAULT NULL,
  `refid` varchar(500) DEFAULT NULL,
  `utr` varchar(250) DEFAULT NULL,
  `amount` double(11,2) NOT NULL DEFAULT 0.00,
  `upi_string` longtext DEFAULT NULL,
  `callback` longtext DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `agentcode` varchar(250) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `alternate_mobile` varchar(11) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(191) DEFAULT NULL,
  `otpverify` varchar(250) NOT NULL DEFAULT 'yes',
  `otpresend` int(11) NOT NULL DEFAULT 0,
  `payoutwallet` double(11,2) NOT NULL DEFAULT 0.00,
  `mainwallet` double(11,2) NOT NULL DEFAULT 0.00,
  `securewallet` double(11,2) NOT NULL DEFAULT 0.00,
  `lockedamount` double(11,2) NOT NULL DEFAULT 0.00,
  `role_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `company_id` int(11) DEFAULT NULL,
  `scheme_id` int(11) DEFAULT NULL,
  `status` enum('active','block') NOT NULL DEFAULT 'active',
  `address` longtext DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `shopname` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `pancard` varchar(191) DEFAULT NULL,
  `aadharcard` varchar(12) DEFAULT NULL,
  `pancardpic` longtext DEFAULT NULL,
  `aadharcardpicfront` longtext DEFAULT NULL,
  `aadharcardpicback` longtext DEFAULT NULL,
  `passbook` longtext DEFAULT NULL,
  `gstpic` longtext DEFAULT NULL,
  `profile` longtext DEFAULT NULL,
  `msme` longtext DEFAULT NULL,
  `otherdoc` longtext DEFAULT NULL,
  `kyc` enum('pending','initiated','submitted','verified','rejected') NOT NULL DEFAULT 'pending',
  `callbackurl` longtext DEFAULT NULL,
  `remark` longtext DEFAULT NULL,
  `resetpwd` enum('default','changed') NOT NULL DEFAULT 'default',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'admin',
  `stock` double(11,0) NOT NULL DEFAULT 0,
  `account` varchar(250) DEFAULT NULL,
  `bank` varchar(250) DEFAULT NULL,
  `ifsc` varchar(250) DEFAULT NULL,
  `device_id` varchar(250) DEFAULT NULL,
  `merchant_id` varchar(250) DEFAULT NULL,
  `merchant_key` varchar(250) DEFAULT NULL,
  `merchant_upi` varchar(250) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `wallet_settle_amount` double(11,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `agentcode`, `name`, `email`, `mobile`, `alternate_mobile`, `password`, `remember_token`, `otpverify`, `otpresend`, `payoutwallet`, `mainwallet`, `securewallet`, `lockedamount`, `role_id`, `parent_id`, `company_id`, `scheme_id`, `status`, `address`, `district`, `shopname`, `city`, `state`, `pincode`, `pancard`, `aadharcard`, `pancardpic`, `aadharcardpicfront`, `aadharcardpicback`, `passbook`, `gstpic`, `profile`, `msme`, `otherdoc`, `kyc`, `callbackurl`, `remark`, `resetpwd`, `created_at`, `updated_at`, `deleted_at`, `type`, `stock`, `account`, `bank`, `ifsc`, `device_id`, `merchant_id`, `merchant_key`, `merchant_upi`, `website`, `wallet_settle_amount`) VALUES
(1, 'ADM1001', 'Admin', 'admin@gmail.com', '1234567890', '1234567891', '$2y$10$dYnEhfXUiUOg/6d7rcTsluiCUNc7kOW.zxsBL0oBtbDC.VDBJIBSG', 'MleUGORwTNSrbtVznmYSxD8eh4u1yeLWRTjksLBmjQ0nu3FfGQ8VymLSq0Xw', 'yes', 0, 8919.64, 2130047.80, 0.00, 0.00, 1, 1, 1, 1, 'active', '12', 'NOIDA', NULL, 'NOIDA', 'UP WEST', '127987', 'asasa31', '123456789012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'verified', NULL, NULL, 'changed', NULL, '2024-10-03 11:07:38', NULL, 'admin', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'dsasdas', NULL, 0.00),
(2, 'PAPI20201', 'Manish Kumar', 'Manishkumar14062001@gmail.com', '6396975249', NULL, '$2y$10$yFsBB3.3lQMApGgTdWtjaOGhEEFHIS9z8gT6h.XS.1XqmJeEbvkTO', NULL, 'yes', 0, 0.00, 0.00, 0.00, 0.00, 3, 1, 1, 1, 'active', 'Syohara Road\nSheela', 'delhi', 'Nanakpay', 'Dhampur', 'UP EAST', '246761', 'LIEPK5277D', '875654459856', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'verified', NULL, NULL, 'changed', '2024-10-02 23:18:14', '2024-10-02 23:24:20', NULL, 'admin', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00),
(3, 'PAPI20202', 'demo', 'demo@gmail.com', '9876543765', NULL, '$2y$10$TGcgwkrn9WPxuz0B1qg3qeGYxrPGQfs4PhDGZeytOjqfh0TlOw8L6', NULL, 'yes', 0, 300.00, 101.00, 0.00, 100.00, 3, 1, 2, 2, 'active', 'sfdgh', 'delhi', 'demo', 'Ghaziabad', 'Uttar Pradesh', '201009', 'AHPPN6734H', '767846746535', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'verified', NULL, NULL, 'changed', '2024-10-02 23:29:36', '2024-10-03 07:38:46', NULL, 'admin', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apilogs`
--
ALTER TABLE `apilogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apis`
--
ALTER TABLE `apis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apitokens`
--
ALTER TABLE `apitokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `apitokens_token_unique` (`token`);

--
-- Indexes for table `circles`
--
ALTER TABLE `circles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companydatas`
--
ALTER TABLE `companydatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintsubjects`
--
ALTER TABLE `complaintsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_permissions`
--
ALTER TABLE `default_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmt_accounts`
--
ALTER TABLE `dmt_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundbanks`
--
ALTER TABLE `fundbanks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundreports`
--
ALTER TABLE `fundreports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loadcashes_pmethod_id_foreign` (`paymode`),
  ADD KEY `loadcashes_netbank_id_foreign` (`fundbank_id`),
  ADD KEY `loadcashes_status_id_foreign` (`status`),
  ADD KEY `loadcashes_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `loginsessions`
--
ALTER TABLE `loginsessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_500`
--
ALTER TABLE `log_500`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_apis`
--
ALTER TABLE `log_apis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_callbacks`
--
ALTER TABLE `log_callbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_sessions`
--
ALTER TABLE `log_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `microlog`
--
ALTER TABLE `microlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`mobile`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `paymodes`
--
ALTER TABLE `paymodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payoutreports`
--
ALTER TABLE `payoutreports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `create_time` (`create_time`);

--
-- Indexes for table `paytmlogs`
--
ALTER TABLE `paytmlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pindatas`
--
ALTER TABLE `pindatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portal_settings`
--
ALTER TABLE `portal_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `create_time` (`create_time`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schemes`
--
ALTER TABLE `schemes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `securedatas`
--
ALTER TABLE `securedatas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `securereports`
--
ALTER TABLE `securereports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `create_time` (`create_time`);

--
-- Indexes for table `service_managers`
--
ALTER TABLE `service_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `statuslogs`
--
ALTER TABLE `statuslogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upiloads`
--
ALTER TABLE `upiloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apilogs`
--
ALTER TABLE `apilogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `apis`
--
ALTER TABLE `apis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apitokens`
--
ALTER TABLE `apitokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `circles`
--
ALTER TABLE `circles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companydatas`
--
ALTER TABLE `companydatas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaintsubjects`
--
ALTER TABLE `complaintsubjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `default_permissions`
--
ALTER TABLE `default_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dmt_accounts`
--
ALTER TABLE `dmt_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fundbanks`
--
ALTER TABLE `fundbanks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fundreports`
--
ALTER TABLE `fundreports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loginsessions`
--
ALTER TABLE `loginsessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log_500`
--
ALTER TABLE `log_500`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_apis`
--
ALTER TABLE `log_apis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_callbacks`
--
ALTER TABLE `log_callbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_sessions`
--
ALTER TABLE `log_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `microlog`
--
ALTER TABLE `microlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymodes`
--
ALTER TABLE `paymodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payoutreports`
--
ALTER TABLE `payoutreports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paytmlogs`
--
ALTER TABLE `paytmlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pindatas`
--
ALTER TABLE `pindatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portal_settings`
--
ALTER TABLE `portal_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schemes`
--
ALTER TABLE `schemes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `securedatas`
--
ALTER TABLE `securedatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `securereports`
--
ALTER TABLE `securereports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_managers`
--
ALTER TABLE `service_managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuslogs`
--
ALTER TABLE `statuslogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upiloads`
--
ALTER TABLE `upiloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
