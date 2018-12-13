<?php

/**
 * Removes a comment
 */

namespace Chat\View;
use \Chat\Util\Util;
use Chat\Controller\SessionManager;
require_once 'classes/Chat/Util/Util.php';
Util::initRequest();

$receipePage = $_POST['pageNumber'];
$commentToRemove = $_POST['commentLine'];
$controller = SessionManager::getController();
$controller->deleteComment($receipePage,$commentToRemove);
SessionManager::storeController($controller);
echo $commentToRemove.":".$receipePage;
