<?php
$Name = str_replace($_SERVER['DOCUMENT_ROOT'], null, $_SERVER['SCRIPT_FILENAME']);
$Name = explode("/", $Name);
array_pop($Name);
$Name = implode("/", $Name);
define("PATH", $Name);

require_once("../Application.php");
?>
