<!DOCTYPE html>
<html lang = "en">
<head>
  <meta charset="UTF-8">
  <title>Pancakes</title>
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="receips.css">
    <?php
    include "header.php";
    include "commentSection.php";
    ?>
</head>
<body>


<?php
if(!isset($_SESSION))
{
    session_start();
}
 showHeader(2); ?>


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

    <form method="post" action="addComment.php?recipe2">
        <br>
        Enter comment here: <input type="text" name="comment"rows="4" cols="50"><br>
        <input type="submit" name="button" value="Submit"/>
    </form>
    <?php showComments(2);?>

</div>

</body>
</html>
