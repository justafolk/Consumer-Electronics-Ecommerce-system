-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 07:31 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `U_id` int(128) NOT NULL,
  `Prod_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`U_id`, `Prod_id`) VALUES
(3, 1),
(3, 4),
(3, 5),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `productdb`
--

CREATE TABLE `productdb` (
  `Prod_id` int(11) NOT NULL,
  `image_loc` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `launch_d` date DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `specification` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `hits` int(11) NOT NULL,
  `buy_count` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `Tags` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productdb`
--

INSERT INTO `productdb` (`Prod_id`, `image_loc`, `title`, `launch_d`, `description`, `specification`, `price`, `hits`, `buy_count`, `category`, `Tags`) VALUES
(1, 'assets/images/Upload/Mobiles/1.png&assets/images/Upload/Mobiles/2.png&assets/images/Upload/Mobiles/3.png&assets/images/Upload/Mobiles/4.png&assets/images/Upload/Mobiles/5.png', 'SAMSUNG Galaxy S20+ (Cosmic Black, 128 GB)  (8 GB RAM)', '2022-05-21', 'Say hello to the powerful and stylish Samsung Galaxy S20+ smartphone. Featuring a 64 MP high-resolution camera with 30X Zoom, you can capture stunning photos like never before on this smartphone. It also comes with a long-lasting 4500 mAh battery so you c', 'None', 54999, 60, 40000, 'phone', 'Smartphone&Android 10&Octa Core&64 GB ROM&4 GB RAM&2.3Hz Clock Speed&512 Expandable storage&5MP front camera&Dual Sim&Royal Blue&HD+&MIUI 12'),
(2, 'assets/images/Upload/Mobiles/1.png&assets/images/Upload/Mobiles/2.pngassets/images/Upload/Mobiles/3.pngassets/images/Upload/Mobiles/4.pngassets/images/Upload/Mobiles/5.png', 'SAMSUNG Galaxy S20+ (Cosmic Black, 128 GB)  (8 GB RAM)', '2022-05-21', 'Say hello to the powerful and stylish Samsung Galaxy S20+ smartphone. Featuring a 64 MP high-resolution camera with 30X Zoom, you can capture stunning photos like never before on this smartphone. It also comes with a long-lasting 4500 mAh battery so you c', 'None', 54999, 59, 40000, 'phone', 'Smartphone&Android 10&Octa Core&64 GB ROM&4 GB RAM&2.3Hz Clock Speed&512 Expandable storage&5MP front camera&Dual Sim&Royal Blue&HD+&MIUI 12'),
(3, 'assets/images/Upload/Laptop/1.png&assets/images/Upload/Laptop/2.png&assets/images/Upload/Laptop/3.png&assets/images/Upload/Laptop/4.png&assets/images/Upload/Laptop/5.png&assets/images/Upload/Laptop/6.png&assets/images/Upload/Laptop/7.png&assets/images/Upl', 'ASUS ROG Strix G15 Ryzen 9 Octa Core 5900HX', '2022-05-21', '16 GB/512 GB SSD/Windows 10 Home/4 GB Graphics/NVIDIA GeForce RTX 3050 Ti, G513QE-HN166TS Gaming Laptop, 15.6 inch, Eclipse Gray, 2.10 kg.', 'None', 97990, 60, 40000, 'laptop', NULL),
(4, 'assets/images/Upload/Headphones/1.png&assets/images/Upload/Headphones/2.png&assets/images/Upload/Headphones/3.png&assets/images/Upload/Headphones/4.png&assets/images/Upload/Headphones/5.png&assets/images/Upload/Headphones/6.png', 'boAt Rockerz 370 Bluetooth Headset', '2022-05-21', 'If you are looking for a wallet-friendly wireless headset then this boAt headset is ideal for you. A complete charging session ensures that you receive a playback time of up to 8 hours. Moreover, it allows wired and wireless connectivity with AUX and Blue', 'None', 999, 60, 40000, 'headphone', NULL),
(5, 'assets/images/Upload/Tablet/1.png&assets/images/Upload/Tablet/2.png&assets/images/Upload/Tablet/3.png&assets/images/Upload/Tablet/4.png&assets/images/Upload/Tablet/5.png&assets/images/Upload/Tablet/6.png&assets/images/Upload/Tablet/7.png&assets/images/Upl', 'APPLE iPad Air (5th gen)', '2022-05-21', '64 GB ROM 10.9 Inch with Wi-Fi Only (Space Grey).', 'None', 54990, 60, 40000, 'tablet', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `U_id` int(128) NOT NULL,
  `Prod_id` int(128) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `ratings` int(128) DEFAULT NULL,
  `Message` varchar(256) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`U_id`, `Prod_id`, `firstname`, `lastname`, `ratings`, `Message`, `date`) VALUES
(1, 1, 'Mayur', 'Khadde', 4, '\r\n    Pros :\r\n    1. Colour and design.\r\n    2. Big display at low price.\r\n    3. Camera as expected at this price range.\r\n    4. Battery is good. Lasting almost 1.5 days.\r\n\r\n    Cons :\r\n    1. Working slow.\r\n    2. Ram management is not upto the mark.\r\n  ', '2022-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` int(100) DEFAULT NULL,
  `password1` varchar(128) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(124) DEFAULT NULL,
  `zip_code` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `password1`, `city`, `address`, `zip_code`) VALUES
(1, 'Mayur', 'Khadde', 'mayur.194029@gmail.com', 2147483647, 'Mayur@12345', 'Maharashtra', NULL, NULL),
(2, 'Avdhut ', 'Kamble', 'avdhut.kamble@gmail.com', 2147483647, 'mayur@1234', 'Goa', NULL, NULL),
(3, 'Mayur', 'Khadde', 'mayur.194028@gmail.com', 2147483647, '$2y$10$XTgUtmhB6tRimTqhxanyEeqamnqdXhbJ1RkP4gr.OwP2v1PlUDwbW', 'Goa', NULL, NULL),
(4, 'Mayur', 'Khadde', 'mayur@gmail.com', 2147483647, '$2y$10$JAFZTan5UqoeUprI9DRRmOwp8JsXw4hBWBiPqMT4jvD2Ho7GUHWsm', 'Maharashtra', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `Prod_id` int(255) NOT NULL,
  `c_id` int(255) NOT NULL,
  `Wish_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productdb`
--
ALTER TABLE `productdb`
  ADD PRIMARY KEY (`Prod_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`Prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productdb`
--
ALTER TABLE `productdb`
  MODIFY `Prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
