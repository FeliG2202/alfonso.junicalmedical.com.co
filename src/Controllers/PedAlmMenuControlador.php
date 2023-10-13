<?php

namespace PHP\Controllers;

use LionMailer\Services\Symfony\Mail;
use LionSpreadsheet\Spreadsheet;
use PHP\Models\PedAlmMenuModelo;

class PedAlmMenuControlador {

	private $PedAlmMenuModelo;

	public function __construct() {
		$this->PedAlmMenuModelo = new PedAlmMenuModelo();
	}

    private function generateCode(): string {
        return rand(100, 999) . "-" . rand(100, 999);
    }

    public function validatePage() {
        $data = $this->PedAlmMenuModelo->consultarAlmMenuIdModelo((int) $_GET['idPersona']);

        if ($data->personasCodigo === null) {
            return null;
        }

        return (object) [
            'request' => true,
            'url' => "index.php?folder=frmPed&view=frmPedPersId"
        ];
    }

    public function procesarFormulario() {
      if (isset($_POST['btnPedDatosPers'])) {
         $row = $this->PedAlmMenuModelo->validarIdentificacion((int) $_POST['identMenu']);

         if (!$row) {
            return (object) ['request' => false, 'url' => "index.php?folder=frmPed&view=frmPedPersId"];
        }

        return (object) [
            'request' => true,
            'url' => "index.php?folder=frmPed&view=frmPedDatosPers&idPersona={$row['idPersona']}"
        ];
    }
}

public function consultarAlmMenuIdControlador() {
  if (isset($_GET['idPersona'])) {
    $code = $this->generateCode();
    $data = $this->PedAlmMenuModelo->consultarAlmMenuIdModelo((int) $_GET['idPersona']);

    if ($data->personasCodigo === null) {
        $this->PedAlmMenuModelo->updateCode([
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
        $data = $this->PedAlmMenuModelo->consultarAlmMenuIdModelo((int) $_GET['idPersona']);
        $str_code = trim("{$_POST['cod-1']}{$_POST['cod-2']}{$_POST['cod-3']}-{$_POST['cod-4']}{$_POST['cod-5']}{$_POST['cod-6']}");

        if ($str_code === $data->personasCodigo) {
            $this->PedAlmMenuModelo->updateCode([
                'idPersona' => (int) $_GET['idPersona'],
                'code' => null
            ]);

            return (object) [
                'request' => true,
                'url' => "index.php?folder=frmPed&view=frmPedMenu&idPersona={$_GET['idPersona']}"
            ];
        }

        return (object) [
            'request' => false,
            'message' => "El código de verificación es incorrecto"
        ];
    }
}

public function consultarMenuDiaControlador() {
  $dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
  $dia = $dias[date('w')];
  $semana = (int) date('W');
  $anio = date("Y");

  return [
     'data' => $this->PedAlmMenuModelo->consultarMenuModelo($dia, (($semana % 2) == 0 ? 1 : 0)),
     'n-week' => (($semana % 2) == 0 ? 2 : 1),
     'day' => $dia,
     'week' => $semana,
     'date' => [
        'from' => date("Y-m-d", strtotime("{$anio}-W{$semana}-1")),
        'to' => date("Y-m-d", strtotime("{$anio}-W{$semana}-7"))
    ]
];
}

public function registrarMenuDiaControlador() {
    if (isset($_POST['btnPedDatosPers'])) {
        return !$this->PedAlmMenuModelo->registrarMenuDiaModelo([
            'idPersona' => (int) $_POST['selected-idp'],
            'idMenu' => (int) $_POST['selected-idm'],
            'nutriSopaNombre' => (string) (empty($_POST['nutriSopaNombre']) ? null : $_POST['nutriSopaNombre']),
            'nutriArrozNombre' => (string) (empty($_POST['nutriArrozNombre']) ? null : $_POST['nutriArrozNombre']),
            'nutriProteNombre' => (string) (empty($_POST['nutriProteNombre']) ? null : $_POST['nutriProteNombre']),
            'nutriEnergeNombre' => (string) (empty($_POST['nutriEnergeNombre']) ? null : $_POST['nutriEnergeNombre']),
            'nutriAcompNombre' => (string) (empty($_POST['nutriAcompNombre']) ? null : $_POST['nutriAcompNombre']),
            'nutriEnsalNombre' => (string) (empty($_POST['nutriEnsalNombre']) ? null : $_POST['nutriEnsalNombre']),
            'nutriBebidaNombre' => (string) (empty($_POST['nutriBebidaNombre']) ? null : $_POST['nutriBebidaNombre']),
            'date' => date('Y-m-d')
        ])
        ? (object) ['request' => false, 'url' => "index.php?folder=frmPed&view=frmPedPersId"]
        : (object) ['request' => true, 'url' => "index.php?folder=frmPed&view=frmPedMenu&idPersona={$_GET['idPersona']}&message=ok"];
    }
}

public function consultarAlmMenuApartControlador(){
    return $this->PedAlmMenuModelo->consultarAlmMenuApartModelo();
}

public function consultarAlmMenuApartPaciControlador(){
    return $this->PedAlmMenuModelo->consultarAlmMenuApartPaciModelo();
}


/*Generador de Reportes*/
public function generateReportDates() {
    if (!isset(request->date_start, request->date_end)) {
        return response->code(500)->error("Debe agregar la fecha de inicio y fin para generar el reporte");
    }

    $all_menu = $this->PedAlmMenuModelo->generateReportDatesDB();
    if (isset($all_menu->status)) {
        return response->code(204)->finish();
    }

    $cont = 3;
    Spreadsheet::load("../src/Views/assets/excel/reporte-almuerzos-empl.xlsx");

    foreach ($all_menu as $key => $menu) {
        Spreadsheet::setCell("A{$cont}", (($cont - 3) + 1));
        Spreadsheet::setCell("B{$cont}", $menu->fecha_actual);
        Spreadsheet::setCell("C{$cont}", $menu->personaDocumento);
        Spreadsheet::setCell("D{$cont}", $menu->personaNombreCompleto);
        Spreadsheet::setCell("E{$cont}", $menu->nutriSopaNombre);
        Spreadsheet::setCell("F{$cont}", $menu->nutriArrozNombre);
        Spreadsheet::setCell("G{$cont}", $menu->nutriProteNombre);
        Spreadsheet::setCell("H{$cont}", $menu->nutriEnergeNombre);
        Spreadsheet::setCell("I{$cont}", $menu->nutriAcompNombre);
        Spreadsheet::setCell("J{$cont}", $menu->nutriEnsalNombre);
        Spreadsheet::setCell("K{$cont}", $menu->nutriBebidaNombre);

        $cont++;
    }

    $path = "../src/Views/assets/excel/";
    $file_name = "reporte-almuerzos-" . date("Y-m-d") . ".xlsx";

    Spreadsheet::save($path . $file_name);
    Spreadsheet::download($path, $file_name);
}

/*Generador de Reportes*/
public function generateReportPaciDates() {
    if (!isset(request->date_start, request->date_end)) {
        return response->code(500)->error("Debe agregar la fecha de inicio y fin para generar el reporte");
    }

    $all_menu = $this->PedAlmMenuModelo->generateReportPaciDatesDB();
    if (isset($all_menu->status)) {
        return response->code(204)->finish();
    }

    $cont = 3;
    Spreadsheet::load("../src/Views/assets/excel/reporte-almuerzos-paci.xlsx");

    foreach ($all_menu as $key => $menu) {
        Spreadsheet::setCell("A{$cont}", (($cont - 3) + 1));
        Spreadsheet::setCell("B{$cont}", $menu->fecha_actual);
        Spreadsheet::setCell("C{$cont}", $menu->pacienteDocumento);
        Spreadsheet::setCell("D{$cont}", $menu->pacienteNombre);
        Spreadsheet::setCell("E{$cont}", $menu->nutriSopaNombre);
        Spreadsheet::setCell("F{$cont}", $menu->nutriArrozNombre);
        Spreadsheet::setCell("G{$cont}", $menu->nutriProteNombre);
        Spreadsheet::setCell("H{$cont}", $menu->nutriEnergeNombre);
        Spreadsheet::setCell("I{$cont}", $menu->nutriAcompNombre);
        Spreadsheet::setCell("J{$cont}", $menu->nutriEnsalNombre);
        Spreadsheet::setCell("K{$cont}", $menu->nutriBebidaNombre);

        $cont++;
    }

    $path = "../src/Views/assets/excel/";
    $file_name = "reporte-almuerzos-" . date("Y-m-d") . ".xlsx";

    Spreadsheet::save($path . $file_name);
    Spreadsheet::download($path, $file_name);
}

public function consultarAlmTipoControlador(string $id) {
    return $this->PedAlmMenuModelo->consultarEditAlmMenuModelo($id);
}

public function eliminarAlmTipoControlador(string $idMenuSeleccionado) {
    $res = $this->PedAlmMenuModelo->eliminarAlmTipoModelo([
        'idMenuSeleccionado' => (int) $idMenuSeleccionado
    ]);

    if ($res->status === 'database-error') {
        return $res;
        return response->code(500)->error('Error al momento de Eliminar');
    }

    return response->code(200)->success('Eliminado correctamente');
}

}
