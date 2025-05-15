-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 08:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `assigned_to` varchar(50) DEFAULT 'chef'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `orders` (`id`, `customer_name`, `order_date`, `created_at`, `created_by`, `status`, `assigned_to`) VALUES
(1, NULL, '2025-04-30 15:57:31', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(2, NULL, '2025-04-30 15:57:35', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(3, NULL, '2025-04-30 15:58:24', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(4, NULL, '2025-04-30 15:59:06', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(5, NULL, '2025-04-30 15:59:09', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(6, NULL, '2025-04-30 15:59:11', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(7, NULL, '2025-04-30 15:59:44', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(8, 'kazim ali', '2025-04-30 16:06:53', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(9, 'Kazim Ali', '2025-04-30 16:10:06', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(10, 'Kazim Ali', '2025-04-30 16:11:33', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(11, 'Kazim Ali', '2025-04-30 16:11:52', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(12, 'Muhammad Khan', '2025-04-30 16:17:44', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(13, 'Muhammad Khan', '2025-04-30 16:18:01', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(14, 'Muhammad Khan', '2025-04-30 16:21:43', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(15, 'Raza Ali', '2025-04-30 16:22:01', '2025-04-30 19:54:16', NULL, 'done', 'chef'),
(16, 'Aryan Khan', '2025-04-30 19:57:29', '2025-04-30 19:57:29', 'kazim', 'done', 'chef'),
(17, 'Aryan Khan', '2025-04-30 19:59:11', '2025-04-30 19:59:11', 'kazim', 'done', 'chef'),
(18, 'rameez', '2025-04-30 20:01:35', '2025-04-30 20:01:35', 'muhammad', 'done', 'chef'),
(19, 'Sardar Kazim Ali', '2025-04-30 20:52:05', '2025-04-30 20:52:05', 'kazim', 'done', 'chef'),
(20, 'Aryan Khan', '2025-04-30 20:54:08', '2025-04-30 20:54:08', 'kazim', 'done', 'chef'),
(21, 'Aryan Khan', '2025-04-30 20:56:02', '2025-04-30 20:56:02', 'kazim', 'done', 'chef'),
(22, 'Aryan Khan', '2025-04-30 20:58:54', '2025-04-30 20:58:54', 'kazim', 'done', 'chef'),
(23, 'jdjad', '2025-04-30 22:10:32', '2025-04-30 22:10:32', 'kazim', 'done', 'chef'),
(24, 'fatima', '2025-05-01 13:36:13', '2025-05-01 13:36:13', 'kazim', 'done', 'chef'),
(25, 'Sardar Kazim Ali', '2025-05-01 15:56:02', '2025-05-01 15:56:02', 'kazim', 'done', 'chef'),
(26, 'Sardar Kazim Ali', '2025-05-01 16:23:24', '2025-05-01 16:23:24', 'kazim', 'done', 'chef'),
(27, 'Sardar Kazim Ali', '2025-05-01 18:12:11', '2025-05-01 18:12:11', 'kazim', 'done', 'chef'),
(28, 'kazim', '2025-05-01 18:24:49', '2025-05-01 18:24:49', 'chef', 'done', 'chef'),
(29, 'Maaz Shah', '2025-05-01 18:44:04', '2025-05-01 18:44:04', 'kazim', 'done', 'chef'),
(30, 'Kazim Ali', '2025-05-01 20:03:06', '2025-05-01 20:03:06', 'kazim', 'done', 'chef'),
(31, 'xyz abc', '2025-05-01 20:06:09', '2025-05-01 20:06:09', 'kazim', 'done', 'chef'),
(32, 'Aryan Khan', '2025-05-01 20:23:04', '2025-05-01 20:23:04', 'kazim', 'done', 'chef'),
(33, 'Sardar Kazim Ali', '2025-05-01 20:25:41', '2025-05-01 20:25:41', 'kazim', 'done', 'chef'),
(34, 'Aryan Khan', '2025-05-01 20:26:13', '2025-05-01 20:26:13', 'kazim', 'done', 'chef'),
(35, 'Aryan Khan', '2025-05-01 20:26:35', '2025-05-01 20:26:35', 'kazim', 'done', 'chef'),
(36, 'Aryan Khan', '2025-05-01 20:26:46', '2025-05-01 20:26:46', 'kazim', 'done', 'chef'),
(37, 'kazim', '2025-05-03 11:47:57', '2025-05-03 11:47:57', 'kazim', 'done', 'chef'),
(38, 'kazim', '2025-05-03 11:57:40', '2025-05-03 11:57:40', 'kazim', 'pending', 'chef'),
(39, 'kazim', '2025-05-04 12:57:03', '2025-05-04 12:57:03', 'kazim', 'done', 'chef');


CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 32),
(2, 1, 2, 50),
(3, 1, 3, 41),
(4, 2, 1, 32),
(5, 2, 2, 50),
(6, 2, 3, 41),
(7, 3, 1, 32),
(8, 3, 2, 50),
(9, 3, 3, 41),
(10, 4, 1, 32),
(11, 4, 2, 50),
(12, 4, 3, 41),
(13, 5, 1, 32),
(14, 5, 2, 50),
(15, 5, 3, 41),
(19, 7, 1, 32),
(20, 7, 2, 50),
(21, 7, 3, 41),
(22, 8, 1, 2),
(23, 8, 2, 12),
(24, 8, 3, 2),
(25, 9, 1, 1),
(26, 9, 2, 1),
(27, 9, 3, 1),
(28, 10, 1, 1),
(29, 10, 2, 1),
(30, 10, 3, 1),
(31, 11, 1, 2),
(32, 11, 2, 2),
(33, 11, 3, 2),
(34, 12, 1, 12),
(35, 13, 1, 15),
(36, 13, 2, 12),
(37, 13, 3, 12),
(38, 14, 1, 15),
(39, 14, 2, 12),
(40, 14, 3, 12),
(41, 15, 1, 60),
(42, 15, 2, 60),
(43, 15, 3, 100),
(44, 16, 12, 2),
(46, 16, 8, 1),
(47, 16, 10, 1),
(48, 16, 9, 1),
(49, 16, 5, 1),
(50, 17, 1, 1),
(51, 17, 4, 1),
(52, 17, 8, 1),
(53, 17, 13, 2),
(54, 17, 9, 2),
(55, 17, 5, 1),
(56, 18, 1, 2),
(57, 18, 4, 2),
(58, 18, 5, 2),
(59, 19, 1, 48),
(60, 19, 2, 12),
(61, 19, 4, 1),
(62, 19, 11, 4),
(63, 19, 10, 1),
(64, 20, 1, 2),
(65, 20, 2, 34),
(66, 20, 4, 5),
(67, 20, 11, 5),
(68, 21, 1, 3),
(70, 21, 8, 57),
(71, 21, 10, 57),
(72, 21, 5, 69),
(73, 22, 1, 40),
(74, 22, 7, 23),
(75, 22, 9, 23),
(76, 23, 1, 2),
(77, 23, 11, 2),
(78, 23, 9, 2),
(79, 24, 1, 1),
(80, 24, 11, 1),
(81, 25, 14, 1),
(82, 25, 4, 1),
(83, 25, 15, 1),
(84, 25, 17, 1),
(85, 25, 9, 1),
(86, 26, 4, 1),
(87, 26, 7, 1),
(88, 26, 15, 1),
(89, 26, 17, 1),
(90, 26, 10, 2),
(91, 27, 2, 2),
(92, 27, 12, 2),
(93, 27, 3, 2),
(94, 27, 17, 1),
(95, 27, 5, 2),
(96, 28, 1, 2),
(97, 28, 5, 2),
(98, 29, 1, 2),
(99, 29, 2, 2),
(100, 29, 17, 3),
(101, 29, 10, 3),
(102, 30, 1, 1),
(103, 30, 14, 1),
(104, 30, 7, 1),
(105, 30, 8, 1),
(106, 30, 10, 1),
(107, 31, 1, 2),
(108, 32, 1, 2),
(109, 33, 1, 2),
(110, 34, 2, 2),
(111, 35, 2, 2),
(112, 36, 2, 2),
(113, 37, 1, 1),
(114, 37, 16, 6),
(115, 37, 15, 6),
(116, 37, 10, 2),
(117, 38, 15, 1),
(118, 39, 4, 2),
(119, 39, 15, 2);



CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Apple', 200.00, 'Apple.jpg'),
(2, 'Banana', 200.00, 'Banana.jpg'),
(3, 'Orange', 400.00, 'Orange.jpg'),
(4, 'Cheeseburger', 600.00, 'Cheese Burger.jpg'),
(5, 'Veggie Burger', 400.00, 'Veggie Burger.jpg'),
(7, 'French Fries', 200.00, 'Fries.jpg'),
(8, 'Onion Rings', 300.00, 'Onion Rings.jpg'),
(9, 'Soda (Small)', 150.00, 'Small Soda.jpg'),
(10, 'Soda (Large)', 250.00, 'Large Soda.jpg'),
(11, 'Milkshake', 450.00, 'Milkshake.jpg'),
(12, 'Chicken Nuggets (6 pcs)', 600.00, 'Nuggets.jpg'),
(13, 'Pizza Slice', 200.00, 'Pizza Slice.jpg'),
(14, 'Biryani', 350.00, 'Biryani.jpg'),
(15, 'Naan', 50.00, 'Naan.jpg'),
(16, 'Chapli Kebab', 120.00, 'Chapli Kabab.jpg'),
(17, 'Seekh Kebab', 100.00, 'Seekh Kabab.jpg');


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'kazim', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'customer'),
(2, 'muhammad', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'customer'),
(3, 'chef', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'customer'),
(16, 'rameez', '12345', 'chef');


ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);


ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);


ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;


ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;


ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;


ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
