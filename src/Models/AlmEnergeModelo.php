<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class AlmEnergeModelo extends Connection {

	public function registrarAlmEnergeModelo($data) {
		return DB::table('nutrienerge')->insert([
			'nutriEnergeNombre' => $data['nutriEnergeNombre'],
		])->execute();
	}


	public function consultarAlmEnergeModelo() {
		return DB::table('nutrienerge')->select()->getAll();
	}


	public function actualizarAlmEnergeModelo($data) {
		return DB::table('nutrienerge')->update([
			'nutriEnergeNombre' => $data['nutriEnergeNombre']
		])->where(
			DB::equalTo('idNutriEnerge'), $data['idNutriEnerge'])
		->execute();
	}

	public function eliminarAlmEnergeModelo($data) {
		return DB::table('nutrienerge')
			->delete()
			->where(DB::equalTo('idNutriEnerge'), $data['idNutriEnerge'])
			->execute();
	}
}
