<?php
require_once 'model/usuario.php';

class signupController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new usuario();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/usuario/usuario-crear.php';
    }
    
    public function logout(){   
        session_destroy();
        header('Location: /');   
    }

    public function CrearEstudiante(){
        $usuario = new usuario();

        $partes = explode("@", $_REQUEST['correo']);
        $nombreUsuario = $partes[0];
        $dominioCorreo = $partes[1];

        $dominiosValidos = array("utm.edu.ec", "fci.edu.ec", "gmail.com"); 
              
        if(!in_array($dominioCorreo, $dominiosValidos)){
            header('Location: /signup');
        }else{
            if (isset($_REQUEST['rol'])){
                if ($_REQUEST['rol'] == 'Estudiante'){
                    $usuario->cedula= $_REQUEST['cedula'];
                    $usuario->Nombre= $_REQUEST['nombre'];
                    $usuario->Apellido= $_REQUEST['apellido'];  
                    $usuario->Correo= $_REQUEST['correo'];
                    $usuario->Clave= crypt ($_REQUEST['clave'], substr ($usuario->Nombre, 0, 2));
                    $usuario->Telefono= $_REQUEST['telefono'];
                    $usuario->Direccion= $_REQUEST['direccion'];
                    $usuario->Rol= $_REQUEST['rol'];
                    $usuario->Nivel= $_REQUEST['nivel'];    
                    $this->model->RegistrarEstudiante($usuario);
                }else if ($_REQUEST['rol'] == 'Docente'){
                    if(1 === preg_match('~[0-9]~', $nombreUsuario)){
                        header('Location: /signup');
                    }else {
                        $usuario->cedula= $_REQUEST['cedula'];
                        $usuario->Nombre= $_REQUEST['nombre'];
                        $usuario->Apellido= $_REQUEST['apellido'];  
                        $usuario->Correo= $_REQUEST['correo'];
                        $usuario->Clave= crypt ($_REQUEST['clave'], substr ($usuario->Nombre, 0, 2));
                        $usuario->Telefono= $_REQUEST['telefono'];
                        $usuario->Direccion= $_REQUEST['direccion'];
                        $usuario->Rol= $_REQUEST['rol']; 
                        $this->model->RegistrarDocente($usuario);
                    }
                    
                }
            }
        header('Location: /');
        }
        
        
    }

}