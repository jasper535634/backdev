<?php
$pageNumbers = ceil((67/5));
echo"<br>";

for ($i = 1; $i <= $pageNumbers; $i++){
    print("<a href=index.php?page=" .$i. ">" .$i. "<a>&nbsp;");
}




?>