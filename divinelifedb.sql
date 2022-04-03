-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 04:45 PM
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
(1, 'Guinanao', 'Rico', 'Estribo', 'Rics', 'Block 14 Lot 76 Majada In, Canlubang', '09854216854', 'guinanaorico@gmail.com', '1999-10-31', 'Male', 'Catholic', 'Filipino', 'Single', 'Government Employee'),
(2, 'Dano', 'Jeff', 'Bite', '', 'Cabuyao', '09126546881', 'jeffdo19@gmail.com', '2022-03-21', 'Male', 'Catholic', 'Filipino', 'Single', 'Government Employee'),
(3, 'rtyr', 'tyr', 'Estribo', '', 'Block 14 Lot 76 Majada In', '09126546881', 'guinanaorico@gmail.com', '2022-03-18', 'Male', 'dsf', 'Filipino', 'Single', 'Self-Employed'),
(4, 'Guinanao', 'Ricocgh', 'Estribo', 'fghf', 'Calamba, Laguna', '9542551688', 'estriborics@gmail.com', '2022-03-10', 'Male', 'fgh', 'Filipino', 'Single', 'Private Employee'),
(5, 'Admin', 'CCC', 'Estribo', '', 'Block 14 Lot 76 Majada In', '09126546881', 'admin@ccc.edu.ph', '2022-03-14', 'Male', 'Catholic', 'Filipino', 'Single', 'Self-Employed'),
(7, '123', '123', '123', '123', '123', '09854216854', 'admin@ccc.edu.ph', '2022-02-28', 'Male', '123', '123', 'Single', 'Government Employee');

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
(1, 1, 2, 1, 1, 1, 'Guinanao', 'Rico', 'Estribo', 'Male', 'Filipino', 'Single', 'Jeff', 'Dano', 'Mother', '2022-03-10', '2022-03-25', '2022-03-09', 'Rico_Guinanao_1648478478.jpg', 'Rico_Guinanao_1648478503.jpg'),
(2, 4, 5, 1, 3, 6, 'Brando', 'Dio', 'Bobo', 'Male', 'Filipino', 'Single', 'CCC', 'Admin', 'Father', '2022-03-10', '2022-03-25', '2022-03-30', 'Dio_Brando_1648478521.jpg', 'Dio_Brando_1648478535.jpg'),
(3, 5, 1, 5, 19, 8, 'asd', 'asd', 'asd', 'Male', 'Filipino', 'Single', 'Rico', 'Guinanao', 'Sibling', '2022-03-31', '2022-04-13', '2022-04-17', 'asd_asd_1648984028.jpg', 'asd_asd_1648984028.jpg');

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
(1, 2, 1, 1, 1, 'Jeff_Bite_Dano_1648479475.jpg'),
(2, 2, 1, 2, 2, 'Jeff_Bite_Dano_1648479252.jpg'),
(3, 1, 2, 7, 4, 'Rico_Estribo_Guinanao_1648478924.jpg'),
(4, 5, 1, 3, 6, 'CCC_Estribo_Admin_1648478936.jpg'),
(5, 1, 5, 19, 8, 'Rico Estribo Guinanao_1648983583.jpg');

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
(1, 1, '4', 'C', '2'),
(2, 1, '2', 'A', '1'),
(3, 1, '1', 'A', '2'),
(4, 1, '1', 'B', '0'),
(5, 1, '2', 'B', '0'),
(6, 1, '3', 'B', '0'),
(7, 2, '3', 'A', '1'),
(8, 2, '2', 'B', '0'),
(9, 2, '2', 'A', '0'),
(10, 2, '1', 'B', '0'),
(11, 1, '1', 'C', '0'),
(12, 1, '1', 'D', '0'),
(13, 2, '1', 'D', '0'),
(14, 2, '1', 'C', '0'),
(15, 3, '1', 'A', '0'),
(16, 3, '1', 'B', '0'),
(17, 3, '1', 'C', '0'),
(18, 3, '1', 'D', '0'),
(19, 5, '1', 'A', '2'),
(20, 5, '2', 'B', '0'),
(21, 5, '1', 'D', '0'),
(22, 5, '1', 'C', '0'),
(23, 5, '2', 'A', '0');

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
(2, 2, 1, '1', 'Deluxe'),
(3, 1, 1, '2', 'Standard'),
(4, 7, 2, '1', 'Premium'),
(5, 3, 1, '5', 'Premium'),
(6, 3, 1, '4', 'Premium'),
(7, 19, 5, '2', 'Premium'),
(8, 19, 5, '1', 'Premium');

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
(1, 'Love Garden', '30sqm', '8', '5'),
(2, 'Faith Garden', '40sqm', '6', '1'),
(3, 'Hope Garden', '30sqm', '4', '0'),
(4, 'Peace Garden', '60sqm', '0', '0'),
(5, 'Joy Garden', '40sqm', '5', '2'),
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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deceased_persons`
--
ALTER TABLE `deceased_persons`
  MODIFY `deceased_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lot_owners`
--
ALTER TABLE `lot_owners`
  MODIFY `lot_owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_blocks`
--
ALTER TABLE `tbl_blocks`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_lots`
--
ALTER TABLE `tbl_lots`
  MODIFY `lot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
