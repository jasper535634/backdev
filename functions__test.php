<?php declare(strict_types=1); // strict requirement
function sum(int $x, int $y) {
  $z = $x + $y;
  return $z;
}

echo "5 + 10 = " . sum(5, 10) . "<br>";
echo "7 + 13 = " . sum(7, 13) . "<br>";
echo "2 + 4  = " . sum(2, 4)  . "<br>";
echo "20 + 40  = " . sum(20,40) ."<br>";

$datuminnummer = 2004 - sum(20,40);

echo "$datuminnummer";

?>
