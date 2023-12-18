-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 09:36 AM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `phone`, `pic`, `status`) VALUES
(1, 'adminhumayra', '$2y$10$Wvs4BG8v3Rn2WkrfjnIaX.OfxJJwiWsDgZRJ8y9DZxPy99NbTwwK.', 'admin@humayra1', '123456789', 'pic.jpg', 'yes'),
(4, 'SuperAdmin', '$2y$10$l5W8JNS7RdtGRbY2HAcvt.makg77EV5IxmPhEdegrGMGN25iIg68q', 'super@admin.com', '08498222', 'pic.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `price` decimal(10,2) DEFAULT 0.00,
  `book_shelf` varchar(255) DEFAULT NULL,
  `confined` varchar(50) DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `authors`, `edition`, `status`, `quantity`, `department`, `price`, `book_shelf`, `confined`) VALUES
(1, 'Data Structure', 'seymour Lipschutz (schaum outline series)', 'International edition', 'available', 27, 'CSE', 650.00, '1.2.5', 'No'),
(2, 'Programming in ANSI C', 'E. Balagurusamy', '8th', 'available', 60, 'CSE', 200.00, '5.2.5', 'No'),
(3, 'Object oriented programming with C++', 'E. Balagurusamy', '5th', 'available', 42, 'CSE', 60.00, '1.2.4', 'No'),
(4, 'Operating system Concepts', 'Silberschatz, Galvin, Peterson', '6th', 'available', 69, 'CSE', 400.00, '1.1.5', 'No'),
(43, 'The dog', 'Mr dog hover', '2nd', 'Avaliable', 3, 'Animal', 80.00, '1.2.3', 'No'),
(6, 'Fundamentals of Computer Algorithm', 'Sartaj Sahni', '2nd', 'available', 80, 'CSE', 550.00, '2.2.2', 'No'),
(7, 'Database System Concepts', 'Abraham silberschatz Henry F.Korth S.Sundarshan', '7th', 'available', 30, 'CSE', 700.00, '5.2.6', 'No'),
(8, 'Data and Computer Communication', 'W Stallings', '4th', 'available', 66, 'CSE', 120.00, '3.3.3', 'No'),
(9, 'Data Communication and Networking', 'Bchrouz A. Forouzan', '2nd', 'available', 39, 'CSE', 60.00, '2.10.3', 'No'),
(10, 'Physics Part-II', 'David Halliday and Robert Resnick', '2nd', 'available', 78, 'Physics', 100.00, '3.3.3', 'No'),
(42, 'The cat', 'Patlu the cat man', '1st', 'Avaliable', 3, 'Animal', 50.00, '', 'Yes'),
(12, 'Microprocessors and Interfacing', 'Douglas V Hall', '5th', 'available', 80, 'Physics', 50.00, NULL, 'No'),
(31, 'ihyciau', 'asvtyteyb', '23dsf', 'available', 43, 'CSE', 650.00, '6.6.10', 'No'),
(32, 'Computer Graphics', 'Foley, Van Dam, Feiner, Hughes', '2nd', 'available', 33, 'CSE', 250.00, '10.2.3', 'Yes'),
(41, 'I am robot', 'robot', 'old robot', 'acheeee', 65, 'Robotics', 500.00, '1.1.1', 'No'),
(45, 'new test', 'De_roboticaa', '2nd', 'Avaliable', 3, 'Robotics', 495.00, '3.3.3', 'No'),
(46, 'ajker', 'kalker', '1st', 'Avaliable', 1, 'CSE', 220.00, '3.3.3', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`, `date_time`, `status`) VALUES
(27, 'Maisha', 'I want a book for math', '2023-09-12 06:41:04', 0),
(28, 'ADMIN', 'you can borrow your book.', '2023-09-12 06:41:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `fine_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `bid` varchar(100) NOT NULL,
  `returned_date` date NOT NULL,
  `day` int(10) NOT NULL,
  `fine` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`fine_id`, `username`, `bid`, `returned_date`, `day`, `fine`, `status`) VALUES
