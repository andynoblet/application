<?php

namespace Application;

trait Base {
    public function Request() {
        $Request['Arguments'] = $_REQUEST;
        return $Request;
    }

    public function Module($Module) {
        $Class = "\\Application\\Module\\" . $Module;

        return new $Class;
    }

    public function getModel($Model = null) {
        $Class = "\\Application\\Model\\" . $Model;
        return new $Class;
    }

    public function Controller($Controller) {
        $Root = get_called_class();
        $Class = $Root . "\\Controller\\" . $Controller;
        $Controller = $Class::getInstance();
        if (class_exists($Class)) {
            $Controller = $Class::getInstance();
        } else {
            $Class = "\\Application\\Controller\\" . $Controller;
            // $Controller = $Class::getInstance();
        }
        return $Controller;
    }

    public static function getConfiguration($Configuration) {
        if($Configuration == "ToolbarPosition") {
            return "Bottom";
        }
        if($Configuration == "ToolbarX") {
            return "Right";
        }
    }
}

?>