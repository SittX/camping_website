<?php
require_once(dirname(__DIR__) . "/inc/header.php");
$database = new DatabaseConnection();
$connection = $database->getConnection();
$contactDataRepo = new ContactDataRepository($connection);

// We might need to get the User_ID from the SESSION global variable here 
// But for now we will just use the pre-defined one
if (isset($_POST["submit_contact_message"])) {
    $msg = htmlspecialchars($_POST["message"]);
    $userId = 1;
    $contact = new Contact($msg, $userId);
    if ($contactDataRepo->insert($contact) == 1) {
        echo "Send the contact message to the admin";
    };
}
?>

<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <textarea name="message" id="message" cols="30" rows="10"></textarea>
    <input type="submit" value="Send" name="submit_contact_message">
</form>


<?php require_once(INC_PATH . "footer.php") ?>