<?php
require_once(dirname(__DIR__)."/inc/header.php");

if(!SessionManager::checkAdmin()){
    header("Location: " . TEMPLATES_PATH . "accessDenied.php");
}

$contactRepo = new ContactDataRepository($connection);
$contacts = $contactRepo->getLists();
?>

    <table class="table">
        <caption class="table__caption">User Contact Messages</caption>
        <thead class="table__header">
        <tr class="table__row">
            <th class="table__column">User</th>
            <th class="table__column">Contact message</th>
            <th class="table__column">Date</th>
            <th class="table__column">Actions</th>
        </tr>
        </thead>
        <tbody class="table__body">
        <?php foreach($contacts as $contact):?>
            <?php if($contact->getStatus() == "NO_REPLY"):?>
            <tr class="table__row">
                <td class="table__data"> <?php echo $contact->getUser()->getUsername();?></td>
                <td class="table__data"> <?php echo $contact->getMessage()?></td>
                <td class="table__data"> <?php echo $contact->getContactDate()->format("Y-m-d H:i");?></td>
                <td class="table__data"><button class="btn">Reply</button></td>
            </tr>
            <?php endif; ?>
        <?php endforeach;?>
        </tbody>
    </table>

<?php require_once(INC_PATH. "footer.php") ?>