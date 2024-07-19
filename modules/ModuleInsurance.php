<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . "/../dbcon/Connection.php";
include_once __DIR__ . "/../utils/functions.php";

class ModuleInsurance extends DBConnection
{
    private $sql_conn;

    function __construct()
    {
        $this->sql_conn = $this->sql_connect();
    }

    function getInsurances()
    {
        $sql = 'SELECT * FROM insurances';

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

    function addInsurances($params)
    {
        $sql = 'INSERT INTO insurances 
        (InsuranceId, UserId, FullName, Email, PhoneNumber, Destination, StartDate, EndDate, CoverageType)
        VALUES
        (:InsuranceId, :UserId, :FullName, :Email, :PhoneNumber, :Destination, :StartDate, :EndDate, :CoverageType)';

        $stmt = $this->sql_conn->prepare($sql);

        $insuranceId = guidv4();

        $stmt->bindParam(":InsuranceId", $insuranceId, PDO::PARAM_STR);
        $stmt->bindParam(":UserId", $params["userId"], PDO::PARAM_STR);
        $stmt->bindParam(":FullName", $params["fullName"], PDO::PARAM_STR);
        $stmt->bindParam(":Email", $params["email"], PDO::PARAM_STR);
        $stmt->bindParam(":PhoneNumber", $params["phoneNumber"], PDO::PARAM_STR);
        $stmt->bindParam(":Destination", $params["destination"], PDO::PARAM_STR);
        $stmt->bindParam(":StartDate", $params["startDate"], PDO::PARAM_STR);
        $stmt->bindParam(":EndDate", $params["endDate"], PDO::PARAM_STR);
        $stmt->bindParam(":CoverageType", $params["coverageType"], PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

    function deleteInsurances($insuranceId)
    {
        $sql = 'DELETE FROM attractions WHERE InsuranceId = :InsuranceId';

        $stmt = $this->sql_conn->prepare($sql);

        $stmt->bindParam(":InsuranceId", $insuranceId, PDO::PARAM_STR);

        $stmt->execute();

        if ($stmt->rowCount() == 0) {
        return false;
        }

        return true;
    }

}