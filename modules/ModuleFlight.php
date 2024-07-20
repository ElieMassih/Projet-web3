<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . "/../dbcon/Connection.php";
include_once __DIR__ . "/../utils/functions.php";

class ModuleFlight extends DBConnection
{
    private $sql_conn;

    function __construct()
    {
        $this->sql_conn = $this->sql_connect();
    }

    function getFlights()
    {
        $sql = 'SELECT * FROM flights';

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

    function addFlights($params)
    {
        $sql = 'INSERT INTO flights 
        (FlightId, Destination, StartDate, EndDate, Price, FlightPics)
        VALUES
        (:FlightId, :Destination, :StartDate, :EndDate, :Price, :FlightPics)';

        $stmt = $this->sql_conn->prepare($sql);

        $flightId = guidv4();

        $stmt->bindParam(":FlightId", $flightId, PDO::PARAM_STR);
        $stmt->bindParam(":Destination", $params["destination"], PDO::PARAM_STR);
        $stmt->bindParam(":StartDate", $params["startDate"], PDO::PARAM_STR);
        $stmt->bindParam(":EndDate", $params["endDate"], PDO::PARAM_STR);
        $stmt->bindParam(":Price", $params["price"], PDO::PARAM_STR);
        $stmt->bindParam(":FlightPics", $params["flightPics"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

    function deleteFlights($flightId)
    {
        $sql = 'DELETE FROM flights WHERE FlightId = :FlightId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":FlightId", $flightId, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

    function updateFlights($params)
    {
        $sql = 'UPDATE flights 
        SET Destination = :Destination,
            StartDate = :StartDate,
            EndDate = :EndDate,
            Price = :Price,
            FlightPics = :FlightPics
        WHERE FlightId = :FlightId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":FlightId", $params["flightId"], PDO::PARAM_STR);
        $stmt->bindParam(":Destination", $params["destination"], PDO::PARAM_STR);
        $stmt->bindParam(":StartDate", $params["startDate"], PDO::PARAM_STR);
        $stmt->bindParam(":EndDate", $params["endDate"], PDO::PARAM_STR);
        $stmt->bindParam(":Price", $params["price"], PDO::PARAM_STR);
        $stmt->bindParam(":FlightPics", $params["flightPics"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            return false;
        }

        return true;
    }
}

$moduleFlight = new ModuleFlight();

if (isset($_POST["action"]) && isset($_POST["params"])) { 
    $action = $_POST["action"];
    $params = $_POST["params"];


    if ($action == "update") {
        $result = $moduleFlight->updateFlights($params);
    } elseif ($action == "add") {
        $result = $moduleFlight->addFlights($params);
    } elseif ($action == "delete") {
        $result = $moduleFlight->deleteFlights($params);
    }

    echo json_encode(["success" => $result]);
}