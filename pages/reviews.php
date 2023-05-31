<?php
include("../inc/header.php");
include("../inc/accessControl.php");
?>

<button>
    Write a review
</button>

<button style="<?php echo $_SESSION["rank"] == "admin" ? "display:block" : "display:none"  ?>">
    Delete a review
</button>

<button style="<?php echo $_SESSION["rank"] == "admin" ? "display:block" : "display:none"  ?>">
    Update a view
</button>

<form action="<?PHP echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="title" namespace="Title">
    <textarea name="review_message" id="review_message" cols="30" rows="10"></textarea>
    <input type="submit" value="Submit" name="submit_review">
</form>


<?php
include("../inc/footer.php");
?>