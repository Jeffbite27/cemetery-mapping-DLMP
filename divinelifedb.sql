-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 04:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `divinelifedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer-id` int(11) NOT NULL,
  `family-name` varchar(255) NOT NULL,
  `first-name` varchar(255) NOT NULL,
  `middle-name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bday` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `work` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer-id`, `family-name`, `first-name`, `middle-name`, `nickname`, `address`, `contact`, `email`, `bday`, `gender`, `religion`, `citizenship`, `status`, `work`) VALUES
(1, 'Guinanao', 'Rico', 'Estribo', '', 'Block 14 Lot 76 Majada In', '9854216854', 'guinanaorico@gmail.com', '2022-03-25', 'Male', 'Catholic', 'filipino', 'Single', 'Government Employee'),
(2, 'Admin', 'CCC', 'Estribo', '', 'Block 14 Lot 76 Majada In', '21321231', 'admin@ccc.edu.ph', '2022-03-16', 'Male', 'Catholic', 'filipino', 'Single', 'Private Employee');

-- --------------------------------------------------------

--
-- Table structure for table `deceased`
--

CREATE TABLE `deceased` (
  `deceased-id` int(11) NOT NULL,
  `customer-id` int(11) NOT NULL,
  `dead-family-name` varchar(255) NOT NULL,
  `dead-fname` varchar(255) NOT NULL,
  `dead-mname` varchar(255) NOT NULL,
  `dead-gender` varchar(255) NOT NULL,
  `dead-citizenship` varchar(255) NOT NULL,
  `dead-civil-status` varchar(255) NOT NULL,
  `dead-relative` varchar(255) NOT NULL,
  `dead-relative-surname` varchar(255) NOT NULL,
  `dead-relationship` varchar(255) NOT NULL,
  `internment-date` varchar(255) NOT NULL,
  `date-of-birth` varchar(255) NOT NULL,
  `date-of-death` varchar(255) NOT NULL,
  `death-cert` varchar(255) NOT NULL,
  `burial-permit` varchar(255) NOT NULL,
  `deed-of-sale` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deceased`
--

INSERT INTO `deceased` (`deceased-id`, `customer-id`, `dead-family-name`, `dead-fname`, `dead-mname`, `dead-gender`, `dead-citizenship`, `dead-civil-status`, `dead-relative`, `dead-relative-surname`, `dead-relationship`, `internment-date`, `date-of-birth`, `date-of-death`, `death-cert`, `burial-permit`, `deed-of-sale`) VALUES
(1, 1, 'Musk', 'Elon', 'Estribo', 'Male', 'Filipino', 'Single', 'Rico', 'Guinanao', 'Cousin', '2022-03-17', '2022-03-22', '2022-03-09', 'death-cert', 'burial-permit', 'deed-of-sale');

-- --------------------------------------------------------

--
-- Table structure for table `staff_employee`
--

CREATE TABLE `staff_employee` (
  `id` int(11) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_employee`
--

INSERT INTO `staff_employee` (`id`, `firstname`, `lastname`, `email`, `username`, `password`) VALUES
(1, 'jeff', 'daño', 'jeffdo19@gmail.com', '222', 'xzxcxx'),
(6, 'aaa', 'ssd', 'zxczxczx@agag', 'aaas', 'zzzzzz'),
(7, 'asdaa', 'aasd', 'jeffdo19@gmail.com', 'xxxxx', 'xxxx '),
(8, 'azxc', 'zxczx', 'asdad@xc', 'zxc', 'asd '),
(10, 'Rico', 'Guinanao', 'guinanaorico@gmail.com', 'rics', '123 ');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `verify_token` varchar(150) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `username`, `email`, `password`, `verify_token`, `verify_status`) VALUES
(1, 'asd', 'jeffdo19@gmail.com', 'xxx', '5aa750de9e01a4bd954e8975ff6ff10e', 1),
(10, 'rizal', 'jeffbite01@gmail.com', '123', '7eaad4ab12f645446c495c5f92e2b0df', 1),
(11, 'ricss', 'guinanaorico@gmail.com', '123', '05b2b9b94877e67c44b16803ad35f789', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer-id`);

--
-- Indexes for table `deceased`
--
ALTER TABLE `deceased`
  ADD PRIMARY KEY (`deceased-id`);

--
-- Indexes for table `staff_employee`
--
ALTER TABLE `staff_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deceased`
--
ALTER TABLE `deceased`
  MODIFY `deceased-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_employee`
--
ALTER TABLE `staff_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
