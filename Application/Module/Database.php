<?php

namespace Application\Module {
    class Database extends \Application\Module {
        public function Connect() {
            $Connection = $this->getModel("Connection");
            $Connection->setUser("root");
            $Connection->setPassword ("123");
            $Connection->setDatabase("application");

            $Connection = mysqli_connect("localhost",$Connection->getUser(), $Connection->getPassword(), $Connection->getDatabase());

            return $Connection;
        }

        public function Load($Table, $Data = null) {
            $Connection = $this->Connect();
            if(isset($Data)) {
                foreach($Data as $Key => $Value) {
                    $Array[] = array('Key' => $Key, 'Value' => $Value);
                }
            }
            $Query = "SELECT * FROM `{$Table}'`";
            if(isset($Array)) {
                $Query .= "WHERE ";
                for($i=0;$i <= count($Array); $i++) {
                    $Query .= $Array[$i]['Key'] . "=" . $Array[$i]['Value'];
                    if($i == count($Array));
                    else {
                        $Query .= " AND ";
                    }
                }
            }
            print $Query;
            mysqli_query($Connection, $Query);
        }

        public function createQuery() {
            return $this->getModel("Query");
        }
        public function Execute($Query) {
            $Connection = $this->Connect();
            $String = "{$Query->getAction()} {$Query->getFields()} FROM {$Query->getTable()}";
            if($Query->getArguments()) {
                $String .= " WHERE ";
                foreach($Query->getArguments() as $Argument => $Value) {
                    $String .= "`{$Argument}` = '{$Value}''";
                }
            }
            var_dump($String);
            $Resource = mysqli_query($Connection, $String);
            print mysqli_error($Connection);
        }
    }
}

?>