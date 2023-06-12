<?php
require_once(dirname(__DIR__) . "/inc/header.php");
if (SessionManager::checkAdmin()) {
    require_once(INC_PATH . "createNewCampSite.php");
}

// TODO : Display all the available campsites
// TODO : Implement search box or filter for filtering campsite based on certain categories
$campSiteRepo = new CampSiteDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$imageDirPath =  ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
?>

<!-- Use Implode and Explode -->
<!-- Implode -> Array to string -->
<!-- Explode -> String to Array -->

<section class="searchbox">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="campsite_location" placeholder="Search by camp location..">
        <input type="submit" value="Search" name="search_campsite">
    </form>
</section>

<section>
    <?php foreach ($campSiteList as $campSite) : ?>
        <div>
            <?php
            foreach ($campSite->getImages() as $image) : ?>
                <img src="<?php echo $imageDirPath . $image ?>" style="width:20%;">
            <?php endforeach ?>
        </div>
        <div>Location : <?php echo $campSite->getLocation() ?></div>
        <div>Features : <?php echo $campSite->getFeatures() ?></div>
        <div>Description : <?php echo $campSite->getDescription() ?></div>
        <a href="<?php echo PAGES_PATH . "reviews.php?site_id=" . $campSite->getSiteId() ?>"><button>Review</button></a>
        <a href="<?php echo PAGES_PATH . "booking.php?site_id=" . $campSite->getSiteId() ?>"><button>Booking</button></a>
    <?php endforeach ?>
</section>

<?php
include_once(INC_PATH . "footer.php");
?>