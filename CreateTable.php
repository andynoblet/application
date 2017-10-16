<?php
namespace Application;

use Database;

class CreateTable {
    function Create() {
        $Database = Database::getInstance();
        $Model = new \Application\Model\User;
        $Schema = $Model->getSchema();

        $Query = "CREATE TABLE {$Schema["Table"]} (";

        for($i = 0; $i < count($Schema["Columns"]); $i++)
        {
            $Column = $Schema["Columns"][$i];
            $Query .= "{$Column["Name"]} {$Column['Type']}({$Column['Length']})";
            if($i == count($Schema["Columns"])-1);
            else {
                $Query .= ", ";
            }
        }

        $Query .= ")";
        var_dump($Query);
    }
  }
include("Library/autoload.php");
include ("Model/User.php");

$Class = new CreateTable();
$Class->Create();
?>
