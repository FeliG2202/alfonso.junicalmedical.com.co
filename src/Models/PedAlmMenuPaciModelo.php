<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;
use LionDatabase\Drivers\MySQL\MySQL as DB;

class PedAlmMenuPaciModelo extends Connection {

    public $tabla = 'pacientes';
    public $tablaMDP = 'menu_seleccionado_paci';

    public function validarIdentificacion($data) {
        $date = date("Y-m-d");
        return DB::table('pacientes')
        ->select(DB::as(DB::count('*'), 'cant'))
        ->where(DB::equalTo("pacienteDocumento"), $data['pacienteDocumento'])
        ->and(DB::equalTo(DB::column('fecha_registro')), $date)
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
        $sql = "SELECT * FROM View_nutrimenupaci WHERE nutriDiasNombre=? AND nutriSemanaNombre=?";

        try {
            $stmt = $this->conectar()->prepare($sql);
            $stmt->bindParam(1, $dia, PDO::PARAM_STR);
            $stmt->bindParam(2, $semana, PDO::PARAM_INT);
            return !$stmt->execute() ? [] : $stmt->fetchAll();
        } catch (PDOException $e) {
            print($e->getMessage());
        }
    }

    public function registrarMenuDiaModelo($data) {
        $sql = "INSERT INTO {$this->tablaMDP} (idPaciente,idNutriMenuPaci,nutriSopaNombre,nutriArrozNombre,nutriProteNombre,nutriEnergeNombre,nutriAcompNombre,nutriEnsalNombre,nutriBebidaNombre,fecha_actual) VALUES (?,?,?,?,?,?,?,?,?,?)";

        try {
            $stmt = $this->conectar()->prepare($sql);
            $stmt->bindParam(1, $data['idPaciente'], PDO::PARAM_INT);
            $stmt->bindParam(2, $data['idMenu'], PDO::PARAM_INT);
            $stmt->bindParam(3, $data['nutriSopaNombre'], PDO::PARAM_STR);
            $stmt->bindParam(4, $data['nutriArrozNombre'], PDO::PARAM_STR);
            $stmt->bindParam(5, $data['nutriProteNombre'], PDO::PARAM_STR);
            $stmt->bindParam(6, $data['nutriEnergeNombre'], PDO::PARAM_STR);
            $stmt->bindParam(7, $data['nutriAcompNombre'], PDO::PARAM_STR);
            $stmt->bindParam(8, $data['nutriEnsalNombre'], PDO::PARAM_STR);
            $stmt->bindParam(9, $data['nutriBebidaNombre'], PDO::PARAM_STR);
            $stmt->bindParam(10, $data['date'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    public function consultarEditAlmMenuModelo($id) {
        $data = date("Y-m-d");
       return DB::table('menu_seleccionado_paci'
        )->select(
            DB::column('idMenuSeleccionadoPaci'),
            DB::column('nutriSopaNombre'),
            DB::column('nutriArrozNombre'),
            DB::column('nutriProteNombre'),
            DB::column('nutriEnergeNombre'),
            DB::column('nutriAcompNombre'),
            DB::column('nutriEnsalNombre'),
            DB::column('nutriBebidaNombre')
        )->where(
        DB::equalTo(DB::column('idPaciente')), $id
        )->and(
        DB::equalTo(DB::column('fecha_actual')), $data
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

    public function eliminarAlmTipoModelo($data) {
        return DB::table('menu_seleccionado_paci')
            ->delete()
            ->where(DB::equalTo('idMenuSeleccionadoPaci'), $data['idMenuSeleccionadoPaci'])
            ->execute();
    }
}