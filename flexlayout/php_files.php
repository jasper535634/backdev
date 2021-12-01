
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


<form class="forminput" method="POST" action="function.php">
</label for="bestandnaam">bestandnaam</label><br>
<input type="text" name="bestandnaam"></input><br>

</label for="foutmelding">foutmelding</label><br>
<input type="text" name="foutmelding"></input><br>

</label for="inhoud">inhoud</label><br>
<input type="text" name="inhoud"></input><br>
<br>
<input type="submit" name="submit" class="assignmentbutton" value="Create">
<input type="submit" name="submit" class="assignmentbutton" value="Read">
<input type="submit" name="submit" class="assignmentbutton" value="Delete">
<input type="submit" name="submit" class="assignmentbutton" value="Update">
<input type="hidden" name="crut" value="crut"></input>
<br>
</form>



