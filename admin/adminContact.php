<?php
require_once(dirname(__DIR__) . "/inc/header.php");

if (!SessionManager::checkAdmin()) {
    header("Location: " . TEMPLATES_PATH . "accessDenied.php");
}
$db = new DatabaseConnection();
$connection = $db->getConnection();
$contactRepo = new ContactDataRepository($connection);
$contacts = $contactRepo->getLists();
if (isset($_POST["reply"])) {
    $contactId = $_POST["contact_id"];
    $searchContact = $contactRepo->searchById($contactId);
    $searchContact->setStatus("REPLIED");
    $contactRepo->update($searchContact, $searchContact);
    header("Location: " . ADMIN_PATH . "adminContact.php");
}
?>

<table class="table">
    <caption class="table__caption">User Contact Messages</caption>
    <thead class="table__header">
        <tr class="table__row">
            <th class="table__column">User</th>
            <th class="table__column">Contact message</th>
            <th class="table__column mobile-view">Date</th>
            <th class="table__column">Actions</th>
        </tr>
    </thead>
    <tbody class="table__body">
        <?php foreach ($contacts as $contact) : ?>
            <?php if ($contact->getStatus() == "NO_REPLY") : ?>
                <tr class="table__row">
                    <td class="table__data"> <?php echo $contact->getUser()->getUsername(); ?></td>
                    <td class="table__data"> <?php echo $contact->getMessage() ?></td>
                    <td class="table__data mobile-view"> <?php echo $contact->getContactDate()->format("Y-m-d H:i"); ?></td>
                    <td class="table__data action-form">
                        <div class="form__row">
                            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                                <input type="hidden" name="contact_id" value="<?php echo $contact->getContactId() ?>">
                                <input type="submit" value="Reply" name="reply" class="btn btn--success">
                            </form>
                            <a href="mailto:<?php echo $contact->getUser()->getEmail(); ?>" class="mobile-view"><button class="btn btn--success">Send
                                    Email</button></a>
                        </div>
                    </td>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once(INC_PATH . "footer.php") ?>