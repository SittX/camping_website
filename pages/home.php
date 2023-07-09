<?php
require_once(dirname(__DIR__) . "/inc/header.php");
include("../inc/lockUser.php");
$campSiteRepo = new CampSiteDataRepository($connection);
$campSites = $campSiteRepo->getLists();

$pitchTypeRepo = new PitchTypeDataRepository($connection);
$pitchTypes = $pitchTypeRepo->getLists();
$imageDirPath = ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
?>
<!--Page banner with some text-->
<section class="page_banner">
    <div class="page_banner-content">
        <p>Escape to Nature: Discover Your Perfect Campsite With Us!</p>
        <a href="<?php echo PAGES_PATH . "information.php" ?>">Explore Now!</a>
    </div>
</section>

<h3 class="section-header">Check out all of our camping sites available across the country</h3>

<div class="container--horizontal available-campsite">
    <p class="text">
        Welcome to GWSC, explore breathtaking landscapes, choose from rustic tents to cozy cabins, and embrace the
        tranquility of starry nights. GWSC provides an unparalleled wilderness experience with guided treks,
        exhilarating activities, and tranquil fishing sites. Begin planning your outdoor adventure today!
        <br>
        <br>
        <span  class="desktop-text">
        Escape the daily grind and immerse yourself in the wonders of nature. Explore breathtaking
        landscapes, find solace in tranquility, and ignite your sense of adventure. Reconnect with the beauty that
        surrounds us, discover hidden treasures, and experience the transformative power of nature. Answer the call to
        explore and create lifelong memories. Embrace the great outdoors today.
        </span>
    </p>

    <section id="slider__container">
        <div class="slider">
            <?php if (count($campSites) > 4) : ?>
            <?php for ($i = 0; $i < 4; $i++) : ?>
            <figure class="slide">
                <img class="slide__img" src="<?php echo $imageDirPath . $campSites[$i]->getImages()[0] ?>" alt>
                <figcaption class="slide__caption"><?php echo $campSites[$i]->getLocation() ?>,
                    <?php echo $campSites[$i]->getDescription() ?></figcaption>
            </figure>
            <?php endfor; ?>
            <?php else : ?>
            <?php for ($i = 0; $i < count($campSites); $i++) : ?>
            <figure class="slide">
                <img class="slide__img" src="<?php echo $imageDirPath . $campSites[$i]->getImages()[0] ?>" alt>
                <figcaption class="slide__caption"><?php echo $campSites[$i]->getName() ?>
            </figure>
            <?php endfor; ?>
            <?php endif; ?>
        </div>
    </section>
</div>

<!--Display as cards-->
<h3 class="section-header">Different campsite types</h3>
<section class="card__container card__container--center campsite--type">
    <?php foreach ($pitchTypes as $pitchType) : ?>
    <div class="card">
        <div class="card__head">
            <div class="card__title"><?php echo $pitchType->getTitle() ?></div>
        </div>
        <div class="card__body">
            <div class="card__description"><?php echo $pitchType->getDescription() ?></div>
            <a href="pitchTypesAndAvailability.php#<?php echo $pitchType->getTitle(); ?>" class="card__link">
                View
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</section>

<!--About us ( paragraph + map side-by-side )-->
<h3 class="section-header">About us</h3>
<section class="about_us" id="about_us">
    <p class="text">GWSC has a long history based on an enthusiasm for the great outdoors. It was founded years ago by a
        group of enthusiastic adventurers and immediately acquired appeal among nature lovers. With the goal of
        connecting people with the beauty of the environment, GWSC has become a trusted platform for camping enthusiasts
        all around the world. GWSC has evolved into a go-to resource for outdoor exploration via constant innovation and
        a commitment to providing excellent experiences. From humble beginnings to becoming a household name, GWSC's
        history exemplifies the enduring spirit of adventure and the joy of camping.</p>
    <iframe id="location_map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d101909.2826084221!2d-122.09340936511535!3d37.0416312045575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e673ccd98a2adf%3A0xe74fecd3670ccd1f!2sPitch%20Up!5e0!3m2!1sen!2smm!4v1686103910220!5m2!1sen!2smm"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php require_once(INC_PATH . "footer.php") ?>