<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "sim_registration";

$conn = new mysqli($hostName, $userName, $password, $dbName);

if ($conn->connect_error) {
    die("Unable to connect database: " . $conn->connect_error);
}

?>