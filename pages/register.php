<?php
require_once(dirname(__DIR__) . "/inc/header.php");

if (isset($_POST["register"])) {
    $username = $fName = $lName = $email = "";
    $userRepo = new UserDataRepository($connection);

    $email = $_POST['email'];
    if (!isValidEmail($email)) {
        echo "Invalid email address. Please try again";
        return;
    }
    if (!checkIfEmailAlreadyExist($email)) {
        echo "Email already exists. Please try again.";
        return;
    }

    $username = $_POST['username'];
    if (!checkIfUsernameExist($username)) {
        echo "Username already exists. Please try again";
        return;
    }


    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];

    $password = $_POST['password'];
    $rank = "user";

    if (SessionManager::checkAdmin()) {
        $rank = $_POST["user_role"];
    }
    $affectedRow = $userRepo->insert(new User($fName, $lName, $username, $email, $password, $rank));
    if ($affectedRow == 1) {
        $redirectPage = "./index.php";
        header("Location: " . $redirectPage);
    }
}

function checkIfEmailAlreadyExist($email): bool
{
    $db = new DatabaseConnection();
    $connection = $db->getConnection();
    $query = "SELECT email FROM USER WHERE email = ?";
    $result = prepareAndExecuteQuery($connection, $query, "s", $email);
    return $result->num_rows() == 0;
    if ($result->num_rows() == 0) {
        return false;
    }
    return true;
}

function checkIfUsernameExist($username): bool
{
    $db = new DatabaseConnection();
    $connection = $db->getConnection();
    $query = "SELECT username FROM USER WHERE username = ?";
    $result = prepareAndExecuteQuery($connection, $query, "s", $username);
    if ($result->num_rows() == 0) {
        return false;
    }
    return true;
}

function isValidEmail($email): bool
{
    $email = trim($email);

    $emailPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    if (!preg_match($emailPattern, $email)) {
        return false;
    }
    return true;
}

?>

<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" class="form register--form">
    <div class="form__row">
        <label for="firstName">FirstName</label>
        <input class="form__input" type="text" name="firstName" required />
    </div>
    <div class="form__row">
        <label for="lastName">LastName</label>
        <input class="form__input" type="text" name="lastName" required />
    </div>

    <div class="form__row">
        <label for="username">Username</label>
        <input class="form__input" type="text" name="username" required />
    </div>

    <div class="form__row">
        <label for="email">Email</label>
        <input class="form__input" type="email" name="email" required />
    </div>

    <div class="form__row">
        <label for="password">Password</label>
        <input class="form__input" type="password" name="password" required />
    </div>

    <?php if (SessionManager::checkAdmin()) : ?>
        <div class="form__row">
            <label for="role">User Role:</label>
            <select class="select" name="user_role" class="select">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            </label>
        </div>
    <?php endif; ?>
    <!--    <div class="form__row">-->
    <!--        <span><i aria-hidden="true" class="fa fa-lock"></i></span>-->
    <!--        <input class="form__input" type="password" name="password" placeholder="Re-type Password" required />-->
    <!--    </div>-->

    <input class="btn btn--success" type="submit" value="register" name="register" />
</form>

<?php include(INC_PATH . "footer.php"); ?>