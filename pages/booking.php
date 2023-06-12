<?php
require_once(dirname(__DIR__) . "/inc/header.php");
$campSiteRepo = new CampSiteDataRepository($connection);
$bookingRepo = new BookingDataRepository($connection);
// TODO : Refactor with a better logic for making carrying state data for the campsite id
if (isset($_GET["site_id"])) {
    $siteId = $_GET["site_id"];
    $bookingCampSite = $campSiteRepo->searchById($siteId);
}

if (isset($_POST["submit_booking"])) {
    var_dump($_POST);
}
?>

<!-- Need to make sure that the check out date is not earlier than the check in date -->
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
    <!-- We will display the campsite location, name, description and price with diabled inputs -->
    <div class="form__container">
        <p>Location :
            <?php echo $bookingCampSite->getLocation() ?? ""  ?>
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

    <input type="date" name="check_in_date" id="calender_input">
    <input type="date" name="check_out_date" id="calender_input">
    <input type="submit" value="Book" name="submit_booking">
</form>

<?php
require_once(dirname(__DIR__) . "/inc/footer.php");
?>