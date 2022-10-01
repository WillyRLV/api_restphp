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


    public function create($datos)
    {

        #nombre..
        if (isset($datos["nombre"]) && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/',$datos["nombre"])) {
            

        $json=array(
            "status"=>404,
            "datalle"=>"error en el campo del nombre permitido solo letras"
        );

        echo json_encode($json,true);
        return;

        }

        #apellido...
        if (isset($datos["apellido"]) && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/',$datos["apellido"])) {
            

            $json=array(
                "status"=>404,
                "datalle"=>"error en el campo del apellido permitido solo letras"
            );
    
            echo json_encode($json,true);
            return;
    
            }

        #email...
        if (isset($datos["email"]) && !preg_match( '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$datos["email"])) {
            

            $json=array(
                "status"=>404,
                "datalle"=>"error en el campo del email permitido solo letras"
            );
    
            echo json_encode($json,true);
            return;
    
            }

     
    }
    
}

?>