-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2020 at 10:40 AM
-- Server version: 5.6.47-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b2b`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `privacy_policy` text COLLATE utf8mb4_unicode_ci,
  `terms_conditions` text COLLATE utf8mb4_unicode_ci,
  `about_us` text COLLATE utf8mb4_unicode_ci,
  `linked_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `privacy_policy`, `terms_conditions`, `about_us`, `linked_in`, `instagram`, `whatsapp`, `facebook`, `created_at`, `updated_at`) VALUES
(1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 'https://www.linkedin.com/', 'https://www.instagram.com/', 'https://web.whatsapp.com/', 'https://www.facebook.com/', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Wheel pressure monitor', '2020-02-26 09:12:00', '2020-02-29 18:50:03'),
(2, 'parking Camera', '2020-02-26 09:54:08', '2020-02-26 09:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_categories`
--

CREATE TABLE `attribute_categories` (
  `attribute_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_categories`
--

INSERT INTO `attribute_categories` (`attribute_id`, `category_id`) VALUES
(1, 1),
(1, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'first value', '2020-02-26 09:25:00', '2020-02-29 19:45:31'),
(2, 1, 'second value', '2020-02-26 09:26:00', '2020-02-29 19:45:43'),
(3, 2, 'High quality', '2020-02-26 09:26:00', '2020-02-29 19:46:06'),
(4, 1, 'Third Value', NULL, NULL),
(5, 1, 'Four Value', NULL, NULL),
(6, 1, 'Five Value', NULL, NULL),
(7, 1, 'sexy value', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `land_line` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lang` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_fee` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `user_id`, `name`, `email`, `mobile`, `land_line`, `work_from`, `work_to`, `delivery_from`, `delivery_to`, `address`, `lat`, `lang`, `created_at`, `updated_at`, `delivery_fee`) VALUES
(1, 1, 'Cairo branche', '', '', '', '', '', '', '', '', 0, 0, '2019-09-29 16:28:54', '2019-09-29 16:28:54', NULL),
(2, 1, 'Alexandria branche', 'xx@gmail.com', '', '', '', '', '', '', '', 0, 0, '2019-09-29 16:29:14', '2019-09-29 16:29:14', NULL),
(3, 75, 'added service updated', 'xxxx@gmail.com', '01098376', '09183217', '10', '12', '100', '300', 'Domittaاااا', 0, 0, '2020-04-23 16:49:21', '2020-04-28 11:30:06', NULL),
(5, 135, 'don branch', 'developer.essam@gmail.com', '+101000709271', '958866', '55665566', '8686', '8966', '96666', 'vudydy', 0, 0, '2020-05-12 20:12:57', '2020-05-12 20:12:57', '8966'),
(6, 135, 'bransh name', 'br@gmail.com', '019938937823', '3231098138381', '12', '18', '3 days', '9 days', 'cairo', 4567, 218712, '2020-06-02 05:56:14', '2020-06-02 05:56:14', '22'),
(8, 148, 'ggghhh', 'gggg@gggg.com', '58555522586', '588566', '5885', '585', '8899', '9999', 'gghhjj', 0, 0, '2020-06-02 05:58:54', '2020-06-03 02:51:56', '58566999'),
(9, 148, 'hem', 'hemm@hhh.com', '088889686653', '5558766797', '99', '999', '854', '889', 'vvvvvvvvvv', 0, 0, '2020-06-02 06:12:12', '2020-06-02 06:12:12', '99'),
(11, 157, 'new branch', 'developer.essayyyymm@gmail.com', '00008080808', '5383868686', '8868686', '8688686', '898968', '868686', 'chchchchhcchhcchch m', 0, 0, '2020-06-19 02:12:51', '2020-06-19 02:12:51', '8686868'),
(12, 1, 'bransh name', 'brasa@gmail.com', '019938937823', '3231098138381', '12', '18', '3 days', '9 days', 'cairo', 4567, 218712, '2020-06-19 02:16:04', '2020-06-19 02:16:04', '22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Auto', NULL, 'categories/April2020/qJBFgJKivWZhjSnZZUgL.png', '2020-04-11 15:31:00', '2020-04-28 21:19:43'),
(2, 'Electronics', NULL, 'categories/April2020/A24PZJ3J7e7RxgQdZGIK.png', '2020-04-11 15:32:00', '2020-04-25 16:23:52'),
(3, 'Food', NULL, 'categories/April2020/2EEANLXxVQ2ZSjhtv3IE.png', '2020-04-11 15:34:00', '2020-04-25 16:26:03'),
(4, 'Medicine', NULL, 'categories/April2020/G9HrPPHSqj3UnCP2ibkq.png', '2020-04-11 15:35:00', '2020-04-25 17:22:42'),
(5, 'Security', NULL, 'categories/April2020/k4aL84NIkUY4pujUztCd.png', '2020-04-11 15:35:00', '2020-04-25 16:44:27'),
(6, 'Auto Accessories', 1, '/categories/image115747.png', '2020-04-11 15:36:00', '2020-05-02 15:24:54'),
(7, 'Auto Parts', 1, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 15:37:00', '2020-04-25 18:13:34'),
(8, 'Auto Repair & Decoration', 1, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 15:37:00', '2020-04-25 18:16:19'),
(9, 'Auto Safety', 1, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 15:38:00', '2020-04-25 18:17:32'),
(10, 'Motorcycle Parts & Stocks', 1, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 15:38:00', '2020-04-25 18:23:41'),
(11, 'Related Products', 1, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 15:38:00', '2020-04-25 18:24:21'),
(13, 'Car Accessories', 6, 'categories/April2020/nXCJoaN76ui5iV1dNx9q.jpg', '2020-04-11 15:40:00', '2020-04-28 21:19:11'),
(14, 'Car Air Conditioning System', 6, 'categories/April2020/RP0N35KiZ6yahhxoVkpA.jpg', '2020-04-11 15:40:00', '2020-04-28 21:23:15'),
(15, 'Car Electronics', 6, 'categories/April2020/ktJJ4842A8yUDEg2cTEh.jpg', '2020-04-11 15:40:00', '2020-04-28 21:22:38'),
(16, 'Car Light & Auto Mirror', 6, 'categories/April2020/mxI9h7GDGNwGUabtuufD.jpg', '2020-04-11 15:41:00', '2020-04-28 21:24:51'),
(17, 'Ratchet Straps & Buckle', 6, 'categories/April2020/8oExPUfSVV9v7iv5EBu1.jpg', '2020-04-11 15:41:00', '2020-04-28 21:26:55'),
(18, 'Tire & Accessories', 6, 'categories/April2020/txaCRTFdrIof2RqQg99i.jpg', '2020-04-11 15:42:00', '2020-04-28 21:27:16'),
(19, 'Auto Winch', 6, 'categories/April2020/dtdT4UmUGa5VEGNbID1D.jpg', '2020-04-11 15:42:00', '2020-04-28 21:27:42'),
(20, 'Fastener & Fitting', 6, 'categories/April2020/me4ecsIue5OQNZK3zz0O.jpg', '2020-04-11 15:42:00', '2020-04-28 21:28:33'),
(21, 'Auto Electrical System', 7, 'categories/April2020/E9s5AnZMgGdx2Pzaujxk.jpg', '2020-04-11 15:43:00', '2020-04-28 21:29:16'),
(22, 'Auto Engine Structure', 7, 'categories/April2020/DXN9RE8qmTeueDNhw6WP.jpg', '2020-04-11 15:43:00', '2020-04-28 21:30:22'),
(23, 'Auto Parts', 7, 'categories/April2020/MKgU6Iq180DpmUuomEKR.png', '2020-04-11 15:43:00', '2020-04-28 21:30:57'),
(24, 'Crank Mechanism', 7, 'categories/April2020/OuSEgj2PMZ5eoOYDvqFM.jpg', '2020-04-11 15:44:00', '2020-04-28 21:31:30'),
(25, 'Auto Engine', 7, 'categories/April2020/6DqcNRsfUG6R8TlSrOvR.jpg', '2020-04-11 15:44:00', '2020-04-28 21:32:05'),
(26, 'Auto Repair Equipment & Tools', 8, 'categories/April2020/Lx8ENKTqUOPuNC04ylKx.jpg', '2020-04-11 15:45:00', '2020-04-28 21:32:48'),
(27, 'Car Decoration', 8, 'categories/April2020/A2rQoCzBIewTz1g7rsVo.png', '2020-04-11 15:45:00', '2020-04-28 21:36:15'),
(28, 'Car Maintenance', 8, 'categories/April2020/rilfsrghkjb6x12xPx6v.jpg', '2020-04-11 15:46:00', '2020-04-28 21:38:46'),
(29, 'EV Charging Station', 8, 'categories/April2020/tDlKrMLmgdDhOffz814o.jpg', '2020-04-11 15:46:00', '2020-04-28 21:41:07'),
(30, 'Car Safety', 9, 'categories/April2020/TPV3urPd6WDU5Z2hLt4f.jpg', '2020-04-11 15:46:00', '2020-04-28 21:41:45'),
(31, 'Car Lock, Motorcycle Lock & Bicycle Lock', 9, 'categories/April2020/rj35AHBtZIQa3bSpNVMe.jpg', '2020-04-11 15:47:00', '2020-04-28 21:42:14'),
(32, 'Roadway Safety', 9, 'categories/April2020/OamF1iCk6R8hPVNcBJ7g.jpeg', '2020-04-11 15:47:00', '2020-04-28 21:44:09'),
(33, 'Motorcycle Parts & Accessories', 10, 'categories/April2020/76Ui14blMglJYIo6u9bU.jpg', '2020-04-11 15:48:00', '2020-04-28 21:45:13'),
(34, 'Dirt Bike', 10, 'categories/April2020/mT55c8T1JClYM5cWNDen.jpg', '2020-04-11 15:48:00', '2020-04-28 21:46:02'),
(35, 'Motorcycle', 10, 'categories/April2020/rcrX8GZrPmAYfolBhoJW.jpg', '2020-04-11 15:49:00', '2020-04-28 21:47:02'),
(36, 'Pocket Bike', 10, 'categories/April2020/JWs7oasEI8qlRlEGdJ8w.jpg', '2020-04-11 15:49:00', '2020-04-28 21:49:46'),
(37, 'Other Parts & Accessories', 10, 'categories/April2020/o6wfRBxs3M0ySPxzGlHM.jpg', '2020-04-11 15:50:00', '2020-04-28 21:58:51'),
(38, 'Car Electrical Appliances', 11, 'categories/April2020/oSrMRJ5mEsDUChkdJOAZ.jpg', '2020-04-11 15:50:00', '2020-04-28 21:54:32'),
(39, 'Bus', 11, 'categories/April2020/mRyzw7tpDnljjPh0sSkW.jpg', '2020-04-11 15:51:00', '2020-04-28 21:55:22'),
(40, 'Car', 11, 'categories/April2020/22soHQZblCaFQgNhpXDR.jpg', '2020-04-11 15:51:00', '2020-04-28 21:55:58'),
(41, 'Gas Station & Equipment', 11, 'categories/April2020/eUJGH3MAsWeO5zmUxMTw.png', '2020-04-11 15:51:00', '2020-04-28 21:56:42'),
(42, 'Parking', 11, 'categories/April2020/wwgO49bXSqGAPzNamC28.jpg', '2020-04-11 15:52:00', '2020-04-28 21:59:37'),
(43, 'Secondhand Vehicle & Stocks', 11, 'categories/April2020/hqLTOlcpAcvI108mHbEo.jpg', '2020-04-11 15:52:00', '2020-04-14 14:51:20'),
(44, 'Specialized Vehicle', 11, 'categories/April2020/BI8QSojXaGoqetzX17Gk.jpg', '2020-04-11 15:53:00', '2020-04-28 22:01:40'),
(45, 'Tricycle & Parts', 11, 'categories/April2020/alftY6EXgSAzszo9fPZa.jpg', '2020-04-11 15:53:00', '2020-04-28 22:02:12'),
(46, 'Truck', 11, 'categories/April2020/Hc5s8Ec3O4BfjZqjAps5.jpg', '2020-04-11 15:54:00', '2020-04-28 22:02:32'),
(47, 'Audio & Video Devices', 2, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 15:57:00', '2020-04-25 18:25:42'),
(48, 'Digital Devices', 2, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 15:57:00', '2020-04-25 18:28:02'),
(49, 'Household Electrical Appliances', 2, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 15:57:00', '2020-04-25 18:29:15'),
(50, 'Office Electronics', 2, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 15:58:00', '2020-04-25 18:29:54'),
(51, 'Other Consumer Electronics', 2, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 15:58:00', '2020-04-25 18:30:23'),
(52, 'Audio & Sets', 47, 'categories/April2020/hWeOQE3RbehWm8jzCl8u.jpg', '2020-04-11 16:00:00', '2020-04-28 22:05:05'),
(53, 'Disk, Cassette, Tape & Record', 47, 'categories/April2020/OY4s9PxspUyisro9eToB.jpg', '2020-04-11 16:01:00', '2020-04-28 22:06:02'),
(54, 'Display', 47, 'categories/April2020/LZliyXHj8JDCMo1uGUcT.jpg', '2020-04-11 16:01:00', '2020-04-28 22:06:45'),
(55, 'Earphones,Headphones & Accessories', 47, 'categories/April2020/CjN8jsJS2xd6Sl2bDCZW.jpg', '2020-04-11 16:02:00', '2020-04-28 22:20:16'),
(56, 'HDMI Equipment', 47, 'categories/April2020/iAEnq9aEYhd1Wo3SaUFw.jpg', '2020-04-11 16:02:00', '2020-04-28 22:09:53'),
(57, 'Portable Audio Appliance', 47, 'categories/April2020/HZm3NrgXwufCYwMKxEOq.jpg', '2020-04-11 16:02:00', '2020-04-28 22:10:33'),
(58, 'TV & Parts', 47, 'categories/April2020/8CmPVc1bZ5cjqSpylvOO.jpg', '2020-04-11 16:03:00', '2020-04-28 22:12:09'),
(59, 'Video', 47, 'categories/April2020/j5nWzDmdRKRrEl5hhW2B.jpg', '2020-04-11 16:03:00', '2020-04-28 22:12:35'),
(60, 'Drone & UAV', 47, 'categories/April2020/5ytYLiIdcNo1UubR1Orn.jpg', '2020-04-11 16:03:00', '2020-04-28 22:13:51'),
(61, 'Radio', 47, 'categories/April2020/uwfuXthQSTcC3gwEHFvP.jpg', '2020-04-11 16:04:00', '2020-04-28 22:16:48'),
(62, 'Radio & Cassette Recorders', 47, 'categories/April2020/VzIVTNvpgOfZdh5xqiH5.jpg', '2020-04-11 16:04:00', '2020-04-28 22:18:18'),
(63, 'Remote Control', 47, 'categories/April2020/GekD7cglMpvYUsBJVER0.jpg', '2020-04-11 16:04:00', '2020-04-28 22:22:31'),
(64, 'Battery & Charger', 48, 'categories/April2020/uaJsrXFKFi47zbzEIvMv.jpeg', '2020-04-11 16:05:00', '2020-04-28 22:22:58'),
(65, 'Bluetooth Products', 48, 'categories/April2020/pi5Nz6JOaT3rkFXdCMNH.jpg', '2020-04-11 16:05:00', '2020-04-28 22:23:26'),
(66, 'Entertainment Electronics', 48, 'categories/April2020/2B4e3kjJqgDI0d43yxTr.jpg', '2020-04-11 16:06:00', '2020-04-28 22:23:57'),
(67, 'Mobile Phone & Accessories', 48, 'categories/April2020/WvheglBBaJQcksjUuiOl.jpg', '2020-04-11 16:06:00', '2020-04-28 22:25:05'),
(68, 'Photographic Apparatus', 48, 'categories/April2020/QIUAIb8QpQuAAZBl7oja.jpg', '2020-04-11 16:06:00', '2020-04-28 22:26:10'),
(69, 'Wearable Devices', 48, 'categories/April2020/36bELh6NkFH0FTo2JH9d.jpg', '2020-04-11 16:07:00', '2020-04-28 22:27:41'),
(70, 'Battery, Storage Battery & Charger', 48, 'categories/April2020/GR7khg6IiI4RM2WEQF6F.jpg', '2020-04-11 16:07:00', '2020-04-28 22:28:17'),
(72, 'Laptop', 48, 'categories/April2020/DIIV6YJd6r5lbK43h4Cr.jpg', '2020-04-11 16:08:00', '2020-04-28 22:30:50'),
(74, 'Palm Computer, Pocket PC & PDA', 48, 'categories/April2020/73VfzRlKHdNuYmAwQaqF.jpg', '2020-04-11 16:09:00', '2020-04-28 22:40:13'),
(75, 'Screen Protector', 48, 'categories/April2020/lX79Pijfx3hmCQYgVPNE.jpg', '2020-04-11 16:09:00', '2020-04-28 22:35:41'),
(76, 'Tablet Case & Cover', 48, 'categories/April2020/2QDC7jVKGI6Aa6vVbOnd.jpg', '2020-04-11 16:10:00', '2020-04-28 22:36:06'),
(77, 'Tablet PC', 48, 'categories/April2020/xewSesHwvH8N3VA5VUw3.jpg', '2020-04-11 16:10:00', '2020-04-28 22:36:52'),
(78, 'Telephone', 48, 'categories/April2020/ivFe9qAUgO1LQAYwol7Y.jpg', '2020-04-11 16:11:00', '2020-04-28 22:38:01'),
(79, 'Two Way Radio', 48, 'categories/April2020/vghtPG2h4uW431zHd4DS.jpg', '2020-04-11 16:11:00', '2020-04-28 22:39:14'),
(80, 'eBook Reader', 48, 'categories/April2020/qSRf3sV7ZL0Odnc6ul0V.jpg', '2020-04-11 16:11:00', '2020-04-28 22:41:36'),
(81, 'Air Conditioner, Purifier & Humidifier', 49, 'categories/April2020/pZI5Bbg1Y1AfbGZfneFc.jpg', '2020-04-11 16:12:00', '2020-04-28 22:42:20'),
(82, 'Electrical Fan & Exhaust Fan', 49, 'categories/April2020/JTliS6Hv7eDKk1S6DEfD.jpg', '2020-04-11 16:12:00', '2020-04-28 22:42:56'),
(83, 'Household Water Treatment Equipment', 49, 'categories/April2020/Uw8ZpmYTF8kG32XrpgYY.jpg', '2020-04-11 16:13:00', '2020-04-28 22:43:33'),
(84, 'Kitchen Electronics', 49, 'categories/April2020/HzomvKNQpNOBXpl2nbdD.png', '2020-04-11 16:13:00', '2020-04-28 22:44:37'),
(85, 'Refrigerator, Freezer & Parts', 49, 'categories/April2020/3gTw4F46r1eZMTU6pRzb.webp', '2020-04-11 16:13:00', '2020-04-28 22:55:48'),
(86, 'Salon Equipment', 49, 'categories/April2020/fpzQWmxVPRA5ZzSsyWKL.jpg', '2020-04-11 16:14:00', '2020-04-28 22:46:17'),
(87, 'Water Heater & Components', 49, 'categories/April2020/CRfeg8ZJAojnX87ojGeH.jpg', '2020-04-11 16:14:00', '2020-04-28 22:46:49'),
(88, 'Bathroom Heater', 49, 'categories/April2020/hEqbPCCFFjCMekRSOZa5.jpg', '2020-04-11 16:14:00', '2020-04-28 22:49:50'),
(89, 'Beauty Equipment', 49, 'categories/April2020/Jfu7pYxmtjR0LLNb8jFU.png', '2020-04-11 16:15:00', '2020-04-28 22:50:31'),
(91, 'Dry Cabinet', 49, 'categories/April2020/2Q21jgf9ItuxD5n3MwqR.webp', '2020-04-11 16:15:00', '2020-04-28 22:51:15'),
(92, 'Electric Iron & Steam Iron', 49, 'categories/April2020/DiQO7xknBhRpaK8w21a6.jpg', '2020-04-11 16:16:00', '2020-04-28 22:53:20'),
(93, 'Electric Toothbrush', 49, 'categories/April2020/nsgLpdRGA9lauB7djVCS.jpg', '2020-04-11 16:16:00', '2020-04-28 22:53:50'),
(94, 'Electrical Pesticidal Utensil', 49, 'categories/April2020/t4csT8QxPmnxOfN6wsby.jpg', '2020-04-11 16:16:00', '2020-04-28 22:54:31'),
(95, 'Filtration Equipment & Parts', 49, 'categories/April2020/VTKpSVSrdYhGOGGAT2zV.jpg', '2020-04-11 16:17:00', '2020-04-28 22:56:20'),
(96, 'Hair Tools & Accessories', 49, 'categories/April2020/s8uqkuX5A0yI3pwd1WLW.jpg', '2020-04-11 16:17:00', '2020-04-28 22:57:48'),
(97, 'Hand Dryer', 49, 'categories/April2020/PkNWDoSURb1y2xbB4yL5.jpg', '2020-04-11 16:17:00', '2020-04-28 22:58:15'),
(98, 'Insect Killer', 49, 'categories/April2020/sPao7n7v0qqZkK6QTldk.jpg', '2020-04-11 16:18:00', '2020-04-28 22:58:34'),
(99, 'Sanitary Utensil', 49, 'categories/April2020/rogOJLqYGXD2IEQBR0m8.webp', '2020-04-11 16:18:00', '2020-04-28 22:59:08'),
(100, 'Shaver', 49, 'categories/April2020/E8gV4NAcEZeXLwCdpOd8.jpg', '2020-04-11 16:19:00', '2020-04-28 23:00:08'),
(101, 'Solar & Renewable Energy', 49, 'categories/April2020/c1NevhDq2NKsvhCfgirB.jpg', '2020-04-11 16:19:00', '2020-04-28 23:00:42'),
(102, 'Steam Cleaner', 49, 'categories/April2020/5XodvlRdoKGNgewGuvvs.jpeg', '2020-04-11 16:19:00', '2020-04-28 23:05:23'),
(103, 'Ultrasonic Cleaner', 49, 'categories/April2020/XjlMhmk0fwmJF07KIZQa.jpg', '2020-04-11 16:20:00', '2020-04-28 23:06:04'),
(104, 'Vacuum Cleaner', 49, 'categories/April2020/z8o36tkNZ5yEpJDZqwax.jpg', '2020-04-11 16:20:00', '2020-04-28 23:07:13'),
(105, 'Warmer Appliance', 49, 'categories/April2020/T9JPoBl8frzYn7IMT46P.jpg', '2020-04-11 16:21:00', '2020-04-28 23:08:41'),
(106, 'Washing & Drying Machine', 49, 'categories/April2020/5IIRQxknUlKOzUHpRPhw.jpg', '2020-04-11 16:21:00', '2020-04-28 23:09:05'),
(107, 'Commerce & Finance Electronics', 50, 'categories/April2020/BqLPUX8FHQrovEHnk1DW.jpg', '2020-04-11 16:22:00', '2020-04-28 23:09:47'),
(108, 'All in One Copier, Printer & Fax', 50, 'categories/April2020/ApZxb4gz3Qsz71dXbvTe.jpg', '2020-04-11 16:22:00', '2020-04-29 00:40:37'),
(109, 'Calculator', 50, 'categories/April2020/t7eLCWvo5130rzvG97eD.jpg', '2020-04-11 16:22:00', '2020-04-29 00:41:09'),
(110, 'Clock & Watch', 50, 'categories/April2020/2TmwC2QZ3RXhHs20rIQE.jpg', '2020-04-11 16:23:00', '2020-04-29 00:41:41'),
(111, 'Conferencing System', 50, 'categories/April2020/yn4wF4qNbXcDscj6R8zo.jpg', '2020-04-11 16:23:00', '2020-04-29 00:44:33'),
(112, 'Copier', 50, 'categories/April2020/PuBmausxcOgSfQyktApc.jpg', '2020-04-11 16:23:00', '2020-04-29 00:44:58'),
(113, 'Fax Machine', 50, 'categories/April2020/fSCud4S8z63nUlOFZ9Ly.jpg', '2020-04-11 16:24:00', '2020-04-29 00:45:32'),
(114, 'Office Electronics', 50, 'categories/April2020/KYEfwEIhpacIYHFQZ4xw.jpg', '2020-04-11 16:24:00', '2020-04-29 00:46:08'),
(115, 'Paper Shredder', 50, 'categories/April2020/u5K5HPF47GU2nUPxJ9Ts.jpg', '2020-04-11 16:24:00', '2020-04-29 00:47:31'),
(116, 'Printer, Cartridge & Paper', 50, 'categories/April2020/iTHDJTPzM0FcOg6fyIhs.png', '2020-04-11 16:25:00', '2020-04-29 04:44:41'),
(117, 'Projector & Equipment', 50, 'categories/April2020/N6KO4hoI1Wm8nvLgNPsO.jpg', '2020-04-11 16:25:00', '2020-04-29 00:50:15'),
(118, 'Scanner', 50, 'categories/April2020/uNsKkCDqdqouIlIlNfu8.jpg', '2020-04-11 16:25:00', '2020-04-29 00:50:40'),
(119, 'Smart Card & Card Reader', 50, 'categories/April2020/NDStlWIvSQNtXSi3yGeB.jpg', '2020-04-11 16:26:00', '2020-04-29 00:51:56'),
(120, 'Timer & Counter', 50, 'categories/April2020/2bNIKzqP5tvOumPUrbW4.jpg', '2020-04-11 16:26:00', '2020-04-29 00:52:28'),
(121, 'Wireless Paging System', 50, 'categories/April2020/soSMkTP5w9tj0K12xMab.jpg', '2020-04-11 16:27:00', '2020-04-29 00:53:11'),
(122, 'Consumer Electronics Stocks', 51, 'categories/April2020/gxk63FdFylpYYPykRaGM.jpg', '2020-04-11 16:27:00', '2020-04-14 16:24:09'),
(124, 'Other Consumer Electronics', 51, 'categories/April2020/6tmjJR1Uxtp3q6pfDCYH.jpg', '2020-04-11 16:28:00', '2020-04-29 04:46:53'),
(125, 'Accessories', NULL, 'categories/April2020/74gPdw8BjH3pEdLasPIW.png', '2020-04-11 16:35:00', '2020-04-25 17:24:46'),
(126, 'Furniture', NULL, 'categories/April2020/wKvCIfEXQfmsF3jfdKE4.png', '2020-04-11 16:36:00', '2020-04-25 17:25:16'),
(129, 'Electrical ', NULL, 'categories/April2020/U3GD1MrdSAchPXna9XAs.png', '2020-04-11 16:37:00', '2020-04-25 17:27:09'),
(130, 'Computer Products', NULL, 'categories/April2020/NGtVRpmUGhxbStxswpA7.png', '2020-04-11 16:38:00', '2020-04-25 17:28:08'),
(131, 'Arts ', NULL, 'categories/April2020/3IalTtGFJwExlLojHBE1.png', '2020-04-11 16:39:00', '2020-04-25 17:29:23'),
(132, 'Chemicals', NULL, 'categories/April2020/Q9CPTxQMa1q18Jylbztz.png', '2020-04-11 16:39:00', '2020-04-25 17:30:02'),
(133, 'Bags, Cases', NULL, 'categories/April2020/gnE3QPfz8Fx1k0XKlHx0.png', '2020-04-11 16:39:00', '2020-04-25 17:30:41'),
(134, 'Decoration', NULL, 'categories/April2020/nQbmyeLuALwnYhvQXRlE.png', '2020-04-11 16:41:00', '2020-04-25 17:35:31'),
(135, 'Toys', NULL, 'categories/April2020/CsAlGcZidCrmJj9nYLPM.png', '2020-04-11 16:42:00', '2020-04-25 17:33:17'),
(136, 'Lights & Lighting', NULL, 'categories/April2020/oG6fEet5bSEGPkf6x7Cy.png', '2020-04-11 16:43:00', '2020-04-25 17:39:26'),
(138, 'Sporting Goods', NULL, 'categories/April2020/V6vV6zAjbVBSkOdGwUeL.png', '2020-04-11 16:44:00', '2020-04-25 17:37:06'),
(139, 'Industrial Equipment', NULL, 'categories/April2020/zgInMVT2oVKG5gwNA3W4.png', '2020-04-11 16:44:00', '2020-04-25 17:48:44'),
(140, 'Instruments ', NULL, 'categories/April2020/7KHUgW8hcdo1Cdjvdh33.png', '2020-04-11 16:45:00', '2020-04-25 17:42:24'),
(141, 'Daily Use', NULL, 'categories/April2020/2Znat2nkLl3aDfA9OgYz.png', '2020-04-11 16:45:00', '2020-04-25 17:45:11'),
(142, 'Tools & Hardware', NULL, 'categories/April2020/TCafkU7jOsRgpXBwA2OV.png', '2020-04-11 16:46:00', '2020-04-25 17:48:08'),
(143, 'Office Supplies', NULL, 'categories/April2020/jJcbDjwn2O6jrRNAwKqm.png', '2020-04-11 16:46:00', '2020-04-25 17:49:25'),
(144, 'Manufacturing', NULL, 'categories/April2020/IEtVqVdpj0JPcb2RebOK.png', '2020-04-11 16:47:00', '2020-04-25 17:50:41'),
(145, 'Mineral & Energy', NULL, 'categories/April2020/WNUmi3Em4OYB4FBoyVKR.png', '2020-04-11 16:47:00', '2020-04-25 17:52:48'),
(148, 'Textile', NULL, 'categories/April2020/NMOsl8cwauiuSlBdcy1t.png', '2020-04-11 16:48:00', '2020-04-25 17:54:31'),
(149, ' Transportation ', NULL, 'categories/April2020/SX180ZtHGSrskGexQeaJ.png', '2020-04-11 16:54:00', '2020-04-25 17:57:13'),
(150, 'Farming', 3, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:35:00', '2020-04-25 18:32:40'),
(151, 'Animal Husbandry', 3, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:37:00', '2020-04-25 18:33:02'),
(152, 'Food & Beverage', 3, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:37:00', '2020-04-25 18:33:35'),
(153, 'Agrochemicals', 3, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:38:00', '2020-04-25 18:33:58'),
(154, 'Related Machinery & Equipment', 3, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:38:00', '2020-04-25 18:37:53'),
(155, 'Other Agriculture', 3, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:38:00', '2020-04-25 18:38:38'),
(156, 'Medicine', 4, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:40:00', '2020-04-25 18:39:45'),
(157, 'Health Care & Beauty', 4, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:40:00', '2020-04-25 18:40:09'),
(158, 'Medical Supplies & Devices', 4, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:41:00', '2020-04-25 18:40:41'),
(159, 'Animal & Veterinary', 4, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:41:00', '2020-04-25 18:41:03'),
(160, 'Pharmaceutical Packaging', 4, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:41:00', '2020-04-25 18:45:58'),
(161, 'Pharmaceutical Machinery', 4, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:42:00', '2020-04-25 18:45:24'),
(162, 'Access Control', 5, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:42:00', '2020-04-25 18:44:47'),
(163, 'Alarm & Fire System', 5, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:43:00', '2020-04-25 18:47:58'),
(165, 'Roadway  Safety', 5, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:43:00', '2020-04-25 18:48:56'),
(166, 'Workplace Safety Supplies', 5, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:44:00', '2020-04-25 18:49:18'),
(167, 'Other Security & Protection', 5, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:44:00', '2020-04-25 18:49:49'),
(168, 'Clothing', 125, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:45:00', '2020-04-25 18:51:32'),
(169, 'Special Clothing', 125, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:45:00', '2020-04-25 18:53:47'),
(170, 'Hat, Gloves, Scarf and Shoes', 125, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:46:00', '2020-04-25 18:56:14'),
(171, 'Accessories', 125, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:46:00', '2020-04-25 18:56:32'),
(173, 'Home Furniture', 126, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:47:00', '2020-04-25 18:58:16'),
(174, 'Outdoor & Garden Furniture', 126, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:47:00', '2020-04-25 18:58:45'),
(175, 'Commercial Furniture', 126, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:48:00', '2020-04-25 19:05:48'),
(176, 'Furniture By Material', 126, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:48:00', '2020-04-25 18:59:59'),
(177, 'Furniture By Style', 126, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:48:00', '2020-04-25 19:00:16'),
(178, 'Seating, Tables', 126, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:48:00', '2020-04-25 19:00:49'),
(179, 'Furniture Parts & Accessories', 126, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:49:00', '2020-04-25 19:06:10'),
(180, 'Other Furniture', 126, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:49:00', '2020-04-25 19:07:33'),
(181, 'Electronic Components', 129, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:50:00', '2020-04-25 19:09:27'),
(182, 'Electrical Equipment', 129, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:50:00', '2020-04-25 19:09:48'),
(183, 'Electromechanical', 129, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:51:00', '2020-04-25 19:10:34'),
(184, 'Telecommunication', 129, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:51:00', '2020-04-25 19:11:24'),
(185, 'Other Electrical & Electronics', 129, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:51:00', '2020-04-25 19:11:57'),
(186, 'Laptops & Accessories', 130, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:54:00', '2020-04-25 19:13:01'),
(187, 'Desktops & Servers', 130, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:54:00', '2020-04-25 19:18:56'),
(188, 'Computer Components', 130, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:54:00', '2020-04-25 19:16:36'),
(189, 'Storage Devices & Drive', 130, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:55:00', '2020-04-25 19:17:11'),
(190, 'PC Peripherals', 130, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:55:00', '2020-04-25 19:17:43'),
(191, 'Networking Devices', 130, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:55:00', '2020-04-25 19:18:07'),
(192, 'Related Products', 130, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:56:00', '2020-04-25 19:20:34'),
(193, 'Fashion Accessories', 131, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:58:00', '2020-04-25 19:21:49'),
(194, 'Holiday Gifts & Decorations', 131, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:58:00', '2020-04-25 19:22:19'),
(195, 'Crafts By Material', 131, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:58:00', '2020-04-25 19:24:01'),
(196, 'Crafts By Use', 131, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:59:00', '2020-04-25 19:24:18'),
(197, 'Crafts By Style', 131, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:59:00', '2020-04-25 19:24:46'),
(198, 'Home Furnishings', 131, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 17:59:00', '2020-04-25 19:25:07'),
(199, 'Other Gifts & Crafts', 131, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:00:00', '2020-04-25 19:25:29'),
(200, 'Plastic & Rubber', 132, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:01:00', '2020-04-25 19:26:00'),
(201, 'Paint, Coating, Pigment', 132, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:01:00', '2020-04-25 19:28:30'),
(202, 'Basic Organic Chemicals', 132, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:01:00', '2020-04-25 19:29:03'),
(203, 'Inorganic Chemicals', 132, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:01:00', '2020-04-25 19:29:22'),
(204, 'Reagent & Auxiliary', 132, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:02:00', '2020-04-25 19:29:57'),
(205, 'Petrochemicals', 132, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:02:00', '2020-04-25 19:30:14'),
(206, 'Flavours & Fragrances', 132, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:02:00', '2020-04-25 19:30:34'),
(207, 'Agrochemicals', 132, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:02:00', '2020-04-25 19:30:52'),
(208, 'Pharmaceutical Chemicals', 132, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:03:00', '2020-04-25 19:31:22'),
(209, 'Packaging & Printing Materials', 132, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:03:00', '2020-04-25 19:32:00'),
(210, 'Chemical Machinery', 132, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:03:00', '2020-04-25 19:41:20'),
(211, 'Other Chemicals', 132, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:04:00', '2020-04-25 19:41:33'),
(212, 'Bags By Style', 133, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:04:00', '2020-04-25 19:41:49'),
(213, 'Digital Bags', 133, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:05:00', '2020-04-25 19:43:01'),
(214, 'Luggage & Travel Bags', 133, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:05:00', '2020-04-25 19:43:24'),
(215, 'Outdoor & Sports Bags', 133, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:05:00', '2020-04-25 19:43:38'),
(216, 'Special Bags & Cases', 133, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:06:00', '2020-04-25 19:45:06'),
(217, 'Other Bags & Accessories', 133, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:06:00', '2020-04-25 19:44:45'),
(218, 'Bathroom & Kitchen', 134, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:07:00', '2020-04-25 19:45:24'),
(219, 'Sand & Stone', 134, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:07:00', '2020-04-25 19:46:15'),
(220, 'Tiles & Flooring', 134, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:07:00', '2020-04-25 19:46:36'),
(221, 'Door & Window', 134, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:08:00', '2020-04-25 19:46:48'),
(222, 'Finishing Building Materials', 134, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:08:00', '2020-04-25 19:47:10'),
(223, 'Structural Building Materials', 134, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:08:00', '2020-04-25 19:47:20'),
(224, 'Electrical', 134, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:09:00', '2020-04-25 19:48:47'),
(225, 'Related Products', 134, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:09:00', '2020-04-25 19:49:09'),
(226, 'Action Toys', 135, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:10:00', '2020-04-25 19:52:25'),
(227, 'Animals & Stuffed Toys', 135, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:10:00', '2020-04-25 19:52:55'),
(228, 'Educational Toys', 135, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:11:00', '2020-04-25 19:53:12'),
(229, 'Outdoor Toys', 135, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:11:00', '2020-04-25 19:53:24'),
(230, 'Toy Vehicles', 135, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:11:00', '2020-04-25 19:53:46'),
(231, 'Toys By Material', 135, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:12:00', '2020-04-25 19:54:34'),
(233, 'Toys By Style', 135, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:12:00', '2020-04-25 19:55:01'),
(234, 'Other Toys', 135, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:13:00', '2020-04-25 19:55:14'),
(235, 'LED Lighting & Display', 136, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:13:00', '2020-04-25 19:56:14'),
(236, 'Indoor & Outdoor Lighting', 136, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:14:00', '2020-04-25 19:56:32'),
(237, 'Stage Lighting & Equipment', 136, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:14:00', '2020-04-25 19:57:14'),
(238, 'Lighting Decoration', 136, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:14:00', '2020-04-25 19:57:35'),
(239, 'Professional Lighting', 136, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:15:00', '2020-04-25 19:59:00'),
(240, 'Lighting Bulbs & Tubes', 136, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:15:00', '2020-04-25 19:59:47'),
(241, 'Lighting Accessories', 136, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:15:00', '2020-04-25 20:01:02'),
(242, 'Other Lights', 136, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:15:00', '2020-04-25 20:01:31'),
(243, 'Sporting & Fitness', 138, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:17:00', '2020-04-25 20:02:00'),
(244, 'Outdoor Sports & Gears', 138, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:17:00', '2020-04-25 20:10:39'),
(246, 'Recreational Goods', 138, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:18:00', '2020-04-25 20:08:17'),
(248, 'Cleaning & Protection', 139, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:19:00', '2020-04-25 20:12:27'),
(249, 'Mechanical Components', 139, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:19:00', '2020-04-25 20:17:12'),
(250, 'Hydraulic & Pneumatic', 139, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:20:00', '2020-04-25 20:17:36'),
(251, 'Power & Transmission', 139, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:20:00', '2020-04-25 20:18:46'),
(252, 'Temperature & Humidity Control', 139, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:20:00', '2020-04-25 20:19:16'),
(253, 'Welding & Solder', 139, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:21:00', '2020-04-25 20:19:52'),
(254, 'Other Machinery', 139, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:21:00', '2020-04-25 20:23:39'),
(255, 'Testing Instrument', 140, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:24:00', '2020-04-25 20:20:53'),
(256, 'Measuring Instrument', 140, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:24:00', '2020-04-25 20:21:26'),
(257, 'Optical Instrument', 140, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:24:00', '2020-04-25 20:24:01'),
(258, 'Lab Supplies', 140, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:25:00', '2020-04-25 20:24:23'),
(259, 'Other Instruments', 140, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:25:00', '2020-04-25 20:25:41'),
(260, 'Kitchen & Dining', 141, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:29:00', '2020-04-25 20:28:59'),
(261, 'Beauty & Personal Care', 141, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:29:00', '2020-04-25 20:29:21'),
(262, 'Home Textile', 141, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:29:00', '2020-04-25 20:27:14'),
(263, 'Cleaning and Storage', 141, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:31:00', '2020-04-25 20:27:54'),
(264, 'Clock, Watch & Eyewear', 141, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:31:00', '2020-04-25 20:31:37'),
(265, 'Gardening & Entertainment', 141, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:32:00', '2020-04-25 20:32:09'),
(266, 'Baby Goods', 141, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:32:00', '2020-04-25 20:32:27'),
(267, 'Household Sundries', 141, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:32:00', '2020-04-25 20:32:57'),
(268, 'Advertising & Packaging', 141, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:33:00', '2020-04-25 20:33:31'),
(270, 'Tools & Equipment', 142, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:34:00', '2020-04-26 00:18:14'),
(271, 'Hardware & Accessories', 142, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:35:00', '2020-04-26 00:19:03'),
(272, 'Other Tools & Hardware', 142, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:35:00', '2020-04-26 00:20:35'),
(273, 'Office Equipment', 143, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:37:00', '2020-04-26 00:21:16'),
(274, 'Stationery', 143, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:37:00', '2020-04-26 00:22:01'),
(275, 'Teaching Equipment', 143, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:37:00', '2020-04-26 00:22:29'),
(276, 'Other Office Supplies', 143, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:37:00', '2020-04-26 00:22:51'),
(277, 'Food Machinery', 144, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:39:00', '2020-04-26 00:30:02'),
(278, 'Textile Machinery', 144, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:39:00', '2020-04-26 00:30:27'),
(279, 'Chemical Machinery', 144, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:40:00', '2020-04-26 00:30:58'),
(280, 'Engineering Machinery', 144, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:40:00', '2020-04-26 00:33:08'),
(281, 'Metal Machinery', 144, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:40:00', '2020-04-26 00:34:02'),
(282, 'Mining Machinery', 144, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:40:00', '2020-04-26 00:34:58'),
(283, 'Plastic Machinery', 144, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:41:00', '2020-04-26 00:35:24'),
(284, 'Glass Machinery', 144, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:41:00', '2020-04-26 00:35:52'),
(285, 'Printing Machinery', 144, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:41:00', '2020-04-26 00:36:51'),
(287, 'Machinery & Tools', 144, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:42:00', '2020-04-26 00:37:49'),
(288, 'Other Machinery', 144, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:42:00', '2020-04-26 00:38:14'),
(289, 'Metal Products', 145, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:43:00', '2020-04-26 00:38:42'),
(290, 'Non-Metallic Materials', 145, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:44:00', '2020-04-26 00:39:14'),
(292, 'Mining Machinery', 145, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:44:00', '2020-04-26 00:43:18'),
(293, 'Other Minerals', 145, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:45:00', '2020-04-26 00:43:43'),
(297, 'Fiber & Fabrics', 148, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:47:00', '2020-04-26 00:55:12'),
(298, 'Leather & Feather', 148, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:47:00', '2020-04-26 01:10:47'),
(299, 'Home Decor', 148, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:48:00', '2020-04-26 01:11:21'),
(300, 'Textile Related', 148, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:48:00', '2020-04-26 01:14:28'),
(302, 'Textile Machinery', 148, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:48:00', '2020-04-26 01:15:04'),
(303, 'Scooter', 149, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:54:00', '2020-04-26 01:17:02'),
(304, 'Bike & Tricycle', 149, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:54:00', '2020-04-26 01:17:31'),
(305, 'Car & Bus', 149, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:55:00', '2020-04-26 01:18:00'),
(306, 'Cart & Truck', 149, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:55:00', '2020-04-26 01:18:40'),
(307, 'Marine', 149, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:55:00', '2020-04-26 01:19:29'),
(308, 'Motorcycle', 149, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:56:00', '2020-04-26 01:20:06'),
(309, 'Roadway Safety', 149, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:56:00', '2020-04-26 01:20:33'),
(310, 'Speciale Vehicle', 149, 'http://businessdotkom.com/public/storage/http://businessdotkom.com/public/storage', '2020-04-11 18:56:00', '2020-04-26 01:22:06'),
(315, 'Vegetable & Preparation', 150, 'categories/April2020/GLMApRXp7uNcFOZGdkE7.jpg', '2020-04-11 19:02:00', '2020-04-29 04:45:04'),
(316, 'Bean & Preparation', 150, 'categories/April2020/BD7794VmH12vBjgtZ8nN.jpg', '2020-04-11 19:03:00', '2020-04-29 04:49:02'),
(317, 'Cereal', 150, 'categories/April2020/9Y5PDvwaWcMLGGHozjW4.jpg', '2020-04-11 19:03:00', '2020-04-29 04:49:36'),
(318, 'Cocoa, Coffee & Preparation', 150, 'categories/April2020/5InxLcKEqbNdnWC5yiBQ.jpg', '2020-04-11 19:03:00', '2020-04-29 04:49:57'),
(319, 'Dried Fruit', 150, 'categories/April2020/LBgvKZ0EFUGu3haeIAHv.jpg', '2020-04-11 19:03:00', '2020-04-29 04:50:19'),
(320, 'Econ-valuable Vegetable', 150, 'categories/April2020/3mVsB4kRF5i8uxBCGW3M.jpg', '2020-04-11 19:04:00', '2020-04-29 04:52:09'),
(321, 'Edible Fungus & Algae', 150, 'categories/April2020/MxkVzLhecEHSUVip8Twq.jpg', '2020-04-11 19:04:00', '2020-04-29 04:54:25'),
(322, 'Flour & Preparation', 150, 'categories/April2020/n0lwQ4Qvfoj56dXNPRpk.jpg', '2020-04-11 19:04:00', '2020-04-29 04:54:51'),
(323, 'Flower & Gardening Plant', 150, 'categories/April2020/rW85T1NZgkwKiG1AJjXq.jpg', '2020-04-11 19:05:00', '2020-04-29 04:55:23'),
(324, 'Fruit', 150, 'categories/April2020/LeJB6mC3pnYwHjZS5UWD.jpg', '2020-04-11 19:05:00', '2020-04-29 04:57:32'),
(325, 'Nut & Seed', 150, 'categories/April2020/YfQEQVo3fpPyD8lHmTmj.jpg', '2020-04-11 19:05:00', '2020-04-29 04:58:16'),
(326, 'Preserved Fruit', 150, 'categories/April2020/MtT3bGv1N3M0Qsq2LhrM.jpg', '2020-04-11 19:06:00', '2020-04-29 04:59:01'),
(327, 'Seed for Sowing', 150, 'categories/April2020/OJD4uoNxbthHX54H3sHj.jpg', '2020-04-11 19:06:00', '2020-04-29 05:00:03'),
(328, 'Tea & Tea Leaf', 150, 'categories/April2020/l37HOer9YF624shNgweI.jpg', '2020-04-11 19:07:00', '2020-04-29 05:00:30'),
(329, 'Animal Byproducts', 151, 'categories/April2020/nmZrOMm4gfTcb07DkeoN.jpg', '2020-04-11 19:09:00', '2020-04-29 05:00:51'),
(330, 'Aquatic & Preparation', 151, 'categories/April2020/MEBwSsPatcLVCRm5scRg.jpg', '2020-04-11 19:09:00', '2020-04-29 05:01:17'),
(331, 'Dairy Products', 151, 'categories/April2020/t3nFQK3qKCOzggPzYVmn.jpg', '2020-04-11 19:10:00', '2020-04-29 05:02:22'),
(332, 'Egg & Preparation', 151, 'categories/April2020/hKGw7wlAEr25gWSgjms0.png', '2020-04-11 19:10:00', '2020-04-29 05:03:16'),
(333, 'Fodder, Feed', 151, 'categories/April2020/ovJZXlJYIBq7bDJV8DQU.jpg', '2020-04-11 19:10:00', '2020-04-29 05:05:49'),
(334, 'Honey Products', 151, 'categories/April2020/egg42iiaT2XN6sVlHbNp.jpg', '2020-04-11 19:11:00', '2020-04-29 05:06:08'),
(335, 'Meat & Preparation', 151, 'categories/April2020/sy7tLlqZ3URXQoXR6sSW.jpg', '2020-04-11 19:11:00', '2020-04-29 05:06:26'),
(336, 'pet food', 151, 'categories/April2020/h6RXQJtCl6VXGnsljOGV.jpeg', '2020-04-11 19:11:00', '2020-04-29 05:07:27'),
(337, 'Poultry, Livestock & Breed Animal', 151, 'categories/April2020/yPNdSHX3VBYOtjSUFLtt.jpg', '2020-04-11 19:12:00', '2020-04-29 05:07:49'),
(338, 'Food Additive', 152, 'categories/April2020/sYFJtXa0wAcQOKoRbv2K.jpg', '2020-04-11 19:12:00', '2020-04-29 05:08:22'),
(341, 'Beverage', 152, 'categories/April2020/O2AKKmnQ1MogxHfG7n8s.jpg', '2020-04-11 19:13:00', '2020-04-29 05:11:14'),
(342, 'Canned Food', 152, 'categories/April2020/qynnovmB5yMTTmNlq2g7.jpg', '2020-04-11 19:14:00', '2020-04-29 05:11:34'),
(343, 'Condiment & Seasoning', 152, 'categories/April2020/EANeyO16iGfd5iBGGHUp.jpg', '2020-04-11 19:14:00', '2020-04-29 05:11:57'),
(344, 'Fat & Oil', 152, 'categories/April2020/3ZZzE7kip2KbVElJc2dN.jpg', '2020-04-11 19:14:00', '2020-04-29 05:13:01'),
(345, 'Feed Additives', 152, 'categories/April2020/qqA1vbuPVggFzptExMrF.jpg', '2020-04-11 19:15:00', '2020-04-29 05:13:39'),
(346, 'Food Stocks', 152, 'categories/April2020/K4GMQHKRbei4nsxMY02u.jpg', '2020-04-11 19:15:00', '2020-04-29 05:14:46'),
(347, 'Frozen Food', 152, 'categories/April2020/su4IQgNy94sxK3Qr2he5.jpg', '2020-04-11 19:15:00', '2020-04-29 05:15:10'),
(348, 'Health Food', 152, 'categories/April2020/pEsyef2qxITvNUZR7dXk.jpg', '2020-04-11 19:16:00', '2020-04-29 05:15:31'),
(349, 'Ice & Preparation', 152, 'categories/April2020/2IttftebhfiqZ64la4lx.jpg', '2020-04-11 19:16:00', '2020-04-29 05:19:16'),
(350, 'Infant Food', 152, 'categories/April2020/SiGEEyje6Zjw6uuCHR4S.jpg', '2020-04-11 19:16:00', '2020-04-29 05:19:47'),
(351, 'Instant Food', 152, 'categories/April2020/z6qAXMv0sazVhKUD02Ka.png', '2020-04-11 19:17:00', '2020-04-29 05:20:16'),
(352, 'Native Products', 152, 'categories/April2020/PUfUUQGToh39M0y3nm7F.jpg', '2020-04-11 19:17:00', '2020-04-29 05:21:48'),
(353, 'New-type Food', 152, 'categories/April2020/BoORak4bePT3BhjgTkmp.jpg', '2020-04-11 19:18:00', '2020-04-14 18:05:35'),
(354, 'Snacks', 152, 'categories/April2020/sog4mwRsQsh8ZCC5cEHl.jpg', '2020-04-11 19:18:00', '2020-04-29 05:23:47'),
(355, 'Spices', 152, 'categories/April2020/5aQxREIvWkNthXeAmM7T.jpg', '2020-04-11 19:18:00', '2020-04-29 05:24:01'),
(356, 'Starch', 152, 'categories/April2020/Are8C7UN6MioMDeveL9C.png', '2020-04-11 19:19:00', '2020-04-29 05:24:28'),
(357, 'Sugar & Confection', 152, 'categories/April2020/k7v66jNbprDZXhBXwTDX.jpg', '2020-04-11 19:19:00', '2020-04-29 05:25:29'),
(358, 'Yeast & Products', 152, 'categories/April2020/0HCW6arepuXsqzcZjvdK.jpg', '2020-04-11 19:20:00', '2020-04-29 05:25:48'),
(366, 'Agriculture Manure', 153, 'categories/April2020/x5aS4ctrsMEpkgzTp7ST.jpg', '2020-04-11 19:24:00', '2020-04-29 05:26:11'),
(367, 'Agricultural Chemicals', 153, 'categories/April2020/31XTwRjEkzi0MFPYsfTO.jpg', '2020-04-11 19:24:00', '2020-04-29 05:27:02'),
(368, 'Fertilizer', 153, 'categories/April2020/HhFtWZR1qu9Rm4l3qIw6.jpg', '2020-04-11 19:25:00', '2020-04-29 05:27:52'),
(369, 'Farm Facilities & Equipment', 154, 'categories/April2020/ti0DwfAZUJHstwIRsRMp.jpg', '2020-04-11 19:25:00', '2020-04-29 05:28:36'),
(370, 'Agricultural Machinery', 154, 'categories/April2020/QD4m4BJhMzRsPwczx5Yv.jpg', '2020-04-11 19:25:00', '2020-04-29 05:29:07'),
(371, 'Horticulture & Gardening Products', 154, 'categories/April2020/5kE6n4nGNALdtnoUNQE9.webp', '2020-04-11 19:25:00', '2020-04-29 05:30:33'),
(372, 'Machinery for Food, Beverage & Cereal', 154, 'categories/April2020/7vs5b6kQTsRIKykMbYDe.png', '2020-04-11 19:26:00', '2020-04-29 05:31:45'),
(373, 'Other Agriculture', 155, 'categories/April2020/M4Rg1JlttfzFr2eOZxOr.jpg', '2020-04-11 19:26:00', '2020-04-29 05:32:44'),
(374, 'Biological Products', 156, 'categories/April2020/8PtagisgzSE1TposLj3n.jpg', '2020-04-11 19:29:00', '2020-04-29 05:33:10'),
(375, 'Pharmaceutical Chemicals', 156, 'categories/April2020/pBlPozhgA5eaP5gg6tSQ.jpeg', '2020-04-11 19:29:00', '2020-04-29 05:33:59'),
(376, 'Pharmaceutical Intermediate', 156, 'categories/April2020/T8hOo3kEAxsKtIrWrQoD.jpg', '2020-04-11 19:29:00', '2020-04-29 05:34:44'),
(377, 'Pharmacy Stocks', 156, 'categories/April2020/TNjulmVVP8a09AU91HfW.jpg', '2020-04-11 19:30:00', '2020-04-29 05:35:17');
INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `created_at`, `updated_at`) VALUES
(378, 'Prepared Chinese Medicine', 156, 'categories/April2020/4LoudtHFjRhNZ23ETOGi.jpeg', '2020-04-11 19:30:00', '2020-04-14 18:41:31'),
(379, 'Sap & Extract', 156, 'categories/April2020/IAGFvxj8uIE5Yc5SYvOT.jpg', '2020-04-11 19:30:00', '2020-04-14 18:42:57'),
(380, 'Western Medicine', 156, 'categories/April2020/h4DWlIuFTuhMdT5hu1P5.jpg', '2020-04-11 19:31:00', '2020-04-14 18:45:34'),
(389, 'Beauty Equipment', 157, 'categories/April2020/LK8WUHWVWtdrFN8R4x50.png', '2020-04-11 19:35:00', '2020-04-29 05:46:27'),
(390, 'Health Care Appliance', 157, 'categories/April2020/Dksegam342TabX6FX4Cu.jpeg', '2020-04-11 19:36:00', '2020-04-29 05:47:04'),
(391, 'Massager', 157, 'categories/April2020/nYkAeuWO49VK26n1qxJ5.jpg', '2020-04-11 19:36:00', '2020-04-29 05:51:26'),
(392, 'Rehabilitation Therapy Supplies', 157, 'categories/April2020/a6ekRwz36jdsmodVyU9u.jpg', '2020-04-11 19:36:00', '2020-04-29 05:49:49'),
(394, 'Handicap Scooter', 157, 'categories/April2020/MV4qN3wUoJrGzmw0T6An.jpg', '2020-04-11 21:37:00', '2020-04-29 05:53:10'),
(395, 'Health Food', 157, 'categories/April2020/BgCgxZT6OQ2gOpQn6o0p.jpg', '2020-04-11 21:38:00', '2020-04-29 05:57:33'),
(396, 'Weight Management', 157, 'categories/April2020/i04LnWEGhw3I18qEmyTw.jpg', '2020-04-11 21:38:00', '2020-04-29 05:58:04'),
(397, 'Dental Equipment & Supplies', 158, 'categories/April2020/TNBX1dyl1Sm4W0pVa8yG.jpeg', '2020-04-11 21:39:00', '2020-04-29 05:58:41'),
(398, 'Medical Equipment', 158, 'categories/April2020/O3u6bqEgWfXjpL1scQge.jpg', '2020-04-11 21:39:00', '2020-04-29 05:59:40'),
(399, 'Medical Implement', 158, 'categories/April2020/hbBphdvik2kkkcGsDYwo.jpg', '2020-04-11 21:39:00', '2020-04-29 06:01:14'),
(400, 'Medical Supply', 158, 'categories/April2020/cfGijopuEMEKET3RPbxF.jpg', '2020-04-11 21:40:00', '2020-04-29 06:02:09'),
(402, 'Hospital Furniture', 158, 'categories/April2020/UCILAYeEsOkFHz0VTyYR.jpg', '2020-04-11 21:40:00', '2020-04-29 06:02:37'),
(403, 'Medical-Ray Protective Products', 158, 'categories/April2020/TB7LnRnpFT5X1RlJw72t.jpg', '2020-04-11 21:40:00', '2020-04-29 06:05:46'),
(405, 'Veterinary', 159, 'categories/April2020/9SCdkicPUVXrd7fG5jli.jpg', '2020-04-11 21:41:00', '2020-04-29 06:11:24'),
(406, 'Empty Capsule', 160, 'categories/April2020/6JyhlZBlLaAOfkzQMsYl.webp', '2020-04-11 21:41:00', '2020-04-29 06:11:45'),
(408, 'Pharmaceutical Packaging', 160, 'categories/April2020/3uRoS8meu2QuYaBM5bVe.jpg', '2020-04-11 21:42:00', '2020-04-29 06:14:05'),
(411, 'IVD', 161, 'categories/April2020/ua7AKT3z2RYIAjnO8Xzz.jpg', '2020-04-11 21:43:00', '2020-04-14 19:12:53'),
(412, 'Pharmaceutical Equipment & Machinery', 161, 'categories/April2020/jq3efPH9Q4Q7bGedFms9.jpg', '2020-04-11 21:44:00', '2020-04-29 06:19:25'),
(413, 'Access Control System', 162, 'categories/April2020/6P7rkDHkXB0cMExSvuU6.jpg', '2020-04-11 21:45:00', '2020-04-29 06:19:46'),
(414, 'Surveillance, Control & Protection', 162, 'categories/April2020/XZt70M4hMa8gHmLO0OKM.png', '2020-04-11 21:45:00', '2020-04-29 06:20:38'),
(415, 'Lock', 162, 'categories/April2020/KeQqNUqACM8mMaGjLy5L.jpg', '2020-04-11 21:45:00', '2020-04-29 06:22:30'),
(416, 'Smart Card & Card Reader', 162, 'categories/April2020/4VkLr1TEtr8widzEiYvc.jpg', '2020-04-11 21:46:00', '2020-04-29 06:24:02'),
(417, 'Time & Attendance', 162, 'categories/April2020/jYgFvaj8qlMiFrE2q6zq.webp', '2020-04-11 21:46:00', '2020-04-29 06:24:30'),
(418, 'Alarm & Security Systems', 162, 'categories/April2020/QrKacJsqmuwvXorVI7re.jpg', '2020-04-11 21:46:00', '2020-04-29 06:24:58'),
(419, 'Fire Control', 163, 'categories/April2020/DHPb553SFQfp4hMK1uK6.jpg', '2020-04-11 21:47:00', '2020-04-29 06:26:45'),
(420, 'Emergency Light & Indicator Light', 163, 'categories/April2020/Z1W80lrsgmHckOPiO4sA.jpg', '2020-04-11 21:47:00', '2020-04-29 06:27:28'),
(423, 'Roadway Safety', 165, 'categories/April2020/ajbzFTIZIYLaM5sxYlNc.jpeg', '2020-04-11 21:48:00', '2020-04-29 06:28:20'),
(424, 'Car Safety', 165, 'categories/April2020/mj5Z11Wz7XXiR38xlHQp.jpg', '2020-04-11 21:49:00', '2020-04-29 06:30:20'),
(425, 'Lifesaving', 165, 'categories/April2020/Li486I7u5SRPxKVev4Gj.jpg', '2020-04-11 21:49:00', '2020-04-29 06:31:07'),
(426, 'Safety Products & Supplies', 166, 'categories/April2020/11urjYmlGfEyu6OBZGqj.png', '2020-04-11 21:49:00', '2020-04-29 06:31:41'),
(427, 'Anti-Counterfeiting', 166, 'categories/April2020/lxfmJc6dw5Pbf9lYCNBk.jpg', '2020-04-11 21:50:00', '2020-04-29 06:32:06'),
(428, 'Anti-Static', 166, 'categories/April2020/yczv9FwqNk3gQLKVUxM7.jpg', '2020-04-11 21:50:00', '2020-04-14 19:30:58'),
(429, 'Safe', 166, 'categories/April2020/3wAO5f1nGfSLMjayqyz1.jpg', '2020-04-11 21:50:00', '2020-04-29 06:33:32'),
(430, 'Security Guard electric', 166, 'categories/April2020/x6gVjoYlfJkxt9V6y4m0.jpg', '2020-04-11 21:51:00', '2020-04-29 06:34:26'),
(431, 'Other Safety Products', 167, 'categories/April2020/6oSZi1VsKVIZRv0Ph8dI.png', '2020-04-11 21:51:00', '2020-04-29 06:35:15'),
(432, 'Belt & Accessories', 168, 'categories/April2020/N6y5T2i8WP8RueVDNuXU.jpg', '2020-04-12 02:07:00', '2020-04-29 06:36:42'),
(433, 'T-Shirt', 168, 'categories/April2020/Tq1mjGYUGE2bRcWq0hMe.jpg', '2020-04-12 02:07:00', '2020-04-29 06:36:59'),
(434, 'Apparel Stocks', 168, 'categories/April2020/MwI6ogtG6Nvg1j5ldwp2.jpg', '2020-04-12 02:08:00', '2020-04-14 19:42:42'),
(435, 'Children\'s Apparel', 168, 'categories/April2020/nVEDN9xvKkMzxoWbVKLl.jpg', '2020-04-12 02:09:00', '2020-04-29 22:16:30'),
(436, 'Down & Winter Apparel', 168, 'categories/April2020/YWpVs8XlllokXXwrUdvA.jpg', '2020-04-12 02:09:00', '2020-04-29 06:38:32'),
(437, 'Dresses', 168, 'categories/April2020/dBNC4xSuH51lJgsIFFpJ.jpg', '2020-04-12 02:10:00', '2020-04-29 06:38:01'),
(438, 'Dust Coat', 168, 'categories/April2020/7SuamoWnoPORCRnCkwMZ.jpg', '2020-04-12 02:10:00', '2020-04-29 06:41:53'),
(439, 'Infant Apparel', 168, 'categories/April2020/xUwZ2uJor3hxAUInsbBJ.jpg', '2020-04-12 02:11:00', '2020-04-29 06:42:14'),
(440, 'Jacket', 168, 'categories/April2020/xfFng587lOtoYeI6C9WK.jpg', '2020-04-12 02:11:00', '2020-04-29 06:42:31'),
(441, 'Jeans', 168, 'categories/April2020/YPOjjPFHh19WHWLkhlIc.png', '2020-04-12 02:12:00', '2020-04-29 06:42:57'),
(442, 'Knitting Apparel', 168, 'categories/April2020/7bMROlezgJlnlks8J1Ge.jpg', '2020-04-12 02:12:00', '2020-04-29 06:43:56'),
(443, 'Leather & Fur', 168, 'categories/April2020/XYPzgan14IrvJ9xYsXEm.jpg', '2020-04-12 02:13:00', '2020-04-29 06:44:22'),
(444, 'Underwear', 168, 'categories/April2020/wZHci7XzYSj1j4nqIbL3.jpg', '2020-04-12 02:13:00', '2020-04-29 06:44:40'),
(445, 'Leisure Apparel', 168, 'categories/April2020/4KmpdWpwUyd8Xi75xmKm.jpg', '2020-04-12 02:14:00', '2020-04-29 06:45:11'),
(446, 'Outer Wear', 168, 'categories/April2020/rhswSEvj5lATYq65bngU.jpg', '2020-04-12 02:14:00', '2020-04-29 06:45:40'),
(448, 'Pants & Trousers', 168, 'categories/April2020/IcOiSofsmxVDP7vUG5W8.webp', '2020-04-12 02:15:00', '2020-04-29 06:47:22'),
(449, 'Shirt & Blouse', 168, 'categories/April2020/G52CUOfqlHSIem9ARBVV.jpg', '2020-04-12 02:16:00', '2020-04-29 06:48:10'),
(450, 'cloth', 168, 'categories/April2020/P8MrsOL9lZpgzMGcUNoI.jpg', '2020-04-12 02:16:00', '2020-04-29 06:49:30'),
(451, 'Skirt', 168, 'categories/April2020/HYR81lmB2mrAh2l0qaPg.jpg', '2020-04-12 02:17:00', '2020-04-29 06:50:17'),
(452, 'Sock & Stocking', 168, 'categories/April2020/4NQcmbPTN0TsGXovy2gr.jpg', '2020-04-12 02:17:00', '2020-04-29 06:51:46'),
(453, 'Sports Wear', 168, 'categories/April2020/8dMhbaLs8NJf42uZ9T6u.jpg', '2020-04-12 02:18:00', '2020-04-29 06:52:02'),
(454, 'Suit', 168, 'categories/April2020/RM80LNO7DUYcxxB4KioO.jpg', '2020-04-12 02:18:00', '2020-04-29 06:52:18'),
(455, 'Sweater', 168, 'categories/April2020/X8CpuQC9LBEoHL0No8DR.jpg', '2020-04-12 02:19:00', '2020-04-29 06:52:35'),
(456, 'Tank Top', 168, 'categories/April2020/Bbcq3daTN4qGgbt6W9qJ.jpg', '2020-04-12 02:19:00', '2020-04-29 06:54:40'),
(457, 'Vest & Waistcoat', 168, 'categories/April2020/7bb8vpXFtUpUBKMoRofz.jpg', '2020-04-12 02:20:00', '2020-04-29 06:57:28'),
(458, 'Other Apparel', 168, 'categories/April2020/6kdtLsQwJA7axzdPBZQN.jpg', '2020-04-12 02:21:00', '2020-04-29 06:57:53'),
(459, 'Safety & Protective Apparel', 169, 'categories/April2020/VKwEyOyn01gRqB6FeqEM.jpg', '2020-04-12 02:22:00', '2020-04-29 06:56:38'),
(460, 'Uniform & Work Clothes', 169, 'categories/April2020/L13m0UY2r7dnlGwL8A6j.jpg', '2020-04-12 02:22:00', '2020-04-29 06:58:33'),
(461, 'Wedding Dresses & Ceremonial Clothing', 169, 'categories/April2020/Jk1Hb7C8S2gh8dagrUVC.webp', '2020-04-12 02:23:00', '2020-04-29 06:59:00'),
(462, 'Apron', 169, 'categories/April2020/KlazIyGdhNiA4fQvxlG7.jpg', '2020-04-12 02:23:00', '2020-04-29 06:59:22'),
(463, 'Ethnic & Folk Apparel', 169, 'categories/April2020/AKagXkUyu81yD1J0TsC8.jpg', '2020-04-12 02:24:00', '2020-04-29 07:00:44'),
(465, 'Theatrical Costume', 169, 'categories/April2020/UOX6mqGzqdW5u1HASgwg.webp', '2020-04-12 02:24:00', '2020-04-29 07:02:14'),
(466, 'Gloves & Mittens', 170, 'categories/April2020/RWAnW4YYNrchLjtPA9pj.jpg', '2020-04-12 02:25:00', '2020-04-29 22:23:14'),
(467, 'Hat & Cap', 170, 'categories/April2020/n8s7mQIgpB5vw0EWWngj.jpg', '2020-04-12 02:26:00', '2020-04-29 22:23:28'),
(468, 'Scarf & Warm', 170, 'categories/April2020/oI8bKuxZSrYxgsG3apGD.webp', '2020-04-12 02:26:00', '2020-04-29 22:24:29'),
(469, 'Shoes', 170, 'categories/April2020/18nusUzgFUyPjo6U62sJ.jpg', '2020-04-12 02:29:00', '2020-04-29 22:24:48'),
(470, 'Clothing Accessories', 171, 'categories/April2020/r3qe1RKZ0JQDtQOaF9Pp.jpg', '2020-04-12 02:29:00', '2020-04-29 22:27:56'),
(471, 'Garment Bag', 171, 'categories/April2020/tuxz5RaHbPX7tYV54rcg.jpg', '2020-04-12 02:32:00', '2020-04-29 22:28:18'),
(472, 'Garment Labels', 171, 'categories/April2020/qgZx2PEwHI0MyNAxWCBR.jpg', '2020-04-12 02:32:00', '2020-04-29 22:28:45'),
(473, 'Garment Tag', 171, 'categories/April2020/ovYn2HxkZA7ukQi65XVS.jpg', '2020-04-12 02:32:00', '2020-04-29 22:29:15'),
(474, 'Mannequin', 171, 'categories/April2020/kMWwVbc8MGvmiZQnhsNV.jpg', '2020-04-12 02:33:00', '2020-04-29 22:30:26'),
(475, 'Necktie & Bow Tie', 171, 'categories/April2020/65HMiHWMZt68AQKv8HdW.jpg', '2020-04-12 02:34:00', '2020-04-29 22:30:54'),
(476, 'Ribbon', 171, 'categories/April2020/5zsyu01YKJkxz7bO9A4f.jpg', '2020-04-12 02:34:00', '2020-04-29 22:34:05'),
(479, 'Children & Baby Furniture', 173, 'categories/April2020/2NUrG895RIMz9hey8ySR.webp', '2020-04-12 02:37:00', '2020-04-29 22:34:25'),
(480, 'Bedroom Furniture', 173, 'categories/April2020/NMspCpB8c4TlDhRFdems.jpeg', '2020-04-12 02:37:00', '2020-04-29 22:33:09'),
(481, 'Bathroom Furniture', 173, 'categories/April2020/5gexNM9XQ4C7HLCbsBNv.jpg', '2020-04-12 02:38:00', '2020-04-29 22:35:31'),
(482, 'Kitchen Furniture', 173, 'categories/April2020/sssdrkTZGrHaaEpCoplc.jpg', '2020-04-12 02:38:00', '2020-04-29 22:35:45'),
(483, 'Dining Room Furniture', 173, 'categories/April2020/dWFfCjJ69WuouNJ62453.png', '2020-04-12 02:39:00', '2020-04-29 22:36:37'),
(484, 'Living Room Furniture', 173, 'categories/April2020/ATWGu0u7ipfdh34vx2CI.jpg', '2020-04-12 02:40:00', '2020-04-29 22:36:59'),
(485, 'Hallway Furniture', 173, 'categories/April2020/7e1oEadvfNEUKKYGwplV.jpg', '2020-04-12 02:41:00', '2020-04-29 22:38:11'),
(486, 'Home Office Furniture', 173, 'categories/April2020/CABvlMv1vCHNWpbsxPhG.jpg', '2020-04-12 02:41:00', '2020-04-29 22:38:45'),
(487, 'Outdoor Furniture', 174, 'categories/April2020/CIMj3CBpvPA6mljGwGmU.jpeg', '2020-04-12 02:41:00', '2020-04-29 22:39:17'),
(488, 'Hotel Furniture', 175, 'categories/April2020/ZEbRSN5AyaxkhrpkB4Eb.jpg', '2020-04-12 02:42:00', '2020-04-29 22:39:33'),
(489, 'Restaurant Furniture', 175, 'categories/April2020/8vmvbztVcqC3WYBE0KrO.jpg', '2020-04-12 02:42:00', '2020-04-29 22:41:21'),
(490, 'Office Furniture', 175, 'categories/April2020/C5vsSRNetjkEankubGc0.jpg', '2020-04-12 02:43:00', '2020-04-29 22:41:40'),
(491, 'School Furniture', 175, 'categories/April2020/ihBcBYefkYPxhLrby2jf.webp', '2020-04-12 02:44:00', '2020-04-29 22:41:57'),
(492, 'Lab Furniture', 175, 'categories/April2020/lgmP0Q6irE29f743P84X.jpg', '2020-04-12 02:44:00', '2020-04-29 22:42:10'),
(493, 'Library Furniture', 175, 'categories/April2020/Sz38XJMO6C1r6Fb0eNpY.jpg', '2020-04-12 02:44:00', '2020-04-29 22:43:18'),
(494, 'Salon Furniture', 175, 'categories/April2020/F9ZKsUBg78o7VADBVt4o.jpg', '2020-04-12 02:45:00', '2020-04-29 22:43:46'),
(495, 'Store & Supermarket Furniture', 175, 'categories/April2020/jMI1QskRXCaUT9Dq2lUO.jpg', '2020-04-12 02:45:00', '2020-04-29 22:44:04'),
(496, 'Hospital Furniture', 175, 'categories/April2020/8LCZXDcIvgRTQxvsJpdB.png', '2020-04-12 02:45:00', '2020-04-29 22:46:04'),
(497, 'Public Furniture', 175, 'categories/April2020/CsPiBtgkfzqlgpbjgfIr.jpg', '2020-04-12 02:46:00', '2020-04-29 22:46:37'),
(498, 'Commercial Furniture', 175, 'categories/April2020/h3g0TsafQ5WJc7gQwcAS.jpg', '2020-04-12 02:47:00', '2020-04-29 22:46:49'),
(499, 'Fabric Furniture', 176, 'categories/April2020/4c7FombjJalvCVSXQcCQ.jpg', '2020-04-12 02:47:00', '2020-04-29 22:47:07'),
(500, 'Glass Furniture', 176, 'categories/April2020/ShKyEUzCDWchhrq28euR.jpg', '2020-04-12 02:48:00', '2020-04-29 22:48:18'),
(501, 'Bamboo Furniture', 176, 'categories/April2020/xaFFm8cZYmTd7P4pXXqK.jpg', '2020-04-12 02:48:00', '2020-04-29 22:48:44'),
(502, 'Leather Furniture', 176, 'categories/April2020/OZdsESCZdPAvJB8P7JPT.webp', '2020-04-12 02:50:00', '2020-04-14 22:21:46'),
(503, 'Metal Furniture', 176, 'categories/April2020/8gw6ktzGiPOCZBBNOG3x.jpg', '2020-04-12 02:51:00', '2020-04-29 22:49:20'),
(504, 'Plastic Furniture', 176, 'categories/April2020/FfKyIJ1VdWxgSPK172Uo.jpg', '2020-04-12 02:51:00', '2020-04-29 22:53:31'),
(505, 'Rattan & Wicker Furniture', 176, 'categories/April2020/BhXiqcIIugLWMlPWFFhQ.jpg', '2020-04-12 02:52:00', '2020-04-29 22:50:36'),
(506, 'Wooden Furniture', 176, 'categories/April2020/dHE22FCOAedVKXBnwZWV.jpg', '2020-04-12 02:52:00', '2020-04-29 22:50:52'),
(508, 'Antique & Reproduction Furniture', 177, 'categories/April2020/TIhls071rdLamvty97W3.jpg', '2020-04-12 02:53:00', '2020-04-29 22:51:31'),
(509, 'Modern Furniture', 177, 'categories/April2020/kvcobjTWfCB1LAzjqhSE.jpg', '2020-04-12 02:54:00', '2020-04-29 22:54:28'),
(510, 'Classic Furniture', 177, 'categories/April2020/jiWBtLWGOqGXtRZ6Z8XV.jpg', '2020-04-12 02:56:00', '2020-04-29 22:54:50'),
(511, 'Italian Furniture', 177, 'categories/April2020/5XBO7FTkzbVXZqwoGBpL.jpg', '2020-04-12 02:56:00', '2020-04-29 22:55:05'),
(512, 'European Furniture', 177, 'categories/April2020/iRgEBHW4gB1wGHodsAQB.jpg', '2020-04-12 02:57:00', '2020-04-29 22:56:00'),
(513, 'Sofa', 178, 'categories/April2020/Xt1vksw5DesL4tGXMx3L.jpg', '2020-04-12 02:58:00', '2020-04-29 22:56:16'),
(514, 'Seating, Table & Furniture', 178, 'categories/April2020/TLkyuKkO5rX6hh8vpU0F.jpg', '2020-04-12 02:58:00', '2020-04-29 22:56:42'),
(515, 'Shelf & Rack', 178, 'categories/April2020/kCSfWzjQ9WyXQG9aSHy1.jpg', '2020-04-12 03:00:00', '2020-04-29 22:57:12'),
(516, 'Furniture Hardware', 179, 'categories/April2020/8LHGHMWn7KFgng03JdzV.jpg', '2020-04-12 03:00:00', '2020-04-29 23:02:45'),
(517, 'Furniture Parts & Accessories', 179, 'categories/April2020/PJ7P4EloS80TPhct5pDZ.jpg', '2020-04-12 03:00:00', '2020-04-29 23:03:07'),
(518, 'Mirror', 180, 'categories/April2020/DHd0OovLuomNnLVjGNua.webp', '2020-04-12 03:02:00', '2020-04-29 23:03:40'),
(519, 'Folding Furniture', 180, 'categories/April2020/ip6egVDXOYGahNQneQXh.jpg', '2020-04-12 03:02:00', '2020-04-29 23:04:05'),
(520, 'Folding Screen', 180, 'categories/April2020/RvPiU6g4TsK7xxjvCeSq.jpg', '2020-04-12 03:03:00', '2020-04-29 23:06:30'),
(521, 'Inflatable Furniture', 180, 'categories/April2020/20i2sc3EexK2K9FVIf21.jpg', '2020-04-12 03:03:00', '2020-04-29 23:07:22'),
(522, 'LED Furniture', 180, 'categories/April2020/PGeMTen1lHLzs3RLPvR9.jpg', '2020-04-12 03:04:00', '2020-04-29 23:07:46'),
(523, 'Secondhand Furniture & Stocks', 180, 'categories/April2020/SX5Jgsj4K0tSHZeRXO1H.jpg', '2020-04-12 12:33:00', '2020-04-14 22:51:32'),
(524, 'Blind, Shade & Shutter', 180, 'categories/April2020/UHbwrLyMZePv8GoU3GzL.jpg', '2020-04-12 12:34:00', '2020-04-29 23:08:55'),
(525, 'Other Furniture', 180, 'categories/April2020/4Zeb9godF8jBlfKknyNR.jpg', '2020-04-12 12:36:00', '2020-04-29 23:09:11'),
(526, 'Cable Parts', 181, 'categories/April2020/FO9YSS8Z5GBeOEr6s8Fa.jpg', '2020-04-12 12:37:00', '2020-04-29 23:09:39'),
(527, 'Circuit Board', 181, 'categories/April2020/g8Bfnuur2IsSBXmZwiBd.jpg', '2020-04-12 12:38:00', '2020-04-29 23:11:05'),
(528, 'Connector & Terminals', 181, 'categories/April2020/RQscrAAj4FNsw2Rt49Pc.jpg', '2020-04-12 12:38:00', '2020-04-29 23:11:28'),
(529, 'Electronic Tube & Transistor', 181, 'categories/April2020/Cw6l6OBdeWgnaZgkX0Le.jpg', '2020-04-12 12:40:00', '2020-04-29 23:11:48'),
(530, 'Relay & Contactor', 181, 'categories/April2020/5UT5P9RFyIxnzTQiaqq0.jpg', '2020-04-12 12:40:00', '2020-04-29 23:12:09'),
(531, 'Sensor Light', 181, 'categories/April2020/2JENCxe00249jmWPqJrc.jpg', '2020-04-12 12:41:00', '2020-04-30 00:11:40'),
(532, 'Capacitor', 181, 'categories/April2020/E0OT30GFLx6LD11MXXli.jpg', '2020-04-12 12:42:00', '2020-04-30 00:12:24'),
(533, 'Cleaning Swab', 181, 'categories/April2020/bH9SXie3j0fkazWvL81R.webp', '2020-04-12 12:43:00', '2020-04-30 00:12:53'),
(534, 'Customized Service for Electronics', 181, 'categories/April2020/vn2q1yXw75KfElSUEDxO.jpg', '2020-04-12 12:43:00', '2020-04-14 23:04:31'),
(535, 'Electric Contact & Materials', 181, 'categories/April2020/dA3Nj5lc6CQICMRAF9kP.jpg', '2020-04-12 12:44:00', '2020-04-30 00:13:49'),
(536, 'Electrode', 181, 'categories/April2020/cN6xSatrUlOTiHOzhMeT.jpg', '2020-04-12 12:44:00', '2020-04-30 00:14:09'),
(537, 'Inductor', 181, 'categories/April2020/zikLiHRcXm2bVXRNGZOv.jpg', '2020-04-12 12:45:00', '2020-04-30 00:14:32'),
(538, 'Insulation', 181, 'categories/April2020/vXYJj6T9lpcObEfpdXup.jpg', '2020-04-12 12:45:00', '2020-04-30 00:15:08'),
(539, 'Integrated Circuit', 181, 'categories/April2020/5IQjHiYLqvyPrTK9bVVq.jpg', '2020-04-12 12:46:00', '2020-04-30 00:16:00'),
(540, 'LCD Module', 181, 'categories/April2020/MlivvwQnMewqFqOxKwTU.jpg', '2020-04-12 12:46:00', '2020-04-30 00:17:00'),
(541, 'LED Module', 181, 'categories/April2020/K6NUy5l7KeNKvwYpP9fi.webp', '2020-04-12 12:47:00', '2020-04-30 00:17:48'),
(542, 'LED Video Processor', 181, 'categories/April2020/LiYUV4SHACeme6hRfMVU.webp', '2020-04-12 12:47:00', '2020-04-30 00:19:13'),
(543, 'electerical Magnetic Material', 181, 'categories/April2020/1TkIFLSkWCXHdgZR9qcF.jpg', '2020-04-12 12:49:00', '2020-04-30 00:19:42'),
(544, 'Oscillator', 181, 'categories/April2020/1yclrmbCWRUjgymoDtQ4.jpg', '2020-04-12 12:50:00', '2020-04-30 00:20:04'),
(545, 'Resistor & Potentiometer', 181, 'categories/April2020/BO9HxuNGgpu6pZ9K2F5N.jpg', '2020-04-12 12:51:00', '2020-04-30 00:20:39'),
(546, 'Resonator', 181, 'categories/April2020/ktVKoooETd0HNAT7dnTX.png', '2020-04-12 12:52:00', '2020-04-30 00:22:32'),
(547, 'Semiconductor', 181, 'categories/April2020/w2jd7v6Z6U6c09jBlhLG.jpg', '2020-04-12 12:53:00', '2020-04-30 00:22:59'),
(548, 'Signal Filter', 181, 'categories/April2020/32DIXjTIo4lZ3QMoP6UC.jpg', '2020-04-12 12:54:00', '2020-04-30 00:23:15'),
(549, 'Sound Module', 181, 'categories/April2020/KNOifpXBUo5AVbSxmoIL.jpg', '2020-04-12 12:54:00', '2020-04-30 00:23:34'),
(550, 'Speaker,Trumpet & Buzzer', 181, 'categories/April2020/oKsxknQCVQHPJBlgKDap.jpg', '2020-04-12 12:56:00', '2020-04-30 00:24:41'),
(551, 'Breaker & Protector', 182, 'categories/April2020/57Q1Nd83h3bF2AR3fOIT.jpg', '2020-04-12 12:57:00', '2020-04-15 15:44:38'),
(552, 'Heating, Refrigeration & Temperature Control', 182, 'categories/April2020/5ZksXUkK7ug70dwdqsQd.jpg', '2020-04-12 12:57:00', '2020-04-30 00:27:30'),
(553, 'Inverter', 182, 'categories/April2020/0l0JODoRwxejPxkHN5M2.jpg', '2020-04-12 13:02:00', '2020-04-30 00:27:54'),
(554, 'Power Supply & Distribution', 182, 'categories/April2020/8UCHfs2rUDl74ygO9Kbu.jpg', '2020-04-12 13:02:00', '2020-04-30 00:29:20'),
(555, 'Transmitter', 182, 'categories/April2020/qLDFhOoWXnmW4avVmV4C.png', '2020-04-12 13:05:00', '2020-04-30 00:29:43'),
(556, 'Electrical Control System', 182, 'categories/April2020/AZ4Uk4LpsOQ4G1ayHa4n.jpg', '2020-04-12 13:05:00', '2020-04-30 00:30:13'),
(557, 'Specialized Electrical Equipment', 182, 'categories/April2020/jkcBwgyaHsiA9kMFk2xw.jpg', '2020-04-12 13:06:00', '2020-04-30 00:44:20'),
(558, 'Variable-Frequency Drive', 182, 'categories/April2020/IQQwSQkv2joNHauDfydz.jpg', '2020-04-12 17:39:00', '2020-04-30 00:45:13'),
(559, 'Battery, Storage Battery & Charger', 183, 'categories/April2020/TPhzPCRQebkLOrp6eS7f.jpg', '2020-04-12 17:40:00', '2020-04-30 00:46:00'),
(560, 'Electric Motor', 183, 'categories/April2020/TJWxFRrytIWyMeVRRRJn.jpg', '2020-04-12 17:40:00', '2020-04-30 00:46:42'),
(561, 'Optical Fiber, Cable & Wire', 183, 'categories/April2020/jnU4a0jzA4yIcvQOzBA9.jpg', '2020-04-12 17:41:00', '2020-04-30 00:47:36'),
(562, 'Smart Card & Card Reader', 183, 'categories/April2020/aeBLS1fOIcQVGloktJ2L.jpg', '2020-04-12 17:42:00', '2020-04-30 00:47:59'),
(563, 'Socket & Outlet', 183, 'categories/April2020/McIDVEAI4mrYAhwYEuAX.jpeg', '2020-04-12 17:43:00', '2020-04-30 00:54:50'),
(564, 'Switch', 183, 'categories/April2020/EReTXpcUPRl3H3eQfKD7.jpg', '2020-04-12 17:52:00', '2020-04-30 00:48:45'),
(565, 'Antenna', 183, 'categories/April2020/7VOrkG8Sa6LKTIiRiuIv.jpg', '2020-04-12 17:53:00', '2020-04-30 00:49:34'),
(566, 'Energy Saver', 183, 'categories/April2020/Fc2Lwj37XnZuflEYOa7g.webp', '2020-04-12 17:54:00', '2020-04-30 00:49:56'),
(567, 'Linear Actuator', 183, 'categories/April2020/EslBJkSknYljcJhBff22.jpg', '2020-04-12 17:55:00', '2020-04-30 00:50:20'),
(568, 'Plug', 183, 'categories/April2020/sETejXBsXxBQ4WN77CYL.webp', '2020-04-12 17:56:00', '2020-04-30 00:55:14'),
(569, 'Remote Control', 183, 'categories/April2020/F7XERO23Sl4MgcggEngi.jpg', '2020-04-12 17:56:00', '2020-04-30 00:52:48'),
(570, 'GPS', 184, 'categories/April2020/dxR0wLKRojqTy9Q53OsE.jpeg', '2020-04-12 17:57:00', '2020-04-30 00:53:13'),
(571, 'Telecommunication & Broadcasting', 184, 'categories/April2020/zmFtjf9LTpAoecDWoW5t.jpg', '2020-04-12 17:58:00', '2020-04-30 00:53:43'),
(572, 'Alarm & Security Systems', 184, 'categories/April2020/8NNTyzKXM9q8NW62xqNw.jpg', '2020-04-12 17:58:00', '2020-04-30 00:56:50'),
(573, 'Decoder', 184, 'categories/April2020/C7BeoDWkNOBsj1pvgzbn.jpg', '2020-04-12 17:59:00', '2020-04-30 00:57:40'),
(574, 'Encoder', 184, 'categories/April2020/IkUZMK1yo4sFbh2fHho2.jpg', '2020-04-12 18:00:00', '2020-04-30 02:34:29'),
(575, 'Radio', 184, 'categories/April2020/DvmeL7LndyqwkcrFnNjG.jpg', '2020-04-12 18:01:00', '2020-04-30 02:34:46'),
(577, 'Electromagnetic Equipment', 185, 'categories/April2020/sDQhrhnqm0pnG8QllslV.jpg', '2020-04-12 18:38:00', '2020-04-30 02:35:29'),
(578, 'Electronic Instrument', 185, 'categories/April2020/2L3nnXLhujcsaXIiLkaf.jpg', '2020-04-12 18:40:00', '2020-04-30 02:35:59'),
(580, 'Instrument Box', 185, 'categories/April2020/J6oQ1DcRNQl6jUc2Qvjo.png', '2020-04-12 18:41:00', '2020-04-30 02:36:55'),
(581, 'LED Display', 185, 'categories/April2020/APJMi46MnAI0B2lZlYPb.jpg', '2020-04-12 21:34:00', '2020-04-30 02:38:29'),
(583, 'Meter for Electricity', 185, 'categories/April2020/idc8c3VDMqIosPB2agUZ.jpg', '2020-04-12 21:35:00', '2020-04-30 02:40:03'),
(584, 'Timer & Counter', 185, 'categories/April2020/S7CGS5dCBRT6AmvCoIYI.jpg', '2020-04-12 21:35:00', '2020-04-30 02:40:37'),
(585, 'Other Electrical & Electronics', 185, 'categories/April2020/sStDpv9jzUOE79pBOMBu.jpg', '2020-04-12 21:36:00', '2020-04-30 02:50:49'),
(586, 'Card Reader', 186, 'categories/April2020/Wu5yIooQjRtR1eoKf5Jh.jpg', '2020-04-13 15:09:00', '2020-04-30 02:51:34'),
(588, 'Laptop', 186, 'categories/April2020/00hmrk5tDPIX0uohpgwR.jpg', '2020-04-13 15:10:00', '2020-04-30 02:53:00'),
(589, 'Laptop Stand', 186, 'categories/April2020/TXGqbc3KbFQqgT37tVGS.', '2020-04-13 15:10:00', '2020-04-30 02:53:29'),
(590, 'Palm Computer, Pocket PC & PDA', 186, 'categories/April2020/hdup2W8QleziKWbXIRvX.jpg', '2020-04-13 15:11:00', '2020-04-30 02:53:57'),
(591, 'Power Bank', 186, 'categories/April2020/4gvVC6SUzHrzLWsea9Bq.jpg', '2020-04-13 15:11:00', '2020-04-30 02:55:32'),
(592, 'Stylus', 186, 'categories/April2020/dpURDTSTrLGucaPVckyz.jpg', '2020-04-13 15:12:00', '2020-04-30 02:56:01'),
(593, 'Tablet Case & Cover', 186, 'categories/April2020/IAssxrKg75FvsePg8Ghu.jpg', '2020-04-13 15:12:00', '2020-04-30 02:56:13'),
(594, 'Tablet PC', 186, 'categories/April2020/4EtKJ2Ye58av80OaiB5d.jpg', '2020-04-13 15:12:00', '2020-04-30 02:56:34'),
(595, 'Computer', 187, 'categories/April2020/J5SzhDoVBdc4Xf2MRfNw.jpg', '2020-04-13 15:13:00', '2020-04-30 02:57:16'),
(596, 'Embedded Computer & SCM', 187, 'categories/April2020/Rqq8wUhFRhsJox5LzKdJ.jpg', '2020-04-13 15:13:00', '2020-04-15 16:28:18'),
(597, 'Industrial Computer & Accessories', 187, 'categories/April2020/GFMhxJQjnma9nHaEK84K.jpg', '2020-04-13 15:13:00', '2020-04-30 03:07:24'),
(598, 'Server & Workstation', 187, 'categories/April2020/UDYxMY6sMV286Jal3qiR.jpg', '2020-04-13 15:14:00', '2020-04-30 03:08:15'),
(599, 'CPU', 188, 'categories/April2020/byHsHAQ7aOaXiT9rBcQk.jpg', '2020-04-13 15:14:00', '2020-04-30 03:09:08'),
(600, 'Computer Case', 188, 'categories/April2020/VT1M83SOgBZP7PvIfcLZ.jpg', '2020-04-13 15:14:00', '2020-04-30 03:09:54'),
(601, 'Cooling Fan & Heatsinks', 188, 'categories/April2020/6k5CRdmg0OFiriXyRYws.jpg', '2020-04-13 15:15:00', '2020-04-30 03:10:17'),
(602, 'Display', 188, 'categories/April2020/xVLNhOrcLTlIg2muukOY.jpg', '2020-04-13 15:17:00', '2020-04-30 03:12:48'),
(603, 'Graphic Card', 188, 'categories/April2020/TS6WTlDQqPh9g8emc5Jg.jpg', '2020-04-13 15:17:00', '2020-04-30 03:13:40'),
(604, 'Mainboard', 188, 'categories/April2020/YvcKx8KuGvqtFxfcXqrK.webp', '2020-04-13 15:18:00', '2020-04-30 03:14:14'),
(605, 'Power Supply', 188, 'categories/April2020/9h2bk8kZxj6UoSLy4zyJ.jpg', '2020-04-13 15:18:00', '2020-04-30 03:14:28'),
(606, 'Sound Card', 188, 'categories/April2020/7afWto6SRo3UU3XrgMHz.jpg', '2020-04-13 15:18:00', '2020-04-30 03:21:04'),
(607, 'Drive', 189, 'categories/April2020/FCcql20n3C2EpJWyNIgk.jpg', '2020-04-13 15:19:00', '2020-04-30 03:21:51'),
(608, 'Storage Device', 189, 'categories/April2020/Tmxaf0AEYOna2b1JikKk.jpg', '2020-04-13 15:19:00', '2020-04-30 03:22:13'),
(609, 'Memory', 189, 'categories/April2020/a8lW7irbqWxiAY6ziZzu.jpg', '2020-04-13 15:19:00', '2020-04-30 03:22:38'),
(610, 'Speaker & Sound Box', 190, 'categories/April2020/6YNoW4ZTGWKzeD0vLipv.jpg', '2020-04-13 15:20:00', '2020-04-30 03:23:37'),
(611, 'Bluetooth Products', 190, 'categories/April2020/rbDOkOTXOMb5gzLtDoxL.jpg', '2020-04-13 15:20:00', '2020-04-30 03:23:52'),
(612, 'Computer Bag', 190, 'categories/April2020/QEOxP8sjEUkqiUUQc9ZI.jpg', '2020-04-13 15:20:00', '2020-04-30 03:24:12'),
(613, 'Computer Cable', 190, 'categories/April2020/g8wOEiMwxdTugMAQl3iJ.jpg', '2020-04-13 15:21:00', '2020-04-30 03:24:32'),
(614, 'Earphones,Headphones & Accessories', 190, 'categories/April2020/RGTfhu3ubSjbEVB76K7W.jpg', '2020-04-13 15:21:00', '2020-04-30 03:26:06'),
(615, 'Keyboard', 190, 'categories/April2020/kwd7xSl9nUawISsYvviU.jpg', '2020-04-13 15:21:00', '2020-04-30 03:26:25'),
(616, 'Mouse', 190, 'categories/April2020/R9CEitqd6xhxvJpnQ8Fl.jpg', '2020-04-13 15:22:00', '2020-04-30 03:26:46'),
(617, 'Mousepad', 190, 'categories/April2020/zwfjiwuDYFLYjyCLiHde.jpg', '2020-04-13 15:22:00', '2020-04-30 03:27:08'),
(618, 'PC Camera', 190, 'categories/April2020/GzZrzpNnUbuCR0SVcAKa.jpg', '2020-04-13 15:22:00', '2020-04-30 03:27:49'),
(619, 'Screen Protector', 190, 'categories/April2020/vfJmQlLbZl9vahTq2c2z.jpg', '2020-04-13 15:22:00', '2020-04-30 03:28:22'),
(620, 'USB Products', 190, 'categories/April2020/FcjezUy824hkWNzRWv0V.jpg', '2020-04-13 15:23:00', '2020-04-30 03:28:48'),
(621, 'Network Hardware & Parts', 191, 'categories/April2020/JEAWmWd8RWvuuh7gpCHI.jpg', '2020-04-13 15:23:00', '2020-04-30 03:31:39'),
(622, 'Optical Fiber', 191, 'categories/April2020/nA3Xsi5cPoslzq5a0lSt.jpg', '2020-04-13 15:23:00', '2020-04-30 03:33:55'),
(623, 'All in One Copier, Printer & Fax', 192, 'categories/April2020/gaMk5nCcPO7t6GIU8Wqz.jpg', '2020-04-13 15:24:00', '2020-04-30 03:38:17'),
(624, 'CD Bag & Case', 192, 'categories/April2020/ag0XgaqwaCMBLeqx8KGo.jpg', '2020-04-13 15:24:00', '2020-04-30 03:35:03'),
(625, 'Camera Bag', 192, 'categories/April2020/3rmP6idxj8DvzgezpNZO.jpg', '2020-04-13 15:24:00', '2020-04-30 03:36:23'),
(627, 'Copier', 192, 'categories/April2020/qWko0hiGCAhXOau3RJ9R.jpg', '2020-04-13 15:25:00', '2020-04-30 03:36:51'),
(628, 'Digital Camera', 192, 'categories/April2020/q6HcWUCXZHBVqu9lmJot.jpg', '2020-04-13 15:26:00', '2020-04-30 03:37:11'),
(629, 'Entertainment Electronics', 192, 'categories/April2020/Ws92wIgeFNpdsDcoa935.jpg', '2020-04-13 15:27:00', '2020-04-30 03:39:16'),
(630, 'Printer, Cartridge & Paper', 192, 'categories/April2020/LdXpEx30vZ6ywdjdvbqD.jpeg', '2020-04-13 15:27:00', '2020-04-30 03:40:23'),
(631, 'Scanner', 192, 'categories/April2020/Gl0ct0JyN7WsdXlKNXEW.jpg', '2020-04-13 15:27:00', '2020-04-30 03:41:31'),
(634, 'Other Digital Products Bags', 192, 'categories/April2020/TBrQFtcev4G4V1DuInbx.jpg', '2020-04-13 15:28:00', '2020-04-30 03:44:51'),
(635, 'Fashion Accessories', 193, 'categories/April2020/pgMPEYqGqCrJ2GgEZ4HN.jpg', '2020-04-13 15:29:00', '2020-04-30 03:45:29'),
(636, 'Hair Products', 193, 'categories/April2020/YnK73vzTAtNlb0RTvbg4.png', '2020-04-13 15:29:00', '2020-04-30 03:45:59'),
(637, 'Jewelry', 193, 'categories/April2020/WdNb7VnRmaq60HFyhHsv.jpg', '2020-04-13 15:30:00', '2020-04-30 03:46:16'),
(638, 'Salon Equipments', 193, 'categories/April2020/AWSYOlrKM1Nm88EQ9aFN.jpg', '2020-04-13 15:30:00', '2020-04-30 03:48:28'),
(639, 'Candle & Candle Holders', 194, 'categories/April2020/Vt5xKkRv6icEur5cee4H.jpg', '2020-04-13 15:30:00', '2020-04-30 03:50:00'),
(640, 'Festival & Party Supplies', 194, 'categories/April2020/KVSJUHTrF7wuLKWNzhOI.jpg', '2020-04-13 15:31:00', '2020-04-30 04:05:11'),
(641, 'Fireworks', 194, 'categories/April2020/dExhzf6aRw80b8t2lsRX.jpg', '2020-04-13 15:31:00', '2020-04-30 04:05:26'),
(642, 'Greeting Cards', 194, 'categories/April2020/7eQfTUz88jiikGARFuVv.jpg', '2020-04-13 15:31:00', '2020-04-30 04:06:09'),
(643, 'Lighting Decoration', 194, 'categories/April2020/ImrNIGiPnKg1RCiyXTWv.webp', '2020-04-13 15:32:00', '2020-04-30 04:07:01'),
(644, 'Luminous & Fluorescent Items', 194, 'categories/April2020/TSJVhB5IDRsL2TQYqYIc.jpg', '2020-04-13 15:32:00', '2020-04-30 04:07:34'),
(645, 'Plastic & Resin Crafts', 195, 'categories/April2020/9AWmzCRQAGkvH7tKGtvi.jpg', '2020-04-13 15:32:00', '2020-04-30 04:09:19'),
(646, 'Bamboo Crafts', 195, 'categories/April2020/iHdMK16Ztrq3LWa00vep.jpg', '2020-04-13 15:33:00', '2020-04-30 04:08:41'),
(647, 'Crystal Crafts', 195, 'categories/April2020/umBlbkicrvFMGTgSDfJa.webp', '2020-04-13 15:33:00', '2020-04-30 04:11:47'),
(648, 'Feather & Shell Crafts', 195, 'categories/April2020/FLDIZFraFm8rLBF43iHb.jpg', '2020-04-13 15:33:00', '2020-04-30 04:12:13'),
(649, 'Glass Crafts', 195, 'categories/April2020/8j0IX4vZgbUf2vQZkyPJ.jpg', '2020-04-13 15:34:00', '2020-04-30 04:12:32'),
(650, 'Jade & Stone Crafts', 195, 'categories/April2020/jz8VrQrF2iIwAlu4GT1i.jpg', '2020-04-13 15:34:00', '2020-04-30 04:12:52'),
(651, 'Lacquer Crafts', 195, 'categories/April2020/QeTKCanFcDhU5qRDJsZj.jpg', '2020-04-13 15:34:00', '2020-04-30 04:13:48'),
(652, 'Leather Crafts', 195, 'categories/April2020/MMAH3c4bdOKyb0CBvVWF.jpg', '2020-04-13 15:35:00', '2020-04-30 04:14:01'),
(653, 'Metal Crafts', 195, 'categories/April2020/QjALvHN0Ygc6BlyHxFrT.png', '2020-04-13 15:35:00', '2020-04-30 04:14:19'),
(654, 'Natural Crafts', 195, 'categories/April2020/myiDaykr5896dOLU9Xpk.jpg', '2020-04-13 15:35:00', '2020-04-30 04:20:46'),
(655, 'Paper Crafts', 195, 'categories/April2020/QCQ9EeHqA7taRA1gTISc.jpg', '2020-04-13 15:35:00', '2020-04-30 04:21:02'),
(656, 'Porcelain & Ceramics', 195, 'categories/April2020/xAoUk3tOCuukxooDGu3G.jpg', '2020-04-13 15:36:00', '2020-04-30 04:21:25'),
(657, 'Pottery', 195, 'categories/April2020/LASMR9irqtzbPSejEgDH.jpg', '2020-04-13 15:36:00', '2020-04-30 04:21:43'),
(658, 'Silk & Embroidery', 195, 'categories/April2020/DWMriXPLHJXiWYNtUFz6.jpg', '2020-04-13 15:36:00', '2020-04-30 04:22:07'),
(659, 'Textile & Weaving Crafts', 195, 'categories/April2020/uTIFcsigSgptctHIUBYc.jpg', '2020-04-13 15:37:00', '2020-04-30 04:23:12'),
(661, 'Art Box', 196, 'categories/April2020/5Z8W2Gq4qRnfg8Dyv3qU.jpg', '2020-04-13 15:38:00', '2020-04-30 04:23:35'),
(663, 'Key Chain', 196, 'categories/April2020/e9kHT7LcYudiuCOaBERS.jpg', '2020-04-13 15:38:00', '2020-04-30 04:24:01'),
(664, 'Promotion Gifts', 196, 'categories/April2020/Hen4SFPTMOQ7vMUab3lC.png', '2020-04-13 15:39:00', '2020-04-30 04:24:28'),
(665, 'Badge', 196, 'categories/April2020/BmRJl1tnpCzZ4YR3MvUl.jpg', '2020-04-13 15:39:00', '2020-04-30 04:24:52'),
(666, 'Balloon & Inflatable', 196, 'categories/April2020/P4njDzE9XtsUjlaBNKyM.jpeg', '2020-04-13 15:39:00', '2020-04-30 04:25:52'),
(667, 'Basketry', 196, 'categories/April2020/FMWk9D3lDmOSoiJw7Ie4.jpg', '2020-04-13 15:39:00', '2020-04-30 04:26:22'),
(668, 'Medal', 196, 'categories/April2020/XbRwk2DdU2Cuma6KE2Mr.jpg', '2020-04-13 15:40:00', '2020-04-30 04:26:33'),
(669, 'Mobile Phone Decoration', 196, 'categories/April2020/3L8oKAEdAPT60YoZf9hp.jpg', '2020-04-13 15:40:00', '2020-04-30 04:26:51'),
(670, 'Photo Album', 196, 'categories/April2020/FDzShU1yS6c7CrVNwufX.jpg', '2020-04-13 15:40:00', '2020-04-30 04:27:05'),
(671, 'Ribbon', 196, 'categories/April2020/CzMuKg0aHwLQ3heMR3LC.jpg', '2020-04-13 15:40:00', '2020-04-30 04:28:37'),
(673, 'Souvenirs', 196, 'categories/April2020/G3yULLqsbLsRWLyNFMCe.jpg', '2020-04-13 15:41:00', '2020-04-30 04:29:57'),
(674, 'Stickers', 196, 'categories/April2020/UNqZi8kn86a2lSGwkEgT.webp', '2020-04-13 15:41:00', '2020-04-30 04:30:24'),
(675, 'Antique & Collection', 197, 'categories/April2020/kUGTleqCIiZ67Nr5hc7z.jpg', '2020-04-13 15:42:00', '2020-04-30 04:30:45'),
(676, 'Artificial Antique Crafts', 197, 'categories/April2020/saidDB13jS9goo0jkGKX.jpg', '2020-04-13 15:42:00', '2020-04-30 04:32:37'),
(677, 'Artificial Crafts', 197, 'categories/April2020/KtE75nnK5FRjcm98rYMD.jpg', '2020-04-13 15:42:00', '2020-04-30 04:33:17'),
(678, 'Carving & Sculpture', 197, 'categories/April2020/qpdis5Wqlk63IC9gucls.jpg', '2020-04-13 15:43:00', '2020-04-30 04:33:40'),
(679, 'Fengshui Crafts', 197, 'categories/April2020/8TzBr4HfVlMf03nBrv39.jpg', '2020-04-13 15:43:00', '2020-04-30 04:34:15'),
(680, 'Folk-custom Crafts', 197, 'categories/April2020/kb5yyW1s3u1j4El7BGZI.jpg', '2020-04-13 15:43:00', '2020-04-30 04:34:52'),
(681, 'Fountain', 197, 'categories/April2020/AEJ36VeFk9stgyAar9CX.jpg', '2020-04-13 15:44:00', '2020-04-30 04:35:52'),
(683, 'Art Frame', 198, 'categories/April2020/rYRY6Wm2GPPBHnvvkONz.webp', '2020-04-13 15:44:00', '2020-04-30 04:36:38'),
(684, 'Painting & Calligraphy', 198, 'categories/April2020/fP2pJ7gSzGxC8WxBj7SV.jpg', '2020-04-13 15:45:00', '2020-04-30 04:46:19'),
(685, 'Calendar', 198, 'categories/April2020/kYLYEKbsonTepTOIQvdS.jpg', '2020-04-13 15:45:00', '2020-04-30 04:37:25'),
(686, 'Clock & Watch', 198, 'categories/April2020/gc6rvoDIlWuSfEFyZlCi.jpg', '2020-04-13 15:45:00', '2020-04-30 04:38:25'),
(687, 'Cloisonne', 198, 'categories/April2020/mpWig31Vu5BaJwYjw7G3.webp', '2020-04-13 15:46:00', '2020-04-30 04:39:40'),
(688, 'Digital Photo Frame', 198, 'categories/April2020/60tif0vEjpT9kSdS3jbN.jpg', '2020-04-13 15:46:00', '2020-04-30 04:51:15'),
(689, 'Fine Timepiece', 198, 'categories/April2020/mc4P2mrHK7oSbCC9xPUr.jpeg', '2020-04-13 15:46:00', '2020-04-30 04:51:40'),
(690, 'Flower, Bonsai & Decorative Plant', 198, 'categories/April2020/nz0yr5xkD6cPABHG7WGd.jpg', '2020-04-13 15:47:00', '2020-04-30 04:52:00'),
(691, 'Folding Screens', 198, 'categories/April2020/O5OSTrCJRZ8RHHO6GpPJ.jpg', '2020-04-13 15:47:00', '2020-04-30 04:58:31'),
(692, 'Office Electronics', 198, 'categories/April2020/s0xPdVhS3BpiIWmu0xGh.jpg', '2020-04-13 15:47:00', '2020-04-30 04:59:42'),
(693, 'Office Gifts & Decoration', 198, 'categories/April2020/SjW3ZZCTFfW8jQBvG4Ks.jpg', '2020-04-13 15:47:00', '2020-04-30 05:00:07'),
(694, 'Plant Plaiting', 198, 'categories/April2020/j93rkE8IxbZgGQJxis3I.jpg', '2020-04-13 15:48:00', '2020-04-30 05:00:32'),
(695, 'Vase', 198, 'categories/April2020/6hlPY1tfeQjtF8malnLO.jpg', '2020-04-13 15:49:00', '2020-04-30 05:01:00'),
(696, 'Arts & Crafts Stocks', 199, 'categories/April2020/4uLsnEAXLrsGpjoT2n9F.jpg', '2020-04-13 15:49:00', '2020-04-30 05:02:42'),
(697, 'Other Crafts', 199, 'categories/April2020/NOzjmDTHq5P5Y29dHpFv.jpg', '2020-04-13 15:49:00', '2020-04-30 05:03:12'),
(698, 'Foam', 200, 'categories/April2020/h1xTBIKEC6eHi0IOHK4A.jpg', '2020-04-13 16:06:00', '2020-04-30 05:03:42'),
(699, 'Plastic & Polymer', 200, 'categories/April2020/9QcWePUz4mlaT2ADZXlC.jpg', '2020-04-13 16:06:00', '2020-04-30 05:04:02'),
(700, 'Plastic Products', 200, 'categories/April2020/rqcOkAO43XMGEi1okWR3.jpg', '2020-04-13 16:07:00', '2020-04-30 05:04:59'),
(701, 'Rubber & Rubber Products', 200, 'categories/April2020/BxMgtkTuHmYGWhv9OpWo.png', '2020-04-13 16:07:00', '2020-04-30 05:05:26'),
(702, 'Silicone & Silicone Products', 200, 'categories/April2020/eu9snEsnGPTnYs0ohOOM.jpg', '2020-04-13 16:07:00', '2020-04-30 05:05:41'),
(703, 'Paint & Coating', 201, 'categories/April2020/iNOSSlpDArSsCaFWIqnP.jpg', '2020-04-13 16:08:00', '2020-04-30 05:06:56'),
(704, 'Pigment & Dye', 201, 'categories/April2020/Z56LDtox88xdqUa2TPlu.jpg', '2020-04-13 16:08:00', '2020-04-30 05:07:16'),
(705, 'Organic Chemicals', 202, 'categories/April2020/HDKKQoMh9T0JnRytVfwf.jpg', '2020-04-13 16:09:00', '2020-04-30 05:07:42'),
(706, 'Fiberglass Products', 203, 'categories/April2020/807vIoyZhBgDW2a3wYxV.jpg', '2020-04-13 16:10:00', '2020-04-30 05:08:14'),
(707, 'Inorganic Chemicals', 203, 'categories/April2020/M7H1YWPnOXHoDxB7m2UM.jpg', '2020-04-13 16:10:00', '2020-04-30 05:10:58'),
(708, 'Inorganic Fiber', 203, 'categories/April2020/goQHsy9k3DRb79ppejBu.jpg', '2020-04-13 16:10:00', '2020-04-30 05:11:23'),
(709, 'Inorganic Salt', 203, 'categories/April2020/DeEekZRCs1KTtSz8Eq6v.jpg', '2020-04-13 16:11:00', '2020-04-30 05:11:47'),
(710, 'Additive', 204, 'categories/April2020/V6dQFH53dcbLPhuKx6To.jpg', '2020-04-13 16:11:00', '2020-04-30 05:12:22'),
(711, 'Chemical Auxiliary & Catalyst', 204, 'categories/April2020/trlG782F4tnTTdY0lscR.jpg', '2020-04-13 16:12:00', '2020-04-30 05:13:43'),
(712, 'Adhesive', 204, 'categories/April2020/6Nx1NjGvvjLNWrKeG8ag.jpg', '2020-04-13 16:12:00', '2020-04-30 05:14:06'),
(713, 'Artificial Graphite & Active Carbon', 204, 'categories/April2020/jiPlUwCa3FZgXvGHPzLI.jpg', '2020-04-13 16:12:00', '2020-04-30 05:14:30'),
(714, 'Chemical Filling', 204, 'categories/April2020/ONIdN3KkOLdlmDMDIujS.jpg', '2020-04-13 16:13:00', '2020-04-30 05:15:44'),
(715, 'Chemical Reagent', 204, 'categories/April2020/h1QgbMhgHRIjL2arD0qp.jpg', '2020-04-13 16:13:00', '2020-04-30 05:28:44'),
(716, 'Flux & Impregnant', 204, 'categories/April2020/qnBKeAuorBbQfonJzkxC.jpg', '2020-04-13 16:13:00', '2020-04-16 09:39:00'),
(717, 'Soundless Cracking Agent', 204, 'categories/April2020/eyNtVMsID0mlssSgtqRl.jpg', '2020-04-13 16:14:00', '2020-04-16 09:39:41'),
(718, 'Specialized Preparation', 204, 'categories/April2020/qpFpg5VGd8jA715pqhRk.png', '2020-04-13 16:14:00', '2020-04-30 05:32:34'),
(719, 'Explosive & Combustible', 205, 'categories/April2020/EKw8kYv6RfxtLOsRjQny.jpg', '2020-04-13 16:14:00', '2020-04-30 05:33:10'),
(720, 'Lubricant', 205, 'categories/April2020/n0hlf7zPrq5EGTJawsI8.jpg', '2020-04-13 16:15:00', '2020-04-30 05:33:41'),
(721, 'Petrochemical Refining', 205, 'categories/April2020/wDJ4U8IyMXVTefek7PQB.jpg', '2020-04-13 16:15:00', '2020-04-30 05:34:07'),
(722, 'Wax & Fat', 205, 'categories/April2020/hqu9xygE78EEt92Za7kT.jpg', '2020-04-13 16:15:00', '2020-04-30 05:35:03'),
(723, 'Essential Oil, Balsam & Fine Chemicals', 206, 'categories/April2020/8O4H0xuccaG10dElmDrr.jpg', '2020-04-13 16:16:00', '2020-04-30 05:35:37'),
(724, 'Agricultural Chemicals', 207, 'categories/April2020/mPVz3oIyCNrwdesmjgSh.jpg', '2020-04-13 16:17:00', '2020-04-30 05:36:02'),
(725, 'Fertilizer', 207, 'categories/April2020/loLalffdJr1nNNa3SvgX.jpg', '2020-04-13 16:17:00', '2020-04-30 05:39:15'),
(726, 'Rosin & Forest Chemical', 207, 'categories/April2020/jxIaMKq1ePQcAvuxQQnP.jpg', '2020-04-13 16:17:00', '2020-04-30 05:40:24'),
(727, 'Biochemical', 208, 'categories/April2020/BgT4MeC1y69h7LGvVAfR.jpg', '2020-04-13 16:18:00', '2020-04-30 05:40:45'),
(728, 'Pharmaceutical Chemicals', 208, 'categories/April2020/JVIeoScuIBvrjF4dKYHQ.jpg', '2020-04-13 16:18:00', '2020-04-30 05:41:10'),
(729, 'Pharmaceutical Intermediate', 208, 'categories/April2020/SPaFJdUrFkYA0cUT4uLL.jpg', '2020-04-13 16:19:00', '2020-04-16 09:52:44'),
(730, 'Packaging Materials', 209, 'categories/April2020/TYFmJZQ3KsB5VGsISHJF.jpg', '2020-04-13 16:19:00', '2020-04-30 05:42:53'),
(731, 'Printing Materials', 209, 'categories/April2020/0vXDNdbHm0b5icSyypr9.jpg', '2020-04-13 16:19:00', '2020-04-30 05:43:21'),
(733, 'Chemical Equipment & Machinery', 210, 'categories/April2020/z4zmpbeJvsijBhUKi3JH.jpg', '2020-04-13 16:20:00', '2020-04-30 05:45:58'),
(734, 'Household Plastic Products', 210, 'categories/April2020/t5iTwkaiUpe6gOl1VhKW.jpg', '2020-04-13 16:21:00', '2020-04-30 05:47:43'),
(735, 'Plastic Machinery', 210, 'categories/April2020/15fnpDOJg3iz5M4Cq8dg.jpg', '2020-04-13 16:21:00', '2020-04-30 05:48:16'),
(736, 'Rubber Machinery', 210, 'categories/April2020/S05yD8ErUAS9jKlMrsAh.jpg', '2020-04-13 16:21:00', '2020-04-30 05:48:37'),
(738, 'Chemical Waste', 211, 'categories/April2020/IdJjdt7PN7hEXv6g1zmi.png', '2020-04-13 16:22:00', '2020-04-30 05:49:45'),
(739, 'Laboratory Instruments', 211, 'categories/April2020/3wnzOKnirjlM664sCY3k.jpg', '2020-04-13 16:23:00', '2020-04-30 05:50:08'),
(740, 'New-type Chemical Material', 211, 'categories/April2020/QyjUKOrg0XT4wRJJStHz.jpg', '2020-04-13 16:23:00', '2020-04-30 05:50:55'),
(742, 'Other Chemicals', 211, 'categories/April2020/yTH2Miz2mJAzgdkM9okH.jpg', '2020-04-13 16:24:00', '2020-04-30 05:55:32'),
(743, 'Handbags', 212, 'categories/April2020/y4B5jQWABTNRpmUmjFIg.webp', '2020-04-13 16:25:00', '2020-04-30 05:56:24'),
(744, 'Wallet & Purses', 212, 'categories/April2020/mj6QXYqyvFlq5rDse8L1.jpg', '2020-04-13 16:25:00', '2020-04-30 05:56:52'),
(745, 'Briefcase', 212, 'categories/April2020/jr3KoPVTRwaFinwWgJ1B.jpg', '2020-04-13 16:25:00', '2020-04-30 06:01:25'),
(746, 'Card Holder', 212, 'categories/April2020/3VwxpmVIQacKISwsqLFX.jpg', '2020-04-13 16:26:00', '2020-04-30 05:58:02'),
(747, 'Tool Box & Case', 212, 'categories/April2020/j7GiGU7JkWowvnTR69ZQ.jpg', '2020-04-13 16:26:00', '2020-04-30 05:58:25'),
(748, 'Waist Bag', 212, 'categories/April2020/NCW3GMw4dZkKerB09poo.jpg', '2020-04-13 16:26:00', '2020-04-30 05:59:50'),
(749, 'CD Bag & Case', 213, 'categories/April2020/zMMuzDSkDdwL6uTFnn3L.jpg', '2020-04-13 16:27:00', '2020-04-30 06:01:56'),
(750, 'Camera Bag', 213, 'categories/April2020/R8p2PhHLY8F924f0E8PE.jpg', '2020-04-13 16:27:00', '2020-04-30 06:02:30'),
(751, 'Computer Bag', 213, 'categories/April2020/MDi2NrHbbE4OdTXBXeIl.jpg', '2020-04-13 16:27:00', '2020-04-30 06:13:02'),
(752, 'Mobile Phone Case', 213, 'categories/April2020/MHo4Hx3RTtdQR4zhtV3i.jpg', '2020-04-13 16:28:00', '2020-04-30 06:13:25'),
(753, 'Tablet Case & Cover', 213, 'categories/April2020/PNP6vCtWZKfl1Y2n0MLl.jpg', '2020-04-13 16:28:00', '2020-04-30 06:13:41'),
(754, 'Other Digital Products Bags', 213, 'categories/April2020/mVzb9RsVhLq96HISb9I2.jpg', '2020-04-13 16:28:00', '2020-04-30 06:24:13'),
(755, 'Garment Bag', 214, 'categories/April2020/hzNXHycZtO9fw1WRU6Qa.webp', '2020-04-13 16:29:00', '2020-04-30 06:16:01'),
(756, 'Travel Bag', 214, 'categories/April2020/FJQcoWlxPwVS2cmcUbwX.jpg', '2020-04-13 16:29:00', '2020-04-30 06:16:27'),
(757, 'Trolley & Luggage', 214, 'categories/April2020/tQ2iBUIvZ68qUhHb33OO.jpg', '2020-04-13 16:29:00', '2020-04-30 06:16:50'),
(758, 'Backpack', 215, 'categories/April2020/kb16XeWPmS8ac1yOzexy.jpeg', '2020-04-13 16:30:00', '2020-04-30 06:17:19'),
(759, 'Cooler Bag & Box', 215, 'categories/April2020/am0xVNu3wAYlnwKJb2mj.jpg', '2020-04-13 16:30:00', '2020-04-30 06:18:33'),
(760, 'Golf Bag', 215, 'categories/April2020/0c5wX4o8xgpGWThbUaxB.jpg', '2020-04-13 16:30:00', '2020-04-30 06:18:52'),
(761, 'Picnic Bags', 215, 'categories/April2020/nsArQc7Gia2amBuUu62t.png', '2020-04-13 16:31:00', '2020-04-30 06:19:14'),
(762, 'Cosmetic Bag & Case', 216, 'categories/April2020/q45ZRsQs1yfGLxWrpZW1.jpg', '2020-04-13 16:31:00', '2020-04-30 06:19:40'),
(763, 'Gift Box & Bag', 216, 'categories/April2020/rVbSsFSo86LbzRVI9evY.jpg', '2020-04-13 16:31:00', '2020-04-30 06:20:49'),
(764, 'Shopping Bags', 216, 'categories/April2020/vB9IkUWokpnVnznWmv9j.jpg', '2020-04-13 16:32:00', '2020-04-30 06:21:16'),
(765, 'Chip Case & Bag', 216, 'categories/April2020/lNN379GpKVYdTyM3FDSk.jpg', '2020-04-13 16:32:00', '2020-04-30 06:22:25'),
(766, 'Decorative Box', 216, 'categories/April2020/LcaEgtGXZ5pO9Uk31FeL.jpg', '2020-04-13 16:33:00', '2020-04-30 06:25:38'),
(767, 'Diaper Bag', 216, 'categories/April2020/zUhebV3S2qgwY0DZoKlD.webp', '2020-04-13 16:33:00', '2020-04-30 06:26:14'),
(768, 'Instrument Bag & Case', 216, 'categories/April2020/8pWjb2H92u0ZvNHz5zMd.jpg', '2020-04-13 16:33:00', '2020-04-30 06:26:38'),
(769, 'Jewelry Box', 216, 'categories/April2020/vwZNJeBeDCsEXA942OrY.jpg', '2020-04-13 16:34:00', '2020-04-30 06:27:20'),
(770, 'Laundry Bag', 216, 'categories/April2020/tzK5L4tj1kqrj64D5EUa.jpg', '2020-04-13 16:34:00', '2020-04-30 06:27:44'),
(771, 'Military Bag', 216, 'categories/April2020/vYNm3kBROW3JwoTEmyH9.jpg', '2020-04-13 16:34:00', '2020-04-30 06:28:51'),
(772, 'Music Box', 216, 'categories/April2020/NPo1xHyyQ5e11Lry18Tj.jpg', '2020-04-13 16:34:00', '2020-04-30 06:29:10'),
(773, 'Non Woven Bag', 216, 'categories/April2020/HrKDvtBorcmprkl9cmFi.jpg', '2020-04-13 16:35:00', '2020-04-30 06:35:02'),
(774, 'Pencil Bags & Cases', 216, 'categories/April2020/pA1FtvUopbztU1DIvLYk.jpg', '2020-04-13 16:35:00', '2020-04-30 06:35:43'),
(775, 'Promotional Bags', 216, 'categories/April2020/RfAAltKRB0R2M48uvmZr.jpg', '2020-04-13 16:35:00', '2020-04-30 06:36:12'),
(776, 'School Bags', 216, 'categories/April2020/GDUtq39bvK4vrBw1OO3O.jpg', '2020-04-13 16:36:00', '2020-04-30 06:37:15'),
(777, 'Specialized Case & Box', 216, 'categories/April2020/pn8GOn2nQ4HxB3Kr26qd.jpg', '2020-04-13 16:36:00', '2020-04-30 06:37:48'),
(778, 'Tool Bag', 216, 'categories/April2020/d8fqeBWB2PDIw4dxSleK.jpg', '2020-04-13 16:36:00', '2020-04-30 06:38:11'),
(779, 'Watch Box', 216, 'categories/April2020/YFWfFnakU7YjbLLH9jS3.jpg', '2020-04-13 16:37:00', '2020-04-30 06:38:32'),
(780, 'Bag Parts & Accessories', 217, 'categories/April2020/qBrVTUPUVEZ0P9t42UNr.webp', '2020-04-13 16:37:00', '2020-04-30 06:39:29'),
(781, 'Other Bags & Cases', 217, 'categories/April2020/oyRy0jQiDXwUAPXJh2Nr.jpg', '2020-04-13 16:37:00', '2020-04-30 06:41:03'),
(782, 'Bathroom Fittings & Accessories', 218, 'categories/April2020/cbslCM2X0Sp2GYCDzUkX.png', '2020-04-13 16:39:00', '2020-04-30 06:41:29'),
(783, 'Faucet, Tap & Mixer', 218, 'categories/April2020/DdFFKZ4G83q3pTAHMM0b.jpg', '2020-04-13 16:39:00', '2020-04-30 06:41:59'),
(784, 'Sauna Room', 218, 'categories/April2020/FdhE3qJKI9zBn1PXaZQ8.jpg', '2020-04-13 16:40:00', '2020-04-30 06:43:13'),
(785, 'Shower Head & Shower Set', 218, 'categories/April2020/i3XkUkni23TOXZWHY4gf.jpg', '2020-04-13 16:40:00', '2020-04-30 06:44:32'),
(786, 'Shower Room & Shower Enclosure', 218, 'categories/April2020/XLzGFkTOCiPuiubAN6Eh.jpg', '2020-04-13 16:40:00', '2020-04-30 06:46:01'),
(787, 'Sink & Basin', 218, 'categories/April2020/aGSHVMPYVYEXwxSTy72h.jpg', '2020-04-13 16:40:00', '2020-04-30 06:46:25'),
(788, 'Toilet & Accessories', 218, 'categories/April2020/0XOddDk2HkMPmitnmpFu.png', '2020-04-13 16:41:00', '2020-04-30 06:47:03'),
(789, 'Awning', 218, 'categories/April2020/JadyHih5ZOpT4kUOBUyx.jpg', '2020-04-13 16:41:00', '2020-04-30 06:47:59'),
(790, 'Bath Mat', 218, 'categories/April2020/T0nypA78LBji9N5Denwi.jpg', '2020-04-13 16:41:00', '2020-04-30 06:48:31'),
(791, 'Bathtub', 218, 'categories/April2020/2tbLZlJmGJQlGC0j5CKm.jpg', '2020-04-13 16:42:00', '2020-04-30 06:49:05'),
(792, 'Fiberglass Products', 218, 'categories/April2020/PR98iJeD0oZuNJKXFCrf.jpg', '2020-04-13 16:42:00', '2020-04-30 06:49:39'),
(793, 'Kitchen Appliance', 218, 'categories/April2020/jqnDAPYbCDLUOpHokHOl.jpg', '2020-04-13 16:42:00', '2020-04-30 06:50:40'),
(794, 'Slate, Marble, Granite & Stone', 219, 'categories/April2020/7dCiWqMAUN6ztl4VxHjj.jpg', '2020-04-13 16:43:00', '2020-04-30 06:51:11'),
(795, 'Concrete,Mortar & Admixtures', 219, 'categories/April2020/PzKlRdW2h8RpfONpdl7P.jpg', '2020-04-13 16:43:00', '2020-04-30 06:52:38'),
(796, 'Sand, Lime & Plaster', 219, 'categories/April2020/E6AW1EelNvqhV6FG6eIU.jpg', '2020-04-13 16:44:00', '2020-04-30 06:53:45'),
(797, 'Brick, Tile & Accessories', 220, 'categories/April2020/5hVLVabuQylUQRjRe3BQ.jpg', '2020-04-13 16:44:00', '2020-04-30 06:55:08'),
(798, 'Floors & Flooring', 220, 'categories/April2020/As6IMIiImLMoqLaE8egA.jpg', '2020-04-13 16:44:00', '2020-04-30 06:55:33'),
(799, 'Door', 221, 'categories/April2020/TJ6y2qDhtu7ysMoHhakp.jpg', '2020-04-13 16:45:00', '2020-04-30 06:55:57'),
(800, 'Door & Window Hardware', 221, 'categories/April2020/pEBKCCKczFACAap1nKnf.jpg', '2020-04-13 16:45:00', '2020-04-30 06:56:29'),
(801, 'Lock', 221, 'categories/April2020/Q5AA1fpsYQIbFjglhNcA.jpg', '2020-04-13 16:45:00', '2020-04-30 06:58:21'),
(802, 'Window', 221, 'categories/April2020/m42s4uzvMza8RPYmsjQG.jpg', '2020-04-13 16:46:00', '2020-04-30 06:58:47'),
(803, 'Blinds, Shades & Shutters', 221, 'categories/April2020/Dpohvax4QvWM2dXpMnN1.jpg', '2020-04-13 16:46:00', '2020-04-30 06:59:04'),
(804, 'Doorbell', 221, 'categories/April2020/EvPFkJcqkbxRbo0rQOMi.jpg', '2020-04-13 16:46:00', '2020-04-30 06:59:27'),
(805, 'Building Glass', 222, 'categories/April2020/vlkGdcKu9lSYmP9krxL9.jpg', '2020-04-13 16:47:00', '2020-04-30 06:59:54'),
(806, 'Ceiling', 222, 'categories/April2020/e3u1NCzl6fYIHL7YW51F.jpg', '2020-04-13 16:47:00', '2020-04-30 07:00:53'),
(807, 'Decoration Materials', 222, 'categories/April2020/Pkkn7GZEkjYdBx33CZYC.jpg', '2020-04-13 16:47:00', '2020-04-30 07:01:22'),
(808, 'Mirror', 222, 'categories/April2020/A1pJTXUFVIYNf5NzANjw.webp', '2020-04-13 16:48:00', '2020-04-30 07:01:44'),
(809, 'Partition', 222, 'categories/April2020/BL7MNzG2qMvhwxqTqcF2.jpg', '2020-04-13 16:48:00', '2020-04-30 07:02:12'),
(810, 'Stairs & Stair Parts', 222, 'categories/April2020/j8Zry7VNtrPgTNMYhBQX.jpg', '2020-04-13 16:48:00', '2020-04-30 07:02:34');
INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `created_at`, `updated_at`) VALUES
(811, 'Construction Accessories', 222, 'categories/April2020/59ZMFaxLxzOknbAu5Em8.jpg', '2020-04-13 16:49:00', '2020-04-30 07:03:44'),
(812, 'Ladder', 222, 'categories/April2020/46j838zLiiSAS5dBQ3zn.jpg', '2020-04-13 16:49:00', '2020-04-30 07:04:15'),
(813, 'Paint & Coating', 222, 'categories/April2020/tybng3CKFn0ecPR6F7Np.jpg', '2020-04-13 16:49:00', '2020-04-30 07:42:55'),
(815, 'Building Heater', 223, 'categories/April2020/t2bN8v0xmni1osF0bjQS.jpg', '2020-04-13 16:50:00', '2020-04-30 07:43:17'),
(816, 'Building Steel & Structure', 223, 'categories/April2020/ClRpiox5awt3SKPin8wp.jpg', '2020-04-13 16:50:00', '2020-04-30 07:43:38'),
(817, 'Construction Pipe & Tube', 223, 'categories/April2020/Z5ApHijBRYkYVOwkK18o.jpg', '2020-04-13 16:51:00', '2020-04-30 07:44:03'),
(819, 'Fence', 223, 'categories/April2020/EHfHHUaRxcKZDzYHemfQ.jpg', '2020-04-13 16:51:00', '2020-04-30 07:45:29'),
(821, 'Pipe Fittings', 223, 'categories/April2020/qQPKuJvbJLiTsuTYRydG.jpg', '2020-04-13 16:52:00', '2020-04-30 07:46:11'),
(822, 'Shaped Building Material', 223, 'categories/April2020/gohP2rFgKrCoPqFjK1rw.jpg', '2020-04-13 16:52:00', '2020-04-30 07:48:18'),
(823, 'Timber & Plywood', 223, 'categories/April2020/CYzCzPygI8S8IWIpuqnr.jpg', '2020-04-13 16:53:00', '2020-04-30 07:48:36'),
(824, 'Wire Mesh', 223, 'categories/April2020/5AAz7yUsqXCQmPxicsFK.jpg', '2020-04-13 16:53:00', '2020-04-30 07:49:05'),
(825, 'Building Sealing', 223, 'categories/April2020/iSkyH72xTcRUjnLSHx3o.jpg', '2020-04-13 16:53:00', '2020-04-30 07:49:29'),
(826, 'Cement & Precast Component', 223, 'categories/April2020/kxOCjiqRwifgC16j8CM1.jpg', '2020-04-13 16:54:00', '2020-04-30 07:50:13'),
(827, 'Construction Materials Stocks', 223, 'categories/April2020/e1NPsjIoG9IDN8poX03G.jpg', '2020-04-13 16:54:00', '2020-04-16 12:00:37'),
(828, 'Fire Retardant & Fireproof Material', 223, 'categories/April2020/p15ayyjt3McWHNPiTcSm.jpg', '2020-04-13 16:54:00', '2020-04-30 07:51:08'),
(829, 'Plumbing Hardware', 223, 'categories/April2020/bTADs2HALo3cUBFz1UFx.jpg', '2020-04-13 16:55:00', '2020-04-30 07:52:27'),
(830, 'Prefabricated Building', 223, 'categories/April2020/qlTcbZdst7E6EDCGxeNM.jpg', '2020-04-13 16:55:00', '2020-04-30 07:52:42'),
(831, 'Sound & Heat Insulation', 223, 'categories/April2020/ogasb3rJ25owjvj1WFI1.jpg', '2020-04-13 16:55:00', '2020-04-30 07:53:12'),
(832, 'Sound Absorption Materials', 223, 'categories/April2020/cGF74X61Kk0JorRaWSWS.jpg', '2020-04-13 16:56:00', '2020-04-30 07:53:44'),
(833, 'Special Building Materials', 223, 'categories/April2020/PQr7o1k6uiAnkDhr633G.jpg', '2020-04-13 16:56:00', '2020-04-30 07:54:48'),
(834, 'Steel & Products', 223, 'categories/April2020/T5iQyR64d5Ej9S03SSa1.jpg', '2020-04-13 16:57:00', '2020-04-30 07:55:10'),
(835, 'Waterproof Building Materials', 223, 'categories/April2020/TlAXZEq24M3Rmg7p21D6.jpg', '2020-04-13 16:57:00', '2020-04-30 07:55:54'),
(836, 'Plug', 224, 'categories/April2020/qy4dGqXIjCu69yzIkFUX.webp', '2020-04-13 16:57:00', '2020-04-30 07:56:21'),
(837, 'Socket & Outlet', 224, 'categories/April2020/7CyfcI5ykuOcIYzBJGXz.jpeg', '2020-04-13 16:58:00', '2020-04-30 07:57:10'),
(838, 'Switch', 224, 'categories/April2020/NAyE0DqByGOQKtepLRMk.jpg', '2020-04-13 16:58:00', '2020-04-30 07:57:32'),
(839, 'Construction Equipment & Tools', 225, 'categories/April2020/3fGzu8flznArZ0rMQy2r.jpg', '2020-04-13 16:58:00', '2020-04-30 07:58:51'),
(840, 'Mailbox', 225, 'categories/April2020/Mbp3rGHysZ1bV1NLig17.jpg', '2020-04-13 16:59:00', '2020-04-30 07:58:06'),
(841, 'Other Building & Decoration Materials', 225, 'categories/April2020/y6l45N80Xv4SJG9ehq6e.jpg', '2020-04-13 16:59:00', '2020-04-30 08:00:55'),
(842, 'Cartoon Character', 226, 'categories/April2020/7EyWVjEBk8BrXzJ7uO4W.jpeg', '2020-04-13 18:57:00', '2020-04-30 08:01:49'),
(843, 'Sword & Gun Toys', 226, 'categories/April2020/XYp4EqZpjpbBTSTNK6Z2.jpg', '2020-04-13 18:58:00', '2020-04-30 08:01:51'),
(844, 'Doll & Puppet', 227, 'categories/April2020/NWMMpPTqNdlzmzZsZIvs.jpg', '2020-04-13 18:58:00', '2020-04-30 08:03:03'),
(845, 'Plush & Stuffed Toy', 227, 'categories/April2020/c6D3W72Sgl9wqTCvagN0.jpg', '2020-04-13 19:00:00', '2020-04-30 08:03:29'),
(846, 'Board Game & Card', 228, 'categories/April2020/Ms06MgO8uFjX3K0kTfkS.jpg', '2020-04-13 19:01:00', '2020-04-30 08:04:04'),
(847, 'Intellectual & Educational Toys', 228, 'categories/April2020/nEnloJCZtqeqzQGdCIWA.jpg', '2020-04-13 19:01:00', '2020-04-30 08:04:29'),
(848, 'Magical Toys', 228, 'categories/April2020/I3But7cTbc53WjlLe74A.jpg', '2020-04-13 19:01:00', '2020-04-30 08:05:08'),
(849, 'Model & Miniature Toys', 228, 'categories/April2020/WkJiEF4osffM9C5EvsR6.jpg', '2020-04-13 19:02:00', '2020-04-30 08:05:27'),
(850, 'Musical Toys', 228, 'categories/April2020/TlXnR6ZdpB5de8GJlZLv.jpg', '2020-04-13 19:02:00', '2020-04-30 08:05:45'),
(851, 'Inflatable Toys', 229, 'categories/April2020/riR6dybVY0fTOdlt7Djp.jpg', '2020-04-13 19:14:00', '2020-04-30 08:06:18'),
(852, 'Ball', 229, 'categories/April2020/ucHYYgITcaTSSfv9tOkf.jpg', '2020-04-13 19:14:00', '2020-04-30 08:08:55'),
(853, 'Dart Board', 229, 'categories/April2020/4NWAjvYYrXweE1IuJ2nt.jpg', '2020-04-13 19:14:00', '2020-04-30 08:09:19'),
(854, 'Frisbee', 229, 'categories/April2020/DPCUyBYOaqvTNR16Icje.jpg', '2020-04-13 19:15:00', '2020-04-30 08:09:37'),
(855, 'Jump Rope', 229, 'categories/April2020/8y1veBm8WuoWvo74Imow.jpg', '2020-04-13 19:15:00', '2020-04-30 08:09:54'),
(856, 'Kick Scooter & Surfing Scooter', 229, 'categories/April2020/Ttu8zrTZirBa6QoZMoJu.jpg', '2020-04-13 19:15:00', '2020-04-30 08:10:41'),
(857, 'Sports & Fitness', 229, 'categories/April2020/E637pqHwUDr1IZiARwpl.webp', '2020-04-13 19:16:00', '2020-04-30 08:11:01'),
(858, 'Kids Bike', 230, 'categories/April2020/Y45FKl24B0uxLxaFJWyw.jpg', '2020-04-13 19:16:00', '2020-04-30 08:11:43'),
(859, 'Remote Control Toys', 230, 'categories/April2020/3P0gBF1gIovR4J2tANVY.jpeg', '2020-04-13 19:16:00', '2020-04-30 08:12:43'),
(860, 'Vehicle Toys', 230, 'categories/April2020/DXk4zBfc4F5FITt5jPLY.jpg', '2020-04-13 19:17:00', '2020-04-30 20:57:17'),
(861, 'Balloon & Inflatable', 231, 'categories/April2020/0mkjlx41I5cLmX2Of18A.jpg', '2020-04-13 19:18:00', '2020-04-30 20:58:54'),
(862, 'Ceramic Toys', 231, 'categories/April2020/AKs2CO5nzoPw0qNrKgNB.jpg', '2020-04-13 19:18:00', '2020-04-30 20:59:34'),
(863, 'Electrical Toys', 231, 'categories/April2020/3bDdVWDXzSEDUpIkJiun.jpg', '2020-04-13 19:19:00', '2020-04-30 21:00:05'),
(864, 'Plastic Toys', 231, 'categories/April2020/6t8utqTOSXQgIof4dVSa.jpg', '2020-04-13 19:19:00', '2020-04-30 21:00:27'),
(865, 'Wooden Toys', 231, 'categories/April2020/2LLUy1TPrKpw09xOngpc.jpg', '2020-04-13 19:19:00', '2020-04-30 21:01:19'),
(867, 'Artificial Toys', 233, 'categories/April2020/lYpAMNfz4xr0pXOhLzOy.jpg', '2020-04-13 19:22:00', '2020-04-30 21:01:43'),
(868, 'Folk Toys', 233, 'categories/April2020/ngOiQ2eDMz0px1uMNsCY.jpg', '2020-04-13 19:22:00', '2020-04-30 21:02:05'),
(869, 'Baby Toys', 233, 'categories/April2020/Znk9R6QcBLOMHZIx4WEc.webp', '2020-04-13 19:23:00', '2020-04-30 21:02:22'),
(870, 'Novelty Toys', 233, 'categories/April2020/NJvRiVbdCYW4rJy1nPYT.jpg', '2020-04-13 19:23:00', '2020-04-30 21:02:52'),
(871, 'Pet Toys', 233, 'categories/April2020/bNNeiPwsjim9X0eF2cI3.jpg', '2020-04-13 19:24:00', '2020-04-30 21:03:47'),
(872, 'Toy Accessories', 234, 'categories/April2020/QNJQsGghrKHXjlZhwtNn.jpeg', '2020-04-13 19:24:00', '2020-04-30 21:04:11'),
(873, 'Toy Stocks', 234, 'categories/April2020/emc1ABtfnKV7MOe6TuOL.jpg', '2020-04-13 19:24:00', '2020-04-30 21:04:45'),
(875, 'LED Display', 235, 'categories/April2020/t1jdBC5fNycjJjIqp6Ce.jpg', '2020-04-13 19:25:00', '2020-04-30 21:05:43'),
(876, 'LED Encapsulation Series', 235, 'categories/April2020/PI6cj4QYHTQ05Ctuxuhp.webp', '2020-04-13 19:26:00', '2020-04-30 21:07:42'),
(877, 'LED Interior Lighting', 235, 'categories/April2020/ZVAn4gXB6tj4eiIHoebJ.jpeg', '2020-04-13 19:26:00', '2020-04-30 21:08:17'),
(878, 'LED Lighting Decoration', 235, 'categories/April2020/U6rLNMblBXmsnYgId6pU.jpg', '2020-04-13 19:26:00', '2020-04-30 21:08:49'),
(879, 'LED Outdoor Lighting', 235, 'categories/April2020/2iMD6ONAfIB0WqZSsPGK.jpg', '2020-04-13 19:27:00', '2020-04-30 21:09:22'),
(880, 'LED Professional Lighting', 235, 'categories/April2020/AbFeiZ9skHfHYz5pcyBB.jpg', '2020-04-13 19:27:00', '2020-04-30 21:10:22'),
(881, 'Interior Lighting', 236, 'categories/April2020/Q7xCxblX74CtwxkSBlNc.jpg', '2020-04-13 19:27:00', '2020-04-30 21:10:45'),
(882, 'Outdoor Lighting', 236, 'categories/April2020/AZyShnjiaGTTgo586ac0.jpg', '2020-04-13 19:28:00', '2020-04-30 21:11:10'),
(884, 'Stage Lighting', 237, 'categories/April2020/ObAchI27ZCIe48Ftb0AI.jpg', '2020-04-13 19:28:00', '2020-04-30 21:11:28'),
(885, 'Lighting Decoration', 238, 'categories/April2020/x1kJCXV7NF03CpfQdz3s.webp', '2020-04-13 19:29:00', '2020-04-30 21:16:23'),
(886, 'Emergency Light & Indicator Light', 239, 'categories/April2020/v3QNxCX3Pbh51CtISBWZ.jpg', '2020-04-13 19:29:00', '2020-04-30 21:18:19'),
(888, 'Car Light & Auto Mirror', 239, 'categories/April2020/ilREA3Gw4jfyXt7YPBDz.jpg', '2020-04-13 19:30:00', '2020-04-30 21:18:46'),
(889, 'Light Box', 239, 'categories/April2020/z1iFW9jQwQJfWXH71I5U.jpg', '2020-04-13 19:30:00', '2020-04-30 21:19:10'),
(890, 'Portable Lighting', 239, 'categories/April2020/mrHXqk7DcEM3HkC3wzd5.jpg', '2020-04-13 19:30:00', '2020-04-30 21:20:00'),
(891, 'Professional Lighting', 239, 'categories/April2020/eBG1ilbcFYxlhfhhqxdJ.jpg', '2020-04-13 19:31:00', '2020-04-30 21:20:22'),
(892, 'Sensor Light', 239, 'categories/April2020/0aCOEFGR06EK3UHfLs7S.jpg', '2020-04-13 19:31:00', '2020-04-30 21:20:51'),
(893, 'Torch & Flashlight', 239, 'categories/April2020/IwJRUBuFnAiMwGUnbnib.jpg', '2020-04-13 19:31:00', '2020-04-30 21:21:43'),
(894, 'Bulb & Lamp', 240, 'categories/April2020/UbtZwvTimgL4FiwQi2gU.jpg', '2020-04-13 19:32:00', '2020-04-30 21:22:07'),
(895, 'Compact Bulb & Lamp', 240, 'categories/April2020/YSSYgCj4o9aS2yRcx6km.jpg', '2020-04-13 19:32:00', '2020-04-30 21:22:53'),
(896, 'Lighting Fixtures', 241, 'categories/April2020/3H5t0UvchbcLMqRFKOcH.jpg', '2020-04-13 19:34:00', '2020-04-30 21:23:15'),
(897, 'Light Stocks', 242, 'categories/April2020/QPK6z3iUeMVp3f1xLloj.jpg', '2020-04-13 19:34:00', '2020-04-30 21:24:16'),
(898, 'Other Lights & Lighting', 242, 'categories/April2020/Jzy0wFwB2ap7sUGZ7loj.jpeg', '2020-04-13 19:35:00', '2020-04-30 21:26:09'),
(899, 'Fitness Equipment & Body Building', 243, 'categories/April2020/NNddtklV9qTiljQoF0CW.jpg', '2020-04-13 19:47:00', '2020-04-30 21:24:58'),
(900, 'Sporting Goods', 243, 'categories/April2020/Bz01aNGKrBbi1bY0hs3K.jpg', '2020-04-13 19:48:00', '2020-04-30 21:25:25'),
(901, 'Sports Field Equipment & Facilities', 243, 'categories/April2020/EMQte3YnwVgnh0aZEiLD.jpg', '2020-04-13 19:48:00', '2020-04-30 21:32:42'),
(902, 'Sports Protection', 243, 'categories/April2020/IdPdX2Kr7Pt7TyaoNbZp.webp', '2020-04-13 19:49:00', '2020-04-30 21:27:21'),
(903, 'ATV, Quad & Parts', 244, 'categories/April2020/POXF14TuBixMjEn12MQs.jpg', '2020-04-13 19:49:00', '2020-04-30 21:27:55'),
(904, 'Barbecue', 244, 'categories/April2020/aOmA3uTJXOD6wpPRptMO.jpg', '2020-04-13 19:50:00', '2020-04-30 21:28:20'),
(906, 'Fishing Tackle', 244, 'categories/April2020/cqQoDFBDJdncci1fBrAc.jpg', '2020-04-13 19:50:00', '2020-04-30 21:29:08'),
(907, 'Helmet', 244, 'categories/April2020/qcQ3NWiXMvylIq1S6VI9.jpg', '2020-04-13 19:51:00', '2020-04-30 21:29:22'),
(908, 'Recreational Boat', 244, 'categories/April2020/enFgHKbUom1DBoPdPTT8.jpg', '2020-04-13 19:52:00', '2020-04-30 21:29:49'),
(909, 'Scooters & Parts', 244, 'categories/April2020/c8e3SokPvvIupIjRZfIB.jpg', '2020-04-13 19:52:00', '2020-04-30 21:31:27'),
(910, 'Sports Gear', 244, 'categories/April2020/nn7X1ub47K3PH5eLbKsj.jpg', '2020-04-13 19:53:00', '2020-04-30 21:32:03'),
(911, 'Dart Board', 244, 'categories/April2020/nAsZcPqcK9JiFL6h2qbx.jpg', '2020-04-13 19:53:00', '2020-04-30 21:34:11'),
(912, 'Dirt Bike', 244, 'categories/April2020/WvjcieFw6TLg1gFy5Iev.jpg', '2020-04-13 19:53:00', '2020-04-30 21:34:43'),
(913, 'Folding Bike', 244, 'categories/April2020/RCsQRoTYLJFjpTL8Vvce.jpg', '2020-04-13 19:54:00', '2020-04-30 21:35:39'),
(914, 'Frisbee', 244, 'categories/April2020/KcATRuyeCpL3r4B57Q2I.jpg', '2020-04-13 19:54:00', '2020-04-30 21:35:53'),
(915, 'Go Kart & Parts', 244, 'categories/April2020/VwUeGcBb5BmdioLWuupN.jpg', '2020-04-13 19:55:00', '2020-04-30 21:36:21'),
(916, 'Golf Cart', 244, 'categories/April2020/D8ml6jkSoDHGc4olwUcs.jpg', '2020-04-13 19:55:00', '2020-04-30 21:36:44'),
(917, 'Kids Bike', 244, 'categories/April2020/QPENTk5DRY119xCf7HhH.webp', '2020-04-13 19:55:00', '2020-04-30 21:37:31'),
(918, 'Pocket Bike', 244, 'categories/April2020/barlKUtq0rLZCgFA7h2i.jpg', '2020-04-13 19:56:00', '2020-04-30 21:38:56'),
(919, 'Recreational Boat Parts', 244, 'categories/April2020/HwqK6lE7wZSE3AXO6ihn.jpg', '2020-04-13 19:56:00', '2020-04-30 21:39:56'),
(920, 'Sea Scooter', 244, 'categories/April2020/NfD97Rxl2CIAynNOut6e.jpg', '2020-04-13 19:56:00', '2020-04-30 21:40:14'),
(921, 'Self Balancing Electric Scooter', 244, 'categories/April2020/MbxwT3ZGnYc3kvjdOGIo.jpg', '2020-04-13 19:57:00', '2020-04-30 21:41:05'),
(922, 'Skateboard', 244, 'categories/April2020/7J5DEPGbRFTdWiXaOAmi.jpg', '2020-04-13 19:57:00', '2020-04-30 21:41:24'),
(923, 'Snow Scooter', 244, 'categories/April2020/gIHbdFtrtZDfJVQGLVrB.jpg', '2020-04-13 19:57:00', '2020-04-30 21:41:41'),
(924, 'Telescope & Binoculars', 244, 'categories/April2020/hDrscziDMQmD7kLobXRN.jpg', '2020-04-13 19:58:00', '2020-04-30 21:45:59'),
(925, 'Torch & Flashlight', 244, 'categories/April2020/eKqPvCyhffxh0SP7AizQ.jpg', '2020-04-13 19:58:00', '2020-04-30 21:46:22'),
(928, 'Guitar', 246, 'categories/April2020/R1CFUJoaDPU1JGTWMTdx.webp', '2020-04-13 20:00:00', '2020-04-30 21:46:36'),
(929, 'Musical Instrument', 246, 'categories/April2020/0NyUyuTF1omDb9zN2u4R.jpg', '2020-04-13 20:01:00', '2020-04-30 21:47:06'),
(930, 'Pool & Accessories', 246, 'categories/April2020/OajthOg4zVWv7tW7cEHa.jpg', '2020-04-13 20:01:00', '2020-04-30 21:49:53'),
(931, 'Board Game & Card', 246, 'categories/April2020/PQh8JnGEZ8YeGK36NXr0.jpg', '2020-04-13 20:01:00', '2020-04-30 21:50:19'),
(933, 'Coin Operated Game Machine', 246, 'categories/April2020/yNyrb5TM8eRDn8Hw1MHg.jpg', '2020-04-13 20:03:00', '2020-04-30 21:50:49'),
(934, 'Inflatable Toys', 246, 'categories/April2020/KwYNNVkUJHo5wRfxMesR.jpg', '2020-04-13 20:03:00', '2020-04-30 21:51:07'),
(935, 'Massager', 246, 'categories/April2020/vchYDBug1qgg28BZQYWr.jpg', '2020-04-13 20:03:00', '2020-04-30 21:52:41'),
(939, 'Air Clean Equipment', 248, 'categories/April2020/w2m4SQzHAjDVl2VAResK.jpg', '2020-04-13 20:10:00', '2020-04-30 21:53:03'),
(940, 'Cleaning Machine', 248, 'categories/April2020/qoljVAT6qaDPZaqd2UMR.jpg', '2020-04-13 20:10:00', '2020-04-30 21:54:16'),
(941, 'Environment Protection Device', 248, 'categories/April2020/rEUkXqQ7cUNR2fFuCL45.jpg', '2020-04-13 20:10:00', '2020-04-30 21:54:41'),
(943, 'Mass Transfer and Separation Equipment', 248, 'categories/April2020/CD1w3OgrWSItofBHSBHT.jpg', '2020-04-13 20:11:00', '2020-04-30 21:55:34'),
(944, 'Pneumatic Component', 248, 'categories/April2020/sF4MjQy3PyFSNe5fXLt7.jpg', '2020-04-13 20:15:00', '2020-04-30 21:55:54'),
(945, 'Washing Equipment', 248, 'categories/April2020/cLgBP2s7XVAGutEsB30t.jpg', '2020-04-13 21:12:00', '2020-04-30 21:56:14'),
(946, '3D Scanner', 248, 'categories/April2020/nHTJuJ2l8XrkurBzDoBw.jpg', '2020-04-13 21:13:00', '2020-04-30 21:59:08'),
(947, 'Electric Motor', 248, 'categories/April2020/JCiXGXxdrDg48sKhN71k.jpg', '2020-04-13 21:13:00', '2020-04-30 22:01:15'),
(948, 'Guide Rail', 248, 'categories/April2020/R9X82WCEJNmKzBjgv0GW.jpg', '2020-04-13 21:13:00', '2020-04-30 22:01:40'),
(949, 'Sound & Heat Insulation', 248, 'categories/April2020/lN72qTijLj95iChJOnwT.jpg', '2020-04-13 21:14:00', '2020-04-30 22:02:14'),
(950, 'Bearing', 249, 'categories/April2020/3CH4xjZpWSqPo31UeRLA.jpeg', '2020-04-13 21:14:00', '2020-04-30 22:05:02'),
(951, 'Cutter & Tongs', 249, 'categories/April2020/Z3Lr7yfj5fjYrvY3ZOvR.jpg', '2020-04-13 21:14:00', '2020-04-30 22:14:33'),
(952, 'Fastener & Fitting', 249, 'categories/April2020/pFasdaVgHpwZWj69k0t4.jpg', '2020-04-13 21:15:00', '2020-04-30 22:16:46'),
(953, 'Industrial Adhesive', 249, 'categories/April2020/bDwaU7HPwgP6fcSlpTZB.jpg', '2020-04-13 21:15:00', '2020-04-30 22:17:20'),
(954, 'Sealing & Gaskets', 249, 'categories/April2020/ePNLH9iXuvpDlxbuXlVX.jpg', '2020-04-13 21:15:00', '2020-04-30 22:18:17'),
(955, 'Ball Screw', 249, 'categories/April2020/CGvfyapJihWoz5yI9AiH.jpg', '2020-04-13 21:16:00', '2020-04-30 22:19:02'),
(956, 'Lean Pipe & Pipe Rack System', 249, 'categories/April2020/SkjvchFKJVtTdaQTjI81.jpg', '2020-04-13 21:16:00', '2020-04-30 22:19:27'),
(957, 'Pipe & Tube System', 249, 'categories/April2020/XR0327ibPs29vq6OC7RU.jpg', '2020-04-13 21:16:00', '2020-04-30 22:19:52'),
(958, 'Shaft', 249, 'categories/April2020/9PpDdjuTSMSi8RMNsRcz.jpg', '2020-04-13 21:17:00', '2020-04-30 22:20:35'),
(959, 'Universal Hardware Parts', 249, 'categories/April2020/dtxXVyX45YcXkjZbGBwd.jpg', '2020-04-13 21:17:00', '2020-04-30 22:21:06'),
(960, 'Wheel & Caster', 249, 'categories/April2020/VQZmTtPit23e4eMp1mvQ.jpg', '2020-04-13 21:17:00', '2020-04-30 22:21:25'),
(961, 'Compressor', 250, 'categories/April2020/TjfYxK23FIZXeTltpbWp.jpg', '2020-04-13 21:18:00', '2020-04-30 22:22:32'),
(962, 'Pump & Vacuum Equipment', 250, 'categories/April2020/7nMoAQAn8rMlmeynIiJH.jpg', '2020-04-13 21:18:00', '2020-04-30 22:23:13'),
(963, 'Valve', 250, 'categories/April2020/a77jzckRpa4Wq4upsPFe.jpg', '2020-04-13 21:18:00', '2020-04-30 22:23:31'),
(964, 'Valve Parts', 250, 'categories/April2020/zlaj53YKH6MpyKhwlEqn.jpg', '2020-04-13 21:19:00', '2020-04-30 22:23:53'),
(965, 'Gas Generation Equipment & Parts', 250, 'categories/April2020/EpHbX27ghnKC7NsTx6CY.jpg', '2020-04-13 21:19:00', '2020-04-30 22:25:00'),
(966, 'Industrial Brake', 250, 'categories/April2020/ZXT9cQ6oEaqygxnOuShs.jpg', '2020-04-13 21:19:00', '2020-04-30 22:25:38'),
(967, 'Manipulator', 250, 'categories/April2020/4LQxS735NicaiE7LwCaR.jpg', '2020-04-13 21:20:00', '2020-04-30 22:25:55'),
(968, 'Conveyor & Parts', 251, 'categories/April2020/DyG9zYwh38xwixnEznjY.jpg', '2020-04-13 21:20:00', '2020-04-30 22:26:15'),
(969, 'Engine & Part', 251, 'categories/April2020/bOglSBoj3KPBPwrVChlQ.jpg', '2020-04-13 21:21:00', '2020-04-30 22:27:01'),
(970, 'Power & Generating Sets', 251, 'categories/April2020/4hrVPvhKTmWknG8qWMPw.jpg', '2020-04-13 21:28:00', '2020-04-30 22:27:21'),
(971, 'Power Transmission Parts', 251, 'categories/April2020/IbD5lKraALgsIkWGHNv3.jpg', '2020-04-13 21:28:00', '2020-04-30 22:27:45'),
(972, 'Linear Actuator', 251, 'categories/April2020/NmUxC3F7lNLW92Mg81hq.jpg', '2020-04-13 21:28:00', '2020-04-30 22:28:15'),
(973, 'Boiler & Furnace', 252, 'categories/April2020/ln7NrQl4DqIm8kTfT8nn.jpg', '2020-04-13 21:29:00', '2020-04-30 22:28:53'),
(974, 'Drying Machine', 252, 'categories/April2020/IAskibMcEhHub5rbJ6Fd.jpg', '2020-04-13 21:29:00', '2020-04-30 22:29:13'),
(975, 'Heater & Heat Exchanger', 252, 'categories/April2020/KTGy83xH6re8Y3fC1x08.jpg', '2020-04-13 21:30:00', '2020-04-30 22:30:10'),
(976, 'Industrial Humidifier & Dehumidifier', 251, 'categories/April2020/jl05y3L7BEgVQOQvIQzk.jpg', '2020-04-13 21:36:00', '2020-04-30 22:31:24'),
(977, 'Refrigeration Equipment', 252, 'categories/April2020/xzebwAHMFLhJuB9OSutU.png', '2020-04-13 21:36:00', '2020-04-30 22:31:47'),
(978, 'Ventilation Equipment', 252, 'categories/April2020/a2aBysVEWk5y3mdanSzK.jpg', '2020-04-13 21:37:00', '2020-04-30 22:32:03'),
(979, 'Refrigerator, Freezer & Parts', 252, 'categories/April2020/6IxjYlHceP1uugIV3Y8D.jpg', '2020-04-13 21:37:00', '2020-04-30 22:33:10'),
(980, 'Welding & Soldering Supplies', 253, 'categories/April2020/QO44Av8gIzXNTABDdaH0.jpg', '2020-04-13 21:37:00', '2020-04-30 22:34:01'),
(981, 'Welding Equipment', 253, 'categories/April2020/Be0iVj8XQ5jj4ttlWUfC.jpg', '2020-04-13 21:38:00', '2020-04-30 22:34:17'),
(982, 'Industrial Customized Service', 254, 'categories/April2020/osgadbEEZ7zBd1Tn5V4Y.jpg', '2020-04-13 21:38:00', '2020-04-30 22:34:49'),
(983, 'Industrial 3D Printer', 254, 'categories/April2020/8nd2FdLiDc9WQKSe5YqY.jpg', '2020-04-13 21:39:00', '2020-04-30 22:40:26'),
(984, 'Machinery Stocks', 254, 'categories/April2020/JzCavRyxrDgXFVNVoNpf.jpg', '2020-04-13 21:39:00', '2020-04-16 18:33:52'),
(985, 'Other Equipment & Components', 254, 'categories/April2020/A9Xn7DB4oYM9dBlAogOJ.jpg', '2020-04-13 21:39:00', '2020-04-30 22:36:29'),
(986, 'Analysis Instrument', 255, 'categories/April2020/Xmrz7UjfICKGmT1zU6bu.jpg', '2020-04-13 21:44:00', '2020-04-30 22:36:57'),
(987, 'Detector', 255, 'categories/April2020/9K2OwhOg8M3dH4vX2qU5.jpg', '2020-04-13 21:44:00', '2020-04-30 22:37:20'),
(989, 'Test Instrument', 255, 'categories/April2020/QbZZiFenMh5jxQRhgReH.jpg', '2020-04-13 21:45:00', '2020-04-30 22:37:58'),
(990, '3D Scanner', 255, 'categories/April2020/ribe3zmDBDpN00jZAEYM.jpg', '2020-04-13 21:45:00', '2020-04-30 22:39:28'),
(991, 'Auto Repair Equipment & Tools', 255, 'categories/April2020/3GTj1vcozbg6At6B4jNj.jpg', '2020-04-13 21:45:00', '2020-04-30 22:38:59'),
(992, 'Medical Diagnosis Equipment', 255, 'categories/April2020/VvwWz75DMwsnNWmhD2nb.jpg', '2020-04-13 21:45:00', '2020-04-30 22:41:30'),
(993, 'Sensor', 255, 'categories/April2020/OT6OKc3x2i37AUyabnee.jpg', '2020-04-13 21:46:00', '2020-04-30 22:42:08'),
(994, 'Transmitter', 255, 'categories/April2020/FKyPfLDNVDYdVN7G6Enh.jpg', '2020-04-13 21:46:00', '2020-04-30 22:43:51'),
(995, 'Meter for Electricity', 256, 'categories/April2020/N021McVMMGLP17X5YI60.jpg', '2020-04-13 21:47:00', '2020-04-30 22:43:09'),
(996, 'Meter for Liquid & Gas', 256, 'categories/April2020/bKdZ1lsOoO830ayRVsVB.jpg', '2020-04-13 21:47:00', '2020-04-30 22:44:38'),
(997, 'Physical Measuring Meter', 256, 'categories/April2020/yejkHTo26IMzTyni9jV5.jpg', '2020-04-13 21:47:00', '2020-04-30 22:45:17'),
(998, 'Weighing & Measuring Apparatus', 256, 'categories/April2020/d1dY5lG8wQ3RUK4gdIds.jpg', '2020-04-13 21:48:00', '2020-04-30 22:47:24'),
(999, 'Color Card & Color Comparator', 256, 'categories/April2020/O2oriCqwIphApFZutnqf.jpg', '2020-04-13 21:48:00', '2020-04-30 22:46:32'),
(1000, 'Geographic Surveying Instrument', 256, 'categories/April2020/blgqxZ48it0nR7ei6HWz.jpg', '2020-04-13 21:48:00', '2020-04-30 22:48:08'),
(1001, 'Optical Lens & Instrument', 257, 'categories/April2020/oJVuTfqHmztzqw5bhMO8.jpg', '2020-04-13 21:49:00', '2020-04-30 22:48:27'),
(1002, 'Lab Utensil and Disposable', 258, 'categories/April2020/qttb6dQRTzKXAGrsbMI0.jpg', '2020-04-13 21:49:00', '2020-04-30 22:49:03'),
(1003, 'Laboratory Instruments', 258, 'categories/April2020/xOVu3yZ1uSmZtUwp3rEr.jpg', '2020-04-13 21:50:00', '2020-04-30 22:49:30'),
(1004, 'Beauty Equipment', 259, 'categories/April2020/98I259YDJ41GWhm2lnka.jpg', '2020-04-13 21:50:00', '2020-04-30 22:50:14'),
(1005, 'Cable Tools', 259, 'categories/April2020/IRLjT2G5cDrvs0VATfiR.jpg', '2020-04-13 21:50:00', '2020-04-30 22:50:37'),
(1006, 'Demonstrational Utensil', 259, 'categories/April2020/YmWYARXdMHSOXtIAWPdF.jpg', '2020-04-13 21:51:00', '2020-05-01 03:51:49'),
(1007, 'Dental Apparatus', 259, 'categories/April2020/QVKYjBguZw3DEkK6KRxa.jpg', '2020-04-13 21:51:00', '2020-04-30 22:55:47'),
(1008, 'Electrical Control System', 259, 'categories/April2020/jk5XcwqORQTbRI1Tbday.jpg', '2020-04-13 21:51:00', '2020-04-30 22:56:05'),
(1009, 'Electrode', 259, 'categories/April2020/PrfSCETYkgRS4H15ZIlD.jpg', '2020-04-13 21:52:00', '2020-04-30 22:56:26'),
(1010, 'Heating, Refrigeration & Temperature Control', 259, 'categories/April2020/4RGiCMNif5fRM1Aug2Fj.jpg', '2020-04-13 21:52:00', '2020-04-30 22:57:08'),
(1011, 'Instrument Box', 259, 'categories/April2020/SOZUn2kKxMxrHpQRa7G5.png', '2020-04-13 21:52:00', '2020-04-30 22:57:52'),
(1012, 'Timer & Counter', 259, 'categories/April2020/6ABVeJHDyXqogpSzag8w.jpg', '2020-04-13 21:53:00', '2020-04-30 22:58:18'),
(1013, 'Universal Medical Implement', 259, 'categories/April2020/65M4qscLYNOt9RphTSEh.jpg', '2020-04-13 21:53:00', '2020-04-30 22:58:47'),
(1014, 'Other Instruments & Meters', 259, 'categories/April2020/b6FsoKxsZPphNJItQQRT.jpg', '2020-04-13 21:53:00', '2020-04-30 22:59:12'),
(1015, 'Cookware', 260, 'categories/April2020/MDESLcK54sFajy3iRxa7.webp', '2020-04-13 21:55:00', '2020-04-30 23:00:16'),
(1016, 'Cup & Mug', 260, 'categories/April2020/A2owlS6RKt9unv8OvRze.png', '2020-04-13 21:55:00', '2020-04-30 23:02:05'),
(1017, 'Drinkware', 260, 'categories/April2020/TgKbzNfmCfrG80Ffxkzj.jpg', '2020-04-13 21:56:00', '2020-04-30 23:00:32'),
(1018, 'Hair Tools & Accessories', 260, 'categories/April2020/KyvoKI4KfFn6XbsJVX8j.jpg', '2020-04-13 21:56:00', '2020-04-30 23:01:24'),
(1019, 'Kitchen Implements', 260, 'categories/April2020/2Gd7aFTV1X4xgi1tPU7s.jpg', '2020-04-13 21:56:00', '2020-04-30 23:02:49'),
(1020, 'Labels', 260, 'categories/April2020/edemsdYwLFcFGNmdkQMr.jpg', '2020-04-13 21:57:00', '2020-04-30 23:03:15'),
(1021, 'Tableware', 260, 'categories/April2020/7QWkNTTjUEYgZQ0JFW8n.jpg', '2020-04-13 21:57:00', '2020-04-30 23:03:35'),
(1022, 'Apron', 260, 'categories/April2020/PNcIGwv0kE1pOJznuawv.jpg', '2020-04-13 21:59:00', '2020-04-30 23:04:35'),
(1023, 'Ceramics, Porcelain & Enamel', 260, 'categories/April2020/pcIsAWcJmUmHVnbPRjJ9.jpg', '2020-04-13 21:59:00', '2020-04-30 23:05:00'),
(1024, 'Glassware', 260, 'categories/April2020/TbInvisX52eWoopmetGO.webp', '2020-04-13 21:59:00', '2020-04-30 23:05:48'),
(1025, 'Kitchen Electronics', 260, 'categories/April2020/PBVFrzyJ8r98RV4pv2Gi.png', '2020-04-13 22:00:00', '2020-04-30 23:06:47'),
(1026, 'Laundry Bag', 260, 'categories/April2020/At9a3T6dzmHg4pleeHWG.jpg', '2020-04-13 22:03:00', '2020-05-01 00:43:12'),
(1027, 'Salon Equipment', 260, 'categories/April2020/Vw87wSeO0SfiORIiAVOq.jpg', '2020-04-13 22:03:00', '2020-05-01 00:43:37'),
(1028, 'Bath Supplies', 261, 'categories/April2020/sosr3Dee1TlYSAkJAU57.webp', '2020-04-13 22:04:00', '2020-05-01 00:44:39'),
(1029, 'Beauty & Personal Care Products', 261, 'categories/April2020/QGPJ4eg3LYzgeVIDbkzI.jpg', '2020-04-13 22:04:00', '2020-05-01 00:45:16'),
(1030, 'Hair Care Products', 261, 'categories/April2020/6ZtKZRU40DbCTByl4kkE.jpg', '2020-04-13 22:04:00', '2020-05-01 00:46:50'),
(1031, 'Hair Tools & Accessories', 261, 'categories/April2020/PrhJFuivdXPxXtDIeO0j.jpg', '2020-04-13 22:04:00', '2020-05-01 00:47:11'),
(1032, 'Makeup', 261, 'categories/April2020/b3Q01vIqxkMdHKf6YFQD.jpg', '2020-04-13 22:05:00', '2020-05-01 00:47:37'),
(1033, 'Makeup Tools', 261, 'categories/April2020/KBCk5dudOnpcaR5m7Eqf.jpg', '2020-04-13 22:05:00', '2020-05-01 00:47:56'),
(1034, 'Nail Beauty Products', 261, 'categories/April2020/Be0UYJnqSvcqQ6CQhZYc.png', '2020-04-13 22:06:00', '2020-05-01 00:48:36'),
(1035, 'Oral Care', 261, 'categories/April2020/tBnvuUJ0R0HsaGWTY0A4.jpg', '2020-04-13 22:06:00', '2020-05-01 00:48:55'),
(1036, 'Paper for Household & Sanitation', 261, 'categories/April2020/So7tkC4uhMPLEWzWKMc9.jpg', '2020-04-13 22:07:00', '2020-05-01 00:49:13'),
(1037, 'Skin Care', 261, 'categories/April2020/UbKVStSAR8gc10uZxFkd.jpg', '2020-04-13 22:08:00', '2020-05-01 00:50:35'),
(1038, 'Cosmetic Bag & Case', 261, 'categories/April2020/1D4ENTlRuWGeOanebbzV.jpg', '2020-04-13 22:08:00', '2020-05-01 00:50:59'),
(1039, 'Bedding', 262, 'categories/April2020/6ZGFmoUhvujXfP2OGtZz.jpg', '2020-04-13 22:09:00', '2020-05-01 00:51:28'),
(1040, 'Carpet, Rug & Mat', 262, 'categories/April2020/vTcaaQtLiT1xNvO2zRNi.jpg', '2020-04-13 22:09:00', '2020-05-01 00:51:47'),
(1041, 'Curtain', 262, 'categories/April2020/oV3pJfUBmxX5A4lDsV2p.jpg', '2020-04-13 22:09:00', '2020-05-01 00:52:25'),
(1042, 'Decorative Cloth', 262, 'categories/April2020/erCjsBzGmQ65blkaSzUB.jpg', '2020-04-13 22:09:00', '2020-05-01 00:52:44'),
(1043, 'Kitchen Textile', 262, 'categories/April2020/PM2KVxX93GBkSGWbfSjj.jpg', '2020-04-13 22:10:00', '2020-05-01 00:53:08'),
(1044, 'Table Cloth', 262, 'categories/April2020/dmhYhedf6maSRFSzjkCA.jpg', '2020-04-13 22:10:00', '2020-05-01 00:53:32'),
(1045, 'Towel & Handkerchief', 262, 'categories/April2020/RlsQ75On0M3ZB1Wh7WAe.webp', '2020-04-13 22:10:00', '2020-05-01 00:54:13'),
(1046, 'Household Chemicals', 263, 'categories/April2020/p9rF2YpbhcRjoFJq0wm1.jpg', '2020-04-13 22:11:00', '2020-05-01 00:54:47'),
(1047, 'Household Plastic Products', 263, 'categories/April2020/OSNeQggDgTqQGZUqjiPL.jpg', '2020-04-13 22:11:00', '2020-05-01 00:55:15'),
(1048, 'Household Receptacle', 263, 'categories/April2020/I4Mv1O8Znox2N05KFK0t.jpg', '2020-04-13 22:11:00', '2020-05-01 00:55:43'),
(1049, 'Sanitary Utensil', 263, 'categories/April2020/uHhUGcE8DuS2WXB3sEzr.jpg', '2020-04-13 22:12:00', '2020-04-16 19:43:25'),
(1050, 'Laundry Basket', 263, 'categories/April2020/iyCCjuZ8FTzDad0MDI89.jpg', '2020-04-13 22:12:00', '2020-05-01 00:58:13'),
(1051, 'Lens Cleaner', 263, 'categories/April2020/1vx5EJOrIly0Vy3z12qy.jpg', '2020-04-13 22:12:00', '2020-05-01 00:58:35'),
(1052, 'Vacuum Cleaner', 263, 'categories/April2020/inXaakWHgzPPvLkXLXvh.jpg', '2020-04-13 22:13:00', '2020-05-01 01:01:21'),
(1053, 'Clock & Watch', 264, 'categories/April2020/5CAdI5kAGgMhevq4rySY.jpg', '2020-04-13 22:13:00', '2020-05-01 01:53:41'),
(1054, 'Eyewear', 264, 'categories/April2020/2sQac9zQGfnDsT0osM23.jpg', '2020-04-13 22:13:00', '2020-05-01 01:54:08'),
(1055, 'Horticulture & Gardening Products', 265, 'categories/April2020/JJIEBSlG4K3dwyVUnh1e.webp', '2020-04-13 22:14:00', '2020-05-01 01:54:31'),
(1056, 'Camping & Outdoor Gear', 265, 'categories/April2020/pz0x1GuPhsSlhpM1TZTP.jpg', '2020-04-13 22:14:00', '2020-05-01 01:55:00'),
(1057, 'Fishing Tackle', 265, 'categories/April2020/mjBEzlXoXRiqdmMmyxcO.jpg', '2020-04-13 22:15:00', '2020-05-01 01:56:02'),
(1058, 'Fitness Equipment & Body Building', 265, 'categories/April2020/eWHoPum0k0wgsWTO15VP.jpg', '2020-04-13 22:15:00', '2020-05-01 01:56:19'),
(1059, 'Garden Sprayer', 265, 'categories/April2020/May9r4UJEUT7b9ZcZE9D.webp', '2020-04-13 22:16:00', '2020-05-01 01:56:50'),
(1060, 'Musical Instrument', 265, 'categories/April2020/fwxIRjSNKks7op74Davq.jpg', '2020-04-13 22:16:00', '2020-05-01 01:57:14'),
(1061, 'Pet Supplies', 265, 'categories/April2020/aaHmWbcctgML3dOoUrB6.jpg', '2020-04-13 22:16:00', '2020-05-01 01:58:47'),
(1062, 'Sporting Goods', 265, 'categories/April2020/Wne4lpSnsST0LyyNfk90.jpg', '2020-04-13 22:17:00', '2020-05-01 01:59:06'),
(1063, 'Baby Goods', 266, 'categories/April2020/fFcNhZehsVJLV5PKW5SI.jpg', '2020-04-13 22:17:00', '2020-05-01 01:59:35'),
(1064, 'Awning, Umbrella & Raincoat', 267, 'categories/April2020/YomaGaYwxckbUWrGC1S0.jpg', '2020-04-13 22:18:00', '2020-05-01 02:00:03'),
(1065, 'Match, Lighter & Smoking Set', 267, 'categories/April2020/eNYY5eMq62WYcgVS16WT.jpg', '2020-04-13 22:18:00', '2020-05-01 02:00:52'),
(1066, 'Rack, Shelf, Holder & Hanger', 267, 'categories/April2020/kMSd7qKDaotiZbva95ue.jpg', '2020-04-13 22:19:00', '2020-05-01 02:01:28'),
(1067, 'CD Bag & Case', 267, 'categories/April2020/xRpQMME6dITsLVGhV5Ke.jpg', '2020-04-13 22:19:00', '2020-05-01 02:03:27'),
(1068, 'Cooler Bag & Box', 267, 'categories/April2020/Iy1u63KGfDKFmLqhzaKU.jpg', '2020-04-13 22:19:00', '2020-05-01 02:03:48'),
(1069, 'Darning & Sewing Utensil', 267, 'categories/April2020/HLRy0QVFjhTbV8gsWRyB.jpg', '2020-04-13 22:20:00', '2020-05-01 02:04:20'),
(1070, 'Disposable Products', 267, 'categories/April2020/qQodRmtOIta26vQv2Fvh.jpg', '2020-04-13 22:20:00', '2020-05-01 02:14:08'),
(1071, 'Air Freshener', 267, 'categories/April2020/ZEfrRN4t6SJmHMSjefmr.jpg', '2020-04-13 22:20:00', '2020-05-01 02:19:29'),
(1072, 'Garment Bag', 267, 'categories/April2020/fpW10EQ75NBbLC2K0fFm.webp', '2020-04-13 22:21:00', '2020-05-01 02:15:17'),
(1073, 'Home Hardware', 267, 'categories/April2020/QiPf8WqPDfg8lVCO3DZO.jpg', '2020-04-13 22:21:00', '2020-05-01 02:15:37'),
(1074, 'Hotel Amenities', 267, 'categories/April2020/UKOZNcKvAX5Dvp1hJiS5.webp', '2020-04-13 22:21:00', '2020-05-01 02:15:56'),
(1075, 'Household Rubber Products', 267, 'categories/April2020/Zio48oCRd2iw1j1rKNO4.jpg', '2020-04-13 22:22:00', '2020-05-01 02:20:25'),
(1076, 'Insect Killer', 267, 'categories/April2020/lSLcKARjg5xCHHXaYWoe.jpg', '2020-04-13 22:23:00', '2020-05-01 02:20:44'),
(1077, 'Ladder', 267, 'categories/April2020/ToSZrf6aeQ0hyLyxOuAm.jpg', '2020-04-13 22:23:00', '2020-05-01 02:21:01'),
(1078, 'Non Woven Bag', 267, 'categories/April2020/nVHySep7MZUC7IK49U2q.jpg', '2020-04-13 22:23:00', '2020-05-01 02:32:35'),
(1079, 'Pesticide & Insecticides', 267, 'categories/April2020/WOw4jDNBe6bnr5tW9exC.jpg', '2020-04-13 22:24:00', '2020-05-01 02:33:14'),
(1080, 'Picnic Bags', 267, 'categories/April2020/57e3bccSjq6mNPLWIZyn.png', '2020-04-13 22:24:00', '2020-05-01 02:33:43'),
(1081, 'Shopping Bags', 267, 'categories/April2020/7jp2hDzljlEuE1EgAtpP.jpg', '2020-04-13 22:24:00', '2020-05-01 02:34:05'),
(1082, 'Specialized Case & Box', 267, 'categories/April2020/nYQ4goWmbGRsSIq2TX0I.jpg', '2020-04-13 22:25:00', '2020-05-01 02:35:06'),
(1083, 'Stationery', 267, 'categories/April2020/Vi7mUaydG2beawDlEpam.jpg', '2020-04-13 22:25:00', '2020-05-01 02:35:26'),
(1085, 'Twine, Rope & Netting', 267, 'categories/April2020/rtlt0gSqKQ63GGsXKQmk.jpg', '2020-04-13 22:25:00', '2020-05-01 02:36:04'),
(1086, 'Weighing & Measuring Apparatus', 267, 'categories/April2020/VAsrG3nFVLvHedKdcIx6.jpg', '2020-04-13 22:26:00', '2020-05-01 02:36:30'),
(1087, 'Other Digital Products Bags', 267, 'categories/April2020/yrpSW95gTfnJuvlkklJP.jpg', '2020-04-13 22:26:00', '2020-05-01 02:37:21'),
(1088, 'Exhibition and Advertising Equipment', 268, 'categories/April2020/fwyBnpync62fVVPnDPlV.jpg', '2020-04-13 22:26:00', '2020-05-01 02:37:52'),
(1089, 'Tape & Adhesive', 268, 'categories/April2020/gN89W0pT7FvCLZDgyO9U.jpg', '2020-04-13 22:27:00', '2020-05-01 02:38:11'),
(1090, 'Inflatable Advertising', 268, 'categories/April2020/PsfVwCEgAf8c7f2f7uv2.jpg', '2020-04-13 22:27:00', '2020-05-01 02:38:37'),
(1091, 'Mannequin', 268, 'categories/April2020/vZEyUbkxKmCMdLAj1Vef.jpg', '2020-04-13 22:27:00', '2020-05-01 02:39:15'),
(1092, 'Package & Conveyance', 268, 'categories/April2020/A5LD6IZNzEBHSHYo4QXr.jpg', '2020-04-13 22:28:00', '2020-05-01 02:39:58'),
(1093, 'Package & Printing Service', 268, 'categories/April2020/OOFnApqbfWnkghct1A2G.jpg', '2020-04-13 22:28:00', '2020-05-01 02:40:53'),
(1094, 'Paper Material', 268, 'categories/April2020/jjjselkMVQRgKF9lCT6U.jpg', '2020-04-13 22:28:00', '2020-05-01 02:41:10'),
(1095, 'Pharmaceutical Packaging', 268, 'categories/April2020/6NrKH5gRVNUYIWrzs2SS.jpg', '2020-04-13 22:29:00', '2020-05-01 02:48:52'),
(1096, 'Sack & Bag for Packing', 268, 'categories/April2020/hIcNHtyhZtUHXbJD3nC2.jpeg', '2020-04-13 22:29:00', '2020-05-01 02:49:52'),
(1097, 'Abrasive & Grinding', 270, 'categories/April2020/6KAwLS43t4Tyf58GfZ6s.jpg', '2020-04-13 22:31:00', '2020-05-01 02:50:31'),
(1098, 'Diamond Tools', 270, 'categories/April2020/pbB7fGxpXi9CqTaVz6NO.jpg', '2020-04-13 22:31:00', '2020-05-01 02:52:49'),
(1099, 'Drilling Tools', 270, 'categories/April2020/pAeWR47TYc4PFCqQnEPv.jpg', '2020-04-13 22:32:00', '2020-05-01 02:53:01'),
(1100, 'Hand Tools', 270, 'categories/April2020/SYZCYyD5gWsKcbgD4oiZ.jpg', '2020-04-13 22:32:00', '2020-05-01 02:53:15'),
(1101, 'Hydraulic Parts', 270, 'categories/April2020/Au3fydbobshpnixkFjaO.jpg', '2020-04-13 22:32:00', '2020-05-01 02:53:40'),
(1102, 'Power Tools', 270, 'categories/April2020/eZx5MsD36Bg3U02yhbBS.jpg', '2020-04-13 22:33:00', '2020-05-01 02:56:13'),
(1103, 'Auto Repair Equipment & Tools', 270, 'categories/April2020/GBDON1TKdfMOaTCQHFYh.jpg', '2020-04-13 22:33:00', '2020-05-01 03:09:03'),
(1104, 'Cable Tools', 270, 'categories/April2020/uh4DajntTFfCzFgPlxdJ.jpg', '2020-04-13 22:33:00', '2020-05-01 03:09:22'),
(1105, 'Construction Equipment & Tools', 270, 'categories/April2020/dcKmS4rjDgHkjBVulv0T.jpg', '2020-04-13 22:34:00', '2020-05-01 03:10:54'),
(1106, 'Horticulture & Gardening Products', 270, 'categories/April2020/mcTZ77FylMONBY0jVS4h.webp', '2020-04-13 22:34:00', '2020-05-01 03:11:42'),
(1107, 'Hydraulic Tool', 270, 'categories/April2020/UjECrJ9jpJ3CSv0hlpIo.webp', '2020-04-13 22:34:00', '2020-05-01 03:12:07'),
(1108, 'Pneumatic Tools', 270, 'categories/April2020/FjTCV8HP6WVw1gYw64p7.jpg', '2020-04-13 22:35:00', '2020-05-01 03:12:34'),
(1109, 'Riveter', 270, 'categories/April2020/r66UaltCgrg75hcmH2Io.jpg', '2020-04-13 22:35:00', '2020-05-01 03:12:59'),
(1110, 'Tool Packaging', 270, 'categories/April2020/XWw9PaV5cOyegCvgRP5z.jpg', '2020-04-13 22:35:00', '2020-05-01 03:13:51'),
(1111, 'Welding & Soldering Supplies', 270, 'categories/April2020/HYA3LdwBaeitDbPzipCq.jpg', '2020-04-13 22:36:00', '2020-05-01 03:14:12'),
(1112, 'Building Hardware', 271, 'categories/April2020/p8bfvARNaSoNzeEBcORm.jpg', '2020-04-13 22:36:00', '2020-05-01 03:14:56'),
(1113, 'Hardware Accessories', 271, 'categories/April2020/hGHY7jT4RtB8NvAO9UlE.jpg', '2020-04-13 22:37:00', '2020-05-01 03:17:02'),
(1114, 'Home Hardware', 271, 'categories/April2020/drILFiH5Gf68pYsg1JYy.jpg', '2020-04-13 22:37:00', '2020-05-01 03:20:05'),
(1115, 'Machine Hardware', 271, 'categories/April2020/xzeVaFTAZ3dAPdQVNqs6.jpg', '2020-04-13 22:37:00', '2020-05-01 03:21:30'),
(1116, 'Wheel & Caster', 271, 'categories/April2020/FYV8iWebwF50FK0DVwSG.jpg', '2020-04-13 22:37:00', '2020-05-01 03:21:53'),
(1117, 'Lean Pipe & Pipe Rack System', 271, 'categories/April2020/qjUKciNpRIn7Sx4akQhp.jpg', '2020-04-13 22:38:00', '2020-05-01 03:23:01'),
(1118, 'Pipe Fittings', 271, 'categories/April2020/3wR1khqhFAXOvPOj1sQp.jpg', '2020-04-13 22:38:00', '2020-05-01 03:23:47'),
(1119, 'Universal Hardware Parts', 271, 'categories/April2020/EwwjTkQQGEkZw6vFLZ7d.jpg', '2020-04-13 22:38:00', '2020-05-01 03:24:11'),
(1120, 'Tools & Hardware Stocks', 272, 'categories/April2020/WJGkMNucaMyxks1WdAKI.jpg', '2020-04-13 22:39:00', '2020-05-01 03:24:45'),
(1121, 'Other Tools & Hardware', 272, 'categories/April2020/hd11lBSMESk9ul2w5TZW.png', '2020-04-13 22:39:00', '2020-05-01 03:25:23'),
(1122, 'Printer, Cartridge & Paper', 273, 'categories/April2020/JMsiDevItMcHarA4i8Ii.png', '2020-04-13 22:40:00', '2020-05-01 03:25:47'),
(1123, 'All in One Copier, Printer & Fax', 273, 'categories/April2020/Z0a8gpio57Ny11qIMt5T.jpg', '2020-04-13 22:40:00', '2020-05-01 03:26:11'),
(1124, 'Binding Machine', 273, 'categories/April2020/HRDHk2RmmLvu4BjhSaTn.jpg', '2020-04-13 22:41:00', '2020-05-01 03:26:40'),
(1125, 'Calculator', 273, 'categories/April2020/AlJ2cUpCW3HkjeT7u02A.jpg', '2020-04-13 22:41:00', '2020-05-01 03:27:21'),
(1126, 'Conferencing System', 273, 'categories/April2020/eNvGgoMmQzMdQOGjyz70.jpg', '2020-04-13 22:41:00', '2020-05-01 03:27:42'),
(1127, 'Copier', 273, 'categories/April2020/GMc0kWzZ8QqGfNiLFNnM.jpg', '2020-04-13 22:42:00', '2020-05-01 03:28:04'),
(1128, 'Fax Machine', 273, 'categories/April2020/eO31YtZFmWyzIVNSWgdF.jpg', '2020-04-13 22:42:00', '2020-05-01 03:28:50'),
(1130, 'Laptop', 273, 'categories/April2020/M4BFvQcrxv7K9kIXWS2x.jpg', '2020-04-13 22:43:00', '2020-05-01 03:29:11'),
(1131, 'Office & Education Appliance Stocks', 273, 'categories/April2020/wLzYHWa3JlJZ3Kp8BWdD.jpg', '2020-04-13 22:43:00', '2020-05-01 03:29:36'),
(1132, 'Office Electronics', 273, 'categories/April2020/68lM1ND2lZCoE6LyIKH0.jpg', '2020-04-13 22:43:00', '2020-05-01 03:30:01'),
(1133, 'Office Furniture', 273, 'categories/April2020/pmQ2W4LKDSymgtnhE3zH.jpg', '2020-04-13 22:44:00', '2020-05-01 03:30:53'),
(1134, 'Office Gifts & Decoration', 273, 'categories/April2020/pS6wvphbhWgpysfqoQ9z.jpg', '2020-04-13 22:45:00', '2020-05-01 03:31:19'),
(1135, 'Palm Computer, Pocket PC & PDA', 273, 'categories/April2020/T2rBWQYcG74TUmVNbsYf.jpg', '2020-04-13 22:46:00', '2020-05-01 03:31:46'),
(1136, 'Paper Shredder', 273, 'categories/April2020/jE3qrl5V1MjUr3jLeJlv.jpg', '2020-04-13 22:46:00', '2020-05-01 03:32:05'),
(1137, 'Paper Trimmer', 273, 'categories/April2020/QdkRO0i1NXq3esHf0XeF.webp', '2020-04-13 22:47:00', '2020-05-01 03:32:59'),
(1138, 'Photographic Apparatus', 273, 'categories/April2020/L1CLOhc7kfwQtaIhfKHm.jpg', '2020-04-13 22:47:00', '2020-05-01 03:34:55'),
(1139, 'Scanner', 273, 'categories/April2020/7A5h1153Driccw49rKTL.jpg', '2020-04-13 22:48:00', '2020-05-01 03:33:48'),
(1140, 'Secondhand Office Equipment', 273, 'categories/April2020/N3fduyl6cmqgilDraMbE.jpg', '2020-04-13 22:48:00', '2020-05-01 03:34:13'),
(1141, 'Sewing Thread & Tape', 273, 'categories/April2020/xbe6egQGqjFWLKT56V6l.jpg', '2020-04-13 22:48:00', '2020-05-01 03:35:50'),
(1142, 'Telephone', 273, 'categories/April2020/TRbZO8gZNEiECJIXo62c.jpg', '2020-04-13 22:49:00', '2020-05-01 03:36:04'),
(1143, 'Time & Attendance', 273, 'categories/April2020/1Piiz705CRdCsGdspOM6.webp', '2020-04-13 22:49:00', '2020-05-01 03:36:30'),
(1144, 'Pen, Pencil & Brush', 274, 'categories/April2020/QqhErVnTdFOXrtpZaifa.webp', '2020-04-13 22:49:00', '2020-05-01 03:44:16'),
(1145, 'Stationery', 274, 'categories/April2020/b2HxMIRLRHODsyXEs6xY.jpg', '2020-04-13 22:50:00', '2020-05-01 03:44:34'),
(1146, 'Business Card Case', 274, 'categories/April2020/TveKcraxFQwJjXcG7JjF.jpg', '2020-04-13 22:50:00', '2020-05-01 03:45:03'),
(1147, 'Demonstrational & Teaching Utensil', 275, 'categories/April2020/U3Qjk8PVNzbVq9g1buQi.jpg', '2020-04-13 22:51:00', '2020-05-01 03:47:40'),
(1148, 'Presentation & Bulletin Board', 275, 'categories/April2020/cg7fauhy4RwC53Fvx2jq.jpg', '2020-04-13 22:51:00', '2020-05-01 03:55:01'),
(1149, 'Projector & Equipment', 275, 'categories/April2020/jG0sH8XbhsTARlgSjQKM.jpg', '2020-04-13 22:52:00', '2020-05-01 03:53:12'),
(1150, 'Color Card & Color Comparator', 275, 'categories/April2020/iw55uCBJQlKFp9WeR4Gb.jpg', '2020-04-13 22:53:00', '2020-05-01 03:53:41'),
(1151, 'Laboratory Instruments', 275, 'categories/April2020/dI8F80xHYFveYT2CkkXB.jpg', '2020-04-13 22:53:00', '2020-05-01 03:54:02'),
(1152, 'Learning Machine', 275, 'categories/April2020/MGWKrTnZV9p2ZwddyojZ.png', '2020-04-13 22:55:00', '2020-04-16 21:11:51'),
(1153, 'Optical Lens & Instrument', 275, 'categories/April2020/u6Df7Z1rxOYsS17tWx4Z.jpg', '2020-04-13 22:55:00', '2020-05-01 03:55:48'),
(1154, 'School Furniture', 275, 'categories/April2020/9kZSQYJJKVOVWgycbAN7.webp', '2020-04-13 22:56:00', '2020-05-01 03:56:04'),
(1155, 'Timer & Counter', 275, 'categories/April2020/NA6GnllULhtRQgX1vkDc.jpg', '2020-04-13 22:56:00', '2020-05-01 03:56:19'),
(1156, 'Other Office Supplies', 276, 'categories/April2020/6pWe68jgF5NBq2sSyqdD.jpg', '2020-04-13 22:57:00', '2020-05-01 03:57:14'),
(1157, 'Agricultural Machinery', 277, 'categories/April2020/5vGTRavbmx3kMEzTyAyO.jpg', '2020-04-14 00:16:00', '2020-05-01 03:58:06'),
(1158, 'Commodity Making Machine', 277, 'categories/April2020/TV0xiMd1c3z33uK7zidM.jpg', '2020-04-14 00:16:00', '2020-05-01 03:58:32'),
(1159, 'Crane', 277, 'categories/April2020/UJCwlIOVgysCbkcWqDxZ.webp', '2020-04-14 00:17:00', '2020-05-01 03:59:41'),
(1160, 'Machinery for Food, Beverage & Cereal', 277, 'categories/April2020/vi2kUIVggfWvlgJZjP2b.png', '2020-04-14 00:17:00', '2020-05-01 04:02:33'),
(1161, 'Marking Machinery', 277, 'categories/April2020/kG4j8TsqVsrVfdZKJhye.jpg', '2020-04-14 00:17:00', '2020-05-01 04:00:58'),
(1162, '3D Scanner', 277, 'categories/April2020/rCX6WerqRFjyS1FSCFB6.jpg', '2020-04-14 00:18:00', '2020-05-01 04:02:59'),
(1163, 'Customized Service for Machinery', 277, 'categories/April2020/W6mYszblrnNX5kgeXILm.jpg', '2020-04-14 00:18:00', '2020-04-16 21:17:10'),
(1164, 'الة ضغط هيدروليكي', 277, 'categories/April2020/H3FOHnJEMPvAh62YJ9V4.jpg', '2020-04-14 00:19:00', '2020-05-01 04:03:54'),
(1165, 'Ice Machine', 277, 'categories/April2020/Oq6Gk4KiQy5hdRX0dLNN.webp', '2020-04-14 00:19:00', '2020-05-01 05:43:49'),
(1166, 'Industrial Robot', 277, 'categories/April2020/EOh263Z5f7Ek2GeoHw4u.jpg', '2020-04-14 00:20:00', '2020-05-01 05:44:04'),
(1167, 'Machinery for Garment, Shoes & Accessories', 278, 'categories/April2020/ver07oAFfLaXPkyvZCPO.jpg', '2020-04-14 00:20:00', '2020-05-01 05:44:52'),
(1168, 'Textile Machinery & Parts', 278, 'categories/April2020/uvP3RHfNZ9IO4zDj8kQD.png', '2020-04-14 00:20:00', '2020-05-01 05:45:16'),
(1169, 'Leather Machinery', 278, 'categories/April2020/ynQwxmqX0ksE31jYgqdj.jpg', '2020-04-14 00:21:00', '2020-05-01 05:45:39'),
(1170, 'Chemical Equipment & Machinery', 279, 'categories/April2020/lP3LR2p6QGZNLOXMMDju.jpg', '2020-04-14 00:21:00', '2020-05-01 05:46:40'),
(1171, 'Pharmaceutical Equipment & Machinery', 279, 'categories/April2020/BXwaCoQ1iVdepDhCltIl.jpg', '2020-04-14 00:21:00', '2020-05-01 05:47:26'),
(1172, 'Building Material Making Machinery', 280, 'categories/April2020/3yVYm5nMayNjkTGSmdRC.jpg', '2020-04-14 00:22:00', '2020-05-01 05:47:49'),
(1173, 'Engineering & Construction Machinery', 280, 'categories/April2020/sjjNWHGwvhbzTUmgQORa.jpg', '2020-04-14 00:22:00', '2020-05-01 05:48:13'),
(1174, 'Lifting Equipment', 280, 'categories/April2020/dS4IyjkCCRF5ClUX8ns3.jpg', '2020-04-14 00:22:00', '2020-05-01 05:49:12'),
(1175, 'Mixing Equipment', 280, 'categories/April2020/0j0OWDns5pj4AeYEJWro.jpg', '2020-04-14 00:23:00', '2020-05-01 05:49:31'),
(1176, 'Metallic Processing Machinery', 281, 'categories/April2020/ThRdMgrKcFEqh4IhyXxd.webp', '2020-04-14 00:23:00', '2020-05-01 05:50:00'),
(1177, 'Stone Processing Machinery', 281, 'categories/April2020/MmPb003R8ZrD5In6pOti.jpg', '2020-04-14 00:23:00', '2020-05-01 05:50:27'),
(1178, 'Woodworking Machinery', 281, 'categories/April2020/ZAE9OX71etzE04hg9Rzk.jpg', '2020-04-14 00:24:00', '2020-05-01 05:51:07'),
(1179, 'Furniture Making Machine', 281, 'categories/April2020/h6JpoBc08Cfv69dsmNCu.jpg', '2020-04-14 00:27:00', '2020-05-01 05:51:27'),
(1180, 'Drilling Rig', 282, 'categories/April2020/wXZePgY9ORhPszPbjkCX.jpg', '2020-04-14 00:28:00', '2020-05-01 05:51:46'),
(1181, 'Mining Machinery', 282, 'categories/April2020/4hrC5h1NvwoxZLmV8veo.jpg', '2020-04-14 00:29:00', '2020-05-01 05:52:19'),
(1182, 'Petroleum Equipment & Machinery', 282, 'categories/April2020/xkmG9wvfCvKYyOTbU4jk.jpg', '2020-04-14 00:29:00', '2020-05-01 05:53:04'),
(1183, 'Assembly Line & Production Line', 282, 'categories/April2020/vVFpbFKmvfALjJyW4Uhl.jpg', '2020-04-14 00:30:00', '2020-05-01 05:53:25'),
(1184, 'Metallurgy Machinery', 282, 'categories/April2020/S2Ya5XDOY0bv9rp1nBNJ.jpg', '2020-04-14 00:30:00', '2020-05-01 05:55:41'),
(1185, 'Plastic Machinery', 283, 'categories/April2020/jtPuxDbvoBLq1WVLnFd6.jpg', '2020-04-14 00:31:00', '2020-05-01 05:56:05'),
(1186, 'Rubber Machinery', 283, 'categories/April2020/ChMG7EWH2KH5iNM2ilYD.jpg', '2020-04-14 00:31:00', '2020-05-01 05:56:43'),
(1187, 'Manipulator', 283, 'categories/April2020/3VD6zjYZ5WIVHtB1F0B7.jpg', '2020-04-14 00:32:00', '2020-04-16 21:37:01'),
(1188, 'Paper Machinery', 284, 'categories/April2020/8PMOz6ISozGc8R0s866Y.jpg', '2020-04-14 00:32:00', '2020-05-01 05:57:04'),
(1189, 'Machinery for Glass & Ceramics', 284, 'categories/April2020/bqqd5mHKLxomyEWMQL6q.jpg', '2020-04-14 00:32:00', '2020-05-01 05:58:08'),
(1190, 'Machinery for Packaging Supplies', 285, 'categories/April2020/3cjjXK8lmcSkl3KQ1dpE.jpg', '2020-04-14 00:33:00', '2020-05-01 05:58:32'),
(1191, 'Packing Machinery', 285, 'categories/April2020/gEqurIJKIEZxDXvOuEIr.jpg', '2020-04-14 00:33:00', '2020-05-01 05:58:52'),
(1192, 'Post-Press Equipment', 285, 'categories/April2020/DMA1qwJNIQz3rRUBHpbd.jpg', '2020-04-14 00:34:00', '2020-05-01 05:59:15'),
(1193, 'Pre-Press Equipment', 285, 'categories/April2020/UHMgYzhabdnUCAkNhOqW.png', '2020-04-14 00:34:00', '2020-05-01 06:00:23'),
(1194, 'Printing Machinery', 285, 'categories/April2020/uqwLYh4JvTMjVtxzeOPq.jpg', '2020-04-14 00:35:00', '2020-05-01 06:00:41'),
(1198, 'Cutting & Fold-bend Machine', 287, 'categories/April2020/fXXntYwRoYdchzeADxND.jpg', '2020-04-14 00:36:00', '2020-05-01 06:01:02'),
(1199, 'Engraving Machine', 287, 'categories/April2020/LmBOVARjUzb6SBEYHZGT.jpg', '2020-04-14 00:37:00', '2020-05-01 06:01:20'),
(1200, 'Laser Equipment', 287, 'categories/April2020/m2SWcyrjHt5wA57c8I1o.jpg', '2020-04-14 00:37:00', '2020-05-01 06:59:48'),
(1201, 'Machine Tools', 287, 'categories/May2020/D2MSNoHRgVmsDCXgGoaI.jpg', '2020-04-14 00:37:00', '2020-05-01 07:00:11'),
(1202, 'Recycling Machine', 287, 'categories/May2020/QPGsyRmUMJbCOIpvjhGn.jpg', '2020-04-14 00:38:00', '2020-05-01 07:00:33'),
(1203, 'Sorting Machine', 287, 'categories/May2020/0Oh3Zwh0PxQs6I91FkNp.jpg', '2020-04-14 00:39:00', '2020-05-01 07:00:50'),
(1204, 'Crushing & Culling Machine', 287, 'categories/April2020/bR2OFt3b2wbSnWI2CVth.jpg', '2020-04-14 00:39:00', '2020-04-16 21:51:10'),
(1205, 'Diamond Tools', 287, 'categories/April2020/daPE2z8kNSMDP1hnkaPy.jpg', '2020-04-14 00:39:00', '2020-04-16 21:52:14'),
(1206, 'Etching Machine', 287, 'categories/April2020/3ZcFHSZ17sWyxF8DowHb.jpg', '2020-04-14 00:40:00', '2020-04-16 21:53:59'),
(1208, 'Grinder', 287, 'categories/April2020/jGYFoCUdGxuyc8vCPfRi.jpg', '2020-04-14 00:40:00', '2020-05-01 06:51:34'),
(1209, 'Hand Tools', 287, 'categories/April2020/3dWQsxuRsRYIpVXYZBC4.jpg', '2020-04-14 00:40:00', '2020-05-01 06:51:50'),
(1210, 'Pneumatic Tools', 287, 'categories/April2020/nJLtOEC335IFAEhjroJq.jpg', '2020-04-14 00:41:00', '2020-05-01 06:52:20'),
(1211, 'Power Tools', 287, 'categories/April2020/Adt7831c4OxmRQGKvjRv.jpg', '2020-04-14 00:41:00', '2020-05-01 06:52:43'),
(1212, 'Spraying Machinery & Spreading Equipment', 287, 'categories/April2020/SJttlmCcvl8NiUSawV9n.jpg', '2020-04-14 00:41:00', '2020-05-01 06:53:40'),
(1213, 'Wire Mesh', 287, 'categories/April2020/ahCrnqGrO7vCzqzTjVvB.jpg', '2020-04-14 00:42:00', '2020-05-01 06:54:00'),
(1214, 'Manufacturing Equipment for Electrical & Electronic Product', 288, 'categories/April2020/isywvejswU1yuFlbxD5c.jpg', '2020-04-14 00:42:00', '2020-05-01 06:54:43'),
(1215, 'Mattress Machine', 288, 'categories/April2020/72rrJjtfG1n8lOyFRRhW.jpg', '2020-04-14 00:43:00', '2020-04-16 21:58:01'),
(1216, 'Other Manufacturing & Processing Machinery', 288, 'categories/April2020/fWfzWtqGEfjJETEpN2L3.jpg', '2020-04-14 00:43:00', '2020-05-01 06:55:42'),
(1217, 'Non-ferrous Metal & Products', 289, 'categories/April2020/Yx1tvZoesuvF1bUSEZEO.jpeg', '2020-04-14 01:17:00', '2020-05-01 06:56:14'),
(1218, 'Steel & Products', 289, 'categories/April2020/zRdVvPtEP4BAI4vY4aCX.jpg', '2020-04-14 01:18:00', '2020-05-01 06:56:30'),
(1219, 'Alloy', 289, 'categories/April2020/wl5sE3aZyMvYtnTw8axy.jpg', '2020-04-14 01:18:00', '2020-05-01 06:57:29'),
(1220, 'Iron & Products', 289, 'categories/April2020/9sUGXtOqzgVJdti89Co4.jpg', '2020-04-14 01:19:00', '2020-05-01 06:58:16'),
(1221, 'Metal Stocks', 289, 'categories/April2020/uPcgUR4amg0t3BLAE02o.jpg', '2020-04-14 01:19:00', '2020-05-01 06:58:46'),
(1222, 'Misc Ore', 289, 'categories/April2020/Aj4MVZvrOgvBPKMUzdTJ.jpg', '2020-04-14 01:19:00', '2020-04-16 22:05:45');
INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `created_at`, `updated_at`) VALUES
(1223, 'Rare Earth & Products', 289, 'categories/April2020/mhmerdhIYKrc7BN6JF99.jpg', '2020-04-14 01:20:00', '2020-04-16 22:06:43'),
(1224, 'Target Material', 289, 'categories/April2020/JmDlrqKdIJy3MvU50iHI.jpg', '2020-04-14 01:20:00', '2020-04-16 22:07:35'),
(1225, 'Wire Mesh', 289, 'categories/April2020/WIAmE9gzUeHBFyz3PdbT.jpg', '2020-04-14 01:20:00', '2020-05-01 06:43:07'),
(1226, 'Magnetic Material', 290, 'categories/April2020/6aKMfTHvgTNF09J3j1z0.jpg', '2020-04-14 01:21:00', '2020-05-01 06:43:32'),
(1227, 'Nonmetallic Minerals', 290, 'categories/April2020/65iHbaanfniNjVZhtYRS.jpg', '2020-04-14 01:21:00', '2020-05-01 06:44:33'),
(1245, 'Metallic Processing Machinery', 292, 'categories/April2020/R0JxU14l20YKoRGFlv3A.webp', '2020-04-14 01:28:00', '2020-05-01 06:45:00'),
(1246, 'Metallurgy Machinery', 292, 'categories/April2020/cEDrwdkGmQDol159EWAF.jpg', '2020-04-14 01:28:00', '2020-05-01 06:45:29'),
(1247, 'Mining Machinery', 292, 'categories/April2020/4Gk0p8NNnNCZoKYoHAF2.jpg', '2020-04-14 01:29:00', '2020-05-01 06:46:19'),
(1248, 'Petroleum Equipment & Machinery', 292, 'categories/April2020/QARRbkyfaAvgFMCn26UI.jpg', '2020-04-14 01:29:00', '2020-04-16 23:58:09'),
(1249, 'Other Minerals', 293, 'categories/April2020/UqHu7Ovg311M7jNmotmV.jpg', '2020-04-14 01:30:00', '2020-05-01 06:47:04'),
(1269, 'Bast Fiber Fabric', 297, 'categories/April2020/3GszFpfGKJPmypGS62j9.jpg', '2020-04-14 01:43:00', '2020-05-01 06:47:26'),
(1270, 'Chemical Fiber', 297, 'categories/April2020/Re9lyW1182dhBqYOkzMn.jpg', '2020-04-14 01:44:00', '2020-05-01 06:48:01'),
(1271, 'Compound Fabric', 297, 'categories/April2020/9UBd4fHUv8u398gy6xXn.jpg', '2020-04-14 01:44:00', '2020-05-01 06:48:20'),
(1272, 'Cotton', 297, 'categories/April2020/iscc0YAmskGFFAd7L7Yw.jpg', '2020-04-14 01:45:00', '2020-05-01 06:50:01'),
(1273, 'Denim', 297, 'categories/April2020/yoRrSmmboOlqCkQTRhKn.jpg', '2020-04-14 01:46:00', '2020-05-01 06:50:13'),
(1274, 'Embroidery & Drawnwork', 297, 'categories/April2020/pNZu5kvVRB5GbLiac0bU.jpg', '2020-04-14 01:46:00', '2020-05-01 06:35:18'),
(1275, 'Functional Textile', 297, 'categories/April2020/1hqSaXy2mVWlWtR278xr.jpg', '2020-04-14 01:46:00', '2020-05-01 06:35:35'),
(1276, 'Glistening Fabric', 297, 'categories/April2020/yq4i1l9hRZVIxgU2aHbo.webp', '2020-04-14 01:47:00', '2020-05-01 06:35:53'),
(1277, 'Grey Fabric', 297, 'categories/April2020/GmtObIwg55JxoP3obZMr.jpg', '2020-04-14 01:47:00', '2020-05-01 06:36:18'),
(1278, 'Industrial Textile', 297, 'categories/April2020/HYHGGts94Ywtv1kHTHmX.jpg', '2020-04-14 01:47:00', '2020-05-01 06:37:00'),
(1279, 'Kitchen Textile', 297, 'categories/April2020/LOD11ovDAzgrgqlkPO2T.jpg', '2020-04-14 01:48:00', '2020-05-01 06:37:16'),
(1280, 'Knitting & Crocheting Fabric', 297, 'categories/April2020/9XzoontkGKVwpLS0wjUE.jpg', '2020-04-14 01:48:00', '2020-05-01 06:37:36'),
(1281, 'Lace & Purfle', 297, 'categories/April2020/grBUYHF4gzsTmNgfKIJD.jpg', '2020-04-14 01:48:00', '2020-05-01 06:37:51'),
(1284, 'Non Woven Fabric', 297, 'categories/April2020/Hs65SViQXBnNcIczPdEx.jpg', '2020-04-14 01:50:00', '2020-05-01 06:38:51'),
(1285, 'Nylon Fabric', 297, 'categories/April2020/w0COEDU4I3MBGOhp7s77.jpg', '2020-04-14 01:50:00', '2020-05-01 06:39:06'),
(1286, 'Polyester Fabric', 297, 'categories/April2020/14w8nb6zAbUTtcEd1cqG.jpg', '2020-04-14 01:51:00', '2020-05-01 06:39:23'),
(1287, 'Printed & Color-woven Cloth', 297, 'categories/April2020/LidcyH0worYz2LRSWWbv.jpg', '2020-04-14 01:51:00', '2020-05-01 06:39:42'),
(1288, 'Silk', 297, 'categories/April2020/oWsW4agRHhLW8aapGRQ8.jpg', '2020-04-14 01:52:00', '2020-05-01 06:41:43'),
(1289, 'Leather & Leatheroid', 298, 'categories/April2020/qJ2vpdmTIEoLRlt9Sk3p.jpg', '2020-04-14 01:52:00', '2020-05-01 06:41:00'),
(1290, 'Feather & Down', 298, 'categories/April2020/pSm5xWfHLFDmwTlxmdIz.jpg', '2020-04-14 01:52:00', '2020-05-01 06:41:18'),
(1291, 'Fur Fabric', 298, 'categories/April2020/SwIodwtLcxkCXuQEAGL1.jpg', '2020-04-14 01:53:00', '2020-05-01 06:27:43'),
(1292, 'Wool & Animal Hair', 298, 'categories/April2020/5OMDWYqFxrGMoAB4VUJY.jpg', '2020-04-14 01:53:00', '2020-05-01 06:28:04'),
(1293, 'Furniture Cover', 299, 'categories/April2020/nEjTOeKYjSfvt3kPPMl7.jpg', '2020-04-14 01:53:00', '2020-05-01 06:28:32'),
(1294, 'Towel & Handkerchief', 299, 'categories/April2020/K2XmpUUFvs6GwNIs0CHA.webp', '2020-04-14 01:54:00', '2020-05-01 06:28:44'),
(1295, 'Bedding', 299, 'categories/April2020/54gHaHhcCdREtE0l6e3w.jpg', '2020-04-14 01:54:00', '2020-05-01 06:29:37'),
(1296, 'Carpet, Rug & Mat', 299, 'categories/April2020/PmSPDiXajDL7pPFnPPvH.jpg', '2020-04-14 01:55:00', '2020-05-01 06:29:52'),
(1297, 'Curtain', 299, 'categories/April2020/Pd2HwabY0Agij1IIo5hn.jpg', '2020-04-14 01:55:00', '2020-05-01 06:30:05'),
(1298, 'Decorative Cloth', 299, 'categories/April2020/1iy1pmfS8TYCyIUjOy4Z.jpg', '2020-04-14 01:56:00', '2020-05-01 06:30:20'),
(1299, 'Edging & Tassel', 299, 'categories/April2020/ZWS3GVwXo9EGnoeqnNOh.jpg', '2020-04-14 01:56:00', '2020-04-16 22:44:57'),
(1300, 'Ribbon', 299, 'categories/April2020/p3i4eTDpNNmmMeVhVUtz.jpg', '2020-04-14 01:56:00', '2020-05-01 06:32:19'),
(1301, 'Table Cloth', 299, 'categories/April2020/ahScpYmHkfvb4aYKk8yI.jpg', '2020-04-14 01:57:00', '2020-05-01 06:31:59'),
(1302, 'Twine, Rope & Netting', 300, 'categories/April2020/OXA8PGHsAZeHOfOCAYM5.jpg', '2020-04-14 01:58:00', '2020-05-01 06:32:51'),
(1303, 'Color Card & Color Comparator', 300, 'categories/April2020/F7b2yoTZtSJDWIqCkGCD.jpg', '2020-04-14 01:58:00', '2020-05-01 06:33:24'),
(1304, 'Garment Tag', 300, 'categories/April2020/lkOj8o7k2DTs5Gkviv9z.jpg', '2020-04-14 01:58:00', '2020-05-01 06:33:43'),
(1305, 'Sewing Thread & Tape', 300, 'categories/April2020/eqilBqegRRT36WRdQrTo.jpg', '2020-04-14 01:59:00', '2020-05-01 06:33:56'),
(1306, 'Textile Stocks', 300, 'categories/April2020/OFt21ctbehXqrdJYIaln.jpeg', '2020-04-14 01:59:00', '2020-05-01 06:20:40'),
(1307, 'Textile Waste', 300, 'categories/April2020/2CFa6QduZ4bjNVA3NYLw.jpg', '2020-04-14 02:00:00', '2020-04-16 22:48:22'),
(1308, 'Yarn', 300, 'categories/April2020/HtKFUqETheCaXxEvNOVl.jpg', '2020-04-14 02:00:00', '2020-05-01 06:21:09'),
(1309, 'Other Textiles', 300, 'categories/April2020/5NBbkyOCCyNiaEEtiwdr.jpg', '2020-04-14 02:00:00', '2020-05-01 06:21:29'),
(1315, 'Customized Service for Textile', 302, 'categories/April2020/e2SaDxAcYle4Npqwnp5q.jpeg', '2020-04-14 02:03:00', '2020-04-16 22:53:09'),
(1316, 'Leather Machinery', 302, 'categories/April2020/wAmMNFD7h6WyPQdTWZkf.jpg', '2020-04-14 02:03:00', '2020-05-01 06:22:40'),
(1317, 'Textile Machinery & Parts', 302, 'categories/April2020/USwe3HXEBorq4Tv4mzuo.png', '2020-04-14 02:04:00', '2020-04-16 22:53:25'),
(1318, 'Forklifts & Parts', 303, 'categories/April2020/0GgHKUUXwP3ACiyCt2z2.jpg', '2020-04-14 12:10:00', '2020-05-01 06:23:15'),
(1319, 'ATV & Quad', 303, 'categories/April2020/gTB4GVyAotmgOM23Y7SG.jpg', '2020-04-14 12:10:00', '2020-05-01 06:24:32'),
(1320, 'Gas Scooter', 303, 'categories/April2020/horEAkSJy4iLvh9A4spZ.jpg', '2020-04-14 12:11:00', '2020-05-01 06:24:55'),
(1321, 'Kick Scooter & Surfing Scooter', 303, 'categories/April2020/DVfQOcquUwHmdol0k8hC.jpg', '2020-04-14 12:11:00', '2020-05-01 06:25:13'),
(1322, 'Sea Scooter', 303, 'categories/April2020/2NBxTt42BBMkVyufQ1zd.jpg', '2020-04-14 12:11:00', '2020-05-01 06:25:29'),
(1323, 'Snow Scooter', 303, 'categories/April2020/wx5PS3NyplDEvFc0cDb7.jpg', '2020-04-14 12:12:00', '2020-05-01 06:26:00'),
(1324, 'UTV & Parts', 303, 'categories/April2020/H0yxTugEaKqn8Upv4IG6.jpg', '2020-04-14 12:12:00', '2020-05-01 06:26:28'),
(1325, 'Bicycle Parts & Accessories', 304, 'categories/April2020/tBmQtaVnhun7vNEVWvHr.jpg', '2020-04-14 12:12:00', '2020-05-01 06:26:54'),
(1326, 'Bike', 304, 'categories/April2020/IOZJNELBVTjNTi7LA3Uu.jpg', '2020-04-14 12:13:00', '2020-05-01 06:12:13'),
(1327, 'Electric Vehicle & Parts', 304, 'categories/April2020/DJenovV28oe1uBVCuTTX.jpg', '2020-04-14 12:13:00', '2020-04-16 22:59:02'),
(1328, 'Tricycle & Parts', 304, 'categories/April2020/r9DaS36V2nW49CGJU8QI.jpg', '2020-04-14 12:14:00', '2020-05-01 06:12:44'),
(1329, 'Dirt Bike', 304, 'categories/April2020/U2OIZPkHKClS6Iima0FA.png', '2020-04-14 12:14:00', '2020-05-01 06:14:01'),
(1330, 'Pocket Bike', 304, 'categories/April2020/7upfPij9XyuRB4abUASI.jpg', '2020-04-14 12:14:00', '2020-05-01 06:16:44'),
(1331, 'Bus', 305, 'categories/April2020/Iz2OIZ726T0Buxb6GiLB.jpg', '2020-04-14 12:15:00', '2020-05-01 06:15:07'),
(1332, 'Auto Parts', 305, 'categories/April2020/5z2BO54AVdJLCnoAosZB.png', '2020-04-14 12:15:00', '2020-05-01 06:15:36'),
(1333, 'Auto Repair Equipment & Tools', 305, 'categories/April2020/SD8DL6c6BrtehrhSOyIA.jpg', '2020-04-14 12:15:00', '2020-05-01 06:16:07'),
(1334, 'Car', 305, 'categories/April2020/KU9vr1Nr2mqoohl1nQnu.jpg', '2020-04-14 12:16:00', '2020-05-01 06:17:30'),
(1335, 'Car Accessories', 305, 'categories/April2020/9tRxX4JAaUyryviQ8gkF.jpg', '2020-04-14 12:16:00', '2020-05-01 06:17:50'),
(1336, 'Cargo & Storage', 306, 'categories/April2020/cRhhjSLhb5Atb2WZEO8f.jpg', '2020-04-14 12:16:00', '2020-05-01 06:18:07'),
(1337, 'Specialized Vehicle', 306, 'categories/April2020/1NwsqJGq7ZnYzqAGIOaw.jpg', '2020-04-14 12:17:00', '2020-05-01 06:18:32'),
(1338, 'Tractor & Parts', 306, 'categories/April2020/OJrER30nPZWvG9RP0Wrh.jpg', '2020-04-14 12:17:00', '2020-05-01 06:19:16'),
(1339, 'Trailer', 306, 'categories/April2020/FEfkrQLmHuHaTa6eGi0H.jpg', '2020-04-14 12:17:00', '2020-05-01 06:19:43'),
(1340, 'Truck', 306, 'categories/April2020/1TSHxV2Sj5f06hIMI47y.jpg', '2020-04-14 12:18:00', '2020-05-01 06:19:55'),
(1341, 'Barrow, Trolley & Cart', 306, 'categories/April2020/0zQbxrEUdZ4WNPwBLo7g.jpg', '2020-04-14 12:18:00', '2020-05-01 06:03:54'),
(1342, 'Go Kart & Parts', 306, 'categories/April2020/3PH6pkUL73y6XC5nH7kT.jpg', '2020-04-14 12:19:00', '2020-05-01 06:04:31'),
(1343, 'Golf Cart', 306, 'categories/April2020/EDTis1hz8GVB75dOqRob.jpg', '2020-04-14 12:19:00', '2020-05-01 06:04:44'),
(1344, 'Boats & Ships', 307, 'categories/April2020/P8hMNSmZp6U2ipfEPbSV.jpg', '2020-04-14 12:21:00', '2020-05-01 06:05:05'),
(1345, 'Marine Parts', 307, 'categories/April2020/lvOk14XxkQGtLa28zFjA.webp', '2020-04-14 12:21:00', '2020-05-01 06:06:01'),
(1348, 'Floating Dock', 307, 'categories/April2020/TpbD2wK95olXLIoeo7TX.jpg', '2020-04-14 12:22:00', '2020-05-01 06:06:23'),
(1349, 'Recreational Boat Parts', 307, 'categories/April2020/SlgkJjy3FEn0Z3Mg9FBE.jpg', '2020-04-14 12:22:00', '2020-05-01 06:06:47'),
(1350, 'Motorcycle', 308, 'categories/April2020/I4DkKXqu3N5DXsRHXiwn.jpg', '2020-04-14 12:23:00', '2020-05-01 06:07:14'),
(1351, 'Motorcycle Parts & Accessories', 308, 'categories/April2020/11jHqBzOH37eKF5cHgLu.jpg', '2020-04-14 12:23:00', '2020-05-01 06:09:28'),
(1352, 'Roadway Facility', 309, 'categories/April2020/odGYImrkXB78vTGk9cJH.jpg', '2020-04-14 12:24:00', '2020-05-01 06:09:41'),
(1354, 'Gas Station & Equipment', 310, 'categories/April2020/aRo9CG1XrWO87xjJ3ekW.png', '2020-04-14 12:25:00', '2020-04-17 00:03:46'),
(1356, 'Car Lock, Motorcycle Lock & Bicycle Lock', 310, 'categories/April2020/AKikB4W9txeZUzf0Okrf.jpg', '2020-04-14 12:26:00', '2020-05-01 06:10:12'),
(1357, 'Parking', 310, 'categories/April2020/NEix5t2hJkYK8PTsKIq7.jpg', '2020-04-14 12:26:00', '2020-05-01 06:10:59'),
(1358, 'Secondhand Vehicle & Stocks', 310, 'categories/April2020/xoaHzO2NGPQ7MZVCgAzu.jpg', '2020-04-14 12:26:00', '2020-04-17 00:08:17'),
(1359, 'Tire & Accessories', 310, 'categories/April2020/mU404tIUhHM7Qxsopr6F.jpg', '2020-04-14 12:27:00', '2020-05-01 06:11:17'),
(1360, 'Other Transportation Equipment', 310, 'categories/April2020/EfNsybbBh32rjLQOFGSi.jpg', '2020-04-14 12:27:00', '2020-04-26 23:20:17'),
(1361, 'test', 303, 'http://businessdotkom.com/storage', '2020-05-02 15:32:27', '2020-05-02 15:32:27'),
(1362, 'test sub', 125, 'http://businessdotkom.com/storage/categories/May2020/8UIgRrBvMkkWyAdKJNXR.jpg', '2020-05-02 15:38:00', '2020-05-02 15:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `category_user`
--

CREATE TABLE `category_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_user`
--

INSERT INTO `category_user` (`user_id`, `category_id`) VALUES
(1, 1),
(1, 2),
(36, 12),
(68, 3),
(68, 4),
(68, 5),
(68, 125),
(71, 1),
(71, 2),
(71, 3),
(71, 4),
(71, 5),
(75, 1),
(75, 2),
(76, 1),
(76, 2),
(78, 126),
(135, 1),
(135, 2),
(139, 125),
(139, 126),
(144, 1),
(144, 2),
(147, 1),
(147, 2),
(148, 1),
(148, 2),
(148, 3),
(152, 1),
(152, 2),
(154, 126),
(155, 3),
(155, 4),
(157, 1),
(162, 1),
(162, 2),
(166, 1),
(166, 2),
(171, 4),
(172, 4),
(173, 4),
(174, 5),
(174, 125),
(174, 126),
(174, 130),
(174, 131);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'فارسكور', 18, NULL, NULL),
(2, 'كفر سعد', 18, NULL, NULL),
(3, 'المعادى', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(22, 1, 'Dell', '/clients/image1117241.png', '2020-06-19 00:55:39', '2020-06-19 00:55:39'),
(23, 1, 'Dell', '/clients/image117153.png', '2020-06-19 00:55:52', '2020-06-19 00:55:52'),
(21, 1, 'Dell', '/clients/image520043.png', '2020-06-19 00:55:35', '2020-06-19 00:55:35'),
(16, 135, 'Dell', '/clients/image119646.png', '2020-06-19 00:30:25', '2020-06-19 00:30:25'),
(17, 135, 'HP', '/clients/image119646.png', '2020-06-19 00:30:25', '2020-06-19 00:30:25'),
(19, 1, 'Toshiba', '/clients/image119646.png', '2020-06-19 00:30:25', '2020-06-19 00:30:25'),
(20, 1, 'Dell', '/clients/image1518948.png', '2020-06-19 00:50:16', '2020-06-19 00:50:16'),
(24, 1, 'Dell', '/clients/image415737.png', '2020-06-19 04:28:12', '2020-06-19 04:28:12'),
(25, 157, 'vhvhvh', '/clients/image815836.png', '2020-06-19 04:29:38', '2020-06-19 04:29:38'),
(26, 1, 'Dell', '/clients/image917355.png', '2020-06-19 04:36:15', '2020-06-19 04:36:15'),
(27, 1, 'Dell', '/clients/image218442.png', '2020-06-19 04:36:20', '2020-06-19 04:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(64, 'Egypt', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_services`
--

CREATE TABLE `customer_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_services`
--

INSERT INTO `customer_services` (`id`, `name`, `mobile`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'customer support', '01111111111', 'Add Title Here', 'Add Body Here', '2020-03-29 20:58:29', '2020-03-29 20:58:29'),
(2, NULL, '01111111111', 'Add Title Here', 'Add Body Here', '2020-03-29 20:59:22', '2020-03-29 20:59:22'),
(3, NULL, '01111111111', 'Add Title Here', 'Add Body Here', '2020-03-29 20:59:32', '2020-03-29 20:59:32'),
(4, NULL, '01111111111', 'Add Title Here', 'Add Body Here', '2020-03-30 05:13:28', '2020-03-30 05:13:28'),
(5, 'customer support', '01111111111', 'Add Title Here', 'Add Body Here', '2020-03-30 05:13:37', '2020-03-30 05:13:37'),
(6, 'customer support', '01111111111', 'Add Title Here', 'Add Body Here', '2020-03-30 08:29:14', '2020-03-30 08:29:14'),
(7, NULL, NULL, NULL, NULL, '2020-03-30 08:30:41', '2020-03-30 08:30:41'),
(8, NULL, NULL, NULL, NULL, '2020-03-30 08:30:44', '2020-03-30 08:30:44'),
(9, 'هل هل', '+101000709271', 'ااهنهل', NULL, '2020-03-30 09:05:23', '2020-03-30 09:05:23'),
(10, 'نىىتتى', '886998688690905', NULL, NULL, '2020-03-30 09:05:49', '2020-03-30 09:05:49'),
(11, 'نىىتتى', '886998688690905', NULL, NULL, '2020-03-30 09:05:49', '2020-03-30 09:05:49'),
(12, NULL, NULL, NULL, NULL, '2020-04-01 00:22:51', '2020-04-01 00:22:51'),
(13, NULL, NULL, NULL, NULL, '2020-06-08 05:31:18', '2020-06-08 05:31:18'),
(14, NULL, NULL, NULL, NULL, '2020-06-11 20:56:09', '2020-06-11 20:56:09'),
(15, NULL, NULL, NULL, NULL, '2020-06-12 07:38:06', '2020-06-12 07:38:06'),
(16, 'customer support', '01111111111', 'Add Title Here', 'Add Body Here', '2020-06-19 01:09:08', '2020-06-19 01:09:08'),
(17, 'customer support', '01111111111', 'Add Title Here', 'Add Body Here', '2020-06-19 01:13:15', '2020-06-19 01:13:15'),
(18, 'customer support', '01111111111', 'Add Title Here', 'Add Body Here', '2020-06-19 01:13:28', '2020-06-19 01:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'No.', 1, 1, 1, 0, 0, 0, '{}', 1),
(3, 1, 'email', 'text', 'Email', 0, 0, 1, 1, 1, 1, '{\"store\":\"show\",\"user\":\"show\"}', 5),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 6),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 7),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 16),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{\"user\":\"show\"}', 9),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 13),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 0, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 14),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 15),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{\"store\":\"hidden\"}', 12),
(56, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 7, 'category_id', 'select_dependent_dropdown', 'Category Id', 0, 0, 0, 0, 0, 1, '{\"model\":\"App\\\\Models\\\\MainCategory\",\"name\":\"main_category_id\",\"route\":\"api.v1.dropdown\",\"display\":\"Category\",\"placeholder\":\"Select a Category\",\"key\":\"id\",\"label\":\"name\",\"dependent_dropdown\":[{\"model\":\"App\\\\Models\\\\SubCategory\",\"name\":\"sub_category_id\",\"display\":\"Sub Category\",\"placeholder\":\"Select a Sub Category\",\"key\":\"id\",\"label\":\"name\",\"where\":\"main_category_id\"},{\"model\":\"App\\\\Models\\\\Category\",\"name\":\"category_id\",\"display\":\"Sub Sub Category\",\"placeholder\":\"Select a Sub Sub Category\",\"key\":\"id\",\"label\":\"name\",\"where\":\"sub_category_id\"}],\"validation\":{\"rule\":\"required|gt:0\"}}', 2),
(58, 7, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 6),
(60, 7, 'description', 'text_area', 'Description', 1, 1, 1, 1, 1, 1, '{}', 9),
(61, 7, 'price', 'number', 'Price', 1, 1, 1, 1, 1, 1, '{}', 10),
(62, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 13),
(63, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 14),
(66, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 0, 1, 1, 1, 1, '{}', 8),
(67, 1, 'verify_code', 'text', 'Verify Code', 0, 1, 1, 1, 1, 1, '{\"store\":\"hidden\",\"user\":\"show\"}', 11),
(71, 1, 'mobile', 'text', 'Mobile', 0, 1, 1, 1, 1, 1, '{\"store\":\"show\",\"user\":\"show\"}', 4),
(78, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(79, 8, 'sortname', 'text', 'Sortname', 1, 1, 1, 1, 1, 1, '{}', 2),
(80, 8, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 3),
(81, 8, 'phonecode', 'text', 'Phonecode', 0, 1, 1, 1, 1, 1, '{}', 4),
(82, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(83, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(88, 1, 'first_name', 'text', 'First Name', 1, 1, 1, 1, 1, 1, '{\"user\":\"show\"}', 2),
(89, 1, 'last_name', 'text', 'Last Name', 1, 1, 1, 1, 1, 1, '{\"user\":\"show\"}', 3),
(102, 7, 'user_id', 'text', 'User Id', 1, 1, 1, 0, 0, 1, '{}', 3),
(125, 7, 'product_belongsto_category_relationship', 'relationship', 'Category', 0, 1, 1, 1, 1, 0, '{\"model\":\"App\\\\Models\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(126, 7, 'product_belongsto_user_relationship', 'relationship', 'User', 0, 1, 1, 0, 0, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(127, 15, 'id', 'text', 'No.', 1, 1, 1, 0, 0, 0, '{}', 1),
(128, 15, 'name', 'text', 'Store Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(129, 15, 'about', 'text', 'Store Info', 0, 0, 1, 1, 1, 1, '{}', 3),
(130, 15, 'logo', 'image', 'Store Logo', 0, 1, 1, 1, 1, 1, '{}', 5),
(131, 15, 'country_id', 'number', 'Country Id', 0, 1, 1, 1, 1, 1, '{}', 8),
(133, 15, 'address', 'text_area', 'Address', 0, 0, 1, 1, 1, 1, '{}', 16),
(134, 15, 'mobile', 'text', 'Mobile', 0, 1, 1, 1, 1, 1, '{}', 4),
(135, 15, 'open_at', 'time', 'Open At', 0, 1, 1, 1, 1, 1, '{}', 18),
(136, 15, 'close_at', 'time', 'Close At', 0, 1, 1, 1, 1, 1, '{}', 22),
(137, 15, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 37),
(138, 15, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 38),
(139, 15, 'store_belongsto_country_relationship', 'relationship', 'Country', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Country\",\"table\":\"countries\",\"type\":\"belongsTo\",\"column\":\"country_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(140, 16, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(141, 16, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(142, 16, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(143, 16, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(144, 15, 'store_belongstomany_tag_relationship', 'relationship', 'Categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Tag\",\"table\":\"tags\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"store_tags\",\"pivot\":\"1\",\"taggable\":\"0\"}', 9),
(145, 1, 'status', 'checkbox', 'Status', 1, 1, 1, 1, 1, 1, '{\"on\":\"Active\",\"off\":\"InActive\",\"checked\":true}', 8),
(146, 15, 'status', 'checkbox', 'Status', 1, 1, 1, 1, 1, 1, '{\"on\":\"Active\",\"off\":\"InActive\",\"checked\":true}', 15),
(147, 17, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(148, 17, 'store_id', 'text', 'Store Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(149, 17, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 4),
(150, 17, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(151, 17, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(153, 15, 'store_hasmany_branch_relationship', 'relationship', 'branches', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Branch\",\"table\":\"branches\",\"type\":\"hasMany\",\"column\":\"store_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"branches\",\"pivot\":\"0\",\"taggable\":\"0\"}', 14),
(154, 15, 'background_image', 'image', 'Background Image', 0, 0, 1, 1, 1, 1, '{}', 6),
(155, 19, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(156, 19, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 3),
(157, 19, 'country_id', 'text', 'Country Id', 1, 1, 1, 1, 1, 1, '{}', 4),
(158, 19, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(159, 19, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(160, 19, 'state_belongsto_country_relationship', 'relationship', 'Country', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Country\",\"table\":\"countries\",\"type\":\"belongsTo\",\"column\":\"country_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"branches\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(161, 15, 'city_id', 'text', 'City Id', 1, 0, 1, 1, 1, 1, '{}', 7),
(162, 15, 'state_id', 'text', 'State Id', 1, 0, 1, 1, 1, 1, '{}', 20),
(163, 21, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(164, 21, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 3),
(165, 21, 'state_id', 'text', 'State Id', 1, 1, 1, 1, 1, 1, '{}', 4),
(166, 21, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(167, 21, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(168, 21, 'city_belongsto_state_relationship', 'relationship', 'State', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\State\",\"table\":\"states\",\"type\":\"belongsTo\",\"column\":\"state_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"branches\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(169, 17, 'branch_belongsto_store_relationship', 'relationship', 'Store', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Store\",\"table\":\"stores\",\"type\":\"belongsTo\",\"column\":\"store_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"branches\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(170, 15, 'store_belongsto_city_relationship', 'relationship', 'City', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\City\",\"table\":\"cities\",\"type\":\"belongsTo\",\"column\":\"city_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"branches\",\"pivot\":\"0\",\"taggable\":\"0\"}', 13),
(171, 15, 'store_belongsto_state_relationship', 'relationship', 'State', 0, 0, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\State\",\"table\":\"states\",\"type\":\"belongsTo\",\"column\":\"state_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"branches\",\"pivot\":\"0\",\"taggable\":\"0\"}', 12),
(172, 15, 'zip_code', 'text', 'Zip Code', 1, 0, 1, 1, 1, 1, '{}', 17),
(173, 15, 'lat', 'text', 'Lat', 0, 0, 1, 1, 1, 1, '{}', 19),
(174, 15, 'lang', 'text', 'Lang', 0, 0, 1, 1, 1, 1, '{}', 21),
(175, 15, 'delivery_time', 'text', 'Delivery Time', 0, 0, 1, 1, 1, 1, '{}', 23),
(176, 15, 'delivery_cost', 'text', 'Delivery Cost', 0, 0, 1, 1, 1, 1, '{}', 25),
(177, 15, 'facebook_url', 'text', 'Facebook Url', 1, 0, 1, 1, 1, 1, '{}', 24),
(178, 15, 'whatsapp_url', 'text', 'Whatsapp Url', 1, 0, 1, 1, 1, 1, '{}', 26),
(179, 15, 'linkedIn_url', 'text', 'LinkedIn Url', 1, 0, 1, 1, 1, 1, '{}', 28),
(180, 15, 'twitter', 'text', 'Twitter', 1, 0, 1, 1, 1, 1, '{}', 31),
(181, 15, 'youtube', 'text', 'Youtube', 1, 0, 1, 1, 1, 1, '{}', 30),
(182, 15, 'instagram', 'text', 'Instagram', 1, 0, 1, 1, 1, 1, '{}', 32),
(183, 15, 'password', 'text', 'Password', 1, 0, 1, 1, 1, 1, '{}', 10),
(184, 15, 'store_established_date', 'text', 'Store Established Date', 0, 0, 1, 1, 1, 1, '{}', 27),
(185, 15, 'last_login_date', 'timestamp', 'Last Login Date', 0, 0, 1, 1, 1, 1, '{}', 29),
(186, 15, 'expire_date', 'timestamp', 'Expire Date', 0, 1, 1, 1, 1, 1, '{}', 33),
(187, 15, 'remaining_time', 'text', 'Remaining Time', 0, 1, 1, 1, 1, 1, '{}', 34),
(188, 15, 'mobile_list', 'text_area', 'Mobile List', 0, 0, 1, 1, 1, 1, '{}', 35),
(189, 15, 'email_list', 'text_area', 'Email List', 0, 0, 1, 1, 1, 1, '{}', 36),
(190, 15, 'landline_list', 'text_area', 'Landline List', 0, 0, 1, 1, 1, 1, '{}', 34),
(191, 7, 'sale_price', 'number', 'Sale Price', 0, 1, 1, 1, 1, 1, '{}', 11),
(192, 7, 'status', 'checkbox', 'Status', 0, 1, 1, 1, 1, 1, '{\"on\":\"Published\",\"off\":\"UnPublished\",\"checked\":true}', 12),
(193, 7, 'images', 'multiple_images', 'Images', 0, 1, 1, 1, 1, 1, '{}', 8),
(194, 22, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(195, 22, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 3),
(196, 22, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 4),
(197, 22, 'images', 'multiple_images', 'Images', 0, 1, 1, 1, 1, 1, '{}', 5),
(198, 22, 'category_id', 'select_dependent_dropdown', 'Category Id', 0, 1, 0, 0, 0, 1, '{\"model\":\"App\\\\Models\\\\MainCategory\",\"name\":\"main_category_id\",\"route\":\"api.v1.dropdown\",\"display\":\"Category\",\"placeholder\":\"Select a Category\",\"key\":\"id\",\"label\":\"name\",\"dependent_dropdown\":[{\"model\":\"App\\\\Models\\\\SubCategory\",\"name\":\"sub_category_id\",\"display\":\"Sub Category\",\"placeholder\":\"Select a Sub Category\",\"key\":\"id\",\"label\":\"name\",\"where\":\"main_category_id\"},{\"model\":\"App\\\\Models\\\\Category\",\"name\":\"category_id\",\"display\":\"Sub Sub Category\",\"placeholder\":\"Select a Sub Sub Category\",\"key\":\"id\",\"label\":\"name\",\"where\":\"sub_category_id\"}],\"validation\":{\"rule\":\"required|gt:0\"}}', 2),
(199, 22, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
(200, 22, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(206, 25, 'id', 'text', 'No.', 1, 1, 1, 0, 0, 0, '{}', 1),
(207, 25, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(208, 25, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(209, 25, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(210, 26, 'id', 'text', 'No.', 1, 1, 0, 0, 0, 0, '{}', 1),
(211, 26, 'main_category_id', 'text', 'Main Category Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(212, 26, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 4),
(213, 26, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(214, 26, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(215, 26, 'sub_category_belongsto_main_category_relationship', 'relationship', 'Main Category', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\MainCategory\",\"table\":\"main_categories\",\"type\":\"belongsTo\",\"column\":\"main_category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"branches\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(216, 27, 'id', 'text', 'الرقم', 1, 1, 0, 0, 0, 0, '{}', 1),
(218, 27, 'name', 'text', 'الإسم', 1, 1, 1, 1, 1, 1, '{}', 4),
(219, 27, 'created_at', 'timestamp', 'تاريخ الإنشاء', 0, 1, 1, 1, 0, 1, '{}', 6),
(220, 27, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(222, 28, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(223, 28, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(224, 28, 'description', 'text_area', 'Description', 0, 1, 1, 1, 1, 1, '{}', 3),
(225, 28, 'price', 'number', 'Price', 0, 1, 1, 1, 1, 1, '{}', 5),
(226, 28, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{}', 4),
(227, 28, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 6),
(228, 28, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(229, 27, 'parent_id', 'select_dependent_dropdown', 'إختر القسم', 0, 0, 0, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Category\",\"name\":\"parent_id\",\"route\":\"api.v1.dropdown\",\"display\":\"\\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u0649 \\u0627\\u0644\\u0642\\u0633\\u0645 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u0649\",\"placeholder\":\"\\u0625\\u062e\\u062a\\u0631 \\u0627\\u0644\\u0642\\u0633\\u0645 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u0649\",\"key\":\"id\",\"label\":\"name\",\"dependent_dropdown\":[{\"model\":\"App\\\\Models\\\\Category\",\"name\":\"category_id\",\"display\":\"\\u0625\\u062e\\u062a\\u0631 \\u0627\\u0644\\u0642\\u0633\\u0645 \\u0627\\u0644\\u0641\\u0631\\u0639\\u0649\",\"placeholder\":\"\\u0625\\u062e\\u062a\\u0631 \\u0627\\u0644\\u0642\\u0633\\u0645 \\u0627\\u0644\\u0641\\u0631\\u0639\\u0649\",\"key\":\"id\",\"label\":\"name\",\"where\":\"parent_id\"}]}', 2),
(230, 27, 'image', 'image', 'الصورة', 0, 1, 1, 1, 1, 1, '{}', 5),
(232, 29, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(233, 29, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 3),
(234, 29, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(235, 29, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(236, 29, 'attribute_belongstomany_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Category\",\"table\":\"categories\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_categories\",\"pivot\":\"1\",\"taggable\":\"on\"}', 2),
(237, 32, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(238, 32, 'attribute_id', 'text', 'Attribute Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(239, 32, 'value', 'text', 'Value', 1, 1, 1, 1, 1, 1, '{}', 3),
(240, 32, 'attribute_value_belongsto_attribute_relationship', 'relationship', 'attributes', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Attribute\",\"table\":\"attributes\",\"type\":\"belongsTo\",\"column\":\"attribute_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(241, 32, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(242, 32, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(243, 27, 'category_belongsto_category_relationship', 'relationship', 'القسم الرئيسى', 0, 0, 0, 0, 0, 1, '{\"model\":\"App\\\\Models\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"parent_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(244, 22, 'user_id', 'text', 'User Id', 1, 1, 1, 1, 1, 1, '{}', 8),
(245, 34, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(246, 34, 'category_id', 'text', 'Category Id', 0, 0, 0, 1, 1, 1, '{}', 2),
(247, 34, 'images', 'multiple_images', 'Images', 0, 1, 1, 1, 1, 1, '{}', 3),
(248, 34, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(249, 34, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(251, 34, 'slider_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"scope\":\"parents\",\"model\":\"App\\\\Models\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"app_settings\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(252, 7, 'used', 'text', 'Used', 0, 1, 1, 1, 1, 1, '{}', 12),
(253, 36, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(254, 36, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 2),
(255, 36, 'description', 'text_area', 'Description', 1, 1, 1, 1, 1, 1, '{}', 3),
(257, 36, 'supplier_id', 'hidden', 'Supplier Id', 0, 1, 1, 1, 1, 1, '{}', 4),
(258, 36, 'notify_type', 'radio_btn', 'Notify Type', 1, 1, 1, 1, 1, 1, '{\"options\":{\"system\":\"System\",\"product\":\"Product\",\"Supplier\":\"Supplier\"}}', 8),
(259, 36, 'notify_id', 'text', 'Notify Id', 1, 1, 1, 1, 1, 1, '{}', 5),
(260, 36, 'notify_url', 'text', 'Notify Url', 1, 1, 1, 1, 1, 1, '{}', 6),
(261, 36, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 10),
(262, 36, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(263, 36, 'sent_to', 'radio_btn', 'Sent To', 0, 1, 1, 1, 1, 1, '{\"options\":{\"1\":\"All System Users\",\"2\":\"All Users\",\"3\":\"All Suppliers\"}}', 7),
(264, 36, 'notification_belongstomany_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"scope\":\"parents\",\"model\":\"App\\\\Models\\\\Category\",\"table\":\"categories\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"notification_categories\",\"pivot\":\"1\",\"taggable\":\"on\"}', 9),
(265, 36, 'notification_belongstomany_supplier_relationship', 'relationship', 'Suppliers', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"notification_users\",\"pivot\":\"1\",\"taggable\":\"on\"}', 12),
(266, 36, 'notification_belongstomany_user_relationship', 'relationship', 'Users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"notification_users\",\"pivot\":\"1\",\"taggable\":\"on\"}', 13);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":\"id\",\"order_display_column\":\"id\",\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2019-08-31 09:43:39', '2019-09-30 00:16:02'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2019-08-31 09:43:39', '2019-08-31 09:43:39'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2019-08-31 09:43:39', '2019-08-31 09:43:39'),
(7, 'products', 'products', 'Product', 'Products', NULL, 'App\\Models\\Product', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-09-02 06:38:05', '2020-04-15 09:46:56'),
(8, 'countries', 'countries', 'Country', 'Countries', NULL, 'App\\Models\\Country', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-09-18 14:52:47', '2019-09-18 14:52:47'),
(15, 'stores', 'stores', 'Store', 'Stores', NULL, 'App\\Models\\Store', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-09-25 11:29:32', '2019-10-01 10:31:43'),
(16, 'tags', 'tags', 'Tag', 'Tags', NULL, 'App\\Models\\Tag', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-09-25 12:03:11', '2019-10-01 05:29:09'),
(17, 'branches', 'branches', 'Branch', 'Branches', NULL, 'App\\Models\\Branch', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-09-29 16:25:58', '2019-10-01 06:07:11'),
(19, 'states', 'states', 'State', 'States', NULL, 'App\\Models\\State', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-09-30 05:07:40', '2019-10-01 05:32:02'),
(21, 'cities', 'cities', 'City', 'Cities', NULL, 'App\\Models\\City', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-10-01 05:14:19', '2019-10-01 05:37:56'),
(22, 'requests', 'requests', 'Request', 'Requests', NULL, 'App\\Models\\Request', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-10-04 05:15:45', '2020-03-10 02:23:12'),
(25, 'main_categories', 'main-categories', 'Main Category', 'Main Categories', NULL, 'App\\Models\\MainCategory', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-10-04 05:56:55', '2019-10-04 05:56:55'),
(26, 'sub_categories', 'sub-categories', 'Sub Category', 'Sub Categories', NULL, 'App\\Models\\SubCategory', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-10-04 05:57:25', '2019-10-04 05:58:19'),
(27, 'categories', 'categories', 'Category', 'الأقسام الرئيسية', NULL, 'App\\Models\\Category', NULL, '\\App\\Http\\Controllers\\VoyagerCategoriesController', NULL, 1, 1, '{\"order_column\":\"id\",\"order_display_column\":\"id\",\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-10-04 05:58:45', '2020-04-06 19:15:30'),
(28, 'services', 'services', 'Service', 'Services', NULL, 'App\\Models\\Service', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-10-04 07:58:33', '2019-10-04 07:58:33'),
(29, 'attributes', 'attributes', 'Attribute', 'Attributes', NULL, 'App\\Models\\Attribute', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-02-26 09:06:37', '2020-02-26 09:07:19'),
(32, 'attribute_values', 'attribute-values', 'Attribute Value', 'Attribute Values', NULL, 'App\\Models\\AttributeValue', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-02-26 09:16:04', '2020-02-26 09:21:18'),
(34, 'sliders', 'sliders', 'Slider', 'Sliders', NULL, 'App\\Models\\Slider', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-04-10 05:39:41', '2020-05-31 00:27:57'),
(36, 'notifications', 'notifications', 'Notification', 'Notifications', NULL, 'App\\Models\\Notification', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-30 22:54:26', '2020-05-31 02:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `favorited_id` int(11) NOT NULL,
  `favorited_type` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `favorited_id`, `favorited_type`, `user_id`, `created_at`, `updated_at`) VALUES
(136, 215, 'App\\Models\\Request', 157, '2020-06-20 02:27:36', '2020-06-20 02:27:36'),
(134, 213, 'App\\Models\\Request', 157, '2020-06-20 02:20:47', '2020-06-20 02:20:47'),
(135, 214, 'App\\Models\\Request', 157, '2020-06-20 02:20:51', '2020-06-20 02:20:51'),
(130, 1, 'App\\Models\\Request', 1, '2020-06-19 05:16:41', '2020-06-19 05:16:41'),
(131, 1001, 'App\\Models\\Product', 1, '2020-06-19 07:05:27', '2020-06-19 07:05:27'),
(132, 6, 'App\\Models\\Service', 1, '2020-06-19 07:05:56', '2020-06-19 07:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `follower_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `user_id`, `follower_id`, `created_at`, `updated_at`) VALUES
(4, 62, 61, NULL, NULL),
(8, 62, 63, NULL, NULL),
(27, 71, 62, NULL, NULL),
(19, 56, 61, NULL, NULL),
(42, 135, 146, NULL, NULL),
(86, 1, 155, NULL, NULL),
(87, 168, 155, NULL, NULL),
(53, 148, 144, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `industrial_zones`
--

CREATE TABLE `industrial_zones` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(191) NOT NULL,
  `state_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industrial_zones`
--

INSERT INTO `industrial_zones` (`id`, `name`, `image`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'Domitta industrial Zone', 'categories/April2020/G9HrPPHSqj3UnCP2ibkq.png', 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `year_experience` varchar(40) NOT NULL,
  `career_level` varchar(40) NOT NULL,
  `open_positions` int(11) NOT NULL,
  `job_address` text NOT NULL,
  `date_announced` varchar(30) NOT NULL,
  `salary` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `title`, `description`, `year_experience`, `career_level`, `open_positions`, `job_address`, `date_announced`, `salary`, `created_at`, `updated_at`) VALUES
(18, 1, 'Android Developer 22', 'Adnroid Developer needed', '3', 'Senior', 2, 'Cairo', 'today', '3000', '2020-06-19 04:30:42', '2020-06-19 04:30:42'),
(5, 135, 'Android Engineer', 'Adnroid Developer needed', '3', 'Senior', 2, 'Cairo', 'today', '3000', '2020-05-20 19:37:55', '2020-05-20 19:37:55'),
(17, 157, 'dydudh', 'dhdhdhhx', '8568', 'dhdhxg', 50, 'tddgxgxg', '12-12-2020', '56568686', '2020-06-19 04:30:08', '2020-06-19 04:30:08'),
(15, 1, 'Android Developer', 'Adnroid Developer needed', '3', 'Senior', 2, 'Cairo', 'today', '3000', '2020-06-19 00:56:48', '2020-06-19 00:56:48'),
(14, 1, 'IOS Developer', 'Adnroid Developer needed', '3', 'Senior', 2, 'Cairo', 'today', '3000', '2020-05-22 10:05:14', '2020-06-19 00:57:35'),
(13, 135, 'mc', 'nbj', '10', 'hjj', 50, 'bbhhhhh', '12-12-2020', '1000', '2020-05-22 10:04:38', '2020-05-22 10:04:38'),
(10, 148, 'job title', 'desc', '10', 'A+', 50, 'damietta', '12-12-2020', '1000', '2020-05-22 09:56:11', '2020-05-22 09:56:11'),
(11, 148, 'titurrur', 'fittudurur', '10', 'cbdhdhddh', 50, 'ddhdhhdgd', '12-12-2020', '1000', '2020-05-22 10:00:07', '2020-05-22 10:00:07'),
(16, 157, 'dydudh', 'dhdhdhhx', '8568', 'dhdhxg', 50, 'tddgxgxg', '12-12-2020', '56568686', '2020-06-19 04:30:07', '2020-06-19 04:30:07'),
(19, 157, 'sggddgdg', 'xbcbhcxbxv', '454575', 'zgxgdggz', 50, 'dhyddggd', '12-12-2020', '5668688', '2020-06-19 04:30:56', '2020-06-19 04:30:56'),
(20, 157, 'sggddgdg', 'xbcbhcxbxv', '454575', 'zgxgdggz', 50, 'dhyddggd', '12-12-2020', '5668688', '2020-06-19 04:30:57', '2020-06-19 04:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-08-31 09:43:41', '2019-08-31 09:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', '#000000', NULL, 1, '2019-08-31 09:43:41', '2019-08-31 10:53:50', 'voyager.dashboard', 'null'),
(2, 1, 'Media', '', '_self', 'voyager-images', '#000000', NULL, 6, '2019-08-31 09:43:42', '2019-10-01 05:19:25', 'voyager.media.index', 'null'),
(3, 1, 'Users', '', '_self', 'voyager-person', '#000000', NULL, 3, '2019-08-31 09:43:42', '2019-09-11 08:02:41', 'voyager.users.index', 'null'),
(4, 1, 'Roles', '', '_self', 'voyager-lock', '#000000', NULL, 2, '2019-08-31 09:43:42', '2019-09-11 07:59:25', 'voyager.roles.index', 'null'),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 13, '2019-08-31 09:43:42', '2020-03-04 04:08:24', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2019-08-31 09:43:42', '2019-09-02 06:39:45', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2019-08-31 09:43:42', '2019-09-02 06:39:45', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2019-08-31 09:43:42', '2019-09-02 06:39:45', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2019-08-31 09:43:42', '2019-09-02 06:39:45', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2019-08-31 09:43:42', '2020-03-04 04:08:24', 'voyager.settings.index', NULL),
(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2019-08-31 09:43:59', '2019-09-02 06:39:45', 'voyager.hooks', NULL),
(15, 1, 'Products', '', '_self', 'voyager-pie-chart', '#000000', NULL, 10, '2019-09-02 06:38:06', '2020-03-04 04:08:24', 'voyager.products.index', 'null'),
(16, 1, 'boutiques', 'admin/stores', '_self', 'voyager-shop', '#000000', NULL, 4, '2019-09-18 06:41:59', '2019-09-25 12:27:23', NULL, ''),
(27, 1, 'Store Categories', '', '_self', 'voyager-tag', '#000000', 20, 3, '2019-09-25 12:03:12', '2020-01-27 11:47:06', 'voyager.tags.index', 'null'),
(28, 1, 'Branches', '', '_self', 'voyager-credit-cards', '#000000', NULL, 5, '2019-09-29 16:25:58', '2019-10-01 05:21:07', 'voyager.branches.index', 'null'),
(29, 1, 'Requests', '', '_self', 'voyager-external', '#000000', NULL, 11, '2019-10-04 05:15:45', '2020-03-04 04:08:24', 'voyager.requests.index', 'null'),
(31, 1, 'Main Categories', '', '_self', 'voyager-dot', '#000000', 20, 1, '2019-10-04 05:56:56', '2019-10-04 06:48:49', 'voyager.main-categories.index', 'null'),
(32, 1, 'Sub Categories', '', '_self', 'voyager-dot-2', '#000000', 20, 2, '2019-10-04 05:57:25', '2019-10-04 06:49:39', 'voyager.sub-categories.index', 'null'),
(33, 1, 'Categories', '', '_self', 'voyager-categories', '#000000', NULL, 7, '2019-10-04 05:58:45', '2020-03-04 04:07:41', 'voyager.categories.index', 'null'),
(34, 1, 'Services', '', '_self', 'voyager-wand', '#000000', NULL, 12, '2019-10-04 07:58:33', '2020-03-04 04:08:24', 'voyager.services.index', 'null'),
(35, 1, 'Attributes', '', '_self', NULL, NULL, NULL, 15, '2020-02-26 09:06:37', '2020-03-04 04:08:24', 'voyager.attributes.index', NULL),
(36, 1, 'Attribute Values', '', '_self', NULL, NULL, NULL, 16, '2020-02-26 09:16:04', '2020-03-04 04:08:24', 'voyager.attribute-values.index', NULL),
(37, 1, 'sub categories', '/admin/categories/sub', '_self', 'voyager-categories', '#000000', NULL, 8, '2020-03-04 04:07:24', '2020-03-04 04:09:17', NULL, ''),
(38, 1, 'sub sub categories', '/admin/categories/sub/sub', '_self', 'voyager-categories', '#000000', NULL, 9, '2020-03-04 04:08:18', '2020-03-04 04:09:03', NULL, ''),
(39, 1, 'Sliders', '', '_self', NULL, NULL, NULL, 17, '2020-04-10 05:39:42', '2020-04-10 05:39:42', 'voyager.sliders.index', NULL),
(40, 1, 'Notifications', '', '_self', NULL, NULL, NULL, 18, '2020-05-30 22:54:26', '2020-05-30 22:54:26', 'voyager.notifications.index', NULL);

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
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2016_01_01_000000_create_pages_table', 2),
(24, '2016_01_01_000000_create_posts_table', 2),
(25, '2016_02_15_204651_create_categories_table', 2),
(26, '2017_04_11_000000_alter_post_nullable_fields_table', 2),
(27, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
(28, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(29, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(30, '2016_06_01_000004_create_oauth_clients_table', 3),
(31, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
(32, '2019_09_02_081829_create_products_table', 4),
(33, '2019_08_25_010726_create_states_table', 5),
(34, '2019_08_25_010739_create_cities_table', 5),
(35, '2019_08_25_101607_create_offices_table', 5),
(36, '2012_08_25_010707_create_countries_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `sent_to` tinyint(4) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `notify_type` varchar(30) NOT NULL,
  `notify_id` int(11) NOT NULL,
  `notify_url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification_categories`
--

CREATE TABLE `notification_categories` (
  `category_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification_users`
--

CREATE TABLE `notification_users` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('000fa999a1b67eefb0e5a3ccc46424f9f27d370b845d021ab4d3bb2722b9abbcfe96d7e3a627bcdb', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-15 02:53:26', '2020-05-15 02:53:26', '2021-05-14 19:53:26'),
('006f0f79c27f92814bc7ce81e159d26ba869e6a84f5d9cda87365931d29bcb0b3ee549f1226acfee', 47, 1, 'Personal Access Token', '[]', 0, '2020-01-23 16:43:14', '2020-01-23 16:43:14', '2021-01-23 09:43:14'),
('0180e61a4b5e09e6d6d1c4488a2ad10d32487e6e30ea7f4ca098d8e01ddf8d42f02ea296017ce7f9', 49, 1, 'Personal Access Token', '[]', 0, '2020-02-03 20:33:15', '2020-02-03 20:33:15', '2021-02-03 13:33:15'),
('02a096ce5d2398e6d5d6a0cb63ce1ac4399e9fe554ae8bb49cbdb468c8cfad2150c34644a69995e2', 129, 1, 'Personal Access Token', '[]', 0, '2020-04-29 14:08:32', '2020-04-29 14:08:32', '2021-04-29 07:08:32'),
('05866db18297f67638624b306235777555031786d98ec3c6b7babecf63c86ebe78b4fef3fba9065d', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-21 05:32:22', '2020-04-21 05:32:22', '2021-04-20 22:32:22'),
('05ea3725fc4387056d7e9b6a1a73e9a30b8557b3d17c0ea1d655e0379bf91ec11f3a1fc3a0824a4b', 144, 1, 'Personal Access Token', '[]', 0, '2020-05-07 05:20:10', '2020-05-07 05:20:10', '2021-05-06 22:20:10'),
('062ef52e2c0836d29011f8047c7e54bb52532f179a436404eddc44164bc4d6d8493aac441ba288d5', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-02 07:23:27', '2020-05-02 07:23:27', '2021-05-02 00:23:27'),
('064d74c4a5a3157d60ef838abb9dce6383eb743c8601401d53c757fcfb15b919bf5f3085f81ccef6', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-06 08:58:05', '2020-05-06 08:58:05', '2021-05-06 01:58:05'),
('06651ab0efcb44822bdf3765bd4318c904874c9d8970b6792a147cdc6c4899eaa2b43bcd49817e74', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-12 22:41:15', '2020-05-12 22:41:15', '2021-05-12 15:41:15'),
('07881f063fb9c0c4e6b81179f42d4c294d9782961266d484d5d0fb1cc4e3cc8940a03b830d712ebd', 63, 1, 'Personal Access Token', '[]', 0, '2020-03-16 05:02:32', '2020-03-16 05:02:32', '2021-03-15 22:02:32'),
('08c7f7d138f10939d7a20f0b12d9ef14f5de8fb826c933fd8703519f3d33276aaf17da3f4c578d42', 80, 1, 'Personal Access Token', '[]', 0, '2020-04-29 10:58:07', '2020-04-29 10:58:07', '2021-04-29 03:58:07'),
('08d9f8191c0b4b451d5e360d95690f673e8f600abe5c14047ace18fb64892c9b29110e6c05e9e238', 62, 1, 'Personal Access Token', '[]', 0, '2020-03-17 20:10:51', '2020-03-17 20:10:51', '2021-03-17 13:10:51'),
('09075b514b48dacf455a1289079e0fc1af1a952b342406287113cf803d92111b6013816a509f0047', 62, 1, 'Personal Access Token', '[]', 0, '2020-04-14 09:34:14', '2020-04-14 09:34:14', '2021-04-14 02:34:14'),
('09db8aa0ea1c56544e696bcb26149e3af6ccb5f937bcabf1bd59452ba3564e03cdd81c4639c17be3', 1, 1, 'Personal Access Token', '[]', 0, '2020-06-08 06:05:48', '2020-06-08 06:05:48', '2021-06-07 23:05:48'),
('0b1dcdd990e4b9b7bbb748d520cc7155a7d1eb66c4af2000aa533af8ad9a78ec1210d2fa5d22eb21', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-02 09:53:10', '2020-05-02 09:53:10', '2021-05-02 02:53:10'),
('0b858a777215bf619cc2dbe9c39452d3213dc2dfdf3ab6f1cb723b7e5833f0dfcc3dc9ca64e10e18', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 14:23:55', '2020-04-16 14:23:55', '2021-04-16 07:23:55'),
('0b883a9280d54ec6cf5fe1512b49264734b75f59cce59e386c56277ab7b807329d3d5cbde98f4fc3', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 12:54:59', '2020-04-16 12:54:59', '2021-04-16 05:54:59'),
('0b911bd089b84e83f0afc58651d9d71245d03ee60949b379bd353f40e92e3c096279e8c38c58a093', 93, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:38:43', '2020-04-29 11:38:43', '2021-04-29 04:38:43'),
('0c2a37e9b05c26e2ef06267c30dcd6702cc80af88877b084dd527365b03caa59e2f571c17f3f5059', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-31 03:13:36', '2020-05-31 03:13:36', '2021-05-30 20:13:36'),
('0e06688c10786a41cad712d9521bce62c6506ea20d17478b8fe29262951749c1e695c2b63d002b8c', 28, 1, 'Personal Access Token', '[]', 0, '2020-01-09 04:35:10', '2020-01-09 04:35:10', '2021-01-08 18:35:10'),
('0e7996855efc241ef832a0f95d66b190bf7f8c2dea1353af53e2c7f49fdea161dc087865096f9b4f', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-19 04:49:10', '2020-04-19 04:49:10', '2021-04-18 21:49:10'),
('0ec3194e241f4ac66083d272c4251eb20fa6c477a14dfed11371d30dc7cc53cb0431c787cdb2e32d', 166, 1, 'Personal Access Token', '[]', 0, '2020-06-19 01:25:03', '2020-06-19 01:25:03', '2021-06-18 18:25:03'),
('0f8428b930e4f84a82d46435eef68ae383cba492b695487cd3e7613447a4d1af97a7c5b9c950c8ab', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-12 22:46:26', '2020-05-12 22:46:26', '2021-05-12 15:46:26'),
('10f17d5ef5bc7af654718a396b12ad0170477fbeac5d155e55580e156839dd04789c9512d934bf05', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:04:18', '2019-09-02 05:04:18', '2020-09-02 07:04:18'),
('12c7c462f55c34ccb7756249289c8ec98f353c167e42f6463c9bc17cf3631e187165f4ac042bd3b9', 175, 1, 'Personal Access Token', '[]', 0, '2020-06-20 19:28:36', '2020-06-20 19:28:36', '2021-06-20 12:28:36'),
('134b2e0fb2385843603bce926bd130d84f2545aef8af0046f38303fed33842979c3dcdb8fc98d76d', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-30 17:28:43', '2020-05-30 17:28:43', '2021-05-30 10:28:43'),
('139f2b3a165de0a1daa1a4b4361e867dacd881f41f3ccc7478bee47e7e4c73f68b1b847def815c6d', 136, 1, 'Personal Access Token', '[]', 0, '2020-04-29 14:56:10', '2020-04-29 14:56:10', '2021-04-29 07:56:10'),
('13a095ae6fa47b70abdd30cdc997865d2d7cb3eceb0319af79d99277b2c5d06b27426556e8c4b48f', 49, 1, 'Personal Access Token', '[]', 0, '2020-02-04 18:22:46', '2020-02-04 18:22:46', '2021-02-04 11:22:46'),
('17344af4d2969be8acaadd2d3cc41f4530c0d28024fa61ecac4e8d668312bf07e30d47d1a94b8e75', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-02 20:39:03', '2020-05-02 20:39:03', '2021-05-02 13:39:03'),
('173af87ec953aad44d4190129b175ef4dcea799037d5a2fa20e1ce9be2252db5c9486617cb955031', 1, 1, 'Personal Access Token', '[]', 0, '2020-06-08 05:49:10', '2020-06-08 05:49:10', '2021-06-07 22:49:10'),
('18d89252c33f8bbfe8ce34f8b2dc89aa50522b0c149aede20d8fdcc8ebdd7c3d4a1b0f468b4c433a', 139, 1, 'Personal Access Token', '[]', 0, '2020-04-30 12:48:26', '2020-04-30 12:48:26', '2021-04-30 05:48:26'),
('195892a6c10d5126da78925813e90af70cf87b6b9a6dd7bb67050fb9746eb37e5438f9421c0e7b03', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-07 05:19:47', '2020-05-07 05:19:47', '2021-05-06 22:19:47'),
('1a4bfe8a07f8d9b72adb9ea463ba13c891ff8ced3491c8c54c2f493c5eff5711c15ae858ffd6c160', 39, 1, 'Personal Access Token', '[]', 0, '2020-01-19 02:56:12', '2020-01-19 02:56:12', '2021-01-18 19:56:12'),
('1a78bf1f3a9cec3e01973fddf0932ee9bc7aae1060dadaacfe3b09bea79edeb21c4c3d86874a7396', 39, 1, 'Personal Access Token', '[]', 0, '2020-01-19 03:01:51', '2020-01-19 03:01:51', '2021-01-18 20:01:51'),
('1ad043da35d196f5aa6d3c40d7ba1d079527a08c49a8205f0da586248fb74e032468e3f8b13fd72f', 65, 1, 'Personal Access Token', '[]', 0, '2020-04-01 00:15:00', '2020-04-01 00:15:00', '2021-03-31 17:15:00'),
('1bdba651a6a83a98a1faf4fc9cd36c3e6ac643492ab55ab8040f6eb878b3558bb72bf804304185a6', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:06:39', '2019-09-02 05:06:39', '2020-09-02 07:06:39'),
('1c19efa103f8d23d40a3980ced1447536c5d96370a6d16173f54be660d0c2e9b7f1029e6b1db98fa', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-31 02:24:59', '2020-05-31 02:24:59', '2021-05-30 19:24:59'),
('1c1dbdf5ba19910862bf0b00cf3aeb87e92cc76fb71099d4ba426fb1d05d2b22ac4da3c2fa2858be', 151, 1, 'Personal Access Token', '[]', 0, '2020-06-18 15:07:36', '2020-06-18 15:07:36', '2021-06-18 08:07:36'),
('1cb6cc376187f694c071089d0eaaf3dd53905220f030f06b0af6c79653e52f879923d75916804543', 174, 1, 'Personal Access Token', '[]', 0, '2020-06-20 19:21:27', '2020-06-20 19:21:27', '2021-06-20 12:21:27'),
('1cfb7815da1d2cd34925b8f09fbedb70c43c0b14d912d59b0132d2d5befbf379e760223429202bae', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 22:30:47', '2020-04-16 22:30:47', '2021-04-16 15:30:47'),
('1d00fe42cf1dc15bb260f58153f940e56a9150986bcfc9d2d2177b54d6136b5de63bbc596ebf1280', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-28 10:26:29', '2020-04-28 10:26:29', '2021-04-28 03:26:29'),
('1e1ede7660e5a9f34a279dc97843ab5d4a28add709faf37effba1a120bb0c237042663960281bbf2', 55, 1, 'Personal Access Token', '[]', 0, '2020-02-21 02:40:41', '2020-02-21 02:40:41', '2021-02-20 19:40:41'),
('2184aaa7c1db69159a42ddea50ca2816712b4787edd0f4f9b66947fabbd60215bdf73d9654d9b575', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 15:13:44', '2020-04-16 15:13:44', '2021-04-16 08:13:44'),
('223bd2b30c154c54e47e0df86c42876a6be593d3ef9f0b5aeeb21f293b08011b84f2db7844eb10ab', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-30 01:44:32', '2020-05-30 01:44:32', '2021-05-29 18:44:32'),
('23938e6d4e024b00b2f7504600d22e1b5f5b4f071c3c3d71b7783104609156608c5984aa4d8037a1', 28, 1, 'Personal Access Token', '[]', 0, '2020-01-09 02:42:59', '2020-01-09 02:42:59', '2021-01-08 16:42:59'),
('23bcbb938cf58b389e48bd6bb42156a7f7edff2cc94adc62cd2b686fdf573ca79d7f3807416e85f4', 67, 1, 'Personal Access Token', '[]', 0, '2020-04-01 02:37:22', '2020-04-01 02:37:22', '2021-03-31 19:37:22'),
('23f6b20c36f08a209e16141a9398c250e077d22cce7fd0edf1ab2bb70af08424f92ccf5be5c80692', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-07 04:43:48', '2020-05-07 04:43:48', '2021-05-06 21:43:48'),
('2486926d9a47f26fd1abaf48780218f0e5c22536ff76cbea663ad7542d022f491648b95f1e7a2c17', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-21 07:42:08', '2020-04-21 07:42:08', '2021-04-21 00:42:08'),
('249b63991fac362147f1a33b0c06571d31c42ab5d5aca1e7e36bad68e199a6390b1c4e7457dbceb1', 90, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:24:08', '2020-04-29 11:24:08', '2021-04-29 04:24:08'),
('2645e2386df28e9d15be9be1b9b0ad6b39911352e50fce8bf83ed8919fb8b02538d5a464bd35551c', 69, 1, 'Personal Access Token', '[]', 0, '2020-04-06 04:57:59', '2020-04-06 04:57:59', '2021-04-05 21:57:59'),
('267bafd656755a6feeca0047632d5b4b3c7d1a10d89d759e317e13004c01e47dfe9de76a88cb3ac7', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 12:43:41', '2020-04-16 12:43:41', '2021-04-16 05:43:41'),
('2685fe0caad82de6af39c3096759d30c2913373761038f379993a1295621f6962145a1ec5649b01f', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-30 01:13:19', '2020-05-30 01:13:19', '2021-05-29 18:13:19'),
('26934d1c6976f436b2b1978e3be08b7a0b6fcc5cf609da00b680ae92ba59af9d96014664f95da729', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:09:52', '2019-09-02 05:09:52', '2020-09-02 07:09:52'),
('26cbb41aefa7b8e67d64171b2173967e00e29fb3b95f267ee8166049a8c3f7a10694a6a6bd8ad8ff', 76, 1, 'Personal Access Token', '[]', 0, '2020-04-28 10:21:31', '2020-04-28 10:21:31', '2021-04-28 03:21:31'),
('279696376aae3194422b1021075e0c205f0e13c0223bedad7ca9b25bc085046b1167e49c42448676', 70, 1, 'Personal Access Token', '[]', 0, '2020-04-14 10:18:42', '2020-04-14 10:18:42', '2021-04-14 03:18:42'),
('2814c2d3e50338b5d27de58e0550835f79be2676a1de684bbd5e8bebe7908664713cef77b11a3e7d', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 10:21:44', '2020-05-03 10:21:44', '2021-05-03 03:21:44'),
('283d26f5ce0225db85778f163d9ff91177170533b102678ab650dda691389d189c5e2411b0b47b9b', 86, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:23:24', '2020-04-29 12:23:24', '2021-04-29 05:23:24'),
('2841e651301ac2d2395d4a965ed4dbf4f85960c8bb9ce72f9329d9fe4202303f6ca86aef0689d805', 126, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:46:09', '2020-04-29 12:46:09', '2021-04-29 05:46:09'),
('28b021ae21ff662e6e18f59a677cded73683c8632953e04b50f4764c076192ecebbb23d9ea291673', 170, 1, 'Personal Access Token', '[]', 0, '2020-06-20 19:31:07', '2020-06-20 19:31:07', '2021-06-20 12:31:07'),
('299c2cef6bd4e507c9f2d0ee8a7858abe108ddeba1176d53d695b6d6083222b97ebcbf7f83d78b8a', 127, 1, 'Personal Access Token', '[]', 0, '2020-04-29 13:45:44', '2020-04-29 13:45:44', '2021-04-29 06:45:44'),
('29b33ef550083b1ad2bec905c364165654380c62c39fb24683da43a1bc7095b75bbe3fc37a8422b4', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-02 19:39:48', '2020-05-02 19:39:48', '2021-05-02 12:39:48'),
('29f2ca40b6d51273d0a750fd34cfce274875914cc89e3936994ea7cd146144664f8f9191b98e7bbc', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-16 04:33:49', '2020-05-16 04:33:49', '2021-05-15 21:33:49'),
('2a0b59db6afd53ba79d5fe9997cfe3d78e65df0125fb082aaa95d9ae5daa45ea7633f7878a80c2c3', 28, 1, 'Personal Access Token', '[]', 0, '2020-01-07 18:11:08', '2020-01-07 18:11:08', '2021-01-07 08:11:08'),
('2a5df2e17a2afd5da6309bc4003c507b8124bc932b87227c105b8fcd245af5f2b5c2fb0aa0481606', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-02 03:54:03', '2020-04-02 03:54:03', '2021-04-01 20:54:03'),
('2b3c642cfc8f53932816e3ccaa2c602a000ba29d70f0a24418b38479d783c21579e97cf088719033', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-19 04:52:33', '2020-04-19 04:52:33', '2021-04-18 21:52:33'),
('2be15ca0e0e5bee18037b59c355c13849d259a48f0f0ad7892a73dd23757360cd275b09ed97cb8a1', 35, 1, 'Personal Access Token', '[]', 0, '2020-01-09 05:46:00', '2020-01-09 05:46:00', '2021-01-08 19:46:00'),
('2c4655da3b24a7c1a1b7b97c7d81f24057fb9d7a7e06b66b360d0390a8c84247942ccdcf300addc4', 151, 1, 'Personal Access Token', '[]', 0, '2020-06-20 17:05:06', '2020-06-20 17:05:06', '2021-06-20 10:05:06'),
('2c639e5d03ebfc41165485a4436df9f499b114cfece0130d7da51cf43fa2e9b2ac711cae1ac36b45', 173, 1, 'Personal Access Token', '[]', 0, '2020-06-20 19:19:14', '2020-06-20 19:19:14', '2021-06-20 12:19:14'),
('2cc049e891ff31cabca59287274a0f28e0c736678ecf3da470c2bc8411620d4ac0c1f244f4fd71c0', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 18:41:17', '2020-04-16 18:41:17', '2021-04-16 11:41:17'),
('2e17a14d6cf322cb97fd6caa059a5649bc80536f8f342ea98721997ac482f48a8c653375bfca4253', 124, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:39:38', '2020-04-29 12:39:38', '2021-04-29 05:39:38'),
('2fcc2d5fb3560fbb6e619213795f5cc2caabed37516d9045e709179d01d0385537f4d32535b44c00', 25, 1, 'Personal Access Token', '[]', 0, '2020-01-26 00:03:48', '2020-01-26 00:03:48', '2021-01-25 17:03:48'),
('3055257a614ce3c52c54d18c668b005802d9e87c04540674ce993cf51b6201e32102ee6e156524b9', 85, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:16:39', '2020-04-29 11:16:39', '2021-04-29 04:16:39'),
('30a96c056f20806f1d156678a3a9a8889147ba47753c7957b241a9c7359f4a39defe0143b2dadc2c', 77, 1, 'Personal Access Token', '[]', 0, '2020-04-28 16:32:13', '2020-04-28 16:32:13', '2021-04-28 09:32:13'),
('30b03686cb8af4b6a80d2fd23223e695028763c88d82c3028a5af773534d298cdc290f3861303a23', 28, 1, 'Personal Access Token', '[]', 1, '2020-01-09 03:18:38', '2020-01-09 03:18:38', '2021-01-08 17:18:38'),
('3145efa9a74c16a29c8045123434de04cb4d15b935246915e496e04bd879bd320860f0e0b83af892', 147, 1, 'Personal Access Token', '[]', 0, '2020-05-18 16:09:46', '2020-05-18 16:09:46', '2021-05-18 09:09:46'),
('31b03c596ba6e870c0174ba5fc1537cdd65f8db8a79f3667c3f83af361f4f75073d4a935cc315eb7', 62, 1, 'Personal Access Token', '[]', 0, '2020-03-26 21:13:33', '2020-03-26 21:13:33', '2021-03-26 14:13:33'),
('3201ce660929f61ee6c3960e1af2b32903f5002a86e8a5404808a67dd43a04a8a62c598ddcb562c8', 49, 1, 'Personal Access Token', '[]', 0, '2020-02-03 20:31:30', '2020-02-03 20:31:30', '2021-02-03 13:31:30'),
('3380438ec99b052d142829557604747ed061c0173207d3e4f910c64979949d631cb711128f7430f0', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-04 03:38:01', '2020-05-04 03:38:01', '2021-05-03 20:38:01'),
('33c05c54fb35cf9036702fb3893937636118509d77d480919e72377c1da51f9b911f0ede57781377', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 03:55:18', '2020-05-03 03:55:18', '2021-05-02 20:55:18'),
('33f9141aa94a11e69d2647b1477b655b04703c92c4be9cf4f28944c49aea9b74bde1960a2188cbb3', 1, 1, 'Personal Access Token', '[]', 0, '2020-06-10 23:20:29', '2020-06-10 23:20:29', '2021-06-10 16:20:29'),
('342e8f137f81aa5a2bc0b8bff1d96b7f488e7c0d8c88c6302bf4339b1eb645847a4fa0ad5a550e1f', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-18 21:36:02', '2020-04-18 21:36:02', '2021-04-18 14:36:02'),
('344e9bad0545dc5f1fe077d94abd34f98e80385d750a36f399d1413a57cd6cf2daaf927c98cc1794', 69, 1, 'Personal Access Token', '[]', 0, '2020-04-06 04:59:50', '2020-04-06 04:59:50', '2021-04-05 21:59:50'),
('34a12cd0001e5d850d475f2b3a4539c5c5e11b78a0baa395f4ab9580741912d6edd5872532c72f3f', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-21 05:33:25', '2020-04-21 05:33:25', '2021-04-20 22:33:25'),
('351f19f72adb59b15b9ff7cdeb94737b709bfc513788457b34466055009f8acb63fb437475e89835', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-28 09:43:25', '2020-04-28 09:43:25', '2021-04-28 02:43:25'),
('35d59f48181a15834a77cad7706d4c5ba4db7d6465c462cb9983ff1b51ee99b09be1cfdcfad8f626', 75, 1, 'Personal Access Token', '[]', 0, '2020-04-23 16:46:53', '2020-04-23 16:46:53', '2021-04-23 09:46:53'),
('35f7f7bbfaaf9d35a75501cce195b19559d627ea1ecf210f209cdd83129131552c9e047c2a72c6f0', 25, 1, 'Personal Access Token', '[]', 0, '2019-10-02 15:11:09', '2019-10-02 15:11:09', '2019-10-09 17:11:09'),
('366a9160dd88c3050f58a2de02735c8e9c0f8438d402e9d5adf0d82c8802810bd737ccace5a0942d', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 20:21:53', '2020-05-03 20:21:53', '2021-05-03 13:21:53'),
('37bf1a16ca5b6777e0cfcf58fc6dcc40e03843754df71f76a4d4cd387cc0bb877ece4ec5bacc1950', 143, 1, 'Personal Access Token', '[]', 0, '2020-05-05 03:58:09', '2020-05-05 03:58:09', '2021-05-04 20:58:09'),
('37de43463c4d4971ee2c159555af1c1f33a57ca80cc9a476008d757958e77fab4c32b881ae7562e4', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:13:08', '2019-09-02 05:13:08', '2019-09-09 07:13:08'),
('3993994c475ec52f97528a8728c611329508f5a6a08d224f0fd7b9b323ee3d937d073c3fd2b6b1ff', 1, 1, 'Personal Access Token', '[]', 0, '2020-06-10 17:56:00', '2020-06-10 17:56:00', '2021-06-10 10:56:00'),
('3b6062d55361d650606ddb5e4285ed7ccb08b487c822a19315c8533b5b1d2caf8ba1d0bcf9baa72f', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-21 01:42:16', '2020-04-21 01:42:16', '2021-04-20 18:42:16'),
('3b96d2ddf221ea9e6083d6f1f17868c647498af0b387400e1d1c85a34d4320129b6c55e49c67b202', 86, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:19:50', '2020-04-29 12:19:50', '2021-04-29 05:19:50'),
('3bce0af33fcf52aeb03a6b3a8a3b49a3c163bd3d33d81b94f08b2b105093cd27c95fec53d91f1384', 47, 1, 'Personal Access Token', '[]', 0, '2020-01-23 18:32:10', '2020-01-23 18:32:10', '2021-01-23 11:32:10'),
('3c1ce26dcc7fa819ae613de7c232fb213534893447708655c19f3c1d3bc22a3e244556411c6c2aa3', 60, 1, 'Personal Access Token', '[]', 0, '2020-03-03 18:56:26', '2020-03-03 18:56:26', '2021-03-03 11:56:26'),
('3dcc99a45ac67142e580f637d8e2db75728bc1af2c7ab4f9636a8d18e67c40f29b703337893648d9', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 22:30:47', '2020-04-16 22:30:47', '2021-04-16 15:30:47'),
('3e09dbc879f120933525abc0ac154e5b88c183ec46635b4bc035870c9b170dda082646d0e8a66130', 168, 1, 'Personal Access Token', '[]', 0, '2020-06-19 05:52:51', '2020-06-19 05:52:51', '2021-06-18 22:52:51'),
('3f025d41286596b96073b82876ece13a77604e5e69127461ca6cd5eb8c677fb40328541b52cc31c0', 33, 1, 'Personal Access Token', '[]', 0, '2020-01-09 05:39:48', '2020-01-09 05:39:48', '2021-01-08 19:39:48'),
('402dd8a9e66e20579e8027e7b841db6e732ffebff97d835323aa2f43ba076d806d2da538b1c46744', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-06 13:14:52', '2020-05-06 13:14:52', '2021-05-06 06:14:52'),
('4075e6b2f196e91788b56dcf0555f1d8e84832a75e70d45aa8666634ac0b8ad6528ef5ce212e2624', 52, 1, 'Personal Access Token', '[]', 0, '2020-02-11 23:54:25', '2020-02-11 23:54:25', '2021-02-11 16:54:25'),
('40c34c8bfbacb5cc75583ac9b9795fa1ad0b3000d9157b6c5ce8f89ccdd6bdb4a6ca80f8ae62a0ec', 70, 1, 'Personal Access Token', '[]', 0, '2020-04-15 07:15:29', '2020-04-15 07:15:29', '2021-04-15 00:15:29'),
('40fd164341fadc88d489a4120eb0baf58447ba23aa69978a135fd63d53edf53ab6a3d724f5da7afb', 151, 1, 'Personal Access Token', '[]', 0, '2020-06-19 01:23:20', '2020-06-19 01:23:20', '2021-06-18 18:23:20'),
('4228450f11fca1f4a5fa87cc697a5140eca28a867518f43a469d64642058fd487020cc2e367546d7', 28, 1, 'Personal Access Token', '[]', 0, '2020-01-07 17:21:39', '2020-01-07 17:21:39', '2021-01-07 07:21:39'),
('422ecae1dd639fa60169f2a8dc1de26f0502537e6decad69448caf3672b815178ef9977043a9bdac', 34, 1, 'Personal Access Token', '[]', 0, '2020-01-09 05:45:16', '2020-01-09 05:45:16', '2021-01-08 19:45:16'),
('42bece3c98d4652f4747e31d6c134fd14b874f5b7152567f8e74bad1b3c8542df43a4e3abbf2d982', 165, 1, 'Personal Access Token', '[]', 0, '2020-06-19 01:24:09', '2020-06-19 01:24:09', '2021-06-18 18:24:09'),
('42fc49729b4fb8700026e50b38609e5d40edccb28832a28df18833dd3ca2118d5fcabb4cfdfa4aad', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 03:39:14', '2020-05-03 03:39:14', '2021-05-02 20:39:14'),
('43290bc59aa549ce89a5c602d46aaae1abf4060ffc5cbb06c0597ef89638f3764bca30cf6a5265c4', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-06 04:29:11', '2020-04-06 04:29:11', '2021-04-05 21:29:11'),
('439c361e16974693c120453ae0496130b9d34dd4111044d3f2b31c318bb15f347456fa79a7d6b3ad', 74, 1, 'Personal Access Token', '[]', 0, '2020-04-22 11:20:37', '2020-04-22 11:20:37', '2021-04-22 04:20:37'),
('442eca835d3c8e2d9dcbdea50be36f93c87ed74ab8633c484f227863a34ee92ea0cb3b70ecc7a4e4', 157, 1, 'Personal Access Token', '[]', 0, '2020-06-20 02:30:34', '2020-06-20 02:30:34', '2021-06-19 19:30:34'),
('44dbc3097ea594b133709d1ed4be8881c33da9db60870ce9b142330cb4d5ac504e773115ffdda94c', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 19:35:55', '2020-05-03 19:35:55', '2021-05-03 12:35:55'),
('44f59963a093a4853f86906b69d8875894c3b3761f854b2db0f38c231611eef7baef5f292318a173', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 14:52:29', '2020-04-16 14:52:29', '2021-04-16 07:52:29'),
('45879b4babe1ef3b4ac768cb2cd7f0069bc06b500ed19d640fd306d6a65175b8e4d0f551272756b6', 141, 1, 'Personal Access Token', '[]', 0, '2020-05-02 07:31:57', '2020-05-02 07:31:57', '2021-05-02 00:31:57'),
('458c4cc6d7da6dff1e1a86a66f4c343e23ee5b6bdf76b4640688edaebb27a0ceefdfa36eb8057bb7', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-05 20:01:12', '2020-04-05 20:01:12', '2021-04-05 13:01:12'),
('476476b2b6d619180b53cf340a4aa51c2b96d7738135149bbd0393033eb66e56f208e528597e9d34', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-19 00:11:14', '2020-04-19 00:11:14', '2021-04-18 17:11:14'),
('47ea17cdb9f3afa7f3484b85a411fcb66fc97b4b3fb67066a017253b2672e187d4d3e20ddfb6b627', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-22 09:16:41', '2020-04-22 09:16:41', '2021-04-22 02:16:41'),
('488bb3a9c84a0a04107baa6fa7c93f474ad7eb8459ae71e03251448c41488fce2cddef18c5c60275', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 10:02:09', '2020-05-03 10:02:09', '2021-05-03 03:02:09'),
('4aabf45a4cb887e1ce53696508ff934feb9fcd39efe09c2fdc1cb26ee1c992a0dc1b1a1911f3d639', 151, 1, 'Personal Access Token', '[]', 0, '2020-06-18 15:30:47', '2020-06-18 15:30:47', '2021-06-18 08:30:47'),
('4b11fbc7c84b11839a24f45d5d2c70992339e5a8a1fcb71ee2afc2034b8b051b074683d82a0fb71e', 90, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:34:06', '2020-04-29 11:34:06', '2021-04-29 04:34:06'),
('4b53eb416b65996077de5b6fe963ae02b8d36bcd243716a60203797488b133cacb8f993c2ffa318e', 70, 1, 'Personal Access Token', '[]', 0, '2020-04-14 09:55:02', '2020-04-14 09:55:02', '2021-04-14 02:55:02'),
('4b593cef3692f1ac08fab29283b088eade7b7b5b1b50298befcb048cd6fa0bafee88d0e85a5fb126', 131, 1, 'Personal Access Token', '[]', 0, '2020-04-29 13:51:41', '2020-04-29 13:51:41', '2021-04-29 06:51:41'),
('4b5e2c18f79411370b4f6f9e60a8c81133c9171420ae6dae464397473b22f92da01973a9f8b19ad7', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-02 07:45:17', '2020-05-02 07:45:17', '2021-05-02 00:45:17'),
('4b7b78f8240610acdb607366ecb9a36c30bb95e8601599ffa82f3ca532da5e2ab7150d9b6ee4318a', 45, 1, 'Personal Access Token', '[]', 0, '2020-01-21 15:29:18', '2020-01-21 15:29:18', '2021-01-21 08:29:18'),
('4c5490b31ef0b4bd8f5f20dc4408c55cf65cf23c42181d4382f39dba877b9ae1ddf0ececa18a45c6', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-16 20:38:17', '2020-05-16 20:38:17', '2021-05-16 13:38:17'),
('4ca3c990a7bef02c40417e8847004c43be299ab6cf871c0d7545d171630b79ff5d08ac0e8c649a37', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-15 18:01:56', '2020-05-15 18:01:56', '2021-05-15 11:01:56'),
('4cf7f4a802b5ff6998d4ae462bd8e44782efb3b8520dd7d145ca852fbc7452988e5abe212cf1bd8a', 28, 1, 'Personal Access Token', '[]', 0, '2020-01-07 18:04:03', '2020-01-07 18:04:03', '2021-01-07 08:04:03'),
('4e4a98202e0d81c767e1b51089c5d24f1ba33ee5ef738c0954b3b788ecb429ce3948e9c4ad8d2482', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-07 07:04:39', '2020-05-07 07:04:39', '2021-05-07 00:04:39'),
('4e55fc3a698bbb5ae8de1411a7f0cc533ecf47e31f28bfcbc6f8f46a6c149ef60d09fb4e229c4d3e', 86, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:22:51', '2020-04-29 11:22:51', '2021-04-29 04:22:51'),
('4ea7d4d9f78ed458cd68ab4b9e593927394da47085287102d7241587ca7bcc23f4b831393f2807d0', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-05 00:21:04', '2020-04-05 00:21:04', '2021-04-04 17:21:04'),
('4eb96539c63ea01f88563b40be73d71a560260a28bb686430285b5d6421c36b11c1200f184a32200', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-16 20:05:16', '2020-05-16 20:05:16', '2021-05-16 13:05:16'),
('4f65981eb4cdf82827f2bb3839338772799643b77079e7fc4bf440ec28043335c79130d6af559fca', 134, 1, 'Personal Access Token', '[]', 0, '2020-04-29 14:24:48', '2020-04-29 14:24:48', '2021-04-29 07:24:48'),
('5177a14839814d6e2139b3bbc412060de4c611adeec7184797ff6d7f09fa44e453ea15d4fad7ac96', 159, 1, 'Personal Access Token', '[]', 0, '2020-06-18 15:44:57', '2020-06-18 15:44:57', '2021-06-18 08:44:57'),
('51c5707b7cee4110e4f82bfda33d129ab904c4e6bb926087b0fe887c997f97f1780b00f9077a745e', 167, 1, 'Personal Access Token', '[]', 0, '2020-06-19 01:53:31', '2020-06-19 01:53:31', '2021-06-18 18:53:31'),
('51de4914cc278a5159f89d11750b6ff5602d9251bae3726ef19149832ad31f98c2d44d47d453e355', 151, 1, 'Personal Access Token', '[]', 0, '2020-06-18 17:42:08', '2020-06-18 17:42:08', '2021-06-18 10:42:08'),
('526ebc4b0d929d88b85f709c130fd7216eb8e1071f1d1dcff954230bb828101226bebe9d9065924e', 83, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:15:13', '2020-04-29 11:15:13', '2021-04-29 04:15:13'),
('52c275dd391e61baa24ae705724a1c1c43ac60c6320daf57c28d17b00917e1e0b8bfab2f7607ce06', 86, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:19:22', '2020-04-29 12:19:22', '2021-04-29 05:19:22'),
('52fc5a410b7f2296b54f187b9087246332bf5cdefe19372f415398434478a410778d5f1bc121196d', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-29 10:03:55', '2020-04-29 10:03:55', '2021-04-29 03:03:55'),
('5323b9fa4dd9360f897be85830a0d86fc998d6da29d2363af65cbe5ebb0694b1ce240406dfcd050b', 72, 1, 'Personal Access Token', '[]', 0, '2020-04-22 09:15:31', '2020-04-22 09:15:31', '2021-04-22 02:15:31'),
('533bcd75a0497ebe8ecdd28f031e728ff3088f9852290b9e33536797cd328bb30a74d131ec1a1d90', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:02:37', '2019-09-02 05:02:37', '2020-09-02 07:02:37'),
('5398bee309168f065ffec059cdfb158a393ddf337ca72f90368e9323487f92b76c7d7374b3375ec3', 56, 1, 'Personal Access Token', '[]', 0, '2020-02-26 10:44:29', '2020-02-26 10:44:29', '2021-02-26 03:44:29'),
('572c0b07597c477d1db0f53befd59f952b7bd59d659fa5b2d8098985fd96c51c3ca6f3e1becbb2a0', 135, 1, 'Personal Access Token', '[]', 0, '2020-04-29 14:30:50', '2020-04-29 14:30:50', '2021-04-29 07:30:50'),
('5800fd24fc5dfdbb33256a90707adfe22b8c88ed865a606c93359fda27e81110af9f59a928c17f11', 170, 1, 'Personal Access Token', '[]', 0, '2020-06-20 19:23:45', '2020-06-20 19:23:45', '2021-06-20 12:23:45'),
('5805e02e3528a24dfe6286539db1cd8c56f864abe63b1a3196d1d5b428bb1f3427a4d61ba7925510', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-16 04:38:18', '2020-05-16 04:38:18', '2021-05-15 21:38:18'),
('586225dc39b8bad30828dbe8b32a2d0baa2d17c1a8ca1bcd946baab2d55710c873f555daf89bbbdb', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 04:57:50', '2020-05-03 04:57:50', '2021-05-02 21:57:50'),
('58878d41c05fc5ccc78b74888b88e55244b23ac23c59794aabdadabe6beeb29320f64cead446fcaa', 36, 1, 'Personal Access Token', '[]', 0, '2020-01-09 05:47:32', '2020-01-09 05:47:32', '2021-01-08 19:47:32'),
('58bcf5c3fd7a2c9ab2a9d8928a05d3681b5f9b5bd1a7db144a86ffdf60f2e53b1ee1ce44cfa4b267', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-05 21:37:11', '2020-04-05 21:37:11', '2021-04-05 14:37:11'),
('592a789f3facdbd8781f67f7cb7991d8885acb4be05db8c6eda417d2a0232497e66b134becaabeea', 149, 1, 'Personal Access Token', '[]', 0, '2020-05-30 22:55:34', '2020-05-30 22:55:34', '2021-05-30 15:55:34'),
('59da2081a72d1d0bff35bbbee5ac23bc8b63617fb0171b6b39e88ec849c24b3fc74baa78f1c6957a', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-16 04:36:53', '2020-05-16 04:36:53', '2021-05-15 21:36:53'),
('59f587fc4871fc89743b8ed3ca3fba6e058dae8b5681a3c0aed38072d228543df0a7a2e58620e416', 58, 1, 'Personal Access Token', '[]', 0, '2020-03-03 01:53:37', '2020-03-03 01:53:37', '2021-03-02 18:53:37'),
('5a85d70b29f8e879a63ca2502c7a27eec732ba929537a06923ecec96d5042ca2752d21fe0d342227', 36, 1, 'Personal Access Token', '[]', 0, '2020-01-09 05:47:11', '2020-01-09 05:47:11', '2021-01-08 19:47:11'),
('5b982f7370ddd3cac0d25db40e85d8b88e44ae12b49f3910a9bbf45fade5d357a5471805a91242ce', 172, 1, 'Personal Access Token', '[]', 0, '2020-06-20 19:16:41', '2020-06-20 19:16:41', '2021-06-20 12:16:41'),
('5b9f6e864dbaf6a71094c9c9c34aa5dac92d952346c508000760591530af078fd3f0506dc38acaa8', 84, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:15:18', '2020-04-29 11:15:18', '2021-04-29 04:15:18'),
('5bcb1e6ea202b04a0c74afbbf567f771c558087aaac640a9c38b7e1e32646d951febb91c0941207f', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-07 05:20:02', '2020-05-07 05:20:02', '2021-05-06 22:20:02'),
('5cc5df0699a22fec34059c00c88f656fdf592ac5d3b972f18c268678ec5e9a295efca28d4bb4d06c', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-02 04:29:40', '2020-04-02 04:29:40', '2021-04-01 21:29:40'),
('5d66ba6dea8e497dba041b526aa1f30bc968c373a2edfe94d3a5160bd33da9682b0abffadc1c08f9', 143, 1, 'Personal Access Token', '[]', 0, '2020-05-05 03:57:05', '2020-05-05 03:57:05', '2021-05-04 20:57:05'),
('5d9f2067bb7363f45c1700b3440f125287a9822ce46504c9b49523a3ee88e18180e748ebcd012216', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-27 17:52:54', '2020-04-27 17:52:54', '2021-04-27 10:52:54'),
('5dddde84cf83cacadee9fdb5b8db3b2684994ef9a2d505ddcdaaa41e4407af2016bef4213acc9f17', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-13 11:17:30', '2020-05-13 11:17:30', '2021-05-13 04:17:30'),
('5df95d4c8ceacb6ad356fa15ae540fbe25a8053001f443e181478588e7bebbb646de46aef2c1b827', 151, 1, 'Personal Access Token', '[]', 0, '2020-06-11 22:42:25', '2020-06-11 22:42:25', '2021-06-11 15:42:25'),
('5e50ee0b3b360d621157535816eb8a283eb172d0e2084178df4a110cce81bfa82ff259d6877c412a', 164, 1, 'Personal Access Token', '[]', 1, '2020-06-19 01:20:58', '2020-06-19 01:20:58', '2021-06-18 18:20:58'),
('5f3e3ca95a2e5e2df9093e648a72956ef134df438a2534239387bc3a6c37cdd9587f017bb78d6cd3', 168, 1, 'Personal Access Token', '[]', 0, '2020-06-19 06:01:25', '2020-06-19 06:01:25', '2021-06-18 23:01:25'),
('601c951024eea7870a3babd4ee8620f28e54147e7bce3b1e07a19402fa38eeb4f361a62855b82ef7', 90, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:35:05', '2020-04-29 11:35:05', '2021-04-29 04:35:05'),
('612db9cdf361776555f4824b25e7da8542fb8a8231cf078f1c2ba7e7598383b27637d82e76a767b1', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-12 07:30:31', '2020-05-12 07:30:31', '2021-05-12 00:30:31'),
('62d652ac56b3e398cbf641165340d518875a16d799720887c59c8c693c77caf3cd99a46a4678ee45', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-16 20:36:04', '2020-05-16 20:36:04', '2021-05-16 13:36:04'),
('641e220037f734636c8d9c08652145f3e47b43fc4e9780316b17ad149d00066fb2f522e7d03f69d2', 156, 1, 'Personal Access Token', '[]', 0, '2020-06-12 07:09:31', '2020-06-12 07:09:31', '2021-06-12 00:09:31'),
('652e64b749b0480ee1f1b4d0ac649576f203ca073c0bfdf6ea1ccf54760da6ce3ffe2d634958dd57', 168, 1, 'Personal Access Token', '[]', 0, '2020-06-19 06:01:59', '2020-06-19 06:01:59', '2021-06-18 23:01:59'),
('65f2793e73f72c2716aa631b42ad39b65fd3446a2c501d7c3df076aa26e543f6c70375ae795c291e', 157, 1, 'Personal Access Token', '[]', 0, '2020-06-20 02:30:57', '2020-06-20 02:30:57', '2021-06-19 19:30:57'),
('6612abde68447995d90af2546687eda0126a0d6a5f305d3284056f2ff1819ec764cdce9fbfc6a8d2', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-15 22:49:29', '2020-05-15 22:49:29', '2021-05-15 15:49:29'),
('66551b6a3abdcf000c26f7a812b2018c4842b8501d9f93acc18b8eb1384b3bbe589518f3c0748656', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 22:30:48', '2020-04-16 22:30:48', '2021-04-16 15:30:48'),
('684ba14af10e99bff887fabbb33fa787ffc821cd7827209b1d264b4792766b4127182361bd81d085', 130, 1, 'Personal Access Token', '[]', 0, '2020-04-29 13:55:11', '2020-04-29 13:55:11', '2021-04-29 06:55:11'),
('6992a46c90ada731ad26c8cc25338d40c8da322d901b576b28479775472cc2eeca774593463d851e', 126, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:46:11', '2020-04-29 12:46:11', '2021-04-29 05:46:11'),
('6a6c39d071a5a824b482c372a94aa700453205ea4385343d4f761ac8d171b0082a9e6eb3f277421d', 135, 1, 'Personal Access Token', '[]', 0, '2020-04-30 07:03:11', '2020-04-30 07:03:11', '2021-04-30 00:03:11'),
('6aacc0599c6c1a46bbbcd577553b40dc44e2225afabf9ba13c5cd9fa500d7c79a027fb66d6a6c803', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 22:37:10', '2020-04-16 22:37:10', '2021-04-16 15:37:10'),
('6cec66a562f4bb3fe04e2ef7fa6d9da9560f60c8fbd28337a168874fd08e85073af5a4d8f1780273', 60, 1, 'Personal Access Token', '[]', 0, '2020-03-03 18:57:02', '2020-03-03 18:57:02', '2021-03-03 11:57:02'),
('6d961d950c2ed9d0af750093eb1a25605813c107ac74f070629d691949f8846869a58467d1af291c', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:17:18', '2019-09-02 05:17:18', '2020-09-02 07:17:18'),
('6e4ba7e1febb316033ba52f0f334916f778dcc0a65f0a7ef707fedd5647eb6a39d303a3519ca3e87', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-22 09:06:52', '2020-04-22 09:06:52', '2021-04-22 02:06:52'),
('6e9ebf975aefcd7efe67c14825864754f53858cacb9d8816a967c4f1be8f4b7a93bb2c2dffbe71b0', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-13 05:34:20', '2020-05-13 05:34:20', '2021-05-12 22:34:20'),
('6ec7e5886edb4c1d978b3fdb62314839f9b88b2131379c1c4106de06edd429d644f8802bc8fdd372', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-07 05:16:04', '2020-05-07 05:16:04', '2021-05-06 22:16:04'),
('6f4c701ac6c35757065ac9f79e1b63b36a3576ffab099d3ae7017d0d208992a85cedc1ee9f02ce1b', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-07 07:09:18', '2020-05-07 07:09:18', '2021-05-07 00:09:18'),
('701243b4fd8a3e6613f83c94644849ba4345afd859b6b9ffc769c28df7213543c68982a5dfac306b', 148, 1, 'Personal Access Token', '[]', 0, '2020-06-02 04:28:14', '2020-06-02 04:28:14', '2021-06-01 21:28:14'),
('707374c284251400f4a44b9e083afbbe96336b53c318494c5648ed2462a654da4b28871033a8360f', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-21 08:21:14', '2020-04-21 08:21:14', '2021-04-21 01:21:14'),
('70bb8dc33cbd5e98bf01bdae6f5839ec29ca544d5eea96060c09f729118bc0a3fdb73b9b84f074f6', 1, 1, 'Personal Access Token', '[]', 0, '2020-06-11 07:16:46', '2020-06-11 07:16:46', '2021-06-11 00:16:46'),
('717e872c9edcc30b7976bc747a8be7ec4aae4793473702a8da694f3e5e7e3c845fcbad5d5e033890', 157, 1, 'Personal Access Token', '[]', 0, '2020-06-18 15:56:18', '2020-06-18 15:56:18', '2021-06-18 08:56:18'),
('7198d59a5e0ec7aa125c064f2dbaa5377320f03280818b31265f36defca79c64307dc0345a4b9b91', 64, 1, 'Personal Access Token', '[]', 0, '2020-03-16 05:15:00', '2020-03-16 05:15:00', '2021-03-15 22:15:00'),
('71b3b96d434356d50950d8e7f3e56ef0146c15c4f80eeb8a7000f534402797c96a4408c72f3a25cf', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-21 09:09:58', '2020-04-21 09:09:58', '2021-04-21 02:09:58'),
('723f0e77ef569a6a6f9afbf006d9c8bb3d4f9472c14e7c7250260cd8fbf3c57c801b5f9e18ee955a', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-16 20:36:37', '2020-05-16 20:36:37', '2021-05-16 13:36:37'),
('7240150d4b68b3aa342469f2c246f105fc77f47ca238d00d2d7ee73ad3f6d22e5af3f30b015b45b8', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-13 05:54:44', '2020-05-13 05:54:44', '2021-05-12 22:54:44'),
('730e69958b99fcf24767f90fa7e52f8cf882b581dcf4d2bbe0d25ea57da336e096c65f8f4c310f84', 122, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:37:29', '2020-04-29 12:37:29', '2021-04-29 05:37:29'),
('7358388307c3ad933d2b8ea9d70d909fa1ff370cc3e3061ea33f71fbe9061c2cb5768c784cbd29d8', 49, 1, 'Personal Access Token', '[]', 0, '2020-02-04 18:22:48', '2020-02-04 18:22:48', '2021-02-04 11:22:48'),
('742d95cd1afdba2ce326b68a878422d8c7db0594c33ae7a5ba68a7e58041f47f32fe67c1504a4b75', 126, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:46:03', '2020-04-29 12:46:03', '2021-04-29 05:46:03'),
('742f1414a42db9a5c4038bed09075949323adfa5f6acaf5d19fd52dd36c07cee10797377e62e14f2', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-23 03:09:42', '2020-04-23 03:09:42', '2021-04-22 20:09:42'),
('7552c2df9f7a5cba260cdf599c1fcfaf9d551292fd944c5125c50d7237188c1ce8e732358c428b6a', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-13 22:56:01', '2020-05-13 22:56:01', '2021-05-13 15:56:01'),
('761ce6a38872aabb68c859efd8841756870cb6db79eeef9fe910834fe9ce283fb6b8f0871bd8584f', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-13 05:32:36', '2020-05-13 05:32:36', '2021-05-12 22:32:36'),
('768ca3901471c6d393b24d870e897edf973b45720167e1cf57809e7fccbac4b579e50abd15bb59ab', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-20 18:14:45', '2020-05-20 18:14:45', '2021-05-20 11:14:45'),
('76bbc41a7233a2f238037506afa5a4cdd1012157e8045caf53627ae5cedef6e2081db83da2848035', 119, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:24:46', '2020-04-29 12:24:46', '2021-04-29 05:24:46'),
('76dd3290c7fe411de91064945dc4088a57d555e68ec525f6e32d3edea9b1a38009fcd6b228b84193', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-06 06:14:13', '2020-05-06 06:14:13', '2021-05-05 23:14:13'),
('773a8e664b67a224519c2b0e7115951e1569187258cf8744631a74c07bf14640593a35d0d393ac87', 148, 1, 'Personal Access Token', '[]', 0, '2020-06-02 02:32:19', '2020-06-02 02:32:19', '2021-06-01 19:32:19'),
('7798a6955ad2308b310c08ba5b7a2a2c956068c7388bdd15585b9c2e7dd381f870122bfbc387a10d', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-05 02:50:31', '2020-05-05 02:50:31', '2021-05-04 19:50:31'),
('780b0a15e8c6a7a55f0c59cf75717ed8bfba77e4fe189fc3c9eafef9803408c7e1b21f8d3f2e5156', 90, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:14:56', '2020-04-29 12:14:56', '2021-04-29 05:14:56'),
('79a6b1a1ca604093f625d71703f1853905ddd684a46136caba5dd78cdd1ce219360a242e27361fff', 86, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:20:27', '2020-04-29 11:20:27', '2021-04-29 04:20:27'),
('79c22ef1a21e28f8271ef2c325f8a2b9d8590e19d96e4a9ee6659a89e0ac93ee29a06ed61f4b88db', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:09:45', '2019-09-02 05:09:45', '2019-09-09 07:09:46'),
('7ad7409df40f066db5159e73475c239c05695fff4c56c4cb39810d11518559dd270aa95406a83fd8', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-05 00:21:03', '2020-04-05 00:21:03', '2021-04-04 17:21:03'),
('7ae31e03c0e1785e35acc44cc9c3da2323b9d37f1e4aa6b9fd709f46a24ac7e4b0a8f9f0a738e523', 38, 1, 'Personal Access Token', '[]', 0, '2020-01-19 00:55:13', '2020-01-19 00:55:13', '2021-01-18 17:55:13'),
('7bd919c518cc86fca72f335b1ecb28fdb131d2788968be8e7ec663c23fdfdd9d55b6c701f9e04cd0', 157, 1, 'Personal Access Token', '[]', 0, '2020-06-13 18:05:30', '2020-06-13 18:05:30', '2021-06-13 11:05:30'),
('7bdb5601b727027d939eda3fea4f9dd27eeb6c1b5542e631635c48984f69de93b0f4b7a60af0ca0a', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:06:53', '2019-09-02 05:06:53', '2020-09-02 07:06:53'),
('7d29651d6a6b80a613f23420da9b1a3d12fdf45e4f206efc68af93ea60ffb74c53bfce8da75cfb87', 118, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:22:07', '2020-04-29 12:22:07', '2021-04-29 05:22:07'),
('7d8e7f1ad5ca9b49429dcd16140c274da1ef9964db2dfae9e07255ec4f2e5a1028090f45bfb2cbb7', 79, 1, 'Personal Access Token', '[]', 0, '2020-04-29 10:55:00', '2020-04-29 10:55:00', '2021-04-29 03:55:00'),
('7e1b338a41b33cef1f926670b284a04755fbd2455097eccef450e6959b8723183375630212f5a2f9', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 20:13:01', '2020-05-03 20:13:01', '2021-05-03 13:13:01'),
('7f647b304dcf2889b144739bfc430a0796a0085abd85f455b57fce697e3368a95985a976c8370a26', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 10:13:34', '2020-05-03 10:13:34', '2021-05-03 03:13:34'),
('7fb5028cf22e6ed172df4d1f1908eb3e2cdea5094af794d75a60b7d48fca52914ee22221fc96a5b8', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-21 08:45:53', '2020-04-21 08:45:53', '2021-04-21 01:45:53'),
('7fe2dc1cb91c5cade32d68c2a9f8286641267e1a82414e283b1b624af5159361b0d56230c4dd1d09', 160, 1, 'Personal Access Token', '[]', 0, '2020-06-18 20:24:48', '2020-06-18 20:24:48', '2021-06-18 13:24:48'),
('805d108ef7a9bf2559e676e3d52927789c124f68ed588ea93c4b11efc5c71738e7a1fd83d12a7d83', 85, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:18:57', '2020-04-29 11:18:57', '2021-04-29 04:18:57'),
('809115f59c603edee77984fc6f230aaf2a5bc93b8f01e1b5cea66785bff72385beca5eed2c0998f6', 162, 1, 'Personal Access Token', '[]', 0, '2020-06-18 20:53:31', '2020-06-18 20:53:31', '2021-06-18 13:53:31'),
('80c9802360da11da97ba089486462c89201e44be90b80bd10e1f657378989eedd969f999772d7875', 36, 1, 'Personal Access Token', '[]', 0, '2020-01-09 05:47:20', '2020-01-09 05:47:20', '2021-01-08 19:47:20'),
('828d7112e1300eaafa17b4ea5c4d89e47bb4f41b4b49bd1bb0746da781c89bd4a9473dae18b26001', 143, 1, 'Personal Access Token', '[]', 0, '2020-05-04 17:39:51', '2020-05-04 17:39:51', '2021-05-04 10:39:51'),
('82f65f984f8f70ac1e8d7075c5684e3460ec076340d462148c247cf25468121ffdf1b514847aa9cd', 30, 1, 'Personal Access Token', '[]', 0, '2019-09-02 14:23:47', '2019-09-02 14:23:47', '2020-09-02 16:23:47'),
('83b40859d61b0ebed1557230b7c2214d4ae5daec9ad93d15b57944f06f4a4bf5f93810f1cf92b5ab', 40, 1, 'Personal Access Token', '[]', 0, '2020-01-19 01:10:02', '2020-01-19 01:10:02', '2021-01-18 18:10:02'),
('841de2191bc2eee1db9381ccd9e21763d724f81bc37d31ebaab3996158bbb261e1f06b927289f98c', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-31 06:04:25', '2020-05-31 06:04:25', '2021-05-30 23:04:25'),
('842d028e704caa07f24fbdb0a6c0f29812f489926a36699a942cf385d314972224aadf12b083bd80', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 16:31:46', '2020-04-16 16:31:46', '2021-04-16 09:31:46'),
('84d9eee02b35cbf9faa4e4616f2609ba3906b313f0efdbb462b002e803b63a0c63b96bf740d9c9aa', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-02 20:41:34', '2020-05-02 20:41:34', '2021-05-02 13:41:34'),
('84dda8196bf950cdaf6865d4557ebedb3895faea2f8899164233cfdfcf97f7fa15d8388b70a55652', 50, 1, 'Personal Access Token', '[]', 0, '2020-02-04 18:44:15', '2020-02-04 18:44:15', '2021-02-04 11:44:15'),
('84e51155dcb55304134ee4a7b8c3f613f36b691f945e0f647abd5ce08f67046b53a113fa0f53de95', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-06 03:37:21', '2020-04-06 03:37:21', '2021-04-05 20:37:21'),
('85d94d47d139ab9497b2dadf3479addac7c9b4cca5440d5180a259b6abf2c9d69f240776323d906b', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-15 06:18:40', '2020-04-15 06:18:40', '2021-04-14 23:18:40'),
('85ded01f32c1717b1c4d01c00dc38621bec24fea1bdb9608af5ffdd4499cffd895aea256ce851101', 155, 1, 'Personal Access Token', '[]', 0, '2020-06-11 23:03:51', '2020-06-11 23:03:51', '2021-06-11 16:03:51'),
('871ff1402d10736c632bc1c002dfdfcfbbf693e869ea5b42f26dbbe6bb48d1ee156fec9eefc0bef5', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-07 05:22:58', '2020-05-07 05:22:58', '2021-05-06 22:22:58'),
('87644098f0a44dc5f63d3cf169a0f98e0cf877335fd4d4ff79a7d2d332a31534306e83f8a42848a3', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-16 09:10:35', '2020-05-16 09:10:35', '2021-05-16 02:10:35'),
('87bf37b79303e53604088c7fd2b10ffa9ef74e66d658287ef69ada14c8e096b829a242292e801aef', 41, 1, 'Personal Access Token', '[]', 0, '2020-01-19 01:10:25', '2020-01-19 01:10:25', '2021-01-18 18:10:25'),
('8830ae59e75068baf0286f743b93f833a8a9a44126af5a1756255e0a1006d472bd753ca5a89af877', 42, 1, 'Personal Access Token', '[]', 0, '2020-01-20 17:09:51', '2020-01-20 17:09:51', '2021-01-20 10:09:51'),
('8865a996fb312a710a649085edba52fb67dc763faf45ae50e1dfd51e07b35b154615477714c5839b', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-15 07:33:26', '2020-04-15 07:33:26', '2021-04-15 00:33:26'),
('891c59e2db2a7414b428d6eb8bc3d2bdd20ed5808ff7b9b66beb3bdd6938914ecc0752725b8671e9', 120, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:26:50', '2020-04-29 12:26:50', '2021-04-29 05:26:50'),
('8a413799aa5fc512d4abd426dddb3b3ce86fd2b102b1d328504673d691650d3bfc11b5bbd8afb72e', 39, 1, 'Personal Access Token', '[]', 0, '2020-01-19 02:07:30', '2020-01-19 02:07:30', '2021-01-18 19:07:30'),
('8c7622b1104fbcc91275dee10e3d903011bffe754e0c669db62643f7ecbdd90e9e7c0f16767d7b61', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-19 00:46:28', '2020-04-19 00:46:28', '2021-04-18 17:46:28'),
('8f4ac53b386d1925f70dc9b429d1af097c1452e56a6c1c28dcb177b517a54eeea1def3daf723168a', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 19:37:29', '2020-05-03 19:37:29', '2021-05-03 12:37:29'),
('8fb1cb5d48d3a7984942af6d85394db6555c3c74943b4bc9608fc732ea3c0e53c873b419ae3f6e08', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:09:58', '2019-09-02 05:09:58', '2019-09-09 07:09:58'),
('8fb5015bcb070a2c8a8c4c14128b558ff17f007cddbfb56178809c98ce2e32ae8ccb94ffce7b9944', 43, 1, 'Personal Access Token', '[]', 0, '2020-01-20 17:10:54', '2020-01-20 17:10:54', '2021-01-20 10:10:54'),
('9034ba24daa172c9680919d211c0cf028397f319d557518bf6447db56fa1314994bd9a1e1200a602', 151, 1, 'Personal Access Token', '[]', 0, '2020-06-18 14:56:48', '2020-06-18 14:56:48', '2021-06-18 07:56:48'),
('910a5b4307233608c4e1bce01f529f61334e947719a25b4d69f4748dc8879ba89222941fea87dcd0', 170, 1, 'Personal Access Token', '[]', 0, '2020-06-20 19:23:29', '2020-06-20 19:23:29', '2021-06-20 12:23:29'),
('91935d3141798dabc6ed8040550d2def03b86cb7bcbdee48b745957f7d2082c3e7eabacdfdba6fee', 157, 1, 'Personal Access Token', '[]', 0, '2020-06-16 02:36:55', '2020-06-16 02:36:55', '2021-06-15 19:36:55'),
('920701c81bd986c42a7031ed5c68cd2b355acf4fb8b55406e685d41ae833ea1980acc8dcbe744295', 32, 1, 'Personal Access Token', '[]', 0, '2020-01-09 05:27:51', '2020-01-09 05:27:51', '2021-01-08 19:27:51'),
('92ad20ae6b5adb645cc439171c97dc262f321c4890ac3327779a2dfb920cf2c4cb79759aa345bf24', 78, 1, 'Personal Access Token', '[]', 0, '2020-04-28 16:42:58', '2020-04-28 16:42:58', '2021-04-28 09:42:58'),
('92f396be77ac72a1cbe63f479dbc5c89c65e8b4e3eab7f25dd56dfc9d0f2af0333e533a4af1985a3', 25, 1, 'Personal Access Token', '[]', 0, '2019-10-02 14:52:54', '2019-10-02 14:52:54', '2019-10-09 16:52:54'),
('92f3975f04429ddf43f9294526cedde0b2b6c4d2f53cab6aef806dbfbdec792d948828fc6462340a', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-21 08:11:45', '2020-04-21 08:11:45', '2021-04-21 01:11:45'),
('940d46b5d6a17d72010971ebb0ab44705c72c632915f4d196be173ac838ad5da24cba0b14c513a4c', 137, 1, 'Personal Access Token', '[]', 0, '2020-04-29 17:44:13', '2020-04-29 17:44:13', '2021-04-29 10:44:13'),
('950f0a335f4aefa88aa342a6ed5f441e5795444602519e9fe782a20c1951cca6d7ff991b1315484e', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 10:06:37', '2020-05-03 10:06:37', '2021-05-03 03:06:37'),
('961dc06be8f9cb8a9bf64cb8f4a4dd05e5c3fe0000cf49e934d748f4dc3d779eaad40bc6379256e3', 150, 1, 'Personal Access Token', '[]', 0, '2020-06-11 19:03:02', '2020-06-11 19:03:02', '2021-06-11 12:03:02'),
('975eaef28ebe012a8db8d31723cfc62ba50b994b20686be4ba215ec9e30096277ca7f59a2bd68a51', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-21 06:25:32', '2020-05-21 06:25:32', '2021-05-20 23:25:32'),
('977485e2efbbd46127a9c41a140ec7d2dfee7cefcebe6a4cdd3c04505ffd5fcb640c9ce36b80ea0b', 1, 1, 'Personal Access Token', '[]', 0, '2020-06-18 20:23:06', '2020-06-18 20:23:06', '2021-06-18 13:23:06'),
('97bd758d5b7d915b07c4a79b1701d5d920ce65d9409f8f373c1b60374123b7ae7052e0fdbc6fa34b', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-02 03:52:58', '2020-04-02 03:52:58', '2021-04-01 20:52:58'),
('981e52be8c162f1bfe30c67f706ee94040a7d9cd9c911cf93bbbeb6d1cfb53ce6bc28582bd91b568', 128, 1, 'Personal Access Token', '[]', 0, '2020-04-29 13:44:29', '2020-04-29 13:44:29', '2021-04-29 06:44:29'),
('9897c58f464c85571ee2352a0e610d80f9f028a38aadc31dc1c0c498464db2af1054ee83856fa3dc', 148, 1, 'Personal Access Token', '[]', 0, '2020-06-03 04:29:20', '2020-06-03 04:29:20', '2021-06-02 21:29:20'),
('98eeae9818119b2d8061e450c2d9d22fa84f74b4515e53f909f6c7ecbeda72578b20317bf8042b40', 51, 1, 'Personal Access Token', '[]', 0, '2020-02-04 21:55:37', '2020-02-04 21:55:37', '2021-02-04 14:55:37'),
('99da6765cbea6ccbe6359324baecce9ffea2f306a39ea2538e5275a10e85ade860dbb3bbb0750430', 49, 1, 'Personal Access Token', '[]', 0, '2020-02-03 20:33:14', '2020-02-03 20:33:14', '2021-02-03 13:33:14'),
('99e6fbeeb40a3889affb2a495f4642fb3e02cf44c1d4e21a32bae0dfc349cd890b179042cf6e2f87', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-29 10:01:53', '2020-04-29 10:01:53', '2021-04-29 03:01:53'),
('9c067710d9958f604035695d4e45b0cee93c7ad2293ecfc6394ce96e300a49b7360015aaff2ada2f', 39, 1, 'Personal Access Token', '[]', 0, '2020-01-19 01:08:54', '2020-01-19 01:08:54', '2021-01-18 18:08:54'),
('9cc0f161d6241b6f3aa76be0cd2d74b7aef92d9fe3b89712a08d4e7a7076ba9c5a408e37020ccbf5', 25, 1, 'Personal Access Token', '[]', 0, '2020-01-26 00:04:20', '2020-01-26 00:04:20', '2021-01-25 17:04:20'),
('9e141f00aab5c59f29c9180e92e13fd6e18defd05f56d5fefa58c46f0235f07cb4c48307abaed8fa', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 06:06:25', '2019-09-02 06:06:25', '2020-09-02 08:06:25'),
('9e40fa7120a9502e6167b605033b9974856e40ca242a6ab732ddc9b5a67a59ed994f5b44e35fb14e', 86, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:17:22', '2020-04-29 11:17:22', '2021-04-29 04:17:22'),
('9fa91d21f7adf39da80543b1607c12376963f83501f1b4bdc616fecc277269394681453c4c9692f4', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-23 03:09:03', '2020-04-23 03:09:03', '2021-04-22 20:09:03'),
('a05e45978c1386301829f83b2ebf5c75ca394a7a95f177c04a19a81b06aee2f10e5e802e21c8599e', 157, 1, 'Personal Access Token', '[]', 0, '2020-06-15 04:08:04', '2020-06-15 04:08:04', '2021-06-14 21:08:04');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('a1dcf618a6f2b3a812edf17e111c421b93903b17c5703de45f772492db896cb602d7dbc03dd55d0a', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-29 12:43:57', '2020-05-29 12:43:57', '2021-05-29 05:43:57'),
('a41b4b8b1f1d33490e9821a3b9e38a3bcd3cad93790c1bdb1e3aeff8b52adcccdb08d5543571573b', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-11 03:23:35', '2020-05-11 03:23:35', '2021-05-10 20:23:35'),
('a4324512eb13bc5e87f323ed5df29a96564fa17f5230cc832a2c428c3ca9b60ef2b5d7eff5aac468', 143, 1, 'Personal Access Token', '[]', 0, '2020-05-05 04:12:49', '2020-05-05 04:12:49', '2021-05-04 21:12:49'),
('a4ae122852f84fddb7e4685fae8845c8f5821d79e440eac56f4f278fbef91dc690dd99ef2994dc1c', 62, 1, 'Personal Access Token', '[]', 0, '2020-04-14 10:00:23', '2020-04-14 10:00:23', '2021-04-14 03:00:23'),
('a534f180a8fe09f0bda907c398a2f25fd46007fb46358dcd14521cae7d6f6554a54da2c453a6f37b', 49, 1, 'Personal Access Token', '[]', 0, '2020-02-03 20:33:05', '2020-02-03 20:33:05', '2021-02-03 13:33:05'),
('a564b6c9b330fd8b2c1a36426070e332fbb6cd32c45fbe32c2c06dfe6ab3c1940d3c1f3444b146d1', 46, 1, 'Personal Access Token', '[]', 0, '2020-01-21 15:44:23', '2020-01-21 15:44:23', '2021-01-21 08:44:23'),
('a56d92d18689a6cf43031993530e233916b5cdda172db90837de9156e68429e7147496daadae7406', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-07 03:19:21', '2020-05-07 03:19:21', '2021-05-06 20:19:21'),
('a5be6f56f1a70f9882442d45ca9e543f832cdca387c39153544bbb592559f8df7d9329e25dd75598', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-29 10:06:19', '2020-04-29 10:06:19', '2021-04-29 03:06:19'),
('a67629d25312798ebe035b78a0b3df2e6f9f2fffdef8c2b74a50ef2cc8ef23420a8f9668b3e3e26e', 82, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:03:52', '2020-04-29 11:03:52', '2021-04-29 04:03:52'),
('a6e4529077d6b86f9451e033bb14fb9212f988915b69445bcad2a0ea1f8595139f0b061e9775e4a7', 48, 1, 'Personal Access Token', '[]', 0, '2020-01-25 21:00:53', '2020-01-25 21:00:53', '2021-01-25 14:00:53'),
('a6f272ff33dc349283c0c4f243e8e9bc440ad7bc429187686b9030c7d0f292c598c50051c6569581', 25, 1, 'Personal Access Token', '[]', 0, '2020-01-27 13:26:12', '2020-01-27 13:26:12', '2021-01-27 06:26:12'),
('a749d10719e6642e23dc8ea42562617669f702a742a52b1d96345788d5ade461ef530abf50ff8e9e', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-25 04:44:19', '2020-04-25 04:44:19', '2021-04-24 21:44:19'),
('a790bad760dde495f744b8c3d1df5390f0a3a157d9d0a64acc446b111c542420275525c0e22b9f28', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 18:50:54', '2020-04-16 18:50:54', '2021-04-16 11:50:54'),
('a80b13499fdc989482a8a1e01b646964b1a5b47671b988ae3f77b11d943c7eac9864ecb5cdcafce1', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-02 06:13:14', '2020-04-02 06:13:14', '2021-04-01 23:13:14'),
('a8dfd524444b2210f14be7ef7a442238eccab09ab705d29464f022633d2c5a90fd1d98f76211ab86', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-15 03:26:06', '2020-05-15 03:26:06', '2021-05-14 20:26:06'),
('a94a8acf71d1ec8261d418a39397e262bf877c236b55ef8781626da25e605d3460b1c016137139ef', 53, 1, 'Personal Access Token', '[]', 0, '2020-02-11 23:58:39', '2020-02-11 23:58:39', '2021-02-11 16:58:39'),
('a98ae17327ffd62aacbe68ff290b243e1a3579cee3731dd318f0376a23dfd56bf70730991a4f075c', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 15:00:59', '2020-04-16 15:00:59', '2021-04-16 08:00:59'),
('a9ad1f3f2388f32a05352eef2d478e9c00fe06eb4d3f3fbee6fe132149f49abae83e2e8ebe11fb7e', 127, 1, 'Personal Access Token', '[]', 0, '2020-04-29 13:25:44', '2020-04-29 13:25:44', '2021-04-29 06:25:44'),
('aac038d0a7f3421fa7203ebb1d7855438d0798db38df12e0d4690021f1bf6b70edd3541b7843d66e', 28, 1, 'Personal Access Token', '[]', 0, '2020-01-07 18:08:24', '2020-01-07 18:08:24', '2021-01-07 08:08:24'),
('ab5e303b9b9327dfc7959085c8381c9d084d823ebc75bda59e4bd849ca131e6c6d3056bd3d105b47', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-31 05:19:05', '2020-05-31 05:19:05', '2021-05-30 22:19:05'),
('ac1aedb9792f64e6d2db34b8107fdab9c6b970d58843f802246e22762f282e3856152347ffcdefad', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-06 14:19:09', '2020-05-06 14:19:09', '2021-05-06 07:19:09'),
('adb952884e7e1de66061469282eed9ebbb654fefb296b14164bd1d80f759e1a344522a5f0dcd8971', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-25 06:43:10', '2020-04-25 06:43:10', '2021-04-24 23:43:10'),
('adbf27ec0c70ec60a1b98da315b2c7cc2eca4af131ba8b5bac6ba734da6d9c9ee1bf764fe2e368ab', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-16 19:42:08', '2020-04-16 19:42:08', '2021-04-16 12:42:08'),
('af521ae1817f5b2286fc218021a7c4b5f6f8dd21b437e22c0e47976d06e7a1e4965cd7efb9237ac1', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-06 07:23:20', '2020-05-06 07:23:20', '2021-05-06 00:23:20'),
('afe43c8e946ae5beeb5c183a51cf1cb52c67acc2a8ec86fd6c7bae07bb0f8ad10c14d2bf85719dc1', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-04 04:14:42', '2020-05-04 04:14:42', '2021-05-03 21:14:42'),
('b00a080094cf783453b891e499188d7eec02dbf40769a615140a910b82098dbca05dff4ec6da604d', 127, 1, 'Personal Access Token', '[]', 0, '2020-04-29 13:25:40', '2020-04-29 13:25:40', '2021-04-29 06:25:40'),
('b018b124d2f5abfb04bfe3f10666508063e97b769d841e29b6adebfa01a717b3406efe4ac7575113', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-30 19:44:47', '2020-05-30 19:44:47', '2021-05-30 12:44:47'),
('b0304da0328939c9b06db502fa23b902265f34c9a34d56dfbd858aec56d4611fdf127b677f8b84cc', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-29 09:51:57', '2020-04-29 09:51:57', '2021-04-29 02:51:57'),
('b05bec13d68abcedde1b57fbe2a725ac0d074035a9320e2208de5582f693d376d343d31b2ec49dd8', 1, 1, 'Personal Access Token', '[]', 0, '2020-06-08 06:01:55', '2020-06-08 06:01:55', '2021-06-07 23:01:55'),
('b1d459f13c0179fb4ad1acf37cfa40f570444603c004866adfb27050499e78cab64e8b11490b8cd4', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-02 09:58:00', '2020-05-02 09:58:00', '2021-05-02 02:58:00'),
('b285472d25e212c8d9f52ecb21850d10860f0fb5abe03b956a49f6616c3602451af821ffaca3bfeb', 90, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:33:30', '2020-04-29 11:33:30', '2021-04-29 04:33:30'),
('b33d0b31dce38cfd7bce8b9f8dee20acf1327c01d2603090a2a2c269a4af59b5ffe6b2d54fb70852', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:13:17', '2019-09-02 05:13:17', '2020-09-02 07:13:17'),
('b3677af2a79cca92865d19287fbe44651b80b5be989535b77f69372f25d568cf7cd0c4be84d81809', 152, 1, 'Personal Access Token', '[]', 0, '2020-06-11 22:51:42', '2020-06-11 22:51:42', '2021-06-11 15:51:42'),
('b37cb7a757e778a0d2b46737f7a1b6c84c0e650013d5f778844471ef45e0baa4cb08a211a5648005', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:17:00', '2019-09-02 05:17:00', '2020-09-02 07:17:00'),
('b3a83b7e7a62989f7dc19fb4c332559435bac19453ef038765813f57f0be61f37dc18f3d18d16921', 129, 1, 'Personal Access Token', '[]', 0, '2020-04-29 13:48:28', '2020-04-29 13:48:28', '2021-04-29 06:48:28'),
('b3e61aa198f076cb72e217fe80828413667d9441c7113be023d68feaa1e92de71088853666f78c1b', 26, 1, 'Personal Access Token', '[]', 0, '2019-10-02 15:21:49', '2019-10-02 15:21:49', '2019-10-09 17:21:49'),
('b526e60d0222c7a0723109c1019001254985084b01aa585fc926ed37ca93cc0d1885386ad8d5f33e', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-22 09:13:37', '2020-04-22 09:13:37', '2021-04-22 02:13:37'),
('b53a84f60ffc3821696336e6d0ac1ebff2a666e8f218f4f970c091c289701b5d0f089e84a5373a16', 73, 1, 'Personal Access Token', '[]', 0, '2020-04-22 11:15:51', '2020-04-22 11:15:51', '2021-04-22 04:15:51'),
('b68fed8ec4fa75492c9e5d8716d5ef5050182c22094cbf5713fafb5f1897a7d938cfc4a33a71ec90', 74, 1, 'Personal Access Token', '[]', 0, '2020-04-23 03:17:14', '2020-04-23 03:17:14', '2021-04-22 20:17:14'),
('b731a9b51488894e1f6013becfc55f8362869890a478979d023f7657a72602524cd9c21fe8e37e8d', 49, 1, 'Personal Access Token', '[]', 0, '2020-02-03 20:32:00', '2020-02-03 20:32:00', '2021-02-03 13:32:00'),
('b748102721c8b2a94c42651af56861e8bbd358bf563ca1442d90ff9c30864bfffc9f8f724d871481', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-15 05:37:19', '2020-05-15 05:37:19', '2021-05-14 22:37:19'),
('b74ff69dce71f1006834c06230f021c0287979fbe997d9bd1a0aa3bf27540267f59f986feb5bcdec', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:09:22', '2019-09-02 05:09:22', '2019-09-09 07:09:22'),
('b7c7f098238cfd4ed5706d7ce2dc11cda4e29ab1b20cc43b540f51b168abf297dcbb7494b6a65675', 163, 1, 'Personal Access Token', '[]', 1, '2020-06-19 01:18:44', '2020-06-19 01:18:44', '2021-06-18 18:18:44'),
('b8613224d1ae02cf71ad6852f340030cb94e6423eada369b6dcf16168214f18dc90792d5df591b4d', 135, 1, 'Personal Access Token', '[]', 0, '2020-04-30 07:19:24', '2020-04-30 07:19:24', '2021-04-30 00:19:24'),
('b889dd560da350922819f05731fba7e9d075666cc715214bfcb964d1ce272ce2b1a55d05e5183614', 1, 1, 'Personal Access Token', '[]', 0, '2020-06-08 06:43:41', '2020-06-08 06:43:41', '2021-06-07 23:43:41'),
('b99de39108645e741b7aa40f78a6317c3ecf0eba3d8e019c10c6fe0ccbeb040e27e20f3e4d183ba0', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-18 23:52:50', '2020-04-18 23:52:50', '2021-04-18 16:52:50'),
('b9ec18109757e300023b8d4e1e14467fe1c22bbbeded3dc2349e737ab7d2732642fecc2698ca9b69', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:09:32', '2019-09-02 05:09:32', '2020-09-02 07:09:32'),
('bb4573d9824c681e976f569b4412613b7787bbe47b82701ceefc59a7daca5dcbcc5b6dea575fdb65', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-16 20:35:29', '2020-05-16 20:35:29', '2021-05-16 13:35:29'),
('bbb146e0a242671f2ebf4fb14ef1bd7aa45194de74b7953f16d1da9d114f4e49430ed2c89c411206', 151, 1, 'Personal Access Token', '[]', 0, '2020-06-11 21:21:30', '2020-06-11 21:21:30', '2021-06-11 14:21:30'),
('bbb765775f9ecb7cb264de7cd8da094a9400cde5c723c25d6023a0b959ecd7b48497616e4e9d34be', 117, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:16:07', '2020-04-29 12:16:07', '2021-04-29 05:16:07'),
('bc7f20562f2685e429b4db86d01214d4e2e6f69c028afa7c24f3ac9b992279aa0861bfd3dfc019c9', 154, 1, 'Personal Access Token', '[]', 0, '2020-06-11 22:57:39', '2020-06-11 22:57:39', '2021-06-11 15:57:39'),
('bcdc2105512b5fd5c099273169b81991fd6d29fcae813211835f53d85fd457508dad75ba1ffcb67d', 151, 1, 'Personal Access Token', '[]', 0, '2020-06-18 16:08:20', '2020-06-18 16:08:20', '2021-06-18 09:08:20'),
('bce902db7c27fcb56f0b7963b0ff3e2a0fbad469219132a90e490aea0cf9945c5275cef95c22d5b7', 126, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:46:07', '2020-04-29 12:46:07', '2021-04-29 05:46:07'),
('bd1a205096ff0dde47da93f89eba7fcf4372dd849607e46e1ec98e4a5dd66f07954e5cf8476daa49', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-12 20:11:00', '2020-05-12 20:11:00', '2021-05-12 13:11:00'),
('bdb7729f6ad359454c8639f213885e03f2c32139688a02ac57c5b953bc8cbe529672d2f48096cbea', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-15 07:15:17', '2020-05-15 07:15:17', '2021-05-15 00:15:17'),
('be78db9b387b840068be94bf1eeb9484b2ea7843ea91f622320c1bca2e3d3a47ed289c32189df439', 81, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:02:38', '2020-04-29 11:02:38', '2021-04-29 04:02:38'),
('be94e612766563c4f0b061764e6da5322d7d36e82fbfbffcc8991be183c1b43e03efa1599437552f', 132, 1, 'Personal Access Token', '[]', 0, '2020-04-29 13:57:02', '2020-04-29 13:57:02', '2021-04-29 06:57:02'),
('bee278be6a7e3cbec1ebcec4b6c9991448693234637ad9597127210c10adfea3abd22baa04900f78', 6, 1, 'Personal Access Token', '[]', 0, '2019-09-02 05:03:41', '2019-09-02 05:03:41', '2020-09-02 07:03:41'),
('bfc13a61d486f8818c2e76ef3cb8338cbb5342ca84de573a09faac725776ec203f99ac677b398b62', 128, 1, 'Personal Access Token', '[]', 0, '2020-04-29 13:26:05', '2020-04-29 13:26:05', '2021-04-29 06:26:05'),
('bfcc92b6cdebef0a8700535519c8dc06d72b40dd540c497c56355e39715b80efb3de89f1e21df7ea', 157, 1, 'Personal Access Token', '[]', 0, '2020-06-19 01:26:27', '2020-06-19 01:26:27', '2021-06-18 18:26:27'),
('bfdca81b9e13fd37e2d3a6f8a892d878148cb382e97f7778b0089e86c8ead64237ecde27344a3862', 64, 1, 'Personal Access Token', '[]', 0, '2020-03-16 05:15:30', '2020-03-16 05:15:30', '2021-03-15 22:15:30'),
('c13fb2d87265a3ad473761c2a4e28546a2c9be034cc85c470220e6cbb2d3461663be64ef32ec0184', 47, 1, 'Personal Access Token', '[]', 0, '2020-01-23 17:14:34', '2020-01-23 17:14:34', '2021-01-23 10:14:34'),
('c294342b10ed175546e37f17bcce22fcd1da5ea9aeae1c391c6f96c7408c2b7eead97be2e6d423ec', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-15 19:47:22', '2020-05-15 19:47:22', '2021-05-15 12:47:22'),
('c31733200d48c14306fb0bda0f14576b63fda49b95b952d5d4b2d092822d3f424fab46d3816844a0', 49, 1, 'Personal Access Token', '[]', 0, '2020-02-04 19:19:23', '2020-02-04 19:19:23', '2021-02-04 12:19:23'),
('c354ee737dd382e98a2ca9d7680eb88c8af79f1429c34397d0289bada04f0bfc24899726c6373e2f', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-15 10:52:42', '2020-04-15 10:52:42', '2021-04-15 03:52:42'),
('c3745d806b9d99712e62a25debad7901afa270ccd0f82501092a33d688cf714ebcb6c656bb91b695', 131, 1, 'Personal Access Token', '[]', 0, '2020-04-29 14:11:03', '2020-04-29 14:11:03', '2021-04-29 07:11:03'),
('c41aad3025dffc777c6fe81a84ddf9b1cba70fcf3dbaece6b75d6b047a01d1afe7e2b020715b47ec', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-16 03:53:41', '2020-05-16 03:53:41', '2021-05-15 20:53:41'),
('c51a212f6a2cc8e00ea37c853751a5c0ee896c55c49c833d243fc38030df483e28f8a60a76abf882', 85, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:18:21', '2020-04-29 11:18:21', '2021-04-29 04:18:21'),
('c55cbe7d1124ade02697a9fa33ae1ac8caca4c0a045079c8d46921c793275dd04ad20b5debc85ab2', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 09:28:15', '2020-05-03 09:28:15', '2021-05-03 02:28:15'),
('c62e48f33e681ac90973b65978f39b3435ac9938c171d34dd47f6cac1cd7fb43d06f1a6936515d85', 151, 1, 'Personal Access Token', '[]', 0, '2020-06-11 22:41:19', '2020-06-11 22:41:19', '2021-06-11 15:41:19'),
('c65680e7a88f34b826b0ca1a83212b7035ae7a118dc5e7b6033b17f7689ffff9f80a760ab371e445', 171, 1, 'Personal Access Token', '[]', 0, '2020-06-20 18:04:05', '2020-06-20 18:04:05', '2021-06-20 11:04:05'),
('c66417fc27e24f9f9b08d589b4a6e5c974c4e3d7e182daa8c2fbf990b5715e3bec9d7ef14b8bf02c', 116, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:11:58', '2020-04-29 12:11:58', '2021-04-29 05:11:58'),
('c6990d9b0d290a531eb895659e45ac3aab0e7f96e1cc3afee58c253b2ed28cb19f79510c8d1e1989', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-02 09:06:48', '2020-05-02 09:06:48', '2021-05-02 02:06:48'),
('c7d793172df818fa6e5422ca1a8c9efea5a7764294cd9108c8cb218a70f8b82dda6b723f2ffd703c', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-15 07:35:03', '2020-04-15 07:35:03', '2021-04-15 00:35:03'),
('c7e1309e520595a25c4f670afd89a85869aad55925ad1c8afc192fff8206e8655b6c51b5cbd2106a', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-04 03:11:02', '2020-05-04 03:11:02', '2021-05-03 20:11:02'),
('c7ff36f3c3f3e6959299160582beabf50ccbdb8c083dfae0954c73eadd799bc5ac50ac7e3c9638ee', 157, 1, 'Personal Access Token', '[]', 0, '2020-06-15 03:43:26', '2020-06-15 03:43:26', '2021-06-14 20:43:26'),
('c812427aa445d5873ccb551773f1afa2367743ba11ced6b409da61ade7f34cf22a81f9f8bcadc584', 90, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:13:13', '2020-04-29 12:13:13', '2021-04-29 05:13:13'),
('c8703362381a2882755b9b87225afb3aeb9c478549fb4f88bd107c93a5a7e32aeb7aa1c896a61547', 148, 1, 'Personal Access Token', '[]', 0, '2020-06-02 05:51:35', '2020-06-02 05:51:35', '2021-06-01 22:51:35'),
('cb41f1786fad7913f339739724e9d4292f48480ba2e32a44c47a21f81b2e66b133f7910b925dabbf', 169, 1, 'Personal Access Token', '[]', 0, '2020-06-20 16:21:34', '2020-06-20 16:21:34', '2021-06-20 09:21:34'),
('cbd753bcae670aa8aa1b8642eac680f53a4c6aceae11840c418648d13c4085766a6ab56b65dcf384', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-16 19:58:45', '2020-05-16 19:58:45', '2021-05-16 12:58:45'),
('cbe70f4091d39f2c7af39c9b76793806508dcdca9cc31b208c2eae6ee16bb849335811e1e05629e9', 170, 1, 'Personal Access Token', '[]', 0, '2020-06-20 17:10:18', '2020-06-20 17:10:18', '2021-06-20 10:10:18'),
('cbedcdb5fc1bb475615fcc235a3a0fac434a0a8dd997337dd81983715bf9b7f147a97918e608c3ff', 124, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:39:41', '2020-04-29 12:39:41', '2021-04-29 05:39:41'),
('cc3823801fb979b82b21ed889fd63e78e4065506c66b3243a35e7ed6d6b14b7ae8a3ada0c66e2fe7', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 06:37:57', '2020-05-03 06:37:57', '2021-05-02 23:37:57'),
('cc4784ccdad7b9b772a2871c439183923e3fbe90b2e0788895976db85eb3af5df45ce1749d2cbeee', 66, 1, 'Personal Access Token', '[]', 0, '2020-04-01 00:16:01', '2020-04-01 00:16:01', '2021-03-31 17:16:01'),
('cdd6af3c9110d129632c555374cb718f2dd539d541cece8f24cdfd9cd6af5541a3e389518bd51c69', 1, 1, 'Personal Access Token', '[]', 0, '2020-06-10 18:29:51', '2020-06-10 18:29:51', '2021-06-10 11:29:51'),
('ce38e926492b509e221445a5c44c7cb673b49ebb90c8edfc9290675914ab37109da3eeea31f88889', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 04:52:15', '2020-05-03 04:52:15', '2021-05-02 21:52:15'),
('ce4b32414bbdc7786720bbba69c4c7c84c8ffd6287a6b36476d7e768c2340b1701ec0cd3ebc3830f', 133, 1, 'Personal Access Token', '[]', 0, '2020-04-29 14:13:12', '2020-04-29 14:13:12', '2021-04-29 07:13:12'),
('ce5a8616bade002f70a7abe29217eda753c1728440e78c1490a343964d1b503c38ed03fd74bdcf9e', 85, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:18:18', '2020-04-29 11:18:18', '2021-04-29 04:18:18'),
('ceba7048fffbbb46b7e024fb7778353dfde269a1cdbe3ac76e50e274875035d0878cdbd77423b0fb', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-30 17:30:29', '2020-05-30 17:30:29', '2021-05-30 10:30:29'),
('ceec7d2879facc3bc65de8551b251e8e18939e30f9cd820c12216253cc05f330947160efc6f4143c', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-22 09:28:23', '2020-05-22 09:28:23', '2021-05-22 02:28:23'),
('cf279c2c3c20e11968d6db1ad2e7a82b3f9ecb9ec081ac8aeb91fb4ee41ebba24b8b1293f1e38966', 62, 1, 'Personal Access Token', '[]', 0, '2020-03-12 04:07:24', '2020-03-12 04:07:24', '2021-03-11 21:07:24'),
('cf5c5a7e37b0b963c22d3feea7e863f6200fad896857a77c19cd970cb471f7f304df25bf4aeb5697', 153, 1, 'Personal Access Token', '[]', 0, '2020-06-11 22:49:11', '2020-06-11 22:49:11', '2021-06-11 15:49:11'),
('cfa8894dc36572cad50e8076a98375da3da1f1691ae37d31c3df7b37c132e7ce219f9b55763e710a', 130, 1, 'Personal Access Token', '[]', 0, '2020-04-29 14:04:18', '2020-04-29 14:04:18', '2021-04-29 07:04:18'),
('d0025c669e2b9316fb54159dd4b5a33ac48f6b111706d024d6c9c7c13c92ccd50bcc5c85476f7fea', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-23 03:09:03', '2020-04-23 03:09:03', '2021-04-22 20:09:03'),
('d00e82345a7d3aa9cb108ddd30814a0ec772ebcf21ace63918b7a3b10697bb69f4b105971bd89656', 1, 1, 'Personal Access Token', '[]', 0, '2020-06-12 02:23:53', '2020-06-12 02:23:53', '2021-06-11 19:23:53'),
('d01f159bba4188cd7bd8bc74e6c6bc2d1784f2057c85a4247a868e347550710417d481f6d5b8f7e8', 57, 1, 'Personal Access Token', '[]', 0, '2020-03-03 00:21:50', '2020-03-03 00:21:50', '2021-03-02 17:21:50'),
('d109715a9b9018e50563993660cdad93eaf0d4955a1ff205012f6e567d622a7ad4c9e08725ef142b', 1, 1, 'Personal Access Token', '[]', 0, '2020-06-10 17:53:21', '2020-06-10 17:53:21', '2021-06-10 10:53:21'),
('d292db0d8c11fdc5df7a224c10fe408ee05b2177814d8ae3f9239d0db642b2d79b928c5e462b2348', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-22 08:52:04', '2020-04-22 08:52:04', '2021-04-22 01:52:04'),
('d2c2eab4f6f54c530356dc8ff2f5d6456db42a6f9fc688e25caf05706d39ed99dde34fc6115b95b8', 35, 1, 'Personal Access Token', '[]', 0, '2020-01-09 05:46:28', '2020-01-09 05:46:28', '2021-01-08 19:46:28'),
('d2f718ec1e6e8aac99bb30d3ce4820ede4dd4024fa96cc7188396419c5bd9baaae2f3ac361f96ad8', 62, 1, 'Personal Access Token', '[]', 0, '2020-03-25 00:20:19', '2020-03-25 00:20:19', '2021-03-24 17:20:19'),
('d4697320df17b5b7f8250fb1ea6ce162eee82698568c1e702170c79e20ba772027e5356181a3ae03', 140, 1, 'Personal Access Token', '[]', 0, '2020-05-02 06:43:37', '2020-05-02 06:43:37', '2021-05-01 23:43:37'),
('d538123d2613677955cfdd22771d3ae477dc66c266ec14d91c771f54ffba6b15035dfcd2cf725f36', 152, 1, 'Personal Access Token', '[]', 0, '2020-06-11 22:47:18', '2020-06-11 22:47:18', '2021-06-11 15:47:18'),
('d587276fb900ad80301ccdae29618ed2428b1724d7354689107cb6968ba994c58d1ff7d170a5a54d', 37, 1, 'Personal Access Token', '[]', 0, '2020-01-18 23:53:21', '2020-01-18 23:53:21', '2021-01-18 16:53:21'),
('d77beaa5b54458b359cff1ee478bf402f4be7e7d3f4d1fec05e349a473b1fa89fc7833ce27b331d9', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-30 01:10:54', '2020-05-30 01:10:54', '2021-05-29 18:10:54'),
('d7e2b82478b45125ae653df244bb4d23c66454b31c4d89240ad4607cdc6cf1dce33b633876819666', 134, 1, 'Personal Access Token', '[]', 0, '2020-04-29 14:25:20', '2020-04-29 14:25:20', '2021-04-29 07:25:20'),
('d832a7970e4607f9263e3f1d40bfd68a16232f7ae3cd2aa43751dd2cacc849ace5bf25193eb42a51', 61, 1, 'Personal Access Token', '[]', 0, '2020-03-08 04:19:56', '2020-03-08 04:19:56', '2021-03-07 21:19:56'),
('d8859c57d5629a4d099dbf1202d32da9bd16f3bf7bf0ee4f85c3bf10e07292b96bf1aeb0d27fdee5', 61, 1, 'Personal Access Token', '[]', 0, '2020-03-08 04:21:36', '2020-03-08 04:21:36', '2021-03-07 21:21:36'),
('d93ba10aceda758d5e992f643b166130a68afd47201b1d0b308b6d7e39885bc3c03ea313418b0fa3', 6, 1, 'Personal Access Token', '[]', 1, '2019-09-02 05:17:32', '2019-09-02 05:17:32', '2020-09-02 07:17:32'),
('d98c89e84e1c91cbf7c82298e274771512f9ed65bc64499221f13b1c8c0189993dd9c7f8a9281e44', 90, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:15:11', '2020-04-29 12:15:11', '2021-04-29 05:15:11'),
('d9d1150604aa1220d85fb1ed70456a7e6d5ecae5f6f01817a2738f889d4f7b0d949ab6f594574fb4', 85, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:18:15', '2020-04-29 11:18:15', '2021-04-29 04:18:15'),
('da09b374f818a7757d1bafcd503ce91a24dac87b8c8b9b7f76a2287e6ab5b80a104863875e17dd97', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-16 06:04:17', '2020-05-16 06:04:17', '2021-05-15 23:04:17'),
('db3a314d29db4790384556eef9263d0789869bf757e60cc3383864f123df85d5c1f0ff8ea01c22a7', 129, 1, 'Personal Access Token', '[]', 0, '2020-04-29 13:48:15', '2020-04-29 13:48:15', '2021-04-29 06:48:15'),
('db5553df77a87ee8adaa54e06d57b9cbbb7c894bf9b8a590f4756aa33c7612a7cad8bcdd37c9437d', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-23 03:09:03', '2020-04-23 03:09:03', '2021-04-22 20:09:03'),
('dc234010dcc7c30e21934343b07135b479affa84289ba90649c6c00eae016e9cbab800638d2726e7', 127, 1, 'Personal Access Token', '[]', 0, '2020-04-29 13:25:09', '2020-04-29 13:25:09', '2021-04-29 06:25:09'),
('dc992503ee6e7f275cfba05198be7bb19e6c4a24fdd6d4568b26b61cc472b3eadeefbe0baed7d66f', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 14:50:20', '2020-04-16 14:50:20', '2021-04-16 07:50:20'),
('dcecec0e1294ed81f6954cdb03b1f2520e9e7310fe86345e189ae62af1faa0a38d5cdabc04840e36', 35, 1, 'Personal Access Token', '[]', 0, '2020-01-09 05:46:13', '2020-01-09 05:46:13', '2021-01-08 19:46:13'),
('e01f152920a6fe552ddaafd98170bff82ce7de30ce57ca03de04d0bb7fe13370bb4ec0ca0b46a9e4', 25, 1, 'Personal Access Token', '[]', 0, '2020-01-26 03:11:45', '2020-01-26 03:11:45', '2021-01-25 20:11:45'),
('e0ee87939f89529ceeb62a98fef832c958978cb553170936eca624b1c76871ea27eb81191652173b', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-15 09:51:33', '2020-04-15 09:51:33', '2021-04-15 02:51:33'),
('e117891ce99cacbc24bf3f6f37bfb9896393315ee891a952bfce29646bbd47a2ba41ee533e1f6aaf', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-29 10:32:52', '2020-04-29 10:32:52', '2021-04-29 03:32:52'),
('e209045ac0d458ff9d02f9986a37de465e087b3ad09ade0d57369e852e28553a963b180ce95437c4', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-02 07:44:42', '2020-05-02 07:44:42', '2021-05-02 00:44:42'),
('e20b1244d7ec210a88c29d11b79ea550593189ca3d927cacf5baccd1146b6206a0dda378cb010fb4', 157, 1, 'Personal Access Token', '[]', 0, '2020-06-15 03:57:31', '2020-06-15 03:57:31', '2021-06-14 20:57:31'),
('e249b32f42326540624b6d923d8d72e68b1b3d3ad3ecea26f33286547079a45ef4b16a703b388267', 158, 1, 'Personal Access Token', '[]', 0, '2020-06-18 15:41:51', '2020-06-18 15:41:51', '2021-06-18 08:41:51'),
('e27a1fecf6e5df090833485201aba19c3b0381dcf39a52ace7a3fef6bda3950d734d7e11c54f2420', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-16 13:55:12', '2020-04-16 13:55:12', '2021-04-16 06:55:12'),
('e2a2055b5e78b19d9af633d351c8faa876852c95011906f119197a4e4cd7c3e73e6189988f1d5678', 142, 1, 'Personal Access Token', '[]', 0, '2020-05-03 10:31:59', '2020-05-03 10:31:59', '2021-05-03 03:31:59'),
('e2d335d5e42b0b768c23722ba4e34fe47997d2256892ecf1596b5d8ac6d3d8384088325667cf9b7d', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-13 06:01:37', '2020-05-13 06:01:37', '2021-05-12 23:01:37'),
('e34a7dd285b73937229571d0c0549ce4603079d38b1d07849ca80b87d7f5c051946a5fa555f9273a', 157, 1, 'Personal Access Token', '[]', 0, '2020-06-15 04:09:21', '2020-06-15 04:09:21', '2021-06-14 21:09:21'),
('e4094d527811c83f3943572ca1dcaa0795d21038d5c1dba97378979a8bd22e3503330bb671007263', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-23 03:09:03', '2020-04-23 03:09:03', '2021-04-22 20:09:03'),
('e44337efc4e5e31bb0c042f8dcdc1aee47c0c1048fa444e37f90ff171fab2d72dad924520cab383e', 126, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:46:14', '2020-04-29 12:46:14', '2021-04-29 05:46:14'),
('e4c5f6ee95940c3607b5fa1c2361a698ad07c406bff545376b57171c78d85ce9613202c635aeee57', 157, 1, 'Personal Access Token', '[]', 0, '2020-06-19 02:26:05', '2020-06-19 02:26:05', '2021-06-18 19:26:05'),
('e4cf42d62f2f272ae111c25c433c28576cb95f14e584b23220d835ca6e8cf7ee8e35ef124e1c6ef7', 43, 1, 'Personal Access Token', '[]', 0, '2020-01-20 17:59:45', '2020-01-20 17:59:45', '2021-01-20 10:59:45'),
('e524b286e9413c948ae497feb7efef80b2bde0a27b4c649f14ce897240887cf3d6252e4f2bed2ba8', 151, 1, 'Personal Access Token', '[]', 0, '2020-06-20 17:06:21', '2020-06-20 17:06:21', '2021-06-20 10:06:21'),
('e59407526b9ddc05cf7e715059ab3cfffe299be70e13e86eedeb2a7aeb8b36354f61eca0f20490f3', 59, 1, 'Personal Access Token', '[]', 0, '2020-03-03 18:54:51', '2020-03-03 18:54:51', '2021-03-03 11:54:51'),
('e650f3b0f3df8b23907b666b9571276e49b2f6864cb922e1576d9c43c8419dcdae8b5be6d29f3508', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-24 21:18:22', '2020-04-24 21:18:22', '2021-04-24 14:18:22'),
('e666eecda844dd5b841ed2a8459042b6369bbf1094d258f7e9ed9a2080650383452f529835b36093', 39, 1, 'Personal Access Token', '[]', 0, '2020-01-19 03:27:25', '2020-01-19 03:27:25', '2021-01-18 20:27:25'),
('e71f533a3becd96e72dd503932ce65103c934ca3af2263c65b780ecfbab760d15743941913ed16a5', 148, 1, 'Personal Access Token', '[]', 0, '2020-06-02 04:27:02', '2020-06-02 04:27:02', '2021-06-01 21:27:02'),
('e787566a85bbb5bd03acd907732f08d9032281b4dcd1cc24d47a8f77ec043c907fa3ae2e91c4242d', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-29 09:51:30', '2020-04-29 09:51:30', '2021-04-29 02:51:30'),
('e7ecaaf46335a0065bbdb4debbd76866e15ade23fb13ea9179c4bfb8a2f7373f0298ff707342f626', 168, 1, 'Personal Access Token', '[]', 0, '2020-06-19 05:53:33', '2020-06-19 05:53:33', '2021-06-18 22:53:33'),
('e875b5b687d2feab0db376c9cebea3a981bc76852d1a85d5ad35684aa43d081c7893600f763332aa', 135, 1, 'Personal Access Token', '[]', 0, '2020-04-29 14:32:09', '2020-04-29 14:32:09', '2021-04-29 07:32:09'),
('e8eb478e5368e2429fe27e51f11727c30f08a752b798cced3993e8d8641d584dbc4f74e996764dd3', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-06 10:56:08', '2020-05-06 10:56:08', '2021-05-06 03:56:08'),
('e9343b1bfc158affa3dbb0506998dc236652add7b28744f640c8655de62395dfafda0f078970b98b', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-16 06:00:46', '2020-05-16 06:00:46', '2021-05-15 23:00:46'),
('e9e6875c3b97f91c3df8846f9315fe930ad998fe6a2a2470610c027afba5d0e7a5675be8dc1ea05b', 121, 1, 'Personal Access Token', '[]', 0, '2020-04-29 12:36:57', '2020-04-29 12:36:57', '2021-04-29 05:36:57'),
('ea64e8f5ef614748219884901cbd4ccee67e6af5b25f9c3b18ea5faeb5731bf09f84517dff9bb966', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-20 18:13:26', '2020-05-20 18:13:26', '2021-05-20 11:13:26'),
('eb18fda71ec1ad4db16f3d39ad0e90990566c44e6ba141ac6a342e95a5fa33f4a8066394e1fa81ef', 1, 1, 'Personal Access Token', '[]', 0, '2020-06-08 05:48:39', '2020-06-08 05:48:39', '2021-06-07 22:48:39'),
('ece07fc137f496cd23265c4b866fd0c4fa4e0cf350dff9bddc79c06906c09b2241d3840df501919f', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-12 11:35:53', '2020-05-12 11:35:53', '2021-05-12 04:35:53'),
('edf482274535a1d30d90578239443b88f8d9871695cf4c0b2934bc6259c361b545d6f77e00de3bf3', 30, 1, 'Personal Access Token', '[]', 0, '2019-09-02 10:44:27', '2019-09-02 10:44:27', '2020-09-02 12:44:27'),
('eef7a854ad2189da13ffce1a5f1a1cc07cb2d92a87b16e5267c9a591df33bb14fd083d7f9ed8f661', 157, 1, 'Personal Access Token', '[]', 0, '2020-06-19 02:10:15', '2020-06-19 02:10:15', '2021-06-18 19:10:15'),
('ef3c9893b46f69153f1718d2d8aea9e1a70c76245608ad557f19cbbe8813eb3802d35c8032682ac2', 130, 1, 'Personal Access Token', '[]', 0, '2020-04-29 13:53:43', '2020-04-29 13:53:43', '2021-04-29 06:53:43'),
('f1befb4616b738ce6dfa446b9dcee68f8de7f9577ee11f2d91e9550976cdc52533f3839212a8d6a6', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-02 05:27:31', '2020-05-02 05:27:31', '2021-05-01 22:27:31'),
('f1eac1cd4e5820d7c45747f5c60386d5227043eb60d3cb9a2e70083cfdfd95f149b169bb4ec4fa3a', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-22 08:59:39', '2020-04-22 08:59:39', '2021-04-22 01:59:39'),
('f36cd5d17f9d1fe8f7346ad8aa5b2277364cd8386e893db4a929b08de6ee5b972cb89417f4e5fa2b', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-06 04:52:49', '2020-04-06 04:52:49', '2021-04-05 21:52:49'),
('f373390af0ee551dbb9fc937e0bc37042d50907761f64858a074eba700827541a850b259e3ad0a4e', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 19:50:23', '2020-05-03 19:50:23', '2021-05-03 12:50:23'),
('f3e55f7a078ce690ed9af579ab5109ee65192855c3ac2f87e7fb89b5d7d03282f62f70211fdaefa6', 1, 1, 'Personal Access Token', '[]', 0, '2020-06-11 21:28:33', '2020-06-11 21:28:33', '2021-06-11 14:28:33'),
('f3fea65ff93479060ef81c8e25471c46e4f91a8efe6438f0656f19b63b497cad68213715d955f29f', 62, 1, 'Personal Access Token', '[]', 0, '2020-04-29 10:02:39', '2020-04-29 10:02:39', '2021-04-29 03:02:39'),
('f4286c310f8af610e80cc1da663ee85603d7e636d6eb920680adbca73ffebab66118774f56737415', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-03 20:44:23', '2020-05-03 20:44:23', '2021-05-03 13:44:23'),
('f50bc91ea50e0e93e0d4ad3a76bd31e2ef9efd39d13190c5daeddfc94fd518439f413e95a24efdc2', 91, 1, 'Personal Access Token', '[]', 0, '2020-04-29 11:26:28', '2020-04-29 11:26:28', '2021-04-29 04:26:28'),
('f5c25bf68901e290830f9b0042ac168e16b3f1830971f4de6cfedd00aea7fb9bc8ded3f6d1bb6199', 44, 1, 'Personal Access Token', '[]', 0, '2020-01-21 15:27:59', '2020-01-21 15:27:59', '2021-01-21 08:27:59'),
('f629a9f23e4d2320edd15e14b38ed49efa3f6ab16e3b09cd82a1fcdef508ddb136bdcbb95ea0312a', 71, 1, 'Personal Access Token', '[]', 0, '2020-04-27 17:53:39', '2020-04-27 17:53:39', '2021-04-27 10:53:39'),
('f84e352505d3cd4e826feafb0ade8cdc69bf809bdf66ccbcb4df7bea7019dac65b5b355a78b02121', 148, 1, 'Personal Access Token', '[]', 0, '2020-05-31 03:11:42', '2020-05-31 03:11:42', '2021-05-30 20:11:42'),
('f8a5d8ec914c14a3effde32671beca645d9800c30c6005ebabcbf7e08ecd67bb1e7504a7c8977cf8', 47, 1, 'Personal Access Token', '[]', 0, '2020-01-23 16:43:39', '2020-01-23 16:43:39', '2021-01-23 09:43:39'),
('f8bffaae21b34e4cf81e1837d884d51e508ecfe628b52d45189449ad70fe0a5d459687b688bf0cfd', 130, 1, 'Personal Access Token', '[]', 0, '2020-04-29 13:50:19', '2020-04-29 13:50:19', '2021-04-29 06:50:19'),
('f9b3593510482741e701fea4c02bf6afe041df5f668f8bce49ce2feec7da485cc19110d62eb51f1e', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-02 09:20:52', '2020-05-02 09:20:52', '2021-05-02 02:20:52'),
('fa5701dd8394634e8dfafc141b99376a0f044ecdd5a35b36cfc2b6d2658e537f859c674238aa3296', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-19 04:51:50', '2020-04-19 04:51:50', '2021-04-18 21:51:50'),
('fb1d6421f30546176729f9fc7d34ab2136448842a6487835021b4b0970636b1f10c6aedd111fb43e', 135, 1, 'Personal Access Token', '[]', 0, '2020-05-06 06:33:26', '2020-05-06 06:33:26', '2021-05-05 23:33:26'),
('fe096ac51f0926c7c60cec3be32c1ab775f60275b572d71e137769d5ee1f8596a3f05ffb4029a6af', 147, 1, 'Personal Access Token', '[]', 0, '2020-05-18 16:09:14', '2020-05-18 16:09:14', '2021-05-18 09:09:14'),
('fecbebb2a7ca8d33f055639c0ce40db5a76737b509ae52e7a7c87b448e03806390aa549316d95a62', 28, 1, 'Personal Access Token', '[]', 0, '2020-01-07 18:08:12', '2020-01-07 18:08:12', '2021-01-07 08:08:12'),
('fffb4a967c35972e3b1a9e22aec8d66907b08fb01a15036550534a430cdb60f2f2e85e0c21986522', 68, 1, 'Personal Access Token', '[]', 0, '2020-04-15 10:57:34', '2020-04-15 10:57:34', '2021-04-15 03:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
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
(1, NULL, 'Laravel Personal Access Client', 'u9oC8ZZScwQAs0D6uFTd09CvPiiNcdo8zxtCcmgK', 'http://localhost', 1, 0, 0, '2019-09-02 04:07:09', '2019-09-02 04:07:09'),
(2, NULL, 'Laravel Password Grant Client', 'Z66GgFm2KJZZAXibURpfqyfVYc2lFo5X7hRRywOo', 'http://localhost', 0, 1, 0, '2019-09-02 04:07:09', '2019-09-02 04:07:09');

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
(1, 1, '2019-09-02 04:07:09', '2019-09-02 04:07:09');

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `code`, `created_at`, `updated_at`) VALUES
(1, 'kareimovich@gmail.com', NULL, '395431', '2020-01-25 23:25:57', '2020-06-12 02:18:54'),
(2, 'eprog18@gmail.com', NULL, '999999', '2020-06-20 17:10:47', '2020-06-20 17:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2019-08-31 09:43:42', '2019-08-31 09:43:42'),
(2, 'browse_bread', NULL, '2019-08-31 09:43:42', '2019-08-31 09:43:42'),
(3, 'browse_database', NULL, '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(4, 'browse_media', NULL, '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(5, 'browse_compass', NULL, '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(6, 'browse_menus', 'menus', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(7, 'read_menus', 'menus', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(8, 'edit_menus', 'menus', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(9, 'add_menus', 'menus', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(10, 'delete_menus', 'menus', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(11, 'browse_roles', 'roles', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(12, 'read_roles', 'roles', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(13, 'edit_roles', 'roles', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(14, 'add_roles', 'roles', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(15, 'delete_roles', 'roles', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(16, 'browse_users', 'users', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(17, 'read_users', 'users', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(18, 'edit_users', 'users', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(19, 'add_users', 'users', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(20, 'delete_users', 'users', '2019-08-31 09:43:43', '2019-08-31 09:43:43'),
(21, 'browse_settings', 'settings', '2019-08-31 09:43:44', '2019-08-31 09:43:44'),
(22, 'read_settings', 'settings', '2019-08-31 09:43:44', '2019-08-31 09:43:44'),
(23, 'edit_settings', 'settings', '2019-08-31 09:43:44', '2019-08-31 09:43:44'),
(24, 'add_settings', 'settings', '2019-08-31 09:43:44', '2019-08-31 09:43:44'),
(25, 'delete_settings', 'settings', '2019-08-31 09:43:44', '2019-08-31 09:43:44'),
(41, 'browse_hooks', NULL, '2019-08-31 09:43:59', '2019-08-31 09:43:59'),
(42, 'browse_products', 'products', '2019-09-02 06:38:06', '2019-09-02 06:38:06'),
(43, 'read_products', 'products', '2019-09-02 06:38:06', '2019-09-02 06:38:06'),
(44, 'edit_products', 'products', '2019-09-02 06:38:06', '2019-09-02 06:38:06'),
(45, 'add_products', 'products', '2019-09-02 06:38:06', '2019-09-02 06:38:06'),
(46, 'delete_products', 'products', '2019-09-02 06:38:06', '2019-09-02 06:38:06'),
(47, 'browse_countries', 'countries', '2019-09-18 14:52:47', '2019-09-18 14:52:47'),
(48, 'read_countries', 'countries', '2019-09-18 14:52:47', '2019-09-18 14:52:47'),
(49, 'edit_countries', 'countries', '2019-09-18 14:52:47', '2019-09-18 14:52:47'),
(50, 'add_countries', 'countries', '2019-09-18 14:52:47', '2019-09-18 14:52:47'),
(51, 'delete_countries', 'countries', '2019-09-18 14:52:47', '2019-09-18 14:52:47'),
(77, 'browse_stores', 'stores', '2019-09-25 11:29:32', '2019-09-25 11:29:32'),
(78, 'read_stores', 'stores', '2019-09-25 11:29:32', '2019-09-25 11:29:32'),
(79, 'edit_stores', 'stores', '2019-09-25 11:29:32', '2019-09-25 11:29:32'),
(80, 'add_stores', 'stores', '2019-09-25 11:29:32', '2019-09-25 11:29:32'),
(81, 'delete_stores', 'stores', '2019-09-25 11:29:32', '2019-09-25 11:29:32'),
(82, 'browse_tags', 'tags', '2019-09-25 12:03:12', '2019-09-25 12:03:12'),
(83, 'read_tags', 'tags', '2019-09-25 12:03:12', '2019-09-25 12:03:12'),
(84, 'edit_tags', 'tags', '2019-09-25 12:03:12', '2019-09-25 12:03:12'),
(85, 'add_tags', 'tags', '2019-09-25 12:03:12', '2019-09-25 12:03:12'),
(86, 'delete_tags', 'tags', '2019-09-25 12:03:12', '2019-09-25 12:03:12'),
(87, 'browse_branches', 'branches', '2019-09-29 16:25:58', '2019-09-29 16:25:58'),
(88, 'read_branches', 'branches', '2019-09-29 16:25:58', '2019-09-29 16:25:58'),
(89, 'edit_branches', 'branches', '2019-09-29 16:25:58', '2019-09-29 16:25:58'),
(90, 'add_branches', 'branches', '2019-09-29 16:25:58', '2019-09-29 16:25:58'),
(91, 'delete_branches', 'branches', '2019-09-29 16:25:58', '2019-09-29 16:25:58'),
(92, 'browse_states', 'states', '2019-09-30 05:07:40', '2019-09-30 05:07:40'),
(93, 'read_states', 'states', '2019-09-30 05:07:40', '2019-09-30 05:07:40'),
(94, 'edit_states', 'states', '2019-09-30 05:07:40', '2019-09-30 05:07:40'),
(95, 'add_states', 'states', '2019-09-30 05:07:40', '2019-09-30 05:07:40'),
(96, 'delete_states', 'states', '2019-09-30 05:07:40', '2019-09-30 05:07:40'),
(97, 'browse_cities', 'cities', '2019-10-01 05:14:19', '2019-10-01 05:14:19'),
(98, 'read_cities', 'cities', '2019-10-01 05:14:20', '2019-10-01 05:14:20'),
(99, 'edit_cities', 'cities', '2019-10-01 05:14:20', '2019-10-01 05:14:20'),
(100, 'add_cities', 'cities', '2019-10-01 05:14:20', '2019-10-01 05:14:20'),
(101, 'delete_cities', 'cities', '2019-10-01 05:14:20', '2019-10-01 05:14:20'),
(102, 'browse_requests', 'requests', '2019-10-04 05:15:45', '2019-10-04 05:15:45'),
(103, 'read_requests', 'requests', '2019-10-04 05:15:45', '2019-10-04 05:15:45'),
(104, 'edit_requests', 'requests', '2019-10-04 05:15:45', '2019-10-04 05:15:45'),
(105, 'add_requests', 'requests', '2019-10-04 05:15:45', '2019-10-04 05:15:45'),
(106, 'delete_requests', 'requests', '2019-10-04 05:15:45', '2019-10-04 05:15:45'),
(112, 'browse_main_categories', 'main_categories', '2019-10-04 05:56:56', '2019-10-04 05:56:56'),
(113, 'read_main_categories', 'main_categories', '2019-10-04 05:56:56', '2019-10-04 05:56:56'),
(114, 'edit_main_categories', 'main_categories', '2019-10-04 05:56:56', '2019-10-04 05:56:56'),
(115, 'add_main_categories', 'main_categories', '2019-10-04 05:56:56', '2019-10-04 05:56:56'),
(116, 'delete_main_categories', 'main_categories', '2019-10-04 05:56:56', '2019-10-04 05:56:56'),
(117, 'browse_sub_categories', 'sub_categories', '2019-10-04 05:57:25', '2019-10-04 05:57:25'),
(118, 'read_sub_categories', 'sub_categories', '2019-10-04 05:57:25', '2019-10-04 05:57:25'),
(119, 'edit_sub_categories', 'sub_categories', '2019-10-04 05:57:25', '2019-10-04 05:57:25'),
(120, 'add_sub_categories', 'sub_categories', '2019-10-04 05:57:25', '2019-10-04 05:57:25'),
(121, 'delete_sub_categories', 'sub_categories', '2019-10-04 05:57:25', '2019-10-04 05:57:25'),
(122, 'browse_categories', 'categories', '2019-10-04 05:58:45', '2019-10-04 05:58:45'),
(123, 'read_categories', 'categories', '2019-10-04 05:58:45', '2019-10-04 05:58:45'),
(124, 'edit_categories', 'categories', '2019-10-04 05:58:45', '2019-10-04 05:58:45'),
(125, 'add_categories', 'categories', '2019-10-04 05:58:45', '2019-10-04 05:58:45'),
(126, 'delete_categories', 'categories', '2019-10-04 05:58:45', '2019-10-04 05:58:45'),
(127, 'browse_services', 'services', '2019-10-04 07:58:33', '2019-10-04 07:58:33'),
(128, 'read_services', 'services', '2019-10-04 07:58:33', '2019-10-04 07:58:33'),
(129, 'edit_services', 'services', '2019-10-04 07:58:33', '2019-10-04 07:58:33'),
(130, 'add_services', 'services', '2019-10-04 07:58:33', '2019-10-04 07:58:33'),
(131, 'delete_services', 'services', '2019-10-04 07:58:33', '2019-10-04 07:58:33'),
(132, 'browse_attributes', 'attributes', '2020-02-26 09:06:37', '2020-02-26 09:06:37'),
(133, 'read_attributes', 'attributes', '2020-02-26 09:06:37', '2020-02-26 09:06:37'),
(134, 'edit_attributes', 'attributes', '2020-02-26 09:06:37', '2020-02-26 09:06:37'),
(135, 'add_attributes', 'attributes', '2020-02-26 09:06:37', '2020-02-26 09:06:37'),
(136, 'delete_attributes', 'attributes', '2020-02-26 09:06:37', '2020-02-26 09:06:37'),
(137, 'browse_attribute_values', 'attribute_values', '2020-02-26 09:16:04', '2020-02-26 09:16:04'),
(138, 'read_attribute_values', 'attribute_values', '2020-02-26 09:16:04', '2020-02-26 09:16:04'),
(139, 'edit_attribute_values', 'attribute_values', '2020-02-26 09:16:04', '2020-02-26 09:16:04'),
(140, 'add_attribute_values', 'attribute_values', '2020-02-26 09:16:04', '2020-02-26 09:16:04'),
(141, 'delete_attribute_values', 'attribute_values', '2020-02-26 09:16:04', '2020-02-26 09:16:04'),
(142, 'browse_sliders', 'sliders', '2020-04-10 05:39:42', '2020-04-10 05:39:42'),
(143, 'read_sliders', 'sliders', '2020-04-10 05:39:42', '2020-04-10 05:39:42'),
(144, 'edit_sliders', 'sliders', '2020-04-10 05:39:42', '2020-04-10 05:39:42'),
(145, 'add_sliders', 'sliders', '2020-04-10 05:39:42', '2020-04-10 05:39:42'),
(146, 'delete_sliders', 'sliders', '2020-04-10 05:39:42', '2020-04-10 05:39:42'),
(147, 'browse_notifications', 'notifications', '2020-05-30 22:54:26', '2020-05-30 22:54:26'),
(148, 'read_notifications', 'notifications', '2020-05-30 22:54:26', '2020-05-30 22:54:26'),
(149, 'edit_notifications', 'notifications', '2020-05-30 22:54:26', '2020-05-30 22:54:26'),
(150, 'add_notifications', 'notifications', '2020-05-30 22:54:26', '2020-05-30 22:54:26'),
(151, 'delete_notifications', 'notifications', '2020-05-30 22:54:26', '2020-05-30 22:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(4, 3),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(13, 3),
(14, 1),
(14, 3),
(15, 1),
(15, 3),
(16, 1),
(16, 3),
(17, 1),
(17, 3),
(18, 1),
(18, 3),
(19, 1),
(19, 3),
(20, 1),
(20, 3),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 3),
(25, 1),
(25, 3),
(41, 1),
(42, 1),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(45, 1),
(45, 3),
(46, 1),
(46, 3),
(47, 1),
(47, 3),
(48, 1),
(48, 3),
(49, 1),
(49, 3),
(50, 1),
(50, 3),
(51, 1),
(51, 3),
(77, 1),
(77, 3),
(78, 1),
(78, 3),
(79, 1),
(79, 3),
(80, 1),
(80, 3),
(81, 1),
(81, 3),
(82, 1),
(82, 3),
(83, 1),
(83, 3),
(84, 1),
(84, 3),
(85, 1),
(85, 3),
(86, 1),
(86, 3),
(87, 1),
(87, 3),
(88, 1),
(88, 3),
(89, 1),
(89, 3),
(90, 1),
(90, 3),
(91, 1),
(91, 3),
(92, 1),
(92, 3),
(93, 1),
(93, 3),
(94, 1),
(94, 3),
(95, 1),
(95, 3),
(96, 1),
(96, 3),
(97, 1),
(97, 3),
(98, 1),
(98, 3),
(99, 1),
(99, 3),
(100, 1),
(100, 3),
(101, 1),
(101, 3),
(102, 1),
(102, 3),
(103, 1),
(103, 3),
(104, 1),
(104, 3),
(105, 1),
(105, 3),
(106, 1),
(106, 3),
(112, 1),
(112, 3),
(113, 1),
(113, 3),
(114, 1),
(114, 3),
(115, 1),
(115, 3),
(116, 1),
(116, 3),
(117, 1),
(117, 3),
(118, 1),
(118, 3),
(119, 1),
(119, 3),
(120, 1),
(120, 3),
(121, 1),
(121, 3),
(122, 1),
(122, 3),
(123, 1),
(123, 3),
(124, 1),
(124, 3),
(125, 1),
(125, 3),
(126, 1),
(126, 3),
(127, 1),
(127, 3),
(128, 1),
(128, 3),
(129, 1),
(129, 3),
(130, 1),
(130, 3),
(131, 1),
(131, 3),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sale_price` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `images` longtext COLLATE utf8mb4_unicode_ci,
  `used` tinyint(4) DEFAULT NULL,
  `tag_name` int(11) DEFAULT NULL,
  `zone_id` int(11) UNSIGNED DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `user_id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`, `sale_price`, `status`, `images`, `used`, `tag_name`, `zone_id`, `tag_id`) VALUES
(1001, 6, 1, 'Samsung Galaxy A80 Dual SIM - 128GB, 8GB RAM, 4G \r\n', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image1216551.png', '2020-06-12 04:48:55', '2020-06-12 04:48:55', 77, NULL, '[\"products\\/product_image1316752.png\",\"products\\/product_image1519232.png\"]', NULL, NULL, 1, 1),
(1008, 1, 1, 'Samsung Galaxy A80 Dual SIM - 128GB, 8GB RAM, 4G LTE, Ghost White', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image1318649.png', '2020-06-12 04:50:46', '2020-06-12 04:50:46', 77, NULL, '[\"products\\/product_image319834.png\",\"products\\/product_image118933.png\"]', NULL, NULL, 1, 1),
(1009, 1, 1, 'Samsung Galaxy S20 Plus Dual SIM - 128GB, 8GB RAM, 4G LTE - Black', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image1017553.png', '2020-06-12 04:52:31', '2020-06-12 04:52:31', 77, NULL, '[\"products\\/product_image1516633.png\",\"products\\/product_image118028.png\"]', NULL, NULL, 1, 1),
(1010, 1, 1, 'Apple Iphone XS With Facetime - 64 GB, 4G LTE, Silver, 4 GB Ram, Single Sim & E-Sim', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image616754.png', '2020-06-12 04:54:35', '2020-06-12 04:54:35', 77, NULL, '[\"products\\/product_image517642.png\",\"products\\/product_image518055.png\"]', NULL, NULL, 1, 1),
(1011, 1, 1, 'Xiaomi Mi 8 Lite Dual SIM - 64GB, 4GB RAM, 4G LTE, Black', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image519850.png', '2020-06-12 05:14:36', '2020-06-12 05:14:36', 77, NULL, '[\"products\\/product_image615545.png\",\"products\\/product_image1216937.png\"]', NULL, NULL, 1, 2),
(1012, 1, 1, 'Xiaomi Mi Note 10 Lite Dual SIM Mobile - 6.47 Inch, 128 GB, 8 GB RAM, 4G LTE - Midnight Black', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image1517551.png', '2020-06-12 05:16:44', '2020-06-12 05:16:44', 77, NULL, '[\"products\\/product_image716342.png\",\"products\\/product_image1115642.png\"]', NULL, NULL, 1, 2),
(1013, 1, 1, 'Xiaomi Pocophone F1 Dual Sim - 128 GB, 6 GB Ram, 4G LTE, Graphite Black‚International Version, Poco F1', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image615540.png', '2020-06-12 05:18:20', '2020-06-12 05:18:20', 77, NULL, '[\"products\\/product_image715838.png\"]', NULL, NULL, NULL, 2),
(1014, 1, 1, 'Apple Iphone 6S Plus With Facetime - 32 GB, 4G LTE, Space Grey, 2 GB Ram', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image1317651.png', '2020-06-12 05:19:09', '2020-06-12 05:19:09', 77, NULL, '[\"products\\/product_image716731.png\"]', NULL, NULL, NULL, 2),
(1015, 1, 1, 'Samsung Galaxy A30 Dual Sim - 64 GB, 4 GB Ram, 4G LTE, White', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image819952.png', '2020-06-12 05:20:43', '2020-06-12 05:20:43', 77, NULL, '[\"products\\/product_image319140.png\"]', NULL, NULL, NULL, 3),
(1016, 1, 1, 'Honor 20 YAL-L21 Dual SIM Mobile - 6.26 Inch, 128 GB, 6 GB RAM, 4G LTE - Icelandic White', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image819748.png', '2020-06-12 05:21:14', '2020-06-12 05:21:14', 77, NULL, '[\"products\\/product_image1216749.png\"]', NULL, NULL, NULL, 3),
(1017, 1, 1, 'Huawei P9 - 32GB, 4G LTE, Mystic Silver', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image1318544.png', '2020-06-12 05:22:07', '2020-06-12 05:22:07', 77, NULL, '[\"products\\/product_image1018754.png\"]', NULL, NULL, NULL, 3),
(1018, 1, 1, 'OPPO Reno 3 Dual SIM - 128GB, 8GB RAM, 4G LTE - Midnight Black', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image1316247.png', '2020-06-12 05:23:13', '2020-06-12 05:23:13', 77, NULL, '[\"products\\/product_image1420032.png\"]', NULL, NULL, NULL, 3),
(1019, 1, 1, 'Samsung Galaxy A71 Dual SIM - 128GB, 8GB RAM, 4G LTE, Blue', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image416735.png', '2020-06-12 05:23:43', '2020-06-12 05:23:43', 77, NULL, '[\"products\\/product_image516331.png\"]', NULL, NULL, NULL, 4),
(1020, 1, 1, 'Huawei P40 Pro Dual SIM Mobile - 6.58 Inch, 256 GB, 8 GB RAM, 4G LTE - Black', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image1216843.png', '2020-06-12 05:35:08', '2020-06-12 05:35:08', 77, NULL, '[\"products\\/product_image1117434.png\"]', NULL, NULL, NULL, 4),
(1021, 1, 1, 'Huawei P30 Lite Dual Sim - 128 GB, 6 GB Ram, 4G LTE, Peacock Blue, Mar-Lx1A', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image1018654.png', '2020-06-12 05:35:40', '2020-06-12 05:35:40', 77, NULL, '[\"products\\/product_image615831.png\"]', NULL, NULL, NULL, 4),
(1022, 1, 1, 'Huawei Nova 5T Dual SIM - 128GB, 8GB RAM, 4G LTE, Purple', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', 99, 'products/product_image519229.png', '2020-06-12 05:36:41', '2020-06-12 05:36:41', 77, NULL, '[\"products\\/product_image519438.png\"]', NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `value_id` int(11) DEFAULT NULL,
  `attribute_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `value_id`, `attribute_id`, `created_at`, `updated_at`) VALUES
(23, 57, 1, 1, '2020-02-29 13:32:59', '2020-02-29 13:32:59'),
(24, 57, 2, 1, '2020-02-29 13:32:59', '2020-02-29 13:32:59'),
(25, 57, 3, 2, '2020-02-29 13:32:59', '2020-02-29 13:32:59'),
(26, 58, 1, 1, '2020-02-29 19:47:48', '2020-02-29 19:47:48'),
(27, 58, 2, 1, '2020-02-29 19:47:48', '2020-02-29 19:47:48'),
(28, 59, 1, 1, '2020-03-01 15:15:45', '2020-03-01 15:15:45'),
(29, 59, 2, 1, '2020-03-01 15:15:45', '2020-03-01 15:15:45'),
(30, 60, 1, 1, '2020-04-10 11:02:00', '2020-04-10 11:02:00'),
(31, 1, 1, 1, '2020-04-13 02:22:38', '2020-04-13 02:22:38'),
(32, 4, 1, 1, '2020-04-16 14:32:49', '2020-04-16 14:32:49'),
(33, 5, 1, 1, '2020-04-16 14:33:24', '2020-04-16 14:33:24'),
(34, 6, 1, 1, '2020-04-16 14:33:49', '2020-04-16 14:33:49'),
(35, 8, 1, 1, '2020-04-16 14:39:00', '2020-04-16 14:39:00'),
(36, 9, 1, 1, '2020-04-16 14:39:20', '2020-04-16 14:39:20'),
(37, 11, 1, 1, '2020-04-16 14:53:36', '2020-04-16 14:53:36'),
(38, 14, 1, 1, '2020-04-16 14:56:02', '2020-04-16 14:56:02'),
(39, 15, 1, 1, '2020-04-16 16:22:37', '2020-04-16 16:22:37'),
(40, 16, 1, 1, '2020-04-16 19:19:09', '2020-04-16 19:19:09'),
(41, 17, 1, 1, '2020-04-16 22:35:50', '2020-04-16 22:35:50'),
(42, 18, 1, 1, '2020-04-16 22:37:24', '2020-04-16 22:37:24'),
(43, 19, 1, 1, '2020-04-18 21:36:44', '2020-04-18 21:36:44'),
(44, 23, 1, 1, '2020-04-18 22:27:20', '2020-04-18 22:27:20'),
(45, 24, 1, 1, '2020-04-18 22:27:59', '2020-04-18 22:27:59'),
(46, 25, 1, 1, '2020-04-18 22:28:16', '2020-04-18 22:28:16'),
(47, 26, 1, 1, '2020-04-18 22:28:58', '2020-04-18 22:28:58'),
(48, 31, 1, 1, '2020-04-18 22:55:48', '2020-04-18 22:55:48'),
(49, 32, 1, 1, '2020-04-18 22:56:50', '2020-04-18 22:56:50'),
(50, 33, 1, 1, '2020-04-18 22:57:39', '2020-04-18 22:57:39'),
(51, 34, 1, 1, '2020-04-18 22:58:33', '2020-04-18 22:58:33'),
(52, 35, 1, 1, '2020-04-18 22:59:37', '2020-04-18 22:59:37'),
(53, 36, 1, 1, '2020-04-18 22:59:44', '2020-04-18 22:59:44'),
(54, 40, 1, 1, '2020-04-19 00:14:01', '2020-04-19 00:14:01'),
(55, 41, 1, 1, '2020-04-19 00:17:15', '2020-04-19 00:17:15'),
(56, 42, 1, 1, '2020-04-19 00:17:27', '2020-04-19 00:17:27'),
(57, 45, 1, 1, '2020-04-19 00:26:57', '2020-04-19 00:26:57'),
(58, 52, 1, 1, '2020-04-19 00:49:51', '2020-04-19 00:49:51'),
(59, 64, 1, 1, '2020-04-19 00:54:33', '2020-04-19 00:54:33'),
(60, 75, 1, 1, '2020-04-19 02:04:04', '2020-04-19 02:04:04'),
(61, 76, 1, 1, '2020-04-19 02:11:28', '2020-04-19 02:11:28'),
(62, 84, 1, 1, '2020-04-19 03:49:04', '2020-04-19 03:49:04'),
(63, 87, 2, 1, '2020-04-19 04:47:55', '2020-04-19 04:47:55'),
(64, 88, 2, 1, '2020-04-19 04:54:47', '2020-04-19 04:54:47'),
(65, 89, 2, 1, '2020-04-19 04:55:14', '2020-04-19 04:55:14'),
(66, 90, 1, 1, '2020-04-19 05:18:08', '2020-04-19 05:18:08'),
(67, 90, 1, 1, '2020-04-19 05:18:08', '2020-04-19 05:18:08'),
(68, 91, 1, 1, '2020-04-19 05:22:13', '2020-04-19 05:22:13'),
(69, 92, 1, 1, '2020-04-19 05:24:53', '2020-04-19 05:24:53'),
(70, 93, 1, 1, '2020-04-19 05:29:45', '2020-04-19 05:29:45'),
(71, 95, 1, 1, '2020-04-19 06:06:41', '2020-04-19 06:06:41'),
(72, 96, 1, 1, '2020-04-19 06:08:05', '2020-04-19 06:08:05'),
(73, 97, 1, 1, '2020-04-19 06:10:53', '2020-04-19 06:10:53'),
(74, 98, 1, 1, '2020-04-19 06:12:38', '2020-04-19 06:12:38'),
(75, 99, 1, 1, '2020-04-19 06:14:24', '2020-04-19 06:14:24'),
(76, 100, 1, 1, '2020-04-19 06:18:25', '2020-04-19 06:18:25'),
(77, 101, 1, 1, '2020-04-20 02:29:49', '2020-04-20 02:29:49'),
(78, 102, 1, 1, '2020-04-20 02:30:22', '2020-04-20 02:30:22'),
(79, 103, 1, 1, '2020-04-20 02:33:16', '2020-04-20 02:33:16'),
(80, 104, 2, 1, '2020-04-20 02:33:55', '2020-04-20 02:33:55'),
(81, 104, 2, 1, '2020-04-20 02:33:55', '2020-04-20 02:33:55'),
(82, 105, 1, 1, '2020-04-20 02:38:05', '2020-04-20 02:38:05'),
(83, 106, 2, 1, '2020-04-20 02:44:22', '2020-04-20 02:44:22'),
(84, 106, 2, 1, '2020-04-20 02:44:22', '2020-04-20 02:44:22'),
(85, 107, 1, 1, '2020-04-20 02:53:25', '2020-04-20 02:53:25'),
(86, 111, 1, 1, '2020-04-20 03:34:44', '2020-04-20 03:34:44'),
(87, 112, 1, 1, '2020-04-20 03:45:22', '2020-04-20 03:45:22'),
(88, 113, 1, 1, '2020-04-20 03:51:58', '2020-04-20 03:51:58'),
(89, 114, 1, 1, '2020-04-20 03:53:00', '2020-04-20 03:53:00'),
(90, 115, 1, 1, '2020-04-20 03:54:36', '2020-04-20 03:54:36'),
(91, 116, 1, 1, '2020-04-20 04:01:53', '2020-04-20 04:01:53'),
(92, 121, 1, 1, '2020-04-20 04:51:11', '2020-04-20 04:51:11'),
(93, 122, 1, 1, '2020-04-20 04:55:36', '2020-04-20 04:55:36'),
(94, 122, 2, 1, '2020-04-20 04:55:36', '2020-04-20 04:55:36'),
(95, 123, 1, 1, '2020-04-20 04:56:15', '2020-04-20 04:56:15'),
(96, 123, 2, 1, '2020-04-20 04:56:15', '2020-04-20 04:56:15'),
(97, 124, 1, 1, '2020-04-20 05:05:47', '2020-04-20 05:05:47'),
(98, 125, 1, 1, '2020-04-20 05:39:00', '2020-04-20 05:39:00'),
(99, 126, 1, 1, '2020-04-20 05:43:42', '2020-04-20 05:43:42'),
(100, 126, 4, 1, '2020-04-20 05:43:42', '2020-04-20 05:43:42'),
(101, 126, 2, 1, '2020-04-20 05:43:42', '2020-04-20 05:43:42'),
(102, 131, 1, 1, '2020-04-21 08:12:52', '2020-04-21 08:12:52'),
(103, 132, 1, 1, '2020-04-21 08:12:53', '2020-04-21 08:12:53'),
(104, 133, 1, 1, '2020-04-21 08:12:54', '2020-04-21 08:12:54'),
(105, 134, 1, 1, '2020-04-21 08:12:55', '2020-04-21 08:12:55'),
(106, 135, 1, 1, '2020-04-21 08:12:56', '2020-04-21 08:12:56'),
(107, 136, 1, 1, '2020-04-21 08:12:57', '2020-04-21 08:12:57'),
(108, 137, 1, 1, '2020-04-21 08:12:58', '2020-04-21 08:12:58'),
(109, 138, 1, 1, '2020-04-21 08:12:59', '2020-04-21 08:12:59'),
(110, 139, 1, 1, '2020-04-21 08:12:59', '2020-04-21 08:12:59'),
(111, 140, 1, 1, '2020-04-21 08:13:00', '2020-04-21 08:13:00'),
(112, 141, 1, 1, '2020-04-21 08:13:01', '2020-04-21 08:13:01'),
(113, 142, 1, 1, '2020-04-21 08:13:02', '2020-04-21 08:13:02'),
(114, 143, 1, 1, '2020-04-21 08:13:03', '2020-04-21 08:13:03'),
(115, 144, 1, 1, '2020-04-21 08:13:04', '2020-04-21 08:13:04'),
(116, 145, 1, 1, '2020-04-21 08:13:05', '2020-04-21 08:13:05'),
(117, 146, 1, 1, '2020-04-21 08:13:05', '2020-04-21 08:13:05'),
(118, 147, 1, 1, '2020-04-21 08:13:06', '2020-04-21 08:13:06'),
(119, 148, 1, 1, '2020-04-21 08:13:07', '2020-04-21 08:13:07'),
(120, 149, 1, 1, '2020-04-21 08:13:07', '2020-04-21 08:13:07'),
(121, 150, 1, 1, '2020-04-21 08:13:08', '2020-04-21 08:13:08'),
(122, 151, 1, 1, '2020-04-21 08:13:09', '2020-04-21 08:13:09'),
(123, 152, 1, 1, '2020-04-21 08:13:10', '2020-04-21 08:13:10'),
(124, 153, 1, 1, '2020-04-21 08:13:10', '2020-04-21 08:13:10'),
(125, 154, 1, 1, '2020-04-21 08:13:11', '2020-04-21 08:13:11'),
(126, 155, 1, 1, '2020-04-21 08:13:12', '2020-04-21 08:13:12'),
(127, 156, 1, 1, '2020-04-21 08:13:13', '2020-04-21 08:13:13'),
(128, 157, 1, 1, '2020-04-21 08:13:14', '2020-04-21 08:13:14'),
(129, 158, 1, 1, '2020-04-21 08:13:15', '2020-04-21 08:13:15'),
(130, 159, 1, 1, '2020-04-21 08:13:16', '2020-04-21 08:13:16'),
(131, 160, 1, 1, '2020-04-21 08:13:17', '2020-04-21 08:13:17'),
(132, 161, 1, 1, '2020-04-21 08:13:18', '2020-04-21 08:13:18'),
(133, 162, 1, 1, '2020-04-21 08:13:19', '2020-04-21 08:13:19'),
(134, 163, 1, 1, '2020-04-21 08:13:19', '2020-04-21 08:13:19'),
(135, 164, 1, 1, '2020-04-21 08:13:20', '2020-04-21 08:13:20'),
(136, 165, 1, 1, '2020-04-21 08:13:21', '2020-04-21 08:13:21'),
(137, 166, 1, 1, '2020-04-21 08:13:21', '2020-04-21 08:13:21'),
(138, 167, 1, 1, '2020-04-21 08:13:22', '2020-04-21 08:13:22'),
(139, 168, 1, 1, '2020-04-21 08:13:23', '2020-04-21 08:13:23'),
(140, 169, 1, 1, '2020-04-21 08:13:24', '2020-04-21 08:13:24'),
(141, 170, 1, 1, '2020-04-21 08:13:25', '2020-04-21 08:13:25'),
(142, 171, 1, 1, '2020-04-21 08:13:25', '2020-04-21 08:13:25'),
(143, 172, 1, 1, '2020-04-21 08:13:26', '2020-04-21 08:13:26'),
(144, 173, 1, 1, '2020-04-21 08:13:27', '2020-04-21 08:13:27'),
(145, 174, 2, 1, '2020-04-23 04:34:12', '2020-04-23 04:34:12'),
(146, 174, 2, 1, '2020-04-23 04:34:12', '2020-04-23 04:34:12'),
(147, 174, 1, 1, '2020-04-23 04:34:12', '2020-04-23 04:34:12'),
(148, 174, 2, 1, '2020-04-23 04:34:12', '2020-04-23 04:34:12'),
(149, 1003, 1, 1, '2020-06-12 04:34:36', '2020-06-12 04:34:36'),
(150, 1004, 1, 1, '2020-06-12 04:40:09', '2020-06-12 04:40:09'),
(151, 1005, 1, 1, '2020-06-12 04:45:47', '2020-06-12 04:45:47'),
(152, 1006, 1, 1, '2020-06-12 04:46:25', '2020-06-12 04:46:25'),
(153, 1007, 1, 1, '2020-06-12 04:48:55', '2020-06-12 04:48:55'),
(154, 1008, 1, 1, '2020-06-12 04:50:46', '2020-06-12 04:50:46'),
(155, 1009, 1, 1, '2020-06-12 04:52:31', '2020-06-12 04:52:31'),
(156, 1010, 1, 1, '2020-06-12 04:54:35', '2020-06-12 04:54:35'),
(157, 1011, 1, 1, '2020-06-12 05:14:36', '2020-06-12 05:14:36'),
(158, 1012, 1, 1, '2020-06-12 05:16:44', '2020-06-12 05:16:44'),
(159, 1013, 1, 1, '2020-06-12 05:18:20', '2020-06-12 05:18:20'),
(160, 1014, 1, 1, '2020-06-12 05:19:09', '2020-06-12 05:19:09'),
(161, 1015, 1, 1, '2020-06-12 05:20:43', '2020-06-12 05:20:43'),
(162, 1016, 1, 1, '2020-06-12 05:21:14', '2020-06-12 05:21:14'),
(163, 1017, 1, 1, '2020-06-12 05:22:07', '2020-06-12 05:22:07'),
(164, 1018, 1, 1, '2020-06-12 05:23:13', '2020-06-12 05:23:13'),
(165, 1019, 1, 1, '2020-06-12 05:23:43', '2020-06-12 05:23:43'),
(166, 1020, 1, 1, '2020-06-12 05:35:08', '2020-06-12 05:35:08'),
(167, 1021, 1, 1, '2020-06-12 05:35:40', '2020-06-12 05:35:40'),
(168, 1022, 1, 1, '2020-06-12 05:36:41', '2020-06-12 05:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_values`
--

CREATE TABLE `product_attribute_values` (
  `product_attribute_id` int(11) NOT NULL,
  `attribute_value_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(52, 1),
(52, 2),
(53, 1),
(53, 2),
(54, 1),
(54, 2),
(55, 1),
(55, 2),
(56, 1),
(56, 2),
(57, 1),
(57, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE `product_prices` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_from` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity_to` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_prices`
--

INSERT INTO `product_prices` (`id`, `product_id`, `quantity_from`, `price`, `created_at`, `updated_at`, `quantity_to`) VALUES
(1, 29, '10', '1', '2020-02-26 13:24:49', '2020-02-26 13:24:49', ''),
(2, 29, '90', '10', '2020-02-26 13:24:49', '2020-02-26 13:24:49', ''),
(3, 30, '10', '1', '2020-02-28 21:28:47', '2020-02-28 21:28:47', ''),
(4, 30, '90', '10', '2020-02-28 21:28:47', '2020-02-28 21:28:47', ''),
(5, 31, '10', '1', '2020-02-28 21:29:19', '2020-02-28 21:29:19', ''),
(6, 31, '90', '10', '2020-02-28 21:29:19', '2020-02-28 21:29:19', ''),
(7, 32, '10', '1', '2020-02-28 21:32:19', '2020-02-28 21:32:19', ''),
(8, 32, '90', '10', '2020-02-28 21:32:19', '2020-02-28 21:32:19', ''),
(9, 33, '10', '1', '2020-02-28 21:32:51', '2020-02-28 21:32:51', ''),
(10, 33, '90', '10', '2020-02-28 21:32:51', '2020-02-28 21:32:51', ''),
(11, 34, '10', '1', '2020-02-28 21:33:12', '2020-02-28 21:33:12', ''),
(12, 34, '90', '10', '2020-02-28 21:33:12', '2020-02-28 21:33:12', ''),
(13, 35, '10', '1', '2020-02-28 21:33:57', '2020-02-28 21:33:57', ''),
(14, 35, '90', '10', '2020-02-28 21:33:57', '2020-02-28 21:33:57', ''),
(15, 36, '10', '1', '2020-02-28 21:34:07', '2020-02-28 21:34:07', ''),
(16, 36, '90', '10', '2020-02-28 21:34:07', '2020-02-28 21:34:07', ''),
(17, 37, '10', '1', '2020-02-28 21:46:50', '2020-02-28 21:46:50', ''),
(18, 37, '90', '10', '2020-02-28 21:46:50', '2020-02-28 21:46:50', ''),
(19, 38, '10', '1', '2020-02-28 21:47:06', '2020-02-28 21:47:06', ''),
(20, 38, '90', '10', '2020-02-28 21:47:06', '2020-02-28 21:47:06', ''),
(21, 39, '10', '1', '2020-02-28 21:47:36', '2020-02-28 21:47:36', ''),
(22, 39, '90', '10', '2020-02-28 21:47:36', '2020-02-28 21:47:36', ''),
(23, 40, '10', '1', '2020-02-28 21:47:43', '2020-02-28 21:47:43', ''),
(24, 40, '90', '10', '2020-02-28 21:47:43', '2020-02-28 21:47:43', ''),
(25, 41, '10', '1', '2020-02-28 21:48:09', '2020-02-28 21:48:09', ''),
(26, 41, '90', '10', '2020-02-28 21:48:09', '2020-02-28 21:48:09', ''),
(27, 42, '10', '1', '2020-02-28 21:48:26', '2020-02-28 21:48:26', ''),
(28, 42, '90', '10', '2020-02-28 21:48:26', '2020-02-28 21:48:26', ''),
(29, 43, '10', '1', '2020-02-28 21:48:42', '2020-02-28 21:48:42', ''),
(30, 43, '90', '10', '2020-02-28 21:48:42', '2020-02-28 21:48:42', ''),
(31, 44, '10', '1', '2020-02-28 21:48:51', '2020-02-28 21:48:51', ''),
(32, 44, '90', '10', '2020-02-28 21:48:51', '2020-02-28 21:48:51', ''),
(33, 45, '10', '1', '2020-02-28 21:49:40', '2020-02-28 21:49:40', ''),
(34, 45, '90', '10', '2020-02-28 21:49:40', '2020-02-28 21:49:40', ''),
(35, 46, '10', '1', '2020-02-28 21:50:04', '2020-02-28 21:50:04', ''),
(36, 46, '90', '10', '2020-02-28 21:50:04', '2020-02-28 21:50:04', ''),
(37, 47, '10', '1', '2020-02-28 21:50:58', '2020-02-28 21:50:58', ''),
(38, 47, '90', '10', '2020-02-28 21:50:58', '2020-02-28 21:50:58', ''),
(39, 48, '10', '1', '2020-02-28 21:51:33', '2020-02-28 21:51:33', ''),
(40, 48, '90', '10', '2020-02-28 21:51:33', '2020-02-28 21:51:33', ''),
(41, 49, '10', '1', '2020-02-28 21:53:32', '2020-02-28 21:53:32', ''),
(42, 49, '90', '10', '2020-02-28 21:53:32', '2020-02-28 21:53:32', ''),
(43, 50, '10', '1', '2020-02-28 21:54:00', '2020-02-28 21:54:00', ''),
(44, 50, '90', '10', '2020-02-28 21:54:00', '2020-02-28 21:54:00', ''),
(45, 51, '10', '1', '2020-02-28 23:19:35', '2020-02-28 23:19:35', ''),
(46, 51, '90', '10', '2020-02-28 23:19:35', '2020-02-28 23:19:35', ''),
(47, 52, '10', '1', '2020-02-28 23:20:04', '2020-02-28 23:20:04', ''),
(48, 52, '90', '10', '2020-02-28 23:20:04', '2020-02-28 23:20:04', ''),
(49, 53, '10', '1', '2020-02-28 23:20:29', '2020-02-28 23:20:29', ''),
(50, 53, '90', '10', '2020-02-28 23:20:29', '2020-02-28 23:20:29', ''),
(51, 54, '10', '1', '2020-02-28 23:20:48', '2020-02-28 23:20:48', ''),
(52, 54, '90', '10', '2020-02-28 23:20:48', '2020-02-28 23:20:48', ''),
(53, 55, '10', '1', '2020-02-28 23:26:29', '2020-02-28 23:26:29', ''),
(54, 55, '90', '10', '2020-02-28 23:26:29', '2020-02-28 23:26:29', ''),
(55, 56, '10', '1', '2020-02-29 13:32:38', '2020-02-29 13:32:38', ''),
(56, 56, '90', '10', '2020-02-29 13:32:38', '2020-02-29 13:32:38', ''),
(57, 57, '10', '1', '2020-02-29 13:32:59', '2020-02-29 13:32:59', ''),
(58, 57, '90', '10', '2020-02-29 13:32:59', '2020-02-29 13:32:59', ''),
(59, 58, '10', '1', '2020-02-29 19:47:48', '2020-02-29 19:47:48', ''),
(60, 58, '90', '10', '2020-02-29 19:47:48', '2020-02-29 19:47:48', ''),
(61, 59, '10', '1', '2020-03-01 15:15:45', '2020-03-01 15:15:45', ''),
(62, 59, '90', '10', '2020-03-01 15:15:45', '2020-03-01 15:15:45', ''),
(63, 60, '10', '1', '2020-04-10 11:02:00', '2020-04-10 11:02:00', ''),
(64, 60, '90', '10', '2020-04-10 11:02:00', '2020-04-10 11:02:00', ''),
(65, 1, '10', '1', '2020-04-13 02:22:38', '2020-04-13 02:22:38', ''),
(66, 1, '90', '10', '2020-04-13 02:22:38', '2020-04-13 02:22:38', ''),
(67, 2, '10', '1', '2020-04-16 14:25:14', '2020-04-16 14:25:14', ''),
(68, 2, '90', '10', '2020-04-16 14:25:14', '2020-04-16 14:25:14', ''),
(69, 3, '10', '1', '2020-04-16 14:30:11', '2020-04-16 14:30:11', ''),
(70, 3, '90', '10', '2020-04-16 14:30:11', '2020-04-16 14:30:11', ''),
(71, 4, '10', '1', '2020-04-16 14:32:49', '2020-04-16 14:32:49', ''),
(72, 4, '90', '10', '2020-04-16 14:32:49', '2020-04-16 14:32:49', ''),
(73, 5, '10', '1', '2020-04-16 14:33:24', '2020-04-16 14:33:24', ''),
(74, 5, '90', '10', '2020-04-16 14:33:24', '2020-04-16 14:33:24', ''),
(75, 6, '10', '1', '2020-04-16 14:33:49', '2020-04-16 14:33:49', ''),
(76, 6, '90', '10', '2020-04-16 14:33:49', '2020-04-16 14:33:49', ''),
(77, 7, '10', '1', '2020-04-16 14:35:39', '2020-04-16 14:35:39', ''),
(78, 7, '90', '10', '2020-04-16 14:35:39', '2020-04-16 14:35:39', ''),
(79, 8, '10', '1', '2020-04-16 14:39:00', '2020-04-16 14:39:00', ''),
(80, 8, '90', '10', '2020-04-16 14:39:00', '2020-04-16 14:39:00', ''),
(81, 9, '10', '1', '2020-04-16 14:39:20', '2020-04-16 14:39:20', ''),
(82, 9, '90', '10', '2020-04-16 14:39:20', '2020-04-16 14:39:20', ''),
(83, 10, '10', '1', '2020-04-16 14:52:46', '2020-04-16 14:52:46', ''),
(84, 10, '90', '10', '2020-04-16 14:52:46', '2020-04-16 14:52:46', ''),
(85, 11, '10', '1', '2020-04-16 14:53:36', '2020-04-16 14:53:36', ''),
(86, 11, '90', '10', '2020-04-16 14:53:36', '2020-04-16 14:53:36', ''),
(87, 12, '10', '1', '2020-04-16 14:54:19', '2020-04-16 14:54:19', ''),
(88, 12, '90', '10', '2020-04-16 14:54:19', '2020-04-16 14:54:19', ''),
(89, 13, '10', '1', '2020-04-16 14:55:26', '2020-04-16 14:55:26', ''),
(90, 13, '90', '10', '2020-04-16 14:55:26', '2020-04-16 14:55:26', ''),
(91, 14, '10', '1', '2020-04-16 14:56:02', '2020-04-16 14:56:02', ''),
(92, 14, '90', '10', '2020-04-16 14:56:02', '2020-04-16 14:56:02', ''),
(93, 15, '10', '1', '2020-04-16 16:22:37', '2020-04-16 16:22:37', ''),
(94, 15, '90', '10', '2020-04-16 16:22:37', '2020-04-16 16:22:37', ''),
(95, 16, '10', '1', '2020-04-16 19:19:09', '2020-04-16 19:19:09', ''),
(96, 16, '90', '10', '2020-04-16 19:19:09', '2020-04-16 19:19:09', ''),
(97, 17, '10', '1', '2020-04-16 22:35:50', '2020-04-16 22:35:50', ''),
(98, 17, '90', '10', '2020-04-16 22:35:50', '2020-04-16 22:35:50', ''),
(99, 18, '10', '1', '2020-04-16 22:37:24', '2020-04-16 22:37:24', ''),
(100, 18, '90', '10', '2020-04-16 22:37:24', '2020-04-16 22:37:24', ''),
(101, 19, '10', '1', '2020-04-18 21:36:44', '2020-04-18 21:36:44', ''),
(102, 19, '90', '10', '2020-04-18 21:36:44', '2020-04-18 21:36:44', ''),
(103, 20, '10', '1', '2020-04-18 22:26:18', '2020-04-18 22:26:18', ''),
(104, 20, '90', '10', '2020-04-18 22:26:18', '2020-04-18 22:26:18', ''),
(105, 21, '10', '1', '2020-04-18 22:26:52', '2020-04-18 22:26:52', ''),
(106, 21, '90', '10', '2020-04-18 22:26:52', '2020-04-18 22:26:52', ''),
(107, 22, '10', '1', '2020-04-18 22:27:01', '2020-04-18 22:27:01', ''),
(108, 22, '90', '10', '2020-04-18 22:27:01', '2020-04-18 22:27:01', ''),
(109, 23, '10', '1', '2020-04-18 22:27:20', '2020-04-18 22:27:20', ''),
(110, 23, '90', '10', '2020-04-18 22:27:20', '2020-04-18 22:27:20', ''),
(111, 24, '10', '1', '2020-04-18 22:27:59', '2020-04-18 22:27:59', ''),
(112, 24, '90', '10', '2020-04-18 22:27:59', '2020-04-18 22:27:59', ''),
(113, 25, '10', '1', '2020-04-18 22:28:16', '2020-04-18 22:28:16', ''),
(114, 25, '90', '10', '2020-04-18 22:28:16', '2020-04-18 22:28:16', ''),
(115, 26, '10', '1', '2020-04-18 22:28:58', '2020-04-18 22:28:58', ''),
(116, 26, '90', '10', '2020-04-18 22:28:58', '2020-04-18 22:28:58', ''),
(117, 31, '1', '10', '2020-04-18 22:55:48', '2020-04-18 22:55:48', '10'),
(118, 32, '1', '10', '2020-04-18 22:56:50', '2020-04-18 22:56:50', '10'),
(119, 33, '1', '10', '2020-04-18 22:57:39', '2020-04-18 22:57:39', '10'),
(120, 34, '1', '10', '2020-04-18 22:58:33', '2020-04-18 22:58:33', '10'),
(121, 35, '1', '10', '2020-04-18 22:59:37', '2020-04-18 22:59:37', '10'),
(122, 36, '1', '10', '2020-04-18 22:59:44', '2020-04-18 22:59:44', '10'),
(123, 40, '1', '10', '2020-04-19 00:14:01', '2020-04-19 00:14:01', '10'),
(124, 41, '1', '10', '2020-04-19 00:17:15', '2020-04-19 00:17:15', '10'),
(125, 42, '1', '10', '2020-04-19 00:17:27', '2020-04-19 00:17:27', '10'),
(126, 45, '1', '10', '2020-04-19 00:26:57', '2020-04-19 00:26:57', '10'),
(127, 52, '1', '10', '2020-04-19 00:49:51', '2020-04-19 00:49:51', '10'),
(128, 53, '1', '10', '2020-04-19 00:51:11', '2020-04-19 00:51:11', '10'),
(129, 54, '1', '10', '2020-04-19 00:51:29', '2020-04-19 00:51:29', '10'),
(130, 55, '1', '10', '2020-04-19 00:51:44', '2020-04-19 00:51:44', '10'),
(131, 56, '1', '10', '2020-04-19 00:52:27', '2020-04-19 00:52:27', '10'),
(132, 57, '1', '10', '2020-04-19 00:52:39', '2020-04-19 00:52:39', '10'),
(133, 58, '1', '10', '2020-04-19 00:52:41', '2020-04-19 00:52:41', '10'),
(134, 59, '1', '10', '2020-04-19 00:52:43', '2020-04-19 00:52:43', '10'),
(135, 60, '1', '10', '2020-04-19 00:53:04', '2020-04-19 00:53:04', '10'),
(136, 61, '1', '10', '2020-04-19 00:53:23', '2020-04-19 00:53:23', '10'),
(137, 62, '1', '10', '2020-04-19 00:54:17', '2020-04-19 00:54:17', '10'),
(138, 63, '1', '10', '2020-04-19 00:54:26', '2020-04-19 00:54:26', '10'),
(139, 64, '1', '10', '2020-04-19 00:54:33', '2020-04-19 00:54:33', '10'),
(140, 65, '1', '10', '2020-04-19 00:54:42', '2020-04-19 00:54:42', '10'),
(141, 75, '1', '10', '2020-04-19 02:04:04', '2020-04-19 02:04:04', '10'),
(142, 76, '1', '10', '2020-04-19 02:11:28', '2020-04-19 02:11:28', '10'),
(143, 84, '1', '10', '2020-04-19 03:49:04', '2020-04-19 03:49:04', '10'),
(144, 87, '65', '56', '2020-04-19 04:47:55', '2020-04-19 04:47:55', '55'),
(145, 87, '65', '56', '2020-04-19 04:47:55', '2020-04-19 04:47:55', '55'),
(146, 87, '65', '56', '2020-04-19 04:47:55', '2020-04-19 04:47:55', '55'),
(147, 87, '65', '56', '2020-04-19 04:47:55', '2020-04-19 04:47:55', '55'),
(148, 87, '65', '56', '2020-04-19 04:47:55', '2020-04-19 04:47:55', '55'),
(149, 87, '65', '56', '2020-04-19 04:47:55', '2020-04-19 04:47:55', '55'),
(150, 88, '65', '56', '2020-04-19 04:54:47', '2020-04-19 04:54:47', '55'),
(151, 88, '65', '56', '2020-04-19 04:54:47', '2020-04-19 04:54:47', '55'),
(152, 88, '65', '56', '2020-04-19 04:54:47', '2020-04-19 04:54:47', '55'),
(153, 88, '65', '56', '2020-04-19 04:54:47', '2020-04-19 04:54:47', '55'),
(154, 88, '65', '56', '2020-04-19 04:54:47', '2020-04-19 04:54:47', '55'),
(155, 88, '65', '56', '2020-04-19 04:54:47', '2020-04-19 04:54:47', '55'),
(156, 89, '65', '56', '2020-04-19 04:55:14', '2020-04-19 04:55:14', '55'),
(157, 89, '65', '56', '2020-04-19 04:55:14', '2020-04-19 04:55:14', '55'),
(158, 89, '65', '56', '2020-04-19 04:55:14', '2020-04-19 04:55:14', '55'),
(159, 89, '65', '56', '2020-04-19 04:55:14', '2020-04-19 04:55:14', '55'),
(160, 89, '65', '56', '2020-04-19 04:55:14', '2020-04-19 04:55:14', '55'),
(161, 89, '65', '56', '2020-04-19 04:55:14', '2020-04-19 04:55:14', '55'),
(162, 90, '5', '9', '2020-04-19 05:18:08', '2020-04-19 05:18:08', '6'),
(163, 90, '5', '9', '2020-04-19 05:18:08', '2020-04-19 05:18:08', '6'),
(164, 90, '5', '9', '2020-04-19 05:18:08', '2020-04-19 05:18:08', '6'),
(165, 91, '66', '88', '2020-04-19 05:22:13', '2020-04-19 05:22:13', '85'),
(166, 91, '66', '88', '2020-04-19 05:22:13', '2020-04-19 05:22:13', '85'),
(167, 91, '66', '88', '2020-04-19 05:22:13', '2020-04-19 05:22:13', '85'),
(168, 91, '66', '88', '2020-04-19 05:22:13', '2020-04-19 05:22:13', '85'),
(169, 91, '66', '88', '2020-04-19 05:22:13', '2020-04-19 05:22:13', '85'),
(170, 91, '66', '88', '2020-04-19 05:22:13', '2020-04-19 05:22:13', '85'),
(171, 92, '55', '06', '2020-04-19 05:24:53', '2020-04-19 05:24:53', '88'),
(172, 92, '55', '06', '2020-04-19 05:24:53', '2020-04-19 05:24:53', '88'),
(173, 92, '55', '06', '2020-04-19 05:24:53', '2020-04-19 05:24:53', '88'),
(174, 92, '55', '06', '2020-04-19 05:24:53', '2020-04-19 05:24:53', '88'),
(175, 92, '55', '06', '2020-04-19 05:24:53', '2020-04-19 05:24:53', '88'),
(176, 92, '55', '06', '2020-04-19 05:24:53', '2020-04-19 05:24:53', '88'),
(177, 92, '55', '06', '2020-04-19 05:24:53', '2020-04-19 05:24:53', '88'),
(178, 92, '55', '06', '2020-04-19 05:24:53', '2020-04-19 05:24:53', '88'),
(179, 93, '66', '88', '2020-04-19 05:29:45', '2020-04-19 05:29:45', '89'),
(180, 93, '66', '88', '2020-04-19 05:29:45', '2020-04-19 05:29:45', '89'),
(181, 93, '66', '88', '2020-04-19 05:29:45', '2020-04-19 05:29:45', '89'),
(182, 93, '66', '88', '2020-04-19 05:29:45', '2020-04-19 05:29:45', '89'),
(183, 93, '66', '88', '2020-04-19 05:29:45', '2020-04-19 05:29:45', '89'),
(184, 93, '66', '88', '2020-04-19 05:29:45', '2020-04-19 05:29:45', '89'),
(185, 95, '36', '36', '2020-04-19 06:06:41', '2020-04-19 06:06:41', '36'),
(186, 95, '36', '36', '2020-04-19 06:06:41', '2020-04-19 06:06:41', '36'),
(187, 95, '36', '36', '2020-04-19 06:06:41', '2020-04-19 06:06:41', '36'),
(188, 95, '36', '36', '2020-04-19 06:06:41', '2020-04-19 06:06:41', '36'),
(189, 95, '36', '36', '2020-04-19 06:06:41', '2020-04-19 06:06:41', '36'),
(190, 95, '36', '36', '2020-04-19 06:06:41', '2020-04-19 06:06:41', '36'),
(191, 96, '33', '39', '2020-04-19 06:08:05', '2020-04-19 06:08:05', '36'),
(192, 96, '33', '39', '2020-04-19 06:08:05', '2020-04-19 06:08:05', '36'),
(193, 96, '33', '39', '2020-04-19 06:08:05', '2020-04-19 06:08:05', '36'),
(194, 96, '33', '39', '2020-04-19 06:08:05', '2020-04-19 06:08:05', '36'),
(195, 96, '33', '39', '2020-04-19 06:08:05', '2020-04-19 06:08:05', '36'),
(196, 96, '33', '39', '2020-04-19 06:08:05', '2020-04-19 06:08:05', '36'),
(197, 96, '33', '39', '2020-04-19 06:08:05', '2020-04-19 06:08:05', '36'),
(198, 96, '33', '39', '2020-04-19 06:08:05', '2020-04-19 06:08:05', '36'),
(199, 96, '33', '39', '2020-04-19 06:08:05', '2020-04-19 06:08:05', '36'),
(200, 96, '33', '39', '2020-04-19 06:08:05', '2020-04-19 06:08:05', '36'),
(201, 99, '66', '99', '2020-04-19 06:14:24', '2020-04-19 06:14:24', '66'),
(202, 99, '66', '99', '2020-04-19 06:14:24', '2020-04-19 06:14:24', '66'),
(203, 100, '1', '10', '2020-04-19 06:18:25', '2020-04-19 06:18:25', '10'),
(204, 103, '6', '9', '2020-04-20 02:33:16', '2020-04-20 02:33:16', '6'),
(205, 104, '69', '66', '2020-04-20 02:33:55', '2020-04-20 02:33:55', '36'),
(206, 105, '659', '666', '2020-04-20 02:38:05', '2020-04-20 02:38:05', '66'),
(207, 106, '22', '66', '2020-04-20 02:44:22', '2020-04-20 02:44:22', '333'),
(208, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(209, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(210, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(211, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(212, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(213, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(214, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(215, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(216, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(217, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(218, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(219, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(220, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(221, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(222, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(223, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(224, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(225, 111, '222', '222', '2020-04-20 03:34:44', '2020-04-20 03:34:44', '222'),
(226, 112, '55', '55', '2020-04-20 03:45:22', '2020-04-20 03:45:22', '5'),
(227, 112, '55', '55', '2020-04-20 03:45:22', '2020-04-20 03:45:22', '55'),
(228, 113, '66', '66', '2020-04-20 03:51:58', '2020-04-20 03:51:58', '6'),
(229, 113, '66', '66', '2020-04-20 03:51:58', '2020-04-20 03:51:58', '66'),
(230, 114, '66', '66', '2020-04-20 03:53:00', '2020-04-20 03:53:00', '6'),
(231, 114, '66', '66', '2020-04-20 03:53:00', '2020-04-20 03:53:00', '66'),
(232, 115, '66', '66', '2020-04-20 03:54:36', '2020-04-20 03:54:36', '6'),
(233, 115, '66', '66', '2020-04-20 03:54:36', '2020-04-20 03:54:36', '66'),
(234, 115, '33', '33', '2020-04-20 03:54:36', '2020-04-20 03:54:36', '3'),
(235, 115, '33', '33', '2020-04-20 03:54:36', '2020-04-20 03:54:36', '33'),
(236, 116, '8888', '6', '2020-04-20 04:01:53', '2020-04-20 04:01:53', '555'),
(237, 116, '8888', '66', '2020-04-20 04:01:53', '2020-04-20 04:01:53', '555'),
(238, 118, '88', '6', '2020-04-20 04:30:00', '2020-04-20 04:30:00', '55'),
(239, 118, '88', '66', '2020-04-20 04:30:00', '2020-04-20 04:30:00', '55'),
(240, 118, '88', '666', '2020-04-20 04:30:00', '2020-04-20 04:30:00', '55'),
(241, 122, '555', '6', '2020-04-20 04:55:36', '2020-04-20 04:55:36', '666'),
(242, 123, '555', '6', '2020-04-20 04:56:15', '2020-04-20 04:56:15', '666'),
(243, 123, '55', '3', '2020-04-20 04:56:15', '2020-04-20 04:56:15', '555'),
(244, 124, '555', '6', '2020-04-20 05:05:47', '2020-04-20 05:05:47', '555'),
(245, 124, '555', '66', '2020-04-20 05:05:47', '2020-04-20 05:05:47', '555'),
(246, 124, '555', '666', '2020-04-20 05:05:47', '2020-04-20 05:05:47', '555'),
(247, 125, '66', '66', '2020-04-20 05:39:00', '2020-04-20 05:39:00', '66'),
(248, 126, '66', '66', '2020-04-20 05:43:42', '2020-04-20 05:43:42', '66'),
(249, 126, '50', '20', '2020-04-20 05:43:42', '2020-04-20 05:43:42', '200'),
(250, 126, '200', '15', '2020-04-20 05:43:42', '2020-04-20 05:43:42', '400'),
(251, 131, '10', '10', '2020-04-21 08:12:52', '2020-04-21 08:12:52', '1'),
(252, 132, '10', '10', '2020-04-21 08:12:53', '2020-04-21 08:12:53', '1'),
(253, 133, '10', '10', '2020-04-21 08:12:54', '2020-04-21 08:12:54', '1'),
(254, 134, '10', '10', '2020-04-21 08:12:55', '2020-04-21 08:12:55', '1'),
(255, 135, '10', '10', '2020-04-21 08:12:56', '2020-04-21 08:12:56', '1'),
(256, 136, '10', '10', '2020-04-21 08:12:57', '2020-04-21 08:12:57', '1'),
(257, 137, '10', '10', '2020-04-21 08:12:58', '2020-04-21 08:12:58', '1'),
(258, 138, '10', '10', '2020-04-21 08:12:59', '2020-04-21 08:12:59', '1'),
(259, 139, '10', '10', '2020-04-21 08:12:59', '2020-04-21 08:12:59', '1'),
(260, 140, '10', '10', '2020-04-21 08:13:00', '2020-04-21 08:13:00', '1'),
(261, 141, '10', '10', '2020-04-21 08:13:01', '2020-04-21 08:13:01', '1'),
(262, 142, '10', '10', '2020-04-21 08:13:02', '2020-04-21 08:13:02', '1'),
(263, 143, '10', '10', '2020-04-21 08:13:03', '2020-04-21 08:13:03', '1'),
(264, 144, '10', '10', '2020-04-21 08:13:04', '2020-04-21 08:13:04', '1'),
(265, 145, '10', '10', '2020-04-21 08:13:05', '2020-04-21 08:13:05', '1'),
(266, 146, '10', '10', '2020-04-21 08:13:05', '2020-04-21 08:13:05', '1'),
(267, 147, '10', '10', '2020-04-21 08:13:06', '2020-04-21 08:13:06', '1'),
(268, 148, '10', '10', '2020-04-21 08:13:07', '2020-04-21 08:13:07', '1'),
(269, 149, '10', '10', '2020-04-21 08:13:07', '2020-04-21 08:13:07', '1'),
(270, 150, '10', '10', '2020-04-21 08:13:08', '2020-04-21 08:13:08', '1'),
(271, 151, '10', '10', '2020-04-21 08:13:09', '2020-04-21 08:13:09', '1'),
(272, 152, '10', '10', '2020-04-21 08:13:10', '2020-04-21 08:13:10', '1'),
(273, 153, '10', '10', '2020-04-21 08:13:10', '2020-04-21 08:13:10', '1'),
(274, 154, '10', '10', '2020-04-21 08:13:11', '2020-04-21 08:13:11', '1'),
(275, 155, '10', '10', '2020-04-21 08:13:12', '2020-04-21 08:13:12', '1'),
(276, 156, '10', '10', '2020-04-21 08:13:13', '2020-04-21 08:13:13', '1'),
(277, 157, '10', '10', '2020-04-21 08:13:14', '2020-04-21 08:13:14', '1'),
(278, 158, '10', '10', '2020-04-21 08:13:15', '2020-04-21 08:13:15', '1'),
(279, 159, '10', '10', '2020-04-21 08:13:16', '2020-04-21 08:13:16', '1'),
(280, 160, '10', '10', '2020-04-21 08:13:17', '2020-04-21 08:13:17', '1'),
(281, 161, '10', '10', '2020-04-21 08:13:18', '2020-04-21 08:13:18', '1'),
(282, 162, '10', '10', '2020-04-21 08:13:19', '2020-04-21 08:13:19', '1'),
(283, 163, '10', '10', '2020-04-21 08:13:19', '2020-04-21 08:13:19', '1'),
(284, 164, '10', '10', '2020-04-21 08:13:20', '2020-04-21 08:13:20', '1'),
(285, 165, '10', '10', '2020-04-21 08:13:21', '2020-04-21 08:13:21', '1'),
(286, 166, '10', '10', '2020-04-21 08:13:21', '2020-04-21 08:13:21', '1'),
(287, 167, '10', '10', '2020-04-21 08:13:22', '2020-04-21 08:13:22', '1'),
(288, 168, '10', '10', '2020-04-21 08:13:23', '2020-04-21 08:13:23', '1'),
(289, 169, '10', '10', '2020-04-21 08:13:24', '2020-04-21 08:13:24', '1'),
(290, 170, '10', '10', '2020-04-21 08:13:25', '2020-04-21 08:13:25', '1'),
(291, 171, '10', '10', '2020-04-21 08:13:25', '2020-04-21 08:13:25', '1'),
(292, 172, '10', '10', '2020-04-21 08:13:26', '2020-04-21 08:13:26', '1'),
(293, 173, '10', '10', '2020-04-21 08:13:27', '2020-04-21 08:13:27', '1'),
(294, 174, '55', '55', '2020-04-23 04:34:12', '2020-04-23 04:34:12', '55'),
(295, 1003, '10', '10', '2020-06-12 04:34:36', '2020-06-12 04:34:36', '20'),
(296, 1003, '10', '90', '2020-06-12 04:34:36', '2020-06-12 04:34:36', '20'),
(297, 1004, '10', '10', '2020-06-12 04:40:09', '2020-06-12 04:40:09', '20'),
(298, 1004, '10', '90', '2020-06-12 04:40:09', '2020-06-12 04:40:09', '20'),
(299, 1005, '10', '10', '2020-06-12 04:45:47', '2020-06-12 04:45:47', '20'),
(300, 1005, '10', '90', '2020-06-12 04:45:47', '2020-06-12 04:45:47', '20'),
(301, 1006, '10', '10', '2020-06-12 04:46:25', '2020-06-12 04:46:25', '20'),
(302, 1006, '10', '90', '2020-06-12 04:46:25', '2020-06-12 04:46:25', '20'),
(303, 1007, '10', '10', '2020-06-12 04:48:55', '2020-06-12 04:48:55', '20'),
(304, 1007, '10', '90', '2020-06-12 04:48:55', '2020-06-12 04:48:55', '20'),
(305, 1008, '10', '10', '2020-06-12 04:50:46', '2020-06-12 04:50:46', '20'),
(306, 1008, '10', '90', '2020-06-12 04:50:46', '2020-06-12 04:50:46', '20'),
(307, 1009, '10', '10', '2020-06-12 04:52:31', '2020-06-12 04:52:31', '20'),
(308, 1009, '10', '90', '2020-06-12 04:52:31', '2020-06-12 04:52:31', '20'),
(309, 1010, '10', '10', '2020-06-12 04:54:35', '2020-06-12 04:54:35', '20'),
(310, 1010, '10', '90', '2020-06-12 04:54:35', '2020-06-12 04:54:35', '20'),
(311, 1011, '10', '10', '2020-06-12 05:14:36', '2020-06-12 05:14:36', '20'),
(312, 1011, '10', '90', '2020-06-12 05:14:36', '2020-06-12 05:14:36', '20'),
(313, 1012, '10', '10', '2020-06-12 05:16:44', '2020-06-12 05:16:44', '20'),
(314, 1012, '10', '90', '2020-06-12 05:16:44', '2020-06-12 05:16:44', '20'),
(315, 1013, '10', '10', '2020-06-12 05:18:20', '2020-06-12 05:18:20', '20'),
(316, 1013, '10', '90', '2020-06-12 05:18:20', '2020-06-12 05:18:20', '20'),
(317, 1014, '10', '10', '2020-06-12 05:19:09', '2020-06-12 05:19:09', '20'),
(318, 1014, '10', '90', '2020-06-12 05:19:09', '2020-06-12 05:19:09', '20'),
(319, 1015, '10', '10', '2020-06-12 05:20:43', '2020-06-12 05:20:43', '20'),
(320, 1015, '10', '90', '2020-06-12 05:20:43', '2020-06-12 05:20:43', '20'),
(321, 1016, '10', '10', '2020-06-12 05:21:14', '2020-06-12 05:21:14', '20'),
(322, 1016, '10', '90', '2020-06-12 05:21:14', '2020-06-12 05:21:14', '20'),
(323, 1017, '10', '10', '2020-06-12 05:22:07', '2020-06-12 05:22:07', '20'),
(324, 1017, '10', '90', '2020-06-12 05:22:07', '2020-06-12 05:22:07', '20'),
(325, 1018, '10', '10', '2020-06-12 05:23:13', '2020-06-12 05:23:13', '20'),
(326, 1018, '10', '90', '2020-06-12 05:23:13', '2020-06-12 05:23:13', '20'),
(327, 1019, '10', '10', '2020-06-12 05:23:43', '2020-06-12 05:23:43', '20'),
(328, 1019, '10', '90', '2020-06-12 05:23:43', '2020-06-12 05:23:43', '20'),
(329, 1020, '10', '10', '2020-06-12 05:35:08', '2020-06-12 05:35:08', '20'),
(330, 1020, '10', '90', '2020-06-12 05:35:08', '2020-06-12 05:35:08', '20'),
(331, 1021, '10', '10', '2020-06-12 05:35:40', '2020-06-12 05:35:40', '20'),
(332, 1021, '10', '90', '2020-06-12 05:35:40', '2020-06-12 05:35:40', '20'),
(333, 1022, '10', '10', '2020-06-12 05:36:41', '2020-06-12 05:36:41', '20'),
(334, 1022, '10', '90', '2020-06-12 05:36:41', '2020-06-12 05:36:41', '20');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `images` longtext COLLATE utf8mb4_unicode_ci,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `description`, `images`, `category_id`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'BMW Car Update', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', '[\"requests\\/product_image1219842.png\",\"requests\\/product_image419433.png\"]', 1, '2020-05-30 07:00:00', '2020-06-19 04:57:31', 1),
(213, '- Androids', 'نصاب', '[\"requests\\/product_image817834.png\"]', 1, '2020-06-02 03:23:31', '2020-06-02 05:24:32', 148),
(214, 'BMW Car', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', '[]', 1, '2020-06-08 06:02:37', '2020-06-08 06:02:37', 1),
(215, 'BMW Car', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', '[]', 1, '2020-06-19 04:56:14', '2020-06-19 04:56:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `reviewed_id` int(11) NOT NULL,
  `reviewed_type` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `stars` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `reviewed_id`, `reviewed_type`, `user_id`, `comment`, `stars`, `created_at`, `updated_at`) VALUES
(1, 57, 'App\\Models\\Product', 56, 'comment', 3, '2020-03-01 03:32:44', '2020-03-01 03:32:44'),
(21, 139, 'App\\Models\\User', 135, 'not bad', 3, '2020-05-17 07:51:41', '2020-05-17 07:51:41'),
(3, 57, 'App\\Models\\Product', 62, 'comment Here', 3, '2020-03-12 16:51:25', '2020-03-12 16:51:25'),
(4, 61, 'App\\Models\\User', 62, 'Comment Here', 4, '2020-03-17 20:15:36', '2020-03-17 20:15:36'),
(5, 60, 'App\\Models\\User', 62, 'Comment Here', 4, '2020-03-17 20:29:32', '2020-03-17 20:29:32'),
(6, 135, 'App\\Models\\User', 135, 'Comment Here', 4, '2020-05-03 22:03:33', '2020-05-03 22:03:33'),
(7, 135, 'App\\Models\\User', 135, 'zzzzzzzzzzzzzzzzzzzzzzzzzzz', 4, '2020-05-03 22:05:11', '2020-05-03 22:05:11'),
(9, 138, 'App\\Models\\User', 144, 'good', 3, '2020-05-07 05:20:38', '2020-05-07 05:20:38'),
(10, 139, 'App\\Models\\User', 135, 'test', 3, '2020-05-13 04:53:02', '2020-05-13 04:53:02'),
(11, 139, 'App\\Models\\User', 135, 'xvxbbbb', 3, '2020-05-13 04:53:38', '2020-05-13 04:53:38'),
(12, 139, 'App\\Models\\User', 135, 'testttt', 3, '2020-05-13 04:54:28', '2020-05-13 04:54:28'),
(13, 139, 'App\\Models\\User', 135, 'gg', 3, '2020-05-13 05:03:56', '2020-05-13 05:03:56'),
(14, 139, 'App\\Models\\User', 135, 'Guggenheim', 3, '2020-05-13 05:07:29', '2020-05-13 05:07:29'),
(15, 139, 'App\\Models\\User', 135, 'vvghhhh', 3, '2020-05-13 05:13:46', '2020-05-13 05:13:46'),
(37, 1001, 'App\\Models\\Product', 150, 'great', 4, '2020-06-19 03:54:28', '2020-06-19 03:54:28'),
(18, 1, 'App\\Models\\User', 135, 'dgdhbbd', 3, '2020-05-15 05:37:42', '2020-05-15 05:37:42'),
(19, 23, 'App\\Models\\Request', 135, 'very good', 6, '2020-05-16 23:34:17', '2020-05-16 23:34:17'),
(20, 6, 'App\\Models\\Service', 135, 'some comment here', 3, '2020-05-17 00:49:03', '2020-05-17 00:49:03'),
(22, 1, 'App\\Models\\User', 148, 'hema', 0, '2020-05-30 01:44:56', '2020-05-30 01:44:56'),
(23, 1, 'App\\Models\\User', 148, 'honnn', 5, '2020-05-30 01:45:16', '2020-05-30 01:45:16'),
(24, 1, 'App\\Models\\User', 148, 'lol', 5, '2020-05-30 01:46:06', '2020-05-30 01:46:06'),
(29, 1, 'App\\Models\\User', 148, 'test', 5, '2020-05-31 03:40:49', '2020-05-31 03:40:49'),
(33, 1, 'App\\Models\\User', 157, 'gamed', 5, '2020-06-13 20:32:54', '2020-06-13 20:32:54'),
(28, 146, 'App\\Models\\User', 148, 'acab', 5, '2020-05-31 02:27:29', '2020-05-31 02:27:29'),
(32, 6, 'App\\Models\\Service', 150, 'great', 4, '2020-06-11 19:16:09', '2020-06-11 19:16:09'),
(34, 1, 'App\\Models\\User', 157, 'llllllllllllllll', 5, '2020-06-13 20:33:31', '2020-06-13 20:33:31'),
(35, 1, 'App\\Models\\User', 157, 'hhhhh', 5, '2020-06-13 21:26:09', '2020-06-13 21:26:09'),
(36, 1, 'App\\Models\\User', 157, 'ggghh', 3, '2020-06-13 21:37:14', '2020-06-13 21:37:14'),
(38, 1, 'App\\Models\\User', 150, 'great', 4, '2020-06-19 03:55:51', '2020-06-19 03:55:51'),
(39, 1, 'App\\Models\\Request', 150, 'great', 4, '2020-06-19 03:56:42', '2020-06-19 03:56:42'),
(40, 1, 'App\\Models\\Request', 1, 'great', 4, '2020-06-19 04:04:18', '2020-06-19 04:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2019-08-31 09:43:42', '2019-08-31 09:43:42'),
(2, 'user', 'Normal User', '2019-08-31 09:43:42', '2019-08-31 09:43:42'),
(3, 'Tester', 'Production Testing', '2019-09-25 12:34:20', '2019-09-25 12:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `images` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `youtube_url` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `name`, `description`, `images`, `created_at`, `updated_at`, `category_id`, `youtube_url`) VALUES
(1, 138, 'first service name', 'first service desc', NULL, NULL, NULL, 1, 'asdahndas'),
(2, 137, 'first service name', 'first service desc', NULL, NULL, NULL, 1, 'asdahndas'),
(3, 135, 'first service name', 'first service desc', NULL, NULL, NULL, 1, 'asdahndas'),
(4, 135, 'service name Updated', 'description', '[\"services\\/product_image117531.png\",\"services\\/product_image1318344.png\"]', '2020-05-16 21:01:06', '2020-05-16 22:36:06', 1, NULL),
(5, 135, 'DonIssamممم', 'DonIssam', '[\"services\\/product_image417625.png\"]', '2020-05-16 21:03:36', '2020-05-16 23:10:37', 1, NULL),
(6, 135, 'DonIssam', 'DonIssam', '[\"services\\/product_image415648.png\"]', '2020-05-16 21:05:49', '2020-05-16 21:05:49', 1, 'ass'),
(9, 135, 'service name', 'description', '[\"services\\/product_image1215550.png\",\"services\\/product_image416742.png\"]', '2020-05-16 21:36:09', '2020-05-16 21:36:09', 1, NULL),
(10, 135, 'تيست', 'تيست', '[\"services\\/product_image118434.png\"]', '2020-05-16 21:43:32', '2020-05-16 21:43:32', 1, NULL),
(12, 146, 'service name', 'description', '[\"services\\/product_image717341.png\"]', '2020-05-20 17:54:42', '2020-05-20 17:54:42', 1, NULL),
(25, 148, 'chees', 'like cheese don don don don don don don don don don don don don don don don', '[\"services\\/product_image718339.png\",\"services\\/product_image617349.png\",\"services\\/product_image1018529.png\"]', '2020-05-20 22:14:16', '2020-05-20 22:14:16', 3, NULL),
(26, 1, 'test', 'test', '[\"services\\/product_image117132.png\"]', '2020-05-20 18:37:37', '2020-05-20 18:37:37', 1, NULL),
(27, 1, 'test', 'test', '[\"services\\/product_image117132.png\"]', '2020-05-20 18:37:37', '2020-05-20 18:37:37', 1, NULL),
(28, 1, 'service name', 'description', '[\"services\\/product_image1118246.png\",\"services\\/product_image1419631.png\"]', '2020-06-19 01:04:04', '2020-06-19 01:04:04', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', 'settings/September2019/FzWSZCHnZf3CjxzE8nHU.jpg', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'B2B Admin Panel', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to B2B Admin Panel.', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings/September2019/m8Kq4jEMsGWdfDcs0Ynb.png', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '69594433546-567n0o5q6ma61gsngkhpk5mgmk3hu9d5.apps.googleusercontent.com', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', 64, NULL, NULL),
(2, 'الجيزة', 64, NULL, NULL),
(3, 'الشرقية', 64, NULL, NULL),
(4, 'الدقهلية', 64, NULL, NULL),
(5, 'البحيرة', 64, NULL, NULL),
(6, 'المنيا', 64, NULL, NULL),
(7, 'القليوبية', 64, NULL, NULL),
(8, 'الإسكندرية', 64, NULL, NULL),
(9, 'الغربية', 64, NULL, NULL),
(10, 'سوهاج', 64, NULL, NULL),
(11, 'أسيوط', 64, NULL, NULL),
(12, 'المنوفية', 64, NULL, NULL),
(13, 'كفر الشيخ', 64, NULL, NULL),
(14, 'الفيوم', 64, NULL, NULL),
(15, 'قنا', 64, NULL, NULL),
(16, 'بني سويف', 64, NULL, NULL),
(17, 'أسوان', 64, NULL, NULL),
(18, 'دمياط', 64, NULL, NULL),
(19, 'الإسماعيلية', 64, NULL, NULL),
(20, 'الأقصر', 64, NULL, NULL),
(21, 'بورسعيد', 64, NULL, NULL),
(22, 'السويس', 64, NULL, NULL),
(23, 'مطروح', 64, NULL, NULL),
(24, 'شمال سيناء', 64, NULL, NULL),
(25, 'البحر الأحمر', 64, NULL, NULL),
(26, 'الوادي الجديد', 64, NULL, NULL),
(27, 'جنوب سيناء', 64, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `open_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `close_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `zip_code` int(11) NOT NULL,
  `lat` float DEFAULT NULL,
  `lang` float DEFAULT NULL,
  `delivery_time` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_cost` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedIn_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_established_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expire_date` timestamp NULL DEFAULT NULL,
  `remaining_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_list` longtext COLLATE utf8mb4_unicode_ci,
  `email_list` longtext COLLATE utf8mb4_unicode_ci,
  `landline_list` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `about`, `logo`, `country_id`, `city_id`, `address`, `mobile`, `password`, `status`, `open_at`, `close_at`, `background_image`, `state_id`, `zip_code`, `lat`, `lang`, `delivery_time`, `delivery_cost`, `facebook_url`, `whatsapp_url`, `linkedIn_url`, `twitter`, `youtube`, `instagram`, `store_established_date`, `last_login_date`, `created_at`, `updated_at`, `expire_date`, `remaining_time`, `mobile_list`, `email_list`, `landline_list`) VALUES
(1, 'madara998976@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s', 'stores\\September2019\\hVMIsVqeMhEiN8RCw5ZG.png', 5, 3, 'Cairo Domyat', '01027112781', 'aaaaaa', 1, '09:00', '16:00', 'stores\\September2019\\58sKwyyqnclheU1fmqz5.jpg', 3, 0, NULL, NULL, NULL, 'Mahmoud Saad', 'Mahmoud Saad', 'Mahmoud Saad', 'Mahmoud Saad', 'Mahmoud Saad', 'Mahmoud Saad', 'Mahmoud Saad', 'Mahmoud Saad', '2019-10-01 12:25:00', '2019-09-25 11:45:00', '2019-10-01 10:26:13', '2019-10-05 22:00:00', '4 days from now', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_tags`
--

CREATE TABLE `store_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_tags`
--

INSERT INTO `store_tags` (`id`, `store_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hot Offers', '2019-09-25 12:06:36', '2019-09-25 12:06:36'),
(2, 'Latest Products', '2019-09-25 12:06:46', '2019-09-25 12:06:46'),
(3, 'Recommended', '2019-09-25 12:06:57', '2019-09-25 12:06:57'),
(4, 'Best Saller', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2019-08-31 09:43:56', '2019-08-31 09:43:56'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2019-08-31 09:43:56', '2019-08-31 09:43:56'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2019-08-31 09:43:56', '2019-08-31 09:43:56'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2019-08-31 09:43:56', '2019-08-31 09:43:56'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2019-08-31 09:43:56', '2019-08-31 09:43:56'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2019-08-31 09:43:56', '2019-08-31 09:43:56'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2019-08-31 09:43:56', '2019-08-31 09:43:56'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2019-08-31 09:43:57', '2019-08-31 09:43:57'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2019-08-31 09:43:58', '2019-08-31 09:43:58'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2019-08-31 09:43:58', '2019-08-31 09:43:58'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2019-08-31 09:43:58', '2019-08-31 09:43:58'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2019-08-31 09:43:58', '2019-08-31 09:43:58'),
(31, 'menu_items', 'title', 1, 'ar', 'الرئيسية', '2019-08-31 10:53:50', '2019-08-31 10:53:50'),
(32, 'menu_items', 'title', 15, 'ar', 'المنتجات', '2019-09-02 06:40:42', '2019-09-11 08:08:46'),
(33, 'data_types', 'display_name_singular', 7, 'ar', 'Product', '2019-09-02 06:42:41', '2019-09-02 06:42:41'),
(34, 'data_types', 'display_name_plural', 7, 'ar', 'Products', '2019-09-02 06:42:41', '2019-09-02 06:42:41'),
(35, 'categories', 'slug', 1, 'ar', 'category-1', '2019-09-02 07:06:37', '2019-09-02 07:06:37'),
(37, 'menu_items', 'title', 4, 'ar', 'الصلاحيات', '2019-09-11 07:57:24', '2019-09-11 07:57:24'),
(38, 'menu_items', 'title', 3, 'ar', 'المستخدمين', '2019-09-11 08:02:41', '2019-09-11 08:02:41'),
(39, 'menu_items', 'title', 2, 'ar', 'الصور', '2019-09-11 08:06:04', '2019-09-11 08:06:04'),
(40, 'menu_items', 'title', 11, 'ar', 'الأقسام الرئيسية', '2019-09-11 08:07:34', '2019-09-25 06:21:54'),
(43, 'menu_items', 'title', 16, 'ar', 'المتاجر', '2019-09-18 06:41:59', '2019-09-18 06:41:59'),
(44, 'data_types', 'display_name_singular', 1, 'ar', 'User', '2019-09-18 08:45:34', '2019-09-18 08:45:34'),
(45, 'data_types', 'display_name_plural', 1, 'ar', 'Users', '2019-09-18 08:45:34', '2019-09-18 08:45:34'),
(51, 'menu_items', 'title', 19, 'ar', 'الأقسام الفرعية 2', '2019-09-25 06:23:20', '2019-09-25 06:24:58'),
(52, 'menu_items', 'title', 18, 'ar', 'الأقسام الفرعية', '2019-09-25 06:23:50', '2019-09-25 06:23:50'),
(55, 'menu_items', 'title', 23, 'ar', 'الأقسام الفرعية 2', '2019-09-25 10:39:56', '2019-09-25 10:39:56'),
(58, 'data_types', 'display_name_singular', 15, 'ar', 'Store', '2019-09-25 11:32:17', '2019-09-25 11:32:17'),
(59, 'data_types', 'display_name_plural', 15, 'ar', 'Stores', '2019-09-25 11:32:17', '2019-09-25 11:32:17'),
(60, 'menu_items', 'title', 27, 'ar', 'أقسام المتاجر', '2019-09-25 12:22:41', '2019-09-25 12:27:10'),
(61, 'data_types', 'display_name_singular', 17, 'ar', 'Branch', '2019-09-29 16:27:30', '2019-09-29 16:27:30'),
(62, 'data_types', 'display_name_plural', 17, 'ar', 'Branches', '2019-09-29 16:27:30', '2019-09-29 16:27:30'),
(63, 'data_types', 'display_name_singular', 19, 'ar', 'State', '2019-09-30 05:08:36', '2019-09-30 05:08:36'),
(64, 'data_types', 'display_name_plural', 19, 'ar', 'States', '2019-09-30 05:08:36', '2019-09-30 05:08:36'),
(65, 'data_types', 'display_name_singular', 21, 'ar', 'City', '2019-10-01 05:15:39', '2019-10-01 05:15:39'),
(66, 'data_types', 'display_name_plural', 21, 'ar', 'Cities', '2019-10-01 05:15:39', '2019-10-01 05:15:39'),
(67, 'menu_items', 'title', 28, 'ar', 'فروع المتاجر', '2019-10-01 05:21:07', '2019-10-01 05:21:07'),
(68, 'data_types', 'display_name_singular', 16, 'ar', 'Tag', '2019-10-01 05:29:09', '2019-10-01 05:29:09'),
(69, 'data_types', 'display_name_plural', 16, 'ar', 'Tags', '2019-10-01 05:29:09', '2019-10-01 05:29:09'),
(74, 'data_types', 'display_name_singular', 22, 'ar', 'Request', '2019-10-04 05:19:14', '2019-10-04 05:19:14'),
(75, 'data_types', 'display_name_plural', 22, 'ar', 'Requests', '2019-10-04 05:19:14', '2019-10-04 05:19:14'),
(76, 'data_types', 'display_name_singular', 26, 'ar', 'Sub Category', '2019-10-04 05:58:19', '2019-10-04 05:58:19'),
(77, 'data_types', 'display_name_plural', 26, 'ar', 'Sub Categories', '2019-10-04 05:58:19', '2019-10-04 05:58:19'),
(78, 'data_types', 'display_name_singular', 27, 'ar', 'Category', '2019-10-04 05:59:40', '2019-10-04 05:59:40'),
(79, 'data_types', 'display_name_plural', 27, 'ar', 'Categories', '2019-10-04 05:59:40', '2019-10-04 05:59:40'),
(80, 'menu_items', 'title', 31, 'ar', 'الأقسام الرئيسية', '2019-10-04 06:48:49', '2019-10-04 06:48:49'),
(81, 'menu_items', 'title', 32, 'ar', 'الأقسام الفرعية ', '2019-10-04 06:49:39', '2019-10-04 06:49:39'),
(82, 'menu_items', 'title', 33, 'ar', 'الأقسام ', '2019-10-04 06:50:09', '2020-03-03 01:34:23'),
(83, 'menu_items', 'title', 29, 'ar', 'طلبات المستهلك ', '2019-10-04 06:51:23', '2019-10-04 06:51:23'),
(84, 'menu_items', 'title', 34, 'ar', 'الخدمات', '2019-10-04 07:59:35', '2019-10-04 07:59:35'),
(93, 'products', 'name', 11, 'ar', 'asd', '2020-01-27 13:50:32', '2020-01-27 13:50:32'),
(94, 'products', 'description', 11, 'ar', 'as', '2020-01-27 13:50:32', '2020-01-27 13:50:32'),
(95, 'products', 'name', 9, 'ar', 'asd', '2020-01-27 13:53:26', '2020-01-27 13:53:26'),
(96, 'products', 'description', 9, 'ar', 'as', '2020-01-27 13:53:26', '2020-01-27 13:53:26'),
(97, 'data_types', 'display_name_singular', 29, 'ar', 'Attribute', '2020-02-26 09:07:19', '2020-02-26 09:07:19'),
(98, 'data_types', 'display_name_plural', 29, 'ar', 'Attributes', '2020-02-26 09:07:19', '2020-02-26 09:07:19'),
(99, 'data_types', 'display_name_singular', 32, 'ar', 'Attribute Value', '2020-02-26 09:21:18', '2020-02-26 09:21:18'),
(100, 'data_types', 'display_name_plural', 32, 'ar', 'Attribute Values', '2020-02-26 09:21:18', '2020-02-26 09:21:18'),
(101, 'products', 'description', 54, 'ar', 'as', NULL, NULL),
(102, 'products', 'name', 55, 'ar', 'asd', NULL, NULL),
(103, 'products', 'description', 55, 'ar', 'as', NULL, NULL),
(104, 'products', 'name', 56, 'ar', 'asd', NULL, NULL),
(105, 'products', 'description', 56, 'ar', 'as', NULL, NULL),
(106, 'products', 'name', 57, 'ar', 'asd', NULL, NULL),
(107, 'products', 'description', 57, 'ar', 'as', NULL, NULL),
(108, 'attributes', 'name', 1, 'ar', 'مراقبة ضغط العجلات', '2020-02-29 18:50:03', '2020-02-29 18:50:03'),
(109, 'attribute_values', 'value', 1, 'ar', 'أول قيمة', '2020-02-29 19:45:31', '2020-02-29 19:45:31'),
(110, 'attribute_values', 'value', 2, 'ar', 'أخر قيمة ', '2020-02-29 19:45:43', '2020-02-29 19:45:43'),
(111, 'attribute_values', 'value', 3, 'ar', 'جودة عالية', '2020-02-29 19:46:06', '2020-02-29 19:46:06'),
(112, 'products', 'name', 58, 'ar', 'asd', NULL, NULL),
(113, 'products', 'description', 58, 'ar', 'as', NULL, NULL),
(114, 'products', 'name', 59, 'ar', 'asd', NULL, NULL),
(115, 'products', 'description', 59, 'ar', 'as', NULL, NULL),
(116, 'products', 'name', 5, 'ar', 'ajkndslakda', NULL, NULL),
(117, 'products', 'name', 6, 'ar', 'ajkndslakda', NULL, NULL),
(118, 'requests', 'name', 7, 'ar', 'ajkndslakda', NULL, NULL),
(119, 'requests', 'name', 8, 'ar', 'ajkndslakda', NULL, NULL),
(120, 'requests', 'name', 9, 'ar', 'ajkndslakda', NULL, NULL),
(121, 'requests', 'description', 9, 'ar', 'dcakncdsalk', NULL, NULL),
(122, 'requests', 'name', 10, 'ar', 'ajkndslakda', NULL, NULL),
(123, 'requests', 'description', 10, 'ar', 'dcakncdsalk', NULL, NULL),
(124, 'menu_items', 'title', 37, 'ar', 'الأقسام الفرعية', '2020-03-04 04:07:24', '2020-03-04 04:07:24'),
(125, 'menu_items', 'title', 38, 'ar', 'الأقسام الثانوية', '2020-03-04 04:08:18', '2020-03-04 04:08:18'),
(126, 'requests', 'name', 16, 'ar', 'as', NULL, NULL),
(127, 'requests', 'description', 16, 'ar', 'as', NULL, NULL),
(128, 'requests', 'name', 17, 'ar', 'as', NULL, NULL),
(129, 'requests', 'description', 17, 'ar', 'as', NULL, NULL),
(130, 'requests', 'name', 18, 'ar', 'as', NULL, NULL),
(131, 'requests', 'description', 18, 'ar', 'as', NULL, NULL),
(132, 'requests', 'name', 19, 'ar', 'as', NULL, NULL),
(133, 'requests', 'description', 19, 'ar', 'as', NULL, NULL),
(134, 'requests', 'name', 20, 'ar', 'as', NULL, NULL),
(135, 'requests', 'description', 20, 'ar', 'as', NULL, NULL),
(136, 'requests', 'name', 21, 'ar', 'as', NULL, NULL),
(137, 'requests', 'description', 21, 'ar', 'as', NULL, NULL),
(138, 'requests', 'name', 22, 'ar', 'as', NULL, NULL),
(139, 'requests', 'description', 22, 'ar', 'as', NULL, NULL),
(140, 'requests', 'name', 23, 'ar', 'as', NULL, NULL),
(141, 'requests', 'description', 23, 'ar', 'as', NULL, NULL),
(142, 'requests', 'name', 24, 'ar', 'as', NULL, NULL),
(143, 'requests', 'description', 24, 'ar', 'as', NULL, NULL),
(144, 'requests', 'name', 25, 'ar', 'as', NULL, NULL),
(145, 'requests', 'description', 25, 'ar', 'as', NULL, NULL),
(146, 'requests', 'description', 26, 'ar', 'as', NULL, NULL),
(147, 'requests', 'name', 27, 'ar', 'as', NULL, NULL),
(148, 'requests', 'description', 27, 'ar', 'as', NULL, NULL),
(149, 'requests', 'name', 28, 'ar', 'as', NULL, NULL),
(150, 'requests', 'description', 28, 'ar', 'as', NULL, NULL),
(151, 'requests', 'name', 29, 'ar', 'as', NULL, NULL),
(152, 'requests', 'description', 29, 'ar', 'as', NULL, NULL),
(153, 'requests', 'name', 30, 'ar', 'BMW Car', '2020-03-10 02:25:51', '2020-03-10 02:25:51'),
(154, 'requests', 'description', 30, 'ar', 'Dynamically Productivate Customer Directed Results And Next-Generation Solutions. Quickly Actualize End-To-End Vortals Whereas Backend Relationships. Rapidiously Syndicate Emerging Markets Whereas Optimal Products. Monotonectally Redefine Revolutionary.', '2020-03-10 02:25:51', '2020-03-10 02:25:51'),
(164, 'requests', 'name', 31, 'ar', 'as', NULL, NULL),
(165, 'requests', 'description', 31, 'ar', 'as', NULL, NULL),
(181, 'categories', 'name', 2363, 'ar', 'Hotel Bed', '2020-04-01 16:47:44', '2020-04-01 16:47:44'),
(182, 'categories', 'name', 2697, 'ar', 'Auto Bearing', '2020-04-01 22:55:14', '2020-04-01 22:55:14'),
(183, 'categories', 'name', 2845, 'ar', 'Heating Equipment', '2020-04-02 15:25:31', '2020-04-02 15:25:31'),
(184, 'categories', 'name', 2844, 'ar', 'Heating Element', '2020-04-02 15:26:09', '2020-04-02 15:26:09'),
(185, 'categories', 'name', 2843, 'ar', 'Heat Pump', '2020-04-02 15:26:34', '2020-04-02 15:26:34'),
(186, 'categories', 'name', 2842, 'ar', 'Heat Exchanger Plate', '2020-04-02 15:27:10', '2020-04-02 15:27:10'),
(187, 'categories', 'name', 2841, 'ar', 'Heat Exchanger', '2020-04-02 15:27:33', '2020-04-02 15:27:33'),
(188, 'categories', 'name', 2933, 'ar', 'Battery Tester', '2020-04-02 16:09:15', '2020-04-02 16:09:15'),
(189, 'categories', 'name', 2946, 'ar', 'Flow Meter', '2020-04-02 16:15:31', '2020-04-02 16:15:31'),
(190, 'categories', 'name', 3022, 'ar', 'Cookware Parts', '2020-04-02 18:31:15', '2020-04-02 18:31:15'),
(191, 'categories', 'name', 3110, 'ar', 'Bathroom Sets', '2020-04-02 19:29:21', '2020-04-02 19:29:21'),
(192, 'categories', 'name', 3133, 'ar', 'Cap Highlights', '2020-04-02 19:42:21', '2020-04-02 19:42:21'),
(193, 'categories', 'name', 3195, 'ar', 'Adult Diapers', '2020-04-02 22:07:16', '2020-04-02 22:07:16'),
(194, 'categories', 'name', 3219, 'ar', 'Bed Sheets', '2020-04-02 22:25:10', '2020-04-02 22:25:10'),
(195, 'categories', 'name', 3528, 'ar', 'Feed Processing Machinery', '2020-04-03 06:09:46', '2020-04-03 06:09:46'),
(196, 'categories', 'name', 3575, 'ar', 'Buttonhole Machine', '2020-04-03 06:48:13', '2020-04-03 06:48:13'),
(198, 'requests', 'name', 32, 'ar', 'as', NULL, NULL),
(199, 'requests', 'description', 32, 'ar', 'as', NULL, NULL),
(200, 'requests', 'name', 33, 'ar', 'as', NULL, NULL),
(201, 'requests', 'description', 33, 'ar', 'as', NULL, NULL),
(202, 'categories', 'name', 3754, 'ar', 'Blow Molding Machine', '2020-04-06 20:11:24', '2020-04-06 20:11:24'),
(203, 'categories', 'name', 3755, 'ar', 'Film Blowing Machine', '2020-04-06 20:11:51', '2020-04-06 20:11:51'),
(204, 'categories', 'name', 3756, 'ar', 'Foam Machinery', '2020-04-06 20:12:15', '2020-04-06 20:12:15'),
(205, 'categories', 'name', 3757, 'ar', 'Injection Molding Machine', '2020-04-06 20:12:39', '2020-04-06 20:12:39'),
(206, 'categories', 'name', 3818, 'ar', 'Bending Machine', '2020-04-06 21:19:54', '2020-04-06 21:19:54'),
(207, 'categories', 'name', 4171, 'ar', 'Writing Paper', '2020-04-07 00:39:16', '2020-04-07 00:39:16'),
(208, 'categories', 'name', 4255, 'ar', 'Safety & Protective Apparel', '2020-04-07 02:17:03', '2020-04-07 02:17:03'),
(209, 'categories', 'name', 4253, 'ar', 'Protective Face Mask', '2020-04-07 02:17:09', '2020-04-07 02:17:09'),
(210, 'categories', 'name', 4514, 'ar', 'Drill Sleeves', '2020-04-07 12:51:03', '2020-04-07 12:51:03'),
(211, 'categories', 'name', 4608, 'ar', 'Wheel & Caster Accessories', '2020-04-07 13:29:20', '2020-04-07 13:29:20'),
(212, 'categories', 'name', 4607, 'ar', 'Supermarket Caster', '2020-04-07 13:29:25', '2020-04-07 13:29:25'),
(213, 'categories', 'name', 4606, 'ar', 'Medical Caster', '2020-04-07 13:29:30', '2020-04-07 13:29:30'),
(214, 'categories', 'name', 4605, 'ar', 'Luggage Wheel', '2020-04-07 13:29:35', '2020-04-07 13:29:35'),
(215, 'categories', 'name', 4604, 'ar', 'Industrial Caster', '2020-04-07 13:29:40', '2020-04-07 13:29:40'),
(216, 'categories', 'name', 4603, 'ar', 'Furniture Casters', '2020-04-07 13:29:45', '2020-04-07 13:29:45'),
(217, 'categories', 'name', 4602, 'ar', 'Dustbin Wheel', '2020-04-07 13:29:50', '2020-04-07 13:29:50'),
(218, 'categories', 'name', 4687, 'ar', 'Food Trailer', '2020-04-07 15:24:37', '2020-04-07 15:24:37'),
(219, 'categories', 'name', 4686, 'ar', 'Fire Truck', '2020-04-07 15:24:42', '2020-04-07 15:24:42'),
(220, 'categories', 'name', 4685, 'ar', 'Ambulance', '2020-04-07 15:24:47', '2020-04-07 15:24:47'),
(221, 'categories', 'name', 4684, 'ar', 'Advertising Truck', '2020-04-07 15:24:53', '2020-04-07 15:24:53'),
(247, 'categories', 'name', 27, 'ar', 'كماليات سيارات', '2020-04-07 16:52:02', '2020-04-28 21:34:18'),
(248, 'categories', 'name', 28, 'ar', 'صيانة السيارات', '2020-04-07 16:55:12', '2020-04-28 21:38:46'),
(249, 'categories', 'name', 4760, 'ar', 'Bathroom Fittings & Accessories', '2020-04-07 18:03:21', '2020-04-07 18:03:21'),
(807, 'categories', 'name', 1873, 'ar', 'USB Flash Disk', '2020-04-08 22:09:12', '2020-04-08 22:09:12'),
(820, 'categories', 'name', 1887, 'ar', 'Network Switch', '2020-04-08 22:19:17', '2020-04-08 22:19:17'),
(1066, 'categories', 'name', 2140, 'ar', 'Other Sensors', '2020-04-09 14:52:43', '2020-04-09 14:52:43'),
(1067, 'categories', 'name', 2141, 'ar', 'Arrester', '2020-04-09 14:53:22', '2020-04-09 14:53:22'),
(1068, 'categories', 'name', 2142, 'ar', 'Circuit Breaker', '2020-04-09 14:53:54', '2020-04-09 14:53:54'),
(1069, 'categories', 'name', 2143, 'ar', 'Earthing System', '2020-04-09 14:54:36', '2020-04-09 14:54:36'),
(1070, 'categories', 'name', 2144, 'ar', 'Fuse', '2020-04-09 14:55:07', '2020-04-09 14:55:07'),
(1071, 'categories', 'name', 2145, 'ar', 'Fuse Block & Holder', '2020-04-09 14:55:40', '2020-04-09 14:55:40'),
(1072, 'categories', 'name', 2146, 'ar', 'Lightning Receiver', '2020-04-09 14:56:18', '2020-04-09 14:56:18'),
(1073, 'categories', 'name', 2147, 'ar', 'Other Breaker & Protector', '2020-04-09 14:56:57', '2020-04-09 14:56:57'),
(1074, 'categories', 'name', 2148, 'ar', 'Heat Pump', '2020-04-09 14:57:52', '2020-04-09 14:57:52'),
(1075, 'categories', 'name', 2149, 'ar', 'Heating Element', '2020-04-09 14:58:22', '2020-04-09 14:58:22'),
(1076, 'categories', 'name', 2150, 'ar', 'Temperature Controller', '2020-04-09 14:58:51', '2020-04-09 14:58:51'),
(1077, 'categories', 'name', 2151, 'ar', 'Thermoelectric Cooler Module', '2020-04-09 14:59:33', '2020-04-09 14:59:33'),
(1078, 'categories', 'name', 2152, 'ar', 'Other Heating, Refrigeration & Temperature Control', '2020-04-09 15:00:09', '2020-04-09 15:00:09'),
(1079, 'categories', 'name', 2153, 'ar', 'Power Inverter', '2020-04-09 15:03:20', '2020-04-09 15:03:20'),
(1080, 'categories', 'name', 2154, 'ar', 'Solar & Wind Inverter', '2020-04-09 15:04:17', '2020-04-09 15:04:17'),
(1081, 'categories', 'name', 2155, 'ar', 'Other Inverters', '2020-04-09 15:05:06', '2020-04-09 15:05:06'),
(1082, 'categories', 'name', 2156, 'ar', 'Busbar', '2020-04-09 15:05:53', '2020-04-09 15:05:53'),
(1083, 'categories', 'name', 2157, 'ar', 'Electric Power Fitting', '2020-04-09 15:06:30', '2020-04-09 15:06:30'),
(1084, 'categories', 'name', 2158, 'ar', 'Junction Box', '2020-04-09 15:07:21', '2020-04-09 15:07:21'),
(1085, 'categories', 'name', 2159, 'ar', 'LED Conversion Kit', '2020-04-09 15:07:57', '2020-04-09 15:07:57'),
(1086, 'categories', 'name', 2160, 'ar', 'LED Power Supply', '2020-04-09 15:08:33', '2020-04-09 15:08:33'),
(1087, 'categories', 'name', 2161, 'ar', 'Power Adaptor', '2020-04-09 15:09:29', '2020-04-09 15:09:29'),
(1088, 'categories', 'name', 2162, 'ar', 'Power Distribution Cabinet & Box', '2020-04-09 15:10:02', '2020-04-09 15:10:02'),
(1089, 'categories', 'name', 2163, 'ar', 'Switchgear', '2020-04-09 15:10:37', '2020-04-09 15:10:37'),
(1090, 'categories', 'name', 2164, 'ar', 'Switching Power Supply', '2020-04-09 15:13:46', '2020-04-09 15:13:46'),
(1091, 'categories', 'name', 2165, 'ar', 'UPS', '2020-04-09 15:14:43', '2020-04-09 15:14:43'),
(1092, 'categories', 'name', 2166, 'ar', 'Voltage Regulator', '2020-04-09 15:15:25', '2020-04-09 15:15:25'),
(1093, 'categories', 'name', 2167, 'ar', 'Other Power Supply & Distribution', '2020-04-09 15:16:12', '2020-04-09 15:16:12'),
(1094, 'categories', 'name', 2168, 'ar', 'Arrester', '2020-04-09 15:18:00', '2020-04-09 15:18:00'),
(1095, 'categories', 'name', 2169, 'ar', 'Circuit Breaker', '2020-04-09 15:20:16', '2020-04-09 15:20:16'),
(1096, 'categories', 'name', 2170, 'ar', 'Earthing System', '2020-04-09 15:20:59', '2020-04-09 15:20:59'),
(1097, 'categories', 'name', 2171, 'ar', 'Electric Power Fitting', '2020-04-09 15:21:44', '2020-04-09 15:21:44'),
(1098, 'categories', 'name', 2172, 'ar', 'Instrument Transformer', '2020-04-09 15:22:25', '2020-04-09 15:22:25'),
(1099, 'categories', 'name', 2173, 'ar', 'Insulator', '2020-04-09 15:22:58', '2020-04-09 15:22:58'),
(1100, 'categories', 'name', 2174, 'ar', 'Isolation Switch', '2020-04-09 15:23:33', '2020-04-09 15:23:33'),
(1101, 'categories', 'name', 2175, 'ar', 'Power Cable', '2020-04-09 15:24:23', '2020-04-09 15:24:23'),
(1102, 'categories', 'name', 2176, 'ar', 'Relay & Contactor', '2020-04-09 15:24:53', '2020-04-09 15:24:53'),
(1103, 'categories', 'name', 2177, 'ar', 'Transformer', '2020-04-09 15:25:23', '2020-04-09 15:25:23'),
(1104, 'categories', 'name', 2178, 'ar', 'Transmission Tower', '2020-04-09 15:26:06', '2020-04-09 15:26:06'),
(1105, 'categories', 'name', 2179, 'ar', 'Other Power Transmission & Transformer', '2020-04-09 15:26:52', '2020-04-09 15:26:52'),
(1106, 'categories', 'name', 2180, 'ar', 'Current Transmitter', '2020-04-09 15:27:21', '2020-04-09 15:27:21'),
(1107, 'categories', 'name', 2181, 'ar', 'Differential Pressure Transmitter', '2020-04-09 15:27:51', '2020-04-09 15:27:51'),
(1108, 'categories', 'name', 2183, 'ar', 'Flow Transmitter', '2020-04-09 15:30:32', '2020-04-09 15:30:32'),
(1109, 'categories', 'name', 2184, 'ar', 'Liquid Level Transmitter', '2020-04-09 15:32:09', '2020-04-09 15:32:09'),
(1110, 'categories', 'name', 2185, 'ar', 'Pressure Transmitter', '2020-04-09 15:32:46', '2020-04-09 15:32:46'),
(1111, 'categories', 'name', 2186, 'ar', 'Temperature & Humidity Transmitter', '2020-04-09 15:33:32', '2020-04-09 15:33:32'),
(1112, 'categories', 'name', 2187, 'ar', 'Voltage Transmitter', '2020-04-09 15:34:14', '2020-04-09 15:34:14'),
(1113, 'categories', 'name', 2188, 'ar', 'Weight Transmitter', '2020-04-09 15:34:48', '2020-04-09 15:34:48'),
(1114, 'categories', 'name', 2189, 'ar', 'Other Transmitters', '2020-04-09 15:35:27', '2020-04-09 15:35:27'),
(1115, 'categories', 'name', 2190, 'ar', 'Battery Holder', '2020-04-09 15:45:04', '2020-04-09 15:45:04'),
(1116, 'categories', 'name', 2191, 'ar', 'Battery Management System', '2020-04-09 15:45:39', '2020-04-09 15:45:39'),
(1117, 'categories', 'name', 2192, 'ar', 'Battery Materials', '2020-04-09 15:46:36', '2020-04-09 15:46:36'),
(1118, 'categories', 'name', 2193, 'ar', 'Battery Pack', '2020-04-09 15:47:21', '2020-04-09 15:47:21'),
(1119, 'categories', 'name', 2194, 'ar', 'Button Cell Battery', '2020-04-09 15:47:54', '2020-04-09 15:47:54'),
(1120, 'categories', 'name', 2195, 'ar', 'Camera Battery', '2020-04-09 15:48:32', '2020-04-09 15:48:32'),
(1121, 'categories', 'name', 2196, 'ar', 'Car Battery', '2020-04-09 15:49:10', '2020-04-09 15:49:10'),
(1122, 'categories', 'name', 2197, 'ar', 'Fuel Cell', '2020-04-09 15:49:48', '2020-04-09 15:49:48'),
(1123, 'categories', 'name', 2198, 'ar', 'Mobile Phone Battery', '2020-04-09 15:50:17', '2020-04-09 15:50:17'),
(1124, 'categories', 'name', 2199, 'ar', 'Mobile Phone Charger', '2020-04-09 15:52:00', '2020-04-09 15:52:00'),
(1125, 'categories', 'name', 2200, 'ar', 'Motorcycle Battery', '2020-04-09 15:52:33', '2020-04-09 15:52:33'),
(1126, 'categories', 'name', 2201, 'ar', 'Power Bank', '2020-04-09 15:53:25', '2020-04-09 15:53:25'),
(1127, 'categories', 'name', 2202, 'ar', 'Primary & Dry Battery', '2020-04-09 15:54:20', '2020-04-09 15:54:20'),
(1128, 'categories', 'name', 2203, 'ar', 'Rechargeable Battery & Charger', '2020-04-09 15:54:53', '2020-04-09 15:54:53'),
(1129, 'categories', 'name', 2204, 'ar', 'Solar Cells & Panels', '2020-04-09 15:55:34', '2020-04-09 15:55:34'),
(1130, 'categories', 'name', 2205, 'ar', 'Solar Charger', '2020-04-09 15:56:29', '2020-04-09 15:56:29'),
(1131, 'categories', 'name', 2206, 'ar', 'Storage Battery', '2020-04-09 15:57:09', '2020-04-09 15:57:09'),
(1132, 'categories', 'name', 2207, 'ar', 'Storage Battery Charger', '2020-04-09 16:00:07', '2020-04-09 16:00:07'),
(1133, 'categories', 'name', 2208, 'ar', 'Other Battery, Storage Battery & Charger', '2020-04-09 16:01:42', '2020-04-09 16:01:42'),
(1134, 'categories', 'name', 2209, 'ar', 'AC Motor', '2020-04-09 16:02:34', '2020-04-09 16:02:34'),
(1135, 'categories', 'name', 2210, 'ar', 'Asynchronous Motor', '2020-04-09 16:03:27', '2020-04-09 16:03:27'),
(1136, 'categories', 'name', 2211, 'ar', 'DC Motor', '2020-04-09 16:04:09', '2020-04-09 16:04:09'),
(1137, 'categories', 'name', 2212, 'ar', 'Micro Motor', '2020-04-09 16:04:40', '2020-04-09 16:04:40'),
(1138, 'categories', 'name', 2213, 'ar', 'Stepper Motor', '2020-04-09 16:05:08', '2020-04-09 16:05:08'),
(1139, 'categories', 'name', 2214, 'ar', 'Synchronous Motor', '2020-04-09 16:07:14', '2020-04-09 16:07:14'),
(1140, 'categories', 'name', 2215, 'ar', 'Other Motors', '2020-04-09 16:07:56', '2020-04-09 16:07:56'),
(1141, 'categories', 'name', 2216, 'ar', 'Audio & Video Cable', '2020-04-09 16:08:49', '2020-04-09 16:08:49'),
(1142, 'categories', 'name', 2217, 'ar', 'Cable Assembly', '2020-04-09 16:09:27', '2020-04-09 16:09:27'),
(1143, 'categories', 'name', 2218, 'ar', 'Cable Tools', '2020-04-09 16:09:57', '2020-04-09 16:09:57'),
(1144, 'categories', 'name', 2219, 'ar', 'Communication Cable', '2020-04-09 16:10:32', '2020-04-09 16:10:32'),
(1145, 'categories', 'name', 2220, 'ar', 'Computer Cable', '2020-04-09 16:12:28', '2020-04-09 16:12:28'),
(1146, 'categories', 'name', 2221, 'ar', 'Electric Wire & Cable', '2020-04-09 16:13:14', '2020-04-09 16:13:14'),
(1147, 'categories', 'name', 2222, 'ar', 'Enameled Wire', '2020-04-09 16:13:59', '2020-04-09 16:13:59'),
(1148, 'categories', 'name', 2223, 'ar', 'Optical Fiber', '2020-04-09 16:14:46', '2020-04-09 16:14:46'),
(1149, 'categories', 'name', 2224, 'ar', 'PV Cable', '2020-04-09 16:15:27', '2020-04-09 16:15:27'),
(1150, 'categories', 'name', 2225, 'ar', 'Power Cable', '2020-04-09 16:15:57', '2020-04-09 16:15:57'),
(1151, 'categories', 'name', 2226, 'ar', 'Power Cord & Extension Cord', '2020-04-09 16:16:35', '2020-04-09 16:16:35'),
(1152, 'categories', 'name', 2227, 'ar', 'Wire Harness', '2020-04-09 16:17:53', '2020-04-09 16:17:53'),
(1153, 'categories', 'name', 2228, 'ar', 'Other Wire & Cable', '2020-04-09 16:18:28', '2020-04-09 16:18:28'),
(1154, 'categories', 'name', 2229, 'ar', 'IC Card', '2020-04-09 16:20:20', '2020-04-09 16:20:20'),
(1155, 'categories', 'name', 2230, 'ar', 'Magnetic Card', '2020-04-09 16:20:49', '2020-04-09 16:20:49'),
(1156, 'categories', 'name', 2231, 'ar', 'RFID Card', '2020-04-09 16:21:34', '2020-04-09 16:21:34'),
(1157, 'categories', 'name', 2232, 'ar', 'RFID Tag', '2020-04-09 16:22:24', '2020-04-09 16:22:24'),
(1158, 'categories', 'name', 2233, 'ar', 'RFID Wristband', '2020-04-09 16:22:57', '2020-04-09 16:22:57'),
(1159, 'categories', 'name', 2234, 'ar', 'Smart Card Reader', '2020-04-09 16:23:33', '2020-04-09 16:23:33'),
(1160, 'categories', 'name', 2235, 'ar', 'Other Smart Card', '2020-04-09 16:24:17', '2020-04-09 16:24:17'),
(1161, 'categories', 'name', 2236, 'ar', 'Audio & Video Socket', '2020-04-09 16:25:11', '2020-04-09 16:25:11'),
(1162, 'categories', 'name', 2237, 'ar', 'Extension Socket', '2020-04-09 16:25:43', '2020-04-09 16:25:43'),
(1163, 'categories', 'name', 2238, 'ar', 'Face Plate', '2020-04-09 16:26:17', '2020-04-09 16:26:17'),
(1164, 'categories', 'name', 2239, 'ar', 'Floor Socket & Table Socket', '2020-04-09 16:26:53', '2020-04-09 16:26:53'),
(1165, 'categories', 'name', 2240, 'ar', 'PDU', '2020-04-09 16:27:38', '2020-04-09 16:27:38'),
(1166, 'categories', 'name', 2241, 'ar', 'TV Socket', '2020-04-09 16:28:44', '2020-04-09 16:28:44'),
(1167, 'categories', 'name', 2242, 'ar', 'Telephone Socket', '2020-04-09 16:29:15', '2020-04-09 16:29:15'),
(1168, 'categories', 'name', 2243, 'ar', 'USB Socket', '2020-04-09 16:29:47', '2020-04-09 16:29:47'),
(1169, 'categories', 'name', 2244, 'ar', 'Wall Socket', '2020-04-09 16:31:33', '2020-04-09 16:31:33'),
(1170, 'categories', 'name', 2245, 'ar', 'Other Sockets, Outlets & Accessories', '2020-04-09 16:32:07', '2020-04-09 16:32:07'),
(1171, 'categories', 'name', 2246, 'ar', 'Automatic Transfer Switch', '2020-04-09 16:32:45', '2020-04-09 16:32:45'),
(1172, 'categories', 'name', 2247, 'ar', 'Combination Switch', '2020-04-09 16:33:27', '2020-04-09 16:33:27'),
(1173, 'categories', 'name', 2248, 'ar', 'DIP Switch', '2020-04-09 16:34:02', '2020-04-09 16:34:02'),
(1174, 'categories', 'name', 2249, 'ar', 'Flow Switch', '2020-04-09 16:34:44', '2020-04-09 16:34:44'),
(1175, 'categories', 'name', 2250, 'ar', 'Isolation Switch', '2020-04-09 16:35:16', '2020-04-09 16:35:16'),
(1176, 'categories', 'name', 2251, 'ar', 'Limit Switch', '2020-04-09 16:35:48', '2020-04-09 16:35:48'),
(1177, 'categories', 'name', 2252, 'ar', 'Membrane Switch', '2020-04-09 16:36:27', '2020-04-09 16:36:27'),
(1178, 'categories', 'name', 2253, 'ar', 'Micro Switch', '2020-04-09 16:37:07', '2020-04-09 16:37:07'),
(1179, 'categories', 'name', 2254, 'ar', 'Pressure Switch', '2020-04-09 16:37:43', '2020-04-09 16:37:43'),
(1180, 'categories', 'name', 2255, 'ar', 'Push Button Switch', '2020-04-09 16:38:12', '2020-04-09 16:38:12'),
(1181, 'categories', 'name', 2256, 'ar', 'Reed Switch', '2020-04-09 16:38:46', '2020-04-09 16:38:46'),
(1182, 'categories', 'name', 2257, 'ar', 'Remote Control Switch', '2020-04-09 16:39:26', '2020-04-09 16:39:26'),
(1183, 'categories', 'name', 2258, 'ar', 'Rocker Switch', '2020-04-09 16:39:58', '2020-04-09 16:39:58'),
(1184, 'categories', 'name', 2259, 'ar', 'Rotary Switch', '2020-04-09 16:41:06', '2020-04-09 16:41:06'),
(1185, 'categories', 'name', 2260, 'ar', 'Sensor Switch', '2020-04-09 16:43:00', '2020-04-09 16:43:00'),
(1186, 'categories', 'name', 2261, 'ar', 'Slide Switch', '2020-04-09 16:43:32', '2020-04-09 16:43:32'),
(1187, 'categories', 'name', 2262, 'ar', 'Tact Switch', '2020-04-09 16:44:57', '2020-04-09 16:44:57'),
(1188, 'categories', 'name', 2263, 'ar', 'Time Switch', '2020-04-09 16:45:40', '2020-04-09 16:45:40'),
(1189, 'categories', 'name', 2264, 'ar', 'Toggle Switch', '2020-04-09 16:46:21', '2020-04-09 16:46:21'),
(1190, 'categories', 'name', 2265, 'ar', 'Other Switches', '2020-04-09 17:26:38', '2020-04-09 17:26:38'),
(1191, 'categories', 'name', 2266, 'ar', 'GPS Accessories', '2020-04-09 17:27:12', '2020-04-09 17:27:12'),
(1192, 'categories', 'name', 2267, 'ar', 'GPS Module', '2020-04-09 17:27:46', '2020-04-09 17:27:46'),
(1193, 'categories', 'name', 2268, 'ar', 'GPS Navigator', '2020-04-09 17:28:35', '2020-04-09 17:28:35'),
(1194, 'categories', 'name', 2269, 'ar', 'GPS Receiver', '2020-04-09 17:29:24', '2020-04-09 17:29:24'),
(1195, 'categories', 'name', 2270, 'ar', 'GPS Tracker', '2020-04-09 17:30:05', '2020-04-09 17:30:05'),
(1196, 'categories', 'name', 2271, 'ar', 'Other GPS', '2020-04-09 17:30:36', '2020-04-09 17:30:36'),
(1197, 'categories', 'name', 2272, 'ar', 'Call Center Equipment', '2020-04-09 17:32:46', '2020-04-09 17:32:46'),
(1198, 'categories', 'name', 2273, 'ar', 'Communication Module', '2020-04-09 17:33:30', '2020-04-09 17:33:30'),
(1199, 'categories', 'name', 2274, 'ar', 'Emission Transmission Equipment', '2020-04-09 17:35:28', '2020-04-09 17:35:28'),
(1200, 'categories', 'name', 2275, 'ar', 'Fiber Optic Equipment', '2020-04-09 17:36:02', '2020-04-09 17:36:02'),
(1201, 'categories', 'name', 2276, 'ar', 'Fixed Wireless Terminals', '2020-04-09 17:36:39', '2020-04-09 17:36:39'),
(1202, 'categories', 'name', 2279, 'ar', 'Network Cabinet', '2020-04-09 17:47:04', '2020-04-09 17:47:04'),
(1203, 'categories', 'name', 2280, 'ar', 'PBX', '2020-04-09 17:47:44', '2020-04-09 17:47:44'),
(1204, 'categories', 'name', 2281, 'ar', 'Radio & TV Broadcasting', '2020-04-09 17:48:35', '2020-04-09 17:48:35'),
(1205, 'categories', 'name', 2282, 'ar', 'Repeater', '2020-04-09 17:49:10', '2020-04-09 17:49:10'),
(1206, 'categories', 'name', 2283, 'ar', 'Satellite', '2020-04-09 17:50:05', '2020-04-09 17:50:05'),
(1207, 'categories', 'name', 2284, 'ar', 'Set Top Box', '2020-04-09 17:50:34', '2020-04-09 17:50:34'),
(1208, 'categories', 'name', 2285, 'ar', 'Signal Jammer', '2020-04-09 17:51:10', '2020-04-09 17:51:10'),
(1209, 'categories', 'name', 2286, 'ar', 'Telecom Tower', '2020-04-09 17:52:20', '2020-04-09 17:52:20'),
(1210, 'categories', 'name', 2287, 'ar', 'VoIP Products', '2020-04-09 17:52:51', '2020-04-09 17:52:51'),
(1211, 'categories', 'name', 2288, 'ar', 'WiFi Products', '2020-04-09 17:53:42', '2020-04-09 17:53:42'),
(1212, 'categories', 'name', 2277, 'ar', 'Front-end Equipment', '2020-04-09 17:56:23', '2020-04-09 17:56:23'),
(1213, 'categories', 'name', 2278, 'ar', 'GPS', '2020-04-09 17:57:30', '2020-04-09 17:57:30'),
(1214, 'categories', 'name', 2289, 'ar', 'Other Communication Products', '2020-04-09 17:59:17', '2020-04-09 17:59:17'),
(1215, 'categories', 'name', 2290, 'ar', 'Baby Crib', '2020-04-09 18:00:22', '2020-04-09 18:00:22'),
(1216, 'categories', 'name', 2291, 'ar', 'Kids Bed', '2020-04-09 18:01:35', '2020-04-09 18:01:35'),
(1217, 'categories', 'name', 2292, 'ar', 'Kids Wardrobe', '2020-04-09 18:02:16', '2020-04-09 18:02:16'),
(1218, 'categories', 'name', 2293, 'ar', 'Kids Cabinet', '2020-04-09 18:03:11', '2020-04-09 18:03:11'),
(1219, 'categories', 'name', 2294, 'ar', 'Kids Dining Chair', '2020-04-09 18:03:42', '2020-04-09 18:03:42'),
(1220, 'categories', 'name', 2295, 'ar', 'Kids Chair', '2020-04-09 18:04:18', '2020-04-09 18:04:18'),
(1221, 'categories', 'name', 2296, 'ar', 'Kids Sofa', '2020-04-09 18:04:48', '2020-04-09 18:04:48'),
(1222, 'categories', 'name', 2297, 'ar', 'Kids Table', '2020-04-09 18:05:28', '2020-04-09 18:05:28'),
(1223, 'categories', 'name', 2298, 'ar', 'Baby Playpen', '2020-04-09 18:06:01', '2020-04-09 18:06:01'),
(1224, 'categories', 'name', 2299, 'ar', 'Kids Furniture Sets', '2020-04-09 18:06:43', '2020-04-09 18:06:43'),
(1225, 'categories', 'name', 2300, 'ar', 'Other Children & Baby Furniture', '2020-04-09 18:07:29', '2020-04-09 18:07:29'),
(1226, 'categories', 'name', 2301, 'ar', 'Bedroom Bed', '2020-04-09 18:08:01', '2020-04-09 18:08:01'),
(1227, 'categories', 'name', 2302, 'ar', 'Mattress', '2020-04-09 18:08:32', '2020-04-09 18:08:32'),
(1228, 'categories', 'name', 2303, 'ar', 'Nightstands', '2020-04-09 18:09:18', '2020-04-09 18:09:18'),
(1229, 'data_rows', 'display_name', 245, 'ar', 'Id', '2020-04-10 06:08:15', '2020-04-10 06:08:15'),
(1230, 'data_rows', 'display_name', 246, 'ar', 'Category Id', '2020-04-10 06:08:15', '2020-04-10 06:08:15'),
(1231, 'data_rows', 'display_name', 247, 'ar', 'Images', '2020-04-10 06:08:15', '2020-04-10 06:08:15'),
(1232, 'data_rows', 'display_name', 248, 'ar', 'Created At', '2020-04-10 06:08:15', '2020-04-10 06:08:15'),
(1233, 'data_rows', 'display_name', 249, 'ar', 'Updated At', '2020-04-10 06:08:15', '2020-04-10 06:08:15'),
(1234, 'data_rows', 'display_name', 250, 'ar', 'categories', '2020-04-10 06:08:15', '2020-04-10 06:08:15'),
(1235, 'data_types', 'display_name_singular', 34, 'ar', 'Slider', '2020-04-10 06:08:15', '2020-04-10 06:08:15'),
(1236, 'data_types', 'display_name_plural', 34, 'ar', 'Sliders', '2020-04-10 06:08:15', '2020-04-10 06:08:15'),
(1237, 'data_rows', 'display_name', 251, 'ar', 'categories', '2020-04-10 08:06:32', '2020-04-10 08:06:32'),
(1238, 'products', 'name', 60, 'ar', 'asd', NULL, NULL),
(1239, 'products', 'description', 60, 'ar', 'as', NULL, NULL),
(1240, 'categories', 'name', 149, 'ar', 'سيارات و موتوسيكلات', '2020-04-11 18:51:26', '2020-04-25 17:57:13'),
(1242, 'categories', 'name', 1, 'ar', 'كماليات سيارات', '2020-04-11 19:55:40', '2020-04-28 21:19:43'),
(1243, 'categories', 'name', 2, 'ar', 'اليكترونيات', '2020-04-11 19:57:46', '2020-04-25 16:23:52'),
(1244, 'categories', 'name', 130, 'ar', 'كمبيوتر', '2020-04-11 19:57:59', '2020-04-25 17:28:08'),
(1245, 'categories', 'name', 3, 'ar', 'أغذية', '2020-04-11 20:00:50', '2020-04-25 16:26:03'),
(1246, 'categories', 'name', 4, 'ar', 'الصحة و الطب', '2020-04-11 20:01:54', '2020-04-25 17:22:42'),
(1247, 'categories', 'name', 5, 'ar', 'الأمن و الحماية', '2020-04-11 20:02:56', '2020-04-25 16:44:27'),
(1248, 'categories', 'name', 125, 'ar', 'الملابس و الاكسسوارات', '2020-04-11 20:03:49', '2020-04-25 17:24:46'),
(1249, 'categories', 'name', 133, 'ar', 'حقائب و شنط', '2020-04-11 20:04:42', '2020-04-25 17:30:41'),
(1250, 'categories', 'name', 126, 'ar', 'أثاث', '2020-04-11 20:07:27', '2020-04-25 17:25:16'),
(1251, 'categories', 'name', 148, 'ar', 'منسوجات', '2020-04-11 20:07:48', '2020-04-25 17:54:31'),
(1252, 'categories', 'name', 129, 'ar', 'أدوات كهربائية', '2020-04-11 20:09:17', '2020-04-25 17:27:09'),
(1253, 'categories', 'name', 136, 'ar', 'اللمبات و أدوات الاضاءة ', '2020-04-11 20:09:30', '2020-04-25 17:36:03'),
(1254, 'categories', 'name', 131, 'ar', 'مصنوعات يدوية و هدايا', '2020-04-11 20:19:27', '2020-04-25 17:29:23'),
(1255, 'categories', 'name', 132, 'ar', 'مواد كيماوية', '2020-04-11 20:21:15', '2020-04-25 17:30:02'),
(1256, 'categories', 'name', 134, 'ar', 'الديكور و مواد البناء', '2020-04-11 20:22:58', '2020-04-25 17:35:31'),
(1257, 'categories', 'name', 469, 'ar', 'أحذية', '2020-04-12 02:30:25', '2020-04-29 22:24:48'),
(1258, 'categories', 'name', 470, 'ar', 'اكسسوارات ملابس', '2020-04-12 02:31:32', '2020-04-29 22:27:56'),
(1259, 'categories', 'name', 500, 'ar', 'أثاث زجاجي', '2020-04-12 02:49:36', '2020-04-29 22:48:18'),
(1260, 'categories', 'name', 499, 'ar', 'أثاث قماش', '2020-04-12 02:49:41', '2020-04-29 22:47:07'),
(1261, 'requests', 'name', 34, 'ar', 'as', NULL, NULL),
(1262, 'requests', 'description', 34, 'ar', 'as', NULL, NULL),
(1263, 'categories', 'name', 552, 'ar', 'أدوات تحكم كهربية', '2020-04-12 12:59:07', '2020-04-30 00:27:30'),
(1264, 'categories', 'name', 551, 'ar', 'Breaker & Protector', '2020-04-12 12:59:08', '2020-04-12 12:59:08'),
(1265, 'categories', 'name', 577, 'ar', 'معدات كهرومغناطيسية', '2020-04-12 18:39:31', '2020-04-30 02:35:29'),
(1266, 'products', 'name', 1, 'ar', 'asd', NULL, NULL),
(1267, 'products', 'description', 1, 'ar', 'as', NULL, NULL),
(1268, 'categories', 'name', 703, 'ar', 'دهانات و طلاء', '2020-04-13 16:09:11', '2020-04-30 05:06:56'),
(1269, 'categories', 'name', 723, 'ar', 'زيوت أساسية', '2020-04-13 16:16:40', '2020-04-30 05:35:37'),
(1270, 'categories', 'name', 780, 'ar', 'ملحقات شنط', '2020-04-13 16:38:21', '2020-04-30 06:39:29'),
(1271, 'categories', 'name', 858, 'ar', 'دراجة أطفال', '2020-04-13 19:18:02', '2020-04-30 08:11:43'),
(1272, 'categories', 'name', 859, 'ar', 'ألعاب بالريموت كنترول', '2020-04-13 19:18:07', '2020-04-30 08:12:43'),
(1273, 'categories', 'name', 860, 'ar', 'ألعاب سيارات', '2020-04-13 19:18:12', '2020-04-30 20:57:17'),
(1274, 'categories', 'name', 894, 'ar', 'لمبات و مصابيح', '2020-04-13 19:33:11', '2020-04-30 21:22:07'),
(1275, 'categories', 'name', 895, 'ar', 'لمبات مدمجة', '2020-04-13 19:34:04', '2020-04-30 21:22:53'),
(1276, 'categories', 'name', 984, 'ar', 'Machinery Stocks', '2020-04-13 21:40:54', '2020-04-13 21:40:54'),
(1277, 'categories', 'name', 983, 'ar', 'طابعة صناعية', '2020-04-13 21:40:59', '2020-04-30 22:40:26'),
(1278, 'categories', 'name', 982, 'ar', 'معدات صناعية اخري', '2020-04-13 21:41:03', '2020-04-30 22:34:49'),
(1279, 'categories', 'name', 1022, 'ar', 'مئزر مطبخ', '2020-04-13 22:01:39', '2020-04-30 23:04:35'),
(1280, 'categories', 'name', 1023, 'ar', 'بورسيلين', '2020-04-13 22:01:48', '2020-04-30 23:05:00'),
(1281, 'categories', 'name', 1024, 'ar', 'كاسات زجاج', '2020-04-13 22:01:56', '2020-04-30 23:05:48'),
(1282, 'categories', 'name', 1148, 'ar', 'لوحة تعليمية', '2020-04-13 22:52:02', '2020-05-01 03:55:01'),
(1283, 'categories', 'name', 1351, 'ar', 'قطع غيار موتوسيكلات', '2020-04-14 12:24:16', '2020-05-01 06:09:28'),
(1285, 'categories', 'name', 13, 'ar', 'اكسسوارات سيارات', '2020-04-14 13:38:05', '2020-04-28 21:19:11'),
(1286, 'categories', 'name', 14, 'ar', 'نظام تكييف للسيارة', '2020-04-14 13:40:29', '2020-04-28 21:23:15'),
(1287, 'categories', 'name', 15, 'ar', 'اليكترونيات السيارة', '2020-04-14 13:42:12', '2020-04-28 21:22:38'),
(1288, 'categories', 'name', 16, 'ar', 'مرايات للسيارة', '2020-04-14 13:46:51', '2020-04-28 21:24:07'),
(1289, 'categories', 'name', 17, 'ar', 'مشبك ونش للسيارة', '2020-04-14 13:48:45', '2020-04-28 21:26:55'),
(1290, 'categories', 'name', 18, 'ar', 'اطارات سيارات', '2020-04-14 13:50:18', '2020-04-28 21:27:16'),
(1291, 'categories', 'name', 19, 'ar', 'ونش للسيارة', '2020-04-14 13:52:06', '2020-04-28 21:27:42'),
(1292, 'categories', 'name', 20, 'ar', 'لوازم السيارات', '2020-04-14 13:53:17', '2020-04-28 21:28:33'),
(1293, 'categories', 'name', 21, 'ar', 'أنظمة كهربائية للسيارات', '2020-04-14 14:19:33', '2020-04-28 21:29:16'),
(1294, 'categories', 'name', 22, 'ar', 'هيكل محرك السيارات', '2020-04-14 14:20:55', '2020-04-28 21:30:22'),
(1295, 'categories', 'name', 23, 'ar', 'قطع غيار سيارات', '2020-04-14 14:22:05', '2020-04-28 21:30:57'),
(1296, 'categories', 'name', 24, 'ar', 'مساعدين للسيارات', '2020-04-14 14:24:09', '2020-04-28 21:31:30'),
(1297, 'categories', 'name', 25, 'ar', 'محرك للسيارات', '2020-04-14 14:25:27', '2020-04-28 21:32:05'),
(1298, 'categories', 'name', 26, 'ar', 'أدوات ومعدات لتصليح السيارات', '2020-04-14 14:26:36', '2020-04-28 21:32:48'),
(1299, 'categories', 'name', 29, 'ar', 'معدات محطات شحن', '2020-04-14 14:32:34', '2020-04-28 21:41:07'),
(1300, 'categories', 'name', 30, 'ar', 'أدوات أمان السيارات', '2020-04-14 14:34:12', '2020-04-28 21:41:45'),
(1301, 'categories', 'name', 31, 'ar', 'قفل للسيارة', '2020-04-14 14:35:28', '2020-04-28 21:42:14'),
(1302, 'categories', 'name', 32, 'ar', 'معدات أمان للطرق', '2020-04-14 14:36:33', '2020-04-28 21:44:09'),
(1303, 'categories', 'name', 33, 'ar', 'قطع غيار موتوسيكلات', '2020-04-14 14:37:20', '2020-04-28 21:45:13'),
(1304, 'categories', 'name', 34, 'ar', 'موتسيكل رياضي', '2020-04-14 14:38:00', '2020-04-28 21:46:02'),
(1305, 'categories', 'name', 35, 'ar', 'موتوسيكلات', '2020-04-14 14:38:45', '2020-04-28 21:47:02'),
(1306, 'categories', 'name', 36, 'ar', 'دراجة فيزبا', '2020-04-14 14:39:28', '2020-04-28 21:49:15'),
(1307, 'categories', 'name', 37, 'ar', 'قطع غيار أخري', '2020-04-14 14:39:39', '2020-04-28 21:58:51'),
(1308, 'categories', 'name', 38, 'ar', 'كهربية السيارة', '2020-04-14 14:40:47', '2020-04-28 21:54:32'),
(1309, 'categories', 'name', 39, 'ar', 'اتوبيسات', '2020-04-14 14:43:45', '2020-04-28 21:55:22'),
(1310, 'categories', 'name', 40, 'ar', 'سيارات', '2020-04-14 14:46:18', '2020-04-28 21:55:58'),
(1311, 'categories', 'name', 41, 'ar', 'معدات محطات الوقود', '2020-04-14 14:48:19', '2020-04-28 21:56:42'),
(1312, 'categories', 'name', 42, 'ar', 'جهاز جراج', '2020-04-14 14:50:33', '2020-04-28 21:57:24'),
(1313, 'categories', 'name', 43, 'ar', 'Secondhand Vehicle & Stocks', '2020-04-14 14:51:20', '2020-04-14 14:51:20'),
(1314, 'categories', 'name', 44, 'ar', 'شاحنات خاصة', '2020-04-14 14:52:15', '2020-04-28 22:01:40'),
(1315, 'categories', 'name', 45, 'ar', 'قطع غيار تريسكلات', '2020-04-14 14:52:41', '2020-04-28 22:02:12'),
(1316, 'categories', 'name', 46, 'ar', 'شاحنات', '2020-04-14 14:53:12', '2020-04-28 22:02:32'),
(1317, 'categories', 'name', 52, 'ar', 'أجهزة صوتية', '2020-04-14 14:54:32', '2020-04-28 22:05:05'),
(1318, 'categories', 'name', 53, 'ar', 'اسطوانات و شرائط', '2020-04-14 14:55:23', '2020-04-28 22:06:02'),
(1319, 'categories', 'name', 54, 'ar', 'أجهزة عرض', '2020-04-14 14:59:25', '2020-04-28 22:06:45'),
(1320, 'categories', 'name', 55, 'ar', 'سماعات', '2020-04-14 15:00:27', '2020-04-28 22:19:24'),
(1321, 'categories', 'name', 56, 'ar', 'كايلات', '2020-04-14 15:01:14', '2020-04-28 22:09:53'),
(1322, 'categories', 'name', 57, 'ar', 'اجهزة صوت محمولة', '2020-04-14 15:01:58', '2020-04-28 22:10:33'),
(1323, 'categories', 'name', 58, 'ar', 'شاشات تلفزيون', '2020-04-14 15:02:40', '2020-04-28 22:12:09'),
(1324, 'categories', 'name', 59, 'ar', 'فيديو', '2020-04-14 15:04:53', '2020-04-28 22:12:36'),
(1325, 'categories', 'name', 60, 'ar', 'طائرة Drone', '2020-04-14 15:05:54', '2020-04-28 22:13:51'),
(1326, 'categories', 'name', 61, 'ar', 'راديو', '2020-04-14 15:06:26', '2020-04-28 22:16:48'),
(1327, 'categories', 'name', 62, 'ar', 'مسجل صوت', '2020-04-14 15:08:00', '2020-04-28 22:18:18'),
(1328, 'categories', 'name', 63, 'ar', 'ريموت كونترول', '2020-04-14 15:08:37', '2020-04-28 22:22:31'),
(1329, 'categories', 'name', 64, 'ar', 'بطاريات', '2020-04-14 15:10:06', '2020-04-28 22:22:58'),
(1330, 'categories', 'name', 65, 'ar', 'اجهزة بلوتوث', '2020-04-14 15:10:41', '2020-04-28 22:23:26'),
(1331, 'categories', 'name', 66, 'ar', 'اليكترونيات ترفيهية', '2020-04-14 15:11:36', '2020-04-28 22:23:57'),
(1332, 'categories', 'name', 67, 'ar', 'موبايل و هاتف محمول', '2020-04-14 15:14:12', '2020-04-28 22:25:05'),
(1333, 'categories', 'name', 68, 'ar', 'معدات تصوير', '2020-04-14 15:15:25', '2020-04-28 22:25:32'),
(1334, 'categories', 'name', 69, 'ar', 'أجهزة اليكترونية شخصية', '2020-04-14 15:16:06', '2020-04-28 22:27:41'),
(1335, 'categories', 'name', 70, 'ar', 'شاحن و بطارية', '2020-04-14 15:16:58', '2020-04-28 22:27:06'),
(1337, 'categories', 'name', 72, 'ar', 'لابتوب', '2020-04-14 15:19:18', '2020-04-28 22:30:50'),
(1339, 'categories', 'name', 74, 'ar', 'كمبيوتر PDA', '2020-04-14 15:21:15', '2020-04-28 22:40:13'),
(1340, 'categories', 'name', 75, 'ar', 'شاشة اسكرين', '2020-04-14 15:21:56', '2020-04-28 22:35:41'),
(1341, 'categories', 'name', 76, 'ar', 'جراب تابلت', '2020-04-14 15:22:27', '2020-04-28 22:36:06'),
(1342, 'categories', 'name', 77, 'ar', 'تابلت كومبيوتر', '2020-04-14 15:23:52', '2020-04-28 22:36:52'),
(1343, 'categories', 'name', 78, 'ar', 'تليفون محمول', '2020-04-14 15:25:30', '2020-04-28 22:38:01'),
(1344, 'categories', 'name', 79, 'ar', 'ويكي توكي', '2020-04-14 15:26:07', '2020-04-28 22:39:14'),
(1345, 'categories', 'name', 80, 'ar', 'قارئ كتب اليكتروني', '2020-04-14 15:27:00', '2020-04-28 22:41:36'),
(1346, 'categories', 'name', 81, 'ar', 'تكييفات و مبردات', '2020-04-14 15:27:55', '2020-04-28 22:42:20'),
(1347, 'categories', 'name', 82, 'ar', 'مروحة كهربائية', '2020-04-14 15:28:42', '2020-04-28 22:42:56'),
(1348, 'categories', 'name', 83, 'ar', 'فلتر مياه', '2020-04-14 15:29:06', '2020-04-28 22:43:33'),
(1349, 'categories', 'name', 84, 'ar', 'أجهزة مطبخ', '2020-04-14 15:30:04', '2020-04-28 22:44:37'),
(1350, 'categories', 'name', 85, 'ar', 'ثلاجات و مبردات', '2020-04-14 15:31:00', '2020-04-28 22:55:48'),
(1351, 'categories', 'name', 86, 'ar', 'ادوات صالون كوافير', '2020-04-14 15:32:09', '2020-04-28 22:46:17'),
(1352, 'categories', 'name', 87, 'ar', 'سخانات', '2020-04-14 15:32:44', '2020-04-28 22:46:49'),
(1353, 'categories', 'name', 88, 'ar', 'سخانات غاز', '2020-04-14 15:33:30', '2020-04-28 22:49:50'),
(1354, 'categories', 'name', 89, 'ar', 'أجهزة تجميل', '2020-04-14 15:34:49', '2020-04-28 22:50:31'),
(1356, 'categories', 'name', 91, 'ar', 'غسالة صحون', '2020-04-14 15:38:07', '2020-04-28 22:51:15'),
(1357, 'categories', 'name', 92, 'ar', 'مكواة', '2020-04-14 15:39:32', '2020-04-28 22:53:20'),
(1358, 'categories', 'name', 93, 'ar', 'فرشاة اسنان كهربائية', '2020-04-14 15:40:07', '2020-04-28 22:53:50'),
(1359, 'categories', 'name', 94, 'ar', 'جهاز مبيد حشرات كهربي', '2020-04-14 15:41:02', '2020-04-28 22:54:31'),
(1360, 'categories', 'name', 95, 'ar', 'قطع غيار فلتر', '2020-04-14 15:41:41', '2020-04-28 22:56:20'),
(1361, 'categories', 'name', 96, 'ar', 'أجهزة عناية بالشعر', '2020-04-14 15:42:33', '2020-04-28 22:57:48'),
(1362, 'categories', 'name', 97, 'ar', 'مجفف يدين', '2020-04-14 15:43:00', '2020-04-28 22:58:15'),
(1363, 'categories', 'name', 98, 'ar', 'صاعق ناموس', '2020-04-14 15:43:29', '2020-04-28 22:58:34'),
(1364, 'categories', 'name', 99, 'ar', 'اناء صحي', '2020-04-14 15:47:23', '2020-04-28 22:59:08'),
(1365, 'categories', 'name', 100, 'ar', 'ماكينة حلاقة', '2020-04-14 15:47:57', '2020-04-28 23:00:08'),
(1366, 'categories', 'name', 101, 'ar', 'ألواح طاقة شمسية', '2020-04-14 15:48:57', '2020-04-28 23:00:42'),
(1367, 'categories', 'name', 102, 'ar', 'منظف بالبخار', '2020-04-14 15:49:28', '2020-04-28 23:05:23'),
(1368, 'categories', 'name', 103, 'ar', 'منظف', '2020-04-14 15:49:57', '2020-04-28 23:06:04'),
(1369, 'categories', 'name', 104, 'ar', 'مكنسة كهربائية', '2020-04-14 15:50:27', '2020-04-28 23:07:13'),
(1370, 'categories', 'name', 105, 'ar', 'جهاز تدفئة', '2020-04-14 15:50:51', '2020-04-28 23:08:41'),
(1371, 'categories', 'name', 106, 'ar', 'غسالة و مجفف', '2020-04-14 15:51:34', '2020-04-28 23:09:05'),
(1372, 'categories', 'name', 107, 'ar', 'الكترونيات تجارية و صرافة', '2020-04-14 15:54:19', '2020-04-28 23:09:47'),
(1373, 'categories', 'name', 108, 'ar', 'طابعة و فاكس', '2020-04-14 15:55:12', '2020-04-29 00:40:37'),
(1374, 'categories', 'name', 109, 'ar', 'آلة حاسبة', '2020-04-14 15:55:39', '2020-04-29 00:41:09'),
(1375, 'categories', 'name', 110, 'ar', 'ساعات', '2020-04-14 15:56:20', '2020-04-29 00:41:41'),
(1376, 'categories', 'name', 111, 'ar', 'أجهزة مؤتمرات', '2020-04-14 15:56:52', '2020-04-29 00:44:33'),
(1377, 'categories', 'name', 112, 'ar', 'طابعات', '2020-04-14 15:57:22', '2020-04-29 00:44:58'),
(1378, 'categories', 'name', 113, 'ar', 'جهاز فاكس', '2020-04-14 15:57:47', '2020-04-29 00:45:32'),
(1379, 'categories', 'name', 114, 'ar', 'اليكترونيات للمكتب', '2020-04-14 15:58:23', '2020-04-29 00:46:08'),
(1380, 'categories', 'name', 115, 'ar', 'الة تقطيع ورق', '2020-04-14 15:59:09', '2020-04-29 00:47:31'),
(1381, 'categories', 'name', 116, 'ar', 'لوازم طابعات', '2020-04-14 16:00:20', '2020-04-29 04:44:41'),
(1382, 'categories', 'name', 117, 'ar', 'آلة عرض بروجكتر', '2020-04-14 16:16:21', '2020-04-29 00:50:15'),
(1383, 'categories', 'name', 118, 'ar', 'ماسح ضوئي', '2020-04-14 16:17:01', '2020-04-29 00:50:40'),
(1384, 'categories', 'name', 119, 'ar', 'بطاقات حضور و انصراف', '2020-04-14 16:17:33', '2020-04-29 00:51:56'),
(1385, 'categories', 'name', 120, 'ar', 'عداد مؤقت', '2020-04-14 16:18:10', '2020-04-29 00:52:28'),
(1386, 'categories', 'name', 121, 'ar', 'نظام ترحيل لاسلكى', '2020-04-14 16:18:42', '2020-04-29 00:53:11'),
(1387, 'categories', 'name', 122, 'ar', 'Consumer Electronics Stocks', '2020-04-14 16:20:56', '2020-04-14 16:20:56'),
(1389, 'categories', 'name', 124, 'ar', 'اجهزة اليكترونية أخري', '2020-04-14 16:22:53', '2020-04-29 04:46:53'),
(1390, 'categories', 'name', 315, 'ar', 'خضروات', '2020-04-14 16:25:35', '2020-04-29 04:45:04'),
(1391, 'categories', 'name', 316, 'ar', 'بقوليات', '2020-04-14 16:26:39', '2020-04-29 04:49:02'),
(1392, 'categories', 'name', 317, 'ar', 'حبوب', '2020-04-14 16:27:32', '2020-04-29 04:49:36');
INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1393, 'categories', 'name', 318, 'ar', 'البن والقهوة', '2020-04-14 16:28:20', '2020-04-29 04:49:57'),
(1394, 'categories', 'name', 319, 'ar', 'فاكهة مجففة', '2020-04-14 16:29:57', '2020-04-29 04:50:19'),
(1395, 'categories', 'name', 320, 'ar', 'خضروات مجهزة', '2020-04-14 16:32:36', '2020-04-29 04:52:09'),
(1396, 'categories', 'name', 321, 'ar', 'فطر عيش الغراب', '2020-04-14 16:33:37', '2020-04-29 04:54:25'),
(1397, 'categories', 'name', 322, 'ar', 'دقيق', '2020-04-14 16:35:21', '2020-04-29 04:54:51'),
(1398, 'categories', 'name', 323, 'ar', 'بذور نباتات', '2020-04-14 16:36:19', '2020-04-29 04:55:23'),
(1399, 'categories', 'name', 324, 'ar', 'فاكهة', '2020-04-14 16:37:00', '2020-04-29 04:57:32'),
(1400, 'categories', 'name', 325, 'ar', 'جوز و لوز', '2020-04-14 16:37:32', '2020-04-29 04:58:16'),
(1401, 'categories', 'name', 326, 'ar', 'فواكه محفوظة و معلبة', '2020-04-14 16:39:43', '2020-04-29 04:59:01'),
(1402, 'categories', 'name', 327, 'ar', 'بذور زراعية', '2020-04-14 16:41:23', '2020-04-29 05:00:03'),
(1403, 'categories', 'name', 328, 'ar', 'شاي', '2020-04-14 16:42:35', '2020-04-29 05:00:30'),
(1404, 'categories', 'name', 329, 'ar', 'لحوم ', '2020-04-14 16:45:02', '2020-04-29 05:00:51'),
(1405, 'categories', 'name', 330, 'ar', 'أسماك', '2020-04-14 16:47:00', '2020-04-29 05:01:17'),
(1406, 'categories', 'name', 331, 'ar', 'منتجات الألبان', '2020-04-14 16:47:38', '2020-04-29 05:02:22'),
(1407, 'categories', 'name', 332, 'ar', 'بيض', '2020-04-14 16:48:43', '2020-04-29 05:03:16'),
(1408, 'categories', 'name', 333, 'ar', 'أعلاف خضراء', '2020-04-14 16:49:34', '2020-04-29 05:05:49'),
(1409, 'categories', 'name', 334, 'ar', 'عسل نحل', '2020-04-14 16:49:58', '2020-04-29 05:06:08'),
(1410, 'categories', 'name', 335, 'ar', 'اللحوم', '2020-04-14 16:50:33', '2020-04-29 05:06:26'),
(1411, 'categories', 'name', 336, 'ar', 'طعام حيوانات', '2020-04-14 16:51:55', '2020-04-29 05:07:27'),
(1412, 'categories', 'name', 337, 'ar', 'دواجن', '2020-04-14 16:52:58', '2020-04-29 05:07:49'),
(1413, 'categories', 'name', 338, 'ar', 'اضافات غذائية', '2020-04-14 16:53:44', '2020-04-29 05:08:22'),
(1415, 'categories', 'name', 341, 'ar', 'مشروبات', '2020-04-14 16:57:49', '2020-04-29 05:11:14'),
(1416, 'categories', 'name', 342, 'ar', 'طعام معلب', '2020-04-14 17:46:15', '2020-04-29 05:11:34'),
(1417, 'categories', 'name', 343, 'ar', 'بهارات و توابل', '2020-04-14 17:47:42', '2020-04-29 05:11:57'),
(1418, 'categories', 'name', 344, 'ar', 'زيت و سمن', '2020-04-14 17:48:35', '2020-04-29 05:13:01'),
(1419, 'categories', 'name', 345, 'ar', 'اضافات مغذية', '2020-04-14 17:51:00', '2020-04-29 05:13:39'),
(1420, 'categories', 'name', 346, 'ar', 'مخزون مواد غذائية', '2020-04-14 17:51:46', '2020-04-29 05:14:46'),
(1421, 'categories', 'name', 347, 'ar', 'أغذية مجمدة', '2020-04-14 17:52:33', '2020-04-29 05:15:10'),
(1422, 'categories', 'name', 348, 'ar', 'أغذية صحية', '2020-04-14 17:53:17', '2020-04-29 05:15:31'),
(1423, 'categories', 'name', 349, 'ar', 'مثلجات', '2020-04-14 17:54:31', '2020-04-29 05:19:16'),
(1424, 'categories', 'name', 350, 'ar', 'طعام أطفال رضع', '2020-04-14 17:55:26', '2020-04-29 05:19:47'),
(1425, 'categories', 'name', 351, 'ar', 'طعام معلب', '2020-04-14 17:56:06', '2020-04-29 05:20:16'),
(1426, 'categories', 'name', 352, 'ar', 'طعام organic', '2020-04-14 18:04:53', '2020-04-29 05:21:48'),
(1427, 'categories', 'name', 353, 'ar', 'New-type Food', '2020-04-14 18:05:35', '2020-04-14 18:05:35'),
(1428, 'categories', 'name', 354, 'ar', 'وجبات خفيفة', '2020-04-14 18:06:26', '2020-04-29 05:23:47'),
(1429, 'categories', 'name', 355, 'ar', 'توابل', '2020-04-14 18:07:06', '2020-04-29 05:24:01'),
(1430, 'categories', 'name', 356, 'ar', 'نشاء', '2020-04-14 18:08:11', '2020-04-29 05:24:28'),
(1431, 'categories', 'name', 357, 'ar', 'حلويات و سكريات', '2020-04-14 18:09:14', '2020-04-29 05:25:29'),
(1432, 'categories', 'name', 358, 'ar', 'خميرة و مخبوزات', '2020-04-14 18:18:14', '2020-04-29 05:25:48'),
(1433, 'categories', 'name', 366, 'ar', 'سماد زراعي', '2020-04-14 18:19:22', '2020-04-29 05:26:11'),
(1434, 'categories', 'name', 367, 'ar', 'مواد عضوية زراعية', '2020-04-14 18:20:08', '2020-04-29 05:27:02'),
(1435, 'categories', 'name', 368, 'ar', 'أسمدة', '2020-04-14 18:20:58', '2020-04-29 05:27:52'),
(1436, 'categories', 'name', 369, 'ar', 'بيوت زجاجية و معدات مزرعة', '2020-04-14 18:28:17', '2020-04-29 05:28:36'),
(1437, 'categories', 'name', 370, 'ar', 'آلات زراعية', '2020-04-14 18:29:02', '2020-04-29 05:29:07'),
(1438, 'categories', 'name', 371, 'ar', 'أدوات بساتين', '2020-04-14 18:29:37', '2020-04-29 05:30:33'),
(1439, 'categories', 'name', 372, 'ar', 'Machinery for Food, Beverage & Cereal', '2020-04-14 18:30:11', '2020-04-29 05:31:45'),
(1440, 'categories', 'name', 373, 'ar', 'لوازم زراعية أخري', '2020-04-14 18:31:50', '2020-04-29 05:32:44'),
(1441, 'categories', 'name', 374, 'ar', 'منتجات بيولوجية', '2020-04-14 18:32:46', '2020-04-29 05:33:10'),
(1442, 'categories', 'name', 375, 'ar', 'كيماويات صيدلية', '2020-04-14 18:37:31', '2020-04-29 05:33:59'),
(1443, 'categories', 'name', 376, 'ar', 'تجهيزات صيدلانية', '2020-04-14 18:38:08', '2020-04-29 05:34:44'),
(1444, 'categories', 'name', 377, 'ar', 'مخزون صيدليات', '2020-04-14 18:38:39', '2020-04-29 05:35:17'),
(1445, 'categories', 'name', 378, 'ar', 'Prepared Chinese Medicine', '2020-04-14 18:41:31', '2020-04-14 18:41:31'),
(1446, 'categories', 'name', 379, 'ar', 'Sap & Extract', '2020-04-14 18:42:57', '2020-04-14 18:42:57'),
(1447, 'categories', 'name', 380, 'ar', 'Western Medicine', '2020-04-14 18:45:34', '2020-04-14 18:45:34'),
(1448, 'categories', 'name', 389, 'ar', 'أجهزة تجميل', '2020-04-14 18:45:55', '2020-04-29 05:46:27'),
(1449, 'categories', 'name', 390, 'ar', 'أجهزة رعاية صحية', '2020-04-14 18:46:35', '2020-04-29 05:47:04'),
(1450, 'categories', 'name', 391, 'ar', 'أجهزة Massage', '2020-04-14 18:47:17', '2020-04-29 05:51:26'),
(1451, 'categories', 'name', 392, 'ar', 'مستلزمات العلاج التأهيلي', '2020-04-14 18:47:54', '2020-04-29 05:49:49'),
(1452, 'categories', 'name', 394, 'ar', 'سكوتر لذوى الاحتياجات الخاصة', '2020-04-14 18:49:21', '2020-04-29 05:53:10'),
(1453, 'categories', 'name', 395, 'ar', 'أغذية صحية', '2020-04-14 18:49:35', '2020-04-29 05:57:33'),
(1454, 'categories', 'name', 396, 'ar', 'أدوية تخسيس', '2020-04-14 18:51:52', '2020-04-29 05:58:04'),
(1455, 'categories', 'name', 397, 'ar', 'أجهزة و لوازم طب أسنان', '2020-04-14 18:52:33', '2020-04-29 05:58:41'),
(1456, 'categories', 'name', 398, 'ar', 'معدات طبية', '2020-04-14 18:53:09', '2020-04-29 05:59:40'),
(1457, 'categories', 'name', 399, 'ar', 'لوازم طبية', '2020-04-14 18:54:36', '2020-04-29 06:01:14'),
(1458, 'categories', 'name', 400, 'ar', 'مهمات طبية', '2020-04-14 18:57:52', '2020-04-29 06:02:09'),
(1461, 'categories', 'name', 402, 'ar', 'أثاث مستشفيات', '2020-04-14 19:00:54', '2020-04-29 06:02:37'),
(1462, 'categories', 'name', 403, 'ar', 'منتجات الحماية من الأشعة الطبية', '2020-04-14 19:02:43', '2020-04-29 06:05:46'),
(1463, 'categories', 'name', 405, 'ar', 'طب بيطري', '2020-04-14 19:05:44', '2020-04-29 06:11:24'),
(1464, 'categories', 'name', 406, 'ar', 'كبسولات فارغة', '2020-04-14 19:07:06', '2020-04-29 06:11:45'),
(1466, 'categories', 'name', 408, 'ar', 'تغليف أدوية', '2020-04-14 19:10:05', '2020-04-29 06:14:05'),
(1469, 'categories', 'name', 411, 'ar', 'IVD', '2020-04-14 19:12:53', '2020-04-14 19:12:53'),
(1470, 'categories', 'name', 412, 'ar', 'المعدات والآلات الصيدلانية', '2020-04-14 19:13:42', '2020-04-29 06:19:25'),
(1471, 'categories', 'name', 413, 'ar', 'نظام التحكم بالدخول', '2020-04-14 19:14:10', '2020-04-29 06:19:46'),
(1472, 'categories', 'name', 414, 'ar', 'أجهزة مراقبة', '2020-04-14 19:16:26', '2020-04-29 06:20:38'),
(1473, 'categories', 'name', 415, 'ar', 'Lock', '2020-04-14 19:18:27', '2020-04-29 06:22:30'),
(1474, 'categories', 'name', 416, 'ar', 'بطاقات حضور و انصراف', '2020-04-14 19:18:41', '2020-04-29 06:24:02'),
(1475, 'categories', 'name', 417, 'ar', 'أجهزة حضور و انصراف', '2020-04-14 19:19:45', '2020-04-29 06:24:30'),
(1476, 'categories', 'name', 418, 'ar', 'أنظمة الإنذار والأمن', '2020-04-14 19:20:32', '2020-04-29 06:24:58'),
(1477, 'categories', 'name', 419, 'ar', 'طفايات حريق', '2020-04-14 19:22:44', '2020-04-29 06:26:45'),
(1478, 'categories', 'name', 420, 'ar', 'ضوء الطوارئ وضوء المؤشر', '2020-04-14 19:24:21', '2020-04-29 06:27:28'),
(1479, 'categories', 'name', 423, 'ar', 'أمان الطرق', '2020-04-14 19:26:38', '2020-04-29 06:28:20'),
(1480, 'categories', 'name', 424, 'ar', 'مجموعة أمان للسيارة', '2020-04-14 19:27:46', '2020-04-29 06:30:20'),
(1481, 'categories', 'name', 425, 'ar', 'معدات انقاذ', '2020-04-14 19:28:33', '2020-04-29 06:31:07'),
(1482, 'categories', 'name', 426, 'ar', 'مستلزمات سلامة مهنية', '2020-04-14 19:29:22', '2020-04-29 06:31:41'),
(1483, 'categories', 'name', 427, 'ar', 'ماكينات كشف تزوير', '2020-04-14 19:30:18', '2020-04-29 06:32:06'),
(1484, 'categories', 'name', 428, 'ar', 'Anti-Static', '2020-04-14 19:30:58', '2020-04-14 19:30:58'),
(1485, 'categories', 'name', 429, 'ar', 'خزنة', '2020-04-14 19:31:45', '2020-04-29 06:33:32'),
(1486, 'categories', 'name', 431, 'ar', 'Other Safety Products', '2020-04-14 19:34:29', '2020-04-29 06:35:15'),
(1487, 'categories', 'name', 430, 'ar', 'معدات أمن و حراسة', '2020-04-14 19:36:22', '2020-04-29 06:34:26'),
(1488, 'categories', 'name', 432, 'ar', 'أحزمة و اكسسوارات', '2020-04-14 19:37:52', '2020-04-29 06:36:42'),
(1489, 'categories', 'name', 433, 'ar', 'تيشرت', '2020-04-14 19:38:57', '2020-04-29 06:36:59'),
(1490, 'categories', 'name', 434, 'ar', 'Apparel Stocks', '2020-04-14 19:42:42', '2020-04-14 19:42:42'),
(1491, 'categories', 'name', 435, 'ar', 'ملابس أطفال', '2020-04-14 19:43:49', '2020-04-29 06:37:20'),
(1492, 'categories', 'name', 436, 'ar', 'ملابس شتوي', '2020-04-14 19:44:37', '2020-04-29 06:37:34'),
(1493, 'categories', 'name', 437, 'ar', 'فساتين', '2020-04-14 19:49:00', '2020-04-29 06:38:01'),
(1494, 'categories', 'name', 439, 'ar', 'ملابس أطفال رضع', '2020-04-14 19:51:29', '2020-04-29 06:42:14'),
(1495, 'categories', 'name', 440, 'ar', 'جاكت', '2020-04-14 19:52:10', '2020-04-29 06:42:31'),
(1496, 'categories', 'name', 441, 'ar', 'Jeans', '2020-04-14 19:53:59', '2020-04-14 19:53:59'),
(1497, 'categories', 'name', 442, 'ar', 'ملابس تريكو', '2020-04-14 19:56:36', '2020-04-29 06:43:56'),
(1498, 'categories', 'name', 443, 'ar', 'ملابس جلد', '2020-04-14 19:57:14', '2020-04-29 06:44:22'),
(1499, 'categories', 'name', 444, 'ar', 'ملابس داخلية', '2020-04-14 19:58:06', '2020-04-29 06:44:40'),
(1500, 'categories', 'name', 445, 'ar', 'ملابس منزلية', '2020-04-14 20:00:10', '2020-04-29 06:45:11'),
(1501, 'categories', 'name', 446, 'ar', 'ملابس خروج', '2020-04-14 20:00:51', '2020-04-29 06:45:40'),
(1503, 'categories', 'name', 448, 'ar', 'بنطلون', '2020-04-14 20:06:44', '2020-04-29 06:47:22'),
(1504, 'categories', 'name', 449, 'ar', 'قميص', '2020-04-14 20:08:40', '2020-04-29 06:48:10'),
(1505, 'categories', 'name', 450, 'ar', 'قماش ', '2020-04-14 20:10:35', '2020-04-29 06:49:30'),
(1506, 'categories', 'name', 438, 'ar', 'معطف', '2020-04-14 20:12:09', '2020-04-29 06:41:53'),
(1507, 'categories', 'name', 451, 'ar', 'تنورة', '2020-04-14 20:14:01', '2020-04-29 06:50:17'),
(1508, 'categories', 'name', 453, 'ar', 'ملابس رياضية', '2020-04-14 20:17:33', '2020-04-29 06:52:02'),
(1509, 'categories', 'name', 454, 'ar', 'بدل', '2020-04-14 20:18:22', '2020-04-29 06:52:18'),
(1510, 'categories', 'name', 455, 'ar', 'سترة', '2020-04-14 20:21:11', '2020-04-29 06:52:35'),
(1511, 'categories', 'name', 458, 'ar', 'ملابس أخري', '2020-04-14 20:25:53', '2020-04-29 06:55:23'),
(1512, 'categories', 'name', 456, 'ar', 'فانلات', '2020-04-14 20:26:44', '2020-04-29 06:54:40'),
(1513, 'categories', 'name', 457, 'ar', 'بدلة Vest', '2020-04-14 20:28:22', '2020-04-29 06:55:10'),
(1514, 'categories', 'name', 459, 'ar', 'ملابس سلامة و أمان', '2020-04-14 20:31:49', '2020-04-29 06:56:38'),
(1515, 'categories', 'name', 460, 'ar', 'أطقم عمل', '2020-04-14 20:33:01', '2020-04-29 06:58:33'),
(1516, 'categories', 'name', 461, 'ar', 'فساتين زفاف', '2020-04-14 20:34:40', '2020-04-29 06:59:00'),
(1517, 'categories', 'name', 462, 'ar', 'مئزر مطبخ', '2020-04-14 20:35:20', '2020-04-29 06:59:22'),
(1518, 'categories', 'name', 463, 'ar', 'ملابس شعبية خاصة', '2020-04-14 20:40:42', '2020-04-29 07:00:44'),
(1519, 'categories', 'name', 465, 'ar', 'أزياء ترفيهية', '2020-04-14 21:21:08', '2020-04-29 07:02:14'),
(1520, 'categories', 'name', 467, 'ar', 'قبعات', '2020-04-14 21:22:14', '2020-04-29 22:23:28'),
(1521, 'categories', 'name', 466, 'ar', 'قفازات', '2020-04-14 21:22:48', '2020-04-29 22:23:14'),
(1522, 'categories', 'name', 468, 'ar', 'وشاح و كوفية Scarf', '2020-04-14 21:24:14', '2020-04-29 22:24:29'),
(1523, 'categories', 'name', 471, 'ar', 'حقيبة ملابس', '2020-04-14 21:30:12', '2020-04-29 22:28:18'),
(1524, 'categories', 'name', 472, 'ar', 'تيكت ملابس', '2020-04-14 21:32:55', '2020-04-29 22:28:45'),
(1525, 'categories', 'name', 473, 'ar', 'علامة توكيل ملابس', '2020-04-14 21:34:01', '2020-04-29 22:29:15'),
(1526, 'categories', 'name', 474, 'ar', 'مانيكان عرض أزياء', '2020-04-14 21:35:03', '2020-04-29 22:30:26'),
(1527, 'categories', 'name', 475, 'ar', 'ربطة عنق و كاريفتات', '2020-04-14 21:35:35', '2020-04-29 22:30:54'),
(1528, 'categories', 'name', 476, 'ar', 'شريط عنق', '2020-04-14 21:38:08', '2020-04-29 22:34:05'),
(1531, 'categories', 'name', 479, 'ar', 'أثاث أطفال', '2020-04-14 21:52:55', '2020-04-29 22:34:25'),
(1532, 'categories', 'name', 483, 'ar', 'صالون و غرف طعام', '2020-04-14 21:53:31', '2020-04-29 22:36:37'),
(1533, 'categories', 'name', 482, 'ar', 'أثاث مطبخ', '2020-04-14 21:55:39', '2020-04-29 22:35:45'),
(1534, 'categories', 'name', 481, 'ar', 'أثاث حمام', '2020-04-14 21:56:24', '2020-04-29 22:35:31'),
(1535, 'categories', 'name', 480, 'ar', 'غرف نوم', '2020-04-14 21:56:54', '2020-04-29 22:33:09'),
(1536, 'categories', 'name', 484, 'ar', 'أنتريه و غرف معيشة', '2020-04-14 22:02:17', '2020-04-29 22:36:59'),
(1537, 'categories', 'name', 485, 'ar', 'أثاث مدخل و طرقة', '2020-04-14 22:03:00', '2020-04-29 22:38:11'),
(1538, 'categories', 'name', 486, 'ar', 'اثاث مكتب منزلي', '2020-04-14 22:04:18', '2020-04-29 22:38:45'),
(1539, 'categories', 'name', 487, 'ar', 'أثاث استراحات', '2020-04-14 22:05:03', '2020-04-29 22:39:17'),
(1540, 'categories', 'name', 488, 'ar', 'أثاث فنادق', '2020-04-14 22:05:36', '2020-04-29 22:39:33'),
(1541, 'categories', 'name', 489, 'ar', 'أثاث مطاعم', '2020-04-14 22:08:10', '2020-04-29 22:41:21'),
(1542, 'categories', 'name', 490, 'ar', 'أثاث مكتبي', '2020-04-14 22:08:41', '2020-04-29 22:41:40'),
(1543, 'categories', 'name', 491, 'ar', 'أثاث مدرسي', '2020-04-14 22:09:25', '2020-04-29 22:41:57'),
(1544, 'categories', 'name', 492, 'ar', 'أثاث معامل', '2020-04-14 22:10:43', '2020-04-29 22:42:10'),
(1545, 'categories', 'name', 493, 'ar', 'أثاث مكتبة', '2020-04-14 22:11:25', '2020-04-29 22:43:18'),
(1546, 'categories', 'name', 494, 'ar', 'أثاث كوافير', '2020-04-14 22:11:56', '2020-04-29 22:43:46'),
(1547, 'categories', 'name', 495, 'ar', 'اثاث محلات', '2020-04-14 22:13:11', '2020-04-29 22:44:04'),
(1548, 'categories', 'name', 496, 'ar', 'أثاث مستشفيات', '2020-04-14 22:14:57', '2020-04-29 22:45:28'),
(1549, 'categories', 'name', 497, 'ar', 'أثاث متنزهات', '2020-04-14 22:15:56', '2020-04-29 22:46:37'),
(1550, 'categories', 'name', 498, 'ar', 'أثاث تجاري', '2020-04-14 22:17:01', '2020-04-29 22:46:49'),
(1551, 'categories', 'name', 501, 'ar', 'أثاث خشب بامبو', '2020-04-14 22:21:06', '2020-04-29 22:48:44'),
(1552, 'categories', 'name', 502, 'ar', 'Leather Furniture', '2020-04-14 22:21:46', '2020-04-14 22:21:46'),
(1553, 'categories', 'name', 503, 'ar', 'أثاث معدني', '2020-04-14 22:24:32', '2020-04-29 22:49:20'),
(1554, 'categories', 'name', 504, 'ar', 'أثاث بلاستيك', '2020-04-14 22:24:56', '2020-04-29 22:50:11'),
(1555, 'categories', 'name', 505, 'ar', 'أثاث خوص روطان', '2020-04-14 22:25:59', '2020-04-29 22:50:36'),
(1556, 'categories', 'name', 506, 'ar', 'أثاث خشبي', '2020-04-14 22:26:27', '2020-04-29 22:50:52'),
(1557, 'categories', 'name', 508, 'ar', 'أثاث أنتيك و تحف', '2020-04-14 22:27:33', '2020-04-29 22:51:31'),
(1558, 'categories', 'name', 509, 'ar', 'أثاث حديث Modern', '2020-04-14 22:29:05', '2020-04-29 22:54:28'),
(1559, 'categories', 'name', 510, 'ar', 'أثاث كلاسيك', '2020-04-14 22:29:49', '2020-04-29 22:54:50'),
(1560, 'categories', 'name', 511, 'ar', 'أثاث ايطالي', '2020-04-14 22:30:30', '2020-04-29 22:55:05'),
(1561, 'categories', 'name', 512, 'ar', 'أثاث اوروبي', '2020-04-14 22:31:11', '2020-04-29 22:56:00'),
(1562, 'categories', 'name', 513, 'ar', 'كنبة', '2020-04-14 22:31:53', '2020-04-29 22:56:16'),
(1563, 'categories', 'name', 514, 'ar', 'طاولات و ترابيزات', '2020-04-14 22:33:16', '2020-04-29 22:56:42'),
(1564, 'categories', 'name', 515, 'ar', 'أثاث أرفف و رف', '2020-04-14 22:37:34', '2020-04-29 22:57:12'),
(1565, 'categories', 'name', 516, 'ar', 'لوازم أثاث', '2020-04-14 22:38:41', '2020-04-29 23:02:45'),
(1566, 'categories', 'name', 517, 'ar', 'اكسسوارات و أدوات أثاث', '2020-04-14 22:42:12', '2020-04-29 23:00:13'),
(1567, 'categories', 'name', 518, 'ar', 'مرايات منزلية', '2020-04-14 22:44:01', '2020-04-29 23:03:40'),
(1568, 'categories', 'name', 519, 'ar', 'أثاث قابل للطي', '2020-04-14 22:44:41', '2020-04-29 23:04:05'),
(1569, 'categories', 'name', 520, 'ar', 'ستارة خشب', '2020-04-14 22:45:24', '2020-04-29 23:06:30'),
(1570, 'categories', 'name', 521, 'ar', 'أثاث قابل للنفخ و الطي', '2020-04-14 22:46:44', '2020-04-29 23:07:22'),
(1571, 'categories', 'name', 522, 'ar', 'أثاث ضوئي LED', '2020-04-14 22:49:03', '2020-04-29 23:07:46'),
(1572, 'categories', 'name', 523, 'ar', 'Secondhand Furniture & Stocks', '2020-04-14 22:51:32', '2020-04-14 22:51:32'),
(1573, 'categories', 'name', 524, 'ar', 'ستائر', '2020-04-14 22:52:52', '2020-04-29 23:08:55'),
(1574, 'categories', 'name', 525, 'ar', 'أثاث أضافي', '2020-04-14 22:53:47', '2020-04-29 23:09:11'),
(1575, 'categories', 'name', 526, 'ar', 'سلوك كابلات', '2020-04-14 22:55:13', '2020-04-29 23:09:39'),
(1576, 'categories', 'name', 527, 'ar', 'لوحة دائرة كهربائية', '2020-04-14 22:55:52', '2020-04-29 23:11:05'),
(1577, 'categories', 'name', 528, 'ar', 'موصلات كهربية', '2020-04-14 22:56:34', '2020-04-29 23:11:28'),
(1578, 'categories', 'name', 529, 'ar', 'ترانزستور', '2020-04-14 22:57:16', '2020-04-29 23:11:48'),
(1579, 'categories', 'name', 530, 'ar', 'محولات كهربية', '2020-04-14 22:58:43', '2020-04-29 23:12:09'),
(1580, 'categories', 'name', 531, 'ar', 'سينسور كهربي', '2020-04-14 22:59:21', '2020-04-30 00:09:46'),
(1581, 'categories', 'name', 532, 'ar', 'مكثف كهربي', '2020-04-14 23:01:24', '2020-04-30 00:12:24'),
(1582, 'categories', 'name', 533, 'ar', 'أدوات تنظيف كهربية', '2020-04-14 23:03:37', '2020-04-30 00:12:53'),
(1583, 'categories', 'name', 534, 'ar', 'Customized Service for Electronics', '2020-04-14 23:04:31', '2020-04-14 23:04:31'),
(1584, 'categories', 'name', 535, 'ar', 'مواد اتصال كهربي', '2020-04-14 23:05:13', '2020-04-30 00:13:49'),
(1585, 'categories', 'name', 536, 'ar', 'أقطاب كهربية', '2020-04-14 23:05:52', '2020-04-30 00:14:09'),
(1586, 'categories', 'name', 537, 'ar', 'اداة حث كهربي', '2020-04-14 23:06:32', '2020-04-30 00:14:32'),
(1587, 'categories', 'name', 538, 'ar', 'عازل كهربي', '2020-04-14 23:08:02', '2020-04-30 00:15:08'),
(1588, 'categories', 'name', 539, 'ar', 'دارة متكاملة', '2020-04-14 23:08:09', '2020-04-30 00:16:00'),
(1589, 'categories', 'name', 540, 'ar', 'شاشات  ضوئية مسطحة', '2020-04-14 23:08:35', '2020-04-30 00:17:00'),
(1590, 'categories', 'name', 541, 'ar', 'اضواء LED كهربية', '2020-04-14 23:11:58', '2020-04-30 00:17:48'),
(1591, 'categories', 'name', 542, 'ar', 'معالج فيديو', '2020-04-14 23:12:44', '2020-04-30 00:19:13'),
(1592, 'categories', 'name', 543, 'ar', 'دائرة مغناطيسية كهربية', '2020-04-14 23:14:02', '2020-04-30 00:19:42'),
(1593, 'categories', 'name', 544, 'ar', 'مذبذب كهربي', '2020-04-14 23:14:37', '2020-04-30 00:20:04'),
(1594, 'requests', 'name', 56, 'ar', 'as', NULL, NULL),
(1595, 'requests', 'description', 56, 'ar', 'as', NULL, NULL),
(1596, 'requests', 'name', 57, 'ar', 'as', NULL, NULL),
(1597, 'requests', 'description', 57, 'ar', 'as', NULL, NULL),
(1598, 'data_rows', 'display_name', 56, 'ar', 'Id', '2020-04-15 09:46:56', '2020-04-15 09:46:56'),
(1599, 'data_rows', 'display_name', 57, 'ar', 'Category Id', '2020-04-15 09:46:56', '2020-04-15 09:46:56'),
(1600, 'data_rows', 'display_name', 102, 'ar', 'User Id', '2020-04-15 09:46:56', '2020-04-15 09:46:56'),
(1601, 'data_rows', 'display_name', 58, 'ar', 'Name', '2020-04-15 09:46:56', '2020-04-15 09:46:56'),
(1602, 'data_rows', 'display_name', 60, 'ar', 'Description', '2020-04-15 09:46:56', '2020-04-15 09:46:56'),
(1603, 'data_rows', 'display_name', 61, 'ar', 'Price', '2020-04-15 09:46:56', '2020-04-15 09:46:56'),
(1604, 'data_rows', 'display_name', 62, 'ar', 'Created At', '2020-04-15 09:46:56', '2020-04-15 09:46:56'),
(1605, 'data_rows', 'display_name', 63, 'ar', 'Updated At', '2020-04-15 09:46:56', '2020-04-15 09:46:56'),
(1606, 'data_rows', 'display_name', 191, 'ar', 'Sale Price', '2020-04-15 09:46:56', '2020-04-15 09:46:56'),
(1607, 'data_rows', 'display_name', 192, 'ar', 'Status', '2020-04-15 09:46:56', '2020-04-15 09:46:56'),
(1608, 'data_rows', 'display_name', 193, 'ar', 'Images', '2020-04-15 09:46:56', '2020-04-15 09:46:56'),
(1609, 'data_rows', 'display_name', 126, 'ar', 'User', '2020-04-15 09:46:56', '2020-04-15 09:46:56'),
(1610, 'data_rows', 'display_name', 125, 'ar', 'Category', '2020-04-15 09:46:56', '2020-04-15 09:46:56'),
(1611, 'categories', 'name', 545, 'ar', 'مقاوم كهربي ريزستور', '2020-04-15 15:39:11', '2020-04-30 00:20:40'),
(1612, 'categories', 'name', 546, 'ar', 'ريزونيتور كهربي', '2020-04-15 15:41:14', '2020-04-30 00:22:32'),
(1613, 'categories', 'name', 547, 'ar', 'أشباه موصلات كهربية', '2020-04-15 15:41:50', '2020-04-30 00:22:59'),
(1614, 'categories', 'name', 548, 'ar', 'مرشح اشارة كهربي', '2020-04-15 15:42:25', '2020-04-30 00:23:15'),
(1615, 'categories', 'name', 549, 'ar', 'وحدة صوت', '2020-04-15 15:42:53', '2020-04-30 00:23:34'),
(1616, 'categories', 'name', 550, 'ar', 'مكبرات صوت', '2020-04-15 15:44:09', '2020-04-30 00:24:41'),
(1617, 'categories', 'name', 553, 'ar', 'عاكس انفرتر Inverter', '2020-04-15 15:45:55', '2020-04-30 00:27:54'),
(1618, 'categories', 'name', 554, 'ar', 'موزع طاقة كهربي', '2020-04-15 15:46:53', '2020-04-30 00:29:20'),
(1619, 'categories', 'name', 555, 'ar', 'جهاز ارسال كهربي', '2020-04-15 15:46:59', '2020-04-30 00:29:43'),
(1620, 'categories', 'name', 556, 'ar', 'نظام تحكم كهربي', '2020-04-15 15:48:22', '2020-04-30 00:30:13'),
(1621, 'categories', 'name', 557, 'ar', 'معدات كهربية خاصة', '2020-04-15 15:48:57', '2020-04-30 00:44:20'),
(1622, 'categories', 'name', 558, 'ar', 'محرك تردد متغير', '2020-04-15 15:49:48', '2020-04-30 00:45:13'),
(1623, 'categories', 'name', 559, 'ar', 'بطاريات كهربية', '2020-04-15 15:50:55', '2020-04-30 00:46:00'),
(1624, 'categories', 'name', 560, 'ar', 'محرك كهربي', '2020-04-15 15:53:01', '2020-04-30 00:46:42'),
(1625, 'categories', 'name', 561, 'ar', 'ألياف ضوئية و كابلات و أسلاك', '2020-04-15 15:53:47', '2020-04-30 00:47:36'),
(1626, 'categories', 'name', 562, 'ar', 'بطاقات حضور و انصراف', '2020-04-15 15:54:04', '2020-04-30 00:47:59'),
(1627, 'categories', 'name', 563, 'ar', 'مخرج كهربي', '2020-04-15 15:54:32', '2020-04-30 00:54:50'),
(1628, 'categories', 'name', 564, 'ar', 'مفتاح كهربي', '2020-04-15 15:55:21', '2020-04-30 00:48:45'),
(1629, 'categories', 'name', 565, 'ar', 'هوائي انتينا Antenna', '2020-04-15 15:56:07', '2020-04-30 00:49:34'),
(1630, 'categories', 'name', 566, 'ar', 'موفر طاقة', '2020-04-15 15:57:03', '2020-04-30 00:49:56'),
(1631, 'categories', 'name', 567, 'ar', 'محرك خطي كهربي', '2020-04-15 15:57:36', '2020-04-30 00:50:20'),
(1632, 'categories', 'name', 568, 'ar', 'قابس كهربي', '2020-04-15 15:58:04', '2020-04-30 00:55:14'),
(1633, 'categories', 'name', 569, 'ar', 'ريموت كنترول', '2020-04-15 15:58:32', '2020-04-30 00:52:48'),
(1634, 'categories', 'name', 570, 'ar', 'جى بي اس GPS', '2020-04-15 15:58:56', '2020-04-30 00:53:13'),
(1635, 'categories', 'name', 571, 'ar', 'أجهزة اتصالات و بث اشارة', '2020-04-15 15:59:47', '2020-04-30 00:53:43'),
(1636, 'categories', 'name', 572, 'ar', 'أنظمة الإنذار والأمن', '2020-04-15 16:00:12', '2020-04-30 00:56:50'),
(1637, 'categories', 'name', 573, 'ar', 'أجهزة فك تشفير', '2020-04-15 16:02:10', '2020-04-30 00:57:40'),
(1638, 'categories', 'name', 574, 'ar', 'جهاز تشفير', '2020-04-15 16:02:37', '2020-04-30 02:34:29'),
(1639, 'categories', 'name', 575, 'ar', 'راديو', '2020-04-15 16:05:02', '2020-04-30 02:34:46'),
(1641, 'categories', 'name', 578, 'ar', 'لوازم اليكترونيات', '2020-04-15 16:07:09', '2020-04-30 02:35:59'),
(1643, 'categories', 'name', 580, 'ar', 'أدوات كهربائية', '2020-04-15 16:10:49', '2020-04-30 02:36:55'),
(1644, 'categories', 'name', 581, 'ar', 'شاشة عرض LED كهربي', '2020-04-15 16:11:56', '2020-04-30 02:38:29'),
(1646, 'categories', 'name', 583, 'ar', 'عداد كهرباء', '2020-04-15 16:14:18', '2020-04-30 02:40:03'),
(1647, 'categories', 'name', 584, 'ar', 'عداد مؤقت تايمر', '2020-04-15 16:14:56', '2020-04-30 02:40:37'),
(1648, 'categories', 'name', 585, 'ar', 'أدوات كهربائية أخري', '2020-04-15 16:15:30', '2020-04-30 02:50:49'),
(1649, 'categories', 'name', 586, 'ar', 'مشغل ميمورى Reader', '2020-04-15 16:19:28', '2020-04-30 02:51:34'),
(1651, 'categories', 'name', 588, 'ar', 'لابتوب', '2020-04-15 16:20:54', '2020-04-30 02:53:00'),
(1652, 'categories', 'name', 589, 'ar', 'حامل لابتوب', '2020-04-15 16:21:46', '2020-04-30 02:53:29'),
(1653, 'categories', 'name', 590, 'ar', 'كمبيوتر PDA', '2020-04-15 16:25:40', '2020-04-30 02:53:57'),
(1654, 'categories', 'name', 591, 'ar', 'باور بانك', '2020-04-15 16:26:18', '2020-04-30 02:55:32'),
(1655, 'categories', 'name', 592, 'ar', 'مرقم', '2020-04-15 16:26:51', '2020-04-30 02:56:01'),
(1656, 'categories', 'name', 593, 'ar', 'جراب تابلت', '2020-04-15 16:27:00', '2020-04-30 02:56:13'),
(1657, 'categories', 'name', 594, 'ar', 'تابلت كومبيوتر', '2020-04-15 16:27:10', '2020-04-30 02:56:34'),
(1658, 'categories', 'name', 595, 'ar', 'كمبيوتر', '2020-04-15 16:27:52', '2020-04-30 02:57:16'),
(1659, 'categories', 'name', 596, 'ar', 'Embedded Computer & SCM', '2020-04-15 16:28:18', '2020-04-15 16:28:18'),
(1660, 'categories', 'name', 597, 'ar', 'ملحقات كمبيوتر', '2020-04-15 16:29:10', '2020-04-30 03:07:24'),
(1661, 'categories', 'name', 598, 'ar', 'محطات عمل و خوادم كمبيوتر', '2020-04-15 16:29:37', '2020-04-30 03:08:15'),
(1662, 'categories', 'name', 599, 'ar', 'وحدات معالجة CPU', '2020-04-15 16:30:02', '2020-04-30 03:09:08'),
(1663, 'categories', 'name', 600, 'ar', 'كيسة كمبيوتر', '2020-04-15 16:31:24', '2020-04-30 03:09:54'),
(1664, 'categories', 'name', 601, 'ar', 'مروحة كمبيوتر', '2020-04-15 16:32:22', '2020-04-30 03:10:17'),
(1665, 'categories', 'name', 602, 'ar', 'شاشة كمبيوتر', '2020-04-15 16:33:20', '2020-04-30 03:11:46'),
(1666, 'categories', 'name', 603, 'ar', 'بطاقة رسومات جرافيك', '2020-04-15 16:33:46', '2020-04-30 03:13:40'),
(1667, 'categories', 'name', 604, 'ar', 'لوحة الكمبيوتر الرئيسية', '2020-04-15 16:34:35', '2020-04-30 03:14:14'),
(1668, 'categories', 'name', 605, 'ar', 'مزود الطاقة', '2020-04-15 16:36:33', '2020-04-30 03:14:28'),
(1669, 'categories', 'name', 606, 'ar', 'مدخل صوت', '2020-04-15 16:36:57', '2020-04-30 03:21:04'),
(1670, 'categories', 'name', 607, 'ar', 'قرص صلب', '2020-04-15 16:37:46', '2020-04-30 03:21:51'),
(1671, 'categories', 'name', 608, 'ar', 'وسائل تخزين', '2020-04-15 16:38:16', '2020-04-30 03:22:13'),
(1672, 'categories', 'name', 609, 'ar', 'كارت ميموري', '2020-04-15 16:38:51', '2020-04-30 03:22:38'),
(1673, 'categories', 'name', 610, 'ar', 'مكبرات صوت', '2020-04-15 16:39:16', '2020-04-30 03:23:37'),
(1674, 'categories', 'name', 611, 'ar', 'أجهزة بلوتوث', '2020-04-15 16:39:33', '2020-04-30 03:23:52'),
(1675, 'categories', 'name', 612, 'ar', 'حقيبة كمبيوتر', '2020-04-15 16:40:55', '2020-04-30 03:24:12'),
(1676, 'categories', 'name', 613, 'ar', 'كابلات كمبيوتر', '2020-04-15 16:41:22', '2020-04-30 03:24:32'),
(1677, 'categories', 'name', 614, 'ar', 'سماعات', '2020-04-15 16:44:23', '2020-04-30 03:26:06'),
(1678, 'categories', 'name', 615, 'ar', 'لوحة مفاتيح', '2020-04-15 16:45:17', '2020-04-30 03:26:25'),
(1679, 'categories', 'name', 616, 'ar', 'فارة ماوس كمبيوتر', '2020-04-15 16:45:58', '2020-04-30 03:26:46'),
(1680, 'categories', 'name', 617, 'ar', 'مشاية فارة كمبيوتر', '2020-04-15 16:46:44', '2020-04-30 03:27:08'),
(1681, 'categories', 'name', 618, 'ar', 'كاميرا كمبيوتر', '2020-04-15 16:47:24', '2020-04-30 03:27:49'),
(1682, 'categories', 'name', 619, 'ar', 'شاشة اسكرين', '2020-04-15 16:48:55', '2020-04-30 03:28:22'),
(1683, 'categories', 'name', 620, 'ar', 'فلاشات', '2020-04-15 16:50:37', '2020-04-30 03:28:48'),
(1684, 'categories', 'name', 621, 'ar', 'أجهزة شبكات', '2020-04-15 16:52:11', '2020-04-30 03:31:39'),
(1685, 'categories', 'name', 622, 'ar', 'كابلات الياف ضوئية', '2020-04-15 16:53:04', '2020-04-30 03:33:55'),
(1686, 'categories', 'name', 623, 'ar', 'طابعات و فاكس', '2020-04-15 16:53:25', '2020-04-30 03:38:17'),
(1687, 'categories', 'name', 624, 'ar', 'حقيبة اسطوانات', '2020-04-15 16:54:17', '2020-04-30 03:35:03'),
(1688, 'categories', 'name', 625, 'ar', 'حقيبة كاميرا', '2020-04-15 16:55:17', '2020-04-30 03:36:23'),
(1690, 'categories', 'name', 627, 'ar', 'طابعة', '2020-04-15 16:56:21', '2020-04-30 03:36:51'),
(1691, 'categories', 'name', 628, 'ar', 'كاميرا ديجيتال', '2020-04-15 16:56:57', '2020-04-30 03:37:11'),
(1692, 'categories', 'name', 629, 'ar', 'إلكترونيات ترفيهية', '2020-04-15 21:48:31', '2020-04-30 03:39:16'),
(1693, 'categories', 'name', 630, 'ar', 'لوازم طابعات', '2020-04-15 21:49:35', '2020-04-30 03:40:23'),
(1694, 'categories', 'name', 631, 'ar', 'ماسح ضوئي', '2020-04-15 21:49:54', '2020-04-30 03:41:31'),
(1697, 'categories', 'name', 634, 'ar', 'حقيبة أجهزة اليكترونية', '2020-04-15 21:52:28', '2020-04-30 03:44:51'),
(1698, 'categories', 'name', 635, 'ar', 'اكسسوارات', '2020-04-15 21:53:58', '2020-04-30 03:45:29'),
(1699, 'categories', 'name', 636, 'ar', 'منتجات عناية بالشعر', '2020-04-15 21:54:31', '2020-04-30 03:45:59'),
(1700, 'categories', 'name', 637, 'ar', 'مجوهرات', '2020-04-15 21:55:10', '2020-04-30 03:46:16'),
(1701, 'categories', 'name', 638, 'ar', 'لوازم كوافير', '2020-04-15 21:56:03', '2020-04-30 03:48:28'),
(1702, 'categories', 'name', 639, 'ar', 'شمعدان', '2020-04-15 21:57:27', '2020-04-30 03:50:00'),
(1703, 'categories', 'name', 640, 'ar', 'لوازم احتفالات', '2020-04-15 21:58:04', '2020-04-30 04:05:11'),
(1704, 'categories', 'name', 641, 'ar', 'ألعاب نارية', '2020-04-15 21:58:59', '2020-04-30 04:05:26'),
(1705, 'categories', 'name', 642, 'ar', 'بطاقات معايدة', '2020-04-15 21:59:28', '2020-04-30 04:06:09'),
(1706, 'categories', 'name', 643, 'ar', 'اضواء زينة', '2020-04-15 22:00:08', '2020-04-30 04:07:01'),
(1707, 'categories', 'name', 644, 'ar', 'هدايا مضيئة', '2020-04-15 22:00:51', '2020-04-30 04:07:34'),
(1708, 'categories', 'name', 645, 'ar', 'مشغولات بلاستيك', '2020-04-15 22:01:31', '2020-04-30 04:09:19'),
(1709, 'categories', 'name', 646, 'ar', 'مشغولات من البامبو', '2020-04-15 22:02:04', '2020-04-30 04:08:41'),
(1710, 'categories', 'name', 647, 'ar', 'ميدالية كريستال', '2020-04-15 22:03:06', '2020-04-30 04:11:47'),
(1711, 'categories', 'name', 648, 'ar', 'مشغولات من ريش', '2020-04-15 22:03:44', '2020-04-30 04:12:13'),
(1712, 'categories', 'name', 649, 'ar', 'مشغولات زجاجية', '2020-04-15 22:04:21', '2020-04-30 04:12:32'),
(1713, 'categories', 'name', 650, 'ar', 'مشغولات حجرية', '2020-04-15 22:05:38', '2020-04-30 04:12:52'),
(1714, 'categories', 'name', 651, 'ar', 'غوايش', '2020-04-15 22:06:10', '2020-04-30 04:13:48'),
(1715, 'categories', 'name', 652, 'ar', 'مشغولات جلدية', '2020-04-15 22:23:48', '2020-04-30 04:14:01'),
(1716, 'categories', 'name', 653, 'ar', 'مشغولات معدنية', '2020-04-15 22:24:59', '2020-04-30 04:14:19'),
(1717, 'categories', 'name', 654, 'ar', 'مشغولات طبيعية', '2020-04-15 22:26:08', '2020-04-30 04:20:46'),
(1718, 'categories', 'name', 655, 'ar', 'مشغولات ورقية', '2020-04-15 22:26:38', '2020-04-30 04:21:02'),
(1719, 'categories', 'name', 656, 'ar', 'سيراميك و بورسلين', '2020-04-15 22:27:08', '2020-04-30 04:21:25'),
(1720, 'categories', 'name', 657, 'ar', 'فخار', '2020-04-15 22:27:54', '2020-04-30 04:21:43'),
(1721, 'categories', 'name', 658, 'ar', 'مشغولات مطرزة', '2020-04-15 22:28:42', '2020-04-30 04:22:07'),
(1722, 'categories', 'name', 659, 'ar', 'مشغولات غزل و نسيج', '2020-04-15 22:29:09', '2020-04-30 04:23:12'),
(1724, 'categories', 'name', 661, 'ar', 'صندوق ألوان', '2020-04-15 22:31:40', '2020-04-30 04:23:35'),
(1726, 'categories', 'name', 663, 'ar', 'سلسلة مفاتيح', '2020-04-15 22:32:49', '2020-04-30 04:24:01'),
(1727, 'categories', 'name', 664, 'ar', 'هدايا دعائية', '2020-04-15 22:33:33', '2020-04-30 04:24:28'),
(1728, 'categories', 'name', 665, 'ar', 'شارات و بادجات', '2020-04-15 22:35:48', '2020-04-30 04:24:52'),
(1729, 'categories', 'name', 666, 'ar', 'بالونات', '2020-04-15 22:36:30', '2020-04-30 04:25:52'),
(1730, 'categories', 'name', 667, 'ar', 'سلة', '2020-04-15 22:39:49', '2020-04-30 04:26:22'),
(1731, 'categories', 'name', 668, 'ar', 'ميداليات', '2020-04-15 22:40:15', '2020-04-30 04:26:33'),
(1732, 'categories', 'name', 669, 'ar', 'اكسسوارات موبايل', '2020-04-15 22:40:44', '2020-04-30 04:26:51'),
(1733, 'categories', 'name', 670, 'ar', 'ألبوم صور', '2020-04-15 22:41:19', '2020-04-30 04:27:05'),
(1734, 'categories', 'name', 671, 'ar', 'شرائط', '2020-04-15 22:42:47', '2020-04-30 04:28:37'),
(1736, 'categories', 'name', 673, 'ar', 'هدايا تذكارية', '2020-04-16 00:05:23', '2020-04-30 04:29:57'),
(1737, 'categories', 'name', 674, 'ar', 'ملصقات و ستيكارات', '2020-04-16 00:06:06', '2020-04-30 04:30:24'),
(1738, 'categories', 'name', 675, 'ar', 'أنتيكات', '2020-04-16 00:06:34', '2020-04-30 04:30:45'),
(1739, 'categories', 'name', 676, 'ar', 'تحف و مشغولات كلاسيكية', '2020-04-16 00:07:10', '2020-04-30 04:32:37'),
(1740, 'categories', 'name', 677, 'ar', 'مشغولات حرفية', '2020-04-16 00:08:00', '2020-04-30 04:33:17'),
(1741, 'categories', 'name', 678, 'ar', 'منحوتات', '2020-04-16 00:12:22', '2020-04-30 04:33:40'),
(1742, 'categories', 'name', 679, 'ar', 'مشغولات فلكلور', '2020-04-16 00:13:08', '2020-04-30 04:34:15'),
(1743, 'categories', 'name', 680, 'ar', 'مشغولات محلية', '2020-04-16 00:13:48', '2020-04-30 04:34:52'),
(1744, 'categories', 'name', 681, 'ar', 'نافورة', '2020-04-16 00:15:02', '2020-04-30 04:35:52'),
(1745, 'categories', 'name', 683, 'ar', 'لوحات فنية', '2020-04-16 00:17:03', '2020-04-30 04:36:38'),
(1746, 'categories', 'name', 684, 'ar', 'رسومات و مخطوطات', '2020-04-16 00:18:52', '2020-04-30 04:36:59'),
(1747, 'categories', 'name', 685, 'ar', 'تقويم و نتائج', '2020-04-16 00:20:23', '2020-04-30 04:37:25'),
(1748, 'categories', 'name', 686, 'ar', 'ساعات', '2020-04-16 00:21:03', '2020-04-30 04:37:50'),
(1749, 'categories', 'name', 687, 'ar', 'تحف و أنتيكات', '2020-04-16 00:21:29', '2020-04-30 04:39:40'),
(1750, 'categories', 'name', 688, 'ar', 'برواز صور', '2020-04-16 00:21:53', '2020-04-30 04:51:15'),
(1751, 'categories', 'name', 689, 'ar', 'ساعات كلاسيك', '2020-04-16 00:22:59', '2020-04-30 04:51:40'),
(1752, 'categories', 'name', 690, 'ar', 'نباتات زينة', '2020-04-16 00:23:29', '2020-04-30 04:52:00'),
(1753, 'categories', 'name', 691, 'ar', 'ستائر خشبية', '2020-04-16 00:24:32', '2020-04-30 04:58:31'),
(1754, 'categories', 'name', 692, 'ar', 'اليكترونيات مكتبية', '2020-04-16 00:25:10', '2020-04-30 04:59:42'),
(1755, 'categories', 'name', 693, 'ar', 'ديكور مكتبي', '2020-04-16 00:26:18', '2020-04-30 05:00:07'),
(1756, 'categories', 'name', 694, 'ar', 'نباتات معلقة', '2020-04-16 00:26:51', '2020-04-30 05:00:32'),
(1757, 'categories', 'name', 695, 'ar', 'فازات زهرية', '2020-04-16 00:27:12', '2020-04-30 05:01:00'),
(1758, 'categories', 'name', 696, 'ar', 'ديكور و زينة', '2020-04-16 00:27:59', '2020-04-30 05:02:42'),
(1759, 'categories', 'name', 697, 'ar', 'مشغولات زينة أخري', '2020-04-16 00:30:19', '2020-04-30 05:03:12'),
(1760, 'categories', 'name', 698, 'ar', 'اسفنج', '2020-04-16 00:31:43', '2020-04-30 05:03:42'),
(1761, 'categories', 'name', 699, 'ar', 'بلاستيك بوليمر', '2020-04-16 00:32:35', '2020-04-30 05:04:02'),
(1762, 'categories', 'name', 700, 'ar', 'سلع بلاستيكية', '2020-04-16 00:33:16', '2020-04-30 05:04:59'),
(1763, 'categories', 'name', 701, 'ar', 'مطاط', '2020-04-16 00:35:35', '2020-04-30 05:05:26'),
(1764, 'categories', 'name', 702, 'ar', 'سلع من السيليكون', '2020-04-16 00:36:42', '2020-04-30 05:05:41'),
(1765, 'categories', 'name', 704, 'ar', 'صبغات', '2020-04-16 00:39:11', '2020-04-30 05:07:16'),
(1766, 'categories', 'name', 705, 'ar', 'مواد كيميائية عضوية', '2020-04-16 00:39:37', '2020-04-30 05:07:42'),
(1767, 'categories', 'name', 706, 'ar', 'منتجات الياف زجاجية', '2020-04-16 00:40:43', '2020-04-30 05:08:14'),
(1768, 'categories', 'name', 707, 'ar', 'المواد الكيميائية غير العضوية', '2020-04-16 00:41:18', '2020-04-30 05:10:58'),
(1769, 'categories', 'name', 708, 'ar', 'ألياف غير عضوية', '2020-04-16 00:41:44', '2020-04-30 05:11:23'),
(1770, 'categories', 'name', 709, 'ar', 'ملح غير عضوي', '2020-04-16 00:42:30', '2020-04-30 05:11:47'),
(1771, 'categories', 'name', 710, 'ar', 'مواد اضافية', '2020-04-16 00:42:55', '2020-04-30 05:12:22'),
(1772, 'categories', 'name', 711, 'ar', 'محفزات و مساعدات كيميائية', '2020-04-16 00:44:13', '2020-04-30 05:13:43'),
(1773, 'categories', 'name', 712, 'ar', 'صمغ', '2020-04-16 00:44:43', '2020-04-30 05:14:06'),
(1774, 'categories', 'name', 713, 'ar', 'كربون صناعي', '2020-04-16 00:45:57', '2020-04-30 05:14:30'),
(1775, 'categories', 'name', 714, 'ar', 'مواد تعبئة كيميائية', '2020-04-16 00:46:23', '2020-04-30 05:15:44'),
(1776, 'categories', 'name', 715, 'ar', 'كاشف كيميائي', '2020-04-16 00:47:04', '2020-04-30 05:28:44'),
(1777, 'categories', 'name', 716, 'ar', 'Flux & Impregnant', '2020-04-16 09:39:00', '2020-04-16 09:39:00'),
(1778, 'categories', 'name', 717, 'ar', 'Soundless Cracking Agent', '2020-04-16 09:39:41', '2020-04-16 09:39:41'),
(1779, 'categories', 'name', 718, 'ar', 'jتحضيرات خاصة', '2020-04-16 09:40:17', '2020-04-30 05:32:34'),
(1780, 'categories', 'name', 719, 'ar', 'مواد قابلة للاشتعال', '2020-04-16 09:41:01', '2020-04-30 05:33:10'),
(1781, 'categories', 'name', 720, 'ar', 'مواد تشحيم', '2020-04-16 09:42:49', '2020-04-30 05:33:41'),
(1782, 'categories', 'name', 721, 'ar', 'بتروكيماويات', '2020-04-16 09:44:37', '2020-04-30 05:34:07'),
(1783, 'categories', 'name', 722, 'ar', 'شمع و زيوت', '2020-04-16 09:46:00', '2020-04-30 05:35:03'),
(1784, 'categories', 'name', 724, 'ar', 'كيماويات زراعية', '2020-04-16 09:47:36', '2020-04-30 05:36:02'),
(1785, 'categories', 'name', 725, 'ar', 'أسمدة', '2020-04-16 09:48:45', '2020-04-30 05:36:39'),
(1786, 'categories', 'name', 726, 'ar', 'صنوبر', '2020-04-16 09:50:01', '2020-04-30 05:40:24'),
(1787, 'categories', 'name', 727, 'ar', 'كيمياء حيوية', '2020-04-16 09:50:39', '2020-04-30 05:40:45'),
(1788, 'categories', 'name', 728, 'ar', 'كيماويات صيدلية', '2020-04-16 09:52:01', '2020-04-30 05:41:10'),
(1789, 'categories', 'name', 729, 'ar', 'Pharmaceutical Intermediate', '2020-04-16 09:52:44', '2020-04-16 09:52:44'),
(1790, 'categories', 'name', 730, 'ar', 'مواد تعبئة و تغليف', '2020-04-16 09:53:38', '2020-04-30 05:42:53'),
(1791, 'categories', 'name', 731, 'ar', 'مواد طباعة', '2020-04-16 09:54:45', '2020-04-30 05:43:21'),
(1793, 'categories', 'name', 733, 'ar', 'المعدات والآلات الكيميائية', '2020-04-16 09:55:54', '2020-04-30 05:45:00'),
(1794, 'categories', 'name', 734, 'ar', 'منتجات بلاستيكية منزلية', '2020-04-16 09:56:32', '2020-04-30 05:47:43'),
(1795, 'categories', 'name', 735, 'ar', 'ماكينات بلاستيك', '2020-04-16 09:57:01', '2020-04-30 05:48:16'),
(1796, 'categories', 'name', 736, 'ar', 'ماكينات مطاط', '2020-04-16 09:57:25', '2020-04-30 05:48:37'),
(1798, 'categories', 'name', 738, 'ar', 'نفايات كيماوية', '2020-04-16 09:58:52', '2020-04-30 05:49:45'),
(1799, 'categories', 'name', 739, 'ar', 'ادوات مختبر', '2020-04-16 09:59:37', '2020-04-30 05:50:08'),
(1800, 'categories', 'name', 740, 'ar', 'مواد كيميائية مستحدثة', '2020-04-16 10:00:03', '2020-04-30 05:50:55'),
(1802, 'categories', 'name', 742, 'ar', 'كيماويات أخري', '2020-04-16 10:01:55', '2020-04-30 05:55:32'),
(1803, 'categories', 'name', 743, 'ar', 'شنطة يد', '2020-04-16 10:03:37', '2020-04-30 05:56:24'),
(1804, 'categories', 'name', 744, 'ar', 'محافظ', '2020-04-16 10:05:01', '2020-04-30 05:56:52'),
(1805, 'categories', 'name', 745, 'ar', 'حقيبة عمل', '2020-04-16 10:05:34', '2020-04-30 06:01:25'),
(1806, 'categories', 'name', 746, 'ar', 'محفظة بطاقات', '2020-04-16 10:06:21', '2020-04-30 05:58:02'),
(1807, 'categories', 'name', 747, 'ar', 'صندوق معدات', '2020-04-16 10:07:07', '2020-04-30 05:58:25'),
(1808, 'categories', 'name', 748, 'ar', 'حقيبة وسط', '2020-04-16 10:08:04', '2020-04-30 05:59:50'),
(1809, 'categories', 'name', 749, 'ar', 'محفظة اسطوانات', '2020-04-16 10:08:44', '2020-04-30 06:01:56'),
(1810, 'categories', 'name', 750, 'ar', 'حقيبة كاميرا', '2020-04-16 10:08:54', '2020-04-30 06:02:30'),
(1811, 'categories', 'name', 751, 'ar', 'حقيبة كمبيوتر', '2020-04-16 10:09:03', '2020-04-30 06:13:02'),
(1812, 'categories', 'name', 752, 'ar', 'جراب موبايل', '2020-04-16 10:09:41', '2020-04-30 06:13:25'),
(1813, 'categories', 'name', 753, 'ar', 'جراب تابلت', '2020-04-16 10:09:56', '2020-04-30 06:13:41'),
(1814, 'categories', 'name', 754, 'ar', 'حقائب أخري', '2020-04-16 10:10:56', '2020-04-30 06:24:13'),
(1815, 'categories', 'name', 755, 'ar', 'حقيبة ملابس', '2020-04-16 10:12:15', '2020-04-30 06:16:01'),
(1816, 'categories', 'name', 756, 'ar', 'حقيبة سفر', '2020-04-16 10:12:41', '2020-04-30 06:16:27'),
(1817, 'categories', 'name', 757, 'ar', 'حقيبة أمتعة', '2020-04-16 10:13:06', '2020-04-30 06:16:50'),
(1818, 'categories', 'name', 758, 'ar', 'حقيبة ظهر', '2020-04-16 10:14:47', '2020-04-30 06:17:19'),
(1819, 'categories', 'name', 759, 'ar', 'حقيبة مبرد', '2020-04-16 10:15:44', '2020-04-30 06:18:33'),
(1820, 'categories', 'name', 760, 'ar', 'شنطة جولف', '2020-04-16 10:16:14', '2020-04-30 06:18:52'),
(1821, 'categories', 'name', 761, 'ar', 'حقيبة نزهة', '2020-04-16 10:17:01', '2020-04-30 06:19:14'),
(1822, 'categories', 'name', 762, 'ar', 'حقيبة مستحضرات تجميل', '2020-04-16 10:17:26', '2020-04-30 06:19:40'),
(1823, 'categories', 'name', 763, 'ar', 'علبة هدايا', '2020-04-16 10:18:19', '2020-04-30 06:20:49'),
(1824, 'categories', 'name', 764, 'ar', 'أكياس تسوق', '2020-04-16 10:18:46', '2020-04-30 06:21:16'),
(1825, 'categories', 'name', 765, 'ar', 'حقائب معدات', '2020-04-16 10:18:51', '2020-04-30 06:22:25'),
(1826, 'categories', 'name', 766, 'ar', 'صندوق ديكور', '2020-04-16 10:21:02', '2020-04-30 06:25:38'),
(1827, 'categories', 'name', 767, 'ar', 'حقيبة أطفال', '2020-04-16 10:21:37', '2020-04-30 06:26:14'),
(1828, 'categories', 'name', 768, 'ar', 'حقيبة آلات', '2020-04-16 10:22:53', '2020-04-30 06:26:38'),
(1829, 'categories', 'name', 769, 'ar', 'صندوق مجوهرات', '2020-04-16 10:23:29', '2020-04-30 06:27:20'),
(1830, 'categories', 'name', 770, 'ar', 'شنطة غسيل', '2020-04-16 10:24:01', '2020-04-30 06:27:44'),
(1831, 'categories', 'name', 771, 'ar', 'حقيبة عسكرية', '2020-04-16 10:25:10', '2020-04-30 06:28:51'),
(1832, 'categories', 'name', 772, 'ar', 'صندوق موسيقي', '2020-04-16 10:25:33', '2020-04-30 06:29:10'),
(1833, 'categories', 'name', 773, 'ar', 'حقائب غير منسوجة', '2020-04-16 10:27:36', '2020-04-30 06:35:02'),
(1834, 'categories', 'name', 774, 'ar', 'حافظات أقلام', '2020-04-16 10:28:14', '2020-04-30 06:35:43'),
(1835, 'categories', 'name', 775, 'ar', 'شنط دعاية', '2020-04-16 10:29:10', '2020-04-30 06:36:12'),
(1836, 'categories', 'name', 776, 'ar', 'حقيبة مدرسية', '2020-04-16 10:30:41', '2020-04-30 06:37:15'),
(1837, 'categories', 'name', 777, 'ar', 'صناديق خاصة', '2020-04-16 10:31:17', '2020-04-30 06:37:48'),
(1838, 'categories', 'name', 778, 'ar', 'شنطة معدات', '2020-04-16 10:31:40', '2020-04-30 06:38:11'),
(1839, 'categories', 'name', 779, 'ar', 'صندوق ساعات', '2020-04-16 10:32:11', '2020-04-30 06:38:32'),
(1840, 'categories', 'name', 781, 'ar', 'حقائب و شنط أخري', '2020-04-16 10:34:13', '2020-04-30 06:41:03'),
(1841, 'categories', 'name', 782, 'ar', 'تجهيزات حمامات', '2020-04-16 10:34:42', '2020-04-30 06:41:29'),
(1842, 'categories', 'name', 783, 'ar', 'صنبور وخلاطات', '2020-04-16 10:35:18', '2020-04-30 06:41:59'),
(1843, 'categories', 'name', 784, 'ar', 'غرفة ساونا', '2020-04-16 10:37:38', '2020-04-30 06:42:21'),
(1844, 'categories', 'name', 785, 'ar', 'مجموعة دش', '2020-04-16 10:38:21', '2020-04-30 06:44:32'),
(1845, 'categories', 'name', 786, 'ar', 'غرفة استحمام', '2020-04-16 10:38:56', '2020-04-30 06:46:01'),
(1846, 'categories', 'name', 787, 'ar', 'حوض و بالوعة', '2020-04-16 10:39:27', '2020-04-30 06:46:25'),
(1847, 'categories', 'name', 788, 'ar', 'مرحاض', '2020-04-16 10:41:49', '2020-04-30 06:47:03'),
(1848, 'categories', 'name', 789, 'ar', 'مظلات', '2020-04-16 10:43:22', '2020-04-30 06:47:59'),
(1849, 'categories', 'name', 790, 'ar', 'سجاد حمام', '2020-04-16 10:43:50', '2020-04-30 06:48:31'),
(1850, 'categories', 'name', 791, 'ar', 'حوض استحمام بانيو', '2020-04-16 10:44:41', '2020-04-30 06:49:05'),
(1851, 'categories', 'name', 792, 'ar', 'منتجات ألياف زجاجية', '2020-04-16 10:45:21', '2020-04-30 06:49:39'),
(1852, 'categories', 'name', 793, 'ar', 'ديكور مطبخ', '2020-04-16 10:49:26', '2020-04-30 06:50:40'),
(1853, 'categories', 'name', 794, 'ar', 'رخام و جرانيت', '2020-04-16 10:53:21', '2020-04-30 06:51:11'),
(1854, 'categories', 'name', 795, 'ar', 'خرسانة و مضافات', '2020-04-16 10:54:03', '2020-04-30 06:52:38'),
(1855, 'categories', 'name', 796, 'ar', 'رمل  و جير و أسمنت', '2020-04-16 10:55:02', '2020-04-30 06:53:45'),
(1856, 'categories', 'name', 797, 'ar', 'سيراميك و أرضيات', '2020-04-16 10:57:36', '2020-04-30 06:55:08'),
(1857, 'categories', 'name', 798, 'ar', 'أرضيات', '2020-04-16 10:59:23', '2020-04-30 06:55:33'),
(1858, 'categories', 'name', 799, 'ar', 'أبواب', '2020-04-16 10:59:49', '2020-04-30 06:55:57'),
(1859, 'categories', 'name', 800, 'ar', 'لوازم باب و شباك', '2020-04-16 11:00:19', '2020-04-30 06:56:29'),
(1860, 'categories', 'name', 801, 'ar', 'قفل', '2020-04-16 11:02:07', '2020-04-30 06:58:21'),
(1861, 'categories', 'name', 802, 'ar', 'شباك', '2020-04-16 11:03:43', '2020-04-30 06:58:47'),
(1862, 'categories', 'name', 803, 'ar', 'ستائر', '2020-04-16 11:07:16', '2020-04-30 06:59:04'),
(1863, 'categories', 'name', 804, 'ar', 'جرس باب', '2020-04-16 11:08:14', '2020-04-30 06:59:27'),
(1864, 'categories', 'name', 805, 'ar', 'زجاج مباني', '2020-04-16 11:10:05', '2020-04-30 06:59:54'),
(1865, 'categories', 'name', 806, 'ar', 'أسقف معلقة', '2020-04-16 11:11:02', '2020-04-30 07:00:53'),
(1866, 'categories', 'name', 807, 'ar', 'ديكور و زينة', '2020-04-16 11:11:57', '2020-04-30 07:01:22'),
(1867, 'categories', 'name', 808, 'ar', 'مرايات منزلية', '2020-04-16 11:12:09', '2020-04-30 07:01:44'),
(1868, 'categories', 'name', 809, 'ar', 'حواجز خشبية', '2020-04-16 11:14:24', '2020-04-30 07:02:12'),
(1869, 'categories', 'name', 810, 'ar', 'سلالم', '2020-04-16 11:15:24', '2020-04-30 07:02:34'),
(1870, 'categories', 'name', 811, 'ar', 'معدات بناء', '2020-04-16 11:16:00', '2020-04-30 07:03:44'),
(1871, 'categories', 'name', 812, 'ar', 'سلم عملي', '2020-04-16 11:16:22', '2020-04-30 07:04:15'),
(1872, 'categories', 'name', 815, 'ar', 'سخانات مباني', '2020-04-16 11:17:36', '2020-04-30 07:43:17'),
(1873, 'categories', 'name', 816, 'ar', 'هياكل صلبة للبناء', '2020-04-16 11:18:30', '2020-04-30 07:43:38'),
(1874, 'categories', 'name', 817, 'ar', 'مواسير و أنابيب بناء', '2020-04-16 11:19:54', '2020-04-30 07:44:03'),
(1875, 'categories', 'name', 813, 'ar', 'دهانات و طلاء', '2020-04-16 11:20:38', '2020-04-30 07:42:55'),
(1877, 'categories', 'name', 819, 'ar', 'سور معدني', '2020-04-16 11:54:49', '2020-04-30 07:45:29'),
(1879, 'categories', 'name', 821, 'ar', 'تجهيزات أنابيب', '2020-04-16 11:56:07', '2020-04-30 07:46:11'),
(1880, 'categories', 'name', 822, 'ar', 'طوب و مواد بناء', '2020-04-16 11:57:19', '2020-04-30 07:48:18'),
(1881, 'categories', 'name', 824, 'ar', 'شبك سلك', '2020-04-16 11:58:25', '2020-04-30 07:49:05'),
(1882, 'categories', 'name', 825, 'ar', 'لوازم بناء', '2020-04-16 11:59:05', '2020-04-30 07:49:29'),
(1883, 'categories', 'name', 826, 'ar', 'أسمنت خرصانة', '2020-04-16 12:00:03', '2020-04-30 07:50:13'),
(1884, 'categories', 'name', 827, 'ar', 'Construction Materials Stocks', '2020-04-16 12:00:37', '2020-04-16 12:00:37'),
(1885, 'categories', 'name', 828, 'ar', 'مواد عازلة للحريق', '2020-04-16 12:02:27', '2020-04-30 07:51:08'),
(1886, 'categories', 'name', 829, 'ar', 'لوازم سباكة', '2020-04-16 12:04:00', '2020-04-30 07:52:27'),
(1887, 'categories', 'name', 830, 'ar', 'مبني جاهز', '2020-04-16 12:05:02', '2020-04-30 07:52:42'),
(1888, 'categories', 'name', 831, 'ar', 'مواد عزل صوت و حرارة', '2020-04-16 12:05:52', '2020-04-30 07:53:12'),
(1889, 'categories', 'name', 832, 'ar', 'مواد عزل صوت', '2020-04-16 12:08:03', '2020-04-30 07:53:44'),
(1890, 'categories', 'name', 833, 'ar', 'مواد بناء خاصة', '2020-04-16 12:08:46', '2020-04-30 07:54:48'),
(1891, 'categories', 'name', 823, 'ar', 'أخشاب', '2020-04-16 12:09:36', '2020-04-30 07:48:36'),
(1892, 'categories', 'name', 834, 'ar', 'حديد صلب', '2020-04-16 12:11:40', '2020-04-30 07:55:10'),
(1893, 'categories', 'name', 835, 'ar', 'مواد بناء عازل للمياه', '2020-04-16 12:12:49', '2020-04-30 07:55:54'),
(1894, 'categories', 'name', 836, 'ar', 'قابس كهربي', '2020-04-16 12:13:58', '2020-04-30 07:56:21'),
(1895, 'categories', 'name', 837, 'ar', 'مخرج كهربي', '2020-04-16 12:14:25', '2020-04-30 07:57:10'),
(1896, 'categories', 'name', 838, 'ar', 'مفتاح كهربي', '2020-04-16 12:16:38', '2020-04-30 07:57:32'),
(1897, 'categories', 'name', 839, 'ar', 'معدات بناء', '2020-04-16 12:17:40', '2020-04-30 07:57:53'),
(1898, 'categories', 'name', 840, 'ar', 'صندوق بريد', '2020-04-16 12:19:00', '2020-04-30 07:58:06'),
(1899, 'categories', 'name', 841, 'ar', 'مواد ديكور أخري', '2020-04-16 12:19:47', '2020-04-30 08:00:55'),
(1900, 'categories', 'name', 842, 'ar', 'ألعاب شخصيات كارتون', '2020-04-16 12:24:13', '2020-04-30 08:01:49'),
(1901, 'categories', 'name', 843, 'ar', 'ألعاب سيوف و مسدسات', '2020-04-16 12:25:36', '2020-04-30 08:01:51'),
(1902, 'categories', 'name', 844, 'ar', 'دمي ألعاب', '2020-04-16 12:27:23', '2020-04-30 08:03:03'),
(1903, 'categories', 'name', 845, 'ar', 'لعبة محشوة', '2020-04-16 12:28:29', '2020-04-30 08:03:29'),
(1904, 'categories', 'name', 846, 'ar', 'ألعاب بطاقات', '2020-04-16 12:29:21', '2020-04-30 08:04:04'),
(1905, 'categories', 'name', 847, 'ar', 'ألعاب تعليمية', '2020-04-16 12:31:04', '2020-04-30 08:04:29'),
(1906, 'categories', 'name', 848, 'ar', 'ألعاب سحرية', '2020-04-16 12:32:14', '2020-04-30 08:05:08'),
(1907, 'categories', 'name', 849, 'ar', 'ألعاب نماذج', '2020-04-16 12:34:43', '2020-04-30 08:05:27'),
(1908, 'categories', 'name', 850, 'ar', 'ألعاب موسيقية', '2020-04-16 12:35:48', '2020-04-30 08:05:45');
INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1909, 'categories', 'name', 851, 'ar', 'ألعاب بالونات', '2020-04-16 12:38:10', '2020-04-30 08:06:18'),
(1910, 'categories', 'name', 852, 'ar', 'كرة', '2020-04-16 12:39:21', '2020-04-30 08:07:09'),
(1911, 'categories', 'name', 853, 'ar', 'لوحة اسهم', '2020-04-16 12:39:58', '2020-04-30 08:09:19'),
(1912, 'categories', 'name', 854, 'ar', 'طبق طائر', '2020-04-16 12:41:08', '2020-04-30 08:09:37'),
(1913, 'categories', 'name', 855, 'ar', 'حبل القفز', '2020-04-16 12:43:40', '2020-04-30 08:09:54'),
(1914, 'categories', 'name', 856, 'ar', 'سكوتر', '2020-04-16 12:44:20', '2020-04-30 08:10:41'),
(1915, 'categories', 'name', 857, 'ar', 'لياقة بدنية', '2020-04-16 12:46:07', '2020-04-30 08:11:01'),
(1916, 'categories', 'name', 135, 'ar', 'الألعاب', '2020-04-16 13:11:10', '2020-04-25 17:33:17'),
(1917, 'categories', 'name', 861, 'ar', 'بالونات', '2020-04-16 13:13:10', '2020-04-30 20:58:54'),
(1918, 'categories', 'name', 862, 'ar', 'ألعاب حجر', '2020-04-16 13:14:01', '2020-04-30 20:59:35'),
(1919, 'categories', 'name', 863, 'ar', 'ألعاب بالكهرباء', '2020-04-16 13:14:36', '2020-04-30 21:00:05'),
(1920, 'categories', 'name', 864, 'ar', 'ألعاب بلاستيك', '2020-04-16 13:16:16', '2020-04-30 21:00:27'),
(1921, 'categories', 'name', 865, 'ar', 'ألعاب خشبية', '2020-04-16 13:17:13', '2020-04-30 21:01:19'),
(1922, 'categories', 'name', 867, 'ar', 'ألعاب آلية', '2020-04-16 13:17:59', '2020-04-30 21:01:43'),
(1923, 'categories', 'name', 868, 'ar', 'ألعاب محلية', '2020-04-16 13:19:04', '2020-04-30 21:02:05'),
(1924, 'categories', 'name', 869, 'ar', 'ألعاب بيبي', '2020-04-16 13:19:45', '2020-04-30 21:02:22'),
(1925, 'categories', 'name', 870, 'ar', 'ألعاب جديدة', '2020-04-16 13:20:28', '2020-04-30 21:02:52'),
(1926, 'categories', 'name', 872, 'ar', 'اكسسوارات ألعاب', '2020-04-16 13:24:57', '2020-04-30 21:04:11'),
(1927, 'categories', 'name', 873, 'ar', 'مخزون ألعاب', '2020-04-16 13:25:28', '2020-04-30 21:04:45'),
(1929, 'categories', 'name', 871, 'ar', 'ألعاب للحيوانت الأليفة', '2020-04-16 13:27:01', '2020-04-30 21:03:47'),
(1930, 'categories', 'name', 875, 'ar', 'شاشات عرض LED للأضاءة', '2020-04-16 13:28:09', '2020-04-30 21:05:43'),
(1931, 'categories', 'name', 876, 'ar', 'قطع أضواء LED', '2020-04-16 13:28:47', '2020-04-30 21:07:42'),
(1932, 'categories', 'name', 877, 'ar', 'أضاءة LED داخلية', '2020-04-16 13:29:32', '2020-04-30 21:08:17'),
(1933, 'categories', 'name', 878, 'ar', 'اضاءة LED ديكور', '2020-04-16 13:30:41', '2020-04-30 21:08:49'),
(1934, 'categories', 'name', 879, 'ar', 'اضاءة LED خارجية', '2020-04-16 13:31:16', '2020-04-30 21:09:22'),
(1935, 'categories', 'name', 881, 'ar', 'اضاءة داخلية', '2020-04-16 13:33:07', '2020-04-30 21:10:45'),
(1936, 'categories', 'name', 882, 'ar', 'اضاءة خارجية', '2020-04-16 13:35:50', '2020-04-30 21:11:10'),
(1938, 'categories', 'name', 884, 'ar', 'اضاءة مسرح', '2020-04-16 13:38:03', '2020-04-30 21:11:28'),
(1939, 'categories', 'name', 886, 'ar', 'اضاءة طوارئ و مؤشرات', '2020-04-16 13:40:27', '2020-04-30 21:17:09'),
(1941, 'categories', 'name', 888, 'ar', 'اضاءة سيارات', '2020-04-16 13:43:24', '2020-04-30 21:17:35'),
(1942, 'categories', 'name', 889, 'ar', 'صندوق ضوئي', '2020-04-16 13:46:37', '2020-04-30 21:19:10'),
(1943, 'categories', 'name', 890, 'ar', 'اضاءة محمولة', '2020-04-16 13:47:37', '2020-04-30 21:20:00'),
(1944, 'categories', 'name', 891, 'ar', 'اضاءة احترافية', '2020-04-16 13:49:05', '2020-04-30 21:20:22'),
(1945, 'categories', 'name', 892, 'ar', 'اضاءة بمستشعر', '2020-04-16 13:49:39', '2020-04-30 21:20:51'),
(1946, 'categories', 'name', 893, 'ar', 'كشاف يدوي', '2020-04-16 13:50:12', '2020-04-30 21:21:43'),
(1947, 'categories', 'name', 885, 'ar', 'اضاءة ديكور', '2020-04-16 13:52:01', '2020-04-30 21:16:23'),
(1948, 'categories', 'name', 896, 'ar', 'تركيبات اضاءة', '2020-04-16 13:53:09', '2020-04-30 21:23:15'),
(1949, 'categories', 'name', 897, 'ar', 'اضاءات أخري', '2020-04-16 13:54:00', '2020-04-30 21:24:16'),
(1950, 'categories', 'name', 898, 'ar', 'لمبات أخري', '2020-04-16 13:56:31', '2020-04-30 21:24:34'),
(1951, 'categories', 'name', 899, 'ar', 'أجهزة لياقة بدنية', '2020-04-16 13:58:29', '2020-04-30 21:24:58'),
(1952, 'categories', 'name', 900, 'ar', 'أدوات رياضية', '2020-04-16 13:59:21', '2020-04-30 21:25:25'),
(1953, 'categories', 'name', 901, 'ar', 'أجهزة رياضية', '2020-04-16 14:00:27', '2020-04-30 21:32:42'),
(1954, 'categories', 'name', 902, 'ar', 'أدوات حماية رياضية', '2020-04-16 14:01:16', '2020-04-30 21:27:21'),
(1955, 'categories', 'name', 903, 'ar', 'موتوسيكل رباعي', '2020-04-16 14:02:01', '2020-04-30 21:27:55'),
(1956, 'categories', 'name', 904, 'ar', 'لوازم حفلات شواء', '2020-04-16 14:03:15', '2020-04-30 21:28:20'),
(1958, 'categories', 'name', 906, 'ar', 'عدة صيد', '2020-04-16 14:07:38', '2020-04-30 21:29:08'),
(1959, 'categories', 'name', 907, 'ar', 'خوذة', '2020-04-16 14:08:31', '2020-04-30 21:29:22'),
(1960, 'categories', 'name', 908, 'ar', 'قارب ترفيهي', '2020-04-16 14:09:21', '2020-04-30 21:29:49'),
(1961, 'categories', 'name', 909, 'ar', 'سكوتر', '2020-04-16 14:15:49', '2020-04-30 21:31:27'),
(1962, 'categories', 'name', 910, 'ar', 'معدات رياضية', '2020-04-16 14:16:32', '2020-04-30 21:32:03'),
(1963, 'categories', 'name', 911, 'ar', 'لوحة اسهم', '2020-04-16 14:16:46', '2020-04-30 21:34:11'),
(1964, 'categories', 'name', 912, 'ar', 'موتسيكل رياضي', '2020-04-16 14:17:33', '2020-04-30 21:34:43'),
(1965, 'categories', 'name', 913, 'ar', 'دراجة قابة للطي', '2020-04-16 14:18:46', '2020-04-30 21:35:39'),
(1966, 'categories', 'name', 914, 'ar', 'طبق طائر', '2020-04-16 14:20:26', '2020-04-30 21:35:53'),
(1967, 'categories', 'name', 915, 'ar', 'سيارات سباقات', '2020-04-16 14:21:15', '2020-04-30 21:36:21'),
(1968, 'categories', 'name', 916, 'ar', 'عربة جولف', '2020-04-16 14:21:50', '2020-04-30 21:36:44'),
(1969, 'categories', 'name', 917, 'ar', 'دراجة أطفال', '2020-04-16 14:22:32', '2020-04-30 21:37:31'),
(1970, 'categories', 'name', 918, 'ar', 'دراجة صغيرة جيب', '2020-04-16 14:23:14', '2020-04-30 21:38:15'),
(1971, 'categories', 'name', 919, 'ar', 'قطع غيار قوارب ترفيهية', '2020-04-16 14:25:27', '2020-04-30 21:39:56'),
(1972, 'categories', 'name', 920, 'ar', 'سكوتر بحر', '2020-04-16 14:26:38', '2020-04-30 21:40:14'),
(1973, 'categories', 'name', 921, 'ar', 'سكوتر كهربي', '2020-04-16 14:27:07', '2020-04-30 21:41:05'),
(1974, 'categories', 'name', 922, 'ar', 'لوح تزحلق', '2020-04-16 14:28:15', '2020-04-30 21:41:24'),
(1975, 'categories', 'name', 923, 'ar', 'سكوتر ثلج', '2020-04-16 14:29:01', '2020-04-30 21:41:41'),
(1976, 'categories', 'name', 924, 'ar', 'تليسكوب و منظار', '2020-04-16 14:29:35', '2020-04-30 21:45:59'),
(1977, 'categories', 'name', 925, 'ar', 'كشاف يدوي', '2020-04-16 14:30:10', '2020-04-30 21:46:22'),
(1979, 'categories', 'name', 928, 'ar', 'جيتار', '2020-04-16 14:32:04', '2020-04-30 21:46:36'),
(1980, 'products', 'name', 4, 'ar', 'asd', NULL, NULL),
(1981, 'products', 'description', 4, 'ar', 'as', NULL, NULL),
(1983, 'categories', 'name', 929, 'ar', 'آلات موسيقية', '2020-04-16 14:33:31', '2020-04-30 21:47:06'),
(1985, 'categories', 'name', 930, 'ar', 'حمام سباحة منزلي', '2020-04-16 14:35:11', '2020-04-30 21:49:53'),
(1986, 'categories', 'name', 931, 'ar', 'ألعاب بطاقات', '2020-04-16 14:35:46', '2020-04-30 21:50:19'),
(1987, 'categories', 'name', 933, 'ar', 'ألعاب متحركة', '2020-04-16 14:36:34', '2020-04-30 21:50:49'),
(1988, 'categories', 'name', 934, 'ar', 'بالونات', '2020-04-16 14:37:13', '2020-04-30 21:51:07'),
(1989, 'categories', 'name', 935, 'ar', 'كرسي تدليك', '2020-04-16 14:37:36', '2020-04-30 21:52:41'),
(1990, 'products', 'name', 8, 'ar', 'asd', NULL, NULL),
(1991, 'products', 'description', 8, 'ar', 'as', NULL, NULL),
(1995, 'categories', 'name', 939, 'ar', 'معدات تنظيف هواء', '2020-04-16 14:43:22', '2020-04-30 21:53:03'),
(1996, 'categories', 'name', 940, 'ar', 'آلات تنظيف', '2020-04-16 14:44:27', '2020-04-30 21:54:16'),
(1997, 'categories', 'name', 941, 'ar', 'أجهزة حماية', '2020-04-16 14:45:44', '2020-04-30 21:54:41'),
(1999, 'categories', 'name', 943, 'ar', 'معدات نقل و فصل', '2020-04-16 14:47:43', '2020-04-30 21:55:34'),
(2000, 'categories', 'name', 944, 'ar', 'مكون هوائي', '2020-04-16 14:48:15', '2020-04-30 21:55:54'),
(2001, 'categories', 'name', 945, 'ar', 'معدات غسيل', '2020-04-16 14:49:58', '2020-04-30 21:56:14'),
(2002, 'categories', 'name', 946, 'ar', 'ماسح ثلاثي الأبعاد', '2020-04-16 14:52:00', '2020-04-30 21:59:08'),
(2003, 'products', 'name', 14, 'ar', 'asd', NULL, NULL),
(2004, 'products', 'description', 14, 'ar', 'as', NULL, NULL),
(2005, 'categories', 'name', 947, 'ar', 'محرك كهربي', '2020-04-16 15:00:57', '2020-04-30 22:01:15'),
(2006, 'categories', 'name', 948, 'ar', 'دليل حديدي', '2020-04-16 15:01:28', '2020-04-30 22:01:40'),
(2007, 'categories', 'name', 949, 'ar', 'مواد عزل', '2020-04-16 15:01:47', '2020-04-30 22:02:14'),
(2008, 'categories', 'name', 950, 'ar', 'محولات و حوامل', '2020-04-16 15:02:49', '2020-04-30 22:05:02'),
(2009, 'categories', 'name', 951, 'ar', 'ملقط و قاطع', '2020-04-16 15:03:27', '2020-04-30 22:14:33'),
(2010, 'categories', 'name', 952, 'ar', 'صواميل و مسامير', '2020-04-16 15:04:18', '2020-04-30 22:16:46'),
(2011, 'categories', 'name', 953, 'ar', 'لاصق صناعي', '2020-04-16 15:05:10', '2020-04-30 22:17:20'),
(2012, 'categories', 'name', 954, 'ar', 'مانع تسريبب', '2020-04-16 15:05:43', '2020-04-30 22:18:17'),
(2013, 'categories', 'name', 955, 'ar', 'قلاووظ', '2020-04-16 15:06:10', '2020-04-30 22:19:02'),
(2014, 'categories', 'name', 956, 'ar', 'أنابيب رف', '2020-04-16 15:16:54', '2020-04-30 22:19:27'),
(2015, 'categories', 'name', 957, 'ar', 'نظام أنابيب', '2020-04-16 15:17:46', '2020-04-30 22:19:52'),
(2016, 'categories', 'name', 958, 'ar', 'محاور', '2020-04-16 15:19:12', '2020-04-30 22:20:35'),
(2017, 'categories', 'name', 959, 'ar', 'قطع غيار أجهزة عالمية', '2020-04-16 15:19:41', '2020-04-30 22:21:06'),
(2018, 'categories', 'name', 138, 'ar', 'رياضة', '2020-04-16 15:28:22', '2020-04-25 17:37:06'),
(2019, 'categories', 'name', 139, 'ar', 'معدات و آلات صناعية', '2020-04-16 15:28:56', '2020-04-25 17:48:44'),
(2020, 'categories', 'name', 140, 'ar', 'الآلات والعدد', '2020-04-16 15:29:28', '2020-04-25 17:42:24'),
(2021, 'categories', 'name', 141, 'ar', 'المنزل', '2020-04-16 15:29:46', '2020-04-25 17:45:11'),
(2022, 'categories', 'name', 142, 'ar', 'أدوات و عدد صناعية', '2020-04-16 15:30:17', '2020-04-25 17:47:54'),
(2023, 'categories', 'name', 143, 'ar', 'أدوات مكتبية', '2020-04-16 15:30:41', '2020-04-25 17:49:25'),
(2024, 'categories', 'name', 144, 'ar', 'ماكينات صناعية', '2020-04-16 15:31:17', '2020-04-25 17:50:41'),
(2025, 'categories', 'name', 145, 'ar', 'معادن ومستلزمات تعدين', '2020-04-16 15:32:23', '2020-04-25 17:52:48'),
(2027, 'categories', 'name', 960, 'ar', 'عجلات', '2020-04-16 18:06:27', '2020-04-30 22:21:25'),
(2028, 'categories', 'name', 961, 'ar', 'ضاغط مكبس كومبريسور', '2020-04-16 18:07:08', '2020-04-30 22:22:32'),
(2029, 'categories', 'name', 962, 'ar', 'مواتير و مضخات', '2020-04-16 18:09:36', '2020-04-30 22:23:13'),
(2030, 'categories', 'name', 963, 'ar', 'صمامات', '2020-04-16 18:10:10', '2020-04-30 22:23:31'),
(2031, 'categories', 'name', 964, 'ar', 'أجزاء صمامات', '2020-04-16 18:11:11', '2020-04-30 22:23:53'),
(2032, 'categories', 'name', 965, 'ar', 'معدات و قطع غيار توليد غاز', '2020-04-16 18:11:49', '2020-04-30 22:25:00'),
(2033, 'categories', 'name', 966, 'ar', 'فرامل صناعية', '2020-04-16 18:12:29', '2020-04-30 22:25:38'),
(2034, 'categories', 'name', 967, 'ar', 'مناور', '2020-04-16 18:13:03', '2020-04-30 22:25:55'),
(2035, 'categories', 'name', 968, 'ar', 'ناقل و قطع غيار', '2020-04-16 18:13:34', '2020-04-30 22:26:15'),
(2036, 'categories', 'name', 969, 'ar', 'محركات', '2020-04-16 18:14:35', '2020-04-30 22:27:01'),
(2037, 'categories', 'name', 970, 'ar', 'مولد كهربي', '2020-04-16 18:15:10', '2020-04-30 22:27:22'),
(2038, 'categories', 'name', 971, 'ar', 'قطع نقل طاقة', '2020-04-16 18:15:59', '2020-04-30 22:27:45'),
(2039, 'categories', 'name', 972, 'ar', 'محرك خطي صناعي', '2020-04-16 18:16:06', '2020-04-30 22:28:15'),
(2040, 'categories', 'name', 973, 'ar', 'غلايات و افران', '2020-04-16 18:17:20', '2020-04-30 22:28:53'),
(2041, 'categories', 'name', 974, 'ar', 'ماكينات تجفيف', '2020-04-16 18:18:31', '2020-04-30 22:29:13'),
(2042, 'categories', 'name', 975, 'ar', 'سخانات و مبادلات حرارية', '2020-04-16 18:20:38', '2020-04-30 22:30:10'),
(2043, 'categories', 'name', 976, 'ar', 'مزيل رطوبة', '2020-04-16 18:21:20', '2020-04-30 22:31:24'),
(2044, 'categories', 'name', 977, 'ar', 'معدات تبريد', '2020-04-16 18:24:22', '2020-04-30 22:31:47'),
(2045, 'categories', 'name', 978, 'ar', 'معدات تهوية', '2020-04-16 18:25:04', '2020-04-30 22:32:03'),
(2046, 'categories', 'name', 979, 'ar', 'ثلاجات و مجمدات', '2020-04-16 18:29:58', '2020-04-30 22:32:38'),
(2047, 'categories', 'name', 980, 'ar', 'لوازم لحام', '2020-04-16 18:30:39', '2020-04-30 22:34:01'),
(2048, 'categories', 'name', 981, 'ar', 'معدات لحام', '2020-04-16 18:31:04', '2020-04-30 22:34:17'),
(2049, 'categories', 'name', 985, 'ar', 'معدات و اجزاء صناعية أخري', '2020-04-16 18:35:40', '2020-04-30 22:36:29'),
(2050, 'categories', 'name', 986, 'ar', 'أدوات تحليل', '2020-04-16 18:37:23', '2020-04-30 22:36:57'),
(2051, 'categories', 'name', 987, 'ar', 'كاشف', '2020-04-16 18:37:51', '2020-04-30 22:37:20'),
(2053, 'categories', 'name', 989, 'ar', 'معدات اختبار', '2020-04-16 18:47:28', '2020-04-30 22:37:58'),
(2054, 'categories', 'name', 990, 'ar', 'ماسح ثلاثي الأبعاد', '2020-04-16 18:48:14', '2020-04-30 22:38:32'),
(2055, 'categories', 'name', 991, 'ar', 'معدات تصليح سيارات', '2020-04-16 18:48:36', '2020-04-30 22:38:59'),
(2056, 'categories', 'name', 992, 'ar', 'معدات تشخيص طبي', '2020-04-16 18:51:01', '2020-04-30 22:41:30'),
(2057, 'categories', 'name', 993, 'ar', 'سينسور اختبار', '2020-04-16 18:52:56', '2020-04-30 22:42:08'),
(2058, 'categories', 'name', 994, 'ar', 'جهاز ارسال ترانسمتر', '2020-04-16 18:53:32', '2020-04-30 22:42:52'),
(2059, 'categories', 'name', 995, 'ar', 'عداد كهرباء', '2020-04-16 18:53:53', '2020-04-30 22:43:09'),
(2060, 'categories', 'name', 996, 'ar', 'متر للسائل و الغاز', '2020-04-16 18:54:39', '2020-04-30 22:44:38'),
(2061, 'categories', 'name', 997, 'ar', 'الة قياس فيزيائي', '2020-04-16 18:55:30', '2020-04-30 22:45:17'),
(2062, 'categories', 'name', 998, 'ar', 'أجهزة وزن و قياس', '2020-04-16 18:56:05', '2020-04-30 22:47:24'),
(2063, 'categories', 'name', 999, 'ar', 'بطاقة مقارنة ألوان', '2020-04-16 18:56:39', '2020-04-30 22:46:32'),
(2064, 'categories', 'name', 1000, 'ar', 'اداة مسح جغرافي', '2020-04-16 18:57:05', '2020-04-30 22:48:08'),
(2065, 'categories', 'name', 1001, 'ar', 'عدسات بصرية', '2020-04-16 18:57:41', '2020-04-30 22:48:27'),
(2066, 'categories', 'name', 1002, 'ar', 'ادوات مختبر', '2020-04-16 18:58:57', '2020-04-30 22:49:03'),
(2067, 'categories', 'name', 1003, 'ar', 'معدات مختبر', '2020-04-16 19:00:15', '2020-04-30 22:49:30'),
(2068, 'categories', 'name', 1004, 'ar', 'أجهزة تجميل', '2020-04-16 19:00:34', '2020-04-30 22:50:14'),
(2069, 'categories', 'name', 1005, 'ar', 'أدوات كابلات ', '2020-04-16 19:01:08', '2020-04-30 22:50:37'),
(2070, 'categories', 'name', 1006, 'ar', 'أدوات توضيحية', '2020-04-16 19:03:38', '2020-05-01 03:51:49'),
(2071, 'categories', 'name', 1007, 'ar', 'أدوات طب أسنان', '2020-04-16 19:04:20', '2020-04-30 22:55:47'),
(2072, 'categories', 'name', 1008, 'ar', 'نظام تحكم كهربي', '2020-04-16 19:10:14', '2020-04-30 22:56:05'),
(2073, 'categories', 'name', 1009, 'ar', 'أقطاب كهربية', '2020-04-16 19:10:33', '2020-04-30 22:56:26'),
(2074, 'categories', 'name', 1010, 'ar', 'أدوات تحكم تبريد و حرارة', '2020-04-16 19:10:42', '2020-04-30 22:57:08'),
(2075, 'categories', 'name', 1011, 'ar', 'صندوق أدوات', '2020-04-16 19:10:51', '2020-04-30 22:57:52'),
(2076, 'categories', 'name', 1012, 'ar', 'عداد مؤقت تايمر', '2020-04-16 19:11:05', '2020-04-30 22:58:18'),
(2077, 'categories', 'name', 1013, 'ar', 'أدوات طبية عالمية', '2020-04-16 19:11:40', '2020-04-30 22:58:47'),
(2078, 'categories', 'name', 1014, 'ar', 'أدوات و عدد أخري', '2020-04-16 19:12:31', '2020-04-30 22:59:12'),
(2079, 'categories', 'name', 1015, 'ar', 'تجهيزات مطابخ', '2020-04-16 19:13:52', '2020-04-30 23:00:16'),
(2080, 'categories', 'name', 1016, 'ar', 'فناجين و كاسات', '2020-04-16 19:14:45', '2020-04-30 23:02:05'),
(2081, 'categories', 'name', 1017, 'ar', 'أكواب', '2020-04-16 19:16:24', '2020-04-30 23:00:32'),
(2082, 'categories', 'name', 1018, 'ar', 'أدوات عناية بالشعر', '2020-04-16 19:16:33', '2020-04-30 23:01:24'),
(2083, 'categories', 'name', 1019, 'ar', 'أدوات مطبخ و طعام', '2020-04-16 19:17:37', '2020-04-30 23:02:49'),
(2084, 'categories', 'name', 1020, 'ar', 'علب و ملصقات', '2020-04-16 19:18:35', '2020-04-30 23:03:15'),
(2085, 'products', 'name', 16, 'ar', 'asd', NULL, NULL),
(2086, 'products', 'description', 16, 'ar', 'as', NULL, NULL),
(2087, 'categories', 'name', 1021, 'ar', 'أدوات مائدة', '2020-04-16 19:21:09', '2020-04-30 23:03:35'),
(2088, 'categories', 'name', 1025, 'ar', 'أجهزة المطبخ', '2020-04-16 19:25:09', '2020-04-30 23:06:47'),
(2089, 'categories', 'name', 1026, 'ar', 'شنطة غسيل', '2020-04-16 19:25:20', '2020-05-01 00:43:12'),
(2090, 'categories', 'name', 1027, 'ar', 'لوازم كوافير', '2020-04-16 19:25:34', '2020-05-01 00:43:37'),
(2091, 'categories', 'name', 1028, 'ar', 'مستلزمات الحمام', '2020-04-16 19:26:55', '2020-05-01 00:44:39'),
(2092, 'categories', 'name', 1029, 'ar', 'منتجات تجميل و عناية شخصية', '2020-04-16 19:28:38', '2020-05-01 00:45:16'),
(2093, 'categories', 'name', 1030, 'ar', 'منتجات عناية بالشعر', '2020-04-16 19:29:49', '2020-05-01 00:46:50'),
(2094, 'categories', 'name', 1031, 'ar', 'أدوات عناية بالشعر', '2020-04-16 19:29:59', '2020-05-01 00:47:11'),
(2095, 'categories', 'name', 1032, 'ar', 'مساحيق تجميل', '2020-04-16 19:30:24', '2020-05-01 00:47:37'),
(2096, 'categories', 'name', 1033, 'ar', 'أدوات تجميل', '2020-04-16 19:31:02', '2020-05-01 00:47:56'),
(2097, 'categories', 'name', 1034, 'ar', 'تجميل أظافر', '2020-04-16 19:31:41', '2020-05-01 00:48:36'),
(2098, 'categories', 'name', 1035, 'ar', 'عناية بالأسنان', '2020-04-16 19:32:10', '2020-05-01 00:48:55'),
(2099, 'categories', 'name', 1036, 'ar', 'ورق صحى و مناديل', '2020-04-16 19:34:15', '2020-05-01 00:49:13'),
(2100, 'categories', 'name', 1037, 'ar', 'عناية بالبشرة', '2020-04-16 19:34:44', '2020-05-01 00:50:35'),
(2101, 'categories', 'name', 1038, 'ar', 'حقيبة مستحضرات تجميل', '2020-04-16 19:35:56', '2020-05-01 00:50:59'),
(2102, 'categories', 'name', 1039, 'ar', 'مفارش سرير', '2020-04-16 19:37:14', '2020-05-01 00:51:28'),
(2103, 'categories', 'name', 1040, 'ar', 'سجاد و موكيت', '2020-04-16 19:37:40', '2020-05-01 00:51:47'),
(2104, 'categories', 'name', 1041, 'ar', 'ستائر', '2020-04-16 19:38:14', '2020-05-01 00:52:25'),
(2105, 'categories', 'name', 1042, 'ar', 'قماش ديكور', '2020-04-16 19:38:55', '2020-05-01 00:52:44'),
(2106, 'categories', 'name', 1043, 'ar', 'قماش مطبخ', '2020-04-16 19:39:50', '2020-05-01 00:53:08'),
(2107, 'categories', 'name', 1044, 'ar', 'مفرش تربيزة', '2020-04-16 19:40:38', '2020-05-01 00:53:32'),
(2108, 'categories', 'name', 1045, 'ar', 'فوطة', '2020-04-16 19:41:08', '2020-05-01 00:54:13'),
(2109, 'categories', 'name', 1046, 'ar', 'منظفات منزلية', '2020-04-16 19:41:44', '2020-05-01 00:54:47'),
(2110, 'categories', 'name', 1047, 'ar', 'أدوات بلاستيك منزلي', '2020-04-16 19:41:55', '2020-05-01 00:55:15'),
(2111, 'categories', 'name', 1048, 'ar', 'أوعية منزلية', '2020-04-16 19:42:48', '2020-05-01 00:55:43'),
(2112, 'categories', 'name', 1049, 'ar', 'Sanitary Utensil', '2020-04-16 19:43:25', '2020-04-16 19:43:25'),
(2113, 'categories', 'name', 1050, 'ar', 'سلة غسيل', '2020-04-16 19:44:09', '2020-05-01 00:58:13'),
(2114, 'categories', 'name', 1051, 'ar', 'منظف عدسات', '2020-04-16 19:44:47', '2020-05-01 00:58:35'),
(2115, 'categories', 'name', 1052, 'ar', 'مكنسة كهرباء', '2020-04-16 19:45:03', '2020-05-01 01:01:21'),
(2116, 'categories', 'name', 1053, 'ar', 'ساعات', '2020-04-16 19:46:56', '2020-05-01 01:53:41'),
(2117, 'categories', 'name', 1054, 'ar', 'نظارات', '2020-04-16 19:47:47', '2020-05-01 01:54:08'),
(2118, 'categories', 'name', 1055, 'ar', 'أدوات بساتين', '2020-04-16 19:48:05', '2020-05-01 01:54:31'),
(2119, 'categories', 'name', 1056, 'ar', 'معدات خيمة', '2020-04-16 19:48:21', '2020-05-01 01:55:00'),
(2120, 'categories', 'name', 1058, 'ar', 'أجهزة لياقة بدنية', '2020-04-16 19:48:30', '2020-05-01 01:56:19'),
(2121, 'categories', 'name', 1057, 'ar', 'عدة صيد', '2020-04-16 19:48:31', '2020-05-01 01:56:02'),
(2122, 'categories', 'name', 1059, 'ar', 'رشاش حديقة', '2020-04-16 19:49:05', '2020-05-01 01:56:50'),
(2123, 'categories', 'name', 1060, 'ar', 'آلات موسيقية', '2020-04-16 19:49:15', '2020-05-01 01:57:14'),
(2124, 'categories', 'name', 1061, 'ar', 'مستلزمات حيوانات أليفة', '2020-04-16 19:49:25', '2020-05-01 01:58:47'),
(2125, 'categories', 'name', 1062, 'ar', 'أدوات رياضية', '2020-04-16 19:49:41', '2020-05-01 01:59:06'),
(2126, 'categories', 'name', 1063, 'ar', 'لوازم البيبي', '2020-04-16 19:51:10', '2020-05-01 01:59:35'),
(2127, 'categories', 'name', 1064, 'ar', 'مظلات للمطر و معاطف', '2020-04-16 19:51:45', '2020-05-01 02:00:03'),
(2128, 'categories', 'name', 1065, 'ar', 'كبريت و ولاعات', '2020-04-16 19:53:39', '2020-05-01 02:00:52'),
(2129, 'categories', 'name', 1066, 'ar', 'أرفف و شماعات', '2020-04-16 19:54:11', '2020-05-01 02:01:28'),
(2130, 'categories', 'name', 1067, 'ar', 'حافظة اسطوانات', '2020-04-16 19:54:39', '2020-05-01 02:02:49'),
(2131, 'categories', 'name', 1068, 'ar', 'حقيبة مبرد', '2020-04-16 19:56:47', '2020-05-01 02:03:48'),
(2132, 'categories', 'name', 1069, 'ar', 'لوازم خياطة', '2020-04-16 19:57:21', '2020-05-01 02:04:20'),
(2133, 'categories', 'name', 1070, 'ar', 'أطباق و كوبايات فوم', '2020-04-16 19:58:14', '2020-05-01 02:14:08'),
(2134, 'categories', 'name', 1071, 'ar', 'معطر جو', '2020-04-16 19:58:59', '2020-05-01 02:19:29'),
(2135, 'categories', 'name', 1072, 'ar', 'حقيبة بدلة', '2020-04-16 19:59:13', '2020-05-01 02:15:17'),
(2136, 'categories', 'name', 1073, 'ar', 'عدد و لوازم منزلية', '2020-04-16 20:00:48', '2020-05-01 02:15:37'),
(2137, 'categories', 'name', 1074, 'ar', 'لوازم فنادق', '2020-04-16 20:01:59', '2020-05-01 02:15:56'),
(2138, 'categories', 'name', 1075, 'ar', 'أدوات مطاط منزلية', '2020-04-16 20:02:40', '2020-05-01 02:20:25'),
(2139, 'categories', 'name', 1076, 'ar', 'صاعق حشرات', '2020-04-16 20:02:50', '2020-05-01 02:20:44'),
(2140, 'categories', 'name', 1077, 'ar', 'سلم منزلي', '2020-04-16 20:03:02', '2020-05-01 02:21:01'),
(2141, 'categories', 'name', 1078, 'ar', 'شنط مشتريات', '2020-04-16 20:03:48', '2020-05-01 02:32:35'),
(2142, 'categories', 'name', 1079, 'ar', 'مبيدات حشرية', '2020-04-16 20:04:26', '2020-05-01 02:33:14'),
(2143, 'categories', 'name', 1080, 'ar', 'شنطة رحلات', '2020-04-16 20:04:37', '2020-05-01 02:33:43'),
(2144, 'categories', 'name', 1081, 'ar', 'شنط هدايا', '2020-04-16 20:04:45', '2020-05-01 02:34:05'),
(2145, 'categories', 'name', 1082, 'ar', 'صناديق معدات خاصة', '2020-04-16 20:04:53', '2020-05-01 02:35:06'),
(2146, 'categories', 'name', 1083, 'ar', 'ادوات مكتبية', '2020-04-16 20:07:24', '2020-05-01 02:35:26'),
(2147, 'categories', 'name', 1085, 'ar', 'خيوط و حبال', '2020-04-16 20:08:19', '2020-05-01 02:36:04'),
(2148, 'categories', 'name', 1086, 'ar', 'ميزان منزلي', '2020-04-16 20:08:28', '2020-05-01 02:36:30'),
(2149, 'categories', 'name', 1087, 'ar', 'حقائب أخري و اكسسوار', '2020-04-16 20:08:37', '2020-05-01 02:37:21'),
(2150, 'categories', 'name', 1088, 'ar', 'معدات معارض و اعلانات', '2020-04-16 20:09:34', '2020-05-01 02:37:52'),
(2151, 'categories', 'name', 1089, 'ar', 'شريط لاصق', '2020-04-16 20:10:16', '2020-05-01 02:38:11'),
(2152, 'categories', 'name', 1090, 'ar', 'بالونات دعاية واعلان', '2020-04-16 20:11:44', '2020-05-01 02:38:37'),
(2153, 'categories', 'name', 1091, 'ar', 'مانيكان عرض أزياء', '2020-04-16 20:13:30', '2020-05-01 02:39:15'),
(2154, 'categories', 'name', 1092, 'ar', 'لوازم نقل', '2020-04-16 20:14:05', '2020-05-01 02:39:58'),
(2155, 'categories', 'name', 1093, 'ar', 'تغليف و طباعة', '2020-04-16 20:15:06', '2020-05-01 02:40:21'),
(2156, 'categories', 'name', 1094, 'ar', 'مواد ورقية', '2020-04-16 20:15:46', '2020-05-01 02:41:10'),
(2157, 'categories', 'name', 1095, 'ar', 'عبوات أدوية', '2020-04-16 20:15:53', '2020-05-01 02:48:52'),
(2158, 'categories', 'name', 1096, 'ar', 'شنط منزلية', '2020-04-16 20:16:00', '2020-05-01 02:49:52'),
(2159, 'categories', 'name', 1097, 'ar', 'لوازم شانيور', '2020-04-16 20:16:34', '2020-05-01 02:50:31'),
(2160, 'categories', 'name', 1098, 'ar', 'أدوات نحت', '2020-04-16 20:17:07', '2020-05-01 02:52:49'),
(2161, 'categories', 'name', 1099, 'ar', 'أدوات حفر', '2020-04-16 20:18:33', '2020-05-01 02:53:01'),
(2162, 'categories', 'name', 1100, 'ar', 'عدد يدوية', '2020-04-16 20:19:24', '2020-05-01 02:53:15'),
(2163, 'categories', 'name', 1101, 'ar', 'أجهزرة هيدروليكية', '2020-04-16 20:20:12', '2020-05-01 02:53:40'),
(2164, 'categories', 'name', 1102, 'ar', 'عدد كهربائية', '2020-04-16 20:20:46', '2020-05-01 02:56:13'),
(2165, 'categories', 'name', 1103, 'ar', 'أدوات تصليح سيارات', '2020-04-16 20:20:58', '2020-05-01 03:09:03'),
(2166, 'categories', 'name', 1104, 'ar', 'أدوات الكابلات', '2020-04-16 20:21:06', '2020-05-01 03:09:22'),
(2167, 'categories', 'name', 1105, 'ar', 'معدات وأدوات بناء', '2020-04-16 20:21:30', '2020-05-01 03:10:54'),
(2168, 'categories', 'name', 1106, 'ar', 'أدوات بساتين', '2020-04-16 20:21:34', '2020-05-01 03:11:42'),
(2169, 'categories', 'name', 1107, 'ar', 'أدوات هيدروليكية', '2020-04-16 20:22:09', '2020-05-01 03:12:07'),
(2170, 'categories', 'name', 1108, 'ar', 'أدوات تعمل بضغط هواء', '2020-04-16 20:22:56', '2020-05-01 03:12:34'),
(2171, 'categories', 'name', 1109, 'ar', 'اداة مبرشم', '2020-04-16 20:23:27', '2020-05-01 03:12:59'),
(2172, 'categories', 'name', 1110, 'ar', 'أدوات تغليف منزلية', '2020-04-16 20:23:52', '2020-05-01 03:13:51'),
(2173, 'categories', 'name', 1111, 'ar', 'لوازم لحام', '2020-04-16 20:24:04', '2020-05-01 03:14:12'),
(2174, 'categories', 'name', 1112, 'ar', 'عدد و لوازم بناء', '2020-04-16 20:24:39', '2020-05-01 03:14:56'),
(2175, 'categories', 'name', 1113, 'ar', 'لوازم و عدد صلب', '2020-04-16 20:25:39', '2020-05-01 03:17:02'),
(2176, 'categories', 'name', 1114, 'ar', 'عدد منزلية', '2020-04-16 20:27:38', '2020-05-01 03:20:05'),
(2177, 'categories', 'name', 1115, 'ar', 'عدد ماكينات', '2020-04-16 20:28:09', '2020-05-01 03:21:30'),
(2178, 'categories', 'name', 1116, 'ar', 'عجلات', '2020-04-16 20:28:18', '2020-05-01 03:21:53'),
(2179, 'categories', 'name', 1117, 'ar', 'أرفف و شماعات', '2020-04-16 20:28:25', '2020-05-01 03:23:01'),
(2180, 'categories', 'name', 1118, 'ar', 'تجهيزات أنابيب', '2020-04-16 20:28:35', '2020-05-01 03:23:47'),
(2181, 'categories', 'name', 1119, 'ar', 'قطع غيار الأجهزة العالمية', '2020-04-16 20:28:40', '2020-05-01 03:24:11'),
(2182, 'categories', 'name', 1120, 'ar', 'مخزون أدوات و معدات', '2020-04-16 20:29:27', '2020-05-01 03:24:45'),
(2183, 'categories', 'name', 1121, 'ar', 'أدوات و عدد أخري', '2020-04-16 20:50:13', '2020-05-01 03:25:23'),
(2184, 'categories', 'name', 1122, 'ar', 'لوازم طابعات', '2020-04-16 20:50:37', '2020-05-01 03:25:47'),
(2185, 'categories', 'name', 1123, 'ar', 'طابعات و فاكس', '2020-04-16 20:50:47', '2020-05-01 03:26:11'),
(2186, 'categories', 'name', 1124, 'ar', 'آلة تغليف', '2020-04-16 20:51:29', '2020-05-01 03:26:40'),
(2187, 'categories', 'name', 1125, 'ar', 'آلة حاسبة', '2020-04-16 20:51:44', '2020-05-01 03:27:21'),
(2188, 'categories', 'name', 1126, 'ar', 'نظام مؤتمرات', '2020-04-16 20:52:13', '2020-05-01 03:27:42'),
(2189, 'categories', 'name', 1127, 'ar', 'طابعة مكتبية', '2020-04-16 20:52:20', '2020-05-01 03:28:04'),
(2190, 'categories', 'name', 1128, 'ar', 'فاكس', '2020-04-16 20:52:29', '2020-05-01 03:28:50'),
(2191, 'categories', 'name', 1130, 'ar', 'لابتوب', '2020-04-16 20:54:11', '2020-05-01 03:29:11'),
(2192, 'categories', 'name', 1131, 'ar', 'أدوات مكتبية و تعليمية', '2020-04-16 20:54:53', '2020-05-01 03:29:36'),
(2193, 'categories', 'name', 1132, 'ar', 'أجهزة مكتبية', '2020-04-16 20:55:07', '2020-05-01 03:30:01'),
(2194, 'categories', 'name', 1133, 'ar', 'أثاث مكتبي', '2020-04-16 20:55:16', '2020-05-01 03:30:53'),
(2195, 'categories', 'name', 1134, 'ar', 'ديكور مكتبي', '2020-04-16 20:55:27', '2020-05-01 03:31:19'),
(2196, 'categories', 'name', 1135, 'ar', 'كمبيوتر PDA', '2020-04-16 20:55:40', '2020-05-01 03:31:46'),
(2197, 'categories', 'name', 1136, 'ar', 'الة تقطيع ورق', '2020-04-16 20:55:48', '2020-05-01 03:32:05'),
(2198, 'categories', 'name', 1137, 'ar', 'الة تنسيق ورق', '2020-04-16 20:56:16', '2020-05-01 03:32:59'),
(2199, 'categories', 'name', 1138, 'ar', 'جهاز تصوير مكتبي', '2020-04-16 20:57:50', '2020-05-01 03:33:24'),
(2200, 'categories', 'name', 1139, 'ar', 'ماسح ضوئي سكانر', '2020-04-16 20:58:02', '2020-05-01 03:33:48'),
(2201, 'categories', 'name', 1140, 'ar', 'مكاتب خشبية', '2020-04-16 20:59:05', '2020-05-01 03:34:13'),
(2202, 'categories', 'name', 1141, 'ar', 'أشرطة لاصقة', '2020-04-16 21:00:37', '2020-05-01 03:35:50'),
(2203, 'categories', 'name', 1142, 'ar', 'موبايلات', '2020-04-16 21:00:50', '2020-05-01 03:36:04'),
(2204, 'categories', 'name', 1143, 'ar', 'جهاز حضور و انصراف', '2020-04-16 21:00:59', '2020-05-01 03:36:30'),
(2205, 'categories', 'name', 1144, 'ar', 'أقلام و فرشاة', '2020-04-16 21:02:32', '2020-05-01 03:44:16'),
(2206, 'categories', 'name', 1145, 'ar', 'ادوات مكتبية', '2020-04-16 21:03:59', '2020-05-01 03:44:34'),
(2207, 'categories', 'name', 1146, 'ar', 'حافظة بطاقات', '2020-04-16 21:04:48', '2020-05-01 03:45:03'),
(2208, 'categories', 'name', 1147, 'ar', 'ادوات تعليمية', '2020-04-16 21:05:47', '2020-05-01 03:45:21'),
(2209, 'categories', 'name', 1149, 'ar', 'جهاز عرض بروجكتور', '2020-04-16 21:11:02', '2020-05-01 03:53:12'),
(2210, 'categories', 'name', 1150, 'ar', 'بطاقة مقارنة ألوان', '2020-04-16 21:11:14', '2020-05-01 03:53:41'),
(2211, 'categories', 'name', 1151, 'ar', 'ادوات مختبر', '2020-04-16 21:11:25', '2020-05-01 03:54:02'),
(2212, 'categories', 'name', 1152, 'ar', 'Learning Machine', '2020-04-16 21:11:51', '2020-04-16 21:11:51'),
(2213, 'categories', 'name', 1153, 'ar', 'عدسات بصرية', '2020-04-16 21:11:58', '2020-05-01 03:55:48'),
(2214, 'categories', 'name', 1154, 'ar', 'أثاث مدرسي', '2020-04-16 21:12:09', '2020-05-01 03:56:04'),
(2215, 'categories', 'name', 1155, 'ar', 'عداد مؤقت تايمر', '2020-04-16 21:12:23', '2020-05-01 03:56:19'),
(2216, 'categories', 'name', 1156, 'ar', 'لوازم مكتبية أخري', '2020-04-16 21:13:24', '2020-05-01 03:57:14'),
(2217, 'categories', 'name', 1157, 'ar', 'الآلات الزراعية', '2020-04-16 21:13:41', '2020-05-01 03:58:06'),
(2218, 'categories', 'name', 1158, 'ar', 'ألات تصنيع', '2020-04-16 21:14:10', '2020-05-01 03:58:32'),
(2219, 'categories', 'name', 1159, 'ar', 'رافعة', '2020-04-16 21:14:39', '2020-05-01 03:59:41'),
(2220, 'categories', 'name', 1160, 'ar', 'الات تصنيع أغذية', '2020-04-16 21:15:47', '2020-05-01 04:02:33'),
(2221, 'categories', 'name', 1161, 'ar', 'الات وسم', '2020-04-16 21:16:20', '2020-05-01 04:00:58'),
(2222, 'categories', 'name', 1162, 'ar', 'ماسح ثلاثي الأبعاد', '2020-04-16 21:16:34', '2020-05-01 04:01:35'),
(2223, 'categories', 'name', 1163, 'ar', 'Customized Service for Machinery', '2020-04-16 21:17:10', '2020-04-16 21:17:10'),
(2224, 'categories', 'name', 1164, 'ar', 'Hydraulic Press', '2020-04-16 21:17:37', '2020-04-16 21:17:37'),
(2225, 'categories', 'name', 1165, 'ar', 'الة صنع ثلج', '2020-04-16 21:18:01', '2020-05-01 05:43:49'),
(2226, 'categories', 'name', 1166, 'ar', 'روبوت صناعي', '2020-04-16 21:19:42', '2020-05-01 05:44:04'),
(2227, 'categories', 'name', 1167, 'ar', 'ماكينات خياطة ملابس', '2020-04-16 21:20:11', '2020-05-01 05:44:52'),
(2228, 'categories', 'name', 1168, 'ar', 'قطع غيار الات ', '2020-04-16 21:21:04', '2020-05-01 05:45:16'),
(2229, 'categories', 'name', 1169, 'ar', 'ماكينات جلود', '2020-04-16 21:21:45', '2020-05-01 05:45:39'),
(2230, 'categories', 'name', 1170, 'ar', 'الات تصنيع كيميائي', '2020-04-16 21:22:20', '2020-05-01 05:46:04'),
(2231, 'categories', 'name', 1171, 'ar', 'الات تصنيع صيدلي', '2020-04-16 21:22:33', '2020-05-01 05:47:26'),
(2232, 'categories', 'name', 1172, 'ar', 'ماكينات تصنيع مواد بناء', '2020-04-16 21:23:23', '2020-05-01 05:47:49'),
(2233, 'categories', 'name', 1173, 'ar', 'معدات بناء', '2020-04-16 21:23:51', '2020-05-01 05:48:13'),
(2234, 'categories', 'name', 1174, 'ar', 'معدات رفع', '2020-04-16 21:24:26', '2020-05-01 05:49:12'),
(2235, 'categories', 'name', 1175, 'ar', 'معدات خلط', '2020-04-16 21:29:32', '2020-05-01 05:49:31'),
(2236, 'categories', 'name', 1176, 'ar', 'ماكينات تصنيع معادن', '2020-04-16 21:30:05', '2020-05-01 05:50:00'),
(2237, 'categories', 'name', 1177, 'ar', 'الات تصنيع أحجار', '2020-04-16 21:30:59', '2020-05-01 05:50:27'),
(2238, 'categories', 'name', 1178, 'ar', 'الات نجارة', '2020-04-16 21:31:57', '2020-05-01 05:51:07'),
(2239, 'categories', 'name', 1179, 'ar', 'الات تصنيع أثاث', '2020-04-16 21:32:39', '2020-05-01 05:51:27'),
(2240, 'categories', 'name', 1180, 'ar', 'بريمة حفر', '2020-04-16 21:33:12', '2020-05-01 05:51:46'),
(2241, 'categories', 'name', 1181, 'ar', 'ماكينات تعدين', '2020-04-16 21:34:01', '2020-05-01 05:52:19'),
(2242, 'categories', 'name', 1182, 'ar', 'معدات و ماكينات بترول', '2020-04-16 21:34:56', '2020-05-01 05:53:04'),
(2243, 'categories', 'name', 1183, 'ar', 'خطوط انتاج و تجميع', '2020-04-16 21:35:30', '2020-05-01 05:53:25'),
(2244, 'categories', 'name', 1184, 'ar', 'ماكينات تعدين', '2020-04-16 21:35:54', '2020-05-01 05:55:41'),
(2245, 'categories', 'name', 1185, 'ar', 'ماكينات تصنيع بلاستيك', '2020-04-16 21:36:21', '2020-05-01 05:56:05'),
(2246, 'categories', 'name', 1186, 'ar', 'الات تصنيع مطاط', '2020-04-16 21:36:30', '2020-05-01 05:56:43'),
(2247, 'categories', 'name', 1187, 'ar', 'Manipulator', '2020-04-16 21:37:01', '2020-04-16 21:37:01'),
(2248, 'categories', 'name', 1188, 'ar', 'الات تصنيع ورق', '2020-04-16 21:37:32', '2020-05-01 05:57:04'),
(2249, 'categories', 'name', 1189, 'ar', 'الات تصنيع زجاج', '2020-04-16 21:38:13', '2020-05-01 05:58:08'),
(2250, 'categories', 'name', 1190, 'ar', 'الات تعبئة و تغليف', '2020-04-16 21:40:19', '2020-05-01 05:58:32'),
(2251, 'categories', 'name', 1191, 'ar', 'ماكينات تعبئة', '2020-04-16 21:41:00', '2020-05-01 05:58:52'),
(2252, 'categories', 'name', 1192, 'ar', 'معدات ما بعد الطباعة', '2020-04-16 21:41:27', '2020-05-01 05:59:15'),
(2253, 'categories', 'name', 1193, 'ar', 'معدات ماقبل الطباعة', '2020-04-16 21:42:24', '2020-05-01 06:00:23'),
(2254, 'categories', 'name', 1194, 'ar', 'ماكينات طباعة', '2020-04-16 21:42:51', '2020-05-01 06:00:41'),
(2257, 'categories', 'name', 1198, 'ar', 'الة قطع', '2020-04-16 21:47:16', '2020-05-01 06:01:02'),
(2258, 'categories', 'name', 1199, 'ar', 'الة حفر', '2020-04-16 21:47:44', '2020-05-01 06:01:20'),
(2259, 'categories', 'name', 1200, 'ar', 'معدات ليزر', '2020-04-16 21:48:16', '2020-05-01 06:59:48'),
(2260, 'categories', 'name', 1201, 'ar', 'معدات الات', '2020-04-16 21:48:40', '2020-05-01 07:00:11'),
(2261, 'categories', 'name', 1202, 'ar', 'الآت اعادة تدوير', '2020-04-16 21:49:17', '2020-05-01 07:00:33'),
(2262, 'categories', 'name', 1203, 'ar', 'الة فرز', '2020-04-16 21:49:42', '2020-05-01 07:00:50'),
(2263, 'categories', 'name', 1204, 'ar', 'Crushing & Culling Machine', '2020-04-16 21:51:10', '2020-04-16 21:51:10'),
(2264, 'categories', 'name', 1205, 'ar', 'Diamond Tools', '2020-04-16 21:52:14', '2020-04-16 21:52:14'),
(2265, 'categories', 'name', 1206, 'ar', 'Etching Machine', '2020-04-16 21:53:59', '2020-04-16 21:53:59'),
(2266, 'categories', 'name', 1208, 'ar', 'شانيور', '2020-04-16 21:55:25', '2020-05-01 06:51:34'),
(2267, 'categories', 'name', 1209, 'ar', 'عدد يدوية', '2020-04-16 21:55:42', '2020-05-01 06:51:50'),
(2268, 'categories', 'name', 1210, 'ar', 'أدوات تعمل بضغط هواء', '2020-04-16 21:55:50', '2020-05-01 06:52:20'),
(2269, 'categories', 'name', 1211, 'ar', 'عدد كهربائية', '2020-04-16 21:56:00', '2020-05-01 06:52:43'),
(2270, 'categories', 'name', 1212, 'ar', 'الات رش', '2020-04-16 21:56:31', '2020-05-01 06:53:40'),
(2271, 'categories', 'name', 1213, 'ar', 'شبك سلك', '2020-04-16 21:56:47', '2020-05-01 06:54:00'),
(2272, 'categories', 'name', 1214, 'ar', 'معدات تصنيع المنتجات الكهربائية والإلكترونية', '2020-04-16 21:56:55', '2020-05-01 06:54:43'),
(2273, 'categories', 'name', 1215, 'ar', 'Mattress Machine', '2020-04-16 21:58:01', '2020-04-16 21:58:01'),
(2274, 'categories', 'name', 1216, 'ar', 'ماكينات التصنيع والمعالجة الأخرى', '2020-04-16 21:58:25', '2020-05-01 06:55:42'),
(2275, 'categories', 'name', 1217, 'ar', 'منتجات معدنية غير حديدية', '2020-04-16 21:59:20', '2020-05-01 06:56:14'),
(2276, 'categories', 'name', 1218, 'ar', 'حديد صلب', '2020-04-16 21:59:33', '2020-05-01 06:56:30'),
(2277, 'categories', 'name', 1219, 'ar', 'سبائك', '2020-04-16 22:00:22', '2020-05-01 06:57:29'),
(2278, 'categories', 'name', 1220, 'ar', 'حدايد', '2020-04-16 22:01:01', '2020-05-01 06:58:16'),
(2279, 'categories', 'name', 1221, 'ar', 'مخزون حديد', '2020-04-16 22:04:25', '2020-05-01 06:58:46'),
(2280, 'categories', 'name', 1222, 'ar', 'Misc Ore', '2020-04-16 22:05:45', '2020-04-16 22:05:45'),
(2281, 'categories', 'name', 1223, 'ar', 'Rare Earth & Products', '2020-04-16 22:06:43', '2020-04-16 22:06:43'),
(2282, 'categories', 'name', 1224, 'ar', 'Target Material', '2020-04-16 22:07:35', '2020-04-16 22:07:35'),
(2283, 'categories', 'name', 1225, 'ar', 'شبكة سلك', '2020-04-16 22:07:45', '2020-05-01 06:43:07'),
(2284, 'categories', 'name', 1226, 'ar', 'مواد مغناطيسية', '2020-04-16 22:08:35', '2020-05-01 06:43:32'),
(2285, 'categories', 'name', 1227, 'ar', 'معادن لافلزية', '2020-04-16 22:10:47', '2020-05-01 06:44:33'),
(2304, 'categories', 'name', 1269, 'ar', 'نسيج ألياف', '2020-04-16 22:21:36', '2020-05-01 06:47:26'),
(2305, 'categories', 'name', 1270, 'ar', 'ألياف كيماوية', '2020-04-16 22:22:15', '2020-05-01 06:48:01'),
(2306, 'categories', 'name', 1271, 'ar', 'نسيج مركب', '2020-04-16 22:22:36', '2020-05-01 06:48:20'),
(2307, 'categories', 'name', 1272, 'ar', 'قطن', '2020-04-16 22:24:39', '2020-05-01 06:48:48'),
(2308, 'categories', 'name', 1273, 'ar', 'قماش قطني', '2020-04-16 22:25:17', '2020-05-01 06:49:10'),
(2309, 'categories', 'name', 1274, 'ar', 'تطريزات', '2020-04-16 22:25:58', '2020-05-01 06:35:18'),
(2310, 'categories', 'name', 1275, 'ar', 'نسيج', '2020-04-16 22:26:49', '2020-05-01 06:35:35'),
(2311, 'categories', 'name', 1276, 'ar', 'نسيج صناعي', '2020-04-16 22:27:30', '2020-05-01 06:35:53'),
(2312, 'categories', 'name', 1277, 'ar', 'قماش صناعي', '2020-04-16 22:28:03', '2020-05-01 06:36:18'),
(2313, 'categories', 'name', 1278, 'ar', 'منسوجات صناعية', '2020-04-16 22:28:59', '2020-05-01 06:37:00'),
(2314, 'categories', 'name', 1279, 'ar', 'قماش مطبخ', '2020-04-16 22:29:15', '2020-05-01 06:37:16'),
(2315, 'categories', 'name', 1280, 'ar', 'كروشيه', '2020-04-16 22:29:52', '2020-05-01 06:37:36'),
(2316, 'categories', 'name', 1281, 'ar', 'دانتيل', '2020-04-16 22:31:06', '2020-05-01 06:37:51'),
(2317, 'categories', 'name', 1284, 'ar', 'قماش غير مصنع', '2020-04-16 22:33:30', '2020-05-01 06:38:51'),
(2318, 'categories', 'name', 1285, 'ar', 'نايلون', '2020-04-16 22:35:02', '2020-05-01 06:39:06'),
(2319, 'products', 'name', 17, 'ar', 'asd', NULL, NULL),
(2320, 'products', 'description', 17, 'ar', 'as', NULL, NULL),
(2321, 'categories', 'name', 1286, 'ar', 'بوليستر', '2020-04-16 22:37:16', '2020-05-01 06:39:23'),
(2322, 'products', 'name', 18, 'ar', 'asd', NULL, NULL),
(2323, 'products', 'description', 18, 'ar', 'as', NULL, NULL),
(2324, 'categories', 'name', 1287, 'ar', 'قماش ملون و مطبوع', '2020-04-16 22:37:59', '2020-05-01 06:39:42'),
(2325, 'categories', 'name', 1288, 'ar', 'حرير', '2020-04-16 22:38:15', '2020-05-01 06:40:23'),
(2326, 'categories', 'name', 1289, 'ar', 'قماش جلد', '2020-04-16 22:38:52', '2020-05-01 06:41:00'),
(2327, 'categories', 'name', 1290, 'ar', 'مصنوعات ريش', '2020-04-16 22:39:43', '2020-05-01 06:41:18'),
(2328, 'categories', 'name', 1291, 'ar', 'معطف فرو', '2020-04-16 22:40:27', '2020-05-01 06:27:43'),
(2329, 'categories', 'name', 1292, 'ar', 'صوف', '2020-04-16 22:42:37', '2020-05-01 06:28:04'),
(2330, 'categories', 'name', 1293, 'ar', 'مفارش و أغطية للأثاث', '2020-04-16 22:43:13', '2020-05-01 06:28:32'),
(2331, 'categories', 'name', 1294, 'ar', 'فوطة', '2020-04-16 22:43:18', '2020-05-01 06:28:44'),
(2332, 'categories', 'name', 1295, 'ar', 'مفارش سرير', '2020-04-16 22:43:33', '2020-05-01 06:29:37'),
(2333, 'categories', 'name', 1296, 'ar', 'سجاد و موكيت', '2020-04-16 22:44:18', '2020-05-01 06:29:52'),
(2334, 'categories', 'name', 1297, 'ar', 'ستائر', '2020-04-16 22:44:24', '2020-05-01 06:30:05'),
(2335, 'categories', 'name', 1298, 'ar', 'قماش ديكور', '2020-04-16 22:44:31', '2020-05-01 06:30:20'),
(2336, 'categories', 'name', 1299, 'ar', 'Edging & Tassel', '2020-04-16 22:44:57', '2020-04-16 22:44:57'),
(2337, 'categories', 'name', 1300, 'ar', 'ربطة عنق و كاريفتات', '2020-04-16 22:46:15', '2020-05-01 06:32:19'),
(2338, 'categories', 'name', 1301, 'ar', 'مفرش تربيزة', '2020-04-16 22:46:21', '2020-05-01 06:31:39'),
(2339, 'categories', 'name', 1303, 'ar', 'بطاقة مقارنة ألوان', '2020-04-16 22:46:34', '2020-05-01 06:33:24'),
(2340, 'categories', 'name', 1302, 'ar', 'خيوط و حبال', '2020-04-16 22:46:36', '2020-05-01 06:32:51'),
(2341, 'categories', 'name', 1304, 'ar', 'علامة توكيل ملابس', '2020-04-16 22:46:40', '2020-05-01 06:33:43'),
(2342, 'categories', 'name', 1305, 'ar', 'شريط لاصق', '2020-04-16 22:46:46', '2020-05-01 06:33:56'),
(2343, 'categories', 'name', 1306, 'ar', 'مخزون قماش', '2020-04-16 22:47:56', '2020-05-01 06:20:40'),
(2344, 'categories', 'name', 1307, 'ar', 'Textile Waste', '2020-04-16 22:48:22', '2020-04-16 22:48:22'),
(2345, 'categories', 'name', 1308, 'ar', 'قماش غزل', '2020-04-16 22:49:51', '2020-05-01 06:21:09'),
(2346, 'categories', 'name', 1309, 'ar', 'منسوجات اخري', '2020-04-16 22:50:28', '2020-05-01 06:21:29'),
(2352, 'categories', 'name', 1315, 'ar', 'Customized Service for Textile', '2020-04-16 22:53:09', '2020-04-16 22:53:09'),
(2353, 'categories', 'name', 1316, 'ar', 'ماكينات جلود', '2020-04-16 22:53:18', '2020-05-01 06:22:40'),
(2354, 'categories', 'name', 1317, 'ar', 'Textile Machinery & Parts', '2020-04-16 22:53:25', '2020-04-16 22:53:25'),
(2355, 'categories', 'name', 1318, 'ar', 'رافعة شوكية', '2020-04-16 22:54:05', '2020-05-01 06:23:15'),
(2356, 'categories', 'name', 1319, 'ar', 'سكوتر احترافي', '2020-04-16 22:54:53', '2020-05-01 06:24:32'),
(2357, 'categories', 'name', 1320, 'ar', 'دراجة فيزبا', '2020-04-16 22:55:17', '2020-05-01 06:24:55'),
(2358, 'categories', 'name', 1321, 'ar', 'سكوتر', '2020-04-16 22:55:29', '2020-05-01 06:25:13'),
(2359, 'categories', 'name', 1322, 'ar', 'سكوتر بحر', '2020-04-16 22:55:38', '2020-05-01 06:25:29'),
(2360, 'categories', 'name', 1323, 'ar', 'سكوتر ثلج', '2020-04-16 22:55:47', '2020-05-01 06:26:00'),
(2361, 'categories', 'name', 1324, 'ar', 'سيارة رباعية', '2020-04-16 22:56:54', '2020-05-01 06:26:28'),
(2362, 'categories', 'name', 1325, 'ar', 'اكسسوارات دراجات', '2020-04-16 22:57:52', '2020-05-01 06:26:54'),
(2363, 'categories', 'name', 1326, 'ar', 'دراجات', '2020-04-16 22:58:35', '2020-05-01 06:12:13'),
(2364, 'categories', 'name', 1327, 'ar', 'Electric Vehicle & Parts', '2020-04-16 22:59:02', '2020-04-16 22:59:02'),
(2365, 'categories', 'name', 1328, 'ar', 'تريسيكل', '2020-04-16 22:59:08', '2020-05-01 06:12:44'),
(2366, 'categories', 'name', 1329, 'ar', 'موتوسيكل رياضي', '2020-04-16 22:59:31', '2020-05-01 06:14:01'),
(2367, 'categories', 'name', 1330, 'ar', 'دراجة نارية', '2020-04-16 23:01:03', '2020-05-01 06:14:52'),
(2368, 'categories', 'name', 1331, 'ar', 'أتوبيس', '2020-04-16 23:01:24', '2020-05-01 06:15:07'),
(2369, 'categories', 'name', 1332, 'ar', 'قطع غيار سيارات', '2020-04-16 23:01:40', '2020-05-01 06:15:36'),
(2370, 'categories', 'name', 1333, 'ar', 'أدوات تصليح سيارات', '2020-04-16 23:01:44', '2020-05-01 06:16:07'),
(2371, 'categories', 'name', 1334, 'ar', 'سيارات', '2020-04-16 23:01:59', '2020-05-01 06:17:30'),
(2372, 'categories', 'name', 1335, 'ar', 'اكسسوارات سيارات', '2020-04-16 23:03:16', '2020-05-01 06:17:50'),
(2373, 'categories', 'name', 1336, 'ar', 'حاوية تخزين', '2020-04-16 23:03:47', '2020-05-01 06:18:07'),
(2374, 'categories', 'name', 1337, 'ar', 'سيارة خاصة', '2020-04-16 23:03:56', '2020-05-01 06:18:32'),
(2375, 'categories', 'name', 1338, 'ar', 'جرار', '2020-04-16 23:05:26', '2020-05-01 06:19:16'),
(2376, 'categories', 'name', 1339, 'ar', 'تريلات مقطورة', '2020-04-16 23:06:59', '2020-05-01 06:19:43'),
(2377, 'categories', 'name', 1340, 'ar', 'شاحنة نقل', '2020-04-16 23:07:38', '2020-05-01 06:19:55'),
(2378, 'categories', 'name', 1341, 'ar', 'عربة جر تروللي ', '2020-04-16 23:10:38', '2020-05-01 06:03:54'),
(2379, 'categories', 'name', 1342, 'ar', 'سيارات سباقات', '2020-04-16 23:10:59', '2020-05-01 06:04:31'),
(2380, 'categories', 'name', 1343, 'ar', 'عربة جولف', '2020-04-16 23:11:06', '2020-05-01 06:04:44'),
(2381, 'categories', 'name', 1344, 'ar', 'قارب ترفيهي', '2020-04-16 23:11:49', '2020-05-01 06:05:05'),
(2382, 'categories', 'name', 1345, 'ar', 'محركات قوارب', '2020-04-16 23:15:38', '2020-05-01 06:06:01'),
(2388, 'categories', 'name', 1245, 'ar', 'ماكينات تصنيع معادن', '2020-04-16 23:55:49', '2020-05-01 06:45:00'),
(2389, 'categories', 'name', 1246, 'ar', 'ماكينات تعدين', '2020-04-16 23:55:56', '2020-05-01 06:45:29'),
(2390, 'categories', 'name', 1247, 'ar', 'ماكينات حفر', '2020-04-16 23:56:04', '2020-05-01 06:45:40'),
(2391, 'categories', 'name', 1248, 'ar', 'Petroleum Equipment & Machinery', '2020-04-16 23:58:09', '2020-04-16 23:58:09'),
(2392, 'categories', 'name', 1249, 'ar', 'معادن أخري', '2020-04-16 23:58:50', '2020-05-01 06:47:04'),
(2393, 'categories', 'name', 1348, 'ar', 'رصيف عائم', '2020-04-17 00:02:06', '2020-05-01 06:06:23'),
(2394, 'categories', 'name', 1349, 'ar', 'قطع غيار قوارب ترفيهية', '2020-04-17 00:02:26', '2020-05-01 06:06:47'),
(2395, 'categories', 'name', 1350, 'ar', 'موتوسيكل', '2020-04-17 00:02:43', '2020-05-01 06:07:14'),
(2396, 'categories', 'name', 1352, 'ar', 'امان طرق', '2020-04-17 00:03:21', '2020-05-01 06:09:41'),
(2397, 'categories', 'name', 1354, 'ar', 'Gas Station & Equipment', '2020-04-17 00:03:46', '2020-04-17 00:03:46'),
(2398, 'categories', 'name', 1356, 'ar', 'قفل للسيارة', '2020-04-17 00:04:15', '2020-05-01 06:10:12'),
(2399, 'categories', 'name', 1357, 'ar', 'موقف سيارات', '2020-04-17 00:04:24', '2020-05-01 06:10:59'),
(2400, 'categories', 'name', 1358, 'ar', 'Secondhand Vehicle & Stocks', '2020-04-17 00:08:17', '2020-04-17 00:08:17'),
(2401, 'categories', 'name', 1359, 'ar', 'اطارات سيارات', '2020-04-17 00:08:21', '2020-05-01 06:11:17'),
(2402, 'categories', 'name', 1360, 'ar', 'Other Transportation Equipment', '2020-04-17 00:09:37', '2020-04-17 00:09:37'),
(2418, 'products', 'name', 19, 'ar', 'asd', NULL, NULL),
(2419, 'products', 'description', 19, 'ar', 'as', NULL, NULL),
(2420, 'products', 'name', 23, 'ar', 'asd', NULL, NULL),
(2421, 'products', 'description', 23, 'ar', 'as', NULL, NULL),
(2422, 'products', 'name', 24, 'ar', 'asd', NULL, NULL),
(2423, 'products', 'description', 24, 'ar', 'as', NULL, NULL),
(2424, 'products', 'name', 25, 'ar', 'asd', NULL, NULL),
(2425, 'products', 'description', 25, 'ar', 'as', NULL, NULL),
(2426, 'products', 'name', 26, 'ar', 'asd', NULL, NULL),
(2427, 'products', 'description', 26, 'ar', 'as', NULL, NULL),
(2428, 'products', 'name', 31, 'ar', 'asd', NULL, NULL),
(2429, 'products', 'description', 31, 'ar', 'as', NULL, NULL),
(2430, 'products', 'name', 32, 'ar', 'asd', NULL, NULL),
(2431, 'products', 'description', 32, 'ar', 'as', NULL, NULL),
(2432, 'products', 'name', 33, 'ar', 'asd', NULL, NULL),
(2433, 'products', 'description', 33, 'ar', 'as', NULL, NULL),
(2434, 'products', 'name', 34, 'ar', 'asd', NULL, NULL),
(2435, 'products', 'description', 34, 'ar', 'as', NULL, NULL),
(2436, 'products', 'name', 35, 'ar', 'asd', NULL, NULL),
(2437, 'products', 'description', 35, 'ar', 'as', NULL, NULL),
(2438, 'products', 'name', 36, 'ar', 'asd', NULL, NULL),
(2439, 'products', 'description', 36, 'ar', 'as', NULL, NULL),
(2440, 'products', 'name', 75, 'ar', 'asd', NULL, NULL),
(2441, 'products', 'description', 75, 'ar', 'as', NULL, NULL),
(2442, 'products', 'name', 76, 'ar', 'asd', NULL, NULL),
(2443, 'products', 'description', 76, 'ar', 'as', NULL, NULL),
(2444, 'products', 'name', 131, 'ar', 'asd', NULL, NULL),
(2445, 'products', 'description', 131, 'ar', 'as', NULL, NULL),
(2446, 'products', 'name', 132, 'ar', 'asd', NULL, NULL),
(2447, 'products', 'description', 132, 'ar', 'as', NULL, NULL),
(2448, 'products', 'name', 133, 'ar', 'asd', NULL, NULL),
(2449, 'products', 'description', 133, 'ar', 'as', NULL, NULL),
(2450, 'products', 'name', 134, 'ar', 'asd', NULL, NULL),
(2451, 'products', 'description', 134, 'ar', 'as', NULL, NULL),
(2452, 'products', 'name', 135, 'ar', 'asd', NULL, NULL),
(2453, 'products', 'description', 135, 'ar', 'as', NULL, NULL),
(2454, 'products', 'name', 136, 'ar', 'asd', NULL, NULL),
(2455, 'products', 'description', 136, 'ar', 'as', NULL, NULL),
(2456, 'products', 'name', 137, 'ar', 'asd', NULL, NULL),
(2457, 'products', 'description', 137, 'ar', 'as', NULL, NULL),
(2458, 'products', 'name', 138, 'ar', 'asd', NULL, NULL),
(2459, 'products', 'description', 138, 'ar', 'as', NULL, NULL),
(2460, 'products', 'name', 139, 'ar', 'asd', NULL, NULL),
(2461, 'products', 'description', 139, 'ar', 'as', NULL, NULL),
(2462, 'products', 'name', 140, 'ar', 'asd', NULL, NULL),
(2463, 'products', 'description', 140, 'ar', 'as', NULL, NULL),
(2464, 'products', 'name', 141, 'ar', 'asd', NULL, NULL),
(2465, 'products', 'description', 141, 'ar', 'as', NULL, NULL),
(2466, 'products', 'name', 142, 'ar', 'asd', NULL, NULL),
(2467, 'products', 'description', 142, 'ar', 'as', NULL, NULL),
(2468, 'products', 'name', 143, 'ar', 'asd', NULL, NULL),
(2469, 'products', 'description', 143, 'ar', 'as', NULL, NULL),
(2470, 'products', 'name', 144, 'ar', 'asd', NULL, NULL),
(2471, 'products', 'description', 144, 'ar', 'as', NULL, NULL),
(2472, 'products', 'name', 145, 'ar', 'asd', NULL, NULL),
(2473, 'products', 'description', 145, 'ar', 'as', NULL, NULL),
(2474, 'products', 'name', 146, 'ar', 'asd', NULL, NULL),
(2475, 'products', 'description', 146, 'ar', 'as', NULL, NULL),
(2476, 'products', 'name', 147, 'ar', 'asd', NULL, NULL),
(2477, 'products', 'description', 147, 'ar', 'as', NULL, NULL),
(2478, 'products', 'name', 148, 'ar', 'asd', NULL, NULL),
(2479, 'products', 'description', 148, 'ar', 'as', NULL, NULL),
(2480, 'products', 'name', 149, 'ar', 'asd', NULL, NULL),
(2481, 'products', 'description', 149, 'ar', 'as', NULL, NULL),
(2482, 'products', 'name', 150, 'ar', 'asd', NULL, NULL),
(2483, 'products', 'description', 150, 'ar', 'as', NULL, NULL),
(2484, 'products', 'name', 151, 'ar', 'asd', NULL, NULL),
(2485, 'products', 'description', 151, 'ar', 'as', NULL, NULL),
(2486, 'products', 'name', 152, 'ar', 'asd', NULL, NULL),
(2487, 'products', 'description', 152, 'ar', 'as', NULL, NULL),
(2488, 'products', 'name', 153, 'ar', 'asd', NULL, NULL);
INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(2489, 'products', 'description', 153, 'ar', 'as', NULL, NULL),
(2490, 'products', 'name', 154, 'ar', 'asd', NULL, NULL),
(2491, 'products', 'description', 154, 'ar', 'as', NULL, NULL),
(2492, 'products', 'name', 155, 'ar', 'asd', NULL, NULL),
(2493, 'products', 'description', 155, 'ar', 'as', NULL, NULL),
(2494, 'products', 'name', 156, 'ar', 'asd', NULL, NULL),
(2495, 'products', 'description', 156, 'ar', 'as', NULL, NULL),
(2496, 'products', 'name', 157, 'ar', 'asd', NULL, NULL),
(2497, 'products', 'description', 157, 'ar', 'as', NULL, NULL),
(2498, 'products', 'name', 158, 'ar', 'asd', NULL, NULL),
(2499, 'products', 'description', 158, 'ar', 'as', NULL, NULL),
(2500, 'products', 'name', 159, 'ar', 'asd', NULL, NULL),
(2501, 'products', 'description', 159, 'ar', 'as', NULL, NULL),
(2502, 'products', 'name', 160, 'ar', 'asd', NULL, NULL),
(2503, 'products', 'description', 160, 'ar', 'as', NULL, NULL),
(2504, 'products', 'name', 161, 'ar', 'asd', NULL, NULL),
(2505, 'products', 'description', 161, 'ar', 'as', NULL, NULL),
(2506, 'products', 'name', 162, 'ar', 'asd', NULL, NULL),
(2507, 'products', 'description', 162, 'ar', 'as', NULL, NULL),
(2508, 'products', 'name', 163, 'ar', 'asd', NULL, NULL),
(2509, 'products', 'description', 163, 'ar', 'as', NULL, NULL),
(2510, 'products', 'name', 164, 'ar', 'asd', NULL, NULL),
(2511, 'products', 'description', 164, 'ar', 'as', NULL, NULL),
(2512, 'products', 'name', 165, 'ar', 'asd', NULL, NULL),
(2513, 'products', 'description', 165, 'ar', 'as', NULL, NULL),
(2514, 'products', 'name', 166, 'ar', 'asd', NULL, NULL),
(2515, 'products', 'description', 166, 'ar', 'as', NULL, NULL),
(2516, 'products', 'name', 167, 'ar', 'asd', NULL, NULL),
(2517, 'products', 'description', 167, 'ar', 'as', NULL, NULL),
(2518, 'products', 'name', 168, 'ar', 'asd', NULL, NULL),
(2519, 'products', 'description', 168, 'ar', 'as', NULL, NULL),
(2520, 'products', 'name', 169, 'ar', 'asd', NULL, NULL),
(2521, 'products', 'description', 169, 'ar', 'as', NULL, NULL),
(2522, 'products', 'name', 170, 'ar', 'asd', NULL, NULL),
(2523, 'products', 'description', 170, 'ar', 'as', NULL, NULL),
(2524, 'products', 'name', 171, 'ar', 'asd', NULL, NULL),
(2525, 'products', 'description', 171, 'ar', 'as', NULL, NULL),
(2526, 'products', 'name', 172, 'ar', 'asd', NULL, NULL),
(2527, 'products', 'description', 172, 'ar', 'as', NULL, NULL),
(2528, 'products', 'name', 173, 'ar', 'asd', NULL, NULL),
(2529, 'products', 'description', 173, 'ar', 'as', NULL, NULL),
(2530, 'categories', 'name', 157, 'ar', 'الصحة و الجمال', '2020-04-25 15:55:51', '2020-04-25 18:40:09'),
(2531, 'categories', 'name', 165, 'ar', 'أمان الطرق', '2020-04-25 15:55:59', '2020-04-25 18:48:56'),
(2532, 'categories', 'name', 167, 'ar', 'أجهزة حماية أخري', '2020-04-25 15:56:09', '2020-04-25 18:49:49'),
(2533, 'categories', 'name', 201, 'ar', 'مواد طلاء و صبغات', '2020-04-25 15:59:16', '2020-04-25 19:28:30'),
(2534, 'categories', 'name', 204, 'ar', 'مواد معالجة ', '2020-04-25 15:59:37', '2020-04-25 19:29:57'),
(2535, 'categories', 'name', 213, 'ar', 'حقائب كمبيوتر', '2020-04-25 16:01:14', '2020-04-25 19:43:01'),
(2536, 'categories', 'name', 216, 'ar', 'حقائب خاصة', '2020-04-25 16:01:25', '2020-04-25 19:44:28'),
(2537, 'categories', 'name', 243, 'ar', 'الرياضية ومعدات اللياقة البدنية', '2020-04-25 16:02:38', '2020-04-25 20:02:00'),
(2538, 'categories', 'name', 244, 'ar', 'معدات رياضية', '2020-04-25 16:02:52', '2020-04-25 20:10:39'),
(2540, 'categories', 'name', 248, 'ar', 'معدات تنظيف و حماية', '2020-04-25 16:06:33', '2020-04-25 20:12:27'),
(2541, 'categories', 'name', 252, 'ar', 'معدات حرارية', '2020-04-25 16:06:52', '2020-04-25 20:19:16'),
(2542, 'categories', 'name', 260, 'ar', 'أدوات مطبخ و طعام', '2020-04-25 16:08:35', '2020-04-25 20:28:59'),
(2543, 'categories', 'name', 254, 'ar', 'معدات صناعية اخري', '2020-04-25 16:08:43', '2020-04-25 20:23:39'),
(2544, 'categories', 'name', 300, 'ar', 'منسوجات ذات صلة', '2020-04-25 16:09:55', '2020-04-26 01:14:28'),
(2545, 'categories', 'name', 50, 'ar', 'اجهزة اليكترونية للمكاتب', '2020-04-25 16:49:43', '2020-04-25 18:29:54'),
(2546, 'categories', 'name', 162, 'ar', 'أنظمة تحكم و مراقبة', '2020-04-25 16:50:47', '2020-04-25 18:44:47'),
(2547, 'categories', 'name', 163, 'ar', 'أجهزة انذار و حريق', '2020-04-25 16:50:57', '2020-04-25 18:47:58'),
(2548, 'categories', 'name', 184, 'ar', 'معدات سلكية ولاسلكية', '2020-04-25 16:52:05', '2020-04-25 19:11:24'),
(2549, 'categories', 'name', 242, 'ar', 'منتجات اضاءة أخري', '2020-04-25 16:54:57', '2020-04-25 20:01:31'),
(2550, 'categories', 'name', 249, 'ar', 'آلات ميكانيكية', '2020-04-25 16:56:48', '2020-04-25 20:16:50'),
(2551, 'categories', 'name', 255, 'ar', 'أدوات تحليل و اختبار', '2020-04-25 16:57:54', '2020-04-25 20:20:53'),
(2552, 'categories', 'name', 292, 'ar', 'ماكينات تعدين', '2020-04-25 17:00:20', '2020-04-26 00:43:18'),
(2553, 'categories', 'name', 6, 'ar', 'اكسسوارات سيارات', '2020-04-25 17:59:07', '2020-04-25 17:59:07'),
(2554, 'categories', 'name', 7, 'ar', 'قطع غيار سيارات', '2020-04-25 17:59:28', '2020-04-25 18:13:34'),
(2555, 'categories', 'name', 8, 'ar', 'صيانة و ديكور سيارات', '2020-04-25 18:16:19', '2020-04-25 18:16:19'),
(2556, 'categories', 'name', 9, 'ar', 'معدات أمان', '2020-04-25 18:17:32', '2020-04-25 18:17:32'),
(2557, 'categories', 'name', 10, 'ar', 'كماليات موتوسيكلات', '2020-04-25 18:23:41', '2020-04-25 18:23:41'),
(2558, 'categories', 'name', 11, 'ar', 'قطع غيار أخري', '2020-04-25 18:24:21', '2020-04-25 18:24:21'),
(2559, 'categories', 'name', 47, 'ar', 'أجهزة فيديو و صوتيات', '2020-04-25 18:25:42', '2020-04-25 18:25:42'),
(2560, 'categories', 'name', 48, 'ar', 'أجهزة رقمية', '2020-04-25 18:26:00', '2020-04-25 18:28:02'),
(2561, 'categories', 'name', 49, 'ar', 'الأجهزة الكهربائية المنزلية', '2020-04-25 18:29:15', '2020-04-25 18:29:15'),
(2562, 'categories', 'name', 51, 'ar', 'اليكترونيات أخري', '2020-04-25 18:30:23', '2020-04-25 18:30:23'),
(2563, 'categories', 'name', 150, 'ar', 'منتجات زراعة', '2020-04-25 18:32:40', '2020-04-25 18:32:40'),
(2564, 'categories', 'name', 151, 'ar', 'تربية حيوانات', '2020-04-25 18:33:02', '2020-04-25 18:33:02'),
(2565, 'categories', 'name', 152, 'ar', 'مواد غذائية و مشروبات', '2020-04-25 18:33:35', '2020-04-25 18:33:35'),
(2566, 'categories', 'name', 153, 'ar', 'كيماويات زراعية', '2020-04-25 18:33:58', '2020-04-25 18:33:58'),
(2567, 'categories', 'name', 154, 'ar', 'آلات و معدات زراعية', '2020-04-25 18:37:53', '2020-04-25 18:37:53'),
(2568, 'categories', 'name', 155, 'ar', 'منتجات زراعة أخري', '2020-04-25 18:38:38', '2020-04-25 18:38:38'),
(2569, 'categories', 'name', 156, 'ar', 'أدوية', '2020-04-25 18:39:45', '2020-04-25 18:39:45'),
(2570, 'categories', 'name', 158, 'ar', 'أجهزة طبية', '2020-04-25 18:40:41', '2020-04-25 18:40:41'),
(2571, 'categories', 'name', 159, 'ar', 'أدوية بيطرية', '2020-04-25 18:41:03', '2020-04-25 18:41:03'),
(2572, 'categories', 'name', 160, 'ar', 'تعبئة و تغليف صيدلي', '2020-04-25 18:41:34', '2020-04-25 18:45:58'),
(2573, 'categories', 'name', 161, 'ar', 'صناعات دوائية', '2020-04-25 18:45:24', '2020-04-25 18:45:24'),
(2574, 'categories', 'name', 166, 'ar', 'أمن مواقع عمل', '2020-04-25 18:49:18', '2020-04-25 18:49:18'),
(2575, 'categories', 'name', 168, 'ar', 'ملابس', '2020-04-25 18:51:32', '2020-04-25 18:51:32'),
(2576, 'categories', 'name', 169, 'ar', 'ملابس خاصة', '2020-04-25 18:53:47', '2020-04-25 18:53:47'),
(2577, 'categories', 'name', 170, 'ar', 'أحذية وقباعات', '2020-04-25 18:56:14', '2020-04-25 18:56:14'),
(2578, 'categories', 'name', 171, 'ar', 'اكسسوارات', '2020-04-25 18:56:32', '2020-04-25 18:56:32'),
(2579, 'categories', 'name', 173, 'ar', 'أثاث منزلي', '2020-04-25 18:58:16', '2020-04-25 18:58:16'),
(2580, 'categories', 'name', 174, 'ar', 'أثاث حدائق', '2020-04-25 18:58:45', '2020-04-25 18:58:45'),
(2581, 'categories', 'name', 176, 'ar', 'تصاميم أثاث', '2020-04-25 18:59:59', '2020-04-25 18:59:59'),
(2582, 'categories', 'name', 177, 'ar', 'موديلات أثاث', '2020-04-25 19:00:16', '2020-04-25 19:00:16'),
(2583, 'categories', 'name', 178, 'ar', 'مقاعد و طاولات', '2020-04-25 19:00:49', '2020-04-25 19:00:49'),
(2584, 'categories', 'name', 175, 'ar', 'أثاث تجاري', '2020-04-25 19:05:48', '2020-04-25 19:05:48'),
(2585, 'categories', 'name', 179, 'ar', 'قطع أثاث و اكسسوار', '2020-04-25 19:06:10', '2020-04-25 19:06:10'),
(2586, 'categories', 'name', 180, 'ar', 'أثاث اضافي', '2020-04-25 19:07:14', '2020-04-25 19:07:33'),
(2587, 'categories', 'name', 181, 'ar', 'مكونات اليكترونية', '2020-04-25 19:09:27', '2020-04-25 19:09:27'),
(2588, 'categories', 'name', 182, 'ar', 'معدات كهربائية', '2020-04-25 19:09:48', '2020-04-25 19:09:48'),
(2589, 'categories', 'name', 183, 'ar', 'ادوات اليكتروميكانيكية', '2020-04-25 19:10:34', '2020-04-25 19:10:34'),
(2590, 'categories', 'name', 185, 'ar', 'ادوات كهربائية اخري', '2020-04-25 19:11:57', '2020-04-25 19:11:57'),
(2591, 'categories', 'name', 186, 'ar', 'لابتوب', '2020-04-25 19:13:01', '2020-04-25 19:13:01'),
(2592, 'categories', 'name', 188, 'ar', 'مكونات الكمبيوتر', '2020-04-25 19:16:36', '2020-04-25 19:16:36'),
(2593, 'categories', 'name', 189, 'ar', 'أجهزة التخزين', '2020-04-25 19:17:11', '2020-04-25 19:17:11'),
(2594, 'categories', 'name', 190, 'ar', 'ملحقات الكمبيوتر', '2020-04-25 19:17:43', '2020-04-25 19:17:43'),
(2595, 'categories', 'name', 191, 'ar', 'أجهزة الربط الشبكي', '2020-04-25 19:18:07', '2020-04-25 19:18:07'),
(2596, 'categories', 'name', 187, 'ar', 'أجهزة الكمبيوتر المكتبية', '2020-04-25 19:18:56', '2020-04-25 19:18:56'),
(2597, 'categories', 'name', 192, 'ar', 'منتجات ذات صلة', '2020-04-25 19:20:34', '2020-04-25 19:20:34'),
(2598, 'categories', 'name', 193, 'ar', 'اكسسوارات', '2020-04-25 19:21:49', '2020-04-25 19:21:49'),
(2599, 'categories', 'name', 194, 'ar', 'هدايا و زينة حفلات', '2020-04-25 19:22:19', '2020-04-25 19:22:19'),
(2600, 'categories', 'name', 195, 'ar', 'مشغولات و خامات', '2020-04-25 19:24:01', '2020-04-25 19:24:01'),
(2601, 'categories', 'name', 196, 'ar', 'مشغولات بالاستخدام', '2020-04-25 19:24:18', '2020-04-25 19:24:18'),
(2602, 'categories', 'name', 197, 'ar', 'موديلات اكسسوارات', '2020-04-25 19:24:46', '2020-04-25 19:24:46'),
(2603, 'categories', 'name', 198, 'ar', 'تحف منزلية', '2020-04-25 19:25:07', '2020-04-25 19:25:07'),
(2604, 'categories', 'name', 199, 'ar', 'هدايا و خامات أخري', '2020-04-25 19:25:29', '2020-04-25 19:25:29'),
(2605, 'categories', 'name', 200, 'ar', 'بلاستيك و مطاط', '2020-04-25 19:26:00', '2020-04-25 19:26:00'),
(2606, 'categories', 'name', 202, 'ar', 'المواد الكيميائية العضوية الأساسية', '2020-04-25 19:29:03', '2020-04-25 19:29:03'),
(2607, 'categories', 'name', 203, 'ar', 'المواد الكيميائية غير العضوية', '2020-04-25 19:29:22', '2020-04-25 19:29:22'),
(2608, 'categories', 'name', 205, 'ar', 'البتروكيماويات', '2020-04-25 19:30:14', '2020-04-25 19:30:14'),
(2609, 'categories', 'name', 206, 'ar', 'النكهات وعطور', '2020-04-25 19:30:34', '2020-04-25 19:30:34'),
(2610, 'categories', 'name', 207, 'ar', 'الكيماويات الزراعية', '2020-04-25 19:30:52', '2020-04-25 19:30:52'),
(2611, 'categories', 'name', 208, 'ar', 'كيماويات دوائية', '2020-04-25 19:31:22', '2020-04-25 19:31:22'),
(2612, 'categories', 'name', 209, 'ar', 'مواد الطباعة و التعبئة والتغليف', '2020-04-25 19:32:00', '2020-04-25 19:32:00'),
(2613, 'categories', 'name', 210, 'ar', 'كيماويات صناعية', '2020-04-25 19:41:20', '2020-04-25 19:41:20'),
(2614, 'categories', 'name', 211, 'ar', 'كيماويات أخري', '2020-04-25 19:41:33', '2020-04-25 19:41:33'),
(2615, 'categories', 'name', 212, 'ar', 'موديلات شنط', '2020-04-25 19:41:49', '2020-04-25 19:41:49'),
(2616, 'categories', 'name', 214, 'ar', 'حقائب سفر و رحلات', '2020-04-25 19:43:24', '2020-04-25 19:43:24'),
(2617, 'categories', 'name', 215, 'ar', 'حقائب رياضية', '2020-04-25 19:43:38', '2020-04-25 19:43:38'),
(2618, 'categories', 'name', 217, 'ar', 'حقائب أخري و اكسسوار', '2020-04-25 19:44:45', '2020-04-25 19:44:45'),
(2619, 'categories', 'name', 218, 'ar', 'مطابخ و حمامات', '2020-04-25 19:45:24', '2020-04-25 19:45:24'),
(2620, 'categories', 'name', 219, 'ar', 'رمل و حجر', '2020-04-25 19:46:15', '2020-04-25 19:46:15'),
(2621, 'categories', 'name', 220, 'ar', 'بلاط و ارضيات', '2020-04-25 19:46:36', '2020-04-25 19:46:36'),
(2622, 'categories', 'name', 221, 'ar', 'باب و شباك', '2020-04-25 19:46:48', '2020-04-25 19:46:48'),
(2623, 'categories', 'name', 222, 'ar', 'مواد تشطيب', '2020-04-25 19:47:10', '2020-04-25 19:47:10'),
(2624, 'categories', 'name', 223, 'ar', 'مواد بناء', '2020-04-25 19:47:20', '2020-04-25 19:47:20'),
(2625, 'categories', 'name', 224, 'ar', 'ديكور كهربي', '2020-04-25 19:47:52', '2020-04-25 19:48:47'),
(2626, 'categories', 'name', 225, 'ar', 'منتجات ذات صلة', '2020-04-25 19:49:09', '2020-04-25 19:49:09'),
(2627, 'categories', 'name', 226, 'ar', 'ألعاب كارتون', '2020-04-25 19:52:25', '2020-04-25 19:52:25'),
(2628, 'categories', 'name', 227, 'ar', 'ألعاب حيوانات محشوة', '2020-04-25 19:52:55', '2020-04-25 19:52:55'),
(2629, 'categories', 'name', 228, 'ar', 'ألعاب تعليمية', '2020-04-25 19:53:12', '2020-04-25 19:53:12'),
(2630, 'categories', 'name', 229, 'ar', 'ألعاب متنزهات', '2020-04-25 19:53:24', '2020-04-25 19:53:24'),
(2631, 'categories', 'name', 230, 'ar', 'عربات لعبة', '2020-04-25 19:53:46', '2020-04-25 19:53:46'),
(2632, 'categories', 'name', 231, 'ar', 'ألعاب خامات', '2020-04-25 19:54:34', '2020-04-25 19:54:34'),
(2633, 'categories', 'name', 233, 'ar', 'موديلات ألعاب ', '2020-04-25 19:55:01', '2020-04-25 19:55:01'),
(2634, 'categories', 'name', 234, 'ar', 'ألعاب أخري', '2020-04-25 19:55:14', '2020-04-25 19:55:14'),
(2635, 'categories', 'name', 235, 'ar', 'لمبات الليد و شاشات عرض', '2020-04-25 19:56:14', '2020-04-25 19:56:14'),
(2636, 'categories', 'name', 236, 'ar', 'أضاءة داخلية و خارجية', '2020-04-25 19:56:32', '2020-04-25 19:56:32'),
(2637, 'categories', 'name', 237, 'ar', 'اضاءة مسرح', '2020-04-25 19:57:14', '2020-04-25 19:57:14'),
(2638, 'categories', 'name', 238, 'ar', 'أضواء زينة', '2020-04-25 19:57:35', '2020-04-25 19:57:35'),
(2639, 'categories', 'name', 239, 'ar', 'مستلزمات إضاءة', '2020-04-25 19:59:00', '2020-04-25 19:59:00'),
(2640, 'categories', 'name', 240, 'ar', 'لمبات وأسطوانات أضاءة', '2020-04-25 19:59:47', '2020-04-25 19:59:47'),
(2641, 'categories', 'name', 241, 'ar', 'معدات اضاءة', '2020-04-25 20:01:02', '2020-04-25 20:01:02'),
(2642, 'categories', 'name', 246, 'ar', 'أدوات ترفيهية', '2020-04-25 20:08:17', '2020-04-25 20:08:17'),
(2643, 'categories', 'name', 250, 'ar', 'معدات هيدروليكية', '2020-04-25 20:17:36', '2020-04-25 20:17:36'),
(2644, 'categories', 'name', 251, 'ar', 'معدات نقل', '2020-04-25 20:18:46', '2020-04-25 20:18:46'),
(2645, 'categories', 'name', 253, 'ar', 'معدات لحام', '2020-04-25 20:19:52', '2020-04-25 20:19:52'),
(2646, 'categories', 'name', 256, 'ar', 'معدات قياس', '2020-04-25 20:21:26', '2020-04-25 20:21:26'),
(2647, 'categories', 'name', 257, 'ar', 'أدوات بصرية', '2020-04-25 20:24:01', '2020-04-25 20:24:01'),
(2648, 'categories', 'name', 258, 'ar', 'أدوات معامل', '2020-04-25 20:24:23', '2020-04-25 20:24:23'),
(2649, 'categories', 'name', 259, 'ar', 'أدوات أخري', '2020-04-25 20:25:41', '2020-04-25 20:25:41'),
(2650, 'categories', 'name', 262, 'ar', 'منسوجات منزلية', '2020-04-25 20:27:14', '2020-04-25 20:27:14'),
(2651, 'categories', 'name', 263, 'ar', 'تنظيف و تخزين منزلي', '2020-04-25 20:27:54', '2020-04-25 20:27:54'),
(2652, 'categories', 'name', 261, 'ar', 'منتجات عناية شخصية', '2020-04-25 20:29:21', '2020-04-25 20:29:21'),
(2653, 'categories', 'name', 264, 'ar', 'ساعات و نظارات', '2020-04-25 20:31:37', '2020-04-25 20:31:37'),
(2654, 'categories', 'name', 265, 'ar', 'معدات حدائق', '2020-04-25 20:32:09', '2020-04-25 20:32:09'),
(2655, 'categories', 'name', 266, 'ar', 'منتجات أطفال', '2020-04-25 20:32:27', '2020-04-25 20:32:27'),
(2656, 'categories', 'name', 267, 'ar', 'أغراض منزلية', '2020-04-25 20:32:57', '2020-04-25 20:32:57'),
(2657, 'categories', 'name', 268, 'ar', 'اعلان و طباعة و تغليف', '2020-04-25 20:33:31', '2020-04-25 20:33:31'),
(2658, 'categories', 'name', 270, 'ar', 'أدوات ومعدات', '2020-04-26 00:18:14', '2020-04-26 00:18:14'),
(2659, 'categories', 'name', 271, 'ar', 'الأجهزة و ملحقاتها', '2020-04-26 00:19:03', '2020-04-26 00:19:03'),
(2660, 'categories', 'name', 272, 'ar', 'أدوات و معدات أخري', '2020-04-26 00:20:35', '2020-04-26 00:20:35'),
(2661, 'categories', 'name', 273, 'ar', 'أجهزة مكتب', '2020-04-26 00:21:16', '2020-04-26 00:21:16'),
(2662, 'categories', 'name', 274, 'ar', 'أدوات مكتبية', '2020-04-26 00:22:01', '2020-04-26 00:22:01'),
(2663, 'categories', 'name', 275, 'ar', 'أدوات تدريس', '2020-04-26 00:22:29', '2020-04-26 00:22:29'),
(2664, 'categories', 'name', 276, 'ar', 'أدوات مكتبية اخري', '2020-04-26 00:22:51', '2020-04-26 00:22:51'),
(2665, 'categories', 'name', 277, 'ar', 'صناعات غذائية', '2020-04-26 00:30:02', '2020-04-26 00:30:02'),
(2666, 'categories', 'name', 278, 'ar', 'صناعة منسوجات', '2020-04-26 00:30:27', '2020-04-26 00:30:27'),
(2667, 'categories', 'name', 279, 'ar', 'صناعات كيماوية', '2020-04-26 00:30:58', '2020-04-26 00:30:58'),
(2668, 'categories', 'name', 280, 'ar', 'صناعات هندسية', '2020-04-26 00:33:08', '2020-04-26 00:33:08'),
(2669, 'categories', 'name', 281, 'ar', 'صناعات معدنية', '2020-04-26 00:34:02', '2020-04-26 00:34:02'),
(2670, 'categories', 'name', 282, 'ar', 'صناعات تعدينية', '2020-04-26 00:34:58', '2020-04-26 00:34:58'),
(2671, 'categories', 'name', 283, 'ar', 'صناعات بلاستيكية', '2020-04-26 00:35:24', '2020-04-26 00:35:24'),
(2672, 'categories', 'name', 284, 'ar', 'صناعات زجاجية', '2020-04-26 00:35:52', '2020-04-26 00:35:52'),
(2673, 'categories', 'name', 285, 'ar', 'آلات طباعة', '2020-04-26 00:36:51', '2020-04-26 00:36:51'),
(2674, 'categories', 'name', 287, 'ar', 'عدد و آلات', '2020-04-26 00:37:49', '2020-04-26 00:37:49'),
(2675, 'categories', 'name', 288, 'ar', 'آلات أخري', '2020-04-26 00:38:14', '2020-04-26 00:38:14'),
(2676, 'categories', 'name', 289, 'ar', 'منتجات معدنية', '2020-04-26 00:38:42', '2020-04-26 00:38:42'),
(2677, 'categories', 'name', 290, 'ar', 'مواد غير معدنية', '2020-04-26 00:39:14', '2020-04-26 00:39:14'),
(2678, 'categories', 'name', 293, 'ar', 'معادن أخري', '2020-04-26 00:43:43', '2020-04-26 00:43:43'),
(2679, 'categories', 'name', 297, 'ar', 'أقمشة و ألياف', '2020-04-26 00:55:12', '2020-04-26 00:55:12'),
(2680, 'categories', 'name', 298, 'ar', 'الجلود و الريش', '2020-04-26 01:10:47', '2020-04-26 01:10:47'),
(2681, 'categories', 'name', 299, 'ar', 'ديكور منزلي', '2020-04-26 01:11:21', '2020-04-26 01:11:21'),
(2682, 'categories', 'name', 302, 'ar', 'آلات نسيج', '2020-04-26 01:15:04', '2020-04-26 01:15:04'),
(2683, 'categories', 'name', 303, 'ar', 'سكوتر', '2020-04-26 01:17:02', '2020-04-26 01:17:02'),
(2684, 'categories', 'name', 304, 'ar', 'دراجات و تريسكلات', '2020-04-26 01:17:31', '2020-04-26 01:17:31'),
(2685, 'categories', 'name', 305, 'ar', 'سيارات و أوتوبيسات', '2020-04-26 01:18:00', '2020-04-26 01:18:00'),
(2686, 'categories', 'name', 306, 'ar', 'شاحنات و عربات', '2020-04-26 01:18:40', '2020-04-26 01:18:40'),
(2687, 'categories', 'name', 307, 'ar', 'مراكب', '2020-04-26 01:19:29', '2020-04-26 01:19:29'),
(2688, 'categories', 'name', 308, 'ar', 'دراجات نارية', '2020-04-26 01:20:06', '2020-04-26 01:20:06'),
(2689, 'categories', 'name', 309, 'ar', 'أمان الطرق', '2020-04-26 01:20:33', '2020-04-26 01:20:33'),
(2690, 'categories', 'name', 310, 'ar', 'وسائل نقل خاصة', '2020-04-26 01:22:06', '2020-04-26 01:22:06'),
(2691, 'categories', 'name', 452, 'ar', 'جوارب و شورابات', '2020-04-26 22:15:01', '2020-04-29 06:51:46'),
(2692, 'categories', 'name', 880, 'ar', 'اضاءة LED احترافية', '2020-04-26 23:06:02', '2020-04-30 21:10:22'),
(2693, 'requests', 'name', 71, 'ar', 'as', NULL, NULL),
(2694, 'requests', 'description', 71, 'ar', 'as', NULL, NULL),
(2695, 'requests', 'name', 72, 'ar', 'as', NULL, NULL),
(2696, 'requests', 'description', 72, 'ar', 'as', NULL, NULL),
(2697, 'categories', 'name', 1362, 'ar', 'ascacas', '2020-05-02 15:39:12', '2020-05-02 15:43:15'),
(2698, 'data_rows', 'display_name', 253, 'ar', 'Id', '2020-05-31 00:16:51', '2020-05-31 00:16:51'),
(2699, 'data_rows', 'display_name', 254, 'ar', 'Title', '2020-05-31 00:16:51', '2020-05-31 00:16:51'),
(2700, 'data_rows', 'display_name', 255, 'ar', 'Description', '2020-05-31 00:16:51', '2020-05-31 00:16:51'),
(2701, 'data_rows', 'display_name', 256, 'ar', 'User Id', '2020-05-31 00:16:51', '2020-05-31 00:16:51'),
(2702, 'data_rows', 'display_name', 257, 'ar', 'Supplier Id', '2020-05-31 00:16:51', '2020-05-31 00:16:51'),
(2703, 'data_rows', 'display_name', 258, 'ar', 'Notify Type', '2020-05-31 00:16:51', '2020-05-31 00:16:51'),
(2704, 'data_rows', 'display_name', 259, 'ar', 'Notify Id', '2020-05-31 00:16:51', '2020-05-31 00:16:51'),
(2705, 'data_rows', 'display_name', 260, 'ar', 'Notify Url', '2020-05-31 00:16:51', '2020-05-31 00:16:51'),
(2706, 'data_rows', 'display_name', 261, 'ar', 'Created At', '2020-05-31 00:16:51', '2020-05-31 00:16:51'),
(2707, 'data_rows', 'display_name', 262, 'ar', 'Updated At', '2020-05-31 00:16:51', '2020-05-31 00:16:51'),
(2708, 'data_types', 'display_name_singular', 36, 'ar', 'Notification', '2020-05-31 00:16:51', '2020-05-31 00:16:51'),
(2709, 'data_types', 'display_name_plural', 36, 'ar', 'Notifications', '2020-05-31 00:16:51', '2020-05-31 00:16:51'),
(2710, 'data_rows', 'display_name', 263, 'ar', 'Sent To', '2020-05-31 00:28:06', '2020-05-31 00:28:06'),
(2711, 'data_rows', 'display_name', 264, 'ar', 'categories', '2020-05-31 00:28:06', '2020-05-31 00:28:06'),
(2712, 'data_rows', 'display_name', 265, 'ar', 'users', '2020-05-31 02:14:49', '2020-05-31 02:14:49'),
(2713, 'data_rows', 'display_name', 266, 'ar', 'users', '2020-05-31 02:16:32', '2020-05-31 02:16:32'),
(2714, 'products', 'name', 1003, 'ar', 'asd', NULL, NULL),
(2715, 'products', 'description', 1003, 'ar', 'as', NULL, NULL),
(2716, 'products', 'name', 1004, 'ar', 'asd', NULL, NULL),
(2717, 'products', 'description', 1004, 'ar', 'as', NULL, NULL),
(2718, 'products', 'name', 1005, 'ar', 'asd', NULL, NULL),
(2719, 'products', 'description', 1005, 'ar', 'as', NULL, NULL),
(2720, 'products', 'name', 1006, 'ar', 'asd', NULL, NULL),
(2721, 'products', 'description', 1006, 'ar', 'as', NULL, NULL),
(2722, 'products', 'name', 1007, 'ar', 'asd', NULL, NULL),
(2723, 'products', 'description', 1007, 'ar', 'as', NULL, NULL),
(2724, 'products', 'name', 1008, 'ar', 'asd', NULL, NULL),
(2725, 'products', 'description', 1008, 'ar', 'as', NULL, NULL),
(2726, 'products', 'name', 1009, 'ar', 'asd', NULL, NULL),
(2727, 'products', 'description', 1009, 'ar', 'as', NULL, NULL),
(2728, 'products', 'name', 1010, 'ar', 'asd', NULL, NULL),
(2729, 'products', 'description', 1010, 'ar', 'as', NULL, NULL),
(2730, 'products', 'name', 1011, 'ar', 'asd', NULL, NULL),
(2731, 'products', 'description', 1011, 'ar', 'as', NULL, NULL),
(2732, 'products', 'name', 1012, 'ar', 'asd', NULL, NULL),
(2733, 'products', 'description', 1012, 'ar', 'as', NULL, NULL),
(2734, 'products', 'name', 1013, 'ar', 'asd', NULL, NULL),
(2735, 'products', 'description', 1013, 'ar', 'as', NULL, NULL),
(2736, 'products', 'name', 1014, 'ar', 'asd', NULL, NULL),
(2737, 'products', 'description', 1014, 'ar', 'as', NULL, NULL),
(2738, 'products', 'name', 1015, 'ar', 'asd', NULL, NULL),
(2739, 'products', 'description', 1015, 'ar', 'as', NULL, NULL),
(2740, 'products', 'name', 1016, 'ar', 'asd', NULL, NULL),
(2741, 'products', 'description', 1016, 'ar', 'as', NULL, NULL),
(2742, 'products', 'name', 1017, 'ar', 'asd', NULL, NULL),
(2743, 'products', 'description', 1017, 'ar', 'as', NULL, NULL),
(2744, 'products', 'name', 1018, 'ar', 'asd', NULL, NULL),
(2745, 'products', 'description', 1018, 'ar', 'as', NULL, NULL),
(2746, 'products', 'name', 1019, 'ar', 'asd', NULL, NULL),
(2747, 'products', 'description', 1019, 'ar', 'as', NULL, NULL),
(2748, 'products', 'name', 1020, 'ar', 'asd', NULL, NULL),
(2749, 'products', 'description', 1020, 'ar', 'as', NULL, NULL),
(2750, 'products', 'name', 1021, 'ar', 'asd', NULL, NULL),
(2751, 'products', 'description', 1021, 'ar', 'as', NULL, NULL),
(2752, 'products', 'name', 1022, 'ar', 'asd', NULL, NULL),
(2753, 'products', 'description', 1022, 'ar', 'as', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verify_code` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `hot_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_mobile` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_nom` text COLLATE utf8mb4_unicode_ci,
  `lat` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_from` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_to` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_time` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_fee` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_founded` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `postal_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `forget_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` text COLLATE utf8mb4_unicode_ci,
  `facebook_url` text COLLATE utf8mb4_unicode_ci,
  `linkedin_url` text COLLATE utf8mb4_unicode_ci,
  `youtube_url` text COLLATE utf8mb4_unicode_ci,
  `images` text COLLATE utf8mb4_unicode_ci,
  `social_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_auth_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `mobile`, `status`, `email_verified_at`, `verify_code`, `country_id`, `state_id`, `city_id`, `hot_number`, `whatsapp_mobile`, `street_nom`, `lat`, `lang`, `zip_code`, `store_image`, `store_background`, `working_from`, `working_to`, `delivery_time`, `delivery_fee`, `year_founded`, `description`, `address`, `postal_code`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `forget_code`, `type`, `instagram_url`, `facebook_url`, `linkedin_url`, `youtube_url`, `images`, `social_id`, `social_auth_type`, `zone_id`) VALUES
(1, 2, 'elsapt', 'hima@gmail.com', 'users/default.png', '1324536547', 0, NULL, 0, 64, 1, 1, '3110123456711', '01000709271', 'asxd', '3241324', '1234143', '13455', NULL, 'users/image618126.png', '2 am', '3 pm', '3 dayes', '22', '1990', NULL, 'address', '32432', '$2y$10$siwIZE/oyz375oa/eR/ufeffW7C8MaBJxiXY/SM11YUWd3wTU1nKu', NULL, NULL, '2020-05-20 18:13:26', '2020-06-19 02:15:34', NULL, NULL, NULL, NULL, NULL, NULL, '[\"services\\/product_image417625.png\"]', NULL, NULL, 1),
(150, 2, 'Kareem Elsharkawy', 'kareemX122@gmail.com', 'users/default.png', '0109760768611211', 0, NULL, 990706, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$/AH/29rXLO40Lhmg84p1veqBYSVHaweX8C3rhsEY5xvtUnRvRi41q', NULL, NULL, '2020-06-11 19:03:02', '2020-06-11 19:03:02', NULL, 'supplier', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 2, 'Kareem Elsharkawy', 'testauth@gmail.com', 'users/default.png', '0199999999999', 0, NULL, 772648, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Yym/8WWrx9/pNbbmSJyeMO72OKUxmtcHI4t.fJG62tgnB/ImltL1W', NULL, NULL, '2020-06-11 21:21:29', '2020-06-11 21:21:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 2, 'elsapt', 'e991@gmail.com', 'users/default.png', '1324536947', 0, NULL, 832387, 64, 18, 1, '3110129456711', NULL, 'asxd', '3241324', '1234143', '13455', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'address', NULL, '$2y$10$eKpweY4txZx9/dKSZTkyouMITF899cWQP2sYAB/9iW5OvvhFol8Zy', NULL, NULL, '2020-06-11 22:47:18', '2020-06-11 22:47:18', NULL, 'service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 2, 'Kareem Elsharkawy', 'testauth1@gmail.com', 'users/default.png', '01999999999991', 0, NULL, 769357, 64, NULL, NULL, '99999999', '999999999999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Nl7gcH0cWmI1DLOZe1e5SeqEUzxj1BQmXbj27jqb0ynv5hNI.hBUe', NULL, NULL, '2020-06-11 22:49:11', '2020-06-11 22:49:11', NULL, NULL, NULL, 'fb.com', NULL, NULL, NULL, NULL, NULL, NULL),
(154, 2, 'hhhhhhhhh', 'hhhhh@gggg.com', 'users/default.png', '66699963369', 0, NULL, 541466, 64, 18, 1, '888996332', NULL, '9999', '1.3', '1.6', '9999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ghbbbbjj', NULL, '$2y$10$TQpg8gBAcMgnUvHV9mLJqOqCCrDhe3hO6cjCxH2i6V8GDjVwt82Uq', NULL, NULL, '2020-06-11 22:57:39', '2020-06-11 22:57:39', NULL, 'Supplier', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 2, 'hdhhdbdbd', 'kareimovich@gmail.com', 'users/default.png', '996866322589', 0, NULL, 162687, 64, 18, 1, '998663225', NULL, '96', '1.3', '1.6', '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hdhhhbb', NULL, '$2y$10$PWx7VFMIq8jnMPbv2WXn1.Zf9rlDTuI6PNwyc/8jCQH54uDc9bHHG', NULL, NULL, '2020-06-11 23:03:51', '2020-06-11 23:03:51', NULL, 'Supplier', 'instagram.com', 'fb.com', 'linked.com', 'youtube.com', NULL, NULL, NULL, NULL),
(156, 2, 'vichpp', 'vich@Gmail.com', 'users/default.png', '010000000980', 0, NULL, 477338, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$al0WVNs1gP5YGIbCrA9J2efybdy5ptAXqQBMA2kncgC7vQbD0m4.6', NULL, NULL, '2020-06-12 07:09:31', '2020-06-12 07:09:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 2, 'donnn', 'don@don.com', 'users/default.png', '01026635899', 0, NULL, 336639, 64, 18, 1, '9663322266', NULL, '057', '1.3', '1.6', '057', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'damitta', NULL, '$2y$10$jtlxcfansK9yqSZPe0al5.uGAxtLMpVCVNkgQpxOVLbQjRuiNUnri', NULL, NULL, '2020-06-13 18:05:29', '2020-06-19 01:26:27', NULL, 'Supplier', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 2, 'Mohamed ashraf', 'mmm@gmail.com', 'users/default.png', '12345678901', 0, NULL, 214448, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$YW433Hg1sFtD873yAmiz1OR9aYHhimX6ovoNgOVLZ/llvyZrbt0xu', NULL, NULL, '2020-06-18 15:41:51', '2020-06-18 15:41:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 2, 'kareem test', 'don9999@don.com', 'users/default.png', '010266358993', 0, NULL, 520568, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$q5mLv3RMUmSyRi/rqFMIPeh9kRiRaWXCRL1XNXJxFsSxHMCgcTIWy', NULL, NULL, '2020-06-18 15:44:57', '2020-06-18 15:44:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 2, 'kareem.g.9987@gmail.com', 'Kareem Elsharkawy', 'users/default.png', NULL, 0, NULL, 467528, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-18 20:24:48', '2020-06-18 20:24:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2322447181390902', 'facebook', NULL),
(162, 2, 'elsapt', 'e99a1@gmail.com', 'users/default.png', '1324536947', 0, NULL, 552497, 64, 1, 1, '3110129456711', NULL, 'asxd', '3241324', '1234143', '13455', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'address', NULL, '$2y$10$BF829qAdMGirpsbxaLZ4weTNwEJGrW6sQ9z1bzidZLuBVnrOL3jP.', NULL, NULL, '2020-06-18 20:53:31', '2020-06-18 20:53:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 2, 'Kareem Elsharkawy', 'testaut3h1@gmail.com', 'users/default.png', '019959999112', 0, NULL, 624336, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$AkcdyvfS.ErJ3s5FQJ5i3.U/KCcDR3D6V17tNgpDIAepqvnTw06MW', NULL, NULL, '2020-06-19 01:18:44', '2020-06-19 01:18:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 2, 'Kareem Elsharkawy', 'testaut4567@gmail.com', 'users/default.png', '012345678910', 0, NULL, 618576, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$MUXFQDc6NDUGQUfTV7W6T.ruYzTZYze3xgLZ80ZXFIUszHCuCQ76S', NULL, NULL, '2020-06-19 01:20:58', '2020-06-19 01:20:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 2, 'Kareem Elsharkawy', 'xxxx@gmail.com', 'users/default.png', '012345678911', 0, NULL, 255418, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$63AYPIkHt9mFuEJbF.qtdeAmUIs4HLEI8YITe4drxIYFC6imkrWmO', NULL, NULL, '2020-06-19 01:24:09', '2020-06-19 01:24:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 2, 'elsapt', 'xxxxx@gmail.com', 'users/default.png', '012345678900', 0, NULL, 724618, 64, 1, 1, '09865421', NULL, 'asxd', '3241324', '1234143', '13455', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'address', NULL, '$2y$10$DTbCbD5WMzwfFDtzB8f4Re0ePDuOBMaTuHmG7Hapb1kqjxGRiV7/y', NULL, NULL, '2020-06-19 01:25:03', '2020-06-19 01:25:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 2, 'Mahmmed Ahmed', 'xxxxxx@gmail.com', 'users/default.png', NULL, 0, NULL, 846399, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-19 01:53:31', '2020-06-19 01:53:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2345678921', 'facebook', NULL),
(168, 2, 'hemaa', 'z@gmail.com', 'users/default.png', '08875576732422', 0, NULL, 230347, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$PvcQbnWpt5x6SswSTUxw/O2aExhxkmBeXslLeg.OgDhUQII0KayMG', NULL, NULL, '2020-06-19 05:52:51', '2020-06-19 05:52:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 2, 'essam', 'essam.store@gmail.com', 'users/default.png', '01000709271', 0, NULL, 751416, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$7oesRN8WzZXCOdnsUpa9kO/ZVZf1vRGO4gt.7/n3gRMNhSAuRl2qy', NULL, NULL, '2020-06-20 16:21:34', '2020-06-20 16:21:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 2, 'eprog18@gmail.com', 'eprog18@gmail.com', 'users/default.png', '01090709271', 0, NULL, 479499, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$cYEsrcnx5WXg5PZqv3Jnyu6jcRDvNa1nzAj6rATZ.BK0b4.wIQaIu', NULL, NULL, '2020-06-20 17:10:18', '2020-06-20 17:10:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 2, 'hdhdh', 'dhhdhdh@hhh.ushd', 'users/default.png', '+201000709271', 0, NULL, 541479, 64, 1, 3, '865656', NULL, '656', '1.3', '1.6', '665', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bbdbdbb.', NULL, '$2y$10$PYccupEFwa1sZw4XgoTTueKVT0ulSSt1OC4hUAXcUzyV.S7Q5AAge', NULL, NULL, '2020-06-20 18:04:04', '2020-06-20 18:04:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 2, 'متجر جديد', 'eprog18@gbbmail.com', 'users/default.png', '01000709273', 0, NULL, 149527, 64, 1, 3, 'eprog18@gmail.com', NULL, '966', '1.3', '1.6', '88393', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'my my my mybkbkbkbkbk', NULL, '$2y$10$A4Zz5.g0QIdz.n60vF4Kv.adKhgzCq5qVCzrOtVwarM9OCcQFNTka', NULL, NULL, '2020-06-20 19:16:41', '2020-06-20 19:16:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_categories`
--
ALTER TABLE `attribute_categories`
  ADD PRIMARY KEY (`attribute_id`,`category_id`),
  ADD UNIQUE KEY `attribute_id` (`attribute_id`,`category_id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `category_user`
--
ALTER TABLE `category_user`
  ADD PRIMARY KEY (`user_id`,`category_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_services`
--
ALTER TABLE `customer_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`follower_id`);

--
-- Indexes for table `industrial_zones`
--
ALTER TABLE `industrial_zones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_categories`
--
ALTER TABLE `notification_categories`
  ADD PRIMARY KEY (`category_id`,`notification_id`),
  ADD UNIQUE KEY `category_id` (`category_id`,`notification_id`);

--
-- Indexes for table `notification_users`
--
ALTER TABLE `notification_users`
  ADD PRIMARY KEY (`notification_id`,`user_id`),
  ADD UNIQUE KEY `notification_id` (`notification_id`,`user_id`),
  ADD UNIQUE KEY `notification_id_2` (`notification_id`,`user_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_index` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD PRIMARY KEY (`product_attribute_id`,`attribute_value_id`),
  ADD UNIQUE KEY `product_attribute_id` (`product_attribute_id`,`attribute_value_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD UNIQUE KEY `product_id` (`product_id`,`category_id`);

--
-- Indexes for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_ibfk_1` (`country_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_tags`
--
ALTER TABLE `store_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1363;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `customer_services`
--
ALTER TABLE `customer_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `industrial_zones`
--
ALTER TABLE `industrial_zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store_tags`
--
ALTER TABLE `store_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2754;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
