<?php
require_once(dirname(__DIR__) . "/inc/header.php");
$campSiteRepo = new CampSiteDataRepository($connection);
$bookingRepo = new BookingDataRepository($connection);
$userRepo = new UserDataRepository($connection);

if (!SessionManager::checkIfUserLoggedIn()) {
    header("Location: login.php");
}

if (isset($_GET["site_id"])) {
    $siteId = $_GET["site_id"];
    $bookingCampSite = $campSiteRepo->searchById($siteId);
}

if (isset($_POST["submit_booking"])) {
    $user = $userRepo->searchById($_SESSION["user"]["id"]);
    $site = $campSiteRepo->searchById($siteId);
    $booking = new Booking($_POST["check_in_date"], $_POST["check_out_date"], $user, $site);
    $bookingRepo->insert($booking);
}
?>
<div class="container">
    <h2 class="section-header">Booking for <?php echo $bookingCampSite->getName() ?></h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form booking-form">
        <div class="form__container">
            <p>Location :
                <?php echo $bookingCampSite->getLocation() ?? "" ?>
            </p>
        </div>
        <div class="form__container">
            <p>Feature :
                <?php echo $bookingCampSite->getFeatures() ?? "" ?>
            </p>
        </div>
        <div class="form__container">
            <p>Price :
                <?php echo $bookingCampSite->getPrice() ?? "" ?>
            </p>
        </div>

        <div class="form__row">
            <label for="calender_input">Check-In</label>
            <input type="date" name="check_in_date" id="calender_input">
            <label for="calender_output">Check-Out</label>
            <input type="date" name="check_out_date" id="calender_input">
        </div>
        <input type="submit" value="Book" name="submit_booking" class="btn btn--primary">
    </form>
</div>
<?php
require_once(dirname(__DIR__) . "/inc/footer.php");
?>