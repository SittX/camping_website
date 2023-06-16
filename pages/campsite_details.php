<?php
require_once(dirname(__DIR__) . "/inc/header.php");

$campSiteRepo = new CampSiteDataRepository($connection);
$siteId = $_GET["site_id"];
$site = $campSiteRepo->searchById($siteId);
$images = $site->getImages();
$imageDirPath = ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
?>

<p class="testing-css">Hello world</p>
<div class="details__container">
    <div id="campsite-showcase__container">
        <img id="showcase-image" src="<?php echo $imageDirPath . $images[0] ?>" class="detail-img">
    </div>

    <div id="product-details__container">
        <div class="product-details">
            <h1 class="h1">Men Navy Blue Solid Sweatshirt</h1>
            <h4 class="h4">Location: <span class="value"><?php echo $site->getLocation(); ?></span></h4>
            <h3 class="price">Price: $<span class="value"><?php echo $site->getPrice(); ?></span></h3>
            <h3 class="description">Description</h3>
            <p class="description"><?php echo $site->getDescription(); ?></p>
            <div class="product-preview-div">
                <h3>Product Preview</h3>
                <div id="preview-img" class="preview-img-div">
                    <?php foreach ($images as $index => $image) : ?>
                    <?php $imgId = "img-" . $index ?>
                    <img id="<?php echo $imgId ?>" onclick="smallImageClicked('<?php echo $imgId ?>')"
                        class="detail-img active" src="<?php echo $imageDirPath . $image ?>">
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="details__btn-container">
    <a href="../pages/booking.php?site_id=<?php echo $siteId ?>"><button class="btn btn--primary">Make a
            booking</button></a>
    <a href="../pages/reviews.php?site_id=<?php echo $siteId ?>"><button class="btn btn--primary">Write a
            review</button></a>
</div>

<?php require_once(INC_PATH . "footer.php"); ?>