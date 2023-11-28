<?php 

namespace PHP\Controllers;

use PHP\Models\PersonaModelo;
use PhpOffice\PhpSpreadsheetReaderCsv;
use PhpOffice\PhpSpreadsheetReaderXlsx;

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

	// public function massivePersonaControlador(){
	// 	if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    //         $archivoTemporal = $_FILES['archivo']['tmp_name'];
    //         $datos = $this->PersonaModelo->loadExcelFile($archivoTemporal);
	// 		print($datos);
    //         $this->PersonaModelo->updateDatabase($datos);
    //         return response->code(200)->success("Registros actualizados correctamente.");
    //     } else {
    //         return response->code(500)->error("Error al cargar el archivo.");
    //     }
    // }


	public function massivePersonaControlador(){
		if (isset($_POST['submit'])) {
            $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
                $arr_file = explode('.', $_FILES['file']['name']);
                $extension = end($arr_file);
                if('csv' == $extension) {
                    $reader = new PhpOfficePhpSpreadsheetReaderCsv();
                } else {
                    $reader = new PhpOfficePhpSpreadsheetReaderXlsx();
                }
                $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();
                if (!empty($sheetData)) {
                    $personaModelo = new PersonaModelo();
                    for ($i=1; $i<count($sheetData); $i++) {
                        $name = $sheetData[$i][1];
                        $email = $sheetData[$i][2];
                        $personaModelo->massivePersonaModel($name, $email);
                    }
                }
            }
        }
	}

}