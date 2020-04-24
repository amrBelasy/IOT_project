-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2019 at 04:33 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
-- Table structure for table `poles_info`
--

CREATE TABLE `poles_info` (
  `id` int(11) NOT NULL,
  `poles_number` int(100) NOT NULL,
  `line1volt` int(255) NOT NULL,
  `line2volt` int(255) NOT NULL,
  `line3volt` int(255) NOT NULL,
  `intensity` int(100) NOT NULL DEFAULT '0',
  `temperature` float NOT NULL DEFAULT '0',
  `battery` int(100) NOT NULL,
  `solar_cell` int(100) NOT NULL,
  `led_sensor` float NOT NULL,
  `done` varchar(3) NOT NULL,
  `last_change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poles_info`
--

INSERT INTO `poles_info` (`id`, `poles_number`, `line1volt`, `line2volt`, `line3volt`, `intensity`, `temperature`, `battery`, `solar_cell`, `led_sensor`, `done`, `last_change`) VALUES
(1, 1, 200, 150, 170, 255, 5, 12, 17, 1, 'yes', '2019-07-07 13:51:05'),
(2, 2, 200, 200, 200, 255, 5, 1, 1, 0, 'yes', '2019-07-07 13:51:05'),
(3, 3, 0, 0, 0, 255, 0.03, 13, 18, 1, 'yes', '2019-07-07 13:51:52'),
(4, 4, 230, 230, 220, 255, 4, 0, 0, 0, 'yes', '2019-07-07 13:51:05'),
(5, 5, 230, 190, 230, 255, 5, 0, 0, 0, 'yes', '2019-07-07 13:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'test@example.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poles_info`
--
ALTER TABLE `poles_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poles_info`
--
ALTER TABLE `poles_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
