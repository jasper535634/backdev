<link rel="stylesheet" href="./Media/stardunk.css">
<form action="lvl1_db_fms.php" method="post">
    <input type="submit" name="submit" value="Create New Product">
</form>

<?php
include "lvl1_db_functions.php";


echo "<table style='border: solid 1px black;'>";
echo "<tr><th>product_id</th><th>product_type_code</th><th>supplier_id</th><th>product_name</th><th>product_price</th><th>other_product_details</th></tr>";



echo createTable(readData("SELECT * FROM products LIMIT 10","localhost","stardunk_levels","root",""),"");
// class TableRows extends RecursiveIteratorIterator
// {
//     function __construct($it)
//     {
//         parent::__construct($it, self::LEAVES_ONLY);
//     }
//     function current()
//     {
//         return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
//     }
//     function beginChildren()
//     {
//         echo "<tr>";
//     }

//     function endChildren()
//     {
//         echo "</tr>" . "\n";
//     }
// }

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "stardunk_levels";

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $stmt = $conn->prepare("SELECT product_id, product_type_code, supplier_id, product_name, product_price, other_product_details FROM products");
//     $stmt->execute();

//     // set the resulting array to associative
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
//         echo $v;
//     }
// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }
// $conn = null;
echo "</table>";

?>