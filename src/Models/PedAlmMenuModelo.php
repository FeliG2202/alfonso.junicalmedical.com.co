<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;
use LionDatabase\Drivers\MySQL\MySQL as DB;

class PedAlmMenuModelo extends Connection {

    public $tabla = 'personas';
    public $tablaMDP = 'menu_seleccionado';

    public function validarIdentificacion($identMenu) {
        $sql = "SELECT idPersona FROM $this->tabla WHERE personaDocumento = ?";

        try {
            $stmt = $this->conectar()->prepare($sql);
            $stmt->bindParam(1, $identMenu);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error al validar el número de identificación: ' . $e->getMessage();
            return false;
        }
    }

    public function consultarAlmMenuIdModelo(int $idPersona) {
        return DB::table('personas')
        ->select()
        ->where(DB::equalTo("idPersona"), $idPersona)
        ->get();
    }

    public function updateCode(array $data) {
        return DB::table('personas')->update([
            'personasCodigo' => $data['code']
        ])->where(
            DB::equalTo("idPersona"),
            $data['idPersona']
        )->execute();
    }

    public function consultarMenuModelo($dia, $semana) {
        $sql = "SELECT * FROM view_nutrimenu WHERE nutriDiasNombre=? AND nutriSemanaNombre=?";

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
        $sql = "INSERT INTO {$this->tablaMDP} (idPersona,idNutriMenu,nombreEmpaquetado,nutriSopaNombre,nutriArrozNombre,nutriProteNombre,nutriEnergeNombre,nutriAcompNombre,nutriEnsalNombre,nutriBebidaNombre,fecha_actual) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

        try {
            $stmt = $this->conectar()->prepare($sql);
            $stmt->bindParam(1, $data['idPersona'], PDO::PARAM_INT);
            $stmt->bindParam(2, $data['idMenu'], PDO::PARAM_INT);
            $stmt->bindParam(3, $data['nombreEmpaquetado'], PDO::PARAM_STR);
            $stmt->bindParam(4, $data['nutriSopaNombre'], PDO::PARAM_STR);
            $stmt->bindParam(5, $data['nutriArrozNombre'], PDO::PARAM_STR);
            $stmt->bindParam(6, $data['nutriProteNombre'], PDO::PARAM_STR);
            $stmt->bindParam(7, $data['nutriEnergeNombre'], PDO::PARAM_STR);
            $stmt->bindParam(8, $data['nutriAcompNombre'], PDO::PARAM_STR);
            $stmt->bindParam(9, $data['nutriEnsalNombre'], PDO::PARAM_STR);
            $stmt->bindParam(10, $data['nutriBebidaNombre'], PDO::PARAM_STR);
            $stmt->bindParam(11, $data['date'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    public function consultarAlmMenuApartModelo() {
        return DB::table(
            DB::as('menu_seleccionado', 'ms')
        )->select(
            DB::column('personaDocumento', 'prs'),
            DB::column('personaNombreCompleto', 'prs'),
            DB::column('nutriSopaNombre', 'ms'),
            DB::column('nutriArrozNombre', 'ms'),
            DB::column('nutriProteNombre', 'ms'),
            DB::column('nutriEnergeNombre', 'ms'),
            DB::column('nutriAcompNombre', 'ms'),
            DB::column('nutriEnsalNombre', 'ms'),
            DB::column('nutriBebidaNombre', 'ms'),
            DB::column('fecha_actual', 'ms'),
        )->inner()->join(
            DB::as('personas', 'prs'),
            DB::column('idPersona', 'ms'),
            DB::column('idPersona', 'prs'),
        )->getAll();
    }

    public function consultarAlmMenuApartPaciModelo() {
        return DB::table(
            DB::as('menu_seleccionado_paci', 'msp')
        )->select(
            DB::column('pacienteDocumento', 'pct'),
            DB::column('pacienteNombre', 'pct'),
            DB::column('nutriSopaNombre', 'msp'),
            DB::column('nutriArrozNombre', 'msp'),
            DB::column('nutriProteNombre', 'msp'),
            DB::column('nutriEnergeNombre', 'msp'),
            DB::column('nutriAcompNombre', 'msp'),
            DB::column('nutriEnsalNombre', 'msp'),
            DB::column('nutriBebidaNombre', 'msp'),
            DB::column('fecha_actual', 'msp'),
        )->inner()->join(
            DB::as('pacientes', 'pct'),
            DB::column('idPaciente', 'msp'),
            DB::column('idPaciente', 'pct'),
        )->getAll();
    }


    public function generateReportDatesDB() {
        return DB::table(
            DB::as('menu_seleccionado', 'ms')
        )->select(
            DB::column('personaDocumento', 'prs'),
            DB::column('personaNombreCompleto', 'prs'),
            DB::column('nutriSopaNombre', 'ms'),
            DB::column('nutriArrozNombre', 'ms'),
            DB::column('nutriProteNombre', 'ms'),
            DB::column('nutriEnergeNombre', 'ms'),
            DB::column('nutriAcompNombre', 'ms'),
            DB::column('nutriEnsalNombre', 'ms'),
            DB::column('nutriBebidaNombre', 'ms'),
            DB::column('nombreEmpaquetado', 'ms'),
            DB::column('fecha_actual', 'ms'),
        )->inner()->join(
            DB::as('personas', 'prs'),
            DB::column('idPersona', 'ms'),
            DB::column('idPersona', 'prs'),
        )->where('fecha_actual')
        ->between(request->date_start, request->date_end)
        ->getAll();
    }

    // Generar reporte paciente
     public function generateReportPaciDatesDB() {
        return DB::table(
            DB::as('menu_seleccionado_paci', 'msp')
        )->select(
            DB::column('pacienteDocumento', 'pct'),
            DB::column('pacienteNombre', 'pct'),
            DB::column('nutriSopaNombre', 'msp'),
            DB::column('nutriArrozNombre', 'msp'),
            DB::column('nutriProteNombre', 'msp'),
            DB::column('nutriEnergeNombre', 'msp'),
            DB::column('nutriAcompNombre', 'msp'),
            DB::column('nutriEnsalNombre', 'msp'),
            DB::column('nutriBebidaNombre', 'msp'),
            DB::column('fecha_actual', 'msp'),
        )->inner()->join(
            DB::as('pacientes', 'pct'),
            DB::column('idPaciente', 'msp'),
            DB::column('idPaciente', 'pct'),
        )->where('fecha_actual')
        ->between(request->date_start, request->date_end)
        ->getAll();
    }

   public function consultarEditAlmMenuModelo($id) {
        $data = date("Y-m-d");
       return DB::table('menu_seleccionado'
        )->select(
            DB::column('idMenuSeleccionado'),
            DB::column('nutriSopaNombre'),
            DB::column('nutriArrozNombre'),
            DB::column('nutriProteNombre'),
            DB::column('nutriEnergeNombre'),
            DB::column('nutriAcompNombre'),
            DB::column('nutriEnsalNombre'),
            DB::column('nutriBebidaNombre'),
            DB::column('nombreEmpaquetado')
        )->where(
        DB::equalTo(DB::column('idpersona')), $id
        )->and(
        DB::equalTo(DB::column('fecha_actual')), $data
        )->getAll();
    }


public function eliminarAlmTipoModelo($data) {
        return DB::table('menu_seleccionado')
            ->delete()
            ->where(DB::equalTo('idMenuSeleccionado'), $data['idMenuSeleccionado'])
            ->execute();
    }
}