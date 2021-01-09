<?php

require_once 'config.php';

class Connection
{
    private static $instance = null;
    private $conn;

    private $username = USERNAME;
    private $password = PASSWORD;
    private $host = HOST;
    private $database = DATABASE;

    private function __construct()
    {
        try {
            $this->conn = new PDO("pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password,
                ["sslmode"=>"prefer"]
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $exception){
            die("Connection failed ".$exception->getMessage());
        }
    }
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new Connection();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}