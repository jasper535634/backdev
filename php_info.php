<?php

phpinfo();

// om de path te vinden
echo $_SERVER['PHP_SELF']; 

echo "<br>";


// daar laat hij de hele path name
echo $_SERVER['SCRIPT_FILENAME'];
echo "<br>";
?>

<?php
function showDate($currfilename) {

//huidige filename ophalen code:
// [02] $currfilename = basename($_SERVER['PHP_SELF']);

// en als je hem alleen wilt tonen op je beeld zonder functie en alles
//echo ($_SERVER['PHP_SELF']);

//bekijk de laaste opslagdatum
$filelastmodify = filemtime($currfilename);

// zet de datum om naar wat wij kunnen lezen
return date('d-m-Y H:i:s', $filelastmodify);
};

//call functie - deze code is nu aangepast om de laaste modified datum van de footer te krijgen
// daar door hebben we de code [02] eerst voor moeten uitzetten
echo showDate('footer.php');
?>

<?php

// schrijf een php script die de laaste wijzingdatum van deze php script laat zien
$filenaam = basename($_SERVER['PHP_SELF']);
$filelastmodify1 = filemtime($filenaam);

return date('d-m-Y H:i:s', $filelastmodify1);

?>

<?php
echo date ('d-m-Y H:i:s', filemtime(basename($_SERVER['PHP_SELF'])));
?>
