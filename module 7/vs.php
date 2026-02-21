<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "ds";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS `$dbname`";

if ($conn->query($sql) !== TRUE) {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);

echo "Connected successfully to database '$dbname'.";

$conn->close();

?>