<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class PacienteModelo {


	public function registrarPacienteModelo($data) {
		return DB::table('pacientes')->insert([
			'pacienteDocumento' => $data['pacienteDocumento'],
			'pacienteNombre' => $data['pacienteNombre'],
			'pacienteDieta' => $data['pacienteDieta'],
			'pacienteCama' => $data['pacienteCama'],
		])->execute();
	}

	public function consultarPacienteModelo() {
		return DB::table('pacientes')->select()->getAll();
	}

	public function actualizarPacienteModelo($data) {
		return DB::table('pacientes')->update([
			'pacienteDocumento' => $data['pacienteDocumento'],
			'pacienteNombre' => $data['pacienteNombre'],
			'pacienteDieta' => $data['pacienteDieta'],
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
			'pacienteDieta' => $data['pacienteDieta'],
			'pacienteCama' => $data['pacienteCama'],
		])->execute();
	}
}
