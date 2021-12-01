

<?php
function deleteFile($bestandsnaam){
    //code
    //verwijderen bestand
    //laten weten of gelukt it
   $result =  unlink($bestandsnaam);

   echo "Resultaat: " .$result. "<br/>";

    if ( $result == 1){
        $msg = "Bestand verwijderd";
    }else {
        $msg = "Bestand verwijderen is gelukt";
    }
    return $msg;
}

deleteFile("test.txt");
?>



<input type=submit onclick="deleFile()" placeholder="stuur"></input><br>

<button type="button" onlick="deleteFile()">Delete</button>
