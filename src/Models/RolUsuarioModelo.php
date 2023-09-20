<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;

class RolUsuarioModelo extends Connection {
	
	private $vista; 
	private $tabla;

	function __construct(){
		$this->tabla = 'usuariosroles';
		$this->vista = 'view_usuariosroles';
	}

	public function registrarRolUsuarioModelo($idUsuario, $idRoles){
		$values = '';
		$posicion = 1;

		for ($i = 0; $i < count($idRoles); $i++) { 
			$values .= "(?,?),";
		}

		$values = substr($values, 0, -1);
		$sql = "INSERT INTO $this->tabla (idUsuario, idRol) VALUES ".$values;
		print "<br>$sql";
		try {
			$stmt = $this->conectar()->prepare($sql);
			for ($i=0; $i < count($idRoles) ; $i++) { 
				$stmt->bindParam($posicion, $idUsuario, PDO::PARAM_INT);
				$posicion++;
				$stmt->bindParam($posicion, $idRoles[$i], PDO::PARAM_INT);
				$posicion++;
			}

			if ($stmt->execute()){
				return true;
			}
			else{
				return false;
			}

		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function consultarRolesUsuariosIdUsuarioModelo($id) {
		$sql = "SELECT * FROM $this->vista WHERE idUsuario=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			if($stmt->execute()){
				return $stmt->fetchAll();
			}
			else{
				return [];
			}
		} catch (PDOException $e) {
			print($e->getMessage());
		}
	}


	public function consultarRolesUsuarioIdUsuarioModelo($idUsuario){
		//print "entro en el modelo ".$idUsuario;
		$sql = "SELECT * FROM $this->vista where idUsuario = ?";
		//print $sql;
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $idUsuario, PDO::PARAM_INT);
			if ($stmt->execute()){
				return $stmt->fetchAll();
			}
			else{
				return [];
			}

		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function consultarRolUsuarioIdRolModelo($idRol,$idUsuario){
		$sql = "SELECT * FROM $this->tabla WHERE idUsuario = ? AND idRol = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $idUsuario, PDO::PARAM_INT);
			$stmt->bindParam(2, $idRol, PDO::PARAM_INT);
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

	public function actualizarEstadoRolUsuarioIdModelo($idUsuarioRol,$estado){
		$sql = "UPDATE $this->tabla SET usuarioRolEstado=? WHERE idUsuarioRol=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $estado, PDO::PARAM_STR);
			$stmt->bindParam(2, $idUsuarioRol, PDO::PARAM_INT);
			return $stmt->execute();
		} catch (PDOException $e) {
			print_r($e->getMessage());			
		}
	}

	public function cambiarEstadoRolUsuarioModelo($idUsuario, $estado){
		$sql = "UPDATE $this->tabla SET usuarioRolEstado = ? WHERE idUsuario = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $estado, PDO::PARAM_STR);
			$stmt->bindParam(2, $idUsuario, PDO::PARAM_INT);
			if($stmt->execute()){
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