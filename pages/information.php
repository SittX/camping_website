<?php
require_once(dirname(__DIR__) . "/inc/header.php"); ?>

<?php
$campSiteRepo = new CampSiteDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$imageDirPath = ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
?>

<p>Text about how all campsites</p>
<h3 class="section-title">All GWCS campsites</h3>

<section class="container--flex">
    <?php foreach ($campSiteList as $campSite) : ?>
        <div class="card">
            <div class="card__head">
                <img src="<?php echo $imageDirPath . $campSite->getImages()[0] ?>" class="card__img">
            </div>
            <div class="card__body">
                <p class="card__title"><?php echo $campSite->getName() ?></p>
                <p>Description : <?php echo $campSite->getDescription() ?></p>
                <a href="../pages/campsite_details.php?site_id=<?php echo $campSite->getSiteId(); ?>" class="card__link">Details</a>
            </div>
        </div>
    <?php endforeach ?>
</section>


<?php
require_once(dirname(__DIR__) . "/inc/footer.php"); ?>
