<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class AlmArrozModelo {


	public function registrarAlmArrozModelo($data) {
		return DB::table('nutriarroz')->insert([
			'nutriArrozNombre' => $data['nutriArrozNombre'],
		])->execute();
	}


	public function consultarAlmArrozModelo() {
		return DB::table('nutriarroz')->select()->getAll();
	}

	public function actualizarAlmArrozModelo($data) {
		return DB::table('nutriarroz')->update([
			'nutriArrozNombre' => $data['nutriArrozNombre']
		])->where(
			DB::equalTo('idNutriArroz'), $data['idNutriArroz'])
		->execute();
	}

	public function eliminarAlmArrozModelo($data) {
		return DB::table('nutriarroz')
		->delete()
		->where(DB::equalTo('idNutriArroz'), $data['idNutriArroz'])
		->execute();
	}

}
