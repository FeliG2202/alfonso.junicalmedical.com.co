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
                'personaNombreCompleto' => $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
                'personaDocumento' => $worksheet->getCellByColumnAndRow(3, $row)->getValue(),
                'personaCorreo' => $worksheet->getCellByColumnAndRow(4, $row)->getValue(),
            'personaNumberCell' => $worksheet->getCellByColumnAndRow(5, $row)->getValue()
        ];
        $objects[] = $object;
    }

    $baseDocument = $this->PersonaModelo->existeDocumento();
    $baseEmail = $this->PersonaModelo->existeCorreo();

    $baseDocument = json_decode(json_encode($baseDocument), true);
    $baseEmail = json_decode(json_encode($baseEmail), true);

    $documentosBase = array_column($baseDocument, 'personaDocumento');
    $EmailBase = array_column($baseEmail, 'personaCorreo');

    $validatedData = [];
    foreach ($objects as $object) {
        // Verificar si el nombre, el documento, la torre y la cama no son nulos y son únicos en la base de datos
        if (
            $object->personaNombreCompleto !== null &&
            $object->personaDocumento !== null &&
            $object->personaCorreo !== null &&
            $object->personaNumberCell !== null &&
            !in_array($object->personaDocumento, $documentosBase) &&
            !in_array($object->personaCorreo, $EmailBase)
        ) {
            $validatedData[] = $object;
        }
    }

    $savedData = [];
    $notSavedData = [];
    foreach ($objects as $object) {
        if (
            $object->personaNombreCompleto !== null &&
            $object->personaDocumento !== null &&
            $object->personaCorreo !== null &&
            $object->personaNumberCell !== null &&
            !in_array($object->personaDocumento, $documentosBase) &&
            !in_array($object->personaCorreo, $EmailBase)
        ) {
            $savedData[] = $object; // Guarda los datos validados en savedData
            $this->PersonaModelo->uploadModelo((array) $object); // Enviar datos no duplicados al modelo
        } else {
            $notSavedData[] = $object;
        }
    }

    return ['message' => 'El archivo a cargado correctamente', 'savedData' => $savedData, 'notSavedData' => $notSavedData];
}

}