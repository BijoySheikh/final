-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2019 at 10:04 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `torun`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_member_form_data`
--

CREATE TABLE `all_member_form_data` (
  `id` int(10) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `loan_date` varchar(20) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `refer_name` varchar(100) NOT NULL,
  `present_addr` varchar(200) NOT NULL,
  `permanent_addr` int(200) NOT NULL,
  `loan_sirial` int(20) NOT NULL,
  `loan_amount` varchar(20) NOT NULL,
  `profit_amount` int(20) NOT NULL,
  `total_amount` int(20) NOT NULL,
  `premier_amount` int(20) NOT NULL,
  `savings_amount` int(20) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_member_form_data`
--

INSERT INTO `all_member_form_data` (`id`, `m_name`, `f_name`, `loan_date`, `phone_no`, `refer_name`, `present_addr`, `permanent_addr`, `loan_sirial`, `loan_amount`, `profit_amount`, `total_amount`, `premier_amount`, `savings_amount`, `image`) VALUES
(291, 'sdf', 'sdf', '01-10-2019', 'sdfs', '', 'fsdf', 0, 42, '42', 4, 4, 0, 0, 'Penguins.jpg'),
(292, 'w', 'w', '01-10-2019', 'w', '', '', 0, 0, '4', 1, 0, 0, 0, ''),
(293, 'gdfg', 'fdg', '5', 'fg', 'fg', '', 0, 645, '54', 465, 0, 456, 0, ''),
(294, 'dfds', 'dsfds', '02-04-2019', 'fdsf', 'dsfds', 'fdsf', 0, 524, '54', 45, 0, 0, 0, ''),
(295, 'hh', 'hgfhfgh', '01-10-2019', 'hgh', '', '', 0, 0, '653', 65, 0, 0, 0, ''),
(296, 'fsd', '', '08-10-2019', 'dsf', 'dsfds', '', 0, 0, '653', 65, 0, 0, 0, ''),
(297, 'gf', 'dfg', '09-10-2019', 'fdg', '', '', 0, 0, '54', 45, 0, 0, 0, ''),
(298, 'dfdsf', 'dsf', '08-10-2019', 'df', 'df', 'dsf', 0, 0, '56', 56, 0, 0, 0, ''),
(299, 'dsf', 'dsf', '01-10-2019', 'sdf', '', '', 0, 0, '54', 54, 0, 0, 0, ''),
(300, 'lk;', 'lk;lk', '01-10-2019', ';l', '', '', 0, 0, '542', 542, 0, 0, 0, ''),
(301, 'uyi', '', '01-10-2019', 'iu', '', '', 0, 0, '54', 5, 0, 0, 0, ''),
(302, '421', '41', '16-10-2019', '4', '', '', 0, 0, '652', 564, 0, 0, 0, ''),
(303, 'fg', 'dfg', '01-10-2019', 'fg', 'fdg', 'dfg', 0, 524, '45', 245, 45, 45, 45, ''),
(304, '254', '5', '54', '54', '', '', 0, 0, '45', 54, 0, 0, 0, ''),
(305, '6', '6', '01-10-2019', '6', '', '', 0, 0, '6', 6, 0, 0, 0, ''),
(306, 'gfdg', 'dfg', '683', 'dfgfd', 'gdfg', 'dfgdf', 0, 456, '456', 546, 456, 46, 4, ''),
(307, 'hgjgh', 'jghj', '01-10-2019', 'ghjgh', 'jghj', 'gj', 0, 0, '564', 546, 0, 0, 0, ''),
(308, 'fghfg', 'hfh', '01-10-2019', 'fghfgh', 'fgh', '', 0, 55, '5', 5, 5, 5, 5, ''),
(309, 'fdgfdg', 'fdg', '02-10-2019', 'fgfdg', '', '', 0, 0, '5', 435, 0, 0, 0, ''),
(310, 'dfgf', 'fgfd', '01-10-2019', 'gdfg', 'dfg', '', 0, 8963, '65', 45, 546, 0, 0, ''),
(311, 'kamal', 'fsdfjsdj', '01-10-2019', 'fksjd', '', '', 0, 0, '546', 456, 56, 0, 0, ''),
(312, 'bipul', 'rahim', '01-10-2019', '01950481587', '', '', 0, 0, '456', 456, 456, 456, 546, ''),
(313, 'dgfd', 'fdg', '01-10-2019', 'dfg', 'fdgfdg', 'dfg', 0, 0, '654', 546, 546, 0, 0, ''),
(314, 'fsd', 'df', '01-10-2019', 'fdsf', '523', '6', 0, 0, '56', 456, 0, 0, 0, ''),
(315, 'gf', 'gfh', '01-10-2019', 'gfhfgh', '', '', 0, 0, '5', 5, 0, 0, 0, ''),
(316, 'sdf', 'sdf', '01-10-2019', 'dsf', 'dsf', '', 0, 2, '546', 546, 0, 0, 0, ''),
(317, 'sdf', 'df', '6543', 'dfs', 'sdf', '', 0, 56, '65', 56, 0, 0, 0, ''),
(318, 'hgf', 'hfgh', '08-10-2019', 'gfh', 'fgh', 'gfh', 0, 0, '6', 65, 6, 6, 0, ''),
(319, 'gfdg', 'fdg', '01-10-2019', 'fdgfd', '', '', 0, 6, '54', 4, 0, 0, 0, ''),
(320, 'hgjghj', 'hgj', '19-10-2019', 'ghjghj', 'ghj', '', 0, 0, '564', 456, 56, 564, 0, ''),
(321, 'a', 'b', '01-10-2019', 'b', '', '', 0, 0, '6', 41, 0, 0, 0, ''),
(322, 'bipul', 'rahim ', '01-10-2019', '01950481587', '123', '', 0, 0, '4', 4, 0, 0, 0, ''),
(323, 'ghgfh', 'gfh', '01-10-2019', 'gfh', 'fghfgh', 'ghf', 0, 0, '4', 456, 54, 45, 0, ''),
(324, 'lkjlkjlkjljkl', 'jkljkljkljkl', '08-10-2019', '6', '', '', 0, 6, '6', 6, 0, 0, 0, ''),
(325, 'uy', 'yuy', '07-10-2019', 'tuyt', 'tyuy', 'tuyt', 0, 654, '635', 6, 0, 0, 0, ''),
(326, 'alu', 'begun', '02-10-2019', 'fpgok', '', '', 0, 6, '465', 456, 546, 546, 546, '');

-- --------------------------------------------------------

--
-- Table structure for table `member_premier_data`
--

CREATE TABLE `member_premier_data` (
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `test` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_premier_data`
--

INSERT INTO `member_premier_data` (`first_name`, `last_name`, `id`, `test`) VALUES
('dfg', 'dfgdfg', 39, 'dfgdfg'),
('gfdg', 'dfg', 40, 'dfgdf'),
('fsdf', 'fds', 48, 'sdf'),
('dfg', 'gfdg', 66, 'gfdg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_member_form_data`
--
ALTER TABLE `all_member_form_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_premier_data`
--
ALTER TABLE `member_premier_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_member_form_data`
--
ALTER TABLE `all_member_form_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- AUTO_INCREMENT for table `member_premier_data`
--
ALTER TABLE `member_premier_data`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
