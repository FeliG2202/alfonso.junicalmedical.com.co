<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class RolModelo {

	public function registrarRolModelo($data){
		return DB::table('roles')->insert([
			'rolNombre' => $data['rolNombre'],
		])->execute();
	}

	public function consultarRolModelo() {
		return DB::table('roles')->select()->getAll();
	}

	public function actualizarRolModelo($data) {
		return DB::table('roles')->update([
			'rolNombre' => $data['rolNombre']
		])->where(
			DB::equalTo('idRol'), $data['idRol'])
		->execute();
	}

	public function eliminarRolModelo($data) {
		return DB::table('roles')
		->delete()
		->where(DB::equalTo('idRol'), $data['idRol'])
		->execute();
	}

}
