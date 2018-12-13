<?php

namespace Chat\Integration;
use Chat\Model\UserEntry;
/**
 * Handles the storing and retrieving user login data
 */
class UserHandler {
  /**
   * @return array All the user entries(username and password) in the form of a array of UserEntry objects
   */
  public static function getUsers(){
    error_reporting(0);
    $file = "./database/logindata.txt";
    $users = array();
    $document = file_get_contents($file);
    $lines = explode("\n",$document);
  	foreach($lines as $loginEntity){

  		$logindata = explode(":",$loginEntity);
  		$logindata[1] =preg_replace('/\s+/', '', $logindata[1]);
      if(!empty($logindata[0])){
        $user = new UserEntry($logindata[0],$logindata[1]);
        array_push($users,$user);
      }
  	}
    return $users;
}
}
