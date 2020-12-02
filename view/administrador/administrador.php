<?php 
   if(!$this->model->is_logged_in()){
      header('Location: /login');
      }
   if($this->model->no_esta_verificado()){
      header('Location: /usuario/verificar');
   }

  if( $this->model->get_data($_SESSION['correo'])['rol'] == 'Docente'){
      header('Location: /docente');
      }
   if( $this->model->get_data($_SESSION['correo'])['rol'] == 'Estudiante'){
      header('Location: /usuario');
      }
?>

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
   <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
   <span class="w3-bar-item w3-right">Ingenio </span>
</div>


<!-- Sidebar/menu -->
<nav class=" w3-mobile w3-padding w3-border w3-border-grey w3-sidebar w3-collapse  w3-light-grey w3-animate-left" style="z-index:3;width:250px;" id="mySidebar">
   <br>
   <div class="w3-card">
      <div class="w3-container w3-padding">
      <p class="w3-center"><img src="/img/<?php echo $this->model->get_data($_SESSION['correo'])['foto']; ?>" class="w3-circle w3-border w3-border-black" style="height:106px;width:106px;" alt="Avatar"></p>
      <div class="w3-border-top w3-border-black">
         <div class="w3-container w3-padding">
            <span><?php echo $this->model->get_data($_SESSION['correo'])['nombre'].' '.$this->model->get_data($_SESSION['correo'])['apellidos'];; ?></span><br>
            <span><strong>Rol: </strong><?php echo $this->model->get_data($_SESSION['correo'])['rol']; ?></span><br>
         </div>
      </div>
      </div>
   </div>
   <br>
   <div class="w3-card">
   <div class="w3-bar-block">
      <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-black w3-hover-dark-grey" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Cerrar Menu</a>
      <a   class="w3-bar-item w3-button w3-padding " href="/administrador/grupo"><i class="fa fa-users fa-fw"></i>  Grupos</a>
      <a  class="w3-bar-item w3-button w3-padding" href="/administrador/configuracion"><i class="fa fa-cog fa-fw"></i>  Configuracion</a>
      <a  class="w3-bar-item w3-button w3-padding" href="/administrador/reporte"><i class="fa fa-file fa-fw"></i>  Reporte</a>
      <a  class="w3-bar-item w3-button w3-padding" href="/administrador/noticia"><i class="fa fa-sticky-note fa-fw"></i>  Noticias</a>
      <a href="/usuario/logout" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw"></i>  Cerrar Sesion</a>
   </div>
   </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! --> 
<div class="w3-main w3-white"  style="margin-left:260px;margin-top:43px;">