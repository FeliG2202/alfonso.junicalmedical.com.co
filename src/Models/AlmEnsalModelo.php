<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class AlmEnsalModelo {

	public function registrarAlmEnsalModelo($data) {
		return DB::table('nutriensal')->insert([
			'nutriEnsalNombre' => $data['nutriEnsalNombre'],
		])->execute();
	}


	public function consultarAlmEnsalModelo() {
		return DB::table('nutriensal')->select()->getAll();
	}

	public function actualizarAlmEnsalModelo($data){
		return DB::table('nutriensal')->update([
			'nutriEnsalNombre' => $data['nutriEnsalNombre']
		])->where(
			DB::equalTo('idNutriEnsal'), $data['idNutriEnsal'])
		->execute();
	}

	public function eliminarAlmEnsalModelo($data) {
		return DB::table('nutriensal')
			->delete()
			->where(DB::equalTo('idNutriEnsal'), $data['idNutriEnsal'])
			->execute();
	}
}