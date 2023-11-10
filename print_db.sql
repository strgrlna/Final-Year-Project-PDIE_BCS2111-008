-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2023 at 08:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `print_db`
--
CREATE DATABASE IF NOT EXISTS `print_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `print_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` varchar(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
('01', 'aina', '111'),
('253', 'hassan', 'hassan7'),
('2535', 'Dheos', 'rose');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `method` varchar(50) NOT NULL,
  `total_products` varchar(10000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `reservation` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `notes` varchar(1000) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`user_id`, `name`, `number`, `email`, `method`, `total_products`, `total_price`, `placed_on`, `reservation`, `status`, `notes`, `id`) VALUES
(2637, 'hassan', '0157382673', 'this7@gmail.com', 'Online Banking', 'Black & White prints (1 x 1) - Glossy Paper (2 x 899) - ', 1799, '2023-11-09', '2:30 PM (FRIDAY)', 'approved', 'wrap in a plastic please, thank you!', 13),
(2637, 'hassan', '0157382673', 'this7@gmail.com', 'Online Banking', 'Black & White prints (1 x 1) - A3 Paper (42cm x 30cm) (1 x 50) - Plastic Cover (1 x 2) - Coil Binding (3 x 1) - Colour prints (2 x 1) - ', 58, '2023-11-09', '2:30 PM (WEDNESDAY)', 'approved', '-', 14),
(2637, 'hassan', '0157382673', 'this7@gmail.com', 'Online Banking', 'Black & White prints (1 x 1) - Photocopy/Print (0 x 1) - Colour prints (2 x 1) - ', 3, '2023-11-09', '3 PM (TUESDAY)', 'pending', '-', 15),
(5521, 'Hilman Ukasyah', '0146362463', 'hilmanukasyah@gmail.com', 'Online Banking', 'Black & White prints (1 x 45) - Regular Matte Paper (0 x 1) - Plastic Cover (1 x 1) - Comb Binding (2 x 1) - Photocopy/Print (0 x 1) - Colour prints (2 x 1) - ', 50, '2023-11-09', '11 AM (TUESDAY)', 'pending', '-', 16);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `qty`, `price`, `image`) VALUES
(0, 'Black & White prints', 'Print Ink', 3000, '1', 'bw.jpg'),
(4, 'A0 Paper (118cm x 84cm)', 'Paper Size', 100, '3', 'a3.jpg'),
(6, 'A1 Paper (84cm x 59cm)', 'Paper Size', 450, '2', 'a3.jpg'),
(7, 'A2 Paper (59cm x 42cm)', 'Paper Size', 450, '1', 'a3.jpg'),
(8, 'A3 Paper (42cm x 30cm)', 'Paper Size', 400, '1', 'a3.jpg'),
(9, 'A4 Paper (21cm x 29.7cm)', 'Paper Size', 500, '0', 'a3.jpg'),
(10, 'Glossy Paper', 'Paper Type', 150, '2', 'glos.jpg'),
(11, 'Regular Matte Paper', 'Paper Type', 150, '0', 'regu.jpg'),
(12, 'Heavyweight Paper', 'Paper Type', 150, '4', 'heav.jpg'),
(13, 'Plastic Cover', 'Add On', 200, '1', 'cov.jpg'),
(14, 'Coil Binding', 'Add On', 100, '3', 'coil.jpg'),
(15, 'Comb Binding', 'Add On', 100, '2', 'comb.jpg'),
(16, 'Tape Binding', 'Add On', 100, '1', 'tape.jpg'),
(17, 'Laminate', 'Add On', 100, '1', 'lami.jpg'),
(18, 'Compiling', 'Service', 100, '1', 'file.jpg'),
(19, 'Sticker Paper', 'Paper Type', 300, '2', 'stick.jpg'),
(20, 'Bunting stand (2inch x 6 inch)', 'Banner Bunting', 250, '60', 'bunting.png'),
(21, 'Bunting stand (2inch x 3 inch)', 'Banner Bunting', 312, '48', 'bunting.png'),
(22, 'Bunting stand (3inch x 3 inch)', 'Banner Bunting', 20, '75', 'bunting.png'),
(23, 'Bunting stand (3inch x 7 inch)', 'Banner Bunting', 70, '90', 'bunting.png'),
(24, 'Bunting Synthetic (2ft x 3ft)', 'Banner Bunting', 15, '48', 'syn.jpg'),
(25, 'Roll up Bunting (200cm x 80cm)', 'Banner Bunting', 310, '130', 'roll.jpg'),
(26, 'Banner T-Stand', 'Banner Bunting', 10, '25', 'tstand.jpeg'),
(27, 'Banner X-Stand', 'Banner Bunting', 40, '29', 'xstand.jpg'),
(243, 'Tent Card (Glossy A5)', 'Print Type', 2100, '6', 'tent.jpg'),
(244, 'Tent Card (Matte A5)', 'Print Type', 2300, '5', 'tent.jpg'),
(353, 'Poster', 'Print Type', 2453, '15', 'post.jpg'),
(354, 'Photocopy/Print', 'Service', 1000, '0', 'photostat.jpg'),
(463, 'Envelope', 'Add On', 1355, '3', 'en.jpg'),
(6473, 'Colour prints', 'Print Ink', 2000, '2', 'color.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`) VALUES
(2637, 'hassan', 'this7@gmail.com', '0157382673', 'hassan7'),
(5521, 'Hilman Ukasyah', 'hilmanukasyah@gmail.com', '0146362463', 'hilman'),
(6536, 'mingyu', 'gyugyu@gmail.com', '0153748933', 'gyu10'),
(7536, 'Ahmad Shah', 'amadpekan@gmail.com', '0186277317', 'amad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;


-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
