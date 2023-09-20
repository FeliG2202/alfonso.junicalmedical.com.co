<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;

class RolModelo extends Connection
{

	private $tabla;

	function __construct()
	{
		$this->tabla = 'roles';
	}


	public function registrarRolModelo($rol)
	{
		$sql = "INSERT INTO $this->tabla(rolNombre) VALUES (?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $rol, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarRolModelo($rolBuscado)
	{
		$rolBuscado = "%" . $rolBuscado . "%";
		$sql = "SELECT * FROM $this->tabla WHERE rolNombre LIKE ? ORDER BY rolNombre";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $rolBuscado, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			} else {
				return [];
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarRolIdModelo($id)
	{
		$sql = "SELECT * FROM $this->tabla WHERE idRol = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			} else {
				return [];
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function actualizarRolModelo($datosRol)
	{
		$sql = "UPDATE $this->tabla SET rolNombre=? WHERE idRol=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosRol['nombre'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosRol['id'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function eliminarRolModelo($id)
	{
		$sql = "DELETE FROM $this->tabla WHERE idRol = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
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
