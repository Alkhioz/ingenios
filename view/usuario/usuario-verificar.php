<?php if(!$this->model->is_logged_in()){ header('Location: /login'); } ?>
<div class="w3-container w3-center w3-margin-top">
	<div class="w3-content" style="max-width: 600px;">
        
         
				<label class='w3-xlarge w3-text-black'>VERIFICAR CUENTA</label><br>
        		<label class='w3-small w3-text-black'>Ingrese el codigo de confirmacion que se envio a su correo</label>
        
    		<form  action='/usuario/confirmar' method='post'>

            
        <div class="w3-light-gray w3-card w3-padding w3-margin-top w3-margin-bottom">
        	 
		<p><input class="w3-border-black w3-input w3-leftbar" type='text' placeholder = 'Codigo de confirmacion' name='codigo'  value=''></p>

		<p >
        <input class='w3-black w3-button ' type='submit' name='submit' value='Confirmar'>
        <a class="w3-black w3-button" href="/usuario/logout">Salir <i class="fa fa-sign-out fa-fw"></i></a>
	    </p>

	    </div>
	    
		

	    
		
	</form>
	
</div>
		
		
        
	</div>

      <script src="/assets/js/signup.js" type="text/javascript"></script>  
   </body>
</html>