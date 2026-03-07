<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ds";

$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "CREATE DATABASE dalmat";
$conn->query(query: $sql);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
