<?php

$servername = "localhost";
$username = "ksehdev";
$password = "Inayat1596";
$dbname = "SSID";

$conn = OCILogon($username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 


?>