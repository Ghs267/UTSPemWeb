-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 03:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sosmed`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`first_name`, `last_name`, `email`, `username`, `password`, `birth_date`, `gender`, `image`) VALUES
('admin', 'admin', 'admin@umn.ac.id', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2001-01-01', 'male', 'test.png'),
('Anjali', 'Putri', 'anjali.putri@gmail.com', 'anjaliputri', 'fa3ebb2ee7fcf1c73aba4565d4c556f2', '1970-01-01', 'female', 'default.png'),
('awan', 'cloud', 'awan.cloud@gmail.com', 'awancloud', '9eeb3c5a67198c8fb57d311fb7ca90cb', '1970-01-01', 'male', 'default.png'),
('Erika', 'Atmaja', 'erika2@student.umn.ac.id', 'erikaatmaja', 'b75979a5bb8a6e1ae0d1f88a58cf7619', '1970-01-01', 'female', 'default.png'),
('Jennie', 'Florensia', 'jennie@student.umn.ac.id', 'jennie_florensia', '21232f297a57a5a743894a0e4a801fc3', '1970-01-01', 'Female', 'shelcu.jpg'),
('Presy', 'Intan', 'presytan@gmail.com', 'presyintan', 'c5d7e165d2b2d62ad7976070f579ba7f', '1970-01-01', 'female', 'default.png'),
('Widih', 'Wadaw', 'widih.wadaw@gmail.com', 'wadidaw', 'd9601faf11fcd1ea6b621c55dfe04033', '1970-01-01', 'Female', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `username` varchar(255) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment_id` int(11) NOT NULL,
  `body` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`username`, `post_id`, `comment_id`, `body`, `created_at`) VALUES
('jennie_florensia', 22, 2, 'scsd', '2020-03-23 18:10:01'),
('jennie_florensia', 22, 3, 'gggg', '2020-03-23 18:12:45'),
('jennie_florensia', 22, 4, 'wih', '2020-03-23 18:22:34'),
('admin', 22, 5, 'test -admin', '2020-03-24 00:12:51'),
('admin', 22, 6, 'sd', '2020-03-24 00:15:44'),
('admin', 22, 7, 'fdsfdsf', '2020-03-24 00:16:05'),
('admin', 22, 8, 'ads', '2020-03-24 00:16:43'),
('admin', 22, 9, 'dsd', '2020-03-24 00:18:24'),
('admin', 22, 10, 'aaaaawa', '2020-03-24 00:19:38'),
('admin', 22, 11, 'hello jen', '2020-03-24 00:21:03'),
('admin', 32, 12, 'test', '2020-03-24 00:22:59'),
('jennie_florensia', 32, 13, 'hai min', '2020-03-24 00:28:42'),
('wadidaw', 22, 14, 'halo', '2020-03-25 05:08:04'),
('wadidaw', 32, 15, 'yow', '2020-03-25 05:11:47'),
('wadidaw', 32, 16, 'hellow', '2020-03-25 05:13:00'),
('wadidaw', 32, 17, 'aaaa', '2020-03-25 05:15:09'),
('wadidaw', 25, 18, 'yoa', '2020-03-25 05:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `username` varchar(255) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `body` text DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`username`, `post_id`, `body`, `picture`, `created_at`, `updated_at`) VALUES
('jennie_florensia', 22, 'asasa', NULL, '2020-03-23 10:59:09', NULL),
('jennie_florensia', 25, 'halaw', NULL, '2020-03-23 22:52:26', NULL),
('jennie_florensia', 26, 'sfgfsgs', NULL, '0000-00-00 00:00:00', NULL),
('jennie_florensia', 27, 'hdrhdhdr', NULL, '0000-00-00 00:00:00', NULL),
('jennie_florensia', 28, 'fzsfzf', NULL, '2020-03-23 22:56:54', NULL),
('jennie_florensia', 29, 'rdgdrgdrgrsg', NULL, '2020-03-23 23:57:13', NULL),
('jennie_florensia', 30, 'esfdgseg', NULL, '2020-03-23 22:57:31', NULL),
('jennie_florensia', 31, 'dsvsdfesfa', NULL, '2020-03-23 18:03:59', NULL),
('admin', 32, 'aaaa', NULL, '2020-03-24 00:22:20', NULL),
('jennie_florensia', 38, '', 'pngwave.png', '2020-03-25 04:31:08', NULL),
('wadidaw', 39, 'yuk join', '707284.jpg', '2020-03-25 04:38:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `username` (`username`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
