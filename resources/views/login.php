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
</head>
<body>

  <?php
  $pageNumber = 4;
  include 'resources/fragments/header.php';
  ?>

<div class = "mainLogin">
    <h1>Sign in</h1>
    <form action="/doLogin.php" method="post">
        <a>Username: <input type="text" name="username"></a>
        <a>Password: <input type="password" name="password"></a>
        <a><input type="submit"></a>
    </form>
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
