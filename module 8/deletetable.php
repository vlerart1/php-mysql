<?php

$host = "localhost";
$db   = "testfatlindi";
$user = "root";
$pass = "";

try {

    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    $sql = "DROP TABLE products";

    $conn->exec($sql);

    echo("Table droped");

} catch (Exception $e) {

    echo("Table NOT Droped");

}

?>