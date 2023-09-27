<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;
use LionDatabase\Drivers\MySQL\MySQL as DB;

class EditAlmMenuModelo extends Connection {

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
        $sql = "SELECT * FROM view_nutrimenu WHERE nutriDiasNombre=? AND nutriMenuSemana=?";

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
        $sql = "INSERT INTO {$this->tablaMDP} (idPersona,idNutriMenu,nutriSopaNombre,nutriArrozNombre,nutriProteNombre,nutriEnergeNombre,nutriAcompNombre,nutriEnsalNombre,nutriBebidaNombre,fecha_actual) VALUES (?,?,?,?,?,?,?,?,?,?)";

        try {
            $stmt = $this->conectar()->prepare($sql);
            $stmt->bindParam(1, $data['idPersona'], PDO::PARAM_INT);
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


    public function consultarEditAlmMenuModelo() {
       return DB::query("SELECT menu_seleccionado.idPersona,  personas.personaDocumento FROM menu_seleccionado left JOIN personas ON menu_seleccionado.idPersona = personas.idPersona WHERE personas.idPersona = 1 and menu_seleccionado.fecha_actual = '2023-09-22'")->getAll();
    }

    public function actualizarEditAlmMenuModelo($data) {
        return DB::table('nutritipo')->update([
            'nutriTipoNombre' => $data['nutriTipoNombre']
        ])->where(
            DB::equalTo('idNutriTipo'), $data['idNutriTipo'])
        ->execute();
    }

    public function eliminarEditAlmMenuModelo($data) {
        return DB::table('nutritipo')
            ->delete()
            ->where(DB::equalTo('idNutriTipo'), $data['idNutriTipo'])
            ->execute();
    }
}
