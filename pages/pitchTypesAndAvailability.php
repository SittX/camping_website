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
<?php
if (SessionManager::checkAdmin()) {
    include(INC_PATH . "createNewCampSite.php");
}
?>

    <section class="campsite__filter">
            <input type="text" name="campsite_location" placeholder="Search by camp location.." class="search__input"
                   id="search__input" oninput="inputFilter();">
    </section>

<section>
    <label for="cars">Choose a pitch type :</label>
    <select name="pitch_type_id" id="pitch_type">
        <?php foreach ($pitchTypes as $pitchType) :?>
            <option value="<?php echo $pitchType->getPitchTypeId(); ?>"><?php echo $pitchType->getTitle() ?>
            </option>
        <?php endforeach;
        ?>
    </select>
</section>

    <section id="campsite__container">
        <?php foreach ($pitchTypes as $currentPitchType) : ?>
        <div class="card__wrapper">
            <h3 class="title" id="<?php echo $currentPitchType->getTitle()?>"><?php echo $currentPitchType->getTitle(); ?></h3>

            <div class="card__container">
            <?php foreach ($campSiteList as $campSite) : ?>
                <?php if ($campSite->getPitchType()->getTitle() === $currentPitchType->getTitle()) : ?>
                    <div class="card campsite" data-campsite-location="<?php echo $campSite->getLocation() ?>" data-pitchType="<?php echo $campSite->getPitchType()->getTitle();?>">
                        <div class="card__head">
                            <img src="<?php echo $imageDirPath . $campSite->getImages()[0] ?>" class="card__img">
                        </div>
                        <div class="card__body">
                            <p class="card__title"><?php echo $campSite->getLocation() ?></p>
                            <p>Features: <?php echo $campSite->getFeatures() ?></p>
                            <p>Description: <?php echo $campSite->getDescription() ?></p>

                            <div class="card__row">
                                <button data-modal-target="#review-modal-<?php echo $campSite->getSiteId() ?>"
                                        class="btn btn--primary">Review
                                </button>
                                <button data-modal-target="#booking-modal-<?php echo $campSite->getSiteId() ?>"
                                        class="btn btn--primary">Booking
                                </button>
                            </div>
                            <a href="../pages/campsite_details.php?site_id=<?php echo $campSite->getSiteId(); ?>" class="card__link">Details</a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            </div>
        </div>
        <?php endforeach; ?>
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
                <textarea name="review_message" class="review_message" cols="30" rows="10"
                          placeholder="Review message"></textarea>
                <select name="rating">
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
                <input type="date" name="check_in_date" class="calender_input">
                <input type="date" name="check_out_date" class="calender_input">
                <input type="submit" value="Book" name="booking_submit">
            </form>
        </div>
    </div>
<?php endforeach ?>

    <div id="modal-bg"></div>

<?php
include_once(INC_PATH . "footer.php");
?>