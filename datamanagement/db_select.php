<html>
  <body>
    <pre>
<?php
include "../flexlayout/model/display.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDBPDO";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
var_dump($result);
var_dump($stmt->fetchAll());
  foreach($stmt->fetchAll() as $k =>$v){
echo "key" . $k . "=>";
var_dump($v);

  };

}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;

?>
</pre>
  <body>
</html>
