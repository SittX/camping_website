<?php
require_once(dirname(__DIR__) . "/inc/header.php");

$userRepo = new UserDataRepository($connection);
$campsiteRepo = new CampSiteDataRepository($connection);
$users = $userRepo->getLists();
$campsites = $campsiteRepo->getLists();

if (!SessionManager::checkAdmin()) {
    header("Location: " . TEMPLATES_PATH . "accessDenied.php");
}

if (isset($_POST["delete_user"])) {
    $userId = $_POST["user_id"];
    $userRepo->remove($userId);
    header("Location: " . ADMIN_PATH . "dashboard.php");
}

if (isset($_POST["delete_site"])) {
    $siteId = $_POST["site_id"];
    $campsiteRepo->remove($siteId);
    header("Location: " . ADMIN_PATH . "dashboard.php");
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
        <?php foreach ($users as $user): ?>
            <tr class="table__row">
                <td class="table__data"><?php echo $user->getUserId(); ?></td>
                <td class="table__data"><?php echo $user->getFirstname(); ?></td>
                <td class="table__data"><?php echo $user->getLastname(); ?></td>
                <td class="table__data"><?php echo $user->getEmail(); ?></td>
                <td class="table__data"><?php echo $user->getRank(); ?></td>
                <td class="table__data action-form">
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $user->getUserId()
                        ?>">
                        <input type="submit" value="Delete" name="delete_user" class="btn">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
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
        <?php foreach ($campsites as $campsite): ?>
            <tr class="table__row">
                <td class="table__data"> <?php echo $campsite->getName() ?></td>
                <td class="table__data"> <?php echo $campsite->getDescription() ?></td>
                <td class="table__data"> <?php echo $campsite->getLocation() ?></td>
                <td class="table__data"> <?php echo $campsite->getPrice() ?></td>
                <td class="table__data"> <?php echo $campsite->getFeatures() ?></td>
                <td class="table__data action-form">
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                        <input type="hidden" name="site_id" value="<?php echo $campsite->getSiteId()
                        ?>">
                        <input type="submit" value="Delete" name="delete_site" class="btn">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php require_once(INC_PATH . "footer.php") ?>