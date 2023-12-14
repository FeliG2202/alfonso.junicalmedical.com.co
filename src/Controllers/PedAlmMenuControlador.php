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
        ->body('<table width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:640px" align="center"><tr style="vertical-align: top"> <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top"> <div class="u-row-container" style="padding: 0px;background-color: transparent"> <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #038cfe;"> <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;"> <div class="u-col u-col-100" style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;"> <div style="width: 100% !important;"> <table id="u_content_image_1" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"> <tbody> <tr> <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:30px 10px;font-family:arial,helvetica,sans-serif;" align="left"> <table width="100%" cellpadding="0" cellspacing="0" border="0"> <tbody> <tr> <td style="padding-right: 0px; padding-left: 0px;" align="center"> <img align="center" border="0" src="https://alfonso.junicalmedical.com.co/src/Views/assets/img/logo.png" alt="Logo" title="Logo" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; clear: both; display: inline-block !important; border: none; height: auto; float: none; width: 100%; max-width: 350px; margin: 10px 0;"> </td> </tr> </tbody></table> </td> </tr> </tbody></table> </div></div> </div> </div></div><div class="u-row-container" style="padding: 0px;background-color: transparent"> <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;"> <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #f2f2f2;"> <div class="u-col u-col-100" style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;"> <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"> <table id="u_content_image_4" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"> <tbody> <tr> <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:50px 10px 25px;font-family:arial,helvetica,sans-serif;" align="left"> <table width="100%" cellpadding="0" cellspacing="0" border="0"> <tbody><tr> <td style="padding-right: 0px;padding-left: 0px;" align="center"> <img align="center" border="0" src="https://alfonso.junicalmedical.com.co/src/Views/assets/img/email2.png" alt="Hero Image" title="Hero Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 54%;max-width: 286.2px;" width="286.2" class="v-src-width v-src-max-width"> </td> </tr></tbody></table> </td> </tr> </tbody></table><table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"> <tbody> <tr> <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px 12px;font-family:arial,helvetica,sans-serif;" align="left"> <h2 style="margin: 0px; color: #141414; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 28px;"> <strong>CÓDIGO DE VERIFICACIÓN</strong> </h2> </td> </tr> </tbody></table><table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"> <tbody> <tr> <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px 10px;font-family:arial,helvetica,sans-serif;" align="left"> <div style="color: #706C6B; line-height: 140%; text-align: center; word-wrap: break-word;"> <p style="font-size: 14px; line-height: 140%;"><strong><span style="font-family: Lato, sans-serif; font-size: 14px; line-height: 19.6px;">La verificación es un paso crucial, asegurando la autenticidad del usuario.</span></strong></p> </div> </td> </tr> </tbody></table><table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"> <tbody> <tr> <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px 12px;font-family:arial,helvetica,sans-serif;" align="left"> <h1 style="margin: 0px; color: #3b4d63; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 41px;"> <strong>'. $code .'</strong> </h1> </td> </tr> </tbody></table><table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"> <tbody> <tr> <td class="v-container-padding-padding" style="overflow-wrap:break-word;word-break:break-word;padding:0px 10px 117px;font-family:arial,helvetica,sans-serif;" align="left"> <div style="color: #0081ff; line-height: 140%; text-align: center; word-wrap: break-word;"> <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 18px; line-height: 25.2px;"><strong><span style="font-family: Lato, sans-serif; line-height: 25.2px; font-size: 18px;"><!-- TODAVIA NO SE --></span></strong></span></p> </div> </td> </tr> </tbody></table> </div></div> </div> </div></div><div class="u-row-container" style="padding: 0px;background-color: transparent"> <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 550px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #000000;"> <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;"> <div class="u-col u-col-100" style="max-width: 320px;min-width: 550px;display: table-cell;vertical-align: top;"> <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;"> <table id="u_content_menu_1" style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0"></table> </div></td> </tr></table>')
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
    if (isset($_POST['btnPedDatosPerso'])) {
        return !$this->PedAlmMenuModelo->registrarMenuDiaModelo([
            'idPersona' => (int) $_POST['selected-idp'],
            'idMenu' => (int) $_POST['selected-idm'],
            'nombreEmpaquetado' => (empty($_POST['nombreEmpaquetado']) ? null : $_POST['nombreEmpaquetado']),
            'nutriSopaNombre' => (empty($_POST['nutriSopaNombre']) ? null : $_POST['nutriSopaNombre']),
            'nutriArrozNombre' => (empty($_POST['nutriArrozNombre']) ? null : $_POST['nutriArrozNombre']),
            'nutriProteNombre' => (empty($_POST['nutriProteNombre']) ? null : $_POST['nutriProteNombre']),
            'nutriEnergeNombre' => (empty($_POST['nutriEnergeNombre']) ? null : $_POST['nutriEnergeNombre']),
            'nutriAcompNombre' => (empty($_POST['nutriAcompNombre']) ? null : $_POST['nutriAcompNombre']),
            'nutriEnsalNombre' => (empty($_POST['nutriEnsalNombre']) ? null : $_POST['nutriEnsalNombre']),
            'nutriBebidaNombre' => (empty($_POST['nutriBebidaNombre']) ? null : $_POST['nutriBebidaNombre']),
            'tipoPago' => (empty($_POST['tipoPago']) ? null : $_POST['tipoPago']),
            'date' => date('Y-m-d')
        ])
        ? (object) ['request' => false, 'url' => "index.php?folder=frmPed&view=frmPedMenu&idPersona={$_GET['idPersona']}&message=false"]
        : (object) ['request' => true, 'url' => "index.php?folder=frmPed&view=frmPedMenu&idPersona={$_GET['idPersona']}&message=true"];
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
        Spreadsheet::setCell("L{$cont}", $menu->nombreEmpaquetado);


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
