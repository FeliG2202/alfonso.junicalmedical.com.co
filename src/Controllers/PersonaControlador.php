<?php 

namespace PHP\Controllers;

use PHP\Models\PersonaModelo;
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
			'personaNumberCell' => toNull(request->personaNumberCell)
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

		return response->code(200)->success('actualizado correctamente');
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

public function validateExcelData($data) {
    $baseDocument = $this->PersonaModelo->existeDocumento();
    $baseEmail = $this->PersonaModelo->existeCorreo();
    $documentosBase = [];
    $correosBase = [];

if(is_array($baseDocument)) {
    foreach($baseDocument as $doc) {
        $documentosBase[] = $doc->personaDocumento;
    }
}

if(is_array($baseEmail)) {
    foreach($baseEmail as $email) {
        $correosBase[] = $email->personaCorreo;
    }
}

    $validationResults = [];

   foreach ($data as $row) {
    if ($row[1] != '') {
        if (in_array($row[2], $documentosBase) || in_array($row[3], $correosBase)) {
            $validationResults[] = [
                'error' => true,
                'message' => in_array($row[2], $documentosBase) ? "El documento {$row[2]} ya está registrado." : "El correo {$row[3]} ya está registrado.",
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
                'personaNombreCompleto' => $row[1],
                'personaDocumento' => $row[2],
                'personaCorreo' => $row[3],
                'personaNumberCell' => $row[4],
            ];

            try {
                $this->PersonaModelo->uploadModelo($dataParaGuardar);
            } catch (\Exception $e) {
                return response->code(500)->error('Error al guardar los datos: ',  $e->getMessage(), "\n");
            }
        }
    }

    return response->code(200)->success('Los datos se han enviado al modelo correctamente.');
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
            return response->code(500)->error($validationResult['message']);
        }
    }

    return $this->saveValidatedData($validationResults);
}

}