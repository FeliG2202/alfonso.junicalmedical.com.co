<?php

use PHP\Controllers\PedAlmMenuControlador;
use PHP\Controllers\TemplateControlador;

// if (!isset($_SESSION['session'])) {
//     TemplateControlador::redirect("index.php?view=login");
// }

// if ($_SESSION['id'] != $_GET['idPersona']) {
//     TemplateControlador::redirect("index.php?folder=frmPed&view=frmPedPersId");
// }

$PedAlmMenuControlador = new PedAlmMenuControlador();

$request = $PedAlmMenuControlador->validatePage();
if ($request != null) {
    if ($request->request) {
        TemplateControlador::redirect($request->url);
    }
}

$request = $PedAlmMenuControlador->registrarMenuDiaControlador();
if ($request != null) {
    if ($request->request) {
        TemplateControlador::redirect($request->url);
    }
}

$menuPorDias = $PedAlmMenuControlador->consultarMenuDiaControlador();
?>

<div class="col-lg-8 mx-auto mt-5 mb-5 p-4 rounded shadow-sm">

    <?php
    $fecha_actual = date("l, d F Y - H:i a");
    $hora_actual = date('H:i');
    $hora_inicio = '00:00';
    $hora_fin = '24:00';
    if ($hora_actual >= $hora_inicio && $hora_actual <= $hora_fin) { ?>
        <div class="row">
            <div class="col mb-3">
                <h2 class="text-center">Menú del Día</h2>
                <?php
                echo ("<h6 class='text-center'>{$fecha_actual}</h6>"); ?>
                <hr>
            </div>
        </div>
        <?php TemplateControlador::response(
            $request,
            "",
            "Ocurrio un error, Intentelo de nuevo"
        ); ?>
        <div class="row mt-4">
            <!-- Tarjeta 1 -->
            <?php
            foreach ($menuPorDias['data'] as $key => $value) {
                print '<div class="col-md-6 p-2">';
                print '<form method="POST" action="">';
                print '<input type="hidden" name="selected-idm" value="'. $value['idNutriMenu'] .'">';
                echo ("<input type='hidden' name='selected-idp' value='{$_GET['idPersona']}'>");
                print '<div class="card" id="tarjeta1">';
                print '<div class="card-body">';
                echo '<h5 class="card-title">' . $value['nutriTipoNombre'] . '</h5>';
                echo ("<hr>");
                /* Selecionar componentes del almuerzo */
                print '<div class="checkbox-group">';
                print '<div class="form-check checkbox-container">';
                echo  '<input name="nutriSopaNombre" class="form-check-input" type="checkbox" value="' . $value['nutriSopaNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
                echo '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriSopaNombre'] . '</label>';
                print '</div>';

                print '<div class="form-check checkbox-container">';
                echo '<input name="nutriArrozNombre" class="form-check-input" type="checkbox" value="' . $value['nutriArrozNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
                echo '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriArrozNombre'] . '</label>';
                print '</div>';

                print '<div class="form-check checkbox-container">';
                echo  '<input name="nutriProteNombre" class="form-check-input" type="checkbox" value="' . $value['nutriProteNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
                echo '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriProteNombre'] . '</label>';
                print '</div>';

                print '<div class="form-check checkbox-container">';
                echo  '<input name="nutriEnergeNombre" class="form-check-input" type="checkbox" value="' . $value['nutriEnergeNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
                echo '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriEnergeNombre'] . '</label>';
                print '</div>';

                print '<div class="form-check checkbox-container">';
                echo  '<input name="nutriAcompNombre" class="form-check-input" type="checkbox" value="' . $value['nutriAcompNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
                echo '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriAcompNombre'] . '</label>';
                print '</div>';

                print '<div class="form-check checkbox-container">';
                echo  '<input name="nutriEnsalNombre" class="form-check-input" type="checkbox" value="' . $value['nutriEnsalNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
                echo '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriEnsalNombre'] . '</label>';
                print '</div>';

                print '<div class="form-check checkbox-container">';
                echo  '<input name="nutriBebidaNombre" class="form-check-input" type="checkbox" value="' . $value['nutriBebidaNombre'] . '" id="flexCheckDefault" onclick="handleCheckboxClick(this)">';
                echo '<label class="form-check-label" for="flexCheckDefault">' . $value['nutriBebidaNombre'] . '</label>';
                print '</div>';
                print '</div>';
                print '</div>';

                echo ('<div class="mt-4 p-2"><button type="submit" name="btnPedDatosPers" class="btn btn-success w-100">Seleccionar</button></div>');
                print  '</div>';
                print '</form>';
                print '</div>';
            }
            ?>
        </div>

    <?php } else { ?>
        <div class="alert alert-warning">
            <strong>Nota: </strong>El horario para solicitar el menú comienza desde las
            <strong>8:00 AM</strong> hasta las <strong>10:00 AM</strong>
        </div>
    <?php } ?>
</div>
