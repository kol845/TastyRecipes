<?php

namespace Chat\Controller;

use \Chat\Controller\Controller;

/**
 * Stores and retrieves session data.
 */
class SessionManager {

    /**
     * Returns the controller
     *
     * @return Controller the session controller
     */
    public static function getController() {
        if (isset($_SESSION['controller'])) {
            return unserialize($_SESSION['controller']);
        } else {
            return new Controller();
        }
    }

    /**
     * Replaces the session controller with a new controller
     *
     */
    public static function destroySession() {
      $_SESSION = array();
      session_destroy();
    }


    /**
     * Stores a given Controller in the session
     * @param Controller the controller that is to be stored in the session
     */
    public static function storeController(Controller $controller) {
        $_SESSION['controller'] = serialize($controller);
    }

}
