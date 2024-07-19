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
            $data = $row;
        }

        return $data;
    }

    function addGuides($params)
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
        $stmt->bindParam(":AttractionDescription", $params["attractionRating"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionDescription", $params["attractionReviews"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionPrice", $params["attractionPrice"], PDO::PARAM_STR);
        $stmt->bindParam(":AttractionPics", $params["attractionPic"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

    function deleteGuides($attractionId)
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

    function updateGuides($params)
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