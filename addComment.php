<?php
session_start();
if(!(isset($_SESSION['loggedin']) and $_SESSION['loggedin'] == true)){
    include "login.php";
}

else{
    if (isset($_POST['comment']) and !empty($_POST['comment'])) {
        if($_SERVER['QUERY_STRING'] == "recipe1"){
            $file = "./database/receipe1data.txt";
            $pathBack = "recipe1.php";
        }
        else{
            $file = "./database/receipe2data.txt";
            $pathBack = "recipe2.php";
        }
        $current = file_get_contents($file);
        $commentToPost = $_SESSION['username'].":".$_POST['comment'];
        $current = $commentToPost."\n".$current;
        file_put_contents($file, $current);



    }
    header("Location:".$pathBack);
    exit();
}
?>
