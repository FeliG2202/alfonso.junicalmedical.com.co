<?php 

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;
use LionDatabase\Drivers\MySQL\MySQL as DB;

class OpcionesMenuModelo extends Connection {
	
	private $tabla;

	function __construct() {
		$this->tabla = 'opcionesmenu';
	}

	public function registrarOpcionMenuModelo($datosOpcionMenu){
		$sql = "INSERT INTO $this->tabla (opcionMenuNombre, opcionesmenu_folder, opcionMenuEnlace, idMenu) VALUES (?,?,?,?)";

		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosOpcionMenu['opcionMenuNombre'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosOpcionMenu['opcionesmenu_folder'], PDO::PARAM_STR);
			$stmt->bindParam(3, $datosOpcionMenu['opcionMenuEnlace'], PDO::PARAM_STR);
			$stmt->bindParam(4, $datosOpcionMenu['idMenu'], PDO::PARAM_INT);
			return $stmt->execute();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarOpcionesMenuIdModelo($idMenu) {
		return DB::table("opcionesmenu")
			->select()
			->where(DB::equalTo("idMenu"), $idMenu)
			->getAll();
	}
}