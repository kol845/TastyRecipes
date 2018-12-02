<?php


$pages = array(
      "<li><a href=\"/resources/views/home.php\">Home</a></li>",
      "<li><a href=\"/resources/views/recipe1.php\">Meatballs Recipe</a></li>",
      "<li><a href=\"/resources/views/recipe2.php\">Pancakes Recipe</a></li>",
      "<li><a href=\"/resources/views/calendar.php\">Calendar</a></li>",
      "<li class=\"login\"><a href=\"/resources/views/login.php\">Login</a></li>"
);

$currentPages = array(
      "<li><a class=\"active\" href=\"/resources/views/home.php\">Home</a></li>",
      "<li><a class=\"active\" href=\"/resources/views/recipe1.php\">Meatballs Recipe</a></li>",
      "<li><a class=\"active\" href=\"/resources/views/recipe2.php\">Pancakes Recipe</a></li>",
      "<li><a class=\"active\" href=\"/resources/views/calendar.php\">Calendar</a></li>",
      "<li class=\"login\"><a class=\"active\" href=\"/resources/views/login.php\">Login</a></li>"
);
$logout = "<li class=\"login\"><a c href=\"/doLogout.php\">Logout</a></li>";



echo  "<ul>
      <div>";
for($x = 0;$x<=4;$x++){
    if($x == $pageNumber){
        echo $currentPages[$x];
    }
    else{
        if($x == 4 and $controller->isLoggedIn()){
            echo $logout;
        }
        else{
            echo $pages[$x];
        }
    }
}
echo  "</ul>
      </div>";


?>
