-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2018 at 09:19 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ration_card_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `about_me` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `about_me`, `address`, `birthday`, `occupation`, `mobile`, `image`, `user_id`, `password`) VALUES
(1, 'Ram', 'Waghmode', 'Diploma', 'Solapur', '1999-09-18', 'Diploma', '9657840468', 'af00d03f36178e0b2a4508997dacd240--daily-motivational-quotes-great-quotes.jpg', 'ramwaghmode145@gmail.com', 'Pass123#'),
(2, 'Mahesh', 'Rachha', 'Diploma in CSE', 'MIDC,Solapur', '17/01/2000', 'Student', '8484946271', 'profile-icon.png', 'maheshrachha1225@gmail.com', 'Mah@202');

-- --------------------------------------------------------

--
-- Table structure for table `family_members_details`
--

CREATE TABLE `family_members_details` (
  `id` int(11) NOT NULL,
  `Card no` text NOT NULL,
  `Type` text NOT NULL,
  `name` text NOT NULL,
  `age` text NOT NULL,
  `gender` text NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `family_members_details`
--

INSERT INTO `family_members_details` (`id`, `Card no`, `Type`, `name`, `age`, `gender`, `date`, `time`) VALUES
(1, 'MH-101', 'Adult', 'Akash', '14', 'Male', '2018-03-01', '11:24:36am'),
(2, 'MH-101', 'Select Type', 'Soniya', '10', 'Female', '2018-03-01', '11:27:42am'),
(3, 'MH-101', 'Select Type', 'sneha', '08', 'Female', '2018-03-01', '11:28:53am'),
(4, 'MH-101', 'children', 'sagar', '12', 'Male', '2018-03-01', '11:32:05am'),
(6, 'MH-102', 'children', 'sid', '12', 'Male', '2018-03-01', '11:35:39am'),
(7, 'MH-105', 'Adult', 'RMS', '18', 'Male', '2018-03-30', '09:11:00am');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `Products` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `Products`) VALUES
(1, 'Sugar'),
(2, 'BoiledRice'),
(3, 'Wheat'),
(4, 'Dhal'),
(5, 'PalmOil'),
(6, 'Atta'),
(7, 'Kerosene');

-- --------------------------------------------------------

--
-- Table structure for table `ration card numbers details`
--

CREATE TABLE `ration card numbers details` (
  `id` int(11) NOT NULL,
  `card number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id` int(11) NOT NULL,
  `Card_no` text NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`id`, `Card_no`, `Product_id`, `Quantity`, `Date`, `Time`) VALUES
(1, 'MH-101', 1, 200, '2018-03-20', '06:48:35am'),
(2, 'MH-101', 2, 80, '2018-03-20', '06:49:35am'),
(3, 'MH-101', 4, 90, '2018-03-20', '06:49:49am'),
(4, 'MH-102', 3, 40, '2018-03-20', '06:50:08am'),
(5, 'MH-103', 6, 50, '2018-03-20', '06:50:28am'),
(6, 'MH-103', 7, 40, '2018-03-20', '06:50:41am'),
(7, 'MH-103', 5, 30, '2018-03-20', '06:51:29am'),
(8, 'MH-101', 1, 50, '2018-03-20', '07:20:27am'),
(9, 'MH-103', 2, 20, '2018-03-20', '11:30:27am'),
(10, 'MH-102', 3, 10, '2018-03-20', '12:32:10pm'),
(11, 'MH-103', 1, 10, '2018-03-20', '16:02:41pm'),
(12, 'MH-103', 6, 10, '2018-03-21', '16:18:26pm'),
(13, 'MH-101', 4, 20, '2018-03-22', '08:14:07am'),
(14, 'MH-103', 5, 50, '2018-03-22', '08:29:52am'),
(15, 'MH-101', 7, 60, '2018-03-22', '08:34:20am'),
(16, 'MH-102', 7, 10, '2018-03-22', '08:40:16am'),
(17, 'MH-101', 6, 10, '2018-03-22', '08:43:06am'),
(18, 'MH-101', 1, 40, '2018-03-22', '09:26:13am'),
(19, 'MH-102', 6, 30, '2018-03-30', '08:09:26am'),
(20, 'MH-105', 4, 50, '2018-03-30', '09:12:38am');

-- --------------------------------------------------------

--
-- Table structure for table `stocks_details`
--

CREATE TABLE `stocks_details` (
  `id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `product_per_kg` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks_details`
--

INSERT INTO `stocks_details` (`id`, `Product_id`, `product_per_kg`, `Date`, `Time`) VALUES
(1, 1, 500, '2018-03-20', '12:24:33pm'),
(2, 2, 400, '2018-03-20', '12:24:48pm'),
(3, 3, 450, '2018-03-20', '12:24:57pm'),
(4, 4, 500, '2018-03-20', '12:25:14pm'),
(5, 5, 700, '2018-03-20', '12:25:27pm'),
(6, 6, 450, '2018-03-20', '12:25:36pm'),
(7, 7, 900, '2018-03-20', '12:25:46pm');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `Card no` text NOT NULL,
  `FamilyHead` text NOT NULL,
  `DOB` text NOT NULL,
  `Gender` text NOT NULL,
  `Address` text NOT NULL,
  `Mobile` text NOT NULL,
  `Email` text NOT NULL,
  `Card Color` text NOT NULL,
  `Cylinders` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `Card no`, `FamilyHead`, `DOB`, `Gender`, `Address`, `Mobile`, `Email`, `Card Color`, `Cylinders`, `date`, `time`) VALUES
(1, 'MH-101', 'SHUBHAM AMBHORE', '09/02/1994', 'male', 'AKOLA', '9960786868', 'shuambhore007@gmail.com ', 'Yellow ', 1, '2018-03-01', '06:54:10am'),
(3, 'MH-102', 'MAHESH WAGHMODE', '08/03/1994', 'male', 'SOLAPUR', '9373965249', '09maheshwaghmode@gmail.com', 'Orange', 1, '2018-03-01', '09:10:24am'),
(4, 'MH-103', 'Shiv', '09/02/1994', 'Female', 'Nagpur', '9960786868', 'shiv@gmail.com', 'White', 2, '2018-03-16', '11:13:23am'),
(6, 'MH-105', 'Mahesh', '17/01/2000', 'Male', 'MIDC,Solapur', '8484946271', 'maheshrachha1225@gmail.com', 'Orange', 2, '2018-03-30', '09:07:44am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_members_details`
--
ALTER TABLE `family_members_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ration card numbers details`
--
ALTER TABLE `ration card numbers details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks_details`
--
ALTER TABLE `stocks_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `family_members_details`
--
ALTER TABLE `family_members_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ration card numbers details`
--
ALTER TABLE `ration card numbers details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stocks_details`
--
ALTER TABLE `stocks_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
