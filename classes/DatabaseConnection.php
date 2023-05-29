<?php
if (!defined("DB_HOST")) {
    require_once("../inc/config.php");
}

final class DatabaseConnection
{
    private $host;
    private $username;
    private $password;
    private $dbName;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->username = DB_USERNAME;
        $this->password = DB_USERNAME;
        $this->dbName = DB_USERNAME;
    }

    public function getConnection(): mysqli
    {
        $connection =  new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($connection->error) {
            die("Cannnot connect to the database");
        }

        return $connection;
    }
}
