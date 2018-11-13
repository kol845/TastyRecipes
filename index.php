<!DOCTYPE html>
<html lang = "en">
<head>
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="main.css">
<<<<<<< HEAD:index.php
    <?php
    if(!isset($_SESSION))
    {
        session_start();
    }
     include "header.php";
     ?>
=======
>>>>>>> c57af1e5a266d11aa7c6c76e6d13252858cb7d0f:index.html
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<<<<<<< HEAD:index.php
      <?php

      showHeader(0);
      ?>
=======

      <ul>
        <div>
        <li><a class="active" href="index.html">Home</a></li>
        <li><a href="recipe1.html">Meatballs Recipe</a></li>
        <li><a href="recipe2.html">Pancakes Recipe</a></li>
        <li><a href="calendar.html">Calendar</a></li>
        </div>
      </ul>
>>>>>>> c57af1e5a266d11aa7c6c76e6d13252858cb7d0f:index.html

<div>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo "<h1>Welcome " . $_SESSION['username'] . "!</h1>";
    }
    ?>
    
    <h1>Check out receips for meatballs and pancakes</h1>
    <p>We have made recipes for our favourit meals, meatballs and pancakes. Read our receips and you will have
    a delicious time.</p>

    <h1>Follow our food calendar</h1>
    <p>Having a hard time deciding what dinner to make? With our food calendar you will get inspired to make tasty dishes everyday. </p>
</div>




</body>
</html>
