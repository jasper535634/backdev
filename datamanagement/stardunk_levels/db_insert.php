<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stardunk_levels";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO products (product_type_code, supplier_id, product_name, product_price, other_product_details)
  VALUES (:product_type_code, :supplier_id, :product_name, :product_price, :other_product_details)");
  $stmt->bindParam(':product_type_code', $product_type_code);
  $stmt->bindParam(':supplier_id', $supplier_id);
  $stmt->bindParam(':product_name', $product_name);
  $stmt->bindParam(':product_price', $product_price);
  $stmt->bindParam(':other_product_details', $other_product_details);

  // insert a row
  $product_type_code = "1";
  $supplier_id = "1";
  $product_name = "Sprinkled";
  $product_price = "1.29";
  $other_product_details = "1 pc.";
  $stmt->execute();

  // insert another row
  $product_type_code = "1";
  $supplier_id = "1";
  $product_name = "Chocolate";
  $product_price = "1.49";
  $other_product_details = "1 pc.";
  $stmt->execute();

  // insert another row
  $product_type_code = "1";
  $supplier_id = "1";
  $product_name = "Maple";
  $product_price = "1.49";
  $other_product_details = "1 pc.";
  $stmt->execute();

   // insert another row
   $product_type_code = "2";
   $supplier_id = "2";
   $product_name = "Dunkaccino";
   $product_price = "1.69";
   $other_product_details = "Small";
   $stmt->execute();

    // insert another row
  $product_type_code = "3";
  $supplier_id = "3";
  $product_name = "Steak Long jim";
  $product_price = "2.29";
  $other_product_details = "Steak Wrap";
  $stmt->execute();

  echo "New records created successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>