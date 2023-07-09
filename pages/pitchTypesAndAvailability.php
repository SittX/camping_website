<?php
require_once(dirname(__DIR__) . "/inc/header.php");
$campSiteRepo = new CampSiteDataRepository($connection);
$reviewRepo = new ReviewDataRepository($connection);
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
        $newReview = new Review($_POST["rating"], $_POST["review_message"], $_POST["title"], $_SESSION["user"]["id"], $siteId);
        $reviewRepo->insert($newReview);
        echo "Review has been inserted";
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
    <input type="text" name="campsite_location" placeholder="Search by camp location.." class="search__input"
        id="search__input">

    <section id="campsite__container">
        <?php foreach ($pitchTypes as $currentPitchType) : ?>
        <div class="card__wrapper">
            <h3 class="title" id="<?php echo $currentPitchType->getTitle() ?>">
                <?php echo $currentPitchType->getTitle(); ?></h3>

            <div class="card__container pitchType-card-container" id="campsite-card-container">
                <?php foreach ($campSiteList as $campSite) : ?>
                <?php if ($campSite->getPitchType()->getTitle() === $currentPitchType->getTitle()) : ?>
                <div class="card--horizontal card--pitchTypes"
                    data-campsite-location="<?php echo $campSite->getLocation() ?>"
                    data-pitchType="<?php echo $campSite->getPitchType()->getTitle(); ?>">
                    <div class="card__left">
                        <img src="<?php echo $imageDirPath . $campSite->getImages()[0] ?>"
                            class="card__img--horizontal">
                    </div>
                    <div class="card__right">
                        <p class="card__title"><?php echo $campSite->getLocation() ?></p>
                        <h4>Features</h4>
                        <p><?php echo $campSite->getFeatures() ?></p>
                        <h4>Description</h4>
                        <p><?php echo $campSite->getDescription() ?></p>

                        <div class="card__row">
                            <button data-modal-target="#review-modal-<?php echo $campSite->getSiteId() ?>"
                                class="btn btn--primary">Review
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
        </div>
        <?php endforeach; ?>
    </section>

    <h2 class="section-header">Wearable Technologies for camping</h2>
    <section class="product__container">
        <div class="product">
            <h4 class="product__name">Garmin Solar GPS Watch</h4>
            <div class="product__body">
                <img src="../static/images/gps-watch.jpeg" class="wearable-tech-img" />
                <a href="https://www.garmin.com/en-US/p/679335">View product</a>
            </div>
        </div>

        <div class="product">
            <h4 class="product__name">Biolite HeadLamp 330</h4>
            <div class="product__body">
                <img src="../static/images/headlamp.jpeg" class="wearable-tech-img" />
                <a href="https://www.bioliteenergy.com/products/headlamp-330">View product</a>
            </div>
        </div>

        <div class="product">
            <h4 class="product__name">Suunto Outdoor Watch</h4>
            <div class="product__body">
                <img src="../static/images/alpha-watch.jpg" class="wearable-tech-img" />
                <a
                    href="https://www.suunto.com/Products/sports-watches/Suunto-Traverse-Alpha/Suunto-Traverse-Alpha-Foliage/">View
                    product</a>
            </div>
        </div>

        <div class="product">
            <h4 class="product__name">Outdoor Tech Power Bank</h4>
            <div class="product__body">
                <img src="../static/images/powerbank.jpg" class="wearable-tech-img" />
                <a href="https://www.outdoortechnology.com/products/latch?_pos=1&_sid=88375cd9c&_ss=r">View product</a>
            </div>
        </div>
    </section>
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
            <textarea name="review_message" class="review_message" cols="30" rows="10"
                placeholder="Review message"></textarea>
            <select class="select" name="rating">
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


<?php endforeach ?>

<div id="modal-bg"></div>

<?php
include_once(INC_PATH . "footer.php");
?>