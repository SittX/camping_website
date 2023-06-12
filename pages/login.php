<?php
require_once(dirname(__DIR__) . "/inc/header.php");
// require_once(dirname(__DIR__) . "/classes/SessionManager.php");

// $db = new DatabaseConnection();
// $conn = $db->getConnection();
$userRepo = new UserDataRepository($connection);

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $user = $userRepo->searchByUsername($username);

    SessionManager::login($user);
}

// TODO : Add login timer that restrict user from entering username and password after 3 failed attempts
// TODO : Timeout should be 10 minutes ( testing : 10 secs )
?>


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
    <input type="text" name="username" id="username" placeholder="Username" class="form__input">
    <input type="text" placeholder="Password" name="password" class="form__input">
    <input type="submit" name="login" value="Login" id="submit" class="btn btn--primary">
</form>

<?php include(dirname(__DIR__) . "/inc/footer.php") ?>