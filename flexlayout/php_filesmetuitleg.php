<?php
echo readfile("./Media/webdictionary.txt");
?>

<hr>

<?php
$myfile = fopen("./Media/webdictionary.txt", "r") or die("Unable to open file!");
echo $myfile;
echo "<br>";

echo fread($myfile,filesize("./Media/webdictionary.txt"));
fclose($myfile);


//functie maken er zit niet iets hard code in, omdat alles hier in zit is allemaal variables.
// hier intitalieseer de $errormessage aan en onderaan wanenr ik em call zet ik de inhoud in.
function showFileContect ($filename,$errormessage) {
    // pak bestand vast
    $filehandle = fopen($filename, "r") or die($errormessage); 
    // lees bestand en onthoud het ook gelijk
    $output = fread($filehandle,filesize($filename));
    // laat bestand los
    fclose($filehandle);
    // geef de inhoud af
    return $output;
} 


//er word als parameter een filname aangegeven
//dus in de call geef je ook een argument mee
//call de functie
// hier heb de txt file niet afgemaakt en laat hij de error code zie.
echo showFileContect("./Media/webdictionary.txt", "Unable to open file");


?>

<br>

<?php

// stap 1 function maken
// de $filname is een paramter van het bestands naam, de $errormessage is een paramter voor de error message, de $text is een paramter voor de 
// text die je in het nieuwe bestand wilt schrijven

function writeTextFile($filename, $errormessage, $text) {

// stap 2  bestand openen
// stap 3 als die er niet is aanmaken
$filehandle = fopen($filename, "w") or die($errormessage);

// stap 4 tekst ontvangen
// tekst wegschrijven in bestand
fwrite($filehandle, $text);

// stap 5 bestand sluiten
fclose($filehandle);
      return "Gelukt!";  
}

// met deze line dan call ik de functie die ik net hier boven heb gemaakt en geef ik in de 1e paramter 
// waar hij het bestand moet gaan maken, met de 2e paramters de inhoud van de error code, en de 3e paramters is de text wat hij daar in het 
// nieuwe bestand, in moet gaan schrijven 
echo writeTextFile("test.html", "Kan bestand niet plaatsen", "
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>This is a Heading</h1>
<p>This is a paragraph.</p>

</body>
</html>

");
echo "<br>";

// deze code roep ik op van een al eerdere gemaakte function en die leest en laat de content zien van het bestand wat ik aangeef ik
// de 1e paramters, de 2e paramters bevat de error code van wat hij moet zeggen als hij de file content niet kan lezen of vinden.
echo showFileContect("test.html", "Kan hem niet laten zien");
?>

<hr>

<?php
$myfile = fopen("./Media/newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
?>

<hr>

<!-- // maak een form 3 velden.
 dan moet mijn php pagina de writefunctie 
gebruiken om de inhoud van mijn server te zien en dan in die bestand te schrijven.

// hij moet gebruik maken van de write funcite
//maak een invoerveld bestandsnaam
//maak een invoerveld foutmelding
//maak invoervlak inhoud 

//action php_self
    //na verstuur knop
    //controleer/check of form is verzonden
//zo ja writetextfile met vorwaarden callen/uitvoeren
//zo nee, niks doen

$_REQUEST['bestandsnaam'];
$_REQUEST['foutmelding'];
$_REQUEST['inhoud'];

-->

