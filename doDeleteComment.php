<?php

/**
 * Removes a comment
 */

namespace Chat\View;
use \Chat\Util\Util;
use Chat\Controller\SessionManager;
require_once 'classes/Chat/Util/Util.php';
Util::initRequest();

$receipePage = $_SERVER['QUERY_STRING'];
foreach($_POST as $k => $v){
  $commentToRemove = $k;
  $controller = SessionManager::getController();
  $controller->deleteComment($receipePage,$commentToRemove);
  SessionManager::storeController($controller);
  header("Location:".CHAT_VIEWS.$receipePage.".php");
}
