<?php
// Set path
$Script = str_replace($_SERVER['DOCUMENT_ROOT'], null, $_SERVER['SCRIPT_FILENAME']);
$Parts = explode("/", $Script);
array_pop($Parts);
$Path = implode("/", $Parts);

define("PATH", $Path . "/");
define("PATH_NO_TRAIL", $Path);

require_once("../src/Application.php");
?>
