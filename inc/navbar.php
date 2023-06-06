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
foreach($campSiteList as $campSite){
    $destinationList[] = ["siteId" => $campSite->getSiteId(), "location" => $campSite->getLocation()];
}

function displayItemForAdmin(): string
{
    return (SessionManager::checkAdmin()) ? "display:block;" : "display:none;";
//    return (isset($_SESSION["user"]) && $_SESSION["user"]["rank"] == "admin") ? "display:block;" : "display:none;";
}

function displayLoginAndLogout(): void
{
    if(SessionManager::checkIfUserLoggedIn()){
        echo '<a class="nav__link" href="' . PAGES_PATH . 'logout.php">
            <button class="btn btn--primary">Logout</button>
        </a>';
    }else{
        echo '<a class="nav__link" href="' . PAGES_PATH . 'login.php">
            <button class="btn btn--primary">Login</button>
        </a>';
    }
}
?>

<header id="header" aria-label="header">
    <div class="header__container">
        <div class="nav__start">
            <a class="nav__logo" href="<?php echo PAGES_PATH . "home.php" ?>">
                <img src="https://github.com/Evavic44/responsive-navbar-with-dropdown/blob/main/assets/images/logo.png?raw=true" width="35" height="35" alt="Inc Logo" />
            </a>

            <nav class="nav">
                <ul class="nav__menu">
                    <li>
                        <button class="nav__link dropdown__btn" data-dropdown="dropdown1" aria-haspopup="true" aria-expanded="false" aria-label="discover">
                            Discover
                        </button>

                        <div id="dropdown1" class="dropdown">
                            <ul role="menu" class="dropdown__item">
                                <li>
                                    <span class="dropdown__link-title">Popular destinations</span>
                                </li>

                                <li role="menu item">
                                    <?php foreach ($destinationList as $destination) : ?>
                                        <a class="dropdown__link" href="#adobe-xd">
                                            <?php echo $destination["location"]?>
                                        </a>
                                    <?php endforeach; ?>
                                </li>
                            </ul>

                            <ul role="menu" class="dropdown__item">
                                <li class="dropdown-title">
                                    <span class="dropdown__link-title">CampSite types</span>
                                </li>

                                <li role="menu item">
                                    <?php foreach ($campTypeList as $campType) : ?>
                                        <a class="dropdown__link" href="<?php echo PAGES_PATH . "information.php/#" . $campType->getDescription()?>">
                                            <?php echo $campType->getDescription()?>
                                        </a>
                                    <?php endforeach; ?>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a class="nav__link" href="<?php echo PAGES_PATH . "reviews.php" ?>">Reviews</a></li>
                    <li><a class="nav__link" href="<?php echo PAGES_PATH . "contact.php" ?>">Contact Us</a></li>
                    <li><a class="nav__link" href="<?php echo PAGES_PATH . "home.php#about" ?>">About</a></li>
                    <li style="<?php echo displayItemForAdmin(); ?>">
                        <a class="nav__link" href="<?php echo ADMIN_PATH . "dashboard.php"?>">Admin dashboard</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="nav__end">
            <div class="nav__end-container">
                <?php displayLoginAndLogout(); ?>

                <a class="nav__link" href="<?php echo PAGES_PATH . "signup.php"?>">
                    <button class="btn btn--primary">Sign Up</button>
                </a>
            </div>

            <button id="hamburger-menu" aria-label="hamburger menu" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>
</header>
