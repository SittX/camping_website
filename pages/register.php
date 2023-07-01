<?php
require_once(dirname(__DIR__) . "/inc/header.php");
// TODO : Compare the 2 password inputs ( password, retype-password )
// TODO : Check the user creation status 
// ( success -> Show user created message , Failed or username already exists -> Show username already exists ) 
if (isset($_POST["register"])) {
    $username = $fName = $lName = $email = "";
    $userRepo = new UserDataRepository($connection);

    $email = $_POST['email'];
    if (!isValidEmail($email)) {
        echo "Invalid email address. Please try again";
        return;
    }
    if (checkIfEmailAlreadyExist($email)) {
        echo "Email already exists. Please try again.";
        return;
    }

    $username = $_POST['username'];
    if (checkIfUsernameExist($username)) {
        echo "Username already exists. Please try again";
        return;
    }


    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];

    $password = $_POST['password'];
    $rank = "user";

    if(SessionManager::checkAdmin()){
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
    // If the email does not exist in the db, it will return result with 0 num rows.
    if ($result->num_rows() == 0) {
        return false;
    }

    $resultEmail = $result->get_result()->fetch_assoc()["email"];
    $email = strtolower($email);
    $resultEmail = strtolower($resultEmail);
    return $resultEmail == $email;
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

    $resultUsername = $result->get_result()->fetch_assoc()["username"];
    $username = strtolower($username);
    $resultUsername = strtolower($resultUsername);
    return $resultUsername == $username;
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

    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" class="form">
        <div class="form__col">
            <div class="form__row">
                <span>FirstName</span>
                <input class="form__input" type="text" name="firstName" required/>
            </div>
            <div class="form__row">
                <span>LastName</span>
                <input class="form__input" type="text" name="lastName" required/>
            </div>
        </div>

        <div class="form__row">
            <span>Username</span>
            <input class="form__input" type="text" name="username" required/>
        </div>

        <div class="form__row">
            <span>Email</span>
            <input class="form__input" type="email" name="email" required/>
        </div>

        <div class="form__row">
            <span>Password</span>
            <input class="form__input" type="password" name="password" required/>
        </div>

        <?php if(SessionManager::checkAdmin()):?>
        <div class="form__row">
            <label for="role">User Role:</label>
               <select name="user_role">
                    <option value="user">User</option>
                   <option value="admin">Admin</option>
               </select>
            </label>
        </div>
        <?php endif;?>
        <!--    <div class="form__row">-->
        <!--        <span><i aria-hidden="true" class="fa fa-lock"></i></span>-->
        <!--        <input class="form__input" type="password" name="password" placeholder="Re-type Password" required />-->
        <!--    </div>-->

        <input class="btn btn--primary" type="submit" value="register" name="register"/>
    </form>

<?php include(INC_PATH . "footer.php"); ?>