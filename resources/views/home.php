<!DOCTYPE html>
<html lang = "en">
<head>
    <link rel="stylesheet" type="text/css" href="resources/css/reset.css">
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
    <?php
    if(!isset($_SESSION))
    {
        session_start();
    }
     include "./resources/fragments/header.php";
     ?>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
      <?php
      showHeader(0);
      ?>

<div>
    <?php
        echo get_include_path();
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
