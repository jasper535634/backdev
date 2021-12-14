<html>
    <head>
        <title>test</title>
    </head>
<body>
    
<?php
// if(!extension_loaded('imgick')){
// echo "img not installed";
// }
function load_image($filename, $type) {
    if( $type == IMAGETYPE_JPEG ) {
        $image = imagecreatefromjpeg($filename);
    }
    elseif( $type == IMAGETYPE_PNG ) {
        $image = imagecreatefrompng($filename);
    }
    elseif( $type == IMAGETYPE_GIF ) {
        $image = imagecreatefromgif($filename);
    }
    return $image;
}

function resize_image($new_width, $new_height, $image, $width, $height) {
    $new_image = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    return $new_image;
}

function resize_image_to_width($new_width, $image, $width, $height) {
    $resize_ratio = $new_width / $width;
    $new_height = $height * $resize_ratio;
    return resize_image($new_width, $new_height, $image, $width, $height);
}

function resize_image_to_height($new_height, $image, $width, $height) {
    $ratio = $new_height / $height;
    $new_width = $width * $ratio;
    return resize_image($new_width, $new_height, $image, $width, $height);
}

function scale_image($scale, $image, $width, $height) {
    $new_width = $width * $scale;
    $new_height = $height * $scale;
    return resize_image($new_width, $new_height, $image, $width, $height);
}


function save_image($new_image, $new_filename, $new_type='jpeg', $quality=80) {
    if( $new_type == 'jpeg' ) {
        imagejpeg($new_image, $new_filename, $quality);
     }
     elseif( $new_type == 'png' ) {
        imagepng($new_image, $new_filename);
     }
     elseif( $new_type == 'gif' ) {
        imagegif($new_image, $new_filename);
     }
}

function createResponsiveImages(){
    $afbeeldingmap = "media/";
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
        list($width, $height, $type) = getimagesize($afbeelding);
        $old_image = load_image($afbeelding, $type);
        $new_image = scale_image(0.8, $old_image, $width, $height);
        save_image($new_image, './media/resized0-8-'.basename($afbeelding), 'jpeg', 80);

        $new_image2 = scale_image(0.6, $old_image, $width, $height);
        save_image($new_image2, './media/resized0-6-'.basename($afbeelding), 'jpeg', 80);

       $picturename= basename($afbeelding);
        $html="";
        $html.="<picture>";
        $html.="<source srcset=\"./media/resized0-6".$picturename. "\"media=\"(max-width: 500px)\">";
        $html.="<source srcset=\"./media/resized0-8-".$picturename. "\"media=\"(max-width: 1000px)\">";
        $html.="<source srcset=\"./media/".$picturename. " \"media=\"(max-width: 1500px)\">";
        $html.= "<img src=\"./media/".$picturename.">";
        $html.= "</picture>";

        var_dump($picturename);
        return $html;

      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
     echo createResponsiveImages();
}







// $filename ="./media/sterren.jpg";
// list($width, $height, $type) = getimagesize($filename);
// $old_image = load_image($filename, $type);

// $new_image = resize_image(280, 180, $old_image, $width, $height);

// $image_width_fixed = resize_image_to_width(560, $old_image, $width, $height);

// $image_height_fixed = resize_image_to_height(900, $old_image, $width, $height);
// $image_scaled = scale_image(0.8, $old_image, $width, $height);

// save_image($image_scaled, './media/resized-'.basename($filename), 'jpeg', 1);

?>

    <form  method="POST" action="php_images.php" enctype="multipart/form-data" >
        </label for="afbeelding">Afbeelding:</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload">   
        <input type="submit" name="submit">
    </form>

    <!--<picture>
    <source srcset="./media/resized0-6-sterren.jpg" media="(max-width: 500px)">
    <source srcset="./media/resized0-8-sterren.jpg" media="(max-width: 1000px)">
    <source srcset="./media/sterren.jpg" media="(max-width: 1500px)">
    <img src="./media/sterren.jpg">
    </picture>-->

</body>
</html>
