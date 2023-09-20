<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class AlmProteModelo {

	public function registrarAlmProteModelo($data) {
		return DB::table('nutriprote')->insert([
			'nutriProteNombre' => $data['nutriProteNombre'],
		])->execute();
	}

	public function consultarAlmProteModelo() {
		return DB::table('nutriprote')->select()->getAll();
	}

	public function actualizarAlmProteModelo($data) {
		return DB::table('nutriprote')->update([
			'nutriProteNombre' => $data['nutriProteNombre']
		])->where(
			DB::equalTo('idNutriProte'), $data['idNutriProte'])
		->execute();
	}

	public function eliminarAlmProteModelo($data) {
		return DB::table('nutriprote')
			->delete()
			->where(DB::equalTo('idNutriProte'), $data['idNutriProte'])
			->execute();
	}
}