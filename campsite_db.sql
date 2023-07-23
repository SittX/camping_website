-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2023 at 03:34 PM
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
(14, 'Gulch Camp', 'Groveland, California, USA', 'A visit at Diamond Gulch Camp may make you feel as though you\'re reliving the lifestyle of the Old West\'s pioneers. The camping area is located on an 800-acre ranch that was previously home to the Miwok people.', 'On a hot day, cool off in Rainbow Pool (20 minutes away), a lake covered by flora with a small waterfall and rocks to dive from. After you\'ve cooled off, you can stay for a picnic.  Thrill seekers go to the Tuolumne River (half an hour), a popular whitewater rafting destination with an 18-mile section highlighted by high rapids. When you\'re not eagerly paddling to keep afloat, you might be able to enjoy the beautiful riverside scenery of alpine meadows and stunning rock formations.  More outdoor activities can be found at Stanislaus National Forest (about an hour and 15 minutes away), a wilderness area with a huge network of hiking and mountain-biking routes.', 'Bath available, Car parking, Barbecue grills allowed, Campfires allowed', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127219.98715340086!2d-120.51716566085817!3d37.91381670975585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8090dacc7224e2ef%3A0xe8b2e31502d5d12d!2sCamp%20Meeting%20Gulch!5e1!3m2!1sen!2smm!4v1688571197011!5m2!1sen!2smm\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '30.00', 'No refunds within 1 day of arrival date.', 2),
(15, 'Infinity Acres Ranch', 'Martinsville, Virginia, USA', 'Are you ready for a fun-filled animal adventure? Infinity Acres Ranch is an isolated farm in the Blue Ridge Mountains\' foothills that is home to over 40 different species of animals, both domestic and exotic.', 'It\'s doubtful that you\'ll ever leave the farm, but if you do, there\'s lots of options for outdoor excursions. On the Smith River, you can try kayaking, tubing, and fishing - rent fishing gear at Smith River Outfitters (25 minutes) - or play soccer at the Smith River Sports Complex (15 minutes).  Walk the Mountain Laurel Trails (20 minutes) or ride an ATV through the Catfish ATV Trails and Pond. If you\'re traveling with children, Fairy Stone State Park (both about a half-hour drive away) has a sandy beach and a family-friendly splash park, or you can rent a kayak and explore the serene landscapes surrounding forest-fringed Philpott Lake (45 minutes).', 'Fishing, Playground, Internet access', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4046.034270610066!2d-79.8139112234073!3d36.59127547230742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88529417236c23ef%3A0x8f24aa8810f556e2!2sInfinity%20Acres%20Petting%20Ranch%20%2FAnimal%20Interactive%20Educational%20Non-Profit!5e1!3m2!1sen!2smm!4v1688572132450!5m2!1sen!2smm\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '15.00', 'Bookings cannot be amended within 7 day(s) of arrival. ', 1),
(16, 'Brimstone Retreats', 'Huntsville, Tennessee, USA', 'Have you ever wanted to explore the backcountry paths of the Appalachian Mountains? This is the spot for you. Brimstone® Retreats in Huntsville has a campground that provides direct access to 19,196 acres of remote northeast Tennessee in the heart of Appalachia. That\'s over 300 miles of great ATV trails, as well as a variety of other outdoor recreational activities including hiking, canoeing, kayaking, or fishing for walleye, smallmouth, muskie, and redeye on the New River.', 'You can ride horses over upland routes at Big South Fork National Park (20 minutes\' drive), enjoy whitewater rafting on the Big South Fork River, and mountain bike into the backcountry. Or how about a ride on the Big South Fork Scenic Railway from Stearns to Blue Heron via the park?  Get in your car and head to this remote region of Appalachia. Norris Lake (two hours) is a gorgeous circular drive from the campground, with watersports and boat rentals available on the lake, which is flanked by mountain foothills. ', 'Bath available, Peaceful, Dogs allowed, Convenience store nearby', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4360.75343552743!2d-84.46940972026951!3d36.38173340684242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x885da515b3c79a9b%3A0x3735874dc4569764!2sBrimstone%20Cabins%20%26%20Campground%2C%20LLC!5e1!3m2!1sen!2smm!4v1688572434568!5m2!1sen!2smm\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '25.00', 'No refunds/discounts for inclement weather, late arrivals or early departures. ', 3);

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
(31, '1085520.jpeg', 14),
(32, '1085521.jpeg', 14),
(33, '1091165.jpeg', 14),
(34, '854775.jpeg', 15),
(35, '854776.jpeg', 15),
(36, '854789.jpeg', 15),
(37, '854801.jpeg', 15),
(38, '1114424.jpeg', 16),
(39, '1114426.jpeg', 16),
(40, '1114435.jpeg', 16),
(41, '1114443.jpeg', 16),
(42, '1114445.jpeg', 16);

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
(1, 'Family pitch', 'A campsite for family members.'),
(2, 'Single pitch', 'Pitch for people who want to spend their time alone.'),
(3, 'Group pitch', 'Campsite for those who want to go camping with their friends or family members.');

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
(12, 'Very good', 5, 'Review 1', 32, 14),
(13, 'Testing', 4, 'Testing title', 32, 15);

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
(1, 'Testing', 'www.youtube.com', 'Testing test and other thing', '2023-06-29'),
(2, 'Another RSS element', 'www.google.com', 'Another RSS element for testing', '2023-06-29');

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
(32, 'David', 'John', 'Johnny', 'david@gmail.com', 'david123', 'user'),
(33, 'Micheal', 'Thompson', 'Micheally', 'micheal@gmail.com', 'micheal123', 'user'),
(34, 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin123', 'admin');

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
(1, '127.0.0.1', '2023-07-02'),
(2, '192.168.1.6', '2023-07-08'),
(3, '::1', '2023-07-09');

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
-- Indexes for table `RssFeed`
--
ALTER TABLE `RssFeed`
  ADD PRIMARY KEY (`rss_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

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
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `CampSite`
--
ALTER TABLE `CampSite`
  MODIFY `site_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `CampSiteImages`
--
ALTER TABLE `CampSiteImages`
  MODIFY `image_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `review_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `RssFeed`
--
ALTER TABLE `RssFeed`
  MODIFY `rss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `User_logs`
--
ALTER TABLE `User_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
