<?php

namespace PHP\Controllers;

use PHP\Models\AlmEnsalModelo;

class AlmEnsalControlador {

	private $AlmEnsalModelo;

	function __construct() {
		$this->AlmEnsalModelo = new AlmEnsalModelo();
	}

	public function registrarAlmEnsalControlador() {
		$res = $this->AlmEnsalModelo->registrarAlmEnsalModelo([
			'nutriEnsalNombre' => request->nutriEnsalNombre
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarAlmEnsalControlador() {
		return $this->AlmEnsalModelo->consultarAlmEnsalModelo();
	}

	public function actualizarAlmEnsalControlador(string $idNutriEnsal) {
		$res = $this->AlmEnsalModelo->actualizarAlmEnsalModelo([
			'nutriEnsalNombre' => request->nutriEnsalNombre,
			'idNutriEnsal' => (int) $idNutriEnsal
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('tipo actualizado correctamente');
	}

	public function eliminarAlmEnsalControlador(string $idNutriEnsal) {
		$res = $this->AlmEnsalModelo->eliminarAlmEnsalModelo([
			'idNutriEnsal' => (int) $idNutriEnsal
		]);

		if ($res->status === 'database-error') {
			return $res;
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}

}
