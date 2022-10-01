<?php 

//explode:mapea la ruta
$arrayRutas = explode("/",$_SERVER['REQUEST_URI']);

// echo $_SERVER['REQUEST_URI'];

//esto muestra las rutas en modo de indices
//echo "<pre>"; print_r($arrayRutas);  echo "<pre>";
//=====




if (count(array_filter($arrayRutas))==1) {
           /*Cuando no se hace ninguna peticion a la API */

    $json=array(
        "datalle"=>"no encontrado"
    );
    echo json_encode($json,true);
    return;
}


else{

          /*Cuando se pasa un indice en e larray $arrayRutas */


    if (count(array_filter($arrayRutas))==2) {

          /*Cuando hago peticiones dese cursos */


            if (array_filter($arrayRutas)[2]=='cursos') {

                    /*esta linea evalua si el  requerimiento es de tipo POST*/
                    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="POST") {
                    /*====================================================*/
                    $cursos = new ControladorCursos();
                    $cursos->create();
                    }


                    elseif (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="GET") {
                        
                    $cursos = new ControladorCursos();
                    $cursos-> index();
                    }



        
            }

    
            /*Cuando hago peticiones desde registro*/
            if (array_filter($arrayRutas)[2]=='registro') {

        
            
                    /*esta linea evalua si el  requerimiento es de tipo GET*/
                    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="GET") {
                    /*====================================================*/
                    $cursos = new ControladorClientes();
                    $cursos-> index();

                    }
                    /*esta linea evalua si el  requerimiento es de tipo POST*/
                    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="POST") {

                    $datos = array("nombre"=>$_POST["nombre"],
                             "apellido"=>$_POST["apellido"],
                             "email"=>$_POST["email"]);
                    /*====================================================*/
                    $clientes = new ControladorClientes();
                    $clientes->create($datos);
                    }
            }
    }



            /*===================
            Peticion GET por ID
             ===================*/
    
    else {

        if (array_filter($arrayRutas)[2]=='cursos' && is_numeric(array_filter($arrayRutas)[3])) {
            /*===================
            Peticion GET 
             ===================*/
             if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="GET") {

                $curso = new ControladorCursos();
                $curso-> show(array_filter($arrayRutas)[3]);
                }


            /*===================
            Peticion PUT 
             ===================*/
             if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="PUT") {

                $editarCurso = new ControladorCursos();
                $editarCurso-> update(array_filter($arrayRutas)[3]);
                }

                
             /*===================
            Peticion DELETE
             ===================*/
             if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="DELETE") {

                $eliminarCurso = new ControladorCursos();
                $eliminarCurso-> delete(array_filter($arrayRutas)[3]);
                }



        }
    }


}

?>