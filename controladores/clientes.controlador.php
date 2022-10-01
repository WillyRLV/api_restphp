<?php 


class ControladorClientes {

    public function index()
    {
        $json=array(
            "datalle"=>"estas en la ruta registro"
        );
        echo json_encode($json,true);
        return;
    }
    
}

?>