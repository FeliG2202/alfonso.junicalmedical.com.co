<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;
use LionSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


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

    public function loadExcelFile($archivoTemporal) {
        $documento = IOFactory::load($archivoTemporal);
        $hoja = $documento->getActiveSheet();
        return $hoja->toArray();
    }

    public function updateDatabase($datos) {
        foreach ($datos as $indice => $fila) {
            if ($indice > 0) {
                $id = $fila[0];
                $nombre = $fila[1];
                $edad = $fila[2];
                DB::query("INSERT INTO `personas`( `personaNombreCompleto`, `personaCorreo`, `personaDocumento`) VALUES ('$nombre','$edad','$id')")->execute();
            }
        }
    }

    public function massivePersonaModel($name, $email) {
    	return DB::query('INSERT INTO `personas`(`personaNombreCompleto`, `personaNumberCell`, `personaCorreo`, `personaDocumento`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')')->execute();
    }


}
