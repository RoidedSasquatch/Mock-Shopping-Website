-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 06:33 AM
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
-- Database: `webprogramazon`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `category` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category`, `price`, `quantity`, `image`, `created`, `updated`) VALUES
(1, 'Neatly Folded Jeans', 2, 14.99, 20, 'jeans.png', '2024-03-31 04:22:14', '2024-03-31 01:18:04'),
(2, 'Reheated Pizza Slice', 4, 1.99, 100, 'pizza.png', '2024-03-31 04:22:15', '2024-03-31 01:18:22'),
(3, 'Coca Cola', 1, 2.99, 200, 'coke.png', '2024-03-31 04:22:16', '2024-03-31 01:18:40'),
(4, 'Demonslayer Hoodie', 2, 69.99, 20, 'kimetsu-no-yaiba.png', '2024-03-31 04:22:17', '2024-03-31 01:18:59'),
(5, 'Ugly Christmas Sweater', 2, 29.99, 10, 'sweater.png', '2024-03-31 04:22:18', '2024-03-31 01:19:11'),
(6, 'Laptop', 3, 1499.99, 5, 'laptop.png', '2024-03-31 04:22:19', '2024-03-31 01:19:31'),
(7, 'Sliced Bread', 4, 9.99, 400, 'bread.png', '2024-03-31 04:22:20', '2024-03-31 01:19:56'),
(8, 'WoW 60 Day Subscription', 5, 29.99, 50, 'wow-sub.png', '2024-03-31 04:22:21', '2024-03-31 01:20:08'),
(9, 'GFuel PewDiePie Edition', 1, 35.99, 100, 'pewdiepie-gfuel.png', '2024-03-31 04:22:22', '2024-03-31 01:20:27'),
(10, 'Doritos (Zesty Morton)', 4, 4.99, 200, 'doritos.png', '2024-03-31 04:22:23', '2024-03-31 01:20:36'),
(11, 'Mountain Dew', 1, 2.99, 200, 'mountain-dew.png', '2024-03-31 04:22:24', '2024-03-31 01:20:47'),
(12, 'Gaming Chair', 5, 499.99, 5, 'gaming-chair.png', '2024-03-31 04:22:25', '2024-04-01 02:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(350) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `province` varchar(100) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`, `address`, `city`, `province`, `postal_code`, `is_admin`, `created`, `updated`) VALUES
(3, 'Dan Blais', 'blai0327@algonquinlive.com', '$2y$10$xT7zlhLAiod98xHSSC0MVOHWRarreE3BASgxWc2XrBtZaOUtfR9wq', '123 Fake Street', 'Ottawa', 'Ontario', 'K1R5L9', 1, '2024-03-30 04:30:06', '2024-03-30 00:30:06'),
(4, 'Imed Eddine Cherabi', 'imedcherabi@gmail.com', '$2y$10$PePqqoqzrZ.kZ8IaxYtCmuGp21rxfTce8nQXL3noGr23NqJLnDs8W', '123 Fake Road', 'Ottawa', 'Ontario', 'K5T6J0', 0, '2024-04-02 21:17:52', '2024-04-02 17:17:52'),
(6, 'Prince Apau', 'apau0001@algonquinlive.com', '$2y$10$dIgBDg4JOrrHJHL23nhopeDRLXngEO6osnqckdLqQzQ1E545SXFtC', '123 Fake Avenue', 'Ottawa', 'Ontario', 'K5T6J0', 0, '2024-04-02 21:20:08', '2024-04-02 17:20:08'),
(26, 'Walter White', 'WWhite@camperrv.com', '$2y$10$5cwZcqzICTrNiLOtvNAFleFjb77GRsOTSXb1HOvFuAz0MBOj7Zfj.', '308 Negra Arroyo Lane', 'Albuquerque', 'Alberta', 'K1R5L9', 0, '2024-04-06 01:05:07', '2024-04-05 21:05:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
