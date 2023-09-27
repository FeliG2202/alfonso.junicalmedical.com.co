<?php

namespace PHP\Controllers;

use LionMailer\Services\Symfony\Mail;
use LionSpreadsheet\Spreadsheet;
use PHP\Models\EditAlmMenuModelo;

class EditAlmMenuControlador {

	private $EditAlmMenuModelo;

	public function __construct() {
		$this->EditAlmMenuModelo = new EditAlmMenuModelo();
	}

    private function generateCode(): string {
        return rand(100, 999) . "-" . rand(100, 999);
    }

    public function validatePage() {
        $data = $this->EditAlmMenuModelo->consultarAlmMenuIdModelo((int) $_GET['idPersona']);

        if ($data->personasCodigo === null) {
            return null;
        }

        return (object) [
            'request' => true,
            'url' => "index.php?folder=frmPedEdit&view=frmEditPersId"
        ];
    }

	public function procesarFormulario() {
		if (isset($_POST['btnEditDatosPers'])) {
			$row = $this->EditAlmMenuModelo->validarIdentificacion((int) $_POST['identMenu']);

			if (!$row) {
				return (object) ['request' => false, 'url' => "index.php?folder=frmPedEdit&view=frmEditPersId"];
			}

			return (object) [
				'request' => true,
				'url' => "index.php?folder=frmPedEdit&view=frmEditDatosPers&idPersona={$row['idPersona']}"
			];
		}
	}

	public function consultarAlmMenuIdControlador() {
		if (isset($_GET['idPersona'])) {
            $code = $this->generateCode();
            $data = $this->EditAlmMenuModelo->consultarAlmMenuIdModelo((int) $_GET['idPersona']);

            if ($data->personasCodigo === null) {
                $this->EditAlmMenuModelo->updateCode([
                    'idPersona' => (int) $_GET['idPersona'],
                    'code' => $code
                ]);

                Mail::address($data->personaCorreo)
                    ->subject('Codigo de verificación de Alfonso Bot')
                    ->body("CODIGO DE VERIFICACIÓN: <strong>{$code}</strong>")
                    ->altBody("CODIGO DE VERIFICACIÓN: {$code}")
                    ->send();
            }

			return $data;
		}
	}

    public function validateCode() {
        if (isset($_POST['btnValCode'], $_POST['cod-1'], $_POST['cod-2'], $_POST['cod-3'], $_POST['cod-4'], $_POST['cod-5'], $_POST['cod-6'])) {
            $data = $this->EditAlmMenuModelo->consultarEditAlmMenuModelo((int) $_GET['idPersona']);
            $str_code = trim("{$_POST['cod-1']}{$_POST['cod-2']}{$_POST['cod-3']}-{$_POST['cod-4']}{$_POST['cod-5']}{$_POST['cod-6']}");

            if ($str_code === $data->personasCodigo) {
                $this->EditAlmMenuModelo->updateCode([
                    'idPersona' => (int) $_GET['idPersona'],
                    'code' => null
                ]);

                return (object) [
                    'request' => true,
                    'url' => "index.php?folder=frmPedEdit&view=frmEditMenu&idPersona={$_GET['idPersona']}"
                ];
            }

            return (object) [
                'request' => false,
                'message' => "El código de verificación es incorrecto"
            ];
        }
    }

    public function consultarAlmTipoControlador() {
        return $this->EditAlmMenuModelo->consultarEditAlmMenuModelo();
    }

    public function (string $idNutriTipo) {
        $res = $this->EditAlmMenuModelo->actualizarEditAlmMenuModelo([
            'nutriTipoNombre' => request->nutriTipoNombre,
            'idNutriTipo' => (int) $idNutriTipo
        ]);

        if ($res->status === 'database-error') {
            return response->code(500)->error('Error al momento de actualizar');
        }

        return response->code(200)->success('tipo actualizado correctamente');
    }

    public function eliminarAlmTipoControlador(string $idNutriTipo) {
        $res = $this->EditAlmMenuModelo->eliminarEditAlmMenuModelo([
            'idNutriTipo' => (int) $idNutriTipo
        ]);

        if ($res->status === 'database-error') {
            return $res;
            return response->code(500)->error('Error al momento de Eliminar');
        }

        return response->code(200)->success('Eliminado correctamente');
    }
}
