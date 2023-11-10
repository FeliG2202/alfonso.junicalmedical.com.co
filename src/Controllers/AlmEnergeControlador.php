<?php

namespace PHP\Controllers;

use PHP\Models\AlmEnergeModelo;

class AlmEnergeControlador {

	private $AlmEnergeModelo;

	function __construct() {
		$this->AlmEnergeModelo = new AlmEnergeModelo();
	}

	public function registrarAlmEnergeControlador() {
		$res = $this->AlmEnergeModelo->registrarAlmEnergeModelo([
			'nutriEnergeNombre' => request->nutriEnergeNombre
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarAlmEnergeControlador() {
		return $this->AlmEnergeModelo->consultarAlmEnergeModelo();
	}

	public function actualizarAlmEnergeControlador(string $idNutriEnerge) {
		$res = $this->AlmEnergeModelo->actualizarAlmEnergeModelo([
			'nutriEnergeNombre' => request->nutriEnergeNombre,
			'idNutriEnerge' => (int) $idNutriEnerge
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('tipo actualizado correctamente');
	}

	public function eliminarAlmEnergeControlador(string $idNutriEnerge) {
		$res = $this->AlmEnergeModelo->eliminarAlmEnergeModelo([
			'idNutriEnerge' => (int) $idNutriEnerge
		]);

		if ($res->status === 'database-error') {
			return $res;
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}
}
