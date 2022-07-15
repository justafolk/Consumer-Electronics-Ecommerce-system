-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 08:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce2`
--

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `promoid` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `product_category` varchar(20) DEFAULT NULL,
  `product` text DEFAULT NULL,
  `image_loc` text DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `T_and_c` text DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `maxdiscount` int(11) DEFAULT NULL,
  `active_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promoid`, `title`, `product_category`, `product`, `image_loc`, `type`, `description`, `price`, `T_and_c`, `discount`, `maxdiscount`, `active_date`, `expiry_date`, `link`) VALUES
(9, 'Phone - Lel', NULL, '3', '../assets/images/promotions/Primary/62d06193811149.57146889.', 'Primary', 'New Phone Arrival At sales', 250, '../assets/images/promotions/Primary/62d06193811ea1.24251181.pdf', 30, 20, '2022-07-15', '2022-08-07', 'http://localhost/shopingohtml-10/shopingohtml-10/m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`promoid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `promoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
