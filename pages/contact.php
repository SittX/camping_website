<?php
require_once(dirname(__DIR__) . "/inc/header.php");
// $database = new DatabaseConnection();
// $connection = $database->getConnection();
$contactDataRepo = new ContactDataRepository($connection);

if (isset($_POST["submit_contact_message"])) {
    $msg = htmlspecialchars($_POST["message"]);
    $userId = $_SESSION["user"]["id"];
    $contact = new Contact($msg, $userId);
    if ($contactDataRepo->insert($contact) == 1) {
        echo "Send the contact message to the admin";
    };
}
// TODO : Show message box to normal user but don't show all the contact messages

// TODO : For admin, show all the messages from the clients

// TODO : Message should be in one way from client to admin.
// If the admin wants to reply to the client, it should
// redirects to the email client with the user email
?>



<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" style="<?php SessionManager::checkAdmin() ? 'display:block' : 'display:none' ?>">
    <textarea name="message" id="message" cols="30" rows="10"></textarea>
    <input type="submit" value="Send" name="submit_contact_message">
</form>


<?php require_once(INC_PATH . "footer.php") ?>