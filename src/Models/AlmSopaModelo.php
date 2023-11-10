<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class AlmSopaModelo {

	public function registrarAlmSopaModelo($data) {
		return DB::table('nutrisopa')->insert([
			'nutriSopaNombre' => $data['nutriSopaNombre'],
		])->execute();
	}


	public function consultarAlmSopaModelo() {
		return DB::table('nutrisopa')->select()->getAll();
	}

	public function actualizarAlmSopaModelo($data){
		return DB::table('nutrisopa')->update([
			'nutriSopaNombre' => $data['nutriSopaNombre']
		])->where(
			DB::equalTo('idNutriSopa'), $data['idNutriSopa'])
		->execute();
	}

	public function eliminarAlmSopaModelo($data) {
		return DB::table('nutrisopa')
			->delete()
			->where(DB::equalTo('idNutriSopa'), $data['idNutriSopa'])
			->execute();
	}

}