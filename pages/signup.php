<?php include "../inc/header.php" ?>
<?php
if (isset($_POST["submit"])) {
    $username = $fName = $lName = $email = "";
    if ($_POST["submit"]) {
        $username = $_POST['username'];
        $fName = $_POST['firstName'];
        $lName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rank = "user";

        $affectedRow = $userRepo->insert(new User($fName, $lName, $username, $email, $password, $rank));
        if ($affectedRow == 1) {
            $redirectPage = "./index.php";
            header("Location: " . $redirectPage);
            echo "new user created";
        }
    }
}
?>

<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <input type="text" name="firstName" id="firstName" placeholder="Firstname" required>
    <input type="text" name="lastName" id="lastName" placeholder="Lastname" required>
    <input type="text" name="username" id="username" placeholder="Username" required>
    <input type="email" name="email" id="email" placeholder="Email" required>
    <input type="password" name="password" id="password" required>
    <input type="submit" name="submit" value="submit">
</form>

<?php include "../inc/footer.php" ?>