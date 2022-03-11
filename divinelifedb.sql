-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 02:28 PM
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
  `customer_id` int(11) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
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

INSERT INTO `customers` (`customer_id`, `family_name`, `first_name`, `middle_name`, `nickname`, `address`, `contact`, `email`, `bday`, `gender`, `religion`, `citizenship`, `status`, `work`) VALUES
(1, 'Guinanao', 'Ricod', 'Estribo', 'Rics', 'Block 14 Lot 76 Majada In, Canlubang', '09854216854', 'guinanaorico@gmail.com', '1999-10-31', 'Male', 'Catholic', 'Filipino', 'Single', 'Government Employee'),
(2, 'Dano', 'Jeff', 'Estribo', '', 'Cabuyao', '09126546881', 'guinanaorico@gmail.com', '2022-03-21', 'Male', 'Catholic', 'Filipino', 'Single', 'Government Employee'),
(3, 'rtyr', 'tyr', 'Estribo', '', 'Block 14 Lot 76 Majada In', '09126546881', 'guinanaorico@gmail.com', '2022-03-18', 'Male', 'dsf', 'Filipino', 'Single', 'Self-Employed'),
(4, 'Guinanao', 'Ricocgh', 'Estribo', 'fghf', 'Calamba, Laguna', '9542551688', 'estriborics@gmail.com', '2022-03-10', 'Male', 'fgh', 'Filipino', 'Single', 'Private Employee'),
(5, 'Admin', 'CCC', 'Estribo', '', 'Block 14 Lot 76 Majada In', '09126546881', 'admin@ccc.edu.ph', '2022-03-14', 'Male', 'Catholic', 'Filipino', 'Single', 'Self-Employed');

-- --------------------------------------------------------

--
-- Table structure for table `deceased`
--

CREATE TABLE `deceased` (
  `deceased_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `dead_family_name` varchar(255) NOT NULL,
  `dead_fname` varchar(255) NOT NULL,
  `dead_mname` varchar(255) NOT NULL,
  `dead-gender` varchar(255) NOT NULL,
  `dead_citizenship` varchar(255) NOT NULL,
  `dead_civil_status` varchar(255) NOT NULL,
  `dead_relative` varchar(255) NOT NULL,
  `dead_relative_surname` varchar(255) NOT NULL,
  `dead_relationship` varchar(255) NOT NULL,
  `internment_date` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `date_of_death` varchar(255) NOT NULL,
  `death_cert` varchar(255) NOT NULL,
  `burial_permit` varchar(255) NOT NULL,
  `deed_of_sale` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deceased`
--

INSERT INTO `deceased` (`deceased_id`, `customer_id`, `dead_family_name`, `dead_fname`, `dead_mname`, `dead-gender`, `dead_citizenship`, `dead_civil_status`, `dead_relative`, `dead_relative_surname`, `dead_relationship`, `internment_date`, `date_of_birth`, `date_of_death`, `death_cert`, `burial_permit`, `deed_of_sale`) VALUES
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
-- Table structure for table `tbl_blocks`
--

CREATE TABLE `tbl_blocks` (
  `block_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `block_name` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `total_lots` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blocks`
--

INSERT INTO `tbl_blocks` (`block_id`, `site_id`, `block_name`, `sector`, `total_lots`) VALUES
(1, 1, '1', 'A', '3'),
(2, 1, '2', 'A', '0'),
(3, 1, '3', 'A', '0'),
(4, 1, '1', 'B', '0'),
(5, 1, '2', 'B', '0'),
(6, 1, '3', 'B', '0'),
(7, 2, '1', 'A', '1'),
(8, 2, '2', 'B', '0'),
(9, 2, '2', 'A', '0'),
(10, 2, '1', 'B', '0'),
(11, 1, '1', 'C', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lots`
--

CREATE TABLE `tbl_lots` (
  `lot_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `lot_name` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `lawn_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lots`
--

INSERT INTO `tbl_lots` (`lot_id`, `block_id`, `site_id`, `lot_name`, `sector`, `lawn_type`) VALUES
(1, 1, 1, '1', 'A', 'Premium'),
(2, 1, 1, '2', 'A', 'Premium'),
(3, 1, 1, '3', 'A', 'Premium');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sites`
--

CREATE TABLE `tbl_sites` (
  `site_id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_sqm2` varchar(255) NOT NULL,
  `total_blocks` varchar(255) NOT NULL,
  `total_lots` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sites`
--

INSERT INTO `tbl_sites` (`site_id`, `site_name`, `site_sqm2`, `total_blocks`, `total_lots`) VALUES
(1, 'Love Garden', '50sqm', '7', '3'),
(2, 'Faith Garden', '40sqm', '4', '1'),
(3, 'Hope Garden', '30sqm', '0', '0'),
(4, 'Peace Garden', '60sqm', '0', '0'),
(5, 'Joy Garden', '40sqm', '0', '0'),
(6, 'Meteor Garden', '60sqm', '0', '0');

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
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `deceased`
--
ALTER TABLE `deceased`
  ADD PRIMARY KEY (`deceased_id`);

--
-- Indexes for table `staff_employee`
--
ALTER TABLE `staff_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blocks`
--
ALTER TABLE `tbl_blocks`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `tbl_lots`
--
ALTER TABLE `tbl_lots`
  ADD PRIMARY KEY (`lot_id`);

--
-- Indexes for table `tbl_sites`
--
ALTER TABLE `tbl_sites`
  ADD PRIMARY KEY (`site_id`);

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deceased`
--
ALTER TABLE `deceased`
  MODIFY `deceased_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_employee`
--
ALTER TABLE `staff_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_blocks`
--
ALTER TABLE `tbl_blocks`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_lots`
--
ALTER TABLE `tbl_lots`
  MODIFY `lot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sites`
--
ALTER TABLE `tbl_sites`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
