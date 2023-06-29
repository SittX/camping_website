<?php
require_once(dirname(__DIR__) . "/inc/header.php");

$userRepo = new UserDataRepository($connection);
$campsiteRepo = new CampSiteDataRepository($connection);
$users = $userRepo->getLists();
$campsites=  $campsiteRepo->getLists();

if(!SessionManager::checkAdmin()){
    header("Location: " . TEMPLATES_PATH . "accessDenied.php");
}
?>
    <table class="table">
        <caption class="table__caption">User accounts</caption>
        <thead class="table__header">
        <tr class="table__row">
            <th scope="col" class="table__column">UserId</th>
            <th scope="col" class="table__column">Firstname</th>
            <th scope="col" class="table__column">Lastname</th>
            <th scope="col" class="table__column">Email</th>
            <th scope="col" class="table__column">Rank</th>
            <th scope="col" class="table__column">Actions</th>
        </tr>
        </thead>
        <tbody class="table__body">
        <?php foreach($users as $user):?>
            <tr class="table__row">
                <td class="table__data"><?php echo $user->getUserId(); ?></td>
                <td class="table__data"><?php echo $user->getFirstname(); ?></td>
                <td class="table__data"><?php echo $user->getLastname(); ?></td>
                <td class="table__data"><?php echo $user->getEmail(); ?></td>
                <td class="table__data"><?php echo $user->getRank(); ?></td>
                <td class="table__data"><button class="btn">Delete</button></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>


    <table class="table">
        <caption class="table__caption">Campsite</caption>
        <thead class="table__header">
        <tr class="table__row">
            <th class="table__column">Camp name</th>
            <th class="table__column">Description</th>
            <th class="table__column">Location</th>
            <th class="table__column">Price($)</th>
            <th class="table__column">Features</th>
            <th class="table__column">Actions</th>
        </tr>
        </thead>
        <tbody class="table__body">
        <?php foreach($campsites as $campsite):?>
            <tr class="table__row">
                <td class="table__data"> <?php echo $campsite->getName()?></td>
                <td class="table__data"> <?php echo $campsite->getDescription()?></td>
                <td class="table__data"> <?php echo $campsite->getLocation()?></td>
                <td class="table__data"> <?php echo $campsite->getPrice()?></td>
                <td class="table__data"> <?php echo $campsite->getFeatures()?></td>
                <td class="table__data"><button class="btn">Delete</button></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>


<h1>Create new account</h1>


<?php require_once(INC_PATH. "footer.php") ?>