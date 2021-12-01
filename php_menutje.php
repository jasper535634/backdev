<?php
$list = array (
  array("suiker",22,18),
  array("thezakjes",15,13),
  array("eiren",5,2),
  array("wiet",17,15)
);

function createlist($list){
	for ($row = 0; $row < 4; $row++) {
	 
	  echo "<ul>"; 
	  for ($col = 0; $col < 3; $col++) {
	  echo "<li>".$list[$row][$col]."</li>";
	  }
	  
	  echo "</ul>";
      }
};


createlist($list);
?>