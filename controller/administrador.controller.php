<?php
require_once 'model/usuario.php';
require_once 'model/proyecto.php';
require_once 'model/grupo.php';



class administradorController{
    
    private $model;
    private $proyecto;
    private $grupo;

    public function __CONSTRUCT(){
        $this->model = new usuario();
        $this->proyecto = new proyecto();
        $this->grupo = new grupo();
    }
    
    public function Index(){
        
        header('Location: /administrador/grupo');
    }

    public function Grupo(){
        require_once 'view/header.php';
        require_once 'view/administrador/administrador.php';
        require_once 'view/administrador/administrador-grupo.php';
        require_once 'view/administrador/administrador-footer.php';
    }

    public function Configuracion(){
        require_once 'view/header.php';
        require_once 'view/administrador/administrador.php';
        require_once 'view/administrador/administrador-configuracion.php';
        require_once 'view/administrador/administrador-footer.php';
    }
    public function Noticia(){
        require_once 'view/header.php';
        require_once 'view/administrador/administrador.php';
        require_once 'view/administrador/administrador-noticias.php';
        require_once 'view/administrador/administrador-footer.php';
    }
    public function CrearNoticia(){   
        $this->model->CrearNoticia($_REQUEST['noticia']);
        header('Location: /administrador');   
    }

    public function Reporte(){
         if( $this->model->get_data($_SESSION['correo'])['rol'] == 'Docente'){
      header('Location: /docente');
      }
   if( $this->model->get_data($_SESSION['correo'])['rol'] == 'Estudiante'){
      header('Location: /usuario');
      }
        require_once 'reporte.php';
    }
    

}

