<?php
require_once(dirname(__DIR__) . "/classes/SessionManager.php");
SessionManager::logout();
$_SESSION["logged_in"] = false;
header("Location: " . "home.php");
