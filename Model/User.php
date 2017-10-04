<?php

namespace Application\Model;

class User extends \Application\Model {
 
  
    public $FirstName;
    public $LastName;
    public $Email;

    protected $Schema = [
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
        ]
    ];
}
?>
