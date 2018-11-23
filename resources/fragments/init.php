<?php

/*
 * This code must be executed before a HTTP request can be handled.
 */

use Chat\Util\Startup;
require_once 'classes/Chat/Util/Startup.php';
Startup::initRequest();
require './resources/fragments/init.php';
?>
