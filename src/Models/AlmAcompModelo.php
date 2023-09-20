<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class AlmAcompModelo {

	public function registrarAlmAcompModelo($data) {
		return DB::table('nutriacomp')->insert([
			'nutriAcompNombre' => $data['nutriAcompNombre'],
		])->execute();
	}


	public function consultarAlmAcompModelo() {
		return DB::table('nutriacomp')->select()->getAll();
	}

	public function actualizarAlmAcompModelo($data) {
		return DB::table('nutriacomp')->update([
			'nutriAcompNombre' => $data['nutriAcompNombre']
		])->where(
			DB::equalTo('idNutriAcomp'), $data['idNutriAcomp'])
		->execute();
	}

	public function eliminarAlmAcompModelo($data)
	{
		return DB::table('nutriacomp')
		->delete()
		->where(DB::equalTo('idNutriAcomp'), $data['idNutriAcomp'])
		->execute();
	}

}
