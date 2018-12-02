<?php

namespace Chat\Model;

/**
 * Holds a singular entry of a error message
 */
class ErrorEntry {
  private $errorType;
  /**
   * Constructs a new, not deleted, entry with the timestamp set to the time when this constructor is called.
   */
  public function __construct($errorType, $message) {
      $this->errorType = $errorType;
  }
  /**
   * @return string the error type
   */
  public function getErrorType(){
    return $this->errorType;
  }
}
