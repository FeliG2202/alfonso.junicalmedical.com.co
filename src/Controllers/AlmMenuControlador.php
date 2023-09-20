<?php 

namespace PHP\Controllers;

use PHP\Models\AlmMenuModelo;

class AlmMenuControlador {
	
	private $AlmMenuModelo;

	public function __construct() {
		$this->AlmMenuModelo = new AlmMenuModelo();
	}

	public function registrarAlmTipoControlador() {
		$res = $this->AlmMenuModelo->registrarAlmMenuModelo([
			'idNutriTipo' => request->idNutriTipo,
			'idNutriDias' => request->idNutriDias,
			'idNutriSopa' => request->idNutriSopa,
			'idNutriArroz' => request->idNutriArroz,
			'idNutriProte' => request->idNutriProte,
			'idNutriEnerge' => request->idNutriEnerge,
			'idNutriAcomp' => request->idNutriAcomp,
			'idNutriEnsal' => request->idNutriEnsal,
			'idNutriBebida' => request->idNutriBebida
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarAlmMenuControlador(){
		return $this->AlmMenuModelo->consultarAlmMenuModelo();
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
	
}