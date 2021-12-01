<html>
<body>
  <link rel="stylesheet" href="./Media/styles0050.css">

<?php include_once 'function.php'?>

<?php
$bestandsnaam = $foutmelding = $inhoud = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
  if (empty($_POST["bestandsnaam"])) {
  } else { 
      $bestandsnaam = test_input($_POST["bestandsnaam"]);
  }
  if (empty($_POST["foutmelding"])) {
  } else {
      $foutmelding = test_input($_POST["foutmelding"]);
  }
  if (empty($_POST["inhoud"])) {
  } else {
      $inhoud = test_input($_POST["inhoud"]);
  }
};

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};


?>
 <!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
<form method="post" action="functionsnieuw.php">


  <label for="bestandsnaam">bestandsnaam:</label><br>
  <input type="text" id="bestandsnaam" name="bestandsnaam" value=""><br>

  <label for="foutmelding">foutmelding:</label><br>
  <input type="text" id="foutmelding" name="foutmelding" value=""><br>

  <label for="inhoud">inhoud:</label><br>
  <textarea name="inhoud" rows="5" cols="40"></textarea><br>

  <input type="submit"  name="submit" value="Create">

  <input type="submit" name="submit" value="Delete">

  <input type="submit" name="submit" value="Read">
  <input type="submit" name="submit" value="Update"><br>
</form>
</body>
</html>
