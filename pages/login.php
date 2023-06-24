<?php
require_once(dirname(__DIR__) . "/inc/header.php");
require_once(INC_PATH . "lockUser.php");

$userRepo = new UserDataRepository($connection);
$SITE_KEY = "6Ld_-bcmAAAAAITLLdHrs6VJPERiHKIo5WRGl_Fm";
$SECRET_KEY = "6Ld_-bcmAAAAAHIji4wWC1MC2KSLBavfQZXDs-Kk";

$failedLoginDuration = 10; // Seconds
$loginAttemptLimit = 1;

//  Check if timer is up and reset the SESSION variables related to blocking user from logging in 
if (isset($_SESSION["locked_time"])) {
    $lockedDuration = time() - $_SESSION["locked_time"];
    if ($lockedDuration > $failedLoginDuration) {
        unset($_SESSION["locked_time"]);
        $_SESSION["login_attempts"] = 0;
    }
}

// Setting login_attempts counter SESSION variable 
if (!isset($_SESSION["login_attempts"])) {
    $_SESSION["login_attempts"] = 0;
}

// Check if user took "Captcha" test
if (isset($_POST['g-recaptcha-response'])) {
    $captchaResponse = $_POST['g-recaptcha-response'];

    if (!$captchaResponse) {
        echo '<h2>Please check the captcha form.</h2>';
        exit;
    }

    // Send POST request to recaptcha server 
    $verificationUrl = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($SECRET_KEY) . '&response=' . urlencode($captchaResponse);
    $verificationResponse = file_get_contents($verificationUrl);
    $verificationData = json_decode($verificationResponse, true);

    // Verify is reCaptcha is success or failed 
    if (!$verificationData["success"]) {
        echo '<h2>reCaptcha verification failed.</h2>';
        exit;
    }

    // Process user login 
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $user = $userRepo->searchUser($username, $password);

        if (!empty($user)) {
            SessionManager::login($user);
        } else {
            $_SESSION["login_attempts"] += 1;
        }
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
    <input type="text" name="username" id="username" placeholder="Username" class="form__input">
    <input type="text" placeholder="Password" name="password" class="form__input">
    <div class="g-recaptcha" data-sitekey="<?php echo $SITE_KEY
                                            ?>"></div>

    <?php if ($_SESSION["login_attempts"] > $loginAttemptLimit) : ?>
        <?php $_SESSION["locked_time"] = time(); ?>
        <?php include("timer.php"); ?>
        <input type="submit" name="login" value="Login" id="submit" style="pointer-events:none" class="btn btn--primary">
    <?php else : ?>
        <input type="submit" name="login" value="Login" id="submit" class="btn btn--primary">
    <?php endif ?>
</form>

<?php include(dirname(__DIR__) . "/inc/footer.php") ?>