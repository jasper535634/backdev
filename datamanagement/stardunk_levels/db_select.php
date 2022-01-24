<link rel="stylesheet" href="../../flexlayout/media/styles0010.css">
    <pre>
<?php
include "../../flexlayout/model/display.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stardunk_levels";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT product_price, product_name FROM products WHERE product_name='Maple' ");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$res=$stmt->fetchAll();
$name=$res[0]['product_name'];
$price=$res[0]['product_price'];
$img="https://via.placeholder.com/150";

echo createTable($stmt->fetchAll(),"");
echo createCard($name,"$img","$price");


  

}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;

?>
</pre>