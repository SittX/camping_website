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

function displayItemForAdmin(): void
{
    echo (SessionManager::checkAdmin()) ? "display:block;" : "display:none;";
    //    return (isset($_SESSION["user"]) && $_SESSION["user"]["rank"] == "admin") ? "display:block;" : "display:none;";
}

function displayLoginAndLogout(): void
{
    if (SessionManager::checkIfUserLoggedIn()) {
        echo '<a class="nav__link" href="' . PAGES_PATH . 'logout.php">
            <button class="btn btn--primary">Logout</button>
        </a>';
    } else {
        echo '<a class="nav__link" href="' . PAGES_PATH . 'login.php">
            <button class="btn btn--primary">Login</button>
        </a>';
    }
}
?>

<header id="header" aria-label="header">
    <div class="header__container">
        <div class="nav__start">
            <a class="nav__logo" href="../pages/home.php">
                <div>
                    <i class="fa-solid fa-tent"></i>
                    <p>GWCS</p>
                </div>
            </a>

            <nav class="nav">
                <ul class="nav__menu">
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

        <div class="nav__end">
            <div class="nav__end-container">
                <a class="nav__link" href="../pages/login.php" id="login-link">
                    <button class="btn btn--primary" id="login-btn">Login</button>
                </a>
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
    const loginBtn = document.getElementById('login-btn');

    function toggleLoginBtn() {
        console.log("Link is clicked");
        console.log(isLoggedIn);
        if (isLoggedIn) {
            loginBtn.textContent = "Logout";
        } else {
            loginBtn.textContent = "Login";
        }
    }

    loginBtn.addEventListener("click", () => {
        isLoggedIn = !isLoggedIn;
        toggleLoginBtn();
    });

    // const loginLink = document.getElementById("login-link");
    // loginLink.addEventListener("click", () => {
    //     console.log("Link is clicked");
    // });
</script>