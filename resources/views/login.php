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
    <link rel="stylesheet" type="text/css" href="/resources/css/login.css">
    <meta charset="UTF-8">
    <title>Home</title>
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $("#login").click(function(){
                var usernamePost = $( "input[name = username]" ).val();
                var passwordPost = $( "input[name = password]" ).val();
                $.post("/doLogin.php",{
                    username:usernamePost,
                    password:passwordPost
                },function(data,status){
                    if(data == "successful"){
                        $(".mainLogin").html("<h1>Loggin successful!</h1>");
                    }
                });



            });
        });

    </script>









</head>
<body>

  <?php
  $pageNumber = 4;
  include 'resources/fragments/header.php';
  ?>

<div class = "mainLogin">
    <h1>Sign in</h1>

        <a>Username: <input type="text" name="username"></a>
        <a>Password: <input type="password" name="password"></a>
        <a><button id = "login">Login</button></a>



    <?php
      $error = $controller->getError();
      if(!empty($error)){
        $errorMessage;
        if($error == CHAT_ERROR_NONUMERICALVALUE_KEY){
          $errorMessage = "Warning: The password must contain at least one \"Numerical Value\"";
        }
        echo "<p class = \"errorMessage\">".$errorMessage."</p>";
        SessionManager::storeController($controller);
      }
    ?>
</div>



</body>
</html>
