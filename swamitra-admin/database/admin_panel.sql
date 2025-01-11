-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 12:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `Is_Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `userType`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', 'phpgurukulofficial@gmail.com', 1, '2021-05-26 13:00:00', '2021-11-11 10:53:15'),
(3, 'subadmin', 'f925916e2754e5e03f75dd58a5733251', 'sudamin@gmail.in', 0, '2021-11-10 12:58:11', NULL),
(4, 'suadmin2', 'f925916e2754e5e03f75dd58a5733251', 'sbadmin@test.com', 0, '2021-11-10 12:58:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcareer`
--

CREATE TABLE `tblcareer` (
  `id` int(11) NOT NULL,
  `designation` text DEFAULT NULL,
  `Qualification` varchar(200) NOT NULL,
  `Experience` varchar(50) NOT NULL,
  `PostDetails` longtext CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL,
  `postedBy` varchar(255) DEFAULT NULL,
  `lastUpdatedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(1, 'hello', 'cfdsgvfdfbv', '2024-02-26 05:05:39', NULL, 1),
(2, 'hello', 'cfdsgvfdfbv', '2024-02-26 05:05:39', NULL, 1),
(3, 'adminadmin', 'vcdv dvs', '2024-02-26 05:07:30', NULL, 1),
(4, 'monu', 'rtfghftrghj', '2024-02-26 05:25:48', NULL, 1),
(5, 'mumbai', 'mumbai maharastra', '2024-02-26 12:06:28', '2024-02-26 12:09:45', 0),
(6, 'admin12345', 'admin123456789', '2024-02-26 12:08:20', '2024-02-26 12:09:35', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `PostTitle` longtext DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL,
  `viewCounter` int(11) DEFAULT NULL,
  `postedBy` varchar(255) DEFAULT NULL,
  `lastUpdatedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`, `viewCounter`, `postedBy`, `lastUpdatedBy`) VALUES
(2, 'ferwtgerghrtujhtyujy', 3, NULL, 'ascfsdgvdfsb', '2024-02-26 12:16:05', '2024-02-26 12:18:59', 0, 'ferwtgerghrtujhtyujy', '1731a4a2d5e212bd7622d541cd6d8796.jpg', NULL, 'admin', 'admin'),
(3, 'bdghfgjhfgthj', 1, NULL, 'cfbcghbfghtr', '2024-03-07 10:13:55', '2024-03-07 10:14:23', 0, 'bdghfgjhfgthj', 'd51e12f004aa7d5152dfb692897463a9.png', NULL, 'admin', 'admin');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(3, 4, 'hii', 'thytt', '2024-02-26 05:26:00', '2024-02-26 05:31:00', 0),
(4, 3, 'monu monudfvfd', 'ghfghfgjh', '2024-02-26 05:31:21', NULL, 1),
(5, 4, 'gfnfgjnfg', 'cbcghngtt', '2024-02-26 05:31:59', NULL, 1),
(6, 3, 'dvfdsvbfsbadnmmmmmmmmmmm', 'defsdfgsdvgfsd', '2024-02-26 11:45:35', '2024-02-26 12:12:29', 1),
(7, 6, 'testing1234566977', 'cdsafvdsfgvsdvgsdfvsdfvgsdfvsdfasdf', '2024-02-26 12:11:31', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcareer`
--
ALTER TABLE `tblcareer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
