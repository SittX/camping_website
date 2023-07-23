<?php
require_once(dirname(__DIR__) . "/inc/header.php");
$db = new DatabaseConnection();
$connection = $db->getConnection();
$campSiteRepo = new CampSiteDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$imageDirPath = ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
?>

<div class="container">
    <h1>Information about all campsites on GWSC site</h1>
    <p class="text">We take pride in offering a varied choice of campground alternatives to meet the needs of every
        camper. Whether you choose a rustic experience in a tent surrounded by nature's splendor or the comfort of a
        cozy cabin buried in the woods, we offer it all. From lakefront locations for water enthusiasts to remote
        locations for those seeking peace and quiet, our variety guarantees that every camper finds their ideal fit.
    </p>
    <h3 class="section-header">All GWCS campsites</h3>

    <section class="container--vertical container--center">
        <?php foreach ($campSiteList as $campSite) : ?>
            <div class="container--horizontal container--center-element information-container">
                <div class="card card--information">
                    <div class="card__head card__head--information">
                        <img src="<?php echo $imageDirPath . $campSite->getImages()[0] ?>" class="card__img card__img--information">
                    </div>

                    <div class="card__body">
                        <p class="card__title"><?php echo $campSite->getName() ?></p>
                        <h4>Description</h4>
                        <p class="card__text"><?php echo $campSite->getDescription() ?></p>
                        <a href="../pages/campsite_details.php?site_id=<?php echo $campSite->getSiteId(); ?>"><button class="btn btn--success">Details</button></a>
                    </div>
                </div>
                <div class="information-map-container">
                    <h3>Map location of <?php echo $campSite->getName();  ?></h3>
                    <?php if ($campSite->getMapIframe() != null) : ?>
                        <?php echo $campSite->getMapIframe(); ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach ?>
    </section>
</div>
<?php
require_once(dirname(__DIR__) . "/inc/footer.php"); ?>