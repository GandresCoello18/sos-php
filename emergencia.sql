-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2018 at 09:59 PM
-- Server version: 10.0.31-MariaDB-0ubuntu0.16.04.2
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emergencia`
--

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `latitude` decimal(12,10) DEFAULT NULL,
  `longitude` decimal(12,10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notificaciones`
--

INSERT INTO `notificaciones` (`id_notificacion`, `fecha`, `usuario`, `latitude`, `longitude`) VALUES
(192, '2018-09-13 20:45:56', 'Rodrigo', '-0.1920133000', '-78.4829838000'),
(193, '2018-09-13 20:46:32', 'Rodrigo', '-0.1920133000', '-78.4829838000'),
(194, '2018-09-13 20:47:19', 'Jhon', '-1.8017133000', '-79.5375008000'),
(195, '2018-09-13 20:47:21', 'Jhon', '-1.8017133000', '-79.5375008000'),
(196, '2018-09-13 20:47:31', 'Jose Daniel', '4.5449589000', '-76.0942770000'),
(197, '2018-09-13 20:47:50', 'Jose Daniel', '4.5449589000', '-76.0942770000'),
(198, '2018-09-13 20:54:23', 'angel', '19.3874298700', '-99.0579935600'),
(199, '2018-09-13 20:54:26', 'angel', '19.3874298700', '-99.0579935600');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(8, 'Lsp12', '$2y$10$SB9W.YwyAFPwnYwEKpAlse1IBwhwJdv/bBsI4ygy.FxREGkLDaDbG', '2018-09-13 13:51:11'),
(9, 'Steve', '$2y$10$2aT2byEcSrBeFuPgSFjMQeIxR.5VQAJD1GS9END9Jow3CiJyttegm', '2018-09-13 13:57:29'),
(10, 'c1v02', '$2y$10$BDoSIQLGLuHWxfTezVgCSeBDMRU89H5jZKeZxN9/xyty7SnefxHcC', '2018-09-13 19:14:00'),
(11, 'root', '$2y$10$GFAKxXFOg.JJMQIGa3SKUuzngD5rl.WCE1dL1qsgd/8iJ4ih9zmxy', '2018-09-13 19:16:45'),
(12, 'nene', '$2y$10$y5Cpd.d.F6EAETIhEINzL.YlBLDQQSytzL2tQ10ZAGDzhZDD4FNtG', '2018-09-13 19:17:19'),
(13, 'Rodrigo', '$2y$10$ryRMqPOWyeNgmzl6Mg/NAOzTpVli1NwcuLiABxYJE2cMNv0HIBXFS', '2018-09-13 22:07:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
