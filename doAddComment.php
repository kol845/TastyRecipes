<?php

/**
 * Adds a comment
 */

namespace Chat\View;
use \Chat\Util\Util;
use Chat\Controller\SessionManager;
require_once 'classes/Chat/Util/Util.php';
Util::initRequest();

$receipePage = $_SERVER['QUERY_STRING'];
$controller = SessionManager::getController();

//If the user is not logged in
if(!$controller->isLoggedIn()){
    header("Location:".CHAT_VIEWS."login.php");
    exit();
}
$commentToAdd = htmlentities($_POST[CHAT_COMMENT_KEY],ENT_QUOTES);

$badWords = array("fucktrumpet", "knobhead","pissflaps", "happy christmas","twat","shitbag","cocknose");
$matches = array();
$matchFound = preg_match_all(
                "/\b(" . implode($badWords,"|") . ")\b/i",
                $commentToAdd,
                $matches
              );

if($matchFound){
  $controller->setError(CHAT_ERROR_BADWORD_KEY);
  SessionManager::storeController($controller);

  header("Location:".CHAT_VIEWS.$receipePage.".php");
  exit();
}


if(empty($commentToAdd)){
  header("Location:".CHAT_VIEWS.$receipePage.".php");
  exit();
}


$controller->addComment($receipePage, $commentToAdd);
SessionManager::storeController($controller);

header("Location:".CHAT_VIEWS.$receipePage.".php");
