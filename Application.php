<?php
// Autoload
require_once("Autoload.php");
spl_autoload_register("Autoload");

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$Parts = explode("/", $_SERVER['SCRIPT_NAME']);
array_pop($Parts);
$Base = implode("/", $Parts);
$Base = $Base . "/";
define("BASE", $Base);

// Application Start
$Application = Application::getSingleton();
$Application->Start();
?>

<?php
class Application
{
    protected static $resource;

    protected function __construct() {
    }

    protected function Autoload($class) {
        $class = strtolower($class);
        $file = $class . ".php";
        if (file_exists($file)) {
            include($file);
        }
    }

    public static function getSingleton() {
        if(isset(static::$resource));
        else {
            static::$resource = new Application;
        }

        return static::$resource;
    }

    public function getClass() {
        return get_called_class();
    }

    public function getModule($Module) {
        $Module = "Application\\Module\\" . $Module;
        return new $Module;
    }

    public function getModel($Model = null) {
        $Class = get_called_class();
        $Model = "$Class\\Model\\$Model";
        $Model = new $Model;

        return $Model;
    }

    protected function getView($View, $Data = null) {
        $View = $this->Template($View, $Data);

        return $View;
    }

    protected function getRequest() {
        $Parts = explode("/", $_SERVER['SCRIPT_NAME']);
        array_pop($Parts);
        $Base = implode("/", $Parts);
        $Path = str_replace($Base, null, $_SERVER['REQUEST_URI']);

        $Parts = explode("/", $Path);
        if(isset($Parts[1])) {

        }

        if ($Path == "/") {
            $Request = null;
        }
        else {
            $Parts = explode("/", $Path);
            $Request['Module'] = $Parts[1];
            if(isset($Parts[2])) {
                $Request['Function'] = $Parts[2];
            }
            else {
                $Request['Function'] = "Index";
            }
        }

        return $Request;
    }

    protected function getURL($Path = null) {
        $URL = BASE . $Path;

        return $URL;
    }

    public function getInterface() {

    }

    public function Template($Template = null, $Data = array()) {
        if(isset($Template));
        else {
            $Template = $this->__getClass();
        }

        $Class = get_called_class();
        $Parts = explode("\\", $Class);
        $Count = count($Parts);
        if($Parts[$Count-2] == "Model") {
            array_splice($Parts, -2, 2);
            $Class = implode("\\", $Parts);
        }
        $Class = str_replace("\\", DIRECTORY_SEPARATOR, $Class);
        $File = $Class . DIRECTORY_SEPARATOR . "Template" . DIRECTORY_SEPARATOR . $Template;

        ob_start();
        if(isset($Data)) {
            extract($Data);
        }
        include($File);
        $HTML = ob_get_contents();
        ob_get_clean();

        return $HTML;
    }

    public function Start()
    {
        $Request = $this->getRequest();
        if($Request['Module']) {
            if($Request['Function']) {
                $Function = $Request['Function'];
            }
            else {
                $Function = "Index";
            }
            $Output = $this->getModule($Request['Module'])->$Function();
        }
        else {
            $Output = $this->getModel("Application")->getView("Application.phtml");
        }

        print $Output;
    }
}
?>
