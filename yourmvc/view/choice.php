<?php
require 'header.php';
?>
<form action="index.php?controller=contents&op=createcontent" method="POST">
    <input class="searchbtn" class="create" type="submit" name="create" value="create" style="width: 10%;">
</form>
<?php
echo $content;
require 'footer.php';
?>