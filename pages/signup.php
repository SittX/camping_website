<?php
require_once(dirname(__DIR__) . "/inc/header.php");
// TODO : Compare the 2 password inputs ( password, retype-password )
// TODO : Check the user creation status 
// ( success -> Show user created message , Failed or username already exists -> Show username already exists ) 
$username = $fName = $lName = $email = "";
if (isset($_POST["register"])) {
    // $db = new DatabaseConnection();
    // $connection = $db->getConnection();
    $userRepo = new UserDataRepository($connection);

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
    }
}
?>

<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" class="form">
    <div class="form__col">
        <div class="form__row">
            <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input class="form__input" type="text" name="firstName" placeholder="Firstname" required />
        </div>
        <div class="form__row">
            <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input class="form__input" type="text" name="lastName" placeholder="Lastname" required />
        </div>
    </div>

    <div class="form__row">
        <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
        <input class="form__input" type="text" name="username" placeholder="Username" required />
    </div>

    <div class="form__row">
        <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
        <input class="form__input" type="email" name="email" placeholder="Email" required />
    </div>

    <div class="form__row">
        <span><i aria-hidden="true" class="fa fa-lock"></i></span>
        <input class="form__input" type="password" name="password" placeholder="Password" required />
    </div>

    <div class="form__row">
        <span><i aria-hidden="true" class="fa fa-lock"></i></span>
        <input class="form__input" type="password" name="password" placeholder="Re-type Password" required />
    </div>

    <!-- <div class="form__option-wrapper">
        <select class="form__option">
            <option>Select a country</option>
            <option>Option 1</option>
            <option>Option 2</option>
        </select>
    </div> -->

    <input class="btn btn--primary" type="submit" value="register" name="register" />
</form>

<!-- <form action="<?php  // echo $_SERVER["PHP_SELF"] 
                    ?>" method="post">
    <input type="text" name="firstName" id="firstName" placeholder="Firstname" required>
    <input type="text" name="lastName" id="lastName" placeholder="Lastname" required>
    <input type="text" name="username" id="username" placeholder="Username" required>
    <input type="email" name="email" id="email" placeholder="Email" required>
    <input type="password" name="password" id="password" required>
    <input type="submit" name="submit" value="submit">
</form> -->

<?php include(INC_PATH . "footer.php"); ?>