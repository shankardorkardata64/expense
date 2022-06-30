-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 12:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_user`
--

CREATE TABLE `cat_user` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_user`
--

INSERT INTO `cat_user` (`id`, `user`, `cat`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(7, 4, 3),
(12, 1, 7),
(13, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `expences`
--

CREATE TABLE `expences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `edate` varchar(50) DEFAULT NULL,
  `staus` int(11) DEFAULT 0,
  `updated_at` varchar(100) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `rejectnote` varchar(250) DEFAULT NULL,
  `added_year` varchar(50) DEFAULT NULL,
  `added_month` varchar(20) DEFAULT NULL,
  `wallet_type` varchar(100) DEFAULT 'Post-Pay',
  `date` datetime DEFAULT current_timestamp(),
  `strdate` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expences_category`
--

CREATE TABLE `expences_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `allowed_for` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expences_category`
--

INSERT INTO `expences_category` (`id`, `name`, `status`, `allowed_for`) VALUES
(1, 'Office', 1, '1,2,3'),
(2, 'Pantry', 1, '1,2,3'),
(3, 'Site', 1, '4'),
(5, 'Membership', 1, ''),
(6, 'Amol', 0, ''),
(7, 'gdfg', 1, ''),
(8, 'For manager only ', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `expences_type`
--

CREATE TABLE `expences_type` (
  `id` int(11) NOT NULL,
  `cat` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expences_type`
--

INSERT INTO `expences_type` (`id`, `cat`, `name`, `status`) VALUES
(1, 2, 'Water bill', 1),
(3, 3, 'Hardware', 1),
(4, 1, 'Electricity Bill', 1),
(5, 1, 'Teliphone bill', 1),
(6, 1, 'internet Bill', 1),
(7, 1, 'Stationary', 1),
(8, 1, 'Rent', 1),
(9, 1, 'System/Printer Maintainace', 1),
(10, 1, 'Courier', 1),
(11, 1, 'House Kepping', 1),
(12, 2, 'Tea Expence', 1),
(13, 2, 'Other', 1),
(14, 3, 'Breackfast/Snaks', 1),
(15, 3, 'Petrol', 1),
(16, 3, 'Bike Maintenance', 1),
(17, 3, 'Travelling', 1),
(18, 3, 'Misc', 1),
(19, 5, 'BNI', 1),
(20, 5, 'Consultation', 1),
(21, 5, 'Recruitment', 1),
(22, 1, 'Donation', 1),
(23, 8, 'Print pagers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `lname`, `value`, `type`) VALUES
(1, 'system_name', 'System Name', 'Expences Managment System ', 'text'),
(2, 'system_title', 'System Title', 'Expences Managment System ', 'text'),
(6, 'system_footer', 'System Footer', 'Copyright Expences Managment System © 2022. All right reserved.', 'text'),
(7, 'system_email', 'System Email', 'info@gmail.com', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` int(11) DEFAULT 4,
  `status` int(11) NOT NULL DEFAULT 1,
  `fname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `sex` text DEFAULT NULL,
  `salary` text DEFAULT NULL,
  `qulification` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `zipcode` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `bankname` text DEFAULT NULL,
  `acctype` text DEFAULT NULL,
  `accno` text DEFAULT NULL,
  `ifsc` varchar(100) DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `doj` text DEFAULT NULL,
  `county` text DEFAULT NULL,
  `wallet` varchar(125) DEFAULT '0',
  `empcode` varchar(100) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `forgotcode` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `status`, `fname`, `lname`, `sex`, `salary`, `qulification`, `address`, `phone`, `mobile`, `city`, `state`, `zipcode`, `email`, `bankname`, `acctype`, `accno`, `ifsc`, `dob`, `doj`, `county`, `wallet`, `empcode`, `is_deleted`, `forgotcode`) VALUES
(1, 'admin', '$2y$10$J34NMnGhOA3ULLwiLdpPHukhjF3V/Z9FWvbFvf6E0NGkiH6AtPi1a', 1, 1, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'EMP-ADMIN', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `main` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `name`, `status`, `main`) VALUES
(1, 'Admin', 1, 1),
(2, 'Manager', 1, 1),
(3, 'Finance Manager', 1, 1),
(4, 'Employee', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_log`
--

CREATE TABLE `wallet_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `before_amount` varchar(110) DEFAULT NULL,
  `amount` varchar(110) DEFAULT NULL,
  `new_amount` varchar(110) DEFAULT NULL,
  `action` varchar(10) DEFAULT 'add',
  `date` varchar(110) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_user`
--
ALTER TABLE `cat_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expences`
--
ALTER TABLE `expences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expences_category`
--
ALTER TABLE `expences_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expences_type`
--
ALTER TABLE `expences_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_log`
--
ALTER TABLE `wallet_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_user`
--
ALTER TABLE `cat_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expences`
--
ALTER TABLE `expences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expences_category`
--
ALTER TABLE `expences_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expences_type`
--
ALTER TABLE `expences_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wallet_log`
--
ALTER TABLE `wallet_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
