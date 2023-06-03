<?php
require_once(dirname(__DIR__) . "/config.php");
final class DatabaseConnection
{
    private string $host;
    private string $username;
    private string $password;
    private string $dbName;

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
            die("Cannot connect to the database");
        }

        return $connection;
    }
}
