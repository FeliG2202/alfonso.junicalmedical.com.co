<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;

class UsuarioModelo extends Connection {

	private $tabla;

	function __construct()	{
		$this->tabla = 'usuarios';
	}

	function registrarUsuarioModelo($datosUsuario) {
		$sql = "INSERT INTO $this->tabla(usuarioLogin, usuarioPassword, usuarioEstado, idPersonas) VALUES (?,?,?,?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosUsuario['usuario'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosUsuario['password'], PDO::PARAM_STR);
			$stmt->bindParam(3, $datosUsuario['estado'], PDO::PARAM_STR);
			$stmt->bindParam(4, $datosUsuario['idPersona'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function validateSessionModelo(array $data) {
		$sql = "SELECT count(*) AS cont FROM usuarios WHERE usuarioLogin=? AND usuarioPassword=?";
		
		try {
			$stmt= $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $data['login'], PDO::PARAM_STR);
			$stmt->bindParam(2, $data['password'], PDO::PARAM_STR);
			return !$stmt->execute() ? (object) ['status' => "success"] : $stmt->fetch();
		} catch (PDOException $e) {
			print($e->getMessage());
		}
	}

	public function loginSessionModelo(array $data) {
		$sql = "SELECT idUsuario, usuarioEstado, idRol FROM usuarios WHERE usuarioLogin=? AND usuarioPassword=?";
		
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $data['login'], PDO::PARAM_STR);
			$stmt->bindParam(2, $data['password'], PDO::PARAM_STR);
			return !$stmt->execute() ? (object) ['status' => "success"] : $stmt->fetch();
		} catch (PDOException $e) {
			print($e->getMessage());
		}
	}

	public function consultarUsuarioModelo($datosUsuario) {

		$datosUsuario = '%'.$datosUsuario.'%';


		$sql = "SELECT * FROM $this->tabla WHERE usuarioLogin LIKE ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosUsuario, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			} else {
				return [];
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function consultarUsuarioIdModelo($id) {
		$sql = "SELECT * FROM $this->tabla WHERE idUsuario=?";
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

	public function actualizarUsuarioModelo($datosUsuario){
		$sql = "UPDATE $this->tabla SET usuarioLogin=?, usuarioPassword=?, usuarioEstado=? WHERE idUsuario = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1,$datosUsuario['login'],PDO::PARAM_STR);
			$stmt->bindParam(2,$datosUsuario['password'],PDO::PARAM_STR);
			$stmt->bindParam(3,$datosUsuario['estado'],PDO::PARAM_STR);
			$stmt->bindParam(4,$datosUsuario['id'],PDO::PARAM_INT);
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

	public function eliminarUsuarioModelo($id){

		$sql= "DELETE FROM $this->tabla WHERE idUsuario = ?";

		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
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
}