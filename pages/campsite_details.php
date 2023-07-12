<?php
require_once(dirname(__DIR__) . "/inc/header.php");

$campSiteRepo = new CampSiteDataRepository($connection);
$siteId = $_GET["site_id"];
$site = $campSiteRepo->searchById($siteId);
$images = $site->getImages();
$imageDirPath = ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
$bookingRepo = new BookingDataRepository($connection);
$reviewRepo = new ReviewDataRepository($connection);
$reviews = $reviewRepo->searchBySiteId($siteId);

// Features
$features = explode(", ", $site->getFeatures());

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
        $booking = new Booking($_POST["check_in_date"], $_POST["check_out_date"], $_SESSION["user"]["id"], $siteId);
        $bookingRepo->insert($booking);
        echo "Booking has been inserted";
    }
}
?>
<div class="container">

    <div class="details__container">
        <div id="product-details__container">
            <div class="product-details">
                <h1 class="product-details-header"><?php echo $site->getName(); ?></h1>
                <h4 class="product-details-subheader">Location: <span class="value"><?php echo $site->getLocation(); ?></span></h4>
                <h3 class="product-details-subheader">Price: $<span class="value"><?php echo $site->getPrice(); ?></span></h3>
                <h3 class="product-details-text">Description</h3>
                <p class="product-details-text"><?php echo $site->getDescription(); ?></p>
            </div>
        </div>

        <div id="campsite-showcase__container">
            <img id="showcase-image" src="<?php echo $imageDirPath . $images[0] ?>" class="detail-img">
            <div class="preview-container">
                <h3 class="preview-header">Campsite images</h3>
                <div id="preview-img" class="preview-img-container">
                    <?php foreach ($images as $index => $image) : ?>
                        <?php $imgId = "img-" . $index ?>
                        <img id="<?php echo $imgId ?>" onclick="smallImageClicked('<?php echo $imgId ?>')" class="detail-img active" src="<?php echo $imageDirPath . $image ?>">
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

    <div class="details__btn-container">
        <a href="<?php echo PAGES_PATH . 'booking.php?site_id=' . $site->getSiteId(); ?>">
           <button class="btn btn--success">
               Booking
           </button>
            </a>
    </div>

    <div class="product-details__features-container">
        <h3 class="section-header--center">Available features of <?php echo $site->getName() ?></h3>
        <div class="features_container features_container--product-details">
            <?php foreach ($features as $feature) : ?>
                <li class="feature"><?php echo $feature ?></li>
            <?php endforeach; ?>
        </div>
    </div>

    <h3 class="section-title">Reviews of <?php echo $site->getName() ?></h3>
    <div class="container--feature">
        <?php if ($reviews != null) : ?>
            <div class="review__container">
                <?php foreach ($reviews as $review) : ?>
                    <div class="review">
                        <p class="review__title">Review for <?php echo $review->getSite()->getName() ?></p>
                        <img src="../uploads/<?php echo $review->getSite()->getImages()[1] ?>" class="review__img">
                        <p class="review__title"><?php echo $review->getTitle() ?></p>
                        <p class="review__text"><?php echo $review->getMessage() ?></p>
                        <p class="review__text--bold">***** Rating *****</p>
                        <p class="review__rating"><?php echo $review->getRating() ?> out of 5</p>
                        <p class="review__user">Reviewed by <?php echo $review->getUser()->getUsername() ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>There is no review for this campsite.</p>
        <?php endif ?>
    </div>

    <h3 class="section-header">Map</h3>
    <div class="details-map">
        <?php echo $site->getMapIframe(); ?>
    </div>
</div>

<?php require_once(INC_PATH . "footer.php"); ?>