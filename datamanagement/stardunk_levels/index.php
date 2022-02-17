<?php
include_once ('lvl1_db_functions.php');

?>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>title</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=font1|font2|etc" type="text/css">
    <link rel="stylesheet" href="./media/stardunk.css" type="text/css">

</head>

<body>
    <h5>read</h5>
    <a class="button" href="./index.php?op=create">Create new product</a>
    <a class="button" href="./index.php?op=read&id=12">Read</a>
    <a class="button" href="./index.php?op=update&id=17">Update</a>
    <a class="button" href="./index.php?op=delete&id=58">Delete</a>
    <br>
    <br>
    <?php handlerRequest(); ?>
</body>


</html>