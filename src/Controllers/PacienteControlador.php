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
    // Obtén los datos del formulario
		$documentoFormulario = request->pacienteDocumento;
		$camaFormulario = strtoupper(request->pacienteCama);

    // Verifica si los datos del formulario ya existen en la base de datos
		$baseDocumento = $this->PacienteModelo->existeDocumento();
		$baseCama = $this->PacienteModelo->existeCama();

		foreach($baseDocumento as $documento) {
			if ($documento->pacienteDocumento == $documentoFormulario) {
				return response->code(500)->error('Documento duplicado');
			}
		}

		foreach($baseCama as $cama) {
			if ($cama->pacienteCama == $camaFormulario) {
				return response->code(500)->error('Cama duplicada');
			}
		}

    // Si no existen, registra al paciente
		$res = $this->PacienteModelo->registrarPacienteModelo([
			'pacienteDocumento' => $documentoFormulario,
			'pacienteNombre' => request->pacienteNombre,
			'pacienteTorre' => request->pacienteTorre,
			'pacienteCama' => $camaFormulario,
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

	public function consultarPacienteHistoricoControlador() {
		return $this->PacienteModelo->consultarPacienteHistoricoModelo();
	}

	public function actualizarPacienteControlador(string $idPaciente) {
		$res = $this->PacienteModelo->actualizarPacienteModelo([
			'pacienteDocumento' => request->pacienteDocumento,
			'pacienteNombre' => request->pacienteNombre,
			'pacienteTorre' => request->pacienteTorre,
			'pacienteCama' => strtoupper(request->pacienteCama),
			'idPaciente' => (int) $idPaciente
		]);

		if ($res->status === 'database-error') {
			return response->code(500)->error('Error al momento de actualizar');
		}

		return response->code(200)->success('actualizado correctamente');
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
		$inputFileName = $_FILES['excel']['tmp_name'];
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
		$worksheet = $spreadsheet->getActiveSheet();
		$highestRow = $worksheet->getHighestRow();
		$highestColumn = $worksheet->getHighestColumn();
		$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

		$objects = [];
		for ($row = 3; $row <= $highestRow; ++$row) {
			$object = (object) [
				'pacienteNombre' => $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
				'pacienteDocumento' => $worksheet->getCellByColumnAndRow(3, $row)->getValue(),
				'pacienteTorre' => $worksheet->getCellByColumnAndRow(4, $row)->getValue(),
            'pacienteCama' => $worksheet->getCellByColumnAndRow(5, $row)->getValue() !== null ? strtoupper($worksheet->getCellByColumnAndRow(5, $row)->getValue()) : null, // Convertir a mayúsculas
            'fecha_registro' => date('Y-m-d')// Agregar la fecha de registro
        ];
        $objects[] = $object;
    }

    $baseDocument = $this->PacienteModelo->existeDocumento();
    $baseCama = $this->PacienteModelo->existeCama();

    $baseDocument = json_decode(json_encode($baseDocument), true);
    $baseCama = json_decode(json_encode($baseCama), true);

    $documentosBase = array_column($baseDocument, 'pacienteDocumento');
    $CamasBase = array_column($baseCama, 'pacienteCama');

    $validatedData = [];
    foreach ($objects as $object) {
        // Verificar si el nombre, el documento, la torre y la cama no son nulos y son únicos en la base de datos
    	if (
    		$object->pacienteNombre !== null &&
    		$object->pacienteDocumento !== null &&
    		$object->pacienteTorre !== null &&
    		$object->pacienteCama !== null &&
    		!in_array($object->pacienteDocumento, $documentosBase) &&
    		!in_array($object->pacienteCama, $CamasBase)
    	) {
    		$validatedData[] = $object;
    	}
    }

    $savedData = [];
    $notSavedData = [];
    foreach ($objects as $object) {
    	if (
    		$object->pacienteNombre !== null &&
    		$object->pacienteDocumento !== null &&
    		$object->pacienteTorre !== null &&
    		$object->pacienteCama !== null &&
    		!in_array($object->pacienteDocumento, $documentosBase) &&
    		!in_array($object->pacienteCama, $CamasBase)
    	) {
            $savedData[] = $object; // Guarda los datos validados en savedData
            $this->PacienteModelo->uploadModelo((array) $object); // Enviar datos no duplicados al modelo
        } else {
        	$notSavedData[] = $object;
        }
    }

    return ['message' => 'El archivo a cargado correctamente', 'savedData' => $savedData, 'notSavedData' => $notSavedData];
}


}