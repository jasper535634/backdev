<head>
<link rel="stylesheet" href="./Media/styles006.css">   
</head>    
<html>
<body>


<?php

//hier maak ik de variables die worden uitgeput als er in die input velden niks word ingevuld
// de error variables eindigen met Err, die maak ik hier zodat de if else functie weet welke variables hij moet gebruiken en deze variables,
// houden de error codes inzich
$naamErr = $emailErr = $VasteklantErr = $websiteErr = "";
$naam = $email = $Vasteklant = $opmerking = $website ="";





// deze $_SERVER variable is een globale variable die je altijd kunt gebruiken in php
// hier staat als de server variable de request die pakt de request method post om de pagina te wergeven
// controleer of deze server method data is opgehaald is door de POST methode
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //deze if else statement voeg ik hier toe voor elke $_POST variable, deze controleert dan of de $_POST/ogehaalde info variable leeg is met de php functie empty()
  //uitleg over hier onder
  //als de  opgehaalde informatie van de input"[naam]"balk leeg is 
  if (empty($_POST["naam"])) {
    //geef dan deze $naamErr variable aan met "Uw naam is verplicht"
    // en als de ["naam"]
    $naamErr = "Uw Naam is verplicht";
  } else {
    $name = test_input($_POST["naam"]);
  }
   

   if (empty($_POST["email"])) { 
     $emailErr = "Uw Email adress is verplicht";
   } else {
     $email = test_input($_POST["email"]);
     
   }

  if (empty($_POST["leeftijd"])) {
    $leeftijd = "";
  } else {
    $opmerking = test_input($_POST["opmerking"]);
  }

  if (empty($_POST["Vasteklant"])) {
    $VasteklantErr = "Kies een van de twee opties";
  } else {
    $Vasteklant = test_input($_POST["Vasteklant"]);
  }



}





// dit is de php test_input functie en dit doet die wanner je, je de test_ipunt functie gebruikt
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>




<h1> Recentie Blad van Millies Corner</h1>
<br>

<p>*Verplichte Velden</p><br>

<!-- Dit is de html code voor de form wanner de informatie word verstuurd zal hij de post methode gebruiken, en wanner er speciale karakters
in de code form gebruikt word zal hij die verwijderen met de echo htmlspecialchars, de PHP_SELF is een super global varianle dat de form terug stuurt naar deze script
de $_SERVER betekent dat deze form naar zichzelf word gestuurd--> 
<form method="post" action=""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

<!-- Hier maak ik een velde genaamt naam, met daar onder de input die een balkje maakt waar de naam in moet komen staan -->
<!-- de atritube de name van de input          -->
<label for="name">Naam:</label><br>    
<input type="text" name="naam" value="<?php echo $naam;?>">
<span class="error">* <?php echo $naamErr;?></span><br>

<label for="name">Email:</label><br>
<input type="text" name="email" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span><br>
<!-- deze code hier boven maakt het input veldje van email verplicht om intevullen anders komt er een error met dit veld is verplicht om in te vullen -->
<br>

<label for="name">Leeftijd:</label><br>
<input type="text" name="leeftijd"><br>


<br>                                 
<!--                                  dit is de attrribute -->
Opmerking: <textarea name="opmerking" rows="5" cols="40"></textarea><br><br>

<! -- deze label geeft de naam aan voor de title stukje week -->
<label for="week">Datum van besteldag:</label><br>
  <input type="week"><br><br>

 <!-- dit hier onder is een radio button die waar je uit kan kiezen of je een vaste klant bent of niet -->
 <label for="name">Vasteklant:</label><br>
<input type="radio" name="VasteKlant" value="Ja">Ja
<input type="radio" name="Vasteklant" value="Nee">Nee
<span class="error"> <p1>* </p1> <?php echo $VasteklantErr;?></span>

 


<br>
<input type="Submit">
<! -- Deze code staat voor het knopje versturen -->



</form>

</body>
</html>


