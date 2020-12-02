
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>INSTALADOR | Ingenio</title>
        
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, ユーザー-scalable=no">
        
        <link rel="manifest" href="../manifest.json" />
        
        <link rel="stylesheet" href="../assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="../assets/css/w3.css" />
        <link rel="stylesheet" href="../assets/css/icons/font-awesome.css" />
        <link rel="icon" type="/image/png" href="../favicon.png"/>

        <link rel="stylesheet" href="../assets/fonts/Lato/latofonts.css">

        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        

        <style>
        * {
        font-family: 'LatoWeb', serif;
        }
        .w3-lato {
        font-family: 'LatoWebSolid', serif;
        }
        </style>

	</head>
<body class="w3-gray" >
<div class="w3-content" style="max-width:1000px;">
	<center>
	<table class="w3-margin w3-card w3-white w3-padding">
			<td class="w3-padding w3-hide-small" >
				<img style="width: 75px; height: 100px;" src="../logo.jpg">
			</td>
			<td class="w3-padding w3-center">
				<h4 class="w3-text-black ">Este es el instalador de INGENIO</h4>
				<h6 class="w3-text-black w3-hide-small">Por favor complete los siguientes campos:</h6>
			</td>
			<td class="w3-padding w3-hide-small" >
				<img style="width: 75px; height: 100px;" src="../logo.jpg">
			</td>
	    </table>
		<div class="w3-margin w3-card w3-white w3-padding w3-row">

    		<form  action='' method='post'>
            <div class="w3-padding w3-col l6 s12">
            	<label class="w3-text-black">Datos de la base</label> 
            	<input class=" w3-input w3-border-black w3-lefk w3-leftbar" required type="text" name="host" placeholder="Host de la Base de Datos">
				<input class=" w3-input w3-border-black w3-lefk w3-leftbar" required type="text" name="dbnombre" placeholder="Nombre de la base de datos">
				<input class=" w3-input w3-border-black w3-lefk w3-leftbar" required type="text" name="dbunombre" placeholder="Nombre del usuario de la base de datos">
				<input class=" w3-input w3-border-black w3-lefk w3-leftbar"  type="password" name="dbcontrasena" placeholder="Contraseña de usuario de base">
				
			</div>
			<div class="w3-padding w3-col l6 s12">
				<label class="w3-text-black">Datos de la cuenta de administrador</label>
				<input class=" w3-input w3-border-black w3-lefk w3-leftbar" required type="text" name="cedula" placeholder="ID administrador">
				<input class=" w3-input w3-border-black w3-lefk w3-leftbar" required type="text" name="correo" placeholder="Correo electrónico del administrador"> 
				<input class=" w3-input w3-border-black w3-lefk w3-leftbar" required type="text" name="nombre" placeholder="Nombre del administrador">
				<input class=" w3-input w3-border-black w3-lefk w3-leftbar" required type="text" name="apellido" placeholder="Apellido del administrador">
				<input class=" w3-input w3-border-black w3-lefk w3-leftbar" required type="text" name="direccion" placeholder="Domicilio del administrador">
				<input class=" w3-input w3-border-black w3-lefk w3-leftbar" required type="text" name="telefono" placeholder="Número de teléfono del administrador
">
				<input class=" w3-input w3-border-black w3-lefk w3-leftbar" required type="password" name="contrasena" placeholder="Contraseña de administrador">
            </div>
            <div class="w3-padding w3-col l12 s12">
            	<input class="w3-block w3-button w3-black w3-hover-dark-gray" type="submit" name="submit" value="Guardar">
		      </div>
            
            	
           </form>


		</div>
	</center>
</div>
</body>

</html>
