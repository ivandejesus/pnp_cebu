-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2016 at 10:04 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_pnp`
--

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `station` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `station`) VALUES
(1, 'Cebu City'),
(2, 'Station 1'),
(3, 'Station 2'),
(4, 'Station 3'),
(5, 'Station 4'),
(6, 'Station 5'),
(7, 'Station 6'),
(8, 'Station 7'),
(9, 'Station 8'),
(10, 'Station 9'),
(11, 'Station 10'),
(12, 'Station 11'),
(13, 'Station 12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_criminal_act`
--

CREATE TABLE `tbl_criminal_act` (
  `criminalact_id` int(11) NOT NULL,
  `primary_case` varchar(100) NOT NULL,
  `secondary_case` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_top_ten`
--

CREATE TABLE `tbl_top_ten` (
  `topten_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `alias` varchar(30) NOT NULL,
  `district` varchar(50) NOT NULL,
  `rank` int(11) NOT NULL,
  `station` varchar(50) NOT NULL,
  `location` varchar(30) NOT NULL,
  `offense` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `image_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_top_ten`
--

INSERT INTO `tbl_top_ten` (`topten_id`, `first_name`, `last_name`, `middle_name`, `alias`, `district`, `rank`, `station`, `location`, `offense`, `date`, `status`, `remarks`, `image_path`) VALUES
(5, 'wqqwqwqwqw', 'qwqwqwqw', 'qqwqwqw', 'qwqwwqwqwq', 'qwqwqwqwqw', 1, 'Station 2', 'qwqwqwqw', 'qwqwqwqwqwqwqwqwqwqwqwqw', '2016-05-11', 'qwqwqwqw', 'qwqwwqwq', 'Lighthouse 514922da.jpg'),
(6, 'wqqwwqwq', 'qwqwqwqw', 'wqwqqw', 'qwwqqwqw', 'wqwqwqqw', 2, 'Station 1', 'wqwqqw', 'qwwqqwwq', '2016-05-12', 'qwwqqw', 'wqqwqw', 'Koala efa0b8f1.jpg'),
(7, 'qwwqwqqw', 'qwqwqwqwqw', 'qwqwqwqw', 'qwqwqwqw', 'qwqwqwqw', 4, 'Station 1', 'wqqwwqqw', 'qwwqqwwqwqwqwqqw', '2016-05-05', 'qwwqqw', 'qwqwqwqw', 'Chrysanthemum b146f6fc.jpg'),
(8, 'wqwqwqqw', 'qwqwqwqwq', 'qwqwqwqw', 'qwqwqwqw', 'wqwqqwqw', 3, 'Station 1', 'qwqwqwqw', 'qwqw', '2016-05-11', 'wqwqqw', 'qwqwqwqw', 'Koala ae775b65.jpg'),
(9, 'qwqwqwqw', 'qwqwqwqw', 'qwqwqwwq', 'qwqwqwqw', 'qwwqqw', 6, 'Station 1', 'qwqwwq', 'wqqwqw', '2016-05-21', 'qwqwqw', 'wqqw', 'Penguins a8d85655.jpg'),
(10, 'wqwqwqqwqw', 'qwqwqwqw', 'qwqwqwq', 'qwqwqwqw', 'qwqwqwqwqwqwqwqwqwqwqwqwqw', 10, 'Station 1', 'qwqwqwwq', 'wqqwwqqw', '2016-05-12', 'wqwqqw', 'qwqwqwwq', 'Tulips c0442dd8.jpg'),
(11, 'qwwqwqqw', 'qwqwwqqw', 'qwqwqwqw', 'qwqwqwqw', 'qwqwqw', 5, 'Station 1', 'qwqwwqqw', 'qwqwwqqw', '2016-05-19', 'wqwqqw', 'qwqwqwqw', 'Hydrangeas b7b4f680.jpg'),
(12, 'wqwqwqqw', 'qwqwqwqw', 'wqqwwqqw', 'qwqwqw', 'qwqwwq', 7, 'Station 1', 'qwwqwq', 'qwwqwqqw', '2016-05-12', 'qwwqqw', 'qwwqqwqw', 'Lighthouse 60439187.jpg'),
(13, 'wqwqqwqw', 'qwqwqwqw', 'qwwqwqwq', 'wqqwqwwqwq', 'qwqwqwqwqwqwqwqwqwqwqwqwqw', 8, 'Station 1', 'wqwqwqqw', 'wqwqqwqw', '2016-05-11', 'wqwqqw', 'qwwqqwqw', 'Hydrangeas 64d6b290.jpg'),
(14, 'qwwqqwqw', 'qwqwqwqw', 'qwqwqwqw', 'qwqwqwqw', 'qwqwwqqw', 9, 'Station 1', 'qwwqqw', 'qwwqwqqww', '2016-05-05', 'qwqwqw', 'qwqwqwqw', 'Jellyfish 5f23b1f4.jpg'),
(15, 'qwqwqwwq', 'qwqwqwqw', 'qwqwqwqw', 'qwqwqwqw', 'qwqwqw', 1, 'Station 1', 'qwqwqwqw', 'qqwwq', '2016-05-30', 'wqwqwq', 'qwqwqwqw', 'Desert 54e7e3fe.jpg'),
(16, 'qwwqqwwq', 'qwqwqwqww', 'qwqwqw', 'qwwqqw', 'qwqwqw', 12, 'Cebu City', 'qwqwqwqw', 'qqwqwqw', '2016-05-27', 'qwwqwq', 'qwqwqw', 'Jellyfish b84d4d29.jpg'),
(17, 'wqwqqw', 'qwqwwq', 'qwwqwq', 'qwqqw', 'qwwqqw', 9, 'Station 5', 'qwwqqw', 'qwqwwq', '2016-05-12', 'qwqwq', 'qwwqqw', 'Hydrangeas 7a015d3c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracker_team`
--

CREATE TABLE `tbl_tracker_team` (
  `trackerteam_id` int(11) NOT NULL,
  `team_leader` varchar(50) NOT NULL,
  `members` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `retypepassword` varchar(64) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `account_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `username`, `password`, `retypepassword`, `emailaddress`, `account_type`) VALUES
(14, 'admin', 'admin', '032f6fbd18de19377460366d8b905c86828889b7a42a11a46e81435ded8e3bb5', '', 'admin@admin.com', '0'),
(15, 'test', 'test', '8f8d120036e6c652058180492b20cb38d277cc25cb2df7a067f9b99aecf5e2be', '', 'test@test.com', '1'),
(26, 'ivandejesus', 'ivandejesus', '52a26866ec5dc7460cbfa815eb42dfa82ea72c0ad8c201c105812b4ac4c651c6', '52a26866ec5dc7460cbfa815eb42dfa82ea72c0ad8c201c105812b4ac4c651c6', 'ivandejesus@yahoo.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wanted`
--

CREATE TABLE `tbl_wanted` (
  `wanted_id` int(11) NOT NULL,
  `station` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `last_known_address` varchar(50) NOT NULL,
  `criminal_activity` varchar(100) DEFAULT NULL,
  `crime_involvement` varchar(100) NOT NULL,
  `area_of_operation` varchar(50) NOT NULL,
  `criminal_case_nr` varchar(50) NOT NULL,
  `issuing_court` varchar(50) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `image_uploaded_date` date NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wanted`
--

INSERT INTO `tbl_wanted` (`wanted_id`, `station`, `first_name`, `middle_name`, `last_name`, `alias`, `last_known_address`, `criminal_activity`, `crime_involvement`, `area_of_operation`, `criminal_case_nr`, `issuing_court`, `remarks`, `image_path`, `image_uploaded_date`, `date_created`, `date_updated`) VALUES
(44, 'Station 9', 'wqwqqwwqqw', 'wqqwqwqw', 'qwwqwqw', 'qwqwqw', 'qwqwqw', 'qwqwqw', 'qwqwqwqw', 'qwqwq', 'qwqwq', 'qwqwqw', 'qwqwqw', 'Lighthouse 4f47fb43.jpg', '2016-05-30', '2016-05-04', NULL),
(45, 'Station 1', 'wqwqwqwqwq', 'wqwqwqwq', 'qwqwqw', 'wqwqwq', 'qwqwqwqwq', 'qwqwqwqqwqw', 'qwqwqw', 'qwqwqw', 'qwqwqwq', 'qwqwqwq', 'qwqwwqw', 'Hydrangeas 5f3f46c0.jpg', '2016-05-31', '2016-05-12', '2016-05-31 06:42:25'),
(46, 'Station 3', 'qwqwwqqw', 'qwwqqwqw', 'wqqwqw', 'qwwqqwqw', 'wqqwqw', 'qwqwqw', 'qwqwwqqw', 'wqqwqw', 'qwwqqw', 'qwwqqw', 'qwwqqw', 'Hydrangeas e6824f63.jpg', '2016-05-31', '2016-05-10', NULL),
(47, 'Station 2', 'wqwqwq', 'qwqwqw', 'qwqwqw', 'qwqwq', 'qwqwqw', 'qwqwqw', 'qwqw', 'qwqwqw', 'wqwqw', 'qwqwq', 'qwqwq', 'Penguins 4d80dc17.jpg', '2016-05-31', '2016-05-12', NULL),
(48, 'Station 1', 'wqwqqw', 'qwwqqw', 'qwwqw', 'qwqwq', 'qwqw', 'qwqw', 'qwq', 'qwq', 'qwqw', 'qwqw', 'qwqw', 'Hydrangeas 33dcd949.jpg', '2016-05-31', '2016-05-04', NULL),
(49, 'Station 5', 'wqwqwq', 'qwwqwq', 'qwwqqw', 'qwwqw', 'qwqw', 'qwqw', 'qwqwq', 'qwqwqwq', 'qwqw', 'qwqw', 'qwqwq', 'Penguins 3458eba1.jpg', '2016-05-31', '2016-05-12', NULL),
(50, 'Station 1', 'qwqwqw', 'qwqwqw', 'qqwwq', 'qwqwqw', 'qwwqqw', 'qwqwqw', 'qqwqw', 'qwwqwq', 'qwwqqw', 'qwqwqw', 'qwwqqw', 'Penguins c8d2d56c.jpg', '2016-05-31', '2016-05-11', NULL),
(51, 'Station 1', 'wqqwqwqw', 'wqwq', 'wqqwqw', 'qwwqwq', 'qwqw', 'qwqw', 'qwqwq', 'qwqw', 'qwqwwq', 'wqqwqwqw', 'qwqwqw', 'Desert edbc0827.jpg', '2016-06-01', '2016-06-16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_criminal_act`
--
ALTER TABLE `tbl_criminal_act`
  ADD PRIMARY KEY (`criminalact_id`);

--
-- Indexes for table `tbl_top_ten`
--
ALTER TABLE `tbl_top_ten`
  ADD PRIMARY KEY (`topten_id`);

--
-- Indexes for table `tbl_tracker_team`
--
ALTER TABLE `tbl_tracker_team`
  ADD PRIMARY KEY (`trackerteam_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_wanted`
--
ALTER TABLE `tbl_wanted`
  ADD PRIMARY KEY (`wanted_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_criminal_act`
--
ALTER TABLE `tbl_criminal_act`
  MODIFY `criminalact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_top_ten`
--
ALTER TABLE `tbl_top_ten`
  MODIFY `topten_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_tracker_team`
--
ALTER TABLE `tbl_tracker_team`
  MODIFY `trackerteam_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_wanted`
--
ALTER TABLE `tbl_wanted`
  MODIFY `wanted_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
