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
        global $_username, $_servername, $_password, $_dbname;

        $this->servername = $_servername;
        $this->username = $_username;
        $this->password = $_password;
        $this->dbname = $_dbname;

        $conn = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbname
        );

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        if($conn->connect_error) {
            die("Database Connection Failed : " . $conn->connect_error);
        }
        return $conn;
    }
}
