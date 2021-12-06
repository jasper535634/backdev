<?php include_once 'function.php'; ?>

<?php
// hier maak ik een array en die noem ik $nav met deze waardes erin, het is een 2d array en dat kan je zien aan de [] haakjes
// daarna 
$nav = [
    'Home'=>'index.php',
    'Skills'=>'skills.php',
    'Contact'=>'contact.php',   
    'About'=>'about.php',   
    'Table'=>'table.php',
    'Opdrachten'=>'opdrachten.php',
    'Admin'=>'admin.php',        
];
// echo '<div id="navigatiebalkboven">'.createList($nav, 'nav_itemsboven').'</div>';

$drop = [
  'link1'=>'#',
  'link2'=>'#',
  'link3'=>'#',              
];

//$arraydropdown = array("Opdrachten"=>"opdrachten.php");

// echo createList($nav, "nav_itemsboven"); //hier mee krijg ik de functie
// echo '<div id="navigatiebalkboven">'.createList($drop, "nav_itemsboven", "dropdown-content").'</div>';

//echo createNavigationBar($nav,$arraydropdown,"nav_itemsboven","on");
$navdrop = [
  'Home'=>'index.php',
  'Skills'=>'skills.php',
  'Contact'=>'contact.php',   
  'About'=>'about.php',   
  'Table'=>'table.php',
  'Opdrachten'=>'opdrachten.php',
  'Admin'=>'admin.php',
  'dropdown'=>[
    'link1'=>'#',
    'link2'=>'#',
    'link3'=>'#',
  ]
  ];
  echo '<div id="navigatiebalkboven">'.createList($navdrop, "nav_itemsboven", "dropdown-content").'</div>';



?>

  <!-- <li><a href="index.php">Home</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="table.php">table</a></li>
  <li><a href="opdrachten.php">Opdrachten</a></li>
  <li><a href="admin.php">Admin</a></li>

  <ul>
    <li><a href="#" class="dropbtn" onclick="dropdown()">Dropdown</a>
      <ul class="dropdown-content" id="myDropdown">
        <li> <a href="opdrachten.php">Opdrachten</a></li>
        <li> <a href="projecten.php">Projecten </a> </li>
        <li> <a href="#"> NVT</a> </li>
    </ul>
  </li>
</ul> 
  -->