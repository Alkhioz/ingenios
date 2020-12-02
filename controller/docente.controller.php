<?php
require_once 'model/usuario.php';
require_once 'model/proyecto.php';
require_once 'model/grupo.php';

class docenteController{
    
    private $model;
    private $proyecto;
    private $grupo;
    
    public function __CONSTRUCT(){
        $this->model = new usuario();
        $this->proyecto = new proyecto();
        $this->grupo = new grupo();
    }
    
    public function Index(){
        
        header('Location: /docente/grupo');
    }

    public function Grupo(){
        require_once 'view/header.php';
        require_once 'view/docente/docente.php';
        require_once 'view/docente/docente-grupo.php';
        require_once 'view/docente/docente-footer.php';
    }

    public function Configuracion(){
        require_once 'view/header.php';
        require_once 'view/docente/docente.php';
        require_once 'view/docente/docente-configuracion.php';
        require_once 'view/docente/docente-footer.php';
    }

    public function Notificacion(){
        require_once 'view/header.php';
        require_once 'view/docente/docente.php';
        require_once 'view/docente/docente-notificacion.php';
        require_once 'view/docente/docente-footer.php';
    }

    
    public function unirseGrupo(){   

        $this->model->GenerarSolicitudEstudiante($_REQUEST['submit']);
        header('Location: /usuario/grupo');   
    }

    public function rechazarCreacionGrupo(){   

        $this->model->RechazarSolicitudDocente($_REQUEST['submit']);
        header('Location: /docente/notificacion');   
    }
    

}