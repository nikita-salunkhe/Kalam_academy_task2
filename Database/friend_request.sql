-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 03:05 PM
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
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `id` int(20) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `frnd_rqst` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`id`, `username`, `frnd_rqst`) VALUES
(46, 'nikita_', 'seema'),
(49, 'nikita_', 'anjali'),
(50, 'nikita_', 'aarti.fgjui'),
(52, 'tanya_', 'sonu'),
(53, 'kalash_', 'sonu'),
(54, 'katha_', 'sonu'),
(55, 'anjali', 'sonu'),
(56, 'akash_', 'ganesh_'),
(57, 'shraddha_', 'ganesh_'),
(59, 'seema', 'sano'),
(61, 'tanya_', 'ganesh_'),
(62, 'katha_', 'ganesh_'),
(63, 'kalash_', 'ganesh_'),
(65, 'divya', 'ganesh_'),
(68, 'tanya_', 'seema'),
(69, 'ganesh_', 'seema'),
(71, 'sano', 'seema'),
(72, 'tanya', 'sonu'),
(73, 'seema', 'sonu'),
(74, 'nikita_', 'sonu'),
(75, 'divya', 'sonu'),
(77, 'tanya', 'anjali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
