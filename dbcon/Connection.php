<?php

$_servername = "localhost";
$_username = "root";
$_password = "";
$_dbname = "web3";

class DBConnection {
    
    private $servername;
    private $port;
    private $username;
    private $password;
    private $dbname;

    public function sql_connect()
    {
        global $_servername, $_username, $_password, $_dbname;

        $this->servername = $_servername;
        $this->username = $_username;
        $this->password = $_password;
        $this->dbname = $_dbname;

        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Database Connection Failed: " . $e->getMessage());
        }
    }
}
