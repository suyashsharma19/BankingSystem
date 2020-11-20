-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 07:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`c_id`, `c_name`, `c_email`, `c_balance`) VALUES
(1, 'Bhavesh Lohana', 'bhaveshlohana1@gmail.com', 4000),
(2, 'Ritu Lohana', 'ritulohana26@gmail.com', 35250),
(3, 'Mukesh Lohana', 'mukeshlohana@gmail.com', 40800),
(4, 'Krishna Lohana', 'krishnalohana@gmail.com', 9188),
(5, 'Tanish Sahijwani', 'tanishsahijwani@gmail.com', 13000),
(6, 'Simran Parwani', 'simparwani@gmail.com', 21000),
(7, 'Parth Kodwani', 'parth@outlook.com', 18000),
(8, 'Ayush Kodwani', 'ayushk@yahoo.com', 15000),
(9, 'Yogita Lohana', 'yl@gmail.com', 19990),
(10, 'Jiya Kodwani', 'jiyakowani@gmail.com', 19000);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_history`
--

CREATE TABLE `transfer_history` (
  `t_id` int(11) NOT NULL,
  `t_sender` varchar(255) NOT NULL,
  `t_receiver` varchar(255) NOT NULL,
  `t_amount` int(11) NOT NULL,
  `t_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer_history`
--

INSERT INTO `transfer_history` (`t_id`, `t_sender`, `t_receiver`, `t_amount`, `t_time`) VALUES
(1, 'Yogita Lohana', 'Ritu Lohana', 8000, '2020-10-20 13:18:44'),
(2, 'Krishna Lohana', 'Bhavesh Lohana', 80, '2020-10-20 14:08:00'),
(3, 'Yogita Lohana', 'Bhavesh Lohana', 12, '2020-10-20 14:17:07'),
(4, 'Krishna Lohana', 'Mukesh Lohana', 2000, '2020-10-20 14:27:06'),
(5, 'Tanish Sahijwani', 'Krishna Lohana', 3000, '2020-10-20 14:33:25'),
(15, 'Tanish Sahijwani', 'Jiya Kodwani', 2000, '2020-10-20 20:18:41'),
(16, 'Bhavesh Lohana', 'Mukesh Lohana', 5000, '2020-10-20 20:20:53'),
(17, 'Bhavesh Lohana', 'Krishna Lohana', 3000, '2020-10-20 20:25:54'),
(18, 'Bhavesh Lohana', 'Krishna Lohana', 8000, '2020-10-20 20:30:23'),
(19, 'Mukesh Lohana', 'Krishna Lohana', 1200, '2020-10-20 20:31:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_name` (`c_name`),
  ADD UNIQUE KEY `c_email` (`c_email`);

--
-- Indexes for table `transfer_history`
--
ALTER TABLE `transfer_history`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transfer_history`
--
ALTER TABLE `transfer_history`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
