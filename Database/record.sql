-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 03:07 PM
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
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(10) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `username`, `password`) VALUES
(7, 'nikita_', 'b28484cf039dd155d36245ef9570c09f'),
(8, 'tanya_', 'e02aae293e49753180d5da2fe123c311'),
(9, 'ganesh_', '485388e5fc306f4fcb8ca9029282f868'),
(10, 'katha_', 'fe86aeda5d1da6353b34b9d0ed61a8a7'),
(11, 'kalash_', '14d94196248b286d48b291ff6033b571'),
(12, 'dnynal_', '7ab91abc5cc1a1b1b3dfe55a7a6ba43c'),
(13, 'shraddha_', '622a3cf665b194e78c6a76f4f7502214'),
(14, 'akash_', '63ab09aa99e8a5943d570ea5f76293e6'),
(15, 'seema', 'f68d8d1f06355390d33d70168af2725a'),
(16, 'divya', '2ffefbb1ad15bc78e630ca1c42d3d2b4'),
(17, 'sano', '498395a97041ca94f0b80879f1d4e0b2'),
(18, 'anjali', 'd764bcaaf4c0e78bfcc277c6229caba0'),
(19, 'aarti.fgjui', 'de2c7500fd17bbcda7658c6d1e58dcda'),
(20, 'tanya', 'a1d19950ccaaf1a4d64df17089981c7b'),
(21, 'sonu', 'fa760916e263fe1554dbdb74b6e19c83');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
