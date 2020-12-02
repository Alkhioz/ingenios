<?php 


if(isset($_POST['submit'])){
$data='<?php
$HOST = "'.$_POST['host'].'"; 
$DATABASE = "'.$_POST['dbnombre'].'";
$USER = "'.$_POST['dbunombre'].'";
$PASS = "'.$_POST['dbcontrasena'].'";
?>';
			$fp=fopen('../model/config.php','w') or die("No tiene permiso para escribir en la carpeta model");
			fwrite($fp,$data);
			fclose($fp);

            $pdo = new PDO('mysql:host='.$_POST['host'].';dbname='.$_POST['dbnombre'].';charset=utf8', $_POST['dbunombre'], $_POST['dbcontrasena']);
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
$sql = "            CREATE TABLE `estudiante` (
  `nivel` varchar(255) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `id_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `miembro_grupo` (
  `idGrupo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `solicitud_estudiante` (
  `id` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `idEmisor` int(11) NOT NULL,
  `idReceptor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `solicitud_docente` (
  `id` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `idEmisor` int(11) NOT NULL,
  `idReceptor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `objetivos` varchar(205) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `usuario_verificar` (
  `idUsuario` int(11) NOT NULL,
  `verificacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `cedula` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `rol` ENUM('Estudiante', 'Docente', 'Evaluador', 'Administrador') NOT NULL DEFAULT 'Estudiante',
  `telefono` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'Default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL,
  `contenido` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `grupo`
  CHANGE id_grupo id_grupo INT(10) AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE `proyecto`
  CHANGE id_proyecto id_proyecto INT(10) AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE `noticia`
  CHANGE id_noticia id_noticia INT(10) AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE `usuario`
  CHANGE id_usuario id_usuario INT(10) AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE `usuario`
  ADD UNIQUE (`email`);

ALTER TABLE `usuario`
  ADD UNIQUE (`cedula`);  

ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)  ON DELETE CASCADE;

ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`)  ON DELETE CASCADE;

ALTER TABLE `miembro_grupo`
  ADD CONSTRAINT `miembro_grupo_ibfk_1` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`id_grupo`)  ON DELETE CASCADE;

ALTER TABLE `miembro_grupo`
  ADD CONSTRAINT `miembro_grupo_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`)  ON DELETE CASCADE;

ALTER TABLE `usuario_verificar`
  ADD CONSTRAINT `usuario_verificar_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id_usuario`)  ON DELETE CASCADE;

ALTER TABLE `solicitud_estudiante`
  ADD CONSTRAINT `solicitud_estudiante_ibfk_1` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`id_grupo`)  ON DELETE CASCADE;

ALTER TABLE `solicitud_estudiante`
  ADD CONSTRAINT `solicitud_estudiante_ibfk_2` FOREIGN KEY (`idEmisor`) REFERENCES `usuario` (`id_usuario`)  ON DELETE CASCADE;

ALTER TABLE `solicitud_estudiante`
  ADD CONSTRAINT `solicitud_estudiante_ibfk_3` FOREIGN KEY (`idReceptor`) REFERENCES `usuario` (`id_usuario`)  ON DELETE CASCADE;

ALTER TABLE solicitud_estudiante CHANGE id id INT(10) AUTO_INCREMENT PRIMARY KEY;


ALTER TABLE `solicitud_docente`
  ADD CONSTRAINT `solicitud_docente_ibfk_1` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`id_proyecto`)  ON DELETE CASCADE;

ALTER TABLE `solicitud_docente`
  ADD CONSTRAINT `solicitud_docente_ibfk_2` FOREIGN KEY (`idEmisor`) REFERENCES `usuario` (`id_usuario`)  ON DELETE CASCADE;

ALTER TABLE `solicitud_docente`
  ADD CONSTRAINT `solicitud_docente_ibfk_3` FOREIGN KEY (`idReceptor`) REFERENCES `usuario` (`id_usuario`)  ON DELETE CASCADE;

ALTER TABLE solicitud_docente CHANGE id id INT(10) AUTO_INCREMENT PRIMARY KEY;";

    try 
		{
			$pdo->prepare($sql)
			     ->execute();
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}


        try 
		{
		
		$stmt = $pdo->prepare("INSERT INTO usuario (cedula,nombre,apellidos,email,contrasena,direccion,telefono,rol) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->execute(
				array( 
                    $_POST['cedula'],
        			$_POST['nombre'],
        			$_POST['apellido'],  
        			$_POST['correo'],
        			crypt ($_POST['contrasena'], substr ($_POST['nombre'], 0, 2)),
        			$_POST['direccion'],
        			$_POST['telefono'],
        			'Administrador'
                )
			);
		} catch (Exception $e) 
		{
			//die($e->getMessage());
		}
    try 
		{
		
		$stmt = $pdo->prepare("INSERT INTO noticia(contenido) values (\"<h3 style=\'text-align: justify;\'><em>Ingenio es la nueva plataforma de la Facultad de Ciencias Informaticas de la Universidad Tecnia de Manabi, desarrollada con el proposito de optimizar el proceso del concurso del mismo nombre.</em></h3>\")");
		$stmt->execute();
		} catch (Exception $e) 
		{
			//die($e->getMessage());
		}


	   header('Location: ../');

		}


if (!file_exists("../model/config.php")) {
 	include("instalador.php");
 }else{
 	include("instalado.php");
 }


//Tsugi no fīrudo ni nyūryoku shite 
?>