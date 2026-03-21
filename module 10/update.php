<?php

include_once('config.php');

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

$sql = 'UPDATE users SET name = :name, email = :email WHERE id = :id';

$updateUsers = $conn->prepare($sql);

$updateUsers->bindParam(':id', $id);
$updateUsers->bindParam(':name', $name);
$updateUsers->bindParam(':email', $email);

$updateUsers->execute();

header('Location: dashboard.php');
