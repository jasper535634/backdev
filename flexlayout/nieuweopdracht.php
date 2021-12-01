<?php include  'header.php'; ?>
<?php include 'adminsidebar.php'; ?>
<!-- deze checkt of die cookie beschickbaar is ander verzend hij dat hij opnieuw moet inloggen-->
<?php //checkAuth(); ?>
            <article>
                
            <h1>Opdracht Maken, Tonen en Weergeven</h1>
<form class="assignment" method="POST" action="admin_pagina2.php" enctype="multipart/form-data">
</label for="bestandnaam">Kop:</label><br>
<input type="text" name="kop"></input><br>

<input type="hidden" name="hiddenbestandsnaam" value="alleopdrachten.php">
<br>
</label for="afbeelding">Afbeelding:</label><br>
<input type="file" name="fileToUpload" id="fileToUpload"><br>
<br>
</label for="beschrijving">Beschrijving:</label><br>
<textarea for=beschrijving name=beschrijving rows="5" cols="50"></textarea><br>

</label for="ProgrameerTalen">Programeer Talen:</label><br>
<textarea for=programeertaal name=programeertaal rows="5" cols="50"></textarea><br>
<br>
<input type="submit" name="submit"   class="assignmentbutton" value="CreateAssignment">
</form>

            </article>
   
<?php include 'footer.php'; ?>