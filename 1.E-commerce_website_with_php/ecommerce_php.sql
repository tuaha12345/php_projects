-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 03:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(4, 'tuaha', 'syeedmdtuaha@gmail.com', '$2y$10$DtpfBhpgZxhbp39.vZ574OknNQgubRU7auMs5m8JZ4syQ3rwJvn9u'),
(5, 'talha chora', 'sayed@gmail.com', '$2y$10$H8nu5krMk1igL2zK9T0DdO6GwofoPphPhz4TflXk2fgiSnImw3oGa'),
(6, 'sayed', 'robotprojectbd@gmail.com', '$2y$10$nFpapoIChCHCkiw3vyIqouskaGYF9PXNTWPSgZ.BioTN.emPXriPy');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(27, 'HP'),
(29, 'Bata'),
(30, 'Arduino.cc'),
(31, 'Made in Bangladesh'),
(32, 'Woodland'),
(33, 'tatto'),
(34, 'china');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(31, '::1', 1),
(33, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(24, 'Microcontroller'),
(25, 'Food'),
(26, 'Shoes'),
(27, 'Laptop'),
(32, 'battery');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(60, 45, '80076266', 33, 11, 'pending'),
(61, 46, '1995510236', 37, 12, 'pending'),
(62, 46, '2072039043', 37, 10, 'pending'),
(63, 46, '1193286744', 33, 1, 'pending'),
(64, 46, '1549374586', 37, 2, 'pending'),
(65, 46, '774566825', 34, 1, 'pending'),
(66, 46, '2018759549', 36, 1, 'pending'),
(67, 46, '2062929594', 37, 3, 'pending'),
(68, 46, '2068007863', 38, 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_keywords` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_image1` varchar(255) DEFAULT NULL,
  `product_image2` varchar(255) DEFAULT NULL,
  `product_image3` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `date` varchar(55) DEFAULT NULL,
  `status` varchar(55) DEFAULT NULL,
  `product_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`, `product_details`) VALUES
(31, 'Arduino', 'Arduino is an open-source electronics platform based on easy-to-use hardware and software.', 'arduino,microcontroller', 24, 30, 'A000066_03.front_970c6014-61ab-4226-a20f-14cc6d8d682c_934x700-removebg-preview.png', 'arduino2.jpg', 'arduino3.jpg', 700.00, '2023-11-03 23:03:30', 'true', 'Arduino is an open-source electronics platform based on easy-to-use hardware and software. Arduino boards are able to read inputs - light on a sensor, a finger on a button, or a Twitter message - and turn it into an output - activating a motor, turning on'),
(32, 'HP laptop', 'Buy HP Laptop at the lowest price in BD. Latest High performing Hp laptop available at Star Tech Online Shop.', 'laptop,hp,notebook', 27, 27, 'HP-15-6-FHD-Laptop-Intel-Core-i3-1115G4-8GB-RAM-256GB-SSD-Silver-Windows-10-15-dy2131wm_86d74bfc-605d-4210-94a7-4233c789891d.7058090a780c83da1b0d8d0f46540b50-removebg-preview.png', 'images-removebg-preview (3).png', 'HP-15-6-FHD-Laptop-Intel-Core-i3-1115G4-8GB-RAM-256GB-SSD-Silver-Windows-10-15-dy2131wm_86d74bfc-605d-4210-94a7-4233c789891d.7058090a780c83da1b0d8d0f46540b50-removebg-preview.png', 75000.00, '2023-11-03 23:09:04', 'true', 'The HP 15s-fq5786TU Laptop comes with Intel Core i3-1215U Processor (10M Cache, up to 4.40 GHz) and 8 GB DDR4 RAM. It has a 512 GB PCIe NVMe M.2 SSD. This laptop has been integrated with Intel UHD Graphics and features a 15.6\" diagonal, FHD (1920 x 1080),'),
(33, 'RaspberryPi4', 'Broadcom BCM2711, Quad core Cortex-A72 (ARM v8) 64-bit SoC @ 1.8GHz; 1GB, 2GB, 4GB or 8GB LPDDR4-3200 SDRAM (depending on model)', 'microcontroller,raspberrypi,pi', 24, 30, 'Raspberry_Pi_4_Model_B_2GB-removebg-preview.png', 'Raspberry_Pi_4_Model_B_2GB-removebg-preview.png', 'Raspberry_Pi_4_Model_B_2GB-removebg-preview.png', 12000.00, '2023-11-03 23:10:42', 'true', 'All over the world, people use the Raspberry Pi to learn programming skills, build hardware projects, do home automation, implement Kubernetes clusters and Edge computing, and even use them in industrial applications.'),
(34, 'Mango', 'A mango is an edible stone fruit produced by the tropical tree Mangifera indica. It is believed to have originated in southern Asia, particularly in e', 'Mango', 25, 31, 'download (2).jpg', 'download.jpg', 'download (1).jpg', 120.00, '2023-11-03 23:12:35', 'true', 'Mango is rich in vitamins, minerals, and antioxidants, and it has been associated with many health benefits, including potential anticancer effects, as well as improved immunity and digestive and eye health. Best of all, it\'s tasty and easy to add to your'),
(35, 'Bata shoes', 'Bata India is the largest retailer and leading manufacturer of footwear in India and is a part of the Bata Shoe Organization. Incorporated as Ball', 'shoes,bata', 26, 29, '1_00e8fed3-94a3-4908-b655-7f8a06468f37_1024x1024-removebg-preview.png', 'images-removebg-preview (1).png', '1_00e8fed3-94a3-4908-b655-7f8a06468f37_1024x1024-removebg-preview.png', 1550.00, '2023-11-03 23:18:17', 'true', 'Tomáš Baťa established the organization in Zlín on 24 August 1894 with 800 Austrian gulden (equivalent to $320 at the time), inherited from his mother. His brother Antonín Baťa and sister Anna were partners in the startup firm T. & A. Bata Shoe Company.'),
(36, 'Woodland Nubuck Trekking Shoes', 'Woodland&#039;s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it ente', 'shoes,woodland', 26, 32, 'g-4092wsa-39-woodland-brown-original-imafxbek8jnshkaa-removebg-preview.png', 'woodland-mens-ogc-3491119-leather-sneakers-removebg-preview.png', '71k2Eddx-DL._AC_UY1000_-removebg-preview.png', 8500.00, '2023-11-05 08:40:36', 'true', 'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to Russia.'),
(37, 'Lithium battery', '3.7v lithium battery 1200 mah', 'lithium,battery', 32, 34, '18650-li-ion-battery-1200mah_1200x1200-removebg-preview.png', '18650-li-ion-battery-1200mah_1200x1200-removebg-preview.png', '18650-li-ion-battery-1200mah_1200x1200-removebg-preview.png', 70.00, '2023-11-05 08:44:03', 'true', 'Product details of 1.2V 600 mAh (For Trimmer Battery) Rechargeable Heavy Duty Aa Battery Ni-Cd.-Batteries for Kemei, Htc, Gami, Trimmer.1 Pcs - 6 volt battery\r\n3.7 V 18650 rechargeable lithium battery – Pink\r\nColor: not specified\r\nType of lithium ion\r\nBat'),
(38, 'Lipo battery', 'A lithium polymer battery, or more correctly lithium-ion polymer battery (abbreviated as LiPo, LIP, Li-poly, lithium-poly and others), is a rechargeab', 'battery,lipo', 32, 33, 'images-removebg-preview.png', 'images-removebg-preview.png', 'images-removebg-preview.png', 1200.00, '2023-11-05 10:06:38', 'true', 'A lithium polymer battery, or more correctly lithium-ion polymer battery (abbreviated as LiPo, LIP, Li-poly, lithium-poly and others), is a rechargeable battery of lithium-ion technology using a polymer electrolyte instead of a liquid electrolyte.');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount_due` int(11) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `total_products` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(95, 45, 19000, '80076266', 11, '2023-11-05 02:48:18', 'pending'),
(96, 46, 9770, '1995510236', 12, '2023-11-05 03:40:41', 'Complete'),
(97, 46, 700, '2072039043', 10, '2023-11-05 03:37:53', 'pending'),
(98, 46, 12000, '1193286744', 1, '2023-11-05 03:38:19', 'pending'),
(99, 46, 770, '1549374586', 2, '2023-11-05 04:01:45', 'pending'),
(101, 46, 8500, '2018759549', 1, '2023-12-05 08:34:35', 'pending'),
(102, 46, 1470, '2062929594', 3, '2023-12-05 08:35:21', 'pending'),
(103, 46, 0, '634086082', 0, '2023-12-05 08:35:34', 'pending'),
(104, 46, 13200, '2068007863', 2, '2023-12-07 02:41:26', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_mode` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(14, 96, '1995510236', 9770.00, 'Cash on Delivery', '2023-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_ip` varchar(15) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_mobile` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(46, 'user1', 'robotprojectbd@gmail.com', '$2y$10$ao35AmMyyhQrKpmYOfWjee2SgbCR/jljUey5O8WGnlLpwxAZ/1VK2', 'photo_2023-01-15_19-07-45.jpg', '::1', 'fatullah,narayangonj', '+880152169'),
(47, 'arnab', 'arnab@gmail.com', '$2y$10$h11MCS0ZtyGFbm21pqxCv.Cw8TRtOS2vPv3FcWGAOBUgLd5cayDGC', 'Mens-Shirt.jpg', '::1', 'Comilla', '+8810526654654');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
