<?php
// hier mee start ik een sessie
 session_start();

 function controlForm(){
  if (isset($_REQUEST["inlogform"]) && isset($_REQUEST["opdrachtmaken"]) && isset($_REQUEST["crut"])){
      if($_POST["hiddenbestandsnaam"]){
          $bestandsnaam =$_POST["hiddenbestandsnaam"];
      }else{
          $bestandsnaam = $_POST["bestandsnaam"];  
      }
      if(empty($bestandsnaam)){
          $msg = "Vul een bestandsnaam in.";
          return $msg;
      }
  } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

    // hier mee test ik altijd of de gegevens door komen!
      // echo "<pre>";
      // var_dump ($_REQUEST);
      // echo "</pre>";
      // die();
      
      $knop = $_POST["submit"];
      switch($knop){
          case 'Create':
              $msg = createFile($_POST['bestandsnaam'],$_POST['foutmelding'],$_POST['inhoud'],"w");
              break;
              
          case "Read":
              $msg =  readMyFile($_POST['bestandsnaam'],$_POST['foutmelding']);
              break;
          
          case "Update":
              $msg =  updateFile($_POST['bestandsnaam'],$_POST['foutmelding'], $_POST['inhoud']);
              break;
          
          case "Delete":
              $msg = deleteFile($_POST['bestandsnaam']);
              break;
          
          case "CreateAssignment":
              $msg = createAssignment();
              break;
          
          case "Login";
              $msg = checkLogin();
              break;
          
          case "CRUD";
            $msg =showForm();
             break; 
              
          case "Loguit";
            $msg = Loguit();
            break;  
              
          default:
          echo "Er is niks ingevuld in de velden";
          break;    
      }  
      return $msg;
  }else{
    fileManagement();
  }
}


function createList($arr, $nav,)
{
    $html = '<ul class="' . $nav . '">';
    foreach ($arr as $key => $val) {
        $html .="<li><a href='" .$val. "'>" .$key.  "</a></li>";    
    }
    $html .= '</ul>';
    return $html;
}







function createSidebar($arr, $sidebaritems)
{
    $html = '<ul class="' . $sidebaritems . '">';
    foreach ($arr as $key => $val) {
        $html .="<li><a href='" .$val. "'>" .$key.  "</a>";    
    }
    $html .= '</ul>';
    return $html;
}


function createTable($entries, $ftable)
{
    $html ='<table class="' .$ftable. '">';
    foreach ($entries as $entry) {
        $html .="<tr>";
        foreach ($entry as $key => $val) {
            $html .="<td>" .$val. "</td>";
        }
        $html.="</tr>";
    }
    $html.= "</table>";
    return $html;
   }



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



function fileManagement(){
  $path = $_SERVER["PHP_SELF"]; 

    $html = ""; 
    $html .= "<div class=\"filepage\">";
    $html .= "<form action=\"$path\" method=\"POST\">"; 
    $html .= " <h1>File Management System</h1> ";
    $html .= " <input class=\"assignmentbutton\" type=\"submit\" name=\"submit\" value=\"CRUD\"></input> ";
    $html .= " </form> ";
    $html .= " </div> ";
  echo $html;  
}




function showForm($filename = "", $erromessage = "", $inhoud = "", $uit = "")
 {
     $path = $_SERVER['PHP_SELF'];

     $form = <<<EOF
     <form method="post" action="$path">
     <label for="bestandsnaam">Bestandsnaam:<sup>*</sup></label><br/>
     <input type="text" name="bestandsnaam" id="bestandsnaam" value="$filename" $uit><br/>
     <input type="hidden" name="hiddenbestandsnaam" value="$filename">
     <label for="foutmelding">Foutmelding:</label><br/>
     <input type="text" name="foutmelding" id="foutmelding" value="$erromessage"><br/>
     <label for="inhoud">Inhoud:</label><br/>
     <textarea name="inhoud" id="inhoud" placeholder="Vul uw gegevens in...">$inhoud</textarea><br/><br/>
     <input type="submit" class="assignmentbutton" name="submit" value="Delete" $uit>  
     <input type="submit" class="assignmentbutton" name="submit" value="Update" $uit>  
     <input type="submit" class="assignmentbutton" name="submit" value="Read" $uit>  
     <input type="submit" class="assignmentbutton" name="submit" value="Create"> 
     <br>
     <br> 
     <input type="submit" class="assignmentbutton" name="submit" value="Loguit">
     </form>
EOF;
     echo $form;
 }

 
