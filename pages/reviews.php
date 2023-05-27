<?php
include("./inc/header.php");
include("./role.php");
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

<?php
include("./inc/footer.php");
?>