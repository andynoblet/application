class CreateTable {
    function Create() {
        $Model = new \Application\Model\User;
        $Schema = $Model->getSchema();

        $Query = "CREATE TABLE " . $Schema["Table"] ."(";

        foreach($Schema["Columns"] as $Column)
        {
            $Query .= $Column;
        }

        $Query .= 
    }
}
