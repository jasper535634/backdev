<?php
function myTest() {
   static $x = 0;
  echo $x;
  $x++;
}

myTest();
echo "<br>";
myTest();
echo "<br>";
myTest();
?> 

<br>

<?php
$x = 5985;
var_dump($x);
?>
<br>

<?php
$x = 10.365;
var_dump($x);
?>
<br>

<?php
$cars = array("Volvo","BMW","Toyota");
var_dump($cars); 
echo "<br>";
echo $cars[0],$cars[1],$cars[2];

?>

<?php  
$x = 0;
 
while($x <= 100) {
  echo "The number is: $x <br>";
  $x+=10;
}
?> 