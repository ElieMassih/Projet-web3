<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . "/../dbcon/Connection.php";
include_once __DIR__ . "/../utils/functions.php";

class ModuleCar extends DBConnection
{
    private $sql_conn;

    function __construct()
    {
        $this->sql_conn = $this->sql_connect();
    }

    function getCars()
    {
        $sql = 'SELECT * FROM cars';

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

    function addCars($params)
    {
        $sql = 'INSERT INTO cars 
        (CarId, CarName, CarType, PricePerDay, CarPics)
        VALUES
        (:CarId, :CarName, :CarType, :PricePerDay, :CarPics)';

        $stmt = $this->sql_conn->prepare($sql);

        $carId = guidv4();

        $stmt->bindParam(":CarId", $carId, PDO::PARAM_STR);
        $stmt->bindParam(":CarName", $params["carName"], PDO::PARAM_STR);
        $stmt->bindParam(":CarType", $params["carType"], PDO::PARAM_STR);
        $stmt->bindParam(":PricePerDay", $params["carPrice"], PDO::PARAM_STR);
        $stmt->bindParam(":CarPics", $params["carPics"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

    function deleteCars($carId)
    {
        $sql = 'DELETE FROM cars WHERE CarId = :CarId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":CarId", $carId, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

    function updateCars($params)
    {
        $sql = 'UPDATE cars 
        SET CarName = :CarName,
            CarType = :CarType,
            PricePerDay = :PricePerDay,
            CarPics = :CarPics
        WHERE CarId = :CarId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":CarId", $params["carId"], PDO::PARAM_STR);
        $stmt->bindParam(":CarName", $params["carName"], PDO::PARAM_STR);
        $stmt->bindParam(":CarType", $params["carType"], PDO::PARAM_STR);
        $stmt->bindParam(":PricePerDay", $params["carPrice"], PDO::PARAM_STR);
        $stmt->bindParam(":CarPics", $params["carPics"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            return false;
        }

        return true;
    }
}

$moduleCar = new ModuleCar();

if (isset($_POST["action"]) && isset($_POST["params"])) { 
    $action = $_POST["action"];
    $params = $_POST["params"];


    if ($action == "update") {
        $result = $moduleCar->updateCars($params);
    } elseif ($action == "add") {
        $result = $moduleCar->addCars($params);
    } elseif ($action == "delete") {
        $result = $moduleCar->deleteCars($params);
    }

    echo json_encode(["success" => $result]);
}