<?php
//avatar image url:
//https://secure.gravatar.com/avatar/1eadcff9b71326bca48fa66e15f83986?s=60&d=mm&r=g



function showComments($receipePageNumber){
    if(!isset($_SESSION))
    {
        session_start();
    }


    if($receipePageNumber == 1){
        $file = "./database/receipe1data.txt";
    }
    else{
        $file = "./database/receipe2data.txt";
    }
    $document = file_get_contents($file);
    $lines = explode("\n",$document);
    $commentLine = 0;
    echo "<form method=\"post\" action=\"deleteComment.php?recipe".$receipePageNumber."\">";
    foreach($lines as $commentEntry){

        $commentEntry = explode(":",$commentEntry);
        if(!empty($commentEntry[0])){

        echo "\n<div class = \"comment\">";
        echo "<img src=\"https://secure.gravatar.com/avatar/1eadcff9b71326bca48fa66e15f83986?s=60&d=mm&r=g\" alt=\"User Avatar\">";
        echo "<p class = \"commentAuthor\">".$commentEntry[0]."</p>";
        echo "<p class = \"commentBox\">".$commentEntry[1]."</p>";
        if(isset($_SESSION['username']) and $commentEntry[0] == $_SESSION['username']){
          echo "<input type=\"submit\" name=".$commentLine." value=\"Delete\">";
        }
        echo "</div>";
        }
        $commentLine+=1;

    }
    echo "</form>";
}
