<?php
require_once 'model/usuario.php';
require_once 'model/proyecto.php';
require_once 'model/grupo.php';

class usuarioController{
    
    private $model;
    private $proyecto;
    private $grupo;
    
    public function __CONSTRUCT(){
        $this->model = new usuario();
        $this->proyecto = new proyecto();
        $this->grupo = new grupo();
    }
    
    public function Index(){
        
        header('Location: /usuario/proyecto');
    }

    public function Proyecto(){
        require_once 'view/header.php';
        require_once 'view/usuario/usuario.php';
        require_once 'view/usuario/usuario-proyecto.php';
        require_once 'view/usuario/usuario-footer.php';
    }

    public function Grupo(){
        require_once 'view/header.php';
        require_once 'view/usuario/usuario.php';
        require_once 'view/usuario/usuario-grupo.php';
        require_once 'view/usuario/usuario-footer.php';
    }

    public function Configuracion(){
        require_once 'view/header.php';
        require_once 'view/usuario/usuario.php';
        require_once 'view/usuario/usuario-configuracion.php';
        require_once 'view/usuario/usuario-footer.php';
    }

    public function Notificacion(){
        require_once 'view/header.php';
        require_once 'view/usuario/usuario.php';
        require_once 'view/usuario/usuario-notificacion.php';
        require_once 'view/usuario/usuario-footer.php';
    }

    public function Verificar(){   
        require_once 'view/header.php';
        require_once 'view/usuario/usuario-verificar.php';
        require_once 'view/usuario/usuario-footer.php';   
    }

    public function confirmar(){   
        $this->model->VerificarUsuario($_REQUEST['codigo']);
        header('Location: /usuario');   
    }


    public function CambiarFoto(){   
    $target_dir = "./img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   // Check if image file is a actual image or fake image
     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
     if($check !== false) {
         echo "File is an image - " . $check["mime"] . ".";
         $uploadOk = 1;
     } else {
         echo "File is not an image.";
         $uploadOk = 0;
     }
   
   // Check if file already exists
   if (file_exists($target_file)) {
     echo "Sorry, file already exists.";
     $uploadOk = 0;
   }
   // Allow certain file formats
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "gif" ) {
     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $uploadOk = 0;
   }
   // Check if $uploadOk is set to 0 by an error
   if ($uploadOk == 0) {
     echo "Sorry, your file was not uploaded.";
   // if everything is ok, try to upload file
   } else {
   $salt = substr ($this->model->get_data($_SESSION['correo'])['nombre'], 0, 2);
   $archivo = crypt (time(), $salt);
     $archivo = preg_replace('/[^A-Za-z0-9\-]/', '', $archivo).".".$imageFileType;
     echo '1';
     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$archivo)) {
         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
         $usuario = new usuario(); 
         $usuario->id = $this->model->get_data($_SESSION['correo'])['id_usuario'];
         $usuario->Foto = $archivo;
         
         $this->model->CambiarFoto($usuario);
         

   //$_SESSION['foto'] = $archivo;    
   //header('Location: login.php');
     } else {
         echo "Sorry, there was an error uploading your file.";
     }
   }
        header('Location: /usuario/configuracion');   
    }

    public function DefaultFoto(){   
        $archivo = "Default.png";
        $usuario = new usuario(); 
        $usuario->id = $this->model->get_data($_SESSION['correo'])['id_usuario'];
        $usuario->Foto = $archivo;
         
        $this->model->CambiarFoto($usuario);

        //$_SESSION['foto'] = $archivo;    

        header('Location: /usuario/configuracion');   
    }    

    public function CambiarClave(){   
       
        $usuario = new usuario();
        $usuario->Clave = crypt ($_REQUEST['clave'], substr ($this->model->get_data($_SESSION['correo'])['nombre'], 0, 2)); 
        $usuario->id = $this->model->get_data($_SESSION['correo'])['id_usuario'];
        
        if ($_REQUEST['clave'] == $_REQUEST['confClave']) {
            $this->model->CambiarClave($usuario);
        }
        
        header('Location: /usuario/configuracion');   
    }        

    public function logout(){   
        session_destroy();
        header('Location: /');   
    }
    
    public function unirseGrupo(){   

        $this->model->GenerarSolicitudEstudiante($_REQUEST['submit']);
        header('Location: /usuario/grupo');   
    }

    public function rechazarUnionGrupo(){   

        $this->model->RechazarSolicitudEstudiante($_REQUEST['submit']);
        header('Location: /usuario/notificacion');   
    }

    public function aceptarUnionGrupo(){   
        $this->model->AceptarSolicitudEstudiante($_REQUEST['submit']);
        header('Location: /usuario/notificacion');   
    }

    public function solicitudCrearGrupo(){

        $this->model->GenerarSolicitudDocente($_REQUEST['proyecto'], $_REQUEST['docente']);
        header('Location: /usuario/grupo');

    }
    

}