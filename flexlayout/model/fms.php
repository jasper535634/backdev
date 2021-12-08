<?php
function createFile($filename,$erromessage, $text,$modus){
    $filehandle =fopen($filename, "$modus") or die ($erromessage);
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
  $html = "<form method=\"post\" action=\"function.php\">";
  $content = readMyfile($filename, $erromessage);
  $html .= "bestandnaam:<br> <input class=\"disabled\" type=\"text\" name=\"bestandnaam\" value=\"".$filename."\" readonly > <br>"; 
  $html .= "foutmelding:<br> <input type=\"text\"  name=\"foutmelding\" > <br>";
  $html .= "Inhoud:<br> <input type=\"text\"  name=\"inhoud\"> ".$content."<br>";
  $html .= "<input type=\"submit\" name=\"submit\" value=\"Update\"> <br>";
  $html .= "</form>";
  return $html;
}


function deleteFile($filename){
    $result = unlink($filename);
    if ($result == 1 ){
        $msg= "bestand verwijderd";
    }else{
        $msg= "kan bestand niet verwijderen";
    }
    return $msg;
}
// maak een assignment functi
function createAssignment(){

    //gegevens uit de form ophalen
    $kop = $_POST["kop"];
    $beschrijving = $_POST ["beschrijving"];
    $programeertaal = $_POST["programeertaal"];
    $afbeelding = $_FILES["fileToUpload"]["tmp_name"];
    /*
      echo "<pre>";
      var_dump($_REQUEST);
      var_dump($_FILES);
      echo "</pre>";
    */
  
    $afbeeldingmap = "Media/";
    $afbeelding = $afbeeldingmap . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($afbeelding,PATHINFO_EXTENSION));
  
    //check of er een afbeelding er goed is.  
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  
    //verplaatsen van de afbeelding naar de media map
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $afbeelding)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  
    // de r staart voor return en de (n) staat voor next line
  
    //samenstellen van de gegevens in een stuk html
    $html = "";
    $html .= "<h1>$kop en datum</h1>\r\n";
    $html .= "<img src=\"$afbeelding\" width=\"150\" height=\"150\">\r\n";
  
    $html .= "<h3>Beschrijving</h3>";
    $html .= "<p>\"$beschrijving\"</p>\r\n";
  
    $html .= "<h4>Programeer Talen</h4>\r\n";
    $html .= "<p>\"$programeertaal\"</p>\r\n";
  
    createFile("alleopdrachten.php", "Bestand maken is mislukt", $html,"a+");
}

function createOpdracht($kop,$beschrijving,$programeertaal){ 
    echo "<h1>Opdracht Maken, Tonen en weergeven</h1>";    
    $html  = "<form class=\"\" method=\"POST\" action=\"function.php\"  enctype=\"multipart/form-data\">";
  
    $html .= "</label for=\"kop\">Kop.</label><br>";
    $html .= "<input type=\"text\" name=\"kop\" value=\"$kop\" readonly ></input><br>";
  
    $html .= "</label for=\"afbeelding\">afbeelding.</label><br>";
    $html .= "<input type=\"file\" name=\"fileToUpload\" readonly ><br>";
  
    $html .= "</label for=\"beschrijving\">beschrijving.</label><br>";
    $html .= "<textarea for=\"beschrijving\" name=\"beschrijving\"  value=\"$beschrijving\" rows=\"5\" cols=\"50\" readonly ></textarea><br>";
  
    $html .= "</label for=\"ProgrameerTalen\">Programeer Talen.</label><br>";
    $html .= "<textarea for=\"programeertaal\" name=\"programeertaal\" value=\"$programeertaal\" rows=\"5\" cols=\"50\" readonly ></textarea><br>";
    $html .= "</form>";
    //echo createOpdrachtForm(,$erromessage);
    return $html;
  }
?>