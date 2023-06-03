<?php
require_once(dirname(__FILE__) . "/config.php");
require_once(INC_PATH . "header.php");

$homePagePath =  "./pages/home.php";
header("Location: " . $homePagePath);
?>


<?php require_once(INC_PATH . "footer.php"); ?>