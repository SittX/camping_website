<?php
require_once(dirname(__DIR__) . "/inc/header.php");
require_once(INC_PATH . "lockUser.php");
// TODO : Add login timer that restrict user from entering username and password after 3 failed attempts
// TODO : Timeout should be 10 minutes ( testing : 10 secs )
// TODO : Add Google Recaptcha plugin here
$userRepo = new UserDataRepository($connection);
$SITE_KEY = "6Ld_-bcmAAAAAITLLdHrs6VJPERiHKIo5WRGl_Fm";
$SECRET_KEY = "6Ld_-bcmAAAAAHIji4wWC1MC2KSLBavfQZXDs-Kk";

// if (isset($_POST['g-recaptcha-response'])) {
//     $captcha = $_POST['g-recaptcha-response'];
//     if (!$captcha) {
//         // echo '<h2>Please check the the captcha form.</h2>';
//         exit;
//     }
//     $ip = $_SERVER['REMOTE_ADDR'];

//     // post request to server
//     $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($SECRET_KEY) .  '&response=' . urlencode($captcha);

//     $response = file_get_contents($url);
//     $responseKeys = json_decode($response, true);

//     // should return JSON with success as true
//     // var_dump($response);
//     if ($responseKeys["success"]) {
//         // echo '<h2>reCaptcha verification succeed !</h2>';
//         if (isset($_POST["login"])) {
//             $username = $_POST["username"];
//             $password = $_POST["password"];
//             $user = $userRepo->searchUser($username, $password);
//             var_dump($_COOKIE);
//             if (!empty($user)) {
//                 SessionManager::login($user);
//                 return;
//             }
//             // echo "User is not found";
//             checkLoginCounter();
//         }
//     } else {
//         // echo '<h2>reCaptcha verification failed.</h2>';
//     }
// }

// Check the duration of the timer set
// var_dump($_SESSION);
$lockDuration = 10; // Seconds
if (isset($_SESSION["failedLogin"])) {
    $duration = time() - $_SESSION["failedLogin"];
    var_dump($duration);
    if ($duration > $lockDuration) {
        unset($_SESSION["failedLogin"]);
        unset($_SESSION["loginAttempts"]);
    }
}

if (!isset($_SESSION["loginAttempts"])) {
    $_SESSION["loginAttempts"] = 0;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = $userRepo->searchUser($username, $password);
    if (!empty($user)) {
        SessionManager::login($user);
    } else {
        $_SESSION["loginAttempts"] += 1;
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
    <input type="text" name="username" id="username" placeholder="Username" class="form__input">
    <input type="text" placeholder="Password" name="password" class="form__input">

    <?php if ($_SESSION["loginAttempts"] > 1) : ?>
        <?php $_SESSION["failedLogin"] = time(); ?>
        <?php include("timer.php"); ?>
        <input type="submit" name="login" value="Login" id="submit" style="pointer-events:none" class="btn btn--primary">
    <?php else : ?>
        <input type="submit" name="login" value="Login" id="submit" class="btn btn--primary">
    <?php endif ?>
    <div class="g-recaptcha" data-sitekey="<?php echo $SITE_KEY
                                            ?>"></div>

</form>

<?php include(dirname(__DIR__) . "/inc/footer.php") ?>