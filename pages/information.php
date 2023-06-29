<?php
require_once(dirname(__DIR__) . "/inc/header.php");
//Use Implode and Explode
//Implode -> Array to string
//Explode -> String to Array

$campSiteRepo = new CampSiteDataRepository($connection);
$reviewRepo = new ReviewDataRepository($connection);
$bookingRepo = new BookingDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$imageDirPath =  ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;

// TODO: Handle review and booking form submissions. Get the value of "campsite_id" input element in each POST request.
if (isset($_POST["review_submit"])) {
    if (!SessionManager::checkIfUserLoggedIn()) {
        echo "Cannot make review if you aren't logged in";
        header("Location: login.php");
    }else{
        $siteId = $_POST["site_id"];
        $newReview = new Review($_POST["rating"], $_POST["review_message"], $_POST["title"], $_SESSION["user"]["id"], $siteId);
        $reviewRepo->insert($newReview);
        echo "Review has been inserted";
    }
}


if (isset($_POST["booking_submit"])) {
    if (!SessionManager::checkIfUserLoggedIn()) {
        echo "Cannot make booking if you aren't logged in";
        header("Location: login.php");
    }else{
        $siteId = $_POST["site_id"];
//        $bookingCampSite = $campSiteRepo->searchById($siteId);
        $booking = new Booking($_POST["check_in_date"], $_POST["check_out_date"], $_SESSION["user"]["id"], $siteId);
        $bookingRepo->insert($booking);
        echo "Booking has been inserted";
    }
}

?>


<section class="campsite__searchbox">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="searchbox">
        <input type="text" name="campsite_location" placeholder="Search by camp location.." class="searchbox__input" id="searchbox-input">
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
        <div class="campsite" data-campsite-location="<?php echo $campSite->getLocation() ?>">
            <div>
                <?php
                foreach ($campSite->getImages() as $image) : ?>
                    <img src="<?php echo $imageDirPath . $image ?>" style="width:20%;">
                <?php endforeach ?>
            </div>
            <p class="campsite__location"><?php echo $campSite->getLocation() ?></p>
            <p>Features : <?php echo $campSite->getFeatures() ?></p>
            <p>Description : <?php echo $campSite->getDescription() ?></p>

            <button data-modal-target="#review-modal-<?php echo $campSite->getSiteId() ?>" class="btn btn--primary">Review</button>
            <button data-modal-target="#booking-modal-<?php echo $campSite->getSiteId() ?>" class="btn btn--primary">Booking</button>
            <a href="../pages/campsite_details.php?site_id=<?php echo $campSite->getSiteId(); ?>">Details</a>
            <!--        <a href="--><?php //echo PAGES_PATH . "reviews.php?site_id=" . $campSite->getSiteId() 
                                    ?>
            <!--"><button>Review</button></a>-->
            <!--        <a href="--><?php //// echo PAGES_PATH . "booking.php?site_id=" . $campSite->getSiteId() 
                                    ?>
            <!--"><button>Booking</button></a>-->
        </div>
    <?php endforeach ?>
</section>
<?php foreach ($campSiteList as $campSite) : ?>
    <div class="modal" id="review-modal-<?php echo $campSite->getSiteId() ?>">
        <div class="modal-header">
            <div class="modal__title">Create new review</div>
            <button data-close-button class="close-button">&times;</button>
        </div>

        <div class="modal-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
                <input type="text" name="title" placeholder="Title" class="form__input">
                <textarea name="review_message" id="review_message" cols="30" rows="10" placeholder="Review message"></textarea>
                <select name="rating" id="cars">
                    <option value="1">Excellent</option>
                    <option value="2">Awesome</option>
                    <option value="3">Good</option>
                    <option value="4">Average</option>
                    <option value="5">Bad</option>
                </select>
                <input type="hidden" name="site_id" value="<?php echo $campSite->getSiteId() ?>">
                <input type="submit" value="Submit" name="review_submit">
            </form>
        </div>
    </div>

    <div class="modal" id="booking-modal-<?php echo $campSite->getSiteId() ?>">
        <div class="modal-header">
            <div class="modal__title">Book Campsite</div>
            <button data-close-button class="close-button">&times;</button>
        </div>

        <div class="modal-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
                <div class="form__container">
                    <p>Location: <?php echo $campSite->getLocation() ?></p>
                </div>
                <div class="form__container">
                    <p>Features: <?php echo $campSite->getFeatures() ?></p>
                </div>
                <div class="form__container">
                    <p>Price: <?php echo $campSite->getPrice() ?></p>
                </div>

                <input type="hidden" name="site_id" value="<?php echo $campSite->getSiteId() ?>">
                <input type="date" name="check_in_date" id="calender_input">
                <input type="date" name="check_out_date" id="calender_input">
                <input type="submit" value="Book" name="booking_submit">
            </form>
        </div>
    </div>
<?php endforeach ?>

<div id="modal-bg"></div>

<?php
include_once(INC_PATH . "footer.php");
?>