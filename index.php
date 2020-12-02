<?php
error_reporting(0);

if (!file_exists("./model/config.php")) {
    header("location: ./instalador");
}

require_once 'model/database.php';


session_start();

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    header('Location: ./login');    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    if ($accion == '') {
        $accion = 'Index';
    }
    if(!@include_once("controller/$controller.controller.php")){
        header('Location: ./error');
    }else{
        // Instanciamos el controlador
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;

        if (is_callable(array($controller, $accion)))
        {
         // Llama la accion
        call_user_func( array( $controller, $accion ) );
        }else{
        header('Location: ./error');
        }
    
        
    }
}