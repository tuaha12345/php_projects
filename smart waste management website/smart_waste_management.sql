-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 06:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_waste_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`) VALUES
(2, 'admin', '$2y$10$Pv4lDp2nbAvz8SEsK1sjkeWmnVrEE7KOldD42ZiG6pTpYwKeQ7.Pe', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `feedback_text` text NOT NULL,
  `feedback_date` date DEFAULT NULL,
  `feedback_type` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `feedback_text`, `feedback_date`, `feedback_type`) VALUES
(6, 4, 'Thanks a lot. Your service was good. Thanks again.', '2024-09-25', 'Appreciation'),
(7, 5, 'It was too late....', '2024-09-25', 'Issue'),
(8, 6, 'I really appreciate your fast service', '2024-09-25', 'Appreciation'),
(9, 7, 'Thanks for your fast response', '2024-09-25', 'Appreciation'),
(10, 8, 'Thanks for your fast response', '2024-09-25', 'Appreciation');

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `leaderboard_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT 0,
  `rank` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`leaderboard_id`, `user_id`, `points`, `rank`) VALUES
(7, 4, 20, 0),
(8, 4, 10, 0),
(9, 4, 51, 0),
(10, 5, 50, 0),
(11, 5, 60, 0),
(12, 7, 20, 0),
(13, 7, 30, 0),
(14, 8, 200, 0),
(15, 8, 60, 0),
(16, 8, 120, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `waste_type_id` int(11) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `sent` tinyint(4) DEFAULT 0,
  `message` varchar(255) DEFAULT NULL,
  `notification_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `waste_type_id`, `collection_date`, `sent`, `message`, `notification_date`) VALUES
(34, 5, 2, '2024-10-02', 0, 'Be ready , we are comming soon!!!', '2024-09-25'),
(35, 7, 4, '2024-10-07', 0, 'Be ready, we are comming!!!', '2024-09-26'),
(36, 8, 4, '2024-10-07', 0, 'Be ready, we are comming!!!', '2024-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `special_pickups`
--

CREATE TABLE `special_pickups` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_description` text NOT NULL,
  `request_date` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `pickup_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special_pickups`
--

INSERT INTO `special_pickups` (`request_id`, `user_id`, `item_description`, `request_date`, `status`, `pickup_type`) VALUES
(8, 4, 'I need a pickup . I have a broken furniture...', '2024-09-25', 0, 'bulk'),
(9, 5, 'I have some old lipo batteries in my home which is really unnecessary..', '2024-09-25', 0, 'hazardous'),
(10, 6, 'I have my ups battery\'s liquid water. I can\'t dump here and there because this will affect our environment. So, I need your help. Plz call me before 30min coming here...', '2024-09-25', 0, 'hazardous'),
(11, 7, 'I have an old toilet. I don\'t need this anymore. Plz help me to make it free from my home', '2024-09-25', 0, 'bulk'),
(12, 8, 'I have lot\'s of unnecessary things in my home. I don\'t these things any more . As these are big in weight so I need your special pickup...', '2024-09-25', 0, 'bulk');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `user_id`, `start_date`, `end_date`, `amount`, `status`) VALUES
(16, 4, '2024-09-25', '2024-10-25', '30.00', 1),
(17, 5, '2024-09-25', '2024-10-25', '20.00', 1),
(18, 6, '2024-09-25', '2024-10-25', '30.00', 1),
(19, 7, '2024-09-25', '2024-10-25', '20.00', 1),
(20, 8, '2024-09-25', '2024-10-25', '10.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `subscription_status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `location`, `subscription_status`) VALUES
(4, 'Rony Hasan', 'rony@gmail.com', '$2y$10$0LMzo/E2yIVj8X1m2aTiSuFAuOhAfhL4A3Mse7e54No82t0z.RuBm', 'Barisal, Bangladesh', 0),
(5, 'Asif Mahtab', 'asif@gmail.com', '$2y$10$ZGcgxFFPOmRaGq23.eIpXOBViivExlbDSUCm5arpPMKDU8GWFGUeK', 'Mohakhali, Dhaka, Bangladesh', 0),
(6, 'Abdul Kader', 'kader@gmail.com', '$2y$10$o6JIIHDD0bRTaZTYrFanTOkik..krjFlCHddY9oE3vNfQWrru.PQO', 'Horeshpur, Sylhet', 0),
(7, 'Sayed Hasan', 'sayed@gmail.com', '$2y$10$10kRHVONCChdGdO6UKGtXuXBiDqzF.GmK/vExWonVgVe/VE72S7FK', 'Dhaka, Bangladesh', 0),
(8, 'kafi Islam', 'kafi@gmail.com', '$2y$10$egRUaoaIw4FTN1JvC/l9fOyKUmpoaTnXtE8i/9s1hYP0HzPLsnxmG', 'Dhaka, Bangladesh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `waste_collection`
--

CREATE TABLE `waste_collection` (
  `collection_id` int(11) NOT NULL,
  `waste_type_id` int(11) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waste_collection`
--

INSERT INTO `waste_collection` (`collection_id`, `waste_type_id`, `collection_date`, `location`) VALUES
(11, 4, '2024-10-01', 'Sylhet'),
(12, 4, '2024-10-04', 'Dhaka, Bangladesh'),
(13, 4, '2024-10-05', 'Dhaka, Bangladesh'),
(14, 3, '2024-09-30', 'Dhaka, Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `waste_dumps`
--

CREATE TABLE `waste_dumps` (
  `dump_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_dumped` decimal(10,2) NOT NULL,
  `dump_date` datetime DEFAULT current_timestamp(),
  `waste_types` varchar(250) DEFAULT NULL,
  `weight` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waste_dumps`
--

INSERT INTO `waste_dumps` (`dump_id`, `user_id`, `amount_dumped`, `dump_date`, `waste_types`, `weight`) VALUES
(10, 4, '0.00', '2024-09-25 18:54:46', '1', '2'),
(11, 4, '0.00', '2024-09-25 18:54:52', '2', '1'),
(12, 4, '0.00', '2024-09-25 18:55:08', '3', '5'),
(13, 5, '0.00', '2024-09-25 19:21:27', '1', '5'),
(14, 5, '0.00', '2024-09-25 19:21:34', '1', '6'),
(15, 7, '0.00', '2024-09-25 20:28:42', '1', '2'),
(16, 7, '0.00', '2024-09-25 20:28:51', '2', '3'),
(17, 8, '0.00', '2024-09-25 20:37:17', '1', '20'),
(18, 8, '0.00', '2024-09-25 20:37:26', '2', '6'),
(19, 8, '0.00', '2024-09-25 20:37:34', '3', '12');

-- --------------------------------------------------------

--
-- Table structure for table `waste_types`
--

CREATE TABLE `waste_types` (
  `waste_type_id` int(11) NOT NULL,
  `waste_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waste_types`
--

INSERT INTO `waste_types` (`waste_type_id`, `waste_name`, `description`) VALUES
(1, 'General Waste', 'Items that cannot be recycled or composted.'),
(2, 'Recycling', 'Paper, plastics, metals, and glass that can be recycled.'),
(3, 'Compost', 'Organic waste like food scraps, garden waste, etc.'),
(4, 'Hazardous Waste', 'Items like batteries, electronics, chemicals that require special disposal.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`leaderboard_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `waste_type_id` (`waste_type_id`);

--
-- Indexes for table `special_pickups`
--
ALTER TABLE `special_pickups`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `waste_collection`
--
ALTER TABLE `waste_collection`
  ADD PRIMARY KEY (`collection_id`),
  ADD KEY `waste_type_id` (`waste_type_id`);

--
-- Indexes for table `waste_dumps`
--
ALTER TABLE `waste_dumps`
  ADD PRIMARY KEY (`dump_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `waste_types`
--
ALTER TABLE `waste_types`
  ADD PRIMARY KEY (`waste_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `leaderboard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `special_pickups`
--
ALTER TABLE `special_pickups`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `waste_collection`
--
ALTER TABLE `waste_collection`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `waste_dumps`
--
ALTER TABLE `waste_dumps`
  MODIFY `dump_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `waste_types`
--
ALTER TABLE `waste_types`
  MODIFY `waste_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD CONSTRAINT `leaderboard_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`waste_type_id`) REFERENCES `waste_types` (`waste_type_id`);

--
-- Constraints for table `special_pickups`
--
ALTER TABLE `special_pickups`
  ADD CONSTRAINT `special_pickups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `waste_collection`
--
ALTER TABLE `waste_collection`
  ADD CONSTRAINT `waste_collection_ibfk_1` FOREIGN KEY (`waste_type_id`) REFERENCES `waste_types` (`waste_type_id`);

--
-- Constraints for table `waste_dumps`
--
ALTER TABLE `waste_dumps`
  ADD CONSTRAINT `waste_dumps_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
