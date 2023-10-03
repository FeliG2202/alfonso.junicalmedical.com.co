<?php

namespace PHP\Controllers;

use PHP\Models\UsuarioModelo;

class UsuarioControlador {

	private $usuarioModelo;

	public function __construct() {
		$this->usuarioModelo = new UsuarioModelo();
	}


	public function validateSession() {
		if (isset($_POST['regLogin'])) {
			$files = $this->usuarioModelo->validateSessionModelo($_POST);

			if (isset($files->status)) {
				return (object) ['request' => false, 'url' => "index.php?view=login", "message" => "El email/contraseña es incorrecto"];
			}

			if ((int) $files['cont'] > 0) {
				return $this->loginSession();
			} else {
				return (object) ['request' => false, 'url' => "index.php?view=login", "message" => "El email/contraseña es incorrecto"];
			}
		}
	}

	private function loginSession()
	{
		$data = $this->usuarioModelo->loginSessionModelo($_POST);

		if ($data['usuarioEstado'] === 'Inactivo') {
			return (object) ['request' => false, 'url' => "index.php?view=login", 'message' => "Esta cuenta está inactiva"];
		}

		$_SESSION['session'] = true;
		$_SESSION['rol'] = $data['idRol'];
		$_SESSION['id'] = $data['idUsuario'];

		return (object) ['request' => true, 'url' => "index.php?view=inicio2"];
	}

	public function registrarUsuarioControlador() {
		$res = $this->usuarioModelo->registrarUsuarioModelo([
			'idPersona' => request->idPersona,
			'usuarioLogin' => request->usuarioLogin,
			'usuarioPassword' => request->usuarioPassword,
			'idRol' => request->idRol
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarUsuarioControlador() {
		if (isset($_POST['btnBuscarusuario'])) {
			$datosUsuario =  $_POST['datoBusqueda'];
		} else {
			$datosUsuario = "";
		}

		$usuarioModelo = new UsuarioModelo();
		return $usuarioModelo->consultarUsuarioModelo($datosUsuario);
	}

	public function actualizarUsuarioControlador()
	{
		if (isset($_POST['updusuario'])) {
			$datosUsuario = array(
				'login' => $_POST['login'],
				'password' => $_POST['password'],
				'estado' => $_POST['estado'],
				'id' => $_GET['id']
			);
			$usuarioModelo = new UsuarioModelo();
			return !$usuarioModelo->actualizarUsuarioModelo($datosUsuario)
				? (object) ['request' => false, 'url' => "index.php?folder=frmUsuarios&view=frmRegUsuarios"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmUsuarios&view=frmConUsuarios"];
		}
	}


	public function eliminarUsuarioControlador()
	{
		if (isset($_GET['id'])) {

			$usuarioModelo = new UsuarioModelo();
			return !$usuarioModelo->eliminarUsuarioModelo($_GET['id'])
				? (object) ['request' => false, 'url' => "index.php?folder=frmUsuarios&view=frmConUsuarios"]
				: (object) ['request' => true, 'url' => "index.php?folder=frmUsuarios&view=frmConUsuarios"];
		}
	}
}
