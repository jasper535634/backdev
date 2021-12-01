<?php
$x = 75; // {1}
$y = 25; // {2}
 //In een functie mag ik geen variable gebruiken die buiten een functie is gedifinieerd
 //tenzij je ze de $globals functie gebruikt. 
 //buiten deze functie kan je z oproepen omdat je hem {3}
 //hier onder in de functie heb gezet {0}
function addition() {
  $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
  // {0}              //{1}         //{2}
}
 
addition();
echo $z;
// {3}
?>

<br>

<?php
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
?>