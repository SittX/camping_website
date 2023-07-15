<?php
$db = new DatabaseConnection();
$connection = $db->getConnection();

$campSiteRepo = new CampSiteDataRepository($connection);
$campTypeRepo = new PitchTypeDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$campTypeList = $campTypeRepo->getLists();

$destinationList = [];
foreach ($campSiteList as $campSite) {
    $destinationList[] = ["site_id" => $campSite->getSiteId(), "location" => $campSite->getLocation()];
}
?>

<header id="header" aria-label="header">
    <div class="header__container">
        <div class="header__left">
            <a class="nav__logo" href="../pages/home.php">
                GWCS
            </a>

            <nav class="nav">
                <ul class="nav__link-container">
                    <?php
                    if (SessionManager::checkAdmin()) :
                    ?>
                    <li><a class="nav__link" href="../admin/dashboard.php">Dashboard</a></li>
                    <li><a class="nav__link" href="../pages/pitchTypesAndAvailability.php">Information</a></li>
                    <li><a class="nav__link" href="../admin/adminReview.php">Reviews</a></li>
                    <li><a class="nav__link" href="../admin/adminBooking.php">Bookings</a></li>
                    <li><a class="nav__link" href="../admin/adminContact.php">User Contacts</a></li>
                    <?php else : ?>
                    <li><a class="nav__link" href="../pages/information.php">Information</a></li>
                    <li><a class="nav__link" href="../pages/pitchTypesAndAvailability.php">Pitch Types</a></li>
                    <li><a class="nav__link" href="../pages/features.php">Features</a></li>
                    <li><a class="nav__link" href="../pages/localAttraction.php">Local Attractions</a></li>
                    <li><a class="nav__link" href="../pages/contact.php">Contact Us</a></li>
                    <li><a class="nav__link" href="../pages/reviews.php">Reviews</a></li>
                    <?php endif ?>
                </ul>
            </nav>
        </div>

        <section class="header__right">
            <button id="account-container-btn" class="btn btn--primary">Account</button>
            <div id="account-container-wrapper">
                <div id="account-container">
                    <?php if (SessionManager::checkIfUserLoggedIn()) : ?>
                    <a class="nav__link" href="../pages/logout.php" id="login-link">
                        <button class="btn btn--primary" id="logout-btn">Logout</button>
                    </a>
                    <?php else : ?>
                    <a class="nav__link" href="../pages/login.php" id="login-link">
                        <button class="btn btn--primary" id="login-btn">Login</button>
                    </a>
                    <?php endif ?>
                    <a class="nav__link" href="../pages/register.php">
                        <button class="btn btn--primary">Register</button>
                    </a>
                </div>
            </div>


            <button id="hamburger-menu" aria-label="hamburger menu" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>
        </section>
    </div>
</header>