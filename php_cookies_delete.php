<?php /*
//set de cookie verloop datum naar een uur geleden
setcookie("gebruiker", "James", time() - 3600);
?>
<html>
    <body>
        <?php
        echo "Cookie 'gebruiker' is verwijderd"; 
        ?>
    </body>
</html>
*/
?>
<?php
setcookie("test_cookie", "Michale Scofield", time() + 3600, "/");
?>
<html>
    <body>
        <?php
       echo checkCookies();

    function checkCookies(){
        if(count($_COOKIE) > 0){
            $msg = "De cookies staan aan.";
        }else{
            $msg = "De cookies staan uit.";
        }
        return $msg;
    }
        ?>
    </body>
</html>    