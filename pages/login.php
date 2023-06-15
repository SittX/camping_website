<?php
require_once(dirname(__DIR__) . "/inc/header.php");
require_once(INC_PATH . "lockUser.php");
// TODO : Add login timer that restrict user from entering username and password after 3 failed attempts
// TODO : Timeout should be 10 minutes ( testing : 10 secs )
$userRepo = new UserDataRepository($connection);

if (!isset($_SESSION["LoginCounter"])) {
    $_SESSION["LoginCounter"] = 0;
}

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
</form>

<?php include(dirname(__DIR__) . "/inc/footer.php") ?>