// maak skill bar
function createSkillBar($skill,$level,$color){
//begin html
$html = "";
$html .= "<p>".$skill."</p>";
$html .= "<div class=\"skillbackdrop\">";
$html .= "<div class=\"skills\" style=\"width:".$level."%; background-color:".$color.";\">".$level."%</div>";
$html .= "</div>";
// eind html
return $html;
//class in html verwerken

//styles samengesteld
// 1specifieke class per bar
//1 generieke class per bar
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

function checkImage(){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
}  

// start functie de cookie functie
function createCookie($cname, $cvalue, $expiration, $path) {
  setcookie($cname, $cvalue, $expiration, $path); 
}


// read cookie
function readCookie($cookie_name) {
  if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
    return false;
  } else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
    return true;
  }
}


function checkCookie(){
  if(count($_COOKIE) > 0) {
    return true;
  } else {
   return false;
  }
}
// end cookie functies


//maak functie
function checkLogin(){ 
//formuliervelden binnenhalen
$gebruikersnaam = $_REQUEST["naam"];
$wachtwoord = $_REQUEST["wachtwoord"];

// hier mee zet in de login sessie
$_SESSION["login"] = "true";
$_SESSION["logout"] = "flase";

$checkbox = $_REQUEST["checkbox"];

//controleer of de velden er goed zijn && controleer de naam en de wachrwoord
if(isset($gebruikersnaam) && isset($wachtwoord) ){
  //controlleer of overeenkom komt met bekende gebruikersnaam
  // vergelijken doe je met == is net niet met 1 want dan ga je iets initializere
  if($gebruikersnaam == "user" && $wachtwoord == "admin" ){
    //als overeenkomst cookie aanmaken
      //als overeenkomt doorgaan  naar volgende pagina.

     // var_dump($_REQUEST["checkbox"]);
     // hier mee check ik of de site mee gaat met de check box dan voer deze functie uit
     //anders gaat hij deze functie niet uit voeren
     if($checkbox == "on" ){
      onthoudFunctie();
     }
    
     //als overeenkomt doorgaan  naar volgende pagina admin.
    header("Location: /frontdev/flexlayout/admin_pagina2.php");
    die();
    //stap uit de pagina
  }else{
    //als geen overeenkomst foutmelding
    $msg = "Uw inlog gegevens zijn onjuist.";
    return $msg;
  }
  
}
//controlleer of overeenkom komt met bekende wachtwoord
//als geen overeenkomst foutmelding
//als overeenkomst cookie aanmaken
}



function Loguit(){
  if($_SESSION["login"] == true){
    session_destroy();
    header("Location: /frontdev/flexlayout/admin.php");
  }else{
  $msg= "Er is een fout opgetreden";
  return $msg;
  }
}

//onthoud 7 dagen lang dat gebruiker is ingelogd

//als[rol] wil ik [iets] zodat [...].

//als [gebruiker] wil dat mijn [inlog gegevens worden onthouden] zodat [ik niet elke weer hoef in te loggen].

// als ingelogde gebruiker wil  ik een opdracht


// inlog formulier uitbreiden met een checkbock [check]
// test of gegevens ecn check aankomen [check]
//  test is geslaagd [check]
// check login functie gaan we uit breiden met acties onthoud fuctionaliteit [check]
//  als vink aan dan doorsturen naar onthoud functie [check]

//maak een onthoud functie
function onthoudFunctie(){
    // succesvolle login wegbschrijven als cookie met expirey van 7 dagen lang
    // start functie de cookie functie
    createCookie("login", "true", time() + (86400 * 210), "/");
}

// start functie de cookie functie[bezig]


//passen check auth[bezig]
// conttoleer eerst of cookie of gelijk is aan de waarde die je heb mee gegeven[check]
// controleer sessie[bezig]
//sessie ok dan doorgaan
//sessie niet ok terug naar inlog



function checkAuth(){
  // als er een cookie is met de (value) waarde true ga door anders als die er niet is ga naar header
  if($_COOKIE["login"]  && $_COOKIE["login"] == true ){
    //header("Location: /frontdev/flexlayout/admin_pagina2.php");
    //die();
  }else{
    //sessie niet ok terug naar inlog
    // anders als die cookie nier bestaat ga naar de inlog pagina
    header("Location: /frontdev/flexlayout/admin.php");
      //stap uit de pagina
    }
  }


  function checkAuthAdmin(){
    if($_COOKIE["login"]  && $_COOKIE["login"] == true ){
      // niks
    }else{
      header("Location: /frontdev/flexlayout/admin.php");
    }
  }
?>