<?php
    // Set base
    define("BASE", __DIR__);

    // Set Path
    $Name = str_replace($_SERVER['DOCUMENT_ROOT'], null, $_SERVER['SCRIPT_FILENAME']);
    $Parts = explode("/", $Name);
    array_pop($Parts);
    $Path = implode("/", $Parts);
    $Path = $Path . "/";
    define("PATH", $Path);

    require_once("Library/autoload.php");
    Application::Start();
