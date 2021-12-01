<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php  //checkAuthAdmin(); ?>
<!-- Hij gaat door de switch heen en vind niks en laat de form zien. -->
        <article>
                <form action="admin_auth.php" method="POST">
                  <label for="naam">Gebruiker's naam:</label><br>
                  <input type="text" name="naam"></input><br>
                    <br>
                  <label for="password">Wachtwoord:</label><br>
                  <input type="password" name="wachtwoord"></input><br>
                    
                  <br>

                <!--  <label for="checkbox" name="checkbox">Remember me</label> -->
                  <input type="checkbox" name="checkbox">Onthoud mijn inloggevens</input><br>

                  <br>
                  <input type="submit" name="submit" value="Login"></input> 
                  <input type="hidden" name="hiddenbestandsnaam" value="inlogform"></input><br>
                </form>

            </article>          

<?php include 'footer.php'; ?>