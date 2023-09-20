<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class AlmMenuModelo {

	public function registrarAlmMenuModelo($data) {
		return DB::table('nutrimenu')->insert([
			'idNutriTipo' => $data['idNutriTipo'],
			'idNutriDias' => $data['idNutriDias'],
			'idNutriSopa' => $data['idNutriSopa'],
			'idNutriArroz' => $data['idNutriArroz'],
			'idNutriProte' => $data['idNutriProte'],
			'idNutriEnerge' => $data['idNutriEnerge'],
			'idNutriAcomp' => $data['idNutriAcomp'],
			'idNutriEnsal' => $data['idNutriEnsal'],
			'idNutriBebida' => $data['idNutriBebida'],
		])->execute();
	}

	public function consultarAlmMenuModelo() {
		return DB::table('view_nutrimenu')->select()->getAll();
	}

	public function eliminarAlmMenuModelo($data) {
		return DB::table('nutriensal')
			->delete()
			->where(DB::equalTo('idNutriMenu'), $data['idNutriMenu'])
			->execute();
	}

}