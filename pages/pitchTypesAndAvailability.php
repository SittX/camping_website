<?php
require_once(dirname(__DIR__) . "/inc/header.php");
$campSiteRepo = new CampSiteDataRepository($connection);
$reviewRepo = new ReviewDataRepository($connection);
$userRepo = new UserDataRepository($connection);
$pitchTypeRepo = new PitchTypeDataRepository($connection);
$bookingRepo = new BookingDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$pitchTypes = $pitchTypeRepo->getLists();
$imageDirPath = ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;

// TODO: Handle review and booking form submissions. Get the value of "campsite_id" input element in each POST request.
if (isset($_POST["review_submit"])) {
    if (!SessionManager::checkIfUserLoggedIn()) {
        echo "Cannot make review if you aren't logged in";
        header("Location: login.php");
    } else {
        $siteId = $_POST["site_id"];
        $userId = $_SESSION["user"]["id"];
        $site = $campSiteRepo->searchById($siteId);
        $user = $userRepo->searchById($userId);
        $newReview = new Review($_POST["rating"], $_POST["review_message"], $_POST["title"]);
        $newReview->setUser($user);
        $newReview->setSite($site);
        $reviewRepo->insert($newReview);
        echo "<h2 class='section-header'>Your review has been submitted</h2>";
    }
}


if (isset($_POST["booking_submit"])) {
    if (!SessionManager::checkIfUserLoggedIn()) {
        echo "Cannot make booking if you aren't logged in";
        header("Location: login.php");
    } else {
        $siteId = $_POST["site_id"];
        //        $bookingCampSite = $campSiteRepo->searchById($siteId);

        $booking = new Booking($_POST["check_in_date"], $_POST["check_out_date"], $_SESSION["user"]["id"], $siteId);
        $bookingRepo->insert($booking);
        echo "Booking has been inserted";
    }
}

?>
<div class="container">
    <?php
    if (SessionManager::checkAdmin()) {
        include(INC_PATH . "createNewCampSite.php");
    }
    ?>
    <input type="text" name="campsite_location" placeholder="Search by camp location.." class="search__input" id="search__input">

    <?php foreach ($pitchTypes as $currentPitchType) : ?>
        <h3 class="title" id="<?php echo $currentPitchType->getTitle() ?>">
            <?php echo $currentPitchType->getTitle(); ?></h3>

        <div class="available-site-container">
            <?php foreach ($campSiteList as $campSite) : ?>
                <?php if ($campSite->getPitchType()->getTitle() === $currentPitchType->getTitle()) : ?>
                    <div class="available-site" data-campsite-location="<?php echo $campSite->getLocation() ?>" data-pitchType="<?php echo $campSite->getPitchType()->getTitle(); ?>">


                        <img src="<?php echo $imageDirPath . $campSite->getImages()[0] ?>" class="available-site-img">


                        <div class="available-site-content">
                            <p class="card__title"><?php echo $campSite->getName() ?></p>
                            <h4>Location</h4>
                            <p><?php echo $campSite->getLocation()?></p>
                            <h4>Features</h4>
                            <p><?php echo $campSite->getFeatures() ?></p>
                            <h4>Description</h4>
                            <p><?php echo $campSite->getDescription() ?></p>

                            <div class="card__row">
                                <button data-modal-target="#review-modal-<?php echo $campSite->getSiteId() ?>" class="btn btn--primary">Review
                                </button>
                                <a href="../pages/campsite_details.php?site_id=<?php echo $campSite->getSiteId(); ?>">
                                    <button class="btn btn--primary">Booking</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>
    <?php endforeach; ?>


</div>

<?php foreach ($campSiteList as $campSite) : ?>
    <div class="modal" id="review-modal-<?php echo $campSite->getSiteId() ?>">
        <div class="modal-header">
            <div class="modal__title">Create new review</div>
            <button data-close-button class="close-button">&times;</button>
        </div>

        <div class="modal-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
                <input type="text" name="title" placeholder="Title" class="form__input">
                <textarea name="review_message" class="review_message" cols="30" rows="10" placeholder="Review message"></textarea>
                <select class="select" name="rating">
                    <option value="1">Excellent</option>
                    <option value="2">Awesome</option>
                    <option value="3">Good</option>
                    <option value="4">Average</option>
                    <option value="5">Bad</option>
                </select>
                <input type="hidden" name="site_id" value="<?php echo $campSite->getSiteId() ?>">
                <input type="submit" value="Submit" name="review_submit" class="btn btn--success">
            </form>
        </div>
    </div>


<?php endforeach ?>

<div id="modal-bg"></div>

<?php
include_once(INC_PATH . "footer.php");
?>