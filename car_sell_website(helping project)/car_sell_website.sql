-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 07:50 PM
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
-- Database: `car_sell_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_table`
--

CREATE TABLE `car_table` (
  `car_id` int(11) NOT NULL,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `mileage` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_table`
--

INSERT INTO `car_table` (`car_id`, `make`, `model`, `year`, `mileage`, `location`, `price`, `seller_id`, `image`) VALUES
(21, 'Japan', 'Sedan', 2024, 125, 'Washington', '50000.00', 5, 'car_images/sedan.jpg'),
(22, 'Japan', 'SUV', 2020, 563, 'Los Angeles', '12003.00', 5, 'car_images/suv.jpg'),
(23, 'Japan', 'Hatchback', 2024, 55, 'Chicago', '4500.00', 5, 'car_images/hatchback.jpg'),
(24, 'South korea', 'Convertible', 1997, 500, 'Miami', '56000.00', 5, 'car_images/convertible.jpg'),
(25, 'Japan', 'Compact', 2024, 56, 'Houston', '1200.00', 5, 'car_images/compact.jpg'),
(26, 'India', 'Minivan', 2025, 600, 'Dallas', '16000.00', 5, 'car_images/minivan.jpg'),
(27, 'America', 'Sports Car', 2024, 56933, 'Phoenix', '1350000.00', 5, 'car_images/sports_car.jpg'),
(28, 'India', 'Truck', 2023, 40, 'Denver', '1450.00', 5, 'car_images/truck.jpg'),
(29, 'Japan', 'Electric', 2023, 69, 'Seattle', '1600.00', 5, 'car_images/electric.png'),
(30, 'Uk', 'Luxury', 2024, 15, 'Boston', '498000.00', 5, 'car_images/luxury.jpg'),
(31, 'Japan', 'Crossover', 2021, 99, 'San Francisco', '566666.00', 5, 'car_images/Crossover.jpg'),
(32, 'India', 'Hybrid', 2024, 89, 'Atlanta', '69330.00', 5, 'car_images/Hybrid.jpg'),
(33, 'America', 'Coupe', 2024, 14, 'Washington D.C.', '12003.00', 5, 'car_images/Coupe.jpg'),
(34, 'Japan', 'Van', 2024, 5665, 'Orlando', '456546.00', 5, 'car_images/Van.jpg'),
(35, 'Japan', 'Off-Road', 2024, 55, 'Las Vegas', '6599.00', 5, 'car_images/Off-Road.jpg'),
(36, 'Japan', 'Economy', 2023, 99, 'Detroit', '4569.00', 5, 'car_images/Economy.jpg'),
(37, 'India', 'Classic', 2024, 777, 'Nashville', '12600.00', 5, 'car_images/classic.jpg'),
(38, 'India', 'Wagon', 2024, 45, 'Minneapolis', '2400.00', 5, 'car_images/wagon.jpg'),
(39, 'Japan', 'Luxury SUV', 2021, 415, 'Portland', '178000.00', 5, 'car_images/luxury_suv.jpg'),
(40, 'Japan', 'Midsize', 2024, 46, 'Philadelphia', '1300.00', 5, 'car_images/midsize.jpg'),
(41, 'Japan', 'Performance', 2024, 456, 'Austin', '4700.00', 5, 'car_images/performance.jpg'),
(43, 'Bangladesh', 'AK-520', 2024, 200, 'Mohakhali, Dhaka, Bangladesh', '526030.00', 7, 'car_images/curvv-exterior-right-front-three-quarter.png');

-- --------------------------------------------------------

--
-- Table structure for table `seller_table`
--

CREATE TABLE `seller_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller_table`
--

INSERT INTO `seller_table` (`id`, `name`, `address`, `phone_number`, `email`, `username`, `password`) VALUES
(1, 'Syeed MD Tuaha', 'Fatullah,Narayangonj,Dhaka,Bangladesh', '01521569362', 'syeedmdtuaha@gmail.com', 'tuaha', '$2y$10$l3gYUj1sXFUy1dVvHN/xdOPXHRSQ5EdrGYQ1MlgYBmdwk7N4MPVPS'),
(4, 'sayed', 'Fatullah,Narayangonj,Dhaka,Bangladesh', '01521569359', 'sayed@gmail.com', 'sayed', '$2y$10$3q5JLnfG5rFPcQvIiXpToeHrJqrJQN36YrjKhWnz.Dup8UMWjEomi'),
(5, 'Uday', 'Fatullah,Narayangonj,Dhaka,Bangladesh', '01521569569', 'uday@gmail.com', 'uday', '$2y$10$AksAriEyrODdNHTM775GuecwsxfGQbVY9UOtDb8ZpytPCGKQw.yky'),
(6, 'Araf', 'Dhaka', '01526393666', 'araft@gmail.com', 'araf', '$2y$10$K7IGLhZ5Ep8RrBHnsCYJ2u2eSE1AroIHDXeKgHB96lxzH.LaM9XDK'),
(7, 'abc', 'Dhaka, Bangladesh', '0152169312', 'abc@gmail.com', 'abc', '$2y$10$UskwEfudq4Xf4e2iLPok9eNU33bN/srMf6D7eG0/AQVOeByTz0UR.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_table`
--
ALTER TABLE `car_table`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `seller_table`
--
ALTER TABLE `seller_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_table`
--
ALTER TABLE `car_table`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `seller_table`
--
ALTER TABLE `seller_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_table`
--
ALTER TABLE `car_table`
  ADD CONSTRAINT `car_table_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
