<?php
namespace Chat\View;
use \Chat\Util\Util;
use Chat\Controller\SessionManager;
require_once 'classes/Chat/Util/Util.php';
Util::initRequest();

$controller = SessionManager::getController();



?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/resources/css/main.css">

    <meta charset="UTF-8">
    <title>Home</title>
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
</head>
<body>
  <?php
  $pageNumber = 0;
  include 'resources/fragments/header.php';

   ?>

<div>
    <?php
    if ($controller->isLoggedIn()) {
        echo "<h1>Welcome " . $controller->getUsername() . "!</h1>";
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
