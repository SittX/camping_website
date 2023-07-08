<?php
require_once(dirname(__DIR__) . "/inc/header.php");
// $database = new DatabaseConnection();
// $connection = $database->getConnection();
$contactDataRepo = new ContactDataRepository($connection);

if (isset($_POST["submit_contact_message"])) {
    $msg = htmlspecialchars($_POST["message"]);
    $userId = $_SESSION["user"]["id"];
    $contact = new Contact($msg, "NO_REPLY", new DateTime(), $userId);
    if ($contactDataRepo->insert($contact) == 1) {
        echo "Send the contact message to the admin";
    };
}
?>
<p class="text">We would love to hear from you! You can ask us questions, provide feedback, or inquire about our camping services by contacting us. Your pleasure is our main priority, and we are dedicated to offering an unforgettable outdoor experience.  We look forward to supporting you and helping you plan your next experience in the great outdoors.</p>
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" class="form">
    <p class="form__title">Contact us today and let us help you!</p>
    <textarea name="message" id="message" class="contact__textarea"></textarea>
    <input type="submit" value="Send" name="submit_contact_message" class="btn btn--primary">
</form>
<div class="container--center-element">
    <p>  By contacting us, you are agreeing to adhere to our  <a href="privacyPolicy.php" class="card__link">Privacy policy</a></p>
</div>



<?php require_once(INC_PATH . "footer.php") ?>