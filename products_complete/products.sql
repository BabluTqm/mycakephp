-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2023 at 06:36 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `product_category_id` int NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_tags` text NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_title`, `product_description`, `product_category_id`, `product_image`, `product_tags`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Samsung', 'Samsung Group,[3] or simply Samsung (Korean: 삼성 [samsʌŋ]), is a South Korean multinational manufacturing conglomerate headquartered in Samsung Town, Seoul, South Korea.[1] It comprises numerous affiliated businesses,[1] most of them united under the Samsung brand, and is the largest South Korean chaebol (business conglomerate). As of 2020, Samsung has the eighth highest global brand value.', 1, 'images2.jpeg', 'Samsuung Mobile', '1', '2023-02-06 12:35:39', NULL),
(2, 'Nokia', 'Nokia Corporation (natively Nokia Oyj, referred to as Nokia)[a] is a Finnish multinational telecommunications, information technology, and consumer electronics corporation, established in 1865. Nokia\'s main headquarters are in Espoo, Finland, in the greater Helsinki metropolitan area,[3] but the company\'s actual roots are in the Tampere region of Pirkanmaa.', 1, 'images.jpeg', 'Nokia', '1', '2023-02-06 12:36:44', NULL),
(12, 'Samsung', 'fhdhh', 1, 'images.jpeg', 'ghgfg', '1', '2023-02-06 13:17:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1' COMMENT '1 is active, 0 is deactive',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `status`, `created_date`) VALUES
(1, 'Electronics', '1', '2023-02-06 11:37:10'),
(2, 'Mobile Assosiries', '1', '2023-02-06 11:37:15'),
(4, 'Shoes', '1', '2023-02-06 11:38:36'),
(5, 'Sliper', '1', '2023-02-06 12:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comments` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `comments`, `created_date`, `modified_date`) VALUES
(2, 12, 3, 'hi, this is such a nice mobile ....', '2023-02-07 05:52:02', '2023-02-07 06:40:22'),
(3, 7, 3, 'hiiiii', '2023-02-07 05:53:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1' COMMENT '1 is user,0 is admin',
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1' COMMENT '1 is active, 0 is deactive',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_type`, `status`, `created_date`, `modified_date`) VALUES
(1, 'yadavblu381@gmail.com', '$2y$10$FXD7PRkguLHUmBhWer/ZSOol7KaEzaaMKJJxTNNzPB0I/h7PGv2Z.', '0', '1', '2023-02-06 10:07:27', '2023-02-06 15:39:01'),
(2, 'ak@gmail.com', '$2y$10$IDW8mxpvyGqQ/qFTw37wA.3b6lHjatMmLgxTosBYpVAB54z0mgjaa', '1', '1', '2023-02-06 10:08:22', '2023-02-07 12:51:42'),
(3, 'sana@gmail.com', '$2y$10$dwyNWsT1yx0GphI7axKX5..QYvI5SgTzvSQpT1ueFqGobYTQSN.m6', '1', '1', '2023-02-06 10:59:24', '2023-02-07 12:51:33'),
(6, 'sonali@gmail.com', '$2y$10$x5Jo9FhDF4o/FL8Jh1ZFaOIoAJDX2F/cDnwRz18VwGE8aeANjdt8S', '1', '0', '2023-02-07 11:56:39', '2023-02-07 12:51:26'),
(7, 'deep@gmail.com', '$2y$10$ktGHdKhxFPsGna1KUFtjOOhihN0XI1hbZJe2giLn6Mn9il1CpkXuu', '1', '0', '2023-02-07 11:59:19', '2023-02-07 13:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `first_name`, `last_name`, `contact`, `address`, `profile_image`, `created_date`, `modified_date`) VALUES
(1, 1, 'Bablu', 'Kumar', '8587123654', 'Gopalganj', '81364.gif', '2023-02-06 10:07:27', '2023-02-07 06:17:42'),
(2, 2, 'Akshay', 'Jaggi', '9955664011', 'Punjab', 'images.jpeg', '2023-02-06 10:08:22', '2023-02-07 06:09:44'),
(3, 3, 'Sana', 'Negi', '9874563211', 'Shimla', 'saffdgfg.jpg', '2023-02-06 10:59:24', '2023-02-07 11:55:35'),
(4, 4, 'Rahul', 'Kumar yyy', '8874569852', 'Siwan', '', '2023-02-06 12:59:23', '2023-02-07 04:09:48'),
(5, 5, 'Manish', 'Kumar', '7845123658', 'Bihar', '', '2023-02-06 13:01:43', '2023-02-07 04:09:20'),
(6, 6, 'Sonali', 'Singh', '8574123545', 'Bhopal', 'saffdgfg.jpg', '2023-02-07 11:56:39', NULL),
(7, 7, 'Deepankar', 'Rao', '9874563214', 'Punjab', 'download.jpeg', '2023-02-07 11:59:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
