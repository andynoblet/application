<?php

namespace Application\Module\Database;
use Application\Module\Database;
trait Persistent {
    public function Save() {
        $Database = Database::getInstance();
        $Query = $Database->createQuery();
        if($Database->Load($this::TABLE, $this));
        else {
            foreach($this as $Property => $Valuee) {
                print $Property;
            }
        }
        var_dump($Me);
    }
}

?>