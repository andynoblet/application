<?php
    // Set base
    define("BASE", __DIR__);

    // Autoload
    require_once("../vendor/autoload.php");

    // Start
    Application::getInstance()->Start();
?>
