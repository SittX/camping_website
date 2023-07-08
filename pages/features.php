<?php
require_once(dirname(__DIR__) . "/inc/header.php"); ?>

<?php
$campSiteRepo = new CampSiteDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$imageDirPath = ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
?>


<div class="card__container--horizontal">
<?php foreach ($campSiteList as $campSite) : ?>
<div class="card card--horizontal">
    <div class="card__left">
        <img src="<?php echo $imageDirPath . $campSite->getImages()[0] ?>" class="card__img--horizontal" >
    </div>
    <div class="card__right">
            <p class="card__title"><?php echo $campSite->getName() ?></p>
            <div class="features_container">
                <?php $features = explode(", ", $campSite->getFeatures()); ?>
                <?php foreach ($features as $feature): ?>
                    <li class="feature"><?php echo $feature ?></li>
                <?php endforeach; ?>
            </div>
    </div>
</div>
<?php endforeach ?>
</div>

<?php
require_once(dirname(__DIR__) . "/inc/footer.php"); ?>