<?php

namespace PHP\Models;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class PedAlmMenuPaciModelo {

    public $tabla = 'pacientes';
    public $tablaMDP = 'menu_seleccionado_dia_persona';

    public function validarIdentificacion($data) {
        return DB::table('pacientes')
        ->select(DB::as(DB::count('*'), 'cant'))
        ->where(DB::equalTo("pacienteDocumento"), $data['pacienteDocumento'])
        ->get();
    }

    public function readIdByDocument($data) {
        return DB::table('pacientes')
        ->select('idPaciente')
        ->where(DB::equalTo("pacienteDocumento"), $data['pacienteDocumento'])
        ->get();
    }

    public function consultarAlmMenuIdModelo($data) {
        return DB::table('pacientes')
        ->select()
        ->where(DB::equalTo("idPaciente"), $data['idPaciente'])
        ->get();
    }

    public function consultarMenuModelo($dia, $semana) {
        return DB::table('view_nutrimenu')->select()->where(
            DB::equalTo('nutriDiasNombre'), $dia
        )->and(
            DB::equalTo('nutriMenuSemana'), $semana
        )->getAll();
    }

    public function registrarMenuDiaModelo($data) {
        return DB::table('menu_seleccionado_dia_paci')->insert([
            'idPaciente' => $data['idPaciente'],
            'idNutriMenu' => $data['idMenu'],
            'menuSeleccionadoDiaPaciente' => $data['list'],
            'fecha_actual' => $data['date']
        ])->execute();
    }

    public function consultarAlmMenuApartModelo() {
        return DB::table(
            DB::as('menu_seleccionado_dia_persona', 'msd')
        )->select(
            DB::column('personaNombreCompleto', 'prs'),
            DB::column('menuSeleccionadoDiaPersona', 'msd'),
            DB::column('fecha_actual', 'msd'),
        )->inner()->join(
            DB::as('personas', 'prs'),
            DB::column('idPersona', 'msd'),
            DB::column('idPersona', 'prs'),
        )->getAll();
    }

    public function generateReportDatesDB() {
        return DB::table(
            DB::as('menu_seleccionado_dia_persona', 'msd')
        )->select(
            DB::column('personaNombreCompleto', 'prs'),
            DB::column('menuSeleccionadoDiaPersona', 'msd'),
            DB::column('fecha_actual', 'msd'),
        )->inner()->join(
            DB::as('personas', 'prs'),
            DB::column('idPersona', 'msd'),
            DB::column('idPersona', 'prs'),
        )->where('fecha_actual')
        ->between(request->date_start, request->date_end)
        ->getAll();
    }
}