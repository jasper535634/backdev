

<link rel="stylesheet" href="./Media/navigatiebalksite.css">



<ul>
<?php

//hier maak ik een navigatie balk met een for each loop die door de cookies
// lolly en cake kan gaan, maar als je dan op home pagina drukt 
// kan je niet naar de home pagina van de site zonder de andere'
// values aan te tasten.

$homepagina = array ("HomePagina"=>"php_layout.php"); 
$navigatiebalk = array("Cookies"=>"cookies.php", "Cake"=>"cake.php", "Lolly"=>"lolly.php");


foreach ($homepagina as $key => $value) {
    echo "<li><a href=.\php_layout.php [0] =>$key </a></li>";
        
    }

foreach ($navigatiebalk as $x => $value) {
   //echo "<li><a href=.\php_layout.php [0] =>$x </a></li>";
    echo "<li><a href=./Sites/$value =>$x </a></li>";
}



?>
</ul>


            <br>


<ul>
    <?php
// hier maak ik van mijn code een functie dus dan hoef ik deze functie alleen op te roepen als ik mijn navigatie balk wil
// laten zien    

function NavigatieBalk()   {

//hier maak ik een navigatie balk met een for each loop die door de cookies
// lolly en cake kan gaan, maar als je dan op home pagina drukt 
// kan je niet naar de home pagina van de site zonder de andere'
// values aan te tasten.

$homepagina = array ("HomePagina"=>"php_layout.php"); 
$navigatiebalk = array("Cookies"=>"cookies.php", "Cake"=>"cake.php", "Lolly"=>"lolly.php");


foreach ($homepagina as $key => $value) {
    echo "<li><a href=.\php_layout.php [0] =>$key </a></li>";
        
    }

foreach ($navigatiebalk as $x => $value) {
   //echo "<li><a href=.\php_layout.php [0] =>$x </a></li>";
    echo "<li><a href=./Sites/$value =>$x </a></li>";
}

};


NavigatieBalk();

            ?>


















