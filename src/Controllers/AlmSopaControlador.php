<?php

namespace PHP\Controllers;

use PHP\Models\AlmSopaModelo;

class AlmSopaControlador {

	private $AlmSopaModelo;

	function __construct() {
		$this->AlmSopaModelo = new AlmSopaModelo();
	}

	public function registrarAlmSopaControlador() {
		$res = $this->AlmSopaModelo->registrarAlmSopaModelo([
			'nutriSopaNombre' => request->nutriSopaNombre
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarAlmSopaControlador() {
		return $this->AlmSopaModelo->consultarAlmSopaModelo();
	}

	public function actualizarAlmSopaControlador(string $idNutriSopa) {
		$res = $this->AlmSopaModelo->actualizarAlmSopaModelo([
			'nutriSopaNombre' => request->nutriSopaNombre,
			'idNutriSopa' => (int) $idNutriSopa
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('tipo actualizado correctamente');
	}

	public function eliminarAlmSopaControlador(string $idNutriSopa) {
		$res = $this->AlmSopaModelo->eliminarAlmSopaModelo([
			'idNutriSopa' => (int) $idNutriSopa
		]);

		if ($res->status === 'database-error') {
			return $res;
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}

}
