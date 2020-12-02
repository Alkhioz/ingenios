<?php if($this->model->is_logged_in()){ header('Location: /usuario'); } ?>

<div class="w3-container w3-margin-top">
  <div class="w3-row">
        <div class="w3-half w3-padding">
	<div class="w3-center w3-padding w3-animate-top w3-margin-top">
            
         <img src="logo.jpg" class="w3-margin-top">
         <form action="/login/ingresar" method="post" class="w3-margin-top w3-container" enctype="multipart/form-data">

            <label class='w3-xlarge w3-text-black'>INGENIO</label><br>
            <label class='w3-small w3-text-black'>Bienvenido</label>
            <p><input class="w3-input" type="text" class="w3-border" placeholder="Correo"  name="correo" value=""  /></p>
            <p><input class="w3-input" type="password" class="w3-border" placeholder="Clave" name="clave" value=""  /></p>

            <p><button  type="submit" class="w3-button w3-black" name="submit" value="Login"><span>Ingresar</span></button></p>

            <p><span  class="w3-text-black w3-small">¿No tienes cuenta? <a href="/signup" class="w3-text-gray">crea una</a></span></p>
         </form>
	</div>
  </div>
    <div class="w3-half w3-card w3-justify w3-hide-small">
     <img src="header.png" style="width: 100%"><br>
          <div class="w3-content w3-display-container" style="max-width:800px">
          
          <?php
            $contador = 0;
                          foreach($this->model->ListarNoticias() as $r):
                                echo '<div class="mySlides w3-margin">'; 
                                echo $r->contenido; 
                                echo '</div>';
                                $contador++;
                                endforeach;
          ?>
          
        <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottom" style="width:100%">
          <?php

            for ($i = 1; $i <= $contador; $i++) {
              echo '<span class="w3-badge demo w3-border w3-border-black w3-transparent w3-hover-white" onclick="currentDiv('.$i.')"></span> ';
          }

          ?>
          
        </div>
      </div>

    </div>
  </div>
</div>
 



      <footer class="w3-center w3-black w3-padding-16 w3-bottom w3-hide-small">
          <p class="w3-margin w3-tiny">© 2018 FCI | UTM</a></p>
      </footer>
      <script src="/assets/js/clave.js" type="text/javascript"></script>  
      <script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>
   </body>
</html>