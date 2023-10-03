<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class PersonaModelo {
	private $tabla = "personas";
	public function registrarPersonaModelo($datosPersona)
	{
		$sql = "INSERT INTO $this->tabla (personaNombreCompleto, personaDocumento, personaCorreo, personaNumberCell) VALUES (?,?,?,?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosPersona['nombreCompleto'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosPersona['identificacion'], PDO::PARAM_STR);
			$stmt->bindParam(3, $datosPersona['email'], PDO::PARAM_STR);
			$stmt->bindParam(4, $datosPersona['cell'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function consultarPersonaModelo() {
		return DB::table('personas')->select()->getAll();
	}


	public function consultarPersonaIdModelo($id)
	{
		$sql = "SELECT * FROM $this->tabla WHERE idPersona = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			} else {
				return [];
			}
		} catch (PDOException $e) {
			print($e->getMessage());
		}
	}

	public function consultarPersonasIdModelo($id)
	{
		$sql = "SELECT * FROM $this->tabla WHERE idPersona = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			} else {
				return [];
			}
		} catch (PDOException $e) {
			print($e->getMessage());
		}
	}

	////////////////////////

	public function listarPersonasModelo()
	{
		$sql = "SELECT * FROM $this->tabla WHERE 1";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function actualizarPersonaModelo($datosPersona)
	{
		$sql = "UPDATE $this->tabla SET personaNombreCompleto=?,personaDocumento=?,personaCorreo=?,personaNumberCell=? WHERE idPersona=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosPersona['nombreCompleto'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosPersona['identificacion'], PDO::PARAM_STR);
			$stmt->bindParam(3, $datosPersona['email'], PDO::PARAM_STR);
			$stmt->bindParam(4, $datosPersona['cell'], PDO::PARAM_INT);
			$stmt->bindParam(5, $datosPersona['id'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function eliminarPersonaModelo($id)
	{
		$sql = "DELETE FROM $this->tabla WHERE idPersona = ?";
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
