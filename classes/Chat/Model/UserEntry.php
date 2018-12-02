<?php

namespace Chat\Model;

/**
 * Holds a singular entry of a user
 */
class UserEntry {

    private $username;
    private $password;


    /**
     * Constructs a new user with a username and password
     */
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    /**
     * @return string The userName.
     */
    public function getUsername() {
        return $this->username;
    }
    /**
     * @return string The password.
     */
    public function getPassword() {
        return $this->password;
    }

}
