<?php
include_once('config.php');

$id= $_GET['id'];

$sql ='SELECT * FROM users where id= :id';

$getUsers = $conn->prepare($sql);

$getUsers->bindParam(':id', $id);

$getUsers->execute();

$data = $prep -> fetch();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $data['name']; ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $data['email']; ?>">
        <input type="submit" value="Update">
    </form>
</body>
</html>