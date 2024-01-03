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
			'pacienteTorre' => request->pacienteTorre,
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
			'pacienteTorre' => request->pacienteTorre,
			'pacienteCama' => request->pacienteCama,
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

	public function validateExcelData($data) {
    $baseDocument = $this->PacienteModelo->existeDocumento();
    $baseCama = $this->PacienteModelo->existeCama();
    $documentosBase = [];
    $CamasBase = [];

    if (is_array($baseDocument)) {
        foreach ($baseDocument as $doc) {
            $documentosBase[] = $doc->pacienteDocumento;
        }
    }

    if (is_array($baseCama)) {
        foreach ($baseCama as $cama) {
            $CamasBase[] = $cama->pacienteCama;
        }
    }

    $validationResults = [];

    foreach ($data as $row) {
        $errorMessages = [];
        if ($row[1] != '') {
            if (in_array($row[2], $documentosBase)) {
                $errorMessages[] = "El documento {$row[2]} ya está registrado.";
            }
            if (in_array($row[4], $CamasBase)) {
                $errorMessages[] = "La cama {$row[4]} ya está registrada.";
            }

            if (!empty($errorMessages)) {
                $validationResults[] = [
                    'error' => true,
                    'messages' => $errorMessages,
                    'data' => $row,
                ];
            } else {
                $validationResults[] = ['error' => false, 'data' => $row];
            }
        }
    }
    return $validationResults;
}


public function saveValidatedData($validatedData) {
    foreach ($validatedData as $validationResult) {
        if (!$validationResult['error']) {
            $row = $validationResult['data'];
            $dataParaGuardar = [
					'pacienteNombre' => $row[1],
					'pacienteDocumento' => $row[2],
					'pacienteTorre' => $row[3],
					'pacienteCama' => $row[4],
					'fecha_registro' => date('Y-m-d')
				];

            try {
                $this->PacienteModelo->uploadModelo($dataParaGuardar);
            } catch (\Exception $e) {
                return response->code(500)->error('Error al guardar los datos: ',  $e->getMessage(), "\n");
            }
        }
    }

    return response->code(200)->success('los pacientes se han registrado correctamente.');
}

public function uploadControlador() {
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    $inputFileName = $_FILES['excel']['tmp_name'];
    $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    $reader->setReadFilter(new MyReadFilter());
    $spreadsheet = $reader->load($inputFileName);

    $data = $spreadsheet->getActiveSheet()->toArray();

    $validationResults = $this->validateExcelData($data);

    foreach ($validationResults as $validationResult) {
        if ($validationResult['error']) {
        	$errorMessage = implode(', ', $validationResult['messages']);
            return response->code(500)->error($errorMessage);
        }
    }

    return $this->saveValidatedData($validationResults);
}

}