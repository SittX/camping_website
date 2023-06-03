<?php
require_once(dirname(__DIR__) . "/templates/accessDenied.php");

$isAdmin = isset($_SESSION['rank']) && trim($_SESSION['rank']) == "admin";

if (!$isAdmin) {
        header("Location: " . TEMPLATES_PATH .  "accessDenied.php");
}


