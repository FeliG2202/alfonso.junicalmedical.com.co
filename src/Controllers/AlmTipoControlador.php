<?php

namespace PHP\Controllers;

use PHP\Models\AlmTipoModelo;

class AlmTipoControlador {

	private $AlmTipoModelo;

	function __construct() {
		$this->AlmTipoModelo = new AlmTipoModelo();
	}

	public function registrarAlmTipoControlador() {
		$res = $this->AlmTipoModelo->registrarAlmTipoModelo([
			'nutriTipoNombre' => request->nutriTipoNombre
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarAlmTipoControlador() {
		return $this->AlmTipoModelo->consultarAlmTipoModelo();
	}

	public function actualizarAlmTipoControlador(string $idNutriTipo) {
		$res = $this->AlmTipoModelo->actualizarAlmTipoModelo([
			'nutriTipoNombre' => request->nutriTipoNombre,
			'idNutriTipo' => (int) $idNutriTipo
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('tipo actualizado correctamente');
	}

	public function eliminarAlmTipoControlador(string $idNutriTipo) {
		$res = $this->AlmTipoModelo->eliminarAlmTipoModelo([
			'idNutriTipo' => (int) $idNutriTipo
		]);

		if ($res->status === 'database-error') {
			return $res;
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}


}
