<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<label for="bestandsnaam">BestandsNaam:</label><br>
<input type="text" name="bestandsnaam"></input><br>

<label for="errormessage">errormessage:</label><br>
<input type="text" name="errormessage"></input><br>

<label for="inhoudtext">inhoud-text:</label><br>
<input type="text" name="inhoudtext"></input><br>


<input type="submit" name="submit" Value="Create"></input>
<input type="submit" name="submit" Value="Read"></input>

</form>


<?php
 



 function maakBestand($bestandsnaam,$errormessage,$text) { 
     $bestand = fopen($bestandsnaam, "w") or die ($errormessage);
     $bestandsnaam = fwrite($bestand, $text);
     fclose($bestand);
 };


function readTextfile($bestandsnaam,$errormessage){
    $bestand= fopen($bestandsnaam, "r") or die ($errormessage);
    $output = fread($bestand,filesize($bestandsnaam));
    fclose($bestand);
    return $output;
}; 







?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 

 $knop =  ($_POST['submit']);


 switch ($knop) {
    case "Create";
    if (empty($_POST['bestandsnaam'])) {
       echo "er is niks ingevuld";
    }
     maakBestand($_POST["bestandsnaam"], $_POST["errormessage"], $_POST["inhoudtext"]);
   break;

    case "Read" ;
       readTextfile($_POST["bestandsnaam"],$_POST["errormessage"]); 
       break;

    default:
    echo "Het is niet gelukt";
 }
};
?>