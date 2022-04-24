<?php

 namespace MercuryHolidays\config;

 include_once 'vendor/autoload.php';


class Database{

    //DB Parameters
    private $host = "localhost";
    private $db_name = "sunspottours";
    private $username = 'root';
    private $password = '@123@Pass.';
    private $conn;

    public function connect(){
        $this->conn = null;
        try {
        $this->conn = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password );
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $e){
         echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}