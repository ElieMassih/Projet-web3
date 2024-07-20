<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . "/../dbcon/Connection.php";
include_once __DIR__ . "/../utils/functions.php";

class ModuleBooking extends DBConnection
{
    private $sql_conn;

    function __construct()
    {
        $this->sql_conn = $this->sql_connect();
    }

    function getBookings($userId)
    {
        $sql = 'SELECT * FROM bookings WHERE UserId = :UserId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":UserId", $userId, PDO::PARAM_STR);

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

    function addBookings($params)
    {
        $sql = 'INSERT INTO bookings 
        (BookingId, UserId, Type, BookingName, BookingDescription)
        VALUES
        (:BookingId, :UserId, :Type, :BookingName, :BookingDescription)';

        $stmt = $this->sql_conn->prepare($sql);

        $bookingId = guidv4();

        $stmt->bindParam(":BookingId", $bookingId, PDO::PARAM_STR);
        $stmt->bindParam(":UserId", $params["userId"], PDO::PARAM_STR);
        $stmt->bindParam(":Type", $params["bookingType"], PDO::PARAM_STR);
        $stmt->bindParam(":BookingName", $params["bookingName"], PDO::PARAM_STR);
        $stmt->bindParam(":BookingDescription", $params["bookingDescription"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

    function deleteBookings($bookingId)
    {
        $sql = 'DELETE FROM bookings WHERE BookingId = :BookingId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":BookingId", $bookingId, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }
}

$moduleBooking = new ModuleBooking();

if (isset($_POST["action"]) && isset($_POST["params"])) { 
    $action = $_POST["action"];
    $params = $_POST["params"];


    if ($action == "add") {
        $result = $moduleBooking->addBookings($params);
    } elseif ($action == "delete") {
        $result = $moduleBooking->deleteBookings($params);
    } elseif ($action == "view") {
        $result = $moduleBooking->getBookings($params);
    }

    echo json_encode(["success" => $result]);
}