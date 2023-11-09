<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class AlmTipoModelo {

	public function registrarAlmTipoModelo($data) {
		return DB::table('nutritipo')->insert([
			'nutriTipoNombre' => $data['nutriTipoNombre'],
		])->execute();
	}

	public function consultarAlmTipoModelo() {
		return DB::table('nutritipo')->select()->getAll();
	}

	public function actualizarAlmTipoModelo($data) {
		return DB::table('nutritipo')->update([
			'nutriTipoNombre' => $data['nutriTipoNombre']
		])->where(
			DB::equalTo('idNutriTipo'), $data['idNutriTipo'])
		->execute();
	}

	public function eliminarAlmTipoModelo($data) {
		return DB::table('nutritipo')
			->delete()
			->where(DB::equalTo('idNutriTipo'), $data['idNutriTipo'])
			->execute();
	}

}
