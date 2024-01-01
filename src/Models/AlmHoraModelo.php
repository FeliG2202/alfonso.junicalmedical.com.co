<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class AlmHoraModelo {

	public function consultarAlmHoraModelo() {
		return DB::table('nutri_hora')->select()->getAll();
	}

	public function actualizarAlmHoraModelo($data){
		return DB::table('nutri_hora')->update([
			'nutriHoraInicio' => $data['nutriHoraInicio'],
			'nutriHoraFinal' => $data['nutriHoraFinal']
		])->where(
			DB::equalTo('idNutriHora'), $data['idNutriHora'])
		->execute();
	}

	public function eliminarAlmHoraModelo($data) {
		return DB::table('nutri_hora')
			->delete()
			->where(DB::equalTo('idNutriHora'), $data['idNutriHora'])
			->execute();
	}
}