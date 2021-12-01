<?php
$kop = $afbeelding = $beschrijving = $programeertaal = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
  if (empty($_POST["kop"])) {
  } else { 
      $kop = test_input($_POST["kop"]);
  }
  if (empty($_POST["afbeelding"])) {
  } else {
      $afbeelding = test_input($_POST["afbeelding"]);
  }
  if (empty($_POST["beschrijving"])) {
  } else {
      $beschrijving = test_input($_POST["beschrijving"]);
  }
  if (empty($_POST["programeertaal"])){
  }else{
    $programeertaal = test_input($_POST["programeertaal"]);
  };

  $knop = $_POST["submit"];
  switch ($knop) {
      case "OpdrachtMaken":
          //echo createOpdracht($_POST["kop"], $_POST["afbeelding"],$_POST["beschrijving"],$_POST["programeertaal"]);
          echo createFile($_POST["kop"], $_POST["afbeelding"],$_POST["beschrijving"]);
          break;
      
      default:
      echo "Er is niks ingevuld in de velden";
      break;
  }    

};

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};
?>

<h1>Opdracht Maken: </h1>
<form class="" method="POST" action="alleopdrachten.php" enctype="multipart/form-data">
</label for="kop">Kop:</label><br>
<input type="text" name="kop"></input><br>
    <br>
</label for="afbeelding">Afbeelding:</label><br>
<input type="file" name="fileToUpload" id="fileToUpload"><br>
    <br>
</label for="beschrijving">Beschrijving:</label><br>
<textarea for=beschrijving name=beschrijving rows="5" cols="50"></textarea><br> 

</label for="ProgrameerTalen">Programeer Talen:</label><br>
<textarea for=programeertaal name=programeertaal rows="5" cols="50"></textarea><br>
<input type="submit" name="submit" class="" value="OpdrachtMaken">
<input type="hidden" name="opdrachtmaken" value="opdrachtmaken"></input>
</form>


