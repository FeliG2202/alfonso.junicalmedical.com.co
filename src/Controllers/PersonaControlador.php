<?php 

namespace PHP\Controllers;

use PHP\Models\PersonaModelo;

class PersonaControlador {

	private $PersonaModelo;

	function __construct(){
		$this->PersonaModelo = new PersonaModelo();
	}

	public function registrarPersonaControlador() {
		$res = $this->PersonaModelo->registrarPersonaModelo([
			'personaDocumento' => request->personaDocumento,
			'personaNombreCompleto' => request->personaNombreCompleto,
			'personaCorreo' => request->personaCorreo,
			'personaNumberCell' => request->personaNumberCell
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarPersonaControlador() {
		return $this->PersonaModelo->consultarPersonaModelo();
	}

	public function actualizarPersonaControlador(string $idPersona) {
		$res = $this->PersonaModelo->actualizarPersonaModelo([
			'personaDocumento' => request->personaDocumento,
			'personaNombreCompleto' => request->personaNombreCompleto,
			'personaCorreo' => request->personaCorreo,
			'personaNumberCell' => request->personaNumberCell,
			'idPersona' => (int) $idPersona
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('tipo actualizado correctamente');
	}

	public function eliminarPersonaControlador(string $idPersona) {
		$res = $this->PersonaModelo->eliminarPersonaModelo([
			'idPersona' => (int) $idPersona
		]);

		if ($res->status === 'database-error') {
			return $res;
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}
}