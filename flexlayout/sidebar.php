<?php include_once 'function.php'; ?>
<!--Met deze include regel zet in de function.php mapje erin en kan dus mijn bestand waar ik
nu in werk de functions van dat bestand lezen. -->
<section>
  <nav>      
<?php
//hier zet ik in de array $sidebar hier zet ik de waardes in wat
// de functie gaat printen
$sidebar = [
    'Subone'=>'index.php',
    'Subtwo'=>'news.php',
    'Subthree'=>'contact.php',         
];

// hier output ik mijn side bar function die ik heb staan in de function.php
// daarin heb ik de functie gemaakt wat hij gaat uitvoeren
echo createSidebar($sidebar, 'sidebaritems'); //hier mee krijg ik de functie
?>
  
  </nav>


  
