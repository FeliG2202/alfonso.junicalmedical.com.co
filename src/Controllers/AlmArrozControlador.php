<?php

namespace PHP\Controllers;

use PHP\Models\AlmArrozModelo;

class AlmArrozControlador {

	private $almArrozModelo;

	function __construct() {
		$this->almArrozModelo = new AlmArrozModelo();
	}

	public function registrarAlmArrozControlador() {
		$res = $this->almArrozModelo->registrarAlmArrozModelo([
			'nutriArrozNombre' => request->nutriArrozNombre
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarAlmArrozControlador() {
		return $this->almArrozModelo->consultarAlmArrozModelo();
	}

	public function actualizarAlmArrozControlador(string $idNutriArroz) {
		$res = $this->almArrozModelo->actualizarAlmArrozModelo([
			'nutriArrozNombre' => request->nutriArrozNombre,
			'idNutriArroz' => (int) $idNutriArroz
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('actualizado correctamente');
	}

	public function eliminarAlmArrozControlador(string $idNutriArroz) {
		$res = $this->almArrozModelo->eliminarAlmArrozModelo([
			'idNutriArroz' => (int) $idNutriArroz
		]);

		if ($res->status === 'database-error'){
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}
}
