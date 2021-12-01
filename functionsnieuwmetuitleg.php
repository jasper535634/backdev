

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
     //var_dump($_POST); 

// welke knop is er gebruikt.
$knop = print_r($_POST['submit']);

// actie uitvoeren is controleer of bestandsnaam is ingevuld
if (empty($_POST["bestandsnaam"])) {
    echo "Uw heeft niks als bestandsnaam ingevuld";
}
//de variable die we hier in gooien is een condition,
switch ($knop) {

case "Create";
    //actie uitvoeren
    if (empty($_POST['foutmelding'])){
        echo "Niks is ingevuld";
}
    creatFile($_POST['bestandsnaam'], $_POST["foutmelding"], $_POST['inhoud']);
break;

    case "Delete";
        //actie uitvoeren
        echo "Delete  is gekozen";
    break;

case "Update";
//actie uit voeren
if (empty($_POST['bestandsnaam'])) {
echo "Er is niks ingevuld";
}

updateFile($_POST['bestandsnaam'], 'het lukt niet');


break;

    case "Read";
        // actie uitvoeren
        echo readMyfile($_POST['bestandsnaam'], "is niet gelukt");
        // readMyFile($_POST['bestandsnaam'], $_POST["foutmelding"], $_POST['inhoud']);
    break;

default:
    echo "Geen van de knoppen is geknopt";
    deleteFile($_POST['bestandsnaam']);	
}


// terug melden actie is gedrukt
//controle of velden gevult zijn.
if(empty($_POST["bestandsnaam"])){
if(empty($_POST["foutmelding"])){
if(empty($_POST["inhoud"])){
echo 'veld niet gevuld';
        }
    }
}
};





function updateFile($filename, $errormessage){
    $html = "<form method=\"post\"action=\"functions.php\">";
    $content = readMyfile($filename, $errormessage);
    $html .= "bestandsnaam: <input type=\"text\" id=\"bestandsnaam\" name=\"bestandsnaam\" value=\"".$filename."\" readonly><br><br>";
    $html .= "Errormelding: <input type=\"text\" name=\"foutmelding\"><br><br>";
    $html .= "inhoud: <textarea name=\"inhoud\" rows=\"5\" cols=\"40\">".$content."</textarea>";
    $html .= "<input type=\"submit\"name=\"submit\"value=\"Create\">";
    $html .= "</form>";
    return $html;
 
}



    function creatFile($filename, $errormessage, $text){
        if(empty($filename)){
        }else{
        $filehandle = fopen($filename, "w") or die ($errormessage);

         $result = fwrite($filehandle, $text);
         if ($result >= 0) {
            $msg= "Bestand is gemaakt";
        }else {
            $msg = "Bestand maken is niet gelukt";
        }
        // sluiten bestand
        fclose($filehandle);
        // return
        return$msg;
        }
      };




    function readMyFile ($filename,$errormessage){
        //
        if(empty($filename)){
        }else{
        //pak bestand vast
        $filehandle = fopen($filename, "r") or die($errormessage);
        //leest bestand en onthou het
        $output= fread($filehandle,filesize($filename));
        //laat bestand los
        fclose($filehandle);
        //geef inhoud af
        return $output;
        }
    };

    //textfile wegschrijven
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo creatFile($_POST["bestandsnaam"],$_POST["foutmelding"],$_POST["inhoud"]);
    //controleer of file bestaat
    echo readMyFile($_POST["bestandsnaam"],$_POST["foutmelding"]);
    }
    ?>
   


    <?php
function deleteFile($bestandsnaam){
    //code
    //verwijderen bestand
    //laten weten of gelukt it
   $result =  unlink($bestandsnaam);

   echo "Resultaat: " .$result. "<br/>";

    if ( $result == 1){
        $msg = "Bestand verwijderd";
    }else {
        $msg = "Bestand verwijderen is gelukt";
    }
    return $msg;
};
?>

