<?php
$colors = array("red", "green", "blue", "yellow");

print_r ($colors);

foreach ($colors as $value) {
  echo "$value <br>";
}
?>


<?php
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach($age as $key => $value) {
  echo "$key = $value<br>";
}
?>


<?php
function familyName($fname, $year) {
  echo "$fname Refsnes. Born in $year <br>";
  echo "year is absolutely fantastic unless your names $fname. <br>";
}

familyName("Hege", "1975");
familyName("Stale", "1978");
familyName("Kai Jim", "1983");
?>

<?php
//een comment
?>

<?php
//$fame is een paramater en $year is ook een parameter
//call en functies maakt het niet uit met de paramters
//deze function is gemaakt en gaat zo. $fname is  bijv "Hege" en $year en is "1975"//
?>
