-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 05:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webnode`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `creation_date`, `name`, `amount`, `currency`, `status`) VALUES
(1, '2025-02-10 01:30:20', 'Order 1', 100.00, 'USD', 'pending'),
(2, '2025-02-10 01:30:20', 'Order 2', 200.50, 'EUR', 'completed'),
(3, '2025-02-10 01:30:20', 'Order 3', 150.00, 'USD', 'pending'),
(4, '2025-02-10 01:30:20', 'Order 4', 250.75, 'EUR', 'completed'),
(5, '2025-02-10 01:30:20', 'Order 5', 120.00, 'USD', 'pending'),
(6, '2025-02-10 01:30:20', 'Order 6', 300.00, 'EUR', 'completed'),
(7, '2025-02-10 01:30:20', 'Order 7', 50.00, 'USD', 'pending'),
(8, '2025-02-10 01:30:20', 'Order 8', 180.00, 'EUR', 'completed'),
(9, '2025-02-10 01:30:20', 'Order 9', 95.00, 'USD', 'pending'),
(10, '2025-02-10 01:30:20', 'Order 10', 400.00, 'EUR', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `name`, `amount`) VALUES
(1, 1, 'Item 1 for Order 1', 50.00),
(2, 1, 'Item 2 for Order 1', 50.00),
(3, 2, 'Item 1 for Order 2', 100.00),
(4, 2, 'Item 2 for Order 2', 100.50),
(5, 3, 'Item 1 for Order 3', 75.00),
(6, 3, 'Item 2 for Order 3', 75.00),
(7, 4, 'Item 1 for Order 4', 125.00),
(8, 4, 'Item 2 for Order 4', 125.75),
(9, 5, 'Item 1 for Order 5', 60.00),
(10, 5, 'Item 2 for Order 5', 60.00),
(11, 6, 'Item 1 for Order 6', 150.00),
(12, 6, 'Item 2 for Order 6', 150.00),
(13, 7, 'Item 1 for Order 7', 50.00),
(14, 8, 'Item 1 for Order 8', 90.00),
(15, 8, 'Item 2 for Order 8', 90.00),
(16, 9, 'Item 1 for Order 9', 47.50),
(17, 9, 'Item 2 for Order 9', 47.50),
(18, 10, 'Item 1 for Order 10', 200.00),
(19, 10, 'Item 2 for Order 10', 200.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
