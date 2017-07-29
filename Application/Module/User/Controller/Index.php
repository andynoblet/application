<?php
namespace Application\Module\User\Controller;

use Application;
use Application\Module\User;
use \Application\Module\Database;

class Index extends \Application\Controller  {
    public function Index() {
        return $this->Login();
    }

    public function Login() {
        $Request = $this->getRequest();
        $User = User::getStaticModel("User");

        $Error = null;

        if (!empty($Request['Arguments']['Email'])) {
            $User->setEmail($Request['Arguments']['Email']);
        } else {
            $Error = "No email given.";
        }
        if (!empty($Request['Arguments']['Password'])) {
            $User->setPassword($Request['Arguments']['Password']);
        } else {
            $Error = "No password given.";
        }

        $Database = $this->getModule("Database");
        $Query = $Database->createQuery();
        $Query->setAction("Select");
        $Query->setFields("*");
        $Query->setTable("User");
        $Query->setArguments(array("Email" => $User->getEmail(), "Password" => $User->getPassword()));
        // var_dump($Query);

        $Connection = $Database->Connect();

        $Query = "SELECT * FROM `User` WHERE `Email` = '{$User->getEmail()}' AND `Password` = '{$User->getPassword()}'";
        $Resource = mysqli_query($Connection, $Query);
        $Result = mysqli_fetch_array($Resource, MYSQLI_ASSOC);

        if ($Result) {
            $_SESSION['User'] = true;
        } else {
            $Message = "Invalid username and/or password.";
        }

        if ($this->getModule("Session")->isUserLoggedIn()) {
            return $this->MyAccount();
        }

        $View = User::getStaticView("Login.phtml", array("User" => $User));


        return $View;
    }

    public function MyAccount() {
        if (!$this->getModule("Session")->isUserLoggedIn()) {
            $Controller = $this->getModule("Controller");
            $Controller->setPath("/User/Login");
            return $Controller->Execute();
        } else {
            $View = User::getStaticView("MyAccount.phtml");
        }
        return $View;
    }

    public Function Logout() {
        unset($_SESSION['User']);
        session_destroy();
        $View = $this->getModule("Controller")->setPath("/User/Index/Login")->Execute();

        return $View;
    }

    public function Register() {
        $User = $this->getModel("User");

        $View = $this->getView("Register.phtml", array("User" => $User));

        return $View;
    }

    protected function Info() {
        $User = $this->getModel("User");
        $View = $this->getView("User.phtml", array("User" => $User));

        return $View;
    }
}
?>