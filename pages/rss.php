<?php
require_once(dirname(__DIR__) . "/config.php");
require_once(DB_CONNECTION);
require_once(DATA_PATH . "RssDataRepository.php");
require_once(MODEL_PATH . "Rss.php");

$db = new DatabaseConnection();
$connection = $db->getConnection();
$rssRepo = new RssDataRepository($connection);
$rssLists = $rssRepo->getLists();

header("Content-type: text/xml");

echo "<?xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
    <channel>
        <title>Global Wild Swimming and Camping</title>
        <description>Global Wild Swimming and Camping provides camping and swimming information for visitors.</description>
        <link>http://localhost/gwsc</link>";

foreach($rssLists as $rss) {
    echo "<item>
        <title>" . $rss->getTitle() . "</title>" .
        "<link>" . $rss->getLink() . "</link>" .
        "<description>" . $rss->getDescription() . "</description>" .
        "<pubDate>".$rss->getPublishDate()->format("D, d M Y")."</pubDate>".
        "</item>";
}

echo "</channel>
</rss>";
?>

