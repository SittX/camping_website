<?php
require_once(dirname(__DIR__)."/inc/header.php");

if(!SessionManager::checkAdmin()){
    header("Location: " . TEMPLATES_PATH . "accessDenied.php");
}

$reviewRepo = new ReviewDataRepository($connection);
$reviews = $reviewRepo->getLists();
?>

    <table class="table">
        <caption class="table__caption">Booking</caption>
        <thead class="table__header">
        <tr class="table__row">
            <th class="table__column">Title</th>
            <th class="table__column">Message</th>
            <th class="table__column">Actions</th>
        </tr>
        </thead>
        <tbody class="table__body">
        <?php foreach($reviews as $review):?>
            <tr class="table__row">
                <td class="table__data"> <?php echo $review->getTitle();?></td>
                <td class="table__data"> <?php echo $review->getMessage()?></td>
                <td class="table__data"><button class="btn">Delete</button></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

<?php require_once(INC_PATH. "footer.php") ?>