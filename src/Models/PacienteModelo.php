<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class PacienteModelo {


	public function registrarPacienteModelo($data) {
		return DB::table('pacientes')->insert([
			'pacienteDocumento' => $data['pacienteDocumento'],
			'pacienteNombre' => $data['pacienteNombre'],
			'pacienteTorre' => $data['pacienteTorre'],
			'pacienteCama' => $data['pacienteCama'],
			'fecha_registro' => $data['fecha_registro']
		])->execute();
	}

	public function consultarPacienteModelo() {
		return DB::table('pacientes')->select()->getAll();
	}

	public function actualizarPacienteModelo($data) {
		return DB::table('pacientes')->update([
			'pacienteDocumento' => $data['pacienteDocumento'],
			'pacienteNombre' => $data['pacienteNombre'],
			'pacienteTorre' => $data['pacienteTorre'],
			'pacienteCama' => $data['pacienteCama'],
		])->where(
			DB::equalTo('idPaciente'), $data['idPaciente'])
		->execute();
	}

	public function eliminarPacienteModelo($data) {
		return DB::table('pacientes')
		->delete()
		->where(DB::equalTo('idPaciente'), $data['idPaciente'])
		->execute();
	}

	public function uploadModelo($data){
		return DB::table('pacientes')->insert([
			'pacienteDocumento' => $data['pacienteDocumento'],
			'pacienteNombre' => $data['pacienteNombre'],
			'pacienteTorre' => $data['pacienteTorre'],
			'pacienteCama' => $data['pacienteCama'],
			'fecha_registro' => $data['fecha_registro']
		])->execute();
	}

	public function existeCama(){
		$data = date('Y-m-d');
		return DB::table('pacientes')->select('pacienteCama')
		->where(DB::equalTo('fecha_registro'), $data)->getAll();
	}

	public function existeDocumento(){
		$data = date('Y-m-d');
		return DB::table('pacientes')->select('pacienteDocumento')
		->where(DB::equalTo('fecha_registro'), $data)->getAll();
	}
}
