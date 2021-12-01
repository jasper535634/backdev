

<?php
$bestand2 = fopen("webdictionary.txt", "r") or die ("Kan het niet openen");
echo fread($bestand2,filesize("webdictionary.txt"));
fclose($bestand2);
?>

<hr>

<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
?><?php
$myfile = fopen("testfile.txt", "w")

?>


<?php 
// maak een txt bestand en schrijf erin, als dat niet lukt geef dan deze error code
$filehandle= fopen("test10.txt", "w") or die ("Het is niet gelukt!");

// maak de text in een varibale
$text = "Ik ben cool";

//schrijf in het bestand dat je gemaakt heb de text erin.
fwrite($filehandle, $text);

// sluit dat bestand dan
fclose($filehandle);
?>

<hr>
<form method= "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label for="bestandsnaam">Bestandsnaam:</label><br>
<input type="text" name="bestandsnaam"></input><br>

<label for="errormessage">errormessage:</label><br>
<input type="text" name="errormessage"></input><br>

<label for="inhoudtext">Inhoud-Text:</labek><br>
<input type="text" name="inhoudtext"></input.<br>

<input type="submit" name="submit" value="Verzenden">


</form>

<?php
function createTextFile() { if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $bestand     = ($_POST["bestandsnaam"]);
    $erromessage = ($_POST["errormessage"]);
    $textinhoud  = ($_POST["inhoudtext"]);

    $bestandsnaam = fopen($bestand,"w") or die ($erromessage);
    //$output = fread($bestandsnaam,filesize($bestand));
    $resultaat = fwrite($bestandsnaam, $textinhoud);
    if ($resultaat >= 0) {
        $msg= "Bestand is gemaakt";
    }else {
        $msg ="Bestand maken is niet gelukt";
    }
    fclose($bestandsnaam);
    return $msg;
    };
}


?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $knop= ($_POST["submit"]);

    switch ($knop) {
case "Verzenden":
    createTextFile();
    break;

    default:
    echo "Het is niet gelukt";
    }
}
?>



