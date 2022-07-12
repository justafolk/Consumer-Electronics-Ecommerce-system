-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 07:31 AM
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
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `seller_email` varchar(255) NOT NULL,
  `seller_phone` varchar(255) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `seller_address` varchar(255) DEFAULT NULL,
  `store_name` varchar(128) NOT NULL,
  `store_address` varchar(255) NOT NULL,
  `store_location` varchar(255) DEFAULT NULL,
  `seller_verification` varchar(255) DEFAULT NULL,
  `files` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `tot_off_rev` varchar(255) DEFAULT NULL,
  `tot_onli_rev` varchar(255) DEFAULT NULL,
  `tot_cus_ser` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `seller_name`, `seller_email`, `seller_phone`, `username`, `password`, `seller_address`, `store_name`, `store_address`, `store_location`, `seller_verification`, `files`, `date`, `rating`, `tot_off_rev`, `tot_onli_rev`, `tot_cus_ser`) VALUES
(1, 'Mayur Khadde', 'mayur.194029@gmail.com', '7507738781', 'mayur', 'khadde', 'Bhosari, Pune', 'Mayur Technologies', 'Kasarwadi, Pune', '411039322', 'Verified', 'Files', '2022-03-21', '4.7', '4834000', '10393008', '15237'),
(2, 'Avdhut Kamble', 'Avdhut.194033@gmail.com', '7378238781', 'Avdhut', 'Kamble', 'Yerwada, Pune', 'Avdhut Technologies', 'CWIT, Pune', '417861001', 'Verified', 'Files', '2022-03-21', '4.5', '237827382', '38273632', '12227'),
(3, 'Hrishikesh Chaudhari', 'hrishikesh.194034@gmail.com', '7507738237', 'Hrishikesh', 'Chaudhari', 'kataraj, Pune', 'Hrishikesh Technologies', 'Shivajinagar, Pune', '411343038', 'Verified', 'Files', '2022-03-21', '4.2', '4832322524', '10122393', '11227');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
