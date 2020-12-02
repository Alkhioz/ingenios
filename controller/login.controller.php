<?php
require_once 'model/usuario.php';

class loginController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new usuario();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/login/login.php';
    }
    
    public function ingresar(){
        $login = new usuario();
        
        $login->username = $_REQUEST['correo'];
        $login->password = $_REQUEST['clave'];
        

        if($this->model->login($login) == true){
            header('Location: /usuario');
        }else {
            header('Location: /login');
        };
    }
}