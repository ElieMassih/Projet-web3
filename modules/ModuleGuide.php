<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . "/../dbcon/Connection.php";
include_once __DIR__ . "/../utils/functions.php";

class ModuleGuide extends DBConnection
{
    private $sql_conn;

    function __construct()
    {
        $this->sql_conn = $this->sql_connect();
    }

    function getGuides()
    {
        $sql = 'SELECT * FROM guides';

        $stmt = $this->sql_conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = array();

        if ($stmt->rowCount() == 0)
            return $data;

        foreach ($result as $row) {
            $data[] = $row; 
        }

        return $data;
    }

    function addGuides($params)
    {
        $sql = 'INSERT INTO guides 
        (GuideId, GuideName, GuidePics)
        VALUES
        (:GuideId, :GuideName, :GuidePics)';

        $stmt = $this->sql_conn->prepare($sql);

        $guideId = guidv4();

        $stmt->bindParam(":GuideId", $guideId, PDO::PARAM_STR);
        $stmt->bindParam(":GuideName", $params["guideName"], PDO::PARAM_STR);
        $stmt->bindParam(":GuidePics", $params["guidePics"], PDO::PARAM_STR);;

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

    function deleteGuides($params)
    {
        $sql = 'DELETE FROM guides WHERE GuideId = :GuideId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":GuideId", $params, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

    function updateGuides($params)
    {
        $sql = 'UPDATE guides 
        SET GuideName = :GuideName,
            GuidePics = :GuidePics
        WHERE GuideId = :GuideId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":GuideId", $params["guideId"], PDO::PARAM_STR);
        $stmt->bindParam(":GuideName", $params["guideName"], PDO::PARAM_STR);
        $stmt->bindParam(":GuidePics", $params["guidePics"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            return false;
        }

        return true;
    }
}

$moduleGuide = new ModuleGuide();

if (isset($_POST["action"]) && isset($_POST["params"])) { 
    $action = $_POST["action"];
    $params = $_POST["params"];


    if ($action == "update") {
        $result = $moduleGuide->updateGuides($params);
    } elseif ($action == "add") {
        $result = $moduleGuide->addGuides($params);
    } elseif ($action == "delete") {
        $result = $moduleGuide->deleteGuides($params);
    }

    echo json_encode(["success" => $result]);
}