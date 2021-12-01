//sticky nav bar script
 //wanner de gebruiker scrollt op de page voer de myfunction uit.
window.onscroll = function() {stickyNav()};
// dit is een call back function een function, die een andere function called, dus met name wanner de functie uitgevoerd moet wworden
// moet de call back functie uitgevoerd worden. (als er veel events plaats vinden, dan gebruik je de call back)


//get de navbar hij heeft een element nodig met een id "navrbar"
var navbar = document.getElementById("navigatiebalkboven");

//pak de positie van de navbar // hij moet weten wat de afstand van de bovenkant is anders plakt hij automatisch  hem al aan.
var sticky = navbar.offsetTop;

 // voeg de sticky class aan de navbar wanner je gaat scrollen. en daarna verwijde de "sticky class" wanner je de scroll positie verlaat
function stickyNav() {
  // if operator >= kleiner dan er een spatie komt dan werkt die niet

  // pas als die groter is dan gaat die hoger dat bdl ze met die >=
  if (window.pageYOffset >= sticky) {
    //pageYOffset = hij returned een hoeveelheid nummer in pixels. wanneer je scrolt
    console.log("sticky");
    navbar.classList.add("sticky")
    // pak de navbar variable en voeg der achter een klas "sticky"
  } else {
    //anders als je niet scrolled verwijder dan de class sticky
    navbar.classList.remove("sticky");
  }
}



/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function dropdown() {
  // pak het element met de id my drop down en voeg daar acchter een toggle class show
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}



