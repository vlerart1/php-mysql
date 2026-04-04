<?php
$host = 'localhost';
$username = 'root';
$password = '';

try {
    // Connect without database
    $connect = new PDO("mysql:host=$host", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database
    $connect->exec("CREATE DATABASE IF NOT EXISTS challengee");
    echo "Database created successfully<br>";
    
    // Select database
    $connect->exec("USE challengee");
    
    // Drop and recreate table to ensure all columns exist
    $connect->exec("DROP TABLE IF EXISTS users");
    
    $sql = "CREATE TABLE users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    $connect->exec($sql);
    echo "Users table created successfully<br>";
    echo "<a href='Signin.php' class='btn btn-primary'>Go to Registration</a>";
    
} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
