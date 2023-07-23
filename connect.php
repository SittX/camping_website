<?php
$connection = new mysqli("localhost", "kellot", "kellot", "campsite_db");
if ($connection->error) {
    die("Cannot connect to the database");
}
