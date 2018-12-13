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
  <meta charset="UTF-8">
  <title>Pancakes</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/resources/css/main.css">
    <link rel="stylesheet" type="text/css" href="/resources/css/receips.css">

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>

      <script>
          $(document).ready(function(){
              $("button").click(function(){
                  if(this.id=="deleteComment"){
                      var commentLinePost = this.name;
                      $.post("/doDeleteComment.php",{
                          commentLine:commentLinePost,
                          pageNumber:2
                      },function(){
                          $("#comment"+commentLinePost).remove();
                      });
                  }
                  if(this.id=="addComment"){

                      var addCommentText = $( "input[name = addCommentText]" ).val();
                      if(!(addCommentText=="")){
                          var addCommentText = $( "input[name = addCommentText]" ).val();

                          $.post("/doAddComment.php",{
                              comment:addCommentText,
                              pageNumber:2
                          },function(){
                              var username = "<?php echo $controller->getUsername();?>";
                              var strToAdd ="\n<div class = \"comment\" id =  \"comment0\">"+
                                          "<img src=\"https://secure.gravatar.com/avatar/1eadcff9b71326bca48fa66e15f83986?s=60&d=mm&r=g\" alt=\"User Avatar\">"+
                                          "<p class = \"commentAuthor\">"+username+"</p>"+
                                          "<p class = \"commentBox\">"+addCommentText+"</p>"+
                                          "<button id = \"deleteComment\" name= 0 value=\"Delete\">Delete</button>"+
                                          "</div>";
                                $( "#postedComments" ).prepend(strToAdd);
                          });

                      }
                  }

          });

        });

      </script>


</head>
<body>

  <?php
  $pageNumber = 2;
  include 'resources/fragments/header.php';
  ?>


<div class = "receipContent">
    <img src="https://www.graceandgoodeats.com/wp-content/uploads/2015/01/homemade-pancakes.jpg" alt="Pancakes">
    <h1>Pancake Recipe</h1>
    <p id = "bold">Servings: 8</p>
    <p>This receip was found at <a href="https://www.allrecipes.com/recipe/21014/good-old-fashioned-pancakes//">www.allrecipes.com</a>.</p>
    <h2>Ingredience</h2>
    <ul>
        <li>1 1/2 cups all-purpose flour</li>
        <li>3 1/2 teaspoons baking powder</li>
        <li>1 teaspoon salt</li>
        <li>1 tablespoon white sugar</li>
        <li>1 1/4 cups milk</li>
        <li>1 egg</li>
        <li>3 tablespoons butter, melted</li>
    </ul>
    <h2>Preparation</h2>

    <ol>
      <li>In a large bowl, sift together the flour, baking powder, salt and sugar. Make a well in the center and pour in the milk, egg and melted butter; mix until smooth.</li>
      <li>Heat a lightly oiled griddle or frying pan over medium high heat. Pour or scoop the batter onto the griddle, using approximately 1/4 cup for each pancake. Brown on both sides and serve hot.</li>
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
        <br>
        Enter comment here: <input type="text" name="addCommentText"rows="4" cols="50"><br>
        <button id = "addComment" name="addCommentName" >Submit</button>

    <div id = "postedComments">
    <?php

    $commentEntries = $controller->getComments($pageNumber);
    $commentLine = 0;
    foreach($commentEntries as $entry){
        if(!empty($entry->getUsername())){

        echo "\n<div class = \"comment\" id =  \"comment".$commentLine."\">";
        echo "<img src=\"https://secure.gravatar.com/avatar/1eadcff9b71326bca48fa66e15f83986?s=60&d=mm&r=g\" alt=\"User Avatar\">";
        echo "<p class = \"commentAuthor\">".$entry->getUsername()."</p>";
        echo "<p class = \"commentBox\">".$entry->getMessage()."</p>";
        if($entry->getUsername() == $controller->getUsername()){
          echo "<button id = \"deleteComment\" name=".$commentLine." value=\"Delete\">Delete</button>";
        }
        echo "</div>";
        }
        $commentLine+=1;

    }
    ?>
    <div>

</div>

</body>
</html>
