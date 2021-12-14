<?php
require_once ('./model/auth.php');
require_once ('./model/fms.php');
require_once ('./model/display.php');
require_once ('php_images.php');
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
            $msg = showForm();
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



function createSidebar($arr, $sidebaritems){
    $html = '<ul class="' . $sidebaritems . '">';
    foreach ($arr as $key => $val) {
        $html .="<li><a href='" .$val. "'>" .$key.  "</a>";    
    }
    $html .= '</ul>';
    return $html;
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


?>