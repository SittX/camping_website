<?php
require_once(dirname(__DIR__) . "/inc/header.php");
//require_once(INC_PATH . "checkUserRank.php");

$db = new DatabaseConnection();
$connection = $db->getConnection();
$reviewRepo = new ReviewDataRepository($connection);
$reviewList = $reviewRepo->getLists();

// TODO : Display reviews for all user types 

// TODO : Allow to write review only if the user is logged in ( check user login status )


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

<!--<button>-->
<!--    Write a review-->
<!--</button>-->
<!---->
<!--<button style="--><?php //echo $_SESSION["rank"] == "admin" ? "display:block" : "display:none"  
                        ?>
<!--">-->
<!--    Delete a review-->
<!--</button>-->
<!---->
<!--<button style="--><?php //echo $_SESSION["rank"] == "admin" ? "display:block" : "display:none"  
                        ?>
<!--">-->
<!--    Update a view-->
<!--</button>-->
<div>
    <?php foreach ($reviewList as $review) : ?>
        <div>
            <h3><?php echo $review->getTitle() ?></h3>
            <p><?php echo $review->getMessage() ?></p>
        </div>
    <?php endforeach; ?>
</div>


<form action="<?PHP echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="title" namespace="Title">
    <textarea name="review_message" id="review_message" cols="30" rows="10"></textarea>
    <input type="submit" value="Submit" name="submit_review">
</form>



<?php
include(INC_PATH . "footer.php");
?>