<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;
use LionDatabase\Drivers\MySQL\MySQL as DB;

class UsuarioModelo extends Connection {

	private $tabla;

	function __construct()	{
		$this->tabla = 'usuarios';
	}

	public function registrarUsuarioModelo($data) {
    return DB::table('usuarios')->insert([
    	'usuarioLogin' => $data['usuarioLogin'],
    	'usuarioPassword' => $data['usuarioPassword'],
    	'usuarioEstado' => 'Activo',
        'idPersona' => $data['idPersona'],
        'idRol' => $data['idRol'],
    ])->execute();
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

	public function consultarUsuarioModelo() {
		return DB::table(
            DB::as('usuarios', 'user')
        )->select(
            DB::column('personaNombreCompleto', 'prs'),
            DB::column('usuarioLogin', 'user'),
            DB::column('rolNombre', 'rol'),
            DB::column('usuarioEstado', 'user'),
        )->inner()->join(
            DB::as('personas', 'prs'),
            DB::column('idPersona', 'user'),
            DB::column('idPersona', 'prs'),
        )->inner()->join(
            DB::as('roles', 'rol'),
            DB::column('idRol', 'user'),
            DB::column('idRol', 'rol'),
        )->getAll();
	}

	public function actualizarUsuarioModelo($data) {
		return DB::table('usuarios')->update([
			'usuarioLogin' => $data['usuarioLogin'],
			'usuarioEstado' => $data['usuarioEstado']
		])->where(
			DB::equalTo('idUsuario'), $data['idUsuario'])
		->execute();
	}

	public function eliminarUsuarioModelo($data) {
		return DB::table('usuarios')
			->delete()
			->where(DB::equalTo('idUsuario'), $data['idUsuario'])
			->execute();
	}
}