<?php
require_once(dirname(__DIR__) . "/inc/header.php");
$campSiteRepo = new CampSiteDataRepository($connection);
$campSiteList = $campSiteRepo->getLists();
$imageDirPath =  ".." . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
// TODO : Fetch all images along with campsite information
// TODO : Slideshow, Maps
?>

<!--Page banner with some text-->
<section class="page-banner">
    <div class="page-banner-text">
        <p>Escape to Nature: Discover Your Perfect Campsite with ExploreCamps!</p>
        <a href="<?php echo PAGES_PATH . "information.php" ?>">Explore</a>
    </div>
</section>

<div id="captioned-gallery">
    <figure class="slider">
        <?php foreach ($campSiteList as $campSite) : ?>
        <figure class="slide">
            <img src="<?php echo $imageDirPath . $campSite->getImages()[0] ?>" alt>
            <figcaption><?php echo $campSite->getLocation() ?>, <?php echo $campSite->getDescription() ?></figcaption>
        </figure>
        <?php endforeach ?>
    </figure>
</div>

<!--About us ( paragraph + map side-by-side )-->
<h3>About us</h3>
<section class="about-us" id="about-us">
    <p>Welcome to ExploreCamps! We are your one-stop destination for booking and exploring a wide range of campsites
        across the country. With our user-friendly platform, you can easily find and reserve your perfect campsite in
        just a few clicks. We offer a diverse selection of campsites, complete with detailed information, amenities, and
        user reviews to help you make an informed decision. Join our vibrant camping community, gain access to expert
        advice, and start your outdoor adventure today. Explore the beauty of nature and create unforgettable memories
        with ExploreCamps.</p>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d101909.2826084221!2d-122.09340936511535!3d37.0416312045575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e673ccd98a2adf%3A0xe74fecd3670ccd1f!2sPitch%20Up!5e0!3m2!1sen!2smm!4v1686103910220!5m2!1sen!2smm"
        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php require_once(INC_PATH . "footer.php") ?>