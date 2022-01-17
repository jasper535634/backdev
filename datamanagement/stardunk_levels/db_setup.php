<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stardunk_levels";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // sql to create table
    $sql = "CREATE TABLE products (
    product_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_type_code INT(30) NOT NULL,
    supplier_id INT(30) NOT NULL,
    product_name VARCHAR(50),
    product_price DECIMAL(10,2),
    other_product_details VARCHAR(50)
    )";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table MyGuests created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }

$conn->close();
?>