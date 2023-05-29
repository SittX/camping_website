<?php
$isAdmin = isset($_SESSION['rank']) && trim($_SESSION['rank']) == "admin";

var_dump($isAdmin);
var_dump($_SESSION);
if (!$isAdmin) {
    header("Location: ../templates/accessDenied.php");
}
