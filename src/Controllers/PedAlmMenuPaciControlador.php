<?php

namespace PHP\Controllers;

use LionMailer\Services\Symfony\Mail;
use LionSpreadsheet\Spreadsheet;
use PHP\Models\PedAlmMenuPaciModelo;

class PedAlmMenuPaciControlador {

    private $pedAlmMenuPaciModelo;

    public function __construct() {
        $this->pedAlmMenuPaciModelo = new PedAlmMenuPaciModelo();
    }

    public function procesarFormulario() {
        $data = [
            'pacienteDocumento' => request->pacienteDocumento
        ];

        $res = $this->pedAlmMenuPaciModelo->validarIdentificacion($data);

        if ($res->cant === 0) {
            return response->code(500)->error('Paciente no autorizado');
        }

        return $this->pedAlmMenuPaciModelo->readIdByDocument($data);
    }

    public function consultarAlmMenuIdControlador(string $idPaciente) {
        return $this->pedAlmMenuPaciModelo->consultarAlmMenuIdModelo([
            'idPaciente' => (int) $idPaciente
        ]);
    }

    public function consultarMenuDiaControlador() {
      $dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
      $dia = $dias[date('w')];
      $semana = (int) date('W');
      $anio = date("Y");

      return [
        'data' => $this->pedAlmMenuPaciModelo->consultarMenuModelo($dia, (($semana % 2) == 0 ? 1 : 0)),
        'n-week' => (($semana % 2) == 0 ? 2 : 1),
        'day' => $dia,
        'week' => $semana,
        'date' => [
            'from' => date("Y-m-d", strtotime("{$anio}-W{$semana}-1")),
            'to' => date("Y-m-d", strtotime("{$anio}-W{$semana}-7"))]
        ];
    }

    public function registrarMenuDiaControlador() {
        if (isset($_POST['btnPedDatosPerso'])) {
            return !$this->pedAlmMenuPaciModelo->registrarMenuDiaModelo([
                'idPaciente' => (int) $_POST['selected-idp'],
                'idMenu' => (int) $_POST['selected-idm'],
                'nutriSopaNombre' => (empty($_POST['nutriSopaNombre']) ? null : $_POST['nutriSopaNombre']),
            'nutriArrozNombre' => (empty($_POST['nutriArrozNombre']) ? null : $_POST['nutriArrozNombre']),
            'nutriProteNombre' => (empty($_POST['nutriProteNombre']) ? null : $_POST['nutriProteNombre']),
            'nutriEnergeNombre' => (empty($_POST['nutriEnergeNombre']) ? null : $_POST['nutriEnergeNombre']),
            'nutriAcompNombre' => (empty($_POST['nutriAcompNombre']) ? null : $_POST['nutriAcompNombre']),
            'nutriEnsalNombre' => (empty($_POST['nutriEnsalNombre']) ? null : $_POST['nutriEnsalNombre']),
            'nutriBebidaNombre' => (empty($_POST['nutriBebidaNombre']) ? null : $_POST['nutriBebidaNombre']),
            'date' => date('Y-m-d')
            ])
                ? (object) ['request' => false, 'url' => "index.php?folder=frmPedPaci&view=frmPedPaciId&message=false"]
        : (object) ['request' => true, 'url' => "index.php?folder=frmPedPaci&view=frmPedPaciId&message=true"];
        }
    }

    /*Generador de Reportes*/
    public function generateReportDates() {
        if (!isset(request->date_start, request->date_end)) {
            return response->code(500)->error("Debe agregar la fecha de inicio y fin para generar el reporte");
        }

        $all_menu = $this->pedAlmMenuPaciModelo->generateReportDatesDB();
        if (isset($all_menu->status)) {
            return response->code(204)->finish();
        }

        $cont = 3;
        Spreadsheet::load("../src/Views/assets/excel/reporte-almuerzos.xlsx");

        foreach ($all_menu as $key => $menu) {
            Spreadsheet::setCell("A{$cont}", (($cont - 3) + 1));
            Spreadsheet::setCell("B{$cont}", $menu->personaNombreCompleto);
            Spreadsheet::setCell("C{$cont}", $menu->menuSeleccionadoDiaPersona);
            Spreadsheet::setCell("D{$cont}", $menu->fecha_actual);
            $cont++;
        }

        $path = "../src/Views/assets/excel/";
        $file_name = "reporte-almuerzos-" . date("Y-m-d") . ".xlsx";

        Spreadsheet::save($path . $file_name);
        Spreadsheet::download($path, $file_name);
    }

    public function consultarAlmTipoControlador(string $id) {
        return $this->pedAlmMenuPaciModelo->consultarEditAlmMenuModelo($id);
   }

   public function eliminarAlmTipoControlador(string $idMenuSeleccionadoPaci) {
        $res = $this->pedAlmMenuPaciModelo->eliminarAlmTipoModelo([
            'idMenuSeleccionadoPaci' => (int) $idMenuSeleccionadoPaci
        ]);

        if ($res->status === 'database-error') {
            return $res;
            return response->code(500)->error('Error al momento de Eliminar');
        }

        return response->code(200)->success('Eliminado correctamente');
    }
}