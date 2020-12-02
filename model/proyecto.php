<?php
require_once 'model/usuario.php';
class proyecto
{
	private $pdo;
	private $user;

	public $id;
	public $id_usuario;
	public $Nombre;
    public $Fecha;
    public $Objetivo;
    public $Descripcion;

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

	


	public function RegistrarProyecto(proyecto $data)
	{
		try 
		{
		
		$stmt = $this->pdo->prepare("INSERT INTO proyecto(nombre ,descripcion ,fecha_registro, objetivos, id_usuario) 
		        VALUES (?, ?, ?, ?, ?)");
		$stmt->execute(
				array( 
                    $data->Nombre,
        			$data->Descripcion,
        			$data->Fecha,  
        			$data->Objetivo,
        			$this->user->get_data($_SESSION['correo'])['id_usuario']
                )
			);


		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function EliminarProyecto(proyecto $data)
	{
		try 
		{
		
		$stmt = $this->pdo->prepare("DELETE FROM proyecto WHERE id_proyecto = ?");
		$stmt->execute(
				array( 
                    $data->id
                )
			);


		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function Listar(){	
    	$resultado = array();

		try {

			$stmtuser = $this->pdo->prepare('SELECT id_proyecto, nombre, descripcion, objetivos,fecha_registro FROM proyecto where id_usuario = ? ORDER BY id_proyecto DESC');
			$stmtuser->execute(array( 
				$this->user->get_data($_SESSION['correo'])['id_usuario']
			)); 
		  	
			return $stmtuser->fetchAll(PDO::FETCH_OBJ);

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	public function ListarOtro(){	
    	$resultado = array();

		try {

			$stmtuser = $this->pdo->prepare('SELECT id_proyecto, nombre, descripcion, objetivos,fecha_registro FROM proyecto where id_usuario = ? AND proyecto.id_proyecto NOT IN (SELECT idProyecto FROM solicitud_docente WHERE solicitud_docente.idProyecto = proyecto.id_proyecto) AND proyecto.id_proyecto NOT IN (SELECT id_proyecto FROM grupo WHERE grupo.id_proyecto = proyecto.id_proyecto)');
			$stmtuser->execute(array( 
				$this->user->get_data($_SESSION['correo'])['id_usuario']
			)); 
		  	
			return $stmtuser->fetchAll(PDO::FETCH_OBJ);

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
	}

	

}