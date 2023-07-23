<?php
require("connect.php");
$create_query = "
CREATE TABLE `RssFeed` (
    `rss_id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(100) NOT NULL,
    `link` text NOT NULL,
    `description` text NOT NULL,
    `publish_date` date NOT NULL,
    PRIMARY KEY (`rss_id`)
  );
";

$result = mysqli_query($connection, $create_query);
if ($result) {
    echo "<p>RSS Feed table successfully created.<p>";
} else {
    echo "<p>RSS Feed table creation failed.<p>";
}
