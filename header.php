<?php


function showHeader($thisPage){
    $pages = array(
          "<li><a href=\"index.php\">Home</a></li>",
          "<li><a href=\"recipe1.php\">Meatballs Recipe</a></li>",
          "<li><a href=\"recipe2.php\">Pancakes Recipe</a></li>",
          "<li><a href=\"calendar.php\">Calendar</a></li>",
          "<li class=\"login\"><a href=\"login.php\">Login</a></li>"
    );

    $currentPages = array(
          "<li><a class=\"active\" href=\"index.php\">Home</a></li>",
          "<li><a class=\"active\" href=\"recipe1.php\">Meatballs Recipe</a></li>",
          "<li><a class=\"active\" href=\"recipe2.php\">Pancakes Recipe</a></li>",
          "<li><a class=\"active\" href=\"calendar.php\">Calendar</a></li>",
          "<li class=\"login\"><a class=\"active\" href=\"login.php\">Login</a></li>"
    );
    $logout = "<li class=\"login\"><a c href=\"logouthandler.php\">Logout</a></li>";



    echo  "<ul>
          <div>";
    for($x = 0;$x<=4;$x++){
        if($x == $thisPage){
            echo $currentPages[$x];
        }
        else{
            if($x == 4 and isset($_SESSION['loggedin']) and $_SESSION['loggedin'] == true){
                echo $logout;
            }
            else{
                echo $pages[$x];
            }
        }
    }
    echo  "</ul>
          </div>";

}
