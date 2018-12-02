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
    <link rel="stylesheet" type="text/css" href="/resources/css/receips.css">

    <meta charset="UTF-8">
    <title>Meatbals</title>
</head>
<body>
  <?php
  $pageNumber = 1;
  include 'resources/fragments/header.php';
  ?>






<div class = "receipContent">
    <img src="https://truffle-assets.imgix.net/pxqrocxwsjcc_2EcZowoTZeyUaqG4gosWkM_sweet-spicy-meatballs_landscapeThumbnail_en.png" alt="Meatballs">
    <h1>Meatballs Recipe</h1>
    <p id = "bold">Servings: 8</p>
    <p>This receip was found at <a href="https://www.allrecipes.com/recipe/40399/the-best-meatballs/">www.allrecipes.com</a>.</p>
    <h2>Ingredience</h2>
    <ul>
        <li>1 pound ground beef</li>
        <li>1/2 pound ground veal</li>
        <li>1/2 pound ground pork</li>
        <li>2 cloves garlic, minced</li>
        <li>2 eggs</li>
        <li>1 cup freshly grated Romano cheese</li>
        <li>1 1/2 tablespoons chopped Italian flat leaf parsley</li>
        <li>salt and ground black pepper to taste</li>
        <li>1 cup freshly grated Romano cheese</li>
        <li>2 cups stale Italian bread, crumbled</li>
        <li>1 1/2 cups lukewarm water</li>
        <li>1 cup olive oil</li>
    </ul>
    <h2>Preparation</h2>

    <ol>
      <li>Combine beef, veal, and pork in a large bowl. Add garlic, eggs, cheese, parsley, salt and pepper.</li>
      <li>Blend bread crumbs into meat mixture. Slowly add the water 1/2 cup at a time. The mixture should be very moist but still hold its shape if rolled into meatballs. (I usually use about 1 1/4 cups of water). Shape into meatballs.</li>
      <li>Heat olive oil in a large skillet. Fry meatballs in batches. When the meatball is very brown and slightly crisp remove from the heat and drain on a paper towel. (If your mixture is too wet, cover the meatballs while they are cooking so that they hold their shape better.)</li>
    </ol>

</div>

<div class = "commentContent">
    <?php
      $error = $controller->getError();
      if(!empty($error)){
        $errorMessage;
        if($error == CHAT_ERROR_BADWORD_KEY){
          $errorMessage = "Warning: The input contained a \"Bad Word\". The comment was not posted, please try again.";
        }
        echo "<p class = \"errorMessage\">".$errorMessage."</p>";
        SessionManager::storeController($controller);
      }
    ?>
    <form method="post" action="/doAddComment.php?recipe1">
        <br>
        Enter comment here: <input type="text" name="comment"rows="4" cols="50"><br>
        <input type="submit" name="button" value="Submit"/>
    </form>
    <?php





    echo "<form method=\"post\" action=\"/doDeleteComment.php?recipe1\">";
    $commentEntries = $controller->getComments(1);
    $commentLine = 0;
    foreach($commentEntries as $entry){
        if(!empty($entry->getUsername())){

        echo "\n<div class = \"comment\">";
        echo "<img src=\"https://secure.gravatar.com/avatar/1eadcff9b71326bca48fa66e15f83986?s=60&d=mm&r=g\" alt=\"User Avatar\">";
        echo "<p class = \"commentAuthor\">".$entry->getUsername()."</p>";
        echo "<p class = \"commentBox\">".$entry->getMessage()."</p>";
        if($entry->getUsername() == $controller->getUsername()){
          echo "<input type=\"submit\" name=".$commentLine." value=\"Delete\">";
        }
        echo "</div>";
        }
        $commentLine+=1;

    }
    echo "</form>";
    ?>

</div>

</body>
</html>
