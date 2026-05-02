<?php

include_once('config.php');

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=:id";
$prep = $connect->prepare($sql);
$prep->bindParam(':id', $id);
$prep->execute();

header("Location: dashboard.php");
exit();

?>