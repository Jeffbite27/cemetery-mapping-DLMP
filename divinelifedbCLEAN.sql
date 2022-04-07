-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 07:00 PM
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
(1, 'Guinanao', 'Rico', 'Estribo', 'rics', 'Block 14 Lot 76 Majada In', '09854216854', 'guinanaorico@gmail.com', '1999-10-31', 'Male', 'Catholic', 'Filipino', 'Single', 'Self-Employed'),
(2, 'Dano', 'Jeff', 'Bite', 'paa', 'Block 14 Lot 76 Majada In', '09232323232', 'jeffdo19@gmail.com', '2022-04-14', 'Male', 'Catholic', 'Filipino', 'Married', 'Self-Employed');

-- --------------------------------------------------------

--
-- Table structure for table `deceased_persons`
--

CREATE TABLE `deceased_persons` (
  `deceased_id` int(11) NOT NULL,
  `lot_owner_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `dead_family_name` varchar(255) NOT NULL,
  `dead_fname` varchar(255) NOT NULL,
  `dead_mname` varchar(255) NOT NULL,
  `dead_gender` varchar(255) NOT NULL,
  `dead_citizenship` varchar(255) NOT NULL,
  `dead_civil_status` varchar(255) NOT NULL,
  `dead_relative` varchar(255) NOT NULL,
  `dead_relative_surname` varchar(255) NOT NULL,
  `dead_relationship` varchar(255) NOT NULL,
  `internment_date` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `date_of_death` varchar(255) NOT NULL,
  `death_cert` varchar(255) NOT NULL,
  `burial_permit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deceased_persons`
--

INSERT INTO `deceased_persons` (`deceased_id`, `lot_owner_id`, `customer_id`, `site_id`, `block_id`, `lot_id`, `dead_family_name`, `dead_fname`, `dead_mname`, `dead_gender`, `dead_citizenship`, `dead_civil_status`, `dead_relative`, `dead_relative_surname`, `dead_relationship`, `internment_date`, `date_of_birth`, `date_of_death`, `death_cert`, `burial_permit`) VALUES
(1, 2, 2, 1, 1, 2, 'Yeager', 'Eren', 'Tatakae', 'Male', 'Filipino', 'Single', 'Jeff', 'Dano', 'Father', '2022-04-20', '2022-04-21', '2022-04-21', 'Eren_Yeager_1649350636.jpg', 'Eren_Yeager_1649350636.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lot_owners`
--

CREATE TABLE `lot_owners` (
  `lot_owner_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `deed_of_sale` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lot_owners`
--

INSERT INTO `lot_owners` (`lot_owner_id`, `customer_id`, `site_id`, `block_id`, `lot_id`, `deed_of_sale`) VALUES
(1, 1, 1, 1, 3, 'Rico Estribo Guinanao_1649350172.jpg'),
(2, 2, 1, 1, 2, 'Jeff Bite Dano_1649350574.jpg');

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
(1, 1, '1', 'A', '4'),
(2, 1, '2', 'A', '0'),
(3, 1, '3', 'A', '0'),
(4, 1, '4', 'A', '0'),
(5, 1, '5', 'A', '0'),
(6, 1, '6', 'A', '0'),
(7, 1, '7', 'A', '0'),
(8, 1, '8', 'A', '0'),
(9, 1, '9', 'A', '0'),
(10, 1, '10', 'A', '0'),
(11, 1, '11', 'A', '0'),
(12, 1, '12', 'A', '0'),
(13, 1, '13', 'A', '0'),
(14, 1, '14', 'A', '0'),
(15, 1, '15', 'A', '0'),
(16, 1, '16', 'A', '0'),
(17, 1, '17', 'A', '0'),
(18, 1, '18', 'A', '0'),
(19, 1, '19', 'A', '0'),
(20, 1, '20', 'A', '0'),
(21, 1, '21', 'A', '0'),
(22, 1, '22', 'A', '0'),
(23, 1, '23', 'A', '0'),
(24, 1, '24', 'A', '0'),
(25, 1, '25', 'A', '0'),
(26, 1, '26', 'A', '0'),
(27, 1, '27', 'A', '0'),
(28, 1, '28', 'A', '0'),
(29, 1, '29', 'A', '0'),
(30, 1, '30', 'A', '0'),
(31, 1, '31', 'A', '0'),
(32, 1, '32', 'A', '0'),
(33, 1, '33', 'A', '0'),
(34, 1, '34', 'A', '0'),
(35, 1, '35', 'A', '0'),
(36, 1, '36', 'A', '0'),
(37, 1, '37', 'A', '0'),
(38, 1, '38', 'A', '0'),
(39, 1, '39', 'A', '0'),
(40, 1, '40', 'A', '0'),
(41, 1, '41', 'A', '0'),
(42, 1, '42', 'A', '0'),
(43, 1, '43', 'A', '0'),
(44, 1, '44', 'A', '0'),
(45, 1, '45', 'A', '0'),
(46, 1, '46', 'A', '0'),
(47, 1, '47', 'A', '0'),
(48, 1, '48', 'A', '0'),
(49, 1, '49', 'A', '0'),
(50, 1, '50', 'A', '0'),
(51, 1, '51', 'A', '0'),
(52, 1, '52', 'A', '0'),
(53, 1, '53', 'A', '0'),
(54, 1, '54', 'A', '0'),
(55, 1, '55', 'A', '0'),
(56, 1, '56', 'A', '0'),
(57, 1, '57', 'A', '0'),
(58, 1, '58', 'A', '0'),
(59, 1, '59', 'A', '0'),
(60, 1, '60', 'A', '0'),
(61, 1, '61', 'A', '0'),
(62, 1, '62', 'A', '0'),
(63, 1, '63', 'A', '0'),
(64, 1, '64', 'A', '0'),
(65, 1, '65', 'A', '0'),
(66, 1, '66', 'A', '0'),
(67, 1, '67', 'A', '0'),
(68, 1, '68', 'A', '0'),
(69, 1, '69', 'A', '0'),
(70, 1, '70', 'A', '0'),
(71, 1, '71', 'A', '0'),
(72, 1, '72', 'A', '0'),
(73, 1, '73', 'A', '0'),
(74, 1, '74', 'A', '0'),
(75, 1, '75', 'A', '0'),
(76, 1, '76', 'A', '0'),
(77, 1, '77', 'A', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lots`
--

CREATE TABLE `tbl_lots` (
  `lot_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `lot_name` varchar(255) NOT NULL,
  `lawn_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lots`
--

INSERT INTO `tbl_lots` (`lot_id`, `block_id`, `site_id`, `lot_name`, `lawn_type`) VALUES
(1, 1, 1, '1', 'Standard'),
(2, 1, 1, '2', 'Standard'),
(3, 1, 1, '3', 'Standard'),
(4, 1, 1, '4', 'Standard');

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
(1, 'Joy Garden', '50sqm', '77', '4');

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
-- Indexes for table `deceased_persons`
--
ALTER TABLE `deceased_persons`
  ADD PRIMARY KEY (`deceased_id`);

--
-- Indexes for table `lot_owners`
--
ALTER TABLE `lot_owners`
  ADD PRIMARY KEY (`lot_owner_id`);

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deceased_persons`
--
ALTER TABLE `deceased_persons`
  MODIFY `deceased_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lot_owners`
--
ALTER TABLE `lot_owners`
  MODIFY `lot_owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_blocks`
--
ALTER TABLE `tbl_blocks`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_lots`
--
ALTER TABLE `tbl_lots`
  MODIFY `lot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sites`
--
ALTER TABLE `tbl_sites`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
