<?php
require_once 'model/usuario.php';
class grupo
{
	private $pdo;
	private $user;

	public $id;
	public $id_proyecto;
	public $id_estudiante;
	public $id_docente;
	public $Correo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp(); 
			$this->user = new usuario();    
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	




    public function Listar(){	
    	$resultado = array();

		try {

			$stmtuser = $this->pdo->prepare('SELECT usuario.nombre as unombre, usuario.apellidos as uapellido, docente.nombre as dnombre, docente.apellidos as dapellido, proyecto.nombre as pnombre, grupo.id_proyecto as gidproyecto, miembro_grupo.idGrupo as mgidgrupo, grupo.fecha_registro as gfregistro from miembro_grupo 
				INNER JOIN usuario ON (usuario.id_usuario = miembro_grupo.idUsuario) 
				INNER JOIN grupo ON (grupo.id_grupo = miembro_grupo.idGrupo)
				INNER JOIN proyecto ON (proyecto.id_proyecto = grupo.id_proyecto and usuario.id_usuario = proyecto.id_usuario)
				INNER JOIN usuario as docente ON (grupo.id_docente = docente.id_usuario)
				where usuario.id_usuario = ?');
			$stmtuser->execute(array( 
				$this->user->get_data($_SESSION['correo'])['id_usuario']
			)); 
		  	
			return $stmtuser->fetchAll(PDO::FETCH_OBJ);

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	public function GetMiembros($id){	
    	$resultado = array();

		try {

			$stmtuser = $this->pdo->prepare('SELECT usuario.nombre as unombre, usuario.apellidos as uapellido, miembro_grupo.fecha_registro as ufregistro from miembro_grupo INNER JOIN usuario ON (usuario.id_usuario = miembro_grupo.idUsuario) INNER JOIN grupo ON (grupo.id_grupo = miembro_grupo.idGrupo) INNER JOIN proyecto ON (proyecto.id_proyecto = grupo.id_proyecto and usuario.id_usuario != proyecto.id_usuario) where miembro_grupo.idGrupo = ?');
			$stmtuser->execute(array( 
				$id
			)); 
		  	
			return $stmtuser->fetchAll(PDO::FETCH_OBJ);

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	public function ListarOtrosDos(){	
    	$resultado = array();

		try {

			$stmtuser = $this->pdo->prepare('SELECT usuario.nombre as unombre, usuario.apellidos as uapellido, docente.nombre as dnombre, docente.apellidos as dapellido, proyecto.nombre as pnombre, grupo.id_grupo as gidgrupo,miembro_grupo.idGrupo as mgidgrupo , grupo.fecha_registro as gfregistro
				from miembro_grupo INNER JOIN usuario ON (usuario.id_usuario = miembro_grupo.idUsuario)
				INNER JOIN grupo ON (grupo.id_grupo = miembro_grupo.idGrupo) 
				INNER JOIN proyecto ON (proyecto.id_proyecto = grupo.id_proyecto and usuario.id_usuario = proyecto.id_usuario)
				INNER JOIN usuario as docente ON (grupo.id_docente = docente.id_usuario)
				where usuario.id_usuario != :id 
				AND grupo.id_grupo NOT IN (SELECT solicitud_estudiante.idGrupo FROM solicitud_estudiante WHERE solicitud_estudiante.idEmisor = :id)
				AND grupo.id_grupo IN (SELECT miembro_grupo.idGrupo FROM miembro_grupo WHERE miembro_grupo.idUsuario = :id)
				');
			$stmtuser->execute(array( 
				'id' => $this->user->get_data($_SESSION['correo'])['id_usuario']
			)); 
		  	
			return $stmtuser->fetchAll(PDO::FETCH_OBJ);

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	public function ListarOtros(){	
    	$resultado = array();

		try {

			$stmtuser = $this->pdo->prepare('SELECT usuario.nombre as unombre, usuario.apellidos as uapellido, docente.nombre as dnombre, docente.apellidos as dapellido, proyecto.nombre as pnombre, grupo.id_grupo as gidgrupo,miembro_grupo.idGrupo as mgidgrupo, grupo.fecha_registro as gfregistro
				from miembro_grupo INNER JOIN usuario ON (usuario.id_usuario = miembro_grupo.idUsuario)
				INNER JOIN grupo ON (grupo.id_grupo = miembro_grupo.idGrupo) 
				INNER JOIN proyecto ON (proyecto.id_proyecto = grupo.id_proyecto and usuario.id_usuario = proyecto.id_usuario)
				INNER JOIN usuario as docente ON (grupo.id_docente = docente.id_usuario)
				where usuario.id_usuario != :id 
				AND grupo.id_grupo NOT IN (SELECT solicitud_estudiante.idGrupo FROM solicitud_estudiante WHERE solicitud_estudiante.idEmisor = :id)
				AND grupo.id_grupo NOT IN (SELECT miembro_grupo.idGrupo FROM miembro_grupo WHERE miembro_grupo.idUsuario = :id)
				');
			$stmtuser->execute(array( 
				'id' => $this->user->get_data($_SESSION['correo'])['id_usuario']
			)); 
		  	
			return $stmtuser->fetchAll(PDO::FETCH_OBJ);

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	public function ListarGruposDocente(){	
    	$resultado = array();

		try {

			$stmtuser = $this->pdo->prepare('SELECT usuario.nombre as unombre, usuario.apellidos as uapellido, docente.nombre as dnombre, docente.apellidos as dapellido, proyecto.nombre as pnombre, grupo.id_proyecto as gidproyecto, miembro_grupo.idGrupo as mgidgrupo, grupo.fecha_registro as gfregistro 
				from miembro_grupo
				INNER JOIN usuario ON (usuario.id_usuario = miembro_grupo.idUsuario)
				INNER JOIN grupo ON (grupo.id_grupo = miembro_grupo.idGrupo)
				INNER JOIN proyecto ON (proyecto.id_proyecto = grupo.id_proyecto 
                        AND usuario.id_usuario = miembro_grupo.idUsuario
                        AND usuario.id_usuario = proyecto.id_usuario)
				INNER JOIN usuario as docente ON (grupo.id_docente = docente.id_usuario
                         AND docente.id_usuario = ?)');
			$stmtuser->execute(array( 
				$this->user->get_data($_SESSION['correo'])['id_usuario']
			)); 
		  	
			return $stmtuser->fetchAll(PDO::FETCH_OBJ);

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	public function ListarGruposAdmin(){	
    	$resultado = array();

		try {

			$stmtuser = $this->pdo->prepare('SELECT usuario.nombre as unombre, usuario.apellidos as uapellido, docente.nombre as dnombre, docente.apellidos as dapellido, proyecto.nombre as pnombre, proyecto.objetivos as pobjetivo, proyecto.descripcion as pdescripcion, grupo.id_proyecto as gidproyecto, miembro_grupo.idGrupo as mgidgrupo, grupo.fecha_registro as gfregistro 
				from miembro_grupo
				INNER JOIN usuario ON (usuario.id_usuario = miembro_grupo.idUsuario)
				INNER JOIN grupo ON (grupo.id_grupo = miembro_grupo.idGrupo)
				INNER JOIN proyecto ON (proyecto.id_proyecto = grupo.id_proyecto 
                        AND usuario.id_usuario = miembro_grupo.idUsuario
                        AND usuario.id_usuario = proyecto.id_usuario)
				INNER JOIN usuario as docente ON (grupo.id_docente = docente.id_usuario)');
			$stmtuser->execute(); 
		  	
			return $stmtuser->fetchAll(PDO::FETCH_OBJ);

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}


	public function RegistrarGrupo(grupo $data)
	{
		try 
		{

        
		$stmt= $this->pdo->prepare('SELECT id, idEmisor, idReceptor FROM solicitud_docente 
			WHERE solicitud_docente.idProyecto = ? ');
        $stmt->execute(
				array(
                    $data->id_proyecto
                ));
        $stmt->bindColumn('1', $idSolicitud);
        $stmt->bindColumn('2', $idEmisor);
        $stmt->bindColumn('3', $idReceptor);
        $stmt->fetch(PDO::FETCH_BOUND);

        $stmt= $this->pdo->prepare('SELECT email FROM usuario 
			WHERE usuario.id_usuario = ? ');
        $stmt->execute(
				array(
                    $idEmisor
                ));
        $stmt->bindColumn('1', $mail);
        $stmt->fetch(PDO::FETCH_BOUND);

		$stmt = $this->pdo->prepare("INSERT INTO grupo(correo , id_proyecto, id_docente, fecha_registro) VALUES (?, ? , ?, ?)");
		$stmt->execute(
				array(
				    $mail, 
                    $data->id_proyecto,
                    $idReceptor,
                    date('Y-m-d',time())
                )
			);
		$stmt= $this->pdo->prepare('SELECT id_grupo FROM grupo ORDER BY id_grupo DESC LIMIT 1');
        $stmt->execute();
        $stmt->bindColumn('1', $id_grupo);
        $stmt->fetch(PDO::FETCH_BOUND);

        $stmt = $this->pdo->prepare('INSERT INTO miembro_grupo(idGrupo , idUsuario, fecha_registro)VALUES (:grupo ,:usuario, :fecha)') ;
        $stmt->execute(array(
          ':grupo' => $id_grupo,
          ':usuario'=> $idEmisor,
          ':fecha'=> date('Y-m-d',time())
        ));


        $stmt= $this->pdo->prepare('DELETE FROM solicitud_docente 
			WHERE solicitud_docente.id = ? ');
        $stmt->execute(
				array(
                    $idSolicitud
                ));


		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function EliminarGrupo(grupo $data)
	{
		try 
		{
		
		$stmt = $this->pdo->prepare("DELETE FROM grupo WHERE id_proyecto = ?");
		$stmt->execute(
				array( 
                    $data->id_proyecto
                )
			);


		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}