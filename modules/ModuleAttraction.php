<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . "/../dbcon/Connection.php";
include_once __DIR__ . "/../utils/functions.php";

class ModuleAttraction extends DBConnection
{
    private $sql_conn;

    function __construct()
    {
        $this->sql_conn = $this->sql_connect();
    }

    function getAttractions()
    {
        $sql = 'SELECT * FROM attractions';

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

    function addAttractions($params)
    {
        $sql = 'INSERT INTO attractions 
        (AttractionId, AttractionName, AttractionLocation, AttractionDescription, AttractionRating, AttractionReviews, AttractionPrice, AttractionPics)
        VALUES
        (:AttractionId, :AttractionName, :AttractionLocation, :AttractionDescription, :AttractionRating, :AttractionReviews, :AttractionPrice, :AttractionPics)';

        $stmt = $this->sql_conn->prepare($sql);

        $attractionId = guidv4();

        $stmt->bindParam(":AttractionId", $attractionId, PDO::PARAM_STR);
        $stmt->bindParam(":AttractionName", $params["attractionName"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionLocation", $params["attractionLocation"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionDescription", $params["attractionDescription"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionRating", $params["attractionRating"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionReviews", $params["attractionReviews"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionPrice", $params["attractionPrice"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionPics", $params["attractionPics"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

    function deleteAttractions($attractionId)
    {
        $sql = 'DELETE FROM attractions WHERE AttractionId = :AttractionId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":AttractionId", $attractionId, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

    function updateAttractions($params)
    {
        $sql = 'UPDATE attractions 
        SET AttractionName = :AttractionName,
            AttractionLocation = :AttractionLocation,
            AttractionDescription = :AttractionDescription,
            AttractionRating = :AttractionRating,
            AttractionReviews = :AttractionReviews,
            AttractionPrice = :AttractionPrice,
            AttractionPics = :AttractionPics
        WHERE AttractionId = :AttractionId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":AttractionId", $params["attractionId"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionName", $params["attractionName"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionLocation", $params["attractionLocation"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionDescription", $params["attractionDescription"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionRating", $params["attractionRating"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionReviews", $params["attractionReviews"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionPrice", $params["attractionPrice"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionPics", $params["attractionPics"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            return false;
        }

        return true;
    }
}

$moduleAttraction = new ModuleAttraction();

if (isset($_POST["action"]) && isset($_POST["params"])) { 
    $action = $_POST["action"];
    $params = $_POST["params"];


    if ($action == "update") {
        $result = $moduleAttraction->updateAttractions($params);
    } elseif ($action == "add") {
        $result = $moduleAttraction->addAttractions($params);
    } elseif ($action == "delete") {
        $result = $moduleAttraction->deleteAttractions($params);
    }

    echo json_encode(["success" => $result]);
}