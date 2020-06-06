-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 03:04 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalam_academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(20) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `friends` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `username`, `friends`) VALUES
(13, 'nikita_', 'ganesh_'),
(14, 'ganesh_', 'nikita_'),
(15, 'nikita_', 'divya'),
(16, 'divya', 'nikita_'),
(17, 'nikita_', 'tanya'),
(18, 'tanya', 'nikita_'),
(19, 'nikita_', 'sano'),
(20, 'sano', 'nikita_'),
(21, 'tanya', 'sano'),
(22, 'sano', 'tanya'),
(23, 'ganesh_', 'sano'),
(24, 'sano', 'ganesh_'),
(25, 'seema', 'ganesh_'),
(26, 'ganesh_', 'seema'),
(27, 'sonu', 'ganesh_'),
(28, 'ganesh_', 'sonu'),
(29, 'anjali', 'sano'),
(30, 'sano', 'anjali'),
(31, 'anjali', 'seema'),
(32, 'seema', 'anjali'),
(33, 'tanya', 'ganesh_'),
(34, 'ganesh_', 'tanya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
