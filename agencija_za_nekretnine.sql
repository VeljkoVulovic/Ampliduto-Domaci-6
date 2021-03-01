-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 02:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agencija_za_nekretnine`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`id`, `name`) VALUES
(1, 'prodaja'),
(2, 'iznajmljivanje'),
(3, 'kompenzacija');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Podgorica'),
(2, 'Niksic'),
(3, 'Bar'),
(4, 'Bijelo Polje'),
(5, 'Budva'),
(6, 'Rozaje'),
(7, 'Pljevlja'),
(9, 'Ulcinj'),
(10, 'Kotor'),
(11, 'Tivat');

-- --------------------------------------------------------

--
-- Table structure for table `real_estate`
--

CREATE TABLE `real_estate` (
  `id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` varchar(255) COLLATE utf8_bin NOT NULL,
  `construction_year` date NOT NULL,
  `info` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT './uploads/no_image.png',
  `city_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `type_of_real_estate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `real_estate`
--

INSERT INTO `real_estate` (`id`, `size`, `price`, `construction_year`, `info`, `image`, `city_id`, `ad_id`, `type_of_real_estate_id`) VALUES
(1, '100', '30000', '2015-02-01', 'Stan na prodaju', NULL, 1, 1, 1),
(2, '80', '250', '2010-01-01', 'Prodat stan', NULL, 3, 3, 3),
(3, '200', '40000', '2000-07-15', 'Kuca na prodaju', NULL, 3, 1, 2),
(4, '50', '150', '2017-10-01', 'Poslovni prostor iznajmljivanje', NULL, 4, 2, 4),
(5, '100', '25000', '2000-05-05', 'Kuca na prodaju', NULL, 1, 3, 2),
(7, '20', '200', '2015-08-20', 'Garaza iznajmljivanje', NULL, 2, 2, 3),
(8, '300', '50000', '2000-05-24', 'Prodata kuca', NULL, 10, 1, 2),
(9, '70', '1400', '2003-11-08', 'Stan na prodaju', NULL, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_real_estate`
--

CREATE TABLE `type_of_real_estate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `type_of_real_estate`
--

INSERT INTO `type_of_real_estate` (`id`, `name`) VALUES
(1, 'stan'),
(2, 'kuca'),
(3, 'garaza'),
(4, 'poslovni prostor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `real_estate`
--
ALTER TABLE `real_estate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_real_estate_ad` (`ad_id`),
  ADD KEY `fk_real_estate_city` (`city_id`),
  ADD KEY `fk_real_estate_type_of_real_estate` (`type_of_real_estate_id`);

--
-- Indexes for table `type_of_real_estate`
--
ALTER TABLE `type_of_real_estate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `real_estate`
--
ALTER TABLE `real_estate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `type_of_real_estate`
--
ALTER TABLE `type_of_real_estate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `real_estate`
--
ALTER TABLE `real_estate`
  ADD CONSTRAINT `fk_real_estate_ad` FOREIGN KEY (`ad_id`) REFERENCES `ad` (`id`),
  ADD CONSTRAINT `fk_real_estate_city` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `fk_real_estate_type_of_real_estate` FOREIGN KEY (`type_of_real_estate_id`) REFERENCES `type_of_real_estate` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
