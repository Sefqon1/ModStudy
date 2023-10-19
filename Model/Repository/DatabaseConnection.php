<?php
require_once 'config.php';
class DatabaseConnection
{
    private  $user;
    private  $pass;
    private  $host;
    private  $dbName;
    private $port;
    private $connection;

    public function __construct() {
        $this->user = DB_USER;
        $this->pass = DB_PASS;
        $this->host = DB_HOST;
        $this->dbName = DB_NAME;
        $this->port = DB_PORT;
        $this->connect();
    }

    private function connect(): void
    {
        try {
            $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->dbName, $this->port);
        } catch(mysqli_sql_exception $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
     public function getConnection()
    {
        return $this->connection;
    }
    public function closeConnection(): void
    {
        $this->connection->close();
    }

}