(5, 'Maisha', '0021', '2023-09-12', 0, 0, 'paid'),
(6, 'Maisha', '0002', '2023-09-12', 0, 0, 'not paid'),
(7, 'Maisha', '0003', '2023-09-14', 1, 5, 'not paid'),
(11, 'Zaman', '33', '2023-09-14', 0, 0, 'not paid'),
(10, 'Maisha', '0010', '2023-09-14', 1, 5, 'paid'),
(12, 'arnab', '103', '2023-10-05', 5, 50, 'paid'),
(13, 'arnab', '2897', '2023-05-05', 10, 100, 'not paid'),
(14, 'arnab', '1245', '2023-12-14', 7, 0, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `info_books`
--

CREATE TABLE `info_books` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `auth_name` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info_books`
--

INSERT INTO `info_books` (`b_id`, `b_name`, `auth_name`, `edition`, `isbn`, `publisher`) VALUES
(1, 'Java The Complete Reference', 'Herbert Schildt', '12th', '1260440230', 'Oracle Press');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `username` varchar(100) NOT NULL,
  `bid` varchar(100) NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp(),
  `approve` varchar(100) NOT NULL,
  `issue_date` varchar(100) NOT NULL,
  `return_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`username`, `bid`, `request_date`, `approve`, `issue_date`, `return_date`) VALUES
