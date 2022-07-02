-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 04:11 PM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `store_request`
--

CREATE TABLE `store_request` (
  `id` int(128) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone_no` int(255) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `address` varchar(255) NOT NULL,
  `store_name` varchar(128) NOT NULL,
  `store_address` varchar(255) NOT NULL,
  `co_ordinates` varchar(128) NOT NULL,
  `files` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_request`
--

INSERT INTO `store_request` (`id`, `firstname`, `lastname`, `email`, `phone_no`, `username`, `password`, `address`, `store_name`, `store_address`, `co_ordinates`, `files`) VALUES
(2, 'Mayur', 'Khadde', 'mayur@gmail.com', 2147483647, 'mayur', 'amuhshdgjsdghs', 'ghjksertyuiojhgfdsertyujhgfds', 'mayur', 'askdjksdhkjsdk@gmail.com', '362783823293238232', '62baff89c90cf0.81455424.jpg&62baff89c93a21.82473202.jpg&62baff89c95f91.85517942.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store_request`
--
ALTER TABLE `store_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store_request`
--
ALTER TABLE `store_request`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
