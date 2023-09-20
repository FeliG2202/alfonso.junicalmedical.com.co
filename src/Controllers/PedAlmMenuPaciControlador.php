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
            return response->code(500)->error('No existe coincidencias con el número de documento');
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

        $res = $this->pedAlmMenuPaciModelo->registrarMenuDiaModelo([
            'idPaciente' => request->idPaciente,
            'idNutriMenu' => request->idNutriMenu,
            'list' => trim(request->selected_list),
            'date' => date('Y-m-d')
        ]);

        if ($res->status === "database-error") {
            return response->code(500)->error('Error al momento de registrar');
        }

        return response->code(200)->success('registrado correctamente');
    }

    public function consultarAlmMenuApartControlador() {
        return $this->pedAlmMenuPaciModelo->consultarAlmMenuApartModelo();
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
}