<?php 

/**
 * undocumented class
 */
class ControladorCursos {

    public function index()
    {

        $cursos= ModeloCursos::index("cursos");
        $json=array(
            "datalle"=>$cursos,
        );
        echo json_encode($json,true);
        return;
    }

    public function create()
    {
        $json=array(
            "datalle"=>"estas en la ruta cursos-create"
        );
        echo json_encode($json,true);
        return;
    }



    public function show($id)
    {
        $json=array(
            "datalle"=>"este es el curso con el id....".$id
        );
        echo json_encode($json,true);
        return;
    }


    public function update($id)
    {
        $json=array(
            "datalle"=>"curso actualizado....".$id       
        );
        echo json_encode($json,true);
        return;
    }


    public function delete($id)
    {
        $json=array(
            "datalle"=>"curso con el id ".$id." ha sido eliminado...."      
        );
        echo json_encode($json,true);
        return;
    }
    
    
}


?>