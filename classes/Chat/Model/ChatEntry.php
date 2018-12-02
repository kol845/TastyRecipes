<?php

namespace Chat\Model;

/**
 * Holds a singular entry of the chat
 */
class ChatEntry {

    private $userName;
    private $message;


    /**
     * Constructs a new ChatEntry
     */
    public function __construct($userName, $message) {
        $this->userName = $userName;
        $this->message = $message;
    }
    /**
     * @return string The userName of the author
     */
    public function getUserName() {
        return $this->userName;
    }
    /**
     * @return string The message.
     */
    public function getMessage() {
        return $this->message;
    }

}
