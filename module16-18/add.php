<?php


    $host = "localhost";
    $db = "movie";
    $user = "root";
    $pass = "";

    $sql = "CREATE TABLE users (
    id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    confirm_password VARCHAR(255) NOT NULL
);

CREATE TABLE movies (
    id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    m_name VARCHAR(255) NOT NULL,
    m_desc VARCHAR(255) NOT NULL,
    m_category VARCHAR(255) NOT NULL,
    m_year VARCHAR(255) NOT NULL
);

CREATE TABLE bookings (
    id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT(20) NOT NULL,
    movie_id INT(20) NOT NULL,
    nr_tickets INT(20) NOT NULL,
    date VARCHAR(255) NOT NULL,
    time VARCHAR(255) NOT NULL
);";


    $insertUser = "INSERT INTO users (name, surname, username, email, password, confirm_password) VALUES ('Dalmat', 'Ademi', 'fati', 'dalmat@example.com', 'password123', 'password123')";
    $insertUser = "INSERT INTO users (name, surname, username, email, password, confirm_password) VALUES ('Jon', 'Dallku', 'BAXHA14', 'joni@example.com', 'password123', 'password123')";

    $insertMovie = "INSERT INTO movies (m_name, m_desc, m_category, m_year) VALUES ('Inception', 'Amazing movie', 'Action', '2010')";
    $insertMovie = "INSERT INTO movies (m_name, m_desc, m_category, m_year) VALUES ('The Shawshank Redemption', 'Great movie', 'Drama', '1994')";
    
    $insertBooking = "INSERT INTO bookings (user_id, movie_id, nr_tickets, date, time) VALUES (1, 1, 2, '2023-06-06', '12:00:00')";
    $insertBooking = "INSERT INTO bookings (user_id, movie_id, nr_tickets, date, time) VALUES (2, 2, 3, '2023-06-07', '13:00:00')";

    try{
        $conn = new PDO("mysql:host=$host; dbname=$db", $user, $pass);

        $conn->exec($sql);

        $conn->exec($insertUser);
        $conn->exec($insertMovie);
        $conn->exec($insertBooking);


        echo("Table created");
        
    }catch(PDOException $e){


        echo("Table not created: " . $e->getMessage());


    }
?>