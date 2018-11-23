<?php
require './resources/fragments/init.php';
session_start();
$_SESSION = array();
session_destroy();
include VIEWS.'index.php';
 ?>
