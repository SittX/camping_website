-- User table
CREATE TABLE `User` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(80) NOT NULL UNIQUE,
  `email` varchar(255) NOT NULL UNIQUE,
  `password` text NOT NULL,
  `rank` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
);

-- Pitch Type
CREATE TABLE `PitchType` (
  `pitch_type_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `pitch_description` text NOT NULL,
  PRIMARY KEY (`pitch_type_id`),
);

-- Rss Feed
CREATE TABLE `RssFeed` (
  `rss_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `description` text NOT NULL,
  `publish_date` date NOT NULL,
  PRIMARY KEY (`rss_id`)
);

-- User Logs
CREATE TABLE `User_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`)
);

-- Campsite table
CREATE TABLE `CampSite` (
  `site_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `local_attraction` text NOT NULL,
  `features` text NOT NULL,
  `map_iframe` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `notice_note` text NOT NULL,
  `pitch_type_id` bigint(20) NOT NULL,
  PRIMARY KEY (`site_id`),
  CONSTRAINT `FK_campSite_pitchTypeID` FOREIGN KEY (`pitch_type_id`) 
  REFERENCES `PitchType` (`pitch_type_id`) ON DELETE CASCADE
);

-- CampSite Images
CREATE TABLE `CampSiteImages` (
  `image_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `site_id` bigint(20) NOT NULL,
  PRIMARY KEY (`image_id`),
  CONSTRAINT `FK_campSiteImage_siteID` FOREIGN KEY (`site_id`) 
  REFERENCES `CampSite` (`site_id`) ON DELETE CASCADE
);



-- Booking Images
CREATE TABLE `Booking` (
  `booking_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `site_id` bigint(20) NOT NULL,
  PRIMARY KEY (`booking_id`),
  CONSTRAINT `FK_booking_siteID` FOREIGN KEY (`site_id`) 
  REFERENCES `CampSite` (`site_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_booking_userID` FOREIGN KEY (`user_id`) 
  REFERENCES `User` (`user_id`) ON DELETE CASCADE
);

-- Contact 
CREATE TABLE `Contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `message` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`contact_id`),
  CONSTRAINT `FK_userID` FOREIGN KEY (`user_id`) 
  REFERENCES `User` (`user_id`) ON DELETE CASCADE
);

-- Review
CREATE TABLE `Review` (
  `review_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `rating` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `site_id` bigint(20) NOT NULL,
  PRIMARY KEY (`review_id`),
  CONSTRAINT `FK_review_siteID` FOREIGN KEY (`site_id`) 
  REFERENCES `CampSite` (`site_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_review_userID` FOREIGN KEY (`user_id`) 
  REFERENCES `User` (`user_id`) ON DELETE CASCADE
);
