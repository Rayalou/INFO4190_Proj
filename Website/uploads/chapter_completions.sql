-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 03:50 AM
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
-- Database: `cybersecurity_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapter_completions`
--

CREATE TABLE `chapter_completions` (
  `completionID` int(11) NOT NULL,
  `studentID` int(11) DEFAULT NULL,
  `chapterID` int(11) DEFAULT NULL,
  `progress` int(11) DEFAULT 100,
  `completed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chapter_completions`
--

INSERT INTO `chapter_completions` (`completionID`, `studentID`, `chapterID`, `progress`, `completed_at`) VALUES
(92, 364840, 13, 100, '2024-06-18 23:13:48'),
(93, 364840, 13, 100, '2024-06-18 23:18:14'),
(94, 364840, 13, 100, '2024-06-18 23:18:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter_completions`
--
ALTER TABLE `chapter_completions`
  ADD PRIMARY KEY (`completionID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `chapterID` (`chapterID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter_completions`
--
ALTER TABLE `chapter_completions`
  MODIFY `completionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapter_completions`
--
ALTER TABLE `chapter_completions`
  ADD CONSTRAINT `chapter_completions_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`),
  ADD CONSTRAINT `chapter_completions_ibfk_2` FOREIGN KEY (`chapterID`) REFERENCES `chapters` (`chapterID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
