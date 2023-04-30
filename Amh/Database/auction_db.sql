-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2020 at 07:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid_history`
--

CREATE TABLE `bid_history` (
  `history_id` int(50) NOT NULL,
  `bid_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bid_info`
--

CREATE TABLE `bid_info` (
  `bid_id` int(50) NOT NULL,
  `ID` int(50) NOT NULL,
  `product_Id` int(50) NOT NULL,
  `bid_date` date NOT NULL,
  `bid_amount` int(255) DEFAULT 0,
  `bid_status` int(1) NOT NULL,
  `shipment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bid_shipment`
--

CREATE TABLE `bid_shipment` (
  `shipment_id` int(50) NOT NULL,
  `shipment_date` date NOT NULL,
  `shipment_place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_ID` int(50) NOT NULL,
  `payment_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `product_Id` int(10) NOT NULL,
  `ID` int(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_amount` int(50) NOT NULL,
  `selling_price` int(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `product_description` mediumtext NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `payment_method_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_items`
--

INSERT INTO `product_items` (`product_Id`, `ID`, `product_name`, `product_type`, `product_amount`, `selling_price`, `start_date`, `end_date`, `product_description`, `product_img`, `payment_method_ID`) VALUES
(49, 49, 'product 1', 'forest', 100, 100, '2020-03-07', '2020-03-11', 'gdjhgdhgdjgdhdjdjgdggdjhgdhgdjgdhdjdjgdggdjhgdhgdjgdhdjdjgdggdjhgdhgdjgdhdjdjgdggdjhgdhgdjgdhdjdjgdg\r\ngdjhgdhgdjgdhdjdjgdggdjhgdhgdjgdhdjdjgdggdjhgdhgdjgdhdjdjgdggdjhgdhgdjgdhdjdjgdggdjhgdhgdjgdhdjdjgdg\r\ngdjhgdhgdjgdhdjdjgdggdjhgdhgdjgdhdjdjgdggdjhgdhgdjgdhdjdjgdggdjhgdhgdjgdhdjdjgdggdjhgdhgdjgdhdjdjgdg', '15228552645188-780x440.jpg', 0),
(52, 50, 'hawi', 'Bale', 1221, 111, '2020-03-10', '2020-03-26', 'askfjlakjfklajsflkasjdfkljsaklfjaklsjfklsajkjaksdjfksjlkaaskfjlakjfklajsflkasjdfkljsaklfjaklsjfklsajkjaksdjfk\r\naskfjlakjfklajsflkasjdfkljsaklfjaklsjfklsajkjaksdjfksjlkaaskfjlakjfklajsflkasjdfkljsaklfjaklsjfklsajkjaksdjfk', 'PhotoEditor_20200304_083938767.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(50) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Birthday` date NOT NULL,
  `Email` varchar(225) NOT NULL,
  `PhoneNo` int(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `profile_img` varchar(200) NOT NULL DEFAULT 'n/a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Firstname`, `Lastname`, `Gender`, `Birthday`, `Email`, `PhoneNo`, `Address`, `Password`, `profile_img`) VALUES
(49, 'Abdiwak', 'Bekele', 'Male', '2020-03-06', 'abdiwakbek3226@gmail.com', 2147483647, 'Jimma, Ethiopia', 'b59c67bf196a4758191e42f76670ceba', 'n/a'),
(50, 'Hawi', 'bekele', 'Female', '2020-03-06', 'hawi@gmail.com', 2147483647, 'Jimma, Ethiopia', '934b535800b1cba8f96a5d72f72f1611', 'n/a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bid_history`
--
ALTER TABLE `bid_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `bid_id` (`bid_id`);

--
-- Indexes for table `bid_info`
--
ALTER TABLE `bid_info`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `product_Id` (`product_Id`),
  ADD KEY `bid_amount` (`bid_amount`),
  ADD KEY `bid_status` (`bid_status`),
  ADD KEY `shipment_id` (`shipment_id`);

--
-- Indexes for table `bid_shipment`
--
ALTER TABLE `bid_shipment`
  ADD PRIMARY KEY (`shipment_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_method_ID`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`product_Id`),
  ADD KEY `payment_method_ID` (`payment_method_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Firstname` (`Firstname`),
  ADD KEY `Lastname` (`Lastname`),
  ADD KEY `Gender` (`Gender`),
  ADD KEY `Email` (`Email`),
  ADD KEY `Password` (`Password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bid_history`
--
ALTER TABLE `bid_history`
  MODIFY `history_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bid_info`
--
ALTER TABLE `bid_info`
  MODIFY `bid_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `bid_shipment`
--
ALTER TABLE `bid_shipment`
  MODIFY `shipment_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `product_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
