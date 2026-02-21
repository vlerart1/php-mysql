<?php

$host = "localhost";
$db   = "testvlerart";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("CREATE DATABASE IF NOT EXISTS $db");

    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // users table
    $conn->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )
    ");

    // category table
    $conn->exec("
        CREATE TABLE IF NOT EXISTS category (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL
        )
    ");

    // products table
    $conn->exec("
        CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            category_id INT NOT NULL,
            FOREIGN KEY (category_id) REFERENCES category(id)
        )
    ");

    // Insert categories ONLY if empty
    $conn->exec("
        INSERT INTO category (name)
        SELECT * FROM (
            SELECT 'Fruta'
            UNION SELECT 'Bakery'
            UNION SELECT 'Fast Food'
        ) AS tmp
        WHERE NOT EXISTS (SELECT * FROM category)
    ");

    // Insert products ONLY if empty
    $conn->exec("
        INSERT INTO products (name, category_id)
        SELECT * FROM (
            SELECT 'Apple', 1
            UNION SELECT 'Banana', 1
            UNION SELECT 'Bread', 2
            UNION SELECT 'Croissant', 2
            UNION SELECT 'Burger', 3
            UNION SELECT 'Pizza', 3
        ) AS tmp
        WHERE NOT EXISTS (SELECT * FROM products)
    ");

    echo "Database, tables, and data created successfully.";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>