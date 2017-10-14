<?php
namespace Application;

trait Base {
    public function Request() {
        $Request['Arguments'] = $_REQUEST;
        return $Request;
    }
    public function Module ($Module) {
        $Class = "\\Application\\Module\\" . $Module;

        return new $Class;
    }
  public function getModel($Model = null) {
      $Class = "\\Application\\Model\\" . $Model;
      return new $Class;
  }
  public function Controller($Controller) {
        $Class = "\\Application\\Controller\\" . $Controller;
        return new $Class;
  }
  public static function getInstance() {
        return new self;
  }
}
?>