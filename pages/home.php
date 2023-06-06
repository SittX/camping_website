<?php
require_once(dirname(__DIR__) . "/inc/header.php");
$database = new DatabaseConnection();
$connection = $database->getConnection();
$campSiteRepo = new CampSiteDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();

/*
 * Temporary solution only
 * */
$campId = 2;
$stmt = $connection->prepare("SELECT * FROM CampSiteImages WHERE site_id = ?");
$stmt->bind_param("i", $campId);
$imageList = [];
// Fetch image rows from the database
if($stmt->execute()){
   $mysqli_result = $stmt->get_result();
   while ($row = $mysqli_result->fetch_assoc()) {
        $imageList[] = $row;
    }
};
$imageDirPath =  ".." . DIRECTORY_SEPARATOR . "uploads" .DIRECTORY_SEPARATOR;

// TODO : Fetch all images along with campsite information
// TODO : Slideshow, Maps

?>
<!--Page banner with some text-->

<!--Top campsites and locations (slideshow)-->

<!--About us ( paragraph + map side-by-side )-->

<ul>
    <?php foreach($campSiteList as $campSite): ?>
        <li><?php echo $campSite->getLocation() ?></li>
        <li><?php echo $campSite->getFeatures() ?></li>
        <li><?php echo $campSite->getDescription() ?></li>
    <?php endforeach ?>
</ul>

<div>
     <?php foreach($imageList as $image) :?>
    <img src="<?php echo $imageDirPath. $image["url"] ?>" style="width:50%;">
    <?php endforeach?>
</div>

<?php require_once(INC_PATH. "footer.php")?>
