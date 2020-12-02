<?php

class errorController{
    
    
    
    public function __CONSTRUCT(){
       
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/error/404.php';
    }
}