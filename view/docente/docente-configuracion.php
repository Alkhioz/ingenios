<div class="w3-center w3-container w3-animate-top" >
     <div class= 'w3-padding w3-content' style="max-width: 600px;">
      <div class="w3-card w3-mobile w3-margin-top w3-light-grey">
      <div class=" w3-center w3-padding">
      <form action="/usuario/cambiarclave" method="post" enctype="multipart/form-data" >
            <p><label class="w3-text-grey w3-large">CAMBIAR CONTRASEÑA:</label></p>
            <p><input id="pass" class="  w3-input" type='password' placeholder = 'Clave' name='clave' value='<?php if(isset($error)){ echo $_POST['clave'];}?>'></p>
            <p><input id="passconf" class=" w3-input" type='password' placeholder = 'Confirme Clave' name='confClave' value='<?php if(isset($error)){ echo $_POST['confClave'];}?>'></p>
            <input  type="checkbox" onclick="claveview()">
            <label class="w3-text-gray w3-medium" >Mostrar clave</label>
            <p>
               <button class="w3-button w3-black" type='submit'>ACTUALIZAR <i class='fa fa-refresh fa-fw'></i></button>
            </p>
         
      </form>
      </div>
      </div>
      <div class="w3-card w3-mobile w3-margin-top w3-light-grey w3-margin-bottom">
      <div class="w3-center w3-padding">
      <form action="/usuario/cambiarfoto" method="post" enctype="multipart/form-data" >
            <p><label class="w3-text-grey w3-large">CAMBIAR IMAGEN:</label></p>
            <p>
               <label for="fileToUpload" class="w3-button w3-black">SELECCIONAR <i class='fa fa-search fa-fw'></i></label>
               <input  type="file" onchange="enableElement();" name="fileToUpload" id="fileToUpload" style="display:none;">
               <button id="uploadbtn" class="w3-button w3-black" type="submit" disabled>SUBIR <i class='fa fa-arrow-circle-up fa-fw' ></i></button>
            </p>
      </form>
      <form action="/usuario/defaultfoto" method="post" enctype="multipart/form-data" >
            <p><label class="w3-text-grey w3-small">USAR IMAGEN POR DEFECTO:</label></p>
            <p>
               <button class="w3-button w3-black" type='submit'>DEFECTO <i class='fa fa-refresh fa-fw'></i></button>
            </p>
         
      </form>
      </div>
   </div>
</div>