
<link rel="stylesheet" href="./Media/styles004.css">

<pre>
<?php
$cars = array (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
);
  
// als je echo $echo[0]  doet kan je geen strings printen krijg je de 
// error array to string conversion
// hij laat de eerste array in de array zien dat is de getal in de [] haakjes.
// dus als als je bij de 2e array wilt komen dan doe je [2]

//dus als je print_r($cars[0][1])
//dan krijg je de 22, van de eerste array
//array telt vannaf 0 drm.

// als je een value uit een array haalt
//dan kan je de echo gebruiken om hem te laten zien
// vb echo($cars[0][1]); 

// als jij door de array met saab door heen wilt gaan
// en je saab 5 wilt laten zien doe je het zo  
//doe je echo($cars[2][1]); 

 
print_r($cars[0]); 
echo($cars[0][1]); 


 
echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";
?>

</pre>



<table>
<tr>
<th>Merk</th>
<th>Voorad</th>
<th>Verkocht</th>
</tr>

<?php
$entries = array (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
);

function createTable($entries){
	for ($row = 0; $row < 4; $row++) {
	 
	  echo "<tr>"; 
	  for ($col = 0; $col < 3; $col++) {
	  echo "<td>".$entries[$row][$col]."</td>";
	  }
	  
	  echo "</tr>";
      }
};


createTable($entries);


//om een table te maken van deze array zet je buiten de php code
//table en </table
//daarna
// verander je de  echo "<ul>"; naar "<tr>" 
// eindstand sluit je  de tr row af bij de laaste 
// echo "</ul>" naar de "</tr>"

// uitleg over deze array
//= is iets assign
// jij hoeft niet 4x de tr te maken
// want deze for loop, die gaat 3x deze code herhalen
// dus hij maakt de table 3x


//om de th te maken zet je ze boven de php code zie 
//hier boven.


// als je $cars stukje veranderd naar $entries kan je het zelfde code
// hergebruiken voor ander code

 

//de echo "<p><b>Row number $row</b></p>";
//dan print hij de rownumber $


//for ($col = 0; $col < 3; $col++) 
// initialiseer de de waarde $col voor 0
// hij gaat eerst 3x iets printen
// en daarna gaat hij pas weer omhoog

	
//echo "<li>".$cars[$row][$col]."</li>";
//
?>
</table>








<?php
//functie is een algorithme in een jasje
//

//1e        condtion    incroment
// de for for ($row = 0; $row < 4;   $row++)
// 1estart counter
// condtion
// incroment of decroment 

//
//stap 1 loop door een array
//schrijf data in de array
// loop door de array
// loop door de array in een array heen


//zie boven we gaan een function maken 

?>


<br>





<?php
$games = array (
array ("GTA V", 05, 18),
array ("Minecraft", 13, 12),
array ("Call of duty", 12, 03),
array ("CSGO", 6, 05),
);

// deze line die maakt een table met de array, $games
function createTable1($games){
	echo "<table>";
	// deze lijn maakt 4 rijen
	for ($row = 0; $row < 4; $row++) {
	 
	  echo "<tr>"; 
	  // deze code maakt 3 collumen en die zijn vertical
	  for ($col = 0; $col < 3; $col++) {
		  //gebruik 2d array zie brackets
	  echo "<td>".$games[$row][$col]."</td>";
	  }
	  
	  echo "</tr>";
      }
	  echo "</table>";
};


createTable1($games);
"<br>"

?>


<?php
// hier boven  hebben we een array gemaakt

// de array heet $games en daar onder maken we gelijk een functie
// de functie die is, createTable1 
// door de echo "<table>" en afsluiter "</table>"
//hoeven we niet meer boven de php table open en table sluiten te doen
//daarna maken we een for loop die zegt= die  maakt 4 rows
// de tweede for loop die maakt 3 cols= collum en cols is vertical 
//


?>



<?php
$list = array (
  array("suiker",22,18),
  array("thezakjes",15,13),
  array("eiren",5,2),
  array("wiet",17,15)
);

function createlist($list){
	for ($row = 0; $row < 4; $row++) {
	 
	  echo "<ul>"; 
	  for ($col = 0; $col < 3; $col++) {
	  echo "<li>".$list[$row][$col]."</li>";
	  }
	  
	  echo "</ul>";
      }
};


createlist($list);
?>

<?php

echo"<br>";

?>

