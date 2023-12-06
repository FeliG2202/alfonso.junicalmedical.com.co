<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class PersonaModelo {


	public function registrarPersonaModelo($data) {
		return DB::table('personas')->insert([
			'personaDocumento' => $data['personaDocumento'],
			'personaNombreCompleto' => $data['personaNombreCompleto'],
			'personaCorreo' => $data['personaCorreo'],
			'personaNumberCell' => $data['personaNumberCell'],
		])->execute();
	}

	public function consultarPersonaModelo() {
		return DB::table('personas')->select()->getAll();
	}

	public function actualizarPersonaModelo($data) {
		return DB::table('personas')->update([
			'personaDocumento' => $data['personaDocumento'],
			'personaNombreCompleto' => $data['personaNombreCompleto'],
			'personaCorreo' => $data['personaCorreo'],
			'personaNumberCell' => $data['personaNumberCell'],
		])->where(
			DB::equalTo('idPersona'), $data['idPersona'])
		->execute();
	}

	public function eliminarPersonaModelo($data) {
		return DB::table('personas')
		->delete()
		->where(DB::equalTo('idPersona'), $data['idPersona'])
		->execute();
	}

	public function uploadModelo($data){
		return DB::table('personas')->insert([
			'personaDocumento' => $data['personaDocumento'],
			'personaNombreCompleto' => $data['personaNombreCompleto'],
			'personaCorreo' => $data['personaCorreo'],
			'personaNumberCell' => $data['personaNumberCell'],
		])->execute();
	}

	public function existeDocumento(){
		return DB::table('personas')->select('personaDocumento')->getAll();
	}

	public function existeCorreo($correo){
		return DB::table('personas')
		->select()
		->where(DB::equalTo('personaCorreo'), $correo)
		->execute();
	}
}
