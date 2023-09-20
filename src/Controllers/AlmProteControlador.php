<?php

namespace PHP\Controllers;

use PHP\Models\AlmProteModelo;

class AlmProteControlador {

	private $AlmProteModelo;

	function __construct() {
		$this->AlmProteModelo = new AlmProteModelo();
	}
	
	/* FUNCION PARA REGISTRAR PROTEINA */
	public function registrarAlmTipoControlador() {
		$res = $this->AlmProteModelo->registrarAlmProteModelo([
			'nutriProteNombre' => request->nutriProteNombre
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	/* FUNCION PARA CONSULTAR PROTEINA */
	public function consultarAlmTipoControlador() {
		return $this->AlmProteModelo->consultarAlmProteModelo();
	}

	/* FUNCION PARA ACTUALIZAR PROTEINA */
	public function actualizarAlmProteControlador(string $idNutriProte) {
		$res = $this->AlmProteModelo->actualizarAlmProteModelo([
			'nutriProteNombre' => request->nutriProteNombre,
			'idNutriProte' => (int) $idNutriProte
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('tipo actualizado correctamente');
	}

	/* FUNCION PARA ELIMINAR PROTEINA */
	public function eliminarAlmProteControlador(string $idNutriProte) {
		$res = $this->AlmProteModelo->eliminarAlmProteModelo([
			'idNutriProte' => (int) $idNutriProte
		]);

		if ($res->status === 'database-error') {
			return $res;
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}
}
