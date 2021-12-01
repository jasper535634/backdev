<?php

//zelf gemaakte function//

function printDate() {
	echo "De dag van vandaag is:";
	echo date("1")     . "<br>";
    }
	
	printDate();
	?>
	
	<?php
	
	//Initinaliseren van een variable//
	$moneybag = "Curentbalance is 90 Euro";
	
	echo $moneybag;
	echo "<br>";
	
	?>
	
	

	
	
	<?php
	
	// een variable met een uitkomst bij elkaar opge telt //
	
	
	$m = 5;
	$y = 6;
	
	echo $m + $y;
	
	?>
	
	
	<?php
	
// hier ga ik een waarde in een function doen en laten zien hoe een global //
//local scope werkt //

	function scopetest() {
		$x = 10; //dit is een locale scope
		echo "<p> Variable x binnen de functie is: $x</p>";	
	}
	
	scopetest();
	
	//nu wanner ik de variable wil laten zien terwijl //
	 // die geen global scope is krijgt die een error //
	
	
	echo "<p> Variable x buiten de functie is: $x </p>";
	
	?>
	
	
<?php
$waggienamen =  array("bmw",  "paarse bmw", "gele bmw",);
foreach ($waggienamen as $value) {
  echo "$value <br>";
}
?>	


<?php
/*
	<?php
	
	// de arrays for each loop
	
	$naam = array("waggie", "beemer", "klaas");
	
	
	foreach (naam as $value) {
		echo "$value <br>";
	}
	?>
	
*/


	?>
	