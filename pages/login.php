<?php
require_once(dirname(__DIR__) . "/inc/header.php");
require_once(INC_PATH . "lockUser.php");
// TODO : Add login timer that restrict user from entering username and password after 3 failed attempts
// TODO : Timeout should be 10 minutes ( testing : 10 secs )
// TODO : Add Google Recaptcha plugin here
$userRepo = new UserDataRepository($connection);
$SITE_KEY = "6Ld_-bcmAAAAAITLLdHrs6VJPERiHKIo5WRGl_Fm";
$SECRET_KEY = "6Ld_-bcmAAAAAHIji4wWC1MC2KSLBavfQZXDs-Kk";

if (!isset($_SESSION["LoginCounter"])) {
    $_SESSION["LoginCounter"] = 0;
}

if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
    if (!$captcha) {
        echo '<h2>Please check the the captcha form.</h2>';
        exit;
    }
    $ip = $_SERVER['REMOTE_ADDR'];

    // post request to server
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($SECRET_KEY) .  '&response=' . urlencode($captcha);

    $response = file_get_contents($url);
    $responseKeys = json_decode($response, true);

    // should return JSON with success as true
    var_dump($response);
    if ($responseKeys["success"]) {
        echo '<h2>reCaptcha verification succeed !</h2>';
        if (isset($_POST["login"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $user = $userRepo->searchUser($username, $password);

            if (!empty($user)) {
                SessionManager::login($user);
                return;
            }
            checkLoginCounter();
        }
    } else {
        echo '<h2>reCaptcha verification failed.</h2>';
    }
}

function checkLoginCounter()
{
    if ($_SESSION["LoginCounter"] >= 3 && !isset($_COOKIE["failedLogin"])) {
        setcookie("failedLogin", 1, time() + 60, "/", "", false, true);
        $_SESSION["LoginCounter"] = 0;
    }
    $_SESSION["LoginCounter"]++;
}

?>


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
    <input type="text" name="username" id="username" placeholder="Username" class="form__input">
    <input type="text" placeholder="Password" name="password" class="form__input">
    <input type="submit" name="login" value="Login" id="submit" class="btn btn--primary">
    <div class="g-recaptcha" data-sitekey="<?php echo $SITE_KEY ?>"></div>
</form>

<?php include(dirname(__DIR__) . "/inc/footer.php") ?>