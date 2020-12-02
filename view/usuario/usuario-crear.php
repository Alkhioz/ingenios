<?php if($this->model->is_logged_in()){ header('Location: ./usuario'); } ?>
<div class="w3-container w3-center w3-margin-top">
	<div class="w3-content" style="max-width: 600px;">
        
         
				<img src="logo.jpg"><br>
				<label class='w3-xlarge w3-text-black'>INGENIOS</label><br>
        		<label class='w3-small w3-text-black'>Crear una cuenta</label>
        
    		<form  action='./signup/CrearEstudiante' method='post'>

            
        <div class="w3-row w3-light-gray w3-card w3-padding w3-margin-top w3-margin-bottom">
        	<p><label class="w3-hide-small" >TIPO DE CUENTA: </label> 
        <input  class="w3-radio" type="radio" name="rol" value="Estudiante" id="rbtn1" checked>
		<label>Estudiante</label>

		<input  class="w3-radio " type="radio" name="rol" value="Docente" id="rbtn2">
		<label>Docente</label></p>
  	    <div class="w3-half">
 
		<p><input class="w3-border-black w3-input w3-leftbar" type='number' placeholder = 'Cedula' name='cedula'  value='<?php if(isset($error)){ echo $_POST['cedula'];}?>' required></p>

        <p><input class="w3-border-black w3-input w3-leftbar" type='text' placeholder = 'Correo' name='correo' value='<?php if(isset($error)){ echo $_POST['correo'];}?>' required></p>
	    
		<p><input class="w3-border-black  w3-input w3-leftbar" type='text' placeholder = 'Nombres' name='nombre' value='<?php if(isset($error)){ echo $_POST['nombre'];}?>' required></p>

		<p><input class="w3-border-black w3-input w3-leftbar" type='text' placeholder = 'Apellidos' name='apellido' value='<?php if(isset($error)){ echo $_POST['apellido'];}?>' required></p>

	    </div>
	    <div class="w3-half">
 

		<p><input class="w3-border-black  w3-input w3-leftbar" type='text' placeholder = 'Direccion' name='direccion' value='<?php if(isset($error)){ echo $_POST['direccion'];}?>' required></p>
	    
	    <p><input class="w3-border-black  w3-input w3-leftbar" type='number' placeholder = 'Telefono' name='telefono' value='<?php if(isset($error)){ echo $_POST['telefono'];}?>' required></p>

		<p><input id="pass" class="w3-border-black  w3-input w3-leftbar" type='password' placeholder = 'Clave' name='clave' value='<?php if(isset($error)){ echo $_POST['clave'];}?>' required></p>

		<p><input id="passconf" class="w3-border-black w3-input w3-leftbar" type='password' placeholder = 'Confirme Clave' name='confClave' value='<?php if(isset($error)){ echo $_POST['confClave'];}?>' required></p>	
		
		</div>
		
        
        
		<p><select class="w3-border-black w3-select w3-white w3-leftbar" id="estudiante" name = 'nivel' class=" w3-white w3-hover-white w3-border">
  			<option value="" disabled selected>Nivel de estudio</option>
  			<option value="1">Primero</option>
  	    	<option value="2">Segundo</option>
  			<option value="3">Tercero</option>
  			<option value="4">Cuarto</option>
  			<option value="5">Quinto</option>
  			<option value="6">Sexto</option>
  			<option value="7">Septimo</option>
  			<option value="8">Octavo</option>
  			<option value="9">Noveno</option>
  			<option value="10">Decimo</option>
		</select>
	    </p>
        <input  class="w3-check" type="checkbox" onclick="claveview()">
        <label class="w3-text-gray w3-medium" >Mostrar clave</label>

		<p>
        <input class='w3-black w3-button' type='submit' name='submit' value='Registrarse'>
	    </p>

	    
		
	</form>
	<p><span  class="w3-text-gray w3-small">¿Posees una cuenta? <a href="/login" class="w3-text-gray">íngresa</a></span></p>
		</div>
		
		
        
	</div>
</div>	  
        </div>

      <script src="./assets/js/signup.js" type="text/javascript"></script>  
   </body>
</html>