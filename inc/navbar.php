<?php
//require_once(dirname(__DIR__) . "/classes/SessionManager.php");
//require_once(dirname(__DIR__). "/config.php");
//require_once(dirname(__DIR__). "/classes/DatabaseConnection.php");

$db  = new DatabaseConnection();
$connection = $db->getConnection();
$campSiteRepo = new CampSiteDataRepository($connection);
$campTypeRepo = new PitchTypeDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$campTypeList = $campTypeRepo->getLists();

$destinationList = [];
foreach ($campSiteList as $campSite) {
    $destinationList[] = ["site_id" => $campSite->getSiteId(), "location" => $campSite->getLocation()];
}

//function displayItemForAdmin(): void
//{
//    echo (SessionManager::checkAdmin()) ? "display:block;" : "display:none;";
//    //    return (isset($_SESSION["user"]) && $_SESSION["user"]["rank"] == "admin") ? "display:block;" : "display:none;";
//}

//function displayLoginAndLogout(): void
//{
//    if (SessionManager::checkIfUserLoggedIn()) {
//        echo '<a class="nav__link" href="' . PAGES_PATH . 'logout.php">
//            <button class="btn btn--primary">Logout</button>
//        </a>';
//    } else {
//        echo '<a class="nav__link" href="' . PAGES_PATH . 'login.php">
//            <button class="btn btn--primary">Login</button>
//        </a>';
//    }
//}
?>

<header id="header" aria-label="header">
    <div class="header__container">
        <div class="header__left">
            <a class="nav__logo" href="../pages/home.php">
                <div>
                    <i class="fa-solid fa-tent"></i>
                    <p>GWCS</p>
                </div>
            </a>

            <nav class="nav">
                <ul class="nav__link-container">
                    <?php
                    if (SessionManager::checkAdmin()) :
                    ?>
                        <li><a class="nav__link" href="../admin/dashboard.php">Dashboard</a></li>
                        <li><a class="nav__link" href="../pages/information.php">Information</a></li>
                        <li><a class="nav__link" href="../admin/adminReview.php">Reviews</a></li>
                        <li><a class="nav__link" href="../admin/adminBooking.php">Bookings</a></li>
                        <li><a class="nav__link" href="../admin/adminContact.php">User Contacts</a></li>
                    <?php else : ?>
                        <li><a class="nav__link" href="../pages/information.php">Information</a></li>
                        <li><a class="nav__link" href="../pages/reviews.php">Reviews</a></li>
                        <li><a class="nav__link" href="../pages/contact.php">Contact Us</a></li>
                        <li><a class="nav__link" href="../pages/home.php#about-us">About</a></li>
                    <?php endif ?>
                </ul>
            </nav>
        </div>

        <div class="header__right">
            <div class="container--flex">
                <?php if(SessionManager::checkIfUserLoggedIn()):?>
                    <a class="nav__link" href="../pages/logout.php" id="login-link">
                        <button class="btn btn--primary" id="logout-btn">Logout</button>
                    </a>
                <?php else:?>
                    <a class="nav__link" href="../pages/login.php" id="login-link">
                        <button class="btn btn--primary" id="login-btn">Login</button>
                    </a>
                <?php endif?>
                <a class="nav__link" href="../pages/signup.php">
                    <button class="btn btn--primary">Sign Up</button>
                </a>
            </div>

            <button id="hamburger-menu" aria-label="hamburger menu" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>
</header>
<script>
    // // Get the login link and button elements
    // const loginLink = document.getElementById('login-link');
    // const loginButton = document.getElementById('login-btn');
    //
    // // Function to toggle the href attribute and button text
    // function toggleLogin(event) {
    //     event.preventDefault();
    //     if (loginLink.getAttribute('href') === '../pages/login.php') {
    //         loginLink.setAttribute('href', '../pages/logout.php');
    //         loginButton.textContent = 'Logout';
    //     } else {
    //         loginLink.setAttribute('href', '../pages/login.php');
    //         loginButton.textContent = 'Login';
    //     }
    // }
    //
    // // Add event listener to the login button
    // loginButton.addEventListener('click', toggleLogin);
</script>