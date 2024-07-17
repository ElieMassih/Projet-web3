<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$res = array();
$res["status"] = "fail";

if (session_destroy())
{
	$res["status"] = "success";
	header("Location: ../Home/home.php");
}