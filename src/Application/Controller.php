<?php
namespace Application;

trait Controller
{
    public function View($View, $Data = null) {
        // Module views
        $Class = get_called_class();
        $Parts = explode("\\", $Class);
        array_splice($Parts, -2, 2);

        $Class = implode("\\", $Parts);
        $Class = str_replace("\\", DIRECTORY_SEPARATOR, $Class);

        $File = BASE . DIRECTORY_SEPARATOR . $Class . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . $View;

        if(is_file($File));
        else {
            $File = BASE . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . $View;
        }

        ob_start();
        if(is_file($File)) {
            include($File);
        }
        $HTML = ob_get_contents();
        ob_end_clean();

        return $HTML;
    }
}

?>
