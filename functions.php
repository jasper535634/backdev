<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST['bestandnaam'])){
        echo "Er is niks ingevoerd";
}


$knop = $_POST["submit"];
    switch ($knop){
        case "Create":
        echo createFile($_POST['bestandnaam'],$_POST['foutmelding'],$_POST['inhoud']);
        break;

        case "Read":
        echo  readMyFile($_POST['bestandnaam'],$_POST['foutmelding']);
        break;

        case "Update":
        echo  updateFile($_POST['bestandnaam'],$_POST['foutmelding'], $_POST['inhoud']);
        break;

        default:
        echo "Er is niks ingevuld in de velden";
    } 

}


function createFile($filename,$erromessage, $text){
    $filehandle =fopen($filename, "w") or die ($erromessage);
  $result = fwrite($filehandle, $text);
  if ($result >= 0){
      $msg = "Bestand is gemaakt";
  }else {
      $msg = "Bestand maken is mislukt";
  }
    fclose($filehandle);
    return $msg;
}


function readMyFile($filename,$erromessage){
    $filehandle =fopen($filename, "r")or die($erromessage);
    $output =fread($filehandle,filesize($filename));
    fclose($filehandle);
    return $output; 
}


function updateFile($filename, $erromessage, $text){
$html = "<form method=\"post\" action=\"functions.php\">";
$content = readMyfile($filename, $erromessage);
$html .= "bestandnaam:<br> <input class=\"disabled\" type=\"text\" name=\"bestandnaam\" value=\"".$filename."\" readonly > <br>"; 
$html .= "foutmelding:<br> <input type=\"text\"  name=\"foutmelding\" > <br>";
$html .= "Inhoud:<br> <input type=\"text\"  name=\"inhoud\"> ".$content."<br>";
$html .= "<input type=\"submit\" name=\"submit\" value=\"Update\"> <br>";
$html .= "</form>";
return $html;
}

?>