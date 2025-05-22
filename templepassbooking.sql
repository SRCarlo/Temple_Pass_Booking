-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 09:55 PM
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
-- Database: `templepassbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `time_slot` varchar(50) NOT NULL,
  `members` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `booking_date`, `time_slot`, `members`) VALUES
(1, 2, '2025-05-22', '8-10 AM', 1),
(2, 3, '2025-05-23', '10-12 PM', 1),
(3, 4, '2025-05-24', '10-12 PM', 1),
(4, 5, '2025-05-24', '10-12 PM', 1),
(5, 6, '2025-05-24', '10-12 PM', 1),
(6, 7, '2025-05-22', '8-10 AM', 1),
(7, 8, '2025-05-24', '4-6 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `id_proof_type` varchar(50) DEFAULT 'Aadhar',
  `id_number` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `id_proof_type`, `id_number`, `phone`, `email`, `created_at`) VALUES
(2, 'Vinay Namdeorao Ghode', 22, 'Aadhar', '311428398634', '9665705262', 'vinay@gmail.com', '2025-05-21 10:50:13'),
(3, 'Aniket Hedau', 23, 'Aadhar', '311428398623', '9665705233', 'ani@gmail.com', '2025-05-21 10:59:20'),
(4, 'Shubham Raut ', 23, 'Aadhar', '311428398622', '9665705244', 'shu@gmail.com', '2025-05-21 11:51:41'),
(5, 'Shubham Raut ', 23, 'Aadhar', '311428398622', '9665705244', 'shu@gmail.com', '2025-05-21 11:55:46'),
(6, 'Gaurav Dhakate ', 23, 'Aadhar', '311428398622', '9665705211', 'Gaurav@gmail.com', '2025-05-21 11:56:38'),
(7, 'Ashwini', 25, 'Aadhar', '311428398622', '9665705234', 'as@gmail.com', '2025-05-21 12:33:45'),
(8, 'Abhishek Pinge', 21, 'Aadhar', '311428398611', '9665705238', 'abhi@gmail.com', '2025-05-21 12:39:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
