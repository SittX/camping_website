-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2023 at 03:19 PM
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
-- Database: `campsite_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Booking`
--

CREATE TABLE `Booking` (
  `booking_id` bigint(20) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `site_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Booking`
--

INSERT INTO `Booking` (`booking_id`, `check_in`, `check_out`, `user_id`, `site_id`) VALUES
(1, '2023-06-15', '2023-06-19', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `CampSite`
--

CREATE TABLE `CampSite` (
  `site_id` bigint(20) NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `local_attraction` text NOT NULL,
  `features` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `notice_note` text NOT NULL,
  `pitch_type_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CampSite`
--

INSERT INTO `CampSite` (`site_id`, `location`, `description`, `local_attraction`, `features`, `price`, `notice_note`, `pitch_type_id`) VALUES
(2, 'NPT', 'Another camp for extrovert', 'It is located near meditation center', 'paid wifi, 2 meals a day', '19.00', 'Be careful of Introvert!', 3),
(3, 'Away', 'My new Campsite', 'waterfall', 'NO HUMAN', '29.00', 'NO ELVE', 2),
(4, 'testing', 'testing', 'testing', 'testing', '22.00', 'testing', 3),
(5, 'NPT', 'popup testing', 'Ocean supercenter', 'popup form', '9.00', 'Only allows member', 7);

-- --------------------------------------------------------

--
-- Table structure for table `CampSiteImages`
--

CREATE TABLE `CampSiteImages` (
  `image_id` bigint(20) NOT NULL,
  `url` text NOT NULL,
  `site_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CampSiteImages`
--

INSERT INTO `CampSiteImages` (`image_id`, `url`, `site_id`) VALUES
(1, 'Big o chart.png', 2),
(2, 'Layered Architecture.jpg', 2),
(3, 'network topology.png', 2),
(4, 'helloWorld.jpg', 3),
(5, 'ironman.jpg', 3),
(6, 'JPN.jpg', 3),
(7, 'Lonely man.jpg', 4),
(8, 'lookAway.jpg', 4),
(9, 'melbourne.jpg', 4),
(10, 'Screen Shot 2022-10-06 at 2.01.27 PM.png', 5),
(11, 'Screen Shot 2022-10-07 at 12.55.29 PM.png', 5),
(12, 'Screen Shot 2022-10-17 at 12.48.25 PM.png', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Contact`
--

CREATE TABLE `Contact` (
  `contact_id` int(11) NOT NULL,
  `contact_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Contact`
--

INSERT INTO `Contact` (`contact_id`, `contact_date`, `message`, `user_id`) VALUES
(1, '2023-05-29 04:28:24', 'Hello world', 1),
(2, '2023-06-01 05:03:24', 'Hello , we are testing the contact messaging features.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `PitchType`
--

CREATE TABLE `PitchType` (
  `pitch_type_id` bigint(20) NOT NULL,
  `pitch_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `PitchType`
--

INSERT INTO `PitchType` (`pitch_type_id`, `pitch_description`) VALUES
(1, 'family pitch'),
(2, 'single pitch'),
(3, 'group pitch'),
(7, 'Gamer pitch');

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `review_id` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `rating` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `site_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`review_id`, `message`, `rating`, `title`, `user_id`, `site_id`) VALUES
(2, 'The campsite is very peaceful and quite. Would definitely coming back !', 4, 'Outer world !', 1, 2),
(3, 'The campsite is very peaceful and quite. Would definitely coming back !', 4, 'Outer world !', 1, 2),
(8, 'Very comfortable', 4, 'Good review !', 1, 2),
(9, 'asdf', 4, 'asdf', 1, 2),
(10, 'very very good and nice and beautiful', 2, 'Review for campsite 2', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `rank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`, `rank`) VALUES
(1, 'Kevin', 'san', 'kevin', 'kevin@gmail.com', 'kevin123', 'user'),
(2, 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin123', 'admin'),
(3, 'David', 'davey', 'Davey', 'david@gmail.com', 'd123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `FK_booking_userID` (`user_id`),
  ADD KEY `FK_booking_siteID` (`site_id`);

--
-- Indexes for table `CampSite`
--
ALTER TABLE `CampSite`
  ADD PRIMARY KEY (`site_id`),
  ADD KEY `FK_campSite_pitchTypeID` (`pitch_type_id`);

--
-- Indexes for table `CampSiteImages`
--
ALTER TABLE `CampSiteImages`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `FK_campSiteImage_siteID` (`site_id`);

--
-- Indexes for table `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `FK_userID` (`user_id`);

--
-- Indexes for table `PitchType`
--
ALTER TABLE `PitchType`
  ADD PRIMARY KEY (`pitch_type_id`),
  ADD UNIQUE KEY `pitch_description` (`pitch_description`) USING HASH;

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `FK_review_userID` (`user_id`),
  ADD KEY `FK_review_siteID` (`site_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `CampSite`
--
ALTER TABLE `CampSite`
  MODIFY `site_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `CampSiteImages`
--
ALTER TABLE `CampSiteImages`
  MODIFY `image_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Contact`
--
ALTER TABLE `Contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `PitchType`
--
ALTER TABLE `PitchType`
  MODIFY `pitch_type_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Review`
--
ALTER TABLE `Review`
  MODIFY `review_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `FK_booking_siteID` FOREIGN KEY (`site_id`) REFERENCES `CampSite` (`site_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_booking_userID` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `CampSite`
--
ALTER TABLE `CampSite`
  ADD CONSTRAINT `FK_campSite_pitchTypeID` FOREIGN KEY (`pitch_type_id`) REFERENCES `PitchType` (`pitch_type_id`);

--
-- Constraints for table `CampSiteImages`
--
ALTER TABLE `CampSiteImages`
  ADD CONSTRAINT `FK_campSiteImage_siteID` FOREIGN KEY (`site_id`) REFERENCES `CampSite` (`site_id`) ON DELETE CASCADE;

--
-- Constraints for table `Contact`
--
ALTER TABLE `Contact`
  ADD CONSTRAINT `FK_userID` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `FK_review_siteID` FOREIGN KEY (`site_id`) REFERENCES `CampSite` (`site_id`),
  ADD CONSTRAINT `FK_review_userID` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
