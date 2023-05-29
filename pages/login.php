<?php include("../inc/header.php") ?>
<?php
if (isset($_POST["login"])) {
    $name = $_POST["name"];
    $user = $userRepo->searchByUsername($name);

    $_SESSION["rank"] = $user->getRank();
    $_SESSION["name"] = $user->getUsername();

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