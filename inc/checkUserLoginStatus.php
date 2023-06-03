<?php
require_once(dirname(__DIR__) . "/pages/login.php");
$isLoggedIn = isset($_SESSION['user']) && trim($_SESSION["user"]) != null;

if(!$isLoggedIn){
   header("Location: " . PAGES_PATH . "login.php");
}