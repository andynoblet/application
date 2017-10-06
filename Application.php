<?php
    // Set base
    define("BASE", __DIR__);

    // Set Path
    $Name = str_replace($_SERVER['DOCUMENT_ROOT'], null, $_SERVER['SCRIPT_FILENAME']);
    define("PATH", $Path);

    // Autoload
    require_once("Library/autoload.php");

    // Start
    Application::Start();
?>
