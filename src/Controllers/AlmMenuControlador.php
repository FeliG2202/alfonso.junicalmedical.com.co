<?php 

namespace PHP\Controllers;

use PHP\Models\AlmMenuModelo;

class AlmMenuControlador {
	
	private $AlmMenuModelo;

	public function __construct() {
		$this->AlmMenuModelo = new AlmMenuModelo();
	}

	public function registrarAlmTipoControlador() {
		$res = $this->AlmMenuModelo->registrarAlmMenuModelo(([
			'idNutriTipo' => request->idNutriTipo,
			'idNutriDias' => request->idNutriDias,
			'idNutriSopa' => request->idNutriSopa,
			'idNutriArroz' => request->idNutriArroz,
			'idNutriProte' => toNull(request->idNutriProte),
			'idNutriEnerge' => toNull(request->idNutriEnerge),
			'idNutriAcomp' => toNull(request->idNutriAcomp),
			'idNutriEnsal' => request->idNutriEnsal,
			'idNutriSemana' => request->idNutriSemana
		]));

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function registrarAlmTipoControladorPaci() {
		$res = $this->AlmMenuModelo->registrarAlmMenuModeloPaci([
			'idNutriTipo' => request->idNutriTipo,
			'idNutriDias' => request->idNutriDias,
			'idNutriSopa' => request->idNutriSopa,
			'idNutriArroz' => request->idNutriArroz,
			'idNutriProte' => toNull(request->idNutriProte),
			'idNutriEnerge' => toNull(request->idNutriEnerge),
			'idNutriAcomp' => toNull(request->idNutriAcomp),
			'idNutriEnsal' => request->idNutriEnsal,
			'idNutriSemana' => request->idNutriSemana
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarAlmMenuControlador(){
		return $this->AlmMenuModelo->consultarAlmMenuModelo();
	}

	public function consultarAlmMenuPaciControlador(){
		return $this->AlmMenuModelo->consultarAlmMenuPaciModelo();
	}

	public function eliminarAlmMenuControlador(string $idNutriMenu) {
		$res = $this->AlmMenuModelo->eliminarAlmMenuModelo([
			'idNutriMenu' => (int) $idNutriMenu
		]);

		if ($res->status === 'database-error') {
			return $res;
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}
	
	public function eliminarAlmMenuPaciControlador(string $idNutriMenuPaci) {
		$res = $this->AlmMenuModelo->eliminarAlmMenuPaciModelo([
			'idNutriMenuPaci' => (int) $idNutriMenuPaci
		]);

		if ($res->status === 'database-error') {
			return $res;
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}
}