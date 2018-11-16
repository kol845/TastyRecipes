<?php
//avatar image url:
//https://secure.gravatar.com/avatar/1eadcff9b71326bca48fa66e15f83986?s=60&d=mm&r=g


function showComments($receipePageNumber){
    if($receipePageNumber == 1){
        $file = "./database/receipe1data.txt";
    }
    else{
        $file = "./database/receipe2data.txt";
    }
    $document = file_get_contents($file);
    $lines = explode("\n",$document);
    foreach($lines as $commentEntry){

        $commentEntry = explode(":",$commentEntry);
        if(!empty($commentEntry[0])){

        echo "\n<div class = \"comment\">";
        echo "<img src=\"https://secure.gravatar.com/avatar/1eadcff9b71326bca48fa66e15f83986?s=60&d=mm&r=g\" alt=\"User Avatar\">";
        echo "<p class = \"commentAuthor\">".$commentEntry[0]."</p>";
        echo "<p class = \"commentBox\">".$commentEntry[1]."</p>";
        echo "</div>";
        }

    }
}
