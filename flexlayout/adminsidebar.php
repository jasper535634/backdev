<?php include_once 'function.php'; ?>
<section>
  <nav>      
<?php
$sidebar = [
    'Nieuwe Opdrachten'=>'nieuweopdracht.php',
    'Subtwo'=>'news.php',
    'Subthree'=>'contact.php',    
];

echo createSidebar($sidebar, 'sidebaritems'); //hier mee krijg ik de functie
?> 
</nav>
