
<?php
require './resources/fragments/init.php';
$commentToRemove = 0;
foreach($_POST as $k => $v)
   $commentToRemove = $k;

   if($_SERVER['QUERY_STRING'] == "recipe1"){
       $file = "./database/receipe1data.txt";
       $pathBack = "recipe1.php";
   }
   else{
       $file = "./database/receipe2data.txt";
       $pathBack = "recipe2.php";
   }
   $current = file_get_contents($file);
   $lines = explode("\n",$current);
   $index = 0;
   $returnString = "";
   foreach($lines as $l){
     if(!("".$index=="".$commentToRemove)){
      $returnString.=$l."\n";
      echo $l."<br>";
    }
    $index+=1;
   }
   file_put_contents($file, $returnString);

   header("Location:".VIEWS.$pathBack);
   exit();




?>
