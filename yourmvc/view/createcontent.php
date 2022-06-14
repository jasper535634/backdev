<?php include 'header.php' ?> 

<h1>Opdracht Maken, Tonen en Weergeven</h1>
<form method="POST" action="index.php?controller=contents&op=createcontent" enctype="multipart/form-data">

<label for="author">author:</label><br>
<input type="text" name="author"></input><br>

<label for="title">title:</label><br>
<input type="text" name="title"></input><br>

<input type="hidden" name="hiddenfilename" value="alleopdrachten.php"><br>

<label for="afbeelding">Afbeelding:</label><br>
<input type="file" name="fileToUpload" id="fileToUpload"><br><br>

<label for="content">content:</label><br>
<textarea for=content name=content rows="5" cols="50"></textarea><br>

<label for="socialmedia">socialmedia:</label><br>
<input type="text" for=socialmedia name=socialmedia></input><br>
<br>

<label for="date">date:</label>
<input type="date" for="date" name="date"></input><br><br>

<input type="submit" name="submit" value="createcontent">
</form>

<?php include 'footer.php' ?>