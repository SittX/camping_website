<?php
require_once(dirname(__DIR__) . "/inc/header.php");

if (isset($_POST["login"])) {
    $name = $_POST["name"];

    if (!empty($userRepo)) {
        $user = $userRepo->searchByUsername($name);
    }

    $_SESSION["user"] = ["username"=>$user->getUsername(), "rank"=>$user->getRank(),"userId"=>$user->getUserId()];

    if ($user->getRank() == "admin") {
        echo "Welcome admin";
    } else {
        echo "Welcome user";
    }
}

?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="name" id="name" placeholder="Name">
    <input type="email" name="email" id="name" placeholder="Email">
    <input type="submit" name="login" value="login" id="submit">
</form>

<?php include(INC_PATH . "footer.php") ?>