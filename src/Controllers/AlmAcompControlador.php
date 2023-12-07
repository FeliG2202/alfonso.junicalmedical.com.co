<?php

namespace PHP\Controllers;

use PHP\Models\AlmAcompModelo;

class AlmAcompControlador {

	private $AlmAcompModelo;

	function __construct() {
		$this->AlmAcompModelo = new AlmAcompModelo();
	}

	public function registrarAlmACompControlador() {
		$res = $this->AlmAcompModelo->registrarAlmAcompModelo([
			'nutriAcompNombre' => request->nutriAcompNombre
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarAlmACompControlador() {
		return $this->AlmAcompModelo->consultarAlmAcompModelo();
	}

	public function actualizarAlmACompControlador(string $idNutriAcomp) {
		$res = $this->AlmAcompModelo->actualizarAlmAcompModelo([
			'nutriAcompNombre' => request->nutriAcompNombre,
			'idNutriAcomp' => (int) $idNutriAcomp
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('actualizado correctamente');
	}

	public function eliminarAlmACompControlador(string $idNutriAcomp) {
		$res = $this->AlmAcompModelo->eliminarAlmAcompModelo([
			'idNutriAcomp' => (int) $idNutriAcomp
		]);

		if ($res->status === 'database-error'){
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}
}
