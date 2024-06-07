<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . "/../dbcon/Connection.php";
include_once __DIR__ . "/../utils/functions.php";
include_once __DIR__ . "/ModuleEncryption.php";

class ModuleUser extends DBConnection
{
    private $sql_conn;

    function __construct()
    {
        $this->sql_conn = $this->sql_connect();
    }

    function loginUser($username, $password)
    {
        $sql = 'SELECT * FROM users 
        WHERE Password = :Password
        AND (Username = :UsernameOrEmail OR Email = :UsernameOrEmail)';

        $stmt = $this->sql_conn->prepare($sql);
        $stmt-> bindParam(":Password", $password, PDO::PARAM_STR);
        $stmt-> bindParam(":UsernameOrEmail", $username, PDO::PARAM_STR);
    

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

    function createUser($params)
    {
        $encryption = new ModuleEncryption();

        $sql = 'INSERT INTO users
        (UserId, FullName, Username, Password, Email) 
        VALUES 
        (:UserId, :FullName, :Username, :Password, :Email)';

        $stmt = $this->sql_conn->prepare($sql);

        $userId = guidv4();
        
        $encryptedPassword = $encryption->encryptUserPassword($params["password"]);
        $stmt->bindParam(":UserId", $userId, PDO::PARAM_STR);
        $stmt->bindParam(":FullName", $params["fullname"], PDO::PARAM_STR);
        $stmt->bindParam(":Username", $params["username"], PDO::PARAM_STR);
        $stmt->bindParam(":Password", $encryptedPassword, PDO::PARAM_STR);
        $stmt->bindParam(":Email", $params["email"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            return false;
        }

        return true;
    }

    function updateUser($params)
    {
        $sql = 'UPDATE users 
                SET 
                FullName = :FullName, 
                Username = :Username, 
                Password = :Password, 
                Email = :Email 
                WHERE UserId = :UserId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":UserId", $params["userId"], PDO::PARAM_STR);
        $stmt->bindParam(":FullName", $params["fullname"], PDO::PARAM_STR);
        $stmt->bindParam(":Username", $params["username"], PDO::PARAM_STR);
        $stmt->bindParam(":Password", $params["password"], PDO::PARAM_STR);
        $stmt->bindParam(":Email", $params["email"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            return false;
        }

        return true;
    }
}

$moduleUser = new ModuleUser();

if (isset($_POST["action"]) && isset($_POST["params"])) { 
    $action = $_POST["action"];
    $params = $_POST["params"];

    if ($action == "create") {
        $result = $moduleUser->createUser($params);
    } elseif ($action == "update") {
        $result = $moduleUser->updateUser($params);
    }

    echo json_encode(["success" => $result]);
}