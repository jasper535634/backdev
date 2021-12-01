<?php 
$x = 6;

do {
  echo "The number is: $x <br>";
  $x++;
} while ($x <= 5);
?>

<hr>

//comment hier word een//

<?php
for ($x= 0; $x <= 10; $x++) {
 echo "De nummer is: $x <br>";
}
?>
  
<hr>

<html>
    <head>
        <link rel="stylesheet" href="media/styles_000.css">
    
</head>
<body>

<h2>Producten tellen</h2>
<table>
  <tr>
    <th>product_id</th>
    <th>product_type_code</th>
    <th>supplier_id</th>
    <th>product_name</th>
    <th>product_price</th>
    <th>other_product_details</th>
    <th>actions</th>
  </tr>
<tr>

<?php
for ($x = 0; $x <= 6; $x++) {
  echo "<tr> 
    <td>$x</td>
    <td>$x</td>
    <td>$x</td>
    <td>$x</td>
  </tr>";
}
?>




</body>
</html>


