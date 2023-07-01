<?php
require_once(dirname(__DIR__) . "/inc/header.php");

// $db = new DatabaseConnection();
// $connection = $db->getConnection();
$reviewRepo = new ReviewDataRepository($connection);
$reviewList = $reviewRepo->getLists();

// TODO : Allow to write review only if the user is logged in ( check user login status )
if (isset($_POST["submit_review"])) {
    if (!SessionManager::checkIfUserLoggedIn()) {
        echo "Cannot make review if you aren't logged in";
        // header("Location: login.php");
        return;
    }
    print_r($_POST["rating"]);
    $newReview = new Review($_POST["rating"], $_POST["review_message"], $_POST["title"], $_SESSION["user"]["id"], 2);
    $reviewRepo->insert($newReview);
}

// Check request URL parameters
// var_dump($_GET);


// Login style -> 
/*
    Title
    Rating 
    Message
    USERNAME Reviewed-Time    

    e.g 
    Very welcome atmosphere
    4 out of 5
    I like it.
    David 2023-03-12
*/
?>

    <div>
        <?php foreach ($reviewList as $review) : ?>
            <div>
                <h3><?php echo $review->getTitle() ?></h3>
                <p><?php echo $review->getMessage() ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <p class="review_form_status"></p>
    <form action="<?PHP echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
        <input type="text" name="title" placeholder="Title" class="form__input">
        <textarea name="review_message" id="review_message" cols="30" rows="10" placeholder="review message"></textarea>
        <!-- <input type="number" name="rating" id="rating" placeholder="rating"> -->
        <select name="rating" id="cars">
            <option value="1">Excellent</option>
            <option value="2">Awesome</option>
            <option value="3">Good</option>
            <option value="4">Average</option>
            <option value="5">Bad</option>
        </select>
        <input type="submit" value="Submit" name="submit_review">
    </form>


<?php
include(INC_PATH . "footer.php");
?>