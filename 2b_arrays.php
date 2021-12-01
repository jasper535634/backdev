<?php
//Hier zet je een multi dimentionale array//
?>


	<link rel="stylesheet" href="./Media/styles_001.css">
<?php



$cars = array (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
);

echo "<pre>";
var_dump($cars);
echo "</pre>";

?>

<?php
//op deze manier kan je door bepaalde arrays lopen met deze code hier onder//

?>


<?php
echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";

?>


<table>
<?php








for ($row = 0; $row < 4; $row++) {
  echo "<table><tr><td><p><b>Row number $row</b></p></table></td></tr>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo"<liv>", "<table><tr><tr><td>".$cars[$row][$col]. "</table></tr></tr></td>","</liv>"; 
}

  echo "</ul>";
}







?>
</table>