<?php

namespace PHP\Controllers;

use PHP\Models\AlmHoraModelo;

class AlmHoraControlador {

	private $AlmHoraModelo;

	function __construct() {
		$this->AlmHoraModelo = new AlmHoraModelo();
	}

	public function consultarAlmHoraControlador() {
		return $this->AlmHoraModelo->consultarAlmHoraModelo();
	}

	public function actualizarAlmHoraControlador(string $idNutriHora) {
		$res = $this->AlmHoraModelo->actualizarAlmHoraModelo([
			'nutriHoraInicio' => request->nutriHoraInicio,
			'nutriHoraFinal' => request->nutriHoraFinal,
			'idNutriHora' => (int) $idNutriHora
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('actualizado correctamente');
	}

}
