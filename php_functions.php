<?php
function writeMsg() {
  echo "Hello world!";
}

writeMsg();
?>

<blockquote>
When something is important enough,you do it even if the odds are not in your favor
</blockquote>

<?php
function familyName($fname, $year, $month) {
  echo "$fname Refsnes. geboren in $year. in de maand ";

// De bracks op de juiste plek te zetten en nauwkeurig werken.
switch ($month) {
  case "01":
    echo "januari";
    break;
  case "02":
    echo "februari";
    break;
  case "03":
    echo "maart";
    break;
  default:
    echo "";
  }
echo"<br>";
}

familyName("Hege","1975","01");
familyName("Stale","1978","02");
familyName("Kai Jim","1983","03");

?>

<?php declare(strict_types=1); // strict requirement
function sum(int $x, int $y) {
  $z = $x + $y;
  return $z;
}

echo "5 + 10 = " . sum(5, 10) . "<br>";
echo "7 + 13 = " . sum(7, 13) . "<br>";
echo "2 + 4 = " . sum(2, 4);
?>
