<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once "../dbcon/Connection.php";

class ModuleUser extends DBConnection
{
    private $sql_conn;

    function __construct()
    {
        $this->sql_conn = $this->sql_connect();
    }

    function loginUser($username, $email, $password)
    {
        $sql = 'SELECT * FROM USERS 
        WHERE "Password" = :Password
        AND ("Username" = :UsernameOrEmail OR "Email" = :UsernameOrEmail)';

        $stmt = $this->sql_conn->prepare($sql);
        $stmt-> bindParam(":Password", $password, PDO::PARAM_STR);
        $stmt-> bindParam(":Username", $username, PDO::PARAM_STR);
        $stmt-> bindParam(":Email", $email, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data = array();

        if ($stmt->rowCount() === 1) {
            foreach ($result as $row) {
                $data['fullname'] = $row['FullName'];
                $data['userid'] = $row['UserId'];
                $data['email'] = $row['Email'];
                $data['user_role'] = $row['Role'];
                $data['status'] = $row['Status'];
            }
        }
        return $data;
    }
}