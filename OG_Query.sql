-- User Table
CREATE TABLE `User` (
  `user_id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `rank` varchar(20) NOT NULL
);

-- Pitch Type Table
CREATE TABLE `PitchType` (
  `pitch_type_id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `pitch_description` text NOT NULL
);

-- RssFeed Table
CREATE TABLE `RssFeed` (
  `rss_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `description` text NOT NULL,
  `publish_date` date NOT NULL
);

-- User Logs Table
CREATE TABLE `User_logs` (
  `log_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `ip_address` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
);

-- CampSite Table
CREATE TABLE `CampSite` (
  `site_id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `local_attraction` text NOT NULL,
  `features` text NOT NULL,
  `map_iframe` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `notice_note` text NOT NULL,
  `pitch_type_id` bigint(20) NOT NULL
);

ALTER TABLE `CampSite`
ADD CONSTRAINT `FK_campSite_pitchTypeID` 
FOREIGN KEY (`pitch_type_id`) 
REFERENCES `PitchType` (`pitch_type_id`) ON DELETE CASCADE;


-- CampSite Images Table
CREATE TABLE `CampSiteImages` (
  `image_id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `url` text NOT NULL,
  `site_id` bigint(20) NOT NULL
);

ALTER TABLE `CampSiteImages`
ADD CONSTRAINT `FK_campSiteImage_siteID` 
FOREIGN KEY (`site_id`) 
REFERENCES `CampSite` (`site_id`) ON DELETE CASCADE;

-- Booking Table
CREATE TABLE `Booking` (
  `booking_id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `site_id` bigint(20) NOT NULL
);

ALTER TABLE `Booking`
  ADD CONSTRAINT `FK_booking_siteID` FOREIGN KEY (`site_id`) REFERENCES `CampSite` (`site_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_booking_userID` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`) ON DELETE CASCADE;

-- Contact Table
  CREATE TABLE `Contact` (
  `contact_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `contact_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_id` bigint(20) NOT NULL
);

ALTER TABLE `Contact`
ADD CONSTRAINT `FK_userID` 
FOREIGN KEY (`user_id`) 
REFERENCES `User` (`user_id`) ON DELETE CASCADE;


-- Review Table
CREATE TABLE `Review` (
  `review_id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `message` text NOT NULL,
  `rating` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `site_id` bigint(20) NOT NULL
);

ALTER TABLE `Review`
ADD CONSTRAINT `FK_review_siteID` 
FOREIGN KEY (`site_id`) 
REFERENCES `CampSite` (`site_id`),
ADD CONSTRAINT `FK_review_userID` 
FOREIGN KEY (`user_id`) 
REFERENCES `User` (`user_id`);