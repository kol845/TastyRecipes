<?php

/**
 * Logs out the current user
 */

 namespace Chat\View;
 use \Chat\Util\Util;
 use Chat\Controller\SessionManager;
 require_once 'classes/Chat/Util/Util.php';
 Util::initRequest();

$controller = SessionManager::getController();
$controller->logout();
SessionManager::destroySession();


SessionManager::storeController($controller);
header("Location:".CHAT_VIEWS.'home.php');
