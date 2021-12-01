<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="./Media/styles200.css">



<!-- met de float left kan je de list naast elkaar krijgen  in de external style200.
for each denk dan aan een array
ccss-->


<ul>
<li>

<?php
$menu = array ("Home"=>"php_home.php", 
              "News"=>"php_news.php", 
			  "Contact"=>"php_contact.php",  
			  "About"=> "php_about.php",
			 "Menutje"=> "php_menutje.php");
			// dit is de nieuwe balk item die je toevoegdt in je navigatie bar "Nieuwe"=>  "php_home.php"); //

foreach ($menu as $key => $value) {
	echo "<li><a href='$value'>$key</a></li>";
    
}





?>
</li>
</u>
