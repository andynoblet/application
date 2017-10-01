<?php

namespace Application\Model;

class User {


    public $FirstName;
    public $LastName;
    public $Email;

    // use \Application\Model;

    public function getSchema() {
        $Schema = [
            "Table" => "User",
            "Columns" => [

            [
                "Name" => "FirstName",
                "Type" => "varchar",
                "Length" => 25
            ],
            [
                "Name" => "LastName",
                "Type" => "varchar",
                "Length" => 25
            ],
            [
                "Name" => "Email", 
                "Type" => "varchar",
                "Length" => 25
            ]
           ]];

        return $Schema;
    }
}
?>
