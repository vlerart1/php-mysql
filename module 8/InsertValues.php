<?php

$host = "localhost";
$db   = "testfatlindi";
$user = "root";
$pass = "";

try {

    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    $username = "Vlerart";
    $password = "Vlerart1234";

    $sql = "INSERT INTO users(username, password) 
            VALUES ('$username', '$password')";

    $conn->exec($sql);

    echo("ROW ADDED");

} catch (Exception $e) {

    echo("ROW NOT ADDED");

}

?>