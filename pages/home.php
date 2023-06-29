<?php
require_once(dirname(__DIR__) . "/inc/header.php");
include("../inc/lockUser.php");
$campSiteRepo = new CampSiteDataRepository($connection);
$campSites = $campSiteRepo->getLists();
$imageDirPath =  ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
?>
<!-- Google translate element -->

<!--Page banner with some text-->
<section class="page_banner">
    <div class="page_banner-content">
        <p>Escape to Nature: Discover Your Perfect Campsite with ExploreCamps!</p>
        <a href="<?php echo PAGES_PATH . "information.php" ?>">Explore</a>
    </div>
</section>

<section id="slider__container">
    <div class="slider">
        <?php if(count($campSites) > 4):?>
        <?php for($i = 0; $i < 4; $i++):?>
        <figure class="slide">
            <img class="slide__img" src="<?php echo $imageDirPath . $campSites[$i]->getImages()[0] ?>" alt>
            <figcaption class="slide__caption"><?php echo $campSites[$i]->getLocation() ?>,
                <?php echo $campSites[$i]->getDescription() ?></figcaption>
        </figure>
        <?php endfor;?>
        <?php else: ?>
            <?php for($i = 0; $i < count($campSites); $i++):?>
                <figure class="slide">
                    <img class="slide__img" src="<?php echo $imageDirPath . $campSites[$i]->getImages()[0] ?>" alt>
                    <figcaption class="slide__caption"><?php echo $campSites[$i]->getLocation() ?>,
                        <?php echo $campSites[$i]->getDescription() ?></figcaption>
                </figure>
            <?php endfor;?>
    <?php endif; ?>
    </div>
</section>

<!--About us ( paragraph + map side-by-side )-->
<h3 class="about_us-title">About us</h3>
<section class="about_us" id="about_us">
    <p>Welcome to ExploreCamps! We are your one-stop destination for booking and exploring a wide range of campsites
        across the country. With our user-friendly platform, you can easily find and reserve your perfect campsite in
        just a few clicks. We offer a diverse selection of campsites, complete with detailed information, amenities, and
        user reviews to help you make an informed decision. Join our vibrant camping community, gain access to expert
        advice, and start your outdoor adventure today. Explore the beauty of nature and create unforgettable memories
        with ExploreCamps.</p>
    <iframe id="location_map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d101909.2826084221!2d-122.09340936511535!3d37.0416312045575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e673ccd98a2adf%3A0xe74fecd3670ccd1f!2sPitch%20Up!5e0!3m2!1sen!2smm!4v1686103910220!5m2!1sen!2smm"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php require_once(INC_PATH . "footer.php") ?>