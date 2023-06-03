<?php
session_start();
require_once(dirname(__DIR__) . "/config.php");

require_once(DB_CONNECTION);
require_once(DATA_PATH . "UserDataRepository.php");
require_once(DATA_PATH . "CampSiteDataRepository.php");
require_once(DATA_PATH . "ContactDataRepository.php");
require_once(MODEL_PATH . "User.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php // $_GET[""]
        ?>
    </title>
    <link rel="stylesheet" href="<?php echo "../static/css/style.css" ?>">
</head>

<body>
    <?php include_once("navbar.php") ?>