<?php
require_once(dirname(__DIR__) . "/inc/header.php"); ?>

<?php
$campSiteRepo = new CampSiteDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$imageDirPath = ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
?>

<p class="text">The GWSC camping website provides a wide selection of campsite types to meet the needs of all campers. There's something for everyone, from huge RV sites with full hookups to tiny tent sites buried in the woods. Adventurers looking for a rustic experience can stay in primitive campsites, while those looking for a touch of luxury can stay in deluxe cabins with modern conveniences. Whether you like beachfront views, isolated locations, or sites near recreational facilities, the GWSC camping website offers a wide range of possibilities. With such a diverse range, campers can discover the ideal location to make wonderful outdoor memories.</p>
<h3 class="section-header">All GWCS campsites</h3>

<section class="container--vertical container--center">
    <?php foreach ($campSiteList as $campSite) : ?>
    <div class="container--horizontal container--center-element">
        <div class="card card--information">
            <div class="card__head card__head--information">
                <img src="<?php echo $imageDirPath . $campSite->getImages()[0] ?>" class="card__img card__img--information">
            </div>

            <div class="card__body">
                <p class="card__title"><?php echo $campSite->getName() ?></p>
                <h4>Description</h4>
                <p class="card__text"><?php echo $campSite->getDescription() ?></p>
                <a href="../pages/campsite_details.php?site_id=<?php echo $campSite->getSiteId(); ?>"><button class="btn btn--primary">Details</button></a>
            </div>
        </div>
        <div class="information-map">
            <?php if($campSite->getMapIframe() != null):?>
                <?php echo $campSite->getMapIframe();?>
            <?php endif;?>
        </div>
    </div>
    <?php endforeach ?>
</section>

<?php
require_once(dirname(__DIR__) . "/inc/footer.php"); ?>
