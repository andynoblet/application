<?php

namespace Application\Module {

    class User extends \Application\Module {
        public function Index() {
            return $this->Login();
        }

        public function Login() {
            $Request = $this->getRequest();
            $User = $this->getModel("User");
            if (isset($Request['Arguments']['Email'])) {
                $User->setEmail($Request['Arguments']['Email']);
            }
            if (isset($Request['Arguments']['Password'])) {
                $User->setPassword($Request['Arguments']['Password']);
            }

            $Error = null;

            $Email = $User->getEmail();
            if (isset($Email)) ;
            else {
                $Error = "No email given.";
            };
            $Password = $User->getPassword();
            if (isset($Password)) ;
            else {
                var_dump($User->getPassword());
                $Error = "No password given.";
            }

            $User->Error = $Error;

            $View = $this->getView("Login.phtml", array("User" => $User));

            return $View;
        }

        protected function Info() {
            $User = $this->getModel("User");
            $View = $this->getView("User.phtml", array("User" => $User));

            return $View;
        }
    }
}

?>