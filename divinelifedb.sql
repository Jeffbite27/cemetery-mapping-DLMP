-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 10:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
(1, 'Merk', 'James', 'Falco', 'asd', 'Block 14 Lot 76 Majada In', '09854216854', 'James@gmail.com', '1999-10-31', 'Male', 'Catholic', 'Filipino', 'Single', 'Self-Employed'),
(2, 'Dano', 'Jeff', 'Bite', 'paa', 'Block 14 Lot 76 Majada In', '09232323232', 'jeffdo19@gmail.com', '2022-04-14', 'Male', 'Catholic', 'Filipino', 'Married', 'Self-Employed'),
(3, 'Oladipo', 'Levi', 'Ackerman', '', 'wall maria', '09554642170', 'Levi@gmail.com', '2022-04-06', 'Male', 'Catholic', 'Merleyan', 'Single', 'Private Employee');

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
(1, 2, 2, 1, 1, 2, 'Yeager', 'Eren', 'Tatakae', 'Male', 'Filipino', 'Single', 'Jeff', 'Dano', 'Father', '2022-04-20', '2022-04-21', '2022-04-21', 'Eren_Yeager_1649350636.jpg', 'Eren_Yeager_1649350636.jpg'),
(2, 1, 1, 1, 1, 3, 'Braun', 'Reiner', '', 'Male', 'Filipino', 'Single', 'Rico', 'Guinanao', 'Grandparent', '2022-04-12', '2022-04-19', '2022-04-11', 'Reiner_Braun_1649423530.png', 'Reiner_Braun_1649423530.png'),
(3, 3, 3, 1, 4, 42, 'Oladipo', 'Marco', 'blits', 'Male', 'Filipino', 'Single', 'Levi', 'Oladipo', 'Child', '2022-04-14', '2022-04-06', '2022-04-17', 'Marco_Oladipo_1649722440.png', 'Marco_Oladipo_1649722440.png');

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
(2, 2, 1, 1, 2, 'Jeff Bite Dano_1649350574.jpg'),
(3, 3, 1, 4, 42, 'Levi Ackerman Oladipo_1649722384.png'),
(4, 1, 1, 1, 6, 'James Falco Merk_1649812918.png');

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(50) NOT NULL,
  `news_subtitle` varchar(50) NOT NULL,
  `news_description` varchar(250) NOT NULL,
  `news_date` varchar(150) NOT NULL,
  `news_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`news_id`, `news_title`, `news_subtitle`, `news_description`, `news_date`, `news_img`) VALUES
(1, 'asdsad', 'xzczxc', '2022-04-05', '0', '1649831782.'),
(2, 'ddasd', 'sadas', '2022-04-05', '0', '1649831803.'),
(3, 'fsaaddas', 'dasdasd', 'zxcxzccvfgbvbc', '2022', '1649831935.'),
(4, 'xzczx', 'czxczxc', 'xczzxczxczxc', '2022', '1649832022.'),
(5, 'czx', 'xzc', 'asd', '2022', '1649832225.'),
(6, 'wqeqwe', 'zxczxc', 'zxcxzc', '2022', '1649832651.'),
(7, 'dadasdasd', 'asdasdas', 'gdfhgffghj', '2022', '1649832709.'),
(8, 'cxzczx', 'czxc', 'sadasd', '2022', '1649832774.'),
(9, 'asd', 'asd', 'vv', '2022', '1649832788.'),
(10, 'asdsad', 'asdasd', 'asdasd', '2022', '1649833420.'),
(11, 'zcx', 'das', 'qwe', '2022', '1649833577.'),
(12, 'xcz', 'rty', 'fgh', '2022-04-14', '1649833651.'),
(13, 'rty', 'gfh', 'bnmvbn', '2022-04-12', '1649835834.'),
(14, 'asd', 'cc', 'vbnfgh', '2022-04-05', '1649838292.'),
(15, 'zxc', 'dfsad', 'dd', '2022-04-11', '1649838307.');

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
(1, 1, '1', 'A', '6'),
(2, 1, '2', 'A', '6'),
(3, 1, '3', 'A', '14'),
(4, 1, '4', 'A', '16'),
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
(20, 1, '20', 'A', '16'),
(21, 1, '21', 'A', '0'),
(22, 1, '22', 'A', '0'),
(23, 1, '23', 'A', '18'),
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
(77, 1, '77', 'A', '0'),
(78, 1, '5', 'C', '0');

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
(4, 1, 1, '4', 'Standard'),
(5, 1, 1, '5', 'Standard'),
(6, 1, 1, '6', 'Standard'),
(7, 2, 1, '1', 'Deluxe'),
(8, 2, 1, '2', 'Deluxe'),
(9, 2, 1, '3', 'Deluxe'),
(10, 2, 1, '4', 'Deluxe'),
(11, 2, 1, '5', 'Deluxe'),
(12, 2, 1, '6', 'Deluxe'),
(13, 3, 1, '1', 'Deluxe'),
(14, 3, 1, '2', 'Deluxe'),
(15, 3, 1, '3', 'Deluxe'),
(16, 3, 1, '4', 'Deluxe'),
(17, 3, 1, '5', 'Deluxe'),
(18, 3, 1, '6', 'Deluxe'),
(19, 3, 1, '7', 'Deluxe'),
(20, 3, 1, '8', 'Deluxe'),
(21, 3, 1, '9', 'Deluxe'),
(22, 3, 1, '10', 'Deluxe'),
(23, 3, 1, '11', 'Deluxe'),
(24, 3, 1, '12', 'Deluxe'),
(25, 3, 1, '13', 'Deluxe'),
(26, 3, 1, '14', 'Deluxe'),
(27, 4, 1, '1', 'Deluxe'),
(28, 4, 1, '2', 'Deluxe'),
(29, 4, 1, '3', 'Deluxe'),
(30, 4, 1, '4', 'Deluxe'),
(31, 4, 1, '5', 'Deluxe'),
(32, 4, 1, '6', 'Deluxe'),
(33, 4, 1, '7', 'Deluxe'),
(34, 4, 1, '8', 'Deluxe'),
(35, 4, 1, '9', 'Deluxe'),
(36, 4, 1, '10', 'Deluxe'),
(37, 4, 1, '11', 'Deluxe'),
(38, 4, 1, '12', 'Deluxe'),
(39, 4, 1, '13', 'Deluxe'),
(40, 4, 1, '14', 'Deluxe'),
(41, 4, 1, '15', 'Deluxe'),
(42, 4, 1, '16', 'Deluxe'),
(43, 5, 1, '1', 'Deluxe'),
(44, 5, 1, '2', 'Deluxe'),
(45, 5, 1, '3', 'Deluxe'),
(46, 5, 1, '4', 'Deluxe'),
(47, 5, 1, '5', 'Deluxe'),
(48, 5, 1, '6', 'Deluxe'),
(49, 5, 1, '7', 'Deluxe'),
(50, 5, 1, '8', 'Deluxe'),
(51, 5, 1, '9', 'Deluxe'),
(52, 5, 1, '10', 'Deluxe'),
(53, 5, 1, '11', 'Deluxe'),
(54, 5, 1, '12', 'Deluxe'),
(55, 5, 1, '13', 'Deluxe'),
(56, 5, 1, '14', 'Deluxe'),
(57, 5, 1, '15', 'Deluxe'),
(58, 5, 1, '16', 'Deluxe'),
(59, 6, 1, '1', 'Deluxe'),
(60, 6, 1, '2', 'Deluxe'),
(61, 6, 1, '3', 'Deluxe'),
(62, 6, 1, '4', 'Deluxe'),
(63, 6, 1, '5', 'Deluxe'),
(64, 6, 1, '6', 'Deluxe'),
(65, 6, 1, '7', 'Deluxe'),
(66, 6, 1, '8', 'Deluxe'),
(67, 6, 1, '9', 'Deluxe'),
(68, 6, 1, '10', 'Deluxe'),
(69, 6, 1, '11', 'Deluxe'),
(70, 6, 1, '12', 'Deluxe'),
(71, 6, 1, '13', 'Deluxe'),
(72, 6, 1, '14', 'Deluxe'),
(73, 6, 1, '15', 'Deluxe'),
(74, 6, 1, '16', 'Deluxe'),
(75, 7, 1, '1', 'Deluxe'),
(76, 7, 1, '2', 'Deluxe'),
(77, 7, 1, '3', 'Deluxe'),
(78, 7, 1, '4', 'Deluxe'),
(79, 7, 1, '5', 'Deluxe'),
(80, 7, 1, '6', 'Deluxe'),
(81, 7, 1, '7', 'Deluxe'),
(82, 7, 1, '8', 'Deluxe'),
(83, 7, 1, '9', 'Deluxe'),
(84, 7, 1, '10', 'Deluxe'),
(85, 7, 1, '11', 'Deluxe'),
(86, 7, 1, '12', 'Deluxe'),
(87, 7, 1, '13', 'Deluxe'),
(88, 7, 1, '14', 'Deluxe'),
(89, 7, 1, '15', 'Deluxe'),
(90, 7, 1, '16', 'Deluxe'),
(91, 8, 1, '1', 'Deluxe'),
(92, 8, 1, '2', 'Deluxe'),
(93, 8, 1, '3', 'Deluxe'),
(94, 8, 1, '4', 'Deluxe'),
(95, 8, 1, '8', 'Deluxe'),
(96, 9, 1, '1', 'Premium'),
(97, 9, 1, '2', 'Premium'),
(98, 9, 1, '3', 'Premium'),
(99, 9, 1, '4', 'Premium'),
(100, 9, 1, '5', 'Premium'),
(101, 9, 1, '6', 'Premium'),
(102, 9, 1, '7', 'Premium'),
(103, 10, 1, '1', 'Premium'),
(104, 10, 1, '2', 'Premium'),
(105, 10, 1, '3', 'Premium'),
(106, 10, 1, '4', 'Premium'),
(107, 10, 1, '5', 'Premium'),
(108, 10, 1, '6', 'Premium'),
(109, 10, 1, '7', 'Premium'),
(110, 10, 1, '8', 'Premium'),
(111, 11, 1, '1', 'Premium'),
(112, 11, 1, '2', 'Premium'),
(113, 11, 1, '3', 'Premium'),
(114, 11, 1, '4', 'Premium'),
(115, 11, 1, '5', 'Premium'),
(116, 11, 1, '6', 'Premium'),
(117, 11, 1, '7', 'Premium'),
(118, 11, 1, '8', 'Premium'),
(119, 12, 1, '1', 'Premium'),
(120, 12, 1, '2', 'Premium'),
(121, 12, 1, '3', 'Premium'),
(122, 12, 1, '4', 'Premium'),
(123, 12, 1, '5', 'Premium'),
(124, 12, 1, '6', 'Premium'),
(125, 12, 1, '7', 'Premium'),
(126, 12, 1, '8', 'Premium'),
(127, 13, 1, '1', 'Premium'),
(128, 13, 1, '2', 'Premium'),
(129, 13, 1, '3', 'Premium'),
(130, 13, 1, '4', 'Premium'),
(131, 13, 1, '5', 'Premium'),
(132, 13, 1, '6', 'Premium'),
(133, 13, 1, '7', 'Premium'),
(134, 14, 1, '1', 'Standard'),
(135, 14, 1, '2', 'Standard'),
(136, 14, 1, '3', 'Standard'),
(137, 14, 1, '4', 'Standard'),
(138, 15, 1, '1', 'Deluxe'),
(139, 15, 1, '2', 'Deluxe'),
(140, 15, 1, '3', 'Deluxe'),
(141, 15, 1, '4', 'Deluxe'),
(142, 15, 1, '5', 'Deluxe'),
(143, 15, 1, '6', 'Deluxe'),
(144, 15, 1, '7', 'Deluxe'),
(145, 16, 1, '1', 'Premium'),
(146, 16, 1, '2', 'Premium'),
(147, 16, 1, '3', 'Premium'),
(148, 16, 1, '4', 'Premium'),
(149, 16, 1, '5', 'Premium'),
(150, 16, 1, '6', 'Premium'),
(151, 16, 1, '7', 'Premium'),
(152, 16, 1, '8', 'Premium'),
(153, 16, 1, '9', 'Premium'),
(154, 16, 1, '10', 'Premium'),
(155, 16, 1, '11', 'Premium'),
(156, 16, 1, '12', 'Premium'),
(157, 16, 1, '13', 'Premium'),
(158, 16, 1, '14', 'Premium'),
(159, 16, 1, '15', 'Premium'),
(160, 16, 1, '16', 'Premium'),
(161, 17, 1, '1', 'Premium'),
(162, 17, 1, '2', 'Premium'),
(163, 17, 1, '3', 'Premium'),
(164, 17, 1, '4', 'Premium'),
(165, 17, 1, '5', 'Premium'),
(166, 17, 1, '6', 'Premium'),
(167, 17, 1, '7', 'Premium'),
(168, 17, 1, '8', 'Premium'),
(169, 17, 1, '9', 'Premium'),
(170, 17, 1, '10', 'Premium'),
(171, 17, 1, '11', 'Premium'),
(172, 17, 1, '12', 'Premium'),
(173, 17, 1, '13', 'Premium'),
(174, 17, 1, '14', 'Premium'),
(175, 17, 1, '15', 'Premium'),
(176, 17, 1, '16', 'Premium'),
(177, 18, 1, '1', 'Premium'),
(178, 18, 1, '2', 'Premium'),
(179, 18, 1, '3', 'Premium'),
(180, 18, 1, '4', 'Premium'),
(181, 18, 1, '5', 'Premium'),
(182, 18, 1, '6', 'Premium'),
(183, 18, 1, '7', 'Premium'),
(184, 18, 1, '8', 'Premium'),
(185, 18, 1, '9', 'Premium'),
(186, 18, 1, '10', 'Premium'),
(187, 18, 1, '11', 'Premium'),
(188, 18, 1, '12', 'Premium'),
(189, 18, 1, '13', 'Premium'),
(190, 18, 1, '14', 'Premium'),
(191, 18, 1, '15', 'Premium'),
(192, 18, 1, '16', 'Premium'),
(193, 19, 1, '1', 'Premium'),
(194, 19, 1, '2', 'Premium'),
(195, 19, 1, '3', 'Premium'),
(196, 19, 1, '4', 'Premium'),
(197, 19, 1, '5', 'Premium'),
(198, 19, 1, '6', 'Premium'),
(199, 19, 1, '7', 'Premium'),
(200, 19, 1, '8', 'Premium'),
(201, 19, 1, '9', 'Premium'),
(202, 19, 1, '10', 'Premium'),
(203, 19, 1, '11', 'Premium'),
(204, 19, 1, '12', 'Premium'),
(205, 19, 1, '13', 'Premium'),
(206, 19, 1, '14', 'Premium'),
(207, 19, 1, '15', 'Premium'),
(208, 19, 1, '16', 'Premium'),
(209, 20, 1, '1', 'Premium'),
(210, 20, 1, '2', 'Premium'),
(211, 20, 1, '3', 'Premium'),
(212, 20, 1, '4', 'Premium'),
(213, 20, 1, '5', 'Premium'),
(214, 20, 1, '6', 'Premium'),
(215, 20, 1, '7', 'Premium'),
(216, 20, 1, '8', 'Premium'),
(217, 20, 1, '9', 'Premium'),
(218, 20, 1, '10', 'Premium'),
(219, 20, 1, '11', 'Premium'),
(220, 20, 1, '12', 'Premium'),
(221, 20, 1, '13', 'Premium'),
(222, 20, 1, '14', 'Premium'),
(223, 20, 1, '15', 'Premium'),
(224, 21, 1, '1', 'Deluxe'),
(225, 21, 1, '2', 'Deluxe'),
(226, 21, 1, '3', 'Deluxe'),
(227, 21, 1, '4', 'Deluxe'),
(228, 21, 1, '8', 'Deluxe'),
(229, 21, 1, '16', 'Deluxe'),
(230, 22, 1, '1', 'Deluxe'),
(231, 22, 1, '2', 'Deluxe'),
(232, 22, 1, '3', 'Deluxe'),
(233, 22, 1, '4', 'Deluxe'),
(234, 22, 1, '9', 'Deluxe'),
(235, 22, 1, '18', 'Deluxe'),
(236, 23, 1, '1', 'Premium'),
(237, 23, 1, '2', 'Premium'),
(238, 23, 1, '3', 'Premium'),
(239, 23, 1, '4', 'Premium'),
(240, 23, 1, '5', 'Premium'),
(241, 23, 1, '6', 'Premium'),
(242, 23, 1, '7', 'Premium'),
(243, 23, 1, '8', 'Premium'),
(244, 23, 1, '9', 'Premium'),
(245, 23, 1, '10', 'Premium'),
(246, 23, 1, '11', 'Premium'),
(247, 23, 1, '12', 'Premium'),
(248, 23, 1, '13', 'Premium'),
(249, 23, 1, '14', 'Premium'),
(250, 23, 1, '15', 'Premium'),
(251, 23, 1, '16', 'Premium'),
(252, 23, 1, '17', 'Premium'),
(253, 24, 1, '1', 'Premium'),
(254, 24, 1, '2', 'Premium'),
(255, 24, 1, '3', 'Premium'),
(256, 24, 1, '4', 'Premium'),
(257, 24, 1, '5', 'Premium'),
(258, 24, 1, '6', 'Premium'),
(259, 24, 1, '7', 'Premium'),
(260, 24, 1, '8', 'Premium'),
(261, 24, 1, '9', 'Premium'),
(262, 24, 1, '10', 'Premium'),
(263, 24, 1, '11', 'Premium'),
(264, 24, 1, '12', 'Premium'),
(265, 24, 1, '13', 'Premium'),
(266, 24, 1, '14', 'Premium'),
(267, 24, 1, '15', 'Premium'),
(268, 24, 1, '16', 'Premium'),
(269, 25, 1, '1', 'Premium'),
(270, 25, 1, '2', 'Premium'),
(271, 25, 1, '3', 'Premium'),
(272, 25, 1, '4', 'Premium'),
(273, 25, 1, '5', 'Premium'),
(274, 25, 1, '6', 'Premium'),
(275, 25, 1, '7', 'Premium'),
(276, 25, 1, '8', 'Premium'),
(277, 25, 1, '9', 'Premium'),
(278, 25, 1, '10', 'Premium'),
(279, 25, 1, '11', 'Premium'),
(280, 25, 1, '12', 'Premium'),
(281, 25, 1, '13', 'Premium'),
(282, 25, 1, '14', 'Premium'),
(283, 25, 1, '15', 'Premium'),
(284, 25, 1, '16', 'Premium'),
(285, 26, 1, '1', 'Premium'),
(286, 26, 1, '2', 'Premium'),
(287, 26, 1, '3', 'Premium'),
(288, 26, 1, '4', 'Premium'),
(289, 26, 1, '5', 'Premium'),
(290, 26, 1, '6', 'Premium'),
(291, 26, 1, '7', 'Premium'),
(292, 26, 1, '8', 'Premium'),
(293, 26, 1, '9', 'Premium'),
(294, 26, 1, '10', 'Premium'),
(295, 26, 1, '11', 'Premium'),
(296, 26, 1, '12', 'Premium'),
(297, 26, 1, '13', 'Premium'),
(298, 26, 1, '14', 'Premium'),
(299, 27, 1, '1', 'Premium'),
(300, 27, 1, '2', 'Premium'),
(301, 27, 1, '3', 'Premium'),
(302, 27, 1, '4', 'Premium'),
(303, 27, 1, '5', 'Premium'),
(304, 27, 1, '6', 'Premium'),
(305, 27, 1, '7', 'Premium'),
(306, 27, 1, '8', 'Premium'),
(307, 27, 1, '9', 'Premium'),
(308, 27, 1, '10', 'Premium'),
(309, 27, 1, '11', 'Premium'),
(310, 27, 1, '12', 'Premium'),
(311, 27, 1, '13', 'Premium'),
(312, 27, 1, '14', 'Premium'),
(313, 27, 1, '15', 'Premium'),
(314, 27, 1, '16', 'Premium'),
(315, 27, 1, '17', 'Premium'),
(316, 28, 1, '1', 'Deluxe'),
(317, 28, 1, '2', 'Deluxe'),
(318, 28, 1, '3', 'Deluxe'),
(319, 28, 1, '4', 'Deluxe'),
(320, 29, 1, '1', 'Standard'),
(321, 29, 1, '2', 'Standard'),
(322, 29, 1, '3', 'Standard'),
(323, 29, 1, '4', 'Standard'),
(324, 30, 1, '1', 'Standard'),
(325, 30, 1, '2', 'Standard'),
(326, 30, 1, '3', 'Standard'),
(327, 30, 1, '4', 'Standard'),
(328, 31, 1, '1', 'Deluxe'),
(329, 31, 1, '2', 'Deluxe'),
(330, 31, 1, '3', 'Deluxe'),
(331, 31, 1, '4', 'Deluxe'),
(332, 32, 1, '1', 'Premium'),
(333, 32, 1, '2', 'Premium'),
(334, 32, 1, '3', 'Premium'),
(335, 32, 1, '4', 'Premium'),
(336, 32, 1, '5', 'Premium'),
(337, 32, 1, '6', 'Premium'),
(338, 32, 1, '7', 'Premium'),
(339, 32, 1, '8', 'Premium'),
(340, 32, 1, '9', 'Premium'),
(341, 32, 1, '10', 'Premium'),
(342, 32, 1, '11', 'Premium'),
(343, 32, 1, '12', 'Premium'),
(344, 32, 1, '13', 'Premium'),
(345, 32, 1, '14', 'Premium'),
(346, 32, 1, '15', 'Premium'),
(347, 32, 1, '16', 'Premium'),
(348, 32, 1, '17', 'Premium'),
(349, 32, 1, '18', 'Premium'),
(350, 33, 1, '1', 'Premium'),
(351, 33, 1, '2', 'Premium'),
(352, 33, 1, '3', 'Premium'),
(353, 33, 1, '4', 'Premium'),
(354, 33, 1, '5', 'Premium'),
(355, 33, 1, '6', 'Premium'),
(356, 33, 1, '7', 'Premium'),
(357, 33, 1, '8', 'Premium'),
(358, 33, 1, '9', 'Premium'),
(359, 33, 1, '10', 'Premium'),
(360, 33, 1, '11', 'Premium'),
(361, 33, 1, '12', 'Premium'),
(362, 33, 1, '13', 'Premium'),
(363, 33, 1, '14', 'Premium'),
(364, 33, 1, '15', 'Premium'),
(365, 33, 1, '16', 'Premium'),
(366, 34, 1, '1', 'Premium'),
(367, 34, 1, '2', 'Premium'),
(368, 34, 1, '3', 'Premium'),
(369, 34, 1, '4', 'Premium'),
(370, 34, 1, '5', 'Premium'),
(371, 34, 1, '6', 'Premium'),
(372, 34, 1, '7', 'Premium'),
(373, 34, 1, '8', 'Premium'),
(374, 34, 1, '9', 'Premium'),
(375, 34, 1, '10', 'Premium'),
(376, 34, 1, '11', 'Premium'),
(377, 34, 1, '12', 'Premium'),
(378, 34, 1, '13', 'Premium'),
(379, 34, 1, '14', 'Premium'),
(380, 34, 1, '15', 'Premium'),
(381, 34, 1, '16', 'Premium'),
(382, 35, 1, '1', 'Premium'),
(383, 35, 1, '2', 'Premium'),
(384, 35, 1, '3', 'Premium'),
(385, 35, 1, '4', 'Premium'),
(386, 35, 1, '5', 'Premium'),
(387, 35, 1, '6', 'Premium'),
(388, 35, 1, '7', 'Premium'),
(389, 35, 1, '8', 'Premium'),
(390, 35, 1, '9', 'Premium'),
(391, 35, 1, '10', 'Premium'),
(392, 35, 1, '11', 'Premium'),
(393, 35, 1, '12', 'Premium'),
(394, 35, 1, '13', 'Premium'),
(395, 35, 1, '14', 'Premium'),
(396, 35, 1, '15', 'Premium'),
(397, 35, 1, '16', 'Premium'),
(398, 36, 1, '1', 'Premium'),
(399, 36, 1, '2', 'Premium'),
(400, 36, 1, '3', 'Premium'),
(401, 36, 1, '4', 'Premium'),
(402, 36, 1, '5', 'Premium'),
(403, 36, 1, '6', 'Premium'),
(404, 36, 1, '7', 'Premium'),
(405, 36, 1, '8', 'Premium'),
(406, 36, 1, '9', 'Premium'),
(407, 36, 1, '10', 'Premium'),
(408, 36, 1, '11', 'Premium'),
(409, 36, 1, '12', 'Premium'),
(410, 36, 1, '13', 'Premium'),
(411, 36, 1, '14', 'Premium'),
(412, 36, 1, '15', 'Premium'),
(413, 36, 1, '16', 'Premium'),
(414, 37, 1, '1', 'Deluxe'),
(415, 37, 1, '2', 'Deluxe'),
(416, 37, 1, '3', 'Deluxe'),
(417, 37, 1, '4', 'Deluxe'),
(418, 38, 1, '1', 'Deluxe'),
(419, 38, 1, '2', 'Deluxe'),
(420, 38, 1, '3', 'Deluxe'),
(421, 38, 1, '4', 'Deluxe'),
(422, 39, 1, '1', 'Premium'),
(423, 39, 1, '2', 'Premium'),
(424, 39, 1, '3', 'Premium'),
(425, 39, 1, '4', 'Premium'),
(426, 39, 1, '5', 'Premium'),
(427, 39, 1, '6', 'Premium'),
(428, 39, 1, '7', 'Premium'),
(429, 39, 1, '8', 'Premium'),
(430, 39, 1, '9', 'Premium'),
(431, 39, 1, '10', 'Premium'),
(432, 39, 1, '11', 'Premium'),
(433, 39, 1, '12', 'Premium'),
(434, 39, 1, '13', 'Premium'),
(435, 39, 1, '14', 'Premium'),
(436, 39, 1, '15', 'Premium'),
(437, 39, 1, '16', 'Premium'),
(438, 40, 1, '1', 'Premium'),
(439, 40, 1, '2', 'Premium'),
(440, 40, 1, '3', 'Premium'),
(441, 40, 1, '4', 'Premium'),
(442, 40, 1, '5', 'Premium'),
(443, 40, 1, '6', 'Premium'),
(444, 40, 1, '7', 'Premium'),
(445, 40, 1, '8', 'Premium'),
(446, 40, 1, '9', 'Premium'),
(447, 40, 1, '10', 'Premium'),
(448, 40, 1, '11', 'Premium'),
(449, 40, 1, '12', 'Premium'),
(450, 40, 1, '13', 'Premium'),
(451, 40, 1, '14', 'Premium'),
(452, 40, 1, '15', 'Premium'),
(453, 40, 1, '16', 'Premium'),
(454, 41, 1, '1', 'Premium'),
(455, 41, 1, '2', 'Premium'),
(456, 41, 1, '3', 'Premium'),
(457, 41, 1, '4', 'Premium'),
(458, 41, 1, '5', 'Premium'),
(459, 41, 1, '6', 'Premium'),
(460, 41, 1, '7', 'Premium'),
(461, 41, 1, '8', 'Premium'),
(462, 41, 1, '9', 'Premium'),
(463, 41, 1, '10', 'Premium'),
(464, 41, 1, '11', 'Premium'),
(465, 41, 1, '12', 'Premium'),
(466, 41, 1, '13', 'Premium'),
(467, 41, 1, '14', 'Premium'),
(468, 41, 1, '15', 'Premium'),
(469, 41, 1, '16', 'Premium'),
(470, 42, 1, '1', 'Premium'),
(471, 42, 1, '2', 'Premium'),
(472, 42, 1, '3', 'Premium'),
(473, 42, 1, '4', 'Premium'),
(474, 42, 1, '5', 'Premium'),
(475, 42, 1, '6', 'Premium'),
(476, 42, 1, '7', 'Premium'),
(477, 42, 1, '8', 'Premium'),
(478, 42, 1, '9', 'Premium'),
(479, 42, 1, '10', 'Premium'),
(480, 42, 1, '11', 'Premium'),
(481, 42, 1, '12', 'Premium'),
(482, 42, 1, '13', 'Premium'),
(483, 42, 1, '14', 'Premium'),
(484, 42, 1, '15', 'Premium'),
(485, 42, 1, '16', 'Premium'),
(486, 43, 1, '1', 'Premium'),
(487, 43, 1, '2', 'Premium'),
(488, 43, 1, '3', 'Premium'),
(489, 43, 1, '4', 'Premium'),
(490, 43, 1, '5', 'Premium'),
(491, 43, 1, '6', 'Premium'),
(492, 43, 1, '7', 'Premium'),
(493, 43, 1, '8', 'Premium'),
(494, 43, 1, '9', 'Premium'),
(495, 43, 1, '10', 'Premium'),
(496, 43, 1, '11', 'Premium'),
(497, 43, 1, '12', 'Premium'),
(498, 43, 1, '13', 'Premium'),
(499, 43, 1, '14', 'Premium'),
(500, 43, 1, '15', 'Premium'),
(501, 43, 1, '16', 'Premium'),
(502, 43, 1, '17', 'Premium'),
(503, 43, 1, '18', 'Premium'),
(504, 43, 1, '19', 'Premium'),
(505, 43, 1, '20', 'Premium'),
(506, 44, 1, '1', 'Deluxe'),
(507, 44, 1, '2', 'Deluxe'),
(508, 44, 1, '3', 'Deluxe'),
(509, 44, 1, '4', 'Deluxe'),
(510, 45, 1, '1', 'Standard'),
(511, 45, 1, '2', 'Standard'),
(512, 45, 1, '3', 'Standard'),
(513, 45, 1, '4', 'Standard'),
(514, 46, 1, '1', 'Standard'),
(515, 46, 1, '2', 'Standard'),
(516, 46, 1, '3', 'Standard'),
(517, 46, 1, '4', 'Standard'),
(518, 47, 1, '1', 'Deluxe'),
(519, 47, 1, '2', 'Deluxe'),
(520, 47, 1, '3', 'Deluxe'),
(521, 47, 1, '4', 'Deluxe'),
(522, 48, 1, '1', 'Premium'),
(523, 48, 1, '2', 'Premium'),
(524, 48, 1, '3', 'Premium'),
(525, 48, 1, '4', 'Premium'),
(526, 48, 1, '5', 'Premium'),
(532, 49, 1, '1', 'Premium'),
(533, 49, 1, '2', 'Premium'),
(534, 49, 1, '3', 'Premium'),
(535, 49, 1, '4', 'Premium'),
(536, 49, 1, '5', 'Premium'),
(537, 49, 1, '6', 'Premium'),
(538, 49, 1, '7', 'Premium'),
(539, 49, 1, '8', 'Premium'),
(540, 49, 1, '9', 'Premium'),
(541, 49, 1, '10', 'Premium'),
(542, 49, 1, '11', 'Premium'),
(543, 49, 1, '12', 'Premium'),
(544, 49, 1, '13', 'Premium'),
(545, 49, 1, '14', 'Premium'),
(546, 49, 1, '15', 'Premium'),
(547, 49, 1, '16', 'Premium'),
(548, 50, 1, '1', 'Premium'),
(549, 50, 1, '2', 'Premium'),
(550, 50, 1, '3', 'Premium'),
(551, 50, 1, '4', 'Premium'),
(552, 50, 1, '5', 'Premium'),
(553, 50, 1, '6', 'Premium'),
(554, 50, 1, '7', 'Premium'),
(555, 50, 1, '8', 'Premium'),
(556, 50, 1, '9', 'Premium'),
(557, 50, 1, '10', 'Premium'),
(558, 50, 1, '11', 'Premium'),
(559, 50, 1, '12', 'Premium'),
(560, 50, 1, '13', 'Premium'),
(561, 50, 1, '14', 'Premium'),
(562, 50, 1, '15', 'Premium'),
(563, 50, 1, '16', 'Premium'),
(564, 51, 1, '1', 'Premium'),
(565, 51, 1, '2', 'Premium'),
(566, 51, 1, '3', 'Premium'),
(567, 51, 1, '4', 'Premium'),
(568, 51, 1, '5', 'Premium'),
(569, 51, 1, '6', 'Premium'),
(570, 51, 1, '7', 'Premium'),
(571, 51, 1, '8', 'Premium'),
(572, 51, 1, '9', 'Premium'),
(573, 51, 1, '10', 'Premium'),
(574, 51, 1, '11', 'Premium'),
(575, 51, 1, '12', 'Premium'),
(576, 51, 1, '13', 'Premium'),
(577, 51, 1, '14', 'Premium'),
(578, 51, 1, '15', 'Premium'),
(579, 51, 1, '16', 'Premium'),
(580, 52, 1, '1', 'Premium'),
(581, 52, 1, '2', 'Premium'),
(582, 52, 1, '3', 'Premium'),
(583, 52, 1, '4', 'Premium'),
(584, 52, 1, '5', 'Premium'),
(585, 52, 1, '6', 'Premium'),
(586, 52, 1, '7', 'Premium'),
(587, 52, 1, '8', 'Premium'),
(588, 52, 1, '9', 'Premium'),
(589, 52, 1, '10', 'Premium'),
(590, 52, 1, '11', 'Premium'),
(591, 52, 1, '12', 'Premium'),
(592, 52, 1, '13', 'Premium'),
(593, 52, 1, '14', 'Premium'),
(594, 52, 1, '15', 'Premium'),
(595, 52, 1, '16', 'Premium'),
(596, 53, 1, '1', 'Premium'),
(597, 53, 1, '2', 'Premium'),
(598, 53, 1, '3', 'Premium'),
(599, 53, 1, '4', 'Premium'),
(600, 53, 1, '5', 'Premium'),
(601, 53, 1, '6', 'Premium'),
(602, 53, 1, '7', 'Premium'),
(603, 53, 1, '8', 'Premium'),
(604, 53, 1, '9', 'Premium'),
(605, 53, 1, '10', 'Premium'),
(606, 53, 1, '11', 'Premium'),
(607, 53, 1, '12', 'Premium'),
(608, 53, 1, '13', 'Premium'),
(609, 53, 1, '14', 'Premium'),
(610, 53, 1, '15', 'Premium'),
(611, 53, 1, '16', 'Premium'),
(612, 54, 1, '1', 'Premium'),
(613, 54, 1, '2', 'Premium'),
(614, 54, 1, '3', 'Premium'),
(615, 54, 1, '4', 'Premium'),
(616, 55, 1, '1', 'Premium'),
(617, 55, 1, '2', 'Premium'),
(618, 55, 1, '3', 'Premium'),
(619, 55, 1, '4', 'Premium'),
(620, 56, 1, '1', 'Premium'),
(621, 56, 1, '2', 'Premium'),
(622, 56, 1, '3', 'Premium'),
(623, 56, 1, '4', 'Premium'),
(624, 56, 1, '5', 'Premium'),
(625, 56, 1, '6', 'Premium'),
(626, 56, 1, '7', 'Premium'),
(627, 56, 1, '8', 'Premium'),
(628, 56, 1, '9', 'Premium'),
(629, 56, 1, '10', 'Premium'),
(630, 56, 1, '11', 'Premium'),
(631, 56, 1, '12', 'Premium'),
(632, 56, 1, '13', 'Premium'),
(633, 56, 1, '14', 'Premium'),
(634, 56, 1, '15', 'Premium'),
(635, 56, 1, '16', 'Premium'),
(636, 57, 1, '1', 'Premium'),
(637, 57, 1, '2', 'Premium'),
(638, 57, 1, '3', 'Premium'),
(639, 57, 1, '4', 'Premium'),
(640, 57, 1, '5', 'Premium'),
(641, 57, 1, '6', 'Premium'),
(642, 57, 1, '7', 'Premium'),
(643, 57, 1, '8', 'Premium'),
(644, 57, 1, '9', 'Premium'),
(645, 57, 1, '10', 'Premium'),
(646, 57, 1, '11', 'Premium'),
(647, 57, 1, '12', 'Premium'),
(648, 57, 1, '13', 'Premium'),
(649, 57, 1, '14', 'Premium'),
(650, 57, 1, '15', 'Premium'),
(651, 57, 1, '16', 'Premium'),
(652, 58, 1, '1', 'Premium'),
(653, 58, 1, '2', 'Premium'),
(654, 58, 1, '3', 'Premium'),
(655, 58, 1, '4', 'Premium'),
(656, 58, 1, '5', 'Premium'),
(657, 58, 1, '6', 'Premium'),
(658, 58, 1, '7', 'Premium'),
(659, 58, 1, '8', 'Premium'),
(660, 58, 1, '9', 'Premium'),
(661, 58, 1, '10', 'Premium'),
(662, 58, 1, '11', 'Premium'),
(663, 58, 1, '12', 'Premium'),
(664, 58, 1, '13', 'Premium'),
(665, 58, 1, '14', 'Premium'),
(666, 58, 1, '15', 'Premium'),
(667, 58, 1, '16', 'Premium'),
(668, 59, 1, '1', 'Premium'),
(669, 59, 1, '2', 'Premium'),
(670, 59, 1, '3', 'Premium'),
(671, 59, 1, '4', 'Premium'),
(672, 59, 1, '5', 'Premium'),
(673, 59, 1, '6', 'Premium'),
(674, 59, 1, '7', 'Premium'),
(675, 59, 1, '8', 'Premium'),
(676, 59, 1, '9', 'Premium'),
(677, 59, 1, '10', 'Premium'),
(678, 59, 1, '11', 'Premium'),
(679, 59, 1, '12', 'Premium'),
(680, 59, 1, '13', 'Premium'),
(681, 59, 1, '14', 'Premium'),
(682, 59, 1, '15', 'Premium'),
(683, 59, 1, '16', 'Premium'),
(684, 60, 1, '1', 'Premium'),
(685, 60, 1, '2', 'Premium'),
(686, 60, 1, '3', 'Premium'),
(687, 60, 1, '4', 'Premium'),
(688, 60, 1, '5', 'Premium'),
(689, 60, 1, '6', 'Premium'),
(690, 60, 1, '7', 'Premium'),
(691, 60, 1, '8', 'Premium'),
(692, 60, 1, '9', 'Premium'),
(693, 60, 1, '10', 'Premium'),
(694, 60, 1, '11', 'Premium'),
(695, 60, 1, '12', 'Premium'),
(696, 60, 1, '13', 'Premium'),
(697, 60, 1, '14', 'Premium'),
(698, 60, 1, '15', 'Premium'),
(699, 60, 1, '16', 'Premium'),
(700, 61, 1, '1', 'Premium'),
(701, 61, 1, '2', 'Premium'),
(702, 61, 1, '3', 'Premium'),
(703, 61, 1, '4', 'Premium'),
(704, 61, 1, '5', 'Premium'),
(705, 61, 1, '6', 'Premium'),
(706, 61, 1, '7', 'Premium'),
(707, 61, 1, '8', 'Premium'),
(708, 61, 1, '9', 'Premium'),
(709, 61, 1, '10', 'Premium'),
(710, 62, 1, '1', 'Deluxe'),
(711, 62, 1, '2', 'Deluxe'),
(712, 62, 1, '3', 'Deluxe'),
(713, 62, 1, '4', 'Deluxe'),
(714, 62, 1, '5', 'Deluxe'),
(715, 63, 1, '1', 'Standard'),
(716, 63, 1, '2', 'Standard'),
(717, 63, 1, '3', 'Standard'),
(718, 63, 1, '4', 'Standard'),
(719, 64, 1, '1', 'Standard'),
(720, 64, 1, '2', 'Standard'),
(721, 64, 1, '3', 'Standard'),
(722, 64, 1, '4', 'Standard'),
(725, 64, 1, '5', 'Standard'),
(726, 65, 1, '1', 'Deluxe'),
(727, 65, 1, '2', 'Deluxe'),
(728, 65, 1, '3', 'Deluxe'),
(729, 65, 1, '4', 'Deluxe'),
(730, 65, 1, '5', 'Deluxe'),
(731, 65, 1, '6', 'Deluxe'),
(732, 65, 1, '7', 'Deluxe'),
(733, 65, 1, '8', 'Deluxe'),
(734, 65, 1, '9', 'Deluxe'),
(735, 65, 1, '10', 'Deluxe'),
(736, 65, 1, '11', 'Deluxe'),
(737, 66, 1, '1', 'Deluxe'),
(738, 66, 1, '2', 'Deluxe'),
(739, 66, 1, '3', 'Deluxe'),
(740, 66, 1, '4', 'Deluxe'),
(741, 66, 1, '5', 'Deluxe'),
(742, 66, 1, '6', 'Deluxe'),
(743, 66, 1, '7', 'Deluxe'),
(744, 66, 1, '8', 'Deluxe'),
(745, 66, 1, '9', 'Deluxe'),
(746, 66, 1, '10', 'Deluxe'),
(747, 66, 1, '11', 'Deluxe'),
(748, 66, 1, '12', 'Deluxe'),
(749, 66, 1, '13', 'Deluxe'),
(750, 66, 1, '14', 'Deluxe'),
(751, 66, 1, '15', 'Deluxe'),
(752, 66, 1, '16', 'Deluxe'),
(753, 67, 1, '1', 'Deluxe'),
(754, 67, 1, '2', 'Deluxe'),
(755, 67, 1, '3', 'Deluxe'),
(756, 67, 1, '4', 'Deluxe'),
(757, 67, 1, '5', 'Deluxe'),
(758, 67, 1, '6', 'Deluxe'),
(759, 67, 1, '7', 'Deluxe'),
(760, 67, 1, '8', 'Deluxe'),
(761, 67, 1, '9', 'Deluxe'),
(762, 67, 1, '10', 'Deluxe'),
(763, 67, 1, '11', 'Deluxe'),
(764, 67, 1, '12', 'Deluxe'),
(765, 67, 1, '13', 'Deluxe'),
(766, 67, 1, '14', 'Deluxe'),
(767, 67, 1, '15', 'Deluxe'),
(768, 67, 1, '16', 'Deluxe'),
(769, 68, 1, '1', 'Deluxe'),
(770, 68, 1, '2', 'Deluxe'),
(771, 68, 1, '3', 'Deluxe'),
(772, 68, 1, '4', 'Deluxe'),
(773, 68, 1, '5', 'Deluxe'),
(774, 68, 1, '6', 'Deluxe'),
(775, 68, 1, '7', 'Deluxe'),
(776, 68, 1, '8', 'Deluxe'),
(777, 68, 1, '9', 'Deluxe'),
(778, 68, 1, '10', 'Deluxe'),
(779, 68, 1, '11', 'Deluxe'),
(780, 68, 1, '12', 'Deluxe'),
(781, 68, 1, '13', 'Deluxe'),
(782, 68, 1, '14', 'Deluxe'),
(783, 68, 1, '15', 'Deluxe'),
(784, 68, 1, '16', 'Deluxe'),
(785, 69, 1, '1', 'Deluxe'),
(786, 69, 1, '2', 'Deluxe'),
(787, 69, 1, '3', 'Deluxe'),
(788, 69, 1, '4', 'Deluxe'),
(789, 69, 1, '5', 'Deluxe'),
(790, 69, 1, '6', 'Deluxe'),
(791, 69, 1, '7', 'Deluxe'),
(792, 69, 1, '8', 'Deluxe'),
(793, 69, 1, '9', 'Deluxe'),
(794, 69, 1, '10', 'Deluxe'),
(795, 69, 1, '11', 'Deluxe'),
(796, 69, 1, '12', 'Deluxe'),
(797, 69, 1, '13', 'Deluxe'),
(798, 69, 1, '14', 'Deluxe'),
(799, 69, 1, '15', 'Deluxe'),
(800, 69, 1, '16', 'Deluxe'),
(801, 70, 1, '1', 'Deluxe'),
(802, 70, 1, '2', 'Deluxe'),
(803, 70, 1, '3', 'Deluxe'),
(804, 70, 1, '4', 'Deluxe'),
(805, 70, 1, '5', 'Deluxe'),
(806, 70, 1, '6', 'Deluxe'),
(807, 70, 1, '7', 'Deluxe'),
(808, 70, 1, '8', 'Deluxe'),
(809, 70, 1, '9', 'Deluxe'),
(810, 70, 1, '10', 'Deluxe'),
(811, 70, 1, '11', 'Deluxe'),
(812, 70, 1, '12', 'Deluxe'),
(813, 70, 1, '13', 'Deluxe'),
(814, 70, 1, '14', 'Deluxe'),
(815, 70, 1, '15', 'Deluxe'),
(816, 70, 1, '16', 'Deluxe'),
(817, 71, 1, '1', 'Deluxe'),
(818, 71, 1, '2', 'Deluxe'),
(819, 71, 1, '3', 'Deluxe'),
(820, 71, 1, '4', 'Deluxe'),
(821, 72, 1, '1', 'Standard'),
(822, 72, 1, '2', 'Standard'),
(823, 72, 1, '3', 'Standard'),
(824, 72, 1, '4', 'Standard'),
(825, 72, 1, '5', 'Standard'),
(826, 72, 1, '6', 'Standard'),
(827, 72, 1, '7', 'Standard'),
(828, 72, 1, '8', 'Standard'),
(829, 72, 1, '9', 'Standard'),
(830, 72, 1, '10', 'Standard'),
(831, 72, 1, '11', 'Standard'),
(832, 72, 1, '12', 'Standard'),
(833, 72, 1, '13', 'Standard'),
(834, 72, 1, '14', 'Standard'),
(835, 72, 1, '15', 'Standard'),
(836, 72, 1, '16', 'Standard'),
(837, 73, 1, '1', 'Standard'),
(838, 73, 1, '2', 'Standard'),
(839, 73, 1, '3', 'Standard'),
(840, 73, 1, '4', 'Standard'),
(841, 73, 1, '5', 'Standard'),
(842, 73, 1, '6', 'Standard'),
(843, 73, 1, '7', 'Standard'),
(844, 73, 1, '8', 'Standard'),
(845, 73, 1, '9', 'Standard'),
(846, 73, 1, '10', 'Standard'),
(847, 73, 1, '11', 'Standard'),
(848, 73, 1, '12', 'Standard'),
(849, 73, 1, '13', 'Standard'),
(850, 73, 1, '14', 'Standard'),
(851, 73, 1, '15', 'Standard'),
(852, 73, 1, '16', 'Standard'),
(853, 74, 1, '1', 'Standard'),
(854, 74, 1, '2', 'Standard'),
(855, 74, 1, '3', 'Standard'),
(856, 74, 1, '4', 'Standard'),
(857, 74, 1, '5', 'Standard'),
(858, 74, 1, '6', 'Standard'),
(859, 74, 1, '7', 'Standard'),
(860, 74, 1, '8', 'Standard'),
(861, 74, 1, '9', 'Standard'),
(862, 74, 1, '10', 'Standard'),
(863, 74, 1, '11', 'Standard'),
(864, 74, 1, '12', 'Standard'),
(865, 74, 1, '13', 'Standard'),
(866, 74, 1, '14', 'Standard'),
(867, 74, 1, '15', 'Standard'),
(868, 74, 1, '16', 'Standard'),
(869, 75, 1, '1', 'Standard'),
(870, 75, 1, '2', 'Standard'),
(871, 75, 1, '3', 'Standard'),
(872, 75, 1, '4', 'Standard'),
(873, 75, 1, '5', 'Standard'),
(874, 75, 1, '6', 'Standard'),
(875, 75, 1, '7', 'Standard'),
(876, 75, 1, '8', 'Standard'),
(877, 75, 1, '9', 'Standard'),
(878, 75, 1, '10', 'Standard'),
(879, 75, 1, '11', 'Standard'),
(880, 75, 1, '12', 'Standard'),
(881, 75, 1, '13', 'Standard'),
(882, 75, 1, '14', 'Standard'),
(883, 75, 1, '15', 'Standard'),
(884, 75, 1, '16', 'Standard'),
(885, 76, 1, '1', 'Standard'),
(886, 76, 1, '2', 'Standard'),
(887, 76, 1, '3', 'Standard'),
(888, 76, 1, '4', 'Standard'),
(889, 76, 1, '5', 'Standard'),
(890, 76, 1, '6', 'Standard'),
(891, 76, 1, '7', 'Standard'),
(892, 76, 1, '8', 'Standard'),
(893, 76, 1, '9', 'Standard'),
(894, 76, 1, '10', 'Standard'),
(895, 76, 1, '11', 'Standard'),
(896, 76, 1, '12', 'Standard'),
(897, 76, 1, '13', 'Standard'),
(898, 76, 1, '14', 'Standard'),
(899, 76, 1, '15', 'Standard'),
(900, 76, 1, '16', 'Standard'),
(901, 77, 1, '1', 'Standard'),
(902, 77, 1, '2', 'Standard'),
(903, 77, 1, '3', 'Standard'),
(904, 77, 1, '4', 'Standard'),
(905, 77, 1, '5', 'Standard'),
(906, 77, 1, '6', 'Standard'),
(907, 77, 1, '7', 'Standard'),
(908, 77, 1, '8', 'Standard'),
(909, 77, 1, '9', 'Standard'),
(910, 77, 1, '10', 'Standard'),
(911, 77, 1, '11', 'Standard'),
(912, 77, 1, '12', 'Standard'),
(913, 77, 1, '13', 'Standard'),
(914, 77, 1, '14', 'Standard'),
(915, 77, 1, '15', 'Standard'),
(916, 77, 1, '16', 'Standard'),
(917, 77, 1, '17', 'Standard'),
(918, 20, 1, '16', 'Premium'),
(919, 23, 1, '18', 'Premium');

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
(1, 'Joy Garden', '50sqm', '78', '917');

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
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
  ADD PRIMARY KEY (`news_id`);

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deceased_persons`
--
ALTER TABLE `deceased_persons`
  MODIFY `deceased_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lot_owners`
--
ALTER TABLE `lot_owners`
  MODIFY `lot_owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_blocks`
--
ALTER TABLE `tbl_blocks`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_lots`
--
ALTER TABLE `tbl_lots`
  MODIFY `lot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=920;

--
-- AUTO_INCREMENT for table `tbl_sites`
--
ALTER TABLE `tbl_sites`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
