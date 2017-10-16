<?php
    // Set base
    define("BASE", __DIR__);

    // Set Path


    define("App_URL", $_SERVER['REQUEST_URI']);


    // Autoload
    require_once(__DIR__ . "/vendor/autoload.php");

    // Start
    Application::Start();
?>
