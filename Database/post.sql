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
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(20) NOT NULL,
  `username` text DEFAULT NULL,
  `mypost` text DEFAULT NULL,
  `timestamp` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `username`, `mypost`, `timestamp`) VALUES
(2, 'nikita_', 'second task of kalam acdemy', 1591368969),
(3, 'nikita_', 'what are you doing nikita', 1591369019),
(4, 'anjali', 'today  for the first time i made chpati', 1591369075),
(5, 'seema', 'finally got my laptop', 1591369102),
(6, 'tanya', 'today is my birthdayjjjjjjjjjjjjjjjjjjjj\r\nkhjytliu\r\nlgkhfg\r\njtiyiiiiiiiiiiii\r\nfdkjgtkjhy\r\nkkkkkkkkkkkkkkkkkkk', 1591369146),
(58, 'nikita_', 'yui', 1591406134),
(63, 'nikita_', 'it takes too much time', 1591406305),
(66, 'nikita_', 'too maany entries at a time', 1591414271),
(67, 'nikita_', 'too maany entries at a time', 1591414395),
(68, 'nikita_', 'inserting directly', 1591414712),
(69, 'sano', 'congratulation you are selected for 1 st round', 1591443931),
(70, 'seema', 'feeling hungry', 1591443978),
(71, 'ganesh_', 'covid-19 ooooooooooo jaooooooooooooo', 1591444017),
(72, 'anjali', 'kab khatam hoga ye kaaaaaaaaaaammmmmmmmmmmm', 1591444059),
(73, 'sonu', 'hiiiiiiiiiiii, don\'t have ffffffrrrrrrrrriiiiieeeeeeennnnnnndddddddsssss', 1591444097),
(74, 'ganesh_', 'what to ssay 2020 is ...........', 1591444466),
(75, 'seema', 'haryannnnannnnnnnnnnnaaaaaaaaa', 1591444516),
(76, 'sonu', 'college openssssssssss', 1591444593),
(77, 'sano', 'kyaaaaatypeeeeeeeee karuuu', 1591444650);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
