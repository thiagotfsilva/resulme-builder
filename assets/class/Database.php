<?php

class Database
{
    private $host = '127.0.0.1';
    private $username = 'root';
    private $database = 'resumebuilder';
    private $password = 'root';
    private $port = 3308;
    private $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->connection = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database,
            $this->port
        );
    }

    public function getConnection()
    {
        return $this->connection;
    }
}


$db = new Database();
$mysql = $db->getConnection();
