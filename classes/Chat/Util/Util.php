<?php

namespace Chat\Util;

final class Util {

    const SYMBOL_PREFIX = "CHAT_";

    private function __construct() {

    }

    /**
     * This function should be called first in any PHP page receiving a HTTP request.
     */
    public static function initRequest() {
        spl_autoload_register(function ($class) {
            require_once 'classes/' . \str_replace('\\', '/', $class) . '.php';
        });

        session_start();
        self::defineConstants();
    }

    private static function defineConstants() {
        self::defineConstant('COMMENT_KEY', 'comment');
        self::defineConstant('USERNAME_KEY', 'username');
        self::defineConstant('PASSWORD_KEY', 'password');
        self::defineConstant('ERROR_BADWORD_KEY', 'badword');
        self::defineConstant('ERROR_NONUMERICALVALUE_KEY', 'noNummericalValue');
        self::defineConstant('VIEWS', 'resources/views/');
        self::defineConstant('FRAGMENTS', 'resources/fragments/');
        self::defineConstant('CONTROLLER', 'resources/Controller/');
    }

    private static function defineConstant($param, $value) {
        define(self::SYMBOL_PREFIX . $param, $value);
    }

}
