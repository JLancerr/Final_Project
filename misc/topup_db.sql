-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2025 at 02:52 PM
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
-- Database: `topup_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `game_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `game_name`) VALUES
(100000, 'Genshin Impact'),
(100001, 'Mobile Legends'),
(100002, 'Call of Duty: Mobile'),
(100003, 'PUBG Mobile'),
(100004, 'Valorant'),
(100005, 'Honor of Kings');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `game_id`, `product_name`, `price`) VALUES
(100000, 100000, '60 Genesis Crystals', 55),
(100001, 100000, '330 Genesis Crystals', 280),
(100002, 100000, '1090 Genesis Crystals', 830),
(100003, 100000, '2240 Genesis Crystals', 1670),
(100004, 100000, '3880 Genesis Crystals', 2800),
(100005, 100000, '8080 Genesis Crystals', 5500),
(100006, 100001, '56 Diamonds', 48),
(100007, 100001, '112 Diamonds', 95),
(100008, 100001, '223 Diamonds', 190),
(100009, 100001, '336 Diamonds', 285),
(100010, 100001, '570 Diamonds', 475),
(100011, 100001, '1163 Diamonds', 950),
(100012, 100001, '2398 Diamonds', 1900),
(100013, 100001, '6042 Diamonds', 4750),
(100014, 100002, '16 COD Points', 10),
(100015, 100002, '32 COD Points', 20),
(100016, 100002, '80 COD Points', 50),
(100017, 100002, '160 COD Points', 100),
(100018, 100002, '320 COD Points', 200),
(100019, 100002, '480 COD Points', 300),
(100020, 100002, '800 COD Points', 500),
(100021, 100002, '1600 COD Points', 1000),
(100022, 100003, '60 UC', 47),
(100023, 100003, '325 UC', 235),
(100024, 100003, '660 UC', 470),
(100025, 100003, '1800 UC', 1175),
(100026, 100003, '3850 UC', 2350),
(100027, 100003, '8100 UC', 4700),
(100028, 100004, '475 VP', 199),
(100029, 100004, '1000 VP', 399),
(100030, 100004, '2050 VP', 799),
(100031, 100004, '3650 VP', 1399),
(100032, 100004, '5350 VP', 1999),
(100033, 100004, '11000 VP', 3999),
(100034, 100005, '80 Tokens', 56),
(100035, 100005, '240 Tokens', 180),
(100036, 100005, '400 Tokens', 300),
(100037, 100005, '560 Tokens', 420),
(100038, 100005, '830 Tokens', 559),
(100039, 100005, '1245 Tokens', 890),
(100040, 100005, '2508 Tokens', 1800),
(100041, 100005, '4180 Tokens', 3000),
(100042, 100005, '8360 Tokens', 5588);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `account_id` varchar(50) DEFAULT NULL COMMENT 'In-game ID',
  `purchase_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `user_id`, `game_id`, `product_id`, `account_id`, `purchase_date`) VALUES
(100020, 100040, 100000, 100005, '123', '2025-06-09'),
(100021, 100040, 100000, 100000, '123', '2025-06-10'),
(100022, 100040, 100000, 100000, 'asdasd', '2025-06-10'),
(100023, 100040, 100000, 100000, '22222222222222222222222222222222222222222222222222', '2025-06-10'),
(100024, 100040, 100000, 100000, '22222222222222222222222222222222222222222222222222', '2025-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `points` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `name`, `points`) VALUES
(100040, 'test@gmail.com', '$2y$10$m48aY6Im0bTCM7Ouzn.QdeASgM0YBzVNXOWIJCEOhEVxwFY5UxSt6', 'AyakaIsMid', 0.37);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100006;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100043;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100025;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100041;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
