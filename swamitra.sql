-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 01:26 PM
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
-- Database: `swamitra`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `Is_Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_name`, `Is_Active`) VALUES
(1, '4314b868f4659e797dbede8ccadd650c.png', 0),
(2, 'aa789e5c3aaa8ed8c3d67833569cf404.png', 0),
(3, 'Screenshot (6).png', 0),
(4, 'aa789e5c3aaa8ed8c3d67833569cf404.png', 0),
(5, 'Screenshot (3).png', 0),
(12, 'logo-one.png', 1),
(14, 'shipmanagment.jpg', 1),
(16, 'img1.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `policy_id` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `payment_status` varchar(20) DEFAULT 'PENDING',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `policy_id`, `price`, `transaction_id`, `order_id`, `payment_status`, `created_at`, `user_id`, `user_name`) VALUES
(1, '19', 230.00, 'TXN_67825d77b2e88', 'ORDER_67825d77b2e86', 'PENDING', '2025-01-11 12:00:55', 5, 'testing1'),
(2, '19', 230.00, 'TXN_67825dc1ef90d', 'ORDER_67825dc1ef90a', 'PENDING', '2025-01-11 12:02:09', 5, 'testing1'),
(3, '19', 230.00, 'TXN_67825dcbe1fce', 'ORDER_67825dcbe1fcb', 'PENDING', '2025-01-11 12:02:19', 5, 'testing1'),
(4, '19', 230.00, 'TXN_67825de33edd3', 'ORDER_67825de33edcf', 'PENDING', '2025-01-11 12:02:43', 5, 'testing1'),
(5, '19', 230.00, 'TXN_67825df06b51d', 'ORDER_67825df06b51b', 'PENDING', '2025-01-11 12:02:56', 5, 'testing1'),
(6, '19', 230.00, 'TXN_67825f80125b8', 'ORDER_67825f80125b4', 'PENDING', '2025-01-11 12:09:36', 5, 'testing1'),
(7, '19', 230.00, 'TXN_67825fd9bb555', 'ORDER_67825fd9bb552', 'PENDING', '2025-01-11 12:11:05', 5, 'testing1'),
(8, '19', 230.00, 'TXN_67826023a22e0', 'ORDER_67826023a22dd', 'PENDING', '2025-01-11 12:12:19', 5, 'testing1'),
(9, '19', 230.00, 'TXN_67826030833c6', 'ORDER_67826030833c3', 'PENDING', '2025-01-11 12:12:32', 5, 'testing1'),
(10, '19', 230.00, 'TXN_678260d9e19bf', 'ORDER_678260d9e19bd', 'PENDING', '2025-01-11 12:15:21', 5, 'testing1'),
(11, '19', 230.00, 'TXN_678261b516651', 'ORDER_678261b51664e', 'PENDING', '2025-01-11 12:19:01', 5, 'testing1'),
(12, '19', 230.00, 'TXN_67826205ac57f', 'ORDER_67826205ac57b', 'PENDING', '2025-01-11 12:20:21', 5, 'testing1');

-- --------------------------------------------------------

--
-- Table structure for table `seo_pages`
--

CREATE TABLE `seo_pages` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `Is_Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_pages`
--

INSERT INTO `seo_pages` (`id`, `image`, `title`, `description`, `pdf`, `Is_Active`) VALUES
(1, 'Hardox plate supplies-Yash International.jpg', 'Hardox plate supplies - Yash Internationals', 'These plates are highly abrasion-resistant and known for their exceptional strength, durability, and toughness. Hardox Plate is used in various industries like agriculture, mining, construction, energy, and metalworking due to its superior properties compared to traditional AR steel plates. The impact of&nbsp;Hardox&nbsp;plates in the industry is significant as they offer greater strength, durability, and precision, allowing equipment to withstand heavy wear, impacts, and abrasion without cracking, denting, or warping.&nbsp;<a href=\"https://yashinternationals.in/Hardox-Plate-Suppliers-in-Mumbai.html\">Hardox&nbsp;plates</a> contribute to improved equipment performance, extended service life, and increased efficiency by reducing maintenance needs, protecting machinery, and enhancing productivity. Additionally,&nbsp;Hardox&nbsp;plates are easy to repair and maintain, saving time and money in the long run. Their machinability, formability, and finish make them ideal for creating lightweight components that resist wear and abrasion, leading to overall weight savings and enhanced equipment performance.&nbsp;Hardox&nbsp;plates have revolutionized various industries by optimizing equipment performance, reducing maintenance costs, and improving overall efficiency.', '', 1),
(2, 'S690 plate supplies-Yash International.jpg', 'S690 plate supplies - Yash Internationals', 'S690 plates, specifically S690QL and S690 QL, are high-strength structural steel plates known for their exceptional properties like high yield strength, toughness, and wear resistance. These plates are used in various industries such as machine building, lifting equipment, heavy transportation, steel constructions, and more. The impact of <a href=\"https://yashinternationals.in/S690-plate-supplies-in-india.html\">S690 plates</a> in the industry is significant as they enable the creation of leaner structures with increased payload capacity and energy efficiency. Due to their high strength nature, using S690 plates can lead to the development of lighter designs that maintain high payloads. S690 plates are also known for their excellent welding and machining properties, simplifying production and repair work. Their ability to resist cracks, withstand heavy impacts, and provide optimal reliability makes them ideal for applications requiring durability and strength. Overall, S690 plates contribute to improved equipment performance, extended service life, and cost savings by reducing maintenance needs and enhancing productivity in various industrial sectors.', '', 1),
(4, 'Stainless Steel Plates Suppliers-Yash International.jpg', 'Stainless steel plates Suppliers - Yash Internationals', 'Stainless steel plates are essential components used in various industries due to their corrosion resistance, durability, and aesthetic appeal. These plates are available in different grades like 304, 316, and 430, each offering specific properties suitable for diverse applications.<br><span class=\"\" style=\"border: 0px solid rgb(229, 231, 235); scrollbar-color: auto; scrollbar-width: auto; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-top: 0px;\">Supplier like, <a href=\"https://yashinternationals.in/\">Yash Internationals</a> provide a wide range of stainless-steel plates in different sizes and finishes to meet the needs of industries such as construction, manufacturing, and transportation. These suppliers offer customization options, high-quality products, and reliable services to ensure the availability of <a href=\"https://yashinternationals.in/Stainless-Steel-Sheets-Plates-Supplier-in-Mumbai.html\">stainless steel plates</a> that adhere to industry standards and customer requirements.</span><div><br></div>', '', 1),
(5, 'Boiler quality plates Suppliers-Yash International.jpg', ' Boiler quality plates Suppliers - Yash International', '<p><a href=\"https://yashinternationals.in/Boiler-Quality-Plates-Supplier-in-Mumbai-India.html\">Boiler quality plates</a> are steel plates specifically designed for use in welded pressure vessels where notch durability is crucial. These plates are used in applications like boilers, calorifiers, columns, pressure vessels, and more. They are known for their high strength, toughness, ductility, and resistance to corrosion, making them ideal for environments with high pressure and temperature fluids. Suppliers like Jaydeep Steels, Priminox Overseas, RPF Pipes &amp; Fittings, and VK Industrial Corporation Limited offer a variety of boiler quality plates in different grades and sizes to meet industry standards and specific project requirements. <a href=\"https://yashinternationals.in/\">Yash Internationals</a> provide high-quality products, customization options, and reliable services to cater to the diverse needs of industries requiring boiler quality plates<br></p>', '', 1),
(6, 'Alloy steel plates Suppliers-Yash International.jpg', 'Alloy steel plates Suppliers - Yash Internationals', '<span class=\"\" style=\"border: 0px solid rgb(229, 231, 235); scrollbar-color: auto; scrollbar-width: auto; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-top: 0px;\"><a href=\"https://yashinternationals.in/Alloy-steel-plates-Supplier-in-mumbai.html\">Alloy steel plates</a> are a type of steel that is alloyed with various elements like nickel, chromium, vanadium, and others to enhance its properties such as strength, wear resistance, and corrosion resistance. These alloying elements are added in specific proportions to create steel with unique characteristics not found in regular carbon steel. Alloy steel plates are often subjected to thermal processing like annealing or quenching and tempering to optimize their properties. The addition of alloying elements increases the hardenability of the steel, providing improved fatigue strength, wear resistance, and toughness. Alloy steel, like the 4140 alloys, offers a superior strength-to-weight ratio compared to standard steel grades, making it ideal for applications requiring high strength and hardness.</span>', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) DEFAULT NULL,
  `AdminPassword` varchar(255) DEFAULT NULL,
  `AdminEmailId` varchar(255) DEFAULT NULL,
  `userType` int(11) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `userType`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', 'phpgurukulofficial@gmail.com', 1, '2021-05-26 13:00:00', '2021-11-11 10:53:15'),
(5, 'yashinternational', '2d1718ea6e22a987d31926439e57702b', 'info@yashinternationals.in', 1, '2024-03-20 10:43:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcareer`
--

CREATE TABLE `tblcareer` (
  `id` int(11) NOT NULL,
  `designation` text DEFAULT NULL,
  `Qualification` varchar(200) NOT NULL,
  `Experience` varchar(50) NOT NULL,
  `PostDetails` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL,
  `postedBy` varchar(255) DEFAULT NULL,
  `lastUpdatedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcareer`
--

INSERT INTO `tblcareer` (`id`, `designation`, `Qualification`, `Experience`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostImage`, `postedBy`, `lastUpdatedBy`) VALUES
(1, 'adminhellp', 'hello', '123', 'dfmdsklfghjhr', '2024-02-24 10:43:09', '2024-02-26 04:55:34', 1, 'fitting3.png', 'admin', NULL),
(2, 'admin', 'hello', '123', '\r\ndfbgvrtfhnn \r\n\r\n', '2024-02-24 10:45:06', NULL, 1, 'crewing.jpg', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(10, 'General Insurance', 'General Insurance', '2024-12-16 07:51:39', NULL, 1),
(11, 'Life Insurance', 'Life Insurance', '2024-12-16 07:51:53', NULL, 1),
(12, 'Health Insurance', 'Health Insurance', '2024-12-16 07:52:06', NULL, 1),
(13, 'Premium', 'Premium', '2024-12-16 07:52:33', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblemp`
--

CREATE TABLE `tblemp` (
  `id` int(11) NOT NULL,
  `Empname` mediumtext DEFAULT NULL,
  `Empdesignation` varchar(200) NOT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL,
  `postedBy` varchar(255) DEFAULT NULL,
  `lastUpdatedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `PostTitle` varchar(255) DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `Price` varchar(255) NOT NULL,
  `Coveramount` varchar(255) NOT NULL,
  `PostDetails` longtext NOT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL,
  `viewCounter` int(11) DEFAULT NULL,
  `postedBy` varchar(255) DEFAULT NULL,
  `lastUpdatedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `Price`, `Coveramount`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`, `viewCounter`, `postedBy`, `lastUpdatedBy`) VALUES
(19, 'Iprotect Smart ', 10, 8, '230', '100000', '<h3><h5><ul><li><font face=\"Times New Roman\">Option to delay 12 months premium<span style=\"font-weight: 600; font-family: &quot;Hind Madurai&quot;, sans-serif;\">&nbsp;free</span></font></li></ul><ul><li><font face=\"Times New Roman\">&nbsp;Early payout on Terminal Illness<span style=\"font-weight: 600; font-family: &quot;Hind Madurai&quot;, sans-serif;\">&nbsp;free</span></font></li></ul><ul><li><font face=\"Times New Roman\">Waiver of premium cover&nbsp;<span style=\"font-weight: 600; font-family: &quot;Hind Madurai&quot;, sans-serif;\">free</span></font></li></ul><ul><li><font face=\"Times New Roman\">Option to delay 12 months premium<span style=\"font-weight: 600; font-family: &quot;Hind Madurai&quot;, sans-serif;\">&nbsp;free</span></font></li></ul></h5></h3>', '2024-12-19 11:39:35', '2025-01-11 11:47:29', 1, 'iprotect-Smart-', '6129243be2bd023bd7efc896c7fd8240.png', NULL, 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(8, 10, 'Motor Insurance', ' Motor Insurance', '2024-12-16 07:53:16', '2024-12-19 10:29:17', 1),
(9, 10, 'Home Insurance ', 'Home Insurance ', '2024-12-19 10:00:14', NULL, 1),
(10, 10, 'Travel Insurance', 'Travel Insurance', '2024-12-19 10:00:32', NULL, 1),
(11, 10, ' Property Insurance', ' Property Insurance', '2024-12-19 10:00:51', '2024-12-19 10:29:51', 1),
(12, 10, ' Marine Insurance', ' Marine Insurance', '2024-12-19 10:01:01', '2024-12-19 10:30:28', 1),
(13, 10, ' Food Insurance', ' Food Insurance', '2024-12-19 10:01:18', '2024-12-19 10:30:43', 1),
(14, 10, ' Comprehensive Insurance', ' Comprehensive Insurance', '2024-12-19 10:01:22', '2024-12-19 10:30:59', 1),
(15, 10, ' Agriculture Insurance', ' Agriculture Insurance', '2024-12-19 10:01:37', '2024-12-19 10:31:15', 1),
(16, 11, ' Whole Life Insurance', ' Whole Life Insurance', '2024-12-19 10:08:05', '2024-12-19 10:31:38', 1),
(17, 11, ' Endowment Policy', ' Endowment Policy', '2024-12-19 10:08:17', '2024-12-19 10:31:53', 1),
(18, 11, 'Pension Plan', 'Pension Plan', '2024-12-19 10:32:08', NULL, 1),
(19, 11, 'Unit Linked Insurance', 'Unit Linked Insurance', '2024-12-19 10:32:19', NULL, 1),
(20, 11, 'Term Life Insurence', 'Term Life Insurence', '2024-12-19 10:32:29', NULL, 1),
(21, 11, 'Group Insurance', 'Group Insurance', '2024-12-19 10:32:46', NULL, 1),
(22, 11, 'Money Back Policy', 'Money Back Policy', '2024-12-19 10:32:58', NULL, 1),
(23, 11, 'Pet Insurance', 'Pet Insurance', '2024-12-19 10:33:06', NULL, 1),
(24, 12, 'Mediclaim', 'Mediclaim', '2024-12-19 10:33:15', NULL, 1),
(25, 12, 'Child Plan', 'Child Plan', '2024-12-19 10:33:25', NULL, 1),
(26, 12, 'Family Floater', 'Family Floater', '2024-12-19 10:33:35', NULL, 1),
(27, 12, 'Critical Illness Insurence', 'Critical Illness Insurence', '2024-12-19 10:33:45', NULL, 1),
(28, 12, 'Disability Insurance', 'Disability Insurance', '2024-12-19 10:33:55', NULL, 1),
(29, 12, 'Animal Insurance', 'Animal Insurance', '2024-12-19 10:34:06', NULL, 1),
(30, 12, 'Business Health Insurance', 'Business Health Insurance', '2024-12-19 10:34:17', NULL, 1),
(31, 12, 'Senior Citizen Insurence', 'Senior Citizen Insurence', '2024-12-19 10:34:27', NULL, 1),
(32, 13, 'Premium', 'Premium', '2024-12-19 10:34:38', NULL, 1),
(33, 13, 'Terms Life Insurence', 'Terms Life Insurence', '2024-12-19 10:35:11', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `Is_Active` int(1) DEFAULT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `Is_Active`, `profile_picture`, `password`, `created_at`) VALUES
(1, 'testing name', 'technobizzar@gmail.com', '', 1, './assets/images/default-profile.png', '$2y$10$tOE2uXUEO9naDAVddOJ5gODEqWU4wBigi6o4VFxm6H3bjtfWW30IG', '2024-12-17 06:36:29'),
(2, 'krishna', 'vishwakarmakrishna186@gmail.com', '', 1, './assets/images/default-profile.png', '$2y$10$hcJLSg7wyxdKzsOjGG1KEOCmoA7FVnGPHQ1mbUwW.bZGpwQOfvwoq', '2024-12-17 06:39:15'),
(3, 'testing name', 'abc@gmail.com', '', 1, './assets/images/default-profile.png', '$2y$10$/F04chyKLODBGox7Qu1fHOubhMqQ/5giOs.eoUxvrob8WYswEJ1oO', '2024-12-17 06:56:15'),
(4, 'krishna', 'krishnaofficial141@gmail.com', '', 0, './assets/images/default-profile.png', '$2y$10$t8ZzCmTbpaNpVdIALVlml.kt3QPv0rI3cEgFpHFPO/L.U3q.sPJAe', '2024-12-19 09:10:49'),
(5, 'testing1', 'testing1@gmail.com', '', NULL, './assets/images/default-profile.png', '$2y$10$3Idl6OwlwGx9wppaO0k6f.O5WoUKsLEObV6ttv84pSvWUuFva8Daq', '2024-12-19 12:17:29'),
(6, 'suraj', 'suraj@gmail.com', '8989898988', NULL, './assets/images/default-profile.png', '$2y$10$6diGHMoohDGqGlz4ALbv9uXAcb.bic4lHTTGZT0aucF1HzxmGDx/e', '2025-01-11 10:18:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_pages`
--
ALTER TABLE `seo_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `AdminUserName` (`AdminUserName`);

--
-- Indexes for table `tblcareer`
--
ALTER TABLE `tblcareer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `tblemp`
--
ALTER TABLE `tblemp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `postcatid` (`CategoryId`),
  ADD KEY `postsucatid` (`SubCategoryId`),
  ADD KEY `subadmin` (`postedBy`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`),
  ADD KEY `catid` (`CategoryId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `seo_pages`
--
ALTER TABLE `seo_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcareer`
--
ALTER TABLE `tblcareer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblemp`
--
ALTER TABLE `tblemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD CONSTRAINT `pid` FOREIGN KEY (`postId`) REFERENCES `tblposts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD CONSTRAINT `postcatid` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `postsucatid` FOREIGN KEY (`SubCategoryId`) REFERENCES `tblsubcategory` (`SubCategoryId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `subadmin` FOREIGN KEY (`postedBy`) REFERENCES `tbladmin` (`AdminUserName`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD CONSTRAINT `catid` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
