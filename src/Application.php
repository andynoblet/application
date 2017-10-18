<?php
// Autoload
require_once("../vendor/autoload.php");

class Application extends \Application\Model\Application {
    use Application\Library\Common;

    public function Start() {
        $this->getModule("Session")->createSession();
        $Output = $this->getModule("Controller")->Execute();
        print $Output;

        return;
    }

}

    // Set base
    define("BASE", __DIR__);

    // Autoload
    require_once("../vendor/autoload.php");

    // Start
    Application::getInstance()->Start();
?>
