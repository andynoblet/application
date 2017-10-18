<?php
namespace Application;

use Application\Database;
use Application\Module\Application;

class CreateTable {
    protected $link;

    public function __construct() {
        $this->Connect();
    }

    function Connect() {
        $this->link = mysqli_connect("mysql", "user", "password", "Application" );

    }
    function Create() {
        $Database = Database::getInstance();
        $Model = Application::getInstance()->getModule("User")->getModel("User");
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
include("vendor/autoload.php");

$Class = new CreateTable();
$Class->Create();
?>
