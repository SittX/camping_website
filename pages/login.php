<?php include("../inc/header.php") ?>
<?php
if (isset($_POST["login"])) {
    $name = $_POST["name"];
    $user = $userRepo->searchByUsername($name);

    $_SESSION["user_rank"] = $user->getRank();
    $_SESSION["username"] = $user->getUsername();
    $_SESSION["user_id"] = $user->getUserId();

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

<?php include("../inc/footer.php") ?>