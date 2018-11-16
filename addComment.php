<?php
session_start();
if(!(isset($_SESSION['loggedin']) and $_SESSION['loggedin'] == true)){
    include "login.php";
}

else{
    if (isset($_POST['comment']) and !empty($_POST['comment'])) {
        if($_SERVER['QUERY_STRING'] == "recipe1"){
            $file = "./database/receipe1data.txt";
        }
        else{
            $file = "./database/receipe2data.txt";
        }
        $current = file_get_contents($file);
        $commentToPost = $_SESSION['username'].":".$_POST['comment'];
        $current .= "\n".$commentToPost;
        file_put_contents($file, $current);



    }
    include $_SERVER['QUERY_STRING'].".php";
}
?>
