<?php
require 'header.php';
?>
<form action="index.php?op=create" method="POST">
    <input class="searchbtn" class="create" type="submit" name="create" value="create" style="width: 10%;">
</form>

<a class="createbtn" href="./index.php?op=create">create</a>

<form class="searchform" action="index.php?op=search" method="POST">
    <input type="text" name="searchterm" style="width: 25%;">
    <input class='searchbtn' type="submit" name="submit" value="search" style="width: 10%;">
</form>

<?php
echo $contacts;
require 'footer.php'
?>