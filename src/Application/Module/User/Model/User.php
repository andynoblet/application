<?php

namespace Application\Module\User\Model;

class User extends \Application\Model {
    protected $FirstName = "Andy";
    protected $LastName = "Noblet";
    protected $Email;
    protected $Password;

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