<?php include "header.php"?>

<?php include "sidebar.php"?>
<article>
    <form action="PHP_SELF" method="POST">        
<label for="fname">First name:</label><br>
<input type="text" id="fname" name="First name" placeholder="your name" required><br> 
<label for="company">Company name:</label><br>
<input type="text" id="cname" name="company" placeholder="company"><br>
<label for="Email">Email:</label><br>
<input type="text" id="email" name="Email" placeholder="your email" required><br>
<label for="comment">Comment:</label><br>
<textarea name="Enter your cooment" id="" cols="30" rows="5"></textarea><br>
<input type="submit">
    </form>
    
    <?php include 'footer.php'?>
</article>
