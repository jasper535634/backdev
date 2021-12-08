<?php 
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
    header("Location: /backdav/flexlayout/admin_pagina2.php");
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

function checkAuth(){

    // als er een cookie is met de (value) waarde true ga door anders als die er niet is ga naar header
    if(isset($_SESSION["login"])  && $_SESSION["login"] == true ){
      //header("Location: /frontdev/flexlayout/admin_pagina2.php");
      //die();
    }else{
      //sessie niet ok terug naar inlog
      // anders als die cookie nier bestaat ga naar de inlog pagina
      header("Location: /backdav/flexlayout/admin.php");
        //stap uit de pagina
      }
}
  
function checkAuthAdmin(){
      if($_COOKIE["login"]  && $_COOKIE["login"] == true ){
        // niks
      }else{
        header("Location: /backdav/flexlayout/admin.php");
      }
}

function onthoudFunctie(){
    // succesvolle login wegbschrijven als cookie met expirey van 7 dagen lang
    // start functie de cookie functie
    createCookie("login", "true", time() + (86400 * 210), "/");
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
?>