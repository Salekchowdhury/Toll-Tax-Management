-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 11:06 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_toll_tax_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `emailtoken` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `image`, `emailtoken`, `phone`, `address`) VALUES
(2, 'md. parvez', 'shahriarparvez@gmail.com', '123456', '../../contents/img/4674toll.jpg', NULL, '01874526322', 'Hathazari,ctg');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notice` text NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice`, `time`, `date`) VALUES
(1, 'The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets,The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets,The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets,', '13:20:01', '2021-08-21'),
(2, 'The passage experienced a surge in popularity during the 1960s ', '23:28:25', '2021-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `transaction_id` text DEFAULT NULL,
  `vehicle_type` text DEFAULT NULL,
  `vehicle_no` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` text DEFAULT 'unseen',
  `token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `name`, `amount`, `phone`, `transaction_id`, `vehicle_type`, `vehicle_no`, `date`, `status`, `token`) VALUES
(1, 2, 'Shahriar Parvez', 130, ' 01874524178', 'trty76yuiu', 'Bus', 'T-2172TS', '2021-08-28', 'seen', NULL),
(2, 2, 'Shahriar Parvez', 140, '01841203698', '46rt6y7u', 'Cargo Van', 'S-7uy8236', '2021-08-28', 'seen', 136051);

-- --------------------------------------------------------

--
-- Table structure for table `toll`
--

CREATE TABLE `toll` (
  `toll_id` int(11) NOT NULL,
  `driver_name` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `vehicle_type` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `vehicle_no` text DEFAULT NULL,
  `token` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` text NOT NULL DEFAULT 'no',
  `checkprint` text NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toll`
--

INSERT INTO `toll` (`toll_id`, `driver_name`, `amount`, `vehicle_type`, `phone`, `vehicle_no`, `token`, `date`, `status`, `checkprint`) VALUES
(6, 'amir', '60', 'Bus', '01874526374', 'T-859674', '185339', '2021-08-23', 'no', 'no'),
(7, 'amir', '60', 'CNG', '01874526321', 'T-859674', '495027', '2021-08-23', 'yes', 'no'),
(8, 'parvez', '130', 'Microbus', '01874526321', 'S-8596123', '927792', '2021-08-23', 'yes', 'no'),
(39, 'MD Imran Hasan', '130', 'Pick Up', '01874859623', 'S-8596148', '387103', '2021-08-25', 'no', 'no'),
(42, 'MD Imran Hasan', 'Advance', 'Cargo Van', '01874526374', 'T-859674', '740552', '2021-08-26', 'yes', 'no'),
(47, 'Shahriar Parvez', '140', 'Cargo Van', '01841203698', 'S-7uy8236', '136051', '2021-08-28', 'no', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `emailtoken` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `payment` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` text DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `position`, `image`, `address`, `bio`, `emailtoken`, `phone`, `payment`, `date`, `status`) VALUES
(2, 'Shahriar Parvez', 'salek.ctg2@gmail.com', '12345678', 'owner', '../../contents/img/9557m1.jpg', 'Bahddar Hat,ctg', 'Cicero are also reproduced in their exact original form', 'yes', '01817451896', 'yes', NULL, 'yes'),
(3, 'Md. parvez', 'parvez123@gmail.com', '12345', 'staff', '../../contents/img/4276toll2.png', 'Hathazari,ctg', 'Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham', NULL, '01874526321', NULL, NULL, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `vehicle_no` text DEFAULT NULL,
  `vehicle_type` text DEFAULT NULL,
  `driver_name` text DEFAULT NULL,
  `owner_name` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` text NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `vehicle_no`, `vehicle_type`, `driver_name`, `owner_name`, `phone`, `date`, `status`) VALUES
(1, 'T-859674', 'Cargo Van', 'MD Imran Hasan', 'MD Amir Hossain', '01874526374', '2021-08-25', 'no'),
(4, 'S-8596123', 'Bus', 'parvez', 'MD Amir chy', '01874526321', '2021-08-25', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `toll`
--
ALTER TABLE `toll`
  ADD PRIMARY KEY (`toll_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `toll`
--
ALTER TABLE `toll`
  MODIFY `toll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
