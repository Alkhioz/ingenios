<?php
require_once 'model/proyecto.php';

class proyectoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new proyecto();
        
    }
    
    public function Index(){
        header('Location: /usuario/proyecto');
    }

    public function Agregar(){   
        $proyecto = new proyecto(); 
        $proyecto->Nombre =  $_REQUEST['Nombre'];
        $proyecto->Fecha =  date('Y-m-d',time());
        $proyecto->Objetivo =  $_REQUEST['Objetivo'];
        $proyecto->Descripcion =  $_REQUEST['Descripcion'];
         
        $this->model->RegistrarProyecto($proyecto);

        header('Location: /usuario/proyecto');

    }

    public function Eliminar(){   
        $proyecto = new proyecto(); 
        $proyecto->id =  $_REQUEST['submit'];
         
        $this->model->EliminarProyecto($proyecto);

        header('Location: /usuario/proyecto');

    }   
   

}