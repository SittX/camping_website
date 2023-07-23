<?php
require_once(dirname(__DIR__) . "/inc/header.php"); ?>

<?php
$campSiteRepo = new CampSiteDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$imageDirPath = ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
?>

<div class="feature-page-container">
    <div class="card__container--horizontal card--feature">
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
                    <a href="campsite_details.php?site_id=<?php echo $campSite->getSiteId()?>"><button class="btn btn--success">Details</button></a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div>
        <h2 class="section-header">Wearable Technologies for camping</h2>
        <section class="product__container" id="wearable-technology">
            <div class="product">
                <h4 class="product__name">Garmin Solar GPS Watch</h4>
                <div class="product__body">
                    <img src="../static/images/gps-watch.jpeg" class="wearable-tech-img" />
                    <a href="https://www.garmin.com/en-US/p/679335">View product</a>
                </div>
            </div>

            <div class="product">
                <h4 class="product__name">Biolite HeadLamp 330</h4>
                <div class="product__body">
                    <img src="../static/images/headlamp.jpeg" class="wearable-tech-img" />
                    <a href="https://www.bioliteenergy.com/products/headlamp-330">View product</a>
                </div>
            </div>

            <div class="product">
                <h4 class="product__name">Suunto Outdoor Watch</h4>
                <div class="product__body">
                    <img src="../static/images/alpha-watch.jpg" class="wearable-tech-img" />
                    <a href="https://www.suunto.com/Products/sports-watches/Suunto-Traverse-Alpha/Suunto-Traverse-Alpha-Foliage/">View
                        product</a>
                </div>
            </div>

            <div class="product">
                <h4 class="product__name">Outdoor Tech Power Bank</h4>
                <div class="product__body">
                    <img src="../static/images/powerbank.jpg" class="wearable-tech-img" />
                    <a href="https://www.outdoortechnology.com/products/latch?_pos=1&_sid=88375cd9c&_ss=r">View product</a>
                </div>
            </div>
        </section>
    </div>
</div>


<?php
require_once(dirname(__DIR__) . "/inc/footer.php"); ?>