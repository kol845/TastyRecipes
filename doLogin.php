<?php

/**
 * Checks if the login input matches the a account in the database, if it does then
 * a session will be started as a logged in user.
 */

namespace Chat\View;
use \Chat\Util\Util;
use Chat\Controller\SessionManager;
require_once 'classes/Chat/Util/Util.php';
Util::initRequest();
$controller = SessionManager::getController();

//Password must contain at least one number
if (empty($_POST[CHAT_USERNAME_KEY]) or empty($_POST[CHAT_PASSWORD_KEY])){
    echo "unsuccessful";
    exit();
}
if(!(1 === preg_match('~[0-9]~', $_POST[CHAT_PASSWORD_KEY]))){
  $controller->setError(CHAT_ERROR_NONUMERICALVALUE_KEY);
  SessionManager::storeController($controller);
  echo "unsuccessful";
  exit();
}
$username =htmlentities($_POST[CHAT_USERNAME_KEY],ENT_QUOTES);
$password = htmlentities($_POST[CHAT_PASSWORD_KEY],ENT_QUOTES);


$users = $controller->getUsers();

$loginSuccess = false;


foreach($users as $user){
  if($user->getUsername()==$username and password_verify($password, $user->getPassword())){
    $loginSuccess = true;
    $controller->login($username);
    break;
  }
}
if(!$loginSuccess){
  echo "unsuccessful";
}
else{
    echo"successful";
}


SessionManager::storeController($controller);
