<?php include("inc/header.php") ?>
<?php
if (isset($_POST["login"])) {
    $name = $_POST["name"];
    $result = mysqli_query($conn, "SELECT * FROM User WHERE username = '$name'");
    $user = mysqli_fetch_assoc($result);

    $_SESSION["rank"] = $user["rank"];
    $_SESSION["name"] = $user["username"];
}

?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="name" id="name" placeholder="Name">
    <input type="email" name="email" id="name" placeholder="Email">
    <input type="submit" name="login" value="login" id="submit">
</form>

<?php include("inc/footer.php") ?>