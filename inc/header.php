<?php
session_start();

require_once("./classes/DatabaseConnection.php");
require_once("./data/UserDataRepository.php");
require_once("./data/CampSiteDataRepository.php");

$conn = new DatabaseConnection();
$userRepo = new UserDataRepository($conn);
$campSiteRepo = new CampSiteDataRepository($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Html page</title>
</head>