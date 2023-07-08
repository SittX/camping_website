<?php
require_once(dirname(__DIR__) . "/inc/header.php"); ?>

<?php
$campSiteRepo = new CampSiteDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$imageDirPath = ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
?>

    <div class="card__container card__container--center">
        <?php foreach ($campSiteList as $campSite) : ?>
            <div class="card card--vertical">
                <div class="card__head">
                    <img src="<?php echo $imageDirPath . $campSite->getImages()[0] ?>" class="card__img" >
                </div>
                <div class="card__body">
                    <p class="card__title">Local attractions for <?php echo $campSite->getName() ?></p>
                    <p class="card__text">Local attractions : <?php echo $campSite->getLocalAttraction() ?></p>
                    <a href="../pages/campsite_details.php?site_id=<?php echo $campSite->getSiteId(); ?>"
                       class="card__link">Details</a>
                </div>
            </div>
        <?php endforeach ?>
    </div>

<?php
require_once(dirname(__DIR__) . "/inc/footer.php"); ?>