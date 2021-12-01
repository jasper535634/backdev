<?php

function getaal() { $getaal ="0";

switch ($getaal) {
case "10":
    echo "Het getaal is 10";
    break;
case "20":
    echo "Het getaal is 20";
    break;
case "30":
    echo "Het getaal is 30";    
    break;
default:
echo "Het gekozen getaal is niet 30, 20, of 10";

}
};

getaal();


?>

<br>


<?php

function getaalOproepen () {$getaal =("99");

if ($getaal <= "10") {
    echo "Het ingevulde getaal is kleiner of gelijk aan 10";
} elseif ($getaal <= "20") {
    echo "Het ingevulde getaal is kleiner of gelijk aan 20";
} elseif ($getaal <= "30") {
    echo "Het ingevulde getaal is kleiner of gelijk aan 30";
  }else{
    echo "Uw heeft een getal ingevuld die groter is dan 10, 20, of 30";       
}
}
   
getaalOproepen();

?>

<br>

