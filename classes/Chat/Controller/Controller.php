<?php

namespace Chat\Controller;

use Chat\Integration\ChatHandler;
use Chat\Integration\UserHandler;

/**
 * The controller handels all the calls from view to model
 */
class Controller {
    private $chatHandler;
    private $userHandler;
    private $username;
    private $error;
    /**
     * Constructs a new instance.
     */
    public function __construct() {
        $this->chatHandler = new ChatHandler();
        $this->userHandler = new UserHandler();
    }
    /**
   * Calles the ChatHandler to add a comment to the database
   * @param userName name of the authour
   * @param message the message that was written by the user
   */
    public function addComment($receipePage,$message) {
        $this->chatHandler->addComment($receipePage, $this->username, $message);
    }
    /**
   * @return array All the comment entries in a array of ChatEntry objects
   */
    public function getComments($receipePageNumber) {
        return $this->chatHandler->getCommentEntries($receipePageNumber);
    }
    /**
     * Delete a comment from the database
     *
     * @param int the line number of the comment in the database that that is to be removed.
     */
    public function deleteComment($receipePage,$commentToRemove) {
        $this->chatHandler->deleteComment($receipePage,$commentToRemove);
    }
    /**
     * Get all the login entries from the login database
     *
     * @return array All the user entries(username and password) in the form of a array of UserEntry objectsy
     */
    public function getUsers() {
        return $this->userHandler->getUsers();
    }

    /**
   * Logg into a account
   *
   * @param string the username of the account that is to be logged in
   */
  public function login($username) {
      $this->username = $username;
  }
  /**
 * Logout of the current account
 *
 */
public function logout() {
    $this->username = NULL;
}
/**
* Check if the user is logged into a account
* @return boolean logged in Y/N
*/
public function isLoggedIn() {
  if(isset($this->username)){
    return true;
  }
  return false;
}

  /**
   * @return string the current users username
   */
  public function getUsername() {
      return $this->username;
  }
  /**
   * a error is storred in the controller to let the user know what whent wrong
   * @param string the error type that will be stored
   */
  public function setError($errorType) {
      $this->error = $errorType;
  }
  /**
   * the storred error is returned, if nun exist, then null is returned. After this the error value int then
   * controller is sett to null
   * @return string the error that was stored in the controller
   */
  public function getError() {
      $errorToSend = $this->error;
      $this->error = NULL;
      return $errorToSend;
  }
  }
