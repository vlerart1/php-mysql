<?php
$host='localhost';
$db='challange';
$user='root';
$pass='';

try{

$conn=new PDO("mysql:host=$host",$user,$pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$conn->exec("CREATE DATABASE IF NOT EXISTS $db");

$conn=new PDO("mysql:host=$host;dbname=$db",$user,$pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$conn->exec("CREATE TABLE IF NOT EXISTS categories(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100)
)");

$conn->exec("CREATE TABLE IF NOT EXISTS products(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
price DECIMAL(10,2),
category_id INT,
FOREIGN KEY(category_id) REFERENCES categories(id)
)");

$conn->exec("INSERT IGNORE INTO categories(name) VALUES
('Electronics'),('Clothing'),('Books')");

$conn->exec("DELETE FROM products");$conn->exec("INSERT INTO products(name,price,category_id) VALUES('Laptop',900,1),('Phone',800,1),('Tablet',400,1),('Headphones',90,1),('Keyboard',30,1),('Mouse',20,1),('T-shirt',20,2),('Jeans',40,2),('Shoes',70,2),('Hat',15,2),('Book1',25,3),('Book2',35,3),('Book3',45,3),('Book4',20,3),('Book5',30,3)");

$stmt=$conn->query("
SELECT p.id,p.name,p.price,c.name AS category
FROM products p
JOIN categories c ON p.category_id=c.id
ORDER BY p.id
");

$products=$stmt->fetchAll(PDO::FETCH_ASSOC);

echo "
<style>

body{
font-family: 'Segoe UI', Arial;
background: linear-gradient(135deg,#eef2f7,#d9e4f5);
padding:30px;
}

h2{
text-align:center;
color:#2c3e50;
margin-bottom:25px;
}

.table-container{
overflow-x:auto;
}

table{
border-collapse:collapse;
width:100%;
background:white;
border-radius:10px;
overflow:hidden;
box-shadow:0 6px 18px rgba(0,0,0,0.15);
}

th,td{
padding:12px;
text-align:center;
border:1px solid #ddd;
}

th{
background:#34495e;
color:white;
font-weight:600;
}

tr:nth-child(even){
background:#f7f9fc;
}

tr:hover{
background:#e6f0ff;
transition:0.3s;
}

td:first-child{
font-weight:bold;
background:#fafafa;
}

</style>
";

echo "<h2>Products Table - Vertical View</h2>";
echo "<div class='table-container'>";
echo "<table>";

foreach($products as $p){echo "<tr><th>".$p['name']."</th><td>ID: ".$p['id']."</td><td>Price: $".$p['price']."</td><td>".$p['category']."</td></tr>";}

echo "</table>";
echo "</div>";

}catch(PDOException $e){
echo "Error: ".$e->getMessage();
}
$conn->exec("DELETE FROM products WHERE id > 15");
?>