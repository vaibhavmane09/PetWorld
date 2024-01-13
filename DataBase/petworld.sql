-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 06:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproduct`
--

CREATE TABLE `addproduct` (
  `pid` varchar(10) NOT NULL,
  `pet` varchar(10) DEFAULT NULL,
  `ptype` varchar(10) DEFAULT NULL,
  `pname` varchar(10) DEFAULT NULL,
  `pprice` varchar(10) DEFAULT NULL,
  `pimg` longblob DEFAULT NULL,
  `pdesc` varchar(100) DEFAULT NULL,
  `puse` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addtrainer`
--

CREATE TABLE `addtrainer` (
  `mobno` bigint(20) NOT NULL,
  `tname` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `speciality` varchar(100) DEFAULT NULL,
  `exp` varchar(50) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `blockstatus` varchar(20) NOT NULL DEFAULT 'Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aname` varchar(20) DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `fname` varchar(10) DEFAULT NULL,
  `lname` varchar(10) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `mobno` bigint(10) DEFAULT NULL,
  `msg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `mobno` bigint(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `fon` varchar(100) DEFAULT NULL,
  `fmsg` varchar(100) DEFAULT NULL,
  `frate` varchar(10) DEFAULT NULL,
  `replaymsg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_mobno` bigint(20) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `product_id` varchar(20) DEFAULT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `product_price` varchar(20) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `total_amt` varchar(20) DEFAULT NULL,
  `pay_status` varchar(20) DEFAULT NULL,
  `delivery_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otp_mapping`
--

CREATE TABLE `otp_mapping` (
  `mobile_no` varchar(50) DEFAULT NULL,
  `otp_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petprogress`
--

CREATE TABLE `petprogress` (
  `progress_id` int(11) NOT NULL,
  `petid` varchar(10) DEFAULT NULL,
  `pet_name` varchar(20) DEFAULT NULL,
  `trainer_mobno` bigint(20) DEFAULT NULL,
  `pet_owner` varchar(20) DEFAULT NULL,
  `owner_mobno` bigint(20) DEFAULT NULL,
  `pet_type` varchar(20) DEFAULT NULL,
  `pet_breed` varchar(20) DEFAULT NULL,
  `train_type` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `duration` varchar(20) DEFAULT NULL,
  `progress_status` varchar(20) DEFAULT NULL,
  `train_desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `petid` varchar(10) NOT NULL,
  `pet` varchar(10) DEFAULT NULL,
  `breed` varchar(10) DEFAULT NULL,
  `pname` varchar(10) DEFAULT NULL,
  `pgender` varchar(10) DEFAULT NULL,
  `petage` varchar(10) DEFAULT NULL,
  `pweight` varchar(20) DEFAULT NULL,
  `vaccine` varchar(20) DEFAULT NULL,
  `mobno` bigint(20) DEFAULT NULL,
  `traintype` varchar(20) DEFAULT NULL,
  `duration` varchar(20) DEFAULT NULL,
  `train_price` varchar(20) DEFAULT NULL,
  `petimage` longblob DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL,
  `allocation_status` varchar(20) DEFAULT NULL,
  `allocated_trainer` varchar(50) DEFAULT NULL,
  `tmobno` bigint(20) DEFAULT NULL,
  `training_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `mobno` bigint(20) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `pwd` varchar(20) DEFAULT NULL,
  `blockstatus` varchar(100) NOT NULL DEFAULT 'Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addproduct`
--
ALTER TABLE `addproduct`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `addtrainer`
--
ALTER TABLE `addtrainer`
  ADD PRIMARY KEY (`mobno`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_mobno` (`user_mobno`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `petprogress`
--
ALTER TABLE `petprogress`
  ADD PRIMARY KEY (`progress_id`),
  ADD KEY `trainer_mobno` (`trainer_mobno`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`petid`),
  ADD KEY `mobno` (`mobno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`mobno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_mobno`) REFERENCES `users` (`mobno`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `addproduct` (`pid`);

--
-- Constraints for table `petprogress`
--
ALTER TABLE `petprogress`
  ADD CONSTRAINT `petprogress_ibfk_1` FOREIGN KEY (`trainer_mobno`) REFERENCES `addtrainer` (`mobno`);

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`mobno`) REFERENCES `users` (`mobno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
