-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2021 at 05:25 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `description`, `price`, `user_id`) VALUES
(1, 'sofaset', '1619043935_1598442383_0_product_image.jpg', 'sofaset', 787, 1),
(5, 'mm5', 'http://localhost/employeeregistrationscookie//images/1619035731_1600056326_artist_image.jpg', 'nn', 89, 5),
(6, 'Table Lamp', '1619043723_1598449607_0_product_image.jpg', 'Table Lamp', 897, 1),
(11, 'mm', '', 'mm6', 783, 11),
(12, 'sofaset', '1619046702_1598442383_0_product_image.jpg', 'mm', 78, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `phoneno`) VALUES
(1, 'Chirashree Bhaduri', 'mail2chirashree@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8334927302'),
(2, 'chira', 'asima@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8543219023'),
(3, 'mm', 'mail28chirashree3@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8765432190'),
(4, 'Chennai', 'mail2chirashree5@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8365432190'),
(5, 'Rahana', 'mailrahana@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8334927306'),
(6, 'Rima', 'mail287chirashree5@gmail.com', 'f8ffaaa80a664b8e77804867e9baac47', '9836841056');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
