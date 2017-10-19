<?php
// Autoload
require_once("../vendor/autoload.php");

// Set path
$Parts = explode("/", str_replace($_SERVER['DOCUMENT_ROOT'], null, $_SERVER['SCRIPT_FILENAME']));
array_pop($Parts);
$Path = implode("/", $Parts);

define("PATH", $Path . "/");
define("PATH_NO_TRAIL", $Path);

class Application extends \Application\Model\Application {
    use Application\Base;
    use Application\Library\Common;

    public function Start() {
        $this->getModule("Session")->createSession();
        $Output = $this->getModule("Controller")->Execute();

        print $Output;

        return;
    }

    public static function getURL($Path = null) {
        $URL = PATH . $Path;

        return $URL;
    }

}

    // Set base
    define("BASE", __DIR__);

    // Autoload
    require_once("../vendor/autoload.php");

    // Start
    Application::getInstance()->Start();
?>