('arnab', '32', '2023-12-07', '', '', ''),
('arnab', '8', '2023-12-07', '', '', ''),
('arnab', '7', '2023-12-07', '', '', ''),
('arnab', '1', '2023-12-07', '', '', ''),
('arnab', '8', '2023-12-07', '', '', ''),
('arnab', '10', '2023-12-07', '', '', ''),
('arnab', '32', '2023-12-07', '', '', ''),
('talha', '7', '2023-12-07', '', '', ''),
('talha', '9', '2023-12-06', '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '12/6/2023', '12/10/2023'),
('talha', '32', '2023-12-06', '', '', ''),
('talha', '9', '2023-12-06', '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '12/6/2023', '12/10/2023'),
('talha', '7', '2023-12-06', '', '', ''),
('talha', '8', '2023-12-06', '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '12/6/2023', '12/10/2023'),
('talha', '42', '2023-12-06', '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '12/6/2023', '12/10/2023'),
('talha', '1', '2023-12-06', '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '12/6/2023', '12/10/2023'),
('arnab', '8', '2023-12-06', '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '52/6/2023', '12/10/2023'),
('arnab', '43', '2023-12-06', 'No', '12/6/2023', '12/10/2023'),
('arnab', '42', '2023-12-06', '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '22/6/2023', '12/10/2023');

-- --------------------------------------------------------

--
-- Table structure for table `online_payment`
--

CREATE TABLE `online_payment` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `account_number` varchar(15) DEFAULT NULL,
  `trans_id` varchar(50) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `pay_amount` decimal(10,2) DEFAULT NULL,
  `due` decimal(10,2) DEFAULT 0.00,
  `status` varchar(50) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `online_payment`
--

INSERT INTO `online_payment` (`id`, `username`, `email`, `account_number`, `trans_id`, `payment_method`, `pay_amount`, `due`, `status`, `time`) VALUES
(16, 'arnab', 's@S', '+880152136396', 'tskb85433', 'nagad', 100.00, 50.00, 'Clear', '2023-12-07 03:23:14'),
(17, 'arnab', 's@S', '+880152136396', 'tskb85433', 'nagad', 150.00, 0.00, 'Clear', '2023-12-07 03:25:00'),
(18, 'arnab', 's@S', '+880155555', 'rr4#ak544', 'bkash', 100.00, 150.00, 'pending', '2023-12-07 04:22:47'),
(19, 'arnab', 's@S', '+88123692222', 'ro*#ckt', 'rocket', 10.00, 140.00, 'Clear', '2023-12-07 04:25:16'),
(20, 'arnab', 's@S', '+880155555', 'tskb85433', 'bkash', 50.00, 100.00, 'Clear', '2023-12-07 16:05:40'),
(21, 'arnab', 's@S', '+880152136396', 'tskb85433', 'nagad', 100.00, 50.00, 'Clear', '2023-12-07 16:59:04'),
(22, 'arnab', 's@S', '+880155555', 'tskb85433', 'bkash', 100.00, 50.00, 'Clear', '2023-12-07 17:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `submitted_by` varchar(255) DEFAULT NULL,
  `supervised_by` varchar(255) DEFAULT NULL,
  `submission_year` int(11) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `book_shelf` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `category`, `title`, `submitted_by`, `supervised_by`, `submission_year`, `department`, `status`, `book_shelf`) VALUES
(1, 'Project', 'Autonomous Trash Collector Robot', 'Sayed Mohammad', 'Fahad Faysal', 2023, 'CSE', 'Available', '7.3.3'),
(2, 'Thesis', 'Cancer detection with ml', 'Tanzia', 'Zahid Hasan', 2023, 'CSE', 'Available', '2.3.3'),
(3, 'Thesis', 'Thyroid detection', 'Talha', 'Zahid Hasan', 2023, 'CSE', 'Available', '3.3.3'),
(4, 'Project', 'E-commerce website', 'Arnab', 'Fardous Alam Faysal', 2023, 'CSE', 'Not Available', '5.5.6'),
(5, 'Project', 'E-commerce website', 'Syam', 'Fardous Alam Faysal', 2023, 'CSE', 'Not Available', '6.3.3'),
(6, 'Project', 'Iot based project', 'Rony hasan', 'Imran Hossain', 2020, 'EEE', 'Not Available', NULL),
(7, 'Internship', 'Cyber Security', 'Mashaikeh', 'Arpon', 2021, 'CSE', 'Available', NULL),
(9, 'Internship', 'test2', 'katu', 'patu', 2020, 'EEE', 'Avaliable', NULL),
(10, 'Thesis', 'Object detection with opencv', 'Riazul Islam', 'Idish Ponkoz', 1990, 'Nothing', 'Avaliable', '7.6.3'),
(11, 'Project', 'How to make a cake', 'Jayman jawad', 'Pompi', 2023, 'TEST', 'Avaliable', '3.3.3');

-- --------------------------------------------------------

--
-- Table structure for table `purch_donate`
--

CREATE TABLE `purch_donate` (
  `pd_id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `source` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `unit_price` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purch_donate`
--

INSERT INTO `purch_donate` (`pd_id`, `title`, `edition`, `date`, `source`, `quantity`, `unit_price`, `total`) VALUES
('1', 'Java The Complete Reference', '12th', '2022-11-01', 'Makkah Book house, Nilkhet, Dhaka', '20', '200', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `remainder`
--

CREATE TABLE `remainder` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `request_date` date DEFAULT curdate(),
  `return_date` varchar(100) DEFAULT NULL,
  `approve` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `remainder`
--

INSERT INTO `remainder` (`id`, `username`, `request_date`, `return_date`, `approve`, `email`) VALUES
(1, 'sayed', '2023-12-06', '2023-12-10', 'Yes', 'syeedmdtuaha@gmail.com'),
(2, 'tuaha', '2023-12-06', '2023-12-31', 'Yes', 'sayed15-13126@diu.edu.bd'),
(3, 'talha', '2023-12-06', '12/10/2023', 'Yes', 'sayed15-13125@diu.edu.bd');

-- --------------------------------------------------------

--
-- Table structure for table `report_tracking`
--

CREATE TABLE `report_tracking` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL,
  `report_name` varchar(255) DEFAULT NULL,
  `request_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `return_date` varchar(255) DEFAULT NULL,
  `report_request` varchar(255) DEFAULT NULL,
  `report_return` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_tracking`
--

INSERT INTO `report_tracking` (`id`, `username`, `report_id`, `report_name`, `request_time`, `return_date`, `report_request`, `report_return`) VALUES
(3, 'arnab', 6, 'Iot based project', '2023-12-07 11:04:17', '12/12/2023', 'Clear', 'No'),
(4, 'arnab', 5, 'E-commerce website', '2023-12-07 11:45:37', '12/12/2023', 'Clear', 'Yes'),
(5, 'arnab', 3, 'Thyroid detection', '2023-12-07 12:08:23', '12/12/2023', 'Pending', 'No'),
(10, 'arnab', 4, 'E-commerce website', '2023-12-07 16:57:04', '12/12/2024', 'Clear', 'No'),
(11, 'arnab', 7, 'Cyber Security', '2023-12-07 16:57:09', NULL, 'Pending', 'No'),
(12, 'arnab', 2, 'Cancer detection with ml', '2023-12-07 17:01:23', NULL, 'Pending', 'No'),
(13, 'arnab', 4, 'E-commerce website', '2023-12-07 17:01:59', '12/12/2024', 'Clear', 'No'),
(14, 'arnab', 2, 'Cancer detection with ml', '2023-12-07 17:11:10', NULL, 'Pending', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `department` varchar(150) NOT NULL,
  `roll` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `password`, `department`, `roll`, `email`, `phone`, `pic`) VALUES
(1, 'JillSmith', '$2y$10$klcvzcF55PWITm//S/p2i.DW/3rBrT/R/z0UHSS9j4iakMHKS6tIG', 'CSE', 13001, 'Jill@Smith', '011111111111', 'pic.jpg'),
(2, 'MaryMoe', '$2y$10$7JGRYiUNjZ6VCEJzayvVZuoFDKFBGf4WCDdTTgROpXEnRIz6nWYwC', 'Physics', 15001, 'Mary@Moe', '01111111112', 'pic.jpg'),
(3, 'JulieDooley', '$2y$10$0yum0dPQAy8LY.ubpd.5ke6lccXDY5BQQgdLSSsxbxryEtnEu2NLu', 'CSE', 13002, 'Julie@Dooley', '01111111113', 'pic.jpg'),
(4, 'BillGates', '$2y$10$ljBuRHYAnKnKr1LGPT2WruYKVcVdVGjH2n4JB9kDWsCtxM8J.BwRK', 'EEE', 18001, 'Bill@Gates', '01111111114', 'pic.jpg'),
(5, 'RobertKing', '$2y$10$PtkMGjOgL6xUunlMO8C.2uzGsOnNWSAKd/Esn5UJRjfZ8hfeXTAOK', 'Mathematics', 20001, 'Robert@King', '01111111115', 'pic.jpg'),
(6, 'NishatJahan', '$2y$10$VU0II06ntDtoCo30vS8WpObE3bsquH1hedELAgaLjawpJVoLZC..2', 'CSE', 13003, 'Nishat@Jahan', '01111111116', 'pic.jpg'),
(7, 'MichaelSuyama', '$2y$10$nPDZhB6NIB.JC0srZgKnQ.VXKgryTYTJzXIFVM.pnJHgJvKPStThi', 'EEE', 18002, 'Michael@Suyama', '01111111117', 'pic.jpg'),
(8, 'EveJackson', '$2y$10$ZRA/lfnyLDGmkzBIef5HE.wgqKkpgdBhIaGH7r797SfBR5A2dtd36', 'Mathematics', 20002, 'Eve@Jackson', '01111111118', 'pic.jpg'),
(9, 'AnneDodsworth', '$2y$10$B3T86v5CIgxR3FK6IRuE8eMkl0SLAZIdejiG6B.1GlsepTpqCyXPS', 'Physics', 15002, 'Anne@Dodsworth', '01111111119', 'pic.jpg'),
(10, 'NancyDavolio', '$2y$10$Dp1y3aKO/.1x8iEEn1BweOp825JK5qOWgHI8gWuRz81i5jyjdXkcG', 'CSE', 13004, 'Nancy@Davolio', '01111111101', 'pic.jpg'),
(13, 'Maisha', '$2y$10$JfGoWGOg.YL1kXTHhOEMGedm6dyuz7NdSKC2bycFDYrQSCqOUsGCK', 'CSE', 1301, 'maisha@gmail.com', '01832746673', ''),
(14, 'Ahmed', '$2y$10$sbSc05kSHsC2nSzWhffPh.ALtLhc8R9F771ABnbhdTMLARBK7Q2MC', 'CSE', 1302, 'ahmed@gmail.com', '01832746673', ''),
(15, 'Zaman', '$2y$10$NcV5/OyxC4o2udRw9eMI7ewaK9FbhuePuyuNe2XkqZmvXPYS/1zX2', 'CSE', 1303, 'ahmed@gmail.com', '01832746673', ''),
(16, 'arnab', '$2y$10$vRSYkPCtBoy6ShAWQhyvbe4SWqy5KdvrvlUCWIy0NwYYyrdM/gIe.', 'CSE', 13006, 's@S', '0152151236', ''),
(17, 'talha', '$2y$10$9La.htK.YybHkBU3K1Ho5OljxGJWH3WTN95mwZ3pQSaeTrewnzRGi', 'CSE', 13005, 'sayed15-13125@diu.edu.bd', '0152155635', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`fine_id`);

--
-- Indexes for table `online_payment`
--
ALTER TABLE `online_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remainder`
--
ALTER TABLE `remainder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_tracking`
--
ALTER TABLE `report_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `fine`
--
ALTER TABLE `fine`
  MODIFY `fine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `online_payment`
--
ALTER TABLE `online_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `remainder`
--
ALTER TABLE `remainder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report_tracking`
--
ALTER TABLE `report_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
