-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2022 at 01:31 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `godelive_posdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'CAT6 UTP Cable (PVC)', 1, 15, NULL, '2022-05-21 09:20:14', '2022-05-21 09:20:14'),
(2, 'CAT6 UTP Cable (LSZH)', 1, 15, NULL, '2022-05-21 09:20:30', '2022-05-21 09:20:30'),
(3, 'CAT6 UTP Patch Cord (PVC)', 1, 15, NULL, '2022-05-21 09:21:22', '2022-05-21 09:21:22'),
(4, 'UTP CAT6 Moduler', 1, 15, NULL, '2022-05-21 09:21:50', '2022-05-21 09:21:50'),
(5, 'UTP Patch Panel', 1, 15, NULL, '2022-05-21 09:22:26', '2022-05-21 09:22:26'),
(6, 'Cable Manager', 1, 15, NULL, '2022-05-21 09:22:48', '2022-05-21 09:22:48'),
(7, 'Faceplate', 1, 15, NULL, '2022-05-21 09:23:06', '2022-05-21 09:23:06'),
(8, 'Fiber Cable', 1, 15, NULL, '2022-05-21 09:23:28', '2022-05-21 09:23:28'),
(9, 'Fiber Patch Cord', 1, 15, NULL, '2022-05-21 09:23:40', '2022-05-21 09:23:40'),
(10, 'Fiber Pigtails', 1, 15, NULL, '2022-05-21 09:23:52', '2022-05-21 09:23:52'),
(11, 'Fiber Panel', 1, 15, NULL, '2022-05-21 09:24:08', '2022-05-21 09:24:08'),
(12, 'PVC Pipe', 1, 15, NULL, '2022-05-21 09:24:27', '2022-05-21 09:24:27'),
(13, 'Flexible Pipe', 1, 15, NULL, '2022-05-21 09:24:35', '2022-05-21 09:24:35'),
(14, 'Cable Tray', 1, 15, NULL, '2022-05-21 09:24:42', '2022-05-21 09:24:42'),
(15, 'Cable Ladder', 1, 15, NULL, '2022-05-21 09:24:49', '2022-05-21 09:24:49'),
(16, 'Camera', 1, 15, NULL, '2022-05-21 09:25:38', '2022-05-21 09:25:38'),
(17, 'NVR', 1, 15, NULL, '2022-05-21 09:25:45', '2022-05-21 09:25:45'),
(18, 'Conector', 1, 15, NULL, '2022-05-21 09:25:54', '2022-05-21 09:25:54'),
(19, 'Network Switch', 1, 15, NULL, '2022-05-21 09:26:08', '2022-05-21 09:26:08'),
(20, 'Network Rack', 1, 15, NULL, '2022-05-21 09:26:26', '2022-05-21 09:26:26'),
(21, 'Accses control', 1, 15, NULL, '2022-05-21 09:27:06', '2022-05-21 09:27:06'),
(22, 'Hardware Component', 1, 17, NULL, '2022-05-21 13:15:08', '2022-05-21 13:15:08'),
(24, 'Door Lock Accessories', 1, 17, NULL, '2022-05-21 13:47:55', '2022-05-21 13:47:55'),
(25, 'PC Component', 1, 17, NULL, '2022-05-21 14:00:03', '2022-05-21 14:00:03'),
(26, 'Raised Floor Accessories', 1, 17, NULL, '2022-05-21 14:08:18', '2022-05-21 14:08:18'),
(27, 'Raised Floor', 1, 17, NULL, '2022-05-21 14:08:48', '2022-05-21 14:08:48'),
(28, 'Server', 1, 17, NULL, '2022-05-21 14:22:07', '2022-05-21 14:22:07'),
(29, 'Antivirus Solutions', 1, 17, NULL, '2022-05-21 14:27:42', '2022-05-21 14:27:42'),
(30, 'PDU (Power Distribution Unit For Rack)', 1, 17, NULL, '2022-05-21 14:30:55', '2022-05-21 14:30:55'),
(31, 'FOOD', 1, 15, NULL, '2022-06-02 09:30:47', '2022-06-02 09:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Toggi Service Ltd', '01704112423', 'neshar@toggi.services', 'Bashundhora Residentcial Area ,Level-3, Plot- 262 & 263, Road-1, Dhaka 1229', 1, 15, NULL, '2022-05-21 07:36:17', '2022-05-21 07:36:17'),
(2, 'Pexer Bangladesh Ltd.', '01713090424', NULL, 'Gulshan', 1, 15, NULL, '2022-05-21 07:38:47', '2022-05-21 07:38:47'),
(4, 'HAMIM Group', '01321177531', NULL, 'Times Media Limited, Building, 387, Tejgao, Dhaka', 1, 15, NULL, '2022-05-21 07:41:13', '2022-05-21 07:41:13'),
(5, 'Universal Mens Ware', '01708450066', 'nasim@umlbd.com', 'Narayangonj Adomjee EPZ', 1, 15, NULL, '2022-05-21 07:53:06', '2022-05-21 07:53:06'),
(6, 'Bashundhara Group', '01711822223', 'uzzal.mollah@bg.com.bd', '142, Block B , Bashundhara  R/A,Dhaka-1229 ,Bangladesh', 1, 1, NULL, '2022-05-21 08:00:12', '2022-05-21 08:00:12'),
(7, 'MGH Group Ltd/  Bangladesh Express  Ltd(BANEX)', '01713144479', 'hasnine.wafiq@mghgroup.com', 'jahangir Tower, 5th floor,10, Karwan  Bazar,Dhaka.', 1, 1, NULL, '2022-05-21 08:01:41', '2022-05-21 08:01:41'),
(8, 'Walton Group', '01678-028-975', 'shafi@waltonbd.com', 'Plot-1088, Road-80ft(2), Block-I,P.OKhilkhet, P.S-Vatara,Bashundhara R/A,  Dhaka-1229.', 1, 1, NULL, '2022-05-21 08:02:50', '2022-05-21 08:02:50'),
(9, 'Transcom Ltd', '01713069178', 'awal@transcombd.com', 'GULSHAN TOWER,PLOT N0.31, ROAD  N0.53, GULSHAN NORTH CIA,  DHAKA.1212, BANGLADESH', 1, 1, NULL, '2022-05-21 08:03:38', '2022-05-21 08:03:38'),
(10, 'Evercare Hospital Dhaka', '01812-390297', 'sudipta.mondal@evercarebd.com;', 'Bashundhara,Plot: 81 Block: E, Dhaka  1229', 1, 1, NULL, '2022-05-21 08:04:36', '2022-05-21 08:04:36'),
(11, 'SKF Pharmaceuticals', '01713380403', 'ashfaqur.rahman@skf.transcombd.com', 'Squibb Road, Cherag Ali, Tongi,  Gazipur,Bangladesh', 1, 1, NULL, '2022-05-21 08:05:12', '2022-05-21 08:05:12'),
(12, 'Standard Bank Ltd', '01715865458', 'arif@standardbankbd.com', 'Metropolitan Chamber Building(3rd  Floor)122-124, Motijheel C/A, Dhaka-1000.', 1, 1, NULL, '2022-05-21 08:06:04', '2022-05-21 08:06:04'),
(13, 'Confidence Group', '01730354666', 'zobayer.hossain@cg-bd.com', 'Level 6-7, Unique Trade Centre, 8  Panthapath, Dhaka 1215', 1, 1, NULL, '2022-05-21 08:07:49', '2022-05-21 08:07:49'),
(14, 'BBS CABLES Limited', '01723588986', 'shahjalal@bbscables.com.bd', 'Ga-64, Middle Badda, Progoti  Swarani,Dhaka-1212, Bangladesh.', 1, 1, NULL, '2022-05-21 08:08:34', '2022-05-21 08:08:34'),
(15, 'Lab Aid Group', '01719174357', 'alireza@labaidgroup.com', 'House-362, 363, New Medical Rd,  Sylhet 3100', 1, 1, NULL, '2022-05-21 08:09:15', '2022-05-21 08:09:15'),
(16, 'Beximco Holdings ltd', '01787680806', 'abdur.roshid@bol-online.com', 'Plot No # 19, Road # 35, Gulshan,  Dhaka.', 1, 1, NULL, '2022-05-21 08:09:59', '2022-05-21 08:09:59'),
(17, 'General Pharmaceuticals  Ltd', '01844095685', 'salekin.comm@generalpharma.com', 'Sara Aftab Tower, 29 Ring  Road,Shymoli, Adabor, Dhaka-1207', 1, 1, NULL, '2022-05-21 08:10:44', '2022-05-21 08:10:44'),
(18, 'test', '12121212121', NULL, 'test address', 1, NULL, NULL, '2022-05-24 07:00:24', '2022-05-24 07:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Pending,1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `date`, `description`, `status`, `created_by`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, '1', '2022-05-31', 'This is for test perpose', 1, 1, 1, '2022-05-31 05:52:28', '2022-05-31 05:52:55'),
(2, '2', '2022-05-31', 'NA', 1, 15, 15, '2022-05-31 07:32:41', '2022-05-31 07:33:04'),
(4, '3', '2022-06-02', NULL, 1, 15, 15, '2022-06-02 16:44:50', '2022-06-02 16:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `selling_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `date`, `invoice_id`, `category_id`, `product_id`, `selling_qty`, `unit_price`, `selling_price`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022-05-31', 1, 1, 1, 3, 20000, 60000, 1, '2022-05-31 05:52:28', '2022-05-31 05:52:55'),
(2, '2022-05-31', 1, 24, 22, 5, 70000, 350000, 1, '2022-05-31 05:52:28', '2022-05-31 05:52:55'),
(3, '2022-05-31', 2, 1, 1, 50, 14500, 725000, 1, '2022-05-31 07:32:41', '2022-05-31 07:33:04'),
(5, '2022-06-02', 4, 31, 34, 1, 170, 170, 1, '2022-06-02 16:44:50', '2022-06-02 16:45:01');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_000000_create_users_table', 2),
(5, '2022_04_18_053336_create_suppliers_table', 3),
(6, '2022_04_19_071312_create_customers_table', 4),
(7, '2022_04_20_054315_create_units_table', 5),
(8, '2022_04_23_053557_create_categories_table', 6),
(9, '2022_04_24_051103_create_products_table', 7),
(12, '2022_04_25_082242_create_purchases_table', 8),
(13, '2022_05_08_061615_create_invoices_table', 9),
(14, '2022_05_08_061836_create_invoice_details_table', 9),
(15, '2022_05_08_061924_create_payments_table', 9),
(16, '2022_05_08_062009_create_payment_details_table', 9),
(17, '2022_05_25_121310_create_purchase_infos_table', 10),
(18, '2022_05_25_121442_create_purchase_payments_table', 10),
(19, '2022_05_25_121538_create_purchase_payment_details_table', 10);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paid_status` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `customer_id`, `paid_status`, `paid_amount`, `due_amount`, `total_amount`, `discount_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'partial_paid', 305000, 95000, 400000, 10000, '2022-05-31 05:52:28', '2022-05-31 05:59:36'),
(2, 2, 2, 'partial_paid', 362500, 362500, 725000, NULL, '2022-05-31 07:32:41', '2022-05-31 07:34:17'),
(3, 4, 2, 'full_paid', 170, 0, 170, NULL, '2022-06-02 16:44:50', '2022-06-02 16:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_id`, `current_paid_amount`, `date`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 300000, '2022-05-31', NULL, '2022-05-31 05:52:28', '2022-05-31 05:52:28'),
(2, 1, 5000, '2022-05-31', 1, '2022-05-31 05:59:36', '2022-05-31 05:59:36'),
(3, 2, 0, '2022-05-31', NULL, '2022-05-31 07:32:41', '2022-05-31 07:32:41'),
(4, 2, 362500, '2022-05-31', 15, '2022-05-31 07:34:17', '2022-05-31 07:34:17'),
(5, 4, 170, '2022-06-02', NULL, '2022-06-02 16:44:50', '2022-06-02 16:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `supplier_id`, `unit_id`, `category_id`, `name`, `quantity`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Rosenberger Cable ,Grey, 23AWG, Part # CP11-141-12', 55, 1, 15, NULL, '2022-05-21 09:29:07', '2022-05-31 07:33:04'),
(2, 1, 2, 5, 'Rosenberger Patch Panel, 24-port (with keystones);Part #CP41-431-03-E', 0, 1, 15, NULL, '2022-05-21 09:38:18', '2022-05-29 10:32:06'),
(3, 1, 2, 3, '1M Patch Cord Cat6 Rosenberger Part # CP61-4XX-1P1', 0, 1, 15, NULL, '2022-05-21 09:40:11', '2022-05-21 09:40:11'),
(4, 1, 2, 3, '3M UTP Patch Cord Rosenberger Part #CP61-4XX-1P3', 0, 1, 15, NULL, '2022-05-21 10:56:07', '2022-05-26 12:21:05'),
(5, 1, 2, 3, '5M UTP Patch Cord Cat6  Rosenberger Part # CP61-4XX-', 0, 1, 15, 15, '2022-05-21 10:57:17', '2022-05-21 10:57:34'),
(6, 1, 2, 4, 'Cat6 Moduler UTP6 Rosenberger. Part #CP31-13C-14', 0, 1, 15, NULL, '2022-05-21 10:59:09', '2022-05-30 12:37:53'),
(7, 1, 2, 5, 'Cat6 UTP Modular Patch Panel, 24-port (with keystones)Rosenberger ;Part #CP41-431-03-E', 0, 1, 15, NULL, '2022-05-21 11:00:48', '2022-05-30 12:33:52'),
(8, 1, 2, 6, 'Cable Manager 1U, metal Rosenberger Part#CP42-221-01', 0, 1, 15, 15, '2022-05-21 11:02:35', '2022-05-21 11:09:34'),
(9, 4, 2, 21, 'Suprema Biolite-N2', 0, 1, 15, NULL, '2022-05-21 11:04:47', '2022-05-21 11:04:47'),
(10, 4, 2, 21, 'Suprema BioStation L2', 0, 1, 15, NULL, '2022-05-21 11:05:31', '2022-05-21 11:05:31'),
(11, 4, 2, 21, 'Suprema BioEntry P2', 0, 1, 15, NULL, '2022-05-21 11:06:08', '2022-05-21 11:06:08'),
(12, 4, 2, 21, 'Suprema FaceStation F2', 0, 1, 15, NULL, '2022-05-21 11:07:05', '2022-05-21 11:07:05'),
(13, 4, 2, 21, 'Suprema FaceStation 2', 0, 1, 15, NULL, '2022-05-21 11:07:44', '2022-05-21 11:07:44'),
(14, 4, 2, 21, 'Suprema Face Lite', 0, 1, 15, 15, '2022-05-21 11:07:45', '2022-05-21 11:09:03'),
(15, 4, 2, 16, 'VIVOTEK FD9367-HV', 0, 1, 15, NULL, '2022-05-21 11:11:03', '2022-05-21 11:11:03'),
(16, 4, 2, 16, 'VIVOTEK IB9367-H', 0, 1, 15, NULL, '2022-05-21 11:11:51', '2022-05-21 11:11:51'),
(17, 4, 2, 17, 'VIVOTEK -32CH-ND9441P', 0, 1, 15, NULL, '2022-05-21 11:13:33', '2022-05-21 11:13:33'),
(18, 4, 2, 17, 'VIVOTEK -16CH-ND9341P', 0, 1, 15, NULL, '2022-05-21 11:14:03', '2022-05-21 11:14:03'),
(19, 2, 2, 22, 'HDD( Hard Disk)', 0, 1, 17, NULL, '2022-05-21 13:15:55', '2022-05-21 13:23:39'),
(20, 2, 2, 22, 'Western Digital Surveillance HDD PURPLE 6TB', 0, 1, 17, NULL, '2022-05-21 13:19:13', '2022-05-21 14:45:25'),
(21, 8, 2, 19, 'CISCO', 0, 1, 17, NULL, '2022-05-21 13:41:46', '2022-05-21 13:44:54'),
(22, 3, 5, 24, 'EM Lock(single Door)', 5, 1, 17, NULL, '2022-05-21 13:48:31', '2022-05-31 05:52:55'),
(23, 3, 5, 24, 'UL Bracket', 0, 1, 17, NULL, '2022-05-21 13:48:59', '2022-05-26 07:39:31'),
(24, 3, 5, 24, 'ZL Bracket', 0, 1, 17, NULL, '2022-05-21 13:49:25', '2022-05-21 14:15:42'),
(25, 9, 5, 25, 'Brand PC: Dell', 0, 1, 17, NULL, '2022-05-21 14:04:20', '2022-05-21 14:13:18'),
(26, 1, 8, 27, 'ZT/AT Floor', 0, 1, 17, NULL, '2022-05-21 14:09:37', '2022-05-21 14:13:14'),
(27, 1, 2, 26, 'Panel Lifter', 0, 1, 17, NULL, '2022-05-21 14:10:13', '2022-05-21 14:13:10'),
(28, 1, 8, 27, 'Installation JOB', 0, 1, 17, NULL, '2022-05-21 14:10:44', '2022-05-21 14:10:44'),
(29, 6, 2, 28, 'DELL EMC', 0, 1, 17, NULL, '2022-05-21 14:23:24', '2022-05-24 07:00:33'),
(30, 6, 5, 29, 'ESET', 0, 1, 17, NULL, '2022-05-21 14:28:08', '2022-05-24 05:24:06'),
(31, 11, 5, 20, 'Toten', 0, 1, 17, NULL, '2022-05-21 14:34:02', '2022-05-21 14:35:40'),
(32, 12, 2, 16, 'Dahua', 0, 1, 17, NULL, '2022-05-21 14:38:52', '2022-05-21 14:43:44'),
(33, 12, 2, 17, 'Dahua', 0, 1, 17, NULL, '2022-05-21 14:39:15', '2022-05-21 14:43:37'),
(34, 13, 2, 31, 'Beef Chees Burger', 49, 1, 15, NULL, '2022-06-02 09:31:51', '2022-06-02 16:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_info_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `buying_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchase_info_id`, `category_id`, `product_id`, `date`, `buying_qty`, `unit_price`, `buying_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-05-31', 8, 6000, 48000, 1, 1, NULL, '2022-05-31 05:36:03', '2022-05-31 05:37:18'),
(2, 1, 24, 22, '2022-05-31', 10, 15000, 150000, 1, 1, NULL, '2022-05-31 05:36:03', '2022-05-31 05:37:18'),
(3, 2, 1, 1, '2022-05-31', 100, 13500, 1350000, 1, 15, NULL, '2022-05-31 07:23:40', '2022-05-31 07:23:49'),
(4, 3, 31, 34, '2022-06-02', 50, 80, 4000, 1, 15, NULL, '2022-06-02 09:32:56', '2022-06-02 09:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_infos`
--

CREATE TABLE `purchase_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Pending,1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_infos`
--

INSERT INTO `purchase_infos` (`id`, `purchase_no`, `date`, `description`, `status`, `created_by`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, '01-test', '2022-05-31', 'EM Lock', 1, 1, 1, '2022-05-31 05:36:03', '2022-05-31 05:37:18'),
(2, 'QAPL-GTC-31052022', '2022-05-31', NULL, 1, 15, 15, '2022-05-31 07:23:40', '2022-05-31 07:23:49'),
(3, 'FOOD-QAPL', '2022-06-02', NULL, 1, 15, 15, '2022-06-02 09:32:56', '2022-06-02 09:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payments`
--

CREATE TABLE `purchase_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_info_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `paid_status` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_payments`
--

INSERT INTO `purchase_payments` (`id`, `purchase_info_id`, `supplier_id`, `paid_status`, `paid_amount`, `due_amount`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'partial_paid', 65000, 133000, 198000, '2022-05-31 05:36:03', '2022-05-31 05:58:10'),
(2, 2, 1, 'partial_paid', 67500, 1282500, 1350000, '2022-05-31 07:23:40', '2022-05-31 07:23:40'),
(3, 3, 13, 'full_due', 0, 4000, 4000, '2022-06-02 09:32:56', '2022-06-02 09:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payment_details`
--

CREATE TABLE `purchase_payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_info_id` int(11) NOT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_payment_details`
--

INSERT INTO `purchase_payment_details` (`id`, `purchase_info_id`, `current_paid_amount`, `date`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 30000, '2022-05-31', NULL, '2022-05-31 05:36:03', '2022-05-31 05:36:03'),
(2, 1, 30000, '2022-05-31', 1, '2022-05-31 05:57:28', '2022-05-31 05:57:28'),
(3, 1, 5000, '2022-05-31', 1, '2022-05-31 05:58:10', '2022-05-31 05:58:10'),
(4, 2, 67500, '2022-05-31', NULL, '2022-05-31 07:23:40', '2022-05-31 07:23:40'),
(5, 3, 0, '2022-06-02', NULL, '2022-06-02 09:32:56', '2022-06-02 09:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'GateWay Communication', '02-9559403', 'gateway@gmail.com', '54,Stadium Super Market, Dhaka-1000', 1, 1, 15, '2022-05-21 07:26:07', '2022-05-21 07:50:01'),
(2, 'SMART Technology(BD) Ltd.', '01777734124', 'shahidul.islam@smart-bd.com', 'Jahir Smart Tower: 205/1, & 205/1/A, West Kafrul, Begum Rokeya, Sharani, Taltola', 1, 15, NULL, '2022-05-21 07:30:06', '2022-05-21 07:30:06'),
(3, 'DigiMark', '01979-234342', 'digimark@gmail.com', '1/C, Rahmania International Complex (1st Floor 28, Toyenbee Circular Road, Dhaka 1000', 1, 1, NULL, '2022-05-21 07:30:14', '2022-05-21 07:30:14'),
(4, 'Express Systems Ltmited.(ESL)', '01973439081', 'Atik.zaman@esl.com.bd', '8/2, Road-01, Shamoli, Dhaka-1207', 1, 15, NULL, '2022-05-21 07:43:01', '2022-05-21 07:43:01'),
(5, 'Global Brand Pvt. Ltd.', '01729-200300', 'info@globalbrand.com.bd', '19/2, (3rd-7th floor)West, Panthapath, Dhaka 1207', 1, 1, 15, '2022-05-21 07:47:48', '2022-05-21 07:48:48'),
(6, 'Startech Engineering Ltd.', '01711488097', 'kazi@startech.com.bd', '6th floor, 28 Kazi Nazrul Islam Ave,Navana zohura square, Dhaka 1000', 1, 15, NULL, '2022-05-21 07:48:24', '2022-05-21 07:48:24'),
(7, 'BRIGHT-i SYSTEMS LIMITED', '+088 02 8091215', 'info@brighti.com.bd', 'House : 4/8, Plot : B-9  Eastern Housing Project 2  Kallyanpur (South)  Dhaka-1207, Bangladesh', 1, 1, NULL, '2022-05-21 07:51:02', '2022-05-21 07:51:02'),
(8, 'RASA Technologies', '01315644733', 'info@rasatechbd.com', 'RASA Tower, 222 Elephent Road, Dhaka', 1, 17, NULL, '2022-05-21 13:40:29', '2022-05-21 13:40:29'),
(9, 'Estern IT', '01936007504', 'sales@eit.com.bd', 'Shop 228, Gause PAK Bhaban(3rd Floor Toyenbee circuler Road Mootijheel', 1, 17, NULL, '2022-05-21 13:59:01', '2022-05-21 13:59:01'),
(10, 'Star Tech & Engineering Ltd', '01711488097', 'kazi@startech.com.bd', 'Kusholi Bhaban, 6th Floor, 238/1m Taltola, Agargaon, Dhaka', 1, 17, NULL, '2022-05-21 14:21:34', '2022-05-21 14:21:34'),
(11, 'South Bangla Coomputers', '01719048351', 'Raju@southbangla.com', '100, Parjoar Bhaban, Elephent Road, Dhaka-1205', 1, 17, NULL, '2022-05-21 14:32:39', '2022-05-21 14:32:39'),
(12, 'SydenySun International Ltd.', '017176223719', 'NA@SydenySun.com', 'House-13, 2nd Floor, Road-3, Block-E, Rampura , Banasree, Dhaka-1219', 1, 17, NULL, '2022-05-21 14:38:00', '2022-05-21 14:38:00'),
(13, 'Md Istiaque Hossain Mitul', '01309009401', 'Istiaque.hossain@quintetalliance.com', '239/3 Middle Pirerbag, 1st floor, Kamal Shoroni Road, Mirpur, Dhaka 1216', 1, 15, NULL, '2022-06-02 09:28:42', '2022-06-02 09:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Box', 1, 15, NULL, '2022-05-21 08:12:01', '2022-05-21 08:12:01'),
(2, 'Pcs', 1, 15, NULL, '2022-05-21 08:12:09', '2022-05-21 08:12:09'),
(3, 'RFT', 1, 15, NULL, '2022-05-21 08:12:26', '2022-05-21 08:12:26'),
(4, 'MTR', 1, 15, NULL, '2022-05-21 08:12:32', '2022-05-21 08:12:32'),
(5, 'Nos', 1, 15, 17, '2022-05-21 08:12:45', '2022-05-21 14:32:54'),
(6, 'LOT', 1, 15, NULL, '2022-05-21 08:13:54', '2022-05-21 08:13:54'),
(7, 'JOB', 1, 15, NULL, '2022-05-21 08:14:03', '2022-05-21 08:14:03'),
(8, 'SFT', 1, 15, NULL, '2022-05-21 08:14:24', '2022-05-21 08:14:24'),
(9, 'Pair', 1, 15, NULL, '2022-05-21 08:14:57', '2022-05-21 08:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'maksud rifat', 'rifat@quintetalliance.com', NULL, '$2y$10$oJRndS1JecFNIEmO/7/JdOiteaXeHIfaAg1aVvCt6JKyrwnbZSPfy', '01632594374', 'South Pirerbag, Mirpur, Dhaka, 1216', 'Male', '202205311221WhatsApp Image 2022-05-16 at 2.12.45 PM.jpeg', 1, NULL, NULL, '2022-05-31 06:21:18'),
(15, 'Admin', 'MD Istiaque Hossain', 'Istiaque.hossain@quintetalliance.com', NULL, '$2y$10$K4tE0wb.zaCvqZkQbov3BOMR8yVva8tB1.SyTpoNnNkd4JLUTFSDm', '01309009401', '33/A, Dhanmondi road-07, Dhaka-1205', 'Male', NULL, 1, NULL, '2022-05-21 07:09:31', '2022-05-21 07:14:18'),
(16, 'Admin', 'Showmitra Karmakar', 's.karmakar@quintetalliance.com', NULL, '$2y$10$YaHR5wuR7DWX/zwOMO.xTu0Cbkf5WoIz8JzTU5ItUG11bJ22ttxni', NULL, NULL, NULL, NULL, 1, NULL, '2022-05-21 07:10:34', '2022-05-21 07:10:34'),
(17, 'User', 'Rannu', 'Rannu@quintetalliance.com', NULL, '$2y$10$yuNuNTZ7PNIiVzzctPFIreiun2OJgWDaObllY9ymvNsgHkvqCUmMW', NULL, NULL, NULL, NULL, 1, NULL, '2022-05-21 07:12:03', '2022-05-21 07:12:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_infos`
--
ALTER TABLE `purchase_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_payment_details`
--
ALTER TABLE `purchase_payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase_infos`
--
ALTER TABLE `purchase_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_payment_details`
--
ALTER TABLE `purchase_payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
