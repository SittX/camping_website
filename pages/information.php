<?php
require_once(dirname(__DIR__) . "/inc/header.php");


// TODO : Display all the available campsites
// TODO : Implement search box or filter for filtering campsite based on certain categories
$campSiteRepo = new CampSiteDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$imageDirPath =  ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
?>

<!-- Use Implode and Explode -->
<!-- Implode -> Array to string -->
<!-- Explode -> String to Array -->

<section class="campsite__searchbox">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="searchbox">
        <input type="text" name="campsite_location" placeholder="Search by camp location.." class="searchbox__input"
            id="searchbox-input">
        <input type="submit" value="Search" name="search_campsite" class="btn btn--primary">
    </form>
</section>

<?php
if (SessionManager::checkAdmin()) {
    include(INC_PATH . "createNewCampSite.php");
}
?>

<section id="campsite__container">
    <?php foreach ($campSiteList as $campSite) : ?>
    <div class="campsite" data-campsite-location="<?php echo $campSite->getLocation()?>">
        <div>
            <?php
                foreach ($campSite->getImages() as $image) : ?>
            <img src="<?php echo $imageDirPath . $image ?>" style="width:20%;">
            <?php endforeach ?>
        </div>
        <p class="campsite__location"><?php echo $campSite->getLocation() ?></p>
        <p>Features : <?php echo $campSite->getFeatures() ?></p>
        <p>Description : <?php echo $campSite->getDescription() ?></p>
        <a href="<?php echo PAGES_PATH . "reviews.php?site_id=" . $campSite->getSiteId() ?>"><button>Review</button></a>
        <a
            href="<?php echo PAGES_PATH . "booking.php?site_id=" . $campSite->getSiteId() ?>"><button>Booking</button></a>
    </div>
    <?php endforeach ?>
</section>

<?php
include_once(INC_PATH . "footer.php");
?>