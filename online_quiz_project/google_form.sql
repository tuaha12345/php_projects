-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 03:35 PM
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
-- Database: `google_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `form_name` varchar(225) DEFAULT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  `user_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `form_name`, `user_name`, `user_id`) VALUES
(103, 82, 'true', 'PHP exam1', 'Rony Hasan', '192-15-13129'),
(104, 83, 'PHP', 'PHP exam1', 'Rony Hasan', '192-15-13129'),
(105, 84, 'echo ', 'PHP exam1', 'Rony Hasan', '192-15-13129'),
(106, 85, 'PHP extension and application repository', 'PHP exam1', 'Rony Hasan', '192-15-13129'),
(107, 86, '  glob()', 'PHP exam1', 'Rony Hasan', '192-15-13129'),
(108, 87, 'true', 'quiz1', ' Rabbil Hasan', '192-15-13124'),
(109, 88, 'PHP', 'quiz1', ' Rabbil Hasan', '192-15-13124'),
(110, 89, 'print', 'quiz1', ' Rabbil Hasan', '192-15-13124'),
(111, 90, 'PHP extension and application repository', 'quiz1', ' Rabbil Hasan', '192-15-13124'),
(112, 91, ' glob()', 'quiz1', ' Rabbil Hasan', '192-15-13124');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_text` varchar(255) NOT NULL,
  `form_name` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option_text`, `form_name`) VALUES
(86, 83, 'hphp', 'PHP exam1'),
(87, 83, 'HTML', 'PHP exam1'),
(88, 83, 'PHP', 'PHP exam1'),
(89, 84, 'echo ', 'PHP exam1'),
(90, 84, 'write', 'PHP exam1'),
(91, 84, 'print', 'PHP exam1'),
(92, 84, 'Both echo & print', 'PHP exam1'),
(93, 88, 'HPHP', 'quiz1'),
(94, 88, 'HTML', 'quiz1'),
(95, 88, 'PHP', 'quiz1'),
(96, 88, 'Python', 'quiz1'),
(97, 89, 'echo', 'quiz1'),
(98, 89, 'write', 'quiz1'),
(99, 89, 'print', 'quiz1'),
(100, 89, 'both echo & print', 'quiz1');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `form_name` varchar(225) DEFAULT NULL,
  `question_type` enum('short','truefalse','multiple') NOT NULL,
  `correct_answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `form_name`, `question_type`, `correct_answer`) VALUES
(82, 'Variable name in PHP starts with -$ (Dollar)', 'PHP exam1', 'truefalse', 'true'),
(83, 'Which of the following is the default file extension of PHP?', 'PHP exam1', 'multiple', 'PHP'),
(84, 'Which of the following is used to display the output in PHP?', 'PHP exam1', 'multiple', 'Both echo & print'),
(85, 'What does PEAR stands for?', 'PHP exam1', 'short', 'PHP extension and application repository'),
(86, '___ function is used to find files in PHP', 'PHP exam1', 'short', 'glob()'),
(87, 'Variable name in PHP starts with -$ (Dollar)', 'quiz1', 'truefalse', 'true'),
(88, 'Which of the following is the default file extension of PHP?', 'quiz1', 'multiple', 'PHP'),
(89, 'Which of the following is used to display the output in PHP?', 'quiz1', 'multiple', 'both echo & print'),
(90, 'What does PEAR stands for?', 'quiz1', 'short', 'PHP extension and application repository'),
(91, '___ function is used to find files in PHP', 'quiz1', 'short', ' glob()');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
