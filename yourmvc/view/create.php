<?php require 'header.php'; ?>

<form action="index.php?op=create" method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>

    <label for="phone">phone:</label><br>
    <input type="text" id="phone" name="phone"><br>

    <label for="email">email:</label><br>
    <input type="text" id="email" name="email"><br>

    <label for="location">location:</label><br>
    <input type="text" id="location" name="location"><br><br>

    <input type="submit" name="submit"value="create">
</form>

<?php require 'footer.php'; ?>