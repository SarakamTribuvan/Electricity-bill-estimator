-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jul 18, 2023 at 10:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proflu`
--

-- --------------------------------------------------------

--
-- Table structure for table `regi`
--

CREATE TABLE `regi` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `fans` int(11) NOT NULL,
  `tubelights` int(11) NOT NULL,
  `bulbs` int(11) NOT NULL,
  `tv` int(11) NOT NULL,
  `ac` int(11) NOT NULL,
  `oven` int(11) NOT NULL,
  `desktop` int(11) NOT NULL,
  `iron_box` int(11) NOT NULL,
  `toaster` int(11) NOT NULL,
  `water_heater` int(11) NOT NULL,
  `fridge` int(11) NOT NULL,
  `others` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regi`
--

INSERT INTO `regi` (`id`, `username`, `password`, `fans`, `tubelights`, `bulbs`, `tv`, `ac`, `oven`, `desktop`, `iron_box`, `toaster`, `water_heater`, `fridge`, `others`) VALUES
(1, 'LORD GANESH', 'ganesh', 2, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'lalitha', '123', 3, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(3, 'tribuvan', '1234', 11, 1, 1, 1, 1, 3, 1, 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `regi`
--
ALTER TABLE `regi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `regi`
--
ALTER TABLE `regi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
