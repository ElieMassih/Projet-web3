<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . "/../dbcon/Connection.php";
include_once __DIR__ . "/../utils/functions.php";

class ModuleHotel extends DBConnection
{
    private $sql_conn;

    function __construct()
    {
        $this->sql_conn = $this->sql_connect();
    }

    function getHotels()
    {
        $sql = 'SELECT * FROM hotels';

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

    function addHotels($params)
    {
        $sql = 'INSERT INTO hotels 
        (HotelId, HotelName, HotelDescription, PricePerNight, HotelPics)
        VALUES
        (:HotelId, :HotelName, :HotelDescription, :PricePerNight, :HotelPics)';

        $stmt = $this->sql_conn->prepare($sql);

        $hotelId = guidv4();

        $stmt->bindParam(":HotelId", $hotelId, PDO::PARAM_STR);
        $stmt->bindParam(":HotelName", $params["hotelName"], PDO::PARAM_STR);
        $stmt->bindParam(":HotelDescription", $params["hotelDescription"], PDO::PARAM_STR);
        $stmt->bindParam(":PricePerNight", $params["pricePerNight"], PDO::PARAM_STR);
        $stmt->bindParam(":HotelPics", $params["hotelPics"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

    function deleteHotels($hotelId)
    {
        $sql = 'DELETE FROM hotels WHERE HotelId = :HotelId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":HotelId", $hotelId, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

    function updateHotels($params)
    {
        $sql = 'UPDATE hotels 
        SET HotelName = :HotelName,
            HotelDescription = :HotelDescription,
            PricePerNight = :PricePerNight,
            HotelPics = :HotelPics,
        WHERE HotelId = :HotelId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":HotelId", $params["hotelId"], PDO::PARAM_STR);
        $stmt->bindParam(":HotelName", $params["hotelName"], PDO::PARAM_STR);
        $stmt->bindParam(":HotelDescription", $params["hotelDescription"], PDO::PARAM_STR);
        $stmt->bindParam(":PricePerNight", $params["pricePerNight"], PDO::PARAM_STR);
        $stmt->bindParam(":HotelPics", $params["hotelPics"], PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            return false;
        }

        return true;
    }

}