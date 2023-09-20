<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class AlmBebidaModelo {

	public function registrarAlmBebidaModelo($data){
		return DB::table('nutribebida')->insert([
			'nutriBebidaNombre' => $data['nutriBebidaNombre'],
		])->execute();
	}

	public function consultarAlmBebidaModelo() {
		return DB::table('nutribebida')->select()->getAll();
	}

	public function actualizarAlmBebidaModelo($data) {
		return DB::table('nutribebida')->update([
			'nutriBebidaNombre' => $data['nutriBebidaNombre']
		])->where(
			DB::equalTo('idNutriBebida'), $data['idNutriBebida'])
		->execute();
	}

	public function eliminarAlmBebidaModelo($data) {
		return DB::table('nutribebida')
		->delete()
		->where(DB::equalTo('idNutriBebida'), $data['idNutriBebida'])
		->execute();
	}
}
