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
				return (object) ['request' => false, 'url' => "index.php?view=login", "message" => "Usuario o clave incorrectos."];
			}

			if ((int) $files['cont'] > 0) {
				return $this->loginSession();
			} else {
				return (object) ['request' => false, 'url' => "index.php?view=login", "message" => "Usuario o clave incorrectos."];
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
			'usuarioLogin' => request->usuarioLogin,
			'usuarioPassword' => request->usuarioPassword,
			'idPersona' => request->idPersona,
			'idRol' => request->idRol
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarUsuarioControlador() {
		return $this->usuarioModelo->consultarUsuarioModelo();
	}

	public function actualizarUsuarioControlador(string $idNutriEnsal) {
		$res = $this->usuarioModelo->actualizarUsuarioModelo([
			'nutriEnsalNombre' => request->nutriEnsalNombre,
			'idNutriEnsal' => (int) $idNutriEnsal
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('actualizado correctamente');
	}

	public function eliminarUsuarioControlador(string $idUsuario) {
		$res = $this->usuarioModelo->eliminarUsuarioModelo([
			'idUsuario' => (int) $idUsuario
		]);

		if ($res->status === 'database-error') {
			return $res;
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}
}
