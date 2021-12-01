<h2>Opdracht zelf:</h2>


<?php include 'functions.php'?>

<?php
$bestandnaam = $foutmelding = $inhoud = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
  if (empty($_POST["bestandnaam"])) {
  } else { 
      $bestandnaam = test_input($_POST["bestandnaam"]);
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

<form method="POST" action="functions.php">
</label for="bestandnaam">bestandnaam</label><br>
<input type="text" name="bestandnaam"></input><br>

</label for="foutmelding">foutmelding</label><br>
<input type="text" name="foutmelding"></input><br>

</label for="inhoud">inhoud</label><br>
<input type="text" name="inhoud"></input><br>

<input type="submit" name="submit" value="Create">
<input type="submit" name="submit" value="Read">
<input type="submit" name="submit" value="Update">
</form>


