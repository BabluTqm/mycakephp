-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 08:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eibo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` int(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `email`, `password`) VALUES
(1, 'me@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `userid` int(45) NOT NULL,
  `paymentid` int(45) NOT NULL,
  `amount` int(45) NOT NULL,
  `remark` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`userid`, `paymentid`, `amount`, `remark`) VALUES
(3, 1, 1111, 'abcd'),
(3, 2, 1234, 'axdcd'),
(3, 3, 1234, 'AAAA'),
(3, 4, 1111, 'zsdddssd'),
(3, 5, 10000, 'car purpose'),
(3, 6, 150000, 'Study');

-- --------------------------------------------------------

--
-- Table structure for table `profile_task`
--

CREATE TABLE `profile_task` (
  `userid` int(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `profilepic` varchar(250) NOT NULL DEFAULT 'default-img.jpg',
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `about` varchar(300) NOT NULL,
  `regdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_task`
--

INSERT INTO `profile_task` (`userid`, `name`, `fname`, `profilepic`, `mobile`, `email`, `address`, `username`, `password`, `about`, `regdate`) VALUES
(7, 'RAJ', '', 'default-img.jpg', '9876543214', 'raj@gmail.com', 'Siwan', 'raj123', '123', 'Hello', '2022-12-08 16:01:46'),
(26, '', '', 'default-img.jpg', '', '', '', '', '', '', '2022-12-08 18:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `password` varchar(16) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `created_date` varchar(6) DEFAULT current_timestamp(),
  `modify_date` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `gender`, `created_date`, `modify_date`) VALUES
(1, 'Raj', 'Kumar', 'raj@gmail.com', '9874563314', '123', '', NULL, NULL),
(2, 'Raj', 'Kumar', 'raj@gmail.com', '9874563314', '111', '', NULL, '2022-12-08 19:03:27.070858');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `profile_task`
--
ALTER TABLE `profile_task`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile_task`
--
ALTER TABLE `profile_task`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
