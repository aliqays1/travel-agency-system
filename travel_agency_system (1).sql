-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2026 at 02:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_agency_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `travel_date` date DEFAULT NULL,
  `people` int(11) DEFAULT NULL,
  `flight_type` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `package_id`, `booking_date`, `travel_date`, `people`, `flight_type`, `status`) VALUES
(15, 16, 0, '2026-01-16 06:01:50', '2026-12-02', 5, 'Business', 'Pending'),
(16, 16, 0, '2026-01-16 06:03:22', '2026-02-02', 3, 'Business', 'Pending'),
(17, 16, 0, '2026-01-16 06:03:33', '2026-12-04', 2, 'Economy', 'Pending'),
(18, 17, 0, '2026-01-16 06:04:14', '2026-02-09', 1, 'Economy', 'Pending'),
(19, 17, 0, '2026-01-16 06:04:28', '2026-01-05', 5, 'Business', 'Pending'),
(20, 17, 0, '2026-01-16 06:07:20', '2026-03-05', 4, 'Economy', 'Pending'),
(21, 17, 2, '2026-01-16 06:20:20', '2026-03-06', 4, 'First Class', 'Pending'),
(22, 17, 7, '2026-01-16 06:21:03', '2026-04-04', 3, 'Economy', 'Cancelled'),
(23, 17, 8, '2026-01-16 06:21:20', '2026-05-07', 5, 'Business', 'Approved'),
(24, 9, 2, '2026-01-16 06:21:58', '2026-02-02', 3, 'Economy', 'Approved'),
(25, 9, 8, '2026-01-16 06:22:14', '2027-02-02', 1, 'Business', 'Approved'),
(26, 9, 7, '2026-01-16 06:22:56', '2026-12-09', 4, 'First Class', 'Pending'),
(27, 12, 7, '2026-01-16 06:24:27', '2026-03-29', 2, 'First Class', 'Cancelled'),
(28, 12, 7, '2026-01-16 06:25:00', '2026-09-27', 3, 'Business', 'Cancelled'),
(29, 12, 2, '2026-01-16 08:06:14', '2026-12-19', 4, 'Business', 'Approved'),
(30, 12, 0, '2026-01-16 08:46:17', '2026-01-07', 2, 'Business', 'Pending'),
(31, 9, 8, '2026-01-16 08:47:35', '2026-01-03', 7, 'Business', 'Approved'),
(32, 9, 8, '2026-01-16 08:52:01', '2026-01-01', 1, 'Economy', 'Cancelled'),
(33, 18, 8, '2026-01-16 11:14:20', '2026-05-26', 5, 'Economy', 'Approved'),
(34, 15, 25, '2026-01-16 13:00:47', '2029-12-29', 3, 'Economy', 'Approved'),
(35, 15, 21, '2026-01-16 13:02:12', '2026-09-19', 4, 'Business', 'Pending'),
(36, 15, 21, '2026-01-16 13:02:27', '2026-03-31', 8, 'Business', 'Cancelled'),
(37, 15, 16, '2026-01-16 13:02:40', '2026-12-09', 1, 'Economy', 'Cancelled'),
(38, 15, 14, '2026-01-16 13:03:10', '2026-09-23', 2, 'First Class', 'Approved'),
(39, 12, 23, '2026-01-16 13:10:14', '2026-12-12', 2, 'First Class', 'Approved'),
(40, 12, 17, '2026-01-16 13:10:51', '2027-03-04', 2, 'Business', 'Cancelled'),
(41, 12, 9, '2026-01-16 13:11:15', '2027-07-23', 2, 'Economy', 'Approved'),
(42, 12, 24, '2026-01-16 13:14:55', '2026-12-12', 3, 'Economy', 'Pending'),
(43, 12, 14, '2026-01-16 13:15:10', '2026-12-04', 4, 'Business', 'Pending'),
(44, 12, 12, '2026-01-16 13:15:30', '2026-12-12', 5, 'Business', 'Approved'),
(45, 12, 6, '2026-01-16 13:16:24', '2026-03-23', 3, 'Business', 'Pending'),
(46, 20, 22, '2026-01-16 13:17:20', '2026-02-02', 3, 'First Class', 'Cancelled'),
(47, 20, 17, '2026-01-16 13:17:37', '2026-07-17', 5, 'Business', 'Cancelled'),
(48, 20, 10, '2026-01-16 13:17:54', '2026-12-23', 1, 'First Class', 'Approved'),
(49, 19, 20, '2026-01-16 13:19:28', '2026-11-19', 3, 'First Class', 'Pending'),
(50, 19, 26, '2026-01-16 13:19:43', '2026-03-22', 4, 'Business', 'Cancelled'),
(51, 19, 20, '2026-01-16 13:20:02', '2026-04-21', 1, 'First Class', 'Pending'),
(52, 19, 11, '2026-01-16 13:20:20', '2027-02-01', 12, 'Economy', 'Pending'),
(53, 18, 15, '2026-01-16 13:21:00', '2026-08-29', 4, 'Business', 'Approved'),
(54, 18, 19, '2026-01-16 13:21:19', '2026-09-19', 6, 'Business', 'Pending'),
(55, 18, 18, '2026-01-16 13:21:35', '2026-10-10', 8, 'Economy', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `description`, `price`, `location`, `image`, `created_at`) VALUES
(2, 'Dubai', 'Enjoy a full-day city tour in Dubai with luxury transport, hotel stay, and sightseeing.\r\n', 1200.00, 'Dubai', 'bridge2.jpg', '2026-01-15 20:31:27'),
(5, 'usa', 'save journey', 1200.00, 'maine', 'office4.jpg', '2026-01-16 03:25:16'),
(6, 'usa', 'save journey', 1529.00, 'chicago', 'building4.jpg', '2026-01-16 03:54:14'),
(7, 'usa', 'save journey', 1828.00, 'new jersey', 'asphalt5.jpg', '2026-01-16 03:55:16'),
(8, 'usa', 'save journey', 9273.00, 'texas', 'asphalt2.jpg', '2026-01-16 03:57:45'),
(9, 'german', 'save journey', 10000.00, 'Berlin', 'german.jpeg', '2026-01-16 11:16:32'),
(10, 'greece', 'save journey', 1232.00, 'anthens', 'greece.jpeg', '2026-01-16 11:17:30'),
(11, 'brazil', 'save journey', 1923.00, 'brasilia', 'brasil-1.webp', '2026-01-16 11:20:20'),
(12, 'Ethiopia', 'save journey', 1212.00, 'Addis ababa', 'adis ababa.jpeg', '2026-01-16 11:22:13'),
(13, 'Sweden', 'save journey', 1923.00, 'Stockhom', 'sweden.jpeg', '2026-01-16 11:22:42'),
(14, 'netherlands', 'save journey', 1231.00, 'Amsterdam', 'netherlands.jpeg', '2026-01-16 11:23:25'),
(15, 'malaysia', 'save journey', 2342.00, 'Kuala Lumpur', 'malaysia.jpeg', '2026-01-16 11:24:04'),
(16, 'austria', 'save journey', 9832.00, 'Viena', 'austria.jpeg', '2026-01-16 11:24:25'),
(17, 'Canada', 'save journey', 7632.00, 'Toronto', 'canada.jpeg', '2026-01-16 11:25:04'),
(18, 'Belgium', 'save journey', 3454.00, 'Brussels', 'bulgium.jpeg', '2026-01-16 11:25:32'),
(19, 'Finland', 'save journey', 9999.00, 'Helsinki', 'finland.jpeg', '2026-01-16 11:26:03'),
(20, 'France', 'save journey', 8362.00, 'Paris', 'france.jpeg', '2026-01-16 11:26:26'),
(21, 'Italy', 'save journey', 4353.00, 'Rome', 'roma.jpeg', '2026-01-16 11:27:10'),
(22, 'Kenya', 'save journey', 230.00, 'Nairobi', 'kenya.jpeg', '2026-01-16 11:27:49'),
(23, 'United States', 'save journey', 9899.00, 'new york', 'new york.jpeg', '2026-01-16 11:28:25'),
(24, 'Norway', 'save journey', 8271.00, 'Oslo', 'norway.jpeg', '2026-01-16 11:29:17'),
(25, 'Turkey', 'save journey', 1234.00, 'Ankara', 'turkey.jpeg', '2026-01-16 11:29:49'),
(26, 'South Africa', 'save journey', 2343.00, 'Pretoria', 'south_africa.jpeg', '2026-01-16 11:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `user_status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `sex`, `username`, `password`, `phone`, `email`, `profile_picture`, `user_type`, `user_status`, `created_at`) VALUES
(12, 'ahmed', 'mohamed', 'Male', 'ahmed', '1234', '252616959932', 'aliqays7691@gmail.com', 'bridge1.jpg', 'user', 'active', '2026-01-15 19:58:14'),
(15, 'amina', 'mohamed', 'Female', 'amina', '1234', '252616959932', 'Alidahirhazan@gmail.com', 'asphalt5.jpg', 'user', 'active', '2026-01-16 05:05:01'),
(16, 'zaki', 'omar', 'Male', 'zaki', '1234', '252616959932', 'aliqays7691@gmail.com', 'office5.jpg', 'admin', 'active', '2026-01-16 05:05:53'),
(18, 'abdi', 'Dahir', 'Male', 'abdi', '1234', '252616959932', 'mohamedabdirahmanabdullahi12@gmail.com', 'office5.jpg', 'user', 'active', '2026-01-16 11:12:58'),
(19, 'shukri', 'hussein', 'Female', 'shukri hussein', '1234', '252616959932', 'Alidahirhazan@gmail.com', 'road1.jpg', 'user', 'active', '2026-01-16 11:34:13'),
(20, 'fatima', 'ali', 'Female', 'fatima', '1234', '252616959932', 'mohamedabdirahmanabdullahi12@gmail.com', 'canada.jpeg', 'user', 'active', '2026-01-16 11:34:47'),
(21, 'ali', 'ahmed', 'Male', 'ali', '1234', '252616959932', 'Alidahirhazan@gmail.com', 'canada.jpeg', 'admin', 'active', '2026-01-16 11:35:21'),
(22, 'maryan', 'Dahir', 'Female', 'maryan', '1234', '252616959932', 'Alidahirhazan@gmail.com', 'france.jpeg', 'admin', 'not active', '2026-01-16 11:42:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
