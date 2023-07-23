-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2023 at 12:21 PM
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
(1, '2023-07-24', '2023-07-31', 5, 4),
(2, '2023-07-24', '2023-07-27', 1, 3),
(3, '2023-08-01', '2023-08-08', 3, 2),
(4, '2023-07-22', '2023-07-23', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `CampSite`
--

CREATE TABLE `CampSite` (
  `site_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `local_attraction` text NOT NULL,
  `features` text NOT NULL,
  `map_iframe` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `notice_note` text NOT NULL,
  `pitch_type_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `CampSite`
--

INSERT INTO `CampSite` (`site_id`, `name`, `location`, `description`, `local_attraction`, `features`, `map_iframe`, `price`, `notice_note`, `pitch_type_id`) VALUES
(1, 'Gluch Camp', 'Califonia', 'A visit at Gulch Camp may make you feel like you\'re reliving the Old West\'s lifestyle. The camping area is located on an 800-acre ranch.', 'The campsite is 20 minutes away from the Rainbow pool. Half an hour away from the Tuolumne river and about a hour and a half away from the Stanislaus National forest.', 'Bath available, Car parking, Barbecue grills allowed, Campfires allowed', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25181.6780136538!2d-120.39361372247835!3d37.91384640515791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8090dacc7224e2ef%3A0xe8b2e31502d5d12d!2sCamp%20Meeting%20Gulch!5e0!3m2!1sen!2smm!4v1690025332897!5m2!1sen!2smm\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '20.00', 'No refunds within 1 day of arrival', 4),
(2, 'Infinity Acres Ranch', 'Virginia', 'Infinity Acres Ranch is home to over 40 different species of animals, both domestic and exotic. Are you ready for an animal adventure in the nature?', 'The campsite is 15 minutes away from the Smith River Sports complex. It is also located near the Catfish ATV Trails.', 'Fishing, Playground, Internet access', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3203.4578828947324!2d-79.81391658891263!3d36.59127977933358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88529417236c23ef%3A0x8f24aa8810f556e2!2sInfinity%20Acres%20Petting%20Ranch%20%2FAnimal%20Interactive%20Educational%20Non-Profit!5e0!3m2!1sen!2smm!4v1690025598378!5m2!1sen!2smm\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '15.00', 'Bookings cannot be amended within 7 days of arrival.', 4),
(3, 'Brimstone Retreats', 'Tennessee', 'This campsite has over 300 miles of great ATV trails, as well as a variety of other outdoor recreational activities including hiking, canoeing, kayaking, or fishing in the river.', 'This campsite is 20 minutes away from Big South Fork National Park.', 'Bath available, Peaceful, Dogs allowed, Convenience store nearby', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25692.387306877834!2d-84.49949537690065!3d36.395924718473786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x885da515b3c79a9b%3A0x3735874dc4569764!2sBrimstone%20Cabins%20%26%20Campground%2C%20LLC!5e0!3m2!1sen!2smm!4v1690025888702!5m2!1sen!2smm\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '30.00', 'No refunds for bad weather, late arrivals or early departures.', 2),
(4, 'Wilderness Haven', 'Alberta, Canada', 'Experience the serene beauty of the Canadian Rockies at Wilderness Haven. This campsite offers breathtaking mountain views and abundant wildlife sightings. Immerse yourself in nature and enjoy a truly unforgettable camping experience.', 'Explore the hiking trails of Maligne Canyon and take a boat ride on Maligne Lake.', 'Campfires allowed, Picnic areas, Drinking water available', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29704.25981637685!2d-117.96757126335707!3d52.85849613627969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x539d2a9b0e6ce369%3A0x25e1104261a6fb0e!2sTekarra%20Backcountry%20Campground%20(Skyline%20Trail%20Hike)!5e0!3m2!1sen!2smm!4v1690026289380!5m2!1sen!2smm\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '15.00', 'Reservation cancellation must be made 48 hours prior to the check-in date.', 3);

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
(1, '880801.jpeg', 1),
(2, '880815.jpeg', 1),
(3, '880816.jpeg', 1),
(4, '1087580.jpeg', 1),
(5, '854775.jpeg', 2),
(6, '854776.jpeg', 2),
(7, '854789.jpeg', 2),
(8, '854801.jpeg', 2),
(9, '1114424.jpeg', 3),
(10, '1114426.jpeg', 3),
(11, '1114435.jpeg', 3),
(12, '1114443.jpeg', 3),
(13, '1114445.jpeg', 3),
(14, '1085520.jpeg', 4),
(15, '1085521.jpeg', 4),
(16, '1091165.jpeg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Contact`
--

CREATE TABLE `Contact` (
  `contact_id` int(11) NOT NULL,
  `contact_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Contact`
--

INSERT INTO `Contact` (`contact_id`, `contact_date`, `message`, `status`, `user_id`) VALUES
(1, '2023-07-22 11:07:32', 'Hi there! I want to book a campsite for this weekend. Could you let me know all available campsites with their prices? Thanks!', 'NO_REPLY', 1),
(2, '2023-07-22 11:09:34', 'I\'m having issue with the online campsite reservation. Can you help me with the process ? Let me know.', 'NO_REPLY', 5),
(3, '2023-07-22 11:10:40', 'I\'ve left some of my important items at one of the campsites. Is there anyway to get it back? Please contact me ASAP. ', 'NO_REPLY', 3),
(4, '2023-07-22 14:03:33', ' Hey Admin, I&#039;m organizing a group camping trip for a scout team. Do you offer any special group rates or accommodations? Looking forward to your reply.', 'REPLIED', 5),
(5, '2023-07-22 14:18:38', 'testing', 'REPLIED', 5);

-- --------------------------------------------------------

--
-- Table structure for table `PitchType`
--

CREATE TABLE `PitchType` (
  `pitch_type_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pitch_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `PitchType`
--

INSERT INTO `PitchType` (`pitch_type_id`, `title`, `pitch_description`) VALUES
(2, 'Weekend campsite', 'Campsite for doing weekend activities in nature'),
(3, 'Friend Campsite', 'Campsite for doing camping with friends'),
(4, 'Family Campsite', 'Campsite for families who want to do camping activities');

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `review_id` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `rating` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `site_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`review_id`, `message`, `rating`, `title`, `user_id`, `site_id`) VALUES
(1, 'Absolutely stunning campsite! The views of the Canadian Rockies are breathtaking. Clean facilities, friendly staff. Highly recommend!', 5, 'The best camping experience of my life!', 3, 4),
(2, 'A lakeside paradise with breathtaking views. Enjoyed kayaking, exploring Queenstown. Highly recommended!', 5, 'Beautiful paradise ', 5, 2),
(3, 'The overall atmosphere has a tranquil setting which is my favourite. The campsite had clean facilities, friendly staff, and great hiking trails. A perfect place to reconnect with nature.', 4, 'Tranquility at Its Best', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `RssFeed`
--

CREATE TABLE `RssFeed` (
  `rss_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `description` text NOT NULL,
  `publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `RssFeed`
--

INSERT INTO `RssFeed` (`rss_id`, `title`, `link`, `description`, `publish_date`) VALUES
(1, 'Top 22 camping destinations', 'https://viatravelers.com/best-camping-spots-in-the-world/', 'Explore some of the most beautiful campsites around the world. From luxury to adventurous camping, the world’s best camping spots offer something for every camping enthusiasts. ', '2023-07-22'),
(2, 'Camping essentials for beginners', 'https://www.rei.com/learn/expert-advice/camping-for-beginners.html', 'Planning a camping vacation? Don\'t forget to check our comprehensive camping essentials checklist. Be well-prepared for a comfortable and safe adventure in your first camping trip.', '2023-07-22'),
(3, 'Stargazing 101 for beginners', 'https://www.hipcamp.com/journal/stargazing-101', 'Discover the beauty of our universe in the night sky with our comprehensive guide on how to plan a perfect star gazing camping trip.', '2023-07-22');

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
(1, 'John', 'Smith', 'john_smith_22', ' johnsmith22@google.com', 'J0hnSmi!th2023', 'user'),
(3, 'Emily ', 'Holmes', 'HEmily', 'emilyholmes@yahoo.com', 'emilyh0lmes123', 'user'),
(5, 'Micheal', 'James', 'Micheal', 'michealjames@gmail.com', 'micheal1234', 'user'),
(6, 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `User_logs`
--

CREATE TABLE `User_logs` (
  `log_id` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User_logs`
--

INSERT INTO `User_logs` (`log_id`, `ip_address`, `date`) VALUES
(1, '127.0.0.1', '2023-07-22'),
(2, '::1', '2023-07-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `FK_booking_siteID` (`site_id`),
  ADD KEY `FK_booking_userID` (`user_id`);

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
  ADD PRIMARY KEY (`pitch_type_id`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `FK_review_siteID` (`site_id`),
  ADD KEY `FK_review_userID` (`user_id`);

--
-- Indexes for table `RssFeed`
--
ALTER TABLE `RssFeed`
  ADD PRIMARY KEY (`rss_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `User_logs`
--
ALTER TABLE `User_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `CampSite`
--
ALTER TABLE `CampSite`
  MODIFY `site_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `CampSiteImages`
--
ALTER TABLE `CampSiteImages`
  MODIFY `image_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Contact`
--
ALTER TABLE `Contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `PitchType`
--
ALTER TABLE `PitchType`
  MODIFY `pitch_type_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Review`
--
ALTER TABLE `Review`
  MODIFY `review_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `RssFeed`
--
ALTER TABLE `RssFeed`
  MODIFY `rss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `User_logs`
--
ALTER TABLE `User_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `FK_campSite_pitchTypeID` FOREIGN KEY (`pitch_type_id`) REFERENCES `PitchType` (`pitch_type_id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `FK_review_siteID` FOREIGN KEY (`site_id`) REFERENCES `CampSite` (`site_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_review_userID` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
