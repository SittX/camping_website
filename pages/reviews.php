<?php
require_once(dirname(__DIR__) . "/inc/header.php");

 $db = new DatabaseConnection();
 $connection = $db->getConnection();
$reviewRepo = new ReviewDataRepository($connection);
$userRepo = new UserDataRepository($connection);
$siteRepo = new CampSiteDataRepository($connection);
$reviewList = $reviewRepo->getLists();
$sites = $siteRepo->getLists();

if (isset($_POST["submit_review"])) {
    if (!SessionManager::checkIfUserLoggedIn()) {
        header("Location: login.php");
        return;
    }

    $user = $userRepo->searchById($_SESSION["user"]["id"]);
    $site = $siteRepo->searchById($_POST["site_id"]);

    $newReview = new Review($_POST["rating"], $_POST["review_message"], $_POST["title"]);
    $newReview->setUser($user);
    $newReview->setSite($site);
    $reviewRepo->insert($newReview);
}
?>

<div class="container">
    <div class="review__container">
        <?php foreach ($reviewList as $review) : ?>
            <div class="review">
                <p class="review__title">Review for <?php echo $review->getSite()->getName() ?></p>
                <img src="../uploads/<?php echo $review->getSite()->getImages()[1] ?>" class="review__img">
                <p class="review__title"><?php echo $review->getTitle() ?></p>
                <div class="review__body">
                    <p class="review__text"><?php echo $review->getMessage() ?></p>
                    <p class="review__text--bold">***** Rating *****</p>
                    <p class="review__rating"><?php echo $review->getRating() ?> out of 5</p>
                    <p class="review__user">Reviewed by <?php echo $review->getUser()->getUsername() ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <p class="review_form_status"></p>
    <form action="<?PHP echo $_SERVER['PHP_SELF'] ?>" method="post" class="form review__form">
        <h4 class="section-header">Write your review !</h4>
        <input type="text" name="title" placeholder="Title" class="form__input">
        <textarea name="review_message" id="review_message" placeholder="review message" class="review__textarea"></textarea>

        <p class="form__label">Choose the campsite</p>
        <select class="select" name="site_id" id="sites" class="select">
            <?php foreach ($sites as $site) : ?>
                <option value="<?php echo $site->getSiteId(); ?>"><?php echo $site->getName(); ?></option>
            <?php endforeach; ?>
        </select>

        <p class="form__lable">Choose your rating</p>
        <select class="select" name="rating" id="ratings">
            <option value="1">Excellent</option>
            <option value="2">Awesome</option>
            <option value="3">Good</option>
            <option value="4">Average</option>
            <option value="5">Bad</option>
        </select>
        <input type="submit" value="Submit" name="submit_review" class="btn btn--success">
    </form>
</div>

<?php
include(INC_PATH . "footer.php");
?>