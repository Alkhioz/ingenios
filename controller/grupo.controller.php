<?php
require_once 'model/grupo.php';

class grupoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new grupo();
        
    }
    
    public function Index(){
        header('Location: /usuario/grupo');
    }

    public function Agregar(){   
        $grupo = new grupo();
        $grupo->id_proyecto = $_REQUEST['submit'];
         
        $this->model->RegistrarGrupo($grupo);

        header('Location: /usuario/grupo');

    }
    public function Eliminar(){   
        $grupo = new grupo();
        $grupo->id_proyecto = $_REQUEST['submit'];
         
        $this->model->EliminarGrupo($grupo);

        header('Location: /usuario/grupo');

    }
   

}