<?php
$cname = "user";
$cvalue = "John Doe";
$expiration = time() + (86400*7);
$path = "/";
?>
<html>
<body>

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

  //createCookie($cname, $cvalue, $expiration, $path);

  //readCookie($cname);

function updateCookie() {
  //to do
} 

function deleteCookie() {
  // to do
}

//call createcookie
$dExp= time() - 3600;
createCookie($cname, $cvalue, $expiration, $path);
readCookie($cname);
createCookie($cname, "", $dExp, "");
//echo checkCookie($cname);

?>

</body>
</html>
