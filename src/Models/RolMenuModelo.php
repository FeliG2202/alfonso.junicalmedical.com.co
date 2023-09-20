<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;

class RolMenuModelo extends Connection
{

	private $tabla;

	function __construct()
	{
		$this->tabla = 'rolesmenu';
	}


	public function registrarRolMenuModelo($idMenu, $idRol)
	{
		$values = '';
		$cont = 1;
		$sql = "INSERT INTO `rolesmenu`(idMenu, idRol) VALUES ";
		for ($i = 0; $i < count($idMenu); $i++) {
			$values .= "(?,?),";
		}
		$values = substr($values, 0, -1);
		$sql .= $values;
		try {
			$stmt = $this->conectar()->prepare($sql);
			for ($i = 0; $i < count($idMenu); $i++) {
				$stmt->bindParam($cont, $idMenu[$i], PDO::PARAM_INT);
				$cont++;
				$stmt->bindParam($cont, $idRol, PDO::PARAM_INT);
				$cont++;
			}
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarRolMenuModelo()
	{
		$sql = "SELECT * FROM $this->tabla ";
		try {
			$stmt = $this->conectar()->prepare($sql);
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			} else {
				return [];
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function consultarRolMenuIdModelo($idRol)
	{
		$sql = "SELECT *  FROM $this->tabla WHERE idRol = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $idRol, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			} else {
				return [];
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function cambiarEstadoRolMenuIdRolModelo($estado, $idRol)
	{
		$sql = "UPDATE $this->tabla SET rolMenuEstado=? WHERE idRol=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $estado, PDO::PARAM_STR);
			$stmt->bindParam(2, $idRol, PDO::PARAM_INT);
			$stmt->execute();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}
}
