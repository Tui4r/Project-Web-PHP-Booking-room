-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2019 at 05:50 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `room_booking`
--

CREATE TABLE `room_booking` (
  `id` int(4) NOT NULL,
  `room_num` tinyint(1) NOT NULL,
  `room_date_booking` date NOT NULL,
  `cus_name` varchar(200) NOT NULL,
  `cus_tel` varchar(15) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `add_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_booking`
--

INSERT INTO `room_booking` (`id`, `room_num`, `room_date_booking`, `cus_name`, `cus_tel`, `cus_email`, `add_date`) VALUES
(38, 3, '2019-11-24', 'Teerapop Kaewkhuean', '0830620136', 'nzbb.487@gmail.com', '2019-11-24 00:00:00'),
(39, 4, '2019-11-25', 'Teerapop Kaewkhuean', '0830620136', 'nzbb.487@gmail.com', '2019-11-25 00:00:00'),
(40, 3, '2019-11-22', 'Teerapop Kaewkhuean', '0830620136', 'nzbb.487@gmail.com', '2019-11-22 00:00:00'),
(41, 3, '2019-11-23', 'Teerapop Kaewkhuean', '0830620136', 'nzbb.487@gmail.com', '2019-11-23 00:00:00'),
(42, 3, '2019-11-26', 'Teerapop Kaewkhuean', '0830620136', 'nzbb.487@gmail.com', '2019-11-26 00:00:00'),
(43, 4, '2019-11-27', 'Teerapop Kaewkhuean', '0830620136', 'nzbb.487@gmail.com', '2019-11-27 00:00:00'),
(44, 2, '2019-11-24', 'noppaut', '0922612650', 'npr@gg.com', '2019-11-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `email`, `trn_date`) VALUES
(6, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'new_az222@hotmail.com', '2019-11-22 00:09:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room_booking`
--
ALTER TABLE `room_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room_booking`
--
ALTER TABLE `room_booking`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
