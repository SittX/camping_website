<?php
$isAdmin = isset($_SESSION['user']) && trim($_SESSION['user']['rank']) == "admin";

if (!$isAdmin) {
    header("Location: " . TEMPLATES_PATH . "accessDenied.php");
}


