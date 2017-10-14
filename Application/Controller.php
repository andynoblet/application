<?php
namespace Application;

trait Controller
{  
    public function View($View, $Data = null) {
        ob_start();
        if(isset($Data)) {

        }
        include(BASE . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . $View);
        $HTML = ob_end_flush();
    }
}

?>
