<?php

namespace Chat\Util;

/**
 * Responsible for initialization common to different requests.
 */
class Startup {
    public const CONST_PREFIX = 'CHAT_';

    /**
     * Performs all initialization that must be done before request handling starts.
     */
    public static function initRequest() {
        self::createConstants();
        session_start();
        self::createClassLoader();
    }

    private static function createConstants() {
        self::createConstant('USERNAME_KEY', 'username');
        self::createConstant('PASSWORD_KEY', 'password');
        //self::createConstant('ENTRY_DELIMITER', ";\n");
        self::createConstant('VIEWS', './resources/views/');
        self::createConstant('FRAGMENTS', 'resources/fragments/');
    }

    private static function createConstant($name, $value) {
        define(self::CONST_PREFIX . $name, $value);
    }

    private static function createClassLoader() {
        spl_autoload_register(function ($className) {
            require_once 'classes/' . \str_replace('\\', '/', $className) . '.php';
        });
    }

}
