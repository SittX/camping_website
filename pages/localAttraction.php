<?php
require_once(dirname(__DIR__) . "/inc/header.php");?>

<?php
$campSiteRepo = new CampSiteDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$imageDirPath =  ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
?>

<?php foreach ($campSiteList as $campSite) : ?>
    <section class="container--flex">
        <img src="<?php echo $imageDirPath . $campSite->getImages()[0] ?>" class="campsite__img" style="width:20%;">
        <div>
            <p>Site Name : <?php echo $campSite->getName() ?></p>
            <p>Local attractions : <?php echo $campSite->getLocalAttraction() ?></p>
        </div>
    </section>
<?php endforeach ?>


<?php
require_once(dirname(__DIR__) . "/inc/footer.php");?>