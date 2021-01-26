-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 06:32 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `quantity` int(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `pdf_file` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `authors`, `edition`, `status`, `quantity`, `type`, `pdf_file`) VALUES
(4, 'Government Gazette', 'klkkk', '8th', 'available', 8, 'Gvt press gazette', 'Number.docx'),
(5, 'Government Gazette', 'klkkk', '8th', 'available', 8, 'Gvt press gazette', 'Not Available'),
(6, 'Government Gazette', 'Joel,Mike', '8th', 'available', 8, 'Gvt press gazette', 'Not Available'),
(7, 'Government Gazette', 'Joel,Mike', '8th', 'available', 8, 'Gvt press gazette', 'Not Available'),
(8, 'Government Gazette', 'Joel,Mike', '8th', 'available', 8, 'Gvt press gazette', 'Not Available'),
(9, 'Government Gazette 5', 'Joel,Mike', '8th', 'available', 8, 'Gvt press gazette', 'Not Available'),
(10, 'Government Gazette 8', 'Joel,Mike', '8th', 'available', 8, 'Gvt press gazette', 'CHEPKOR_MADINI1[1].docx'),
(11, 'Government Gazette 8', 'Joel,Mike', '8th', 'available', 8, 'Gvt press gazette', 'Not Available'),
(19, 'The Enemy in Brussels 2019,	POLITICS', 'Kimati JKL', '8th', 'available', 9, 'Documentaries', 'permit2.docx'),
(20, 'Trump\'s Trade War (Vice) 2018,	POLITICS', 'joe Mike', '8th', 'available', 90, 'Documentaries', 'Not Available'),
(21, 'Child Learning 1', 'Njuer manuela', '8th', 'available', 90, 'Child protection', 'Not Available'),
(22, 'kkkk', 'hiseguofy', '8th', 'available', 9, 'Evaluation publication', 'Not Available'),
(23, 'oijio', 'Joash', '8th', 'available', 90, 'Gvt press gazette', 'Vinny_application_letter_2[1].');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_number` int(100) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `issue_date` varchar(100) NOT NULL,
  `return_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `name`, `id_number`, `b_name`, `status`, `issue_date`, `return_date`) VALUES
(1, 'kkkk', 23454543, '', 'available', '2019-07-22', '2019-07-23'),
(2, 'kkkk', 23454543, '', 'W4Y4W3Y6W34EY3', '2019-07-22', '2019-07-23'),
(3, 'kkkk', 23454543, 'Evaluation publication1', 'available', '2019-07-22', '2019-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `uploadedby` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `name`, `date`, `uploadedby`) VALUES
(1, 'UB40 - Reasons.mp4', '2019-07-26 19:20:31', 'Admin'),
(3, 'logo.jpg', '2019-08-02 11:01:29', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `dor` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `gender`, `dor`, `email`, `phone`, `username`, `password`) VALUES
(1, 'KELVIN', 'KOECH', 'MALE', ' 11-07-201', 'koechkelvin97@gmail.com', 0, 'Admin', '1234'),
(2, 'Silas', 'Ruto', 'MALE', ' 11-07-201', 'silasrutto@gmail.com', 0, 'username', 'password'),
(3, 'KELVIN', 'KOECH', 'MALE', ' 11-07-201', 'kk@gmail.com', 0, 'kip', 'kips'),
(4, 'ken', 'luiz', 'MALE', ' 12-07-201', 'ken98@yahoo.com', 0, 'ferews', '2000'),
(5, 'rose', 'w', 'FEMAL', ' 12-07-201', 'nyawirawangombe@gmail.com', 0, 'nyawira', 'nyawira'),
(6, 'jlhuefv', 'KOECH', 'MALE', ' 13-07-201', 'koechkllelvin97@gmail.com', 0, 'Chairman', '1234'),
(7, 'jlhuefv', 'KOECH', 'MALE', ' 13-07-201', 'koechkllelin97@gmail.com', 0, 'Chairmanl', '1234'),
(8, 'KELVIN', 'KOECH', 'MALE', ' 13-07-201', 'koechkelvin907@gmail.com', 0, 'kips', 'chair123'),
(9, 'KELVIN', 'KOECH', 'MALE', ' 14-07-201', 'koechnmnmmkelvin97@gmail.com', 0, 'Chaijrman', 'kkkk'),
(10, 'KELVIN', 'KOECH', 'MALE', ' 14-07-201', 'kjuk@gmail.com', 0, 'Chairmank', 'elias123'),
(11, 'KELVIN', 'KOECH', 'MALE', ' 14-07-201', 'koechlkelvin97@gmail.com', 0, 'Chairman', 'mmmm'),
(12, 'iouiu', 'yuy', 'MALE', '14-07-2019', 'meyiud@gmail.com', 0, 'julus', 'juls'),
(13, 'KELVIN', 'KOECH', 'MALE', '14-07-2019', 'koechkllllllllllelvin97@gmail.com', 0, 'musia', 'musia'),
(14, 'KELVIN', 'KOECH', 'MALE', '14-07-2019', 'kelvin97@gmail.com', 0, 'Chairman', 'chair123'),
(15, 'KELVIN', 'KOECH', 'MALE', '14-07-2019', 'mikejohn90@yahoo.com', 0, 'Chairman', 'mmmm'),
(16, 'KELVIN', 'KOECH', 'MALE', '14-07-2019', 'koechkelvinuuiuu7@gmail.com', 0, 'Chairman', 'elias123'),
(17, 'KELVIN', 'KOECH', 'MALE', '14-07-2019', 'koechkkkkkelvin97@gmail.com', 0, 'Chairmanl', 'chair123uyhyi'),
(18, 'KELVIN', 'KOECH', 'MALE', '14-07-2019', 'koecklxahkelvin97@gmail.com', 0, 'Chairman', 'mike12'),
(19, 'KELVIN', 'KIPCHUMBA', 'MALE', '18-07-2019', 'kelvinkipchumba97@gmail.com', 0, 'kipkoech', '1234'),
(20, 'Janeth', 'mbugua', 'MALE', '19-07-2019', 'janethmbugua009@gmail.com', 0, 'janeth', 'janeth');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
