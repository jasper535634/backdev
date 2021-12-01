<html>
<body>

<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  Name: <input type="text" name="lastname">
  Name: <input type="text" name="secondname">
  Name: <input type="text" name="ggname">
  <input type="submit">
 
</form>

<?php
// door de [PHP self] stuurt de echo zijn tekst terug naar zichzelf
// zijn eigen bestand
// als je de code vannaf Name: tot  pakt en en opnieuw copy
// dan maak je nieuwe tabs waar je iets in kan vullen
//
// De manier van de "post" method, laat php niet zien hoe dat gebeurd op je html
// daar kan je ook "GET" voor maken, alsje dan wat invult in de balkjes, dan
// zet hij al die dingen in je url

//Google maakt gebruik van de "GET" methode en als je dan wat intypt in de search bar
// dan voegt hij dat toe achter je url 

//Bij een inlog formulier moet je geen gebruik maken van de "GET" methode anders komen 
// dingen zoals wachtwoorden boven in je url te staan
?>

<?php

echo "<pre>";
var_Dump($_REQUEST);
echo "</pre>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect de value of input field  
  // als de server request method post is
  // dan moet die deze if in gaan  
  $name = $_REQUEST['fname'];
  $name = $_REQUEST['lastname'];
  $name = $_REQUEST['secondname'];
  $name = $_REQUEST['ggname'];
  //hier maak je een variable en de gegevens die je in
  //fname typt komen ze hier dan
  //deze $_request is een array door die block haakjes

  if (empty($name)) {
  // als hij leeg is zeg dan "Name is empty"
  //  en anders de $name    
    echo "Name is empty";
  } else {
    echo $name;
  }
}



?>

</body>
</html>