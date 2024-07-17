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
            $data = $row;
        }

        return $data;
    }

    function addAttractions($params)
    {
        $sql = 'INSERT INTO attractions 
        (AttractionId, AttractionName, AttractionLocation, AttractionDescription, AttractionPrice, AttractionPics)
        VALUES
        (:AttractionId, :AttractionName, :AttractionLocation, :AttractionDescription, :AttractionPrice, :AttractionPics)';

        $stmt = $this->sql_conn->prepare($sql);

        $attractionId = guidv4();

        $stmt->bindParam(":AttractionId", $attractionId, PDO::PARAM_STR);
        $stmt->bindParam(":AttractionName", $params["attractionName"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionLocation", $params["attractionLocation"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionDescription", $params["attractionDescription"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionPrice", $params["attractionPrice"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionPics", $params["attractionPics"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

}