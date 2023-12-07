<?php

namespace PHP\Controllers;

use PHP\Models\PacienteModelo;
use LionSpreadsheet\Spreadsheet;

class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter {

	public function readCell($columnAddress, $row, $worksheetName = '') {
        // Read title row and rows 20 - 30
		if ($row > 2) {
			return true;
		}
		return false;
	}
}

class PacienteControlador {

	private $PacienteModelo;

	function __construct(){
		$this->PacienteModelo = new PacienteModelo();
	}

	public function registrarPacienteControlador() {
		$res = $this->PacienteModelo->registrarPacienteModelo([
			'pacienteDocumento' => request->pacienteDocumento,
			'pacienteNombre' => request->pacienteNombre,
			'pacienteDieta' => request->pacienteDieta,
			'pacienteCama' => toNull(request->pacienteCama),
			'fecha_registro' => date('Y-m-d')
		]);

		if ($res->status === "database-error") {
			return response->code(500)->error('Error al momento de registrar');
		}

		return response->code(200)->success('registrado correctamente');
	}

	public function consultarPacienteControlador() {
		return $this->PacienteModelo->consultarPacienteModelo();
	}

	public function actualizarPacienteControlador(string $idPaciente) {
		$res = $this->PacienteModelo->actualizarPacienteModelo([
			'pacienteDocumento' => request->pacienteDocumento,
			'pacienteNombre' => request->pacienteNombre,
			'pacienteDieta' => request->pacienteDieta,
			'pacienteCama' => request->pacienteCama,
			'idPaciente' => (int) $idPaciente
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('tipo actualizado correctamente');
	}

	public function eliminarPacienteControlador(string $idPaciente) {
		$res = $this->PacienteModelo->eliminarPacienteModelo([
			'idPaciente' => (int) $idPaciente
		]);

		if ($res->status === 'database-error') {
			return $res;
			return response->code(500)->error('Error al momento de Eliminar');
		}

		return response->code(200)->success('Eliminado correctamente');
	}

	public function uploadControlador() {

		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		$inputFileName = $_FILES['excel']['tmp_name'];

		$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
		$reader->setReadFilter(new MyReadFilter());
		$spreadsheet = $reader->load($inputFileName);

		$data = $spreadsheet->getActiveSheet()->toArray();
		$camasBase = $this->PacienteModelo->camasexistente();
		$camasBaseArray = array();

		foreach($camasBase as $cama) {
			$camasBaseArray[] = $cama->pacienteCama;
		}

		foreach ($data as $row) {
			if ($row[1] != '') {
				if (in_array($row[4], $camasBaseArray)) {
					return response->code(300)->success("La cama {$row[4]} ya está ocupada.");
					continue;
				}
				$dataParaGuardar = [
					'pacienteNombre' => $row[1],
					'pacienteDocumento' => $row[2],
					'pacienteDieta' => $row[3],
					'pacienteCama' => $row[4],
					'fecha_registro' => date('Y-m-d')
				];
				try {
					$this->PacienteModelo->uploadModelo($dataParaGuardar);
					return response->code(200)->success('Los datos se han enviado al modelo correctamente.');
				} catch (\Exception $e) {
					return response->code(500)->error('Error al guardar los datos: ',  $e->getMessage(), "\n");
				}
			}
		}
	}

}