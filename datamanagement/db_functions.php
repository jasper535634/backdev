<?php
function readData($sql){
    try {
        $conn = connectDB("localhost","myDBPDO","root","");
        var_dump($conn);
        $stmt = $conn->prepare($sql);
        $stmt->execute();
      
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      //var_dump($stmt->fetchAll());
      //   foreach($stmt->fetchAll() as $k =>$v){
      // echo "key" . $k . "=>";
      echo createTable($stmt->fetchAll(),"");
        
      
      }catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;



}




function connectDB($servername, $dbname, $username, $password){
$connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $conn;
}



readData("SELECT id, firstname, lastname FROM MyGuests");
?>

