<?php

namespace Application\Library;

trait Common {
    static $Singleton = false;

    public static function getInstance() {
        if(static::$Singleton) {
            return self::getSingleton();
        }
        else {
            return new self;
        }
    }

    public static function getSingleton() {
        if (isset(static::$instance)) ;
        else {
            static::$instance = new static;
        }
        return static::$instance;
    }

    public function getModule($Module) {
        $Class = "\\Application\\Module\\" . $Module;

        return $Class::getInstance();
    }
}

?>