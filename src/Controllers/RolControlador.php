<?php

namespace PHP\Controllers;

use PHP\Models\RolModelo;

class RolControlador {

	private $rolModelo;

	function __construct() {
		$this->rolModelo = new RolModelo();
	}

	public function registrarRolControlador() {
		$res = $this->rolModelo->registrarRolModelo([
			'rolNombre' => request->rolNombre
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarRolControlador() {
		return $this->rolModelo->consultarRolModelo();
	}

	public function actualizarRolControlador(string $idRol) {
		$res = $this->rolModelo->actualizarRolModelo([
			'rolNombre' => request->rolNombre,
			'idRol' => (int) $idRol
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('actualizado correctamente');
	}

	public function eliminarRolControlador(string $idRol) {
		$res = $this->rolModelo->eliminarRolModelo([
			'idRol' => (int) $idRol
		]);

		if ($res->status === 'database-error'){
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}
}
