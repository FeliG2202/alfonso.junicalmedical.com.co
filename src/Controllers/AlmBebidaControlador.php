<?php

namespace PHP\Controllers;

use PHP\Models\AlmBebidaModelo;

class AlmBebidaControlador {

	private $AlmBebidaModelo;

	function __construct() {
		$this->AlmBebidaModelo = new AlmBebidaModelo();
	}

	public function registrarAlmBebidaControlador() {
		$res = $this->AlmBebidaModelo->registrarAlmBebidaModelo([
			'nutriBebidaNombre' => request->nutriBebidaNombre
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarAlmBebidaControlador() {
		return $this->AlmBebidaModelo->consultarAlmBebidaModelo();
	}

	public function actualizarAlmBebidaControlador(string $idNutriBebida) {
		$res = $this->AlmBebidaModelo->actualizarAlmBebidaModelo([
			'nutriBebidaNombre' => request->nutriBebidaNombre,
			'idNutriBebida' => (int) $idNutriBebida
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('actualizado correctamente');
	}

	public function eliminarAlmBebidaControlador(string $idNutriBebida) {
		$res = $this->AlmBebidaModelo->eliminarAlmBebidaModelo([
			'idNutriBebida' => (int) $idNutriBebida
		]);

		if ($res->status === 'database-error'){
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}
}
