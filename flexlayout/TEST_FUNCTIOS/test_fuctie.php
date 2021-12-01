<?php

// alleen 1 persoon mag in de admin kant
  // alleen met behulp van wachtwoord en gebruikersnaam 
//eenmalig inloggen voor alle admin pagina's
  // onthoud de gegevens in de inlog formulier
//weergaven gegevens van ingelogde persoon
//extra gegevens worden ontsloten    nieuwe navigatie elementen zoals/ profiel pagina

  //inlog formulier op de amdin


///////////////////////////////////
//inlog formulier op de amdin == stap 1 //check
// alleen met behulp van wachtwoord en gebruikersnaam == stap 2 // check
// onthoud de gegevens in de inlog formulier == stap 3 // check
////weergaven gegevens van ingelogde persoon stap 4 // bezig

function ControlAdmin() {
  // deze controleeert of het inlog scherm gegevens ingevuld zijn
  if(empty($_POST["naam"]) || empty($_POST["wachtwoord"])){   
      $msg = "Alle velden zijn vereist";
      return $msg;
      // hier check ik of de gegevens kloppen met de opgegeven gegevens
  }elseif($_POST["naam"] !== "user" || $_POST["wachtwoord"] !== "admin") {    
      $msg = "Foute inlog gegevens";
      return $msg;
  }else{
// hier maak ik een cookie die beschickbaar is voor 1 dag

//$cname =  $_COOKIE["naam"];
//$cvalue = $_COOKIE["wachtwoord"];


    createCookie("user", "admin", time() + (86400 * 30), "/"); 
// na dat je heb ingelog voeg ik de admin side bar toe
    include 'adminsidebar.php';

    $knop = $_POST["submit"];

    switch ($knop) {
      case 'Login':
        $msg = showDetails($_POST["naam"],$_POST["wachtwoord"]);
        break;
      
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
        echo "<br> Create Assignment is gelukt";
      break;  
      
      default:
        $msg = "niks";
        break;
        
        return $msg;
      }
      return $msg;
  }
}

// einde functie


function showDetails($naam,$wachtwoord) {
  //functie om inlog details van de admin te laten zien
  $html = "<article>";
  $html .= "<form>";
  $html .= "<p><b>Uw gegevens:</b></p>";
  $html .= "<p>Gebruikersnaam: $naam</p>";
 
  $html .= "<p>Wachtwoord: $wachtwoord</p>";
  $html .= "</form>";
  $html .= "</article>";
  return $html;
}



function createDropdown($arr, $nav_class){
 $html = "<div class=\"navbar\">";
 $html .= "<ul class='.$nav_class.'>";

  foreach($arr as $key = > $val) {
    $html .="<li><a href='" .$val. "'>" .$key.  "</a>";    
  }
  $html .= "<div";
}


function createList($arr, $nav,)
{
    $html = '<ul class="' . $nav . '">';
    foreach ($arr as $key => $val) {
        $html .="<li><a href='" .$val. "'>" .$key.  "</a>";    
    }
    $html .= '</ul>';
    return $html;
}



?>