<?php

include("Library/autoload.php");

class CreateTable {
    function Create() {
        $Model = new \Application\Model\User;
        $Schema = $Model->getSchema();

        $Query = "CREATE TABLE {$Schema["Table"]} (";

        foreach($Schema["Columns"] as $Column)
        {
            $Query .= "{$Column} {$Column['Type']}({$Column['Length']})";
        }

        $Query .= ")";
var_dump($Query);
    }
}
include ("Model/User.php");

$Class = new CreateTable();
$Class->Create();
?>
