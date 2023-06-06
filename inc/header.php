<?php
session_start();
require_once(dirname(__DIR__) . "/config.php");
require_once(dirname(__DIR__) . "/classes/SessionManager.php");

require_once(DB_CONNECTION);
require_once(DATA_PATH . "UserDataRepository.php");
require_once(DATA_PATH . "CampSiteDataRepository.php");
require_once(DATA_PATH . "ContactDataRepository.php");
require_once(DATA_PATH . "PitchTypeDataRepository.php");
require_once(DATA_PATH . "ReviewDataRepository.php");
require_once(MODEL_PATH . "User.php");
require_once(MODEL_PATH . "PitchType.php");


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
    <!--    <link rel="stylesheet" href="../static/css/style.css">-->
    <link rel="stylesheet" href="<?php echo STATIC_PATH . "css/style.css" ?>">
    <script src="https://kit.fontawesome.com/c66bee47cf.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include_once("navbar.php") ?>
    <main class="main-container">