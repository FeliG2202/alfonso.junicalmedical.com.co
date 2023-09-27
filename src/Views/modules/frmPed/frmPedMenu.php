<?php

use PHP\Controllers\PedAlmMenuControlador;
use PHP\Controllers\TemplateControlador;

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

$fecha_actual = date("l, d F Y - H:i a");
$hora_actual = date('H:i');
$hora_inicio = '00:00';
$hora_fin = '24:00';
?>

<div class="col-lg-11 mx-auto mt-3 mb-3 p-3 rounded shadow-sm">
    <div class="container">
        <div class="card">
          <div class="card-body">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" data-toggle="tab" href="#Solicitud" role="tab" aria-selected="true">Solicitud de Dieta</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#Eliminar" role="tab" aria-selected="false">Eliminar Dieta</a>
            </div>
        </nav>
        <div class="tab-content table-responsive" id="nav-tabContent">
            <!-- Registrar Dietas -->
            <div class="tab-pane fade show active" id="Solicitud" role="tabpanel">
                <?php
               if ($hora_actual >= $hora_inicio && $hora_actual <= $hora_fin) { ?>
                <div class="row">
                    <div class="col p-2 mb-3">
                        <h2 class="text-center">Menú de Almuerzos</h2>
                        <?php
                        echo ("<h6 class='text-center'>{$fecha_actual}</h6>"); ?>
                    </div>
                    <hr>
                </div>
                <?php TemplateControlador::response(
                    $request,
                    "",
                    "Ocurrio un error, Intentelo de nuevo"
                ); ?>
                <div class="row p-4">
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

        <div class="tab-pane fade" id="Eliminar" role="tabpanel">
            <?php if ($hora_actual >= $hora_inicio && $hora_actual <= $hora_fin) { ?>
            <!-- Eliminar dieta -->
            <div class="card mb-4">
                <div class="card-body">
                    <!-- Boton para actualizar la tabla -->
                        <h2 class="text-center">Dietas Registradas</h2>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                        <button type="button" class="btn btn-outline-dark" id="btn-reload">
                            <i class="fas fa-repeat"></i>
                        </button>
                    </div>

                    <hr>

                    <!-- tabla para mostrar datos -->
                    <div class="table-responsive">
                        <table class="table table-hover table-sm w-100" id="table-menu">
                            <thead>
                                <tr>
                                    <th>Sopa</th>
                                    <th>Arroz</th>
                                    <th>Proteina</th>
                                    <th>Energetico</th>
                                    <th>Acompañante</th>
                                    <th>Ensalada</th>
                                    <th>Bebida</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal donde se confirma la eliminacion -->
            <div class="modal fade" id="modal-tipo-menus-edit" tabindex="-1" aria-labelledby="modal-tipo-menus-editLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white" id="modal-tipo-menus-editLabel">Eliminar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" class="form-control mb-3" id="idMenuSeleccionado">
                            <h5 class="text-center">Esta seguro de eliminar la dieta selecionada</h5>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" id="btn-delete-tipo-menu">
                                <i class="fas fa-file-times me-2"></i>Eliminar
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <?php } else { ?>
                <div class="alert alert-warning">
                    <strong>Nota: </strong>El horario para solicitar el menú comienza desde las
                    <strong>8:00 AM</strong> hasta las <strong>10:00 AM</strong>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
</div>
</div>



<!-- ================================backend================================== -->


<script type="text/javascript">


    const myModal = new bootstrap.Modal('#modal-tipo-menus-edit', {
        keyboard: false
    });

    // HACE LA CONSULTA A LA BASE DE DATOS Y TRAE LOS DATOS DE LA API
    // Y HACE LA FUNCION "CLICK" PARA EL MODAL
    function readTipos() {
        let id;
        const urlParams = new URLSearchParams(window.location.href);
        const idPersona = urlParams.get('idPersona');
        const partes = idPersona.split('#');

        if (partes.length >= 1) {
            id = partes[0];
            console.log(id);
        }

        axios.get(`${host}/api/frmPedEdit/read/${id}`).then(res => {
            if (!res.data.status) {
                new DataTable('#table-menu', {
                    data: res.data,
                    destroy: true,
                    responsive: true,
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json",
                    },
                    columns: [
                        { data: 'nutriSopaNombre' },
                        { data: 'nutriArrozNombre' },
                        { data: 'nutriProteNombre' },
                        { data: 'nutriEnergeNombre' },
                        { data: 'nutriAcompNombre' },
                        { data: 'nutriEnsalNombre' },
                        { data: 'nutriBebidaNombre' },
                        ],
                    createdRow: (html, row, index) => {
                        html.setAttribute("role", "button");
                        html.addEventListener("click", () => {
                            document.getElementById("idMenuSeleccionado").value = row.idMenuSeleccionado;
                            myModal.show();
                        });
                    },
                });
            }
        });
    }

    const btn_reload = document.getElementById("btn-reload");

    if (btn_reload) {
        btn_reload.addEventListener("click", () => {
            readTipos();
        });
    }

    // DETERMINO LAS VARIABLE DE ELIMINAR Y ACTUALIZAR
    const btn_delete = document.getElementById("btn-delete-tipo-menu");

    // ENVIO A LA API LA FUNCION DE ELIMINAR
    if (btn_delete) {
        btn_delete.addEventListener("click", () => {
            const idMenuSeleccionado = document.getElementById("idMenuSeleccionado").value;
            axios.delete(`${host}/api/frmPedEdit/delete/${idMenuSeleccionado}`).then(res => {
                //console.log(res)
                readTipos();
                myModal.hide();
            }).catch(err => {
            });
        });
    }

    (function() {
        readTipos();
    })();
</script>

