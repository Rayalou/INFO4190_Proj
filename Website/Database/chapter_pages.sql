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
-- Table structure for table `chapter_pages`
--

CREATE TABLE `chapter_pages` (
  `pageID` int(11) NOT NULL,
  `chapterID` int(11) NOT NULL,
  `pageNumber` int(11) NOT NULL,
  `pageTitle` varchar(255) NOT NULL,
  `pageContent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chapter_pages`
--

INSERT INTO `chapter_pages` (`pageID`, `chapterID`, `pageNumber`, `pageTitle`, `pageContent`) VALUES
(7, 13, 1, 'Test', 'A strong cybersecurity strategy protects all relevant IT infrastructure layers or domains against cyberthreats and cybercrime.\r\n\r\nCritical infrastructure security\r\nCritical infrastructure security protects the computer systems, applications, networks, data and digital assets that a society depends on for national security, economic health and public safety. In the United States, the National Institute of Standards and Technology (NIST) developed a cybersecurity framework to help IT providers in this area. The US Department of Homeland Security’ Cybersecurity and Infrastructure Security Agency (CISA) provides extra guidance.\r\n\r\nNetwork security\r\nNetwork security prevents unauthorized access to network resources, and detects and stops cyberattacks and network security breaches in progress. At the same time, network security helps ensure that authorized users have secure and timely access to the network resources they need.\r\n\r\nEndpoint security\r\nEndpoints—servers, desktops, laptops, mobile devices—remain the primary entry point for cyberattacks. Endpoint security protects these devices and their users against attacks, and also protects the network against adversaries who use endpoints to launch attacks.\r\n\r\nApplication security\r\nApplication security protects applications running on-premises and in the cloud, preventing unauthorized access to and use of applications and related data. It also prevents flaws or vulnerabilities in application design that hackers can use to infiltrate the network. Modern application development methods—such as DevOps and DevSecOps—build security and security testing into the development process.\r\n\r\nCloud security\r\nCloud security secures an organization’s cloud-based services and assets—applications, data, storage, development tools, virtual servers and cloud infrastructure. Generally speaking, cloud security operates on the shared responsibility model where the cloud provider is responsible for securing the services that they deliver and the infrastructure that is used to deliver them. The customer is responsible for protecting their data, code and other assets they store or run in the cloud. The details vary depending on the cloud services used.\r\n\r\nInformation security\r\nInformation security (InfoSec) pertains to protection of all an organization&#039;s important information—digital files and data, paper documents, physical media, even human speech—against unauthorized access, disclosure, use or alteration. Data security, the protection of digital information, is a subset of information security and the focus of most cybersecurity-related InfoSec measures.\r\n\r\nMobile security\r\nMobile security encompasses various disciplines and technologies specific to smartphones and mobile devices, including mobile application management (MAM) and enterprise mobility management (EMM). More recently, mobile security is available as part of unified endpoint management (UEM) solutions that enable configuration and security management for multiple endpoints—mobile devices, desktops, laptops, and more—from a single console.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter_pages`
--
ALTER TABLE `chapter_pages`
  ADD PRIMARY KEY (`pageID`),
  ADD KEY `chapterID` (`chapterID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter_pages`
--
ALTER TABLE `chapter_pages`
  MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapter_pages`
--
ALTER TABLE `chapter_pages`
  ADD CONSTRAINT `chapter_pages_ibfk_1` FOREIGN KEY (`chapterID`) REFERENCES `chapters` (`chapterID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
