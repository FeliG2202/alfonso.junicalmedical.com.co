<?php 

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;
use LionDatabase\Drivers\MySQL\MySQL as DB;

class MenuModelo extends Connection {
	
	private $tabla;

	function __construct()	{
		$this->tabla = 'menus';
	}

	public function registrarMenuModelo($menu) {
		$sql = "INSERT INTO $this->tabla(menuNombre) VALUES (?)";

		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $menu, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return true;
			}
			else{
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function consultarMenuModelo() {
		return DB::table("menus")->select()->getAll();
	}


	public function consultarMenuIdModelo($id) {
		$sql = "SELECT * FROM $this->tabla WHERE idMenu=?";
		try {
			$stmt = $this->conectar()->prepare($sql);	
			$stmt->bindParam(1, $id, PDO::PARAM_INT);		
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			}
			else{
				return [];
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function actualizarMenuModelo($datosMenu){
		$sql = "UPDATE $this->tabla SET menuNombre=?, menuEstado=? WHERE idMenu=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosMenu['menuNombre'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosMenu['menuEstado'], PDO::PARAM_STR);
			$stmt->bindParam(3, $datosMenu['id'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			}
			else{
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function eliminarMenuModelo($id) {
		$sql= "DELETE FROM $this->tabla WHERE idMenu = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1,$id, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			} else { 
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}
}