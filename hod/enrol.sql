-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 11:30 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aspare`
--

-- --------------------------------------------------------

--
-- Table structure for table `enrol`
--

CREATE TABLE `enrol` (
  `eid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `cid` int(50) NOT NULL,
  `subid` int(50) NOT NULL,
  `bid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrol`
--

INSERT INTO `enrol` (`eid`, `uid`, `cid`, `subid`, `bid`) VALUES
(6, 15, 1, 3, 5),
(7, 18, 1, 3, 6),
(8, 19, 6, 0, 0),
(9, 20, 1, 0, 0),
(10, 20, 1, 0, 0),
(11, 15, 1, 0, 0),
(12, 22, 1, 0, 0),
(13, 20, 1, 0, 0),
(14, 20, 1, 44, 3),
(15, 23, 1, 44, 5),
(16, 23, 1, 2, 3),
(17, 24, 1, 96, 5),
(18, 18, 1, 3, 3),
(19, 23, 1, 44, 8),
(21, 26, 1, 2, 6),
(22, 15, 1, 1, 3),
(23, 19, 1, 7, 3),
(24, 25, 1, 1, 5),
(25, 22, 1, 2, 3),
(26, 22, 1, 1, 5),
(27, 22, 1, 1, 5),
(33, 25, 1, 47, 8),
(34, 27, 1, 44, 8),
(35, 33, 1, 25, 5),
(36, 21, 1, 1, 1),
(37, 34, 2, 1, 1),
(38, 35, 3, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrol`
--
ALTER TABLE `enrol`
  ADD PRIMARY KEY (`eid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrol`
--
ALTER TABLE `enrol`
  MODIFY `eid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
