<?php
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rank = "user";
    $result = mysqli_query($conn, "INSERT INTO user(username,email,rank) VALUES('$name','$email','$rank')");
    if ($result) {
        echo "Inserted new user";
    }
}
?>
<?php include "inc/header.php" ?>

<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <input type="text" name="name" id="name" placeholder="Name" required>
    <input type="email" name="email" id="email" placeholder="Email" required>
    <input type="submit" name="submit" value="submit">
</form>

<?php include "inc/footer.php" ?>