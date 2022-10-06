<?php
include_once "api.php";
include_once "SQLManager.php";
?>
<!DOCTYPE html>
<html lang="en">
<header><p></p></header>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="menu.CSS">
    <br>
</head>
<body>
    <?php
        echo API::outputVideo("2jy1GXVEHFIZZDV9rNBzcQ", "654926");
        //businessID abd RecipieId
    ?>
    <h3><b>Links</b>
    <!--added links to the other pages of the website-->
    <nav>
        <ul>
            <li>
                <button><a href="index.html">Back to The Hompage</a>
                <button><a href="hours.html">Hours</a>
                <button><a href="apply.html">Apply Online</a>
                <button><a href="index.php">Order Online</a>
            </li>
        </ul>
    </nav>
    <h3>
</body>
<!--created a footer to display the facebook logo and included a link to th Harbor Diner facebook page-->
<footer>find us on
    <p><a href="https://www.facebook.com/GlassDash-104332832234640"><img src="facebook-svgrepo-com.svg" alt="facebook logo" class="center"></a>
</footer>
</html>
