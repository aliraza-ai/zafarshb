-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 09:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zafar`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_info`
--

CREATE TABLE `business_info` (
  `id` int(11) NOT NULL,
  `businessName` varchar(100) NOT NULL,
  `businessAddress` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `postalCode` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `mobileNumber` varchar(100) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `websiteAddress` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `salesTaxNumber` varchar(100) NOT NULL,
  `ntn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_info`
--

INSERT INTO `business_info` (`id`, `businessName`, `businessAddress`, `city`, `province`, `postalCode`, `country`, `phoneNumber`, `mobileNumber`, `emailAddress`, `websiteAddress`, `logo`, `cnic`, `salesTaxNumber`, `ntn`) VALUES
(1, 'NEW CITY KHARIAN', 'Near TDCP Main GT Road Kharian', 'Kharian ', 'Pakistan', '50090', 'Pakistan', '053-7704311', '0302-6307563', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `captain`
--

CREATE TABLE `captain` (
  `id` int(11) NOT NULL,
  `joindate` date NOT NULL,
  `name` varchar(250) NOT NULL,
  `number` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `number` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  `userType` int(11) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `active`, `userType`, `mobile`, `created_at`, `update_at`) VALUES
(1, 'Adal ', 'Hussain', 'malikadi681@gmail.com', '2fd18793d31e2cfcba1edfc102ab4175', 1, 1, '03026307563', '2021-12-14 07:17:58', '2021-04-06 09:14:56'),
(2, 'ali', 'raza', 'aliraza6136@gmail.com', '88ff77c0b46c14fe456bc41680650534', 1, 1, '', '2021-11-21 21:39:53', '2021-11-21 21:36:20'),
(3, 'Anum', 'rafique', 'Anum.rafique1115@gmail.com', '9b03f2d1c73996ea094fbf3f5e7ac82b', 1, 2, '', '2022-01-05 05:17:14', '2022-01-01 16:36:01'),
(4, 'MUHAMMAD', 'YOUNAS (CEO)', 'my283283283@gmail.com', '3c481d972aaecbcfa92401d2446d2418', 1, 3, '3458990950', '2022-01-02 05:45:27', '2022-01-01 16:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `number` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_info`
--
ALTER TABLE `business_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captain`
--
ALTER TABLE `captain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_info`
--
ALTER TABLE `business_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `captain`
--
ALTER TABLE `captain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
