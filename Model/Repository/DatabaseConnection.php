<?php

class DatabaseConnection
{
    private  $user;
    private  $pass;
    private  $host;
    private  $dbName;
    private $connection;

    public function __construct($user, $pass, $host, $dbName) {
        $this->user = $user;
        $this->pass = $pass;
        $this->host = $host;
        $this->dbName = $dbName;
    }

    private function connect() {
        try {
            $this->connection = new PDO("mysql:{$this->host}; dbname:{$this->dbName}", $this->user, $this->pass);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

     public function getConnection()
    {
        return $this->connection;
    }

}